<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_admin();
    }

    public function index()
    {
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/templates/topbar');
        $this->load->view('admin/pages/dashboard/index');
        $this->load->view('admin/templates/footer');

    }
    
    public function tes()
    {
        $this->load->view('admin/pages/dashboard/tes');
    }
}