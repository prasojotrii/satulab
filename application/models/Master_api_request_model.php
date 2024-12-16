<?php
class Master_api_request_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        return $this->db->get('tb_karantina_request')->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('no_karantina', $id);
        return $this->db->get('tb_karantina_request')->row();
    }

    public function add($data)
    {
        return $this->db->insert('tb_karantina_request', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('no_karantina', $id);
        return $this->db->update('tb_karantina_request', $data);
    }

    public function delete($id)
    {
        $this->db->where('no_karantina', $id);
        return $this->db->delete('tb_karantina_request');
    }


    public function delete_record($no_karantina)
    {
        // Terjemahkan parameter menjadi kondisi query
        $this->db->where('no_karantina', $no_karantina);
        return $this->db->delete('tb_karantina_request'); // Ganti 'your_table_name' dengan nama tabel yang sesuai
    }
}
