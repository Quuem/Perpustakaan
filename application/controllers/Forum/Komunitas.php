<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas extends CI_Controller
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

        $this->load->model('Komunitas_Model');

    }

    public function index()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Threads');
        }
        $Komunitas = $this->Komunitas_Model->getAllKomunitas();

        $data = [
            'Komunitas' => $Komunitas,
        ];

        $this->load->view('Template/Header');
        $this->load->view('Forum/Komunitas/Index', $data);
        $this->load->view('Template/Footer');
    }

    public function tambah()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Threads');
        }



        $this->load->view('Template/Header');
        $this->load->view('Forum/Komunitas/Tambah');
        $this->load->view('Template/Footer');
    }

    public function addKomunitas()
    {
        $this->form_validation->set_rules('Komunitas', 'Komunitas', 'trim|required|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = [
                'nama_komunitas' => htmlspecialchars($this->input->post('Komunitas')),
            ];


            if ($this->Komunitas_Model->addKomunitas($data)) {
                $this->session->set_flashdata('success', 'Komunitas berhasil ditambahkan');
                redirect('Forum/Komunitas');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan komunitas');
                redirect('Forum/Komunitas/Tambah');
            }
        }
    }

    public function deleteKomunitas($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Komunitas');
        }
        try {
            if ($this->Komunitas_Model->deleteKomunitas($id)) {
                $this->session->set_flashdata('success', 'Komunitas berhasil dihapus.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus komunitas.');
            }
        } catch (Exception $e) {
            // Tangkap error database khusus FK constraint
            if (strpos($e->getMessage(), 'Cannot delete or update a parent row') !== false) {
                $this->session->set_flashdata('error', 'Data komunitas tidak bisa dihapus karena masih digunakan di data lain.');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }

        redirect('Forum/Komunitas');
    }


    public function Edit($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Komunitas');
        }

        $data = [
            'Komunitas' => $this->Komunitas_Model->getKomunitasById($id),
            'komunitas_id' => $id,
        ];


        $this->load->view('Template/Header');
        $this->load->view('Forum/Komunitas/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editKomunitas($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Forum/Komunitas');
        }
        $this->form_validation->set_rules('Komunitas', 'Komunitas', 'trim|required|min_length[3]');
        if ($this->form_validation->run() == FALSE) {
            $this->Edit($id);
        } else {
            $data = [
                'nama_komunitas' => htmlspecialchars($this->input->post('Komunitas')),
            ];


            if ($this->Komunitas_Model->editKomunitas($id, $data)) {
                $this->session->set_flashdata('success', 'Komunitas berhasil diperbarui');
                redirect('Forum/Komunitas');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui komunitas');
                redirect('Forum/Komunitas/Edit/' . $id);
            }
        }
    }

}

/* End of file Komunitas.php */
