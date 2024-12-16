<?php
class Instrumen_Baru_model extends CI_Model
{
    var $table = 'tb_instrumen_baru';
    var $table2 = 'tb_order_diterima';
    var $column_order = array(null, null, 'id_order',  'kategori_barang', 'nama_barang', 'merek', 'jumlah', 'satuan', 'nama', 'keterangan',  'tanggal_datang', 'no_pr');
    //set column field database for datatable orderable
    var $column_search = array('id_order'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_order' => 'asc'); // default order 


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        // if ($this->input->post('nama')) {
        //     $this->db->where('nama', $this->input->post('nama'));
        // }

        if ($this->input->post('id_status')) {
            $this->db->where('id_status', $this->input->post('id_status'));
        }

        if ($this->input->post('id_order_tiket')) {
            $this->db->where('id_order_tiket', $this->input->post('id_order_tiket'));
        }

        if ($this->input->post('id_batch')) {
            $this->db->where('id_batch', $this->input->post('id_batch'));
        }
        //
        // $this->db->where('status=', 0);
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
    private function _get_datatables_query2()
    {

        $this->db->from($this->table2);

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

        // $this->db->order_by('id_status', 'ASC');
        // $this->db->order_by('urgent', 'ASC');
        // $this->db->where('jumlah !=', '0');
        // $this->db->where('kategori_barang =', 'Glassware');
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function get_datatables_user()
    {
        // $id_order_unit = $_POST['id_order_unit'];
        // $this->db->order_by('urgent', 'DESC');
        $this->db->order_by('urgent', 'asc');
        $this->db->order_by('id_order', 'asc');
        // $this->db->order_by('urgent', 'ASC');
        // $this->db->where('id_order_unit ', 'BBG');
        // $this->db->where('id_status =',  $this->input->post('id_status'));
        $this->_get_datatables_query();

        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_spv()
    {
        $this->db->order_by('id_batch', 'DESC');
        $this->db->order_by('id_status', 'ASC');
        $this->db->order_by('urgent', 'ASC');
        $this->db->where('id_status =', 1);

        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function get_datatables_admin()
    {
        $this->db->order_by('id_batch', 'DESC');
        $this->db->order_by('id_status', 'ASC');
        $this->db->order_by('urgent', 'ASC');
        $this->db->where('id_status =', 2);

        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function get_datatables_ka_unit()
    {
        $this->db->order_by('id_batch', 'ASC');
        $this->db->order_by('id_status', 'ASC');
        $this->db->order_by('urgent', 'ASC');
        $this->db->where('id_status =', 3);

        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function DataInstrumenBaru()
    {
        // $this->db->order_by('id_status', 'ASC');
        // $this->db->order_by('urgent', 'ASC');
        $this->db->where('kategori_barang =', 'Glassware');
        // $this->db->where('id_status =', '11');
        $this->db->where('jumlah_diterima !=', '0');
        $this->_get_datatables_query2();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function CariNamaBarang($nama_barang)
    {
        $this->db->like('nama_barang', $nama_barang);
        $this->db->order_by('nama_barang', 'ASC');
        $this->db->limit(10);
        $this->db->group_by('tb_order.nama_barang');
        return $this->db->get('tb_order')->result();
    }

    public function dataSatuan()
    {
        $this->db->order_by('satuan', 'ASC');
        $this->db->group_by('tb_master_satuan.satuan');
        $query = $this->db->get('tb_master_satuan');
        return $query->result();
    }

    public function dataUkuran()
    {
        $this->db->order_by('ukuran', 'ASC');
        $this->db->group_by('tb_master_satuan.ukuran');
        $query = $this->db->get('tb_master_satuan');
        return $query->result();
    }
    public function get_by_id_diterima($id_diterima)
    {
        $this->db->from($this->table2);
        $this->db->where('id_diterima', $id_diterima);
        $query = $this->db->get();

        return $query->row();
    }

    public function dataKategori()
    {
        $this->db->order_by('kategori_barang', 'ASC');
        $query = $this->db->get('tb_master_kategori_barang');
        return $query->result();
    }

    public function dataStatus()
    {
        $this->db->order_by('id_status', 'ASC');
        $query = $this->db->get('tb_master_status_order');
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

    public function LoadData($data)
    {
        // $query = $this->db->get('tb_order');
        // $query = $this->db->where('id_order', $data);
        $aa = $this->db->where("id_order", $data)->get('tb_order');
        // return $query->result();

        $this->db->insert($this->table, $aa);
        return $this->db->insert_id();
    }


    function saveBarangBaru($data)
    {
        $query = $this->db->where('id_batch', $data);
        $query = $this->db->get('tb_instrumen_baru');
        foreach ($query->result() as $row) {
            $this->db->insert('tb_order', $row);
        }
        // return $this->db->insert_id();
    }

    function saveGlasswareBaru($data)
    {
        $query = $this->db->where('id_order', $data);
        $query = $this->db->get('tb_order');
        foreach ($query->result() as $row) {
            $this->db->insert('tb_order_diterima', $row);
        }

        // return $this->db->insert_id();
    }

    public function updateGlasswareBaru($data, $data3)
    {
        $this->db->where('id_order', $data);
        $this->db->order_by("id_diterima", "desc");
        $this->db->limit(1);
        $this->db->update('tb_order_diterima', $data3);

        return $this->db->affected_rows();
    }

    public function get_by_id($id_order)
    {
        $this->db->from($this->table);
        $this->db->where('id_order', $id_order);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_by_nomor($nomor)
    {
        $this->db->from($this->table);
        $this->db->where('nomor', $nomor);
        $query = $this->db->get();

        return $query->row_array();
    }


    public function update($where, $data3)
    {
        $this->db->update($this->table, $data3, $where);
        return $this->db->affected_rows();
    }

    public function updateNamaBarangSesuaiPenawaran($where, $data2)
    {
        $this->db->update($this->table, $data2, $where);
        return $this->db->affected_rows();
    }

    public function updateEdit($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function updateDiterima($data2, $data3)
    {
        $this->db->where('id_diterima', $data3);
        $this->db->update($this->table2, $data2);
        return $this->db->affected_rows();
    }

    public function updatePersetujuanSpv($dataOrderUnit, $dataStatus,    $data2)
    {
        $this->db->where('nama', $dataOrderUnit);
        $this->db->where('id_status', $dataStatus);
        $this->db->update($this->table, $data2);
        return $this->db->affected_rows();
    }

    public function updatePersetujuanAdmin($dataTiket, $data2)
    {
        // $this->db->where('id_order_unit', $dataOrderUnit);
        $this->db->where('id_order_tiket', $dataTiket);
        // $this->db->where('id_status', $dataStatus);
        $this->db->update($this->table, $data2);
        return $this->db->affected_rows();
    }

    public function updatePersetujuanKaUnit($data, $dataStatus, $data3)
    {
        $this->db->where('id_batch', $data);
        $this->db->where('id_status', $dataStatus);
        $this->db->update($this->table, $data3);
        return $this->db->affected_rows();
    }


    public function delete_by_id($nomor)
    {
        $this->db->where('nomor', $nomor);
        $this->db->delete($this->table);
    }

    public function Membuat_Kode_Otomatis()
    {
        $this->db->select('RIGHT(tb_instrumen_baru.id_order,3) as kode', FALSE);
        $this->db->order_by('id_order', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_instrumen_baru');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $tgl = date('my');
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi =   $tgl . $kodemax;
        return $kodejadi;
    }

    public function Kode_batch()
    {
        $this->db->select('RIGHT(tb_instrumen_baru.id_batch,3) as kode', FALSE);
        $this->db->order_by('id_batch', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_instrumen_baru');      //cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi =   $tgl . $kodemax;
        return $kodejadi;
    }

    public function KodePCR()
    {
        $this->db->select('LEFT(tb_daftar_glassware.id_aset,4) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_glassware');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('my');
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi =   "PCR";
        return $kodejadi;
    }
}
