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
        $data['id_kelas'] = $id_kelas;
        $data['judul'] = 'Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['materi'] = $this->db->get_where('materi', ['materi_guru' => $data['user']['username'], 'kelas_id' => $id_kelas])->result_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/materi', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
    }
    public function kirimMateri($id_kelas)
    {
        $data['id_kelas'] = $id_kelas;
        $data['judul'] = 'Upload Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['guru_mapel' => $data['user']['username']])->result_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/kirimMateri', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
    }
    public function hapusMateri($id_materi)
    {
        $sql = "DELETE FROM materi WHERE id_materi = $id_materi";
        $this->db->query($sql, [$id_materi]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('guru/kelas');
    }
    public function uploadMateri()
    {
        $this->form_validation->set_rules('judul_materi', 'Judul Materi', 'required');
        //uplad file
        $config['upload_path'] = './uploads/materi/';
        $config['allowed_types'] = 'docx|pdf';
        $config['file_name'] = 'docx' . time();
        $this->load->library('upload', $config);
        $user = $this->session->userdata['username'];
        $fileName = '';

        if ($_FILES['upload']['name']) {


            if (!$this->upload->do_upload('upload')) {

                $this->session->set_flashdata('flash', 'Gagal Upload, Periksa Kembali');
                $this->session->set_flashdata('flashtype', 'danger');
                redirect('guru/kirimMateri/' . $this->input->post('id_kelas'));
            } else {
                $fileName = $config['file_name'];
            }
        }
        $data = [
            'id_mapel' => $this->input->post('mapel'),
            'materi_guru' => $user,
            'kelas_id' => $this->input->post('id_kelas'),
            'judul_materi' => $this->input->post('judul_materi'),
            'isi_materi' => $this->input->post('ckeditor'),
            'upload_file' => $fileName,
        ];
        if ($this->form_validation->run()) {
            $this->db->insert('materi', $data);
            $this->session->set_flashdata('flash', 'Berhasil Insert');
            $this->session->set_flashdata('flashtype', 'success');
        } else {
            $this->session->set_flashdata('flash', 'Gagal Menyimpan, Periksa Kembali');
            $this->session->set_flashdata('flashtype', 'info');
        }
        redirect('guru/materi/' . $this->input->post('id_kelas'));
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
    public function materiDetail($id_materi)
    {
        $data['id_materi'] = $id_materi;
        $data['judul'] = 'Detail Materi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('mapel', 'mapel.id_mapel = materi.id_mapel', 'INNER');
        $this->db->where('materi.id_materi', $data['id_materi']);
        $data['materi'] = $this->db->get()->result_array();
        $this->db->select('*');
        $this->db->from('materi_comment');
        $this->db->join('user', 'user.username = materi_comment.who_comment', 'INNER');
        $this->db->join('materi', 'materi.id_materi = materi_comment.id_materi', 'INNER');
        $this->db->where('materi.id_materi', $data['id_materi']);
        $data['comment'] = $this->db->get()->result_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/materiDetail', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
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
        redirect('guru/materiDetail/' . $data['id_materi']);
    }
    public function ulangan()
    {
        $data['judul'] = 'Ulangan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['guru_mapel' => $this->session->userdata['username']])->result_array();
        $this->db->select('*');
        $this->db->from('parent_soal');
        $this->db->join('mapel', 'mapel.id_mapel = parent_soal.mapel_id_parent');
        $data['ulangan'] = $this->db->get()->result_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/ulangan', $data);
        $this->load->view('templates/footer_nav_guru');
        $this->load->view('templates/footer_guru');
    }
    public function buatSoal($id_parent)
    {
        $data['id_parent'] = $id_parent;
        $data['judul'] = 'Buat Soal';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->db->select('*');
        $this->db->from('parent_soal');
        $this->db->join('mapel', 'mapel.id_mapel = parent_soal.mapel_id_parent');
        $this->db->where('parent_soal.id_parent', $id_parent);
        $data['parent'] = $this->db->get()->result_array();
        $this->load->view('templates/header_guru', $data);
        $this->load->view('guru/buatSoal', $data);
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
