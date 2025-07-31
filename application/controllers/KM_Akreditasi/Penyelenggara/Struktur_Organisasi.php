<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Struktur_Organisasi extends CI_Controller
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
            'StrukturOrganisasi' => $this->Akreditasi_Model->getAkreditasiStrukturOrganisasi(),
            'Kategori' => $this->Akreditasi_Model->getKategoriStrukturOrganisasi(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Penyelenggara/Struktur_Organisasi/Index', $data);
        $this->load->view('Template/Footer');

    }
    public function Tambah()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Penyelenggara/Struktur_Organisasi');
        }

        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriStrukturOrganisasi(),
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Penyelenggara/Struktur_Organisasi/Tambah', $data);
        $this->load->view('Template/Footer');
    }


    public function addStrukturOrganisasi()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('Deskripsi2', 'Deskripsi Tugas', 'required|trim');
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
            $this->db->insert('akreditasikm', $data);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('KM_Akreditasi/Penyelenggara/Struktur_Organisasi');
        }
    }


    public function Edit($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Penyelenggara/Struktur_Organisasi');
        }

        $data = [
            'StrukturOrganisasi' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriStrukturOrganisasi(),
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Penyelenggara/Struktur_Organisasi/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editStrukturOrganisasi($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('Deskripsi2', 'Deskripsi Tugas', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Edit($id);
        } else {
            $data = [
                'judul_komponen' => $this->input->post('Judul'),
                'deskripsi' => $this->input->post('Deskripsi'),
                'deskripsi2' => $this->input->post('Deskripsi2'),
                'kategori_id' => $this->input->post('Kategori'),
            ];
            $this->db->where('komponen_id', $id);
            if ($this->db->update('akreditasikm', $data)) {
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                redirect('KM_Akreditasi/Penyelenggara/Struktur_Organisasi');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah data');
                redirect('KM_Akreditasi/Penyelenggara/Struktur_Organisasi/Edit/' . $id);
            }
        }
    }

    public function deleteStrukturOrganisasi($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Penyelenggara/Struktur_Organisasi');
        }

        if ($this->Akreditasi_Model->deleteAkreditasi($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data');
        }
        redirect('KM_Akreditasi/Penyelenggara/Struktur_Organisasi');
    }
}

/* End of file Struktur_Organisasi.php */
