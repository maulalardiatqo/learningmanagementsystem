<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarGuru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer');
    }
    public function kelas()
    {
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarGuru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kelas', $data);
        $this->load->view('templates/footer');
    }
    public function jadwal()
    {
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->model('Jadwal_model', 'jadwal');
        $id_guru = $this->db->get_where('guru', ['nuptk' => $this->session->userdata['username']])->row_array();
        $data['jadwal'] = $this->jadwal->getJadwal($id_guru['id_guru']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarGuru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/jadwal', $data);
        $this->load->view('templates/footer');
    }
    public function tugas()
    {
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarGuru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/tugas', $data);
        $this->load->view('templates/footer');
    }
    public function ujian()
    {
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarGuru', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/ujian', $data);
        $this->load->view('templates/footer');
    }
}
