<?php

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data = [
            'title' => 'Event',
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'event' => $this->event->findAll([
                'is_verified' => 1
            ]),
            'kategori' => $this->kategoriEvent->findAll()
        ];

        $this->load->view('landing-page/templates/header', $data);
        $this->load->view('landing-page/templates/navbar', $data);
        $this->load->view('landing-page/templates/sidebar', $data);
        $this->load->view('landing-page/pages/event/index', $data);
        $this->load->view('landing-page/templates/footer', $data);
    }

    public function detail($event_id)
    {
        if (!isset($event_id)) redirect(base_url('event'));

        $data = [
            'title' => 'Detail Event',
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'item' => $this->event->findOneById($event_id),
            'is_joined' => $this->joinEvent->isUserJoinedEvent(
                $this->session->userdata('id'),
                $event_id
            ),
            'joined_event' => $this->joinEvent->findAll([
                'is_verified' => 1,
                'event_id' => $event_id,
            ])
        ];  
        
        $this->load->view('landing-page/templates/header', $data);
        $this->load->view('landing-page/templates/navbar', $data);
        $this->load->view('landing-page/templates/sidebar', $data);
        $this->load->view('landing-page/pages/event/detail', $data);
        $this->load->view('landing-page/templates/footer', $data);
    }

    public function ikuti($event_id)
    {
        if (!isset($event_id)) redirect(base_url('event'));

        $this->joinEvent->create([
            'is_verified' => 1,
            'user_id' => $this->session->userdata('id'),
            'event_id' => $event_id
        ]);

        $this->session->set_flashdata('success', 'Berhasil Mengikuti Event!');
        redirect(base_url("event/detail/{$event_id}"));
    }
}