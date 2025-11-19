<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "berita";

    public $id;
    public $nama;
    public $isi;
    public $kategori;



    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function simpan_barang($nama, $isi, $kategori)
    {
        $hasil = $this->db->query("INSERT INTO berita (nama_berita,isi_berita,kategori) VALUES ('$nama','$isi','$kategori')");
        return $hasil;
    }

    public function save()
    {

        $post = $this->input->post();
        $this->id = uniqid();
        $this->nama_berita = $post["nama"];
        $this->isi_berita = $post["isi"];
        $this->kategori = $post["kategori"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nama_berita = $post["nama"];
        $this->isi_berita = $post["isi"];
        $this->kategori = $post["kategori"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id' => $id));
    }
}
