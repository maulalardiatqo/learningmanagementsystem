<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus diisi',
        ]);
        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Login Form';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //fungsi login (private / hanya bisa di akses dihalaman ini)
            $this->_login();
        }
    }


    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // query builder CI = select * from ... where
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // cek data user
        if ($user) {
            // cek aktivasi akun
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        'id' => $user['id']
                    ];
                    // simpen $data ke session
                    $this->session->set_userdata($data);
                    // cek role_id
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('guru');
                    } else {
                        redirect('siswa');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password yang anda masukan salah
                   </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Anda belum mengaktivasi akun
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar
          </div>');
            redirect('auth');
        }
    }
    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi',
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus diisi',
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[6]|matches[password2]', [
            'required' => 'Password harus diisi',
            'matches' => 'Password tidak sesuai',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Form Registrasi';
            $this->load->view('templates/auth_header.php', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/auth_footer.php');
        } else {
            $data = [
                'nama' =>  htmlspecialchars($this->input->post('nama', true)),
                'foto' => 'default.png',
                'username' =>  htmlspecialchars($this->input->post('username', true)),
                'password' =>  htmlspecialchars(password_hash($this->input->post('password1'), PASSWORD_DEFAULT)),
                'role_id' =>  3,
                'is_active' => 1,
                'date_create' => time()
            ];
            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            registrasi sukses
          </div>');
            redirect('auth');
        }
    }
    public function panduan()
    {
        $data['judul'] = 'Panduan';
        $this->load->view('auth/panduan');
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda telah keluar
          </div>');
        redirect('auth');
    }
    public function blocked()
    {

        $this->load->view('auth/blocked');
    }
}
