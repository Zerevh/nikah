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
}