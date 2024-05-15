<?php

class Profil extends CI_Controller
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
            'title' => 'Profil Saya',
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->form_validation->set_rules($this->user->updateUserRules($this->session->userdata('id')));

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/profil/index', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $id = $this->session->userdata('id');
            
            $request = [
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
            ];

            if (!empty($this->input->post('password', true))) {
                $password = $this->input->post('password', true);
                $request['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            $this->user->updateById($id, $request);
            $this->session->set_flashdata('success', 'Profil Berhasil Diubah');
            redirect(base_url('admin/profil'));
        }
    }
}