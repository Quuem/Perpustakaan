<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tenaga extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Akreditasi_Model');
        if (!$this->session->userdata('username')) {
            redirect('Auth/login');
        }
        if ($this->session->userdata('nama_role') != 'Admin' && $this->session->userdata('nama_role') != 'Pustakawan') {
            redirect('');
        }
    }

    public function index()
    {
        $data = [
            'Tenaga' => $this->Akreditasi_Model->getAkreditasiTenaga(),
            'Kategori' => $this->Akreditasi_Model->getKategoriTenaga(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Tenaga/index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {

        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriTenaga(),
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Tenaga/tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addTenaga()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('Deskripsi2', 'Deskripsi2', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Tambah();
        } else {
            $data = [
                'judul_komponen' => $this->input->post('Judul'),
                'deskripsi' => $this->input->post('Deskripsi'),
                'deskripsi2' => $this->input->post('Deskripsi2'),
                'kategori_id' => $this->input->post('Kategori'),
                'tanggal_upload' => date('Y-m-d H:i:s'),
                'user_id' => $this->session->userdata('user_id'),
            ];
            if ($this->db->insert('akreditasikm', $data)) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                redirect('KM_Akreditasi/Tenaga');
            } else {
                $this->session->set_flashdata('error', 'Data gagal ditambahkan');
                redirect('KM_Akreditasi/Tenaga/Tambah');
            }
        }
    }

    public function Edit($id)
    {
        $data = [
            'Tenaga' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriTenaga(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Tenaga/edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editTenaga($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Tugas Pokok ', 'required|trim');
        $this->form_validation->set_rules('Deskripsi2', 'Status', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('KM_Akreditasi/Tenaga/Edit/' . $this->input->post('id'));
        } else {
            $data = [
                'judul_komponen' => $this->input->post('Judul'),
                'deskripsi' => $this->input->post('Deskripsi'),
                'deskripsi2' => $this->input->post('Deskripsi2'),
                'kategori_id' => $this->input->post('Kategori'),
            ];
            if ($this->Akreditasi_Model->editAkreditasi($id, $data)) {
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                redirect('KM_Akreditasi/Tenaga');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diubah');
                redirect('KM_Akreditasi/Tenaga/Edit/' . $id);
            }
        }
    }
}

/* End of file Tenaga.php */
