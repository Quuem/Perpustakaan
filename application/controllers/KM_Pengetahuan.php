<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KM_Pengetahuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('Auth');
        }
        // if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
        //     redirect('');
        // }

        $this->load->model('Pengetahuan_Model');
    }

    public function index()
    {
        $Pengetahuan = $this->Pengetahuan_Model->getAllPengetahuan();
        $Kategori = $this->Pengetahuan_Model->getKategoriByJenis();
        $data = [
            'Pengetahuan' => $Pengetahuan,
            'Kategori' => $Kategori,
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Pengetahuan/Index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Pengetahuan');
        }
        $kategori = $this->Pengetahuan_Model->getKategoriByJenis();
        $data = [
            'Kategori' => $kategori,
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Pengetahuan/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addPengetahuan()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE || empty($_FILES['File']['name'])) {
            if (empty($_FILES['File']['name'])) {
                $this->session->set_flashdata('error', 'File wajib diunggah.');
            }
            $this->Tambah();
            return;
        }

        $config['upload_path'] = './Assets/KMS/Pengetahuan/';
        $config['allowed_types'] = 'pdf|doc|docx|txt|ppt|pptx|xls|xlsx';
        $config['max_size'] = 30480;
        $this->load->library('upload', $config);

        $file_uploaded = null;
        if (!$this->upload->do_upload('File')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('KM_Pengetahuan/Tambah');
            return;
        } else {
            $file_data = $this->upload->data();
            $file_uploaded = $file_data['file_name'];
        }

        $data = [
            'judul_pengetahuan' => htmlspecialchars($this->input->post('Judul')),
            'user_id' => $this->session->userdata('user_id'),
            'kategori_id' => $this->input->post('kategori_id'),
            'tanggal_upload' => date('Y-m-d'),
            'file_pendukung' => $file_uploaded,
        ];

        if ($this->Pengetahuan_Model->addPengetahuan($data)) {
            $this->session->set_flashdata('success', 'Pengetahuan berhasil ditambahkan');
            redirect('KM_Pengetahuan');
        } else {
            $this->session->set_flashdata('error', 'Pengetahuan gagal ditambahkan');
            redirect('KM_Pengetahuan/Tambah');
        }
    }

    public function Edit($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Pengetahuan');
        }
        $pengetahuan = $this->Pengetahuan_Model->getPengetahuanById($id);
        $kategori = $this->Pengetahuan_Model->getKategoriByJenis();
        $data = [
            'Pengetahuan' => $pengetahuan,
            'Kategori' => $kategori,
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Pengetahuan/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editPengetahuan($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->editPengetahuan($id);
            return;
        }

        $data = [
            'judul_pengetahuan' => htmlspecialchars($this->input->post('Judul')),
            'user_id' => $this->session->userdata('user_id'),
            'kategori_id' => $this->input->post('kategori_id'),
        ];

        if (!empty($_FILES['File']['name'])) {
            $config['upload_path'] = './Assets/KMS/Pengetahuan/';
            $config['allowed_types'] = 'pdf|doc|docx|txt|ppt|pptx|xls|xlsx';
            $config['max_size'] = 30480;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('File')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('KM_Pengetahuan/editPengetahuan/' . $id);
                return;
            } else {
                $file_data = $this->upload->data();
                $data['file_pendukung'] = $file_data['file_name'];
            }
        }

        if ($this->Pengetahuan_Model->editPengetahuan($id, $data)) {
            $this->session->set_flashdata('success', 'Pengetahuan berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Pengetahuan gagal diperbarui');
        }
        redirect('KM_Pengetahuan');
    }

    public function deletePengetahuan($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Pengetahuan');
        }
        $pengetahuan = $this->Pengetahuan_Model->getPengetahuanById($id);
        if ($pengetahuan->file_pendukung && file_exists('./Assets/KMS/Pengetahuan/' . $pengetahuan->file_pendukung)) {
            unlink('./Assets/KMS/Pengetahuan/' . $pengetahuan->file_pendukung);
        }
        if ($this->Pengetahuan_Model->deletePengetahuan($id)) {
            $this->session->set_flashdata('success', 'Pengetahuan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Pengetahuan gagal dihapus');
        }
        redirect('KM_Pengetahuan');
    }


}

/* End of file KM_Pengetahuan.php */
