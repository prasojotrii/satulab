<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		// biar tanpa session tidak bisa akses page
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Master_user_model');

		if (empty($this->session->userdata("pernr"))) {
			redirect('auth/logout');
		}
	}


	// public function index()
	// {
	// 	$data['dataSession'] = $this->User_model->getDataUsername();
	// 	$data['dataAkses'] = $this->User_model->getDataAksesDashboard();
	// 	$data['id_halaman']  = $this->uri->segment(1);
	// 	$data['title'] = 'Dashboard Labsm';
	// 	$this->load->view('Template/header', $data);
	// 	$this->load->view('template/index', $data);
	// }

	public function index()
	{
		$pernr = $this->session->userdata('pernr');
		$data['dataSession'] = $this->Master_user_model->getDataUsername();

		$data['dataAkses'] = $this->Master_user_model->getDataAksesDashboardPernr();

		$data['id_halaman']  = $this->uri->segment(1);


		$data['title'] = 'Dashboard';
		$this->load->view('Template/header', $data);
		$this->load->view('template/index', $data);
	}
}
