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

    public function buat_event()
    {
        $data = [
            'title' => "Tambah Event",
            'action_url' => base_url('event/buat_event'),
            'item' => NULL,
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'categories' => $this->kategoriEvent->all(),
            'is_update' => false,
        ];

        $this->form_validation->set_rules($this->event->rules());
        
        if (!$this->form_validation->run()) {
            $this->load->view('landing-page/templates/header', $data);
            $this->load->view('landing-page/templates/navbar', $data);
            $this->load->view('landing-page/templates/sidebar', $data);
            $this->load->view('landing-page/pages/event/form', $data);
            $this->load->view('landing-page/templates/footer', $data);
        } else {
            $request = [
                'judul' => $this->input->post('judul', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'kategori_event_id' => $this->input->post('kategori_event_id', true),
                'user_id' => $this->session->userdata('id'),
                'is_verified' => true,
                'tipe' => $this->input->post('tipe', true),
                'waktu_mulai' => $this->input->post('waktu_mulai', true),
                'waktu_selesai' => $this->input->post('waktu_selesai', true),
                'lokasi' => $this->input->post('lokasi', true),
                'kapasitas' => $this->input->post('kapasitas', true),
                'is_verified' => false,
            ];

            $config['upload_path'] = './public/system/img/event/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['file_name'] = 'event-' . time();

            $upload_image = $_FILES['thumbnail']['name'];
            
            $this->load->library('upload');
            $this->upload->initialize($config);
            
            if ($upload_image && $this->upload->do_upload('thumbnail')) {
                $request['thumbnail'] = $this->upload->data('file_name');
            }

            $this->event->create($request);
            $this->session->set_flashdata('success', 'Event Berhasil Ditambahkan dan Akan Diverifikasi Terlebih Dahulu!');
            redirect(base_url('event'));
        }
    }
}