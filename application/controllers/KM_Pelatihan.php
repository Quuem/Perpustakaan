<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KM_Pelatihan extends CI_Controller
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
        $this->load->model('Pelatihan_Model');

    }
    public function index()
    {
        $Pelatihan = $this->Pelatihan_Model->getAllPelatihan();
        $Kategori = $this->Pelatihan_Model->getKategoriByJenis();
        $data = [
            'Pelatihan' => $Pelatihan,
            'Kategori' => $Kategori,
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Pelatihan/Index', $data);
        $this->load->view('Template/Footer');

    }


    public function Detail($id)
    {
        $Pelatihan = $this->Pelatihan_Model->getPelatihanById($id);

        $data = [
            'Pelatihan' => $Pelatihan,
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Pelatihan/Detail', $data);
        $this->load->view('Template/Footer');
    }



    public function tambah()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Pelatihan');
        }

        $Kategori = $this->Pelatihan_Model->getKategoriByJenis();
        $data = [
            'Kategori' => $Kategori,
        ];


        $this->load->view('Template/Header');
        $this->load->view('KM_Pelatihan/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addPelatihan()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Pelatihan');
        }
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('tanggal_upload', 'Tanggal Upload', 'trim|required');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {

            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config1['upload_path'] = './Assets/KMS/Pelatihan/';
                $config1['allowed_types'] = 'jpg|jpeg|png';
                $config1['max_size'] = 20048;
                $config1['file_name'] = time() . '_' . $_FILES['gambar']['name'];

                $this->load->library('upload', $config1);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('KM_Pelatihan/Tambahggggg');
                    return;
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }


            $this->load->library('upload');
            $config2['upload_path'] = './Assets/KMS/Pelatihan/';
            $config2['allowed_types'] = 'pdf|doc|docx|txt|ppt|pptx|xls|xlsx';
            $config2['max_size'] = 30480;
            $config2['encrypt_name'] = TRUE;
            $this->upload->initialize($config2);

            $file_uploaded = null;
            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('KM_Pelatihan/Tambah');
                return;
            } else {
                $file_data = $this->upload->data();
                $file_uploaded = $file_data['file_name'];
            }
            $data = [
                'judul_pelatihan' => htmlspecialchars($this->input->post('judul')),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
                'tanggal_upload' => $this->input->post('tanggal_upload'),
                'user_id' => $this->session->userdata('user_id'),
                'kategori_id' => $this->input->post('kategori_id'),
                'gambar' => $gambar,
                'file_materi' => $file_uploaded,
            ];
            if ($this->Pelatihan_Model->addPelatihan($data)) {
                $this->session->set_flashdata('success', 'Pelatihan berhasil ditambahkan');
                redirect('KM_Pelatihan');
            } else {
                $this->session->set_flashdata('error', 'Pelatihan gagal ditambahkan');
                redirect('KM_Pelatihan/Tambah');
            }
        }
    }

    public function Edit($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Pelatihan');
        }
        $Pelatihan = $this->Pelatihan_Model->getPelatihanById($id);
        $Kategori = $this->Pelatihan_Model->getKategoriByJenis();
        $data = [
            'Pelatihan' => $Pelatihan,
            'Kategori' => $Kategori,
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Pelatihan/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editPelatihan($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Pelatihan');
        }

        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('tanggal_upload', 'Tanggal Upload', 'trim|required');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            // Pastikan library upload diload sekali di awal
            $this->load->library('upload');

            // === Upload Gambar ===
            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config1['upload_path'] = './Assets/KMS/Pelatihan/';
                $config1['allowed_types'] = 'jpg|jpeg|png';
                $config1['max_size'] = 20048;
                $config1['file_name'] = time() . '_' . $_FILES['gambar']['name'];

                $this->upload->initialize($config1);
                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('KM_Pelatihan/Edit/' . $id);
                    return;
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            } else {
                $pelatihan = $this->Pelatihan_Model->getPelatihanById($id);
                $gambar = $pelatihan->gambar;
            }

            // === Upload File Materi ===
            if ($_FILES['file']['name']) {
                $config2['upload_path'] = './Assets/KMS/Pelatihan/';
                $config2['allowed_types'] = 'pdf|doc|docx|txt|ppt|pptx|xls|xlsx';
                $config2['max_size'] = 30480;
                $config2['encrypt_name'] = TRUE;

                $this->upload->initialize($config2);
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('KM_Pelatihan/Edit/' . $id);
                    return;
                } else {
                    $file_data = $this->upload->data();
                    $file_uploaded = $file_data['file_name'];
                }
            } else {
                $pelatihan = $this->Pelatihan_Model->getPelatihanById($id);
                $file_uploaded = $pelatihan->file_materi;
            }

            // === Simpan ke database ===
            $data = [
                'judul_pelatihan' => htmlspecialchars($this->input->post('judul')),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
                'tanggal_upload' => $this->input->post('tanggal_upload'),
                'user_id' => $this->session->userdata('user_id'),
                'kategori_id' => $this->input->post('kategori_id'),
                'gambar' => $gambar,
                'file_materi' => $file_uploaded,
            ];

            if ($this->Pelatihan_Model->editPelatihan($id, $data)) {
                $this->session->set_flashdata('success', 'Pelatihan berhasil diperbarui');
                redirect('KM_Pelatihan');
            } else {
                $this->session->set_flashdata('error', 'Pelatihan gagal diperbarui');
                redirect('KM_Pelatihan/Edit/' . $id);
            }
        }
    }


    public function deletePelatihan($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Pelatihan');
        }
        $pelatihan = $this->Pelatihan_Model->getPelatihanById($id);
        if ($pelatihan->gambar && file_exists('./Assets/KMS/Pelatihan/' . $pelatihan->gambar)) {
            unlink('./Assets/KMS/Pelatihan/' . $pelatihan->gambar);
        }
        if ($this->Pelatihan_Model->deletePelatihan($id)) {
            $this->session->set_flashdata('success', 'Pelatihan berhasil dihapus');
            redirect('KM_Pelatihan');
        } else {
            $this->session->set_flashdata('error', 'Pelatihan gagal dihapus');
            redirect('KM_Pelatihan');
        }
    }

}

/* End of file Struktur_Organisasi.php */
