<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faq_Model extends CI_Model
{

    private $table = 'faq';

    public function get_all_faq()
    {
        $this->db->select('faq.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'faq.kategori_id = kategori.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'FAQ');
        return $this->db->get()->result();
    }

    public function get_faq_by_id($faq_id)
    {
        $this->db->select('faq.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'faq.kategori_id = kategori.kategori_id');
        $this->db->where('faq.faq_id', $faq_id);
        return $this->db->get()->row();
    }

    public function insert_faq($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_faq($faq_id, $data)
    {
        $this->db->where('faq_id', $faq_id);
        return $this->db->update($this->table, $data);
    }

    public function delete_faq($id)
    {
        $faq = $this->get_faq_by_id($id);

        if ($faq) {
            for ($i = 1; $i <= 5; $i++) {
                $gambar = 'gambar' . $i;
                if (!empty($faq->$gambar)) {
                    $file_path = FCPATH . 'Assets/KMS/Faq/' . $faq->$gambar;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }

            // Hapus data dari database
            $this->db->where('faq_id', $id);
            return $this->db->delete('faq');
        }

        return false;
    }


    public function get_kategori_faq()
    {
        $this->db->where('jenis_kategori', 'FAQ');
        return $this->db->get('kategori')->result();
    }

    public function get_faq_grouped_by_kategori()
    {
        $this->db->select('faq.*, kategori.nama_kategori, kategori.kategori_id ');
        $this->db->from('faq');
        $this->db->join('kategori', 'faq.kategori_id = kategori.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'faq');
        $this->db->order_by('kategori.nama_kategori');
        $query = $this->db->get();
        $result = $query->result();

        $grouped = [];
        foreach ($result as $faq) {
            $grouped[$faq->nama_kategori][] = $faq;
        }

        return $grouped;
    }

}
