<?php defined('BASEPATH') or exit('No direct script access allowed');

class setWeeding_model extends CI_Model
{
    public function getweeding()
    {
        $this->db->select('*');
        $this->db->from('tb_weeding');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_data($data) {
        // Validasi tipe data
        if (!is_array($data) || empty($data)) {
            return false;
        }
        return $this->db->insert('tb_weeding', $data);
    }

    public function edit_data($id_wdg, $data) {
        if ( empty($id_wdg) ||!is_array($data) || empty($data)) {
            return false;
        }
        $this->db->where('id_wdg', $id_wdg);
        return $this->db->update('tb_weeding', $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_weeding', ['id_wdg' => $id]);
    }

    public function getTemplateById($id)
    {
        return $this->db->get_where('tb_weeding', ['id_wdg' => $id])->row_array();
    }
}