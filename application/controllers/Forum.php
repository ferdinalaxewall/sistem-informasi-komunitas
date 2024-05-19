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

    public function detail($forum_id)
    {
        if (!isset($forum_id)) redirect(base_url('forum'));

        $forum = $this->forum->findOneWithJoinCategory($forum_id);
        $forum->id = $forum_id;

        $data = [
            'title' => 'Detail Forum',
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'item' => $forum, 
            'total_member' => $this->joinForum->countJoinForum([
                'forum_id' => $forum_id,
                'is_verified' => 1
            ]),
            'is_joined' => $this->joinForum->isUserJoinedForum(
                $this->session->userdata('id'),
                $forum_id
            ),
            'diskusi' => $this->forumDiskusi->groupDiskusi([
                'forum_id' => $forum_id
            ])
        ];

        $this->load->view('landing-page/templates/header', $data);
        $this->load->view('landing-page/templates/navbar', $data);
        $this->load->view('landing-page/templates/sidebar', $data);
        $this->load->view('landing-page/pages/forum/detail', $data);
        $this->load->view('landing-page/templates/footer', $data);
    }

    public function gabung($forum_id)
    {
        if (!isset($forum_id)) redirect(base_url('forum'));
        
        $this->joinForum->create([
            'forum_id' => $forum_id,
            'user_id' => $this->session->userdata('id'),
            'is_verified' => 1
        ]);

        $this->session->set_flashdata('success', "Selamat, anda sudah berhasil bergabung!");
        redirect(base_url("forum/detail/{$forum_id}"));
    }

    public function tambah_diskusi($forum_id)
    {
        if (!isset($forum_id)) redirect(base_url('forum'));

        $this->form_validation->set_rules($this->forumDiskusi->rules());
        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', 'Akses Tidak Diizinkan!');
            redirect(base_url("forum/detail/{$forum_id}"));
        } else {
            $request = [
                'pesan' => $this->input->post('pesan', true),
                'forum_id' => $forum_id,
                'user_id' => $this->session->userdata('id'),
                'parent_id' => $this->input->get('parent_id', true)
            ];

            $this->forumDiskusi->create($request);
            $this->session->set_flashdata('success', 'Topik Diskusi Berhasil Ditambahkan!');
            redirect(base_url("forum/detail/{$forum_id}"));
        }
    }

    public function buat_forum()
    {
        $data = [
            'title' => 'Buat Forum',
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'categories' => $this->kategoriForum->all(),
            'is_update' => false,
            'action_url' => base_url('forum/buat_forum'),
            'item' => NULL,
        ];

        $this->form_validation->set_rules($this->forum->rules());

        if (!$this->form_validation->run()) {
            $this->load->view('landing-page/templates/header', $data);
            $this->load->view('landing-page/templates/navbar', $data);
            $this->load->view('landing-page/templates/sidebar', $data);
            $this->load->view('landing-page/pages/forum/form', $data);
            $this->load->view('landing-page/templates/footer', $data);
        } else {
            $request = [
                'judul' => $this->input->post('judul', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'kategori_forum_id' => $this->input->post('kategori_forum_id', true),
                'user_id' => $this->session->userdata('id'),
                'is_active' => false,
                'is_verified' => false,
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
            $this->session->set_flashdata('success', 'Forum Berhasil Ditambahkan dan Akan Diverifikasi Terlebih Dahulu!');
            redirect(base_url('forum'));
        }
    }
}