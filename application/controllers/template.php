<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
    }


    public function index()
    {


        $data['jumlah'] = $this->Glassware_model->jumlah();
        $data['title'] = 'Daftar Reagen & Media';
        $data['total_reagen'] = $this->Bahan_master_model->total_reagen();
        $data['jenis_cair'] = $this->Bahan_master_model->jenis_cair();
        $data['jenis_padat'] = $this->Bahan_master_model->jenis_padat();
        $data['jenis_prekursor'] = $this->Bahan_master_model->jenis_prekursor();
        $data['total_media'] = $this->Bahan_master_model->total_media();


        $data['dataSession'] = $this->Master_user_model->getDataUsername();
        $data['id_halaman']      = $this->uri->segment(2);
        $data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['title'] = 'Daftar Permintaan Karantina';
        $this->load->view('Template/header', $data);
        $this->load->view('analisa/index', $data);
    }

    public function list_analisa()
    {
        $list = $this->Analisa_request_model->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];


            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_karantina(' . "'" . $data_model->id_req  . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_karantina(' . "'" . $data_model->id_req  . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';
            // $row[] = '<input type="checkbox" class="select-checkbox">';
            $row[] = $no;



            $row[] = date('d-m-Y', strtotime($data_model->created_at));
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="info_analisa(' . "'" . $data_model->id  . "'" . ')">' . $data_model->id_req . '</a>';

            // $row[] = $data_model->id_req;
            // $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="action_karantina(' . "'" . $data_model->id_req  . "'" . ')">' . $data_model->id_req . ' </a>';
            // Urgent Badge

            if ($data_model->status_kar == "OPEN") {
                $row[] = '<a class="badge bg-primary" >OPEN</a>';
            } else {
                $row[] = '<a class="badge bg-dark">CLOSE</a>';
            }

            if ($data_model->urgent == 1) {
                $row[] = '<a class="badge bg-danger" >Urgent</a>';
            } else {
                $row[] = '<a class="badge bg-primary">Regular</a>';
            }
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="info_analisa" onclick="info_analisa(' . "'" . $data_model->id  . "'" . ')">' . $data_model->progress . '</a>';


            $row[] = $data_model->jenis;

            $row[]  = substr($data_model->material, 10);


            $row[] = $data_model->desc;
            $row[] = $data_model->quantity;
            $row[] = $data_model->uom;


            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="info_batch(' . "'" . $data_model->id_req  . "'" . ')">' . $data_model->batch . ' </a>';


            $row[] = $data_model->nama_qc;
            $row[] = $data_model->sloc;
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
