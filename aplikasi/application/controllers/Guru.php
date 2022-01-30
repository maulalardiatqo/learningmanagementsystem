<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


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
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
    }
    public function kelas()
    {
        $data['judul'] = 'Kelas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('jadwal', 'jadwal.id_kelas = kelas.id_kelas');
        $this->db->group_by('kelas.id_kelas');
        $data['cetak'] = $this->db->get()->result_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/kelas', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
    }
    public function materi($id_kelas)
    {
        $data['judul'] = 'Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/materi', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
    }
    public function kirimMateri()
    {
        $data['judul'] = 'Upload Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['guru_mapel' => $data['user']['username']])->result_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/kirimMateri', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
    }
    public function uploadMateri()
    {
        $this->form_validation->set_rules('materi', 'Materi', 'required');
        //uplad file
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|pdf';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
    }
    public function jadwal()
    {
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->model('Jadwal_model', 'jadwal');
        $id_guru = $this->db->get_where('guru', ['nuptk' => $this->session->userdata['username']])->row_array();
        $data['jadwal'] = $this->jadwal->getJadwal($id_guru['nuptk']);

        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/jadwal', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
        // test changes
    }
    public function tugas()
    {
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/tugas', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
    }
    public function ujian()
    {
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/ujian', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
    }
}
