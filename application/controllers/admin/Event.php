<?php

class Event extends CI_Controller
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
            'title' => 'List Event',
            'items' => $this->event->all(),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pages/event/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
            'action_url' => base_url('admin/event/tambah'),
            'item' => NULL,
            'title' => "Form Tambah Event",
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'categories' => $this->kategoriEvent->all(),
            'is_update' => false,
        ];

        $this->form_validation->set_rules($this->event->rules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/event/form', $data);
            $this->load->view('admin/templates/footer', $data);
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
                'is_verified' => $this->input->post('is_verified', true) == 'true',
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
            $this->session->set_flashdata('success', 'Event Berhasil Ditambahkan');
            redirect(base_url('admin/event'));
        }
    }

    public function ubah($id)
    {
        if (!isset($id)) redirect(base_url('admin/event'));

        $data = [
            'action_url' => base_url("admin/event/ubah/{$id}"),
            'item' => $this->event->findOneById($id),
            'title' => "Form Ubah Event",
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'categories' => $this->kategoriEvent->all(),
            'is_update' => true,
        ];

        $this->form_validation->set_rules($this->event->rules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/event/form', $data);
            $this->load->view('admin/templates/footer', $data);
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
                'is_verified' => $this->input->post('is_verified', true) == 'true',
            ];

            $config['upload_path'] = './public/system/img/event/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['file_name'] = 'event-' . time();

            $upload_image = $_FILES['thumbnail']['name'];

            $this->load->library('upload');
            $this->upload->initialize($config);
            
            if ($upload_image && $this->upload->do_upload('thumbnail')) {
                if (!empty($data['item']->thumbnail)) {
                    unlink(FCPATH . 'public/system/img/event/' . $data['item']->thumbnail);
                }

                $request['thumbnail'] = $this->upload->data('file_name');
            } else {
                $request['thumbnail'] = $data['item']->thumbnail;
            }

            $this->event->updateById($id, $request);
            $this->session->set_flashdata('success', 'Event Berhasil Diubah');
            redirect(base_url('admin/event'));
        }
    }

    public function hapus($id)
    {
        if (!isset($id)) show_404();
        
        $this->event->deleteById($id);
        $this->session->set_flashdata('success', 'Event Berhasil Dihapus');
        redirect(base_url('admin/event'));
    }
}