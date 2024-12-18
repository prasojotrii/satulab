<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisa_Tracking_model extends CI_Model
{

	var $table = 'tb_analisa_tracking';
	var $column_order = array(null); //set column field database for datatable orderable
	var $column_search = array(); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array(); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{

		$this->db->from($this->table);
		if ($this->input->post('id_req')) {
			$this->db->where('id_req', $this->input->post('id_req'));
		}

		if ($this->input->post('oprshrttxt')) {
			$this->db->where('cat_oprshrttxt', $this->input->post('oprshrttxt'));
		}

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

	function get_datatables()
	{

		// $this->db->where('oprshrttxt', 'LAB');

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
	public function get_tracking_data_by_ids($ids, $desc_tracking)
	{
		if (empty($ids) || !is_array($ids)) {
			return [];
		}

		// Sanitize input	
		$ids = array_map('intval', $ids);

		// Query to get tracking data by IDs and description
		$this->db->select('id_req, waktu_tracking');
		$this->db->from('tb_analisa_tracking');
		$this->db->where_in('id_req', $ids);
		$this->db->where('desc_tracking', $desc_tracking);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return [];
		}
	}
	public function get_tracking_data($id_req)
	{
		$this->db->select('waktu_tracking, desc_tracking');
		$this->db->from('tb_analisa_tracking');
		$this->db->where('unit_progress', 'ALL');
		$this->db->where('id_req', $id_req);

		// Urutkan hasil berdasarkan waktu_tracking dengan NULL di urutan pertama
		// $this->db->order_by('waktu_tracking IS NULL', 'DESC'); // NULL values first
		$this->db->order_by('id', 'DESC'); // Then order by waktu_tracking

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}
	}
	public function get_tracking_data_rnd($id_req)
	{
		$this->db->select('waktu_tracking, desc_tracking');
		$this->db->from('tb_analisa_tracking');
		$this->db->where('id_req', $id_req);
		$this->db->where('unit_progress', 'R&D');


		// Urutkan hasil berdasarkan waktu_tracking dengan NULL di urutan pertama
		// $this->db->order_by('waktu_tracking IS NULL', 'DESC'); // NULL values first
		$this->db->order_by('id', 'DESC'); // Then order by waktu_tracking

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
		} else {
			return array();
		}
	}

	public function get_latest_approval_by_id($id_req)
	{
		$this->db->where('id_req', $id_req);
		$this->db->order_by('id', 'DESC');
		return $this->db->get('tb_request_approval')->row(); // Mengambil baris terakhir
	}
}
