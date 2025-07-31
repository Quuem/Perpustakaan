<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Faq_Model');

        $this->load->library('form_validation');
        if (!$this->session->userdata('user_id')) {
            redirect('Auth');
        }

    }

    public function index()
    {
        $data['faqs'] = $this->Faq_Model->get_all_faq();
        $data['faq_per_kategori'] = $this->Faq_Model->get_faq_grouped_by_kategori();

        $this->load->view('Template/Header');
        $this->load->view('Faq/index', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {

        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Faq');
        }


        $data['kategori'] = $this->Faq_Model->get_kategori_faq();
        $this->load->view('Template/Header', $data);
        $this->load->view('Faq/Tambah', $data);
        $this->load->view('Template/Footer', $data);
    }

    public function addFaq()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Faq');
        }

        $data['kategori'] = $this->Faq_Model->get_kategori_faq();


        $this->form_validation->set_rules('judul_faq', 'Judul', 'required');
        $this->form_validation->set_rules('isi_faq', 'Isi FAQ', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('faq/create', $data);
        } else {
            // Persiapan data
            $faq_data = [
                'judul_faq' => $this->input->post('judul_faq'),
                'isi1' => $this->input->post('isi_faq'),
                'gambar1' => $this->_uploadGambar('gambar1'),
                'isi2' => $this->input->post('isi2'),
                'gambar2' => $this->_uploadGambar('gambar2'),
                'isi3' => $this->input->post('isi3'),
                'gambar3' => $this->_uploadGambar('gambar3'),
                'isi4' => $this->input->post('isi4'),
                'gambar4' => $this->_uploadGambar('gambar4'),
                'isi5' => $this->input->post('isi5'),
                'gambar5' => $this->_uploadGambar('gambar5'),
                'user_id' => $this->session->userdata('user_id'),
                'kategori_id' => $this->input->post('kategori_id')
            ];

            if ($this->Faq_Model->insert_faq($faq_data)) {
                $this->session->set_flashdata('success', 'FAQ berhasil ditambahkan.');
                redirect('faq');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan FAQ.');
                redirect('faq/tambah');
            }
        }
    }


    public function Edit($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Faq');
        }
        $data['Faq'] = $this->Faq_Model->get_faq_by_id($id);
        $data['kategori'] = $this->Faq_Model->get_kategori_faq();

        $this->load->view('Template/Header');
        $this->load->view('Faq/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editFaq($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Faq');
        }

        $data['faq'] = $this->Faq_Model->get_faq_by_id($id);
        $data['kategori'] = $this->Faq_Model->get_kategori_faq();

        $this->form_validation->set_rules('judul_faq', 'Judul', 'required');
        $this->form_validation->set_rules('isi_faq', 'Isi FAQ', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('faq/edit', $data);
        } else {
            // Ambil data lama
            $faq_lama = $data['faq'];

            $faq_data = [
                'judul_faq' => $this->input->post('judul_faq'),
                'isi1' => $this->input->post('isi_faq'),
                'gambar1' => $this->_uploadGambar('gambar1') ?: $faq_lama->gambar1,
                'isi2' => $this->input->post('isi2'),
                'gambar2' => $this->_uploadGambar('gambar2') ?: $faq_lama->gambar2,
                'isi3' => $this->input->post('isi3'),
                'gambar3' => $this->_uploadGambar('gambar3') ?: $faq_lama->gambar3,
                'isi4' => $this->input->post('isi4'),
                'gambar4' => $this->_uploadGambar('gambar4') ?: $faq_lama->gambar4,
                'isi5' => $this->input->post('isi5'),
                'gambar5' => $this->_uploadGambar('gambar5') ?: $faq_lama->gambar5,
                'kategori_id' => $this->input->post('kategori_id')
            ];

            if ($this->Faq_Model->update_faq($id, $faq_data)) {
                $this->session->set_flashdata('success', 'FAQ berhasil diupdate.');
                redirect('Faq');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate FAQ.');
                redirect('Faq/Edit/' . $id);
            }
        }
    }



    private function _uploadGambar($field)
    {
        $config['upload_path'] = './Assets/KMS/Faq/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 7048;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!empty($_FILES[$field]['name'])) {
            if ($this->upload->do_upload($field)) {
                return $this->upload->data('file_name');
            }
        }

        return null;
    }


    public function Detail($id)
    {
        $data['Faq'] = $this->Faq_Model->get_faq_by_id($id);
        if (!$data['Faq']) {
            show_404();
        }

        $this->load->view('Template/Header');
        $this->load->view('Faq/Detail', $data);
        $this->load->view('Template/Footer');
    }

    public function Delete($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('Faq');
        }

        if ($this->Faq_Model->delete_faq($id)) {
            $this->session->set_flashdata('success', 'FAQ berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus FAQ.');
        }
        redirect('Faq');
    }

}
