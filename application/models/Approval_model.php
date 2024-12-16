<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval_model extends CI_Model
{

	var $table = 'vw_request_approval';
	var $column_order = array('pernr', 'nama_user', 'status', 'desc_approval', 'date_approval'); //set column field database for datatable orderable
	var $column_search = array('pernr', 'nama_user', 'status', 'desc_approval', 'date_approval'); //set column field database for datatable searchable just firstname , lastname , address are searchable
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
		$i = 0;

		$this->db->order_by('id', 'ASC');

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
		$this->db->from('tb_request_approval');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
	}
	public function get_email_requestor_by_id($id_req)
	{
		$this->db->select('requestor_email, nama_qc');
		$this->db->from('vw_analisa_request_email_requestor');
		$this->db->where('id_req', $id_req);
		$query = $this->db->get();
		return $query->row_array(); // Kembalikan hasil sebagai array
	}

	public function save($data)
	{
		$this->db->insert('tb_request_approval', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('tb_request_approval', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	public function update_approval_status_rnd($note, $kesimpulan, $action, $pernr, $id_req, $jumlah_hari)
	{
		// Memulai transaksi
		$this->db->trans_start();
		$datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$waktu = $datetime->format('Y-m-d H:i:s');
		// Prepare data for tb_request_approval
		$approval_data = [
			'desc_approval' => $note,
			'date_approval' => 	$waktu, // Use MySQL's NOW() for current timestamp
			'usulan' => implode(', ', $kesimpulan) . ', penambahan ed : ' . $jumlah_hari . ' hari', // Concatenate kesimpulan, note, and jumlah_hari
			'status' => ($action == 'approved') ? 1 : (($action == 'rejected') ? 2 : null)
		];

		// Update on tb_request_approval
		$this->db->where('pernr', $pernr);
		$this->db->where('id_req', $id_req);
		$this->db->update('tb_request_approval', $approval_data);

		// Menyelesaikan transaksi
		$this->db->trans_complete();

		// Memeriksa apakah transaksi berhasil
		if ($this->db->trans_status() === FALSE) {
			return false; // Return false on error
		}

		return true; // Return true if everything is fine
	}

	public function get_usulan_by_id_req($id_req)
	{
		// Select the necessary columns from the view or table
		$this->db->select('nama_user, jobdesk, usulan');
		$this->db->from('vw_request_approval'); // Assuming you are using a view
		$this->db->where('id_req', $id_req);

		// Properly handle the OR condition for jobdesk
		$this->db->group_start()
			->where('jobdesk', 'Ka Unit R&D')
			->or_where('jobdesk', 'Manager R&D')
			->group_end();

		$query = $this->db->get();

		// Check if there is a result
		if ($query->num_rows() > 0) {
			return $query->result();  // Return the results as an array of objects
		}

		return null; // Return null if no data is found
	}


	public function update_approval_status($note, $kesimpulan, $action, $pernr, $id_req)
	{
		// Memulai transaksi
		$this->db->trans_start();
		$datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$waktu = $datetime->format('Y-m-d H:i:s');
		// Prepare data for tb_request_approval
		$approval_data = [
			'desc_approval' => $note,
			'date_approval' => 	$waktu, // Use MySQL's NOW() for current timestamp
			'status' => ($action == 'approved') ? 1 : (($action == 'rejected') ? 2 : null)
		];

		if ($kesimpulan) {
			$approval_data['kesimpulan'] = implode(', ', $kesimpulan);
		}

		// Update on tb_request_approval
		$this->db->where('pernr', $pernr);
		$this->db->where('id_req', $id_req);
		$this->db->update('tb_request_approval', $approval_data);

		// Prepare data for tb_analisa_request_sap
		$sap_data = [
			'keputusan_qc' => $note
		];

		if ($kesimpulan) {
			$sap_data['kesimpulan_qc'] = implode(', ', $kesimpulan);
		}

		// Update on tb_analisa_request_sap
		$this->db->where('id_req', $id_req);
		$this->db->update('tb_analisa_request_sap', $sap_data);

		// Menyelesaikan transaksi
		$this->db->trans_complete();

		// Memeriksa apakah transaksi berhasil
		if ($this->db->trans_status() === FALSE) {
			return false; // Return false on error
		}

		return true; // Return true if everything is fine
	}



	public function check_request($id_req, $pernr)
	{
		// Periksa jika ada status 2 terlebih dahulu
		$this->db->where('id_req', $id_req);
		$this->db->where('status', 2);
		$query_status_2 = $this->db->get('tb_request_approval');

		// Jika ditemukan status 2, kembalikan false
		if ($query_status_2->num_rows() > 0) {
			return false;
		}

		// Query untuk mendapatkan baris pertama berdasarkan id_req dan pernr
		$this->db->where('id_req', $id_req);
		$this->db->where('status', 0);
		$this->db->order_by('id_req', 'ASC'); // Urutkan berdasarkan id_req
		$this->db->limit(1); // Ambil hanya satu baris

		$query = $this->db->get('tb_request_approval');

		// Cek jika ada hasil query
		if ($query->num_rows() > 0) {
			$result = $query->row(); // Ambil baris pertama dari hasil query
			return $result->pernr === $pernr; // Cek apakah pernr sesuai dengan baris pertama
		}

		return false; // Tidak ada baris yang ditemukan
	}


	public function get_pending_approvals($id_req)
	{
		// Dapatkan nilai pernr dengan status 0 dan urutkan berdasarkan kolom id secara ascending
		$this->db->select('pernr');
		$this->db->where('id_req', $id_req);
		$this->db->where('status', 0);
		$this->db->order_by('id', 'ASC');
		$this->db->limit(1); // Ambil hanya 1 baris
		$query = $this->db->get('tb_request_approval');

		$pending_pernrs = $query->result_array();
		$emails = [];

		// Jika ada persetujuan yang tertunda, ambil alamat email dan nama yang sesuai
		if (!empty($pending_pernrs)) {
			$pernr_list = array_column($pending_pernrs, 'pernr');

			$this->db->select('email, name, pernr'); // Pastikan kolom 'name' ada di tabel 'tb_master_user'
			$this->db->where_in('pernr', $pernr_list);
			$query = $this->db->get('tb_master_user');

			$emails = $query->result_array();
		}

		return $emails;
	}

	// Fungsi untuk mendapatkan jobdesk berdasarkan pernr
	public function get_jobdesk_by_pernr($pernr)
	{
		// Menggunakan query builder CodeIgniter untuk memilih jobdesk berdasarkan pernr
		$this->db->select('jobdesk');
		$this->db->from('tb_master_user'); // Pastikan untuk mengganti dengan nama tabel yang sesuai
		$this->db->where('pernr', $pernr);
		$query = $this->db->get();

		// Mengembalikan jobdesk jika ada, atau null jika tidak ditemukan
		if ($query->num_rows() > 0) {
			return $query->row()->jobdesk;  // Mengambil jobdesk dari baris pertama hasil query
		} else {
			return null;  // Jika tidak ditemukan, mengembalikan null
		}
	}

	public function update_progress_to_approval_koor($id_req)
	{
		// Mengatur zona waktu ke Jakarta
		$datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$waktu_in_qc = $datetime->format('Y-m-d H:i:s');

		$this->db->set('progress', 'Approval Koordinator');
		$this->db->set('waktu_in_qc', $waktu_in_qc); // Tambahkan waktu_in_qc dengan datetime sekarang
		$this->db->where('id_req', $id_req);

		return $this->db->update('tb_analisa_request_sap');
	}

	public function update_progress_to_cetak_label($id_req)
	{

		$this->db->set('progress', 'Cetak Label');

		$this->db->where('id_req', $id_req);
		return $this->db->update('tb_analisa_request_sap');
	}
	public function update_progress_to_pengirman($id_req)
	{
		$datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
		$waktu_out_qc = $datetime->format('Y-m-d H:i:s');

		$this->db->set('progress', 'Pengiriman Sample');
		$this->db->set('waktu_out_qc', $waktu_out_qc);
		$this->db->where('id_req', $id_req);
		return $this->db->update('tb_analisa_request_sap');
	}
}
