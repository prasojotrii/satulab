<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisa_memo_model extends CI_Model
{

	var $table = 'view_analisa_full';
	var $column_order = array('id_req', 'desc', 'short_text'); // Kolom yang dapat diurutkan
	var $column_search = array('id_req', 'desc', 'short_text'); // Kolom yang dapat dicari
	var $order = array('id_req' => 'asc'); // Default order

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($ids = array())
	{
		$this->db->from($this->table);
		$this->db->where('cat_oprshrttxt', 'LAB');
		$this->db->order_by('penyelia', 'ASC');
		$this->db->order_by('no_karantina', 'ASC');

		$this->db->order_by('short_text', 'ASC');
		// Menambahkan filter berdasarkan ID yang dipilih
		if (!empty($ids)) {
			$this->db->where_in('id_req', $ids);
		}

		$i = 0;
		foreach ($this->column_search as $item) { // Loop untuk kolom yang dapat dicari
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

		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($ids = array())
	{
		$this->_get_datatables_query($ids);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($ids = array())
	{
		$this->_get_datatables_query($ids);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($ids = array())
	{
		$this->db->from($this->table);
		$this->db->where('oprshrttxt', 'LAB');

		// Menambahkan filter berdasarkan ID yang dipilih
		if (!empty($ids)) {
			$this->db->where_in('id_req', $ids);
		}

		return $this->db->count_all_results();
	}

	// Fungsi untuk mendapatkan data memo berdasarkan ID dari view
	public function get_memo_data_by_ids($ids)
	{
		// Memastikan bahwa $ids adalah array
		if (!is_array($ids) || empty($ids)) {
			return [];
		}

		// Membuat query untuk mengambil data berdasarkan IDs dari view
		$this->db->select('*');
		$this->db->from('view_analisa_full');
		$this->db->where_in('id_req', $ids); // Pastikan kolom ID sesuai dengan view Anda
		$this->db->where_in('oprshrttxt', 'LAB');

		$query = $this->db->get();
		return $query->result_array();
	}
}
