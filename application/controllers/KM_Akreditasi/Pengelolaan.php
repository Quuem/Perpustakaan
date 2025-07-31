<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengelolaan extends CI_Controller
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
            'Pengelolaan' => $this->Akreditasi_Model->getAkreditasiPengelolaan(),
            'Kategori' => $this->Akreditasi_Model->getKategoriPengelolaan(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Pengelolaan/Index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Pengelolaan');
        }

        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriPengelolaan(),
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Pengelolaan/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addPengelolaan()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
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

            if (!empty($_FILES['File']['name'])) {
                $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Pengelolaan/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|xls|xlsx';
                $config['max_size'] = 9048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('File')) {
                    $data['dokumen'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $this->Tambah();
                    return;
                }
            }


            if ($this->Akreditasi_Model->addAkreditasi($data)) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                redirect('KM_Akreditasi/Pengelolaan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal ditambahkan');
                redirect('KM_Akreditasi/Pengelolaan/Tambah');

            }
        }
    }

    public function Edit($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Pengelolaan');
        }

        $data = [
            'Pengelolaan' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriPengelolaan(),
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Pengelolaan/Edit', $data);
        $this->load->view('Template/Footer');
    }


    public function editPengelolaan($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Edit($id);
        } else {
            $data = [
                'judul_komponen' => $this->input->post('Judul'),
                'deskripsi' => $this->input->post('Deskripsi'),
                'kategori_id' => $this->input->post('Kategori'),
            ];

            if (!empty($_FILES['File']['name'])) {
                $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Pengelolaan/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|xls|xlsx';
                $config['max_size'] = 9048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('File')) {
                    $data['dokumen'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $this->Edit($id);
                    return;
                }
            }

            if ($this->Akreditasi_Model->editAkreditasi($id, $data)) {
                $this->session->set_flashdata('success', 'Data berhasil diubah');
                redirect('KM_Akreditasi/Pengelolaan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diubah');
                redirect('KM_Akreditasi/Pengelolaan/Edit/' . $id);
            }
        }
    }


    public function deletePengelolaan($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Pengelolaan');
        }

        $pengelolaan = $this->Akreditasi_Model->getAkreditasiById($id);

        if ($this->Akreditasi_Model->deleteAkreditasi($id)) {
            if ($pengelolaan && !empty($pengelolaan->dokumen)) {
                $file_path = './Assets/KMS/KM_Akreditasi/Pengelolaan/' . $pengelolaan->dokumen;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        redirect('KM_Akreditasi/Pengelolaan');
    }

}

/* End of file Pengelolaan.php */
