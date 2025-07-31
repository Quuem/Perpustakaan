<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_Model extends CI_Model
{
    public function getAllKategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('jenis_kategori', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKategoriById($id)
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('kategori_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function addKategori($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function deleteKategori($id)
    {
        $this->db->where('kategori_id', $id);
        return $this->db->delete('kategori');
    }

    public function editKategori($id, $data)
    {
        $this->db->where('kategori_id', $id);
        return $this->db->update('kategori', $data);
    }


}

/* End of file Kategori_Model.php */
