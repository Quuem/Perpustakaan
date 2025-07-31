<?php

defined('BASEPATH') or exit('No direct script access allowed');

class NotFound extends CI_Controller
{

    public function index()
    {
        $this->load->view('errors/html/error_404s');
    }

}

/* End of file 404.php */
