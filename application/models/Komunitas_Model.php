<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komunitas_Model extends CI_Model
{
    public function getAllKomunitas()
    {
        $this->db->select('*');
        $this->db->from('komunitas');
        $this->db->order_by('nama_komunitas', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKomunitasById($id)
    {
        $this->db->select('*');
        $this->db->from('komunitas');
        $this->db->where('komunitas_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function addKomunitas($data)
    {
        return $this->db->insert('komunitas', $data);
    }

    public function deleteKomunitas($id)
    {
        $this->db->where('komunitas_id', $id);
        return $this->db->delete('komunitas');
    }

    public function editKomunitas($id, $data)
    {
        $this->db->where('komunitas_id', $id);
        return $this->db->update('komunitas', $data);
    }
}

/* End of file Komunitas_Model.php */
