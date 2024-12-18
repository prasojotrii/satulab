<?php
class User_model extends CI_Model
{
    var $table = 'tb_user';
    var $table2 = 'tb_user_akses';

    var $column_order = array(null, null,  'pernr',  'nama', 'sub_laboratorium', 'penyelia', 'kepalaunit', 'tipe'); //set column field database for datatable orderable
    var $column_search = array('pernr',  'nama', 'sub_laboratorium', 'penyelia', 'kepalaunit', 'tipe'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('tipe' => 'asc'); // default order 


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
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


    public function get_kode_admin_by_pernr($pernr)
    {
        $this->db->select('kode_admin');
        $this->db->from('tb_master_user');
        $this->db->where('pernr', $pernr);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->kode_admin; // Mengembalikan nilai kode_admin
        } else {
            return null; // Jika tidak ditemukan
        }
    }


    function get_datatables()
    {
        // $this->db->order_by('kepalaunit', 'asc');
        // $this->db->order_by('pernr', 'asc');
        $this->db->order_by('penyelia', 'asc');
        $this->db->order_by('pernr', 'asc');
        $this->db->order_by('tipe', 'asc');
        $this->db->order_by('sub_laboratorium', 'asc');
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function getDataPernrSession()
    {
        return $query = $this->db->get_where('tb_user', ['pernr' => $this->session->userdata('pernr')])->row_array();
    }
    function getDataPernr($pernr)
    {
        return $query = $this->db->get_where('tb_user', ['pernr' => $pernr])->row_array();
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

    public function get_by_id($id_user)
    {
        $this->db->from($this->table);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_user_by_pernr($pernr)
    {
        $this->db->from('tb_master_user');
        $this->db->where('pernr', $pernr);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_user_by_id_unit($id_unit)
    {

        $this->db->from('tb_master_unit_company');
        $this->db->where('id_unit', $id_unit);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan data unit

    }



    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete($this->table);
    }

    public function delete_hak_akses($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete($this->table2);
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

    function SaveUserBaru($data2, $data3)
    {
        $query = $this->db->where('nama_role', $data2);
        $query = $this->db->get('tb_user_role');
        foreach ($query->result() as $row) {

            $this->db->insert('tb_user_akses', $row);
            $this->db->where('id_user =', '');
            $this->db->update('tb_user_akses', $data3);
        }


        // return $this->db->affected_rows();
    }
    function getDataAkses()
    {
        // return $query = $this->db->get_where('tb_user_akses', ['id_user' => $this->session->userdata('id_user')])->row_array();




        $this->db->from('tb_user_akses');
        $this->db->where('pernr', $this->session->userdata('pernr'));
        $this->db->where('url', $this->uri->segment(1));
        $query = $this->db->get();

        return $query->row_array();
    }
    function getDataAksesDashboard()
    {
        // return $query = $this->db->get_where('tb_user_akses', ['id_user' => $this->session->userdata('id_user')])->row_array();




        $this->db->from('tb_user_akses');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('url', $this->uri->segment(1));
        $query = $this->db->get();

        return $query->row_array();
    }

    function getDataAksesDashboardPernr()
    {
        // return $query = $this->db->get_where('tb_user_akses', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->db->from('tb_user_akses');
        $this->db->where('pernr', $this->session->userdata('pernr'));
        $this->db->where('url', $this->uri->segment(1));
        $query = $this->db->get();

        return $query->row_array();
    }

    public function dataRole()
    {
        $this->db->order_by('nama_role', 'ASC');
        $this->db->group_by('nama_role');
        $query = $this->db->get('tb_user_role');
        return $query->result();
    }

    public function dataSupervisor()
    {
        // $this->db->order_by('nama_role', 'ASC');
        $this->db->order_by('nama');
        $this->db->where('jabatan', 'Supervisor');
        $query = $this->db->get('tb_user_atasan');
        return $query->result();
    }

    public function get_penyelia_users()
    {
        $this->db->select('pernr, name'); // Sesuaikan kolom sesuai kebutuhan
        $this->db->from('tb_master_user');
        $this->db->where('jobdesk', 'Penyelia');
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan sebagai array
    }

    public function get_names_by_pernr($penyelia)
    {
        if (empty($penyelia) || !is_array($penyelia)) {
            return [];
        }

        // Sanitize input
        $penyelia = array_map('intval', $penyelia);

        // Query to get user names by pernr
        $this->db->select('pernr, name');
        $this->db->from('tb_master_user');
        $this->db->where('jobdesk', 'Penyelia');
        $this->db->where_in('pernr', $penyelia);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $names = [];
            foreach ($result as $row) {
                $names[$row['pernr']] = $row['name'];
            }
            return $names;
        } else {
            return [];
        }
    }

    public function get_ka_unit_lab_analisa()
    {
        $this->db->select('name');
        $this->db->from('tb_master_user');
        $this->db->where('jobdesk', 'Ka Unit Lab Analisa');
        $query = $this->db->get();
        $result = $query->row_array();

        return $result ? $result['name'] : 'N/A';
    }

    public function get_pernr_ka_unit_lab_analisa()
    {
        $this->db->select('pernr');
        $this->db->from('tb_master_user');
        $this->db->where('jobdesk', 'Ka Unit Lab Analisa');
        $query = $this->db->get();
        $result = $query->row_array();

        return $result ? $result['pernr'] : 'N/A';
    }

    public function get_data_manager_qc()
    {
        $this->db->select('pernr,email,name');
        $this->db->from('tb_master_user');
        $this->db->where('jobdesk', 'Manager QC');
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan array dengan pernr dan email
    }


    public function get_data_manager_rnd()
    {
        $this->db->select('pernr,email,name');
        $this->db->from('tb_master_user');
        $this->db->where('jobdesk', 'Manager R&D');
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan array dengan pernr dan email
    }


    public function get_data_ka_rnd()
    {
        $this->db->select('pernr,email,name');
        $this->db->from('tb_master_user');
        $this->db->where('jobdesk', 'Ka Unit R&D');
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan array dengan pernr dan email
    }
}
