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
        $data['mapel'] = $this->db->get('mapel')->result_array();
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

        $data['judul'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();


        if ($this->form_validation->run() == false) {
            $this->load->view('templatesSiswa/topbar_siswa', $data);
            $this->load->view('siswa/profil', $data);
            $this->load->view('templatesSiswa/footer_siswa');
        } else {
            $nis = $this->input->post('nis');
            $nama = $this->input->post('nama');


            $poto = $_FILES['edit_foto']['name'];

            if ($poto) {
                $config['allowed_types'] = 'gif|png|jpg';
                $config['max_size'] = '3048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);


                if ($this->upload->do_upload('edit_foto')) {
                    $nama_gambar_baru = $this->upload->data('file_name');
                    $this->db->set('foto', $nama_gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $nama);
            $this->db->where('username', $nis);
            $this->db->update('user');
            $this->session->set_flashdata('flash', 'Update Foto');
            $this->session->set_flashdata('flashtype', 'success');
            redirect('siswa/profil');
        }
    }
    public function ubahpw()
    {
        $data['judul'] = 'Edit Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();

        $this->form_validation->set_rules('pwold', 'Password', 'required|trim', [
            'required' => 'Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('pwnew', 'Password', 'required|min_length[4]|trim|matches[conpwnew]', ['required' => 'Tidak Boleh Kosong', 'matches' => 'Ups konfirmasi password berbeda', 'min_length' => 'Password minimal 4']);
        $this->form_validation->set_rules('conpwnew', 'Password', 'trim|matches[pwnew]', ['matches' => 'Ups konfirmasi password berbeda', 'required' => 'Tidak Boleh Kosong']);
        if ($this->form_validation->run() == false) {
            $this->load->view('templatesSiswa/topbar_siswa', $data);
            $this->load->view('siswa/ubahpw', $data);
            $this->load->view('templatesSiswa/footer_siswa');
        } else {

            $pwold = $this->input->post('pwold');
            $pwnew = $this->input->post('pwnew');
            if (!password_verify($pwold, $data['user']['password'])) {
                $this->session->set_flashdata('flash', 'Password lama tidak sesuai');
                $this->session->set_flashdata('flashtype', 'info');
                redirect('siswa/ubahpw');
            } else {
                if ($pwold == $pwnew) {
                    $this->session->set_flashdata('flash', 'Password sama');
                    $this->session->set_flashdata('flashtype', 'info');
                    redirect('siswa/ubahpw');
                } else {
                    $password = password_hash($pwnew, PASSWORD_DEFAULT);

                    $this->db->set('password', $password);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('flash', 'Password Berhasil dirubah');
                    $this->session->set_flashdata('flashtype', 'success');
                    redirect('siswa/profil');
                }
            }
        }
    }
}
