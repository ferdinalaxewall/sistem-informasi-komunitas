<?php

class Forum extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data = [
            'title' => 'Forum',
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'forum' => $this->forum->findAll([
                'is_active' => 1,
                'is_verified' => 1
            ]),
            'kategori' => $this->kategoriForum->all()
        ];

        $this->load->view('landing-page/templates/header', $data);
        $this->load->view('landing-page/templates/navbar', $data);
        $this->load->view('landing-page/templates/sidebar', $data);
        $this->load->view('landing-page/pages/forum/index', $data);
        $this->load->view('landing-page/templates/footer', $data);
    }
}