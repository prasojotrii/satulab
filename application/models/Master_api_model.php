<?php
class Master_api_model extends CI_Model
{
    var $table = 'tb_master_api';
    var $column_order = array(null, null, null, 'name_api', 'token', 'status', 'create_at', 'expired_at'); //set column field database for datatable orderable
    var $column_search = array(); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array(); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        // if ($this->input->post('pernr')) {
        //     $this->db->where('pernr', $this->input->post('pernr'));
        // }
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
        // $this->db->order_by('tipe', 'ASC');
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
        $this->db->insert('tb_master_api', $data);
        return $this->db->insert_id();
    }

    public function get_data($id_api)
    {
        $this->db->from($this->table);
        $this->db->where('id_api', $id_api);
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update('tb_master_api', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id_api)
    {
        $this->db->where('id_api', $id_api);
        $this->db->delete('tb_master_api');
    }
    public function check_token($token)
    {
        $this->db->where('token', $token);
        $query = $this->db->get('tb_master_api');
        return $query->num_rows() > 0;
    }
}
