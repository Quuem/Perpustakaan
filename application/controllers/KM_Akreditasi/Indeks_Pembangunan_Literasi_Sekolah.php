<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Indeks_Pembangunan_Literasi_Sekolah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Akreditasi_Model');
        $this->load->library('form_validation');
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
            'IndeksPembangunanLiterasiSekolah' => $this->Akreditasi_Model->getAkreditasiIndeksPembangunanLiterasiSekolah(),
        ];


        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/Index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {
        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriIndeksPembangunanLiterasiSekolah(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addIndeksPembangunanLiterasiSekolah()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        // $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Tambah();
        } else {

            $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/';
            $config['allowed_types'] = 'pdf|doc|docx|txt';
            $config['max_size'] = 9048;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('File')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/Tambah');
            }
            $upload_data = $this->upload->data();
            $data = [
                'judul_komponen' => $this->input->post('Judul'),
                // 'deskripsi' => $this->input->post('Deskripsi'),
                'kategori_id' => $this->input->post('Kategori'),
                'dokumen' => $upload_data['file_name'],
                'tanggal_upload' => date('Y-m-d H:i:s'),
                'user_id' => $this->session->userdata('user_id'),
            ];

            if ($this->Akreditasi_Model->addAkreditasi($data)) {
                $this->session->set_flashdata('success', 'Data Indeks Pembangunan Literasi Sekolah berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data Indeks Pembangunan Literasi Sekolah.');
                redirect('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/Tambah');

            }
            redirect('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah');
        }
    }

    public function Edit($id)
    {
        $data = [
            'IndeksPembangunanLiterasiSekolah' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriIndeksPembangunanLiterasiSekolah(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editIndeksPembangunanLiterasiSekolah($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        // $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/Edit/' . $id);
        } else {
            $data = [
                'judul_komponen' => $this->input->post('Judul'),
                // 'deskripsi' => $this->input->post('Deskripsi'),
                'kategori_id' => $this->input->post('Kategori'),
            ];

            if (!empty($_FILES['File']['name'])) {
                $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/';
                $config['allowed_types'] = 'pdf|doc|docx|txt|odt';
                $config['max_size'] = 9048;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('File')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/Edit/' . $id);
                }
                $upload_data = $this->upload->data();
                $data['dokumen'] = $upload_data['file_name'];
            }

            if ($this->Akreditasi_Model->editAkreditasi($id, $data)) {
                $this->session->set_flashdata('success', 'Data Indeks Pembangunan Literasi Sekolah berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data Indeks Pembangunan Literasi Sekolah.');
                redirect('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/Edit/' . $id);
            }
            redirect('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah');
        }
    }

    public function deleteKomponen($id)
    {
        $komponen = $this->Akreditasi_Model->getAkreditasiById($id);

        if ($this->Akreditasi_Model->deleteAkreditasi($id)) {
            if ($komponen->dokumen && file_exists('./Assets/KMS/KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/' . $komponen->dokumen)) {
                unlink('./Assets/KMS/KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah/' . $komponen->dokumen);
            }
            $this->session->set_flashdata('success', 'Data Indeks berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data Indeks.');
        }
        redirect('KM_Akreditasi/Indeks_Pembangunan_Literasi_Sekolah');
    }

}

/* End of file Indeks_Pembangunan_Literasi_Sekolah.php */
