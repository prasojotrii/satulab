<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use phpseclib3\Net\SFTP;

class Approval extends CI_Controller
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
        $this->load->model('User_model');
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

        // Mengatur zona waktu ke Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');
    }


    public function index()
    {

        $data['dataSession'] = $this->Master_user_model->getDataUsername();
        $data['id_halaman']      = $this->uri->segment(2);
        $data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['title'] = 'Daftar Approval';


        $this->load->view('Template/header', $data);
        $this->load->view('approval/index', $data);
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
                $row[] = '<a class="btn btn-success btn-sm"  href="javascript:void(0)">Approved</a>';
            } else if ($data_model->status == 2) {
                $row[] = '<a class="btn btn-danger btn-sm"  href="javascript:void(0)">Decline</a>';
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

    public function list_analisa()
    {
        $filters = array(

            'progress' => $this->input->post('progress'),
            // Tambahkan filter lainnya sesuai kebutuhan
        );
        $list = $this->Analisa_request_model->get_datatables($filters);

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];


            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_karantina(' . "'" . $data_model->id_req  . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_karantina(' . "'" . $data_model->id_req  . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';
            $row[] = '<input type="checkbox" class="select-checkbox">';
            $row[] = $no;



            $row[] = date('d-m-Y', strtotime($data_model->created_at));
            $row[] = 'Permintaan Analisa';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="info_analisa(' . "'" . $data_model->id_req  . "'" . ')">' . $data_model->no_karantina . '</a>';

            // $row[] = $data_model->id_req;
            // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="action_karantina(' . "'" . $data_model->id_req  . "'" . ')">' . $data_model->id_req . ' </a>';
            // Urgent Badge
            if ($data_model->urgent == 1) {
                $row[] = '<a class="btn btn-danger btn-sm" >Urgent</a>';
            } else {
                $row[] = '<a class="btn btn-primary btn-sm">Regular</a>';
            }


            // $row[] = $data_model->jenis;

            // $row[]  = substr($data_model->material, 10);


            // $row[] = $data_model->desc;
            // $row[] = $data_model->quantity;
            // $row[] = $data_model->uom;


            // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="info_batch(' . "'" . $data_model->id_req  . "'" . ')">' . $data_model->batch . ' </a>';
            // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="info_analisa(' . "'" . $data_model->id_req  . "'" . ')">' . $data_model->status_kar . '</a>';
            $row[] = $data_model->material;
            $row[] = $data_model->batch;
            $row[] = $data_model->nama_qc_label;
            $row[] = $data_model->sloc . ' - ' . $data_model->sloc_desc;
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

    public function update_approval()
    {
        $note = $this->input->post('note');
        $action = 'approved';
        $kesimpulan = $this->input->post('kesimpulan');
        $pernr = $this->input->post('pernr');
        $id_req = $this->input->post('id_req');
        $jumlah_hari = $this->input->post('jumlah_hari');
        $estimasi_ed = $this->input->post('estimasi_ed');
        // Ubah format tanggal dari DD-MM-YYYY ke YYYY-MM-DD

        // Validate pernr against session
        // if ($pernr != $this->session->userdata('pernr')) {
        //     echo json_encode(array('status' => FALSE, 'message' => 'Invalid pernr.'));
        //     return;
        // }


        // Fetch user data
        $this->db->select('id_req, no_karantina, progress, nama_qc');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();
        $user = $query->row();

        if ($user->progress === 'Approval Ka Unit Lab Analisa') {
            // Update approval status
            $result = $this->Approval_model->update_approval_status($note, $kesimpulan, 'approved', $pernr, $id_req);

            // Update existing tracking record
            // $this->db->where('id_req', $id_req);
            // $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
            // $this->db->update('tb_analisa_tracking', array(
            //     'waktu_tracking' => date('Y-m-d H:i:s')
            // ));

            // Insert new tracking record
            $tracking_data = array(
                'id_req' => $id_req,
                'waktu_tracking' => date('Y-m-d H:i:s'),
                'desc_tracking' => 'Proses Analisa Lab'
            );
            $this->db->insert('tb_analisa_tracking', $tracking_data);

            // Update progress in tb_analisa_request_sap table
            $this->db->where('id_req', $id_req);
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Sedang dianalisa Lab'
            ));

            // Fetch email of nama_qc from tb_master_user
            $this->db->select('email');
            $this->db->from('tb_master_user');
            $this->db->where('pernr', $user->nama_qc);
            $query = $this->db->get();
            $qc_user = $query->row();

            if ($qc_user) {
                $notification_data = array(
                    'pernr' =>  $user->nama_qc, // Mengambil data 'pernr' dari array
                    'id_unit' => NULL,
                    'template_id' => 8,
                    'feature' => 'Karantina',
                    'id_data_feature' => $id_req,
                    'status' => 'pending'
                );

                // Insert ke dalam tabel sys_notifications
                $this->db->insert('sys_notifications', $notification_data);
                $this->output
                    ->set_status_header(200) // OK
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => 'success')));
                log_message('error', 'Gagal mengirim email ke ' . $qc_user->email);
            } else {
                log_message('error', 'Nama QC tidak ditemukan atau email tidak tersedia.');
            }
        } else if ($user->progress === 'Approval Ka Unit R&D') {
            $result = $this->Approval_model->update_approval_status_rnd($note, $kesimpulan, $action, $pernr, $id_req,  $jumlah_hari);

            // // Format estimasi tanggal ED
            // $estimasi_ed_formatted = DateTime::createFromFormat('d-m-Y', $estimasi_ed);
            // if ($estimasi_ed_formatted) {
            //     $estimasi_ed_formatted = $estimasi_ed_formatted->format('Y-m-d');

            //     if (!empty($jumlah_hari)) {
            //         $data_update = array(
            //             'ed_plus' => $jumlah_hari,
            //             'ed_next' => $estimasi_ed_formatted
            //         );
            //         $this->db->where('id_req', $id_req);
            //         $this->db->update('tb_analisa_request_sap', $data_update);
            //     }
            // } else {
            //     echo "Format tanggal tidak valid: " . $estimasi_ed;
            // }

            // // Update status approval
            // $result = $this->Approval_model->update_approval_status($note, $kesimpulan, $action, $pernr, $id_req);

            // // Mendapatkan data deskripsi approval
            // $desc_approval_result = $this->Approval_model->get_desc_approval($id_req, 'Manager QC');
            // $desc_approval = $desc_approval_result ? $desc_approval_result->desc_approval : 'N/A';
            // $kesimpulan = $desc_approval_result ? $desc_approval_result->kesimpulan : 'N/A';

            $pending_approvals = $this->Approval_model->get_pending_approvals($id_req);

            if (!empty($pending_approvals)) {
                try {
                    // Update progress
                    // $this->Approval_model->update_progress_to_approval_koor($id_req);

                    foreach ($pending_approvals as $approval) {
                        $notification_data = array(
                            'pernr' => $approval['pernr'],
                            'template_id' => 4,
                            'feature' => 'Karantina',
                            'id_data_feature' => $id_req,
                            'status' => 'pending'
                        );

                        // Insert ke dalam tabel sys_notifications
                        if (!$this->db->insert('sys_notifications', $notification_data)) {
                            throw new Exception('Gagal memasukkan data notifikasi ke dalam tabel sys_notifications.');
                        }

                        // Update tracking record yang ada
                        $this->db->where('id_req', $id_req);
                        $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
                        if (!$this->db->update('tb_analisa_tracking', array('waktu_tracking' => date('Y-m-d H:i:s')))) {
                            throw new Exception('Gagal mengupdate waktu_tracking dalam tabel tb_analisa_tracking.');
                        }

                        // Insert record tracking baru berdasarkan jobdesk
                        $jobdesk = $this->Approval_model->get_jobdesk_by_pernr($approval['pernr']);

                        if ($jobdesk === 'Manager R&D') {
                            $tracking_data = array(
                                'id_req' => $id_req,
                                'waktu_tracking' => NULL,
                                'desc_tracking' => 'Proses Approval Manager R&D'
                            );
                        } elseif ($jobdesk === 'Manager QC') {
                            $tracking_data = array(
                                'id_req' => $id_req,
                                'waktu_tracking' => NULL,
                                'desc_tracking' => 'Proses Approval Manager QC'
                            );
                        }

                        if (isset($tracking_data) && !$this->db->insert('tb_analisa_tracking', $tracking_data)) {
                            throw new Exception('Gagal memasukkan data tracking ke dalam tabel tb_analisa_tracking.');
                        }
                    }
                } catch (Exception $e) {
                    log_message('error', $e->getMessage()); // Log error ke file log CodeIgniter
                    echo 'Terjadi kesalahan: ' . $e->getMessage(); // Menampilkan pesan kesalahan
                }
            }




            $notification_data = array(
                'pernr' => $user->nama_qc,
                'id_unit' => NULL,
                'template_id' => 1,
                'feature' => 'Karantina',
                'id_data_feature' => $id_req,
                'status' => 'pending'
            );

            // Insert ke dalam tabel sys_notifications
            $this->db->insert('sys_notifications', $notification_data);

            // Update existing tracking record (if needed)
            $this->db->where('id_req', $id_req);
            $this->db->where('waktu_tracking IS NULL', NULL, FALSE); // Filter untuk baris dengan waktu_tracking NULL
            $this->db->update('tb_analisa_tracking', array(
                'waktu_tracking' => date('Y-m-d H:i:s')
            ));



            $this->db->where('id_req', $id_req);
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Approval Manager R&D'
            ));

            $this->output
                ->set_status_header(200) // OK
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'success')));
        } else if ($user->progress === 'Approval Manager R&D') {

            $result = $this->Approval_model->update_approval_status_rnd($note, $kesimpulan, $action, $pernr, $id_req,  $jumlah_hari);
            // // Format estimasi tanggal ED
            // $estimasi_ed_formatted = DateTime::createFromFormat('d-m-Y', $estimasi_ed);
            // if ($estimasi_ed_formatted) {
            //     $estimasi_ed_formatted = $estimasi_ed_formatted->format('Y-m-d');

            //     if (!empty($jumlah_hari)) {
            //         $data_update = array(
            //             'ed_plus' => $jumlah_hari,
            //             'ed_next' => $estimasi_ed_formatted
            //         );
            //         $this->db->where('id_req', $id_req);
            //         $this->db->update('tb_analisa_request_sap', $data_update);
            //     }
            // } else {
            //     echo "Format tanggal tidak valid: " . $estimasi_ed;
            // }

            // // Update status approval
            // $result = $this->Approval_model->update_approval_status($note, $kesimpulan, $action, $pernr, $id_req);

            // // Mendapatkan data deskripsi approval
            // $desc_approval_result = $this->Approval_model->get_desc_approval($id_req, 'Manager QC');
            // $desc_approval = $desc_approval_result ? $desc_approval_result->desc_approval : 'N/A';
            // $kesimpulan = $desc_approval_result ? $desc_approval_result->kesimpulan : 'N/A';

            $pending_approvals = $this->Approval_model->get_pending_approvals($id_req);

            if (!empty($pending_approvals)) {
                try {
                    // Update progress
                    // $this->Approval_model->update_progress_to_approval_koor($id_req);

                    foreach ($pending_approvals as $approval) {
                        $notification_data = array(
                            'pernr' => $approval['pernr'],
                            'template_id' => 4,
                            'feature' => 'Karantina',
                            'id_data_feature' => $id_req,
                            'status' => 'pending'
                        );

                        // Insert ke dalam tabel sys_notifications
                        if (!$this->db->insert('sys_notifications', $notification_data)) {
                            throw new Exception('Gagal memasukkan data notifikasi ke dalam tabel sys_notifications.');
                        }

                        // Update tracking record yang ada
                        $this->db->where('id_req', $id_req);
                        $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
                        if (!$this->db->update('tb_analisa_tracking', array('waktu_tracking' => date('Y-m-d H:i:s')))) {
                            throw new Exception('Gagal mengupdate waktu_tracking dalam tabel tb_analisa_tracking.');
                        }

                        // Insert record tracking baru berdasarkan jobdesk
                        $jobdesk = $this->Approval_model->get_jobdesk_by_pernr($approval['pernr']);

                        if ($jobdesk === 'Manager R&D') {
                            $tracking_data = array(
                                'id_req' => $id_req,
                                'waktu_tracking' => NULL,
                                'desc_tracking' => 'Proses Approval Manager R&D'
                            );
                        } elseif ($jobdesk === 'Manager QC') {
                            $tracking_data = array(
                                'id_req' => $id_req,
                                'waktu_tracking' => NULL,
                                'desc_tracking' => 'Proses Approval Manager QC'
                            );
                        }

                        if (isset($tracking_data) && !$this->db->insert('tb_analisa_tracking', $tracking_data)) {
                            throw new Exception('Gagal memasukkan data tracking ke dalam tabel tb_analisa_tracking.');
                        }
                    }
                } catch (Exception $e) {
                    log_message('error', $e->getMessage()); // Log error ke file log CodeIgniter
                    echo 'Terjadi kesalahan: ' . $e->getMessage(); // Menampilkan pesan kesalahan
                }
            }



            $notification_data = array(
                'pernr' => $user->nama_qc,
                'id_unit' => NULL,
                'template_id' => 1,
                'feature' => 'Karantina',
                'id_data_feature' => $id_req,
                'status' => 'pending'
            );

            // Insert ke dalam tabel sys_notifications
            $this->db->insert('sys_notifications', $notification_data);

            // Update existing tracking record (if needed)
            $this->db->where('id_req', $id_req);
            $this->db->where('waktu_tracking IS NULL', NULL, FALSE); // Filter untuk baris dengan waktu_tracking NULL
            $this->db->update('tb_analisa_tracking', array(
                'waktu_tracking' => date('Y-m-d H:i:s')
            ));

            // Insert tracking baru


            $this->db->where('id_req', $id_req);
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Approval Manager QC'
            ));

            $this->output
                ->set_status_header(200) // OK
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'success')));
        } else if ($user->progress === 'Approval Manager QC') {


            // Jika $jumlah_hari ada, update kolom ed_plus dan ed_next di tabel tb_analisa_request_sap

            $estimasi_ed_formatted = DateTime::createFromFormat('d-m-Y', $estimasi_ed);

            if ($estimasi_ed_formatted) {
                $estimasi_ed_formatted = $estimasi_ed_formatted->format('Y-m-d');

                if (!empty($jumlah_hari)) {
                    $data_update = array(
                        'ed_plus' => $jumlah_hari,
                        'ed_next' => $estimasi_ed_formatted
                    );

                    $this->db->where('id_req', $id_req);
                    $this->db->update('tb_analisa_request_sap', $data_update);
                }
            }


            // Update approval status
            $result = $this->Approval_model->update_approval_status($note, $kesimpulan, $action, $pernr, $id_req);


            $this->db->select('desc_approval, kesimpulan');
            $this->db->from('view_request_approval');
            $this->db->where('id_req', $id_req);
            $this->db->where('jobdesk', 'Manager QC');
            $desc_approval_result = $this->db->get()->row();

            $desc_approval = $desc_approval_result ? $desc_approval_result->desc_approval : 'N/A';
            $kesimpulan = $desc_approval_result ? $desc_approval_result->kesimpulan : 'N/A';

            // Fetch email of nama_qc from tb_master_user
            $this->db->select('email');
            $this->db->from('tb_master_user');
            $this->db->where('pernr', $user->nama_qc); // pastikan $user sudah diinisialisasi
            $query = $this->db->get();
            $qc_user = $query->row();

            if ($user->nama_qc) {
                // Inisialisasi pesan email
                // $message = "Kepada Yth Bapak/Ibu,<br><br>";
                // $message .= 'Karantina dengan nomor ' . $user->no_karantina . ' telah selesai. Hasil keputusan dari Manager QC adalah ' . $kesimpulan . ' dan keterangan tambahan : ' . $desc_approval . '.<br>';
                // $message .= "Untuk lebih detailnya, mohon untuk mengakses sistem Satu Lab pada link berikut ini:<br>";
                // $message .= '<a href="' . base_url() . '">Satu Lab</a><br><br>';
                // $message .= "Terima Kasih,<br><br>";
                // $message .= "Satu Lab";

                // // Konfigurasi pengiriman email
                // $this->email->from('alerts.smsuite@gmail.com', 'Satu Lab');
                // $this->email->to($qc_user->email);
                // $this->email->subject('Keputusan Karantina ' . $user->no_karantina);
                // $this->email->message($message);


                $notification_data = array(
                    'pernr' =>  $user->nama_qc, // Mengambil data 'pernr' dari array
                    'id_unit' => NULL,
                    'template_id' => 1,
                    'feature' => 'Karantina',
                    'id_data_feature' => $id_req,
                    'status' => 'pending'
                );

                // Insert ke dalam tabel sys_notifications
                $this->db->insert('sys_notifications', $notification_data);

                // Cek apakah email berhasil dikirim

                // Update existing tracking record (if needed)
                $this->db->where('id_req', $id_req);
                $this->db->where('waktu_tracking IS NULL', NULL, FALSE); // Filter untuk baris dengan waktu_tracking NULL
                $this->db->update('tb_analisa_tracking', array(
                    'waktu_tracking' => date('Y-m-d H:i:s')
                ));

                // Insert new tracking record
                $tracking_data = array(
                    'id_req' => $id_req,
                    'waktu_tracking' => date('Y-m-d H:i:s'),
                    'desc_tracking' => 'Karantina Selesai'
                );
                $this->db->insert('tb_analisa_tracking', $tracking_data);

                // Update progress in tb_analisa_request_sap table
                $this->db->where('id_req', $id_req);
                $this->db->update('tb_analisa_request_sap', array(
                    'progress' => 'Karantina Selesai',
                    'status_kar' => 'Close'
                ));

                $this->kirim_ftp_sap($id_req);
            } else {
                log_message('error', 'Nama QC tidak ditemukan atau email tidak tersedia.');
            }
        } else  if ($user->progress === 'Approval hasil analisa') {
            // Update approval status
            $result = $this->Approval_model->update_approval_status($note, $kesimpulan, 'approved', $pernr, $id_req);

            // Update existing tracking record
            // $this->db->where('id_req', $id_req);
            // $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
            // $this->db->update('tb_analisa_tracking', array(
            //     'waktu_tracking' => date('Y-m-d H:i:s')
            // ));

            // Insert new tracking record
            $tracking_data = array(
                'id_req' => $id_req,
                'waktu_tracking' => date('Y-m-d H:i:s'),
                'desc_tracking' => 'Proses Input data analisa Lab'
            );
            $this->db->insert('tb_analisa_tracking', $tracking_data);

            // Update progress in tb_analisa_request_sap table
            $this->db->where('id_req', $id_req);
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Input data analisa Lab'
            ));
        } else  if ($user->progress === 'Approval Ka Unit' || $user->progress === 'Approval Koordinator') {
            if ($action == 'approved') {
                // Approve action
                $result = $this->Approval_model->update_approval_status($note,  $kesimpulan, 'approved', $pernr, $id_req);

                if ($result) {
                    // Handle pending approvals
                    $pending_approvals = $this->Approval_model->get_pending_approvals($id_req);



                    if (!empty($pending_approvals)) {
                        try {
                            // Update progress menjadi approval koordinator
                            $this->Approval_model->update_progress_to_approval_koor($id_req);

                            // Konfigurasi email
                            $this->email->from('alerts.smsuite@gmail.com', 'Satu Lab');
                            $this->email->subject('Permintaan Persetujuan Analisa Bahan Karantina');

                            foreach ($pending_approvals as $approval) {
                                $nama = $approval['pernr'];
                                $notification_data = array(
                                    'pernr' => $nama,
                                    'template_id' => 4,
                                    'feature' => 'Karantina',
                                    'id_data_feature' => $id_req,
                                    'status' => 'pending'
                                );

                                // Insert ke dalam tabel sys_notifications
                                if (!$this->db->insert('sys_notifications', $notification_data)) {
                                    throw new Exception('Gagal memasukkan data notifikasi ke dalam tabel sys_notifications.');
                                }

                                // Update record tracking yang ada
                                $this->db->where('id_req', $id_req);
                                $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
                                if (!$this->db->update('tb_analisa_tracking', array('waktu_tracking' => date('Y-m-d H:i:s')))) {
                                    throw new Exception('Gagal mengupdate waktu_tracking dalam tabel tb_analisa_tracking.');
                                }

                                // Insert record tracking baru
                                $tracking_data = array(
                                    'id_req' => $id_req,
                                    'waktu_tracking' => NULL,
                                    'desc_tracking' => 'Proses Approval Koordinator QC'
                                );



                                if (!$this->db->insert('tb_analisa_tracking', $tracking_data)) {
                                    throw new Exception('Gagal memasukkan data tracking ke dalam tabel tb_analisa_tracking.');
                                }

                                $this->output
                                    ->set_status_header(200) // OK
                                    ->set_content_type('application/json')
                                    ->set_output(json_encode(array('status' => 'success')));
                            }
                        } catch (Exception $e) {
                            log_message('error', $e->getMessage()); // Log error ke file log CodeIgniter
                            echo 'Terjadi kesalahan: ' . $e->getMessage(); // Menampilkan pesan kesalahan
                        }
                    } else {
                        // Mengecek apakah dlab atau drnd bernilai 1 berdasarkan id_req
                        $this->db->select('dlab, drnd');
                        $this->db->from('tb_analisa_request_sap');
                        $this->db->where('id_req', $id_req);

                        $query = $this->db->get();

                        if ($query->num_rows() > 0) {
                            $result = $query->row_array();

                            // Update waktu tracking
                            $this->db->where('id_req', $id_req);
                            $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
                            $this->db->update('tb_analisa_tracking', array(
                                'waktu_tracking' => date('Y-m-d H:i:s')
                            ));

                            if ($result['dlab'] == 1) {
                                // Proses untuk dlab saja
                                $this->proses_cetak_label_dlab($id_req);
                            } elseif ($result['drnd'] == 1 && $result['dlab'] != 1) {
                                // Proses untuk drnd saja
                                $this->proses_cetak_label_drnd($id_req);
                            } elseif ($result['dlab'] != 1 && $result['drnd'] != 1) {
                                // Proses jika tidak ada dlab dan drnd
                                $this->proses_approval_manager_qc($id_req);
                            }
                        } else {
                            echo json_encode(array('status' => 'false'));
                        }
                    }
                } else {
                    echo json_encode(array('status' => 'false', 'message' => 'Gagal memperbarui persetujuan.'));
                }
            } else if ($action == 'reject') {
                // Reject action
                $result = $this->Approval_model->update_approval_status($note,  $kesimpulan, 'rejected', $pernr, $id_req);

                if ($result) {
                    // Add tracking record for rejection
                    $this->db->where('id_req', $id_req);
                    $this->db->where('waktu_tracking IS NULL', NULL, FALSE);
                    $this->db->update('tb_analisa_tracking', array(
                        'waktu_tracking' => date('Y-m-d H:i:s')
                    ));

                    $tracking_data = array(
                        'id_req' => $id_req,
                        'waktu_tracking' => date('Y-m-d H:i:s'),
                        'desc_tracking' => 'Analisa Ditolak'
                    );
                    $this->db->insert('tb_analisa_tracking', $tracking_data);

                    // Update request status
                    $this->db->where('id_req', $id_req);
                    $this->db->update('tb_analisa_request_sap', array(
                        'progress' => 'Selesai',
                        'status_kar' => 'CLOSE'
                    ));

                    // Send email to requestor
                    $email_requestor = $this->Approval_model->get_email_requestor_by_id($id_req);
                    $notification_data = array(
                        'pernr' => $email_requestor['nama_qc'], // Mengambil data 'pernr' dari array
                        'template_id' => 3,
                        'feature' => 'Karantina',
                        'id_data_feature' => $id_req,
                        'status' => 'pending'
                    );

                    // Insert ke dalam tabel sys_notifications
                    $this->db->insert('sys_notifications', $notification_data);
                    echo json_encode(array('status' => 'success', 'message' => 'reject'));
                } else {
                    echo json_encode(array('status' => 'false', 'message' => 'Gagal memperbarui persetujuan.'));
                }
            } else {
                echo json_encode(array('status' => 'false', 'message' => 'Invalid action.'));
            }
        }
    }

    private function proses_cetak_label_dlab($id_req)
    {
        // Menyisipkan data tracking
        $tracking_data = array(
            array(
                'id_req' => $id_req,
                'waktu_tracking' => NULL,
                'desc_tracking' => 'Proses mencetak label ke sample',
                'unit_progress' => ''
            )
        );
        $this->db->insert_batch('tb_analisa_tracking', $tracking_data);

        // Update progress
        $this->Approval_model->update_progress_to_cetak_label($id_req);

        // Kirim notifikasi
        $this->kirim_notifikasi($id_req, 8);

        echo json_encode(array('status' => 'success'));
    }


    private function proses_cetak_label_drnd($id_req)
    {
        // Menyisipkan data tracking
        $tracking_data = array(
            array(
                'id_req' => $id_req,
                'waktu_tracking' => NULL,
                'desc_tracking' => 'Proses mencetak label ke sample',
                'unit_progress' => ''
            ),
            array(
                'id_req' => $id_req,
                'waktu_tracking' => date("Y-m-d H:i:s"),
                'desc_tracking' => 'Pengiriman data status approval ke system R&D',
                'unit_progress' => 'R&D'
            )
        );
        $this->db->insert_batch('tb_analisa_tracking', $tracking_data);

        // Kirim status ke API R&D
        $this->send_status_to_api_rnd($id_req);

        // Update progress
        $this->Approval_model->update_progress_to_cetak_label($id_req);

        // Kirim notifikasi
        $this->kirim_notifikasi($id_req, 8);

        echo json_encode(array('status' => 'success'));
    }

    private function kirim_notifikasi($id_req, $template_id)
    {
        $email_requestor = $this->Approval_model->get_email_requestor_by_id($id_req);

        if (!empty($email_requestor)) {
            $notification_data = array(
                'pernr' => $email_requestor['nama_qc'],
                'template_id' => $template_id,
                'feature' => 'Karantina',
                'id_data_feature' => $id_req,
                'status' => 'pending'
            );
            $this->db->insert('sys_notifications', $notification_data);
        }
    }

    private function proses_approval_manager_qc($id_req)
    {
        $datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $current_time = $datetime->format('Y-m-d H:i:s');

        // Mendapatkan data Manager QC
        $manager_qc = $this->User_model->get_data_manager_qc();

        if ($manager_qc) {
            // Menyisipkan data approval ke tabel tb_request_approval
            $approvals = array(
                'id_req' => $id_req,
                'pernr' => $manager_qc['pernr'],
                'fitur' => 'Analisa'
            );
            $this->db->insert('tb_request_approval', $approvals);

            // Menyisipkan notifikasi ke sys_notifications
            $notification_data = array(
                'pernr' => $manager_qc['pernr'],
                'id_unit' => NULL,
                'template_id' => 4,
                'feature' => 'Karantina',
                'id_data_feature' => $id_req,
                'status' => 'pending'
            );
            $this->db->insert('sys_notifications', $notification_data);

            // Menyisipkan tracking data untuk approval Manager QC
            $tracking_data2 = array(
                'id_req' => $id_req,
                'waktu_tracking' => NULL,
                'desc_tracking' => 'Proses approval Manager QC'
            );
            $this->db->insert('tb_analisa_tracking', $tracking_data2);

            // Melakukan update pada kolom progress dan waktu_out_lab
            $this->db->update('tb_analisa_request_sap', array(
                'progress' => 'Approval Manager QC',
                'waktu_out_lab' => $current_time
            ), array('id_req' => $id_req));

            $this->output
                ->set_status_header(200) // OK
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'success')));
        } else {
            echo json_encode(array('status' => false, 'message' => 'Manager QC tidak ditemukan.'));
        }
    }
    // Fungsi untuk mengirim data cURL ke API
    public function send_status_to_api_rnd($id_req)
    {
        // URL API yang akan diakses
        $url = "http://192.168.220.2/js/api/v1/statusapproval?id_req=" . $id_req . "&status=Completed";

        // Inisialisasi cURL
        $ch = curl_init();

        // Menyiapkan opsi cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        // Eksekusi cURL
        $response = curl_exec($ch);

        // Cek apakah terjadi kesalahan
        if (curl_errno($ch)) {
            // Menampilkan error jika terjadi kesalahan
            log_message('error', 'cURL Error: ' . curl_error($ch)); // Menyimpan error ke log
        } else {
            // Menampilkan respons jika tidak ada kesalahan
            log_message('info', 'API Response: ' . $response); // Menyimpan respons ke log
        }

        // Menutup cURL
        curl_close($ch);
    }


    public function kirim_ftp_sap($id_req)
    {
        // Informasi koneksi FTP
        $ftp_server = '19.0.2.22';  // Jangan gunakan 'ftp://' di sini
        $ftp_user = 'karantinadev';
        $ftp_pass = 'karantinadev';
        $remote_dir = '/New';  // Direktori tujuan di server FTP
        $ftp_port = 2121;      // Gunakan port 2121 untuk koneksi FTP

        // Panggil fungsi model untuk mengambil data
        $sap_data = $this->Analisa_request_model->get_data_sap_by_id_req($id_req);
        $spec_data = $this->Analisa_request_model->get_data_spec_by_id_req($id_req);

        if ($sap_data) {
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

            // Encode data ke JSON
            $json_data = json_encode($response, JSON_PRETTY_PRINT);

            // Simpan file JSON
            $date_time = date('Y-m-d_H-i-s');
            $file_name = "data_$date_time.json";
            $file_path = FCPATH . "upload_hasil_analisa/" . $file_name;
            file_put_contents($file_path, $json_data);

            // Cek apakah file lokal ada
            if (!file_exists($file_path)) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode(['message' => 'Local file not found']));
                return;
            }

            // Persiapkan CURL untuk upload ke FTP dengan port 2121
            $remote_file = $remote_dir . '/' . basename($file_path);
            $ch = curl_init();

            // Set CURL options
            curl_setopt($ch, CURLOPT_URL, "ftp://$ftp_server:$ftp_port$remote_file");  // Menggunakan $ftp_server tanpa 'ftp://'
            curl_setopt($ch, CURLOPT_USERPWD, "$ftp_user:$ftp_pass");
            curl_setopt($ch, CURLOPT_UPLOAD, 1);
            curl_setopt($ch, CURLOPT_INFILE, fopen($file_path, 'r'));
            curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_path));
            curl_setopt($ch, CURLOPT_FTP_CREATE_MISSING_DIRS, true); // Membuat direktori jika tidak ada

            // Jalankan CURL
            if (curl_exec($ch)) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(['status' => 'success', 'message' => 'File berhasil diupload ke FTP']));
            } else {
                $error_msg = curl_error($ch);
                $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(500)
                    ->set_output(json_encode(['message' => 'Failed to upload file to FTP server', 'error' => $error_msg]));
            }

            // Tutup CURL
            curl_close($ch);
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(404)
                ->set_output(json_encode(['message' => 'Data not found']));
        }
    }



    public function send_fonnte_notification($message)
    {
        // $message = [
        //     "number" => "6285700060750",
        //     "message" => "Aplikasi Satu Lab, Gagal mengunggah file"
        // ];

        $url = "http://19.0.2.108:9000/send-message";
        $ch = curl_init();

        // Ubah $message menjadi JSON
        $json_message = json_encode($message);

        // Set opsi cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_message); // Gunakan data JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json', // Format JSON
            'Accept: application/json'
        ]);

        // Eksekusi cURL dan tangkap respons
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Tutup cURL
        curl_close($ch);

        // Cek hasil
        // if ($http_code == 200) {
        //     echo "Pesan berhasil dikirim: " . $response;
        // } else {
        //     echo "Gagal mengirim pesan. HTTP Code: $http_code. Respons: " . $response;
        // }
    }


    public function validate_request()
    {

        $id_req = $this->input->post('id_req');
        // Get pernr from session
        $pernr = $this->session->userdata('pernr');

        // Validate the request
        $is_valid = $this->Approval_model->check_request($id_req, $pernr);

        echo json_encode(array('show_footer' => $is_valid));
    }
}
