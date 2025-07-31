<?php
class User_Model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('user.*, role.nama_role');
        $this->db->from('user');
        $this->db->join('role', 'role.role_id = user.role_id');
        return $this->db->get()->result();
    }


    public function getRole()
    {
        return $this->db->get('role')->result();

    }

    public function getById($id)
    {
        return $this->db->get_where('user', ['user_id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('user_id', $id);
        return $this->db->update('user', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('user', ['user_id' => $id]);
    }
}
