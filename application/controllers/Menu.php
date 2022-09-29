<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model("Admin_model");
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //row_array untuk mengambil data sebaris
        //echo 'Selamat datang user '. $data['user']['name'];  validasi memanggil sesson menampilkan nama si login

        $data['menu'] = $this->db->get('user_menu')->result_array(); // select * from user_menu
        //result array untuk mengambil data banyak

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function ubahMenu($id)
    {
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Admin_model->getByIdMenu($id);

        $this->form_validation->set_rules('menu', 'Name Menu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-menu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->editMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Menu has been updated!</div>');
            redirect('menu');
        }
    }

    public function hapusMenu($id)
    {
        $this->Admin_model->hapusMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your menu has been deleted!</div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //row_array untuk mengambil data sebaris
        //echo 'Selamat datang user '. $data['user']['name'];  validasi memanggil sesson menampilkan nama si login
        $this->load->model('Menu_model', 'menu'); // "menu" nama inisial

        $data['subMenu'] = $this->menu->getSubMenu(); //nama inisialnya di andak di sini
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function editSubmenu($id)
    {
        $data['title'] = 'Edit Submenu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->Admin_model->getByIdSubmenu($id);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['subMenu'] = $this->db->get('user_sub_menu')->result_array();;

        // form validasi
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->editSubmenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Menu has been updated!</div>');
            redirect('menu/submenu');
        }
    }

    public function hapusSubmenu($id)
    {
        $this->Admin_model->hapusSubmenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your menu has been deleted!</div>');
        redirect('menu/submenu');
    }
}
