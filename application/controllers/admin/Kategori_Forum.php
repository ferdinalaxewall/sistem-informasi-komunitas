<?php

class Kategori_Forum extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Kategori Forum',
            'items' => $this->kategoriForum->all()
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pages/kategori-forum/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
            'action_url' => base_url('admin/kategori_forum/tambah'),
            'item' => NULL,
            'title' => "Form Tambah Kategori Forum"
        ];

        $this->form_validation->set_rules($this->kategoriForum->rules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/kategori-forum/form', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $request = [
                'nama_kategori' => $this->input->post('nama_kategori', true)
            ];

            $this->kategoriForum->create($request);
            $this->session->set_flashdata('success', 'Kategori Forum Berhasil Ditambahkan');
            redirect(base_url('admin/kategori_forum'));
        }
    }

    public function ubah($id)
    {
        if (!isset($id)) redirect(base_url('admin/kategori_forum'));

        $data = [
            'action_url' => base_url("admin/kategori_forum/ubah/{$id}"),
            'item' => $this->kategoriForum->findOneById($id),
            'title' => "Form Ubah Kategori Forum"
        ];

        $this->form_validation->set_rules($this->kategoriForum->rules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/kategori-forum/form', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $request = [
                'nama_kategori' => $this->input->post('nama_kategori', true)
            ];

            $this->kategoriForum->updateById($id, $request);
            $this->session->set_flashdata('success', 'Kategori Forum Berhasil Diubah');
            redirect(base_url('admin/kategori_forum'));
        }
    }

    public function hapus($id)
    {
        if (!isset($id)) show_404();
        
        $this->kategoriForum->deleteById($id);
        $this->session->set_flashdata('success', 'Kategori Forum Berhasil Dihapus');
        redirect(base_url('admin/kategori_forum'));
    }
}