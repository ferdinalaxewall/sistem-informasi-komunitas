<?php

class Kategori_Event extends CI_Controller
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
            'title' => 'List Kategori Event',
            'items' => $this->kategoriEvent->all(),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pages/kategori-event/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
            'action_url' => base_url('admin/kategori_event/tambah'),
            'item' => NULL,
            'title' => "Form Tambah Kategori Event",
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->form_validation->set_rules($this->kategoriEvent->rules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/kategori-event/form', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $request = [
                'nama_kategori' => $this->input->post('nama_kategori', true)
            ];

            $this->kategoriEvent->create($request);
            $this->session->set_flashdata('success', 'Kategori Event Berhasil Ditambahkan');
            redirect(base_url('admin/kategori_event'));
        }
    }

    public function ubah($id)
    {
        if (!isset($id)) redirect(base_url('admin/kategori_event'));

        $data = [
            'action_url' => base_url("admin/kategori_event/ubah/{$id}"),
            'item' => $this->kategoriEvent->findOneById($id),
            'title' => "Form Ubah Kategori Event",
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->form_validation->set_rules($this->kategoriEvent->rules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/kategori-event/form', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $request = [
                'nama_kategori' => $this->input->post('nama_kategori', true)
            ];

            $this->kategoriEvent->updateById($id, $request);
            $this->session->set_flashdata('success', 'Kategori Event Berhasil Diubah');
            redirect(base_url('admin/kategori_event'));
        }
    }

    public function hapus($id)
    {
        if (!isset($id)) show_404();
        
        $this->kategoriEvent->deleteById($id);
        $this->session->set_flashdata('success', 'Kategori Event Berhasil Dihapus');
        redirect(base_url('admin/kategori_event'));
    }
}