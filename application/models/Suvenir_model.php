<?php defined('BASEPATH') or exit('No direct script access allowed');

class Suvenir_model extends CI_Model
{
    public function getSuvenir()
    {
        $this->db->select('*');
        $this->db->from('suvenir');
        $this->db->join('user', 'user.id=suvenir.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=suvenir.s_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=suvenir.s_id_kec');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSuvenirHome($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('suvenir');
        $this->db->join('user', 'user.id=suvenir.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=suvenir.s_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=suvenir.s_id_kec');
        $this->db->order_by('id_tksuvenir', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pencarianSuvenir($keyword)
    {
        $this->db->select('*');
        $this->db->from('suvenir');
        $this->db->join('user', 'user.id=suvenir.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=suvenir.s_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=suvenir.s_id_kec');
        $this->db->order_by('id_tksuvenir', 'DESC');
        $this->db->like('nm_tksuvenir', $keyword);
        $this->db->or_like('nama_kab', $keyword);
        $this->db->or_like('nama_kec', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataSuvenirHome($id)
    {
        $this->db->select('*');
        $this->db->from('suvenir');
        $this->db->join('user', 'user.id=suvenir.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=suvenir.s_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=suvenir.s_id_kec');
        $this->db->where('id_tksuvenir', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function showGambar($id)
    {
        return $this->db->get_where('show_image_s', ['id_tksuvenir' => $id])->result_array();
    }

    public function getSuvenirById($id)
    {
        return $this->db->get_where('suvenir', ['id_tksuvenir' => $id])->row_array();
    }

    function get_suvenir_by_id($id)
    {
        $query = $this->db->get_where('suvenir', array('id_tksuvenir' =>  $id));
        return $query;
    }

    public function hapusSuvenir($id)
    {
        $this->db->delete('suvenir', ['id_tksuvenir' => $id]);
    }

    public function hapusGambarSuvenir($id)
    {
        $this->db->delete('show_image_s', ['id' => $id]);
    }

    public function getLapSuvenir($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('suvenir');
        $this->db->join('user', 'user.id=suvenir.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=suvenir.s_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=suvenir.s_id_kec');
        $this->db->where_in('s_id_kab', $idk);
        $this->db->where_in('s_id_kec', $idkc);

        $query = $this->db->get();
        return $query->result_array();
    }
}
