<?php
class Bahan_master_model extends CI_Model
{
    var $table = 'tb_bahan_master';
    var $table2 = 'tb_bahan_master';
    var $column_order = array(null, null, 'nama_bahan', 'type_bahan', 'kode_bahan', 'jenis_bahan', 'peringatan_bahaya', null, null); //set column field database for datatable orderable
    var $column_search = array('nama_bahan', 'kode_bahan', 'type_bahan', 'jenis_bahan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('nama_bahan' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        if ($this->input->post('filter_type_bahan')) {
            $this->db->where('type_bahan', $this->input->post('filter_type_bahan'));
        }

        if ($this->input->post('filter_jenis_bahan')) {
            $this->db->where('jenis_bahan', $this->input->post('filter_jenis_bahan'));
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

    function get_datatables()
    {


        // $this->db->order_by('jumlah_bahan', 'DESC');
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



    public function Membuat_Kode_Otomatis()
    {
        $this->db->select('RIGHT(tb_kategori_instrumen.id_instrumen,2) as kode', FALSE);
        $this->db->order_by('id_instrumen', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_kategori_instrumen');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "AL" . $kodemax;
        return $kodejadi;
    }

    function total_reagen()
    {
        $this->db->from($this->table2);
        $this->db->where('type_bahan', 'Reagen');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jenis_cair()
    {
        $status = 'Cair';

        $this->db->from($this->table2);
        $this->db->where('jenis_bahan', $status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jenis_padat()
    {

        $status = 'Padat';
        $this->db->from($this->table2);
        // $this->db->where('status_kalibrasi',  $status1);
        $this->db->where('jenis_bahan',  $status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function jenis_prekursor()
    {
        $status = 'Prekursor';

        $this->db->from($this->table2);
        $this->db->where('jenis_bahan', $status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function total_media()
    {

        $this->db->from($this->table2);
        $this->db->where('type_bahan', 'Media');
        $query = $this->db->get();
        return $query->num_rows();
    }
}