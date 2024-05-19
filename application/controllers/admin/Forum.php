<?php

class Forum extends CI_Controller
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
            'title' => 'List Forum',
            'items' => $this->forum->all(),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pages/forum/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
            'action_url' => base_url('admin/forum/tambah'),
            'item' => NULL,
            'title' => "Form Tambah Forum",
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'categories' => $this->kategoriForum->all(),
            'is_update' => false,
        ];

        $this->form_validation->set_rules($this->forum->rules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/forum/form', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $request = [
                'judul' => $this->input->post('judul', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'kategori_forum_id' => $this->input->post('kategori_forum_id', true),
                'user_id' => $this->session->userdata('id'),
                'is_verified' => true,
                'is_active' => $this->input->post('is_active', true) == 'true',
                'is_verified' => $this->input->post('is_verified', true) == 'true',
            ];

            $config['upload_path'] = './public/system/img/forum/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['file_name'] = 'forum-' . time();

            $upload_image = $_FILES['thumbnail']['name'];
            
            $this->load->library('upload');
            $this->upload->initialize($config);
            
            if ($upload_image && $this->upload->do_upload('thumbnail')) {
                $request['thumbnail'] = $this->upload->data('file_name');
            }

            $this->forum->create($request, true);
            $this->session->set_flashdata('success', 'Forum Berhasil Ditambahkan');
            redirect(base_url('admin/forum'));
        }
    }

    public function ubah($id)
    {
        if (!isset($id)) redirect(base_url('admin/forum'));

        $data = [
            'action_url' => base_url("admin/forum/ubah/{$id}"),
            'item' => $this->forum->findOneById($id),
            'title' => "Form Ubah Forum",
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'categories' => $this->kategoriForum->all(),
            'is_update' => true,
        ];

        $this->form_validation->set_rules($this->forum->rules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/forum/form', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $request = [
                'judul' => $this->input->post('judul', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'kategori_forum_id' => $this->input->post('kategori_forum_id', true),
                'user_id' => $this->session->userdata('id'),
                'is_verified' => true,
                'is_active' => $this->input->post('is_active', true) == 'true',
                'is_verified' => $this->input->post('is_verified', true) == 'true',
            ];

            $config['upload_path'] = './public/system/img/forum/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['file_name'] = 'forum-' . time();

            $upload_image = $_FILES['thumbnail']['name'];

            $this->load->library('upload');
            $this->upload->initialize($config);
            
            if ($upload_image && $this->upload->do_upload('thumbnail')) {
                if (!empty($data['item']->thumbnail)) {
                    unlink(FCPATH . 'public/system/img/forum/' . $data['item']->thumbnail);
                }

                $request['thumbnail'] = $this->upload->data('file_name');
            } else {
                $request['thumbnail'] = $data['item']->thumbnail;
            }

            $this->forum->updateById($id, $request);
            $this->session->set_flashdata('success', 'Forum Berhasil Diubah');
            redirect(base_url('admin/forum'));
        }
    }

    public function hapus($id)
    {
        if (!isset($id)) show_404();
        
        $this->forum->deleteById($id);
        $this->session->set_flashdata('success', 'Forum Berhasil Dihapus');
        redirect(base_url('admin/forum'));
    }
}