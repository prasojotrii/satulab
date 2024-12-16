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


class Sysadmin extends CI_Controller
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
		$this->load->model('User_Atasan_model');
		$this->load->model('Bahan_master_model');
		$this->load->model('Bahan_stok_model');
		$this->load->model('Bahan_pemakaian_model');


		$this->load->helper('text');

		// if (empty($this->session->userdata("username"))) {
		// 	redirect('auth/logout');
		// }
		// else if ($this->session->userdata("tipe") != 'SysAdmin') {
		// 	redirect('user/index');
		// }
	}



	public function index()
	{
		$data['dataSession'] = $this->User_model->getDataUsername();
		$data['title'] = 'Dashboard';
		$this->load->view('Sysadmin/index', $data);
	}

	public function user()
	{
		$data['id_user'] = $this->User_model->Membuat_Kode_Otomatis();
		$data['dataSession'] = $this->User_model->getDataUsername();
		$data['dataHalaman']      = $this->Master_Halaman_model->dataHalaman();
		$data['dataRole']      = $this->User_model->dataRole();
		$data['dataSupervisor']      = $this->User_model->dataSupervisor();
		$data['id_halaman']      = $this->uri->segment(2);
		$data['dataAkses'] = $this->User_model->getDataAkses();

		$data['title'] = 'Daftar User';
		$this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_user', $data);
	}

	public function data_order()
	{
		$data['id_order'] = $this->Order_model->Membuat_Kode_Otomatis();
		$data['dataSession'] = $this->User_model->getDataUsername();
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
		$data['id_halaman']      = $this->uri->segment(2);
		$data['dataAkses'] = $this->User_model->getDataAkses();

		$data['title'] = 'Daftar Order Internal Laboratorium';
		$this->load->view('template/header', $data);
		$this->load->view('Sysadmin/list_order', $data);
	}

	public function data_request_order()
	{
		$data['id_order'] = $this->Order_model->Membuat_Kode_Otomatis();
		$data['dataSession'] = $this->User_model->getDataUsername();
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
		$data['dataSession'] = $this->User_model->getDataUsername();
		$data['id_halaman']      = $this->uri->segment(2);
		$data['dataAkses'] = $this->User_model->getDataAkses();

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

		$data['dataSession'] = $this->User_model->getDataUsername();
		$data['id_halaman']      = $this->uri->segment(2);
		$data['dataAkses'] = $this->User_model->getDataAkses();


		$this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_kategori_glassware', $data);
	}

	public function bahan()
	{
		$data['id_instrumen'] = $this->Kategori_Instrumen_model->Membuat_Kode_Otomatis();
		$data['jumlah'] = $this->Glassware_model->jumlah();
		$data['title'] = 'Daftar Reagen & Media';
		$data['total_reagen'] = $this->Bahan_master_model->total_reagen();
		$data['jenis_cair'] = $this->Bahan_master_model->jenis_cair();
		$data['jenis_padat'] = $this->Bahan_master_model->jenis_padat();
		$data['jenis_prekursor'] = $this->Bahan_master_model->jenis_prekursor();
		$data['total_media'] = $this->Bahan_master_model->total_media();
		$data['dataSession'] = $this->User_model->getDataUsername();
		$data['id_halaman']      = $this->uri->segment(2);
		$data['dataAkses'] = $this->User_model->getDataAkses();


		$this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_bahan', $data);
	}

	public function instrumen()
	{
		$data['dataKategori'] = $this->Instrumen_model->dataKategori();
		// $data['kategori'] = $this->Instrumen_model->getIdKategori();
		$data['id_kategori'] = $this->uri->segment(3);
		$data['dataSession'] = $this->User_model->getDataUsername();
		$data['title'] = 'Daftar Instrumen Laboratorium';
		$data['kodePCR'] = $this->Instrumen_model->KodePCR();
		$data['KodeMKR'] = $this->Instrumen_model->KodeMKR();
		$data['KodeINS'] = $this->Instrumen_model->KodeINS();
		$data['KodeMTS'] = $this->Instrumen_model->KodeMTS();
		$data['KodeOMG'] = $this->Instrumen_model->KodeOMG();
		$data['KodeBBG'] = $this->Instrumen_model->KodeBBG();
		$data['KodeLGK'] = $this->Instrumen_model->KodeLGK();
		$data['KodeLogInstrumen'] = $this->Instrumen_model->KodeLogInstrumen();

		$data['id_halaman']      = $this->uri->segment(2);
		$data['dataAkses'] = $this->User_model->getDataAkses();
		$this->load->view('template/header', $data);
		$this->load->view('Sysadmin/list_instrumen', $data);
	}

	public function glassware()
	{
		$data['dataKategori'] = $this->Glassware_model->dataKategori();
		// $data['id_batch'] = $this->Kalibrasi_Glassware_model->kode_lembarkerja_awal();
		$data['id_laporan'] = $this->Kalibrasi_Glassware_model->Kode_Laporan();

		// $data['kategori'] = $this->Instrumen_model->getIdKategori();
		$data['id_kategori'] = $this->uri->segment(3);
		$data['dataSession'] = $this->User_model->getDataUsername();
		$data['dataUkuran']      = $this->Order_model->dataUkuran();
		$data['dataSatuan']      = $this->Order_model->dataSatuan();
		$data['title'] = 'Daftar Glassware Laboratorium';
		// $id_order = $this->input->post('id_order');
		// $data['maxjumlah']      = $this->Order_model->get_by_id($id_order);
		$data['KodeLogInstrumen'] = $this->Glassware_model->KodeLogInstrumen();
		// $data['KodeIdLembarKerja'] = $this->Kalibrasi_Glassware_model->kode_lembarkerja();
		$data['id_halaman']      = $this->uri->segment(2);
		$data['dataAkses'] = $this->User_model->getDataAkses();

		$this->load->view('Template/header', $data);
		$this->load->view('Sysadmin/list_glassware', $data);
	}

	public function role()
	{
		$data['dataSession'] = $this->User_model->getDataUsername();
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

	public function GetKodeLembarKerja($id_laporan)
	{
		$id_laporan = $_GET['id_laporan'];
		$cari = $this->Kalibrasi_Glassware_model->kode_lembarkerja($id_laporan)->result();
		echo json_encode($cari);
	}

	public function DataRumus()
	{
		$tipe_instrumen = $_GET['tipe_instrumen'];
		$cari = $this->Glassware_model->CariDataRumus($tipe_instrumen)->result();
		echo json_encode($cari);
	}

	public function DataEmail()
	{
		$penyelia = $_GET['penyelia'];
		$cari = $this->User_Atasan_model->CariDataEmail($penyelia)->result();
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


			$row[] = $User_model->username;

			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_akses(' . "'" . $User_model->id_user . "'" . ')" href="javascript:void(0)" >' . $User_model->nama . '</a>';

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

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_hapus_akses(' . "'" . $User_Akses_model->id_akses . "'" . ')">
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
			$row[] = $Master_Halaman_model->tipe;
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


	public function list_user_atasan()
	{
		$list = $this->User_Atasan_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $User_Atasan_model) {
			$no++;
			$row = array();
			$row[] = '

			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_hapus_atasan(' . "'" . $User_Atasan_model->id_atasan  . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';

			$row[] = $no;


			$row[] = $User_Atasan_model->nama;
			$row[] = $User_Atasan_model->email;
			$row[] = $User_Atasan_model->jabatan;
			$row[] = $User_Atasan_model->lab;
			$row[] = $User_Atasan_model->sublab;


			//add html for action


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->User_Atasan_model->count_all(),
			"recordsFiltered" => $this->User_Atasan_model->count_filtered(),
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
			$row[] = $Order_model->urgent;
			$row[] = $Order_model->id_status;
			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_Update(' . "'" . $Order_model->id_order . "'" . ')" href="javascript:void(0)" >' . $Order_model->id_order . '</a>
			
			';
			$row[] = $Order_model->id_batch;

			$row[] = $Order_model->kategori_barang;
			$row[] = $Order_model->nama_barang;
			$row[] = $Order_model->merek;
			$row[] = $Order_model->spesifikasi;
			$row[] = $Order_model->ukuran . " " . $Order_model->ukuran_satuan;;
			$row[] = $Order_model->type;
			$row[] = $Order_model->grade;
			$row[] = $Order_model->jumlah . " " . $Order_model->satuan;
			$row[] = $Order_model->satuan;
			$row[] = $Order_model->nama;
			$row[] = $Order_model->keterangan;
			$row[] = $Order_model->tanggal_input;
			$row[] = $Order_model->tanggal_datang;

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
			$row[] = $Instrumen_Baru_model->urgent;
			$row[] = '<a class="btn btn-primary btn-sm" onclick="Btn_Update(' . "'" . $Instrumen_Baru_model->id_order . "'" . ')" href="javascript:void(0)" >' . $Instrumen_Baru_model->id_order . '</a>
			';

			$row[] = $Instrumen_Baru_model->id_order_tiket;
			$row[] = $Instrumen_Baru_model->tanggal_input;
			$row[] = $Instrumen_Baru_model->kategori_barang;
			$row[] = $Instrumen_Baru_model->nama_barang;
			$row[] = $Instrumen_Baru_model->spesifikasi;
			$row[] = $Instrumen_Baru_model->merek;
			$row[] = $Instrumen_Baru_model->ukuran . " " . $Instrumen_Baru_model->ukuran_satuan;;
			$row[] = $Instrumen_Baru_model->type;
			$row[] = $Instrumen_Baru_model->grade;
			$row[] = $Instrumen_Baru_model->jumlah . " " . $Instrumen_Baru_model->satuan;
			$row[] = $Instrumen_Baru_model->satuan;
			$row[] = $Instrumen_Baru_model->nama;
			$row[] = $Instrumen_Baru_model->keterangan;
			$row[] = $Instrumen_Baru_model->penyelia;
			$row[] = $Instrumen_Baru_model->id_status;
			$row[] = $Instrumen_Baru_model->tanggal_datang;

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
	public function list_bahan()
	{
		$list = $this->Bahan_master_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $data_list) {
			$no++;
			$row = array();
			$row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="btn_edit_bahan(' . "'" . $data_list->id . "'" . ')"><i class="fas fa-edit"></i></a>
        
        <a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="btn_delete_bahan(' . "'" . $data_list->id . "'" . ')"><i class="fas fa-trash-alt"></i></a>';

			$row[] = $no;


			$row[] = '<a class="btn btn-outline-primary btn-sm" onclick="btn_stock_bahan(\'' . $data_list->id . '\', \'' . $data_list->kode_bahan . '\')" href="javascript:void(0)">' . $data_list->kode_bahan . '</a';



			$row[] = $data_list->nama_bahan;

			// Mencari data di tabel tb_bahan_stock berdasarkan id_bahan
			$this->db->where('id_bahan', $data_list->id);
			$this->db->where('sisa_bahan !=', 0);
			$query = $this->db->get('tb_bahan_stock');

			$datajumlah = $query->num_rows();
			// Periksa apakah data ditemukan
			if ($query->num_rows() > 0) {
				// Data ditemukan, tampilkan 'Tersedia'
				$datatersedia = 'Tersedia';
			} else {
				// Data tidak ditemukan, tampilkan 'Tidak Tersedia'
				$datatersedia = 'Tidak Tersedia';
			}




			$row[] = $data_list->type_bahan;
			$row[] = $data_list->jenis_bahan;

			$row[] = $data_list->peringatan_bahaya;
			if ($data_list->file_msds != null) {
				$file_msds = '<a class="btn btn-outline-primary btn-sm" href="' . base_url('uploads/msds/' . $data_list->file_msds) . '" target="_blank">MSDS</a>';
			} else {
				$file_msds = '';
			}
			$row[] = $file_msds;
			$row[] = $datajumlah;
			$row[] = $datatersedia;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Bahan_master_model->count_all(),
			"recordsFiltered" => $this->Bahan_master_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}


	public function list_bahan_stok()
	{

		$id_user = $this->session->userdata('id_user');

		$segment_2 = $this->input->post('segment_2');

		$this->db->where(array(
			'id_user' => $id_user,
			'url' => $segment_2
		));

		$query = $this->db->get('tb_user_akses');
		$row = $query->row();
		$akses_update = $row->update;

		$listdata = $this->Bahan_stok_model->get_datatables();

		$today = date('Y-m-d');

		foreach ($listdata as $tgl) {
			$id_stok = $tgl->id;
			$tanggal_edd = $tgl->tanggal_ed;
			$status_segelnya = $tgl->status_segel;
			$period_ed = $tgl->period_ed;

			if ($today > $tanggal_edd && $status_segelnya <= 2 && $period_ed == NULL) {

				$tabel = 'tb_bahan_stock'; // Ganti dengan nama tabel yang sesuai
				if ($status_segelnya == 0) {
					$status_segel = array('status_segel' => '3');
				} else if ($status_segelnya == 1) {
					$status_segel = array('status_segel' => '4');
				} else if ($status_segelnya == 2) {
					$status_segel = array('status_segel' => '5');
				}
				$where = array('id' => $id_stok); // Klausul WHERE untuk mengidentifikasi baris yang akan di-update
				$this->db->update($tabel, $status_segel, $where);
			} else if ($today > $tanggal_edd && $status_segelnya <= 2 && $period_ed != NULL) {

				$tabel = 'tb_bahan_stock'; // Ganti dengan nama tabel yang sesuai
				if ($status_segelnya == 0) {
					$status_segel = array('status_segel' => '1');
				} else if ($status_segelnya == 1) {
					$status_segel = array('status_segel' => '1');
				}
				$where = array('id' => $id_stok); // Klausul WHERE untuk mengidentifikasi baris yang akan di-update
				$this->db->update($tabel, $status_segel, $where);
			}
		}

		$list = $this->Bahan_stok_model->get_datatables();
		$data = array();

		$no = $_POST['start'];
		foreach ($list as $data_list) {
			$row = array();

			$no++;
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="btn_edit_stok_bahan(' . "'" . $data_list->id . "'" . ')"><i class="fas fa-edit"></i></a> <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="btn_delete_stok_bahan(' . "'" . $data_list->id . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';

			$row[] = $no;

			if ($data_list->status_segel == 0 || $data_list->status_segel == 3 || $data_list->status_segel == 2 || $data_list->status_segel == 5) {
				$filter_button = '<a class="btn btn-outline-primary btn-sm" onclick="btn_pemakaian_bahan(\'' . $data_list->id . '\',\'' . $data_list->kode_bahan . '\',)" href="javascript:void(0)" >' . $data_list->kode_bahan . '</a>';
			} else {
				$filter_button = $data_list->kode_bahan;
			}


			$row[] = $filter_button;
			$expired_datee = date('Y-m-d', strtotime($data_list->tanggal_ed . ' - 30 days'));

			if ($today <= $data_list->tanggal_ed) {
				if ($today < $expired_datee) {
					$info_tanggal_ed = "<span class='badge bg-success'>$data_list->tanggal_ed</span";
				} else if ($today > $expired_datee) {
					$info_tanggal_ed = "<span class='badge bg-warning'>$data_list->tanggal_ed</span";
				} else if ($today < $expired_datee) {
					$info_tanggal_ed = "<span class='badge bg-success'>$data_list->tanggal_ed</span";
				}

				if ($akses_update == 1 && $data_list->status_segel == 1) {
					$aksesbukasegel = '<a class="badge bg-primary" href="javascript:void(0)" title="Buka Segel" onclick="btn_buka_segel(\'' . $data_list->id . '\', \'' . $data_list->period_ed . '\')">Buka Segel</a>';
				} else {
					if ($data_list->status_segel == 0) {
						$aksesbukasegel = "<span class='badge bg-success'>Buka</span";
					} elseif ($data_list->status_segel == 1) {
						$aksesbukasegel = "<span class='badge bg-primary'>Segel</span";
					} elseif ($data_list->status_segel == 2) {
						$aksesbukasegel = "<span class='badge bg-danger'>Habis</span";
					} elseif ($data_list->status_segel == 3) {
						$aksesbukasegel = "<span class='badge bg-success'>Buka</span> <span class='badge bg-danger'>Expired</span";
					} elseif ($data_list->status_segel == 4) {
						$aksesbukasegel = "<span class='badge bg-primary'>Segel</span> <span class='badge bg-danger'>Expired</span";
					} elseif ($data_list->status_segel == 5) {
						$aksesbukasegel = "<span class='badge bg-danger'>Habis</span> <span class='badge bg-danger'>Expired</span";
					}
				}
			} else if ($today > $data_list->tanggal_ed) {

				$info_tanggal_ed =  "<span class='badge bg-danger'>$data_list->tanggal_ed</span";
				if ($akses_update == 1 && $data_list->status_segel == 1) {

					$aksesbukasegel = '<a class="badge bg-primary" href="javascript:void(0)" title="Buka Segel" onclick="btn_buka_segel(\'' . $data_list->id . '\', \'' . $data_list->period_ed . '\')">Buka Segel</a>';
				} else {
					if ($data_list->status_segel == 0) {
						$aksesbukasegel = "<span class='badge bg-success'>Buka</span";
					} elseif ($data_list->status_segel == 1) {
						$aksesbukasegel = "<span class='badge bg-primary'>Segel</span";
					} elseif ($data_list->status_segel == 2) {
						$aksesbukasegel = "<span class='badge bg-danger'>Habis</span";
					} elseif ($data_list->status_segel == 3) {
						$aksesbukasegel = "<span class='badge bg-success'>Buka</span> <span class='badge bg-danger'>Expired</span";
					} elseif ($data_list->status_segel == 4) {
						$aksesbukasegel = "<span class='badge bg-primary'>Segel</span> <span class='badge bg-danger'>Expired</span";
					} elseif ($data_list->status_segel == 5) {
						$aksesbukasegel = "<span class='badge bg-danger'>Habis</span> <span class='badge bg-danger'>Expired</span";
					}
				}
			}
			$row[] = $aksesbukasegel;
			$row[] = $data_list->nomor_batch;

			$row[] = $data_list->kemasan;
			$row[] = $data_list->bahan_mati;
			$row[] = $data_list->sisa_bahan;
			$row[] = $data_list->satuan;


			$row[] = $data_list->period_ed;
			$row[] = $data_list->tanggal_datang;
			$row[] = $data_list->tanggal_buka;
			$row[] = $info_tanggal_ed;
			$row[] = $data_list->merek;

			$row[] = $data_list->lokasi_penyimpanan;
			// $row[] = $data_list->status_segel;


			if ($data_list->file_coa != '' || $data_list->file_coa != null) {
				$filecoa = '<a class="btn btn-outline-primary btn-sm" href="' . base_url('uploads/coa/' . $data_list->file_coa) . '" target="_blank">CoA</a>';
			} else {
				$filecoa = '';
			}

			if ($data_list->file_msds != '' || $data_list->file_msds != null) {
				$file_msds = '<a class="btn btn-outline-primary btn-sm" href="' . base_url('uploads/msds/' . $data_list->file_msds) . '" target="_blank">MSDS</a>';
			} else {
				$file_msds = '';
			}
			$row[] = $filecoa;
			// $row[] = $file_msds;
			$data[] = $row;
		}


		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Bahan_stok_model->count_all(),
			"recordsFiltered" => $this->Bahan_stok_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}


	public function list_bahan_stok_expired()
	{


		// $id_user = $this->session->userdata('id_user');

		// $segment_2 = $this->input->post('segment_2');

		// $this->db->where(array(
		// 	'id_user' => $id_user,
		// 	'url' => $segment_2
		// ));

		// $query = $this->db->get('tb_user_akses');
		// $row = $query->row();
		// $akses_update = $row->update;

		$today = date('Y-m-d');
		$list = $this->Bahan_stok_model->get_datatables_all();
		$data = array();

		$no = $_POST['start'];
		foreach ($list as $data_list) {
			$row = array();

			$no++;
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="btn_edit_stok_bahan(' . "'" . $data_list->id . "'" . ')"><i class="fas fa-edit"></i></a> <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="btn_delete_stok_bahan(' . "'" . $data_list->id . "'" . ')"><i class="fas fa-trash-alt"></i> </a>';

			$row[] = $no;

			if ($data_list->status_segel == 0 || $data_list->status_segel == 3 || $data_list->status_segel == 2 || $data_list->status_segel == 5) {
				$filter_button = '<a class="btn btn-outline-primary btn-sm" onclick="btn_pemakaian_bahan(\'' . $data_list->id . '\',\'' . $data_list->kode_bahan . '\',)" href="javascript:void(0)" >' . $data_list->kode_bahan . '</a>';
			} else {
				$filter_button = $data_list->kode_bahan;
			}


			$row[] = $filter_button;

			$row[] = $data_list->nomor_batch;
			$row[] = $data_list->kemasan;
			$row[] = $data_list->sisa_bahan;
			$row[] = $data_list->satuan;

			$expired_datee = date('Y-m-d', strtotime($data_list->tanggal_ed . ' - 30 days'));

			if ($today <= $data_list->tanggal_ed) {
				if ($today < $expired_datee) {
					$row[] = "<span class='badge bg-success'>$data_list->tanggal_ed</span";
				} else if ($today > $expired_datee) {
					$row[] = "<span class='badge bg-warning'>$data_list->tanggal_ed</span";
				} else if ($today < $expired_datee) {
					$row[] = "<span class='badge bg-success'>$data_list->tanggal_ed</span";
				}


				if ($data_list->status_segel == 0) {
					$aksesbukasegel = "<span class='badge bg-success'>Buka</span";
				} elseif ($data_list->status_segel == 1) {
					$aksesbukasegel = "<span class='badge bg-primary'>Segel</span";
				} elseif ($data_list->status_segel == 2) {
					$aksesbukasegel = "<span class='badge bg-danger'>Habis</span";
				} elseif ($data_list->status_segel == 3) {
					$aksesbukasegel = "<span class='badge bg-success'>Buka</span> <span class='badge bg-danger'>Expired</span";
				} elseif ($data_list->status_segel == 4) {
					$aksesbukasegel = "<span class='badge bg-primary'>Segel</span> <span class='badge bg-danger'>Expired</span";
				} elseif ($data_list->status_segel == 5) {
					$aksesbukasegel = "<span class='badge bg-danger'>Habis</span> <span class='badge bg-danger'>Expired</span";
				}
			} else if ($today > $data_list->tanggal_ed) {

				$row[] = "<span class='badge bg-danger'>$data_list->tanggal_ed</span";
				if ($data_list->status_segel == 0) {
					$aksesbukasegel = "<span class='badge bg-success'>Buka</span";
				} elseif ($data_list->status_segel == 1) {
					$aksesbukasegel = "<span class='badge bg-primary'>Segel</span";
				} elseif ($data_list->status_segel == 2) {
					$aksesbukasegel = "<span class='badge bg-danger'>Habis</span";
				} elseif ($data_list->status_segel == 3) {
					$aksesbukasegel = "<span class='badge bg-success'>Buka</span> <span class='badge bg-danger'>Expired</span";
				} elseif ($data_list->status_segel == 4) {
					$aksesbukasegel = "<span class='badge bg-primary'>Segel</span> <span class='badge bg-danger'>Expired</span";
				} elseif ($data_list->status_segel == 5) {
					$aksesbukasegel = "<span class='badge bg-danger'>Habis</span> <span class='badge bg-danger'>Expired</span";
				}
			}


			// $row[] = $data_list->tanggal_ed;
			$row[] = $data_list->merek;
			$row[] = $data_list->tanggal_datang;
			$row[] = $data_list->tanggal_buka;
			$row[] = $data_list->lokasi_penyimpanan;
			// $row[] = $data_list->status_segel;

			$row[] = $aksesbukasegel;
			$data[] = $row;
		}


		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Bahan_stok_model->count_all_all(),
			"recordsFiltered" => $this->Bahan_stok_model->count_filtered_all(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function list_pemakaian_bahan()
	{
		$list = $this->Bahan_pemakaian_model->get_datatables();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $data_list) {
			$no++;
			$row = array();
			$row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="btn_edit_pemakaian_bahan(' . "'" . $data_list->id . "'" . ')"><i class="fas fa-edit"></i></a>

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="btn_delete_pemakaian_bahan(' . "'" . $data_list->id . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';

			$row[] = $no;

			$row[] = $data_list->nama_analis;
			$row[] = $data_list->analisa;
			$row[] = $data_list->jumlah_bahan;
			// $row[] = $data_list->bahan_mati;
			$row[] = $data_list->jumlah_bahan_awal;
			$row[] = $data_list->jumlah_bahan_sisa;
			$row[] = $data_list->satuan;
			$row[] = $data_list->tanggal_ambil;


			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Bahan_pemakaian_model->count_all(),
			"recordsFiltered" => $this->Bahan_pemakaian_model->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	public function get_data_akses()
	{
		// Mendapatkan id_user dari session
		$id_user = $this->session->userdata('id_user');
		$segment_2 = $this->input->post('segment_2');
		// Mendapatkan value pada URL segmen kedua dan ketiga

		// $segment_2 = $this->uri->segment(3);



		// Mengambil data row dari database berdasarkan id_user, segment 2, dan segment 3
		$this->db->where(array(
			'id_user' => $id_user,
			'url' => $segment_2
		));

		$query = $this->db->get('tb_user_akses');

		// Mengembalikan data row dalam format JSON
		echo json_encode($query->row());
	}


	public function get_data_bahan_master()
	{
		$id = $this->input->post('id');


		$this->db->where('id', $id);
		$query = $this->db->get('tb_bahan_master');

		// Mengembalikan data row dalam format JSON
		echo json_encode($query->row());
	}
	public function get_daftar_bahan()
	{

		$data = $this->Bahan_stok_model->data_bahan();

		echo json_encode($data);
	}
	public function get_data_bahan()
	{
		$id = $this->input->post('id');


		$this->db->where('id', $id);
		$query = $this->db->get('view_data_bahan_by_stok');

		// Mengembalikan data row dalam format JSON
		echo json_encode($query->row());
	}
	public function get_data_stok_bahan()
	{
		$id = $this->input->post('id');


		$this->db->where('id', $id);
		$query = $this->db->get('tb_bahan_stock');

		// Mengembalikan data row dalam format JSON
		echo json_encode($query->row());
	}

	public function get_data_pemakaian()
	{
		$id = $this->input->post('id');


		$this->db->where('id', $id);
		$query = $this->db->get('tb_bahan_pemakaian');

		// Mengembalikan data row dalam format JSON
		echo json_encode($query->row());
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



	public function Tambah_input_kalibrasi_glassware()
	{
		// $this->_validate();
		$id_aset = $this->input->post('id_aset');
		$id_laporan = $this->input->post('id_laporan');
		$data = array(
			'id_aset' => $this->input->post('id_aset'),
			'id_laporan' => $this->input->post('id_laporan'),
			'id_lembarkerja' => $this->Kalibrasi_Glassware_model->Get_Id_laporan($id_laporan),
			'perulangan' => $this->Kalibrasi_Glassware_model->Membuat_Kode_Otomatis(),
			'berat_kosong' => $this->input->post('berat_kosong'),
			'berat_isi' => $this->input->post('berat_isi'),
			'berat_air' => $this->input->post('berat_air'),
			'suhu_akuades' => $this->input->post('suhu_akuades'),
			'skala' => $this->input->post('skala'),
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
			'skala' => $this->input->post('skala'),
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
		$data['dataJoin'] = $this->Kalibrasi_Glassware_model->AmbilDataJoinLaporan($segment);
		$data['dataJoinKeterangan'] = $this->Kalibrasi_Glassware_model->AmbilDataJoinKeteranganLaporan($segment);
		$data['suhu_avg'] = $this->Kalibrasi_Glassware_model->AmbilDataAvgSuhuLaporan($segment);
		$data['kelembaban_avg'] = $this->Kalibrasi_Glassware_model->AmbilDataAvgKelembabanLaporan($segment);
		$data['dataSession'] = $this->User_model->getDataUsername();
		$this->pdf->load_view('template/printout/kalibrasi/laporan', $data);
	}

	public function laporan_stok_bahan()
	{
		$filter_bahan =  $this->input->post('filter_bahan');
		$filter_bulan_print =  $this->input->post('filter_bulan_print');

		$this->load->library('pdf');

		$data['title'] = "Laporan Stok Bahan Kimia";
		$file_pdf = $data['title'];

		$this->load->library('pdf');
		$paper_size = array(0, 0, 612, 864); // Ukuran F4 dalam poin (8.5 x 14 inci)
		$this->pdf->set_paper($paper_size, 'portrait');

		$data['list_stok'] = $this->Bahan_stok_model->data_bahan_all($filter_bahan, $filter_bulan_print);
		$data['filter_bahan'] = $filter_bahan;
		$data['periode_bulan'] = $filter_bulan_print;
		$data['stok_awal'] = $this->Bahan_stok_model->filter_stok_awal($filter_bahan, $filter_bulan_print);
		$data['stok_masuk'] = $this->Bahan_stok_model->filter_stok_masuk($filter_bahan, $filter_bulan_print);
		$data['stok_keluar'] = $this->Bahan_stok_model->filter_stok_keluar($filter_bahan, $filter_bulan_print);

		$data['list_tanggal_ed'] = $this->Bahan_stok_model->list_tanggal_ed($filter_bahan, $filter_bulan_print);

		$data['list_no_batch'] = $this->Bahan_stok_model->list_no_batch($filter_bahan, $filter_bulan_print);



		// $html = $this->pdf->load_view('template/printout/bahan/laporan', $data);
		$this->pdf->load_view('template/printout/bahan/laporan', $data, $file_pdf);
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
			'tanggal_buat' => $this->input->post('tanggal_waktu'),
		);
		$dataOrderUnit = $this->input->post('nama');
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
			<br><br>Id Tiket : " . $noorder .


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
		Bagian Administrasi Laboratorium<br>
		
		
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
			'tanggal_admin' => $this->input->post('tanggal_waktu'),
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
			'tanggal_admin' => $this->input->post('tanggal_waktu'),
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
		
		Mohon untuk meninjau permintaan order :
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
				'ukuran_satuan' => $this->input->post('ukuran_satuan'),
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
				'ukuran_satuan' => $this->input->post('ukuran_satuan'),
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
				'ukuran_satuan' => $this->input->post('ukuran_satuan'),
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
				'ukuran_satuan' => $this->input->post('ukuran_satuan'),
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
				'ukuran_satuan' => $this->input->post('ukuran_satuan'),
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
				'ukuran_satuan' => $this->input->post('ukuran_satuan'),
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
				'ukuran_satuan' => $this->input->post('ukuran_satuan'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		} else if ($lokasi == 'Administrasi') {
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
				'ukuran_satuan' => $this->input->post('ukuran_satuan'),
				'type' => $this->input->post('type'),
				'grade' => $this->input->post('grade'),
				'penawaran' => $this->input->post('penawaran'),
				'last_edit' => $this->input->post('last_edit'),
				'tanggal_buat' => $this->input->post('tanggal_waktu'),
			);
			$insert = $this->Instrumen_Baru_model->save($data);
		} else {
			$data = array(
				'id_order' => $this->Instrumen_Baru_model->Membuat_Kode_Otomatis(),
				'id_order_unit' => 'LAB',
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
				'ukuran_satuan' => $this->input->post('ukuran_satuan'),
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

			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'sub_laboratorium' => $this->input->post('sub_laboratorium'),
			'penyelia' => $this->input->post('penyelia'),
			'kepalaunit' => $this->input->post('kepalaunit'),
			'id_order_unit' => $this->input->post('id_order_unit'),
			'email_penyelia' => $this->input->post('email_penyelia'),
			'email_kepalaunit' => $this->input->post('email_kepalaunit'),
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
			'tipe' => $this->input->post('tipe_menu'),
			'view' => 1,
			'create' => 1,
			'update' => 0,
			'delete' => 0,
		);
		$insert = $this->Master_Halaman_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function Tambah_Akses()
	{
		// $this->_validate();
		$data = array(


			'id_user' => $this->input->post('id_user_akses'),
			'id_halaman' => $this->input->post('akses_id_halaman'),
			'nama_halaman' => $this->input->post('akses_namahalaman'),
			'title' => $this->input->post('akses_title'),
			'url' => $this->input->post('akses_url'),
			'tipe' => $this->input->post('akses_tipe_menu'),
			'view' => 1,
			'create' => 1,
			'update' => 0,
			'delete' => 0,
		);
		$insert = $this->User_Akses_model->save($data);
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
			'tipe' => $this->input->post('role_tipe_menu'),
			'view' => 1,
			'create' => 0,
			'update' => 0,
			'delete' => 0,
		);
		$insert = $this->User_Role_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function Tambah_Atasan()
	{
		// $this->_validate();
		$data = array(

			'id_atasan' => $this->input->post('id_atasan'),
			'nama' => $this->input->post('nama_atasan'),
			'email' => $this->input->post('email'),
			'jabatan' => $this->input->post('jabatan'),
			'lab' => $this->input->post('lab'),
			'sublab' => $this->input->post('sublab'),

		);
		$insert = $this->User_Atasan_model->save($data);
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


			'id_kalibrasi' => $this->input->post('id_kalibrasi'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
			// 'aktif' => $this->input->post('aktif'),
			'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),

		);

		$data2 = array(
			'id_kalibrasi' => $this->input->post('id_kalibrasi'),
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


			'id_kalibrasi' =>  $this->Glassware_model->KodeLogInstrumen(),
			// 'id_kalibrasi' =>  $this->Glassware_model->KodeLogInstrumen(),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
			// 'aktif' => $this->input->post('aktif'),
			'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),

		);

		$data2 = array(
			'id_kalibrasi' => $this->Glassware_model->KodeLogInstrumen(),
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


			// 'id_kalibrasi' => $this->input->post('id_kalibrasi'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
			// 'aktif' => $this->input->post('aktif'),
			// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),

		);

		$data2 = array(
			// 'id_kalibrasi' => $this->input->post('id_kalibrasi'),
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
		$this->Riwayat_Instrumen_model->update(array('id_kalibrasi' => $this->input->post('id_kalibrasi')), $data2);
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
			// 'id_lembarkerja' => $this->input->post('lokasi'),
			'aktif' => $this->input->post('aktif'),
			'kondisi' => $this->input->post('kondisi'),
			// 'user_input' => $this->input->post('user_input'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),


			// 'id_kalibrasi' => $this->input->post('id_kalibrasi'),
			'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),
			// 'aktif' => $this->input->post('aktif'),
			// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),

		);
		$kodelaporan = $this->input->post('id_laporan');
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$data2 = array(

			// 'id_kalibrasi' => $this->input->post('id_kalibrasi'),
			// 'id_aset' => $this->input->post('id_aset'),
			// 'tindakan' => $this->input->post('tindakan'),

			'jam_selesai' => $now,
			'kondisi' => $this->input->post('kondisi'),
			'keterangan' => $this->input->post('keterangan'),
			// 'user_input' => $this->input->post('user_input'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),
			'id_laporan' => $this->input->post('id_laporan'),
			'tempat_kalibrasi' => $this->input->post('tempatkalibrasi'),
			'cetak_laporan' => 1,
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
			'skala' => $this->input->post('skala'),
			'id_lembarkerja' => $this->input->post('id_lembarkerja'),
		);

		$data4 = array(
			'status' => 1,
		);

		$data5 = array(
			'id_lembarkerja' => $this->input->post('id_lembarkerja'),
			'id_laporan' => $this->input->post('id_laporan'),
			'id_aset' => $this->input->post('id_aset'),
			'skala' => $this->input->post('skala'),
			'status' => 1,
		);

		$this->db->trans_start();
		$this->Glassware_model->update(array('id_aset' => $this->input->post('id_aset')), $data);
		// $insert = $this->Riwayat_Instrumen_model->save($data2);

		$this->Kalibrasi_Glassware_model->saveHasilKalibrasi($data3);
		$this->Kalibrasi_Glassware_model->SaveDaftarInputKalibrasi($data5);

		$this->Kalibrasi_Glassware_model->updateStatusLembarKerja(array('id_lembarkerja' => $this->input->post('id_lembarkerja')), $data4);
		$this->Riwayat_Instrumen_model->update(array('id_kalibrasi' => $this->input->post('id_laporan')), $data2);

		$this->db->trans_complete();

		echo json_encode(array("status" => TRUE));
	}


	public function SimpanDataKalibrasi()
	{
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$data2 = array(

			'jam_selesai' => $now,
			'kondisi' => $this->input->post('kondisi'),
			'keterangan' => $this->input->post('keterangan'),

			'cetak_laporan' => 2,
		);

		$data = array(


			'status_kalibrasi' => 4,


		);
		$this->db->trans_start();
		$this->Glassware_model->update(array('id_aset' => $this->input->post('id_aset2')), $data);
		$this->Riwayat_Instrumen_model->update(array('id_kalibrasi' => $this->input->post('id_laporan2')), $data2);
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
	public function InputLembarKerja()
	{

		$id_laporan = $_GET['id_laporan'];
		$id_aset = $_GET['id_aset'];
		// $skala = $_GET['skala'];
		$data = $this->Kalibrasi_Glassware_model->get_Lembarkerja($id_laporan, $id_aset);

		echo json_encode($data);
	}
	public function InputPerulangan()
	{

		$id_lembarkerja = $_GET['id_lembarkerja'];
		$id_aset = $_GET['id_aset'];
		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getPerulangan($id_lembarkerja, $id_aset,	$id_laporan);

		echo json_encode($data);
	}

	public function InputPerulanganHabisLoad()
	{

		// $id_lembarkerja = $_GET['id_lembarkerja'];
		$id_aset = $_GET['id_aset'];
		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getPerulanganHabisLoad($id_aset,	$id_laporan);

		echo json_encode($data);
	}


	public function GetDataLembarKerja()
	{


		$id_aset = $_GET['id_aset'];
		// $skala = $_GET['skala'];
		$data = $this->Kalibrasi_Glassware_model->GetDataLembarKerja($id_aset);

		echo json_encode($data);
	}

	public function GetDataLaporanKalibrasi($id_kalibrasi)
	{


		// $id_aset = $_GET['id_aset'];
		// $skala = $_GET['skala'];
		$data = $this->Kalibrasi_Glassware_model->GetDataLaporanKalibrasi($id_kalibrasi);

		echo json_encode($data);
	}
	public function GetDataSudahKalibrasi($id_kalibrasi)
	{




		$output = array(

			"JumlahBaris" => $this->Kalibrasi_Glassware_model->GetDataSudahKalibrasi($id_kalibrasi),

		);
		//output to json format
		echo json_encode($output);
	}


	public function InputPerulanganAwal()
	{

		$id_laporan = $_GET['id_laporan'];
		$data = $this->Kalibrasi_Glassware_model->getPerulangan($id_laporan);

		echo json_encode($data);
	}



	public function InputStd()
	{
		$id_lembarkerja = $_GET['id_lembarkerja'];
		$data = $this->Kalibrasi_Glassware_model->getStdDev($id_lembarkerja);
		echo json_encode($data);
	}

	public function InputV20()
	{
		$id_lembarkerja = $_GET['id_lembarkerja'];
		$data = $this->Kalibrasi_Glassware_model->getRataV20($id_lembarkerja);
		echo json_encode($data);
	}
	public function InputRataBeratAir()
	{
		$id_lembarkerja = $_GET['id_lembarkerja'];
		$data = $this->Kalibrasi_Glassware_model->getRataBeratAir($id_lembarkerja);
		echo json_encode($data);
	}

	public function InputRataSuhuAkuades()
	{
		$id_lembarkerja = $_GET['id_lembarkerja'];
		$data = $this->Kalibrasi_Glassware_model->getRataSuhuAkuades($id_lembarkerja);
		echo json_encode($data);
	}

	public function InputMaxSuhu()
	{
		$id_lembarkerja = $_GET['id_lembarkerja'];
		$data = $this->Kalibrasi_Glassware_model->getMaxSuhu($id_lembarkerja);
		echo json_encode($data);
	}

	public function InputMinSuhu()
	{
		$id_lembarkerja = $_GET['id_lembarkerja'];
		$data = $this->Kalibrasi_Glassware_model->getMinSuhu($id_lembarkerja);
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

			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'sub_laboratorium' => $this->input->post('sub_laboratorium'),
			'penyelia' => $this->input->post('penyelia'),
			'kepalaunit' => $this->input->post('kepalaunit'),
			'id_order_unit' => $this->input->post('id_order_unit'),
			'email_penyelia' => $this->input->post('email_penyelia'),
			'email_kepalaunit' => $this->input->post('email_kepalaunit'),
			'is_active' => 'Yes',
			'tipe' => $this->input->post('tipe'),
		);
		$this->User_model->update(array('id_user' => $this->input->post('id_user')), $data);
		echo json_encode(array("status" => TRUE));
	}


	public function simpan_edit_Profil()
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
			'ukuran_satuan' => $this->input->post('ukuran_satuan'),
			'type' => $this->input->post('type'),
			'grade' => $this->input->post('grade'),
			'jumlah' => $this->input->post('jumlah'),
			// 'jumlah_diterima' => $this->input->post('jumlah'),
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

			'nama_barang' => $this->input->post('info_namabarang'),
			'keterangan_seleksi_unit' => $this->input->post('keterangan_tambahan'),
			'tanggal_seleksi' => $this->input->post('info_tanggal_waktu'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);

		$data2 = array(

			'nama_barang' => $this->input->post('info_namabarang'),

		);

		$this->db->trans_start();
		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data);
		$this->Instrumen_Baru_model->updateNamaBarangSesuaiPenawaran(array('id_order' => $this->input->post('info_id_order')), $data2);

		$this->db->trans_complete();
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
		$this->Instrumen_Baru_model->saveGlasswareBaru($data);
		$this->Instrumen_Baru_model->updateGlasswareBaru($data, $data3);
		$this->db->trans_complete();


		echo json_encode(array("status" => TRUE));
	}

	public function Update_Order_Status11()
	{
		$diterima = $this->input->post('info_jumlah_diterima');
		$datang = $this->input->post('info_input_jumlah');
		$hasil = $diterima + $datang;
		$data = $this->input->post('info_id_order');

		$data2 = array(
			'keterangan_diterima' => $this->input->post('keterangan_tambahan'),
			'tanggal_diterima' => $this->input->post('info_tanggal_waktu'),
			'tanggal_datang' => $this->input->post('info_tanggal_input'),
			'jumlah_diterima' => 	$this->input->post('info_input_jumlah'),
			'id_status' => $this->input->post('info_status_order'),
			'last_edit' => $this->input->post('info_last_edit'),
		);

		$dataDiterima = array(

			'jumlah_diterima' => 	$hasil,

		);


		$this->db->trans_start();



		$this->Order_model->update(array('id_order' => $this->input->post('info_id_order')), $data2);

		$this->Instrumen_Baru_model->saveGlasswareBaru($data);

		$this->Order_model->update2(array('id_order' => $this->input->post('info_id_order')), $dataDiterima);

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
	public function save_master_bahan($pernr)
	{
		$kode_bahan = $this->input->post('kode_bahan');

		$input_file_msds = $_FILES['input_file_msds'];
		// Membuat nomor acak dengan panjang 4 digit
		$nomor_acak = rand(1000, 9999);

		// Konfigurasi ulang untuk file input_file_msds
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_size'] = 20048; // Ukuran file maksimum dalam KB
		$config['upload_path'] = './uploads/msds/'; // Ganti dengan lokasi folder upload yang sesuai untuk file MSDS
		$config['file_name'] = 'MSDS-' . $kode_bahan . '-' . $nomor_acak; // Ganti spasi dengan tanda hubung

		$this->load->library('upload', $config);

		// Lakukan upload file input_file_msds

		if ($input_file_msds['error'] != UPLOAD_ERR_NO_FILE) {
			if ($this->upload->do_upload('input_file_msds')) {
				$file_data_msds = $this->upload->data();

				// Buat data untuk disimpan
				$data = array(
					'id' => '',
					'type_bahan' => $this->input->post('type_bahan'),
					'nama_bahan' => $this->input->post('nama_bahan'),
					'jenis_bahan' => $this->input->post('jenis_bahan'),
					'kode_bahan' => $kode_bahan,
					'peringatan_bahaya' => $this->input->post('peringatan_bahaya'),
					'file_msds' => $config['file_name'] . $file_data_msds['file_ext'],
					'input_by' => $pernr,
				);

				// Simpan data ke dalam database
				$this->Bahan_master_model->save($data);

				// Beri respons JSON
				echo json_encode(array("status" => TRUE));
			} else {
				// Jika upload gagal, tampilkan pesan kesalahan
				echo $this->upload->display_errors();
			}
		} else {
			$data = array(
				'id' => '',
				'type_bahan' => $this->input->post('type_bahan'),
				'nama_bahan' => $this->input->post('nama_bahan'),
				'jenis_bahan' => $this->input->post('jenis_bahan'),
				'kode_bahan' => $kode_bahan,
				'peringatan_bahaya' => $this->input->post('peringatan_bahaya'),
				'input_by' => $pernr,
			);

			// Simpan data ke dalam database
			$this->Bahan_master_model->save($data);

			// Beri respons JSON
			echo json_encode(array("status" => TRUE));
		}
	}



	public function update_master_bahan($pernr)
	{
		$kode_bahan = $this->input->post('kode_bahan');
		$nomor_acak = rand(1000, 9999);
		$input_file_msds = $_FILES['input_file_msds'];
		// Konfigurasi ulang untuk file input_file_msds
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_size'] = 20048; // Ukuran file maksimum dalam KB
		$config['upload_path'] = './uploads/msds/'; // Ganti dengan lokasi folder upload yang sesuai untuk file MSDS
		$config['file_name'] = 'MSDS-' . $kode_bahan . '-' . $nomor_acak; // Ganti spasi dengan tanda hubung


		$this->load->library('upload', $config);

		if ($input_file_msds['error'] != UPLOAD_ERR_NO_FILE) {
			if ($this->upload->do_upload('input_file_msds')) {
				$file_data_msds = $this->upload->data();

				$data = array(
					'type_bahan' => $this->input->post('type_bahan'),
					'nama_bahan' => $this->input->post('nama_bahan'),
					'jenis_bahan' => $this->input->post('jenis_bahan'),
					'kode_bahan' => $this->input->post('kode_bahan'),
					'peringatan_bahaya' => $this->input->post('peringatan_bahaya'),
					'file_msds' => $config['file_name'] . $file_data_msds['file_ext'],
					'edit_by' => $pernr,
				);

				$this->Bahan_master_model->update(array('id' => $this->input->post('id_bahan')), $data);

				echo json_encode(array("status" => TRUE));
			} else {
				// Jika upload gagal, tampilkan pesan kesalahan
				echo json_encode(array("status" => FALSE, "error" => $this->upload->display_errors()));
			}
		} else {
			$data = array(
				'type_bahan' => $this->input->post('type_bahan'),
				'nama_bahan' => $this->input->post('nama_bahan'),
				'jenis_bahan' => $this->input->post('jenis_bahan'),
				'kode_bahan' => $this->input->post('kode_bahan'),
				'peringatan_bahaya' => $this->input->post('peringatan_bahaya'),

				'edit_by' => $pernr,
			);

			$this->Bahan_master_model->update(array('id' => $this->input->post('id_bahan')), $data);

			echo json_encode(array("status" => TRUE));
		}
	}

	// public function save_stok_bahan()
	// {
	// 	$jumlah = $this->input->post('jumlah');
	// 	$filter_kode_bahan = $this->input->post('filter_kode_bahan');
	// 	$filter_id_bahan = $this->input->post('filter_id_bahan');



	// 	for ($i = 0; $i < $jumlah; $i++) {

	// 		$kode_bahan = $this->Bahan_stok_model->nomor_urut($filter_kode_bahan, $filter_id_bahan);

	// 		$data = array(
	// 			'id' => '',
	// 			'id_bahan' => $this->input->post('filter_id_bahan'),
	// 			'kode_bahan' => $kode_bahan,
	// 			'nomor_batch' => $this->input->post('nomor_batch'),
	// 			'kemasan' => $this->input->post('kemasan'),

	// 			'satuan' => $this->input->post('satuan_input'),
	// 			'sisa_bahan' => $this->input->post('kemasan'),
	// 			'tanggal_datang' => $this->input->post('tanggal_datang'),
	// 			'tanggal_ed' => $this->input->post('tanggal_ed'),
	// 			'merek' => $this->input->post('merek'),
	// 			'lokasi_penyimpanan' => $this->input->post('lokasi_penyimpanan'),
	// 		);

	// 		$this->Bahan_stok_model->save($data);
	// 	}

	// 	echo json_encode(array("status" => TRUE));
	// }



	public function save_stok_bahan($pernr)
	{
		$jumlah = $this->input->post('jumlah');
		$nomor_acak = rand(1000, 9999);

		$input_file_coa = $_FILES['input_file_coa'];
		$filter_kode_bahan = $this->input->post('filter_kode_bahan');

		$nomor_batch = $this->input->post('nomor_batch');
		$filter_id_bahan = $this->input->post('filter_id_bahan');
		$config['upload_path'] = './uploads/coa/'; // Ganti dengan lokasi folder upload yang sesuai untuk file CoA
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_size'] = 20048; // Ukuran file maksimum dalam KB
		$config['file_name'] = $filter_kode_bahan . '-' . $nomor_batch . '-' . $nomor_acak;

		$this->load->library('upload', $config);

		// Upload file input_file_coa
		if ($input_file_coa['error'] != UPLOAD_ERR_NO_FILE) {
			if ($this->upload->do_upload('input_file_coa')) {
				$file_data_coa = $this->upload->data();

				for ($i = 0; $i < $jumlah; $i++) {
					$kode_bahan = $this->Bahan_stok_model->nomor_urut($filter_kode_bahan, $filter_id_bahan);
					$period = $this->input->post('period_ed');
					if ($period == '') {
						$period_data = NULL;
					} else {
						$period_data = $this->input->post('period_ed');
					}
					$data = array(
						'id' => '',
						'id_bahan' => $this->input->post('filter_id_bahan'),
						'kode_bahan' => $kode_bahan,
						'nomor_batch' => $this->input->post('nomor_batch'),
						'kemasan' => $this->input->post('kemasan'),
						'file_coa' => str_replace(' ', '_', trim($config['file_name'])) . $file_data_coa['file_ext'],
						'satuan' => $this->input->post('satuan_input'),
						'sisa_bahan' => $this->input->post('kemasan'),
						'tanggal_datang' => $this->input->post('tanggal_datang'),
						'period_ed' => $period_data,
						'tanggal_ed' => $this->input->post('tanggal_ed'),
						'merek' => $this->input->post('merek'),
						'lokasi_penyimpanan' => $this->input->post('lokasi_penyimpanan'),
						'input_by' => $pernr,
					);

					$this->Bahan_stok_model->save($data);
				}
			} else {
				echo $this->upload->display_errors();
			}
		} else {
			for ($i = 0; $i < $jumlah; $i++) {
				$kode_bahan = $this->Bahan_stok_model->nomor_urut($filter_kode_bahan, $filter_id_bahan);
				$period = $this->input->post('period_ed');
				if ($period == '') {
					$period_data = NULL;
				} else {
					$period_data = $this->input->post('period_ed');
				}
				$data = array(
					'id' => '',
					'id_bahan' => $this->input->post('filter_id_bahan'),
					'kode_bahan' => $kode_bahan,
					'nomor_batch' => $this->input->post('nomor_batch'),
					'kemasan' => $this->input->post('kemasan'),
					'file_coa' => '',
					'satuan' => $this->input->post('satuan_input'),
					'sisa_bahan' => $this->input->post('kemasan'),
					'tanggal_datang' => $this->input->post('tanggal_datang'),
					'period_ed' => $period_data,
					'tanggal_ed' => $this->input->post('tanggal_ed'),
					'merek' => $this->input->post('merek'),
					'lokasi_penyimpanan' => $this->input->post('lokasi_penyimpanan'),
					'input_by' => $pernr,
				);

				$this->Bahan_stok_model->save($data);
			}
		}
		echo json_encode(array("status" => TRUE));
	}

	public function update_stok_bahan($pernr)
	{
		$filter_kode_bahan = $this->input->post('filter_kode_bahan');
		$nomor_batch = $this->input->post('nomor_batch');
		$input_file_coa = $_FILES['input_file_coa'];
		$nomor_acak = rand(1000, 9999);
		$config['upload_path'] = './uploads/coa/'; // Ganti dengan lokasi folder upload yang sesuai untuk file CoA
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
		$config['max_size'] = 20048; // Ukuran file maksimum dalam KB
		$config['file_name'] = $filter_kode_bahan . '-' . $nomor_batch . '-' . $nomor_acak;

		$this->load->library('upload', $config);

		if ($input_file_coa['error'] != UPLOAD_ERR_NO_FILE) {
			if ($this->upload->do_upload('input_file_coa')) {
				$file_data_coa = $this->upload->data();
				$period = $this->input->post('period_ed');
				if ($period == '') {
					$period_data = NULL;
				} else {
					$period_data = $this->input->post('period_ed');
				}
				$data = array(
					'nomor_batch' => $this->input->post('nomor_batch'),
					'kemasan' => $this->input->post('kemasan'),
					'sisa_bahan' => $this->input->post('sisa_bahan'),
					'kode_bahan' => $this->input->post('kd_bahan'),
					'satuan' => $this->input->post('satuan_input'),
					'file_coa' => str_replace(' ', '_', trim($config['file_name'])) . $file_data_coa['file_ext'],
					'tanggal_datang' => $this->input->post('tanggal_datang'),
					'period_ed' => $period_data,
					'tanggal_ed' => $this->input->post('tanggal_ed'),
					'merek' => $this->input->post('merek'),
					'lokasi_penyimpanan' => $this->input->post('lokasi_penyimpanan'),
					'tanggal_buka' => $this->input->post('tanggal_buka'),
					'update_at' => date('Y-m-d H:i:s'),

					'edit_by' => $pernr,


				);
			} else {
				echo $this->upload->display_errors();
			}
		} else {
			$period = $this->input->post('period_ed');
			if ($period == '') {
				$period_data = NULL;
			} else {
				$period_data = $this->input->post('period_ed');
			}
			$data = array(

				'nomor_batch' => $this->input->post('nomor_batch'),
				'kemasan' => $this->input->post('kemasan'),
				'satuan' => $this->input->post('satuan_input'),
				'sisa_bahan' => $this->input->post('sisa_bahan'),
				'kode_bahan' => $this->input->post('kd_bahan'),
				'tanggal_datang' => $this->input->post('tanggal_datang'),
				'period_ed' => $period_data,
				'tanggal_ed' => $this->input->post('tanggal_ed'),
				'merek' => $this->input->post('merek'),
				'lokasi_penyimpanan' => $this->input->post('lokasi_penyimpanan'),
				'tanggal_buka' => $this->input->post('tanggal_buka'),
				'update_at' => date('Y-m-d H:i:s'),
				'edit_by' => $pernr,
			);
		}


		$this->Bahan_stok_model->update(array('id' => $this->input->post('id_stok')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function save_pemakaian_bahan($pernr)
	{

		$data = array(
			'id' => '',
			'kode_bahan' => $this->input->post('filter_kode_bahan_pemakaian'),
			'nama_analis' => $this->input->post('nama_analis'),
			'analisa' => $this->input->post('penggunaan_analisa'),
			'jumlah_bahan' => $this->input->post('ambil_convert'),
			// 'bahan_mati' => $this->input->post('bahan_mati_convert'),
			'jumlah_bahan_awal' => floatval((string)$this->input->post('stok')),
			'jumlah_bahan_sisa' => floatval((string)$this->input->post('sisa')),
			'satuan' => $this->input->post('satuan_pemakaian'),
			'tanggal_ambil' => $this->input->post('tanggal_ambil'),
			'input_by' => $pernr,
		);


		$this->db->trans_start();

		$this->Bahan_pemakaian_model->save($data);

		$this->db->select('kode_bahan, SUM(bahan_mati) AS total_bahan_mati');
		$this->db->where('deletion_flag', null);
		$this->db->from('tb_bahan_pemakaian');
		$this->db->where('kode_bahan', $this->input->post('filter_kode_bahan_pemakaian'));
		$query = $this->db->get();
		$result = $query->row(); // Mengambil satu baris hasil query

		$sisa = $this->input->post('sisa');

		if ($sisa == 0) {
			$datastok = array(
				'sisa_bahan' => $this->input->post('sisa'),
				// 'bahan_mati' => $result->total_bahan_mati, // Mengambil nilai total_bahan_mati
				'status_segel' => 2,
			);
		} else {
			$datastok = array(
				'sisa_bahan' => $this->input->post('sisa'),
				// 'bahan_mati' => $result->total_bahan_mati, // Mengambil nilai total_bahan_mati
			);
		}

		$this->Bahan_stok_model->update(array('kode_bahan' => $this->input->post('filter_kode_bahan_pemakaian')), $datastok);

		$this->db->trans_complete(); // menyelesaikan transaksi

		if ($this->db->trans_status() === FALSE) { // jika transaksi gagal
			$this->db->trans_rollback();
		} else { // jika transaksi berhasil
			$this->db->trans_commit();
		}
		echo json_encode(array("status" => TRUE));
	}

	public function update_segel($id, $pernr, $period_edd)
	{
		if ($period_edd != 0) {
			// Jika $period_ed tidak null, tambahkan $period_ed tahun ke tanggal hari ini
			$tanggal_ed = date('Y-m-d', strtotime("+$period_edd years"));
			$datastok = array(
				'tanggal_buka' => date('Y-m-d'),
				'tanggal_ed' => $tanggal_ed,
				'status_segel' => 0,
				'input_by' => $pernr,
			);
			$this->Bahan_stok_model->update(array('id' => $id), $datastok);
		} else {
			$datastok = array(
				'tanggal_buka' => date('Y-m-d'),
				'status_segel' => 0,
				'input_by' => $pernr,
			);
			$this->Bahan_stok_model->update(array('id' => $id), $datastok);
		}


		echo json_encode(array("status" => TRUE));
	}

	public function update_pemakaian_bahan($pernr)
	{

		$data = array(
			'nama_analis' => $this->input->post('nama_analis'),
			'analisa' => $this->input->post('penggunaan_analisa'),
			'jumlah_bahan' => $this->input->post('ambil'),
			'jumlah_bahan_awal' => $this->input->post('stok'),
			'bahan_mati' => $this->input->post('bahan_mati'),
			'jumlah_bahan_sisa' => $this->input->post('sisa'),
			'tanggal_ambil' => $this->input->post('tanggal_ambil'),

			'edit_by' => $pernr,
		);

		$sisa = $this->input->post('sisa');

		if ($sisa == 0) {
			$datastok = array(
				'sisa_bahan' => $this->input->post('sisa'),
				'status_segel' => 2,
			);
		} else {
			$datastok = array(
				'sisa_bahan' => $this->input->post('sisa'),
				'status_segel' => 0,
			);
		}

		$this->db->trans_start();
		$this->Bahan_pemakaian_model->update(array('id' => $this->input->post('id_pemakaian')), $data);
		$this->Bahan_stok_model->update(array('kode_bahan' => $this->input->post('filter_kode_bahan_pemakaian')), $datastok);
		$this->db->trans_complete(); // menyelesaikan transaksi

		if ($this->db->trans_status() === FALSE) { // jika transaksi gagal
			$this->db->trans_rollback();
		} else { // jika transaksi berhasil
			$this->db->trans_commit();
		}
		echo json_encode(array("status" => TRUE));
	}

	public function update_pemakaian_bahan_habis($pernr)
	{

		$data = array(
			'id' => '',
			'kode_bahan' => $this->input->post('filter_kode_bahan_pemakaian'),
			'nama_analis' => '-',
			'analisa' => 'Bahan Mati',
			'jumlah_bahan' => $this->input->post('stok'),
			// 'bahan_mati' => $this->input->post('bahan_mati_convert'),
			'jumlah_bahan_awal' => $this->input->post('stok'),
			'jumlah_bahan_sisa' => '0',
			'satuan' => $this->input->post('satuan_pemakaian'),
			'tanggal_ambil' => $this->input->post('tanggal_ambil'),
			'input_by' => $pernr,
		);


		$this->db->trans_start();

		$this->Bahan_pemakaian_model->save($data);

		$this->db->select('kode_bahan, SUM(bahan_mati) AS total_bahan_mati');
		$this->db->where('deletion_flag', null);
		$this->db->from('tb_bahan_pemakaian');
		$this->db->where('kode_bahan', $this->input->post('filter_kode_bahan_pemakaian'));
		$query = $this->db->get();
		$result = $query->row(); // Mengambil satu baris hasil query

		$sisa = $this->input->post('sisa');

		if ($sisa == 0) {
			$datastok = array(
				'sisa_bahan' => $this->input->post('sisa'),
				'bahan_mati' => $this->input->post('stok'),
				'status_segel' => 2,
			);
		} else {
			$datastok = array(
				'sisa_bahan' => $this->input->post('sisa'),
				// 'bahan_mati' => $result->total_bahan_mati, // Mengambil nilai total_bahan_mati
			);
		}

		$this->Bahan_stok_model->update(array('kode_bahan' => $this->input->post('filter_kode_bahan_pemakaian')), $datastok);

		$this->db->trans_complete(); // menyelesaikan transaksi

		if ($this->db->trans_status() === FALSE) { // jika transaksi gagal
			$this->db->trans_rollback();
		} else { // jika transaksi berhasil
			$this->db->trans_commit();
		}
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


	public function delete_master_bahan($id)
	{


		$this->Bahan_master_model->delete_by_id($id);


		echo json_encode(array("status" => TRUE));
	}

	function print_laporan_pemakaian()
	{
		// if ($this->session->userdata('id_user') == '') {
		//     redirect('dashboard');
		// } else {
		// $filter_bulan_print = $this->input->post('filter_bulan_print');
		// list($year, $month) = explode('-', $filter_bulan_print);


		$filter_bulan_print = $this->input->post('filter_bulan_print');

		$this->db->select('*');
		$this->db->from('tb_bahan_pemakaian');
		$this->db->where('YEAR(tanggal_ambil)', date('Y', strtotime($filter_bulan_print)));
		$this->db->where('MONTH(tanggal_ambil)', date('m', strtotime($filter_bulan_print)));
		$query = $this->db->get();

		$result = $query->result_array();



		$data['list_bahan'] = $result;

		// Memuat halaman view dan mengirimkan data

		$view_content = $this->load->view('template/printout/bahan/laporan', $data, true);

		$width_in_mm = 330;
		$height_in_mm = 210;

		$html2pdf = new Html2Pdf('P', array($width_in_mm, $height_in_mm));
		$html2pdf->setTestTdInOnePage(false);
		$html2pdf->writeHTML($view_content);


		ob_end_clean();
		$html2pdf->pdf->SetTitle('Laporan Periode ' . $filter_bulan_print);

		$html2pdf->output();
		// }
	}


	public function delete_stok_bahan($id)
	{


		$this->db->where('id', $id);
		$query = $this->db->get('tb_bahan_stock');
		$row = $query->row();


		$kode_bahan = $row->kode_bahan;

		$this->db->trans_start();

		$this->Bahan_stok_model->delete_by_id($id);
		$this->Bahan_pemakaian_model->delete_by_kode_bahan($kode_bahan);

		$this->db->trans_complete(); // menyelesaikan transaksi

		if ($this->db->trans_status() === FALSE) { // jika transaksi gagal
			$this->db->trans_rollback();
		} else { // jika transaksi berhasil
			$this->db->trans_commit();
		}
		echo json_encode(array("status" => TRUE));
	}
	public function delete_pemakaian_bahan($id)
	{

		$data = array(
			'deletion_flag' => 'x'
		);


		$this->db->where('id', $id);
		$query1 = $this->db->get('tb_bahan_pemakaian');
		$row = $query1->row();
		$kode_bahan = $row->kode_bahan;
		$jumlah_bahan_awal = $row->jumlah_bahan_awal;

		$this->db->select('kode_bahan, SUM(bahan_mati) AS total_bahan_mati');
		$this->db->where('deletion_flag', null);
		$this->db->where('kode_bahan', $kode_bahan);
		$this->db->from('tb_bahan_pemakaian');
		$query2 = $this->db->get();
		$result = $query2->row();


		$datasisa = array(
			'sisa_bahan' => $jumlah_bahan_awal,
			'bahan_mati' => $result->total_bahan_mati,
			'status_segel' => 0,
		);
		$this->db->trans_start();


		$this->Bahan_pemakaian_model->update(array('id' => $id), $data);
		$this->Bahan_stok_model->update(array('kode_bahan' => $kode_bahan), $datasisa);

		$this->db->trans_complete(); // menyelesaikan transaksi

		if ($this->db->trans_status() === FALSE) { // jika transaksi gagal
			$this->db->trans_rollback();
		} else { // jika transaksi berhasil
			$this->db->trans_commit();
		}
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


	public function Hapus_atasan($id_atasan)
	{
		$this->User_Atasan_model->delete_by_id($id_atasan);
		echo json_encode(array("status" => TRUE));
	}
	public function Hapus_akses($id_akses)
	{
		$this->User_Akses_model->delete_akses_by_id($id_akses);
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

			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Hapus Instrumen" onclick="btn_hapus_glassware(' . "'" . $Glassware_model->id_aset . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			
		


			';

			// <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Pemberitahuan Kalibrasi" onclick="Btn_Email(' . "'" . $Glassware_model->id_aset . "'" . ')"><i class="fas fas fa-envelope"></i> </a>

			// <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Instrumen Rusak" onclick="Btn_Rusak(' . "'" . $Glassware_model->id_aset . "'" . ')"><i class="fas fas fa-window-close"></i> </a>
			$row[] = '		<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Kalibrasi Instrumen" onclick="Btn_Kalibrasi(' . "'" . $Glassware_model->id_aset . "'" . ')">Kalibrasi</a>';
			$row[] = $no;
			$row[] = '<a class="btn btn-primary btn-sm "  style="width:120px;" href="javascript:void(0)" title="Riwayat Instrumen" onclick="Btn_Riwayat(' . "'" . $Glassware_model->id_aset . "'" . ')" >' . $Glassware_model->id_aset . '</a>';

			// $row[] = $Instrumen_model->id_aset;
			$row[] = $Glassware_model->id_instrumen;
			$row[] = $Glassware_model->tipe_instrumen;
			$row[] = $Glassware_model->rumus_instrumen;
			$row[] =  $Glassware_model->merek;
			$row[] = $Glassware_model->kapasitas . " " . $Glassware_model->satuan;
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
			$row[] = $Kalibrasi_Glassware_model->skala;
			$row[] = $Kalibrasi_Glassware_model->berat_kosong;
			$row[] = $Kalibrasi_Glassware_model->berat_isi;
			$row[] = $Kalibrasi_Glassware_model->suhu_akuades;
			$row[] = $Kalibrasi_Glassware_model->berat_air;
			$row[] = $Kalibrasi_Glassware_model->hasil1;
			$row[] = $Kalibrasi_Glassware_model->hasil2;
			$row[] = $Kalibrasi_Glassware_model->hasil3;
			$row[] = $Kalibrasi_Glassware_model->hasil4;
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
	public function list_lembarkerja()
	{

		$list = $this->Kalibrasi_Glassware_model->get_datatables_lembarkerja();

		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Kalibrasi_Glassware_model) {
			$no++;
			$row = array();

			// $row[] = null;
			$row[] = '

			<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Hapus Instrumen" onclick="Btn_Hapus_Log(' . "'" . $Kalibrasi_Glassware_model->id_lembarkerja . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
			';
			$row[] = $no;
			$row[] = '
			
			
			<a class= "btn btn-outline-primary btn-sm" target="_blank" href="http://localhost/labsm/sysadmin/lembar_kalibrasi/' . $Kalibrasi_Glassware_model->id_lembarkerja  . '" title="Lembar kerja Kalibrasi"><i class="fas fa-file-powerpoint"></i> </a>
			
			
			';
			// $row[] = $Kalibrasi_Glassware_model->id_aset;
			$row[] = $Kalibrasi_Glassware_model->id_laporan;
			$row[] = $Kalibrasi_Glassware_model->id_lembarkerja;

			// $row[] = $Kalibrasi_Glassware_model->perulangan;
			$row[] = $Kalibrasi_Glassware_model->skala;
			// $row[] = $Kalibrasi_Glassware_model->berat_kosong;
			// $row[] = $Kalibrasi_Glassware_model->berat_isi;
			// $row[] = $Kalibrasi_Glassware_model->suhu_akuades;
			// $row[] = $Kalibrasi_Glassware_model->berat_air;
			// $row[] = $Kalibrasi_Glassware_model->Hasil1;
			// $row[] = $Kalibrasi_Glassware_model->Hasil2;
			// $row[] = $Kalibrasi_Glassware_model->Hasil3;
			// $row[] = $Kalibrasi_Glassware_model->Hasil4;
			// $row[] = $Kalibrasi_Glassware_model->V20;
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

	public function TambahLembarKerja()
	{
		$id_aset = $_GET['id_aset'];
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
			'id_kalibrasi' => $this->input->post('id_kalibrasi'),
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
			'tipe' => $this->input->post('tipe_menu'),


		);

		$this->Master_Halaman_model->update(array('id_halaman' => $this->input->post('id_halaman')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function Save_Update_glassware()
	{
		// $this->_validate();
		$data = array(

			'id_aset' => $this->input->post('id_aset'),
			// // 'no_aset' => $this->input->post('no_aset'),
			// 'id_instrumen' => $this->input->post('id_instrumen'),
			'tipe_instrumen' => $this->input->post('tipe_instrumen'),
			'merek' => $this->input->post('merek'),
			'kapasitas' => $this->input->post('ukuran'),
			'type' => $this->input->post('type'),
			'grade' => $this->input->post('grade'),
			'lokasi' => $this->input->post('lokasi'),
			// 'seri' => $this->input->post('seri'),
			// 'serial_number' => $this->input->post('serial_number'),
			// 'tahun' => $this->input->post('tahun'),
			// 'lokasi' => $this->input->post('lokasi'),
			// 'aktif' => $this->input->post('aktif'),
			// 'kondisi' => $this->input->post('kondisi'),
			// 'id_kalibrasi' => $this->input->post('id_kalibrasi'),
			// 'status_kalibrasi' => $this->input->post('status_kalibrasi'),
			// 'awal_kalibrasi' => $this->input->post('awal_kalibrasi'),
			// 'periode_kalibrasi' => $this->input->post('periode_kalibrasi'),

			// 'selanjutnnya_kalibrasi' => $this->input->post('selanjutnnya_kalibrasi'),
			// 'user_input' => $this->input->post('user_input'),
			// 'tanggal_input' => $this->input->post('tanggal_input'),

		);

		$this->Glassware_model->update(array('id_aset' => $this->input->post('id_aset')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function Akses_View()
	{


		$data = array(
			'view' => $this->input->post('view'),
		);

		$this->User_Akses_model->update(array('id_halaman' => $this->input->post('id_halaman'), 'id_user' => $this->input->post('id_user')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function Akses_create()
	{
		$data = array(
			'create' => $this->input->post('create'),
		);

		$this->User_Akses_model->update(array('id_halaman' => $this->input->post('id_halaman'), 'id_user' => $this->input->post('id_user')), $data);

		echo json_encode(array("status" => TRUE));
	}
	public function Akses_update()
	{

		$data = array(
			'update' => $this->input->post('update'),
		);

		$this->User_Akses_model->update(array('id_halaman' => $this->input->post('id_halaman'), 'id_user' => $this->input->post('id_user')), $data);

		echo json_encode(array("status" => TRUE));
	}

	public function Akses_delete()
	{


		$data = array(
			'delete' => $this->input->post('delete'),
		);
		$this->User_Akses_model->update(array('id_halaman' => $this->input->post('id_halaman'), 'id_user' => $this->input->post('id_user')), $data);


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
		$this->Glassware_model->delete_by_id_aset($id_aset);
		echo json_encode(array("status" => TRUE));
	}

	public function Fungsi_Hapus_Kalibrasi($id_kalibrasi)
	{
		$this->Glassware_model->delete_by_id($id_kalibrasi);
		echo json_encode(array("status" => TRUE));
	}



	public function Fungsi_Hapus_glassware_kalibrasi($id_input)
	{
		$this->Kalibrasi_Glassware_model->delete_by_id($id_input);
		echo json_encode(array("status" => TRUE));
	}

	public function Fungsi_Hapus_glassware_kalibrasi_log($id_lembarkerja)
	{
		$this->Kalibrasi_Glassware_model->delete_by_id_log($id_lembarkerja);
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

			$row[] = '

            <a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Delete" onclick="Btn_Hapus(' . "'" . $Riwayat_Instrumen_model->id_kalibrasi . "'" . ')"><i class="fas fa-trash-alt"></i> </a>
		
			';
			if ($Riwayat_Instrumen_model->cetak_laporan == 0) {
				$cetak = '';
			} else {
				$cetak = '
				<a class= "btn btn-outline-primary btn-sm" target="_blank" href="http://localhost/labsm/sysadmin/laporan_kalibrasi/' . $Riwayat_Instrumen_model->id_laporan  . '" title="Laporan Kalibrasi "><i class="fas fa-print"></i> </a>';
			}
			// <a class= "btn btn-outline-primary btn-sm" target="_blank" href="http://localhost/labsm/sysadmin/lembar_kalibrasi/' . $Riwayat_Instrumen_model->id_laporan  . '" title="Lembar kerja Kalibrasi"><i class="fas fa-file-powerpoint"></i> </a>
			$row[] = $cetak;
			$row[] = $no;
			// $row[] = '<a class= "btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="btn_lembarkerja(' . "'" . $Riwayat_Instrumen_model->id_laporan . "'" . ')"><i class="fas fa-file-powerpoint"></i></a>';
			$row[] = '<a class="btn btn-primary btn-sm "  style="width:100px;" href="javascript:void(0)" title="Riwayat Instrumen" onclick="btn_laporan(' . "'" . $Riwayat_Instrumen_model->id_kalibrasi . "'" . ')" >' . $Riwayat_Instrumen_model->id_kalibrasi . '</a>';
			// $row[] = $Riwayat_Instrumen_model->id_laporan;
			// $row[] = $Riwayat_Instrumen_model->id_kalibrasi;
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

	public function get_lokasi_penyimpanan()
	{
		$term = $this->input->get('term');

		// Ambil data lokasi_penyimpanan dari tabel tb_bahan_stock dan kelompokkan
		$lokasi_penyimpanan = $this->Bahan_stok_model->get_distinct_lokasi_penyimpanan($term);

		echo json_encode($lokasi_penyimpanan);
	}

	public function get_merek()
	{
		$term = $this->input->get('term');

		// Ambil data lokasi_penyimpanan dari tabel tb_bahan_stock dan kelompokkan
		$merek = $this->Bahan_stok_model->get_distinct_merek($term);

		echo json_encode($merek);
	}
}
