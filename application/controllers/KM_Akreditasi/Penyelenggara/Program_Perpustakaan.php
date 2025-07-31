<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Program_Perpustakaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('Auth');
        }
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('');
        }
        $this->load->model('Akreditasi_Model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = [
            'ProgramPerpustakaan' => $this->Akreditasi_Model->getAkreditasiProgramPrespustakaan(),
            'Kategori' => $this->Akreditasi_Model->getKategoriProgramPerpustakaan(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Penyelenggara/Program_Perpustakaan/Index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Penyelenggara/Program_Perpustakaan');
        }
        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriProgramPerpustakaan(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Penyelenggara/Program_Perpustakaan/Tambah', $data);
        $this->load->view('Template/Footer');
    }


    public function addProgramPerpustakaan()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Program', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Tambah();
        } else {
            $data = [
                'judul_komponen' => $this->input->post('Judul'),
                'deskripsi' => $this->input->post('Deskripsi'),
                'kategori_id' => $this->input->post('Kategori'),
                'user_id' => $this->session->userdata('user_id'),
                'tanggal_upload' => date('Y-m-d H:i:s'),
            ];
            if ($this->Akreditasi_Model->addAkreditasi($data)) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                redirect('KM_Akreditasi/Penyelenggara/Program_Perpustakaan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal ditambahkan');

                redirect('KM_Akreditasi/Penyelenggara/Program_Perpustakaan/Tambah');
            }
        }
    }


    public function Edit($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Penyelenggara/Program_Perpustakaan');
        }

        $data = [
            'ProgramPerpustakaan' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriProgramPerpustakaan(),
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Penyelenggara/Program_Perpustakaan/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editProgramPerpustakaan($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Program', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('KM_Akreditasi/Penyelenggara/Program_Perpustakaan/Edit/' . $id);
        } else {
            $data = [
                'judul_komponen' => $this->input->post('Judul'),
                'deskripsi' => $this->input->post('Deskripsi'),
                'kategori_id' => $this->input->post('Kategori'),
            ];
            if ($this->Akreditasi_Model->editAkreditasi($id, $data)) {
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                redirect('KM_Akreditasi/Penyelenggara/Program_Perpustakaan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diubah');
                redirect('KM_Akreditasi/Penyelenggara/Program_Perpustakaan/Edit/' . $id);
            }
        }
    }

    public function deleteProgramPerpustakaan($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Penyelenggara/Program_Perpustakaan');
        }

        if ($this->Akreditasi_Model->deleteAkreditasi($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        redirect('KM_Akreditasi/Penyelenggara/Program_Perpustakaan');
    }

}

/* End of file Program_Perpustakaan.php */
