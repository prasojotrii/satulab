<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('Menu_model');


        if (empty($this->session->userdata("pernr"))) {
            redirect('auth/logout');
        }
        // else if ($this->session->userdata("tipe") != 'SysAdmin') {
        // 	redirect('user/index');
        // }
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
    public function get_data_master_menu()
    {
        $id_menu_level = 1;
        $data = $this->Menu_model->get_data_menu_level($id_menu_level);
        echo json_encode($data);
    }
    public function save_master_apps()
    {
        $data = array(


            'apps_name' => $this->input->post('apps_name'),

        );

        $this->Master_apps_model->save($data);

        echo json_encode(array("status" => TRUE));
    }



    public function get_master_apps($id)
    {
        $data = $this->Master_apps_model->get_data($id);

        echo json_encode($data);
    }

    public function update_master_apps()
    {
        $data = array(
            'apps_name' => $this->input->post('apps_name'),


        );

        $this->Master_apps_model->update(array('id' => $this->input->post('id_apps')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function delete_master_apps($id)
    {
        $this->Master_apps_model->delete($id);
        echo json_encode(array("status" => TRUE));
    }



    public function list_apps()
    {
        $data = $this->Master_apps_model->get_data_all();

        echo json_encode($data);
    }
}
