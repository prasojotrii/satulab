<?php

use Mpdf\Tag\Select;

class Bahan_stok_model extends CI_Model
{
    var $table = 'tb_bahan_stock';

    var $column_order = array(null, null); //set column field database for datatable orderable
    var $column_search = array('kode_bahan', 'nomor_batch'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('kode_bahan' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        if ($this->input->post('id')) {
            $this->db->where('id_bahan', $this->input->post('id'));
        }

        $this->db->from($this->table);

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
    private function _get_datatables_query_all()
    {


        $this->db->from($this->table);

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

    function get_datatables_all()
    {

        // $this->db->order_by('status_segel', 'ASC');
        // $this->db->where('tanggal_ed >= DATE_SUB(NOW(), INTERVAL 30 DAY)');
        $this->db->where('tanggal_ed <= DATE_ADD(NOW(), INTERVAL 30 DAY)');


        $this->db->order_by('tanggal_ed', 'ASC');
        $this->_get_datatables_query_all();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        // $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }
    function get_datatables()
    {
        $this->db->order_by('status_segel', 'ASC');
        $this->db->order_by('id', 'ASC');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('kode_bahan', 'ASC');
        $this->db->order_by('tanggal_ed', 'ASC');
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function get_data_stok_bahan()
    {


        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_all()
    {
        $this->_get_datatables_query_all();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
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
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_by_id($id_instrumen)
    {
        $this->db->from($this->table);
        $this->db->where('id_instrumen', $id_instrumen);
        $query = $this->db->get();

        return $query->row();
    }


    function data_bahan()
    {
        $this->db->select('id, nama_bahan'); // Memilih kolom 'id' dan 'nama_bahan'
        $this->db->from('tb_bahan_master');
        $this->db->order_by('nama_bahan', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function data_bahan_all($filter_bahan, $filter_bulan_print)
    {
        $this->db->select('*'); // Memilih kolom 'id' dan 'nama_bahan'

        if ($filter_bahan) {
            $this->db->where('id_bahan', $filter_bahan);
        }
        $this->db->where('status_segel =', 1);
        // $this->db->group_by('id_bahan');
        $this->db->where("DATE_FORMAT(tanggal_datang, '%Y-%m') =", date('Y-m', strtotime($filter_bulan_print)));
        $this->db->from('view_data_bahan_by_stok');
        $this->db->order_by('nama_bahan', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function filter_stok_awal($filter_bahan, $filter_bulan_print)
    {
        $this->db->select('*'); // Memilih semua kolom
        if ($filter_bahan) {
            $this->db->where('id_bahan', $filter_bahan);
        }
        $this->db->where('status_segel', 1); // Anda tidak perlu '= 1', cukup 'status_segel' saja
        $this->db->where("(YEAR(tanggal_datang) < '" . date('Y', strtotime($filter_bulan_print)) . "' 
                       OR (YEAR(tanggal_datang) = '" . date('Y', strtotime($filter_bulan_print)) . "' 
                       AND MONTH(tanggal_datang) < '" . date('m', strtotime($filter_bulan_print)) . "'))");

        $this->db->from('view_data_bahan_by_stok');
        $this->db->order_by('nama_bahan', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function filter_stok_masuk($filter_bahan, $filter_bulan_print)
    {
        $this->db->select('*'); // Memilih kolom 'id' dan 'nama_bahan'
        if ($filter_bahan) {
            $this->db->where('id_bahan', $filter_bahan);
        }
        $this->db->where('status_segel =', 1);
        // $this->db->group_by('id_bahan');
        $this->db->where("DATE_FORMAT(tanggal_datang, '%Y-%m') =", date('Y-m', strtotime($filter_bulan_print)));

        $this->db->from('view_data_bahan_by_stok');
        $this->db->order_by('nama_bahan', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }


    function filter_stok_keluar($filter_bahan, $filter_bulan_print)
    {
        $this->db->select('*');
        if ($filter_bahan) {
            $this->db->where('id_bahan', $filter_bahan);
        }
        $this->db->where('status_segel >=', 2);
        // Jika Anda perlu mengaktifkan GROUP BY
        // $this->db->group_by('id_bahan');

        // Untuk mengatur kondisi tanggal (diasumsikan tanggal_datang adalah kolom tanggal yang ingin Anda filter)
        $this->db->where("DATE_FORMAT(tanggal_buka, '%Y-%m') =", date('Y-m', strtotime($filter_bulan_print)));

        $this->db->from('view_data_bahan_by_stok');
        $this->db->order_by('nama_bahan', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }
    function list_tanggal_ed($filter_bahan, $filter_bulan_print)
    {
        $this->db->select('*'); // Memilih kolom 'id' dan 'nama_bahan'
        if ($filter_bahan) {
            $this->db->where('id_bahan', $filter_bahan);
        }
        $this->db->where('status_segel =', 1);
        // $this->db->group_by('id_bahan');
        // $this->db->where("DATE_FORMAT(tanggal_datang, '%Y-%m') =", date('Y-m', strtotime($filter_bulan_print)));

        $this->db->from('view_data_bahan_by_stok');
        $this->db->order_by('nama_bahan', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function list_no_batch($filter_bahan, $filter_bulan_print)
    {
        $this->db->select('*'); // Memilih kolom 'id' dan 'nama_bahan'
        if ($filter_bahan) {
            $this->db->where('id_bahan', $filter_bahan);
        }
        $this->db->where('status_segel =', 1);
        // $this->db->group_by('id_bahan');
        // $this->db->where("DATE_FORMAT(tanggal_datang, '%Y-%m') =", date('Y-m', strtotime($filter_bulan_print)));

        $this->db->from('view_data_bahan_by_stok');
        $this->db->order_by('nama_bahan', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_by_id_bahan($id_bahan)
    {
        $this->db->from($this->table);
        $this->db->where('id_bahan', $id_bahan);
        $query = $this->db->get();

        return $query->row();
    }
    public function nomor_urut($filter_kode_bahan, $filter_id_bahan)
    {
        // Ambil nomor urut terakhir dari database untuk kode bahan tertentu
        $this->db->select('MAX(CAST(SUBSTRING_INDEX(kode_bahan, " ", -1) AS UNSIGNED)) as max_urut', false);
        $this->db->where('id_bahan', $filter_id_bahan);
        $this->db->like('kode_bahan', $filter_kode_bahan, 'after');
        $query = $this->db->get('tb_bahan_stock');
        $result = $query->row();
        $maxUrut = $result->max_urut;

        // Jika tidak ada data sebelumnya, set nomor urut menjadi 1, jika ada, tambahkan 1
        $newUrut = $maxUrut ? $maxUrut + 1 : 1;

        // Buat kode baru dengan format kode bahan + nomor urut
        $newCode = $filter_kode_bahan . ' ' . intval($newUrut);

        return $newCode;
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


    function get_distinct_lokasi_penyimpanan($lokasi_penyimpanan)
    {

        $this->db->like('lokasi_penyimpanan', $lokasi_penyimpanan);


        $this->db->group_by('lokasi_penyimpanan');
        $this->db->order_by('lokasi_penyimpanan', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_bahan_stock')->result_array();
    }

    public function get_distinct_merek($merek)
    {


        $this->db->like('merek', $merek);


        $this->db->group_by('merek');
        $this->db->order_by('merek', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_bahan_stock')->result_array();
    }
}
