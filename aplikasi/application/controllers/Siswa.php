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
    public function ulangan()
    {
        $data['judul'] = 'Ulangan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['siswa'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata['username']])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['kelas_mapel' => $data['siswa']['kelas']])->result_array();
        $this->db->select('*');
        $this->db->from('parent_soal');
        $this->db->join('mapel', 'mapel.id_mapel = parent_soal.mapel_id_parent');
        $this->db->where('mapel.kelas_mapel', $data['siswa']['kelas']);
        $data['ulangan'] = $this->db->get()->result_array();

        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/ulangan', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function soal($id_parent)
    {
        $data['judul'] = 'Ulangan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['siswa'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata['username']])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['kelas_mapel' => $data['siswa']['kelas']])->result_array();
        $mapel_id = $data['mapel'][0]['id_mapel'];
        $this->db->select('*');
        $this->db->from('parent_soal');
        $this->db->join('mapel', 'mapel.id_mapel = parent_soal.mapel_id_parent');
        $this->db->where('mapel.kelas_mapel', $data['siswa']['kelas']);
        $data['ulangan'] = $this->db->get()->result_array();

        $data['soal'] = $this->db->get_where('soal_ulangan', ['parent_id' => $id_parent])->result_array();
        $data['parent'] = $this->db->get_where('parent_soal', ['id_parent' => $id_parent])->row_array();

        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/soal', $data);
        $this->load->view('templatesSiswa/footer_siswa');
    }
    public function post_soal($id_parent)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['siswa'] = $this->db->get_where('siswa', ['nis' => $this->session->userdata['username']])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['kelas_mapel' => $data['siswa']['kelas']])->result_array();
        $mapel_id = $data['mapel'][0]['id_mapel'];
        $this->db->select('id_soal,jawaban');
        $this->db->from('soal_ulangan');
        $this->db->where('parent_id', $id_parent);
        $data['id'] = $this->db->get()->result_array();
        $jawaban = [];
        $jawaban_benar = 0;
        $jumlah_soal = 0;
        foreach ($data['id'] as $d) {
            $this->form_validation->set_rules('jawaban-' . $d['id_soal'], 'Jawaban', 'required');
            if ($d['jawaban'] == $this->input->post('jawaban-' . $d['id_soal'])) {
                $jawaban_benar++;
            }
            $jumlah_soal++;

            array_push($jawaban, [
                'id_parent_soal' => $id_parent,
                'soal_id' => $d['id_soal'],
                'jawaban' => $this->input->post('jawaban-' . $d['id_soal']),
                'siswa_nama' => $this->session->userdata['username'],
                'mapel_id' => $mapel_id
            ]);
        }
        $nilai = 100 / $jumlah_soal * $jawaban_benar;

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash', 'Periksa Kembali!!!, Jawaban harus diisi');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('siswa/soal/' . $id_parent);
        } else {
            $this->db->select('*');
            $this->db->from('parent_soal');
            $this->db->join('mapel', 'mapel.id_mapel = parent_soal.mapel_id_parent');
            $this->db->where('mapel.kelas_mapel', $data['siswa']['kelas']);
            $data['ulangan'] = $this->db->get()->result_array();
            $this->db->insert('nilai', [
                'nilai_judul_ulangan' => $data['ulangan'][0]['judul_ulangan'],
                'mapel_nilai' => $data['ulangan'][0]['mapel_id_parent'],
                'nilai_nama_siswa' => $this->session->userdata['username'],
                'nilai' => $nilai
            ]);
            $this->db->insert_batch('jawaban_soal', $jawaban);
            $this->session->set_flashdata('flash', 'Jawaban Terkirim');
            $this->session->set_flashdata('flashtype', 'success');
            redirect('siswa/ulangan');
        }
    }
    public function nilai()
    {
        $data['judul'] = 'Daftar Nilai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('mapel', 'mapel.id_mapel = nilai.mapel_nilai');
        $format = [];
        $datanilai = $this->db->get()->result_array();
        foreach ($datanilai as $dnilai) {
            $mapel = $dnilai['nama_mapel'];
            $mapelID = $dnilai['mapel_nilai'];
            if (count($format) == 0) {
                array_push($format, [
                    "id_mapel" => $mapelID,
                    "nama_mapel" => $mapel,
                    "data" => [
                        [
                            "judul_ulangan" => $dnilai['nilai_judul_ulangan'],
                            "nilai" => $dnilai['nilai'],
                        ]
                    ]
                ]);
            } else {
                $count = 0;
                $index = 0;
                for ($i = 0; $i < count($format); $i++) {
                    if ($mapelID == $format[$i]['id_mapel']) {
                        $count++;
                        $index = $i;
                    }
                }

                if ($count > 0) {
                    array_push($format[$index]['data'], [
                        "judul_ulangan" => $dnilai['nilai_judul_ulangan'],
                        "nilai" => $dnilai['nilai'],
                    ]);
                } else {
                    array_push($format, [
                        "id_mapel" => $mapelID,
                        "nama_mapel" => $mapel,
                        "data" => [
                            [
                                "judul_ulangan" => $dnilai['nilai_judul_ulangan'],
                                "nilai" => $dnilai['nilai'],
                            ]
                        ]
                    ]);
                }
            }
        }
        $data['nilai'] = $format;
        $this->load->view('templatesSiswa/topbar_siswa', $data);
        $this->load->view('siswa/nilai', $data);
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
