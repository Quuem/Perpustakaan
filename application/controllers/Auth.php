<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_Model');

        if ($this->session->userdata('username') != null) {
            redirect('KM_Berita');
        }
    }

    public function index()
    {
        $this->load->view('Auth/Login');
    }
    public function login()
    {
        $this->load->view('Auth/Login');
    }
    // public function register()
    // {
    //     $this->load->view('Auth/Register');
    // }

    public function registerUser()
    {

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[25]|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('confrim_password', 'Konfirmasi Password', 'trim|required|matches[password]|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Auth/Register');
        } else {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => '3',
            );
            $this->Auth_Model->RegisterUser($data);
            redirect('Auth');
        }
    }

    public function loginUser()
    {
        $this->form_validation->set_rules('EmailUsername', 'Email Atau Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Auth/Login');
        } else {
            $emailOrUsername = $this->input->post('EmailUsername');
            $password = $this->input->post('password');

            $user = $this->Auth_Model->CekUser($emailOrUsername);

            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata([
                    'username' => $user->username,
                    'user_id' => $user->user_id,
                    'role_id' => $user->role_id,
                    'nama_role' => $user->nama_role,
                    'nama_lengkap' => $user->nama_lengkap,
                    'email' => $user->email,
                ]);
                redirect('KM_Berita');
            } else {
                $this->session->set_flashdata('error', 'Email/Username atau Password salah.');
                redirect('Auth/login');
            }
        }
    }


}

/* End of file Auth.php */
