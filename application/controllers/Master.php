<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
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

        $this->load->helper('text');

        if (empty($this->session->userdata("pernr"))) {
            redirect('auth/logout');
        }
        // else if ($this->session->userdata("tipe") != 'SysAdmin') {
        // 	redirect('user/index');
        // }

        date_default_timezone_set('Asia/Jakarta');

        // Mendapatkan waktu saat ini dalam format yang diinginkan

    }


    public function user()
    {
        $data['id_user'] = $this->User_model->Membuat_Kode_Otomatis();
        $data['dataSession'] = $this->Master_user_model->getDataUsername();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();
        $data['id_halaman']      = $this->uri->segment(2);
        $data['title'] = 'Daftar User';
        $this->load->view('Template/header', $data);
        $this->load->view('master/user', $data);
    }

    public function menu()
    {
        $data['id_user'] = $this->User_model->Membuat_Kode_Otomatis();
        $data['dataSession'] = $this->Master_user_model->getDataUsername();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();
        $data['id_halaman']      = $this->uri->segment(2);
        $data['title'] = 'Daftar Halaman';
        $this->load->view('Template/header', $data);
        $this->load->view('master/menu', $data);
    }


    public function api()
    {
        $data['id_user'] = $this->User_model->Membuat_Kode_Otomatis();
        $data['dataSession'] = $this->Master_user_model->getDataUsername();
        $data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
        $data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();
        $data['id_halaman']      = $this->uri->segment(2);
        $data['title'] = 'Daftar API';
        $this->load->view('Template/header', $data);
        $this->load->view('master/api', $data);
    }


    public function simpan_edit_Profil()
    {
        // $this->_validate();
        $data = array(

            'name' => $this->input->post('input_nama'),


            'password' => password_hash($this->input->post('input_password'), PASSWORD_DEFAULT),

        );
        $this->Master_user_model->update(array('id_user' => $this->input->post('input_id_user')), $data);
        echo json_encode(array("status" => TRUE));
    }




    public function list_master_user()
    {
        $list = $this->Master_user_model->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_user(' . "'" . $data_model->id_user . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_user(' . "'" . $data_model->id_user . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';
            $row[] = $no;



            if ($data_model->locked == 0) {
                $locked = '
				
				<div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onclick="lock_user(' . "'" . $data_model->id_user . "'" . ',1 )" value="1" id="active">
                </div>
			
				';
            } else {
                $locked = '
				
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" onclick="lock_user(' . "'" . $data_model->id_user . "'" . ',0 )"  value="0" id="active" checked>
                </div>
			
				';
            }
            $row[] = $locked;
            $row[] = '<a class="btn btn-primary btn-sm" onclick="list_akses_menu(' . "'" . $data_model->pernr . "'" . ')" href="javascript:void(0)" >' . $data_model->tipe . '</a>
			
			';





            $row[] = $data_model->pernr;
            $row[] = $data_model->name;
            $row[] = $data_model->email;
            $row[] = $data_model->sub_unit_names;
            $row[] = $data_model->unit_name;
            $row[] = $data_model->jobdesk;
            $row[] = $data_model->last_login;



            // if ($data_model->valid_at == '0000-00-00') {
            //     $row[] = ''; // Menampilkan nilai kosong
            // } else {
            //     $row[] = $data_model->valid_at; // Menampilkan nilai valid_at
            // }


            $data[] = $row;
        }

        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Master_user_model->count_all(),
            'recordsFiltered' => $this->Master_user_model->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    public function list_user_akses()
    {
        $list = $this->Master_user_akses->get_datatables();

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $Master_user_akses) {
            $no++;
            $row = array();
            $row[] = '

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_akses(' . "'" . $Master_user_akses->id_akses . "'" . ')">
			<i class="fas fa-trash-alt"></i> </a>
			';

            $row[] = $no;
            $row[] = $Master_user_akses->pernr;

            if ($Master_user_akses->view == 0) {
                $view = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikview(' . "'" . $Master_user_akses->id_akses . "'" . ', 1)"><i class="fas fa-window-close"></i></a>
				
				';
            } else {
                $view = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikview(' . "'" . $Master_user_akses->id_akses . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
            }

            if ($Master_user_akses->create == 0) {
                $create = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikcreate(' . "'" . $Master_user_akses->id_akses . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
            } else {
                $create = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikcreate(' . "'" . $Master_user_akses->id_akses . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
            }

            if ($Master_user_akses->update == 0) {
                $update = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikupdate(' . "'" . $Master_user_akses->id_akses . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
            } else {
                $update = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikupdate(' . "'" . $Master_user_akses->id_akses . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
            }
            if ($Master_user_akses->delete == 0) {
                $delete = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikdelete(' . "'" . $Master_user_akses->id_akses . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
            } else {
                $delete = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikdelete(' . "'" . $Master_user_akses->id_akses . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
            }
            $row[] = $Master_user_akses->menu_name;

            $row[] = $view;
            $row[] = $create;
            $row[] = $update;
            $row[] = $delete;
            //add html for action


            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Master_user_akses->count_all(),
            "recordsFiltered" => $this->Master_user_akses->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function list_master_unit()
    {
        $list = $this->Master_unit_model->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_unit(' . "'" . $data_model->id_unit . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_unit(' . "'" . $data_model->id_unit . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';
            $row[] = $no;

            $row[] = '<a class="btn btn-primary btn-sm" onclick="add_unit_sub(' . "'" . $data_model->id_unit . "'" . ')" href="javascript:void(0)" >' . $data_model->unit_name . '</a>
			
			';
            $row[] = $data_model->unit_cost_center;
            $row[] = $data_model->email;

            $row[] = $data_model->company_parent;




            // if ($data_model->valid_at == '0000-00-00') {
            //     $row[] = ''; // Menampilkan nilai kosong
            // } else {
            //     $row[] = $data_model->valid_at; // Menampilkan nilai valid_at
            // }


            $data[] = $row;
        }

        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Master_unit_model->count_all(),
            'recordsFiltered' => $this->Master_unit_model->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

    public function list_master_unit_sub()
    {
        $list = $this->Master_unit_sub_model->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_unit_sub(' . "'" . $data_model->id_unit_sub . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_unit_sub(' . "'" . $data_model->id_unit_sub . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';
            $row[] = $no;
            $row[] = $data_model->sub_unit_name;

            $row[] = $data_model->sub_unit_inisial;
            $row[] = $data_model->email_sub_unit;






            // if ($data_model->valid_at == '0000-00-00') {
            //     $row[] = ''; // Menampilkan nilai kosong
            // } else {
            //     $row[] = $data_model->valid_at; // Menampilkan nilai valid_at
            // }


            $data[] = $row;
        }

        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Master_unit_sub_model->count_all(),
            'recordsFiltered' => $this->Master_unit_sub_model->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
    }

    public function list_default_approval()
    {
        $list = $this->Master_default_approval_model->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_default_approval(' . "'" . $data_model->id_default_approval . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_default_approval(' . "'" . $data_model->id_default_approval . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';
            $row[] = $no;
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" onclick="list_default_approval(' . "'" . $data_model->id_default_approval . "'" . ')">' . $data_model->name_default . ' </a>';
            $row[] = $data_model->name_default;





            // if ($data_model->valid_at == '0000-00-00') {
            //     $row[] = ''; // Menampilkan nilai kosong
            // } else {
            //     $row[] = $data_model->valid_at; // Menampilkan nilai valid_at
            // }


            $data[] = $row;
        }

        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Master_default_approval_model->count_all(),
            'recordsFiltered' => $this->Master_default_approval_model->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    public function save_default_approval()
    {
        $data = array(

            'name_default' => $this->input->post('name_default'),

        );

        $this->Master_default_approval_model->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function delete_default_approval($id_default_approval)
    {
        $this->Master_default_approval_model->delete($id_default_approval);
        echo json_encode(array("status" => TRUE));
    }

    public function get_data_default_approval($id_default_approval)
    {
        $data = $this->Master_default_approval_model->get_data($id_default_approval);

        echo json_encode($data);
    }
    public function update_default_approval()
    {
        $data = array(
            'name_default' => $this->input->post('name_default'),



        );

        $this->Master_default_approval_model->update(array('id_default_approval' => $this->input->post('id_default_approval')), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function list_approval()
    {
        $list = $this->Master_list_approval->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_approval(' . "'" . $data_model->id_approval . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_approval(' . "'" . $data_model->id_approval . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';
            $row[] = $no;

            $row[] = $data_model->pernr;
            $row[] = $data_model->name;




            // if ($data_model->valid_at == '0000-00-00') {
            //     $row[] = ''; // Menampilkan nilai kosong
            // } else {
            //     $row[] = $data_model->valid_at; // Menampilkan nilai valid_at
            // }


            $data[] = $row;
        }

        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Master_list_approval->count_all(),
            'recordsFiltered' => $this->Master_list_approval->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
    }
    public function save_approval()
    {
        $data = array(
            'id_default_approval' => $this->input->post('id_default_approval_list'),
            'pernr' => $this->input->post('pernr_approval'),

        );

        $this->Master_list_approval->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function delete_approval($id_approval)
    {
        $this->Master_list_approval->delete($id_approval);
        echo json_encode(array("status" => TRUE));
    }

    public function get_data_approval($id_approval)
    {
        $data = $this->Master_list_approval->get_data($id_approval);

        echo json_encode($data);
    }
    public function update_approval()
    {
        $data = array(
            'pernr' => $this->input->post('pernr_approval'),



        );

        $this->Master_list_approval->update(array('id_approval ' => $this->input->post('id_approval')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function save_user_akses()
    {
        $data = array(



            'pernr' => $this->input->post('akses_pernr'),
            'id_menu' => $this->input->post('akses_namahalaman'),

        );

        $this->Master_user_akses->save($data);

        echo json_encode(array("status" => TRUE));
    }



    public function Akses_View()
    {


        $data = array(
            'view' => $this->input->post('view'),
        );

        $this->Master_user_akses->update(array('id_akses' => $this->input->post('id_akses'), 'pernr' => $this->input->post('pernr')), $data);

        echo json_encode(array("status" => TRUE));
    }

    public function Akses_create()
    {
        $data = array(
            'create' => $this->input->post('create'),
        );

        $this->Master_user_akses->update(array('id_akses' => $this->input->post('id_akses'), 'pernr' => $this->input->post('pernr')), $data);

        echo json_encode(array("status" => TRUE));
    }
    public function Akses_update()
    {

        $data = array(
            'update' => $this->input->post('update'),
        );

        $this->Master_user_akses->update(array('id_akses' => $this->input->post('id_akses'), 'pernr' => $this->input->post('pernr')), $data);

        echo json_encode(array("status" => TRUE));
    }

    public function Akses_delete()
    {


        $data = array(
            'delete' => $this->input->post('delete'),
        );
        $this->Master_user_akses->update(array('id_akses' => $this->input->post('id_akses'), 'pernr' => $this->input->post('pernr')), $data);


        echo json_encode(array("status" => TRUE));
    }

    public function save_unit()
    {
        $data = array(


            'unit_name' => $this->input->post('unit_name'),
            'unit_type' => 2,
            'unit_priority' => 1,
            'unit_cost_center' => $this->input->post('unit_cost_center'),
            'email' => $this->input->post('unit_email'),
            'company_parent' => $this->input->post('company_parent'),
            'id_company' => $this->input->post('id_company'),
            'company_code' => $this->input->post('company_code'),
            'company_name' => $this->input->post('company_name'),

        );

        $this->Master_unit_model->save($data);

        echo json_encode(array("status" => TRUE));
    }
    public function update_unit()
    {
        $data = array(
            'unit_name' => $this->input->post('unit_name'),
            'unit_type' => 2,
            'unit_priority' => 1,
            'unit_cost_center' => $this->input->post('unit_cost_center'),
            'email' => $this->input->post('unit_email'),
            'company_parent' => $this->input->post('company_parent'),
            'id_company' => $this->input->post('id_company'),
            'company_code' => $this->input->post('company_code'),
            'company_name' => $this->input->post('company_name'),


        );

        $this->Master_unit_model->update(array('id_unit' => $this->input->post('id_unit')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function get_data_unit($id_unit)
    {
        $data = $this->Master_unit_model->get_data_unit($id_unit);

        echo json_encode($data);
    }

    public function get_data_all_unit()
    {
        $data = $this->Master_unit_model->get_data_all_unit();

        echo json_encode($data);
    }



    public function delete_unit($id)
    {
        $this->Master_unit_model->delete($id);
        echo json_encode(array("status" => TRUE));
    }
    public function save_user()
    {
        $current_time = date("Y-m-d H:i:s");

        $id_unit_sub = $this->input->post('list_unit_sub');
        $data = array(
            'pernr' => $this->input->post('pernr'),
            'name' => $this->input->post('name'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'id_plant' => $this->input->post('id_plant'),
            'id_unit' => $this->input->post('id_unit'), // contoh nilai
            'email' => $this->input->post('email'),
            'jobdesk' => $this->input->post('jobdesk'),
            'tipe' => $this->input->post('tipe'),
            'created_at' => $current_time
        );

        if ($id_unit_sub) {
            $data['id_unit_sub'] = implode(',', $this->input->post('list_unit_sub'));
        } else {
            $data['id_unit_sub'] = $id_unit_sub;
        }

        // ,
        $this->Master_user_model->save($data);

        echo json_encode(array("status" => TRUE));
    }
    public function update_user()
    {

        $current_time = date("Y-m-d H:i:s");
        $id_unit_sub = $this->input->post('list_unit_sub');
        $data = array(
            'pernr' => $this->input->post('pernr'),
            'name' => $this->input->post('name'),
            'id_plant' => $this->input->post('id_plant'),
            'id_unit' => $this->input->post('id_unit'),
            'email' => $this->input->post('email'),
            'jobdesk' => $this->input->post('jobdesk'),
            'tipe' => $this->input->post('tipe'),
            'change_at' => $current_time

        );

        if ($id_unit_sub) {
            $data['id_unit_sub'] = implode(',', $this->input->post('list_unit_sub'));
        } else {
            $data['id_unit_sub'] = $id_unit_sub;
        }

        $this->Master_user_model->update(array('id_user' => $this->input->post('id_user')), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function update_password()
    {

        $current_time = date("Y-m-d H:i:s");


        $data = array(

            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'change_at' => $current_time
        );


        $this->Master_user_model->update(array('id_user' => $this->input->post('id_user')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function get_data_user($id_user)
    {
        $data = $this->Master_user_model->get_data_user($id_user);

        echo json_encode($data);
    }

    public function get_data_menu_all()
    {
        $data = $this->Menu_model->get_data_menu_all();

        echo json_encode($data);
    }




    public function delete_user($id_user)
    {
        $this->Master_user_model->delete_by_id($id_user);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_akses($id_akses)
    {
        $this->Master_user_akses->delete($id_akses);
        echo json_encode(array("status" => TRUE));
    }

    public function save_unit_sub()
    {
        $data = array(


            'id_unit' => $this->input->post('id_unit_master'),
            'sub_unit_name' => $this->input->post('sub_unit_name'),
            'sub_unit_inisial' => $this->input->post('sub_unit_inisial'),
            'email_sub_unit' => $this->input->post('email_sub_unit'),


        );

        $this->Master_unit_sub_model->save($data);

        echo json_encode(array("status" => TRUE));
    }
    public function update_unit_sub()
    {
        $data = array(
            'id_unit' => $this->input->post('id_unit_master'),
            'sub_unit_name' => $this->input->post('sub_unit_name'),
            'sub_unit_inisial' => $this->input->post('sub_unit_inisial'),
            'email_sub_unit' => $this->input->post('email_sub_unit'),



        );

        $this->Master_unit_sub_model->update(array('id_unit_sub' => $this->input->post('id_unit_sub')), $data);
        echo json_encode(array("status" => TRUE));
    }


    public function get_data_unit_sub($id_unit_sub)
    {
        $data = $this->Master_unit_sub_model->get_data_unit_sub($id_unit_sub);

        echo json_encode($data);
    }

    public function get_data_by_id_unit()

    {
        $id_unit = $this->input->post('id_unit');
        $data = $this->Master_unit_sub_model->get_data_by_id_unit($id_unit);

        echo json_encode($data);
    }




    public function delete_unit_sub($id_unit_sub)
    {
        $this->Master_unit_sub_model->delete($id_unit_sub);
        echo json_encode(array("status" => TRUE));
    }




    public function list_apps()
    {
        $data = $this->Master_apps_model->get_data_all();

        echo json_encode($data);
    }


    public function delete_userr($id_user)
    {
        $this->db->trans_start();

        $this->Master_user_model->delete_by_id($id_user);
        $this->Master_user_model->delete_hak_akses($id_user);

        $this->db->trans_complete();
        echo json_encode(array("status" => TRUE));
    }

    public function lock_user()
    {
        $data = array(
            'locked' => $this->input->post('active'),
        );

        $this->Master_user_model->update(array('id_user' => $this->input->post('id_user')), $data);

        echo json_encode(array("status" => TRUE));
    }

    public function list_api()
    {
        $list = $this->Master_api_model->get_datatables();

        $data = [];
        $no = $_POST['start'];
        foreach ($list as $data_model) {
            $no++;
            $row = [];


            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_api(' . "'" . $data_model->id_api  . "'" . ')"><i class="fas fa-edit"></i></a>';
            $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="delete_api(' . "'" . $data_model->id_api  . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';

            $row[] = $no;
            $row[] = $data_model->name_api;

            $row[] = $data_model->token;


            $row[] = $data_model->tipe_status;
            $row[] = $data_model->create_at;
            $row[] = $data_model->expiry_date;
            $data[] = $row;
        }


        $output = [
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Master_api_model->count_all(),
            'recordsFiltered' => $this->Master_api_model->count_filtered(),
            'data' => $data,
        ];
        //output to json format
        echo json_encode($output);
    }



    public function save_api()
    {
        date_default_timezone_set('Asia/Jakarta');
        $current_time = date("Y-m-d H:i:s");

        // Membuat token bearer
        $token = bin2hex(random_bytes(32)); // Menghasilkan string acak 64 karakter (32 byte)

        $data = array(
            'name_api' => $this->input->post('name_api'),
            'token' => 'Bearer ' . $token,
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


    public function get_data_api($id_api)
    {
        $data = $this->Master_api_model->get_data($id_api);

        echo json_encode($data);
    }
}
