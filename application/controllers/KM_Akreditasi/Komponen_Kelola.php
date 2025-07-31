<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komponen_Kelola extends CI_Controller
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
            'Komponen' => $this->Akreditasi_Model->getAkreditasiKomponen(),
        ];


        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Komponen_Kelola/Index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {
        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriKomponen(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Komponen_Kelola/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addKomponen()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        // $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Tambah();
        } else {

            $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Komponen_Kelola/';
            $config['allowed_types'] = 'pdf|doc|docx|txt';
            $config['max_size'] = 9048;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('File')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('KM_Akreditasi/Komponen_Kelola/Tambah');
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
                $this->session->set_flashdata('success', 'Data Komponen berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data Komponen.');
                redirect('KM_Akreditasi/Komponen_Kelola/Tambah');

            }
            redirect('KM_Akreditasi/Komponen_Kelola');
        }
    }

    public function Edit($id)
    {
        $data = [
            'Komponen' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriKomponen(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Komponen_Kelola/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editKomponen($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        // $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('KM_Akreditasi/Komponen_Kelola/Edit/' . $id);
        } else {
            $data = [
                'judul_komponen' => $this->input->post('Judul'),
                // 'deskripsi' => $this->input->post('Deskripsi'),
                'kategori_id' => $this->input->post('Kategori'),
            ];

            if (!empty($_FILES['File']['name'])) {
                $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Komponen_Kelola/';
                $config['allowed_types'] = 'pdf|doc|docx|txt';
                $config['max_size'] = 9048;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('File')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('KM_Akreditasi/Komponen_Kelola/Edit/' . $id);
                }
                $upload_data = $this->upload->data();
                $data['dokumen'] = $upload_data['file_name'];
            }

            if ($this->Akreditasi_Model->editAkreditasi($id, $data)) {
                $this->session->set_flashdata('success', 'Data Komponen berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data Komponen.');
                redirect('KM_Akreditasi/Komponen_Kelola/Edit/' . $id);
            }
            redirect('KM_Akreditasi/Komponen_Kelola');
        }
    }

    public function deleteKomponen($id)
    {
        $komponen = $this->Akreditasi_Model->getAkreditasiById($id);

        if ($this->Akreditasi_Model->deleteAkreditasi($id)) {
            if ($komponen->dokumen && file_exists('./Assets/KMS/KM_Akreditasi/Komponen_Kelola/' . $komponen->dokumen)) {
                unlink('./Assets/KMS/KM_Akreditasi/Komponen_Kelola/' . $komponen->dokumen);
            }
            $this->session->set_flashdata('success', 'Data Komponen berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data Komponen.');
        }
        redirect('KM_Akreditasi/Komponen_Kelola');
    }

}

/* End of file Komponen_Kelola.php */
