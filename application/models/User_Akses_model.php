<?php
class User_Akses_model extends CI_Model
{
    var $table = 'tb_user_akses';
    var $column_order = array(null, null, 'id_akses', 'id_user', '	id_halaman', 'nama_halaman', 'title', 'url', 'view', 'create', 'update', 'delete'); //set column field database for datatable orderable
    var $column_search = array('id_akses', 'id_user', 'id_halaman', 'nama_halaman', 'title', 'url', 'view', 'create', 'update', 'delete'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('nama_halaman' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        if ($this->input->post('pernr')) {
            $this->db->where('pernr', $this->input->post('pernr'));
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
        $this->db->order_by('tipe', 'ASC');
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function getDataUsername()
    {
        return $query = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
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

    public function get_by_id($id_halaman)
    {
        $this->db->from($this->table);
        $this->db->where('id_halaman', $id_halaman);
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id_halaman)
    {
        $this->db->where('id_halaman', $id_halaman);
        $this->db->delete($this->table);
    }


    public function delete_akses_by_id($id_akses)
    {
        $this->db->where('id_akses', $id_akses);
        $this->db->delete($this->table);
    }


    public function Membuat_Kode_Otomatis()
    {
        $this->db->select('RIGHT(tb_user.id_user,3) as kode', FALSE);
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_user');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "LAB" . $kodemax;
        return $kodejadi;
    }
}