<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model("map_model");
    }

    public function index()
    {
        $data['title'] = 'Form Map';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['map'] = $this->db->get('tes_map')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('map/form_tabelmap', $data);
        $this->load->view('templates/footer');
    }

    public function tambahMap()
    {

        $data['title'] = 'Map';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['prov'] = $this->db->get('provinsi')->result_array();
        $data['kategori'] = ['Semua Kalangan', 'Dewasa', 'Anak-anak'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('prov', 'Provinsi', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('ktg', 'Kategori', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('map/form_add', $data);
            $this->load->view('templates/footer');
        } else {
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $ket = $this->input->post('keterangan');
            $prov = $this->input->post('prov');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $ktg = $this->input->post('ktg');
            $stts = 'buka';

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/wisata/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('keterangan', $ket);
            $this->db->set('id_prov', $prov);
            $this->db->set('id_kab', $kab);
            $this->db->set('id_kec', $kec);
            $this->db->set('kategori', $ktg);
            $this->db->set('status', $stts);
            $this->db->insert('tes_map');
            $this->session->set_flashdata('success', 'Berhasil di tambahkan!');
            redirect('map');
        }
    }

    public function ubahMap($id)
    {

        $data['title'] = 'Ubah Map';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['map'] = $this->map_model->getMapById($id);
        $data['prov'] = $this->db->get('provinsi')->result_array();
        $data['kategori'] = ['Semua Kalangan', 'Dewasa', 'Anak-anak'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('prov', 'Provinsi', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('ktg', 'Kategori', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('map/form_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $ket = $this->input->post('keterangan');
            $prov = $this->input->post('prov');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $ktg = $this->input->post('ktg');
            $stts = 'buka';

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/wisata/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['map']['image'];
                    unlink(FCPATH . 'assets/img/wisata/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('keterangan', $ket);
            $this->db->set('id_prov', $prov);
            $this->db->set('id_kab', $kab);
            $this->db->set('id_kec', $kec);
            $this->db->set('kategori', $ktg);
            $this->db->set('status', $stts);
            $this->db->where('id', $id);
            $this->db->update('tes_map');

            $this->session->set_flashdata('success', 'Data berhasil diubah!');
            redirect('map');
        }
    }

    public function hapusMap($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tes_map');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/wisata/' . $row->image);

        $this->map_model->hapusmap($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('map');
    }

    function get_kabupaten()
    {
        $id = $this->input->post('id');
        $data = $this->map_model->get_kabupaten($id);
        echo json_encode($data);
    }

    function get_kecamatan()
    {
        $id = $this->input->post('id');
        $data = $this->map_model->get_kecamatan($id);
        echo json_encode($data);
    }

    function get_ubah_kabupaten()
    {
        $id_prov = $this->input->post('id');
        $data = $this->map_model->get_ubah_kabupaten($id_prov)->result();
        echo json_encode($data);
    }

    function get_ubah_kecamatan()
    {
        $id_kab = $this->input->post('id');
        $data = $this->map_model->get_ubah_kecamatan($id_kab)->result();
        echo json_encode($data);
    }

    function get_data_edit()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->map_model->get_map_by_id($id)->result();
        echo json_encode($data);
    }
}
