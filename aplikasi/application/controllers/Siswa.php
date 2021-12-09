<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('templatesSiswa/header_siswa', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function jadwal()
    {
        $data['judul'] = 'dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/jadwal', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function materi()
    {
        $data['judul'] = 'dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['materi'] = $this->db->get('materi')->result_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/materi', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function tugas()
    {
        $data['judul'] = 'dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/tugas', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function ujian()
    {
        $data['judul'] = 'dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/ujian', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function chat()
    {
        $data['judul'] = 'Pesan';
        $data['gambar'] = $this->db->get('user')->result_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/chat', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function profil()
    {
        $data['judul'] = 'dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/profil', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
}
