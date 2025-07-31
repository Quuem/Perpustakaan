<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelatihan_Model extends CI_Model
{

    public function getAllPelatihan()
    {
        $this->db->select('pelatihankm.*, kategori.*');
        $this->db->from('pelatihankm');
        $this->db->join('kategori', 'pelatihankm.kategori_id = kategori.kategori_id');
        $this->db->where('kategori.jenis_kategori', 'Pelatihan');
        $this->db->order_by('tanggal_upload', 'DESC');
        return $this->db->get()->result();
    }

    public function getKategoriByJenis()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('jenis_kategori', 'Pelatihan');
        return $this->db->get()->result();
    }

    public function getPelatihanById($id)
    {
        $this->db->select('*');
        $this->db->from('pelatihankm');
        $this->db->where('pelatihan_id', $id);
        return $this->db->get()->row();
    }

    public function addPelatihan($data)
    {
        return $this->db->insert('pelatihankm', $data);
    }

    public function editPelatihan($id, $data)
    {
        $this->db->where('pelatihan_id', $id);
        return $this->db->update('pelatihankm', $data);
    }

    public function deletePelatihan($id)
    {
        $this->db->where('pelatihan_id', $id);
        return $this->db->delete('pelatihankm');
    }

}

/* End of file Pelatihan_Model.php */
