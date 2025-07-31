<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_Model');

        // Harus login
        if (!$this->session->userdata('username')) {
            redirect('Auth/login');
        }

        if ($this->session->userdata('nama_role') != 'Admin') {
            redirect('');

        }
    }

    public function index()
    {
        $data['users'] = $this->User_Model->getAll();
        $this->load->view('Template/Header');
        $this->load->view('Users/index', $data);
        $this->load->view('Template/Footer');

    }

    public function Tambah()
    {

        $data['role'] = $this->User_Model->getRole();

        $this->load->view('Template/Header');
        $this->load->view('Users/Tambah', $data);
        $this->load->view('Template/Footer');

    }

    public function addUser()
    {

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->Tambah();
        } else {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
            ];
            $User = $this->User_Model->insert($data);
            if ($User) {
                $this->session->set_flashdata('success', 'Berhasil Menambahkan User Baru');
                redirect('Users');
            } else {
                $this->session->set_flashdata('Error', 'Gagal Menambahkan User Baru');
                redirect('Users/Tambah');
            }

        }
    }


    public function Edit($id)
    {
        $data['user'] = $this->User_Model->getById($id);
        $data['role'] = $this->User_Model->getRole();

        $this->load->view('Template/Header');
        $this->load->view('users/edit', $data);
        $this->load->view('Template/Footer');
    }



    public function editUser($id)
    {
        $data['user'] = $this->User_Model->getById($id);

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/edit', $data);
        } else {
            $update = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role_id'),
            ];
            $password = $this->input->post('password');
            if (!empty($password)) {
                $update['password'] = password_hash($password, PASSWORD_DEFAULT);
            }


            $user = $this->User_Model->update($id, $update);
            if ($user) {
                $this->session->set_flashdata('success', 'Berhasil Memperbarui Data User');
                redirect('Users');
            } else {
                $this->session->set_flashdata('success', 'Berhasil Memperbarui Data User');
                redirect('User/Edit/' . $id);
            }
        }
    }

    public function Hapus($id)
    {
        $user = $this->User_Model->delete($id);
        if ($user) {
            $this->session->set_flashdata('success', 'Berhasil Menghapus Data User');
            redirect('Users');
        } else {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data User');
            redirect('Users');

        }

    }
}
