<?php
class Menu_model extends CI_Model
{
    var $table = 'tb_master_menu';
    var $column_order = [null, null, 'id_menu'];
    //set column field database for datatable orderable

    var $column_search = ['id_menu'];
    //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = ['id_menu' => 'asc']; // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        // if ($this->input->post('filter_id_company')) {
        //     $this->db->where('id_company', $this->input->post('filter_id_company'));
        // }

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search
            as $item // loop column
        ) {
            if ($_POST['search']['value']) {
                // if datatable send POST for search
                if ($i === 0) {
                    // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) {
                    //last loop
                    $this->db->group_end();
                } //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            // here order processing
            $this->db->order_by(
                $this->column_order[$_POST['order']['0']['column']],
                $_POST['order']['0']['dir']
            );
        } elseif (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        // $this->db->order_by('menu_level', 'asc');
        $this->db->order_by('id_menu_parent', 'asc');

        $this->db->order_by('menu_name', 'ASC');
        // $this->db->order_by('id_unit', 'ASC');
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
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

    public function save_menu($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_data_unit($id_menu)
    {
        $this->db->from($this->table);
        $this->db->where('id_menu', $id_menu);
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->delete($this->table);
    }


    public function get_all_users()
    {
        return $this->db->get('tb_master_user')->result();
    }

    public function get_data_menu_level($id_menu_level)
    {
        $this->db->order_by('id_menu_parent', 'ASC');
        $this->db->order_by('menu_name', 'ASC');
        $query = $this->db->get_where('tb_master_menu', array('menu_level' => $id_menu_level));
        return $query->result_array();
    }
    public function get_data_menu($id_menu)
    {
        $this->db->from('tb_master_menu');
        $this->db->where('id_menu', $id_menu);
        $query = $this->db->get();

        return $query->row();
    }



    public function get_data_menu_all()
    {
        $this->db->select('id_menu, menu_name');
        $this->db->order_by('id_menu_parent', 'ASC');

        $query = $this->db->get('tb_master_menu');
        return $query->result();
    }

    public function kode_id_menu_parent()
    {
        $this->db->select('RIGHT(tb_master_menu.id_menu,2) as kode', FALSE);
        $this->db->order_by('id_menu', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_master_menu');
        //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $tgl = '1';
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = $kodemax;
        return $kodejadi;
    }
}
