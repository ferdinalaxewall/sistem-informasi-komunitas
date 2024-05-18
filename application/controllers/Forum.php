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
}