<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sarana_Dan_Prasarana extends CI_Controller
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
            show_404();
        }
    }

    public function index()
    {
        $data = [
            'SaranaDanPrasarana' => $this->Akreditasi_Model->getAkreditasiSaranaPrasarana(),
            'Kategori' => $this->Akreditasi_Model->getKategoriSaranaPrasarana(),

        ];
        $this->load->view('Template/Header', );
        $this->load->view('KM_Akreditasi/Saranan_Prasanaran/Index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {
        $data = [
            'Kategori' => $this->Akreditasi_Model->getKategoriSaranaPrasarana(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Saranan_Prasanaran/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addSaranaDanPrasaranan()
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            $this->Tambah();
        } else {

            $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Sarana_Dan_Prasarana/';
            $config['allowed_types'] = 'jpg|jpeg|png|';
            $config['max_size'] = 9048;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('File')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('KM_Akreditasi/Sarana_Dan_Prasarana/Tambah');
            } else {
                $data = [
                    'judul_komponen' => htmlspecialchars($this->input->post('Judul')),
                    'deskripsi' => htmlspecialchars($this->input->post('Deskripsi')),
                    'kategori_id' => htmlspecialchars($this->input->post('Kategori')),
                    'dokumen' => $this->upload->data('file_name'),
                    'tanggal_upload' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('user_id'),
                ];
                if ($this->Akreditasi_Model->addAkreditasi($data)) {
                    $this->session->set_flashdata('success', 'Data Sarana Prasarana Berhasil Ditambahkan');
                    redirect('KM_Akreditasi/Sarana_Dan_Prasarana');
                } else {
                    $this->session->set_flashdata('error', 'Gagal Menambahkan Data Sarana Prasarana');
                    redirect('KM_Akreditasi/Sarana_Dan_Prasarana/Tambah');
                }
            }
        }
    }

    public function Edit($id)
    {
        $data = [
            'SaranaDanPrasarana' => $this->Akreditasi_Model->getAkreditasiById($id),
            'Kategori' => $this->Akreditasi_Model->getKategoriSaranaPrasarana(),
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Akreditasi/Saranan_Prasanaran/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editSaranaDanPrasarana($id)
    {
        $this->form_validation->set_rules('Judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('Deskripsi', 'Jumlah', 'required');
        $this->form_validation->set_rules('Kategori', 'Kategori', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('KM_Akreditasi/Sarana_Dan_Prasarana/Edit/' . $id);
        } else {
            $data = [
                'judul_komponen' => htmlspecialchars($this->input->post('Judul')),
                'deskripsi' => htmlspecialchars($this->input->post('Deskripsi')),
                'kategori_id' => htmlspecialchars($this->input->post('Kategori')),
                'tanggal_upload' => date('Y-m-d H:i:s'),
                'user_id' => $this->session->userdata('user_id'),
            ];

            if (!empty($_FILES['File']['name'])) {
                $config['upload_path'] = './Assets/KMS/KM_Akreditasi/Sarana_Dan_Prasarana/';
                $config['allowed_types'] = 'jpg|jpeg|png|';
                $config['max_size'] = 9048;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('File')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('KM_Akreditasi/Sarana_Dan_Prasarana/Edit/' . $id);
                    return;
                } else {
                    $data['dokumen'] = $this->upload->data('file_name');
                }
            }

            if ($this->Akreditasi_Model->editAkreditasi($id, $data)) {
                $this->session->set_flashdata('success', 'Data Sarana Prasarana Berhasil Diubah');
                redirect('KM_Akreditasi/Sarana_Dan_Prasarana');
            } else {
                $this->session->set_flashdata('error', 'Gagal Mengubah Data Sarana Prasarana');
                redirect('KM_Akreditasi/Sarana_Dan_Prasarana/Edit/' . $id);
            }
        }
    }

    public function deleteSaranaPrasarana($id)
    {
        $komponen = $this->Akreditasi_Model->getAkreditasiById($id);

        if ($this->Akreditasi_Model->deleteAkreditasi($id)) {
            if ($komponen->dokumen && file_exists('./Assets/KMS/KM_Akreditasi/Sarana_Dan_Prasarana/' . $komponen->dokumen)) {
                unlink('./Assets/KMS/KM_Akreditasi/Saranan_Dan_Prasarana/' . $komponen->dokumen);
            }
            $this->session->set_flashdata('success', 'Data Komponen berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data Komponen.');
        }
        redirect('KM_Akreditasi/Sarana_Dan_Prasarana');
    }

}

/* End of file Sarana_Dan_Prasarana.php */
