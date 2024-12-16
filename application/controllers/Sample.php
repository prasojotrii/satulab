<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . '../vendor/tecnickcom/tcpdf/tcpdf.php';
// Sesuaikan dengan path TCPDF Anda
class Sample extends CI_Controller
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
        $this->load->model('Analisa_sample_model');
        $this->load->model('Analisa_memo_model');
        $this->load->model('User_model');
        // $this->load->model('Analisa_model');


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
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
    }



    public function index()
    {


        // $data['jumlah'] = $this->Glassware_model->jumlah();
        // $data['title'] = 'Daftar Reagen & Media';

        $data['dataSession'] = $this->Master_user_model->getDataUsername();
        $data['id_halaman']      = $this->uri->segment(2);
        $data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['title'] = 'Daftar Penerimaan Sample Laboratorium';
        $this->load->view('Template/header', $data);
        $this->load->view('sample/index', $data);
    }

    public function sample_rnd()
    {


        // $data['jumlah'] = $this->Glassware_model->jumlah();
        // $data['title'] = 'Daftar Reagen & Media';

        $data['dataSession'] = $this->Master_user_model->getDataUsername();
        $data['id_halaman']      = $this->uri->segment(2);
        $data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['title'] = 'Daftar Penerimaan Sample R&D';
        $this->load->view('Template/header', $data);
        $this->load->view('sample/index_rnd', $data);
    }


    public function list_sample_masuk()
    {
        $list = $this->Analisa_sample_model->get_datatables();
        $pernr = $this->session->userdata('pernr'); // Mendapatkan pernr dari sesi
        $jobdesk = $this->session->userdata('jobdesk');
        $tipe = $this->session->userdata('tipe');
        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];


            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_karantina(' . "'" . $data_model->id  . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_karantina(' . "'" . $data_model->id  . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';
            $row[] = '<input type="checkbox" class="select-checkbox">';
            $row[] = $no;




            $row[] = $data_model->waktu_tracking;
            $row[] = $data_model->sloc . ' - ' . $data_model->sloc_desc;

            // Pengecekan pada tb_request_approval
            if ($data_model->progress == 'Pengiriman Ke Lab' && $jobdesk == 'Administrasi' ||  $tipe == 'Admin') {
                $footer = 'Terima';
            } else if ($data_model->progress == 'Approval Ka Unit Lab Analisa') {
                $this->db->select('id_req');
                $this->db->from('tb_request_approval');
                $this->db->where('id_req', $data_model->id_req);
                $this->db->where('pernr', $pernr);
                $this->db->where('status', 0);
                $query = $this->db->get();

                $footer = $query->num_rows() > 0 ? 'Approval' : '';
            } else {
                $footer = '';
            }

            // Pastikan tanda kutip sesuai untuk JavaScript
            $row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="No Permintaan" onclick="info_analisa(\'' . $data_model->id_req . '\', \'' . $footer . '\')">' . $data_model->no_karantina . '</a>';


            // $row[] = $data_model->no_karantina;
            // if ($data_model->urgent == 1) {
            //     $row[] = '<a class="badge bg-danger" >Urgent</a>';
            // } else {
            //     $row[] = '<a class="badge bg-primary">Regular</a>';
            // }

            $row[] = $data_model->material;
            $row[] = $data_model->desc;
            $row[] = $data_model->jumlah_sample;
            $row[] = $data_model->ed;
            $row[] = $data_model->uji_ulang;
            $row[] = $data_model->zmasalah;


            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="info_analisa" onclick="info_analisa(' . "'" . $data_model->id_req  . "'" . ')">Parameter</a>';
            // $row[] = $data_model->quantity . ' ' . $data_model->uom;
            // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="action_karantina(' . "'" . $data_model->id_req  . "'" . ')">' . $data_model->id_req . ' </a>';
            // Urgent Badge

            // if ($data_model->status_kar == "OPEN") {
            //     $row[] = '<a class="badge bg-primary" >OPEN</a>';
            // } else {
            //     $row[] = '<a class="badge bg-dark">CLOSE</a>';
            // }

            // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="info_analisa" onclick="info_analisa(' . "'" . $data_model->id  . "'" . ')">' . $data_model->progress . '</a>';

            // $row[] = $data_model->jenis;

            // // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="info_batch(' . "'" . $data_model->id_req  . "'" . ')">' . $data_model->batch . ' </a>';

            // $row[] = $data_model->ed;
            // $row[] = $data_model->uji_ulang;

            // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="info_analisa" onclick="info_analisa(' . "'" . $data_model->id  . "'" . ')">Parameter</a>';

            $data[] = $row;
        }


        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Analisa_request_model->count_all(),
            'recordsFiltered' => $this->Analisa_request_model->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
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


    public function delete_file()
    {
        $id = $this->input->post('id_req');

        // Ambil nama file yang akan dihapus
        $this->db->select('attachment_lab');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $file_name = $query->row()->attachment_lab;
            $file_path = './uploads/hasil_analisa_lab/' . $file_name;

            // Hapus file dari server
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Kosongkan kolom attachment_lab di database
            $update_data = array('attachment_lab' => null);
            $this->db->where('id_req', $id);
            $this->db->update('tb_analisa_request_sap', $update_data);

            $response = array('status' => true, 'message' => 'File berhasil dihapus.');
        } else {
            $response = array('status' => false, 'error' => 'File tidak ditemukan.');
        }

        echo json_encode($response);
    }


    public function upload_file()
    {
        $config['upload_path']   = './uploads/hasil_analisa_lab/'; // Path ke folder upload
        $config['allowed_types'] = 'pdf|jpg|png|docx|xlsx'; // Jenis file yang diizinkan
        $config['max_size']      = 10048; // Maksimal ukuran file dalam kilobyte (10MB)

        // Menginisialisasi library upload
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $file_data = $this->upload->data();

            // Mendapatkan ekstensi file
            $file_ext = $file_data['file_ext'];

            // Mengatur nama file dengan format datetime
            $timestamp = date('Ymd_His');
            $file_name = 'file_' . $timestamp . $file_ext;

            // Mengganti nama file di folder upload
            rename($file_data['full_path'], $config['upload_path'] . $file_name);

            // Mendapatkan URL file
            $file_url = base_url('uploads/hasil_analisa_lab/' . $file_name);

            // Mendapatkan ID dan nama analis dari input
            $id = $this->input->post('id_req');
            // $nama_analis = $this->input->post('nama_analis');

            // Simpan nama file dan informasi lainnya ke database
            $update_data = array(
                'attachment_lab' => $file_name

            );

            $this->db->where('id_req', $id);
            $this->db->update('tb_analisa_request_sap', $update_data);

            $response = array(
                'status' => true,
                'file_url' => $file_url,
                'message' => 'File berhasil diunggah dan disimpan.'
            );
        } else {
            $response = array(
                'status' => false,
                'error' => $this->upload->display_errors()
            );
        }

        echo json_encode($response);
    }

    public function get_file_url()
    {
        $id = $this->input->post('id_req');
        $this->db->select('attachment_lab');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $file_name = $query->row()->attachment_lab;
            if ($file_name) {
                $file_url = base_url('uploads/hasil_analisa_lab/' . $file_name);
                $response = array('status' => true, 'file_url' => $file_url);
            } else {
                $response = array('status' => false, 'error' => 'File tidak ditemukan.');
            }
        } else {
            $response = array('status' => false, 'error' => 'ID tidak ditemukan.');
        }

        echo json_encode($response);
    }

    public function check_columns()
    {
        // Mendapatkan ID yang dikirim dari permintaan AJAX
        $ids = $this->input->post('ids');

        // Memeriksa apakah ID yang diterima adalah array
        if (is_array($ids) && !empty($ids)) {
            // Menggunakan CI Query Builder untuk memeriksa kolom
            $this->db->where_in('id_req', $ids);
            $this->db->where('(bentuk IS NULL OR bentuk = "" OR singkatan IS NULL OR singkatan = "")', NULL, FALSE);
            $query = $this->db->get('view_analisa_request_sap');

            // Jika ada baris yang ditemukan dengan nilai NULL atau kosong
            if ($query->num_rows() > 0) {
                echo json_encode(['hasInvalidValues' => true]);
            } else {
                echo json_encode(['hasInvalidValues' => false]);
            }
        } else {
            echo json_encode(['hasInvalidValues' => false]);
        }
    }

    public function list_data_sample()
    {
        $list = $this->Analisa_sample_model->get_datatables();
        $data = [];
        $no = $_POST['start'];
        $pernr = $this->session->userdata('pernr'); // Mendapatkan pernr dari sesi
        $jobdesk = $this->session->userdata('jobdesk');
        $tipe = $this->session->userdata('tipe');
        foreach ($list as $data_model) {
            $no++;
            $row = [];

            $row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_karantina(' . "'" . $data_model->id  . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_karantina(' . "'" . $data_model->id  . "'" . ')"><i class="fas fa-trash-alt"></i></a>';
            $row[] = '<input type="checkbox" class="select-checkbox" data-id="' . $data_model->id_req . '">';
            $row[] = $no;
            $row[] = $data_model->waktu_tracking;

            if ($data_model->progress === 'Pengiriman Ke Lab' && ($jobdesk == 'Administrasi' || $tipe == 'Admin')) {
                $footer = 'Terima';
            } else if ($data_model->progress === 'Approval Ka Unit Lab Analisa') {
                $this->db->select('id_req');
                $this->db->from('tb_request_approval');
                $this->db->where('id_req', $data_model->id_req);
                $this->db->where('pernr', $this->session->userdata('pernr')); // Pastikan $pernr diinisialisasi
                $this->db->where('status', 0);
                $query = $this->db->get();

                $footer = $query->num_rows() > 0 ? 'Approval' : '';
            } else {
                $footer = '';
            }


            // Pastikan tanda kutip sesuai untuk JavaScript
            $row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="No Permintaan" onclick="info_analisa(\'' . $data_model->id_req . '\', \'' . $footer . '\')">' . $data_model->no_karantina . '</a>';



            // if ($data_model->urgent == 1) {
            //     $row[] = '<a class="badge bg-danger">Urgent</a>';
            // } else {
            //     $row[] = '<a class="badge bg-primary">Regular</a>';
            // }

            $row[] = $data_model->material;
            $row[] = $data_model->zbentuk;
            $row[] = $data_model->kode_proses_produksi;
            $row[] = $data_model->desc;
            $row[] = $data_model->karantina_ke;
            $row[] = $data_model->batch;

            // Periksa progress dan sesuaikan nilai bentuk

            if ($data_model->progress == 'Administrasi Lab Analisa') {
                $row[] = '<input type="text" class="form-control form-control-sm bentuk-input" data-material="' . ($data_model->material) . '" value="' . ($data_model->bentuk) . '">';
            } else {
                $row[] = $data_model->bentuk;
            }

            // Periksa progress dan sesuaikan nilai singkatan
            if ($data_model->progress == 'Administrasi Lab Analisa') {
                $row[] = '<input type="text" class="form-control form-control-sm singkatan-input" data-material="' . ($data_model->material) . '" value="' . ($data_model->singkatan) . '">';
            } else {
                $row[] = $data_model->singkatan;
            }

            $row[] = $data_model->jumlah_sample;
            $row[] = $data_model->ed;
            $row[] = $data_model->uji_ulang;
            $row[] = $data_model->zmasalah;
            $row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="info_analisa" onclick="info_analisa(' . "'" . $data_model->id_req  . "'" . ')">Parameter</a>';

            $data[] = $row;
        }

        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Analisa_request_model->count_all(),
            'recordsFiltered' => $this->Analisa_request_model->count_filtered(),
            'data' => $data,
        ];
        echo json_encode($output);
    }



    public function check_data()
    {
        $ids = $this->input->post('ids');

        if (empty($ids)) {
            echo json_encode(['valid' => false, 'message' => 'Tidak ada data yang dipilih.']);
            return;
        }

        // Load model
        $this->load->model('Analisa_request_model');

        // Lakukan pengecekan data
        $result = $this->Analisa_request_model->check_penyelia_data($ids);

        if ($result['valid']) {
            echo json_encode(['valid' => true]);
        } else {
            echo json_encode(['valid' => false, 'message' => 'Beberapa kolom penyelia kosong. Pastikan semua kolom penyelia terisi.', 'invalidIds' => $result['invalidRows']]);
        }
    }


    public function update_bentuk_material()
    {
        $material = $this->input->post('material');
        $bentuk = $this->input->post('bentuk');

        // Cek apakah data material sudah ada
        $this->db->where('material', $material);
        $query = $this->db->get('tb_analisa_master_material');

        if ($query->num_rows() > 0) {
            // Update data jika material sudah ada
            $this->db->set('zbentuk', $bentuk);
            $this->db->where('material', $material);
            if ($this->db->update('tb_analisa_master_material')) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data']);
            }
        } else {
            // Insert data baru jika material belum ada
            $data = [
                'material' => $material,
                'zbentuk' => $bentuk
            ];
            if ($this->db->insert('tb_analisa_master_material', $data)) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data baru']);
            }
        }
    }

    public function update_singkatan_material()
    {
        $material = $this->input->post('material');
        $singkatan = $this->input->post('singkatan');

        // Cek apakah data material sudah ada
        $this->db->where('material', $material);
        $query = $this->db->get('tb_analisa_master_material');

        if ($query->num_rows() > 0) {
            // Update data jika material sudah ada
            $this->db->set('singkatan', $singkatan);
            $this->db->where('material', $material);
            if ($this->db->update('tb_analisa_master_material')) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data']);
            }
        } else {
            // Insert data baru jika material belum ada
            $data = [
                'material' => $material,
                'singkatan' => $singkatan
            ];
            if ($this->db->insert('tb_analisa_master_material', $data)) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data baru']);
            }
        }
    }
    // Metode untuk memperbarui 'metode'
    public function update_metode()
    {
        $material = $this->input->post('material');
        $metode = $this->input->post('metode');
        $bentuk = $this->input->post('bentuk');
        $singkatan = $this->input->post('singkatan');
        $mstrchar = $this->input->post('mstrchar');

        $result = $this->Analisa_sample_model->update_metode($material, $metode, $bentuk, $singkatan, $mstrchar);

        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data']);
        }
    }

    // Metode untuk memperbarui 'penyelia'
    public function update_penyelia()
    {
        $material = $this->input->post('material');
        $penyelia = $this->input->post('penyelia');
        $bentuk = $this->input->post('bentuk');
        // $singkatan = $this->input->post('singkatan');
        $mstrchar = $this->input->post('mstrchar');

        $result = $this->Analisa_sample_model->update_penyelia($material, $penyelia, $bentuk, $mstrchar);

        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data']);
        }
    }

    public function print_memo_data()
    {
        // Load libraries and models
        $this->load->library('pdf');
        $this->load->model('Analisa_tracking_model');
        $this->load->model('User_model');
        $this->load->model('Analisa_request_model');

        $ids = $this->input->post('ids');

        if (empty($ids) || !is_array($ids)) {
            show_error('Invalid input');
            return;
        }

        // Get tracking data
        $trackingData = $this->Analisa_tracking_model->get_tracking_data_by_ids($ids, 'Sample telah diterima di Lab Analisa');
        $tanggalPenerimaanContoh = isset($trackingData[0]['waktu_tracking']) ? date('d/m/Y', strtotime($trackingData[0]['waktu_tracking'])) : 'N/A';

        // Generate registration number
        $pernr = $this->session->userdata('pernr');
        $char = '';
        switch ($pernr) {
            case '90002459':
                $char = 'C';
                break;
            case '90001330':
                $char = 'A';
                break;
            case '90001457':
                $char = 'B';
                break;
            default:
                $char = 'X'; // default value if needed
        }

        $currentMonth = date('m');
        $currentYear = date('Y');
        $currentDay = date('d');
        $romanMonth = $this->convertToRoman($currentMonth);

        $this->db->where('MONTH(created_at)', $currentMonth);
        $this->db->where('YEAR(created_at)', $currentYear);
        $this->db->where('admin_lab', $pernr);
        $this->db->where('memo', 1);
        $this->db->from('tb_analisa_request_sap');
        $count = $this->db->count_all_results();

        $nomorRegistrasi = 'LABSM/' . $romanMonth . '/' . $currentDay . '/' . $char . '/' . ($count + 1);




        // Update database with registration number
        $this->db->where_in('id_req', $ids);
        $this->db->update('tb_analisa_request_sap', ['nomor_registrasi_lab' => $nomorRegistrasi, 'memo' => 1]);

        // Retrieve data for the view
        $this->db->select('penyelia_name, penyelia, COUNT(*) as jumlah')
            ->from('view_analisa_full')
            ->where_in('id_req', $ids)
            ->where('cat_oprshrttxt', 'LAB')
            ->group_by('penyelia');
        $query = $this->db->get();
        $result = $query->result_array();

        $this->db->select('*');
        $this->db->from('view_analisa_request_sap_material');
        $this->db->where_in('id_req', $ids); // Correct column name
        $query1 = $this->db->get();
        $data_analisa = $query1->result_array();

        $this->db->select('no_karantina');
        $this->db->from('view_analisa_full');
        $this->db->group_by('no_karantina');
        $this->db->where('penyelia', $result[0]['penyelia']);
        $this->db->where_in('id_req', $ids); // Cari berdasarkan ID yang diberikan
        $query2 = $this->db->get();
        $no_karantina_array = $query2->result_array();

        $no_karantinas = array();
        foreach ($no_karantina_array as $row) {
            if (!empty($row['no_karantina'])) {
                $no_karantinas[] = $row['no_karantina'];
            }
        }

        $no_karantina_string = !empty($no_karantinas) ? implode(', ', $no_karantinas) : 'N/A';
        // Query untuk mengambil total jumlah_sample
        $this->db->select_sum('jumlah_sample'); // Menggunakan fungsi SUM
        $this->db->where_in('id_req', $ids); // Filter berdasarkan id_req
        $query = $this->db->get('tb_analisa_request_sap'); // Eksekusi query

        // Pastikan hasil query diambil dengan benar
        $jumlah_sample = $query->row();

        // Periksa apakah hasilnya ada dan nilainya valid
        $urutan_jumlah = isset($jumlah_sample->jumlah_sample) ? (int)$jumlah_sample->jumlah_sample : 0;


        $jenis_material = isset($data_analisa[0]['jenis']) ? $data_analisa[0]['jenis'] : 'N/A';
        $bentuk = isset($data_analisa[0]['zbentuk']) ? $data_analisa[0]['zbentuk'] : 'N/A';
        $kode_proses_produksi = isset($data_analisa[0]['kode_proses_produksi']) ? $data_analisa[0]['kode_proses_produksi'] : 'N/A';
        $singkatan = isset($data_analisa[0]['singkatan']) ? $data_analisa[0]['singkatan'] : 'N/A';
        $batch = isset($data_analisa[0]['batch']) ? $data_analisa[0]['batch'] : 'N/A';
        $lastThreeDigits = substr($batch, -3); // Mengambil 3 karakter terakhir dari string
        $karantina_ke = isset($data_analisa[0]['karantina_ke']) ? $data_analisa[0]['karantina_ke'] : 'N/A';

        $kode_contoh = $kode_proses_produksi . ' ' . $singkatan . ' ' . $karantina_ke . ' ' . $lastThreeDigits . ' ' . date('dmy') . ' (' . $urutan_jumlah . ')';



        $ka_unit_lab_analisa = $this->User_model->get_ka_unit_lab_analisa();

        // Prepare PDF
        $pdf = new TCPDF('P', 'mm', 'F4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(5, 0, 5);
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetAutoPageBreak(FALSE);

        $pageHeight = 330; // Total height of F4 paper in mm
        $contentHeight = 165; // Height of content before adding a new page
        $y = 10; // Starting Y position
        $itemCount = 0;
        $totalItems = count($result);

        // Start with the first page
        $pdf->AddPage();

        foreach ($result as $i => $data) {
            $this->db->select('short_text, metode, no_karantina');
            $this->db->from('view_analisa_full');
            $this->db->where('penyelia', $data['penyelia']);
            $this->db->where_in('id_req', $ids); // Cari berdasarkan ID yang diberikan
            $this->db->group_by('short_text');
            $query_short_text = $this->db->get();

            // Ambil hasil query
            $resultshort_text = $query_short_text->result_array();

            $short_texts = array(); // Array untuk menyimpan short_text
            $metodes = array(); // Array untuk menyimpan metode
            $unique_no_karantinas = array();
            foreach ($resultshort_text as $row) {
                // Tambahkan short_text ke array jika tidak kosong
                if (!empty($row['short_text'])) {
                    $short_texts[] = $row['short_text'];
                }

                // Tambahkan metode ke array jika tidak kosong
                if (!empty($row['metode'])) {
                    $metodes[] = $row['metode'];
                }
                // Tambahkan no_karantina ke array jika tidak kosong dan belum ada dalam array

                if (!empty($row['no_karantina']) && !in_array($row['no_karantina'], $unique_no_karantinas)) {
                    $unique_no_karantinas[] = $row['no_karantina'];
                }
            }

            // Hitung jumlah jenis no_karantina yang unik
            $jumlah_jenis_no_karantina = count($unique_no_karantinas);
            // Gabungkan short_texts menjadi string dengan koma jika ada isinya
            $short_texts_string = !empty($short_texts) ? implode(', ', $short_texts) : '';

            // Gabungkan metode menjadi string dengan koma jika ada isinya
            $metode_string = !empty($metodes) ? implode(', ', $metodes) : '';

            // Jika metode memiliki lebih dari satu baris data yang mungkin perlu dipisahkan,
            // Anda bisa mempertimbangkan untuk menggabungkannya berdasarkan baris atau kategori jika ada




            // Generate HTML content
            $html = '
            <style>
                h2, p {
                    margin: 0;
                    padding: 0;
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                    padding: 2px;
                }
                td, th {
                    padding: 6mm;
                    border: 1px solid #000;
                }
                .center {
                    text-align: center;
                }
                .left {
                    text-align: left;
                }
                .bold {
                    font-weight: bold;
                }
            </style>
            <div style="position:absolute; top:' . $y . 'mm; width:100%; height:165mm;">
                <h2 class="center">TUGAS ANALISIS LABORATORIUM ANALISA</h2>
                <p>Kepada Yth,<br>Penyelia: ' . $data['penyelia_name'] . '</p>
                <p>Dengan hormat,<br>Mohon dapat dilakukan analisis :</p>
                <table border="1">
                    <tr>
                        <td style="width: 30%;" class="bold">No Registrasi</td>
                        <td style="width: 70%;">' . $nomorRegistrasi . '</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;" class="bold">Jenis Contoh</td>
                        <td style="width: 70%;">' . $jenis_material . '</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;" class="bold">Bentuk Contoh</td>
                        <td style="width: 70%;">' . $bentuk . '</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;" class="bold">Jumlah Contoh</td>
                        <td style="width: 70%;">' . $urutan_jumlah . '</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;" class="bold">Kode Contoh</td>
                        <td style="width: 70%;">' . $kode_contoh . '</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;" class="bold">Parameter</td>
                        <td style="width: 70%;">' . $short_texts_string . '</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;" class="bold">Metode</td>
                        <td style="width: 70%;">' . $metode_string . '</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;" class="bold">Tanggal Penerimaan Contoh</td>
                        <td style="width: 70%;">' . $tanggalPenerimaanContoh . '</td>
                    </tr>
                    <tr>
                        <td style="width: 30%;" class="bold">Tanggal Selesai Analisa</td>
                        <td style="width: 70%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 30%;" class="bold">Permintaan Khusus</td>
                        <td style="width: 70%;"></td>
                    </tr>
                </table>
                <br><br>
                <table style="border-collapse: collapse; width: 100%;">
                    <tbody>
                        <tr>
                            <td style="border: none; text-align: center;">Semarang ' . date('d/m/Y') . '</td>
                            <td style="border: none; text-align: center;" colspan="2">Diterima Oleh</td>
                        </tr>
                        <tr>
                            <td style="border: none; text-align: center;">Ka Lab Analisa</td>
                            <td style="border: none; text-align: center;">Penyelia</td>
                            <td style="border: none; text-align: center;">Analis</td>
                        </tr>
                        <tr>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                        </tr>
                        <tr>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                            <td style="border: none;"></td>
                        </tr>
                        <tr>
                            <td style="border: none; text-align: center;">( ' . $ka_unit_lab_analisa . ' )</td>
                            <td style="border: none; text-align: center;">( ' . $data['penyelia_name'] . ' )</td>
                            <td style="border: none; text-align: center;">( .............................. )</td>
                        </tr>
                        <tr>
                            <td style="border: none;" class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl</td>
                            <td style="border: none;" class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl</td>
                            <td style="border: none;" class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl</td>
                        </tr>
                    </tbody>
                </table>
            </div>';

            // Write HTML content to PDF
            $pdf->writeHTML($html, true, false, true, false, '');
            $fileName = 'memo_analisa_' . time() . '.pdf';
            $this->updateMemoLabColumn($ids, $fileName, $nomorRegistrasi, $kode_contoh);
            $itemCount++;
            $y += $contentHeight; // Update Y position for the next item

            // Check if we need to add a new page
            if ($itemCount % 2 == 0 && $i < $totalItems - 1) {
                // If two items are already added and there are more items, add a new page
                $pdf->AddPage();
                $y = 10; // Reset Y position for the new page
            }
        }

        // Output the PDF
        $pdf->Output('Laporan_Analisa.pdf', 'I');
    }
    public function get_jumlah_sample()
    {
        // Ambil ID dari request POST
        $id_req = $this->input->post('id_req');
        if (!$id_req) {
            // Kirim respon jika ID tidak ada
            echo json_encode(['status' => 'error', 'message' => 'ID tidak ditemukan']);
            return;
        }

        // Query untuk mengecek apakah ada data dengan drnd = 1
        $this->db->where('id_req', $id_req);
        $this->db->where('drnd', 1);  // Kondisi pertama
        $queryrnd = $this->db->get('tb_analisa_request_sap');


        // Query utama untuk mengambil nilai jumlah_sample, jumlah_sample_rnd, dan ed
        $this->db->select('jumlah_sample, jumlah_sample_rnd, ed');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();

        // Cek apakah data ditemukan
        if ($query->num_rows() > 0) {
            $result = $query->row();

            // Jika jumlah_sample = 0, gunakan jumlah_sample_rnd
            $jumlah_sample = $result->jumlah_sample > 0 ? $result->jumlah_sample : $result->jumlah_sample_rnd;
            $ed = $result->ed;

            // Cek apakah ada data dengan drnd = 1
            if ($queryrnd->num_rows() > 0) {
                // Kirim respon JSON jika ada data dengan drnd = 1
                echo json_encode([
                    'status' => 'success',
                    'jumlah_sample' => $jumlah_sample,
                    'ed' => $ed,
                    'info_usulan' => 'true'
                ]);
            } else {
                // Kirim respon JSON jika tidak ada data dengan drnd = 1
                echo json_encode([
                    'status' => 'success',
                    'jumlah_sample' => $jumlah_sample,
                    'ed' => $ed,
                    'info_usulan' => 'false'
                ]);
            }
        } else {
            // Kirim respon jika data tidak ditemukan
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
    }


    public function print_memo_data2()
    {
        $ids = $this->input->post('ids'); // Get IDs from POST request

        // Validate and sanitize input
        if (empty($ids) || !is_array($ids)) {
            show_error('Invalid input');
            return;
        }

        $this->load->model('Analisa_memo_model');
        $this->load->model('Analisa_request_model');
        $this->load->model('User_model');
        $this->load->model('Analisa_tracking_model');

        // Fetch memo data
        $data = $this->Analisa_memo_model->get_memo_data_by_ids($ids);
        $data_analisa = $this->Analisa_request_model->get_data_memo_by_ids($ids);

        if (empty($data)) {
            show_error('No data found for the provided IDs');
            return;
        }

        // Fetch Kepala Unit Lab Analisa name
        $ka_unit_lab_analisa = $this->User_model->get_ka_unit_lab_analisa();


        // Load TCPDF library
        $this->load->library('pdf');

        // Group data by penyelia
        $groupedData = [];
        foreach ($data as $item) {
            $penyelia = isset($item['penyelia']) ? $item['penyelia'] : 'N/A';
            if (!isset($groupedData[$penyelia])) {
                $groupedData[$penyelia] = [
                    'data' => [],
                    'data_analisa' => [],
                    'penyelia_name' => isset($penyeliaNames[$penyelia]) ? $penyeliaNames[$penyelia] : 'N/A'
                ];
            }
            $groupedData[$penyelia]['data'][] = $item;
            $groupedData[$penyelia]['data_analisa'][] = $data_analisa;
        }

        // Prepare the PDF document
        $pdf = new TCPDF('P', 'mm', 'F4', true, 'UTF-8', false);
        $currentDate = date('d/m/Y');

        // Remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set margins
        $pdf->SetMargins(10, 10, 10); // Set top, left, and right margins to 10mm
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);

        // Add a page
        $pdf->AddPage();

        // Draw a horizontal line at 165 mm
        $yPosition = 165; // 165 mm from the top of the page
        $xStart = 10; // Starting x position of the line
        $xEnd = 200; // Ending x position of the line (adjust based on page width)

        // Draw the line
        $pdf->Line($xStart, $yPosition, $xEnd, $yPosition);

        // Set font
        $pdf->SetFont('helvetica', '', 10);

        // Set the columns    $isFirstSection = true; // Flag to check if it's the first section


        // Generate PDF content
        foreach ($groupedData as $penyelia => $group) {
            $data = $group['data'];
            $data_analisa = $group['data_analisa'];
            $penyeliaNamesString = $group['penyelia_name'];

            // Prepare data for display
            $shortTexts = array_map(function ($item) {
                return isset($item['short_text']) ? $item['short_text'] : 'N/A';
            }, $data);

            // Remove duplicate short texts
            $uniqueShortTexts = array_unique($shortTexts);

            // Convert the array to a comma-separated string
            $shortTextString = (implode(', ', $uniqueShortTexts));


            // Count the number of samples

            $penyeliaList = array_map(function ($item) {
                return isset($item['penyelia']) ? $item['penyelia'] : 'N/A';
            }, $data);



            $Contoh = array_map(function ($item) {
                return isset($item['bentuk']) ? $item['bentuk'] : 'N/A';
            }, $data);

            $material = array_map(function ($item) {
                return isset($item['jenis_material']) ? $item['jenis_material'] : 'N/A';
            }, $data);

            $nomor = array_map(function ($item) {
                return isset($item['no_karantina']) ? $item['no_karantina'] : 'N/A';
            }, $data);





            $uniqueShortTexts = array_unique($nomor);
            $daftarnomor = (implode(', ', $uniqueShortTexts));

            $uniqueContoh = array_unique($Contoh);
            $jenisContoh = (implode(', ', $uniqueContoh));

            $uniquematerial = array_unique($material);
            $jenismaterial = (implode(', ', $uniquematerial));
            // Menghitung jumlah no_karantina
            $nomorList = array_map(function ($item) {
                return isset($item['no_karantina']) ? $item['no_karantina'] : 'N/A';
            }, $data);

            $uniqueNomorList = array_unique($nomorList);
            $jumlahSample = count($uniqueNomorList);

            $penyeliaNames = $this->User_model->get_names_by_pernr($penyeliaList);

            foreach ($data as &$item) {
                if (isset($item['penyelia']) && isset($penyeliaNames[$item['penyelia']])) {
                    $item['penyelia_name'] = $penyeliaNames[$item['penyelia']];
                } else {
                    $item['penyelia_name'] = 'N/A';
                }
            }

            // Menggabungkan nama-nama penyelia
            $penyeliaNamesString = implode(', ', $penyeliaNames);

            // Metode list
            $metodeList = array_map(function ($item) {
                return isset($item['metode']) ? $item['metode'] : 'N/A';
            }, $data);

            $metode = (implode(', ', array_unique($metodeList)));


            // Mengambil semua nilai singkatan
            $singkatan = array_map(function ($item) {
                return isset($item['singkatan']) ? ($item['singkatan']) : 'N/A';
            }, $data);

            // Mengambil semua nilai kode_proses_produksi
            $kode_proses_produksi = array_map(function ($item) {
                return isset($item['kode_proses_produksi']) ? ($item['kode_proses_produksi']) : '';
            }, $data);

            // Mengambil semua nilai karantina_ke
            $karantina_ke = array_map(function ($item) {
                return isset($item['karantina_ke']) ? ($item['karantina_ke']) : ' ';
            }, $data);

            // Mengambil semua nilai batch
            $batch = array_map(function ($item) {
                return isset($item['batch']) ? ($item['batch']) : '';
            }, $data);

            // Menyusun nilai unik dari setiap parameter
            $uniqueSingkatan = array_unique($singkatan);
            $uniqueKodeProsesProduksi = array_unique($kode_proses_produksi);
            $uniqueKarantinaKe = array_unique($karantina_ke);
            $uniqueBatch = array_unique($batch);

            // Menggabungkan nilai-nilai menjadi string yang dipisahkan koma
            $daftarSingkatan = (implode(', ', $uniqueSingkatan));
            $daftarKodeProsesProduksi = (implode(', ', $uniqueKodeProsesProduksi));
            $daftarKarantinaKe = (implode(', ', $uniqueKarantinaKe));
            $daftarBatch = (implode(', ', $uniqueBatch));

            // Menyusun kodeContoh dengan menggunakan daftarBatch
            $batchLastThreeDigits = implode(' ', array_map(function ($daftarBatch) {
                return substr($daftarBatch, -3);
            }, $uniqueBatch));

            $kodeContoh = $daftarKodeProsesProduksi . ' ' . $daftarSingkatan . ' ' . $batchLastThreeDigits . ' (' . $daftarKarantinaKe . ') ' . date('dmy') . ' ' . $daftarnomor;
            $kodeContohsample = $daftarKodeProsesProduksi . ' ' . $daftarSingkatan . ' ' . $batchLastThreeDigits . ' (' . $daftarKarantinaKe . ') ' . date('dmy');



            // Tanggal Penerimaan Contoh
            $trackingData = $this->Analisa_tracking_model->get_tracking_data_by_ids($ids, 'Sample telah diterima di Lab Analisa');
            $tanggalPenerimaanContoh = isset($trackingData[0]['waktu_tracking']) ? date('d/m/Y', strtotime($trackingData[0]['waktu_tracking'])) : 'N/A';
            // Determine registration number
            $pernr = $this->session->userdata('pernr');
            $char = '';
            switch ($pernr) {
                case '90002459':
                    $char = 'C';
                    break;
                case '90001330':
                    $char = 'A';
                    break;
                case '90001457':
                    $char = 'B';
                    break;
                default:
                    $char = 'X'; // default value if needed
            }

            // Get the current month and year
            $currentMonth = date('m');
            $currentYear = date('Y');
            $currentDay = date('d');
            $romanMonth = $this->convertToRoman($currentMonth);

            // Count the number of records with the same month and year
            $this->db->where('MONTH(created_at)', $currentMonth);
            $this->db->where('YEAR(created_at)', $currentYear);
            $this->db->where('admin_lab', $pernr);
            $this->db->where('memo', 1);
            $this->db->from('tb_analisa_request_sap');
            $count = $this->db->count_all_results();

            $nomorRegistrasi = 'LABSM/' . $romanMonth . '/' . $currentDay . '/' . $char . '/' . ($count + 1);

            // Update tb_analisa_request_sap with nomor_registrasi_lab
            $this->db->where_in('id_req', $ids);
            $this->db->update('tb_analisa_request_sap', ['nomor_registrasi_lab' => $nomorRegistrasi, 'memo' => 1]);

            // Generate HTML content for each penyelia
            $html = '
            <style>
                h2, p {
                    margin: 0;
                    padding: 0;
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                td {
                    padding: 4px;
                }
                .center {
                    text-align: center;
                }
                .left {
                    text-align: left;
                }
                .bold {
                    font-weight: bold;
                }
            </style>';

            // Add section for each penyelia
            $html .= '
            <h2 class="center">TUGAS ANALISIS LABORATORIUM ANALISA</h2>
            <p>Kepada Yth,<br>Penyelia: ' . $penyeliaNamesString . '</p>
            <p>Dengan hormat,<br>Mohon dapat dilakukan analisis :</p>
            <table border="1">
                <tr>
                    <td style="width: 30%;" class="bold">No Registrasi</td>
                    <td style="width: 70%;" class="bold">' . $nomorRegistrasi . '</td>
                </tr>
                <tr>
                    <td style="width: 30%;" class="bold">Jenis Contoh</td>
                    <td style="width: 70%;">' . $jenisContoh . '</td>
                </tr>
                <tr>
                    <td style="width: 30%;" class="bold">Bentuk Contoh</td>
                    <td style="width: 70%;">' . $jenismaterial . '</td>
                </tr>
                <tr>
                    <td style="width: 30%;" class="bold">Jumlah Contoh</td>
                    <td style="width: 70%;">' . $jumlahSample . '</td>
                </tr>
                <tr>
                    <td style="width: 30%;" class="bold">Kode Contoh</td>
                    <td style="width: 70%;">' . $kodeContoh . '</td>
                </tr>
                <tr>
                    <td style="width: 30%;" class="bold">Parameter</td>
                    <td style="width: 70%;">' . $shortTextString . '</td>
                </tr>
                <tr>
                    <td style="width: 30%;" class="bold">Metode</td>
                    <td style="width: 70%;">' . $metode . '</td>
                </tr>
                <tr>
                    <td style="width: 30%;" class="bold">Tanggal Penerimaan Contoh</td>
                    <td style="width: 70%;">' . $tanggalPenerimaanContoh . '</td>
                </tr>
                <tr>
                    <td style="width: 30%;" class="bold">Tanggal Selesai Analisa</td>
                    <td style="width: 70%;"></td>
                </tr>
                <tr>
                    <td style="width: 30%;" class="bold">Permintaan Khusus</td>
                    <td style="width: 70%;"></td>
                </tr>
            </table>
            <br><br>
            <table>
                <tbody>
                    <tr>
                        <td class="center">Semarang ' . $currentDate . '</td>
                        <td class="center" colspan="2">Diterima Oleh</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="center">Ka Lab Analisa</td>
                        <td class="center">Penyelia</td>
                        <td class="center">Analis</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="center">( ' . $ka_unit_lab_analisa . ' )</td>
                        <td class="center">( ' . $penyeliaNamesString . ' )</td>
                        <td class="center">(..............................)</td>
                    </tr>
                    <tr>
                        <td class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl</td>
                        <td class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl</td>
                        <td class="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl</td>
                    </tr>
                </tbody>
            </table>
          '; // Adjust dashed line

            // Add a page break
            $pdf->writeHTML($html, true, false, true, false, '');
        }

        // Save PDF to a file
        $fileName = 'memo_analisa_' . time() . '.pdf';
        $filePath = FCPATH . 'uploads/memo_analisa_lab/' . $fileName;
        // Update the memo_lab column for each id in tb_analisa_request_sap table
        $this->updateMemoLabColumn($ids, $fileName, $nomorRegistrasi, $kodeContohsample);
        // Save PDF file to the server
        $pdf->Output($filePath, 'F');

        // Check if file was created
        if (!file_exists($filePath)) {
            show_error('Failed to create PDF file');
            return;
        }

        // Return the file URL
        echo base_url('uploads/memo_analisa_lab/' . $fileName);
    }

    private function updateMemoLabColumn($ids, $fileName, $nomorRegistrasi, $kode_contoh)
    {
        foreach ($ids as $id) {
            $updateData = ['memo_lab' => $fileName, 'nomor_registrasi_lab' => $nomorRegistrasi, 'label_lab' => $kode_contoh];
            $this->db->where('id_req', $id);
            $this->db->update('tb_analisa_request_sap', $updateData);
        }
    }
    private function convertToRoman($month)
    {
        $map = [
            '01' => 'I', '02' => 'II', '03' => 'III', '04' => 'IV', '05' => 'V', '06' => 'VI',
            '07' => 'VII', '08' => 'VIII', '09' => 'IX', '10' => 'X', '11' => 'XI', '12' => 'XII'
        ];
        return $map[$month];
    }
    public function check_label_exists()
    {
        $ids = $this->input->post('ids');

        // Ambil data dari view_analisa_request_sap berdasarkan IDs yang tidak memiliki label_lab
        $this->db->where_in('id_req', $ids);
        $this->db->where('label_lab', ''); // Memastikan kolom label_lab kosong
        $query = $this->db->get('view_analisa_request_sap');

        if ($query->num_rows() > 0) {
            // Jika ada data yang tidak memiliki label_lab, kembalikan not_found
            echo json_encode(['status' => 'not_found']);
        } else {
            // Jika semua data memiliki label_lab, kembalikan found
            echo json_encode(['status' => 'found']);
        }
    }

    public function generate_blank_page()
    {
        // Load TCPDF library
        $this->load->library('pdf');

        // Create new PDF document with F4 size
        $pdf = new TCPDF('P', 'mm', array(210, 330), true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Blank Page with Divider');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // Remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set margins
        $pdf->SetMargins(0, 0, 0); // No margins
        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);

        // Add a page
        $pdf->AddPage();

        // Get the page width and height
        $pageWidth = $pdf->getPageWidth();
        $pageHeight = $pdf->getPageHeight();

        // Define the line position
        $linePosition = $pageHeight / 2;

        // Draw a horizontal line across the page width
        $pdf->SetLineWidth(0.5);
        $pdf->SetDrawColor(0, 0, 0); // Black color
        $pdf->Line(0, $linePosition, $pageWidth, $linePosition);

        // Set font for the text
        $pdf->SetFont('helvetica', '', 12);

        // Define the content to be repeated
        $content = "This is the repeated content.\n";

        // Number of repetitions
        $repetitions = 10;

        // Define the cell height and the initial Y position for the top section
        $cellHeight = 10;
        $topSectionY = 10;

        // Loop to add content in the top section
        for ($i = 0; $i < $repetitions; $i++) {
            $pdf->SetXY(10, $topSectionY + ($i * $cellHeight));
            $pdf->MultiCell(0, $cellHeight, $content, 0, 'L');
        }

        // Define the initial Y position for the bottom section
        $bottomSectionY = $linePosition + 10;

        // Loop to add content in the bottom section
        for ($i = 0; $i < $repetitions; $i++) {
            $pdf->SetXY(10, $bottomSectionY + ($i * $cellHeight));
            $pdf->MultiCell(0, $cellHeight, $content, 0, 'L');
        }

        // Output the PDF document
        $pdf->Output('blank_page_f4.pdf', 'I');
    }

    public function print_label_data()
    {
        // Ambil ID dari request
        $ids = $this->input->post('ids');

        // Pastikan ID tidak kosong
        if (empty($ids)) {
            echo 'Tidak ada data yang dipilih.';
            return;
        }

        // Ambil data berdasarkan IDs
        $this->load->model('Analisa_request_model');
        $dataList = $this->Analisa_request_model->get_data_label($ids);

        // Load TCPDF library
        $this->load->library('pdf');
        $pdf = new TCPDF('L', 'mm', array(160, 200), true, 'UTF-8', false);

        // Set informasi dokumen
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Nama Anda');
        $pdf->SetTitle('Label Data');
        $pdf->SetSubject('Label Data');

        // Hapus header dan footer default
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Set margin
        $pdf->SetMargins(0, 0, 0); // Tanpa margin
        $pdf->SetAutoPageBreak(TRUE, 0); // Nonaktifkan auto break

        // Tambah halaman
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 8);

        // Ukuran label
        $labelWidth = 40; // lebar label dalam mm (4 cm)
        $labelHeight = 20; // tinggi label dalam mm (2 cm)
        $padding = 2; // padding dalam mm

        // Ukuran label dengan padding
        $labelWidthWithPadding = $labelWidth - 2 * $padding;
        $labelHeightWithPadding = $labelHeight - 2 * $padding;

        // Posisi awal
        $x = $padding;
        $y = $padding;

        // Lebar maksimal halaman
        $pageWidth = 210; // 200 mm (lebar halaman)

        // Loop untuk setiap data
        foreach ($dataList as $data) {
            // Menambahkan <br> di awal dan setiap newline di konten label
            $labelContent = ($data->label_lab);
            $labelContent = '<br><br>' . str_replace("\n", '<br>', $labelContent); // Add initial <br> and replace newline with <br>

            // Ambil jumlah sample untuk data saat ini
            $jumlahSample = (int)$data->jumlah_sample;

            // Loop untuk setiap jumlah sample
            for ($i = 0; $i < $jumlahSample; $i++) {
                // Set posisi label dengan padding
                $pdf->SetXY($x, $y);

                // Tulis label tanpa border
                $pdf->writeHTMLCell(
                    $labelWidthWithPadding, // Lebar sel
                    $labelHeightWithPadding, // Tinggi sel
                    $x + $padding, // Posisi X dengan padding
                    $y + $padding, // Posisi Y dengan padding
                    $labelContent, // Konten label
                    0, // Border (0 untuk tanpa border)
                    1, // Line break
                    0, // Fill (0 untuk tanpa fill)
                    true, // Rescale
                    'C', // Align
                    true // Auto padding
                );

                // Geser posisi X untuk label berikutnya
                $x += $labelWidth;

                // Jika mencapai batas lebar halaman, reset X dan geser Y
                if ($x + $labelWidth > $pageWidth) {
                    $x = $padding;
                    $y += $labelHeight;
                }

                // Jika mencapai akhir halaman, tambahkan halaman baru
                if ($y + $labelHeight > 160) { // 160 mm tinggi halaman
                    $pdf->AddPage();
                    $x = $padding;
                    $y = $padding;
                }
            }
        }

        // Output PDF langsung ke browser
        $pdf->Output('label_data.pdf', 'I'); // 'I' untuk menampilkan di browser
    }



    public function update_proses_approval()
    {
        // Load model
        $this->load->model('User_model');
        $this->load->model('Analisa_request_model');

        // Ambil data IDs dari POST
        $ids = $this->input->post('ids');
        $current_time = date('Y-m-d H:i:s'); // Waktu saat ini

        $ka_unit_lab_analisa = $this->User_model->get_pernr_ka_unit_lab_analisa();

        // Pastikan IDs tidak kosong dan dalam format array
        if (empty($ids) || !is_array($ids)) {
            // Kirim respon error
            $response = array('status' => 'error', 'message' => 'Tidak ada ID yang diberikan atau format ID tidak valid.');
            echo json_encode($response);
            return;
        }

        // Pastikan data ka_unit_lab_analisa ada dan valid
        if (empty($ka_unit_lab_analisa)) {
            $response = array('status' => 'error', 'message' => 'Data Ka Unit Lab Analisa tidak ditemukan.');
            echo json_encode($response);
            return;
        }

        // Insert data approvals
        $approvals = [];
        foreach ($ids as $id) {
            $approvals[] = array(
                'id_req' => $id,
                'pernr' => $ka_unit_lab_analisa,
                'fitur' => 'Analisa'
            );
        }

        // Batch insert approvals
        if (!empty($approvals)) {
            $this->db->insert_batch('tb_request_approval', $approvals);
        }

        // Data untuk tracking 1
        $tracking_data1 = [];
        foreach ($ids as $id) {
            $tracking_data1[] = array(
                'id_req' => $id,
                'waktu_tracking' => $current_time,
                'desc_tracking' => 'Proses Administrasi di Lab Analisa'
            );
        }

        // Update berdasarkan kondisi desc_tracking
        foreach ($tracking_data1 as $data) {
            $this->db->where('id_req', $data['id_req']);
            $this->db->where('desc_tracking', 'Proses Administrasi di Lab Analisa');
            $this->db->update('tb_analisa_tracking', array('waktu_tracking' => $data['waktu_tracking']));
        }

        // Data untuk tracking 2
        $tracking_data2 = [];
        foreach ($ids as $id) {
            $tracking_data2[] = array(
                'id_req' => $id,
                'waktu_tracking' => date('Y-m-d H:i:s'),
                'desc_tracking' => 'Proses Approval Ka Unit Lab Analisa'
            );
        }

        // Insert batch untuk tracking 2
        if (!empty($tracking_data2)) {
            $this->db->insert_batch('tb_analisa_tracking', $tracking_data2);
        }

        // Lakukan update pada tabel tb_analisa_request_sap
        $this->Analisa_request_model->update_progress($ids, 'Approval Ka Unit Lab Analisa');


        // Ambil pernr dari tabel tb_master_user dengan kondisi jobdesk = 'Ka Unit Lab Analisa'
        $this->db->select('pernr');
        $this->db->from('tb_master_user');
        $this->db->where('jobdesk', 'Ka Unit Lab Analisa');
        $query = $this->db->get();
        $result = $query->row();

        // Pastikan $result tidak kosong sebelum mengakses pernr
        if ($result) {
            $notification_data = array(
                'pernr' => $result->pernr, // Mengambil data 'pernr' dari query
                'id_unit' => NULL,
                'template_id' => 4,
                'feature' => 'Karantina',
                'id_data_feature' => $id,
                'status' => 'pending'
            );

            // Insert ke dalam tabel sys_notifications
            $this->db->insert('sys_notifications', $notification_data);
        } else {
            log_message('error', 'Pernr tidak ditemukan untuk jobdesk Ka Unit Lab Analisa.');
        }

        // Kirim respon sukses
        $response = array('status' => 'success', 'message' => 'Data berhasil diperbarui.');
        echo json_encode($response);
    }




    public function get_selected_data()
    {
        $ids = $this->input->post('ids');


        $data = $this->Analisa_sample_model->get_selected_data($ids);

        echo json_encode($data);
    }

    public function fetch_memo_data()
    {
        // Ambil ID yang dipilih dari parameter POST
        $ids = $this->input->post('ids');

        // Panggil model untuk mendapatkan data yang terfilter
        $list = $this->Analisa_memo_model->get_datatables($ids);
        $penyelia_users = $this->User_model->get_penyelia_users(); // Mengambil data penyelia sebagai array
        $data = array();

        // Struktur data untuk mengelompokkan berdasarkan mstrchar
        $grouped_data = array();

        foreach ($list as $data_model) {
            $mstrchar = $data_model->mstrchar;

            if (!isset($grouped_data[$mstrchar])) {
                $grouped_data[$mstrchar] = array(
                    'no_karantina' => array(),
                    'desc' => array(),
                    'batch' => $data_model->batch,
                    'material' => $data_model->material,
                    'mstrchar' => $data_model->mstrchar,
                    'kode_proses_produksi' => $data_model->kode_proses_produksi,
                    'short_text' => $data_model->short_text,
                    'penyelia' => $data_model->penyelia,
                    'singkatan' => $data_model->singkatan,
                    'karantina_ke' => $data_model->karantina_ke,
                    'metode' => $data_model->metode,
                    'bentuk' => $data_model->bentuk
                );
            }

            // Tambahkan no_karantina dan desc ke dalam array
            $grouped_data[$mstrchar]['no_karantina'][] = $data_model->no_karantina;
            $grouped_data[$mstrchar]['desc'][] = $data_model->desc;
        }

        $no = $_POST['start'];
        foreach ($grouped_data as $mstrchar => $item) {
            $no++;
            $row = [];
            $row[] = $no;

            // Gabungkan no_karantina menjadi string yang dipisahkan koma
            $row[] = implode(', ', array_unique($item['no_karantina']));
            // Gabungkan desc menjadi string yang dipisahkan koma
            $row[] = implode(', ', array_unique($item['desc']));
            $row[] = $item['bentuk'];
            $row[] = $item['kode_proses_produksi'];
            $row[] = $item['singkatan'];
            $row[] = $item['karantina_ke'];
            $row[] = $item['batch'];
            $row[] = $mstrchar; // Menampilkan mstrchar
            $row[] = $item['short_text'];

            // Ubah input metode menjadi select option
            $row[] = '<input type="text" class="form-control form-control-sm metode-input" data-mstrchar="' . ($item['mstrchar']) . '" data-material="' . ($item['material']) . '" data-bentuk="' . ($item['bentuk']) . '" data-singkatan="' . ($item['singkatan']) . '" value="' . ($item['metode']) . '">';

            // Ubah input penyelia menjadi select option
            $select = '<select class="form-control form-control-sm penyelia-input" data-mstrchar="' . ($item['mstrchar']) . '" data-material="' . ($item['material']) . '" data-bentuk="' . ($item['bentuk']) . '" data-singkatan="' . ($item['singkatan']) . '">';
            // Tambahkan opsi default
            $default_selected = empty($item['penyelia']) ? 'selected' : '';
            $select .= '<option value="" ' . $default_selected . '>pilih penyelia</option>';
            foreach ($penyelia_users as $user) {
                $selected = ($user['pernr'] == $item['penyelia']) ? 'selected' : '';
                $select .= '<option value="' . ($user['pernr']) . '" ' . $selected . '>' . ($user['name']) . '</option>';
            }
            $select .= '</select>';
            $row[] = $select;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Analisa_memo_model->count_all($ids),
            "recordsFiltered" => $this->Analisa_memo_model->count_filtered($ids),
            "data" => $data,
        );
        echo json_encode($output);
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
            if ($data_model->status == 0) {
                $row[] = '<a class="btn btn-primary btn-sm"  href="javascript:void(0)">Menunggu</a>';
            } else if ($data_model->status == 1) {
                $row[] = '<a class="btn btn-success btn-sm"  href="javascript:void(0)">Disetujui</a>';
            } else if ($data_model->status == 2) {
                $row[] = '<a class="btn btn-danger btn-sm"  href="javascript:void(0)">Ditolak</a>';
            }


            $row[] = $data_model->desc_approval;

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
                'tanggal_ed' => $data->ed
            );
        } else {
            $response = array('status' => 'error');
        }

        echo json_encode($response);
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
}
