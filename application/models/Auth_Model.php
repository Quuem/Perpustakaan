<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model
{

    public function RegisterUser($data)
    {

        return $this->db->insert('user', $data);
    }

    public function CekUser($emailOrUsername)
    {
        $this->db->select('user.*,role.*');
        $this->db->join('role', 'role.role_id = user.role_id', 'left');
        $this->db->from('user');
        $this->db->where('email', $emailOrUsername);
        $this->db->or_where('username', $emailOrUsername);
        return $this->db->get()->row();
    }


}

/* End of file Auth_Model.php */
