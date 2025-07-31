<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengetahuan_Model extends CI_Model
{

    public function getAllPengetahuan()
    {
        $this->db->select('pengetahuankm.*, kategori.*');
        $this->db->from('pengetahuankm');
        $this->db->join('kategori', 'pengetahuankm.kategori_id = kategori.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Pengetahuan');
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get()->result();
    }

    public function getKategoriByJenis()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('jenis_kategori', 'Pengetahuan');
        return $this->db->get()->result();
    }

    public function getPengetahuanById($id)
    {
        $this->db->select('*');
        $this->db->from('pengetahuankm');
        $this->db->where('pengetahuan_id', $id);
        return $this->db->get()->row();
    }

    public function addPengetahuan($data)
    {
        return $this->db->insert('pengetahuankm', $data);
    }

    public function editPengetahuan($id, $data)
    {
        $this->db->where('pengetahuan_id', $id);
        return $this->db->update('pengetahuankm', $data);
    }

    public function deletePengetahuan($id)
    {
        $this->db->where('pengetahuan_id', $id);
        return $this->db->delete('pengetahuankm');
    }

}

/* End of file Pengetahuan_Model.php */
