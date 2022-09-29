<?php
class Verifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model("wilayah_model");
        $this->load->model("wisata_model");
        $this->load->model("penginapan_model");
    }

    public function listDataBaru()
    {
        $data['title'] = 'Data Baru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['wisata'] = $this->wisata_model->jumlahVerifWisata();
        $data['event'] = $this->wisata_model->jumlahVerifEvent();
        $data['hotel'] = $this->penginapan_model->jumlahVerifHotel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/verifikasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function dataWisata()
    {
        $data['title'] = 'Data Baru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['wisata'] = $this->wisata_model->getWisataBaru();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/verifikasi/wisata/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function rincianWisataBaru($id)
    {
        $data['title'] = 'Rincian Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['wisata'] = $this->wisata_model->getRincianWisata($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/verifikasi/wisata/rincianwisata', $data);
        $this->load->view('templates/footer');
    }

    public function terimaDataWisata($id, $id_user, $nama)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->wisata_model->addNotifWisata($id_user, urldecode($nama));
        $this->wisata_model->dataAcc($id);
        $this->session->set_flashdata('success', 'Data telah diterima!');
        redirect('verifikasi/datawisata');
    }

    public function hapusWisataBaru()
    {
        $id = $this->input->post('id');
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $alasan = $this->input->post('alasan');
        $this->wisata_model->addNotifTolakWisata($id_user, $nama, $alasan);

        $this->db->where('id_wisata', $id);
        $query = $this->db->get('wisata');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/wisata/' . $row->w_image);

        $this->wisata_model->hapuswisata($id);
        $this->session->set_flashdata('success', 'Data wisata berhasil ditolak!');
        redirect('verifikasi/datawisata');
    }

    public function dataEvent()
    {
        $data['title'] = 'Data Baru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['event'] = $this->wisata_model->getEventBaru();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/verifikasi/event/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function rincianEventBaru($id)
    {
        $data['title'] = 'Rincian Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['event'] = $this->wisata_model->getRincianEvent($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/verifikasi/event/rincianevent', $data);
        $this->load->view('templates/footer');
    }

    public function terimaDataEvent($id, $id_user, $nama)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->wisata_model->addNotifEvent($id_user, urldecode($nama));
        $this->wisata_model->dataAccEvent($id);
        $this->session->set_flashdata('success', 'Data telah diterima!');
        redirect('verifikasi/dataevent');
    }

    public function hapusEventBaru()
    {
        $id = $this->input->post('id');
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $alasan = $this->input->post('alasan');
        $this->wisata_model->addNotifTolakEvent($id_user, $nama, $alasan);

        $this->db->where('id_event', $id);
        $query = $this->db->get('event');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/event/' . $row->e_image);

        $this->wisata_model->hapusevent($id);
        $this->session->set_flashdata('success', 'Data event berhasil dihapus!');
        redirect('verifikasi/dataevent');
    }

    public function dataPenginapan()
    {
        $data['title'] = 'Data Baru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penginapan'] = $this->penginapan_model->getPenginapanBaru();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/verifikasi/penginapan/form_data', $data);
        $this->load->view('templates/footer');
    }

    public function rincianPenginapanBaru($id)
    {
        $data['title'] = 'Rincian Penginapan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penginapan'] = $this->penginapan_model->getRincianPenginapan($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/verifikasi/penginapan/rincianpenginapan', $data);
        $this->load->view('templates/footer');
    }

    public function terimaDataPenginapan($id, $id_user, $nama)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->penginapan_model->addNotifPenginapan($id_user, urldecode($nama));
        $this->penginapan_model->dataAcc($id);
        $this->session->set_flashdata('success', 'Data telah diterima!');
        redirect('verifikasi/datapenginapan');
    }

    public function hapusPenginapanBaru()
    {
        $id = $this->input->post('id');
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $alasan = $this->input->post('alasan');
        $this->penginapan_model->addNotifTolakPenginapan($id_user, $nama, $alasan);

        $this->db->where('id_penginapan', $id);
        $query = $this->db->get('penginapan');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/penginapan/' . $row->p_image);

        $this->penginapan_model->hapusPenginapan($id);
        $this->session->set_flashdata('success', 'Data Penginapan berhasil dihapus!');
        redirect('verifikasi/datapenginapan');
    }
}
