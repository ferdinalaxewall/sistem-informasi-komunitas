<?php

class Autentikasi extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('role')) {
            if ($this->sesssion->userdata('role') == 'admin') {
                redirect(base_url('admin/dashboard'));
            } else {
                redirect(base_url());
            }
        }

        $this->form_validation->set_rules($this->user->loginRules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/pages/auth/login');
        } else {
            $this->_login();
        }
        
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password', true);

        $user = $this->user->findOne([
            'email' => $email
        ]);

        if (!is_null($user)) {
            if (password_verify($password, $user->password)) {
                $data = [
                    'id' => $user->id,
                    'email' => $user->email,
                ];

                $this->session->set_userdata($data);

                $this->session->set_flashdata('success', "Selamat Datang, {$user->nama}!");

                if ($user->role == 'admin') {
                    redirect(base_url('admin/dashboard'));
                } else {
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('error', 'Password yang anda masukkan salah!');
                redirect(base_url('autentikasi'));
            }
        } else {
            $this->session->set_flashdata('error', 'Email tidak terdaftar!');
            redirect(base_url('autentikasi'));
        }
    }

    public function logout()
    {
        $data = [
            'id' => '',
            'email' => '',
            'role' => ''
        ];

        $this->session->unset_userdata($data);
        $this->session->sess_destroy();

        $this->session->set_flashdata('success', 'Logout berhasil!');
        redirect(base_url('autentikasi'));
    }
}