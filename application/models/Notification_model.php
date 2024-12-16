<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notification_model extends CI_Model
{

    public function get_pending_notifications()
    {
        $this->db->where('status', 'pending');
        return $this->db->get('sys_notifications')->result();
    }

    public function get_template($template_id)
    {
        return $this->db->get_where('sys_notification_templates', ['id' => $template_id])->row();
    }

    public function get_template_by_name($template_name)
    {
        return $this->db->get_where('sys_notification_templates', ['template_name' => $template_name])->row();
    }

    public function create_rejection_notification($pernr, $template_id, $kesimpulan)
    {
        $data = [
            'pernr' => $pernr, // Menggunakan pernr sebagai pengidentifikasi
            'template_id' => $template_id,
            'status' => 'pending',
            'kesimpulan' => $kesimpulan, // Simpan kesimpulan jika perlu
        ];
        return $this->db->insert('sys_notifications', $data);
    }

    public function update_notification_status($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('sys_notifications', ['status' => $status, 'sent_at' => date('Y-m-d H:i:s')]);
    }
}
