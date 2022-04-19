<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Coba extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $is_login    = $this->session->userdata('is_login');
        $this->id    = $this->session->userdata('id');

        if (!$is_login) {
            redirect(base_url());
            return;
        }
    }
    public function index()
    {
        $data['title']              = 'Coba';
        $data['page']               = 'pages/coba/index';

        return $this->view($data);
    }
}
