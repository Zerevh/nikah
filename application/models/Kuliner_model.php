<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kuliner_model extends CI_Model
{
    public function getKuliner()
    {
        $this->db->select('*');
        $this->db->from('kuliner');
        $this->db->join('user', 'user.id=kuliner.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=kuliner.k_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=kuliner.k_id_kec');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKulinerHome($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('kuliner');
        $this->db->join('user', 'user.id=kuliner.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=kuliner.k_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=kuliner.k_id_kec');
        $this->db->order_by('id_kuliner', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pencarianKuliner($keyword)
    {
        $this->db->select('*');
        $this->db->from('kuliner');
        $this->db->join('user', 'user.id=kuliner.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=kuliner.k_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=kuliner.k_id_kec');
        $this->db->order_by('id_kuliner', 'DESC');
        $this->db->like('nm_kuliner', $keyword);
        $this->db->or_like('nama_kab', $keyword);
        $this->db->or_like('nama_kec', $keyword);
        $this->db->or_like('kategori', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataKulinerHome($id)
    {
        $this->db->select('*');
        $this->db->from('kuliner');
        $this->db->join('user', 'user.id=kuliner.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=kuliner.k_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=kuliner.k_id_kec');
        $this->db->where('id_kuliner', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function showGambar($id)
    {
        return $this->db->get_where('show_image_k', ['id_kuliner' => $id])->result_array();
    }

    public function getKulinerById($id)
    {
        return $this->db->get_where('kuliner', ['id_kuliner' => $id])->row_array();
    }

    function get_kuliner_by_id($id)
    {
        $query = $this->db->get_where('kuliner', array('id_kuliner' =>  $id));
        return $query;
    }

    public function hapusKuliner($id)
    {
        $this->db->delete('kuliner', ['id_kuliner' => $id]);
    }

    public function hapusGambarKuliner($id)
    {
        $this->db->delete('show_image_k', ['id' => $id]);
    }

    public function getLapKuliner($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('kuliner');
        $this->db->join('user', 'user.id=kuliner.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=kuliner.k_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=kuliner.k_id_kec');
        $this->db->where_in('k_id_kab', $idk);
        $this->db->where_in('k_id_kec', $idkc);

        $query = $this->db->get();
        return $query->result_array();
    }
}
