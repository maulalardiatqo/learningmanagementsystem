<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


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

        $siswa = $this->db->get_where('siswa', ['nis' => $this->session->userdata['username']])->row_array();
        $data['materi'] = $this->db->get_where('materi', ['kelas_id' => $siswa['kelas']])->num_rows();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('templatesSiswa/header_siswa', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function jadwal()
    {
        $data['judul'] = 'Jadwal';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->model('Jadwal_model', 'jadwal');
        $id_kelas = $this->db->get_where('siswa', ['nis' => $this->session->userdata['username']])->row_array();
        $data['jadwal'] = $this->jadwal->getJadwal(null, $id_kelas['kelas']);
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/jadwal', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function materi()
    {
        $data['judul'] = 'Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['siswa'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata['username']])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['kelas_mapel' => $data['siswa']['kelas']])->result_array();


        // $data['mapel'] = $this->db->get('mapel')->result_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/materi', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function pelajaran($id_mapel)
    {
        $data['judul'] = 'Materi Pelajaran';
        $data['id_mapel'] = $id_mapel;
        $data['siswa'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata['username']])->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['materi'] = $this->db->get_where('materi', ['materi_guru' => $data['user']['username'], 'kelas_id' => $data['siswa']['kelas']])->result_array();
        $data['materi'] = $this->db->get_where('materi', ['id_mapel' => $id_mapel])->result_array();

        // $data['mapel'] = $this->db->get('mapel')->result_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/pelajaran', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function materiDetail($id_materi)
    {
        $data['id_materi'] = $id_materi;
        $data['judul'] = 'Detail Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('mapel', 'mapel.id_mapel = materi.id_mapel', 'INNER');
        $this->db->join('guru', 'guru.nuptk = materi.materi_guru', 'INNER');
        $this->db->where('materi.id_materi', $data['id_materi']);
        $data['materi'] = $this->db->get()->result_array();
        $this->db->select('*');
        $this->db->from('materi_comment');
        $this->db->join('user', 'user.username = materi_comment.who_comment', 'INNER');
        $this->db->join('materi', 'materi.id_materi = materi_comment.id_materi', 'INNER');
        $this->db->where('materi.id_materi', $data['id_materi']);
        $data['comment'] = $this->db->get()->result_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/materiDetail', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function komentar()
    {
        $this->form_validation->set_rules('comment', 'Comment', 'required');
        $data = [
            'id_kelas' => $this->input->post('id_kelas'),
            'id_materi' => $this->input->post('id_materi'),
            'who_comment' => $this->session->userdata['username'],
            'comment' => $this->input->post('comment')
        ];
        if ($this->form_validation->run()) {
            $this->db->insert('materi_comment', $data);
            $this->session->set_flashdata('flash', 'Komentar terkirim');
            $this->session->set_flashdata('flashtype', 'success');
        } else {
            $this->session->set_flashdata('flash', 'Gagal Menyimpan, Periksa Kembali');
            $this->session->set_flashdata('flashtype', 'info');
        }
        redirect('siswa/materiDetail/' . $data['id_materi']);
    }
    public function tugas()
    {
        $data['judul'] = 'Tugas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/tugas', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function ujian()
    {
        $data['judul'] = 'Ujian';
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

        $this->form_validation->set_rules('nama', 'nis', 'required|trim', [
            'required' => 'Tidak Boleh Kosong'
        ]);


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
                $config['width'] = 300;
                $config['height'] = 300;

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
