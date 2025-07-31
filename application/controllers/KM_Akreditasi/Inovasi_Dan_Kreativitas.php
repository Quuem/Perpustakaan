<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Inovasi_Dan_Kreativitas extends CI_Controller
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
            'InovasiDanKreativitas' => $this->Akreditasi_Model->getAkreditasiInovasiKreativitas(),
            'Kategori' => $this->Akreditasi_Model->getKategoriInovasiKreativitas(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Inovasi_Dan_Kreativitas/Index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {
        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriInovasiKreativitas(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Inovasi_Dan_Kreativitas/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addInovasiDanKreativitas()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Tambah();
        } else {

            $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Inovasi_Dan_Kreativitas/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 9048;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('File')) {
                $data = [
                    'judul_komponen' => htmlspecialchars($this->input->post('Judul')),
                    'deskripsi' => htmlspecialchars($this->input->post('Deskripsi')),
                    'kategori_id' => htmlspecialchars($this->input->post('Kategori')),
                    'tanggal_upload' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                ];
            } else {
                $data = [
                    'judul_komponen' => htmlspecialchars($this->input->post('Judul')),
                    'deskripsi' => htmlspecialchars($this->input->post('Deskripsi')),
                    'kategori_id' => htmlspecialchars($this->input->post('Kategori')),
                    'dokumen' => $this->upload->data('file_name'),
                    'tanggal_upload' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),

                ];
            }

            if ($this->Akreditasi_Model->addAkreditasi($data)) {
                $this->session->set_flashdata('success', 'Data Inovasi Dan Kreativitas Berhasil Ditambahkan');
                redirect('KM_Akreditasi/Inovasi_Dan_Kreativitas');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data Inovasi Dan Kreativitas');
                redirect('KM_Akreditasi/Inovasi_Dan_Kreativitas/Tambah');
            }
        }
    }


    public function Edit($id)
    {
        $data = [
            'InovasiDanKreativitas' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriInovasiKreativitas(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Inovasi_Dan_Kreativitas/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editInovasiDanKreativitas($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Edit($id);
        } else {

            $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Inovasi_Dan_Kreativitas/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 9048;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('File')) {
                $data = [
                    'judul_komponen' => htmlspecialchars($this->input->post('Judul')),
                    'deskripsi' => htmlspecialchars($this->input->post('Deskripsi')),
                    'kategori_id' => htmlspecialchars($this->input->post('Kategori')),

                ];
            } else {
                $data = [
                    'judul_komponen' => htmlspecialchars($this->input->post('Judul')),
                    'deskripsi' => htmlspecialchars($this->input->post('Deskripsi')),
                    'kategori_id' => htmlspecialchars($this->input->post('Kategori')),
                    'dokumen' => $this->upload->data('file_name'),

                ];
            }
            if ($this->Akreditasi_Model->editAkreditasi($id, $data)) {
                $this->session->set_flashdata('success', 'Data Inovasi Dan Kreativitas Berhasil Diperbarui');
                redirect('KM_Akreditasi/Inovasi_Dan_Kreativitas');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data Inovasi Dan Kreativitas');
                redirect('KM_Akreditasi/Inovasi_Dan_Kreativitas/Edit/' . $id);
            }
        }
    }


    public function deleteInovasiDanKreativitas($id)
    {
        $inovasi = $this->Akreditasi_Model->getAkreditasiById($id);

        if ($this->Akreditasi_Model->deleteAkreditasi($id)) {
            if ($inovasi && !empty($inovasi->dokumen)) {
                $file_path = './Assets/KMS/KM_Akreditasi/Inovasi_Dan_Kreativitas/' . $inovasi->dokumen;
                if (file_exists($file_path)) {
                    @unlink($file_path);
                }
            }
            $this->session->set_flashdata('success', 'Data Inovasi Dan Kreativitas Berhasil Dihapus');
            redirect('KM_Akreditasi/Inovasi_Dan_Kreativitas');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data Inovasi Dan Kreativitas');
            redirect('KM_Akreditasi/Inovasi_Dan_Kreativitas');
        }
    }

}

/* End of file Inovasi_Dan_Kreativitas.php */
