<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model("wilayah_model");
        $this->load->model("wisata_model");
        $this->load->model("penginapan_model");
    }

    public function wisataMap()
    {
        $data['alam'] = $this->wisata_model->getWisataAlam();
        $data['buatan'] = $this->wisata_model->getWisataBuatan();
        $data['kuliner'] = $this->wisata_model->getWisataKuliner();
        $data['religi'] = $this->wisata_model->getWisataReligi();
        $data['budaya'] = $this->wisata_model->getWisataBudaya();
        $data['edukasi'] = $this->wisata_model->getWisataEdukasi();
        $data['hotel'] = $this->penginapan_model->getPenginapan();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/wisata_map', $data);
        $this->load->view('tech-blog/templates/footer');
    }


    public function dataWisata($id)
    {
        $data['wisata'] = $this->wisata_model->dataWisataHome($id);
        $data['gambar'] = $this->wisata_model->showGambar($id);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/datawisata', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function event()
    {
        $data['kuliner'] = $this->wisata_model->getEvent();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/event', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function searchEvent()
    {
        $keyword = $this->input->post('keyword');

        $data['event'] = $this->wisata_model->pencarianEvent($keyword);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/event_search', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function kulinerMap()
    {
        $data['kuliner'] = $this->kuliner_model->getKuliner();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/kuliner_map', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function dataevent($id)
    {
        $data['event'] = $this->wisata_model->dataeventHome($id);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/dataevent', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function bukuTamu()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('saran', 'Saran', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('tech-blog/templates/header');
            $this->load->view('tech-blog/templates/topbar');
            $this->load->view('tech-blog/buku_tamu');
            $this->load->view('tech-blog/templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'saran' => $this->input->post('saran'),
                'tgl' => date('Y-m-d')
            ];
            $this->db->insert('buku_tamu', $data);
            $this->session->set_flashdata('success', 'Data berhasil di kirim!');
            redirect('home/bukutamu');
        }
    }

    public function pasar()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('home/pasar');
        $config['total_rows'] = $this->db->count_all('pasar');
        $config['per_page'] = 2;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pasar'] = $this->pasar_model->getPasarHome($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/pasar', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function searchPasar()
    {
        $keyword = $this->input->post('keyword');

        $data['pasar'] = $this->pasar_model->pencarianPasar($keyword);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/pasar_search', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function pasarMap()
    {
        $data['pasar'] = $this->pasar_model->getPasar();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/pasar_map', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function dataPasar($id)
    {
        $data['pasar'] = $this->pasar_model->dataPasarHome($id);
        $data['gambar'] = $this->pasar_model->showGambar($id);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/datapasar', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function penginapan()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('home/penginapan');
        $config['total_rows'] = $this->db->count_all('penginapan');
        $config['per_page'] = 2;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['penginapan'] = $this->penginapan_model->getPenginapanHome($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/penginapan', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function searchPenginapan()
    {
        $keyword = $this->input->post('keyword');

        $data['penginapan'] = $this->penginapan_model->pencarianPenginapan($keyword);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/penginapan_search', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function penginapanMap()
    {
        $data['penginapan'] = $this->penginapan_model->getPenginapan();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/penginapan_map', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function dataPenginapan($id)
    {
        $data['penginapan'] = $this->penginapan_model->dataPenginapanHome($id);
        $data['gambar'] = $this->penginapan_model->showGambar($id);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/datapenginapan', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function mall()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('home/mall');
        $config['total_rows'] = $this->db->count_all('mall');
        $config['per_page'] = 2;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['mall'] = $this->mall_model->getMallHome($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/mall', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function searchMall()
    {
        $keyword = $this->input->post('keyword');

        $data['mall'] = $this->mall_model->pencarianMall($keyword);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/mall_search', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function mallMap()
    {
        $data['mall'] = $this->mall_model->getMall();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/mall_map', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function dataMall($id)
    {
        $data['mall'] = $this->mall_model->dataMallHome($id);
        $data['gambar'] = $this->mall_model->showGambar($id);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/datamall', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function suvenir()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('home/suvenir');
        $config['total_rows'] = $this->db->count_all('suvenir');
        $config['per_page'] = 2;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['suvenir'] = $this->suvenir_model->getSuvenirHome($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/suvenir', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function searchSuvenir()
    {
        $keyword = $this->input->post('keyword');

        $data['suvenir'] = $this->suvenir_model->pencarianSuvenir($keyword);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/suvenir_search', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function suvenirMap()
    {
        $data['suvenir'] = $this->suvenir_model->getSuvenir();

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/suvenir_map', $data);
        $this->load->view('tech-blog/templates/footer');
    }

    public function dataSuvenir($id)
    {
        $data['suvenir'] = $this->suvenir_model->dataSuvenirHome($id);
        $data['gambar'] = $this->suvenir_model->showGambar($id);

        $this->load->view('tech-blog/templates/header');
        $this->load->view('tech-blog/templates/topbar');
        $this->load->view('tech-blog/datasuvenir', $data);
        $this->load->view('tech-blog/templates/footer');
    }
}
