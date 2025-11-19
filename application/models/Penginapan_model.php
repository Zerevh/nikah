<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penginapan_model extends CI_Model
{
    public function getPenginapan()
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPenginapanHome($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->order_by('id_penginapan', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pencarianPenginapan($keyword)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->order_by('id_penginapan', 'DESC');
        $this->db->like('nm_penginapan', $keyword);
        $this->db->or_like('nama_kab', $keyword);
        $this->db->or_like('nama_kec', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataPenginapanHome($id)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->where('id_penginapan', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function showGambar($id)
    {
        return $this->db->get_where('show_image_pe', ['id_penginapan' => $id])->result_array();
    }

    public function getPenginapanById($id)
    {
        return $this->db->get_where('penginapan', ['id_penginapan' => $id])->row_array();
    }

    function get_penginapan_by_id($id)
    {
        $query = $this->db->get_where('penginapan', array('id_penginapan' =>  $id));
        return $query;
    }

    public function hapusPenginapan($id)
    {
        $this->db->delete('penginapan', ['id_penginapan' => $id]);
    }

    public function hapusGambarPenginapan($id)
    {
        $this->db->delete('show_image_pe', ['id' => $id]);
    }

    public function getLapPenginapan($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('penginapan');
        $this->db->join('user', 'user.id=penginapan.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=penginapan.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=penginapan.p_id_kec');
        $this->db->where_in('p_id_kab', $idk);
        $this->db->where_in('p_id_kec', $idkc);
        $query = $this->db->get();
        return $query->result_array();
    }
}
