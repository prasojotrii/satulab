<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('Master_api_model');
        $this->load->model('Master_api_request_model');
        $this->load->model('Analisa_request_model');
        $this->load->model('Analisa_sample_model');
        $this->load->model('Analisa_sample_rnd_model');
        $this->load->model('User_model');
        $this->output->set_content_type('application/json');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        // if (empty($this->session->userdata("pernr"))) {
        //     redirect('auth/logout');
        // }
        // else if ($this->session->userdata("tipe") != 'SysAdmin') {
        // 	redirect('user/index');
        // }

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'alerts.smsuite@gmail.com',
            'smtp_pass' => 'vrztaunpaohpqeji',
            'smtp_crypto' => 'tls',
            'charset' => 'utf-8',
            'mailtype' => 'html',
            'newline' => "\r\n",
        );
        $this->email->initialize($config);
        $this->load->library('email');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function send_notifications()
    {
        $this->load->model('Notification_model');
        $this->load->model('User_model'); // Memastikan User_model juga dimuat
        $this->load->model('Analisa_request_model'); // Model untuk tabel tb_tb_analisa_request_sap
        $this->load->model('Analisa_Tracking_model'); // Model untuk tabel tb_request_approval

        // Ambil notifikasi yang tertunda
        $pending_notifications = $this->Notification_model->get_pending_notifications();

        // Periksa apakah ada notifikasi yang tertunda
        if (empty($pending_notifications)) {
            // Jika tidak ada notifikasi, bisa return atau log informasi
            return; // Atau bisa mengeluarkan pesan log
        }

        // Iterasi melalui setiap notifikasi yang tertunda
        foreach ($pending_notifications as $notification) {
            // Ambil id_req dari notifikasi
            $id_req = $notification->id_data_feature; // Akses id_data_feature dari objek notifikasi

            // Ambil template berdasarkan template_id
            $template = $this->Notification_model->get_template($notification->template_id);

            // Ambil data user berdasarkan pernr


            if ($notification->pernr !== NULL) {
                // Ambil email dari user yang berasosiasi dengan unit
                $email = $this->User_model->get_user_by_pernr($notification->pernr);
            } else {
                // Ambil email dari user berdasarkan pernr
                $email = $this->User_model->get_user_by_id_unit($notification->id_unit);
            }

            // Ambil data dari tabel tb_tb_analisa_request_sap berdasarkan id_req
            $datakatantina = $this->Analisa_request_model->get_data($id_req); // Sesuaikan dengan fungsi yang ada di Analisa_request_model

            // Ambil kesimpulan terakhir dari tabel tb_request_approval
            $datakesimpulan = $this->Analisa_Tracking_model->get_latest_approval_by_id($id_req); // Sesuaikan dengan fungsi yang ada di Analisa_Tracking_model

            // Ganti placeholder dalam template dengan data yang diambil
            $message = $template->template_content; // Ambil konten template

            // Lakukan penggantian untuk setiap placeholder
            $message = str_replace('{name}', $email->name, $message);
            $message = str_replace('{no_karantina}', $datakatantina->no_karantina, $message);
            $message = str_replace('{kesimpulan}', $datakesimpulan->kesimpulan, $message);
            $message = str_replace('{link}', base_url(), $message); // Sesuaikan dengan URL yang tepat

            // Kirim email
            $this->email->from('alerts.smsuite@gmail.com', 'Satu Lab');
            $this->email->to($email->email);
            $this->email->subject($template->subject . ' ' . $datakatantina->no_karantina);
            $this->email->message($message);
            $this->email->set_mailtype("html");

            // Cek apakah email berhasil dikirim
            if ($this->email->send()) {
                $this->Notification_model->update_notification_status($notification->id, 'sent');
                http_response_code(200); // Berikan status 200 jika berhasil
            } else {
                $this->Notification_model->update_notification_status($notification->id, 'failed');

                // Ambil error yang terjadi pada pengiriman email
                $error_message = $this->email->print_debugger();

                // Log pesan error (opsional)
                log_message('error', 'Gagal mengirim email: ' . $error_message);

                // Berikan kode status 500 dan kirim pesan error
                http_response_code(500);
                echo json_encode(['error' => 'Gagal mengirim email.', 'details' => $error_message]);
            }
        }
    }



    public function send_rejection_notification($pernr, $requestor_email, $no_karantina)
    {
        $this->load->model('Notification_model');

        // Ambil template penolakan
        $template = $this->Notification_model->get_template_by_name('Rejection Notification');

        // Buat pesan
        $message = str_replace('{no_karantina}', $no_karantina, $template->template_content);
        $message = str_replace('{link}', base_url(), $message); // Sesuaikan dengan URL yang tepat

        // Kirim email
        $this->email->from('alerts.smsuite@gmail.com', 'Satu Lab');
        $this->email->to($requestor_email);
        $this->email->subject('Pemberitahuan Penolakan Analisa Bahan Karantina');
        $this->email->message($message);
        $this->email->set_mailtype("html");

        // Cek apakah email berhasil dikirim
        if ($this->email->send()) {
            // Jika berhasil, buat entri notifikasi baru
            $this->Notification_model->create_rejection_notification($pernr, $template->id, 'Data ditolak');
        } else {
            // Penanganan jika gagal mengirim email
            log_message('error', 'Gagal mengirim email penolakan untuk No Karantina: ' . $no_karantina);
        }
    }

    public function insert_notification($data)
    {
        return $this->db->insert('sys_notifications', $data);
    }
}
