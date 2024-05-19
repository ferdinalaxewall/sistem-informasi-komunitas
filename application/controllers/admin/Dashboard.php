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
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'count_admin' => $this->user->count([
                'role' => 'admin'
            ]),
            'count_user' => $this->user->count([
                'role' => 'pengguna'
            ]),
            'count_forum' => $this->forum->count(),
            'count_event' => $this->event->count(),
            'count_join_forum' => $this->forum->countJoinForum(),
            'count_join_event' => $this->event->countJoinEvent(),
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