import requests
import mysql.connector
import time

# Konfigurasi database MySQL
db_config = {
    'user': 'root',
    'password': '',
    'host': '193.13.7.3',
    'database': 'db_labsm'
}

# URL endpoint yang akan dipanggil
url = "http://193.13.7.3/satulab/notification/send_notifications"

def check_new_notifications():
    # Koneksi ke database
    conn = mysql.connector.connect(**db_config)
    cursor = conn.cursor()

    # Cek data baru di tabel notification_signal
    cursor.execute("SELECT notification_id FROM notification_signal WHERE processed = 0")
    new_notifications = cursor.fetchall()

    if new_notifications:
        # Jika ada data baru, panggil endpoint
        try:
            response = requests.get(url)
            if response.status_code == 200:
                print("Notifikasi terkirim.")
                # Tandai data sebagai sudah diproses
                cursor.execute("UPDATE notification_signal SET processed = 1 WHERE processed = 0")
                conn.commit()
            else:
                print(f"Error: {response.status_code}")
        except requests.RequestException as e:
            print(f"Request failed: {e}")

    cursor.close()
    conn.close()

# Jalankan pengecekan setiap menit
while True:
    check_new_notifications()
    time.sleep(60)
