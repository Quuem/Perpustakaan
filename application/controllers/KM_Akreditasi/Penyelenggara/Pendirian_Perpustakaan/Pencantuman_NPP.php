<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pencantuman_NPP extends CI_Controller
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
            'PencantumanNPP' => $this->Akreditasi_Model->getAkreditasiPencantumanNPP(),
            'Kategori' => $this->Akreditasi_Model->getKategoriPencantumanNPP(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {

        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Akreditasi/Pendirian_Perpustakaan/Pencantuman_NPP');
        }

        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriPencantumanNPP(),
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addPencantumanNPP()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Tambah();
        } else {

            $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Penyelenggara/Pencantuman_NPP/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
            $config['max_size'] = 9048;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('File')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/Tambah');
            } else {
                $data = [
                    'judul_komponen' => htmlspecialchars($this->input->post('Judul')),
                    'dokumen' => $this->upload->data('file_name'),
                    'user_id' => $this->session->userdata('user_id'),
                    'kategori_id' => htmlspecialchars($this->input->post('Kategori')),
                    'tanggal_upload' => date('Y-m-d H:i:s'),
                ];


                if ($this->Akreditasi_Model->addAkreditasi($data)) {
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                    redirect('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP');
                } else {
                    $this->session->set_flashdata('error', 'Data gagal ditambahkan');
                    redirect('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/Tambah');
                }
            }
        }
    }


    public function Edit($id)
    {
        $data = [
            'PencantumanNPP' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriPencantumanNPP()
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editPencantumanNPP($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/Edit/' . $id);
        } else {
            $data = [
                'judul_komponen' => htmlspecialchars($this->input->post('Judul')),
                'kategori_id' => htmlspecialchars($this->input->post('Kategori')),
            ];

            if (!empty($_FILES['File']['name'])) {
                $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Penyelenggara/Pencantuman_NPP/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
                $config['max_size'] = 9048;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('File')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/Edit/' . $id);
                } else {
                    $data['dokumen'] = $this->upload->data('file_name');
                }
            }

            if ($this->Akreditasi_Model->editAkreditasi($id, $data)) {
                $this->session->set_flashdata('success', 'Data berhasil diupdate');
                redirect('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diupdate');
                redirect('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP/Edit/' . $id);
            }
        }
    }

    public function deletePencantumanNPP($id)
    {
        $NPP = $this->Akreditasi_Model->getAkreditasiById($id);

        if ($this->Akreditasi_Model->deleteAkreditasi($id)) {
            if ($NPP && !empty($NPP->dokumen)) {
                $file_path = './Assets/KMS/KM_Akreditasi/Penyelenggara/Pencantuman_NPP/' . $NPP->dokumen;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        redirect('KM_Akreditasi/Penyelenggara/Pendirian_Perpustakaan/Pencantuman_NPP');
    }


}

/* End of file Pencantuman_NPP.php */
