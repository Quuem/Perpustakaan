<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Threads extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('Auth');
        }
        $this->load->model('Thread_Model');
        $this->load->helper('text');

    }



    // THREAD

    public function Page($page = 0, $action = null, $id = null)
    {


        if ($action === 'Edit' && is_numeric($id)) {
            return $this->edit($id); // panggil method edit langsung
        }

        $per_page = 5;
        $search = $this->input->get('search');
        $komunitas = $this->input->get('komunitas');

        $total_rows = $this->Thread_Model->countAllThreads($search);

        $config['base_url'] = base_url('Forum/Threads/Page');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['num_links'] = 1;
        $config['reuse_query_string'] = true;

        $config['full_tag_open'] = '<ul class="pagination justify-content-end mt-3">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['attributes'] = ['class' => 'page-link'];

        $this->pagination->initialize($config);

        // Pastikan offset adalah angka, dan default ke 0 jika tidak ada
        $offset = (int) $this->uri->segment(4, 0);

        // Cegah offset yang lebih besar dari total rows
        if ($offset >= $total_rows && $total_rows > 0) {
            show_404();  // atau tampilkan view 404 yang kamu punya
            return;
        }

        $data['Threads'] = $this->Thread_Model->getThreadsWithKomentar($per_page, $offset, $search, $komunitas);
        $data['search'] = $search;
        $data['KomunitasPick'] = $komunitas;
        $data['Komunitas'] = $this->Thread_Model->getAllKomunitasThreads();


        $this->load->view('Template/Header');
        $this->load->view('Forum/Threads/Index', $data);
        $this->load->view('Template/Footer');
    }


    public function Detail($id)
    {
        $data['Threads'] = $this->Thread_Model->getThreadDetail($id);

        $this->load->view('Template/Header');
        $this->load->view('Forum/Threads/Detail', $data);
        $this->load->view('Template/Footer');
    }

    public function Tambah()
    {
        $data['Komunitas'] = $this->Thread_Model->getAllKomunitasThreads();

        $this->load->view('Template/Header');
        $this->load->view('Forum/Threads/Tambah', $data);
        $this->load->view('Template/Footer');
    }

    public function addThread()
    {
        $this->form_validation->set_rules('judul_forum', 'Judul', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('isi_forum', 'Isi Forum', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('komunitas', 'komunitas', 'trim|required');



        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $gambar = null; // default null

            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './Assets/KMS/Forum/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 20048;
                $config['file_name'] = time() . '-' . $_FILES['gambar']['name'];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('Forum/Threads/Tambah');
                    return; // pastikan tidak lanjut
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = [
                'judul_forum' => htmlspecialchars($this->input->post('judul_forum')),
                'isi_forum' => htmlspecialchars($this->input->post('isi_forum')),
                'tanggal_dibuat' => date('Y-m-d H:i:s'),
                'user_id' => $this->session->userdata('user_id'),
                'komunitas_id' => $this->input->post('komunitas'),
                'gambar' => $gambar,
            ];
            $idThreads = $this->Thread_Model->addThread($data);
            if ($idThreads) {
                $this->session->set_flashdata('success', 'Thread berhasil ditambahkan.');
                redirect('Forum/Threads/Detail/' . $idThreads);
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan thread. Silakan coba lagi.');
                redirect('Forum/Threads/Tambah');
            }
        }
    }

    public function edit($id)
    {
        $thread = $this->Thread_Model->getThreadById($id);
        if (!$thread) {
            show_404();
        }

        $data = [
            'Thread' => $thread,
        ];
        $data['Komunitas'] = $this->Thread_Model->getAllKomunitasThreads();

        $this->load->view('Template/Header');
        $this->load->view('Forum/Threads/Edit', $data);
        $this->load->view('Template/Footer');
    }

    public function editThread($id)
    {
        $this->form_validation->set_rules('judul_forum', 'Judul', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('isi_forum', 'Isi Forum', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('komunitas', 'Komunitas', 'trim|required');
        $pageNumber = $this->input->post('pageNumber');

        if ($pageNumber == 'Edit') {
            $pageNumber = '';
        }

        $thread = $this->Thread_Model->getThreadById($id);

        if (!$thread) {
            show_404();
        }

        if ($this->form_validation->run() == FALSE) {
            $data['thread'] = $thread;
            $this->session->set_flashdata('error', 'Terlalu Pendek');

            redirect('Forum/Threads/Detail/' . $id);
        } else {
            $gambar = $thread->gambar; // default gambar lama
            $page = $this->input->post('page');

            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './Assets/KMS/Forum/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 20048;
                $config['file_name'] = time() . '-' . $_FILES['gambar']['name'];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('Forum/Threads/Edit/' . $id);
                    return;
                } else {
                    // Hapus gambar lama jika ada
                    if ($gambar && file_exists('./Assets/KMS/Forum/' . $gambar)) {
                        unlink('./Assets/KMS/Forum/' . $gambar);
                    }

                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = [
                'judul_forum' => htmlspecialchars($this->input->post('judul_forum')),
                'isi_forum' => htmlspecialchars($this->input->post('isi_forum')),
                'komunitas_id' => $this->input->post('komunitas'),
                'gambar' => $gambar
            ];

            if ($this->Thread_Model->editThread($id, $data)) {
                $this->session->set_flashdata('success', 'Thread berhasil diperbarui.');
                redirect('Forum/Threads/Detail/' . $id);
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui thread.');
                redirect('Forum/Threads/Edit/' . $id);
            }
        }
    }

    public function getThreadById($id)
    {
        $thread = $this->Thread_Model->getThreadById($id);
        if (!$thread) {
            show_404();
        }
        return $thread;
    }

    public function deleteThread($id)
    {
        $thread = $this->Thread_Model->getThreadById($id);
        if (!$thread) {
            show_404();
        }


        if ($this->Thread_Model->deleteThread($id)) {
            if ($thread->gambar && file_exists('./Assets/KMS/Forum/' . $thread->gambar)) {
                unlink('./Assets/KMS/Forum/' . $thread->gambar);
            }
            $this->session->set_flashdata('success', 'Thread berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus thread. Silakan coba lagi.');
        }
        redirect('Forum/Threads/Page');
    }


    // THREAD



    // KOMENTAR


    public function addKomentar()
    {
        $this->form_validation->set_rules('Komentar', 'Komentar', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Forum/Threads/Page');
        } else {
            $data = [
                'forum_id' => $this->input->post('forum_id'),
                'user_id' => $this->session->userdata('user_id'),
                'isi_komentar' => htmlspecialchars($this->input->post('Komentar')),
                'tanggal_komentar' => date('Y-m-d H:i:s'),
            ];

            $id = $this->input->post('forum_id');
            // Ambil halaman saat ini dari URL
            $page = $this->input->post('pageNumber');


            if ($this->Thread_Model->addKomentar($data)) {
                $this->session->set_flashdata('success', 'Komentar berhasil ditambahkan.');
                redirect('Forum/Threads/Detail/' . $id);
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan komentar. Silakan coba lagi.');
                redirect('Forum/Threads/Detail/' . $id);
            }
        }
    }



    public function editKomentar($id)
    {
        $this->form_validation->set_rules('isi_komentar', 'Isi Komentar', 'trim|required|min_length[3]');

        $komentar_id = $this->input->post('komentar_id');
        $page = $this->input->post('pageNumber');
        if ($page == 'Edit') {
            $page = '';
        }
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Isi komentar terlalu pendek.');
        } else {
            $data = [
                'isi_komentar' => htmlspecialchars($this->input->post('isi_komentar')),
            ];

            if ($this->Thread_Model->editKomentar($komentar_id, $data)) {
                $this->session->set_flashdata('success', 'Komentar berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui komentar.');
            }
        }

        redirect('Forum/Threads/Detail/' . $id);
    }


    public function addBalasan($id)
    {
        $this->form_validation->set_rules('balasan', 'Balasan', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Forum/Threads/Page');
        } else {
            $data = [
                'komentar_id' => $this->input->post('komentar_id'),
                'pembalas_id' => $this->session->userdata('user_id'),
                'isi_balasan' => htmlspecialchars($this->input->post('balasan')),
                'tanggal_balasan' => date('Y-m-d H:i:s'),
            ];

            $page = $this->input->post('pageNumber');


            if ($this->Thread_Model->addBalasan($data)) {
                $this->session->set_flashdata('success', 'Balasan berhasil ditambahkan.');
                redirect('Forum/Threads/Detail/' . $id);

            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan balasan. Silakan coba lagi.');
                redirect('Forum/Threads/Detail/' . $id);

            }
        }
    }

    public function editBalasan($id)
    {
        $this->form_validation->set_rules('isi_balasan', 'Isi Balasan', 'trim|required|min_length[3]');

        $balasan_id = $this->input->post('balasan_id');
        $page = $this->input->post('pageNumber');
        if ($page == 'Edit') {
            $page = '';
        }
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Isi balasan terlalu pendek.');
        } else {
            $data = [
                'isi_balasan' => htmlspecialchars($this->input->post('isi_balasan')),
            ];

            if ($this->Thread_Model->editBalasan($balasan_id, $data)) {
                $this->session->set_flashdata('success', 'Balasan berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui balasan.');
            }
        }

        redirect('Forum/Threads/Detail/' . $id);
    }


    public function deleteKomentar($id, $forum_id)
    {


        $komentar = $this->Thread_Model->deleteKomentar($id);

        if ($komentar) {
            $this->session->set_flashdata('success', 'Berhasil Menghapus Komentar');
            redirect('Forum/Threads/Detail/' . $forum_id);
        } else {
            $this->session->set_flashdata('error', 'Gagal Menghapus Komentar');
            redirect('Forum/Threads/Detail/' . $forum_id);
        }
    }

    public function deleteBalasan($id, $forum_id)
    {


        $Balasan = $this->Thread_Model->deleteBalasan($id);

        if ($Balasan) {
            $this->session->set_flashdata('success', 'Berhasil Menghapus Balasan');
            redirect('Forum/Threads/Detail/' . $forum_id);
        } else {
            $this->session->set_flashdata('error', 'Gagal Menghapus Balasan');
            redirect('Forum/Threads/Detail/' . $forum_id);
        }
    }






}

/* End of file Threads.php */
