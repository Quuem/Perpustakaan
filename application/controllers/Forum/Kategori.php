<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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

        $this->load->model('Kategori_Model');

    }

    public function index()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Threads');
        }
        $Kategori = $this->Kategori_Model->getAllKategori();

        $data = [
            'Kategori' => $Kategori,
        ];

        $this->load->view('Template/Header');
        $this->load->view('Forum/Kategori/Index', $data);
        $this->load->view('Template/Footer');
    }

    public function tambah()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Threads');
        }

        $data['JenisKategori'] = [
            'Berita',
            'Threads',
            'Pelatihan',
            'Pengetahuan',
            'FAQ',
            'Komponen',
            'Sarana Prasarana',
            'Pelayanan',
            'Tenaga',
            'Pendirian',
            'Pencantuman NPP',
            'Struktur Organisasi',
            'Program Perpustakaan',
            'Pengelolaan',
            'Inovasi Dan Kreativitas',
            'Tingkat Kegemaran Membaca',
            'Indeks Literasi',
        ];


        $this->load->view('Template/Header');
        $this->load->view('Forum/Kategori/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addKategori()
    {
        $this->form_validation->set_rules('Kategori', 'Kategori', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('JenisKategori', 'Jenis Kategori', 'trim|required|min_length[2]');
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('Kategori')),
                'jenis_kategori' => htmlspecialchars($this->input->post('JenisKategori')),
            ];


            if ($this->Kategori_Model->addKategori($data)) {
                $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
                redirect('Forum/Kategori');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan kategori');
                redirect('Forum/Kategori/Tambah');
            }
        }
    }

    public function deleteKategori($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Kategori');
        }
        try {
            if ($this->Kategori_Model->deleteKategori($id)) {
                $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus kategori.');
            }
        } catch (Exception $e) {
            // Tangkap error database khusus FK constraint
            if (strpos($e->getMessage(), 'Cannot delete or update a parent row') !== false) {
                $this->session->set_flashdata('error', 'Data kategori tidak bisa dihapus karena masih digunakan di data lain.');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }

        redirect('Forum/Kategori');
    }


    public function Edit($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Kategori');
        }

        $data = [
            'kategori' => $this->Kategori_Model->getKategoriById($id),
            'kategori_id' => $id,
        ];
        $data['JenisKategori'] = [
            'Berita',
            'Threads',
            'Pelatihan',
            'Pengetahuan',
            'FAQ',
            'Komponen',
            'Sarana Prasarana',
            'Pelayanan',
            'Tenaga',
            'Pendirian',
            'Pencantuman NPP',
            'Struktur Organisasi',
            'Program Perpustakaan',
            'Pengelolaan',
            'Inovasi Dan Kreativitas',
            'Tingkat Kegemaran Membaca',
            'Indeks Literasi',
        ];

        $this->load->view('Template/Header');
        $this->load->view('Forum/Kategori/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editKategori($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Kategori');
        }
        $this->form_validation->set_rules('Kategori', 'Kategori', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('JenisKategori', 'Jenis Kategori', 'trim|required|min_length[2]');
        if ($this->form_validation->run() == FALSE) {
            $this->Edit($id);
        } else {
            $data = [
                'nama_kategori' => htmlspecialchars($this->input->post('Kategori')),
                'jenis_kategori' => htmlspecialchars($this->input->post('JenisKategori')),
            ];


            if ($this->Kategori_Model->editKategori($id, $data)) {
                $this->session->set_flashdata('success', 'Kategori berhasil diperbarui');
                redirect('Forum/Kategori');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui kategori');
                redirect('Forum/Kategori/Edit/' . $id);
            }
        }
    }

}

/* End of file Kategori.php */
