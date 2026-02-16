<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model("setWeeding_model");
    }

    public function tempWeeding()
    {
        $data['title'] = 'List Acara Weeding';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['temp'] = $this->setWeeding_model->getweeding();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('setWeeding/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function tbhWeeding()
    {
        $data['title'] = 'Tambah Data Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_message('required', '{field} kosong, isi terlebih dahulu.');
        $this->form_validation->set_rules('nm_pria', '*Nama mempelai pria', 'required');
        $this->form_validation->set_rules('nm_wanita', '*Nama mempelai wanita', 'required');
        $this->form_validation->set_rules('tgl_acr', '*Tanggal acara', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('setWeeding/form_add', $data);
            $this->load->view('templates/footer');
        } else {
            // $nm_pria = $this->input->post('nm_pria');
            // $nm_wanita = $this->input->post('nm_wanita');
            // $tgl_acr = $this->input->post('tgl_acr');

            // $this->db->set('nm_pria', $nm_pria);
            // $this->db->set('nm_wanita', $nm_wanita);
            // $this->db->set('tgl_acr', $tgl_acr);

            // $this->db->insert('tb_weeding');
            // $this->session->set_flashdata('succsess', 'Data Weeding telah ditambahkan!');
            // redirect('template/tempweeding');

            $data = [
                'nm_pria'   => $this->input->post('nm_pria', TRUE),
                'nm_wanita'    => $this->input->post('nm_wanita', TRUE),
                'tgl_acr'=> $this->input->post('tgl_acr', TRUE)
            ];

            // if (empty($data['nanm_priama']) || empty($data['nm_wanita']) || empty($data['tgl_acr'])) {
            //     $this->session->set_flashdata('error', 'Semua field wajib diisi!');
            //     redirect('mahasiswa');
            //     return;
            // }

            if ($this->setWeeding_model->insert_data($data)) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data..');
            }
            redirect('template/tempweeding');
        }
    }

}