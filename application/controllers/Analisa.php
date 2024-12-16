<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . '../vendor/tecnickcom/tcpdf/tcpdf.php';



class Analisa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Master_Halaman_model');
        $this->load->model('Master_user_model');
        $this->load->model('Glassware_model');
        $this->load->model('Bahan_master_model');
        $this->load->model('Analisa_request_model');
        $this->load->model('Approval_model');
        $this->load->model('Analisa_Tracking_model');
        $this->load->model('User_model');
        $this->load->model('Analisa_sample_model');


        if (empty($this->session->userdata("pernr"))) {
            redirect('auth/logout');
        }
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

    public function kirim_email()
    {
        // Mengambil semua email dengan status 'pending'
        $emails = $this->db->get_where('emails', ['status' => 'pending'])->result_array();
        $summary = '';  // Variabel untuk menyimpan hasil pengiriman

        foreach ($emails as $email) {
            // Konfigurasi email
            $this->email->from('alerts.smsuite@gmail.com', 'Your Name');
            $this->email->to($email['recipient']);
            $this->email->subject($email['subject']);
            $this->email->message($email['body']);

            // Cek apakah email berhasil dikirim
            if ($this->email->send()) {
                // Update status email menjadi 'sent' dan catat waktu pengiriman
                $this->db->where('id_req', $email['id']);
                $this->db->update('emails', [
                    'status' => 'sent',
                    'sent_at' => date('Y-m-d H:i:s')
                ]);

                // Tambahkan ke summary keberhasilan
                $summary .= "Email sent to: " . $email['recipient'] . "\n";
            } else {
                // Tambahkan ke summary kegagalan
                $summary .= "Failed to send email to: " . $email['recipient'] . "\n";
                $summary .= "Error: " . $this->email->print_debugger(['headers']) . "\n";
            }
        }

        // Kirim summary ke prasojotrii@gmail.com
        if (!empty($summary)) {
            $this->email->clear();  // Hapus konfigurasi email sebelumnya
            $this->email->from('alerts.smsuite@gmail.com', 'Email Summary');
            $this->email->to('prasojo.tri@sidomuncul.co.id');
            $this->email->subject('Summary of Email Sending Process');
            $this->email->message(nl2br($summary));  // Konversi newline menjadi <br> untuk tampilan HTML

            $this->email->send();  // Kirim email summary
        }
    }



    public function check_sample()
    {
        $id_req = $this->input->post('id_req'); // Mendapatkan ID dari permintaan AJAX

        // Cek apakah ada data dengan deskripsi 'Proses mencetak label ke sample' dan waktu tidak NULL
        $this->db->select('waktu_tracking'); // Menambahkan select untuk waktu_tracking
        $this->db->where('id_req', $id_req);
        $this->db->where('desc_tracking', 'Proses mencetak label ke sample');
        $this->db->from('tb_analisa_tracking');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            // Jika data ditemukan, lanjutkan dengan mengambil jumlah sample
            $this->db->select('jumlah_sample, jumlah_sample_rnd');
            $this->db->where('id_req', $id_req); // Pastikan id_req, bukan id
            $this->db->from('tb_analisa_request_sap');
            $query2 = $this->db->get();

            $result = $query2->row_array();
            $jumlah_sample = $result['jumlah_sample'];
            $jumlah_sample_rnd = $result['jumlah_sample_rnd'];

            // Logika untuk menampilkan tombol kirim sample
            $show_kirim_sample = ($jumlah_sample_rnd != 0 || $jumlah_sample != 0);
            echo json_encode([
                'show_kirim_sample' => $show_kirim_sample,
                'jumlah_sample' => $jumlah_sample,
                'jumlah_sample_rnd' => $jumlah_sample_rnd,
                // 'waktu_tracking' => $query->row()->waktu_tracking // Tambahkan waktu_tracking ke dalam respon
            ]);
        } else {
            // Jika tidak ada data ditemukan, sembunyikan tombol
            echo json_encode([
                'show_kirim_sample' => false,
                'jumlah_sample' => 0,
                'jumlah_sample_rnd' => 0,
                'waktu_tracking' => null // Jika tidak ada data, tampilkan waktu_tracking sebagai null
            ]);
        }
    }


    public function count_by_progress()
    {
        $this->load->database();

        $result = [];
        $progress_statuses = [
            'Pengiriman Ke Lab',
            'Administrasi Lab Analisa',
            'Approval Ka Unit Lab Analisa',
            'Sedang dianalisa Lab',
            'Input data analisa Lab',
            'Approval hasil analisa',
        ];

        // Hitung jumlah untuk setiap status progress
        foreach ($progress_statuses as $status) {
            $this->db->where('progress', $status);
            $this->db->from('tb_analisa_request_sap');
            $result[$status] = $this->db->count_all_results();
        }

        // Tambahkan jumlah data di mana done_lab_at != NULL
        $this->db->where('done_lab_at !=', NULL);
        $this->db->from('tb_analisa_request_sap');
        $result['Analisa Lab selesai'] = $this->db->count_all_results();

        echo json_encode($result);
    }


    public function index()
    {


        // $data['analisa_masuk'] = $this->Analisa_sample_model->analisa_masuk();
        // $data['analisa_selesai'] = $this->Analisa_sample_model->analisa_selesai();
        // $data['proses_approval'] = $this->Analisa_sample_model->proses_approval();
        // $data['proses_lab'] = $this->Analisa_sample_model->proses_lab();
        // $data['proses_rnd'] = $this->Analisa_sample_model->proses_rnd();
        $data['dataSession'] = $this->Master_user_model->getDataUsername();
        $data['id_halaman']      = $this->uri->segment(2);
        $data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['title'] = 'Daftar Permintaan Karantina';
        $this->load->view('Template/header', $data);
        $this->load->view('analisa/index', $data);
    }

    public function count_analisa()
    {
        $filter_tahun = $this->input->get('filter_tahun');

        $data = array(
            'jumlah_masuk' => $this->Analisa_sample_model->analisa_masuk($filter_tahun),
            'jumlah_approval' => $this->Analisa_sample_model->proses_approval($filter_tahun),
            'jumlah_lab' => $this->Analisa_sample_model->proses_lab($filter_tahun),
            'jumlah_rnd' => $this->Analisa_sample_model->proses_rnd($filter_tahun),
            'jumlah_selesai' => $this->Analisa_sample_model->analisa_selesai($filter_tahun)
        );

        echo json_encode($data);
    }
    public function get_request_data()
    {
        $id_req = $this->input->post('id_req');

        if (empty($id_req)) {
            echo json_encode(array("status" => FALSE, "message" => "ID Request is required"));
            return;
        }

        $data = $this->Analisa_request_model->get_request_data_by_id($id_req);

        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(array("status" => FALSE, "message" => "No data found"));
        }
    }

    public function get_analis_lab2()
    {
        $id_req = $this->input->post('id_req');

        // Ambil id dari input POST jika tidak disediakan sebagai parameter
        if ($id_req === null) {
            $id_req = $this->input->post('id_req');
        }

        // Jika id tetap null setelah mencoba mengambil dari POST, kembalikan error
        if ($id_req === null) {
            echo json_encode(array('status' => false, 'message' => 'ID tidak disediakan.'));
            return;
        }

        $this->db->select('analis_lab');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            echo json_encode(array('status' => true, 'analis_lab' => $result->analis_lab));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Data tidak ditemukan.'));
        }
    }
    public function get_analis_list()
    {
        $this->db->select('pernr, name');
        $this->db->from('tb_master_user');
        $this->db->where('jobdesk', 'Analis');
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $response = array('status' => TRUE, 'analis' => $query->result_array());
        } else {
            $response = array('status' => FALSE, 'analis' => array());
        }

        echo json_encode($response);
    }

    // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_karantina(' . "'" . $data_model->id_req  . "'" . ')"><i class="fas fa-edit"></i></a>';
    // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_karantina(' . "'" . $data_model->id_req  . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';

    public function list_analisa()
    {
        $filters = array(
            'filter_0' => $this->input->post('filter_0'),
            'filter_1' => $this->input->post('filter_1'),
            'filter_2' => $this->input->post('filter_2'),
            'filter_3' => $this->input->post('filter_3'),
            'filter_4' => $this->input->post('filter_4'),
            'filter_5' => $this->input->post('filter_5'),
            'filter_6' => $this->input->post('filter_6'),
            'filter_7' => $this->input->post('filter_7'),
            'filter_8' => $this->input->post('filter_8'),
            'filter_9' => $this->input->post('filter_9'),
            'filter_10' => $this->input->post('filter_10'),
            'filter_11' => $this->input->post('filter_11'),
            'filter_tahun' => $this->input->post('filter_tahun'),
            'progress' => $this->input->post('progress'),
        );

        // Retrieve the data list
        $list = $this->Analisa_request_model->get_datatables($filters);

        $data = [];
        $no = $_POST['start'];

        foreach ($list as $data_model) {
            $no++;
            $row = [];

            // Assign base row values
            $row[] = $no;
            $row[] = date('d-m-Y', strtotime($data_model->created_at));
            $row[] = $data_model->sloc . ' - ' . $data_model->sloc_desc;
            $row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="No Permintaan" onclick="info_analisa(' . "'" . $data_model->id . "', '" . $data_model->id_req . "'" . ')">' . $data_model->no_karantina . '</a>';

            $row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="info_batch(' . "'" . $data_model->id_req . "'" . ')">' . $data_model->batch . '</a>';

            $badge_status = ($data_model->status_kar == "Open") ? '<a class="badge bg-primary">Open</a>' : '<a class="badge bg-success">Close</a>';
            $todays_date = date('Y-m-d');

            // Calculate due dates
            $tanggal_ed_qc = ($data_model->waktu_in_qc != null) ? date('Y-m-d', strtotime($data_model->waktu_in_qc . ' + ' . $data_model->waktu_pengerjaan_qc . ' days')) : null;
            $tanggal_ed_lab = ($data_model->waktu_in_lab != null) ? date('Y-m-d', strtotime($data_model->waktu_in_lab . ' + ' . $data_model->waktu_pengerjaan_lab . ' days')) : null;
            $tanggal_ed_rnd = ($data_model->waktu_in_rnd != null) ? date('Y-m-d', strtotime($data_model->waktu_in_rnd . ' + ' . $data_model->waktu_pengerjaan_rnd . ' days')) : null;

            // Generate badges based on due dates
            $qc_badge = $this->generateBadge($tanggal_ed_qc, $todays_date, $data_model->waktu_out_qc, 'QC');
            $lab_badge = $this->generateBadge($tanggal_ed_lab, $todays_date, $data_model->waktu_out_lab, 'LAB');
            $rnd_badge = $this->generateBadge($tanggal_ed_rnd, $todays_date, $data_model->waktu_out_rnd, 'R&D');

            // Retrieve LAB and RND status for this record
            $data_hasil = $this->Analisa_request_model->check_rnd_lab($data_model->id_req);

            // Append the correct combination of badges
            if ($data_hasil['lab'] && $data_hasil['rnd']) {
                $row[] = "$badge_status-$qc_badge-$lab_badge-$rnd_badge";
            } elseif ($data_hasil['lab']) {
                $row[] = "$badge_status-$qc_badge-$lab_badge";
            } elseif ($data_hasil['rnd']) {
                $row[] = "$badge_status-$qc_badge-$rnd_badge";
            } else {
                $row[] = "$badge_status-$qc_badge";
            }

            // Add additional columns
            $row[] = ($data_model->progress == 'Cetak Label' && $data_model->nama_qc == $this->session->userdata("pernr")) ?
                '<input type="checkbox" class="form-check-input multicetak" name="multi_cetak[]" value="' . $data_model->id_req . '"> <a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Cetak Label" onclick="cetak_label(' . "'" . $data_model->no_karantina . "','" . $data_model->id_req . "','" . $data_model->material . "','" . $data_model->desc . "'" . ')">' . $data_model->progress . '</a>' :
                '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="info_analisa" onclick="info_analisa(' . "'" . $data_model->id . "', '" . $data_model->id_req . "'" . ')">' . $data_model->progress . '</a>';

            $row[] = $data_model->zmasalah;
            $row[] = $data_model->material;
            $row[] = $data_model->desc ?? '';
            $row[] = $data_model->quantity . ' ' . $data_model->uom;

            $row[] = $data_model->nama_qc;

            $data[] = $row;
        }

        // Output JSON response
        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Analisa_request_model->count_all(),
            'recordsFiltered' => $this->Analisa_request_model->count_filtered(),
            'data' => $data,
        ];

        echo json_encode($output);
    }

    // Helper method to determine badge status
    private function generateBadge($due_date, $today, $completion_date, $label)
    {
        if ($due_date === null) {
            return "<a class='badge bg-primary'>$label</a>";
        } elseif ($today == $due_date && $completion_date == null) {
            return "<a class='badge bg-warning'>$label</a>";
        } elseif ($today < $due_date || $completion_date != null) {
            return "<a class='badge bg-success'>$label</a>";
        } elseif ($today > $due_date && $completion_date == null) {
            return "<a class='badge bg-danger'>$label</a>";
        } else {
            return "<a class='badge bg-primary'>$label</a>";
        }
    }



    // Fungsi untuk memuat data tracking dan mengirimnya dalam format JSON
    public function load_data_tracking()
    {
        $id_req = $this->input->post('id_req'); // Mengambil ID dari POST request
        $data = $this->Analisa_Tracking_model->get_tracking_data($id_req);

        // Mengembalikan data dalam format JSON
        echo json_encode($data);
    }

    public function get_usulan_by_id_req()
    {
        $id_req = $this->input->post('id_req');


        // Get usulan data based on id_req
        $data = $this->Approval_model->get_usulan_by_id_req($id_req);

        // Return data as JSON
        echo json_encode($data);
    }

    public function load_data_tracking_rnd()
    {
        $id_req = $this->input->post('id_req'); // Mengambil ID dari POST request
        $data = $this->Analisa_Tracking_model->get_tracking_data_rnd($id_req);

        // Mengembalikan data dalam format JSON
        echo json_encode($data);
    }
    public function copy_to_all()
    {
        $id_req = $this->input->post('id_req');
        $mstrchar = $this->input->post('mstrchar');
        $id_spec = $this->input->post('id_spec');
        $result = $this->input->post('result');
        $valid = $this->input->post('valid');

        if (!$id_req || !$mstrchar || !$id_spec) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']);
            return;
        }

        // Load model untuk mengakses database
        // Panggil fungsi untuk menyimpan data ke tabel tb_analisa_request_spec
        $success = $this->Analisa_sample_model->update_result_to_all($id_req, $mstrchar, $result, $valid);

        if ($success) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data.']);
        }
    }

    public function get_analisa_lab()
    {
        $id_req = $this->input->post('id_req');

        $data = $this->Analisa_request_model->get_analisa_lab_by_id($id_req);

        // Pastikan data memiliki atribut 'sample_ke' untuk digunakan dalam pemfilteran
        if (!empty($data)) {
            foreach ($data as &$item) {
                if (!isset($item['sample_ke'])) {
                    $item['sample_ke'] = 1; // Misalnya, atur default 'sample_ke' jika tidak ada
                }
            }
        }

        // Cek apakah ada data di tb_analisa_request_spec dengan id_req = id dan oprshrttxt = 'LAB'
        $indicator = $this->Analisa_request_model->check_indicator($id_req);

        // Kirim data beserta indikator ke view
        echo json_encode(array('data' => $data, 'indicator' => $indicator));
    }



    public function update_analisa_lab()
    {
        $id = $this->input->post('id_req');
        $result = $this->input->post('result');
        $valid = $this->input->post('valid');

        // Load the database
        $this->load->database();

        // Prepare data for update
        $data = array(
            'result' => $result,
            'valid' => $valid
        );

        // Update the table based on the id
        $this->db->where('id', $id);
        $update = $this->db->update('tb_analisa_request_spec', $data);

        // Check if update was successful
        if ($update) {
            echo json_encode(array('status' => true, 'message' => 'Data successfully updated.'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Failed to update data.'));
        }
    }
    public function get_analisa_rnd()
    {
        $id_req = $this->input->post('id_req');
        $data = $this->Analisa_request_model->get_analisa_rnd_by_id($id_req);
        echo json_encode(array('data' => $data));
    }
    // Function to check if analisa_lab data exists
    public function check_analisa_lab_exists()
    {
        $id = $this->input->post('id_req');

        // Ambil data dari tabel tb_analisa_request_sap berdasarkan id
        $this->db->select('analis_lab');
        $this->db->where('id_req', $id);
        $query = $this->db->get('tb_analisa_request_sap');
        $result = $query->row();

        // Periksa apakah result ada dan analis_lab tidak kosong atau null
        if ($result && !empty($result->analis_lab)) {
            echo json_encode(array('status' => true, 'analis_lab' => $result->analis_lab));
        } else {
            echo json_encode(array('status' => false, 'analis_lab' => null));
        }
    }
    public function get_daftar_analis_lab()
    {
        $id_req = $this->input->post('id_req');

        // Ambil id dari input POST jika tidak disediakan sebagai parameter
        if ($id_req === null) {
            $id_req = $this->input->post('id_req');
        }

        // Jika id tetap null setelah mencoba mengambil dari POST, kembalikan error
        if ($id_req === null) {
            echo json_encode(array('status' => false, 'message' => 'ID tidak disediakan.'));
            return;
        }

        $this->db->select('analis_lab');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();

            echo json_encode(array('status' => true, 'analis_lab' => $result->analis_lab));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Data tidak ditemukan.'));
        }
    }

    public function get_analis_lab()
    {
        $id_req = $this->input->post('id_req');

        // Validasi input id_req
        if ($id_req === null) {
            echo json_encode(array('status' => false, 'message' => 'ID tidak disediakan.'));
            return;
        }

        // Query untuk mengambil analis_lab berdasarkan id_req
        $this->db->select('analis_lab');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();

            // Ambil data nama dari tb_master_user berdasarkan pernr
            $this->db->select('name');
            $this->db->from('tb_master_user');
            $this->db->where('pernr', $result->analis_lab);

            $userQuery = $this->db->get();

            if ($userQuery->num_rows() > 0) {
                $userResult = $userQuery->row();

                echo json_encode(array(
                    'status' => true,
                    'analis_lab' => $result->analis_lab . " - " . $userResult->name
                ));
            } else {
                $userResult = $userQuery->row();
                echo json_encode(array(
                    'status' => false,
                    'analis_lab' => ""
                ));
            }
        } else {

            echo json_encode(array(
                'status' => false,
                'analis_lab' => ""
            ));
        }
    }


    public function update_analis_lab()
    {
        $id = $this->input->post('id_req');
        $analis_lab = $this->input->post('analis_lab');

        $this->db->where('id_req', $id);
        $update = $this->db->update('tb_analisa_request_sap', array('analis_lab' => $analis_lab));

        if ($update) {
            echo json_encode(array('status' => true, 'message' => 'analis_lab berhasil diperbarui.'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Gagal memperbarui analis_lab.'));
        }
    }
    // Function to update progress and tracking
    public function update_data_analisa()
    {
        $id = $this->input->post('id_req');
        // $nama_analis = $this->input->post('nama_analis');

        // Update progress
        $this->db->where('id_req', $id);
        $update_progress = $this->db->update('tb_analisa_request_sap', array('progress' => 'Approval hasil analisa'));

        $this->db->where('id_req', $id);
        $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
        $this->db->update('tb_analisa_tracking', array(
            'waktu_tracking' => date('Y-m-d H:i:s')
        ));

        // Insert new tracking record
        $tracking_data = array(
            'id_req' => $id,
            'waktu_tracking' => NULL,
            'desc_tracking' => 'Proses approval hasil analisa oleh Ka Unit Lab'
        );
        $insert_tracking = $this->db->insert('tb_analisa_tracking', $tracking_data);

        if ($update_progress && $insert_tracking) {
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false));
        }
    }

    public function update_approval_hasil_analisa()
    {
        $id = $this->input->post('id_req');
        $this->load->database();

        // Update progress
        $this->db->where('id_req', $id);
        $update_progress = $this->db->update('tb_analisa_request_sap', array('progress' => 'Input data analisa Lab'));

        // Update tracking record
        // $this->db->where('id_req', $id);
        // $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
        // $this->db->update('tb_analisa_tracking', array(
        //     'waktu_tracking' => date('Y-m-d H:i:s')
        // ));

        // Insert new tracking record
        $this->db->where('id_req', $id);
        $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
        $this->db->update('tb_analisa_tracking', array(
            'waktu_tracking' => date('Y-m-d H:i:s')
        ));

        $tracking_data = array(
            'id_req' => $id,
            'waktu_tracking' => date('Y-m-d H:i:s'),
            'desc_tracking' => 'Proses Input data analisa Lab'
        );
        $insert_tracking = $this->db->insert('tb_analisa_tracking', $tracking_data);






        if ($update_progress && $insert_tracking) {
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false));
        }
    }
    public function check_jobdesk()
    {
        $pernr = $this->input->post('pernr');

        // Select the jobdesk from the tb_master_user table
        $this->db->select('jobdesk');
        $this->db->from('tb_master_user');
        $this->db->where('pernr', $pernr);
        $query = $this->db->get();
        $user_jobdesk = $query->row();

        $is_manager = false;
        $jobdesk_name = 'N/A'; // Default jobdesk name

        // Check if jobdesk data is found
        if ($user_jobdesk) {
            $jobdesk_name = $user_jobdesk->jobdesk; // Get jobdesk name

            // Check if the jobdesk is one of the managerial roles
            if (in_array($jobdesk_name, ['Manager QC', 'Manager R&D', 'Ka Unit R&D'])) {
                $is_manager = true;
            }
        }

        // Return JSON response with jobdesk and isManager status
        echo json_encode([
            'isManager' => $is_manager,
            'jobdesk' => $jobdesk_name  // Include the jobdesk title
        ]);
    }

    public function get_usulan_rnd_by_id_req()
    {
        $id_req = $this->input->post('id_req'); // Get the id_req from POST data

        // Fetch data from the model

        $data = $this->Analisa_request_model->get_usulan_rnd_by_id_req($id_req);
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
    public function update_analisa_lab_selesai()
    {
        $id = $this->input->post('id_req');

        if ($id) {

            // Update progress
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Analisa Lab selesai',
                'done_lab_at' => date('Y-m-d H:i:s'),
                'waktu_out_lab' => date('Y-m-d H:i:s')
            ), array('id_req' => $id));

            // Insert tracking data untuk proses analisa lab selesai
            $tracking_data = array(
                'id_req' => $id,
                'waktu_tracking' => date('Y-m-d H:i:s'),
                'desc_tracking' => 'Proses Analisa Lab selesai,  menunggu hasil RND'
            );
            $this->db->insert('tb_analisa_tracking', $tracking_data);

            // Cek apakah ada data dengan oprshrttxt = 'RND'
            $this->db->select('id_req, oprshrttxt, result');
            $this->db->from('tb_analisa_request_spec');
            $this->db->where('id_req', $id);
            $this->db->where('cat_oprshrttxt', 'RND');
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                // Ada data dengan oprshrttxt = 'RND'

                // Cek apakah done_rnd_at pada tb_analisa_request_sap tidak NULL
                $this->db->select('done_rnd_at');
                $this->db->from('tb_analisa_request_sap');
                $this->db->where('id_req', $id);
                $result_sap = $this->db->get()->row();

                if (!is_null($result_sap->done_rnd_at)) {
                    // Jika done_rnd_at tidak NULL, langsung approval KA Unit RND
                    $this->proses_approval_ka_unit_rnd($id);
                } else {
                    // Jika done_rnd_at NULL, status menunggu hasil RND
                    // $tracking_data = array(
                    //     'id_req' => $id,
                    //     'waktu_tracking' => NULL,
                    //     'desc_tracking' => 'Proses Analisa Lab selesai, menunggu hasil RND'
                    // );
                    // $this->db->insert('tb_analisa_tracking', $tracking_data);

                    $this->data_analisa($id);

                    echo json_encode(array('status' => true, 'message' => 'Status menunggu hasil RND'));
                }
            } else {
                // Tidak ada data RND, langsung approval Manager QC
                $this->proses_approval_manager_qc($id);
            }
        } else {
            echo json_encode(array('status' => false, 'message' => 'ID tidak ditemukan.'));
        }
    }
    public function data_analisa($id_req)
    {
        // Memuat model

        // Ambil data utama berdasarkan id_req
        $data = $this->Analisa_request_model->get_data_by_id_req($id_req);

        if ($data) {
            // Ambil data spec yang terkait dengan id_req
            $spec_data = $this->Analisa_request_model->get_data_spec($id_req);

            // Menyusun response
            $response = [
                'id_kar' => $data->id_kar,
                'id_req' => $data->id_req,
                'month' => $data->month,
                'years' => $data->years,
                'plant' => $data->plant,
                'sloc' => $data->sloc,
                'sloc_desc' => $data->sloc_desc,
                'zyear' => $data->zyear,
                'jenis_material' => $data->jenis_material,
                'material' => $data->material,
                'zbentuk' => $data->zbentuk,
                'desc' => $data->desc,
                'batch' => $data->batch,
                'no_karantina' => $data->no_karantina,
                'batch_lapangan' => $data->batch_lapangan,
                'manuf_date' => $data->manuf_date,
                'ed' => $data->ed,
                'uji_ulang' => $data->uji_ulang,
                'tgl_karantina' => $data->tgl_karantina,
                'zmasalah' => $data->zmasalah,
                'desc_mslh' => $data->desc_mslh,
                'nama_qc' => $data->nama_qc,
                'nama_ka' => $data->nama_ka,
                'nama_koor' => $data->nama_koor,
                'dqc' => (bool) $data->dqc,
                'dlab' => (bool) $data->dlab,
                'drnd' => (bool) $data->drnd,
                'zind' => (bool) $data->zind,
                'status_kar' => $data->status_kar,
                'progress' => $data->progress,
                'insplot' => (int) $data->insplot,
                'order' => $data->order,
                'matdoc' => $data->matdoc,
                'matyears' => (int) $data->matyears,
                'ztransaksi' => $data->ztransaksi,
                'quantity' => (float) $data->quantity,
                'uom' => $data->uom,
                'reff' => $data->reff,
                "sloc_desc" => $data->sloc_desc,
                "zbentuk" => $data->zbentuk,
                "waktu_pengerjaan_qc" => $data->waktu_pengerjaan_qc,
                "satuan_waktu" => $data->satuan_waktu,
                "waktu_pengerjaan_lab" => $data->waktu_pengerjaan_lab,
                "waktu_pengerjaan_rnd" => $data->waktu_pengerjaan_rnd,
                "total_waktu_pengerjaan" => $data->total_waktu_pengerjaan,
                "waktu_in_qc" => $data->waktu_in_qc,
                "waktu_out_qc" => $data->waktu_out_qc,
                "waktu_in_lab" => $data->waktu_in_lab,
                "waktu_out_lab" => $data->waktu_out_lab,
                "waktu_in_rnd" => $data->waktu_in_rnd,
                "waktu_out_rnd" => $data->waktu_out_rnd,
                "keputusan_rnd" => $data->keputusan_rnd,
                'spec' => $spec_data // Menambahkan spec data
            ];

            // Menyusun respon JSON
            $json_data = json_encode($response);

            // Kirim data ke API eksternal
            $this->send_hasil_to_api_rnd($json_data);

            $tracking_data = array(
                'id_req' => $id_req,
                'waktu_tracking' => date("Y-m-d H:i:s"),
                'desc_tracking' => 'Pengiriman data hasil lab ke system RND',
                'unit_progress' => 'R&D'
            );
            $this->db->insert('tb_analisa_tracking', $tracking_data);
            // Mengembalikan respon JSON kepada klien
            // echo $json_data;
        } else {
            // Jika tidak ada data ditemukan, kembalikan pesan error
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }

    private function send_hasil_to_api_rnd($json_data)
    {
        // URL API yang akan diakses
        $url = "http://192.168.220.2/js/api/v1/labanalisa";

        // Inisialisasi cURL
        $ch = curl_init();

        // Menyiapkan opsi cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($json_data)
        ]);

        // Eksekusi cURL
        $response = curl_exec($ch);

        // Cek apakah terjadi kesalahan
        if (curl_errno($ch)) {
            // Menampilkan error jika terjadi kesalahan
            log_message('error', 'cURL Error: ' . curl_error($ch));
        } else {
            // Menampilkan respons jika tidak ada kesalahan
            log_message('info', 'Response from API: ' . $response);
        }

        // Menutup cURL
        curl_close($ch);
    }

    private function proses_approval_ka_unit_rnd($id)
    {
        // Tracking untuk approval KA Unit RND
        $tracking_data = array(
            'id_req' => $id,
            'waktu_tracking' => NULL,
            'desc_tracking' => 'Approval KA Unit RND'
        );
        $this->db->insert('tb_analisa_tracking', $tracking_data);

        $ka_rnd = $this->User_model->get_data_ka_rnd();

        if ($ka_rnd) {
            $approvals = array(
                'id_req' => $id,
                'pernr' => $ka_rnd['pernr'],
                'fitur' => 'Analisa'
            );
            $this->db->insert('tb_request_approval', $approvals);

            $this->kirim_email_approval($ka_rnd['email'], 'KA Unit RND', $id);

            // Insert tracking data untuk approval Ka Unit R&D
            $tracking_data2 = array(
                'id_req' => $id,
                'waktu_tracking' => NULL,
                'desc_tracking' => 'Proses approval Ka Unit R&D'
            );
            $this->db->insert('tb_analisa_tracking', $tracking_data2);

            // Update progress untuk approval QC
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Approval Ka Unit R&D'
            ), array('id_req' => $id));

            echo json_encode(array('status' => true, 'message' => 'Proses approval Ka Unit R&D', 'email_status' => 'Email berhasil dikirim.'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'KA Unit RND tidak ditemukan.'));
        }
    }

    private function proses_approval_manager_qc($id)
    {
        // Tracking untuk approval Manager QC

        $datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        // Get current timestamp
        $current_time = $datetime->format('Y-m-d H:i:s');

        $manager_qc = $this->User_model->get_data_manager_qc();

        if ($manager_qc) {
            $approvals = array(
                'id_req' => $id,
                'pernr' => $manager_qc['pernr'],
                'fitur' => 'Analisa'
            );
            $this->db->insert('tb_request_approval', $approvals);

            // $this->kirim_email_approval($manager_qc['email'], 'Manager QC', $id);

            $notification_data = array(
                'pernr' => $manager_qc['pernr'], // Mengambil data 'pernr' dari array
                'id_unit' => NULL,
                'template_id' => 4,
                'feature' => 'Karantina',
                'id_data_feature' => $id,
                'status' => 'pending'
            );

            // Insert ke dalam tabel sys_notifications
            $this->db->insert('sys_notifications', $notification_data);

            // Insert tracking data untuk approval Manager QC
            $tracking_data2 = array(
                'id_req' => $id,
                'waktu_tracking' => NULL,
                'desc_tracking' => 'Proses approval manager QC'
            );
            $this->db->insert('tb_analisa_tracking', $tracking_data2);

            // Melakukan update pada kolom 'progress' dan 'waktu_out_lab'
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Approval Manager QC',
                'waktu_out_lab' => $current_time
            ), array('id_req' => $id));

            echo json_encode(array('status' => true, 'message' => 'Proses approval Manager QC', 'email_status' => 'Email berhasil dikirim.'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Manager QC tidak ditemukan.'));
        }
    }

    private function kirim_email_approval($email, $id)
    {
        // Fetch no_karantina dari tb_analisa_request_sap
        $this->db->select('no_karantina');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id);
        $query_sap = $this->db->get();
        $no_karantina = $query_sap->num_rows() > 0 ? $query_sap->row()->no_karantina : 'Tidak tersedia';

        // Mengirim email
        $this->email->from('alerts.smsuite@gmail.com', 'Satu Lab');
        $this->email->to($email);
        $this->email->subject('Permintaan Persetujuan Analisa Bahan Karantina');

        $message = "Kepada Yth Bapak/Ibu,<br><br>";
        $message .= "Mohon untuk melakukan preview dan approval pada permohonan dengan No Karantina $no_karantina pada sistem Satu Lab pada link berikut ini:";
        $message .= '<a href="' . base_url() . '">Satu Lab</a><br><br>';
        $message .= "Terima Kasih,<br><br>";
        $message .= "Satu Lab";

        $this->email->set_mailtype("html");
        $this->email->message($message);

        return $this->email->send();
    }

    public function get_analisa_qc()
    {
        $id_req = $this->input->post('id_req');
        $data = $this->Analisa_request_model->get_analisa_qc_id($id_req);
        echo json_encode(array('data' => $data));
    }

    public function get_progress_status()
    {
        $id_req = $this->input->post('id_req');

        $this->db->select('progress');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $progress = $query->row()->progress;
            $response = array('status' => true, 'progress' => $progress);
        } else {
            $response = array('status' => false, 'error' => 'ID tidak ditemukan.');
        }

        echo json_encode($response);
    }
    public function list_approval()
    {
        $list = $this->Approval_model->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $data_model->pernr;
            $row[] = $data_model->nama_user;
            $row[] = $data_model->jobdesk;
            if ($data_model->status == 0) {
                $row[] = '<a class="btn btn-primary btn-sm"  href="javascript:void(0)">Menunggu</a>';
            } else if ($data_model->status == 1) {
                $row[] = '<a class="btn btn-success btn-sm"  href="javascript:void(0)">Disetujui</a>';
            } else if ($data_model->status == 2) {
                $row[] = '<a class="btn btn-danger btn-sm"  href="javascript:void(0)">Ditolak</a>';
            }
            $row[] = $data_model->desc_approval;
            $row[] = $data_model->usulan;

            $row[] = $data_model->kesimpulan;



            if ($data_model->date_approval == NULL) {
                $row[] = '';
            } else {
                $row[] = date('d-m-Y', strtotime($data_model->date_approval));
            }


            $data[] = $row;
        }


        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Approval_model->count_all(),
            'recordsFiltered' => $this->Approval_model->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
    }


    public function tracking_analisa()
    {
        $list = $this->Analisa_Tracking_model->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];

            $row[] = $no;

            $row[] = $data_model->created_at;
            $row[] = $data_model->desc;
            $row[] = $data_model->attachment;

            $data[] = $row;
        }


        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Analisa_Tracking_model->count_all(),
            'recordsFiltered' => $this->Analisa_Tracking_model->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

    public function get_info_batch()
    {
        $id_req = $this->input->post('id_req');

        // Ambil data dari model
        $data = $this->Analisa_request_model->get_info_batch($id_req);

        if ($data) {
            $response = array(
                'status' => 'success',
                'manuf_date' => $data->manuf_date,
                'tanggal_karantina' => $data->tgl_karantina,
                'tanggal_ed' => $data->ed,
                'qndat' => $data->qndat
            );
        } else {
            $response = array('status' => 'error');
        }

        echo json_encode($response);
    }

    public function multi_insert()
    {
        // Path ke folder dan file JSON
        $json_folder_path = 'C:/laragon/www/satulab/import_sap/';
        $json_file_path = $json_folder_path . 'data.json';

        // Cek jika file JSON ada
        if (!file_exists($json_file_path)) {
            echo json_encode(array("status" => FALSE, "message" => "File JSON tidak ditemukan."));
            return;
        }

        // Baca file JSON
        $json_data = file_get_contents($json_file_path);
        $data_array = json_decode($json_data, true);

        // Cek jika decoding JSON berhasil
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(array("status" => FALSE, "message" => "Error dalam parsing JSON: " . json_last_error_msg()));
            return;
        }

        // Pastikan bahwa $data_array adalah array dari objek JSON
        if (!is_array($data_array)) {
            echo json_encode(array("status" => FALSE, "message" => "Format data JSON tidak valid."));
            return;
        }

        $all_success = true;
        $email_status = "No email attempts.";

        // Load email library
        $this->load->library('email');

        // Get current timestamp
        $current_time = date('Y-m-d H:i:s');

        // Loop melalui setiap objek JSON dalam array
        foreach ($data_array as $data) {
            // Hapus field 'spec' dari $data jika ada
            $specs = isset($data['spec']) ? $data['spec'] : array();
            unset($data['spec']);

            // Insert data ke database menggunakan model
            $result = $this->Analisa_request_model->insert_request_sap($data);

            // Ambil nilai insert_id dan no_karantina dari hasil yang dikembalikan
            $insert_id = $result['insert_id'];
            $no_karantina = $result['no_karantina'];

            if ($insert_id) {
                // Insert data ke tabel tb_karantina_request_spec jika ada data 'spec'
                foreach ($specs as $spec) {
                    $spec_data = array(
                        'id_req' => $insert_id, // Menggunakan $insert_id dari insert pertama
                        'mstrchar' => $spec['mstrchar'],
                        'short_text' => $spec['short_text'],
                        'oprshrttxt' => $spec['oprshrttxt'],
                        'spec' => $spec['spec'],
                        'result' => $spec['result'],
                        'manual_add' => $spec['manual_add']
                    );

                    $this->db->insert('tb_analisa_request_spec', $spec_data);
                }

                // Insert data ke tabel tb_request_approval
                $approvals = array(
                    array('id_req' => $insert_id, 'pernr' => $data['nama_ka'], 'fitur' => 'Analisa'),
                    array('id_req' => $insert_id, 'pernr' => $data['nama_koor'], 'fitur' => 'Analisa'),
                );

                foreach ($approvals as $approval) {
                    $this->db->insert('tb_request_approval', $approval);
                }

                // Insert ke tabel tb_analisa_tracking
                $tracking_data = array(
                    array(
                        'id_req' => $insert_id,
                        'waktu_tracking' => $current_time,
                        'desc_tracking' => 'Permintaan Analisa di buat'
                    ),
                    array(
                        'id_req' => $insert_id,
                        'waktu_tracking' => NULL,
                        'desc_tracking' => 'Proses Approval Ka Unit'
                    )
                );

                $this->db->insert_batch('tb_analisa_tracking', $tracking_data);

                // Retrieve the email address for 'nama_ka'
                $this->db->select('email,name');
                $this->db->from('tb_master_user');
                $this->db->where('pernr', $data['nama_ka']);
                $query = $this->db->get();
                $user = $query->row();

                if ($user && $user->email) {
                    // Email configuration
                    $this->email->from('alerts.smsuite@gmail.com', 'Satu Lab');
                    $this->email->to($user->email);
                    $this->email->subject('Permintaan Persetujuan Analisa Bahan Karantina');

                    $message = "Kepada Yth Bapak/Ibu {$user->name},<br><br>";
                    $message .= "Mohon untuk melakukan preview dan approval pada permohonan dengan No Karantina $no_karantina pada sistem Satu Lab pada link berikut ini:";
                    $message .= '<a href="' . base_url() . '">Satu Lab</a><br><br>';
                    $message .= "Terima Kasih,<br><br>";
                    $message .= "Satu Lab";

                    // Set email format to HTML
                    $this->email->set_mailtype("html");
                    $this->email->message($message);

                    if ($this->email->send()) {
                        $email_status = "Email berhasil dikirim.";
                    } else {
                        $email_status = "Gagal mengirim email.";
                    }
                } else {
                    $email_status = "Email tidak ditemukan untuk pernr: " . $data['nama_ka'];
                }
            } else {
                $all_success = false;
                echo json_encode(array("status" => FALSE, "message" => "Gagal memasukkan data ke database."));
                break;
            }
        }

        // Hapus file JSON setelah semua insert berhasil
        if ($all_success) {
            if (unlink($json_file_path)) {
                echo json_encode(array("status" => TRUE, "message" => "Semua data berhasil dimasukkan dan file JSON berhasil dihapus. " . $email_status));
            } else {
                echo json_encode(array("status" => TRUE, "message" => "Semua data berhasil dimasukkan tetapi gagal menghapus file JSON. " . $email_status));
            }
        }
    }

    public function solo_insert()
    {
        // Path ke folder dan file JSON
        $json_folder_path = 'C:/laragon/www/satulab/import_sap/';
        $json_file_path = $json_folder_path . 'data.json';

        // Cek jika file JSON ada
        if (!file_exists($json_file_path)) {
            echo json_encode(array("status" => FALSE, "message" => "File JSON tidak ditemukan."));
            return;
        }

        // Baca file JSON
        $json_data = file_get_contents($json_file_path);
        $data_array = json_decode($json_data, true);

        // Cek jika decoding JSON berhasil
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(array("status" => FALSE, "message" => "Error dalam parsing JSON: " . json_last_error_msg()));
            return;
        }

        // Pastikan bahwa $data_array adalah array dari objek JSON
        if (!is_array($data_array)) {
            echo json_encode(array("status" => FALSE, "message" => "Format data JSON tidak valid."));
            return;
        }

        // Jika data_array bukan array dari objek JSON (hanya satu objek), ubah menjadi array dari satu objek
        if (!isset($data_array[0])) {
            $data_array = array($data_array);
        }

        $all_success = true;
        $email_status = "No email attempts.";

        // Load email library
        $this->load->library('email');
        $datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        // Get current timestamp
        $current_time = $datetime->format('Y-m-d H:i:s');

        // Loop melalui setiap objek JSON dalam array
        foreach ($data_array as $data) {
            // Hapus field 'spec' dari $data jika ada
            if (isset($data['spec']) && is_array($data['spec'])) {
                $specs = $data['spec'];
                unset($data['spec']);
            } else {
                $specs = array();
            }

            // Insert data ke database menggunakan model
            $result = $this->Analisa_request_model->insert_request_sap($data);

            // Ambil nilai insert_id dan no_karantina dari hasil yang dikembalikan
            $insert_id = $result['insert_id'];
            $no_karantina = $result['no_karantina'];

            if ($insert_id) {
                // Insert data ke tabel tb_karantina_request_spec jika ada data 'spec'
                foreach ($specs as $spec) {
                    $spec_data = array(
                        'id_req' => $insert_id, // Menggunakan $insert_id dari insert pertama
                        'mstrchar' => $spec['mstrchar'],
                        'short_text' => $spec['short_text'],
                        'oprshrttxt' => $spec['oprshrttxt'],
                        'spec' => $spec['spec'],
                        'result' => $spec['result'],
                        'manual_add' => $spec['manual_add']
                    );

                    $this->db->insert('tb_analisa_request_spec', $spec_data);
                }

                // Insert data ke tabel tb_request_approval
                $approvals = array(
                    array('id_req' => $insert_id, 'pernr' => $data['nama_ka'], 'fitur' => 'Analisa'),
                    array('id_req' => $insert_id, 'pernr' => $data['nama_koor'], 'fitur' => 'Analisa'),
                );

                foreach ($approvals as $approval) {
                    $this->db->insert('tb_request_approval', $approval);
                }

                // Insert ke tabel tb_analisa_tracking
                $tracking_data = array(
                    array(
                        'id_req' => $insert_id,
                        'waktu_tracking' => $current_time,
                        'desc_tracking' => 'Permintaan Analisa dibuat'
                    ),
                    array(
                        'id_req' => $insert_id,
                        'waktu_tracking' => NULL,
                        'desc_tracking' => 'Proses Approval Ka Unit'
                    )
                );

                $this->db->insert_batch('tb_analisa_tracking', $tracking_data);

                // Retrieve the email address for 'nama_ka'
                $this->db->select('email, name');
                $this->db->from('tb_master_user');
                $this->db->where('pernr', $data['nama_ka']);
                $query = $this->db->get();
                $user = $query->row();

                if ($user && $user->email) {
                    // Email configuration
                    $this->email->from('alerts.smsuite@gmail.com', 'Satu Lab');
                    $this->email->to($user->email);
                    $this->email->subject('Permintaan Persetujuan Analisa Bahan Karantina');

                    $message = "Kepada Yth Bapak/Ibu {$user->name},<br><br>";
                    $message .= "Mohon untuk melakukan preview dan approval pada permohonan dengan No Karantina $no_karantina pada sistem Satu Lab pada link berikut ini:";
                    $message .= '<a href="' . base_url() . '">Satu Lab</a><br><br>';
                    $message .= "Terima Kasih,<br><br>";
                    $message .= "Satu Lab";

                    // Set email format to HTML
                    $this->email->set_mailtype("html");
                    $this->email->message($message);

                    if ($this->email->send()) {
                        $email_status = "Email berhasil dikirim.";
                    } else {
                        $email_status = "Gagal mengirim email.";
                    }
                } else {
                    $email_status = "Email tidak ditemukan untuk pernr: " . $data['nama_ka'];
                }
            } else {
                $all_success = false;
                echo json_encode(array("status" => FALSE, "message" => "Gagal memasukkan data ke database."));
                break;
            }
        }

        // Hapus file JSON setelah semua insert berhasil
        if ($all_success) {
            if (unlink($json_file_path)) {
                echo json_encode(array("status" => TRUE, "message" => "Semua data berhasil dimasukkan dan file JSON berhasil dihapus. " . $email_status));
            } else {
                echo json_encode(array("status" => TRUE, "message" => "Semua data berhasil dimasukkan tetapi gagal menghapus file JSON. " . $email_status));
            }
        }
    }

    public function terima_sample()
    {
        $id_req = $this->input->post('id_req');
        $pernr_session = $this->session->userdata("pernr");
        $current_time = date('Y-m-d H:i:s'); // Waktu saat ini

        // Update tb_analisa
        $data = array(
            'admin_lab' => $pernr_session,
            'progress' => 'Administrasi Lab Analisa',
            'waktu_in_lab' =>  $current_time,
        );
        $this->db->where('id_req', $id_req);
        $this->db->update('tb_analisa_request_sap', $data);

        // Insert tracking data
        $tracking_data = array(
            array(
                'id_req' => $id_req,
                'waktu_tracking' => $current_time,
                'desc_tracking' => 'Sample telah diterima di Lab Analisa'
            ),
            array(
                'id_req' => $id_req,
                'waktu_tracking' => NULL,
                'desc_tracking' => 'Proses Administrasi di Lab Analisa'
            )
        );
        $this->db->insert_batch('tb_analisa_tracking', $tracking_data);

        echo json_encode(array('status' => 'success'));
    }

    public function multi_cetak_label()
    {
        $ids = $this->input->post('ids');

        if (empty($ids)) {
            echo "Tidak ada data yang diterima.";
            return;
        }

        // Store the IDs in the session
        $this->session->set_userdata('selected_ids', $ids);

        // Return a success message
        echo "Success";
    }
    public function multi_cetak_label_pdf()
    {
        // Retrieve the IDs from the session
        $ids = $this->session->userdata('selected_ids');

        if (empty($ids)) {
            echo "Data tidak ditemukan.";
            return;
        }

        // Mengambil data berdasarkan IDs
        $labels = $this->Analisa_request_model->get_labels_by_ids($ids);

        // Cek apakah data ditemukan
        if (empty($labels)) {
            echo "Data tidak ditemukan.";
            return;
        }

        // Membuat instance TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);

        // Set informasi dokumen
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Satu Lab');
        $pdf->SetTitle('Label Contoh Bahan Awal Untuk Diuji');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // Nonaktifkan header dan footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set margins to 0
        $pdf->SetMargins(0, 0, 0);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);

        // Set auto page breaks
        $pdf->SetAutoPageBreak(false, 0);

        // Definisikan ukuran label dan margin
        $labelWidth = 57; // mm
        $labelHeight = 35; // mm
        $baseurl = base_url('assets/images/');
        $jumlah_label = 1; // Jumlah label yang diinginkan
        $margin = 10; // Margin antara label (dalam mm)
        $topMargin = 2; // Margin atas (dalam mm)

        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Add a page
        $pdf->AddPage();

        // Menghitung jumlah kolom dan baris maksimal dalam satu halaman
        $pageWidth = $pdf->getPageWidth();
        $pageHeight = $pdf->getPageHeight();
        $maxCols = floor($pageWidth / ($labelWidth + $margin));
        $maxRows = floor(($pageHeight - $topMargin) / ($labelHeight + $margin)); // Mengurangi margin atas dari tinggi halaman

        // Loop untuk membuat beberapa label
        $col = 0;
        $row = 0;
        foreach ($labels as $data_model) {
            if (!isset($data_model->progress) || $data_model->progress !== 'Cetak Label') {
                continue; // Skip jika progress tidak sesuai
            }

            // Hitung posisi X dan Y
            $x = $col * ($labelWidth + $margin);
            $y = $topMargin + $row * ($labelHeight + $margin); // Menambahkan margin atas ke posisi Y

            // Set some content to print
            $html = '
            <table border="1" cellpadding="1" style="width: ' . $labelWidth . 'mm; height: ' . $labelHeight . 'mm;">
               <tbody>
                   <tr>
                       <td style="width: 70px; height: 25px; vertical-align: middle; text-align: left;">
                           <img src="' . $baseurl . 'logosm.png" width="70" height="25" />
                       </td>
                       <td rowspan="3" style="font-weight: bold; width: 40%; vertical-align: middle; text-align: center;font-size: 10px;">CONTOH<br>BAHAN AWAL<br>UNTUK DIUJI</td>
                       <td style="font-size: 5px; width: 30%; vertical-align: middle; text-align: left;"> No Label <br> LB-031000-00-01-002</td>
                   </tr>
                   <tr>
                       <td style="text-align: center;font-size: 6px;font-weight: bold;"> PENGAWASAN MUTU</td>
                       <td rowspan="2" style="font-size: 5px; width: 30%; vertical-align: middle; text-align: left;"> Tanggal Berlaku  <br> 01 September 2014</td>
                   </tr>
                   <tr>
                       <td style="text-align: center;font-size: 6px;font-weight: bold;">QC</td>
                   </tr>
                    <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> No Permintaan Uji</td>
                       <td style="font-size: 7px; vertical-align: middle;" colspan="2"> ' . $data_model->no_karantina . '</td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Nama Bahan</td>
                       <td style="font-size: 7px; vertical-align: middle;" colspan="2"> ' . $data_model->desc . '</td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Kode/Tipe</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"></td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Pemasok</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"></td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Tanggal Datang</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"></td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> No. Identitas</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"></td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Kadaluarsa</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"></td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> No. Wadah</td>
                       <td style="font-size: 7px; vertical-align: middle;"></td>
                       <td style="font-size: 7px; vertical-align: middle;"> dari</td>
                   </tr>
               </tbody>
            </table>';

            // Output the HTML content
            $pdf->writeHTMLCell($labelWidth, $labelHeight, $x, $y, $html, 0, 1, 0, true, 'L', true);

            // Pindah ke kolom berikutnya
            $col++;

            // Jika kolom melebihi batas, pindah ke baris berikutnya
            if ($col >= $maxCols) {
                $col = 0;
                $row++;
            }

            // Jika baris melebihi batas atau jumlah label melebihi 24, tambah halaman baru
            if ($row >= $maxRows) {
                $row = 0;
                $col = 0;
                $pdf->AddPage();
            }
        }

        // Close and output PDF document
        $pdf->Output('multi_label.pdf', 'I'); // 'I' untuk menampilkan di browser, 'D' untuk download, 'F' untuk menyimpan ke file

        // Update existing record with NULL waktu_tracking
        foreach ($ids as $id) {
            $this->db->where('id_req', $id);
            $this->db->where('waktu_tracking IS NULL', NULL, FALSE); // Filter untuk baris dengan waktu_tracking NULL
            $this->db->update('tb_analisa_tracking', array(
                'waktu_tracking' => date('Y-m-d H:i:s')
            ));
        }
    }


    private function get_unit_email($unit_name)
    {
        $email = $this->db->select('unit_email')
            ->from('tb_master_unit_company')
            ->where('unit_name', $unit_name)
            ->get()
            ->row()
            ->unit_email;

        if (!$email) {
            throw new Exception('Email unit ' . $unit_name . ' tidak ditemukan.');
        }

        return $email;
    }

    private function send_email($to, $message)
    {
        $this->email->from('alerts.smsuite@gmail.com', 'Satu Lab')
            ->to($to)
            ->subject('Pemberitahuan Pengiriman Sample')
            ->message($message);

        if (!$this->email->send()) {
            throw new Exception('Gagal mengirim email.');
        }
    }


    public function print_labels()
    {
        // Debug session data
        $print_data = $this->session->userdata('print_data');
        if (!$print_data) {
            echo "No data found in session.";
            return;
        }

        $id_req = $print_data['id_req'];
        $jumlah_sample = $print_data['jumlah_sample'];

        $this->load->model('Analisa_request_model');
        $data = $this->Analisa_request_model->get_labels_by_ids([$id_req]);

        if (empty($data)) {
            echo "Data tidak ditemukan.";
            return;
        }

        $label = $data[0];
        $material = $label->material;
        $desc = $label->desc;
        $batch = $label->batch;
        $manuf_date = date('d-m-Y', strtotime($label->manuf_date));
        $ed = date('d-m-Y', strtotime($label->ed));

        $quantity = $label->quantity;
        $uom = $label->uom;

        $nama_qc = $label->nama_qc_label;
        $baseurl = base_url('assets/images/');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Satu Lab');
        $pdf->SetTitle('Sample Karantina');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->SetMargins(0, 0, 0);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);
        $pdf->SetAutoPageBreak(false, 0);

        $labelWidth = 60;
        $labelHeight = 45;
        $margin = 4;
        $topMargin = 2;
        $jumlah_label = $jumlah_sample;

        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->AddPage();

        $pageWidth = $pdf->getPageWidth();
        $pageHeight = $pdf->getPageHeight();
        $maxCols = floor($pageWidth / ($labelWidth + $margin));
        $maxRows = floor(($pageHeight - $topMargin) / ($labelHeight + $margin));

        $col = 0;
        $row = 0;

        for ($i = 0; $i < $jumlah_label; $i++) {
            $x = $col * ($labelWidth + $margin);
            $y = $topMargin + $row * ($labelHeight + $margin);

            $html = '
            <table border="1" cellpadding="1" style="width: ' . $labelWidth . 'mm; height: ' . $labelHeight . 'mm;">
               <tbody>
                   <tr>
                       <td style="width: 70px; height: 25px; vertical-align: middle; text-align: left;">
                           <img src="' . $baseurl . 'logosm.png" width="70" height="25" />
                       </td>
                       <td rowspan="3" style="font-weight: bold; width: 40%; vertical-align: middle; text-align: center;font-size: 10px;"><br><br>SAMPEL<br>KARANTINA</td>
                       <td  rowspan="3" style="font-size: 4px; width: 30%; vertical-align: middle; text-align: left;"><br>
                       <br>No. Label : LB-031000-00-01-012<br>
                       <br>Revisi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 00 <br>
                       <br>Tgl. Berlaku : 01 Agustus 2024</td>
                   </tr>
                   <tr>
                       <td style="text-align: center;font-size: 6px;font-weight: bold;"> PENGAWASAN MUTU</td>
                     
                   </tr>
                   <tr>
                       <td style="text-align: center;font-size: 6px;font-weight: bold;">QC</td>
                   </tr>
                    <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Bahan / Produk</td>
                       <td style="font-size: 7px; vertical-align: middle;" colspan="2"> ' . $desc . '</td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> No. Identitas / Bets</td>
                       <td style="font-size: 7px; vertical-align: middle;" colspan="2"> ' . $batch . '</td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Tgl Datang/Produksi</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"> ' . $manuf_date . '</td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> ED</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"> ' . $ed . '</td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Jumlah</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"> ' . $quantity . ' ' . $uom . '</td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Jenis Karantina</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"> ' . $label->zmasalah . '</td>
                   </tr>
                   <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> No. Karantina</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"> ' . $label->no_karantina . '</td>
                   </tr>
                     <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Tanggal Kirim</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"> </td>
                   </tr>
                     <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Pengirim Sample</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;"> ' . $nama_qc . '</td>
                   </tr>
                    <tr>
                       <td style="font-size: 7px; vertical-align: middle;"> Analisa</td>
                       <td colspan="2" style="font-size: 7px; vertical-align: middle;">Mikro / Kimia / R&D Formulasi / R&D Kemasan </td>
                   </tr>
               </tbody>
            </table>';

            $pdf->writeHTMLCell($labelWidth, $labelHeight, $x, $y, $html, 0, 1, 0, true, 'L', true);

            $col++;

            if ($col >= $maxCols) {
                $col = 0;
                $row++;
            }

            if ($row >= $maxRows) {
                $row = 0;
                $col = 0;
                $pdf->AddPage();
            }
        }


        $pdf->Output('label.pdf', 'I'); // 'I' untuk menampilkan di browser

    }


    public function kirim_sample()
    {
        $id_req = $this->input->post('id_req');

        // Validasi input
        if (!$id_req) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']);
            return;
        }

        $this->db->trans_start(); // Mulai transaksi

        try {

            // Cek pada tabel tb_analisa_tracking
            $this->db->select('id_req');
            $this->db->from('tb_analisa_tracking');
            $this->db->where('id_req', $id_req);
            $this->db->where('desc_tracking', 'Proses mencetak label ke sample');
            $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
            $query_tracking = $this->db->get();

            if ($query_tracking->num_rows() > 0) {
                // Jika ada entri yang cocok
                echo json_encode([
                    'status' => 'label_not_printed'
                ]);
                return;
            }

            // Ambil oprshrttxt dan no_karantina
            $oprshrttxt = $this->db->select('oprshrttxt')
                ->from('tb_analisa_request_spec')
                ->where('id_req', $id_req)
                ->get()
                ->row()
                ->oprshrttxt;

            if (!$oprshrttxt) {
                throw new Exception('Data oprshrttxt tidak ditemukan.');
            }

            $no_karantina = $this->db->select('no_karantina')
                ->from('tb_analisa_request_sap')
                ->where('id_req', $id_req)
                ->get()
                ->row()
                ->no_karantina;

            if (!$no_karantina) {
                throw new Exception('Data no_karantina tidak ditemukan.');
            }

            // Hitung jumlah baris yang mengandung LAB berdasarkan id_req
            $lab_count = $this->db->where('id_req', $id_req)
                ->where('cat_oprshrttxt', 'LAB')
                ->from('tb_analisa_request_spec')
                ->count_all_results();


            $rnd_count = $this->db->where('id_req', $id_req)
                ->where('cat_oprshrttxt', 'RND')
                ->from('tb_analisa_request_spec')
                ->count_all_results();


            // Menyimpan data tracking dan update progress berdasarkan nilai lab_count
            $unit_email = '';
            $email_message = '';

            $datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
            // Get current timestamp
            $current_time = $datetime->format('Y-m-d H:i:s');
            if ($rnd_count > 0) {

                $tracking_data = array(
                    array(
                        'id_req' => $id_req,
                        'waktu_tracking' => date("Y-m-d H:i:s"),
                        'desc_tracking' => 'Pengiriman sample ke R&D',
                        'unit_progress' => 'R&D'
                    )

                );
                $this->Analisa_sample_model->send_data_to_api($id_req);
                $progresslab = 'Pengiriman Ke R&D';
                $progress = 'Pengiriman sample';
                // $unit_name = 'Research & Development';
                // $email_message = "Kepada Yth Unit Research & Development,<br><br>
                //     Mohon untuk melakukan preview dan konfirmasi serah terima sample pada permohonan dengan No Karantina $no_karantina pada sistem Satu Lab pada link berikut ini:
                //     <a href=\"" . base_url() . "\">Satu Lab</a><br><br>
                //     Terima Kasih,<br><br>
                //     Satu Lab";
                $this->db->set('progress', $progress);
                $this->db->set('progress_rnd', $progresslab);
                $this->db->set('waktu_out_qc', $current_time);
                $this->db->set('waktu_in_rnd', $current_time);
                $this->db->where('id_req', $id_req);
                $this->db->update('tb_analisa_request_sap');

                $this->db->insert_batch('tb_analisa_tracking', $tracking_data);
                // $unit_email = $this->get_unit_email($unit_name);
                // $this->send_email($unit_email, $email_message);

                $notification_data = array(
                    'pernr' => NULL, // Mengambil data 'pernr' dari array
                    'id_unit' => 45,
                    'template_id' => 5,
                    'feature' => 'Karantina',
                    'id_data_feature' => $id_req,
                    'status' => 'pending'
                );

                // Insert ke dalam tabel sys_notifications
                $this->db->insert('sys_notifications', $notification_data);

                $data = $this->Analisa_request_model->get_data_by_id_req($id_req);

                if ($data) {
                    // Ambil data spec yang terkait dengan id_req
                    $this->Analisa_request_model->get_data_spec($id_req);

                    // Menyusun response
                    // $response = [
                    //     'id_kar' => '6322234',
                    //     'id_req' => $data->id_req,
                    //     'month' => $data->month,
                    //     'years' => $data->years,
                    //     'plant' => $data->plant,
                    //     'sloc' => $data->sloc,
                    //     'sloc_desc' => $data->sloc_desc,
                    //     'zyear' => $data->zyear,
                    //     'jenis_material' => $data->jenis_material,
                    //     'material' => $data->material,
                    //     'zbentuk' => $data->zbentuk,
                    //     'desc' => $data->desc,
                    //     'batch' => $data->batch,
                    //     'no_karantina' => $data->no_karantina,
                    //     'batch_lapangan' => $data->batch_lapangan,
                    //     'manuf_date' => $data->manuf_date,
                    //     'ed' => $data->ed,
                    //     'uji_ulang' => $data->uji_ulang,
                    //     'tgl_karantina' => $data->tgl_karantina,
                    //     'zmasalah' => $data->zmasalah,
                    //     'desc_mslh' => $data->desc_mslh,
                    //     'nama_qc' => $data->nama_qc,
                    //     'nama_ka' => $data->nama_ka,
                    //     'nama_koor' => $data->nama_koor,
                    //     'dqc' => (bool) $data->dqc,
                    //     'dlab' => (bool) $data->dlab,
                    //     'drnd' => (bool) $data->drnd,
                    //     'zind' => (bool) $data->zind,
                    //     'status_kar' => $data->status_kar,
                    //     'progress' => $data->progress,
                    //     'insplot' => (int) $data->insplot,
                    //     'order' => $data->order,
                    //     'matdoc' => $data->matdoc,
                    //     'matyears' => (int) $data->matyears,
                    //     'ztransaksi' => $data->ztransaksi,
                    //     'quantity' => (float) $data->quantity,
                    //     'uom' => $data->uom,
                    //     'reff' => $data->reff,
                    //     "sloc_desc" => $data->sloc_desc,
                    //     "zbentuk" => $data->zbentuk,
                    //     "waktu_pengerjaan_qc" => $data->waktu_pengerjaan_qc,
                    //     "satuan_waktu" => $data->satuan_waktu,
                    //     "waktu_pengerjaan_lab" => $data->waktu_pengerjaan_lab,
                    //     "waktu_pengerjaan_rnd" => $data->waktu_pengerjaan_rnd,
                    //     "total_waktu_pengerjaan" => $data->total_waktu_pengerjaan,
                    //     "waktu_in_qc" => $data->waktu_in_qc,
                    //     "waktu_out_qc" => $data->waktu_out_qc,
                    //     "waktu_in_lab" => $data->waktu_in_lab,
                    //     "waktu_out_lab" => $data->waktu_out_lab,
                    //     "waktu_in_rnd" => $data->waktu_in_rnd,
                    //     "waktu_out_rnd" => $data->waktu_out_rnd,
                    //     "keputusan_rnd" =>  "",
                    //     'spec' => $spec_data // Menambahkan spec data
                    // ];
                    // $json_data = json_encode($response, JSON_PRETTY_PRINT);

                    // // Dapatkan datetime saat ini sebagai nama file
                    // $date_time = date('Y-m-d_H-i-s');
                    // $file_name = "data_$date_time.json";
                    // // Tentukan path lengkap file, sesuaikan dengan folder yang diinginkan
                    // $file_path = FCPATH . "upload_json_rnd/" . $file_name; // Pastikan `folder_upload_hasil_analisa` sesuai dengan nama folder yang ada di server

                    // // Tulis data JSON ke file lokal
                    // file_put_contents($file_path, $json_data);

                    // // Konversi response menjadi JSON
                    // $json_data = json_encode($response);

                    // // URL tujuan untuk mengirim data
                    // $url = "http://192.168.220.2/js/api/v1/qckarantina";

                    // // Inisialisasi cURL
                    // $ch = curl_init($url);

                    // // Konfigurasi cURL untuk POST JSON
                    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    // curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    //     'Content-Type: application/json',
                    //     'Content-Length: ' . strlen($json_data)
                    // ));

                    // // Eksekusi cURL dan simpan respons
                    // $result = curl_exec($ch);

                    // // Menutup cURL
                    // curl_close($ch);

                    // // Menampilkan hasil respons untuk debugging
                    // echo $result;
                } else {
                    // Jika tidak ada data ditemukan, kembalikan pesan error
                    echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
                }
            }

            if ($lab_count > 0) {
                $tracking_data = [
                    'id_req' => $id_req,
                    'waktu_tracking' => date("Y-m-d H:i:s"),
                    'desc_tracking' => 'Pengiriman sample ke lab analisa'
                ];
                $this->db->insert('tb_analisa_tracking', $tracking_data);
                $progress = 'Pengiriman Ke Lab';
                $unit_name = 'Lab Analisa';
                $email_message = "Kepada Yth Unit Lab Analisa,<br><br>
                    Mohon untuk melakukan preview dan konfirmasi serah terima sample pada permohonan dengan No Karantina $no_karantina pada sistem Satu Lab pada link berikut ini:
                    <a href=\"" . base_url() . "\">Satu Lab</a><br><br>
                    Terima Kasih,<br><br>
                    Satu Lab";

                $this->db->set('progress', $progress);
                $this->db->set('waktu_out_qc', $current_time);

                $this->db->where('id_req', $id_req);
                $this->db->update('tb_analisa_request_sap');

                // $unit_email = $this->get_unit_email($unit_name);
                // $this->send_email($unit_email, $email_message);

                $notification_data = array(
                    'pernr' => NULL, // Mengambil data 'pernr' dari array
                    'id_unit' => 25,
                    'template_id' => 6,
                    'feature' => 'Karantina',
                    'id_data_feature' => $id_req,
                    'status' => 'pending'
                );

                // Insert ke dalam tabel sys_notifications
                $this->db->insert('sys_notifications', $notification_data);
            }


            // Selesaikan transaksi
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Transaksi gagal.');
            }

            echo json_encode(['status' => TRUE]);
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $this->db->trans_rollback();
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function insert_jumlah_sample()
    {
        $id_req = $this->input->post('id_req');
        $jumlah_sample = (int)$this->input->post('jumlah_sample_lab');
        $jumlah_sample_rnd = (int)$this->input->post('jumlah_sample_rnd');
        $this->session->set_userdata('print_data', [
            'id_req' => $id_req,
            'jumlah_sample' => $jumlah_sample + $jumlah_sample_rnd
        ]);
        // Validasi input
        if (!$id_req) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']);
            return;
        }

        $this->db->trans_start(); // Mulai transaksi

        try {
            // Update jumlah sample di tb_analisa_request_sap
            $this->db->set('jumlah_sample', $jumlah_sample)
                ->set('jumlah_sample_rnd', $jumlah_sample_rnd)
                ->where('id_req', $id_req)
                ->update('tb_analisa_request_sap');

            // Update waktu_tracking pada record yang memiliki nilai NULL
            $this->db->set('waktu_tracking', date('Y-m-d H:i:s'))
                ->where('id_req', $id_req)
                ->where('waktu_tracking IS NULL', NULL, FALSE)
                ->update('tb_analisa_tracking');

            // Clone rows in tb_analisa_request_spec and update sample_ke
            $this->cloneRowsAndUpdateSampleKe($id_req, $jumlah_sample);

            // Hitung jumlah baris yang mengandung LAB berdasarkan id_req
            $lab_count = $this->db->where('id_req', $id_req)
                ->where('cat_oprshrttxt LIKE', '%LAB%')
                ->from('tb_analisa_request_spec')
                ->count_all_results();

            // Menyimpan data tracking dan update progress berdasarkan nilai lab_count
            if ($lab_count > 1) {
                $this->db->where('id_req', $id_req);
                $this->db->where('waktu_tracking IS NULL', NULL, FALSE); // Filter untuk baris dengan waktu_tracking NULL
                $this->db->update('tb_analisa_tracking', array(
                    'waktu_tracking' => date('Y-m-d H:i:s')
                ));
            } elseif ($lab_count == 0) {
                $this->db->where('id_req', $id_req);
                $this->db->where('waktu_tracking IS NULL', NULL, FALSE); // Filter untuk baris dengan waktu_tracking NULL
                $this->db->update('tb_analisa_tracking', array(
                    'waktu_tracking' => date('Y-m-d H:i:s')
                ));
            } else {
                throw new Exception('Kategori oprshrttxt tidak valid.');
            }

            // Selesaikan transaksi
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                throw new Exception('Transaksi gagal.');
            }

            // Set session data untuk mencetak label
            $this->session->set_userdata('print_data', [
                'id_req' => $id_req,
                'jumlah_sample' => $jumlah_sample + $jumlah_sample_rnd
            ]);

            echo json_encode(['status' => TRUE]);
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            $this->db->trans_rollback();
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    private function cloneRowsAndUpdateSampleKe($id_req, $jumlah_sample)
    {
        // Get the rows to be cloned
        $this->db->where('id_req', $id_req);
        $this->db->where('cat_oprshrttxt', 'LAB');
        $query = $this->db->get('tb_analisa_request_spec');
        $rows = $query->result_array();

        // Find the maximum sample_ke value
        $this->db->select_max('sample_ke');
        $this->db->where('id_req', $id_req);
        $this->db->where('cat_oprshrttxt', 'LAB');
        $max_sample_ke = $this->db->get('tb_analisa_request_spec')->row()->sample_ke;

        if ($max_sample_ke === NULL) {
            $max_sample_ke = 0;
        }

        // Handle the case when the new jumlah_sample is less than the existing rows
        if ($jumlah_sample < $max_sample_ke) {
            // Delete rows with sample_ke greater than the new jumlah_sample, except those with sample_ke = 1
            $this->db->where('id_req', $id_req);
            $this->db->where('cat_oprshrttxt', 'LAB');
            $this->db->where('sample_ke >', $jumlah_sample);
            $this->db->where('sample_ke !=', 1);
            $this->db->delete('tb_analisa_request_spec');
        }

        // Clone rows if necessary
        if ($jumlah_sample > $max_sample_ke) {
            // Clone rows for new samples
            for ($i = $max_sample_ke + 1; $i <= $jumlah_sample; $i++) {
                foreach ($rows as $row) {
                    unset($row['id']); // Remove the auto-increment field

                    // Update the sample_ke value for the cloned row
                    $row['sample_ke'] = $i;

                    // Insert the cloned row into the database
                    $this->db->insert('tb_analisa_request_spec', $row);
                }
            }
        }

        // Set the sample_ke of the original row to 1 if it is NULL
        foreach ($rows as $row) {
            if ($row['sample_ke'] === NULL || $row['sample_ke'] === 0) {
                $this->db->where('id_req', $row['id']);
                $this->db->update('tb_analisa_request_spec', ['sample_ke' => 1]);
                break; // Stop after updating the first matching row
            }
        }
    }





    public function generateLabel()
    {
        $this->load->library('tcpdf/Tcpdf');

        // create new PDF document
        // Buat objek TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'F4', true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Label');
        $baseurl = base_url('assets/images/');
        // Matikan header dan footer
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        // Set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Set margins
        $pdf->SetMargins(0, 0, 0); // Margin kiri, atas, dan kanan 0 mm
        $pdf->SetHeaderMargin(0); // Header margin 0 mm
        $pdf->SetFooterMargin(0); // Footer margin 0 mm

        // Set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 0); // Tidak ada margin bawah

        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Set font
        $pdf->SetFont('helvetica', '', 8);

        // Add a page
        $pdf->AddPage();

        // Mengatur ukuran label
        $labelWidth = 20; // lebar label dalam mm
        $labelHeight = 40; // tinggi label dalam mm
        $horizontalMargin = 1; // jarak horizontal antar label dalam mm
        $verticalMargin = 1; // jarak vertikal antar label dalam mm

        // Menentukan jumlah label per baris dan kolom
        $labelsPerRow = floor((210 - 0) / ($labelWidth + $horizontalMargin)); // Jumlah label per baris sesuai lebar halaman
        $labelsPerColumn = floor((330 - 0) / ($labelHeight + $verticalMargin)); // Jumlah label per kolom sesuai tinggi halaman

        // Posisi awal label
        $startX = 0; // Posisi X awal di kiri halaman
        $startY = 0; // Posisi Y awal di atas halaman

        for ($row = 0; $row < $labelsPerColumn; $row++) {
            for ($col = 0; $col < $labelsPerRow; $col++) {
                // Tentukan posisi label
                $x = $startX + ($col * ($labelWidth + $horizontalMargin));
                $y = $startY + ($row * ($labelHeight + $verticalMargin));

                // Set posisi label
                $pdf->SetXY($x, $y);

                // Siapkan HTML untuk label
                $html = '
        <table border="1" cellpadding="1" style="width: ' . $labelWidth . 'mm; height: ' . $labelHeight . 'mm;">
           <tbody>
               <tr>
                   <td style="width: 75px; height: 25px; vertical-align: middle; text-align: left;">
                       <img src="' . $baseurl . 'logosm.png" width="75" height="25" />
                   </td>
                   <td rowspan="3" style="font-weight: bold; width: 40%; vertical-align: middle; text-align: center; font-size: 10px;">CONTOH<br>BAHAN AWAL<br>UNTUK DIUJI</td>
                   <td style="font-size: 6px; width: 30%; vertical-align: middle; text-align: left;">No Label <br>LB-031000-00-01-002</td>
               </tr>
               <tr>
                   <td style="text-align: center; font-size: 6px; font-weight: bold;">PENGAWASAN MUTU</td>
                   <td rowspan="2" style="font-size: 6px; width: 30%; vertical-align: middle; text-align: left;">Tanggal Berlaku <br>01 September 2014</td>
               </tr>
               <tr>
                   <td style="text-align: center; font-size: 6px; font-weight: bold;">QC</td>
               </tr>
               <tr>
                   <td style="font-size: 8px; vertical-align: middle;">Nama Bahan</td>
                   <td style="font-size: 8px; vertical-align: middle;" colspan="2">Sample Material</td>
               </tr>
               <tr>
                   <td style="font-size: 8px; vertical-align: middle;">Kode/Tipe</td>
                   <td colspan="2" style="font-size: 8px; vertical-align: middle;"></td>
               </tr>
               <tr>
                   <td style="font-size: 8px; vertical-align: middle;">Pemasok</td>
                   <td colspan="2" style="font-size: 8px; vertical-align: middle;"></td>
               </tr>
               <tr>
                   <td style="font-size: 8px; vertical-align: middle;">Tanggal Datang</td>
                   <td colspan="2" style="font-size: 8px; vertical-align: middle;"></td>
               </tr>
               <tr>
                   <td style="font-size: 8px; vertical-align: middle;">No. Identitas</td>
                   <td colspan="2" style="font-size: 8px; vertical-align: middle;"></td>
               </tr>
               <tr>
                   <td style="font-size: 8px; vertical-align: middle;">Kadaluarsa</td>
                   <td colspan="2" style="font-size: 8px; vertical-align: middle;"></td>
               </tr>
               <tr>
                   <td style="font-size: 8px; vertical-align: middle;">No. Wadah</td>
                   <td style="font-size: 8px; vertical-align: middle;"></td>
                   <td style="font-size: 8px; vertical-align: middle;">dari</td>
               </tr>
           </tbody>
        </table>';

                // Output the HTML content
                $pdf->writeHTML($html, true, false, true, false, '');
            }

            // Tambah halaman jika masih ada label yang tersisa
            if ($row < $labelsPerColumn - 1 || $col < $labelsPerRow - 1) {
                $pdf->AddPage();
            }
        }

        // Menutup dan output dokumen PDF
        $pdf->Output('Label_Karantina.pdf', 'I');
    }
    public function save_api()
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_time = date("Y-m-d H:i:s");

        // Membuat token bearer
        $token = bin2hex(random_bytes(32)); // Menghasilkan string acak 64 karakter (32 byte)

        $data = array(
            'name_api' => $this->input->post('name_api'),
            'token' => $token,
            'tipe_status' => $this->input->post('tipe_status'),
            'create_at' => $current_time,
            'expiry_date' => $this->input->post('expiry_date'),
        );

        $this->Master_api_model->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function update_api()
    {
        $data = array(

            'name_api' => $this->input->post('name_api'),
            'token' => $this->input->post('token'),
            'tipe_status' => $this->input->post('tipe_status'),

            'expiry_date' => $this->input->post('expiry_date'),
        );

        $this->Master_api_model->update(array('id_api' => $this->input->post('id_api')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_api($id_api)
    {
        $this->Master_api_model->delete($id_api);
        echo json_encode(array("status" => TRUE));
    }


    public function get_data($id_api)
    {
        $data = $this->Master_api_model->get_data($id_api);

        echo json_encode($data);
    }
    public function get_data_spec()
    {
        $id_req = $this->input->post('id_req');
        $result = $this->Analisa_request_model->check_rnd_lab($id_req);

        echo json_encode([
            'status' => 'success',
            'indicator_lab' => $result['lab'],
            'indicator_rnd' => $result['rnd']
        ]);
    }


    public function cetak_label($id_req)
    {
        // Ambil data dari tabel tb_analisa_request_spec berdasarkan id_req
        // Retrieve the email address for 'nama_ka'
        $this->db->select('no_karantina');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();
        $user = $query->row();


        $this->db->select('cat_oprshrttxt, short_text');
        $this->db->from('tb_analisa_request_spec');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();
        $specs = $query->result_array();

        // Mengumpulkan email unit dan parameter yang relevan
        $email_targets = [];
        $oprshrttxt_to_unit_name = [
            'LAB' => 'Lab Analisa',
            'RND' => 'Research & Development'
        ];

        foreach ($specs as $spec) {
            if (isset($oprshrttxt_to_unit_name[$spec['cat_oprshrttxt']])) {
                $unit_name = $oprshrttxt_to_unit_name[$spec['cat_oprshrttxt']];

                // Cari email unit berdasarkan nama unit
                if (!isset($email_targets[$unit_name])) {
                    $this->db->select('unit_email');
                    $this->db->from('tb_master_unit_company');
                    $this->db->where('unit_name', $unit_name);
                    $query = $this->db->get();
                    $unit = $query->row();

                    if ($unit && $unit->unit_email) {
                        $email_targets[$unit_name] = [
                            'email' => $unit->unit_email,
                            'parameters' => []
                        ];
                    }
                }

                // Tambahkan parameter ke unit yang relevan
                if (isset($email_targets[$unit_name])) {
                    $email_targets[$unit_name]['parameters'][] = $spec['short_text'];
                }
            }
        }

        // Mengirim email ke setiap unit dengan semua parameter yang relevan
        foreach ($email_targets as $unit_name => $target) {
            $message = "Kepada Yth Unit $unit_name ,<br><br>";
            $message .= "Terdapat permohonan dengan No Karantina $user->no_karantina yang telah memasuki fase analisa.<br>";
            $message .= "Parameter:<br>";

            foreach ($target['parameters'] as $parameter) {
                $message .= "- " . $parameter . "<br>";
            }

            $message .= "<br>Terima Kasih,<br><br>Satu Lab";

            // Set email format to HTML
            $this->email->from('alerts.smsuite@gmail.com', 'Satu Lab');
            $this->email->to($target['email']);
            $this->email->subject('Permintaan Analisa Bahan Karantina');
            $this->email->set_mailtype("html");
            $this->email->message($message);

            if (!$this->email->send()) {
                log_message('error', 'Gagal mengirim email ke ' . $target['email']);
            }
        }
    }
}
