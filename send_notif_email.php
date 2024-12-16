<?php
// Konfigurasi database
$dbConfig = [
    'host' => '19.0.2.227',
    'user' => 'root',
    'password' => '@Sido-55',
    'dbname' => 'db_satulab',
];
$customApiUrl = "http://19.0.2.108:9000/send-message"; // Endpoint baru
$customTarget = "6285700060750"; // Nomor tujuan (ubah jika diperlukan)
// Konfigurasi API baru

$data_terkirim = [
    "number" => "6285700060750", // Nomor tujuan
    "message" => "Satu lab notifikasi normal" // Pesan yang akan dikirim
];

$gagal_login = [
    "number" => "6285700060750", // Nomor tujuan
    "message" => "Satulab gagal login ke db saat cek daftar notif" // Pesan yang akan dikirim
];

$data_gagal = [
    "number" => "6285700060750", // Nomor tujuan
    "message" => "Satulab gagal kirim email notif" // Pesan yang akan dikirim
];

// Fungsi untuk mengirim data JSON menggunakan POST
function sendJsonNotification($url, $data)
{
    // Inisialisasi cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); // Set URL API
    curl_setopt($ch, CURLOPT_POST, 1); // Set metode menjadi POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Data dalam format JSON
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Agar respons dikembalikan
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json', // Header untuk JSON
        'Accept: application/json', // Header penerimaan JSON (opsional)
    ]);

    // Eksekusi cURL dan tangkap respons
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Mendapatkan status HTTP
    curl_close($ch); // Menutup cURL

    // Menampilkan hasil
    if ($httpCode === 200) {
        echo "Notifikasi berhasil dikirim.\n";
    } else {
        echo "Gagal mengirim notifikasi. HTTP Status: $httpCode\n";
        echo "Response: $response\n";
    }
}

// Koneksi ke database
$conn = new mysqli($dbConfig['host'], $dbConfig['user'], $dbConfig['password'], $dbConfig['dbname']);

if ($conn->connect_error) {
    sendJsonNotification($customApiUrl, $gagal_login);
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT notification_id FROM notification_signal WHERE processed = 0";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $url = "http://19.0.2.227/satulab/notification/send_notifications";
    $response = @file_get_contents($url); // Gunakan @ untuk menangani error jika URL tidak dapat diakses
    if ($response) {
        // Kirim pesan ke WhatsApp jika berhasil
        $conn->query("UPDATE notification_signal SET processed = 1 WHERE processed = 0");
        sendJsonNotification($customApiUrl, $data_terkirim);
    } else {

        // sendJsonNotification($customApiUrl, $data_gagal);
    }
} else {
    echo "Tidak ada notifikasi baru.\n";
}

$conn->close();
