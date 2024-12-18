<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisa_sample_model extends CI_Model
{

	var $table = 'view_analisa_tracking_lab';
	var $column_order = array(null, null, null, 'no_karantina'); //set column field database for datatable orderable
	var $column_search = array('no_karantina'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array(); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{

		$filter_by = $this->input->post('filter_by');
		$sample_for = $this->input->post('sample_for');
		if ($sample_for == 'lab') {

			if ($filter_by == 'masuk') {
				$this->db->where('progress', 'Pengiriman Ke Lab');
			} else if ($filter_by == 'antrian') {
				$this->db->where('progress', 'Administrasi Lab Analisa');
			} else if ($filter_by == 'approval') {
				$this->db->where('progress', 'Approval Ka Unit Lab Analisa');
			} else if ($filter_by == 'analisa') {
				$this->db->where('progress', 'Sedang dianalisa Lab');
			} else if ($filter_by == 'hasil') {
				$this->db->where('progress', 'Input data analisa Lab');
			} else if ($filter_by == 'approvalhasil') { // Typo diperbaiki di sini
				$this->db->where('progress', 'Approval hasil analisa');
			} else if ($filter_by == 'riwayat') {
				$this->db->where('done_at !=', NULL);
			}
		} else if ($sample_for == 'rnd') {
			if ($filter_by == 'masuk') {
				$this->db->where('progress', 'Pengiriman Ke Lab');
			} else if ($filter_by == 'antrian') {
				$this->db->where('progress', 'Administrasi Lab Analisa');
			} else if ($filter_by == 'approval') {
				$this->db->where('progress', 'Approval Ka Unit Lab Analisa');
			} else if ($filter_by == 'analisa') {
				$this->db->where('progress', 'Sedang dianalisa Lab');
			} else if ($filter_by == 'hasil') {
				$this->db->where('progress', 'Input data analisa Lab');
			} else if ($filter_by == 'approvalhasil') { // Typo diperbaiki di sini
				$this->db->where('progress', 'Approval hasil analisa');
			} else if ($filter_by == 'riwayat') {
				$this->db->where('done_at !=', NULL);
			}
		}
		// Group by id_req untuk semua kondisi
		$this->db->group_by('id_req');


		$this->db->from('view_analisa_request_sap');

		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}


	public function get_selected_data($ids)
	{
		$this->db->select('id_req, desc, short_text');
		$this->db->from('vw_analisa_request');
		$this->db->where('oprshrttxt', 'LAB');
		$this->db->where_in('id_req', $ids);
		$query = $this->db->get();
		return $query->zresult_array();
	}

	public function update_bentuk($material, $bentuk)
	{
		// Cek apakah data dengan material tertentu sudah ada
		$this->db->where('material', $material);
		$query = $this->db->get('tb_analisa_master_material');

		if ($query->num_rows() > 0) {
			// Jika data ada, lakukan update
			$this->db->set('bentuk', $bentuk);
			$this->db->where('material', $material);
			return $this->db->update('tb_analisa_master_material');
		} else {
			// Jika data tidak ada, lakukan insert
			$data = [
				'material' => $material,
				'bentuk' => $bentuk
			];
			return $this->db->insert('tb_analisa_master_material', $data);
		}
	}
	// Metode untuk memperbarui data 'metode'
	public function update_metode($material, $metode, $bentuk, $singkatan, $mstrchar)
	{
		// Cek jika data ada
		$this->db->like('material', $material);
		$this->db->where('bentuk', $bentuk);
		$this->db->where('mstrchar', $mstrchar);
		$query = $this->db->get('tb_analisa_master_parameter');

		if ($query->num_rows() > 0) {
			// Data ada, update
			$this->db->set('metode', $metode);
			$this->db->where('material', $material);
			$this->db->where('bentuk', $bentuk);
			$this->db->where('mstrchar', $mstrchar);

			return $this->db->update('tb_analisa_master_parameter');
		} else {
			// Data tidak ada, insert
			$data = array(
				'material' => $material,
				'metode' => $metode,
				'bentuk' => $bentuk,
				// 'singkatan' => $singkatan,
				'mstrchar' => $mstrchar
			);
			return $this->db->insert('tb_analisa_master_parameter', $data);
		}
	}

	// Metode untuk memperbarui data 'penyelia'
	public function update_penyelia($material, $penyelia, $bentuk, $mstrchar)
	{
		// Cek jika data ada
		$this->db->where('material', $material);
		$this->db->where('bentuk', $bentuk);
		$this->db->where('mstrchar', $mstrchar);
		$query = $this->db->get('tb_analisa_master_parameter');

		if ($query->num_rows() > 0) {
			// Data ada, update
			$this->db->set('penyelia', $penyelia);
			$this->db->where('material', $material);
			// $this->db->where('bentuk', $bentuk);
			$this->db->where('mstrchar', $mstrchar);
			return $this->db->update('tb_analisa_master_parameter');
		} else {
			// Data tidak ada, insert
			$data = array(
				'material' => $material,
				'penyelia' => $penyelia,
				'bentuk' => $bentuk,
				// 'singkatan' => $singkatan,
				'mstrchar' => $mstrchar
			);
			return $this->db->insert('tb_analisa_master_parameter', $data);
		}
	}
	function get_datatables()
	{

		// $this->db->where('oprshrttxt', 'RND');
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->zresult();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('view_analisa_request_sap');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	// Mendapatkan jumlah baris dengan progress yang tidak sama dengan "Karantina Selesai"
	public function analisa_masuk($filter_tahun = null)
	{
		// $this->db->where('progress !=', 'Karantina Selesai');
		$this->db->from('tb_analisa_request_sap');
		if (!empty($filter_tahun)) {
			$this->db->where('YEAR(created_at)', $filter_tahun);
		}

		return $this->db->count_all_results();
	}

	// Mendapatkan jumlah baris dengan progress sama dengan "Karantina Selesai"
	public function analisa_selesai($filter_tahun = null)
	{
		$this->db->where('progress', 'Karantina Selesai');

		if (!empty($filter_tahun)) {
			$this->db->where('YEAR(created_at)', $filter_tahun);
		}
		$this->db->from('tb_analisa_request_sap');
		return $this->db->count_all_results();
	}

	// Mendapatkan jumlah baris dengan progress termasuk dalam beberapa nilai yang ditentukan
	public function proses_lab($filter_tahun = null)
	{
		$this->db->where_in('progress', [
			'Pengiriman Ke Lab',
			'Administrasi Lab Analisa',
			'Approval Ka Unit Lab Analisa',
			'Sedang dianalisa Lab',
			'Input data analisa Lab',
			'Approval hasil analisa'
		]);
		if (!empty($filter_tahun)) {
			$this->db->where('YEAR(created_at)', $filter_tahun);
		}

		$this->db->from('tb_analisa_request_sap');
		return $this->db->count_all_results();
	}

	public function proses_approval($filter_tahun = null)
	{
		$this->db->where_in('progress', [
			'Approval Ka Unit',
			'Approval Koordinator'

		]);
		if (!empty($filter_tahun)) {
			$this->db->where('YEAR(created_at)', $filter_tahun);
		}
		$this->db->from('tb_analisa_request_sap');
		return $this->db->count_all_results();
	}

	// Mendapatkan jumlah baris dengan progress termasuk dalam beberapa nilai yang ditentukan
	public function proses_rnd($filter_tahun = null)
	{
		$this->db->where_in('progress', [
			'Approval RND',
			'Proses RND'
		]);
		if (!empty($filter_tahun)) {
			$this->db->where('YEAR(created_at)', $filter_tahun);
		}
		$this->db->from('tb_analisa_request_sap');
		return $this->db->count_all_results();
	}

	public function insert_data($data)
	{
		return $this->db->insert('contoh_tabel_stabilitas', $data);
	}

	public function insert_data_spec($spec_data)
	{
		return $this->db->insert('contoh_tabel_stabilitas_spec', $spec_data);
	}

	public function send_data_to_api($id_req)
	{
		// Ambil data dari tabel tb_analisa_request_sap
		$this->db->where('id_req', $id_req);
		$query = $this->db->get('tb_analisa_request_sap');
		$data_sap = $query->row_array();

		// Ambil data dari tabel tb_analisa_request_sap_spec
		$this->db->where('id_req', $id_req);
		$query = $this->db->get('tb_analisa_request_spec');
		$data_sap_spec = $query->zresult_array(); // Mengambil semua hasil sebagai array

		// Gabungkan data menjadi satu array
		$data_to_send = array(
			'id_kar' => $data_sap['id_kar'],
			'id_req' => $data_sap['id_req'],
			'month' => $data_sap['month'],
			'years' => $data_sap['years'],
			'plant' => $data_sap['plant'],
			'sloc' => $data_sap['sloc'],
			'sloc_desc' => $data_sap['sloc_desc'],
			'zyear' => $data_sap['zyear'],
			'jenis_material' => $data_sap['jenis_material'],
			'material' => $data_sap['material'],
			'zbentuk' => $data_sap['zbentuk'],
			'desc' => $data_sap['desc'],
			'batch' => $data_sap['batch'],
			'no_karantina' => $data_sap['no_karantina'],
			'batch_lapangan' => $data_sap['batch_lapangan'],
			'manuf_date' => $data_sap['manuf_date'],
			'ed' => $data_sap['ed'],
			'uji_ulang' => $data_sap['uji_ulang'],
			'tgl_karantina' => $data_sap['tgl_karantina'],
			'zmasalah' => $data_sap['zmasalah'],
			'desc_mslh' => $data_sap['desc_mslh'],
			'nama_qc' => $data_sap['nama_qc'],
			'nama_ka' => $data_sap['nama_ka'],
			'nama_koor' => $data_sap['nama_koor'],
			'dqc' => (bool)$data_sap['dqc'],
			'dlab' => (bool)$data_sap['dlab'],
			'drnd' => (bool)$data_sap['drnd'],
			'zind' => (bool)$data_sap['zind'],
			'status_kar' => $data_sap['status_kar'],
			'progress' => $data_sap['progress'],
			'insplot' => $data_sap['insplot'],
			'order' => $data_sap['order'],
			'matdoc' => $data_sap['matdoc'],
			'matyears' => $data_sap['matyears'],
			'ztransaksi' => $data_sap['ztransaksi'],
			'quantity' => $data_sap['quantity'],
			'uom' => $data_sap['uom'],
			'reff' => $data_sap['reff'],
			'spec' => $data_sap_spec // Tambahkan data spesifikasi
		);

		// Encode data menjadi JSON
		$json_data = json_encode($data_to_send);

		// URL API tujuan
		$api_url = 'http://localhost/satulab/api/insert_data_stabilitas'; // Ganti dengan URL API yang sesuai

		// Siapkan cURL untuk mengirimkan request POST ke API
		$ch = curl_init($api_url);

		// Set opsi cURL
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

		// Eksekusi cURL dan dapatkan respon dari API
		curl_exec($ch);
	}

	public function update_zresult_to_all($id_req, $mstrchar, $zresult, $valid)
	{
		$data = [
			'zresult' => $zresult,
			'valid' => $valid
		];

		$this->db->where('id_req', $id_req);
		$this->db->where('mstrchar', $mstrchar);

		return $this->db->update('tb_analisa_request_spec', $data);
	}
	public function get_lab_data($zjenis_lab)
	{
		$this->db->select('id,sample_ke, short_text, spec, zresult, valid');
		$this->db->from('tb_analisa_request_spec');
		$this->db->where('cat_oprshrttxt', 'LAB');
		$this->db->where('zjenis_lab', $zjenis_lab); // Filter zjenis_lab mikro/kimia
		$query = $this->db->get();
		return $query->zresult_array();
	}

	public function getKimiaMikroStatus($id_req)
	{
		// Query untuk mendapatkan data kimia dan mikro
		$this->db->select('kimia, mikro');
		$this->db->from('tb_analisa_request_sap');
		$this->db->where('id_req', $id_req);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row_array(); // Kembalikan data dalam bentuk array
		}

		return null; // Jika tidak ditemukan, kembalikan null
	}
	public function get_sample_data($zjenis_lab, $sample_ke)
	{
		$this->db->select('short_text, spec, zresult, valid');
		$this->db->from('tb_analisa_request_spec');
		$this->db->where('zjenis_lab', $zjenis_lab);
		$this->db->where('sample_ke', $sample_ke);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->zresult(); // Mengembalikan hasil query
		}
		return false; // Jika tidak ada data
	}

	public function cek_indikator_lab($id_req)
	{
		// Cek apakah ada data kimia
		$this->db->select('id_req');
		$this->db->from('tb_analisa_request_spec');
		$this->db->where('zjenis_lab', 'kimia');
		$this->db->where('id_req', $id_req);
		$query_kimia = $this->db->get();

		// Cek apakah ada data mikro
		$this->db->select('id_req');
		$this->db->from('tb_analisa_request_spec');
		$this->db->where('zjenis_lab', 'mikro');
		$this->db->where('id_req', $id_req);
		$query_mikro = $this->db->get();

		// Menyusun hasil
		$zresult = [
			'indicator_lab' => ($query_kimia->num_rows() > 0 || $query_mikro->num_rows() > 0) ? true : false,
			'indicator_kimia' => $query_kimia->num_rows() > 0,
			'indicator_mikro' => $query_mikro->num_rows() > 0,
			'indicator_rnd' => $this->cek_indikator_rnd($id_req)
		];

		return $zresult;
	}
	public function cek_indikator_rnd($id_req)
	{
		$this->db->select('id_req');
		$this->db->from('tb_analisa_request_spec');
		$this->db->where('zjenis_lab', 'rnd');
		$this->db->where('id_req', $id_req);
		$query_rnd = $this->db->get();

		return ($query_rnd->num_rows() > 0);
	}
}
