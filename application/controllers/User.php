<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'Selamat datang user ' . $data['user']['name'];  //validasi memanggil sesson menampilkan nama si login

        $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('user/index', $data); //$data itu supaya mengirim isi datanya ke user/index
        $this->load->view('templates/footer');
    }

    public function editProfile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'Selamat datang user ' . $data['user']['name'];  //validasi memanggil sesson menampilkan nama si login

        $data['jenkel'] = ['Laki - laki', 'Perempuan'];

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('no', 'Nomor Ponsel', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('user/edit-profile', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $jenkel = $this->input->post('jenkel');
            $no = $this->input->post('no');
            $alamat = $this->input->post('alamat');

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('jenkel', $jenkel);
            $this->db->set('no_hp', $no);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update!</div>');
            redirect('user');
        }
    }

    public function ktp()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'Selamat datang user ' . $data['user']['name'];  //validasi memanggil sesson menampilkan nama si login

        $this->form_validation->set_rules('email', 'email', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('user/poto_ktp', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');

            //cek jika ada gambar yg ada diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/ktp/';


                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image_ktp'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/ktp/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image_ktp', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been update!</div>');
            redirect('user/ktp');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'Selamat datang user ' . $data['user']['name'];  //validasi memanggil sesson menampilkan nama si login

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confir New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/sidebar', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/topbar', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('user/changepassword', $data); //$data itu supaya mengirim isi datanya ke user/index
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function hapusAkun($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        $row = $query->row();

        unlink(FCPATH . 'assets/img/profile/' . $row->image);
        unlink(FCPATH . 'assets/img/ktp/' . $row->image_ktp);

        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('success', 'Akun berhasil dihapus!');
        redirect('laporan/lapuserdaftar');
    }
}
