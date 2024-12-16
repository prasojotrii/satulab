<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require FCPATH . '/assets/dompdf/autoload.php';

// require './vendor/spipu/html2pdf/src/html2pdf.php)';
// use Spipu\Html2Pdf\Html2Pdf;
require FCPATH . '/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Dompdf\Dompdf;


class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Instrumen_model');
		$this->load->model('Kategori_Glassware_model');
		$this->load->model('Kategori_Instrumen_model');
		$this->load->model('person_model', 'person');
		$this->load->model('Glassware_model');
		$this->load->model('Riwayat_Instrumen_model');
		$this->load->model('User_model');
		$this->load->model('Order_model');
		$this->load->model('Penawaran_model');
		$this->load->model('Instrumen_Baru_model');
		$this->load->model('Order_Persetujuan_model');
		$this->load->model('Kalibrasi_Glassware_model');
		$this->load->model('User_Akses_model');
		$this->load->model('User_Role_model');
		$this->load->model('Master_Halaman_model');



		if (empty($this->session->userdata("pernr"))) {
			redirect('auth/logout');
		} else if ($this->session->userdata("tipe") != 'SysAdmin') {
			redirect('user/index');
		}
	}



	public function index()
	{
		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$data['title'] = 'Dashboard';
		$this->load->view('Sysadmin/index', $data);
	}

	public function user()
	{
		$data['id_user'] = $this->User_model->Membuat_Kode_Otomatis();
		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
		$data['title'] = 'Daftar User';
		$this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_user', $data);
	}

	public function data_order()
	{
		$data['id_order'] = $this->Order_model->Membuat_Kode_Otomatis();
		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$nama_barang = $this->input->get('nama_barang');
		$data['data'] = $this->Order_model->CariNamaBarang($nama_barang);
		$data['dataSatuan']      = $this->Order_model->dataSatuan();
		$data['dataKategori']      = $this->Order_model->dataKategori();
		$data['dataGlassawre']      = $this->Glassware_model->dataKategori();
		$data['dataStatus']      = $this->Order_model->dataStatus();
		$data['dataUkuran']      = $this->Order_model->dataUkuran();
		$data['id_batch']      = $this->Order_Persetujuan_model->Kode_batch();
		// $data['id_order_unit']      = $this->Instrumen_Baru_model->KodePCR();
		$data['id_order_tiket']      = $this->Order_Persetujuan_model->Kode_tiket();
		$data['title'] = 'Daftar Order Internal Laboratorium';
		// $this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_order', $data);
	}

	public function data_request_order()
	{
		$data['id_order'] = $this->Order_model->Membuat_Kode_Otomatis();
		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$nama_barang = $this->input->get('nama_barang');
		$data['data'] = $this->Order_model->CariNamaBarang($nama_barang);
		$data['dataSatuan']      = $this->Order_model->dataSatuan();
		$data['dataKategori']      = $this->Order_model->dataKategori();
		$data['dataGlassawre']      = $this->Glassware_model->dataKategori();
		$data['dataStatus']      = $this->Order_model->dataStatus();
		$data['dataUkuran']      = $this->Order_model->dataUkuran();
		$data['id_batch']      = $this->Order_Persetujuan_model->Kode_batch();
		$data['title'] = 'Daftar Order Internal Laboratorium';
		// $this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_request_order', $data);
	}

	public function kategori_instrumen()
	{
		$data['id_instrumen'] = $this->Kategori_Instrumen_model->Membuat_Kode_Otomatis();
		$data['jumlah'] = $this->Instrumen_model->jumlah();
		$data['title'] = 'Daftar Kategori Instrumen';
		$data['sudah_dikalibrasi'] = $this->Instrumen_model->sudah_dikalibrasi();
		$data['instrumen_rusak'] = $this->Instrumen_model->instrumen_rusak();
		$data['belum_dikalibrasi'] = $this->Instrumen_model->belum_dikalibrasi();
		$data['sedang_dikalibrasi'] = $this->Instrumen_model->sedang_dikalibrasi();
		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_kategori_instrumen', $data);
	}

	public function kategori_glassware()
	{
		$data['id_instrumen'] = $this->Kategori_Instrumen_model->Membuat_Kode_Otomatis();
		$data['jumlah'] = $this->Glassware_model->jumlah();
		$data['title'] = 'Daftar Kategori Glassware';
		$data['sudah_dikalibrasi'] = $this->Glassware_model->sudah_dikalibrasi();
		$data['sedang_dikalibrasi'] = $this->Glassware_model->sedang_dikalibrasi();
		$data['instrumen_rusak'] = $this->Glassware_model->instrumen_rusak();
		$data['belum_dikalibrasi'] = $this->Glassware_model->belum_dikalibrasi();

		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_kategori_glassware', $data);
	}

	public function instrumen()
	{
		$data['dataKategori'] = $this->Instrumen_model->dataKategori();
		// $data['kategori'] = $this->Instrumen_model->getIdKategori();
		$data['id_kategori'] = $this->uri->segment(3);
		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$data['title'] = 'Daftar Instrumen Laboratorium';
		$data['kodePCR'] = $this->Instrumen_model->KodePCR();
		$data['KodeMKR'] = $this->Instrumen_model->KodeMKR();
		$data['KodeINS'] = $this->Instrumen_model->KodeINS();
		$data['KodeMTS'] = $this->Instrumen_model->KodeMTS();
		$data['KodeOMG'] = $this->Instrumen_model->KodeOMG();
		$data['KodeBBG'] = $this->Instrumen_model->KodeBBG();
		$data['KodeLGK'] = $this->Instrumen_model->KodeLGK();
		$data['KodeLogInstrumen'] = $this->Instrumen_model->KodeLogInstrumen();
		// $this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_instrumen', $data);
	}

	public function glassware()
	{
		$data['dataKategori'] = $this->Glassware_model->dataKategori();
		$data['id_batch'] = $this->Kalibrasi_Glassware_model->Membuat_Kode_Otomatis();
		$data['id_laporan'] = $this->Kalibrasi_Glassware_model->Kode_Laporan();
		// $data['kategori'] = $this->Instrumen_model->getIdKategori();
		$data['id_kategori'] = $this->uri->segment(3);
		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$data['dataUkuran']      = $this->Order_model->dataUkuran();
		$data['dataSatuan']      = $this->Order_model->dataSatuan();
		$data['title'] = 'Daftar Glassware Laboratorium';
		$id_order = $this->input->post('id_order');
		$data['maxjumlah']      = $this->Order_model->get_by_id($id_order);
		$data['KodeLogInstrumen'] = $this->Glassware_model->KodeLogInstrumen();
		// $this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_glassware', $data);
	}

	public function role()
	{
		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$data['title'] = 'Halaman Setting Role';
		$this->load->view('sysadmin/list_role', $data);
	}

	public function cari()
	{
		$tipe_instrumen = $_GET['info_id_instrumen'];
		$cari = $this->Instrumen_model->cari($tipe_instrumen)->result();
		echo json_encode($cari);
	}

	public function TipeGlassware()
	{
		$id_instrumen = $_GET['id_instrumen'];
		$cari = $this->Glassware_model->cari($id_instrumen)->result();
		echo json_encode($cari);
	}

	public function DataRumus()
	{
		$tipe_instrumen = $_GET['tipe_instrumen'];
		$cari = $this->Glassware_model->CariDataRumus($tipe_instrumen)->result();
		echo json_encode($cari);
	}

	public function DataHalaman()
	{
		$rolenamahalaman = $_GET['rolenamahalaman'];
		$cari = $this->Master_Halaman_model->CariDataHalaman($rolenamahalaman)->result();
		echo json_encode($cari);
	}


	public function CariDataRumus()
	{
		$nama_barang = $_GET['nama_barang'];
		$cari = $this->Glassware_model->cariRumus($nama_barang)->result();
		echo json_encode($cari);
	}

	public function Fungsi_AutoComplete()
	{
		if (isset($_GET['term'])) {
			$result = $this->Order_model->CariNamaBarang($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = $row->tipe_instrumen;
				echo json_encode($arr_result);
			}
		}
	}



	function IsiOtomatisIdInstrumen()
	{
		$tipe_instrumen = $this->input->post('tipe_instrumen');
		$data = $this->Instrumen_model->get_data_barang_bykode($tipe_instrumen);
		echo json_encode($data);
	}

	public function list_user()
	{
		$list = $this->User_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $User_model) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit(' . "'" . $User_model->id_user . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus(' . "'" . $User_model->id_user . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $no;

			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_akses(' . "'" . $User_model->id_user . "'" . ')" href="javascript:void(0)" >' . $User_model->pernr . '</a>';


			$row[] = $User_model->nama;
			$row[] = $User_model->sub_laboratorium;
			$row[] = $User_model->penyelia;
			$row[] = $User_model->kepalaunit;

			$row[] = $User_model->tipe;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->User_model->count_all(),
			"recordsFiltered" => $this->User_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_user_akses()
	{
		$list = $this->User_Akses_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $User_Akses_model) {
			$no++;
			$row = array();
			$row[] = '

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus(' . "'" . $User_Akses_model->id_halaman . "'" . ')">
			<i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $no;
			$row[] = $User_Akses_model->id_user;
			if ($User_Akses_model->view == 0) {
				$view = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikview(' . "'" . $User_Akses_model->id_halaman . "'" . ', 1)"><i class="fas fa-window-close"></i></a>
				
				';
			} else {
				$view = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikview(' . "'" . $User_Akses_model->id_halaman . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}

			if ($User_Akses_model->create == 0) {
				$create = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikcreate(' . "'" . $User_Akses_model->id_halaman . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
			} else {
				$create = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikcreate(' . "'" . $User_Akses_model->id_halaman . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}

			if ($User_Akses_model->update == 0) {
				$update = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikupdate(' . "'" . $User_Akses_model->id_halaman . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
			} else {
				$update = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikupdate(' . "'" . $User_Akses_model->id_halaman . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}
			if ($User_Akses_model->delete == 0) {
				$delete = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikdelete(' . "'" . $User_Akses_model->id_halaman . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
			} else {
				$delete = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikdelete(' . "'" . $User_Akses_model->id_halaman . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}
			$row[] = $User_Akses_model->nama_halaman;
			$row[] = $User_Akses_model->title;
			$row[] = $User_Akses_model->url;
			$row[] = $view;
			$row[] = $create;
			$row[] = $update;
			$row[] = $delete;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->User_Akses_model->count_all(),
			"recordsFiltered" => $this->User_Akses_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_halaman()
	{
		$list = $this->Master_Halaman_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Master_Halaman_model) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit_Halaman(' . "'" . $Master_Halaman_model->id_halaman . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_hapus_halaman(' . "'" . $Master_Halaman_model->id_halaman . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $no;

			if ($Master_Halaman_model->view == 0) {
				$view = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikview(' . "'" . $Master_Halaman_model->id_halaman . "'" . ', 1)"><i class="fas fa-window-close"></i></a>
				
				';
			} else {
				$view = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikview(' . "'" . $Master_Halaman_model->id_halaman . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}

			if ($Master_Halaman_model->create == 0) {
				$create = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikcreate(' . "'" . $Master_Halaman_model->id_halaman . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
			} else {
				$create = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikcreate(' . "'" . $Master_Halaman_model->id_halaman . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}

			if ($Master_Halaman_model->update == 0) {
				$update = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikupdate(' . "'" . $Master_Halaman_model->id_halaman . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
			} else {
				$update = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikupdate(' . "'" . $Master_Halaman_model->id_halaman . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}
			if ($Master_Halaman_model->delete == 0) {
				$delete = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="klikdelete(' . "'" . $Master_Halaman_model->id_halaman . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
			} else {
				$delete = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="klikdelete(' . "'" . $Master_Halaman_model->id_halaman . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}
			$row[] = $Master_Halaman_model->nama_halaman;
			$row[] = $Master_Halaman_model->title;
			$row[] = $Master_Halaman_model->url;
			$row[] = $view;
			$row[] = $create;
			$row[] = $update;
			$row[] = $delete;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Master_Halaman_model->count_all(),
			"recordsFiltered" => $this->Master_Halaman_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_user_role()
	{
		$list = $this->User_Role_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $User_Role_model) {
			$no++;
			$row = array();
			$row[] = '

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_hapus_role(' . "'" . $User_Role_model->id_role . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $no;

			if ($User_Role_model->view == 0) {
				$view = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="KlikViewRole(' . "'" . $User_Role_model->id_role . "'" . ', 1)"><i class="fas fa-window-close"></i></a>
				
				';
			} else {
				$view = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="KlikViewRole(' . "'" . $User_Role_model->id_role . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}

			if ($User_Role_model->create == 0) {
				$create = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="KlikCreateRole(' . "'" . $User_Role_model->id_role . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
			} else {
				$create = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="KlikCreateRole(' . "'" . $User_Role_model->id_role . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}

			if ($User_Role_model->update == 0) {
				$update = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="KlikUpdateRole(' . "'" . $User_Role_model->id_role . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
			} else {
				$update = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="KlikUpdateRole(' . "'" . $User_Role_model->id_role . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}
			if ($User_Role_model->delete == 0) {
				$delete = '
				
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Edit" onclick="KlikDeleteRole(' . "'" . $User_Role_model->id_role . "'" . ', 1)"><i class="fas fa-window-close"></i></a>';
			} else {
				$delete = '
				
				<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="KlikDeleteRole(' . "'" . $User_Role_model->id_role . "'" . ', 0)"><i class="fas fa-check-square"></i></a>
			
				';
			}
			$row[] = $User_Role_model->nama_role;
			$row[] = $User_Role_model->nama_halaman;
			$row[] = $User_Role_model->title;
			$row[] = $User_Role_model->url;
			$row[] = $view;
			$row[] = $create;
			$row[] = $update;
			$row[] = $delete;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->User_Role_model->count_all(),
			"recordsFiltered" => $this->User_Role_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_order_term()
	{
		$list = $this->Order_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Order_model) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit(' . "'" . $Order_model->id_order . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus(' . "'" . $Order_model->id_order . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		

			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Batal(' . "'" . $Order_model->id_order . "'" . ')"><i class="fas fa-times"></i> </a>
			';



			$row[] = $no;

			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_Update(' . "'" . $Order_model->id_order . "'" . ')" href="javascript:void(0)" >' . $Order_model->id_order . '</a>
			
			';
			$row[] = $Order_model->id_batch;
			$row[] = $Order_model->tanggal_input;
			$row[] = $Order_model->kategori_barang;
			$row[] = $Order_model->nama_barang;
			$row[] = $Order_model->merek;
			$row[] = $Order_model->spesifikasi;
			$row[] = $Order_model->ukuran;
			$row[] = $Order_model->type;
			$row[] = $Order_model->grade;
			$row[] = $Order_model->jumlah;
			$row[] = $Order_model->satuan;
			$row[] = $Order_model->nama;
			$row[] = $Order_model->keterangan;
			$row[] = $Order_model->id_status;
			$row[] = $Order_model->tanggal_datang;
			$row[] = $Order_model->urgent;
			$row[] = $Order_model->penawaran;
			$row[] = $Order_model->no_pr;
			$row[] = $Order_model->no_po;

			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Order_model->count_all(),
			"recordsFiltered" => $this->Order_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}


	public function list_order()
	{
		$list = $this->Instrumen_Baru_model->DataInstrumenBaru();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Instrumen_Baru_model) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit(' . "'" . $Instrumen_Baru_model->id_diterima . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus(' . "'" . $Instrumen_Baru_model->id_diterima . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		

			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Batal(' . "'" . $Instrumen_Baru_model->id_diterima . "'" . ')"><i class="fas fa-times"></i> </a>
			';



			$row[] = $no;

			$row[] = '<a class="btn btn-primary btn-sm" onclick="Pindah_Instrumen_Baru(' . "'" . $Instrumen_Baru_model->id_diterima . "'" . ')" href="javascript:void(0)" >' . $Instrumen_Baru_model->id_order . '</a>
			
			';
			$row[] = $Instrumen_Baru_model->id_batch;
			$row[] = $Instrumen_Baru_model->tanggal_input;
			$row[] = $Instrumen_Baru_model->kategori_barang;
			$row[] = $Instrumen_Baru_model->nama_barang;
			$row[] = $Instrumen_Baru_model->merek;
			$row[] = $Instrumen_Baru_model->jumlah_diterima;
			$row[] = $Instrumen_Baru_model->satuan;
			$row[] = $Instrumen_Baru_model->nama;
			$row[] = $Instrumen_Baru_model->keterangan;
			$row[] = $Instrumen_Baru_model->id_status;
			$row[] = $Instrumen_Baru_model->tanggal_diterima;
			$row[] = $Instrumen_Baru_model->urgent;
			$row[] = $Instrumen_Baru_model->penawaran;
			$row[] = $Instrumen_Baru_model->no_pr;
			$row[] = $Instrumen_Baru_model->no_po;

			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Order_model->count_all(),
			"recordsFiltered" => $this->Order_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_order_persetujuan()
	{
		// $info_penyelia = $_GET['info_penyelia'];

		// $info_penyelia = $this->input->post('info_penyelia');

		$list = $this->Order_Persetujuan_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Order_Persetujuan_model) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit(' . "'" . $Order_Persetujuan_model->nomor . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus_persetujuan(' . "'" . $Order_Persetujuan_model->nomor . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $no;
			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_Update(' . "'" . $Order_Persetujuan_model->id_order_tiket . "'" . ')" href="javascript:void(0)" >' . $Order_Persetujuan_model->id_order_tiket . '</a>';
			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_Persetujuan(' . "'" . $Order_Persetujuan_model->id_order_tiket . "'" . ')" href="javascript:void(0)" >' . $Order_Persetujuan_model->id_order_tiket . '</a>';
			// $row[] = $Order_Persetujuan_model->id_batch;
			$row[] = $Order_Persetujuan_model->tanggal_input;
			$row[] = $Order_Persetujuan_model->kategori_barang;
			$row[] = $Order_Persetujuan_model->nama_barang;
			$row[] = $Order_Persetujuan_model->merek;
			$row[] = $Order_Persetujuan_model->jumlah;
			$row[] = $Order_Persetujuan_model->satuan;
			$row[] = $Order_Persetujuan_model->nama;
			$row[] = $Order_Persetujuan_model->keterangan;
			$row[] = $Order_Persetujuan_model->penyelia;
			$row[] = $Order_Persetujuan_model->id_status;
			$row[] = $Order_Persetujuan_model->tanggal_datang;
			$row[] = $Order_Persetujuan_model->urgent;
			$row[] = $Order_Persetujuan_model->penawaran;
			$row[] = $Order_Persetujuan_model->no_pr;
			$row[] = $Order_Persetujuan_model->no_po;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Order_Persetujuan_model->count_all(),
			"recordsFiltered" => $this->Order_Persetujuan_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function list_order_persetujuan_admin()
	{
		// $info_penyelia = $_GET['info_penyelia'];

		// $info_penyelia = $this->input->post('info_penyelia');

		$list = $this->Order_Persetujuan_model->get_datatables_admin();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Order_Persetujuan_model) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit(' . "'" . $Order_Persetujuan_model->id_batch . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus_persetujuan(' . "'" . $Order_Persetujuan_model->id_batch . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $no;
			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_Update(' . "'" . $Order_Persetujuan_model->id_batch . "'" . ')" href="javascript:void(0)" >' . $Order_Persetujuan_model->id_batch . '</a>';
			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_Persetujuan(' . "'" . $Order_Persetujuan_model->id_order_tiket . "'" . ')" href="javascript:void(0)" >' . $Order_Persetujuan_model->id_batch . '</a>';
			// $row[] = $Order_Persetujuan_model->id_batch;
			$row[] = $Order_Persetujuan_model->tanggal_input;
			$row[] = $Order_Persetujuan_model->kategori_barang;
			$row[] = $Order_Persetujuan_model->nama_barang;
			$row[] = $Order_Persetujuan_model->merek;
			$row[] = $Order_Persetujuan_model->jumlah;
			$row[] = $Order_Persetujuan_model->satuan;
			$row[] = $Order_Persetujuan_model->nama;
			$row[] = $Order_Persetujuan_model->keterangan;
			$row[] = $Order_Persetujuan_model->penyelia;
			$row[] = $Order_Persetujuan_model->id_status;
			$row[] = $Order_Persetujuan_model->tanggal_datang;
			$row[] = $Order_Persetujuan_model->urgent;
			$row[] = $Order_Persetujuan_model->penawaran;
			$row[] = $Order_Persetujuan_model->no_pr;
			$row[] = $Order_Persetujuan_model->no_po;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Order_Persetujuan_model->count_all(),
			"recordsFiltered" => $this->Order_Persetujuan_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function list_order_persetujuan_ka_unit()
	{
		// $info_penyelia = $_GET['info_penyelia'];

		// $info_penyelia = $this->input->post('info_penyelia');

		$list = $this->Order_Persetujuan_model->get_datatables_ka_unit();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Order_Persetujuan_model) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit(' . "'" . $Order_Persetujuan_model->id_batch . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus_persetujuan(' . "'" . $Order_Persetujuan_model->id_batch . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $no;
			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_Update(' . "'" . $Order_Persetujuan_model->id_batch . "'" . ')" href="javascript:void(0)" >' . $Order_Persetujuan_model->id_batch . '</a>';
			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_Persetujuan(' . "'" . $Order_Persetujuan_model->id_order_tiket . "'" . ')" href="javascript:void(0)" >' . $Order_Persetujuan_model->id_batch . '</a>';
			// $row[] = $Order_Persetujuan_model->id_batch;
			$row[] = $Order_Persetujuan_model->tanggal_input;
			$row[] = $Order_Persetujuan_model->kategori_barang;
			$row[] = $Order_Persetujuan_model->nama_barang;
			$row[] = $Order_Persetujuan_model->merek;
			$row[] = $Order_Persetujuan_model->jumlah;
			$row[] = $Order_Persetujuan_model->satuan;
			$row[] = $Order_Persetujuan_model->nama;
			$row[] = $Order_Persetujuan_model->keterangan;
			$row[] = $Order_Persetujuan_model->penyelia;
			$row[] = $Order_Persetujuan_model->id_status;
			$row[] = $Order_Persetujuan_model->tanggal_datang;
			$row[] = $Order_Persetujuan_model->urgent;
			$row[] = $Order_Persetujuan_model->penawaran;
			$row[] = $Order_Persetujuan_model->no_pr;
			$row[] = $Order_Persetujuan_model->no_po;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Order_Persetujuan_model->count_all(),
			"recordsFiltered" => $this->Order_Persetujuan_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function list_order_baru_user()
	{

		$list = $this->Instrumen_Baru_model->get_datatables_user();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Instrumen_Baru_model) {
			$no++;
			$row = array();
			$row[] = '
			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit_Order(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-edit"></i></a>
            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Hapus_order_baru(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $no;
			$row[] = '<a class="btn btn-primary btn-sm" onclick="Pindah_Instrumen_Baru(' . "'" . $Instrumen_Baru_model->id_order . "'" . ')" href="javascript:void(0)" >' . $Instrumen_Baru_model->id_order . '</a>
			';

			$row[] = $Instrumen_Baru_model->id_order_tiket;
			$row[] = $Instrumen_Baru_model->tanggal_input;
			$row[] = $Instrumen_Baru_model->kategori_barang;
			$row[] = $Instrumen_Baru_model->nama_barang;
			$row[] = $Instrumen_Baru_model->spesifikasi;
			$row[] = $Instrumen_Baru_model->merek;
			$row[] = $Instrumen_Baru_model->ukuran;
			$row[] = $Instrumen_Baru_model->type;
			$row[] = $Instrumen_Baru_model->grade;
			$row[] = $Instrumen_Baru_model->jumlah;
			$row[] = $Instrumen_Baru_model->satuan;
			$row[] = $Instrumen_Baru_model->nama;
			$row[] = $Instrumen_Baru_model->keterangan;
			$row[] = $Instrumen_Baru_model->penyelia;
			$row[] = $Instrumen_Baru_model->id_status;
			$row[] = $Instrumen_Baru_model->tanggal_datang;
			$row[] = $Instrumen_Baru_model->urgent;
			$row[] = $Instrumen_Baru_model->penawaran;
			$row[] = $Instrumen_Baru_model->no_pr;
			$row[] = $Instrumen_Baru_model->no_po;

			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Instrumen_Baru_model->count_all(),
			"recordsFiltered" => $this->Instrumen_Baru_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_order_baru_spv()
	{

		// $info_order = $_GET['info_order'];
		$list = $this->Instrumen_Baru_model->get_datatables_spv();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Instrumen_Baru_model) {
			$no++;
			$row = array();
			$row[] = '
			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit_Order(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Hapus_order_baru(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';


			$row[] = $no;

			$row[] = '<a class="btn btn-primary btn-sm" onclick="Pindah_Instrumen_Baru(' . "'" . $Instrumen_Baru_model->id_order . "'" . ')" href="javascript:void(0)" >' . $Instrumen_Baru_model->id_order . '</a>
			
			';


			$row[] = $Instrumen_Baru_model->id_batch;

			$row[] = $Instrumen_Baru_model->tanggal_input;
			$row[] = $Instrumen_Baru_model->kategori_barang;
			$row[] = $Instrumen_Baru_model->nama_barang;
			$row[] = $Instrumen_Baru_model->spesifikasi;
			$row[] = $Instrumen_Baru_model->merek;
			$row[] = $Instrumen_Baru_model->ukuran;
			$row[] = $Instrumen_Baru_model->type;
			$row[] = $Instrumen_Baru_model->grade;
			$row[] = $Instrumen_Baru_model->jumlah;
			$row[] = $Instrumen_Baru_model->satuan;
			$row[] = $Instrumen_Baru_model->nama;
			$row[] = $Instrumen_Baru_model->keterangan;
			$row[] = $Instrumen_Baru_model->penyelia;
			$row[] = $Instrumen_Baru_model->id_status;
			$row[] = $Instrumen_Baru_model->tanggal_datang;
			$row[] = $Instrumen_Baru_model->urgent;
			$row[] = $Instrumen_Baru_model->penawaran;
			$row[] = $Instrumen_Baru_model->no_pr;
			$row[] = $Instrumen_Baru_model->no_po;

			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Instrumen_Baru_model->count_all(),
			"recordsFiltered" => $this->Instrumen_Baru_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_order_baru_admin()
	{

		// $info_order = $_GET['info_order'];
		$list = $this->Instrumen_Baru_model->get_datatables_admin();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Instrumen_Baru_model) {
			$no++;
			$row = array();
			$row[] = '
			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit_Order(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Hapus_order_baru(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';


			$row[] = $no;

			$row[] = '<a class="btn btn-primary btn-sm" onclick="Pindah_Instrumen_Baru(' . "'" . $Instrumen_Baru_model->id_order . "'" . ')" href="javascript:void(0)" >' . $Instrumen_Baru_model->id_order . '</a>
			
			';


			$row[] = $Instrumen_Baru_model->id_batch;

			$row[] = $Instrumen_Baru_model->tanggal_input;
			$row[] = $Instrumen_Baru_model->kategori_barang;
			$row[] = $Instrumen_Baru_model->nama_barang;
			$row[] = $Instrumen_Baru_model->spesifikasi;
			$row[] = $Instrumen_Baru_model->merek;
			$row[] = $Instrumen_Baru_model->ukuran;
			$row[] = $Instrumen_Baru_model->type;
			$row[] = $Instrumen_Baru_model->grade;
			$row[] = $Instrumen_Baru_model->jumlah;
			$row[] = $Instrumen_Baru_model->satuan;
			$row[] = $Instrumen_Baru_model->nama;
			$row[] = $Instrumen_Baru_model->keterangan;
			$row[] = $Instrumen_Baru_model->penyelia;
			$row[] = $Instrumen_Baru_model->id_status;
			$row[] = $Instrumen_Baru_model->tanggal_datang;
			$row[] = $Instrumen_Baru_model->urgent;
			$row[] = $Instrumen_Baru_model->penawaran;
			$row[] = $Instrumen_Baru_model->no_pr;
			$row[] = $Instrumen_Baru_model->no_po;

			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Instrumen_Baru_model->count_all(),
			"recordsFiltered" => $this->Instrumen_Baru_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_order_baru_ka_unit()
	{

		// $info_order = $_GET['info_order'];
		$list = $this->Instrumen_Baru_model->get_datatables_ka_unit();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Instrumen_Baru_model) {
			$no++;
			$row = array();
			$row[] = '
			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit_Order(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Hapus_order_baru(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';


			$row[] = $no;

			$row[] = '<a class="btn btn-primary btn-sm" onclick="Pindah_Instrumen_Baru(' . "'" . $Instrumen_Baru_model->id_order . "'" . ')" href="javascript:void(0)" >' . $Instrumen_Baru_model->id_order . '</a>
			
			';


			$row[] = $Instrumen_Baru_model->id_batch;

			$row[] = $Instrumen_Baru_model->tanggal_input;
			$row[] = $Instrumen_Baru_model->kategori_barang;
			$row[] = $Instrumen_Baru_model->nama_barang;
			$row[] = $Instrumen_Baru_model->spesifikasi;
			$row[] = $Instrumen_Baru_model->merek;
			$row[] = $Instrumen_Baru_model->ukuran;
			$row[] = $Instrumen_Baru_model->type;
			$row[] = $Instrumen_Baru_model->grade;
			$row[] = $Instrumen_Baru_model->jumlah;
			$row[] = $Instrumen_Baru_model->satuan;
			$row[] = $Instrumen_Baru_model->nama;
			$row[] = $Instrumen_Baru_model->keterangan;
			$row[] = $Instrumen_Baru_model->penyelia;
			$row[] = $Instrumen_Baru_model->id_status;
			$row[] = $Instrumen_Baru_model->tanggal_datang;
			$row[] = $Instrumen_Baru_model->urgent;
			$row[] = $Instrumen_Baru_model->penawaran;
			$row[] = $Instrumen_Baru_model->no_pr;
			$row[] = $Instrumen_Baru_model->no_po;

			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Instrumen_Baru_model->count_all(),
			"recordsFiltered" => $this->Instrumen_Baru_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function list_order_baru_with_edit()
	{
		$list = $this->Instrumen_Baru_model->get_datatables_edit();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Instrumen_Baru_model) {
			$no++;
			$row = array();
			$row[] = '
			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit_Order(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Hapus_order_baru(' . "'" . $Instrumen_Baru_model->nomor . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';


			$row[] = $no;

			$row[] = '<a class="btn btn-primary btn-sm" onclick="Pindah_Instrumen_Baru(' . "'" . $Instrumen_Baru_model->id_order . "'" . ')" href="javascript:void(0)" >' . $Instrumen_Baru_model->id_order . '</a>
			
			';

			$row[] = $Instrumen_Baru_model->id_batch;

			$row[] = $Instrumen_Baru_model->tanggal_input;
			$row[] = $Instrumen_Baru_model->kategori_barang;
			$row[] = $Instrumen_Baru_model->nama_barang;
			$row[] = $Instrumen_Baru_model->spesifikasi;
			$row[] = $Instrumen_Baru_model->merek;
			$row[] = $Instrumen_Baru_model->ukuran;
			$row[] = $Instrumen_Baru_model->type;
			$row[] = $Instrumen_Baru_model->grade;
			$row[] = $Instrumen_Baru_model->jumlah;
			$row[] = $Instrumen_Baru_model->satuan;
			$row[] = $Instrumen_Baru_model->nama;
			$row[] = $Instrumen_Baru_model->keterangan;
			$row[] = $Instrumen_Baru_model->id_status;
			$row[] = $Instrumen_Baru_model->tanggal_datang;
			$row[] = $Instrumen_Baru_model->urgent;
			$row[] = $Instrumen_Baru_model->penawaran;
			$row[] = $Instrumen_Baru_model->no_pr;
			$row[] = $Instrumen_Baru_model->no_po;

			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Instrumen_Baru_model->count_all(),
			"recordsFiltered" => $this->Instrumen_Baru_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function list_penawaran()
	{
		$list = $this->Penawaran_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Penawaran_model) {
			$no++;
			$row = array();
			$row[] = '

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Hapus_penawaran(' . "'" . $Penawaran_model->id_penawaran . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';



			$row[] = $no;

			$row[] = $Penawaran_model->id_order;

			$row[] = $Penawaran_model->nama_supplier;
			// $row[] = '<a href="' . base_url('asset/upload/penawaran/' . $Penawaran_model->nama_penawaran) . '" target="_blank"><img src="' . base_url('upload/' . $Penawaran_model->nama_penawaran) . '" class="img-responsive" /></a>';

			$row[] = '<a class="btn btn-outline-primary btn-sm" href="/labsm/assets/upload/penawaran/' . $Penawaran_model->nama_penawaran . '"target="_blank" >' . $Penawaran_model->nama_penawaran . '</a>';
			// $row[] = $Penawaran_model->nama_penawaran;
			$row[] = $Penawaran_model->keterangan_penawaran;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Penawaran_model->count_all(),
			"recordsFiltered" => $this->Penawaran_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}


	public function list_kategori_glassware()
	{
		$list = $this->Kategori_Glassware_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Kategori_Glassware_model) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit(' . "'" . $Kategori_Glassware_model->id_instrumen . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus(' . "'" . $Kategori_Glassware_model->id_instrumen . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';



			$row[] = $no;

			$row[] = '<a class="btn btn-primary btn-sm" style="width:120px;height:28px" href="/labsm/sysadmin/glassware/' . $Kategori_Glassware_model->id_instrumen . '" >' . $Kategori_Glassware_model->id_instrumen . '</a>';

			$row[] = $Kategori_Glassware_model->kategori_instrumen;
			$row[] = $this->Glassware_model->JumlahStok($Kategori_Glassware_model->id_instrumen);

			$row[] = $Kategori_Glassware_model->periode_kalibrasi;

			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Kategori_Glassware_model->count_all(),
			"recordsFiltered" => $this->Kategori_Glassware_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_kategori_instrumen()
	{
		$list = $this->Kategori_Instrumen_model->get_datatables();


		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Kategori_Instrumen_model) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit(' . "'" . $Kategori_Instrumen_model->id_instrumen . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus(' . "'" . $Kategori_Instrumen_model->id_instrumen . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';

			$row[] = $no;
			$row[] = '<a class="btn btn-primary btn-sm" style="width:120px;height:28px" href="/labsm/sysadmin/instrumen/' . $Kategori_Instrumen_model->id_instrumen . '" >' . $Kategori_Instrumen_model->id_instrumen . '</a>';

			$row[] = $Kategori_Instrumen_model->kategori_instrumen;
			$row[] = $this->Instrumen_model->JumlahStok($Kategori_Instrumen_model->id_instrumen);

			$row[] = $Kategori_Instrumen_model->periode_kalibrasi;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Kategori_Instrumen_model->count_all(),
			"recordsFiltered" => $this->Kategori_Instrumen_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function Fungsi_Simpan()
	{
		// $this->_validate();
		$data = array(

			'id_instrumen' => $this->input->post('id_instrumen'),
			'kategori_instrumen' => $this->input->post('kategori'),
			'periode_kalibrasi' => $this->input->post('periode'),
		);
		$insert = $this->Kategori_Instrumen_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function Tambah_input_kalibrasi_glassware()
	{
		// $this->_validate();
		$data = array(
			'id_aset' => $this->input->post('id_aset'),
			'id_laporan' => $this->Kalibrasi_Glassware_model->Kode_Laporan(),
			'perulangan' => $this->Kalibrasi_Glassware_model->Membuat_Kode_Otomatis(),
			'berat_kosong' => $this->input->post('berat_kosong'),
			'berat_isi' => $this->input->post('berat_isi'),
			'berat_air' => $this->input->post('berat_air'),
			'suhu_akuades' => $this->input->post('suhu_akuades'),
			'hasil1' => $this->input->post('hasil1'),
			'hasil2' => $this->input->post('hasil2'),
			'hasil3' => $this->input->post('hasil3'),
			'hasil4' => $this->input->post('hasil4'),
			'V20' => $this->input->post('v20'),
		);

		$insert = $this->Kalibrasi_Glassware_model->save($data);
		echo json_encode(array("status" => TRUE));
	}
	public function Save_Update_input_glassware()
	{
		// $this->_validate();
		$data = array(
			'id_input' => $this->input->post('id_input'),
			'perulangan' => $this->input->post('perulangan'),
			'berat_kosong' => $this->input->post('berat_kosong'),
			'berat_isi' => $this->input->post('berat_isi'),
			'berat_air' => $this->input->post('berat_air'),
			'suhu_akuades' => $this->input->post('suhu_akuades'),
			'hasil1' => $this->input->post('hasil1'),
			'hasil2' => $this->input->post('hasil2'),
			'hasil3' => $this->input->post('hasil3'),
			'hasil4' => $this->input->post('hasil4'),
			'V20' => $this->input->post('v20'),
		);

		$this->Kalibrasi_Glassware_model->update(array('id_input' => $this->input->post('id_input')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function laporan_kalibrasi()
	{

		$this->load->library('pdf');
		$paper_size = array(0, 0, 467.716, 609.448); /*for manual size*/
		$this->pdf->set_paper($paper_size, 'potrait');
		$segment = $this->uri->segment(3);
		$data['dataJoin'] = $this->Kalibrasi_Glassware_model->AmbilDataJoin($segment);
		$data['dataJoinKeterangan'] = $this->Kalibrasi_Glassware_model->AmbilDataJoinKeterangan($segment);
		$data['dataSession'] = $this->User_model->getDataPernrSession();
		$this->pdf->load_view('template/printout/kalibrasi/laporan', $data);
	}

	public function lembar_kalibrasi()
	{

		$this->load->library('pdf');
		$paper_size = array(0, 0, 467.716, 609.448); /*for manual size*/
		$this->pdf->set_paper($paper_size, 'potrait');
		// $this->pdf->setPaper('A5', 'potrait');
		$segment = $this->uri->segment(3);
		$data['dataJoin'] = $this->Kalibrasi_Glassware_model->AmbilDataJoin($segment);
		$data['dataJoinKeterangan'] = $this->Kalibrasi_Glassware_model->AmbilDataJoinKeterangan($segment);

		$this->pdf->load_view('template/printout/kalibrasi/lembarkerja', $data);
	}

	function encode_img_base64($img_path = false, $img_type = 'png')
	{
		if ($img_path) {
			//convert image into Binary data
			$img_data = fopen($img_path, 'rb');
			$img_size = filesize($img_path);
			$binary_image = fread($img_data, $img_size);
			fclose($img_data);

			//Build the src string to place inside your img tag
			$img_src = "data:image/" . $img_type . ";base64," . str_replace("\n", "", base64_encode($binary_image));

			return $img_src;
		}

		return false;
	}
	public function Tambah_order()
	{
		// $this->_validate();

		// $kode = $this->Instrumen_model->KodePCR();
		$data = array(
			'id_batch' => $this->Order_model->Kode_batch(),
			// 'id_order' => $this->Order_model->Membuat_Kode_Otomatis(),
			// 'tanggal_input' => $this->input->post('tanggal_input'),
			// 'kategori_barang' => $this->input->post('kategori_barang'),
			// 'nama_barang' => $this->input->post('nama_barang'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			// 'rumus_instrumen' => $this->input->post('rumus_instrumen'),
			// 'jumlah' => $this->input->post('jumlah'),
			// 'nama' => $this->input->post('nama'),
			// 'keterangan' => $this->input->post('keterangan'),
			// 'id_status' => $this->input->post('status'),
			// 'urgent' => $this->input->post('urgent'),
			// 'satuan' => $this->input->post('satuan'),
			// 'merek' => $this->input->post('brand'),
			// 'ukuran' => $this->input->post('ukuran'),
			// 'type' => $this->input->post('type'),
			// 'grade' => $this->input->post('grade'),
			// 'penawaran' => $this->input->post('penawaran'),
			// 'last_edit' => $this->input->post('last_edit'),
			// 'tanggal_buat' => $this->input->post('tanggal_waktu'),
		);
		$insert = $this->Order_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function Tambah_order_persetujuan_Supervisor()
	{
		// $this->_validate();

		// $kode = $this->Instrumen_model->KodePCR();
		$data = array(
			'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
			// 'id_order' => $this->Order_model->Membuat_Kode_Otomatis(),
			'tanggal_input' => $this->input->post('tanggal_input'),
			// 'kategori_barang' => $this->input->post('kategori_barang'),
			// 'nama_barang' => $this->input->post('nama_barang'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			// 'rumus_instrumen' => $this->input->post('rumus_instrumen'),
			// 'jumlah' => $this->input->post('jumlah'),
			// 'nama' => $this->input->post('nama'),
			'penyelia' => $this->input->post('penyelia'),
			// 'id_status' => $this->input->post('status'),
			// 'urgent' => $this->input->post('urgent'),
			// 'satuan' => $this->input->post('satuan'),
			// 'merek' => $this->input->post('brand'),
			// 'ukuran' => $this->input->post('ukuran'),
			// 'type' => $this->input->post('type'),
			// 'grade' => $this->input->post('grade'),
			'id_status' => 1,
			'last_edit' => $this->input->post('last_edit'),
			'tanggal_buat' => $this->input->post('tanggal_waktu'),
		);

		$data2 = array(
			'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
			'id_status' => 2,
			'tanggal_penyelia' => $this->input->post('tanggal_waktu'),
		);
		$dataOrderUnit = $this->input->post('id_order_unit');
		$dataStatus = 1;


		$this->load->config('email');
		$this->load->library('email');
		$this->email->set_mailtype("html");
		//prasojo.tri@sidomunul.co.id $this->input->post('email_penyelia');
		$spv = $this->input->post('penyelia');
		$email_spv = $this->input->post('email_penyelia');
		$email_kaunit = $this->input->post('email_kaunit');

		$from = "Labsm System";
		$to = 	$email_spv;
		$noorder = $this->Order_Persetujuan_model->Kode_tiket();
		$subject = 'Permintaan Pesetujuan Order - ' . $noorder;
		// 
		$message = "
		Kepada Yth  <br>
		Bapak / Ibu " . $spv . " <br>
		
		<br>Mohon untuk meninjau permintaan order :
			<br><br>Id Batch : " . $noorder .


			"<br><br>Silahkan login pada sistem <a href='http://193.13.7.3/labsm/'>Klik Disini</a>
			<br><i>*Sistem hanya bisa dibuka jaringan intranet / lokal</i>
			<br><br>Terima Kasih <br>Labsm System";

		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		if ($this->email->send()) {
			$this->db->trans_start();

			$this->Instrumen_Baru_model->updatePersetujuanSpv($dataOrderUnit, $dataStatus,	$data2);
			$this->Order_Persetujuan_model->save($data);
			$this->db->trans_complete();
			echo json_encode(array("status" => TRUE));
		} else {
			show_error($this->email->print_debugger());
		}
	}

	public function Tambah_order_persetujuan_admin()
	{

		$data = array(
			'id_batch' =>  $this->Order_Persetujuan_model->Kode_batch(),
			'id_status' => 2,
			'last_edit' => $this->input->post('last_edit'),
			'tanggal_penyelia' => $this->input->post('tanggal_waktu'),
		);

		$data2 = array(
			'id_batch' =>  $this->Order_Persetujuan_model->Kode_batch(),
			'id_status' => 3,
			// 'tanggal_penyelia' => $this->input->post('tanggal_waktu'),
		);

		$dataTiket = $this->input->post('id_order_tiket');
		$dataOrderUnit = $this->input->post('id_order_unit');
		$dataStatus = 2;

		$this->load->config('email');
		$this->load->library('email');
		$this->email->set_mailtype("html");

		$spv = $this->input->post('penyelia');
		$email_spv = $this->input->post('email_penyelia');
		$email_lab = 'laboratorium.order@gmail.com';
		$email_kaunit = $this->input->post('email_kaunit');

		$from = "Labsm System";
		$to = 	'prasojotrii@gmail.com';

		$noorder = $this->Order_Persetujuan_model->Kode_batch();
		$subject = 'Permintaan Pesetujuan Order - ' . $noorder;

		$message = "
		Kepada Yth  <br>
		Bapak / Ibu <br>
		Bagian Adminitrasi Laboratorium<br>
		
		
		<br>Mohon untuk meninjau permintaan order :
			<br><br>Id Batch : " . $noorder .


			"<br><br>Silahkan login pada sistem <a href='http://193.13.7.3/labsm/'>Klik Disini</a>
			<br><i>*Sistem hanya bisa dibuka jaringan intranet / lokal</i>
			<br><br>Terima Kasih <br>Labsm System";

		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		if ($this->email->send()) {

			$this->db->trans_start();;
			$this->Instrumen_Baru_model->updatePersetujuanAdmin($dataTiket, $data2);
			$this->Order_Persetujuan_model->update(array('id_order_tiket' => $this->input->post('id_order_tiket')), $data);




			$this->db->trans_complete();

			echo json_encode(array("status" => TRUE));
		} else {
			show_error($this->email->print_debugger());
		}
	}

	public function Tambah_order_persetujuan_KaUnit()
	{
		// $this->_validate();

		// $kode = $this->Instrumen_model->KodePCR();
		$data = array(
			// 'id_batch' =>  $this->input->post('id_batch'),
			// 'id_order' => $this->Order_model->Membuat_Kode_Otomatis(),
			// 'tanggal_input' => $this->input->post('tanggal_input'),
			// 'kategori_barang' => $this->input->post('kategori_barang'),
			// 'nama_barang' => $this->input->post('nama_barang'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			// 'rumus_instrumen' => $this->input->post('rumus_instrumen'),
			// 'jumlah' => $this->input->post('jumlah'),
			// 'nama' => $this->input->post('nama'),
			// 'keterangan' => $this->input->post('keterangan'),
			// 'id_status' => $this->input->post('status'),
			// 'urgent' => $this->input->post('urgent'),
			// 'satuan' => $this->input->post('satuan'),
			// 'merek' => $this->input->post('brand'),
			// 'ukuran' => $this->input->post('ukuran'),
			// 'type' => $this->input->post('type'),
			// 'grade' => $this->input->post('grade'),
			'id_status' => 3,
			'last_edit' => $this->input->post('last_edit'),
			'tanggal_ka_unit' => $this->input->post('tanggal_waktu'),
		);
		$data2 = array(
			// 'id_batch' =>  $this->input->post('id_batch'),
			// 'id_order' => $this->Order_model->Membuat_Kode_Otomatis(),
			// 'tanggal_input' => $this->input->post('tanggal_input'),
			// 'kategori_barang' => $this->input->post('kategori_barang'),
			// 'nama_barang' => $this->input->post('nama_barang'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			// 'rumus_instrumen' => $this->input->post('rumus_instrumen'),
			// 'jumlah' => $this->input->post('jumlah'),
			// 'nama' => $this->input->post('nama'),
			// 'keterangan' => $this->input->post('keterangan'),
			// 'id_status' => $this->input->post('status'),
			// 'urgent' => $this->input->post('urgent'),
			// 'satuan' => $this->input->post('satuan'),
			// 'merek' => $this->input->post('brand'),
			// 'ukuran' => $this->input->post('ukuran'),
			// 'type' => $this->input->post('type'),
			// 'grade' => $this->input->post('grade'),
			'id_status' => 4,
			// 'last_edit' => $this->input->post('last_edit'),
			'tanggal_ka_unit' => $this->input->post('tanggal_waktu'),
		);

		$dataOrderUnit = $this->input->post('id_batch');
		$dataStatus = 3;

		$this->load->config('email');
		$this->load->library('email');
		$this->email->set_mailtype("html");

		$spv = $this->input->post('penyelia');
		$email_spv = $this->input->post('email_penyelia');
		$email_lab = 'laboratorium.order@gmail.com';
		$email_kaunit = $this->input->post('email_kaunit');
		$to2 = 	'prasojotrii@gmail.com';
		$from = "Labsm System";
		$to = 	$to2;

		$noorder = $this->input->post('id_batch');
		$subject = 'Permintaan Pesetujuan Order - ' . $noorder;

		$message = "
		Kepada Yth  <br>
		Bapak / Ibu Kepala Unit <br>
		
		
		<br>Mohon untuk meninjau permintaan order :
			<br><br>Id Batch : " . $noorder .


			"<br><br>Silahkan login pada sistem <a href='http://193.13.7.3/labsm/'>Klik Disini</a>
			<br><i>*Sistem hanya bisa dibuka jaringan intranet / lokal</i>
			<br><br>Terima Kasih <br>Labsm System";

		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		if ($this->Order_Persetujuan_model->update(array('id_batch' => $this->input->post('id_batch')), $data)) {
			$this->db->trans_start();


			$this->Instrumen_Baru_model->updatePersetujuanKaUnit($dataOrderUnit, $dataStatus,	$data2);
			$this->email->send();
			$this->db->trans_complete();


			echo json_encode(array("status" => TRUE));
		} else {
			show_error($this->email->print_debugger());
		}
	}

	public function Tambah_order_baru()
	{

		$lokasi = $this->input->post('keterangan');


		if ($lokasi == 'Lab PCR') {
			$data = array(
				'id_order' => $this->Instrumen_Baru_model->Membuat_Kode_Otomatis(),
				'id_order_unit' => 'PCR',
				// 'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
				// 'id_batch' => $this->input->post('id_batch'),
				'id_order_tiket' => $this->input->post('id_order_tiket'),
				'tanggal_input' => $this->input->post('tanggal_input'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instrumen' => $this->input->post('id_instrumen'),
				'rumus_instrumen' => $this->input->post('rumus_instrumen'),
				'jumlah' => $this->input->post('jumlah'),
				'nama' => $this->input->post('nama'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'keterangan' => $this->input->post('keterangan'),
				'penyelia' => $this->input->post('penyelia'),
				'id_status' => $this->input->post('id_status'),
				'urgent' => $this->input->post('urgent'),
				'satuan' => $this->input->post('satuan'),
				'merek' => $this->input->post('brand'),
				'ukuran' => $this->input->post('ukuran'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		} else if ($lokasi == 'Lab Mikrobiologi') {

			$data = array(
				'id_order' => $this->Instrumen_Baru_model->Membuat_Kode_Otomatis(),
				'id_order_unit' => 'MKR',
				// 'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
				// 'id_batch' => $this->input->post('id_batch'),
				'id_order_tiket' => $this->input->post('id_order_tiket'),
				'tanggal_input' => $this->input->post('tanggal_input'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instrumen' => $this->input->post('id_instrumen'),
				'rumus_instrumen' => $this->input->post('rumus_instrumen'),
				'jumlah' => $this->input->post('jumlah'),
				'nama' => $this->input->post('nama'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'keterangan' => $this->input->post('keterangan'),
				'penyelia' => $this->input->post('penyelia'),
				'id_status' => $this->input->post('id_status'),
				'urgent' => $this->input->post('urgent'),
				'satuan' => $this->input->post('satuan'),
				'merek' => $this->input->post('brand'),
				'ukuran' => $this->input->post('ukuran'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		} else if ($lokasi == 'Lab Instrument') {
			$data = array(
				'id_order' => $this->Instrumen_Baru_model->Membuat_Kode_Otomatis(),
				'id_order_unit' => 'INS',
				// 'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
				// 'id_batch' => $this->input->post('id_batch'),
				'id_order_tiket' => $this->input->post('id_order_tiket'),
				'tanggal_input' => $this->input->post('tanggal_input'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instrumen' => $this->input->post('id_instrumen'),
				'rumus_instrumen' => $this->input->post('rumus_instrumen'),
				'jumlah' => $this->input->post('jumlah'),
				'nama' => $this->input->post('nama'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'keterangan' => $this->input->post('keterangan'),
				'penyelia' => $this->input->post('penyelia'),
				'id_status' => $this->input->post('id_status'),
				'urgent' => $this->input->post('urgent'),
				'satuan' => $this->input->post('satuan'),
				'merek' => $this->input->post('brand'),
				'ukuran' => $this->input->post('ukuran'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		} else if ($lokasi == 'Lab Kimia 1 MTS') {
			$data = array(
				'id_order' => $this->Instrumen_Baru_model->Membuat_Kode_Otomatis(),
				'id_order_unit' => 'MTS',
				// 'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
				// 'id_batch' => $this->input->post('id_batch'),
				'id_order_tiket' => $this->input->post('id_order_tiket'),
				'tanggal_input' => $this->input->post('tanggal_input'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instrumen' => $this->input->post('id_instrumen'),
				'rumus_instrumen' => $this->input->post('rumus_instrumen'),
				'jumlah' => $this->input->post('jumlah'),
				'nama' => $this->input->post('nama'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'keterangan' => $this->input->post('keterangan'),
				'penyelia' => $this->input->post('penyelia'),
				'id_status' => $this->input->post('id_status'),
				'urgent' => $this->input->post('urgent'),
				'satuan' => $this->input->post('satuan'),
				'merek' => $this->input->post('brand'),
				'ukuran' => $this->input->post('ukuran'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		} else if ($lokasi == 'Lab Kimia 1 OMG') {
			$data = array(
				'id_order' => $this->Instrumen_Baru_model->Membuat_Kode_Otomatis(),
				'id_order_unit' => 'OMG',
				// 'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
				// 'id_batch' => $this->input->post('id_batch'),
				'id_order_tiket' => $this->input->post('id_order_tiket'),
				'tanggal_input' => $this->input->post('tanggal_input'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instrumen' => $this->input->post('id_instrumen'),
				'rumus_instrumen' => $this->input->post('rumus_instrumen'),
				'jumlah' => $this->input->post('jumlah'),
				'nama' => $this->input->post('nama'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'keterangan' => $this->input->post('keterangan'),
				'penyelia' => $this->input->post('penyelia'),
				'id_status' => $this->input->post('id_status'),
				'urgent' => $this->input->post('urgent'),
				'satuan' => $this->input->post('satuan'),
				'merek' => $this->input->post('brand'),
				'ukuran' => $this->input->post('ukuran'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		} else if ($lokasi == 'Lab Kimia 2 BBG') {
			$data = array(
				'id_order' => $this->Instrumen_Baru_model->Membuat_Kode_Otomatis(),
				'id_order_unit' => 'BBG',
				// 'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
				// 'id_batch' => $this->input->post('id_batch'),
				'id_order_tiket' => $this->input->post('id_order_tiket'),
				'tanggal_input' => $this->input->post('tanggal_input'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instrumen' => $this->input->post('id_instrumen'),
				'rumus_instrumen' => $this->input->post('rumus_instrumen'),
				'jumlah' => $this->input->post('jumlah'),
				'nama' => $this->input->post('nama'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'keterangan' => $this->input->post('keterangan'),
				'penyelia' => $this->input->post('penyelia'),
				'id_status' => $this->input->post('id_status'),
				'urgent' => $this->input->post('urgent'),
				'satuan' => $this->input->post('satuan'),
				'merek' => $this->input->post('brand'),
				'ukuran' => $this->input->post('ukuran'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		} else if ($lokasi == 'Lab Kimia 3 Lingkungan') {
			$data = array(
				'id_order' => $this->Instrumen_Baru_model->Membuat_Kode_Otomatis(),
				'id_order_unit' => 'LGK',
				// 'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
				// 'id_batch' => $this->input->post('id_batch'),
				'id_order_tiket' => $this->input->post('id_order_tiket'),
				'tanggal_input' => $this->input->post('tanggal_input'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instrumen' => $this->input->post('id_instrumen'),
				'rumus_instrumen' => $this->input->post('rumus_instrumen'),
				'jumlah' => $this->input->post('jumlah'),
				'nama' => $this->input->post('nama'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'keterangan' => $this->input->post('keterangan'),
				'penyelia' => $this->input->post('penyelia'),
				'id_status' => $this->input->post('id_status'),
				'urgent' => $this->input->post('urgent'),
				'satuan' => $this->input->post('satuan'),
				'merek' => $this->input->post('brand'),
				'ukuran' => $this->input->post('ukuran'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		} else if ($lokasi == 'Administrasi Laboratorium') {
			$data = array(
				'id_order' => $this->Instrumen_Baru_model->Membuat_Kode_Otomatis(),
				'id_order_unit' => 'ADM',
				// 'id_order_tiket' => $this->Order_Persetujuan_model->Kode_tiket(),
				// 'id_batch' => $this->input->post('id_batch'),
				'id_order_tiket' => $this->input->post('id_order_tiket'),
				'tanggal_input' => $this->input->post('tanggal_input'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'id_instrumen' => $this->input->post('id_instrumen'),
				'rumus_instrumen' => $this->input->post('rumus_instrumen'),
				'jumlah' => $this->input->post('jumlah'),
				'nama' => $this->input->post('nama'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'keterangan' => $this->input->post('keterangan'),
				'penyelia' => $this->input->post('penyelia'),
				'id_status' => $this->input->post('id_status'),
				'urgent' => $this->input->post('urgent'),
				'satuan' => $this->input->post('satuan'),
				'merek' => $this->input->post('brand'),
				'ukuran' => $this->input->post('ukuran'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		}



		echo json_encode(array("status" => TRUE));
	}


	public function Tambah_user()
	{
		// $this->_validate();
		$data = array(

			'id_user' => $this->input->post('id_user'),

			'pernr' => $this->input->post('pernr'),
			'nama' => $this->input->post('nama'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'sub_laboratorium' => $this->input->post('sub_laboratorium'),
			'penyelia' => $this->input->post('penyelia'),
			'kepalaunit' => $this->input->post('kepalaunit'),
			'is_active' => 'Yes',
			'tipe' => $this->input->post('tipe'),
		);


		$data2 = $this->input->post('tipe');
		$data3 = array(


			'id_user' => $this->input->post('id_user'),

		);

		$this->db->trans_start();
		$this->User_model->save($data);
		$this->User_model->SaveUserBaru($data2, $data3);


		// $this->User_Akses_model->update(array('id_user' => ''), $data3);

		$this->db->trans_complete();
		echo json_encode(array("status" => TRUE));
	}


	public function Tambah_Halaman()
	{
		// $this->_validate();
		$data = array(


			'nama_halaman' => $this->input->post('nama_halaman'),
			'title' => $this->input->post('title'),
			'url' => $this->input->post('url'),
			'view' => 1,
			'create' => 1,
			'update' => 0,
			'delete' => 0,
		);
		$insert = $this->Master_Halaman_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function Tambah_Akses_Role()
	{
		// $this->_validate();
		$data = array(

			'nama_role' => $this->input->post('namarole'),
			'id_halaman' => $this->input->post('role_id_halaman'),
			'nama_halaman' => $this->input->post('rolenamahalaman'),
			'title' => $this->input->post('roletitle'),
			'url' => $this->input->post('roleurl'),
			'view' => 1,
			'create' => 0,
			'update' => 0,
			'delete' => 0,
		);
		$insert = $this->User_Role_model->save($data);
		echo json_encode(array("status" => TRUE));
	}





	public function Tambah_Penawaran()
	{

		$data = array(
			'id_penawaran' => $this->input->post('id_penawaran'),
			'id_order' => $this->input->post('info_id_order'),
			'nama_supplier' => $this->input->post('nama_supplier'),
			'keterangan_penawaran' => $this->input->post('keterangan_penawaran'),
		);

		if (!empty($_FILES['input_penawaran']['name'])) {
			$upload = $this->_do_upload();
			$data['nama_penawaran'] = $upload;
		}

		$insert = $this->Penawaran_model->save($data);
		// blok kode yang akan diulang di sini!



		echo json_encode(array("status" => TRUE));
	}




	private function _do_upload()
	{
		$id1 = $this->input->post('info_id_order');
		$namasup1 = $this->input->post('nama_supplier');

		$config['upload_path']          = 'assets/upload/penawaran/';
		$config['allowed_types']        = 'pdf|doc|docx';
		// $config['max_size']             = 100; //set max size allowed in Kilobyte
		// $config['max_width']            = 1000; // set max width image allowed
		// $config['max_height']           = 1000; // set max height allowed
		$config['file_name']            = $id1 . '_' . $namasup1; //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('input_penawaran')) //upload and validate
		{
			$data['inputerror'][] = 'input_penawaran';
			$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}



	public function Fungsi_Mulai_Kalibrasi()
	{
		// $this->_validate();
		$data = array(

			// 'id_aset' => $this->input->post('id_aset'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			// 'tipe_instrumen' => $this->input->post('tipe_instrumen'),
			// 'merek' => $this->input->post('brand'),
			// 'seri' => $this->input->post('seri'),
			// 'serial_number' => $this->input->post('serial_number'),
			// 'tahun' => $this->input->post('tahun'),
			// 'lokasi' => $this->input->post('lokasi'),
			'aktif' => $this->input->post('aktif'),
			// 'kondisi' => $this->input->post('kondisi'),
			// 'user_input' => $this->input->post('user_input'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),


			'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
			// 'aktif' => $this->input->post('aktif'),
			'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),

		);

		$data2 = array(
			'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			'id_aset' => $this->input->post('id_aset'),
			'tindakan' => $this->input->post('tindakan'),
			'petugas' => $this->input->post('petugas'),
			'jam_mulai' => $this->input->post('tanggal_input'),

			'kondisi' => $this->input->post('kondisi'),
			// 'keterangan' => $this->input->post('keterangan'),
			'user_input' => $this->input->post('user_input'),
			'tanggal_input' => $this->input->post('tanggal_input'),



		);

		$this->db->trans_start();
		$this->Instrumen_model->update(array('id_aset' => $this->input->post('id_aset')), $data);
		$insert = $this->Riwayat_Instrumen_model->save($data2);
		$this->db->trans_complete();

		echo json_encode(array("status" => TRUE));
	}


	public function Fungsi_Mulai_Kalibrasi_Glassware()
	{
		// $this->_validate();
		$data = array(

			// 'id_aset' => $this->input->post('id_aset'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			// 'tipe_instrumen' => $this->input->post('tipe_instrumen'),
			// 'merek' => $this->input->post('brand'),
			// 'seri' => $this->input->post('seri'),
			// 'serial_number' => $this->input->post('serial_number'),
			// 'tahun' => $this->input->post('tahun'),
			// 'lokasi' => $this->input->post('lokasi'),
			'aktif' => $this->input->post('aktif'),
			// 'kondisi' => $this->input->post('kondisi'),
			// 'user_input' => $this->input->post('user_input'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),


			'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
			// 'aktif' => $this->input->post('aktif'),
			'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),

		);

		$data2 = array(
			'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			'id_aset' => $this->input->post('id_aset'),
			'tindakan' => $this->input->post('tindakan'),
			'petugas' => $this->input->post('petugas'),
			'jam_mulai' => $this->input->post('tanggal_input'),

			'kondisi' => $this->input->post('kondisi'),
			// 'keterangan' => $this->input->post('keterangan'),
			'user_input' => $this->input->post('user_input'),
			'tanggal_input' => $this->input->post('tanggal_input'),



		);

		$this->db->trans_start();
		$this->Glassware_model->update(array('id_aset' => $this->input->post('id_aset')), $data);
		$insert = $this->Riwayat_Instrumen_model->save($data2);
		$this->db->trans_complete();

		echo json_encode(array("status" => TRUE));
	}


	public function Fungsi_Selesai_Kalibrasi()
	{
		// $this->_validate();
		$data = array(

			// 'id_aset' => $this->input->post('id_aset'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			// 'tipe_instrumen' => $this->input->post('tipe_instrumen'),
			// 'merek' => $this->input->post('brand'),
			// 'seri' => $this->input->post('seri'),
			// 'serial_number' => $this->input->post('serial_number'),
			// 'tahun' => $this->input->post('tahun'),
			// 'lokasi' => $this->input->post('lokasi'),
			'aktif' => $this->input->post('aktif'),
			'kondisi' => $this->input->post('kondisi'),
			// 'user_input' => $this->input->post('user_input'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),


			// 'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
			// 'aktif' => $this->input->post('aktif'),
			// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),

		);

		$data2 = array(
			// 'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			// 'id_aset' => $this->input->post('id_aset'),
			// 'tindakan' => $this->input->post('tindakan'),
			// 'petugas' => $this->input->post('petugas'),
			'jam_selesai' => $this->input->post('tanggal_input'),
			'kondisi' => $this->input->post('kondisi'),
			'keterangan' => $this->input->post('keterangan'),
			// 'user_input' => $this->input->post('user_input'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),

		);

		$this->db->trans_start();
		$this->Instrumen_model->update(array('id_aset' => $this->input->post('id_aset')), $data);
		// $insert = $this->Riwayat_Instrumen_model->save($data2);
		$this->Riwayat_Instrumen_model->update(array('id_log_instrumen' => $this->input->post('id_log_instrumen')), $data2);
		$this->db->trans_complete();

		echo json_encode(array("status" => TRUE));
	}


	public function Fungsi_Selesai_Kalibrasi_Glassware()
	{
		// $this->_validate();
		$data = array(

			// 'id_aset' => $this->input->post('id_aset'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			// 'tipe_instrumen' => $this->input->post('tipe_instrumen'),
			// 'merek' => $this->input->post('brand'),
			// 'seri' => $this->input->post('seri'),
			// 'serial_number' => $this->input->post('serial_number'),
			// 'tahun' => $this->input->post('tahun'),
			// 'lokasi' => $this->input->post('lokasi'),
			'aktif' => $this->input->post('aktif'),
			'kondisi' => $this->input->post('kondisi'),
			// 'user_input' => $this->input->post('user_input'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),


			// 'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
			// 'aktif' => $this->input->post('aktif'),
			// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),

		);

		$data2 = array(
			// 'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			// 'id_aset' => $this->input->post('id_aset'),
			// 'tindakan' => $this->input->post('tindakan'),
			// 'petugas' => $this->input->post('petugas'),
			'jam_selesai' => $this->input->post('tanggal_input'),
			'kondisi' => $this->input->post('kondisi'),
			'keterangan' => $this->input->post('keterangan'),
			// 'user_input' => $this->input->post('user_input'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),
			'id_laporan' => $this->input->post('id_laporan'),
			'tempat_kalibrasi' => $this->input->post('tempatkalibrasi'),
		);

		$data3 = array(
			'id_laporan' => $this->input->post('id_laporan'),
			'id_aset' => $this->input->post('id_aset'),
			'suhu_awal' => $this->input->post('suhu_awal'),
			'suhu_ahkir' => $this->input->post('suhu_ahkir'),
			'suhu_avg' => $this->input->post('ratasuhu'),
			'kelembaban_awal' => $this->input->post('kelembaban_awal'),
			'kelembaban_ahkir' => $this->input->post('kelembaban_ahkir'),
			'kelembaban_avg' => $this->input->post('ratakelembaban'),
			'beratair_avg' => $this->input->post('rataberatair'),
			'suhuakuades_avg' => $this->input->post('ratasuhuakuades'),
			'maxsuhu' => $this->input->post('maxsuhu'),
			'minsuhu' => $this->input->post('minsuhu'),
			'V20' => $this->input->post('ratav20'),
			'stddev_pop' => $this->input->post('stddev_pop'),
			'koreksi' => $this->input->post('koreksi'),
			'ketidakpastian' => $this->input->post('ketidakpastian'),
			'waktu_input' => $this->input->post('tanggal_input'),
		);

		$this->db->trans_start();
		$this->Glassware_model->update(array('id_aset' => $this->input->post('id_aset')), $data);
		// $insert = $this->Riwayat_Instrumen_model->save($data2);
		$this->Riwayat_Instrumen_model->update(array('id_log_instrumen' => $this->input->post('id_log_instrumen')), $data2);

		$this->Kalibrasi_Glassware_model->saveHasilKalibrasi($data3);

		$this->db->trans_complete();

		echo json_encode(array("status" => TRUE));
	}


	public function Fungsi_Edit($id_instrumen)
	{
		$data = $this->Kategori_Instrumen_model->get_by_id($id_instrumen);

		echo json_encode($data);
	}

	public function Edit_Order($id_order)
	{
		$data = $this->Order_model->get_by_id($id_order);

		echo json_encode($data);
	}
	public function Fungsi_Edit_Kategori_Glassware($id_instrumen)
	{
		$data = $this->Kategori_Glassware_model->get_by_id($id_instrumen);

		echo json_encode($data);
	}
	public function Edit_Order_Diterima($id_diterima)
	{
		$data = $this->Instrumen_Baru_model->get_by_id_diterima($id_diterima);

		echo json_encode($data);
	}

	public function Edit_Order_Baru($id_order)
	{
		$data = $this->Instrumen_Baru_model->get_by_id($id_order);

		echo json_encode($data);
	}

	public function InputPerulangan()
	{

		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getPerulangan($id_laporan);

		echo json_encode($data);
	}

	public function InputPerulanganAwal()
	{

		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getPerulangan($id_laporan);

		echo json_encode($data);
	}



	public function InputStd()
	{
		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getStdDev($id_laporan);
		echo json_encode($data);
	}

	public function InputV20()
	{
		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getRataV20($id_laporan);
		echo json_encode($data);
	}
	public function InputRataBeratAir()
	{
		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getRataBeratAir($id_laporan);
		echo json_encode($data);
	}

	public function InputRataSuhuAkuades()
	{
		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getRataSuhuAkuades($id_laporan);
		echo json_encode($data);
	}

	public function InputMaxSuhu()
	{
		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getMaxSuhu($id_laporan);
		echo json_encode($data);
	}

	public function InputMinSuhu()
	{
		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getMinSuhu($id_laporan);
		echo json_encode($data);
	}

	public function LoadIdLaporan()
	{
		$id_aset = $_GET['id_aset'];
		$data = $this->Kalibrasi_Glassware_model->getIdLaporan($id_aset);
		echo json_encode($data);
	}

	public function LoadDataHasilKalibrasi()
	{
		$id_aset = $_GET['id_aset'];
		$data = $this->Kalibrasi_Glassware_model->getDataHasilKalibrasi($id_aset);
		echo json_encode($data);
	}

	public function User_edit($id_user)
	{
		$data = $this->User_model->get_by_id($id_user);

		echo json_encode($data);
	}

	public function Halaman_edit($id_halaman)
	{
		$data = $this->Master_Halaman_model->get_by_id($id_halaman);

		echo json_encode($data);
	}

	public function Edit_oder($id_order)
	{
		$data = $this->Order_model->get_by_id($id_order);

		echo json_encode($data);
	}
	public function Edit_oder_persetujuan($id_order_tiket)
	{
		$data = $this->Order_Persetujuan_model->get_by_batch($id_order_tiket);

		echo json_encode($data);
	}


	public function Edit_oder_baru($nomor)
	{
		$data = $this->Instrumen_Baru_model->get_by_nomor($nomor);

		echo json_encode($data);
	}

	public function User_update()
	{
		// $this->_validate();
		$data = array(

			'id_user' => $this->input->post('id_user'),

			'pernr' => $this->input->post('pernr'),
			'nama' => $this->input->post('nama'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'sub_laboratorium' => $this->input->post('sub_laboratorium'),
			'penyelia' => $this->input->post('penyelia'),
			'kepalaunit' => $this->input->post('kepalaunit'),
			'is_active' => 'Yes',
			'tipe' => $this->input->post('tipe'),
		);
		$this->User_model->update(array('id_user' => $this->input->post('id_user')), $data);
		echo json_encode(array("status" => TRUE));
	}


	public function Simpan_Edit_Profil()
	{
		// $this->_validate();
		$data = array(

			'nama' => $this->input->post('input_nama'),


			'password' => password_hash($this->input->post('input_password'), PASSWORD_DEFAULT),

		);
		$this->User_model->update(array('id_user' => $this->input->post('input_id_user')), $data);
		echo json_encode(array("status" => TRUE));
	}



	public function Update_Order()
	{
		// $this->_validate();
		$data = array(

			'id_order' => $this->input->post('id_order'),
			'tanggal_input' => $this->input->post('tanggal_input'),
			'kategori_barang' => $this->input->post('kategori_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'jumlah' => $this->input->post('jumlah'),
			'nama' => $this->input->post('nama'),
			'keterangan' => $this->input->post('keterangan'),

			// 'tanggal_datang' => $this->input->post('tanggal_datang'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function Update_Order_Baru()
	{
		// $this->_validate();
		$data = array(
			'urgent' => $this->input->post('urgent'),
			'kategori_barang' => $this->input->post('kategori_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			// 'rumus_instrumen' => $this->input->post('rumus_instrumen'),
			'spesifikasi' => $this->input->post('spesifikasi'),
			'keterangan' => $this->input->post('keterangan'),
			// 'id_status' => $this->input->post('status'),
			'satuan' => $this->input->post('satuan'),
			'merek' => $this->input->post('brand'),
			'ukuran' => $this->input->post('ukuran'),
			'type' => $this->input->post('type'),
			'grade' => $this->input->post('grade'),
			'jumlah' => $this->input->post('jumlah'),
			'jumlah_diterima' => $this->input->post('jumlah'),
			'nama' => $this->input->post('nama'),
			'last_edit' => $this->input->post('last_edit'),
			// 'tanggal_datang' => $this->input->post('tanggal_datang'),

		);
		$this->Instrumen_Baru_model->updateEdit(array('nomor' => $this->input->post('nomor')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function Update_Order_Terima()
	{
		// $this->_validate();




		$data = array(

			'id_order' => $this->input->post('id_order'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),
			// 'kategori_barang' => $this->input->post('kategori_barang'),
			// 'nama_barang' => $this->input->post('nama_barang'),
			// 'jumlah' => $this->input->post('jumlah'),
			// 'nama' => $this->input->post('nama'),
			'id_status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'),
			'tanggal_datang' => $this->input->post('tanggal_input'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function Update_Order_Status2()
	{
		// $this->_validate();



		$data = array(


			'tanggal_penyelia' => $this->input->post('tanggal_waktu'),
			'id_status' => $this->input->post('status'),
			'last_edit' => $this->input->post('last_edit'),

		);



		$this->load->config('email');
		$this->load->library('email');
		$this->email->set_mailtype("html");

		$from = "Labsm System";
		$to = $this->input->post('email');
		$noorder = $this->input->post('id_order');
		$subject = 'Permintaan Pesetujuan Order - ' . $noorder;
		$nama_barang = $this->input->post('nama_barang_email');
		$link = "<a href='http://193.13.7.3/labsm/'>Klik Disini</a>";
		$message = "
		Kepada Yth <br>
		
		<br>Mohon untuk meninjau permintaan order :
			<br><br>Id Order : " . $noorder .
			"<br>Nama Barang :" . $nama_barang .

			"<br><br>Silahkan login pada sistem <a href='http://193.13.7.3/labsm/'>Klik Disini</a>
			<br><i>*Sistem hanya bisa dibuka jaringan intranet / lokal</i>
			<br><br>Terima Kasih <br>Labsm System";

		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data);
			echo json_encode(array("status" => TRUE));
		} else {
			show_error($this->email->print_debugger());
		}
	}

	public function Update_Order_Status3()
	{
		// $this->_validate();
		$data = array(
			'keterangan_ka_unit' => $this->input->post('keterangan_tambahan'),
			'tanggal_ka_unit' => $this->input->post('info_tanggal_waktu'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function Update_Order_Status4()
	{
		// $this->_validate();
		$data = array(

			'tanggal_admin' => $this->input->post('info_tanggal_waktu'),
			'penawaran' => $this->input->post('info_penawaran'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}



	public function Update_Order_Status5()
	{
		// $this->_validate();
		$data = array(

			'tanggal_upload' => $this->input->post('info_tanggal_waktu'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);

		// echo json_encode(array("status" => TRUE));

		$this->load->config('email');
		$this->load->library('email');
		$this->email->set_mailtype("html");

		$from = "Labsm System";

		$to = 'laboratorium.order@gmail.com';
		$to2 = 'prasojotrii@gmail.com';
		$noorder = $this->input->post('info_id_order');
		$subject = 'Permintaan Penawaran Order - ' . $noorder;

		$message = "
		Kepada Yth  <br>
		Administrasi Laboratorium<br>
		
		<br>Mohon untuk meninjau penawaran:
			<br><br>Id Order : " . $noorder .


			"<br><br>Silahkan login pada sistem <a href='http://193.13.7.3/labsm/'>Klik Disini</a>
			<br><i>*Sistem hanya bisa dibuka jaringan intranet / lokal</i>
			<br><br>Terima Kasih <br>Labsm System";

		$this->email->set_newline("\r\n");
		$this->email->from($from);

		$this->email->to($to2);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data);
			echo json_encode(array("status" => TRUE));
		} else {
			show_error($this->email->print_debugger());
		}
	}



	public function Update_Order_Status6()
	{
		// $this->_validate();
		$data = array(
			//direktur

			'keterangan_seleksi_unit' => $this->input->post('keterangan_tambahan'),
			'tanggal_seleksi' => $this->input->post('info_tanggal_waktu'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}



	public function Update_Order_Status7()
	{
		// $this->_validate();
		$data = array(
			'tanggal_admin' => $this->input->post('info_tanggal_waktu'),
			'penawaran' => $this->input->post('info_penawaran'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}



	public function Update_Order_Status8()
	{
		// $this->_validate();
		$data = array(
			'no_pr' => $this->input->post('info_no_pr'),

			'keterangan_pr' => $this->input->post('keterangan_tambahan'),

			'tanggal_pr' => $this->input->post('info_tanggal_waktu'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function Update_Order_Status_nopo()
	{
		// $this->_validate();
		$data = array(
			'no_po' => $this->input->post('info_no_po'),

			// 'keterangan_pr' => $this->input->post('keterangan_tambahan'),

			// 'tanggal_pr' => $this->input->post('tanggal_waktu'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}



	public function Update_Order_Status10()
	{
		$diterima = $this->input->post('info_jumlah_diterima');
		$datang = $this->input->post('info_input_jumlah');
		$hasil = $diterima + $datang;

		$data = $this->input->post('info_id_order');

		$data2 = array(
			'keterangan_diterima' => $this->input->post('keterangan_tambahan'),
			'tanggal_diterima' => $this->input->post('info_tanggal_waktu'),
			'tanggal_datang' => $this->input->post('info_tanggal_input'),
			'jumlah_diterima' => $hasil,
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);

		$data3 = array(
			'jumlah_diterima' => $this->input->post('info_input_jumlah'),
		);

		$this->db->trans_start();
		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data2);
		$this->Instrumen_Baru_model->saveGlasswareBaru();
		$this->Instrumen_Baru_model->updateGlasswareBaru($data, $data3);
		$this->db->trans_complete();


		echo json_encode(array("status" => TRUE));
	}

	public function Update_Order_Status11()
	{

		$data = $this->input->post('info_id_order');

		$data2 = array(
			'keterangan_diterima' => $this->input->post('keterangan_tambahan'),
			'tanggal_diterima' => $this->input->post('info_tanggal_waktu'),
			'tanggal_datang' => $this->input->post('info_tanggal_input'),
			'jumlah_diterima' => $this->input->post('info_input_jumlah'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);

		$this->db->trans_start();
		// $this->Instrumen_Baru_model->saveBarangBaru($data);
		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data2);
		$this->Instrumen_Baru_model->saveGlasswareBaru($data);
		$this->db->trans_complete();

		// $this->db->trans_start();
		// // $this->db->insert_batch('detail', $result);
		// $this->Order_model->update(array('id_order' => $this->input->post('id_order')), $data);
		// $this->db->trans_complete();

		echo json_encode(array("status" => TRUE));
	}

	public function Tambah_data_glassware()
	{
		$jumlah = $this->input->post('jumlah');
		for ($i = 0; $i < $jumlah; $i++) {
			$data = array(
				'id_aset' => $this->Glassware_model->KodePCR(),
				// 'id_instrumen' => $this->input->post('id_instrumen'),
				// // 'no_aset' => $this->input->post('no_aset'),
				'tipe_instrumen' => $this->input->post('nama_barang'),
				// // 'satuan' => $this->input->post('satuan'),
				// 'merek' => $this->input->post('brand'),
				// 'kapasitas' => $this->input->post('ukuran'),
				// 'type' => $this->input->post('type'),
				// 'grade' => $this->input->post('grade'),
				// 'rumus_instrumen' => $this->input->post('rumus'),
				// // 'tahun' => $this->input->post('tahun'),
				// 'lokasi' => $this->input->post('lokasi'),
				// 'aktif' => $this->input->post('aktif'),
				// 'kondisi' => $this->input->post('kondisi'),

				// 'status_kalibrasi' => $this->input->post('status_kalibrasi'),
				// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
				// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
				// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
				// 'user_input' => $this->input->post('user_input'),
				// 'tanggal_input' => $this->input->post('tanggal_input'),
			);

			$this->Glassware_model->save($data);
			echo json_encode(array("status" => TRUE));
		}
	}
	public function Update_disetujui_Kaunit()
	{

		$data = $this->input->post('id_batch');

		$data2 = array(
			'keterangan_diterima' => $this->input->post('keterangan_tambahan'),
			'tanggal_diterima' => $this->input->post('tanggal_waktu'),
			'tanggal_datang' => $this->input->post('tanggal_input'),
			'id_status' => $this->input->post('status'),
			'last_edit' => $this->input->post('last_edit'),
		);

		$data3 = array(
			'id_status' => 5,
			'tanggal_ka_unit' => $this->input->post('tanggal_waktu'),
		);

		$dataOrderUnit = $this->input->post('id_order_unit');

		$dataStatus = 4;

		$this->load->config('email');
		$this->load->library('email');
		$this->email->set_mailtype("html");

		$spv = $this->input->post('penyelia');
		$email_spv = $this->input->post('email_penyelia');
		$email_lab = 'laboratorium.order@gmail.com';
		$email_kaunit = $this->input->post('email_kaunit');

		$from = "Labsm System";
		$to2 = 	'rndsidomuncul@gmail.com';
		$to = 	'prasojotrii@gmail.com';

		$noorder = $this->input->post('id_batch');
		$subject = 'Pemberitahunan Order Internal -' . $noorder;

		$message = "
		Kepada Yth  <br>
		Bapak / Ibu <br>
		Bagian Adminitrasi SAP<br>
		
		
		<br>Mohon untuk meninjau permintaan order pada Labsm System
		
		<br><br>Silahkan login pada sistem <a href='http://193.13.7.3/labsm/'>Klik Disini</a>
			<br><i>*Sistem hanya bisa dibuka jaringan intranet / lokal</i>
			<br><br>Terima Kasih <br>Labsm System";

		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);

		if ($this->email->send()) {

			$this->db->trans_start();
			$this->Instrumen_Baru_model->saveBarangBaru($data);
			$this->Instrumen_Baru_model->update(array('id_batch' => $this->input->post('id_batch')), $data3);

			// $this->Instrumen_Baru_model->updatePersetujuanKaUnit($data,	$data3, $dataStatus);
			$this->Order_Persetujuan_model->update2(array('id_batch' => $this->input->post('id_batch')), $data3);


			// $this->Instrumen_Baru_model->saveGlasswareBaru($data);

			$this->db->trans_complete();


			echo json_encode(array("status" => TRUE));
		} else {
			show_error($this->email->print_debugger());
		}
	}


	public function Update_Order_Ditunda()
	{
		// $this->_validate();
		$data = array(
			'keterangan_ditunda' => $this->input->post('keterangan_tambahan'),
			'tanggal_ditunda' => $this->input->post('tanggal_waktu'),
			'id_status' => $this->input->post('status'),
			'last_edit' => $this->input->post('last_edit'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function Update_Order_Dibatalkan()
	{
		// $this->_validate();
		$data = array(

			'keterangan_dibatalkan' => $this->input->post('keterangan_tambahan'),
			'tanggal_dibatalkan' => $this->input->post('tanggal_waktu'),
			'id_status' => '20',
			'last_edit' => $this->input->post('last_edit'),
		);
		$this->Order_model->update(array('id_order' => $this->input->post('id_order')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function Save_Update()
	{
		// $this->_validate();
		$data = array(

			'id_instrumen' => $this->input->post('id_instrumen'),
			'jumlah' => $this->input->post('jumlah'),
			'kategori_instrumen' => $this->input->post('kategori'),
			'periode_kalibrasi' => $this->input->post('periode'),
		);
		$this->Kategori_Instrumen_model->update(array('id_instrumen' => $this->input->post('id_instrumen')), $data);
		echo json_encode(array("status" => TRUE));
	}


	public function Save_Update_Kategori_Glassware()
	{
		// $this->_validate();
		$data = array(

			'id_instrumen' => $this->input->post('id_instrumen'),
			'jumlah' => $this->input->post('jumlah'),
			'kategori_instrumen' => $this->input->post('kategori'),
			'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
		);
		$this->Kategori_Glassware_model->update(array('id_instrumen' => $this->input->post('id_instrumen')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function Fungsi_Hapus($id_instrumen)
	{
		$this->Kategori_Instrumen_model->delete_by_id($id_instrumen);
		echo json_encode(array("status" => TRUE));
	}

	public function User_hapus($id_user)
	{
		$this->db->trans_start();
		$this->User_model->delete_by_id($id_user);
		$this->User_model->delete_hak_akses($id_user);
		$this->db->trans_complete();
		echo json_encode(array("status" => TRUE));
	}

	public function Halaman_hapus($id_halaman)
	{
		$this->Master_Halaman_model->delete_by_id($id_halaman);
		echo json_encode(array("status" => TRUE));
	}

	public function Hapus_role($id_role)
	{
		$this->User_Role_model->delete_by_id($id_role);
		echo json_encode(array("status" => TRUE));
	}

	public function Hapus_Order($id_order)
	{
		$this->Order_model->delete_by_id($id_order);
		echo json_encode(array("status" => TRUE));
	}

	public function Hapus_Order_Baru($nomor)
	{
		$this->Instrumen_Baru_model->delete_by_id($nomor);
		echo json_encode(array("status" => TRUE));
	}

	public function Hapus_order_persetujuan($nomor)
	{
		$this->Order_Persetujuan_model->delete_by_batch($nomor);
		echo json_encode(array("status" => TRUE));
	}


	public function Hapus_penawaran($id_penawaran)
	{
		// $this->Penawaran_model->delete_by_id($id_penawaran);
		// echo json_encode(array("status" => TRUE));


		//delete file
		$Penawaran_model = $this->Penawaran_model->get_by_id($id_penawaran);
		if (file_exists('assets/upload/penawaran/' . $Penawaran_model->nama_penawaran) && $Penawaran_model->nama_penawaran)
			unlink('assets/upload/penawaran/' . $Penawaran_model->nama_penawaran);

		$this->Penawaran_model->delete_by_id($id_penawaran);
		echo json_encode(array("status" => TRUE));
	}

	public function list_aset_glassware()
	{

		// $record_num = end($this->uri->segments);
		$list = $this->Glassware_model->get_datatables();


		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Glassware_model) {
			$no++;
			$row = array();

			// $row[] = null;
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit Instrumen" onclick="Btn_Edit(' . "'" . $Glassware_model->id_aset . "'" . ')"><i class="fas fa-edit"></i></a>

			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Hapus Instrumen" onclick="Btn_Hapus(' . "'" . $Glassware_model->id_aset . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			
			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Kalibrasi Instrumen" onclick="Btn_Kalibrasi(' . "'" . $Glassware_model->id_aset . "'" . ')"><i class="fas fas fa-tools"></i> </a>


			';

			// <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Pemberitahuan Kalibrasi" onclick="Btn_Email(' . "'" . $Glassware_model->id_aset . "'" . ')"><i class="fas fas fa-envelope"></i> </a>

			// <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Instrumen Rusak" onclick="Btn_Rusak(' . "'" . $Glassware_model->id_aset . "'" . ')"><i class="fas fas fa-window-close"></i> </a>
			$row[] = $no;
			$row[] = '<a class="btn btn-primary btn-sm "  style="width:120px;" href="javascript:void(0)" title="Riwayat Instrumen" onclick="Btn_Riwayat(' . "'" . $Glassware_model->id_aset . "'" . ')" >' . $Glassware_model->id_aset . '</a>';

			// $row[] = $Instrumen_model->id_aset;
			$row[] = $Glassware_model->id_instrumen;
			$row[] = $Glassware_model->tipe_instrumen;
			$row[] = $Glassware_model->rumus_instrumen;
			$row[] =  $Glassware_model->merek;
			$row[] = $Glassware_model->kapasitas;
			// $row[] = $Glassware_model->satuan;
			$row[] = $Glassware_model->type;
			$row[] =  $Glassware_model->grade;


			$row[] = $Glassware_model->lokasi;
			// $row[] = $Glassware_model->aktif;
			$row[] = $Glassware_model->kondisi;
			$row[] = $Glassware_model->status_kalibrasi;

			// $row[] = '<a class="badge bg-success" href="instrumen/' . $Instrumen_model->status_kalibrasi . '" >' . $Instrumen_model->status_kalibrasi . '</a>';
			$row[] = $Glassware_model->awal_kalibrasi;
			$row[] = $Glassware_model->selanjutnnya_kalibrasi;
			$row[] = $Glassware_model->user_input;
			$row[] = $Glassware_model->tanggal_input;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Glassware_model->count_all(),
			"recordsFiltered" => $this->Glassware_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}


	public function list_input_kalibrasi_glassware()
	{

		$list = $this->Kalibrasi_Glassware_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Kalibrasi_Glassware_model) {
			$no++;
			$row = array();

			// $row[] = null;
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit Instrumen" onclick="Btn_Edit_Input_Kalibrasi(' . "'" . $Kalibrasi_Glassware_model->id_input . "'" . ')"><i class="fas fa-edit"></i></a>

			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Hapus Instrumen" onclick="Btn_Hapus_Input_Kalibrasi(' . "'" . $Kalibrasi_Glassware_model->id_input . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $Kalibrasi_Glassware_model->id_aset;
			$row[] = $Kalibrasi_Glassware_model->id_laporan;
			$row[] = $Kalibrasi_Glassware_model->perulangan;
			$row[] = $Kalibrasi_Glassware_model->berat_kosong;
			$row[] = $Kalibrasi_Glassware_model->berat_isi;
			$row[] = $Kalibrasi_Glassware_model->suhu_akuades;
			$row[] = $Kalibrasi_Glassware_model->berat_air;
			$row[] = $Kalibrasi_Glassware_model->Hasil1;
			$row[] = $Kalibrasi_Glassware_model->Hasil2;
			$row[] = $Kalibrasi_Glassware_model->Hasil3;
			$row[] = $Kalibrasi_Glassware_model->Hasil4;
			$row[] = $Kalibrasi_Glassware_model->V20;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Kalibrasi_Glassware_model->count_all(),
			"recordsFiltered" => $this->Kalibrasi_Glassware_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}


	public function list_aset_instrumen()
	{
		$list = $this->Instrumen_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Instrumen_model) {
			$no++;
			$row = array();

			// $row[] = null;
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit Instrumen" onclick="Btn_Edit(' . "'" . $Instrumen_model->id_aset . "'" . ')"><i class="fas fa-edit"></i></a>

			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Hapus Instrumen" onclick="Btn_Hapus(' . "'" . $Instrumen_model->id_aset . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			
			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Kalibrasi Instrumen" onclick="Btn_Kalibrasi(' . "'" . $Instrumen_model->id_aset . "'" . ')"><i class="fas fas fa-tools"></i> </a>

		
			';

			// <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Pemberitahuan Kalibrasi" onclick="Btn_Email(' . "'" . $Instrumen_model->id_aset . "'" . ')"><i class="fas fas fa-envelope"></i> </a>

			// <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Instrumen Rusak" onclick="Btn_Rusak(' . "'" . $Instrumen_model->id_aset . "'" . ')"><i class="fas fas fa-window-close"></i> </a>
			$row[] = $no;
			$row[] = '<a class="btn btn-primary btn-sm "  style="width:120px;" href="javascript:void(0)" title="Riwayat Instrumen" onclick="Btn_Riwayat(' . "'" . $Instrumen_model->id_aset . "'" . ')" >' . $Instrumen_model->id_aset . '</a>';

			// $row[] = $Instrumen_model->id_aset;
			$row[] = $Instrumen_model->id_instrumen;
			$row[] = '<a class="btn btn-info btn-sm "  style="width:120px;" href="javascript:void(0)" title="Riwayat Instrumen" onclick="Btn_Riwayat(' . "'" . $Instrumen_model->id_aset . "'" . ')" >' . $Instrumen_model->no_aset . '</a>';

			// $row[] = $Instrumen_model->no_aset;
			$row[] = $Instrumen_model->tipe_instrumen;
			$row[] = $Instrumen_model->merek;
			$row[] = $Instrumen_model->seri;
			$row[] = $Instrumen_model->serial_number;
			$row[] = $Instrumen_model->tahun;
			$row[] = $Instrumen_model->lokasi;
			$row[] = $Instrumen_model->aktif;
			$row[] = $Instrumen_model->kondisi;
			$row[] = $Instrumen_model->status_kalibrasi;

			// $row[] = '<a class="badge bg-success" href="instrumen/' . $Instrumen_model->status_kalibrasi . '" >' . $Instrumen_model->status_kalibrasi . '</a>';
			$row[] = $Instrumen_model->awal_kalibrasi;
			$row[] = $Instrumen_model->selanjutnnya_kalibrasi;
			$row[] = $Instrumen_model->user_input;
			$row[] = $Instrumen_model->tanggal_input;
			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Instrumen_model->count_all(),
			"recordsFiltered" => $this->Instrumen_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function Fungsi_Simpan_instrumen()
	{
		// $this->_validate();
		$data = array(

			'id_aset' => $this->input->post('id_aset'),
			'id_instrumen' => $this->input->post('id_instrumen'),
			'no_aset' => $this->input->post('no_aset'),
			'tipe_instrumen' => $this->input->post('tipe_instrumen'),
			'merek' => $this->input->post('brand'),
			'seri' => $this->input->post('seri'),
			'serial_number' => $this->input->post('serial_number'),
			'tahun' => $this->input->post('tahun'),
			'lokasi' => $this->input->post('lokasi'),
			'aktif' => $this->input->post('aktif'),
			'kondisi' => $this->input->post('kondisi'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
			'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
			'user_input' => $this->input->post('user_input'),
			'tanggal_input' => $this->input->post('tanggal_input'),
		);
		$insert = $this->Instrumen_model->save($data);
		echo json_encode(array("status" => TRUE));
	}


	public function Fungsi_Simpan_Glassware()
	{
		// $this->_validate();


		$jumlah = $this->input->post('input_jumlah');
		for ($i = 0; $i < $jumlah; $i++) {
			$data = array(

				'id_aset' => $this->Glassware_model->KodePCR(),
				// 'id_instrumen' => $this->input->post('id_instrumen'),
				// // 'no_aset' => $this->input->post('no_aset'),
				// 'tipe_instrumen' => $this->input->post('tipe_instrumen'),
				// // 'satuan' => $this->input->post('satuan'),
				// 'merek' => $this->input->post('brand'),
				// 'kapasitas' => $this->input->post('ukuran'),
				// 'type' => $this->input->post('type'),
				// 'grade' => $this->input->post('grade'),
				// 'rumus_instrumen' => $this->input->post('rumus'),
				// // 'tahun' => $this->input->post('tahun'),
				// 'lokasi' => $this->input->post('lokasi'),
				// 'aktif' => $this->input->post('aktif'),
				// 'kondisi' => $this->input->post('kondisi'),

				// 'status_kalibrasi' => $this->input->post('status_kalibrasi'),
				// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
				// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
				// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
				// 'user_input' => $this->input->post('user_input'),
				// 'tanggal_input' => $this->input->post('tanggal_input'),
			);

			$insert = $this->Glassware_model->save($data);
		}
		echo json_encode(array("status" => TRUE));
	}

	public function Fungsi_Simpan_Glassware_Baru()
	{

		$jumlah = $this->input->post('info_input_jumlah');
		$jumlahstok = $this->input->post('jumlah_stok');
		$hasil = $jumlahstok - $jumlah;


		$lokasi = $this->input->post('info_lokasi');

		$data2 = array(
			'jumlah_diterima' => $hasil
		);

		$data3 = $this->input->post('id_order');

		$this->Instrumen_Baru_model->updateDiterima($data2, $data3);

		if ($lokasi == 'Lab PCR') {

			for ($i = 0; $i < $jumlah; $i++) {
				$data = array(

					'id_aset' => $this->Glassware_model->KodePCR(),
					'id_instrumen' => $this->input->post('info_id_instrumen'),
					'tipe_instrumen' => $this->input->post('info_nama_barang'),
					'merek' => $this->input->post('info_merek'),
					'kapasitas' => $this->input->post('info_ukuran'),
					'type' => $this->input->post('info_type'),
					'grade' => $this->input->post('info_grade'),
					'lokasi' => $this->input->post('info_lokasi'),
					'aktif' => 1,
					'kondisi' => 1,
					'status_kalibrasi' => 1,
					'rumus_instrumen' => $this->input->post('info_rumus_instrumen'),
					'periode_kalibrasi' => $this->input->post('info_periode_kalibrasi'),
					// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
					// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
					'user_input' => $this->input->post('info_user_input'),
					'tanggal_input' => $this->input->post('info_tanggal_input'),
					'penyelia' => 'Khusnan Fadli Nur Ikhsan',
				);



				$this->Glassware_model->save($data);
			}
		} else if ($lokasi == 'Lab Mikrobiologi') {
			for ($i = 0; $i < $jumlah; $i++) {
				$data = array(

					'id_aset' => $this->Glassware_model->KodeMKR(),
					'id_instrumen' => $this->input->post('info_id_instrumen'),
					'tipe_instrumen' => $this->input->post('info_nama_barang'),
					'merek' => $this->input->post('info_merek'),
					'kapasitas' => $this->input->post('info_ukuran'),
					'type' => $this->input->post('info_type'),
					'grade' => $this->input->post('info_grade'),
					'lokasi' => $this->input->post('info_lokasi'),
					'aktif' => 1,
					'kondisi' => 1,
					'status_kalibrasi' => 1,
					'rumus_instrumen' => $this->input->post('info_rumus_instrumen'),
					'periode_kalibrasi' => $this->input->post('info_periode_kalibrasi'),
					// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
					// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
					'user_input' => $this->input->post('info_user_input'),
					'tanggal_input' => $this->input->post('info_tanggal_input'),
					'penyelia' => 'Candra Ratnaningsih',
				);

				$insert = $this->Glassware_model->save($data);
			}
		} else if ($lokasi == 'Lab Instrument') {
			for ($i = 0; $i < $jumlah; $i++) {
				$data = array(

					'id_aset' => $this->Glassware_model->KodeINS(),
					'id_instrumen' => $this->input->post('info_id_instrumen'),
					'tipe_instrumen' => $this->input->post('info_nama_barang'),
					'merek' => $this->input->post('info_merek'),
					'kapasitas' => $this->input->post('info_ukuran'),
					'type' => $this->input->post('info_type'),
					'grade' => $this->input->post('info_grade'),
					'lokasi' => $this->input->post('info_lokasi'),
					'aktif' => 1,
					'kondisi' => 1,
					'status_kalibrasi' => 1,
					'rumus_instrumen' => $this->input->post('info_rumus_instrumen'),
					'periode_kalibrasi' => $this->input->post('info_periode_kalibrasi'),
					// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
					// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
					'user_input' => $this->input->post('info_user_input'),
					'tanggal_input' => $this->input->post('info_tanggal_input'),
					'penyelia' => 'Dewie Koes Harayu',
				);

				$insert = $this->Glassware_model->save($data);
			}
		} else if ($lokasi == 'Lab Kimia 1 MTS') {
			for ($i = 0; $i < $jumlah; $i++) {
				$data = array(

					'id_aset' => $this->Glassware_model->KodeMTS(),
					'id_instrumen' => $this->input->post('info_id_instrumen'),
					'tipe_instrumen' => $this->input->post('info_nama_barang'),
					'merek' => $this->input->post('info_merek'),
					'kapasitas' => $this->input->post('info_ukuran'),
					'type' => $this->input->post('info_type'),
					'grade' => $this->input->post('info_grade'),
					'lokasi' => $this->input->post('info_lokasi'),
					'aktif' => 1,
					'kondisi' => 1,
					'status_kalibrasi' => 1,
					'rumus_instrumen' => $this->input->post('info_rumus_instrumen'),
					'periode_kalibrasi' => $this->input->post('info_periode_kalibrasi'),
					// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
					// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
					'user_input' => $this->input->post('info_user_input'),
					'tanggal_input' => $this->input->post('info_tanggal_input'),
					'penyelia' => 'Dewie Koes Harayu',
				);

				$insert = $this->Glassware_model->save($data);
			}
		} else if ($lokasi == 'Lab Kimia 1 OMG') {
			for ($i = 0; $i < $jumlah; $i++) {
				$data = array(

					'id_aset' => $this->Glassware_model->KodeOMG(),
					'id_instrumen' => $this->input->post('info_id_instrumen'),
					'tipe_instrumen' => $this->input->post('info_nama_barang'),
					'merek' => $this->input->post('info_merek'),
					'kapasitas' => $this->input->post('info_ukuran'),
					'type' => $this->input->post('info_type'),
					'grade' => $this->input->post('info_grade'),
					'lokasi' => $this->input->post('info_lokasi'),
					'aktif' => 1,
					'kondisi' => 1,
					'status_kalibrasi' => 1,
					'rumus_instrumen' => $this->input->post('info_rumus_instrumen'),
					'periode_kalibrasi' => $this->input->post('info_periode_kalibrasi'),
					// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
					// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
					'user_input' => $this->input->post('info_user_input'),
					'tanggal_input' => $this->input->post('info_tanggal_input'),
					'penyelia' => 'Indah Krismiyati',
				);

				$insert = $this->Glassware_model->save($data);
			}
		} else if ($lokasi == 'Lab Kimia 2 BBG') {
			for ($i = 0; $i < $jumlah; $i++) {
				$data = array(

					'id_aset' => $this->Glassware_model->KodeBBG(),
					'id_instrumen' => $this->input->post('info_id_instrumen'),
					'tipe_instrumen' => $this->input->post('info_nama_barang'),
					'merek' => $this->input->post('info_merek'),
					'kapasitas' => $this->input->post('info_ukuran'),
					'type' => $this->input->post('info_type'),
					'grade' => $this->input->post('info_grade'),
					'lokasi' => $this->input->post('info_lokasi'),
					'aktif' => 1,
					'kondisi' => 1,
					'status_kalibrasi' => 1,
					'rumus_instrumen' => $this->input->post('info_rumus_instrumen'),
					'periode_kalibrasi' => $this->input->post('info_periode_kalibrasi'),
					// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
					// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
					'user_input' => $this->input->post('info_user_input'),
					'tanggal_input' => $this->input->post('info_tanggal_input'),
					'penyelia' => 'Dwi Rahayu Handayani',
				);

				$insert = $this->Glassware_model->save($data);
			}
		} else if ($lokasi == 'Lab Kimia 3 Lingkungan') {
			for ($i = 0; $i < $jumlah; $i++) {
				$data = array(

					'id_aset' => $this->Glassware_model->KodeLGK(),
					'id_instrumen' => $this->input->post('info_id_instrumen'),
					'tipe_instrumen' => $this->input->post('info_nama_barang'),
					'merek' => $this->input->post('info_merek'),
					'kapasitas' => $this->input->post('info_ukuran'),
					'type' => $this->input->post('info_type'),
					'grade' => $this->input->post('info_grade'),
					'lokasi' => $this->input->post('info_lokasi'),
					'aktif' => 1,
					'kondisi' => 1,
					'status_kalibrasi' => 1,
					'rumus_instrumen' => $this->input->post('info_rumus_instrumen'),
					'periode_kalibrasi' => $this->input->post('info_periode_kalibrasi'),
					// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
					// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
					'user_input' => $this->input->post('info_user_input'),
					'tanggal_input' => $this->input->post('info_tanggal_input'),
					'penyelia' => 'Dwi Rahayu Handayani',
				);

				$insert = $this->Glassware_model->save($data);
			}
		} else if ($lokasi == 'Lab Analisa') {
			for ($i = 0; $i < $jumlah; $i++) {
				$data = array(

					'id_aset' => $this->Glassware_model->KodeLama(),
					'id_instrumen' => $this->input->post('info_id_instrumen'),
					'tipe_instrumen' => $this->input->post('info_nama_barang'),
					'merek' => $this->input->post('info_merek'),
					'kapasitas' => $this->input->post('info_ukuran'),
					'type' => $this->input->post('info_type'),
					'grade' => $this->input->post('info_grade'),
					'lokasi' => $this->input->post('info_lokasi'),
					'aktif' => 1,
					'kondisi' => 1,
					'status_kalibrasi' => 4,
					'rumus_instrumen' => $this->input->post('info_rumus_instrumen'),
					'periode_kalibrasi' => $this->input->post('info_periode_kalibrasi'),
					// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
					// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
					'user_input' => $this->input->post('info_user_input'),
					'tanggal_input' => $this->input->post('info_tanggal_input'),
					'penyelia' => 'Dwi Rahayu Handayani',
				);

				$insert = $this->Glassware_model->save($data);
			}
		}

		echo json_encode(array("status" => TRUE));
	}

	public function Fungsi_Edit_Glassware($id_aset)
	{

		$data = $this->Glassware_model->get_by_id($id_aset);

		echo json_encode($data);
	}

	public function Fungsi_Edit_Input_Kalibrasi_Glassware($id_input)
	{

		$data = $this->Kalibrasi_Glassware_model->get_by_id($id_input);

		echo json_encode($data);
	}

	public function Fungsi_Edit_instrumen($id_aset)
	{
		$data = $this->Instrumen_model->get_by_id($id_aset);

		echo json_encode($data);
	}

	public function Save_Update_instrumen()
	{
		// $this->_validate();
		$data = array(

			'id_aset' => $this->input->post('id_aset'),
			'no_aset' => $this->input->post('no_aset'),
			'id_instrumen' => $this->input->post('id_instrumen'),
			'tipe_instrumen' => $this->input->post('tipe_instrumen'),
			'merek' => $this->input->post('brand'),
			'seri' => $this->input->post('seri'),
			'serial_number' => $this->input->post('serial_number'),
			'tahun' => $this->input->post('tahun'),
			'lokasi' => $this->input->post('lokasi'),
			'aktif' => $this->input->post('aktif'),
			'kondisi' => $this->input->post('kondisi'),
			'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),

			'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
			'user_input' => $this->input->post('user_input'),
			'tanggal_input' => $this->input->post('tanggal_input'),

		);

		$this->Instrumen_model->update(array('id_aset' => $this->input->post('id_aset')), $data);
		echo json_encode(array("status" => TRUE));
	}


	public function Save_update_halaman()
	{
		// $this->_validate();
		$data = array(

			'id_halaman' => $this->input->post('id_halaman'),
			'title' => $this->input->post('title'),
			'nama_halaman' => $this->input->post('nama_halaman'),
			'url' => $this->input->post('url'),


		);

		$this->Master_Halaman_model->update(array('id_halaman' => $this->input->post('id_halaman')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function Save_Update_glassware()
	{
		// $this->_validate();
		$data = array(

			'id_aset' => $this->input->post('id_aset'),
			// 'no_aset' => $this->input->post('no_aset'),
			'id_instrumen' => $this->input->post('id_instrumen'),
			'tipe_instrumen' => $this->input->post('tipe_instrumen'),
			'merek' => $this->input->post('brand'),
			'seri' => $this->input->post('seri'),
			'serial_number' => $this->input->post('serial_number'),
			'tahun' => $this->input->post('tahun'),
			'lokasi' => $this->input->post('lokasi'),
			'aktif' => $this->input->post('aktif'),
			'kondisi' => $this->input->post('kondisi'),
			'id_log_instrumen' => $this->input->post('id_log_instrumen'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),

			'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
			'user_input' => $this->input->post('user_input'),
			'tanggal_input' => $this->input->post('tanggal_input'),

		);

		$this->Glassware_model->update(array('id_aset' => $this->input->post('id_aset')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function Akses_View()
	{


		$data = array(
			'view' => $this->input->post('view'),
		);

		$this->User_Akses_model->update(array('id_halaman' => $this->input->post('id_halaman')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function Akses_create()
	{
		$data = array(
			'create' => $this->input->post('create'),
		);

		$this->User_Akses_model->update(array('id_halaman' => $this->input->post('id_halaman')), $data);

		echo json_encode(array("status" => TRUE));
	}
	public function Akses_update()
	{
		$data = array(
			'update' => $this->input->post('update'),
		);

		$this->User_Akses_model->update(array('id_halaman' => $this->input->post('id_halaman')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function Akses_delete()
	{
		$data = array(
			'delete' => $this->input->post('delete'),
		);

		$this->User_Akses_model->update(array('id_halaman' => $this->input->post('id_halaman')), $data);

		echo json_encode(array("status" => TRUE));
	}


	public function Akses_View_Role()
	{


		$data = array(
			'view' => $this->input->post('view'),
		);

		$this->User_Role_model->update(array('id_role' => $this->input->post('id_role')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function Akses_create_Role()
	{
		$data = array(
			'create' => $this->input->post('create'),
		);

		$this->User_Role_model->update(array('id_role' => $this->input->post('id_role')), $data);

		echo json_encode(array("status" => TRUE));
	}
	public function Akses_update_Role()
	{
		$data = array(
			'update' => $this->input->post('update'),
		);

		$this->User_Role_model->update(array('id_role' => $this->input->post('id_role')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function Akses_delete_Role()
	{
		$data = array(
			'delete' => $this->input->post('delete'),
		);

		$this->User_Role_model->update(array('id_role' => $this->input->post('id_role')), $data);

		echo json_encode(array("status" => TRUE));
	}



	public function Fungsi_Hapus_instrumen($id_aset)
	{
		$this->Instrumen_model->delete_by_id($id_aset);
		echo json_encode(array("status" => TRUE));
	}

	public function Fungsi_Hapus_glassware($id_aset)
	{
		$this->Glassware_model->delete_by_id($id_aset);
		echo json_encode(array("status" => TRUE));
	}


	public function Fungsi_Hapus_glassware_kalibrasi($id_input)
	{
		$this->Kalibrasi_Glassware_model->delete_by_id($id_input);
		echo json_encode(array("status" => TRUE));
	}




	public function list_riwayat_instrumen()
	{
		$list = $this->Riwayat_Instrumen_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Riwayat_Instrumen_model) {
			$no++;
			$row = array();

			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="Btn_Edit(' . "'" . $Riwayat_Instrumen_model->id_log_instrumen . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus(' . "'" . $Riwayat_Instrumen_model->id_log_instrumen . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';
			if ($Riwayat_Instrumen_model->id_laporan == 0) {
				$cetak = '';
			} else {
				$cetak = '<a class= "btn btn-outline-primary btn-sm" target="_blank" href="http://193.13.7.3/labsm/sysadmin/lembar_kalibrasi/' . $Riwayat_Instrumen_model->id_laporan  . '" title="Lembar kerja Kalibrasi"><i class="fa-regular fa-file-powerpoint"></i> </a>
		
				<a class= "btn btn-outline-primary btn-sm" target="_blank" href="http://193.13.7.3/labsm/sysadmin/laporan_kalibrasi/' . $Riwayat_Instrumen_model->id_laporan  . '" title="Laporan Kalibrasi "><i class="fas fa-print"></i> </a>';
			}

			$row[] = $cetak;
			$row[] = $no;

			$row[] = $Riwayat_Instrumen_model->id_log_instrumen;
			$row[] = $Riwayat_Instrumen_model->id_aset;
			$row[] = $Riwayat_Instrumen_model->tindakan;
			$row[] = $Riwayat_Instrumen_model->petugas;
			$row[] = $Riwayat_Instrumen_model->jam_mulai;
			$row[] = $Riwayat_Instrumen_model->jam_selesai;
			$row[] = $Riwayat_Instrumen_model->kondisi;
			$row[] = $Riwayat_Instrumen_model->keterangan;
			$row[] = $Riwayat_Instrumen_model->user_input;
			$row[] = $Riwayat_Instrumen_model->tanggal_input;


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Riwayat_Instrumen_model->count_all(),
			"recordsFiltered" => $this->Riwayat_Instrumen_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
}
