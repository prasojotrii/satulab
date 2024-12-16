<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		// biar tanpa session tidak bisa akses page
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Master_user_model');
	}


	public function index()
	{
		$data['dataSession'] = $this->Master_user_model->getDataUsername();
		$data['title'] = 'Halaman Profil';
		$this->load->view('template/header', $data);
		$this->load->view('template/profil', $data);
	}
}
