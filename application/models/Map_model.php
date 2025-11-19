<?php defined('BASEPATH') or exit('No direct script access allowed');

class Map_model extends CI_Model
{

    public function getMapById($id)
    {
        return $this->db->get_where('tes_map', ['id' => $id])->row_array();
    }

    public function tambahMap()
    {
        $data = [
            "latitude" => $this->input->post('latInput', true),
            "longitude" => $this->input->post('lngInput', true),
            "keterangan" => $this->input->post('keterangan', true),
            "id_prov" => $this->input->post('prov', true),
            "id_kab" => $this->input->post('kab', true),
            "id_kec" => $this->input->post('kec', true),
            "kategori" => $this->input->post('ktg', true),
            "status" => 'Buka'
        ];

        $this->db->insert('tes_map', $data);
    }

    public function ubahMap($id)
    {
        $data = [
            "latitude" => $this->input->post('latInput'),
            "longitude" => $this->input->post('lngInput'),
            "keterangan" => $this->input->post('keterangan'),
            "id_prov" => $this->input->post('prov'),
            "id_kab" => $this->input->post('kab'),
            "id_kec" => $this->input->post('kec'),
            "kategori" => $this->input->post('ktg')
        ];

        $this->db->where('id', $id);
        $this->db->update('tes_map', $data);
    }

    public function hapusMap($id)
    {
        $this->db->delete('tes_map', ['id' => $id]);
    }

    function get_kabupaten($id)
    {
        $hasil = $this->db->query("SELECT * FROM kabupaten WHERE kab_id_prov='$id'");
        return $hasil->result();
    }

    function get_kecamatan($id)
    {
        $hasil = $this->db->query("SELECT * FROM kecamatan WHERE kec_id_kab='$id'");
        return $hasil->result();
    }


    function get_ubah_kabupaten($id_prov)
    {
        $query = $this->db->get_where('kabupaten', array('kab_id_prov' => $id_prov));
        return $query;
    }
    function get_ubah_kecamatan($id_kab)
    {
        $query = $this->db->get_where('kecamatan', array('kec_id_kab' => $id_kab));
        return $query;
    }

    function get_map_by_id($id)
    {
        $query = $this->db->get_where('tes_map', array('id' =>  $id));
        return $query;
    }
}
