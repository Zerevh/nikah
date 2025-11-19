<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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

    //Laporan Wisata ---------------------------------------------------------------------------------------------

    public function lapWisata()
    {
        $data['title'] = 'Laporan Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wisata/lap_wisata', $data);
        $this->load->view('templates/footer');
    }

    public function filterWisata($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getWisata();
        } else {
            $data = $this->wisata_model->getLapWisata($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('wisata/result', $dt);
    }

    public function cetakWisata($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getWisata();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLapWisata($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('wisata/cetak', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Wisata.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Wisata

    //Laporan event Wisata

    public function lapEventWisata()
    {
        $data['title'] = 'Laporan Event Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wisata/lap_event_wisata', $data);
        $this->load->view('templates/footer');
    }

    public function filterEventWisata($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getAllWisataEvent();
        } else {
            $data = $this->wisata_model->getLapEventWisata($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('wisata/result_event', $dt);
    }

    public function cetakEventWisata($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getAllWisataEvent();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLapEventWisata($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('wisata/cetak_event', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Event Wisata.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Event Wisata

    //Laporan Wisata Tutup

    public function lapWisataTutup()
    {
        $data['title'] = 'Laporan Wisata Tutup';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wisata/lap_wisata_tutup', $data);
        $this->load->view('templates/footer');
    }

    public function filterWisataTutup($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getAllWisataTutup();
        } else {
            $data = $this->wisata_model->getLaptWisataTutup($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('wisata/result_tutup', $dt);
    }

    public function cetakWisataTutup($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getAllWisataTutup();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLaptWisataTutup($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('wisata/cetak_tutup', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Wisata Tutup.pdf", array('Attachment' => 0));
    }

    //Akhir Lapoean Wisata tutup

    //Laporan Kuliner------------------------------------------------------------------------------------------------

    public function lapKuliner()
    {
        $data['title'] = 'Laporan Kuliner';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kuliner/lap_kuliner', $data);
        $this->load->view('templates/footer');
    }

    public function filterKuliner($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->kuliner_model->getKuliner();
        } else {
            $data = $this->kuliner_model->getLapKuliner($idk, $idkc);
        }
        $dt['kuliner'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('kuliner/result', $dt);
    }

    public function cetakKuliner($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->kuliner_model->getKuliner();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->kuliner_model->getLapKuliner($idk, $idkc);
        }
        $dt['kuliner'] = $data;

        $this->load->view('kuliner/cetak', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Kuliner.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Kuliner

    //Laporan Pasar Tradisional--------------------------------------------------------------------------------------

    public function lapPasar()
    {
        $data['title'] = 'Laporan Pasar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasar/lap_pasar', $data);
        $this->load->view('templates/footer');
    }

    public function filterPasar($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->pasar_model->getPasar();
        } else {
            $data = $this->pasar_model->getLapPasar($idk, $idkc);
        }

        $dt['pasar'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('pasar/result', $dt);
    }

    public function cetakPasar($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->pasar_model->getPasar();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->pasar_model->getLapPasar($idk, $idkc);
        }
        $dt['pasar'] = $data;

        $this->load->view('pasar/cetak', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Pasar.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Pasar Tradisional

    //Laporan Penginapan

    public function lapPenginapan()
    {
        $data['title'] = 'Laporan Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penginapan/lap_penginapan', $data);
        $this->load->view('templates/footer');
    }

    public function filterPenginapan($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->penginapan_model->getPenginapan();
        } else {
            $data = $this->penginapan_model->getLapPenginapan($idk, $idkc);
        }
        $dt['penginapan'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('penginapan/result', $dt);
    }

    public function cetakPenginapan($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->penginapan_model->getPenginapan();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->penginapan_model->getLapPenginapan($idk, $idkc);
        }
        $dt['penginapan'] = $data;

        $this->load->view('penginapan/cetak', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Penginapan.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Penginapan

    //Laporan Mall

    public function lapMall()
    {
        $data['title'] = 'Laporan Mall';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mall/lap_mall', $data);
        $this->load->view('templates/footer');
    }

    public function filterMall($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->mall_model->getMall();
        } else {
            $data = $this->mall_model->getLapMall($idk, $idkc);
        }

        $dt['mall'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('mall/result', $dt);
    }

    public function cetakMall($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->mall_model->getMall();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->mall_model->getLapMall($idk, $idkc);
        }
        $dt['mall'] = $data;

        $this->load->view('mall/cetak', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Mall.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Mall

    //Laporan Suvenir

    public function lapSuvenir()
    {
        $data['title'] = 'Laporan Suvenir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('suvenir/lap_suvenir', $data);
        $this->load->view('templates/footer');
    }

    public function filterSuvenir($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->suvenir_model->getSuvenir();
        } else {
            $data = $this->suvenir_model->getLapSuvenir($idk, $idkc);
        }

        $dt['suvenir'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('suvenir/result', $dt);
    }

    public function cetakSuvenir($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->suvenir_model->getSuvenir();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->suvenir_model->getLapSuvenir($idk, $idkc);
        }
        $dt['suvenir'] = $data;

        $this->load->view('suvenir/cetak', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Toko Suvenir.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Suvenir
}
