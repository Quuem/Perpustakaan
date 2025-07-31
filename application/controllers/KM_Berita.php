<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KM_Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('Auth');
        }

        $this->load->model('Berita_Model');

    }

    public function index()
    {
        $Berita = $this->Berita_Model->getAllBerita();
        $Kategori = $this->Berita_Model->getKategoriByJenis();
        $data = [
            'Berita' => $Berita,
            'Kategori' => $Kategori,
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Berita/Index', $data);
        $this->load->view('Template/Footer');
    }


    public function Detail($id)
    {
        $Berita = $this->Berita_Model->getBeritaById($id);

        $data = [
            'Berita' => $Berita,
        ];
        $this->load->view('Template/Header');
        $this->load->view('KM_Berita/Detail', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Berita');
        }

        $kategori = $this->Berita_Model->getKategoriByJenis();
        $data = [
            'kategori' => $kategori,
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Berita/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addBerita()
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Berita');
        }
        $this->form_validation->set_rules('Judul', 'Judul', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('Isi', 'Isi', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('Tanggal', 'Tanggal Publish', 'trim|required');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'trim|required|numeric');
        $this->form_validation->set_rules('link_video', 'Link Video', 'trim|valid_url');

        if ($this->form_validation->run() == FALSE) {
            $this->Tambah();
        } else {

            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['upload_path'] = './Assets/KMS/Berita/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 20480; // 20 MB
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('KM_Berita/Tambah');
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            } else {
                $gambar = 'default.jpg';
            }

            $originalLink = $this->input->post('link_video');
            $link_video = null;

            if (!empty($originalLink)) {
                $videoId = null;

                if (strpos($originalLink, 'youtube.com/watch?v=') !== false) {
                    parse_str(parse_url($originalLink, PHP_URL_QUERY), $params);
                    if (isset($params['v'])) {
                        $videoId = $params['v'];
                    }
                } elseif (strpos($originalLink, 'youtu.be/') !== false) {
                    $parts = explode('/', parse_url($originalLink, PHP_URL_PATH));
                    $videoId = end($parts);
                } elseif (strpos($originalLink, 'youtube.com/embed/') !== false) {
                    $link_video = $originalLink;
                }

                if ($videoId) {
                    $link_video = 'https://www.youtube.com/embed/' . $videoId;
                }
            }

            $data = [
                'judul_berita' => htmlspecialchars($this->input->post('Judul')),
                'isi_berita' => htmlspecialchars($this->input->post('Isi')),
                'tanggal_publish' => $this->input->post('Tanggal'),
                'user_id' => $this->session->userdata('user_id'),
                'kategori_id' => $this->input->post('kategori_id'),
                'gambar' => $gambar,
                'link_video' => htmlspecialchars($link_video),

            ];


            if ($this->Berita_Model->addBerita($data)) {
                $this->session->set_flashdata('success', 'Berita berhasil ditambahkan');
                redirect('KM_Berita');
            } else {
                $this->session->set_flashdata('error', 'Berita gagal ditambahkan');
                redirect('KM_Berita/Tambah');
            }
        }
    }

    public function Edit($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Berita');
        }

        $kategori = $this->Berita_Model->getKategoriByJenis();
        $berita = $this->Berita_Model->getBeritaById($id);
        if (!$berita) {
            show_404();
        }

        $data = [
            'kategori' => $kategori,
            'berita' => $berita,
        ];

        $this->load->view('Template/Header');
        $this->load->view('KM_Berita/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editBerita($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Berita');
        }
        $this->form_validation->set_rules('Judul', 'Judul', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('Isi', 'Isi', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('Tanggal', 'Tanggal Publish', 'trim|required');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'trim|required|numeric');
        $this->form_validation->set_rules('link_video', 'Link Video', 'trim|valid_url');

        if ($this->form_validation->run() == FALSE) {
            $this->Edit($id);
        } else {
            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['upload_path'] = './Assets/KMS/Berita/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 20480; // 20 MB
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect("KM_Berita/Edit/$id");
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            } else {
                $gambar = null;
            }
            $originalLink = $this->input->post('link_video');
            $link_video = null;

            if (!empty($originalLink)) {
                $videoId = null;

                if (strpos($originalLink, 'youtube.com/watch?v=') !== false) {
                    parse_str(parse_url($originalLink, PHP_URL_QUERY), $params);
                    if (isset($params['v'])) {
                        $videoId = $params['v'];
                    }
                } elseif (strpos($originalLink, 'youtu.be/') !== false) {
                    $parts = explode('/', parse_url($originalLink, PHP_URL_PATH));
                    $videoId = end($parts);
                } elseif (strpos($originalLink, 'youtube.com/embed/') !== false) {
                    $link_video = $originalLink;
                }

                if ($videoId) {
                    $link_video = 'https://www.youtube.com/embed/' . $videoId;
                }
            }


            $data = [
                'judul_berita' => htmlspecialchars($this->input->post('Judul')),
                'isi_berita' => htmlspecialchars($this->input->post('Isi')),
                'tanggal_publish' => $this->input->post('Tanggal'),
                'user_id' => $this->session->userdata('user_id'),
                'kategori_id' => $this->input->post('kategori_id'),
                'link_video' => htmlspecialchars($link_video),

            ];


            if ($gambar) {
                $data['gambar'] = $gambar;
            }

            if ($this->Berita_Model->editBerita($id, $data)) {
                $this->session->set_flashdata('success', 'Berita berhasil diperbarui');
                redirect('KM_Berita');
            } else {
                $this->session->set_flashdata('error', 'Berita gagal diperbarui');
                redirect("KM_Berita/Edit/$id");
            }
        }
    }

    public function deleteBerita($id)
    {
        if ($this->session->userdata('nama_role') != "Admin" && $this->session->userdata('nama_role') != "Pustakawan") {
            redirect('KM_Berita');
        }
        $berita = $this->Berita_Model->getBeritaById($id);
        if (!$berita) {
            show_404();
        }
        if ($berita->gambar && file_exists('./Assets/KMS/Berita/' . $berita->gambar)) {
            unlink('./Assets/KMS/Berita/' . $berita->gambar);
        }

        if ($this->Berita_Model->deleteBerita($id)) {
            $this->session->set_flashdata('success', 'Berita berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Berita gagal dihapus');
        }
        redirect('KM_Berita');
    }
}

/* End of file KM_Berita.php */
