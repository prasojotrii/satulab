<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('User_Akses_model');
        $this->load->model('User_Role_model');
        $this->load->model('Master_Halaman_model');
        $this->load->model('User_Atasan_model');
        $this->load->model('User_model');


        $this->load->model('Master_user_model');
        $this->load->model('Master_unit_model');
        $this->load->model('Master_unit_sub_model');
        $this->load->model('Menu_model');
        $this->load->model('Master_user_akses');
        $this->load->model('Master_default_approval_model');
        $this->load->model('Master_list_approval');
        $this->load->model('Master_api_model');
        $this->load->model('Order_model');
        $this->load->model('Glassware_model');
        $this->load->model('Order_Persetujuan_model');



        // if (empty($this->session->userdata("pernr"))) {
        //     redirect('auth/logout');
        // }
        // else if ($this->session->userdata("tipe") != 'SysAdmin') {
        // 	redirect('user/index');
        // }
    }

    public function index()
    {
        $data['id_user'] = $this->User_model->Membuat_Kode_Otomatis();
        $data['dataSession'] = $this->Master_user_model->getDataUsername();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();
        $data['id_halaman']      = $this->uri->segment(2);


        $data['id_order'] = $this->Order_model->Membuat_Kode_Otomatis();

        $nama_barang = $this->input->get('nama_barang');
        $data['data'] = $this->Order_model->CariNamaBarang($nama_barang);
        $data['dataSatuan']      = $this->Order_model->dataSatuan();
        $data['dataKategori']      = $this->Order_model->dataKategori();
        $data['dataGlassawre']      = $this->Glassware_model->dataKategori();
        $data['dataStatus']      = $this->Order_model->dataStatus();
        $data['dataUkuran']      = $this->Order_model->dataUkuran();
        $data['dataSatuanUkuran']      = $this->Order_model->dataSatuanUkuran();
        $data['id_batch']      = $this->Order_Persetujuan_model->Kode_batch();
        // $data['id_order_unit']      = $this->Instrumen_Baru_model->KodePCR();
        $data['id_order_tiket']      = $this->Order_Persetujuan_model->Kode_tiket();



        $data['title'] = 'Daftar Order Internal Laboratorium';
        $this->load->view('template/header', $data);
        $this->load->view('order/list_order', $data);
    }

    public function list_master_menu()
    {
        $list = $this->Menu_model->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];


            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="btn_edit_master_menu(' . "'" . $data_model->id_menu . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="btn_delete_master_menu(' . "'" . $data_model->id_menu . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';

            $row[] = $no;
            $row[] = $data_model->menu_level;

            $row[] = $data_model->menu_name;

            $row[] = '<a class="btn btn-outline-primary btn-sm"><i class="' . $data_model->menu_icon . ' " ></i></a>';

            $row[] = $data_model->menu_title;
            $row[] = $data_model->menu_url;

            $data[] = $row;
        }


        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Menu_model->count_all(),
            'recordsFiltered' => $this->Menu_model->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

    public function save_master_menu()
    {
        $data = array(
            'id_menu' => '',
            'menu_level' => $this->input->post('id_menu_level'),
            'id_menu_parent' => $this->input->post('id_menu_parent'),
            'menu_name' => $this->input->post('menu_name'),
            'menu_icon' => $this->input->post('menu_icon'),
            'menu_title' => $this->input->post('menu_title'),
            'menu_url' => $this->input->post('menu_url'),
        );

        $this->Menu_model->save_menu($data);

        echo json_encode(array("status" => TRUE));
    }

    public function save_master_menu_parent()
    {
        $data = array(
            'id_menu' => '',
            'menu_level' => $this->input->post('id_menu_level'),
            'id_menu_parent' =>  $this->Menu_model->kode_id_menu_parent(),
            'menu_name' => $this->input->post('menu_name'),
            'menu_icon' => $this->input->post('menu_icon'),
            'menu_title' => $this->input->post('menu_title'),
            'menu_url' => $this->input->post('menu_url'),
        );

        $this->Menu_model->save_menu($data);

        echo json_encode(array("status" => TRUE));
    }
    public function update_master_menu()
    {
        $data = array(

            'menu_level' => $this->input->post('id_menu_level'),
            'id_menu_parent' =>  $this->input->post('id_menu_parent'),
            'menu_name' => $this->input->post('menu_name'),
            'menu_icon' => $this->input->post('menu_icon'),
            'menu_title' => $this->input->post('menu_title'),
            'menu_url' => $this->input->post('menu_url'),
        );

        $this->Menu_model->update(array('id_menu' => $this->input->post('id_menu')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_master_menu($id_menu)
    {
        $this->Menu_model->delete($id_menu);
        echo json_encode(array("status" => TRUE));
    }
    public function get_data_by_menu_level()
    {
        $id_menu_level = $this->input->post('id_menu_level');
        $data = $this->Menu_model->get_data_menu_level($id_menu_level);
        echo json_encode($data);
    }

    public function get_data_menu($id_menu)
    {
        $data = $this->Menu_model->get_data_menu($id_menu);

        echo json_encode($data);
    }
}
