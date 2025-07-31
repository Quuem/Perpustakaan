<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thread_Model extends CI_Model
{
    private $table = 'forum';
    public function countAllThreads($search = null)
    {
        $this->db->from('forum');
        if ($search) {
            $this->db->like('judul_forum', $search);
        }
        return $this->db->count_all_results();
    }

    public function getThreadsWithKomentar($limit, $start, $search = null, $komunitas = null)
    {
        $this->db->select('forum.*, user.*, komunitas.nama_komunitas');
        $this->db->from('forum');
        $this->db->join('user', 'user.user_id = forum.user_id', 'left');
        $this->db->join('komunitas', 'komunitas.komunitas_id = forum.komunitas_id', 'left');
        $this->db->order_by('forum.forum_id', 'DESC');

        if ($search) {
            $this->db->like('forum.judul_forum', $search);
        }

        if ($komunitas && $komunitas !== 'all') {
            $this->db->where('komunitas.nama_komunitas', $komunitas);
        }

        $this->db->limit($limit, $start);
        $threads = $this->db->get()->result();

        foreach ($threads as $thread) {
            $thread->komentar = $this->getKomentarWithBalasan($thread->forum_id);
        }

        return $threads;
    }


    public function getThreadDetail($id)
    {
        $this->db->select('user.*, forum.*');
        $this->db->from('forum');
        $this->db->join('user', 'user.user_id = forum.user_id', 'left');
        $this->db->where('forum.forum_id', $id);
        $thread = $this->db->get()->row();

        if ($thread) {
            $thread->komentar = $this->getKomentarWithBalasan($thread->forum_id);
        }

        return $thread;
    }

    private function getKomentarWithBalasan($forum_id)
    {
        $this->db->select('kf.*, u.nama_lengkap as nama_user, u.username');
        $this->db->from('komentarforum kf');
        $this->db->join('user u', 'u.user_id = kf.user_id', 'left');
        $this->db->where('kf.forum_id', $forum_id);
        $this->db->order_by('kf.komentar_id', 'DESC');
        $komentar = $this->db->get()->result();

        foreach ($komentar as $k) {
            $this->db->select('kb.*, u.nama_lengkap AS nama_user_balasan, u.username AS username_balasan');
            $this->db->from('komentarbalasan kb');
            $this->db->join('user u', 'u.user_id = kb.pembalas_id', 'left');
            $this->db->where('kb.komentar_id', $k->komentar_id);
            $this->db->order_by('kb.balasan_id', 'DESC');
            $k->balasan = $this->db->get()->result();
        }

        return $komentar;
    }

    public function getAllKomunitasThreads()
    {
        $this->db->select('*');
        $this->db->from('komunitas');
        $this->db->order_by('nama_komunitas', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }


    public function addThread($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


    public function addKomentar($data)
    {
        $this->db->insert('komentarforum', $data);
        return $this->db->insert_id();
    }

    public function addBalasan($data)
    {
        $this->db->insert('komentarbalasan', $data);
        return $this->db->insert_id();
    }


    public function getThreadById($id)
    {
        $this->db->where('forum_id', $id);
        return $this->db->get('forum')->row();
    }

    public function editThread($id, $data)
    {
        $this->db->where('forum_id', $id);
        return $this->db->update('forum', $data);

    }

    public function deleteThread($id)
    {
        $this->db->where('forum_id', $id);
        return $this->db->delete('forum');
    }
    public function editBalasan($id, $data)
    {
        $this->db->where('balasan_id', $id);
        return $this->db->update('komentarbalasan', $data);

    }
    public function editKomentar($id, $data)
    {
        $this->db->where('komentar_id', $id);
        return $this->db->update('komentarforum', $data);

    }

    public function deleteBalasan($id)
    {
        $this->db->where('balasan_id', $id);
        return $this->db->delete('komentarbalasan');
    }

    public function deleteKomentar($id)
    {
        $this->db->where('komentar_id', $id);
        return $this->db->delete('komentarforum');
    }


}
