<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mall_model extends CI_Model
{
    public function getMall()
    {
        $this->db->select('*');
        $this->db->from('mall');
        $this->db->join('user', 'user.id=mall.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=mall.m_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=mall.m_id_kec');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMallHome($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('mall');
        $this->db->join('user', 'user.id=mall.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=mall.m_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=mall.m_id_kec');
        $this->db->order_by('id_mall', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pencarianMall($keyword)
    {
        $this->db->select('*');
        $this->db->from('mall');
        $this->db->join('user', 'user.id=mall.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=mall.m_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=mall.m_id_kec');
        $this->db->order_by('id_mall', 'DESC');
        $this->db->like('nm_mall', $keyword);
        $this->db->or_like('nama_kab', $keyword);
        $this->db->or_like('nama_kec', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataMallHome($id)
    {
        $this->db->select('*');
        $this->db->from('mall');
        $this->db->join('user', 'user.id=mall.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=mall.m_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=mall.m_id_kec');
        $this->db->where('id_mall', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function showGambar($id)
    {
        return $this->db->get_where('show_image_m', ['id_mall' => $id])->result_array();
    }

    public function getMallById($id)
    {
        return $this->db->get_where('mall', ['id_mall' => $id])->row_array();
    }

    function get_mall_by_id($id)
    {
        $query = $this->db->get_where('mall', array('id_mall' =>  $id));
        return $query;
    }

    public function hapusMall($id)
    {
        $this->db->delete('mall', ['id_mall' => $id]);
    }

    public function hapusGambarMall($id)
    {
        $this->db->delete('show_image_m', ['id' => $id]);
    }

    public function getLapMall($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('mall');
        $this->db->join('user', 'user.id=mall.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=mall.m_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=mall.m_id_kec');
        $this->db->where_in('m_id_kab', $idk);
        $this->db->where_in('m_id_kec', $idkc);

        $query = $this->db->get();
        return $query->result_array();
    }
}
