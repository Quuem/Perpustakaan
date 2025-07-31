<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita_Model extends CI_Model
{

    public function getAllBerita()
    {
        $this->db->select('beritakm.*, kategori.*');
        $this->db->from('beritakm');
        $this->db->join('kategori', 'beritakm.kategori_id = kategori.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Berita');
        $this->db->order_by('tanggal_publish', 'DESC');
        return $this->db->get()->result();
    }

    public function getKategoriByJenis()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('jenis_kategori', 'Berita');
        return $this->db->get()->result();
    }

    public function getBeritaById($id)
    {
        $this->db->select('*');
        $this->db->from('beritakm');
        $this->db->where('berita_id', $id);
        return $this->db->get()->row();
    }
    public function addBerita($data)
    {
        return $this->db->insert('beritakm', $data);
    }
    public function editBerita($id, $data)
    {
        $this->db->where('berita_id', $id);
        return $this->db->update('beritakm', $data);
    }
    public function deleteBerita($id)
    {
        $this->db->where('berita_id', $id);
        return $this->db->delete('beritakm');
    }


}

/* End of file Berita_Model.php */
