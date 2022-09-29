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
        $this->load->model("penginapan_model");
    }

    //Laporan Wisata ---------------------------------------------------------------------------------------------

    public function listLap()
    {
        $data['title'] = 'List Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function lapWisataAlam()
    {
        $data['title'] = 'Laporan Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/lap_wisata_alam', $data);
        $this->load->view('templates/footer');
    }

    public function filterWisataAlam($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getWisataAlam();
        } else {
            $data = $this->wisata_model->getLapWisataAlam($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('laporan/result_alam', $dt);
    }

    public function cetakWisataAlam($idk = null, $idkc = null)
    {
        $dt['title'] = 'Data Lokasi Wisata Alam';
        $title = 'Data Lokasi Wisata Alam';

        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getWisataAlam();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLapWisataAlam($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('laporan/cetak_wisata_alam', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("$title.pdf", array('Attachment' => 0));
    }

    public function lapWisataBuatan()
    {
        $data['title'] = 'Laporan Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/lap_wisata_buatan', $data);
        $this->load->view('templates/footer');
    }

    public function filterWisataBuatan($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getWisataBuatan();
        } else {
            $data = $this->wisata_model->getLapWisataBuatan($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('laporan/result_buatan', $dt);
    }

    public function cetakWisataBuatan($idk = null, $idkc = null)
    {
        $dt['title'] = 'Data Lokasi Wisata Buatan';
        $title = 'Data Lokasi Wisata Buatan';

        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getWisataBuatan();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLapWisataBuatan($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('laporan/cetak_wisata_buatan', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("$title.pdf", array('Attachment' => 0));
    }

    public function lapWisataKuliner()
    {
        $data['title'] = 'Laporan Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/lap_wisata_kuliner', $data);
        $this->load->view('templates/footer');
    }

    public function filterWisataKuliner($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getWisataKuliner();
        } else {
            $data = $this->wisata_model->getLapWisataKuliner($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('laporan/result_kuliner', $dt);
    }

    public function cetakWisataKuliner($idk = null, $idkc = null)
    {
        $dt['title'] = 'Data Lokasi Wisata Kuliner';
        $title = 'Data Lokasi Wisata Kuliner';

        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getWisataKuliner();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLapWisataKuliner($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('laporan/cetak_wisata_kuliner', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("$title.pdf", array('Attachment' => 0));
    }

    public function lapWisataReligi()
    {
        $data['title'] = 'Laporan Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/lap_wisata_religi', $data);
        $this->load->view('templates/footer');
    }

    public function filterWisataReligi($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getWisataReligi();
        } else {
            $data = $this->wisata_model->getLapWisataReligi($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('laporan/result_religi', $dt);
    }

    public function cetakWisataReligi($idk = null, $idkc = null)
    {
        $dt['title'] = 'Data Lokasi Wisata Religi';
        $title = 'Data Lokasi Wisata Religi';

        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getWisataReligi();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLapWisataReligi($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('laporan/cetak_wisata_religi', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("$title.pdf", array('Attachment' => 0));
    }

    public function lapWisataBudaya()
    {
        $data['title'] = 'Laporan Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/lap_wisata_budaya', $data);
        $this->load->view('templates/footer');
    }

    public function filterWisataBudaya($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getWisataBudaya();
        } else {
            $data = $this->wisata_model->getLapWisataBudaya($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('laporan/result_budaya', $dt);
    }

    public function cetakWisataBudaya($idk = null, $idkc = null)
    {
        $dt['title'] = 'Data Lokasi Wisata Budaya';
        $title = 'Data Lokasi Wisata Budaya';

        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getWisataBudaya();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLapWisataBudaya($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('laporan/cetak_wisata_budaya', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("$title.pdf", array('Attachment' => 0));
    }

    public function lapWisataEdukasi()
    {
        $data['title'] = 'Laporan Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/lap_wisata_edukasi', $data);
        $this->load->view('templates/footer');
    }

    public function filterWisataEdukasi($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getWisataEdukasi();
        } else {
            $data = $this->wisata_model->getLapWisataEdukasi($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('laporan/result_edukasi', $dt);
    }

    public function cetakWisataEdukasi($idk = null, $idkc = null)
    {
        $dt['title'] = 'Data Lokasi Wisata Edukasi';
        $title = 'Data Lokasi Wisata Edukasi';

        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getWisataEdukasi();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLapWisataEdukasi($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('laporan/cetak_wisata_edukasi', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("$title.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Wisata

    //Laporan event Wisata

    public function lapEventWisata()
    {
        $data['title'] = 'Laporan Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/lap_event_wisata', $data);
        $this->load->view('templates/footer');
    }

    public function filterEventWisata($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $data = $this->wisata_model->getEvent();
        } else {
            $data = $this->wisata_model->getLapEventWisata($idk, $idkc);
        }
        $dt['wisata'] = $data;
        $dt['idk'] = $idk;
        $dt['idkc'] = $idkc;
        $this->load->view('laporan/result_event', $dt);
    }

    public function cetakEventWisata($idk = null, $idkc = null)
    {
        if ($idk == 0 && $idkc == 0) {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getEvent();
        } else {
            $this->load->library('dompdf_gen');
            $data = $this->wisata_model->getLapEventWisata($idk, $idkc);
        }
        $dt['wisata'] = $data;

        $this->load->view('laporan/cetak_event', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Event.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Event Wisata

    //Laporan Penginapan

    public function lapPenginapan()
    {
        $data['title'] = 'Laporan Lokasi Hotel';
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

    //Laporan Buku Tamu

    public function lapBukuTamu()
    {
        $data['title'] = 'Laporan Buku Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tamu'] = $this->db->get('buku_tamu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/lap_buku_tamu', $data);
        $this->load->view('templates/footer');
    }

    public function cetakLapTamu()
    {
        $data['title'] = 'Laporan Buku Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['tamu'] = $this->wisata_model->getLapDataTamu();

        $data['tanggal1'] = $this->input->post('tanggal1');
        $data['tanggal2'] = $this->input->post('tanggal2');

        $this->load->library('dompdf_gen');
        $this->load->view('laporan/cetak_buku_tamu', $data);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data Buku Tamu.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan Buku Tamu

    //Laporan User Daftar

    public function lapUserDaftar()
    {
        $data['title'] = 'Laporan User Daftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['daftar'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/lap_user_daftar', $data);
        $this->load->view('templates/footer');
    }

    public function cetakLapDaftar()
    {
        $data['title'] = 'Laporan User Daftar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['daftar'] = $this->wisata_model->getLapDaftar();

        $data['tanggal1'] = $this->input->post('tanggal1');
        $data['tanggal2'] = $this->input->post('tanggal2');

        $this->load->library('dompdf_gen');
        $this->load->view('laporan/cetak_user_daftar', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("User Daftar.pdf", array('Attachment' => 0));
    }

    //Akhir Laporan User Daftar
}
