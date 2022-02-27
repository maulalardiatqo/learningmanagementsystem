<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('siswaModel');
    }
    public function index()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function profilSekolah()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profilSekolah', $data);
        $this->load->view('templates/footer');
    }
    public function tkj()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $Nprodi = 'TKJ';
        // $data['prodi'] = $this->db->get('prodi')->result_array();
        $Nprodi = 'TKJ';
        $data['prodi'] = $this->db->get_where('prodi', ['nama_prodi' => $Nprodi])->row_array();
        $data['kelas'] = $this->db->get_where('kelas', ['kelas_prodi' => $Nprodi])->num_rows();
        $data['guru'] = $this->db->get('guru')->result_array();
        // $data['tkj'] = $this->db->get_where('kelas', ['kelas_prodi' => $Nprodi])->result_array();
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru', 'guru.nuptk = kelas.wali_kelas');
        $data['tkj'] = $this->db->get()->result_array();
        // $this->load->model('Prodi_model', 'prodi');

        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tkj', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [

                'kelas_prodi' => 'TKJ',
                'tingkat' => $this->input->post('tingkat'),
                'nama_kelas' => $this->input->post('nama_kelas'),
                'wali_kelas' => $this->input->post('wali_kelas'),
            ];
            $cek = "SELECT * FROM kelas WHERE tingkat= '" . $data['tingkat'] . "' AND nama_kelas = '" . $data['nama_kelas'] . "' AND kelas_prodi = '" . $data['kelas_prodi'] . "'";
            $walas = "SELECT * FROM kelas WHERE wali_kelas = '" . $data['wali_kelas'] . "'";
            $selek = $this->db->query($cek)->num_rows();
            $cwalas = $this->db->query($walas)->num_rows();
            if ($selek > 0) {
                $this->session->set_flashdata('flash', 'Data Kelas Sudah ada !');
                $this->session->set_flashdata('flashtype', 'info');
            } elseif ($cwalas > 0) {
                $this->session->set_flashdata('flash', 'Walikelas Sudah Terdata !');
                $this->session->set_flashdata('flashtype', 'info');
            } else {
                $this->db->insert('kelas', $data);
                $this->session->set_flashdata('flash', 'Berhasil Insert');
                $this->session->set_flashdata('flashtype', 'success');
            }
            redirect('admin/tkj');
        }
    }
    public function tkro()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $Nprodi = 'TKR';
        $data['prodi'] = $this->db->get_where('prodi', ['nama_prodi' => $Nprodi])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru', 'guru.nuptk = kelas.wali_kelas');
        $data['tkr'] = $this->db->get()->result_array();
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tkro', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'kelas_prodi' => 'TKR',
                'tingkat' => $this->input->post('tingkat'),
                'nama_kelas' => $this->input->post('nama_kelas'),
                'wali_kelas' => $this->input->post('wali_kelas'),
            ];
            $cek = "SELECT * FROM kelas WHERE tingkat= '" . $data['tingkat'] . "' AND nama_kelas = '" . $data['nama_kelas'] . "' AND kelas_prodi = '" . $data['kelas_prodi'] . "'";
            $walas = "SELECT * FROM kelas WHERE wali_kelas = '" . $data['wali_kelas'] . "'";
            $selek = $this->db->query($cek)->num_rows();
            $cwalas = $this->db->query($walas)->num_rows();
            if ($selek > 0) {
                $this->session->set_flashdata('flash', 'Data Kelas Sudah ada !');
                $this->session->set_flashdata('flashtype', 'info');
            } elseif ($cwalas > 0) {
                $this->session->set_flashdata('flash', 'Walikelas Sudah Terdata !');
                $this->session->set_flashdata('flashtype', 'info');
            } else {
                $this->db->insert('kelas', $data);
                $this->session->set_flashdata('flash', 'Berhasil Insert');
                $this->session->set_flashdata('flashtype', 'success');
            }
            redirect('admin/tkro');
        }
    }
    public function apm()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $Nprodi = 'APM';
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['prodi'] = $this->db->get_where('prodi', ['nama_prodi' => $Nprodi])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru', 'guru.nuptk = kelas.wali_kelas');
        $data['apm'] = $this->db->get()->result_array();
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/apm', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'kelas_prodi' => 'APM',
                'tingkat' => $this->input->post('tingkat'),
                'nama_kelas' => $this->input->post('nama_kelas'),
                'wali_kelas' => $this->input->post('wali_kelas'),
            ];
            $cek = "SELECT * FROM kelas WHERE tingkat= '" . $data['tingkat'] . "' AND nama_kelas = '" . $data['nama_kelas'] . "' AND kelas_prodi = '" . $data['kelas_prodi'] . "'";
            $walas = "SELECT * FROM kelas WHERE wali_kelas = '" . $data['wali_kelas'] . "'";
            $selek = $this->db->query($cek)->num_rows();
            $cwalas = $this->db->query($walas)->num_rows();
            if ($selek > 0) {
                $this->session->set_flashdata('flash', 'Data Kelas Sudah ada !');
                $this->session->set_flashdata('flashtype', 'info');
            } elseif ($cwalas > 0) {
                $this->session->set_flashdata('flash', 'Walikelas Sudah Terdata !');
                $this->session->set_flashdata('flashtype', 'info');
            } else {
                $this->db->insert('kelas', $data);
                $this->session->set_flashdata('flash', 'Berhasil Insert');
                $this->session->set_flashdata('flashtype', 'success');
            }
            redirect('admin/apm');
        }
    }
    public function prodi()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/Prodi', $data);
        $this->load->view('templates/footer');
    }

    public function siswa()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        // $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.kelas');
        $data['siswa'] = $this->db->get()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }
    public function mapel()
    {
        $data['judul'] = 'Mapel';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->db->select('*');
        $this->db->from('mapel');
        $this->db->join('guru', 'guru.nuptk = mapel.guru_mapel');
        $this->db->join('kelas', 'kelas.id_kelas = mapel.kelas_mapel');
        $data['mapel'] = $this->db->get()->result_array();

        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/mapel', $data);
        $this->load->view('templates/footer');
    }
    public function guru()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }
    public function jadwal()
    {

        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();

        $this->load->model('Jadwal_model', 'jadwal');

        $sata['jadwal'] = $this->jadwal->getJadwal();
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $data['jammengajar'] = $this->db->get('jam_mengajar')->result_array();

        $this->form_validation->set_rules('hari', 'Hari', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/jadwal', $sata);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kelas' => $this->input->post('kelas'),
                'hari' => $this->input->post('hari'),
                'nuptk_guru' => $this->input->post('guru'),
                'id_mapel' => $this->input->post('mapel'),
                'jam_masuk' => $this->input->post('jam_masuk'),
                'jam_keluar' => $this->input->post('jam_keluar')
            ];
            $this->db->insert('jadwal', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Jadwal berhasil diatur
           </div>');
            redirect('admin/jadwal');
        }
    }
    public function dataUser()
    {
        $data['judul'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        $sata['user'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataUser', $sata);
        $this->load->view('templates/footer');
    }

    public function tambahGuru()
    {
        $konn = mysqli_connect('localhost', 'root', '', 'skripsi_lms');
        $nuptk = $this->input->post('nuptk');
        $cek = "SELECT * FROM guru WHERE nuptk='$nuptk'";
        $proses = mysqli_query($konn, $cek);
        $data = mysqli_fetch_array($proses, MYSQLI_NUM);

        if ($data > 0) {
            $this->session->set_flashdata('flash', 'NUPTK Sudah tersedia');
            $this->session->set_flashdata('flashtype', 'error');
            redirect('admin/guru');
        } else {
            $data = $this->input->post();
            $password = password_hash($data['nuptk'], PASSWORD_DEFAULT);
            $this->db->insert('guru', $data);
            $this->db->query("insert into user(nama,foto,username,password,role_id,is_active) values('$data[nama_guru]','default.png','$data[nuptk]','$password',2,1)");
            $this->session->set_flashdata('flash', 'Berhasil Insert');

            redirect('admin/guru');
        }
    }
    public function tambahSiswa()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'is_unique[siswa.nis]|required');

        $data = $this->input->post();
        $password = password_hash($data['nis'], PASSWORD_DEFAULT);

        if ($this->form_validation->run()) {
            $this->db->insert('siswa', $data);
            $this->db->query("insert into user(nama,foto,username,password,role_id,is_active) values('$data[nama_siswa]','default.png','$data[nis]','$password',3,1)");
            $this->session->set_flashdata('flash', 'Berhasil Insert');
            $this->session->set_flashdata('flashtype', 'success');
        } else {
            $this->session->set_flashdata('flash', 'NIS Sudah terdaftar');
            $this->session->set_flashdata('flashtype', 'info');
        }

        redirect('admin/siswa');
    }
    public function tambahMapel()
    {
        $this->form_validation->set_rules('nama_mapel', 'Nama Mapel', 'required');

        $data = $this->input->post();
        if ($this->form_validation->run()) {
            $this->db->insert('mapel', $data);
            $this->session->set_flashdata('flash', 'Berhasil Insert');
            $this->session->set_flashdata('flashtype', 'success');
        } else {
            $this->session->set_flashdata('flash', 'Gagal Menyimpan, Periksa Kembali');
            $this->session->set_flashdata('flashtype', 'info');
        }
        redirect('admin/mapel');
    }
    public function uploadSiswa()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'is_unique[siswa.nis]|required');
        //uplad file
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();

            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->open('uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    $passwordU = password_hash($row->getCellAtIndex(1), PASSWORD_DEFAULT);
                    if ($numrow > 1) {
                        $dataSiswa = array(
                            'nis' => $row->getCellAtIndex(1),
                            'nik' => $row->getCellAtIndex(2),
                            'nama_siswa' => $row->getCellAtIndex(3),
                            'alamat' => $row->getCellAtIndex(4),
                            'gender' => $row->getCellAtIndex(5),
                            'kontak' => $row->getCellAtIndex(6),
                            'kelas' => $row->getCellAtIndex(7),
                            'nama_ibu' => $row->getCellAtIndex(8),
                            'is_active' => 1,
                        );
                        $dataUser = array(
                            'nama' => $row->getCellAtIndex(3),
                            'foto' => 'default.png',
                            'username' => $row->getCellAtIndex(1),
                            'password' => $passwordU,
                            'role_id' => 3,
                            'is_active' => 1,
                            'date_create' => date('D-M-Y'),
                        );
                        if ($dataSiswa['nis']) {
                            $this->siswaModel->import_data($dataSiswa, $dataUser);
                        }
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('uploads/' . $file['file_name']);
                $this->session->set_flashdata('flash', 'Data Berhasil di Upload');
                $this->session->set_flashdata('flashtype', 'success');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
            $this->session->set_flashdata('flash', 'NIS Sudah terdaftar');
            $this->session->set_flashdata('flashtype', 'info');
        };
        redirect('admin/siswa');
    }
    public function hapusGuru($nuptk)
    {
        $sql = "DELETE g.*, u.* FROM guru g, user u WHERE g.nuptk = $nuptk AND u.username = $nuptk";
        $this->db->query($sql, [$nuptk]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/guru');
    }
    public function hapusKelas($id_kelas)
    {
        $sql = "DELETE FROM kelas WHERE id_kelas = $id_kelas";
        $this->db->query($sql, [$id_kelas]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/tkj');
    }
    public function hapusJadwal($id_jadwal)
    {
        $sql = "DELETE FROM jadwal WHERE id_jadwal = $id_jadwal";
        $this->db->query($sql, [$id_jadwal]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/jadwal');
    }
    public function hapusSiswa($nis)
    {
        $sql = "DELETE s.*, u.* FROM siswa s, user u WHERE s.nis = $nis AND u.username = $nis";
        $this->db->query($sql, [$nis]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/siswa');
    }
    public function hapusMapel($id)
    {
        $sql = "DELETE mapel, materi FROM mapel, materi WHERE mapel.id_mapel = $id AND materi.id_mapel = $id";

        $this->db->query($sql, [$id]);


        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/mapel');
    }


    public function atur_jadwal($idKelas)
    {
        $data['judul'] = 'Admin';
        $data['id_kelas'] = $idKelas;
        $query = "SELECT DISTINCT hari FROM jadwal";
        // LEFT JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
        // LEFT JOIN mapel ON jadwal.id_mapel = mapel.id_mapel
        // LEFT JOIN guru ON jadwal.id_guru = guru.id_guru
        // WHERE jadwal.id_kelas = ".$idKelas;
        $data['jadwal'] = $this->db->query($query)->result_array();
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata['username']])->row_array();
        // $sata['user'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/aturjadwal', $data);
        $this->load->view('templates/footer');
    }

    public function atur_jad($idKelas)
    {
        $data['judul'] = 'Admin';
        $data['id_kelas'] = $idKelas;
        $query = array(
            array("hari" => "Senin"),
            array("hari" => "Selasa"),
            array("hari" => "Rabu"),
            array("hari" => "Kamis"),
            array("hari" => "Jum'at"),
            array("hari" => "Sabtu"),
        );

        $data['jadwal'] = $query;
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $queryJadwalPerhari = "SELECT * FROM jadwal
            LEFT JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
            LEFT JOIN mapel ON jadwal.id_mapel = mapel.id_mapel
            LEFT JOIN guru ON jadwal.nuptk_guru = guru.nuptk
            WHERE jadwal.id_kelas = " . $idKelas;
        $data['jadwalPerhari'] = $this->db->query($queryJadwalPerhari)->result_array();
        echo json_encode($data);
    }

    public function tambahJadwal()
    {
        $data = $this->input->post();
        $insert = $this->db->insert('jadwal', $data);

        if ($insert) {
            echo json_encode(array(
                "status" => true,
                "messages" => "Succes Insert Schedule !!"
            ));
        } else {
            echo json_encode(array(
                "status" => false,
                "messages" => "Failed Insert Schedule !!"
            ));
        }
    }
}
