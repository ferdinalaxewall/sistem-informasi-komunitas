<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index() 
    {
        $data = [
            'title' => 'Beranda',
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'forum' => $this->forum->findWithLimit([
                'is_active' => 1,
                'is_verified' => 1
            ], 6),
            'event' => $this->event->findWithLimit([
                'is_verified' => 1
            ], 6)
        ];

        $this->load->view('landing-page/templates/header', $data);
        $this->load->view('landing-page/templates/navbar', $data);
        $this->load->view('landing-page/templates/sidebar', $data);
        $this->load->view('landing-page/pages/home/index', $data);
        $this->load->view('landing-page/templates/footer', $data);
    }
}