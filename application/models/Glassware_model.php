<?php
class Glassware_model extends CI_Model
{
    var $table = 'tb_daftar_glassware';
    var $table2 = 'tb_log_instrumen';
    var $column_order = array(null, null, 'id_aset', 'id_instrumen', 'tipe_instrumen', 'merek', 'seri', 'serial_number', 'lokasi', 'aktif', 'kondisi', 'status_kalibrasi', 'awal_kalibrasi', 'selanjutnnya_kalibrasi', 'user_input', 'tanggal_input', null);

    //set column field database for datatable orderable

    var $column_search = array('id_aset', 'id_instrumen', 'tipe_instrumen', 'kapasitas', 'merek', 'grade', 'type', 'lokasi');

    //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_aset' => 'asc'); // default order 

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

    function get_datatables()
    {
        // $this->db->where('id_instrumen', $id_kategori);
        $this->db->order_by('status_kalibrasi', 'ASC');
        $this->db->order_by('awal_kalibrasi', 'desc');
        $this->db->order_by('id_aset', 'DESC');

        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables2()
    {
        // $this->db->where('id_instrumen', $id_kategori);
        $this->db->order_by('status_kalibrasi', 'ASC');
        $this->db->order_by('id_aset', 'ASC');
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

    function jumlah()
    {
        $query = $this->db->query('SELECT * FROM tb_daftar_glassware');
        return $query->num_rows();
    }

    function JumlahStok($id_instrumen)
    {

        $this->db->from($this->table);
        $this->db->where('id_instrumen', $id_instrumen);
        $query = $this->db->get();
        return $query->num_rows();
    }


    function sudah_dikalibrasi()
    {
        $status = 4;

        $this->db->from($this->table);
        $this->db->where('status_kalibrasi =', $status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function sedang_dikalibrasi()
    {
        $status = 3;

        $this->db->from($this->table);
        $this->db->where('status_kalibrasi =', $status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function belum_dikalibrasi()
    {

        $status2 = 2;
        $this->db->from($this->table);
        // $this->db->where('status_kalibrasi',  $status1);
        $this->db->where('status_kalibrasi <=',  $status2);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function instrumen_rusak()
    {
        $status = 5;

        $this->db->from($this->table);
        $this->db->where('status_kalibrasi', $status);
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

    public function get_by_id($id_aset)
    {
        $this->db->from($this->table);
        $this->db->where('id_aset', $id_aset);
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function delete_by_id_aset($id_aset)
    {
        $this->db->where('id_aset', $id_aset);
        $this->db->delete($this->table);
    }


    public function delete_by_id($id_kalibrasi)
    {
        $this->db->where('id_kalibrasi', $id_kalibrasi);
        $this->db->delete($this->table2);
    }

    public function dataKategori()
    {
        $this->db->order_by('kategori_instrumen', 'ASC');
        $query = $this->db->get('tb_kategori_glassware');
        return $query->result();
    }

    function getIdKategori()
    {
        return $query = $this->db->get_where('tb_kategori_instrumen', ['id_instrumen' => $this->uri->segment(3)])->row_array();
    }

    function cari($id_instrumen)
    {
        $query = $this->db->get_where('tb_kategori_glassware', array('id_instrumen' => $id_instrumen));
        return $query;
    }

    function CariDataRumus($tipe_instrumen)
    {
        $query = $this->db->get_where('tb_kategori_glassware', array('kategori_instrumen' => $tipe_instrumen));
        return $query;
    }

    function get_data_barang_bykode($tipe_instrumen)
    {
        $hsl = $this->db->query("SELECT * FROM tb_kategori_instrumen WHERE tipe_instrumen='$tipe_instrumen'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'tipe_instrumen' => $data->tipe_instrumen,
                    'id_instrumen' => $data->id_instrumen,

                );
            }
        }
        return $hasil;
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
        $kodejadi =  $kodemax . "-" . $tgl . "-" . "PCR";
        return $kodejadi;
    }

    public function KodeMKR()
    {
        $this->db->select('LEFT(tb_daftar_glassware.id_aset,4) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_glassware');
        //cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi =  $kodemax . "-" . $tgl . "-" . "MKR";
        return $kodejadi;
    }

    public function KodeINS()
    {
        $this->db->select('LEFT(tb_daftar_glassware.id_aset,4) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_glassware');
        //cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi =  $kodemax . "-" . $tgl . "-" . "INS";
        return $kodejadi;
    }
    public function KodeMTS()
    {
        $this->db->select('LEFT(tb_daftar_glassware.id_aset,4) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_glassware');
        //cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi =  $kodemax . "-" . $tgl . "-" . "MTS";
        return $kodejadi;
    }

    public function KodeOMG()
    {
        $this->db->select('LEFT(tb_daftar_glassware.id_aset,4) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_glassware');
        //cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi =  $kodemax . "-" . $tgl . "-" . "OMG";
        return $kodejadi;
    }
    public function KodeBBG()
    {
        $this->db->select('LEFT(tb_daftar_glassware.id_aset,4) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_glassware');
        //cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi =  $kodemax . "-" . $tgl . "-" . "BBG";
        return $kodejadi;
    }
    public function KodeLGK()
    {
        $this->db->select('LEFT(tb_daftar_glassware.id_aset,4) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_glassware');
        //cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi =  $kodemax . "-" . $tgl . "-" . "LGK";
        return $kodejadi;
    }

    public function KodeLogInstrumen()
    {

        $this->db->select('RIGHT(tb_log_instrumen.id_kalibrasi,4) as kode', FALSE);

        $this->db->order_by('id_kalibrasi', 'DESC');

        $this->db->limit(1);

        $query = $this->db->get('tb_log_instrumen');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() > 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $tgl = date('Y');
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi =  $tgl . $kodemax;
        return $kodejadi;
    }

    public function KodeLama()
    {
        $this->db->select('LEFT(tb_daftar_glassware.id_aset,4) as kode', FALSE);
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_glassware');
        //cek dulu apakah ada sudah ada kode di tabel.    
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
        $kodejadi =  $kodemax . "-" . $tgl . "-" . "LAMA";
        return $kodejadi;
    }
}
