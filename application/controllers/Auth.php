<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		// biar tanpa session tidak bisa akses page
		parent::__construct();
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{
		$this->form_validation->set_rules('pernr', 'Pernr', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'Sistem Informasi Satu Lab';
			$this->load->view('auth/login', $data);
		} else {
			// jika validasi berhasil
			$this->_login();
		}
	}

	private function _login_smworkspace()
	{
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

		$apps_name = $this->input->post('apps_name');
		// http://localhost/smworkspace/master/get_user_access/?pernr=90002459&id_apps=1
		// Ambil username dari inputan form
		// $username = htmlspecialchars($this->input->post('username'));

		// Token untuk autentikasi
		$token = 's0p70kaup4sp6fyzz91uoc2d0m80k5snyyrflp1r';

		// Konfigurasi curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost/smworkspace/master/get_user_by_pernr/?pernr=' . $username);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Authorization: Bearer ' . $token
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Eksekusi curl dan ambil respons
		$response = curl_exec($ch);

		// Cek apakah request berhasil
		if ($response === false) {
			// Jika ada kesalahan dalam request
			echo 'Error: ' . curl_error($ch);
		} else {
			// Jika request berhasil, parsing respons dari JSON ke array
			// Dekode respons JSON menjadi array asosiatif
			$user = json_decode($response, true);

			// Periksa apakah respons berhasil di-decode
			if ($user['status'] === 'success') {
				if ($user['data']['active'] == 1 && password_verify($password, $user['data']['password'])) {
					// Siapkan data session
					$data = [
						'id_user' => $user['data']['id_user'],
						'pernr' => $user['data']['pernr'],
						'jobdesk' => $user['data']['jobdesk'],
						'nama' => $user['data']['nama'],
						'email' => $user['data']['email'],
						'username' => $user['data']['pernr'],
						'tipe' => $user['data']['tipe']
					];
					$this->session->set_userdata($data);


					$pernr = $user['data']['pernr'];
					// Lakukan pengecekan akses pengguna terhadap aplikasi
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, 'http://localhost/smworkspace/master/get_user_access/?pernr=' . $pernr . '&apps_name=' . $apps_name);
					curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Authorization: Bearer ' . $token
					));
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$response_access = curl_exec($ch);
					curl_close($ch);

					if ($response_access) {
						$access = json_decode($response_access, true);

						if ($access['status'] === 'success' && $access['data']['active'] == 1) {
							// Jika pengguna memiliki akses, redirect ke dashboard
							redirect('dashboard');
						} else {
							// Jika pengguna tidak memiliki akses, tampilkan pesan kesalahan
							$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak memiliki akses!</div>');
							redirect('auth');
						}
					} else {
						// Jika gagal mengambil data akses, tampilkan pesan kesalahan
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengambil data akses pengguna</div>');
						redirect('auth');
					}
				} else if ($user['data']['active'] != '1') {
					// Jika pengguna tidak aktif, tampilkan pesan kesalahan
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum aktif!</div>');
					redirect('auth');
				} else {
					// Jika password tidak cocok, tampilkan pesan kesalahan
					$this->session->set_flashdata('pernr', $user['data']['pernr']);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
					redirect('auth');
				}
			} else {
				// Jika gagal mengambil data pengguna, tampilkan pesan kesalahan
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data user tidak ditemukan	</div>');
				redirect('auth');
			}
		}

		// Tutup koneksi curl
		curl_close($ch);
	}
	private function _login()
	{
		$pernr = htmlspecialchars($this->input->post('pernr'));
		$password = htmlspecialchars($this->input->post('password'));

		$user = $this->db->get_where('tb_master_user', ['pernr' => $pernr])->row_array();

		// var_dump($user);
		// die;

		if ($user) {


			if (password_verify($password, $user['password'])) {
				$data = [
					'id_user' => $user['id_user'],
					'pernr' => $user['pernr'],
					'name' => $user['name'],


					'jobdesk' => $user['jobdesk'],

					'email' => $user['email'],

					'tipe' => $user['tipe']
				];
				$this->session->set_userdata($data);
				if ($user['locked'] == '0') {
					$current_time = date("Y-m-d H:i:s");
					$where = array('pernr' => $user['pernr']); // Tentukan kondisi untuk pembaruan

					$data = array(
						'last_login' => $current_time
					);

					$this->db->update('tb_master_user', $data, $where);

					redirect('dashboard');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun sedang dikunci ! </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah ! </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak ditemukan ! </div>');
			redirect('auth');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('pernr');
		$this->session->unset_userdata('name');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
     Akun berhasil keluar!
        </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'IT Help Sido Muncul ';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/404', $data);
		$this->load->view('templates/footer', $data);
	}
}
