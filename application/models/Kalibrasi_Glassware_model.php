<?php
class Kalibrasi_Glassware_model extends CI_Model
{
    var $table = 'tb_input_kalibrasi_glassware';
    var $table2 = 'tb_hasil_kalibrasi_glassware';
    var $table3 = 'tb_daftar_input_kalibrasi_glassware';
    var $column_order = array(null, 'id_aset  ',  'id_laporan', 'id_instrumen', 'perulangan', 'berat_kosong', 'berat_isi', 'suhu_akuades'); //set column field database for datatable orderable
    var $column_search = array('id_laporan', 'id_aset '); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_input' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        if ($this->input->post('id_aset')) {
            $this->db->where('id_aset', $this->input->post('id_aset'));
        }

        if ($this->input->post('id_lembarkerja')) {
            $this->db->where('id_lembarkerja', $this->input->post('id_lembarkerja'));
        }

        if ($this->input->post('id_laporan')) {
            $this->db->where('id_laporan', $this->input->post('id_laporan'));
        }

        $this->db->where('status', 0);

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

        // if ($this->input->post('id_aset')) {
        //     $this->db->where('id_aset', $this->input->post('id_aset2'));
        // }

        if ($this->input->post('id_laporan2')) {
            $this->db->where('id_laporan', $this->input->post('id_laporan2'));
        }

        $this->db->where('status', 1);

        $this->db->from($this->table3);

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
        // $this->db->where('id_aset', $this->input->post('id_aset'));
        $this->db->order_by('id_input', 'ASC');
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_lembarkerja()
    {
        // $this->db->where('id_aset', $this->input->post('id_aset'));
        $this->db->order_by('id_input', 'ASC');
        $this->db->order_by('id_laporan', 'ASC');
        $this->db->order_by('skala', 'ASC');
        // $this->db->group_by('status', "1");
        $this->_get_datatables_query2();
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
    public function saveHasilKalibrasi($data3)
    {
        $this->db->insert($this->table2, $data3);
        return $this->db->insert_id();
    }
    public function SaveDaftarInputKalibrasi($data5)
    {
        $this->db->insert($this->table3, $data5);
        return $this->db->insert_id();
    }
    public function AmbilDataJoinLaporan($segment)
    {
        // $this->db->select('*');
        // $query = $this->db->get('tb_input_kalibrasi_glassware');


        // $query = $this->db->join('tb_hasil_kalibrasi_glassware', 'tb_hasil_kalibrasi_glassware.id_laporan = tb_input_kalibrasi_glassware.id_laporan');

        // $query =  $this->db->join('tb_daftar_glassware', 'tb_daftar_glassware.id_aset = tb_input_kalibrasi_glassware.id_aset');
        $query =  $this->db->where('tb_hasil_kalibrasi_glassware.id_laporan', $segment);

        // $query =   $this->db->group_by('tb_input_kalibrasi_glassware.perulangan');
        // $query = $this->db->get();
        $query = $this->db->get('tb_hasil_kalibrasi_glassware');
        return $query->result_array();
        // $this->uri->segment(3) 
    }
    public function AmbilDataJoin($segment)
    {
        // $this->db->select('*');
        // $query = $this->db->get('tb_input_kalibrasi_glassware');


        $query = $this->db->join('tb_hasil_kalibrasi_glassware', 'tb_hasil_kalibrasi_glassware.id_laporan = tb_input_kalibrasi_glassware.id_laporan');

        $query =  $this->db->join('tb_daftar_glassware', 'tb_daftar_glassware.id_aset = tb_input_kalibrasi_glassware.id_aset');
        $query =  $this->db->where('tb_input_kalibrasi_glassware.id_lembarkerja', $segment);

        $query =   $this->db->group_by('tb_input_kalibrasi_glassware.perulangan');
        // $query = $this->db->get();
        $query = $this->db->get('tb_input_kalibrasi_glassware');
        return $query->result_array();
        // $this->uri->segment(3) 
    }
    public function AmbilDataJoinKeteranganLaporan($segment)
    {

        // $query = $this->db->select('*');
        // $query = $this->db->from('tb_hasil_kalibrasi_glassware');

        $query = $this->db->join('tb_daftar_glassware', 'tb_daftar_glassware.id_aset = tb_hasil_kalibrasi_glassware.id_aset', 'left');



        $query = $this->db->join('tb_log_instrumen', 'tb_log_instrumen.id_laporan = tb_hasil_kalibrasi_glassware.id_laporan');


        $query =  $this->db->where('tb_hasil_kalibrasi_glassware.id_laporan', $segment);



        $query = $this->db->get('tb_hasil_kalibrasi_glassware');


        return $query->row_array();
    }

    public function AmbilDataAvgSuhuLaporan($segment)
    {




        $this->db->where('id_laporan', $segment);
        $this->db->select_avg('suhu_avg');

        $query = $this->db->get('tb_hasil_kalibrasi_glassware');

        return substr($query->row()->suhu_avg,  0, 4);
    }
    public function AmbilDataAvgKelembabanLaporan($segment)
    {



        $this->db->where('id_laporan', $segment);
        $this->db->select_avg('kelembaban_avg');

        $query = $this->db->get('tb_hasil_kalibrasi_glassware');
        return substr($query->row()->kelembaban_avg,  0, 4);
    }

    public function AmbilDataJoinKeterangan($segment)
    {

        // $query = $this->db->select('*');
        // $query = $this->db->from('tb_hasil_kalibrasi_glassware');

        $query = $this->db->join('tb_daftar_glassware', 'tb_daftar_glassware.id_aset = tb_hasil_kalibrasi_glassware.id_aset', 'left');



        $query = $this->db->join('tb_log_instrumen', 'tb_log_instrumen.id_laporan = tb_hasil_kalibrasi_glassware.id_laporan');


        $query =  $this->db->where('tb_hasil_kalibrasi_glassware.id_lembarkerja', $segment);



        $query = $this->db->get('tb_hasil_kalibrasi_glassware');


        return $query->row_array();
    }

    public function AmbilDataJoinUser($session)
    {

        // $query = $this->db->select('*');
        // $query = $this->db->from('tb_hasil_kalibrasi_glassware');

        $query = $this->db->join('tb_daftar_glassware', 'tb_daftar_glassware.id_aset = tb_hasil_kalibrasi_glassware.id_aset', 'left');



        $query = $this->db->join('tb_log_instrumen', 'tb_log_instrumen.id_laporan = tb_hasil_kalibrasi_glassware.id_laporan');


        $query =  $this->db->where('tb_hasil_kalibrasi_glassware.id_laporan', $session);



        $query = $this->db->get('tb_hasil_kalibrasi_glassware');


        return $query->row_array();
    }

    public function get_by_id($id_input)
    {
        $this->db->from($this->table);
        $this->db->where('id_input', $id_input);
        $query = $this->db->get();

        return $query->row();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function updateStatusLembarKerja($where, $data4)
    {
        $this->db->update($this->table, $data4, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id_input)
    {
        $this->db->where('id_input', $id_input);
        $this->db->delete($this->table);
    }

    public function delete_by_id_log($id_lembarkerja)
    {
        // $this->db->where('id_lembarkerja', $id_lembarkerja);
        $this->db->delete('tb_input_kalibrasi_glassware', array('id_lembarkerja' => $id_lembarkerja));
        $this->db->delete('tb_hasil_kalibrasi_glassware', array('id_lembarkerja' => $id_lembarkerja));
        $this->db->delete('tb_daftar_input_kalibrasi_glassware', array('id_lembarkerja' => $id_lembarkerja));
    }

    public function Membuat_Kode_Otomatis()

    {
        $this->db->select('RIGHT(tb_input_kalibrasi_glassware.perulangan,1)as kode');

        $this->db->where('id_laporan', $this->input->post('id_laporan'));
        $this->db->where('id_aset', $this->input->post('id_aset'));
        $this->db->order_by('id_input', 'DESC');
        // $this->db->limit(1);
        $query = $this->db->get('tb_input_kalibrasi_glassware');

        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        return $kode;
    }

    public function Get_Id_laporan($id_laporan)

    {
        $this->db->select('RIGHT(tb_input_kalibrasi_glassware.id_lembarkerja,1)as kode');

        $this->db->where('id_laporan', $id_laporan);
        $this->db->order_by('id_laporan', 'DESC');
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get('tb_input_kalibrasi_glassware');

        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $tgl = date('my');
        $kodemax = str_pad($kode, 1, "0", STR_PAD_LEFT);
        $kodejadi =   $id_laporan .   "-" .  $kodemax;
        return $kodejadi;
    }



    public function Kode_Laporan()

    {
        $this->db->select('RIGHT(tb_hasil_kalibrasi_glassware.id_laporan,3)as kode');

        // $this->db->where('id_aset', );
        $this->db->order_by('id_laporan', 'DESC');
        // $this->db->limit(1);
        $query = $this->db->get('tb_hasil_kalibrasi_glassware');

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

    public function kode_lembarkerja_awal()

    {
        $this->db->select('RIGHT(tb_daftar_input_kalibrasi_glassware.id_lembarkerja,1)as kode');

        // $this->db->where('status', 1);
        // $this->db->where('id_laporan', 20220001);
        $this->db->order_by('id_lembarkerja', 'DESC');
        // $this->db->group_by('id_lembarkerja', 'DESC');

        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_input_kalibrasi_glassware');

        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $tgl = date('my');
        $kodemax = str_pad($kode, 1, "0", STR_PAD_LEFT);
        $kodejadi =  "-" . $kodemax;
        return $kodejadi;
    }
    public function kode_lembarkerja($id_laporan)

    {
        $this->db->select('RIGHT(tb_daftar_input_kalibrasi_glassware.id_lembarkerja,1)as kode');

        // $this->db->where('status', 1);
        $this->db->where('id_laporan', $id_laporan);
        $this->db->order_by('id_lembarkerja', 'DESC');
        // $this->db->group_by('id_lembarkerja', 'DESC');

        $this->db->limit(1);
        $query = $this->db->get('tb_daftar_input_kalibrasi_glassware');

        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $tgl = date('my');
        $kodemax = str_pad($kode, 1, "0", STR_PAD_LEFT);
        $kodejadi =  "-" . $kodemax;
        return $kodejadi;
    }
    public function get_Lembarkerja($id_laporan, $id_aset)
    {
        // $this->db->where('skala', $skala);

        $this->db->where('skala', $id_laporan);
        $this->db->where('id_aset', $id_aset);
        $this->db->where('status', $id_aset);
        $this->db->order_by('id_lembarkerja', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_input_kalibrasi_glassware');


        return $query->row();
    }

    public function getPerulangan($id_lembarkerja, $id_aset, $id_laporan)
    {
        // $this->db->where('skala', $skala);
        $this->db->where('id_laporan', $id_laporan);
        $this->db->where('skala', $id_lembarkerja);
        $this->db->where('id_aset', $id_aset);
        $this->db->order_by('perulangan', 'DESC');
        $this->db->order_by('id_laporan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_input_kalibrasi_glassware');


        return $query->row();
    }

    public function getPerulanganHabisLoad($id_aset, $id_laporan)
    {
        // $this->db->where('skala', $skala);
        $this->db->where('id_laporan', $id_laporan);
        $this->db->where('status', 0);
        $this->db->where('id_aset', $id_aset);

        // $this->db->order_by('id_laporan', 'DESC');
        $this->db->order_by('perulangan', 'DESC');


        $this->db->limit(1);
        $query = $this->db->get('tb_input_kalibrasi_glassware');


        return $query->row();
    }

    public function GetDataLembarKerja($id_aset)
    {
        // $this->db->where('skala', $skala);


        $this->db->where('id_aset', $id_aset);

        $this->db->order_by('id_aset', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_hasil_kalibrasi_glassware');


        return $query->row();
    }

    public function GetDataLaporanKalibrasi($id_kalibrasi)
    {
        // $this->db->where('skala', $skala);


        $this->db->where('id_kalibrasi', $id_kalibrasi);

        $this->db->order_by('id_kalibrasi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_log_instrumen');


        return $query->row();
    }

    public function GetDataSudahKalibrasi($id_kalibrasi)
    {
        // $this->db->where('skala', $skala);


        $this->db->where('id_kalibrasi', $id_kalibrasi);

        $this->db->order_by('id_kalibrasi', 'DESC');
        // $this->db->limit(1);
        $query = $this->db->get('tb_log_instrumen');
        return $query->num_rows();
    }



    public function getStdDev($id_lembarkerja)
    {

        $this->db->select("(SELECT STDDEV_POP(berat_isi) FROM tb_input_kalibrasi_glassware WHERE id_lembarkerja='$id_lembarkerja') AS stddevsuhu", FALSE);
        $query = $this->db->get('tb_input_kalibrasi_glassware');
        return $query->row();
    }

    public function getRataV20($id_lembarkerja)
    {

        $this->db->select("(SELECT AVG(V20) FROM tb_input_kalibrasi_glassware WHERE id_lembarkerja= '$id_lembarkerja') AS ratav20", FALSE);
        $query = $this->db->get('tb_input_kalibrasi_glassware');
        return $query->row();
    }
    public function getRataBeratAir($id_lembarkerja)
    {

        $this->db->select("(SELECT AVG(berat_air) FROM tb_input_kalibrasi_glassware WHERE id_lembarkerja= '$id_lembarkerja') AS rataberatair", FALSE);
        $query = $this->db->get('tb_input_kalibrasi_glassware');
        return $query->row();
    }
    public function getRataSuhuAkuades($id_lembarkerja)
    {

        $this->db->select("(SELECT AVG(suhu_akuades) FROM tb_input_kalibrasi_glassware WHERE id_lembarkerja= '$id_lembarkerja') AS ratasuhuakuades", FALSE);
        $query = $this->db->get('tb_input_kalibrasi_glassware');
        return $query->row();
    }

    public function getMaxSuhu($id_lembarkerja)
    {

        $this->db->select("(SELECT Max(suhu_akuades) FROM tb_input_kalibrasi_glassware WHERE id_lembarkerja= '$id_lembarkerja') AS maxsuhu", FALSE);
        $query = $this->db->get('tb_input_kalibrasi_glassware');
        return $query->row();
    }

    public function getMinSuhu($id_lembarkerja)
    {

        $this->db->select("(SELECT Min(suhu_akuades) FROM tb_input_kalibrasi_glassware WHERE id_lembarkerja= '$id_lembarkerja') AS minsuhu", FALSE);
        $query = $this->db->get('tb_input_kalibrasi_glassware');
        return $query->row();
    }
    public function getIdLaporan($id_aset)
    {


        $this->db->where('id_aset', $id_aset);
        $query = $this->db->get('tb_hasil_kalibrasi_glassware');
        return $query->row();
    }

    public function getDataHasilKalibrasi($id_aset)
    {


        $this->db->where('id_aset', $id_aset);
        $query = $this->db->get('tb_hasil_kalibrasi_glassware');
        return $query->row();
    }
}
