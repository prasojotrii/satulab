<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisa_sample_rnd_model extends CI_Model
{
	var $table = 'view_analisa_request_sap';
	var $column_order = array(null, null, null, 'created_at', 'id_req', 'urgent'); //set column field database for datatable orderable
	var $column_search = array('sloc_desc', 'status', 'progress'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array(); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		$filter_by = $this->input->post('filter_by');
		$pernr = $this->session->userdata("pernr");

		if ($filter_by == 'approval') {
			// Filter data berdasarkan `status = 0` dan `pernr` sesuai dengan session
			$this->db->where('status', 0);
			$this->db->where('pernr', $pernr);
			$this->db->order_by('id', 'asc'); // Urutkan berdasarkan `id` secara ascending
			$query = $this->db->get('tb_request_approval');

			// Ambil hasil query dalam bentuk array
			$result = $query->result_array();

			// Pastikan ada data yang ditemukan
			if (!empty($result)) {
				// Ambil semua id_req yang ditemukan dari hasil query
				$id_reqs = array_column($result, 'id_req');

				// Ambil jobdesk dari session
				$jobdesk = $this->session->userdata("jobdesk");

				// Filter pada tabel tb_request_approval berdasarkan kondisi jobdesk
				if ($jobdesk == "Ka Unit") {
					$this->db->where('progress', "Approval Ka Unit");
				} elseif ($jobdesk == "Koordinator QC") {
					$this->db->where('progress', "Approval Koordinator");
				} elseif ($jobdesk == "Ka Unit Lab Analisa") {
					$this->db->where('progress', "Approval Ka Unit Lab Analisa");
				}

				// Terapkan filter berdasarkan id_req yang ditemukan
				$this->db->where_in('id_req', $id_reqs);
				$this->db->from('view_analisa_request_sap');
			} else {
				// Jika tidak ada `id_req`, kembalikan query kosong atau sesuai kebutuhan
				$this->db->from('view_analisa_request_sap'); // Menggunakan nama tabel yang benar
				$this->db->where('1=2'); // Ini akan menghasilkan query kosong
			}
		} else {
			// Jika tidak ada filter_by = 'approval', lakukan pengurutan berdasarkan progress
			$this->db->select("*, 
            CASE 
                WHEN progress = 'Approval Ka Unit' THEN 1
                WHEN progress = 'Approval Koordinator' THEN 2
                WHEN progress = 'Cetak Label' THEN 3
                WHEN progress = 'Pengiriman Ke Lab' THEN 4
                WHEN progress = 'Pengiriman Ke R&D' THEN 4
                WHEN progress = 'Administrasi Lab Analisa' THEN 5
                WHEN progress = 'Approval Ka Unit Lab Analisa' THEN 6
                WHEN progress = 'Sedang dianalisa Lab' THEN 7
                WHEN progress = 'Approval hasil analisa' THEN 8
                WHEN progress = 'Input data analisa Lab' THEN 9
                WHEN progress = 'Approval Manager QC' THEN 10
                WHEN progress = 'Analisa Lab selesai' THEN 11
                WHEN progress = 'Karantina selesai' THEN 20
                ELSE 99 
            END as progress_order");

			// Pengurutan berdasarkan progress_order dan lainnya
			$this->db->order_by('progress_order', 'asc');
			$this->db->order_by('status_kar', 'desc');
			$this->db->order_by('id', 'asc');
			$this->db->order_by('no_karantina', 'desc');

			$this->db->from('view_analisa_request_sap'); // Menggunakan nama tabel yang benar
		}

		// Proses pencarian (search)
		$i = 0;
		foreach ($this->column_search as $item) {
			if ($_POST['search']['value']) {
				if ($i === 0) {
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		// Order by dari DataTables jika ada
		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (!empty($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}



	function get_datatables($filters)
	{


		if (!empty($filters['filter_2'])) {
			$this->db->group_start()
				->like('sloc', $filters['filter_2'])
				->or_like('sloc_desc', $filters['filter_2'])
				->group_end();
		}
		if (!empty($filters['filter_3'])) {
			$this->db->like('no_karantina', $filters['filter_3']);
		}
		if (!empty($filters['filter_4'])) {
			$this->db->like('status_kar', $filters['filter_4']);
		}
		if (!empty($filters['filter_5'])) {
			$this->db->like('progress', $filters['filter_5']);
		}
		if (!empty($filters['filter_6'])) {
			$this->db->like('zmasalah', $filters['filter_6']);
		}
		if (!empty($filters['filter_7'])) {
			$this->db->like('material', $filters['filter_7']);
		}
		if (!empty($filters['filter_8'])) {
			$this->db->like('desc', $filters['filter_8']);
		}
		// if (!empty($filters['filter_9'])) {
		//     $this->db->like('no_karantina', $filters['filter_9']);
		// }
		if (!empty($filters['filter_10'])) {
			$this->db->like('batch', $filters['filter_10']);
		}
		if (!empty($filters['filter_11'])) {
			$this->db->like('nama_qc_label', $filters['filter_11']);
		}

		if ($filters['progress'] == 'approval') {
			$this->db->where_in('progress', [
				'Approval Ka Unit',
				'Approval Koordinator'

			]);
		} else if ($filters['progress'] == 'lab') {
			$this->db->where_in('progress', [
				'Pengiriman Ke Lab',
				'Administrasi Lab Analisa',
				'Approval Ka Unit Lab Analisa',
				'Sedang dianalisa Lab',
				'Input data analisa Lab',
				'Approval hasil analisa'
			]);
		} else if ($filters['progress'] == 'rnd') {
			$this->db->where_in('progress', [
				'Approval RND',
				'Proses RND'
			]);
		} else if ($filters['progress'] == 'selesai') {
			$this->db->where('progress', 'Karantina Selesai');
		}

		if (!empty($filters['filter_1'])) {
			$this->db->like('created_at', $filters['filter_1']);
		}

		if (!empty($filters['filter_tahun'])) {
			$this->db->where('YEAR(created_at)', $filters['filter_tahun']);
		}

		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}


	public function save($data)
	{
		$this->db->insert('tb_karantina_request', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('tb_karantina_request', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete($id_request)
	{
		$this->db->where('id_request', $id_request);
		$this->db->delete('tb_karantina_request');
	}


	public function insert_analisa_rnd($data)
	{
		return $this->db->insert('tb_analisa_rnd', $data) ? $this->db->insert_id() : false;
	}

	public function insert_analisa_spec_rnd($data)
	{
		return $this->db->insert('tb_analisa_rnd_spec', $data);
	}

	public function get_analisa_rnd_by_id($id_req)
	{
		return $this->db->get_where('tb_analisa_rnd', ['id_req' => $id_req])->row_array();
	}

	public function update_analisa_rnd($data, $id_req)
	{
		$this->db->where('id_req', $id_req);
		return $this->db->update('tb_analisa_request_sap', $data);
	}

	// Update data spesifikasi di tb_analisa_spec_rnd berdasarkan id_req dan mstrchar
	public function update_analisa_spec_rnd($data, $id_req, $mstrchar)
	{
		$this->db->where('id_req', $id_req);
		$this->db->where('mstrchar', $mstrchar);
		return $this->db->update('tb_analisa_request_spec', $data);
	}
}
