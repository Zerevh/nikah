<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model("wilayah_model");
        $this->load->model("wisata_model");
        $this->load->model("kuliner_model");
        $this->load->model("pasar_model");
        $this->load->model("penginapan_model");
        $this->load->model("mall_model");
        $this->load->model("suvenir_model");
    }

    //Data wisata-------------------------------------------------------------------------------------------------
    public function dataWisata()
    {
        $data['title'] = 'Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['wisata'] = $this->wisata_model->getWisata();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wisata/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function tambahWisata()
    {

        $data['title'] = 'Tambah Data Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = ['Alam', 'Buatan', 'Sejarah dan Budaya'];
        $data['kalangan'] = ['Semua Kalangan', 'Dewasa', 'Anak-anak'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmwisata', 'Nama Wisata', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kalangan', 'Kalangan', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wisata/form_add', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $data['user']['id'];
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmwisata = $this->input->post('nmwisata');
            $ktg = $this->input->post('kategori');
            $klgn = $this->input->post('kalangan');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');
            $stts = 'Buka';
            $ket_stts = '-';
            $event = 'Tidak Ada';
            $ket_event = '-';

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/wisata/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('w_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id_user', $id_user);
            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_wisata', $nmwisata);
            $this->db->set('kategori', $ktg);
            $this->db->set('kalangan', $klgn);
            $this->db->set('w_id_kab', $kab);
            $this->db->set('w_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket_wisata', $ket);
            $this->db->set('status', $stts);
            $this->db->set('ket_status', $ket_stts);
            $this->db->set('event', $event);
            $this->db->set('ket_event', $ket_event);

            $this->db->insert('wisata');
            $this->session->set_flashdata('success', 'Wisata berhasil di tambahkan!');
            redirect('data/datawisata');
        }
    }

    public function ubahWisata($id)
    {
        $data['title'] = 'Ubah Data Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['wisata'] = $this->wisata_model->getWisataById($id);
        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = ['Alam', 'Buatan', 'Sejarah dan Budaya'];
        $data['kalangan'] = ['Semua Kalangan', 'Dewasa', 'Anak-anak'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmwisata', 'Nama Wisata', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kalangan', 'Kalangan', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wisata/form_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmwisata = $this->input->post('nmwisata');
            $ktg = $this->input->post('kategori');
            $klgn = $this->input->post('kalangan');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/wisata/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['wisata']['w_image'];
                    unlink(FCPATH . 'assets/img/wisata/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('w_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_wisata', $nmwisata);
            $this->db->set('kategori', $ktg);
            $this->db->set('kategori', $ktg);
            $this->db->set('kalangan', $klgn);
            $this->db->set('w_id_kab', $kab);
            $this->db->set('w_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket_wisata', $ket);

            $this->db->where('id_wisata', $id);
            $this->db->update('wisata');
            $this->session->set_flashdata('success', 'Data wisata berhasil diubah!');
            redirect('data/datawisata');
        }
    }

    function get_data_edit_wisata()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->wisata_model->get_wisata_by_id($id)->result();
        echo json_encode($data);
    }

    public function hapusWisata($id)
    {
        $this->db->where('id_wisata', $id);
        $query = $this->db->get('wisata');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/wisata/' . $row->w_image);

        $this->wisata_model->hapuswisata($id);
        $this->session->set_flashdata('success', 'Data wisata berhasil dihapus!');
        redirect('data/datawisata');
    }

    public function tambahGambarWisata($id)
    {
        $data['title'] = 'Tambah Gambar Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['gambar'] = $this->wisata_model->showGambar($id);
        $data['id'] =   $id;

        $this->form_validation->set_rules('idwisata', 'ID Wisata', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wisata/form_gambar', $data);
            $this->load->view('templates/footer');
        } else {
            $idwisata = $this->input->post('idwisata');

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/showgambar/wisata/';


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('wisata/form_gambar', $error, $data);
                $this->load->view('templates/footer');
            } else {
                $new_image = $this->upload->data('file_name');
                $this->db->set('sw_image', $new_image);
                $this->db->set('id_wisata', $idwisata);

                $this->db->insert('show_image_w');
                $this->session->set_flashdata('success', 'Gambar berhasil di tambahkan!');
                redirect(base_url() . "data/tambahgambarwisata/" . $id);
            }
        }
    }

    public function hapusGambarWisata($id, $idw)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('show_image_w');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/showgambar/wisata/' . $row->sw_image);

        $this->wisata_model->hapusGambarWisata($id);
        $this->session->set_flashdata('success', 'Gambar wisata berhasil dihapus!');
        redirect(base_url() . "data/tambahgambarwisata/" . $idw);
    }

    public function event($id)
    {
        $data['title'] = 'Event Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['wisata'] = $this->wisata_model->getWisataById($id);
        $data['event'] = ['Ada', 'Tidak Ada'];

        $this->form_validation->set_rules('event', 'Status Event', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wisata/event', $data);
            $this->load->view('templates/footer');
        } else {
            $this->wisata_model->ubahevent($id);
            $this->session->set_flashdata('success', 'Status event telah diubah!');
            redirect('data/datawisata');
        }
    }

    public function status($id)
    {
        $data['title'] = 'Status Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['wisata'] = $this->wisata_model->getWisataById($id);
        $data['status'] = ['Buka', 'Tutup'];

        $this->form_validation->set_rules('status', 'Status wisata', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wisata/status', $data);
            $this->load->view('templates/footer');
        } else {
            $this->wisata_model->ubahstatus($id);
            $this->session->set_flashdata('success', 'Status Wisata telah diubah!');
            redirect('data/datawisata');
        }
    }
    //Akhir fungtion data wisata

    //Data Kuliner

    public function datakuliner()
    {
        $data['title'] = 'Kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kuliner'] = $this->kuliner_model->getKuliner();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kuliner/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function tambahKuliner()
    {
        $data['title'] = 'Tambah Data Kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = ['Lokal', 'Japanese Food', 'Korean Food', 'Sea Food'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmkuliner', 'Nama Kuliner', 'required');
        $this->form_validation->set_rules('nmtoko', 'Nama Toko', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kuliner/form_add', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $data['user']['id'];
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmkuliner = $this->input->post('nmkuliner');
            $nmtoko = $this->input->post('nmtoko');
            $ktg = $this->input->post('kategori');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/kuliner/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('k_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id_user', $id_user);
            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_kuliner', $nmkuliner);
            $this->db->set('nm_toko', $nmtoko);
            $this->db->set('kategori', $ktg);
            $this->db->set('k_id_kab', $kab);
            $this->db->set('k_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->insert('kuliner');
            $this->session->set_flashdata('success', 'Kuliner berhasil di tambahkan!');
            redirect('data/datakuliner');
        }
    }

    public function ubahKuliner($id)
    {
        $data['title'] = 'Ubah Data Kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kuliner'] = $this->kuliner_model->getKulinerById($id);
        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = ['Lokal', 'Japanese Food', 'Korean Food', 'Sea Food'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmkuliner', 'Nama Kuliner', 'required');
        $this->form_validation->set_rules('nmtoko', 'Nama Toko', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kuliner/form_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmkuliner = $this->input->post('nmkuliner');
            $nmtoko = $this->input->post('nmtoko');
            $ktg = $this->input->post('kategori');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/kuliner/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['kuliner']['k_image'];
                    unlink(FCPATH . 'assets/img/kuliner/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('k_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_kuliner', $nmkuliner);
            $this->db->set('nm_toko', $nmtoko);
            $this->db->set('kategori', $ktg);
            $this->db->set('k_id_kab', $kab);
            $this->db->set('k_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->where('id_kuliner', $id);
            $this->db->update('kuliner');
            $this->session->set_flashdata('success', 'Data kuliner berhasil diubah!');
            redirect('data/datakuliner');
        }
    }

    function get_data_edit_kuliner()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->kuliner_model->get_kuliner_by_id($id)->result();
        echo json_encode($data);
    }

    public function hapusKuliner($id)
    {
        $this->db->where('id_kuliner', $id);
        $query = $this->db->get('kuliner');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/kuliner/' . $row->k_image);

        $this->kuliner_model->hapusKuliner($id);
        $this->session->set_flashdata('success', 'Data kuliner berhasil dihapus!');
        redirect('data/datakuliner');
    }

    public function tambahGambarKuliner($id)
    {
        $data['title'] = 'Tambah Gambar Kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['gambar'] = $this->kuliner_model->showGambar($id);
        $data['id'] =   $id;

        $this->form_validation->set_rules('idkuliner', 'ID Kuliner', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kuliner/form_gambar', $data);
            $this->load->view('templates/footer');
        } else {
            $idkuliner = $this->input->post('idkuliner');

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/showgambar/kuliner/';


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('kuliner/form_gambar', $error, $data);
                $this->load->view('templates/footer');
            } else {
                $new_image = $this->upload->data('file_name');
                $this->db->set('sk_image', $new_image);
                $this->db->set('id_kuliner', $idkuliner);

                $this->db->insert('show_image_k');
                $this->session->set_flashdata('success', 'Gambar berhasil di tambahkan!');
                redirect(base_url() . "data/tambahgambarkuliner/" . $id);
            }
        }
    }

    public function hapusGambarKuliner($id, $idw)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('show_image_k');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/showgambar/kuliner/' . $row->sk_image);

        $this->kuliner_model->hapusGambarKuliner($id);
        $this->session->set_flashdata('success', 'Gambar kuliner berhasil dihapus!');
        redirect(base_url() . "data/tambahgambarkuliner/" . $idw);
    }

    //Akhir fungtion data kuliner

    //Data Pasar Tradisional------------------------------------------------------------------------------------------------

    public function dataPasar()
    {
        $data['title'] = 'Pasar Tradisional';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pasar'] = $this->pasar_model->getPasar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasar/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function tambahPasar()
    {
        $data['title'] = 'Tambah Data Pasar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmpasar', 'Nama Pasar', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pasar/form_add', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $data['user']['id'];
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmpasar = $this->input->post('nmpasar');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/pasar/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('p_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id_user', $id_user);
            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_pasar', $nmpasar);
            $this->db->set('p_id_kab', $kab);
            $this->db->set('p_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->insert('pasar');
            $this->session->set_flashdata('success', 'Pasar berhasil ditambahkan!');
            redirect('data/datapasar');
        }
    }

    public function ubahPasar($id)
    {
        $data['title'] = 'Ubah Data Pasar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pasar'] = $this->pasar_model->getPasarById($id);
        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmpasar', 'Nama Pasar', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pasar/form_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmpasar = $this->input->post('nmpasar');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/pasar/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['pasar']['p_image'];
                    unlink(FCPATH . 'assets/img/pasar/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('p_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_pasar', $nmpasar);
            $this->db->set('p_id_kab', $kab);
            $this->db->set('p_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->where('id_pasar', $id);
            $this->db->update('pasar');
            $this->session->set_flashdata('success', 'Data pasar berhasil diubah!');
            redirect('data/datapasar');
        }
    }

    function get_data_edit_pasar()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->pasar_model->get_pasar_by_id($id)->result();
        echo json_encode($data);
    }

    public function hapusPasar($id)
    {
        $this->db->where('id_pasar', $id);
        $query = $this->db->get('pasar');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/pasar/' . $row->p_image);

        $this->pasar_model->hapusPasar($id);
        $this->session->set_flashdata('success', 'Data pasar berhasil dihapus!');
        redirect('data/datapasar');
    }

    public function tambahGambarPasar($id)
    {
        $data['title'] = 'Tambah Gambar Pasar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['gambar'] = $this->pasar_model->showGambar($id);
        $data['id'] =   $id;

        $this->form_validation->set_rules('idpasar', 'ID Pasar', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pasar/form_gambar', $data);
            $this->load->view('templates/footer');
        } else {
            $idpasar = $this->input->post('idpasar');

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/showgambar/pasar/';


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('pasar/form_gambar', $error, $data);
                $this->load->view('templates/footer');
            } else {
                $new_image = $this->upload->data('file_name');
                $this->db->set('sp_image', $new_image);
                $this->db->set('id_pasar', $idpasar);

                $this->db->insert('show_image_p');
                $this->session->set_flashdata('success', 'Gambar berhasil di tambahkan!');
                redirect(base_url() . "data/tambahgambarpasar/" . $id);
            }
        }
    }

    public function hapusGambarPasar($id, $idw)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('show_image_p');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/showgambar/pasar/' . $row->sp_image);

        $this->pasar_model->hapusGambarPasar($id);
        $this->session->set_flashdata('success', 'Gambar pasar berhasil dihapus!');
        redirect(base_url() . "data/tambahgambarpasar/" . $idw);
    }

    //Akhir fungtion data pasar tradisional

    //Data Penginapan-----------------------------------------------------------------

    public function dataPenginapan()
    {
        $data['title'] = 'Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penginapan'] = $this->penginapan_model->getPenginapan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penginapan/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function tambahPenginapan()
    {
        $data['title'] = 'Tambah Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = ['Standar', 'Kelas Menengah', 'Kelas Atas'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmpenginapan', 'Nama Penginapan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penginapan/form_add', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $data['user']['id'];
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmpenginapan = $this->input->post('nmpenginapan');
            $ktg = $this->input->post('kategori');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/penginapan/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('p_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id_user', $id_user);
            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_penginapan', $nmpenginapan);
            $this->db->set('kategori', $ktg);
            $this->db->set('p_id_kab', $kab);
            $this->db->set('p_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->insert('penginapan');
            $this->session->set_flashdata('success', 'Penginapan berhasil di tambahkan!');
            redirect('data/datapenginapan');
        }
    }

    public function ubahPenginapan($id)
    {
        $data['title'] = 'Ubah Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penginapan'] = $this->penginapan_model->getPenginapanById($id);
        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = ['Standar', 'Kelas Menengah', 'Kelas Atas'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmpenginapan', 'Nama Penginapan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penginapan/form_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmpenginapan = $this->input->post('nmpenginapan');
            $ktg = $this->input->post('kategori');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/penginapan/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['penginapan']['p_image'];
                    unlink(FCPATH . 'assets/img/penginapan/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('p_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_penginapan', $nmpenginapan);
            $this->db->set('kategori', $ktg);
            $this->db->set('p_id_kab', $kab);
            $this->db->set('p_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->where('id_penginapan', $id);
            $this->db->update('penginapan');
            $this->session->set_flashdata('success', 'Data penginapan berhasil diubah!');
            redirect('data/datapenginapan');
        }
    }

    function get_data_edit_penginapan()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->penginapan_model->get_penginapan_by_id($id)->result();
        echo json_encode($data);
    }

    public function hapusPenginapan($id)
    {
        $this->db->where('id_penginapan', $id);
        $query = $this->db->get('penginapan');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/penginapan/' . $row->p_image);

        $this->penginapan_model->hapusPenginapan($id);
        $this->session->set_flashdata('success', 'Data penginapan berhasil dihapus!');
        redirect('data/datapenginapan');
    }

    public function tambahGambarPenginapan($id)
    {
        $data['title'] = 'Tambah Gambar Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['gambar'] = $this->penginapan_model->showGambar($id);
        $data['id'] =   $id;

        $this->form_validation->set_rules('idpeng', 'ID Penginapan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penginapan/form_gambar', $data);
            $this->load->view('templates/footer');
        } else {
            $idpeng = $this->input->post('idpeng');

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/showgambar/penginapan/';


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('penginapan/form_gambar', $error, $data);
                $this->load->view('templates/footer');
            } else {
                $new_image = $this->upload->data('file_name');
                $this->db->set('sp_image', $new_image);
                $this->db->set('id_penginapan', $idpeng);

                $this->db->insert('show_image_pe');
                $this->session->set_flashdata('success', 'Gambar berhasil di tambahkan!');
                redirect(base_url() . "data/tambahgambarpenginapan/" . $id);
            }
        }
    }

    public function hapusGambarPenginapan($id, $idw)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('show_image_pe');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/showgambar/penginapan/' . $row->sp_image);

        $this->penginapan_model->hapusGambarPenginapan($id);
        $this->session->set_flashdata('success', 'Gambar penginapan berhasil dihapus!');
        redirect(base_url() . "data/tambahgambarpenginapan/" . $idw);
    }

    //Akhir fungtion data penginapan

    //Data Mall

    public function dataMall()
    {
        $data['title'] = 'Mall';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['mall'] = $this->mall_model->getMall();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mall/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function tambahMall()
    {
        $data['title'] = 'Tambah Mall';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmmall', 'Nama Mall', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mall/form_add', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $data['user']['id'];
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmmall = $this->input->post('nmmall');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/mall/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('m_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id_user', $id_user);
            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_mall', $nmmall);
            $this->db->set('m_id_kab', $kab);
            $this->db->set('m_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->insert('mall');
            $this->session->set_flashdata('success', 'Mall berhasil di tambahkan!');
            redirect('data/datamall');
        }
    }

    public function ubahMall($id)
    {
        $data['title'] = 'Ubah Mall';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['mall'] = $this->mall_model->getMallById($id);
        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmmall', 'Nama Mall', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mall/form_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmmall = $this->input->post('nmmall');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/mall/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['mall']['m_image'];
                    unlink(FCPATH . 'assets/img/mall/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('m_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_mall', $nmmall);
            $this->db->set('m_id_kab', $kab);
            $this->db->set('m_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->where('id_mall', $id);
            $this->db->update('mall');
            $this->session->set_flashdata('success', 'Data mall berhasil diubah!');
            redirect('data/datamall');
        }
    }

    function get_data_edit_mall()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->mall_model->get_mall_by_id($id)->result();
        echo json_encode($data);
    }

    public function hapusMall($id)
    {
        $this->db->where('id_mall', $id);
        $query = $this->db->get('mall');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/mall/' . $row->m_image);

        $this->mall_model->hapusMall($id);
        $this->session->set_flashdata('success', 'Data mall berhasil dihapus!');
        redirect('data/datamall');
    }

    public function tambahGambarMall($id)
    {
        $data['title'] = 'Tambah Gambar Mall';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['gambar'] = $this->mall_model->showGambar($id);
        $data['id'] =   $id;

        $this->form_validation->set_rules('idmall', 'ID Mall', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mall/form_gambar', $data);
            $this->load->view('templates/footer');
        } else {
            $idmall = $this->input->post('idmall');

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/showgambar/mall/';


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('mall/form_gambar', $error, $data);
                $this->load->view('templates/footer');
            } else {
                $new_image = $this->upload->data('file_name');
                $this->db->set('sm_image', $new_image);
                $this->db->set('id_mall', $idmall);

                $this->db->insert('show_image_m');
                $this->session->set_flashdata('success', 'Gambar berhasil di tambahkan!');
                redirect(base_url() . "data/tambahgambarmall/" . $id);
            }
        }
    }

    public function hapusGambarMall($id, $idw)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('show_image_m');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/showgambar/mall/' . $row->sm_image);

        $this->mall_model->hapusGambarMall($id);
        $this->session->set_flashdata('success', 'Gambar mall berhasil dihapus!');
        redirect(base_url() . "data/tambahgambarmall/" . $idw);
    }

    //Akhir fungtion data mall

    //Data Suvenir

    public function dataSuvenir()
    {
        $data['title'] = 'Toko Suvenir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['suvenir'] = $this->suvenir_model->getSuvenir();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suvenir/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function tambahTkSuvenir()
    {
        $data['title'] = 'Tambah Toko Suvenir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmtksuvenir', 'Nama Toko Suvenir', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suvenir/form_add', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $data['user']['id'];
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmmall = $this->input->post('nmtksuvenir');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/suvenir/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('s_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id_user', $id_user);
            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_tksuvenir', $nmmall);
            $this->db->set('s_id_kab', $kab);
            $this->db->set('s_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->insert('suvenir');
            $this->session->set_flashdata('success', 'Toko suvenir berhasil di tambahkan!');
            redirect('data/datasuvenir');
        }
    }

    public function ubahTkSuvenir($id)
    {
        $data['title'] = 'Ubah Toko Suvenir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['suvenir'] = $this->suvenir_model->getSuvenirById($id);
        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmtksuvenir', 'Nama Toko Suvenir', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suvenir/form_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $nmmall = $this->input->post('nmtksuvenir');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $ket = $this->input->post('keterangan');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/suvenir/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['suvenir']['s_image'];
                    unlink(FCPATH . 'assets/img/suvenir/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('s_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('nm_tksuvenir', $nmmall);
            $this->db->set('s_id_kab', $kab);
            $this->db->set('s_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('ket', $ket);

            $this->db->where('id_tksuvenir', $id);
            $this->db->update('suvenir');
            $this->session->set_flashdata('success', 'Data toko suvenir berhasil diubah!');
            redirect('data/datasuvenir');
        }
    }

    function get_data_edit_suvenir()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->suvenir_model->get_suvenir_by_id($id)->result();
        echo json_encode($data);
    }

    public function hapusSuvenir($id)
    {
        $this->db->where('id_tksuvenir', $id);
        $query = $this->db->get('suvenir');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/suvenir/' . $row->s_image);

        $this->suvenir_model->hapusSuvenir($id);
        $this->session->set_flashdata('success', 'Data toko suvenir berhasil dihapus!');
        redirect('data/datasuvenir');
    }

    public function tambahGambarSuvenir($id)
    {
        $data['title'] = 'Tambah Gambar Suvenir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['gambar'] = $this->suvenir_model->showGambar($id);
        $data['id'] =   $id;

        $this->form_validation->set_rules('idtksuvenir', 'ID Toko Suvenir', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('suvenir/form_gambar', $data);
            $this->load->view('templates/footer');
        } else {
            $idtksuvenir = $this->input->post('idtksuvenir');

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/showgambar/suvenir/';


            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('suvenir/form_gambar', $error, $data);
                $this->load->view('templates/footer');
            } else {
                $new_image = $this->upload->data('file_name');
                $this->db->set('ss_image', $new_image);
                $this->db->set('id_tksuvenir', $idtksuvenir);

                $this->db->insert('show_image_s');
                $this->session->set_flashdata('success', 'Gambar berhasil di tambahkan!');
                redirect(base_url() . "data/tambahgambarsuvenir/" . $id);
            }
        }
    }

    public function hapusGambarSuvenir($id, $ids)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('show_image_s');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/showgambar/suvenir/' . $row->ss_image);

        $this->suvenir_model->hapusGambarSuvenir($id);
        $this->session->set_flashdata('success', 'Gambar Suvenir berhasil dihapus!');
        redirect(base_url() . "data/tambahgambarsuvenir/" . $ids);
    }


    //Akhir funftion data Suvenir

    function get_kecamatan()
    {
        $id = $this->input->post('id');
        $data = $this->wilayah_model->get_kecamatan($id);
        echo json_encode($data);
    }

    function get_ubah_kabupaten()
    {
        $id_prov = $this->input->post('id');
        $data = $this->wilayah_model->get_ubah_kabupaten($id_prov)->result();
        echo json_encode($data);
    }

    function get_ubah_kecamatan()
    {
        $id_kab = $this->input->post('id');
        $data = $this->wilayah_model->get_ubah_kecamatan($id_kab)->result();
        echo json_encode($data);
    }
}
