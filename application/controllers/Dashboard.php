<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == null) {
            redirect('Auth');
        }
    }

    public function index()
    {

        $this->load->view('Template/Header');
        $this->load->view('Dashboard');
        $this->load->view('Template/Footer');
    }

    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }

}

/* End of file Dashboard.php */
