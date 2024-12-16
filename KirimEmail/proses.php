<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <?php
    //ini wajib dipanggil paling atas
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //ini sesuaikan foldernya ke file 3 ini
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $tahun =  date("Y.m.d");

    $db_host = 'localhost'; // Nama Server
    $db_user = 'root'; // User Server
    $db_pass = ''; // Password Server
    $db_name = 'db_labsm'; // Nama Database

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die('Gagal terhubung MySQL: ' . mysqli_connect_error());
    }

    $email = 'prasojotrii@gmail.com';
    $judul = 'Reminder: Kalibrasi Instrumen ' . $tahun;
    $sql = 'SELECT * FROM `tb_daftar_instrumen` WHERE `selanjutnnya_kalibrasi` =CURDATE();';
    $query2 = mysqli_query($conn, $sql);

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);


    if (mysqli_num_rows($query2) > 0) {
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'notifications.labsm@gmail.com';                     //SMTP username
        $mail->Password   = 'vbuwgyzjggwwiqsk';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //pengirim
        $mail->setFrom('notifications.labsm@gmail.com', 'Labsm System');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML

        ob_start();
        include "content.php";

        $content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
        ob_end_clean();

        $mail->Subject = $judul;
        $mail->Body    = $content;
        // Load file content.php

        $mail->send();

        echo 'Message has been sent';
        echo '<p style="text-align:center">This window will close automatically within <span id="counter">5</span>detik(s).</p>';
    } else {
        echo '<button onclick="tutupHalaman()">Tutup</button> ';
        echo '<p style="text-align:center">This window will close automatically within <span id="counter">5</span>detik(s).</p>';
    }
    ?>




    <script type='text/javascript'>
        var newWindow = window.open('', '_self', '');

        function tutupHalaman(url) {
            //open the current window
            window.close(url);
        }


        function countdown(url) {
            var i = document.getElementById('counter');
            i.innerHTML = parseInt(i.innerHTML) - 1;
            if (parseInt(i.innerHTML) <= 0) {
                window.close(url);
            }
        }

        setInterval(function() {
            countdown();
        }, 1000);
    </script>

</body>

</html>