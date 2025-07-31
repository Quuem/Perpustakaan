<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
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
            'Pelayanan' => $this->Akreditasi_Model->getAkreditasiPelayanan(),
            'Kategori' => $this->Akreditasi_Model->getKategoriPelayanan(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Pelayanan/index', $data);
        $this->load->view('Template/Footer');

    }

    public function Tambah()
    {
        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriPelayanan(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Pelayanan/tambah', $data);
        $this->load->view('Template/Footer');

    }

    public function addPelayanan()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Tambah();
        } else {
            $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Pelayanan/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
            $config['max_size'] = 9048;
            $this->load->library('upload', $config);

            if (!empty($_FILES['File']['name']) && !$this->upload->do_upload('File')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('KM_Akreditasi/Pelayanan/Tambah');
            } else {
                $file_name = !empty($_FILES['File']['name']) ? $this->upload->data('file_name') : null;
                $data = [
                    'judul_komponen' => htmlspecialchars($this->input->post('Judul', true)),
                    'deskripsi' => htmlspecialchars($this->input->post('Deskripsi', true)),
                    'kategori_id' => htmlspecialchars($this->input->post('Kategori', true)),
                    'dokumen' => $file_name,
                    'tanggal_upload' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                ];
                if ($this->Akreditasi_Model->addAkreditasi($data)) {
                    $this->session->set_flashdata('success', 'Data Pelayanan berhasil ditambahkan.');
                    redirect('KM_Akreditasi/Pelayanan');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan data Pelayanan.');
                    redirect('KM_Akreditasi/Pelayanan/Tambah');
                }
            }
        }
    }

    public function Edit($id)
    {
        $data = [
            'Pelayanan' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriPelayanan(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Pelayanan/edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editPelayanan($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Edit($id);
        } else {
            $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Pelayanan/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
            $config['max_size'] = 9048;
            $this->load->library('upload', $config);

            $data = [
                'judul_komponen' => htmlspecialchars($this->input->post('Judul', true)),
                'deskripsi' => htmlspecialchars($this->input->post('Deskripsi', true)),
                'kategori_id' => htmlspecialchars($this->input->post('Kategori', true)),
            ];

            if (!empty($_FILES['File']['name'])) {
                if (!$this->upload->do_upload('File')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('KM_Akreditasi/Pelayanan/Edit/' . $id);
                    return;
                } else {
                    $file_name = $this->upload->data('file_name');
                    $data['dokumen'] = $file_name;
                }
            }

            if ($this->Akreditasi_Model->editAkreditasi($id, $data)) {
                $this->session->set_flashdata('success', 'Data Pelayanan berhasil diperbarui.');
                redirect('KM_Akreditasi/Pelayanan');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data Pelayanan.');
                redirect('KM_Akreditasi/Pelayanan/Edit/' . $id);
            }
        }
    }

    public function deletePelayanan($id)
    {
        $pelayanan = $this->Akreditasi_Model->getAkreditasiById($id);

        if ($this->Akreditasi_Model->deleteAkreditasi($id)) {
            if ($pelayanan && !empty($pelayanan->dokumen)) {
                $file_path = FCPATH . 'Assets/KMS/KM_Akreditasi/Pelayanan/' . $pelayanan->dokumen;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $this->session->set_flashdata('success', 'Data Pelayanan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data Pelayanan.');
        }
        redirect('KM_Akreditasi/Pelayanan');
    }

}

/* End of file Pelayanan.php */
