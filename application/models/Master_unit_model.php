<?php
class Master_unit_model extends CI_Model
{
    var $table = 'tb_master_unit_company';
    var $column_order = [null, null, null, 'unit_name', 'unit_cost_center', 'email', 'company_parent'];
    //set column field database for datatable orderable

    var $column_search = ['unit_name'];
    //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = ['unit_name' => 'asc']; // default order

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
        // $this->db->order_by('unit_priority', 'DESC');
        // $this->db->where('unit_type', 2);

        // $this->db->order_by('unit_name', 'ASC');
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
        // $this->db->where('unit_type', 2);
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        // $this->db->where('unit_type', 2);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_data_unit($id_unit)
    {
        $this->db->from($this->table);
        $this->db->where('id_unit', $id_unit);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_data_all_unit()
    {
        $this->db->select('id_unit, unit_name'); // Menentukan kolom yang ingin diambil
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result(); // Mengembalikan seluruh hasil query
    }


    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        $this->db->delete($this->table);
    }

    public function get_user_by_pernr($pernr)
    {
        $this->db->where('pernr', $pernr);
        return $this->db->get('tb_master_user')->row();
    }

    public function get_user_access($pernr, $id_apps)
    {
        $this->db->where('pernr', $pernr);
        $this->db->where('id_apps', $id_apps);
        return $this->db->get('tb_master_user_apps')->row();
    }


    public function check_login($pernr, $password, $id_apps)
    {
        // Query untuk mencari pengguna berdasarkan PERNR dan password
        $query = $this->db->get_where('tb_master_user', array('pernr' => $pernr, 'password' => $password));

        // Jika pengguna ditemukan, return true (login berhasil) dan cek tb_master_user_apps
        if ($query->num_rows() > 0) {
            // Cek apakah ada nomor PERNR pada tb_master_user_apps dengan id_apps = 1
            $this->db->where('pernr', $pernr);
            $this->db->where('id_apps', $id_apps);
            $this->db->where('active', 1);
            $query_apps = $this->db->get('tb_master_user_apps');

            // Jika nomor PERNR ditemukan dengan id_apps = 1
            if ($query_apps->num_rows() > 0) {
                // Set session data pernr
                $this->session->set_userdata('pernr', $pernr);
                return true; // Login berhasil
            } else {
                return 'Tidak ada akses'; // Tidak ada akses
            }
        } else {
            return false; // Login gagal
        }
    }

    public function get_all_users()
    {
        return $this->db->get('tb_master_user')->result();
    }
}
