<?php
class Analisa_request_model extends CI_Model
{
    var $table = 'view_analisa_request_sap';
    var $column_order = array(null, null, null, 'created_at', 'id_req', 'urgent'); //set column field database for datatable orderable
    var $column_search = array('sloc_desc', 'status', 'progress'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array(); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $filter_by = $this->input->post('filter_by');
        $pernr = $this->session->userdata("pernr");

        if ($filter_by == 'approval') {
            // Filter data berdasarkan `status = 0` dan `pernr` sesuai dengan session
            $this->db->where('status', 0);
            $this->db->where('pernr', $pernr);
            $this->db->order_by('id', 'asc'); // Urutkan berdasarkan `id` secara ascending
            $query = $this->db->get('tb_request_approval');

            // Ambil hasil query dalam bentuk array
            $result = $query->result_array();

            // Pastikan ada data yang ditemukan
            if (!empty($result)) {
                // Ambil semua id_req yang ditemukan dari hasil query
                $id_reqs = array_column($result, 'id_req');

                // Ambil jobdesk dari session
                $jobdesk = $this->session->userdata("jobdesk");

                // Filter pada tabel tb_request_approval berdasarkan kondisi jobdesk
                if ($jobdesk == "Ka Unit") {
                    $this->db->where('progress', "Approval Ka Unit");
                } elseif ($jobdesk == "Koordinator QC") {
                    $this->db->where('progress', "Approval Koordinator");
                } elseif ($jobdesk == "Ka Unit Lab Analisa") {
                    $this->db->where('progress', "Approval Ka Unit Lab Analisa");
                }

                // Terapkan filter berdasarkan id_req yang ditemukan
                $this->db->where_in('id_req', $id_reqs);
                $this->db->from('view_analisa_request_sap');
            } else {
                // Jika tidak ada `id_req`, kembalikan query kosong atau sesuai kebutuhan
                $this->db->from('view_analisa_request_sap'); // Menggunakan nama tabel yang benar
                $this->db->where('1=2'); // Ini akan menghasilkan query kosong
            }
        } else {
            // Jika tidak ada filter_by = 'approval', lakukan pengurutan berdasarkan progress
            $this->db->select("*, 
            CASE 
                WHEN progress = 'Approval Ka Unit' THEN 1
                WHEN progress = 'Approval Koordinator' THEN 2
                WHEN progress = 'Cetak Label' THEN 3
                WHEN progress = 'Pengiriman Ke Lab' THEN 4
                WHEN progress = 'Pengiriman Ke R&D' THEN 4
                WHEN progress = 'Administrasi Lab Analisa' THEN 5
                WHEN progress = 'Approval Ka Unit Lab Analisa' THEN 6
                WHEN progress = 'Sedang dianalisa Lab' THEN 7
                WHEN progress = 'Approval hasil analisa' THEN 8
                WHEN progress = 'Input data analisa Lab' THEN 9
                WHEN progress = 'Approval Manager QC' THEN 10
                WHEN progress = 'Analisa Lab selesai' THEN 11
                WHEN progress = 'Karantina selesai' THEN 20
                ELSE 99 
            END as progress_order");

            // Pengurutan berdasarkan progress_order dan lainnya
            $this->db->order_by('progress_order', 'asc');
            $this->db->order_by('status_kar', 'desc');
            $this->db->order_by('id', 'desc');
            $this->db->order_by('no_karantina', 'desc');

            $this->db->from('tb_analisa_request_sap'); // Menggunakan nama tabel yang benar
        }

        // Proses pencarian (search)
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        // Order by dari DataTables jika ada
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (!empty($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function check_exists($id_req)
    {
        $this->db->where('id_req', $id_req);
        $query = $this->db->get('tb_analisa_request_sap');
        return $query->num_rows() > 0;
    }

    public function update_data($id_req, $data)
    {
        $this->db->where('id_req', $id_req);
        return $this->db->update('tb_analisa_request_sap', $data);
    }

    public function get_usulan_rnd_by_id_req($id_req)
    {
        // Query the database to get the required data
        $this->db->select('ed_plus_rnd, keputusan_rnd');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();

        return $query->result_array();
    }
    function get_datatables($filters)
    {


        if (!empty($filters['filter_2'])) {
            $this->db->group_start()
                ->like('sloc', $filters['filter_2'])
                ->or_like('sloc_desc', $filters['filter_2'])
                ->group_end();
        }
        if (!empty($filters['filter_3'])) {
            $this->db->like('no_karantina', $filters['filter_3']);
        }
        if (!empty($filters['filter_4'])) {
            $this->db->like('status_kar', $filters['filter_4']);
        }
        if (!empty($filters['filter_5'])) {
            $this->db->like('progress', $filters['filter_5']);
        }
        if (!empty($filters['filter_6'])) {
            $this->db->like('zmasalah', $filters['filter_6']);
        }
        if (!empty($filters['filter_7'])) {
            $this->db->like('material', $filters['filter_7']);
        }
        if (!empty($filters['filter_8'])) {
            $this->db->like('desc', $filters['filter_8']);
        }
        // if (!empty($filters['filter_9'])) {
        //     $this->db->like('no_karantina', $filters['filter_9']);
        // }
        if (!empty($filters['filter_10'])) {
            $this->db->like('batch', $filters['filter_10']);
        }
        // if (!empty($filters['filter_11'])) {
        //     $this->db->like('nama_qc_label', $filters['filter_11']);
        // }

        if ($filters['progress'] == 'approval') {
            $this->db->where_in('progress', [
                'Approval Ka Unit',
                'Approval Koordinator'

            ]);
        } else if ($filters['progress'] == 'lab') {
            $this->db->where_in('progress', [
                'Pengiriman Ke Lab',
                'Administrasi Lab Analisa',
                'Approval Ka Unit Lab Analisa',
                'Sedang dianalisa Lab',
                'Input data analisa Lab',
                'Approval hasil analisa'
            ]);
        } else if ($filters['progress'] == 'rnd') {
            $this->db->where_in('progress', [
                'Approval RND',
                'Proses RND'
            ]);
        } else if ($filters['progress'] == 'selesai') {
            $this->db->where('progress', 'Karantina Selesai');
        }

        if (!empty($filters['filter_1'])) {
            $this->db->like('created_at', $filters['filter_1']);
        }

        if (!empty($filters['filter_tahun'])) {
            $this->db->where('YEAR(created_at)', $filters['filter_tahun']);
        }

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

    public function insert_identitas($data)
    {
        $this->db->insert('tb_analisa_request_sap', $data);
        return $this->db->insert_id();
    }

    public function insert_spec($data)
    {
        $this->db->insert_batch('tb_analisa_request_spec', $data);
    }
    public function get_data_by_ids($ids)
    {
        if (!is_array($ids)) {
            return [];
        }

        $this->db->where_in('id_req', $ids);
        $query = $this->db->get('tb_analisa_request_sap');

        return $query->result();
    }

    public function get_data_label($ids)
    {
        if (!is_array($ids)) {
            return [];
        }

        $this->db->where_in('id_req', $ids);
        $query = $this->db->get('tb_analisa_request_sap');

        return $query->result();
    }


    public function get_data_by_ids_label($ids)
    {
        $this->db->where_in('id_req', $ids);
        $query = $this->db->get('tb_analisa_request_sap');
        return $query->result_array();
    }

    public function check_penyelia_data($ids)
    {
        $this->db->select('id, penyelia'); // Menggunakan kolom 'id'
        $this->db->where_in('id_req', $ids);
        $this->db->where('cat_oprshrttxt', 'LAB'); // Tambahkan pengecekan untuk oprshrttxt
        $this->db->order_by('short_text', 'ASC');
        $this->db->from('view_analisa_full');
        $query = $this->db->get();

        $results = $query->result_array(); // Memastikan hasilnya selalu berupa array

        $invalidRows = [];

        foreach ($results as $index => $row) {
            if (empty($row['penyelia']) || $row['penyelia'] == '') {
                $invalidRows[] = $index + 1; // Menyimpan nomor baris (1-based index)
            }
        }

        if (!empty($invalidRows)) {
            return ['valid' => false, 'invalidRows' => $invalidRows];
        }

        return ['valid' => true];
    }


    public function get_data_memo_by_ids($ids)
    {
        if (!is_array($ids)) {
            return [];
        };
        // Membuat query untuk mengambil data berdasarkan IDs dari view
        $this->db->select('*');
        $this->db->from('view_analisa_request_sap_material');
        $this->db->where_in('id_req', $ids);

        $query = $this->db->get();
        return $query->result_array();
    }

    // Add the following method to your Analisa_request_model to fetch data by IDs
    public function update_progress($ids)
    {
        // Data yang akan diperbarui
        $data = array(
            'progress' => 'Approval Ka Unit Lab Analisa'
        );

        // Lakukan update berdasarkan ID yang diberikan
        $this->db->where_in('id_req', $ids);
        $this->db->update('tb_analisa_request_sap', $data);
    }


    public function save($data)
    {
        $this->db->insert('tb_karantina_request', $data);
        return $this->db->insert_id();
    }
    // Mengambil data info batch berdasarkan id_req
    public function get_info_batch($id_req)
    {
        $this->db->select('manuf_date, tgl_karantina, ed, qndat');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_data($id_request)
    {
        $this->db->from($this->table);
        $this->db->where('id_req', $id_request);
        $query = $this->db->get();

        return $query->row();
    }
    public function get_request_data_by_id($id_req)
    {
        $this->db->select('id_req, nama_qc, material, created_at,keputusan_rnd, desc, sloc, quantity, zmasalah, uom, jumlah_sample,jumlah_sample_rnd,sloc_desc, no_karantina, waktu_pengerjaan_qc, waktu_in_qc, waktu_out_qc,waktu_pengerjaan_lab, waktu_in_lab, waktu_out_lab,waktu_pengerjaan_rnd, waktu_in_rnd, waktu_out_rnd, satuan_waktu, total_waktu_pengerjaan');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $data = $query->row_array();

            // Query tambahan untuk mengambil dan menggabungkan oprshrttxt dari tb_analisa_request_spec
            $this->db->select('GROUP_CONCAT(DISTINCT oprshrttxt ORDER BY 
                CASE 
                    WHEN cat_oprshrttxt = "QC" THEN 1
                    WHEN cat_oprshrttxt = "LAB" THEN 2 
                    ELSE 3  
                END 
                SEPARATOR " - ") as info_distribusi');
            $this->db->from('tb_analisa_request_spec');
            $this->db->where('id_req', $id_req);
            $this->db->group_by('id_req');

            $sub_query = $this->db->get();

            if ($sub_query->num_rows() > 0) {
                $sub_data = $sub_query->row_array();
                $data['info_distribusi'] = $sub_data['info_distribusi'];
            } else {
                $data['info_distribusi'] = '';
            }

            return $data;
        } else {
            return false;
        }
    }



    public function update($where, $data)
    {
        $this->db->update('tb_karantina_request', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id_request)
    {
        $this->db->where('id_request', $id_request);
        $this->db->delete('tb_karantina_request');
    }

    public function get_analisa_lab_by_id($id_req)
    {
        $this->db->select('id, short_text, mstrchar, result,spec,valid, sample_ke');
        $this->db->from('tb_analisa_request_spec');
        $this->db->where('id_req', $id_req);
        $this->db->where('cat_oprshrttxt', 'LAB');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function check_indicator($id_req)
    {
        $this->db->where('id_req', $id_req);
        $this->db->where('cat_oprshrttxt', 'LAB');
        $query = $this->db->get('tb_analisa_request_spec');

        return $query->num_rows() > 0;
    }

    public function check_rnd_lab($id_req)
    {
        // Cek untuk LAB
        $this->db->where('id_req', $id_req);
        $this->db->where('cat_oprshrttxt', 'LAB');
        $query_lab = $this->db->get('tb_analisa_request_spec');
        $indicator_lab = $query_lab->num_rows() > 0;

        // Cek untuk RND
        $this->db->where('id_req', $id_req);
        $this->db->where('cat_oprshrttxt', 'RND');
        $query_rnd = $this->db->get('tb_analisa_request_spec');
        $indicator_rnd = $query_rnd->num_rows() > 0;

        // Kembalikan hasil kedua indikator
        return [
            'lab' => $indicator_lab,
            'rnd' => $indicator_rnd,
        ];
    }


    public function get_data_by_id($id_req)
    {
        // Query untuk mengambil data berdasarkan id_req
        $query = $this->db->get_where('tb_analisa_request_sap', array('id_req' => $id_req));

        // Mengembalikan hasil query sebagai objek tunggal
        return $query->row();
    }
    public function get_analisa_rnd_by_id($id_req)
    {
        $this->db->select('short_text, result,spec,valid');
        $this->db->from('tb_analisa_request_spec');
        $this->db->where('id_req', $id_req);
        $this->db->where('oprshrttxt', 'Lab Formulasi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_analisa_qc_id($id_req)
    {
        $this->db->select('short_text, result,spec,valid');
        $this->db->from('tb_analisa_request_spec');
        $this->db->where('id_req', $id_req);
        $this->db->like('oprshrttxt', 'QC', 'after'); // Menggunakan LIKE untuk mencocokkan string yang dimulai dengan 'QC'
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_request_sap($data)
    {
        // Dapatkan tahun dan bulan saat ini dalam format YYMM
        $current_date = date('ym');

        // Dapatkan sloc dari data yang diberikan
        $sloc = isset($data['sloc']) ? $data['sloc'] : 'default_sloc'; // Berikan nilai default jika sloc tidak ada

        // Ambil nomor permintaan terakhir untuk bulan ini dan sloc ini berdasarkan created_at
        $this->db->select('no_karantina, created_at');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('sloc', $sloc);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        // Tentukan nomor urut berikutnya
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $last_no_karantina = $row->no_karantina;
            $last_created_at = $row->created_at;

            // Periksa apakah bulan pada created_at sama dengan bulan saat ini
            if (date('ym', strtotime($last_created_at)) == $current_date) {
                $last_sequence = (int) substr($last_no_karantina, -4);
                $next_sequence = $last_sequence + 1;
            } else {
                // Jika bulan berbeda, mulai dari 1
                $next_sequence = 1;
            }
        } else {
            // Jika belum ada nomor permintaan untuk bulan ini dan sloc ini, mulai dari 1
            $next_sequence = 1;
        }

        // Format nomor permintaan baru dengan urutan yang sesuai
        $new_no_karantina = str_pad($next_sequence, 4, '0', STR_PAD_LEFT);

        // Hapus angka 0 di depan angka 5 pada data material
        if (isset($data['material'])) {
            $data['material'] = ltrim($data['material'], '0');
        }

        // Tambahkan nomor permintaan baru ke dalam data yang akan di-insert
        $data['jenis_req'] = 'Karantina';
        $data['progress'] = 'Approval Ka Unit';
        $data['no_karantina'] = $new_no_karantina;
        $data['created_at'] = date('Y-m-d H:i:s'); // Tambahkan created_at jika belum ada

        // Debugging output
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit; // Tambahkan exit untuk menghentikan eksekusi agar kita bisa melihat output

        // Lakukan insert ke database
        $this->db->insert('tb_analisa_request_sap', $data);
        $insert_id = $this->db->insert_id(); // Mengembalikan ID dari row yang baru diinsert

        // Log query
        // $insert_query = $this->db->last_query();
        // log_message('debug', 'Insert Query: ' . $insert_query);

        // Kembalikan insert_id dan no_karantina
        return array('insert_id' => $insert_id, 'no_karantina' => $new_no_karantina);
    }



    public function insert_request_old($data)
    {
        // Dapatkan tahun dan bulan saat ini dalam format YYMM
        $current_date = date('ym');

        // Ambil nomor permintaan terakhir untuk bulan ini
        $this->db->select('no_karantina');
        $this->db->from('tb_analisa_request_sap');
        $this->db->like('no_karantina', $current_date, 'after'); // Cari yang diawali dengan YYMM saat ini
        $this->db->order_by('no_karantina', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        // Tentukan nomor urut berikutnya
        if ($query->num_rows() > 0) {
            $last_no_karantina = $query->row()->no_karantina;
            $last_sequence = (int) substr($last_no_karantina, -4);
            $next_sequence = str_pad($last_sequence + 1, 4, '0', STR_PAD_LEFT);
        } else {
            // Jika belum ada nomor permintaan untuk bulan ini, mulai dari 0001
            $next_sequence = '0001';
        }

        // Format nomor permintaan baru
        $new_no_karantina = $current_date . $next_sequence;

        // Tambahkan nomor permintaan baru ke dalam data yang akan di-insert
        // $data['no_karantina'] = $new_no_karantina;

        // Lakukan insert ke database
        $this->db->insert('tb_analisa_request_sap', $data);
        $insert_id = $this->db->insert_id(); // Mengembalikan ID dari row yang baru diinsert

        // Kembalikan insert_id dan no_karantina
        return array('insert_id' => $insert_id, 'no_karantina' => $new_no_karantina);
    }

    public function insert_request_spec($data)
    {
        $this->db->insert_batch('tb_analisa_request_spec', $data);
    }

    public function get_labels_by_ids($ids)
    {
        // Gunakan `where_in` untuk array
        $this->db->where_in('id_req', $ids);
        $query = $this->db->get('view_analisa_request_sap'); // Ganti 'tb_analisa_request_sap' dengan nama tabel yang sesuai
        return $query->result();
    }

    public function insert_data($data)
    {
        $this->db->trans_start();

        // Insert data ke tabel tb_analisa_request_sap
        $request_data = array(
            'id_req' => $data['id_req'],
            'urgent' => $data['urgent'],
            'jenis_req' => $data['jenis_req'],
            'plant' => $data['plant'],
            'sloc' => $data['sloc'],
            'zyear' => $data['zyear'],
            'jenis_material' => $data['jenis_material'],
            'material' => $data['material'],
            'desc' => $data['desc'],
            'batch' => $data['batch'],
            'no_karantina' => $data['no_karantina'],
            'batch_lapangan' => $data['batch_lapangan'],
            'manuf_date' => $data['manuf_date'],
            'ed' => $data['ed'],
            'uji_ulang' => $data['uji_ulang'],
            'tgl_karantina' => $data['tgl_karantina'],
            'zmasalah' => $data['zmasalah'],
            'desc_mslh' => $data['desc_mslh'],
            'nama_qc' => $data['nama_qc'],
            'nama_ka' => $data['nama_ka'],
            'nama_koor' => $data['nama_koor'],
            'dqc' => $data['dqc'],
            'dlab' => $data['dlab'],
            'drnd' => $data['drnd'],
            'zind' => $data['zind'],
            'status_kar' => $data['status_kar'],
            'progress' => $data['progress'],
            'insplot' => $data['insplot'],
            'order' => $data['order'],
            'matdoc' => $data['matdoc'],
            'matyears' => $data['matyears'],
            'ztransaksi' => $data['ztransaksi'],
            'quantity' => $data['quantity'],
            'uom' => $data['uom'],
            'reff' => $data['reff'],
            'spec' => json_encode($data['spec'])
        );

        $this->db->insert('tb_analisa_request_sap', $request_data);
        $request_id = $this->db->insert_id();

        // Insert data ke tabel tb_analisa_request_spec
        if (isset($data['spec']) && is_array($data['spec'])) {
            foreach ($data['spec'] as $spec) {
                $spec_data = array(
                    'id_req' => $request_id,
                    'oprshrttxt' => $spec['oprshrttxt'],
                    'mstrchar' => $spec['mstrchar'],
                    'short_text' => $spec['short_text'],
                    'spec' => $spec['spec'],
                    'result' => $spec['result'],
                    'manual_add' => $spec['manual_add'] ? 1 : 0,
                    'valid' => isset($spec['valid']) ? $spec['valid'] : null
                );

                $this->db->insert('tb_analisa_request_spec', $spec_data);
            }
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function get_all_identitas()
    {
        return $this->db->get('dummy_identitas')->result_array();
    }

    public function get_spec_by_id_kar($id_kar)
    {
        return $this->db->get_where('dummy_spec', array('id_kar' => $id_kar))->result_array();
    }

    public function get_all_analisa_request()
    {
        // Pilih kolom yang akan diambil
        $this->db->select('id, id_kar, id_req, month, years, plant, sloc, sloc_desc, zyear, jenis_material, material, zbentuk, desc, batch, kode_proses_produksi, karantina_ke, no_karantina, nomor_registrasi_lab, memo, memo_lab, label_lab, attachment_lab, admin_lab, analis_lab, batch_lapangan, manuf_date, ed, ed_plus, ed_next, uji_ulang, tgl_karantina, zmasalah, desc_mslh, nama_qc, nama_koor, nama_ka, dqc, dlab, drnd, zind, status_kar, progress, progress_rnd, insplot, `order`, matdoc, matyears, ztransaksi, quantity, uom, jumlah_sample, jumlah_sample_rnd, reff, created_at, done_lab_at, done_rnd_at');

        // Dari tabel tb_analisa_request_sap
        $query = $this->db->get('tb_analisa_request_sap');

        // Kembalikan hasil query sebagai array
        return $query->result_array();
    }

    public function get_spec_by_id_req($id)
    {
        // Ambil data dari tabel tb_analisa_request_spec berdasarkan id_req
        $this->db->select('oprshrttxt, sample_ke, mstrchar, short_text, spec, result, manual_add, valid');
        $this->db->from('tb_analisa_request_spec');
        $this->db->where('id_req', $id);
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan array data dari tb_analisa_request_spec
    }

    public function get_all_data()
    {
        $this->db->order_by('id', 'DESC'); // Mengurutkan berdasarkan kolom 'id' secara menurun
        $query = $this->db->get('tb_analisa_request_sap');
        $data = $query->result_array();

        // Iterasi setiap item di $data untuk mendapatkan data tambahan dari tb_analisa_request_spec
        foreach ($data as &$item) {
            // Query untuk mendapatkan data dari tb_analisa_request_spec berdasarkan id_kar = id
            $this->db->select('*');
            $this->db->from('tb_analisa_request_spec');
            $this->db->where('id_kar', $item['id_kar']);
            $querySpec = $this->db->get();

            // Menambahkan hasil query spec ke dalam key 'spec' di item saat ini
            $item['spec'] = $querySpec->result_array();
        }

        // Mengembalikan data dalam format JSON
        echo json_encode([
            'status' => 'success',
            'data' => $data
        ], JSON_UNESCAPED_SLASHES);
    }

    public function get_data_sap_by_id_req($id_req)
    {
        // Pilih kolom tertentu dari tb_analisa_request_sap berdasarkan id_req
        $this->db->select('plant, id_kar, month, years, id_req, ed_plus, ed_next, status_kar,keputusan_qc,kesimpulan_qc');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get('tb_analisa_request_sap');
        return $query->row_array(); // Mengembalikan satu baris sebagai array
    }
    public function get_data_spec_by_id_req($id_req)
    {
        // Pilih kolom dengan alias pada kolom result untuk menjadi zresult
        $this->db->select('tb_analisa_request_sap.plant, tb_analisa_request_spec.id_kar, tb_analisa_request_sap.month, tb_analisa_request_sap.years, 
                           tb_analisa_request_spec.sample_ke, tb_analisa_request_spec.oprshrttxt, tb_analisa_request_spec.mstrchar, 
                           tb_analisa_request_spec.short_text, tb_analisa_request_spec.spec, tb_analisa_request_spec.result AS zresult, 
                           tb_analisa_request_spec.manual_add, tb_analisa_request_spec.valid');

        // Join tabel tb_analisa_request_spec dengan tb_analisa_request_sap untuk mendapatkan plant dan month
        $this->db->from('tb_analisa_request_spec');
        $this->db->join('tb_analisa_request_sap', 'tb_analisa_request_sap.id_req = tb_analisa_request_spec.id_req', 'left');

        // Filter data berdasarkan id_req
        $this->db->where('tb_analisa_request_spec.id_req', $id_req);

        // Eksekusi query
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan hasil sebagai array
    }


    public function get_data_by_id_req($id_req)
    {
        // Query untuk mengambil data dari tabel analisa_request berdasarkan id_req
        $this->db->select('*');
        $this->db->from('tb_analisa_request_sap');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();

        // Mengembalikan data jika ditemukan, jika tidak return null
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengambil satu baris data
        } else {
            return null; // Jika tidak ditemukan
        }
    }

    // Method untuk mengambil data spec berdasarkan id_req
    public function get_data_spec($id_req)
    {
        // Query untuk mengambil data dari tabel analisa_request_spec berdasarkan id_req
        $this->db->select('oprshrttxt, mstrchar, short_text, spec, result, manual_add, valid');
        $this->db->from('tb_analisa_request_spec');
        $this->db->where('id_req', $id_req);
        $query = $this->db->get();

        // Mengembalikan data spec sebagai array jika ditemukan
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Mengambil beberapa baris data dan mengembalikannya sebagai array
        } else {
            return []; // Jika tidak ada data, kembalikan array kosong
        }
    }
}
