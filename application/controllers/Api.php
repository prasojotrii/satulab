<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('Master_api_model');
        $this->load->model('Master_api_request_model');
        $this->load->model('Analisa_request_model');
        $this->load->model('Analisa_sample_model');
        $this->load->model('Analisa_sample_rnd_model');
        $this->load->model('Notification_model');
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
    public function insert_data_karantina()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // Validasi null untuk identitas_data
        $required_fields = array(
            'month', 'years', 'plant', 'sloc', 'sloc_desc', 'zyear', 'material', 'desc',
            'batch', 'no_karantina', 'batch_lapangan', 'manuf_date', 'ed', 'uji_ulang',
            'tgl_karantina', 'zmasalah', 'desc_mslh', 'nama_qc', 'nama_koor', 'nama_ka', 'dqc',
            'dlab', 'drnd', 'zind', 'status_kar', 'insplot', 'order', 'matdoc', 'matyears',
            'ztransaksi', 'quantity', 'uom', 'reff'
        );

        foreach ($required_fields as $field) {
            if (!isset($data[$field]) || $data[$field] === null) {
                $this->output
                    ->set_status_header(400) // Bad Request
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => 'error', 'message' => "Field $field is required and cannot be null")));
                return;
            }
        }

        // Menghapus 0 di depan untuk material
        if (isset($data['material'])) {
            $data['material'] = ltrim($data['material'], '0');
        }

        // Ambil nomor urut terakhir untuk kombinasi sloc, month, dan year
        $this->db->select_max('no_karantina');
        $this->db->where('sloc', $data['sloc']);
        $this->db->where('month', $data['month']);
        $this->db->where('years', $data['years']);
        $result = $this->db->get('tb_analisa_request_sap')->row_array();

        // Memastikan $result tidak null sebelum mengakses
        if ($result && isset($result['no_karantina'])) {
            $last_no_karantina = explode('/', $result['no_karantina'])[1];
            $new_no_karantina = intval($last_no_karantina) + 1;
        } else {
            $new_no_karantina = 1;
        }

        $data['no_karantina'] = $data['sloc_desc'] . '/' . str_pad($new_no_karantina, 4, '0', STR_PAD_LEFT) . '/' . $data['month'] . '/' . $data['years'];

        $identitas_data = array(
            'id_kar' => $data['id_kar'],
            'month' => $data['month'],
            'years' => $data['years'],
            'id_req' => $data['id_req'],
            'plant' => $data['plant'],
            'sloc' => $data['sloc'],
            'sloc_desc' => $data['sloc_desc'],
            'zyear' => $data['zyear'],
            'material' => $data['material'],
            'zbentuk' => $data['zbentuk'],
            'desc' => $data['desc'],
            'batch' => $data['batch'],
            'no_karantina' => $data['no_karantina'],
            'batch_lapangan' => $data['batch_lapangan'],
            'manuf_date' => $data['manuf_date'],
            'jenis_req' => 'Karantina',
            'progress' => 'Approval Ka Unit',
            'ed' => $data['ed'],
            'uji_ulang' => $data['uji_ulang'],
            'tgl_karantina' => $data['tgl_karantina'],
            'zmasalah' => $data['zmasalah'],
            'desc_mslh' => $data['desc_mslh'],
            'nama_qc' => $data['nama_qc'],
            'nama_koor' => $data['nama_koor'],
            'nama_ka' => $data['nama_ka'],
            'dqc' => $data['dqc'],
            'dlab' => $data['dlab'],
            'drnd' => $data['drnd'],
            'zind' => $data['zind'],
            'status_kar' => $data['status_kar'],
            'insplot' => $data['insplot'],
            'order' => $data['order'],
            'matdoc' => $data['matdoc'],
            'matyears' => $data['matyears'],
            'ztransaksi' => $data['ztransaksi'],
            'quantity' => $data['quantity'],
            'uom' => $data['uom'],
            'reff' => $data['reff'],
            'waktu_pengerjaan_qc' => $data['waktu_pengerjaan_qc'],
            'waktu_pengerjaan_lab' => $data['waktu_pengerjaan_lab'],
            'waktu_pengerjaan_rnd' => $data['waktu_pengerjaan_rnd'],
            'total_waktu_pengerjaan' => (intval($data['waktu_pengerjaan_qc'] ?? 0)) +
                (intval($data['waktu_pengerjaan_lab'] ?? 0)) +
                (intval($data['waktu_pengerjaan_rnd'] ?? 0)),

            'satuan_waktu' => $data['satuan_waktu'],
            'waktu_in_lab' => NULL,
            'waktu_out_lab' => NULL,
            'waktu_in_rnd' => NULL,
            'waktu_out_rnd' => NULL,
            'nama_koordinator' => $data['nama_koordinator'],
            'email_koordinator' => $data['email_koordinator'],
            'qndat' => $data['qndat'],
        );

        $this->db->trans_start();

        // Insert data ke tabel identitas
        if (!$this->Analisa_request_model->insert_identitas($identitas_data)) {
            $this->output
                ->set_status_header(500) // Internal Server Error
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'error', 'message' => 'Failed to insert identitas data')));
            return;
        }

        // Ambil id_kar dan id_req
        $id_kar = $data['id_kar'];
        $id_req = $data['id_req'];
        $pernr_ka = $data['nama_ka'];

        // Memastikan ada spesifikasi
        if (isset($data['spec']) && is_array($data['spec'])) {
            $spec_data = array();
            foreach ($data['spec'] as $spec) {
                // Validasi null untuk spec_data
                $spec_required_fields = array('mstrchar', 'short_text', 'oprshrttxt', 'spec', 'zresult', 'manual_add');
                foreach ($spec_required_fields as $field) {
                    if (!isset($spec[$field]) || $spec[$field] === null) {
                        $this->output
                            ->set_status_header(400) // Bad Request
                            ->set_content_type('application/json')
                            ->set_output(json_encode(array('status' => 'error', 'message' => "Field $field in spec is required and cannot be null")));
                        return;
                    }
                }

                $cat_oprshrttxt = '';
                $sample_ke = '';
                $oprshrttxt = $spec['oprshrttxt'];
                $valid = '';
                // Cek kategori operasional
                $cat_oprshrttxt = '';
                $sample_ke = '';
                $oprshrttxt = $spec['oprshrttxt'];
                $valid = '';

                // Cek kategori operasional
                if (stripos($oprshrttxt, 'Lab Formulasi') !== false) {
                    $cat_oprshrttxt = 'RND';
                    $sample_ke = '1';
                    $valid = '';
                    $this->db->where('id_req', $id_req);
                    $this->db->update('tb_analisa_request_sap', array('jumlah_sample_rnd' => 1));
                } elseif (
                    stripos($oprshrttxt, 'Lab Mikro') !== false ||
                    stripos($oprshrttxt, 'Lab Lingkungan') !== false ||
                    stripos($oprshrttxt, 'Lab Kimia') !== false ||
                    stripos($oprshrttxt, 'Lab Analisa') !== false ||
                    stripos($oprshrttxt, 'Lab Analisa Mikro') !== false
                ) {
                    $cat_oprshrttxt = 'LAB';
                    $sample_ke = '1';
                    $valid = '';
                    $this->db->where('id_req', $id_req);
                    $this->db->update('tb_analisa_request_sap', array('jumlah_sample' => 1));
                } elseif (
                    stripos($oprshrttxt, 'QC') !== false ||
                    stripos($oprshrttxt, 'QC Gudang Kemasan') !== false
                ) {
                    $cat_oprshrttxt = 'QC';
                    $sample_ke = '0';

                    // Logika untuk menentukan nilai $valid berdasarkan $spec['zresult']
                    if (isset($spec['zresult'])) {
                        if ($spec['zresult'] == 10) {
                            $valid = 'A';
                        } elseif ($spec['zresult'] == 20) {
                            $valid = 'R';
                        } else {
                            $valid = 'R'; // Default jika nilai $spec['zresult'] tidak 10 atau 20
                        }
                    }
                }


                $spec_data[] = array(
                    'id_kar' => $id_kar,
                    'id_req' => $id_req,
                    'mstrchar' => $spec['mstrchar'],
                    'short_text' => $spec['short_text'],
                    'oprshrttxt' => $oprshrttxt,
                    'cat_oprshrttxt' => $cat_oprshrttxt,
                    'sample_ke' =>  $sample_ke,
                    'spec' => $spec['spec'],
                    'result' => $spec['zresult'],
                    'manual_add' => $spec['manual_add'],
                    'valid' => $valid
                );
            }

            $this->Analisa_request_model->insert_spec($spec_data);
        }

        // Insert approvals data
        $approvals = array(
            array('id_req' => $id_req, 'pernr' => $data['nama_ka'], 'fitur' => 'Analisa'),
            array('id_req' => $id_req, 'pernr' => $data['nama_koor'], 'fitur' => 'Analisa'),
        );

        foreach ($approvals as $approval) {
            $this->db->insert('tb_request_approval', $approval);
        }

        // Insert tracking data
        $current_time = date('Y-m-d H:i:s');
        $tracking_data = array(
            array(
                'id_req' => $id_req,
                'waktu_tracking' => $current_time,
                'desc_tracking' => 'Permintaan Analisa dibuat'
            ),
            array(
                'id_req' => $id_req,
                'waktu_tracking' => NULL,
                'desc_tracking' => 'Proses Approval Ka Unit'
            )
        );

        foreach ($tracking_data as $tracking) {
            $this->db->insert('tb_analisa_tracking', $tracking);
        }

        // Lakukan insert data ke tabel sys_notifications
        $notification_data = array(
            'pernr' => $pernr_ka,
            'template_id' => 4,
            'feature' => 'Karantina',
            'id_data_feature' => $id_req,
            'status' => 'pending'
        );

        // Insert ke dalam tabel sys_notifications
        $this->db->insert('sys_notifications', $notification_data);


        $this->db->trans_complete();

        // Cek hasil insert
        if ($this->db->trans_status() === FALSE) {
            $this->output
                ->set_status_header(500) // Internal Server Error
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'error', 'message' => 'Failed to insert data into sys_notifications')));
        } else {

            $this->db->where('id_req', $id_req);
            $this->db->group_start()
                ->where('drnd', 1)
                ->group_end();
            $query = $this->db->get('tb_analisa_request_sap');

            if ($query->num_rows() > 0) {
                $tracking_data = array(
                    'id_req' => $id_req,
                    'waktu_tracking' => $current_time,
                    'desc_tracking' => 'Pengiriman data awal ke system RND',
                    'unit_progress' => 'R&D'
                );
                $this->db->insert('tb_analisa_tracking', $tracking_data);

                $response = $this->send_to_api_rnd($data);

                if ($response) {
                    // respon dari system rnd


                    // echo $response;

                    $this->output
                        ->set_status_header(200) // OK
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array('status' => 'Success', 'message' => 'Data inserted satulab')));
                }
            } else {

                $this->output
                    ->set_status_header(200) // OK
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => 'Success', 'message' => 'Data inserted satulab')));
            }
        }
    }
    public function send_to_api_rnd($data)
    {
        $url = "http://192.168.220.2/js/api/v1/qckarantina";
        // Inisialisasi cURL
        $ch = curl_init();

        // Setel opsi cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Kirim data dalam format JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($data))
        ));

        // Eksekusi cURL dan ambil respon dari API
        $response = curl_exec($ch);

        // Periksa jika ada error cURL
        if (curl_errno($ch)) {
            return 'Error: ' . curl_error($ch);
        }

        // Tutup koneksi cURL
        curl_close($ch);

        // Mengembalikan respon dari API
        return $response;
    }

    public function delete_data_karantina()
    {
        // Mendapatkan id_kar dari parameter URL
        $id_kar = $this->input->get('id_kar');

        // Memeriksa apakah id_kar valid
        if (!$id_kar) {
            $this->output
                ->set_status_header(400) // Bad Request
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'error', 'message' => 'id_kar is required')));
            return;
        }

        // Menghapus data dari tabel dummy_identitas
        $this->db->where('id_kar', $id_kar);
        $this->db->delete('dummy_identitas');

        // Memeriksa apakah data berhasil dihapus dari dummy_identitas
        if ($this->db->affected_rows() == 0) {
            $this->output
                ->set_status_header(404) // Not Found
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'error', 'message' => 'No data found or failed to delete from dummy_identitas')));
            return;
        }

        // Menghapus data dari tabel dummy_spec
        $this->db->where('id_kar', $id_kar);
        $this->db->delete('dummy_spec');

        // Memeriksa apakah data berhasil dihapus dari dummy_spec
        if ($this->db->affected_rows() == 0) {
            $this->output
                ->set_status_header(404) // Not Found
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'error', 'message' => 'No data found or failed to delete from dummy_spec')));
            return;
        }

        // Mengembalikan respons sukses
        $this->output
            ->set_status_header(200) // OK
            ->set_content_type('application/json')
            ->set_output(json_encode(array('status' => 'success', 'message' => 'Data successfully deleted')));
    }


    public function get_all_identitas()
    {
        $data = $this->Analisa_request_model->get_all_identitas();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function get_spec_by_id_kar()
    {
        $id_kar = $this->input->get('id_kar');
        $data = $this->Analisa_request_model->get_spec_by_id_kar($id_kar);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function show_identitas_view()
    {
        // Memuat view dan mengirimkan data
        $this->load->view('api/identitas_view');
    }
    public function index()
    {
        // Mendapatkan token dari header HTTP
        // $token = $this->input->get_request_header('Authorization');

        // // Melakukan pengecekan token
        // if (!$this->Master_api_model->check_token($token)) {
        //     // Jika token tidak valid, kirim respon error
        //     $this->output->set_status_header(401);
        //     echo json_encode(array('message' => 'Unauthorized'));
        //     return;
        // }

        // Token valid, dapatkan data dari tb_karantina_request
        $data = $this->Master_api_request_model->get_all();
        echo json_encode($data);
    }

    public function view($id)
    {

        $data = $this->Master_api_request_model->get_by_id($id);
        echo json_encode($data);
    }

    public function add()
    {
        // Mendapatkan data JSON dari body request
        $json = file_get_contents('php://input');

        // Mendekode JSON menjadi array associative
        $data = json_decode($json, true);

        // Menambahkan data menggunakan model
        $result = $this->Master_api_request_model->add($data);

        // Mengembalikan respons dalam format JSON
        echo json_encode(['success' => $result]);
    }
    public function update_data_pengerjaan_rnd()
    {
        // Set header agar API hanya menerima request POST dengan Content-Type JSON
        header('Content-Type: application/json');

        // Mendapatkan input JSON
        $json_input = file_get_contents('php://input');

        // Mengonversi JSON menjadi array PHP
        $input_data = json_decode($json_input, true);

        // Validasi input JSON
        if (!isset($input_data['id_req']) || !isset($input_data['waktu_pengerjaan_rnd'])) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data yang dikirim tidak valid. Harap sertakan id_req dan waktu_pengerjaan_rnd.'
            ]);
            return;
        }

        // Assign data input ke variabel
        $id_req = $input_data['id_req'];
        $waktu_pengerjaan_rnd = $input_data['waktu_pengerjaan_rnd'];

        // Load model untuk update data
        $this->load->model('Analisa_request_model');

        // Periksa apakah data dengan id_req ada di database
        $data_exists = $this->Analisa_request_model->check_exists($id_req);

        if (!$data_exists) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data dengan id_req yang diberikan tidak ditemukan.'
            ]);
            return;
        }

        // Update data di database
        $update_data = [
            'waktu_pengerjaan_rnd' => $waktu_pengerjaan_rnd
        ];

        $update_result = $this->Analisa_request_model->update_data($id_req, $update_data);

        // Cek hasil update
        if ($update_result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat memperbarui data.'
            ]);
        }
    }


    public function update($id)
    {
        $json = file_get_contents('php://input');

        // Mendekode JSON menjadi array associative
        $data = json_decode($json, true);

        // Menambahkan data menggunakan model
        $result = $this->Master_api_request_model->update($id, $data);
        echo json_encode(['success' => $result]);
    }

    public function delete($id)
    {
        $result = $this->Master_api_request_model->delete($id);
        echo json_encode(['success' => $result]);
    }
    public function user()
    {
        $data['id_user'] = $this->User_model->Membuat_Kode_Otomatis();
        $data['dataSession'] = $this->User_model->getDataUsername();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['dataAkses'] = $this->User_model->getDataAkses();
        $data['id_halaman']      = $this->uri->segment(2);
        $data['title'] = 'Daftar User';
        $this->load->view('Template/header', $data);
        $this->load->view('master/user', $data);
    }


    public function insert_data_stabilitas()
    {
        // Mendapatkan data dari request POST sebagai JSON
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        // Validasi input (opsional)
        // if (empty($data['id_kar']) || empty($data['id_req']) || empty($data['month']) || empty($data['years']) || empty($data['plant']) || empty($data['sloc']) || empty($data['sloc_desc']) || empty($data['zyear']) || empty($data['jenis_material']) || empty($data['material']) || empty($data['zbentuk']) || empty($data['desc']) || empty($data['batch']) || empty($data['manuf_date']) || empty($data['ed']) || empty($data['uji_ulang']) || empty($data['tgl_karantina']) || empty($data['zmasalah']) || empty($data['nama_qc']) || empty($data['nama_ka']) || empty($data['nama_koor']) || !isset($data['dqc']) || !isset($data['dlab']) || !isset($data['drnd']) || !isset($data['zind']) || empty($data['status_kar']) || empty($data['quantity']) || empty($data['uom'])) {
        //     $response = array('status' => FALSE, 'message' => 'Data tidak lengkap.');
        //     echo json_encode($response);
        //     return;
        // }

        // Data untuk tabel contoh_tabel_stabilitas
        $data_stabilitas = array(
            'id_kar' => $data['id_kar'],
            'id_req' => $data['id_req'],
            'month' => $data['month'],
            'years' => $data['years'],
            'plant' => $data['plant'],
            'sloc' => $data['sloc'],
            'sloc_desc' => $data['sloc_desc'],
            'zyear' => $data['zyear'],
            'jenis_material' => $data['jenis_material'],
            'material' => $data['material'],
            'zbentuk' => $data['zbentuk'],
            'desc' => $data['desc'],
            'batch' => $data['batch'],
            'no_karantina' => $data['no_karantina'],
            'batch_lapangan' => $data['batch_lapangan'],
            'manuf_date' => $data['manuf_date'],
            'ed' => $data['ed'],
            'uji_ulang' => $data['uji_ulang'],
            'tgl_karantina' => $data['tgl_karantina'],
            'zmasalah' => $data['zmasalah'],
            'desc_mslh' => $data['desc_mslh'],
            'nama_qc' => $data['nama_qc'],
            'nama_ka' => $data['nama_ka'],
            'nama_koor' => $data['nama_koor'],
            'dqc' => isset($data['dqc']) ? (bool)$data['dqc'] : FALSE,
            'dlab' => isset($data['dlab']) ? (bool)$data['dlab'] : FALSE,
            'drnd' => isset($data['drnd']) ? (bool)$data['drnd'] : FALSE,
            'zind' => isset($data['zind']) ? (bool)$data['zind'] : FALSE,
            'status_kar' => $data['status_kar'],
            'progress' => $data['progress'],
            'insplot' => $data['insplot'],
            'order' => $data['order'],
            'matdoc' => $data['matdoc'],
            'matyears' => $data['matyears'],
            'ztransaksi' => $data['ztransaksi'],
            'quantity' => $data['quantity'],
            'uom' => $data['uom'],
            'reff' => $data['reff']
        );

        // Data untuk tabel contoh_tabel_stabilitas_spec
        $data_spec = $data['spec']; // Array of spec data

        // Mulai transaksi database
        $this->db->trans_start();

        // Sisipkan data ke tabel contoh_tabel_stabilitas
        $this->Analisa_sample_model->insert_data($data_stabilitas);

        // Ambil ID terakhir yang dimasukkan untuk digunakan pada tabel spesifikasi
        $id_kar = $data['id_kar'];

        // Sisipkan data ke tabel contoh_tabel_stabilitas_spec
        foreach ($data_spec as $spec) {
            $spec_data = array(
                'id_kar' => $id_kar, // Menggunakan ID terakhir dari tabel stabilitas
                'oprshrttxt' => $spec['oprshrttxt'],
                'mstrchar' => $spec['mstrchar'],
                'short_text' => $spec['short_text'],
                'spec' => $spec['spec'],
                'result' => $spec['result'],
                'manual_add' => isset($spec['manual_add']) ? (bool)$spec['manual_add'] : FALSE,
                'valid' => isset($spec['valid']) ? $spec['valid'] : NULL
            );

            $this->Analisa_sample_model->insert_data_spec($spec_data);
        }

        // Selesaikan transaksi database
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            // Jika transaksi gagal
            $response = array('status' => FALSE, 'message' => 'Terjadi kesalahan saat menyimpan data.');
        } else {
            // Jika transaksi berhasil
            $response = array('status' => TRUE, 'message' => 'Data berhasil disimpan.');
        }

        // Kirim respons JSON
        echo json_encode($response);
    }

    public function export_json()
    {
        // Load the model for tb_analisa_request_sap dan tb_analisa_request_spec
        $this->load->model('Analisa_request_model');


        // Ambil data dari tabel tb_analisa_request_sap
        $data_sap = $this->Analisa_request_model->get_all_analisa_request();

        // Cek apakah data ditemukan
        if ($data_sap) {
            foreach ($data_sap as &$row) {
                // Ambil data dari tabel tb_analisa_request_spec berdasarkan id_req
                $spec_data = $this->Analisa_request_model->get_spec_by_id_req($row['id']);
                // Tambahkan data spec ke dalam hasil utama
                $row['spec'] = $spec_data;
            }

            // Set header untuk menampilkan JSON di halaman
            header('Content-Type: application/json');

            // Convert data ke JSON dan tampilkan
            echo json_encode($data_sap, JSON_PRETTY_PRINT);
        } else {
            echo json_encode(array("message" => "No data found"));
        }
    }


    // API POST untuk menyimpan data karantina dan spesifikasi
    public function add_analisa_rnd()
    {
        $input = json_decode(trim(file_get_contents('php://input')), true);

        // Validasi input wajib
        if (empty($input['id_req'])) {
            $this->output->set_status_header(400);
            echo json_encode(['status' => 'error', 'message' => 'id_req kosong.']);
            return;
        }

        $datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $current_time = $datetime->format('Y-m-d H:i:s');

        // Mendeklarasikan variabel $id dengan nilai dari input
        $id = $input['id_req'];

        // Memanggil proses approval dengan id yang diterima
        $this->proses_approval_manager_qc($id);



        // Data yang akan diupdate di tb_karantina_material
        $data_karantina = [
            'keputusan_rnd' => $input['keputusan'],
            'ed_plus_rnd' => $input['ed_plus_rnd'],
            'waktu_out_rnd' => $current_time,
        ];

        // Update data ke tb_karantina_material berdasarkan id_req
        $update_karantina = $this->Analisa_sample_rnd_model->update_analisa_rnd($data_karantina, $input['id_req']);
        if (!$update_karantina) {
            $this->output->set_status_header(500);
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data karantina.']);
            return;
        }

        // Simpan data spesifikasi jika ada
        if (!empty($input['spec'])) {
            foreach ($input['spec'] as $spec) {
                $data_spec = [
                    'oprshrttxt' => $spec['oprshrttxt'],
                    'mstrchar' => $spec['mstrchar'],
                    'short_text' => $spec['short_text'],
                    'spec' => $spec['spec'],
                    'result' => $spec['result'],
                ];

                // Update data spesifikasi berdasarkan id_req dan mstrchar
                $update_spec = $this->Analisa_sample_rnd_model->update_analisa_spec_rnd($data_spec, $input['id_req'], $spec['mstrchar']);
                if (!$update_spec) {
                    $this->output->set_status_header(500);
                    echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data spesifikasi.']);
                    return;
                }
            }
        }

        // Berhasil
        $this->output->set_status_header(201);
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan.', 'id_req' => $input['id_req']]);
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
            $this->db->insert('sys_notifications', $notification_data);

            // Insert tracking data untuk approval Manager QC
            // Data pertama untuk tracking RND mengirim hasil analisa
            $tracking_data1 = array(
                'id_req' => $id,
                'waktu_tracking' => $current_time,
                'unit_progress' => 'R&D',
                'desc_tracking' => 'RND mengirim hasil analisa'
            );

            // Data kedua untuk tracking proses approval manager QC
            $tracking_data2 = array(
                'id_req' => $id,
                'waktu_tracking' => NULL,
                'desc_tracking' => 'Proses approval manager QC'
            );

            // Insert data pertama ke dalam tabel
            $this->db->insert('tb_analisa_tracking', $tracking_data1);

            // Insert data kedua ke dalam tabel
            $this->db->insert('tb_analisa_tracking', $tracking_data2);


            // Melakukan update pada kolom 'progress' dan 'waktu_out_lab'
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Approval Manager QC',
                'waktu_out_lab' => $current_time
            ), array('id_req' => $id));

            // echo json_encode(array('status' => true, 'message' => 'Proses approval Manager QC', 'email_status' => 'Email berhasil dikirim.'));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Manager QC tidak ditemukan.'));
        }
    }

    private function proses_approval_ka_unit_rnd($id)
    {
        $this->db->trans_start(); // Memulai transaksi

        $ka_rnd = $this->User_model->get_data_ka_rnd();

        if ($ka_rnd) {
            // Mendapatkan data KA R&D

            if (!$ka_rnd) {
                echo json_encode(array('status' => false, 'message' => 'KA Unit RND tidak ditemukan.'));
                return;
            }

            // Menambahkan approval untuk KA R&D
            $this->add_approval($id, $ka_rnd['pernr'], 'Analisa');

            // Mendapatkan data Manager R&D
            $mand_rnd = $this->User_model->get_data_manager_rnd();
            if (!$mand_rnd) {
                echo json_encode(array('status' => false, 'message' => 'Manager RND tidak ditemukan.'));
                return;
            }

            // Menambahkan approval untuk Manager R&D
            $this->add_approval($id, $mand_rnd['pernr'], 'Analisa');


            $mand_qc = $this->User_model->get_data_manager_qc();
            if (!$mand_qc) {
                echo json_encode(array('status' => false, 'message' => 'Manager RND tidak ditemukan.'));
                return;
            }

            // Menambahkan approval untuk Manager R&D
            $this->add_approval($id, $mand_qc['pernr'], 'Analisa');

            // Mendapatkan waktu sekarang
            $datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
            $current_time = $datetime->format('Y-m-d H:i:s');

            // Data tracking untuk proses analisa R&D
            $tracking_data = array(
                array(
                    'id_req' => $id,
                    'waktu_tracking' => $current_time,
                    'desc_tracking' => 'Proses analisa R&D Selesai',
                    'unit_progress' => 'R&D'
                ),
                array(
                    'id_req' => $id,
                    'waktu_tracking' => NULL,
                    'desc_tracking' => 'Proses Approval Manager QC'
                )
            );


            // Insert tracking data
            $this->db->insert_batch('tb_analisa_tracking', $tracking_data);

            // Update progress untuk approval QC
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Approval Ka Unit R&D'
            ), array('id_req' => $id));

            $this->db->trans_complete(); // Menyelesaikan transaksi

            if ($this->db->trans_status() === FALSE) {
                // Jika transaksi gagal
                echo json_encode(array('status' => false, 'message' => 'Gagal melakukan proses transaksi.'));
                return;
            }

            // Jika transaksi berhasil, lakukan langkah selanjutnya untuk mendapatkan manager QC
            $manager_qc = $this->User_model->get_data_ka_rnd();

            // Data untuk notifikasi
            if ($manager_qc) {
                $notification_data = array(
                    'pernr' => $manager_qc['pernr'],
                    'id_unit' => NULL,
                    'template_id' => 4,
                    'feature' => 'Karantina',
                    'id_data_feature' => $id,
                    'status' => 'pending'
                );

                // Insert ke dalam tabel sys_notifications
                $this->db->insert('sys_notifications', $notification_data);

                // Sukses
                // echo json_encode(array('status' => true, 'message' => 'Proses approval Ka Unit R&D', 'email_status' => 'Email berhasil dikirim.'));
            } else {
                echo json_encode(array('status' => false, 'message' => 'Manager QC tidak ditemukan.'));
            }
        } else {
            echo json_encode(array('status' => false, 'message' => 'KA Unit RND tidak ditemukan.'));
        }
    }

    private function add_approval($id_req, $pernr, $fitur)
    {
        $approvals = array(
            'id_req' => $id_req,
            'pernr' => $pernr,
            'fitur' => $fitur
        );
        $this->db->insert('tb_request_approval', $approvals);
    }
    public function get_all_analisa_request()
    {
        $data = $this->Analisa_request_model->get_all_data();

        if (!empty($data)) {
            echo json_encode([
                'status' => 'success',
                'data' => $data
            ], JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'No data found'
            ]);
        }
    }


    public function get_json_by_id_req($id_req)
    {
        // Panggil fungsi model untuk mengambil data dari kedua tabel berdasarkan id_req
        $sap_data = $this->Analisa_request_model->get_data_sap_by_id_req($id_req);
        $spec_data = $this->Analisa_request_model->get_data_spec_by_id_req($id_req);

        // Periksa apakah data ditemukan
        if ($sap_data) {
            // Gabungkan data tb_analisa_request_sap dengan data tb_analisa_request_spec
            $response = [
                "plant" => $sap_data['plant'],
                "id_kar" => $sap_data['id_kar'],
                "month" => $sap_data['month'],
                "years" => $sap_data['years'],
                "id_req" => $sap_data['id_req'],
                "ed_plus" => $sap_data['ed_plus'],
                "ed_next" => $sap_data['ed_next'],
                "status_kar" => $sap_data['status_kar'],
                "keputusan_qc" => $sap_data['keputusan_qc'],
                "kesimpulan_qc" => $sap_data['kesimpulan_qc'],
                'spec' => $spec_data
            ];

            // Encode data ke format JSON
            $json_data = json_encode($response, JSON_PRETTY_PRINT);

            // Dapatkan datetime saat ini sebagai nama file
            $date_time = date('Y-m-d_H-i-s');
            $file_name = "data_$date_time.json";
            // Tentukan path lengkap file, sesuaikan dengan folder yang diinginkan
            $file_path = FCPATH . "upload_hasil_analisa/" . $file_name; // Pastikan `folder_upload_hasil_analisa` sesuai dengan nama folder yang ada di server

            // Tulis data JSON ke file lokal
            file_put_contents($file_path, $json_data);

            // Informasi koneksi FTP
            $ftp_server = '19.0.2.22';
            $ftp_user = 'karantinadev';
            $ftp_pass = 'karantinadev';
            $ftp_port = 2121;

            // Koneksi ke server FTP
            $conn_id = ftp_connect($ftp_server, $ftp_port) or die("Tidak dapat terhubung ke $ftp_server");

            // Login FTP
            if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
                // Direktori tujuan di FTP
                $remote_dir = 'New'; // Nama folder 'test'
                $remote_file =  basename($file_name); // Ganti dengan path file lokal Anda

                // Cek dan buat direktori jika belum ada
                if (!@ftp_chdir($conn_id, $remote_dir)) {
                    if (ftp_mkdir($conn_id, $remote_dir)) {
                        echo "Direktori $remote_dir berhasil dibuat.\n";
                    } else {
                        echo "Gagal membuat direktori $remote_dir.\n";
                    }
                }

                // Mengunggah file ke FTP
                // Mengunggah file ke FTP
                if (ftp_put($conn_id, $remote_file, $file_path, FTP_BINARY)) {
                    echo "File berhasil diunggah ke $remote_dir.";
                } else {
                    // Ambil pesan kesalahan dari koneksi FTP
                    $last_error = error_get_last();
                    echo "Gagal mengunggah file ke $remote_dir. Cek izin direktori dan path file.";
                    echo "Error: " . $last_error['message']; // Tampilkan pesan kesalahan
                }



                // Tutup koneksi
                ftp_close($conn_id);
            } else {
                echo "Login FTP gagal.";
            }

            // Kirim respons JSON ke output
            $this->output
                ->set_content_type('application/json')
                ->set_output($json_data);
        } else {
            // Kirim respons kosong atau error dengan status 404
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode(['message' => 'Data not found']));
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
                "waktu_in_rnd" => $data->waktu_in_rnd, // Perbaiki tanda kutip
                "waktu_out_rnd" => $data->waktu_out_rnd,
                "keputusan_rnd" => $data->keputusan_rnd,
                'spec' => $spec_data // Menambahkan spec data
            ];

            // Menyusun respon JSON
            echo json_encode($response);
        } else {
            // Jika tidak ada data ditemukan, kembalikan pesan error
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }
}
