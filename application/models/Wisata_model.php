<?php defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_model extends CI_Model
{
    public function getWisata()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getWisataHome($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function pencarianWisata($keyword)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->like('nm_wisata', $keyword);
        $this->db->or_like('nama_kab', $keyword);
        $this->db->or_like('nama_kec', $keyword);
        $this->db->or_like('kategori', $keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dataWisataHome($id)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where('id_wisata', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function showGambar($id)
    {
        return $this->db->get_where('show_image_w', ['id_wisata' => $id])->result_array();
    }

    public function getWisataById($id)
    {
        return $this->db->get_where('wisata', ['id_wisata' => $id])->row_array();
    }

    function get_wisata_by_id($id) //javascript
    {
        $query = $this->db->get_where('wisata', array('id_wisata' =>  $id));
        return $query;
    }

    public function hapusWisata($id)
    {
        $this->db->delete('wisata', ['id_wisata' => $id]);
    }

    public function hapusGambarWisata($id)
    {
        $this->db->delete('show_image_w', ['id' => $id]);
    }

    public function ubahEvent($id)
    {
        $data = [
            "event" => $this->input->post('event'),
            "ket_event" => $this->input->post('keterangan')
        ];

        $this->db->where('id_wisata', $id);
        $this->db->update('wisata', $data);
    }

    public function ubahStatus($id)
    {
        $data = [
            "status" => $this->input->post('status'),
            "ket_status" => $this->input->post('keterangan')
        ];

        $this->db->where('id_wisata', $id);
        $this->db->update('wisata', $data);
    }

    public function getLapWisata($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllWisataEvent()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where('event', 'Ada');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLapEventWisata($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where_in('event', 'Ada');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllWisataTutup()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where('status', 'Tutup');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLaptWisataTutup($idk, $idkc)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('user', 'user.id=wisata.id_user');
        $this->db->join('kabupaten', 'kabupaten.id_kab=wisata.w_id_kab');
        $this->db->join('kecamatan', 'kecamatan.id_kec=wisata.w_id_kec');
        $this->db->where_in('status', 'Tutup');
        $this->db->where_in('w_id_kab', $idk);
        $this->db->where_in('w_id_kec', $idkc);
        $query = $this->db->get();
        return $query->result_array();
    }
}
