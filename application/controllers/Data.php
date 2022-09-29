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
        $this->load->model("penginapan_model");
    }

    public function dataGuru()
    {
        $data['title'] = 'Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->db->get('data_guru')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/form_data', $data);
        $this->load->view('templates/footer');
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

    public function tambahDataGuru()
    {

        $data['title'] = 'Tambah Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nis', 'Nis', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/form_add', $data);
            $this->load->view('templates/footer');
        } else {
            $nis = $this->input->post('nis');
            $nama = $this->input->post('nama');
            $nohp = $this->input->post('nohp');
            $alamat = $this->input->post('alamat');

            $this->db->set('nis', $nis);
            $this->db->set('nama', $nama);
            $this->db->set('no_hp', $nohp);
            $this->db->set('alamat', $alamat);

            $this->db->insert('data_guru');
            $this->session->set_flashdata('success', 'Data guru berhasil di tambahkan!');
            redirect('data/dataguru');
        }
    }

    public function hapusdataguru($id)
    {
        $this->wisata_model->hapusguru($id);
        $this->session->set_flashdata('success', 'Data guru berhasil dihapus!');
        redirect('data/dataguru');
    }

    public function cetakguru()
    {
        $this->load->library('dompdf_gen');
        $dt['guru'] = $this->db->get('data_guru')->result_array();

        $this->load->view('guru/cetak', $dt);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Data guru.pdf", array('Attachment' => 0));
    }

    public function editDataGuru($id)
    {
        $data['title'] = 'Edit Data Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['guru'] = $this->wisata_model->getdataguruid($id);

        $this->form_validation->set_rules('nis', 'Nis', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('guru/form_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nis = $this->input->post('nis');
            $nama = $this->input->post('nama');
            $nohp = $this->input->post('nohp');
            $alamat = $this->input->post('alamat');

            $this->db->set('nis', $nis);
            $this->db->set('nama', $nama);
            $this->db->set('no_hp', $nohp);
            $this->db->set('alamat', $alamat);

            $this->db->where('id', $id);
            $this->db->update('data_guru');
            $this->session->set_flashdata('success', 'Data guru berhasil di ubah!');
            redirect('data/dataguru');
        }
    }

    public function tambahWisata()
    {

        $data['title'] = 'Tambah Data Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = $this->db->get('ktg_wisata')->result_array();
        $data['kalangan'] = ['Semua Kalangan', 'Kalangan Dewasa', ' Kalangan Anak-anak'];
        $data['jenis'] = ['Rumah Makan', 'Restoran', 'Cafe'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmwisata', 'Nama Wisata', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('kalangan', 'Kalangan', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
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
            $jenis = $this->input->post('jenistempat');
            $klgn = $this->input->post('kalangan');
            $jam = $this->input->post('jam');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $des = $this->input->post('deskripsi');
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
            $this->db->set('id_ktg', $ktg);
            $this->db->set('ket_tambah', $jenis);
            $this->db->set('kalangan', $klgn);
            $this->db->set('jam_buka', $jam);
            $this->db->set('w_id_kab', $kab);
            $this->db->set('w_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('deskripsi', $des);
            $this->db->set('status', $stts);
            $this->db->set('ket_status', $ket_stts);
            $this->db->set('event', $event);
            $this->db->set('ket_event', $ket_event);
            $this->db->set('acc', '1');

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
        $data['kategori'] = $this->db->get('ktg_wisata')->result_array();
        $data['kalangan'] = ['Semua Kalangan', 'Kalangan Dewasa', 'Kalangan Anak-anak'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmwisata', 'Nama Wisata', 'required');
        $this->form_validation->set_rules('ktg', 'Kategori', 'required');
        $this->form_validation->set_rules('kalangan', 'Kalangan', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
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
            $ktg = $this->input->post('ktg');
            $klgn = $this->input->post('kalangan');
            $jam = $this->input->post('jam');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $des = $this->input->post('deskripsi');

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
            $this->db->set('id_ktg', $ktg);
            $this->db->set('kalangan', $klgn);
            $this->db->set('jam_buka', $jam);
            $this->db->set('w_id_kab', $kab);
            $this->db->set('w_id_kec', $kec);
            $this->db->set('jln', $jln);
            $this->db->set('deskripsi', $des);

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

    public function dataevent()
    {
        $data['title'] = 'Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['event'] = $this->wisata_model->getEvent();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wisata/form_data_event', $data);
        $this->load->view('templates/footer');
    }

    public function tambahEvent()
    {
        $data['title'] = 'Tambah Data Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['jenis'] = ['Festival', 'Pameran', 'Kompetisi', 'Konser'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('tema', 'Tema Event', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat Event', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Event', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tgl1', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tgl2', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('jam', 'Jam acara', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wisata/tambah_event', $data);
            $this->load->view('templates/footer');
        } else {
            $id_user = $data['user']['id'];
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $tema = $this->input->post('tema');
            $tempat = $this->input->post('tempat');
            $jenis = $this->input->post('jenis');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $des = $this->input->post('deskripsi');
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');
            $jam = $this->input->post('jam');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/event/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('e_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id_user', $id_user);
            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('tema', $tema);
            $this->db->set('tempat', $tempat);
            $this->db->set('jenis', $jenis);
            $this->db->set('e_id_kab', $kab);
            $this->db->set('e_id_kec', $kec);
            $this->db->set('jalan', $jln);
            $this->db->set('deskripsi', $des);
            $this->db->set('jam', $jam);
            $this->db->set('tgl_mulai', $tgl1);
            $this->db->set('tgl_selesai', $tgl2);
            $this->db->set('acc', '1');

            $this->db->insert('event');
            $this->session->set_flashdata('success', 'Event berhasil di tambahkan!');
            redirect('data/dataevent');
        }
    }

    public function ubahevent($id)
    {
        $data['title'] = 'Ubah Data Event';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['event'] = $this->wisata_model->getEventById($id);
        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['jenis'] = ['Festival', 'Pameran', 'Kompetisi', 'Konser'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('tema', 'Tema Event', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat Event', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Event', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tgl1', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tgl2', 'Tanggal Selesai', 'required');
        $this->form_validation->set_rules('jam', 'Jam acara', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wisata/ubah_event', $data);
            $this->load->view('templates/footer');
        } else {
            $lat = $this->input->post('latInput');
            $lng = $this->input->post('lngInput');
            $tema = $this->input->post('tema');
            $tempat = $this->input->post('tempat');
            $jenis = $this->input->post('jenis');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $jln = $this->input->post('jln');
            $des = $this->input->post('deskripsi');
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');
            $jam = $this->input->post('jam');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/event/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['event']['e_image'];
                    unlink(FCPATH . 'assets/img/event/' . $old_image);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('e_image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('latitude', $lat);
            $this->db->set('longitude', $lng);
            $this->db->set('tema', $tema);
            $this->db->set('tempat', $tempat);
            $this->db->set('jenis', $jenis);
            $this->db->set('e_id_kab', $kab);
            $this->db->set('e_id_kec', $kec);
            $this->db->set('jalan', $jln);
            $this->db->set('deskripsi', $des);
            $this->db->set('jam', $jam);
            $this->db->set('tgl_mulai', $tgl1);
            $this->db->set('tgl_selesai', $tgl2);

            $this->db->where('id_event', $id);
            $this->db->update('event');
            $this->session->set_flashdata('success', 'Data event berhasil diubah!');
            redirect('data/dataevent');
        }
    }

    function get_data_edit_event()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->wisata_model->get_event_by_id($id)->result();
        echo json_encode($data);
    }

    public function hapusEvent($id)
    {
        $this->db->where('id_event', $id);
        $query = $this->db->get('event');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/event/' . $row->e_image);

        $this->wisata_model->hapusEvent($id);
        $this->session->set_flashdata('success', 'Data event berhasil dihapus!');
        redirect('data/dataevent');
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

    public function kategoriWisata()
    {
        $data['title'] = 'Kategori Wisata';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('ktg_wisata')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wisata/form_data_ktg', $data);
        $this->load->view('templates/footer');
    }

    public function tambahKategori()
    {
        $data['title'] = 'Tambah Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wisata/form_add_ktg', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('ktg_wisata', ['nm_ktg' => $this->input->post('nama')]);
            $this->session->set_flashdata('success', 'Data kategori berhasil ditambah!');
            redirect('data/kategoriwisata');
        }
    }

    public function ubahKategori($id)
    {
        $data['title'] = 'Tambah Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->wisata_model->getKategoriId($id);
        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wisata/form_edit_ktg', $data);
            $this->load->view('templates/footer');
        } else {
            $nmktg = $this->input->post('nama');

            $this->db->set('nm_ktg', $nmktg);

            $this->db->where('id_ktg', $id);
            $this->db->update('ktg_wisata');
            $this->session->set_flashdata('success', 'Data kategori berhasil ditambah!');
            redirect('data/kategoriwisata');
        }
    }

    public function hapusKategori($id)
    {
        $this->wisata_model->hapusKategori($id);
        $this->session->set_flashdata('success', 'Data Kategori berhasil dihapus!');
        redirect('data/kategoriwisata');
    }
    //Akhir fungtion data wisata

    //Data Penginapan-----------------------------------------------------------------

    public function dataPenginapan()
    {
        $data['title'] = 'Hotel';
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
        $data['title'] = 'Tambah Hotel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = ['Standar', 'Kelas Menengah', 'Kelas Atas'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmpenginapan', 'Nama Penginapan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harmu', 'Harga Mulai', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
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
            $har_mu = $this->input->post('harmu');
            $kab = $this->input->post('kab');
            $kec = $this->input->post('kec');
            $kontak = $this->input->post('kontak');
            $jln = $this->input->post('jln');
            $des = $this->input->post('deskripsi');

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
            $this->db->set('harga_mulai', $har_mu);
            $this->db->set('p_id_kab', $kab);
            $this->db->set('p_id_kec', $kec);
            $this->db->set('kontak', $kontak);
            $this->db->set('jln', $jln);
            $this->db->set('deskripsi', $des);
            $this->db->set('acc', '1');

            $this->db->insert('penginapan');
            $this->session->set_flashdata('success', 'Penginapan berhasil di tambahkan!');
            redirect('data/datapenginapan');
        }
    }

    public function ubahPenginapan($id)
    {
        $data['title'] = 'Ubah Hotel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['penginapan'] = $this->penginapan_model->getPenginapanById($id);
        $data['kab'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = ['Standar', 'Kelas Menengah', 'Kelas Atas'];

        $this->form_validation->set_rules('latInput', 'Latitude', 'required');
        $this->form_validation->set_rules('lngInput', 'Longitude', 'required');
        $this->form_validation->set_rules('nmpenginapan', 'Nama Penginapan', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harmu', 'Harga Mulai', 'required');
        $this->form_validation->set_rules('kab', 'Kabupaten', 'required');
        $this->form_validation->set_rules('kec', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required');
        $this->form_validation->set_rules('jln', 'Jalan', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
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
            $har_mu = $this->input->post('harmu');
            $kontak = $this->input->post('kontak');
            $jln = $this->input->post('jln');
            $des = $this->input->post('deskripsi');

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
            $this->db->set('harga_mulai', $har_mu);
            $this->db->set('kontak', $kontak);
            $this->db->set('jln', $jln);
            $this->db->set('deskripsi', $des);

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
        $data['title'] = 'Tambah Gambar Hotel';
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
