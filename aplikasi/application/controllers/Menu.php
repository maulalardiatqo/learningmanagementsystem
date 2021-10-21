<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        
    }
    public function index()
    {
        $data['judul'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil ditambahkan
           </div>');
            redirect('menu');
        }
    }
    public function hapusMenu()
    {
        $id = $_GET['id'];
        if ($id == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Menu gagal dihapus
           </div>');
            redirect('menu');
        } else {
            $this->db->delete('user_menu', ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil dihapus
           </div>');
            redirect('menu');
        }
    }

    public function Submenu()
    {
        $data['judul'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata['email']])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_sub_menu', [
                'menu' => $this->input->post('menu')

            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil ditambahkan
           </div>');
            redirect('menu');
        }
    }
    public function hapusSubMenu()
    {
        $id = $_GET['id'];
        if ($id == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Menu gagal dihapus
           </div>');
            redirect('menu');
        } else {
            $this->db->delete('user_sub_menu', ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Menu berhasil dihapus
           </div>');
            redirect('menu');
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $this->db->set('user_menu', $id)->result_array();
    }
}