<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

	public function index()
	{
		$this->load->view('form_upload');
	}

	function proses()
	{
		$config['upload_path']          = './assets/upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('berkas')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('form_upload', $error);
		} else {
			$data['nama_berkas'] = $this->upload->data("file_name");
			$data['keterangan_berkas'] = $this->input->post('keterangan_berkas');
			$data['tipe_berkas'] = $this->upload->data('file_ext');
			$data['ukuran_berkas'] = $this->upload->data('file_size');
			$this->db->insert('tb_berkas', $data);
			redirect('upload');
		}
	}
}
