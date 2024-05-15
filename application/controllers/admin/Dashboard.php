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
        $data = [
            'title' => 'Dashboard',
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pages/dashboard/index', $data);
        $this->load->view('admin/templates/footer');

    }
    
    public function tes()
    {
        $this->load->view('admin/pages/dashboard/tes');
    }
}