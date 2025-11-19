<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pasar_model extends CI_Model
{
    public function getPasar()
    {
        $this->db->select('*');
        $this->db->from('pasar');
        $this->db->join('user', 'user.id=pasar.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=pasar.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=pasar.p_id_kec');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPasarHome($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('pasar');
        $this->db->join('user', 'user.id=pasar.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=pasar.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=pasar.p_id_kec');
        $this->db->order_by('id_pasar', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pencarianPasar($keyword)
    {
        $this->db->select('*');
        $this->db->from('pasar');
        $this->db->join('user', 'user.id=pasar.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=pasar.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=pasar.p_id_kec');
        $this->db->order_by('id_pasar', 'DESC');
        $this->db->like('nm_pasar', $keyword);
        $this->db->or_like('nama_kab', $keyword);
        $this->db->or_like('nama_kec', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataPasarHome($id)
    {
        $this->db->select('*');
        $this->db->from('pasar');
        $this->db->join('user', 'user.id=pasar.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=pasar.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=pasar.p_id_kec');
        $this->db->where('id_pasar', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function showGambar($id)
    {
        return $this->db->get_where('show_image_p', ['id_pasar' => $id])->result_array();
    }

    public function getPasarById($id)
    {
        return $this->db->get_where('pasar', ['id_pasar' => $id])->row_array();
    }

    function get_pasar_by_id($id)
    {
        $query = $this->db->get_where('pasar', array('id_pasar' =>  $id));
        return $query;
    }

    public function hapusPasar($id)
    {
        $this->db->delete('pasar', ['id_pasar' => $id]);
    }

    public function hapusGambarPasar($id)
    {
        $this->db->delete('show_image_p', ['id' => $id]);
    }

    public function getLapPasar($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('pasar');
        $this->db->join('user', 'user.id=pasar.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=pasar.p_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=pasar.p_id_kec');
        $this->db->where_in('p_id_kab', $idk);
        $this->db->where_in('p_id_kec', $idkc);

        $query = $this->db->get();
        return $query->result_array();
    }
}
