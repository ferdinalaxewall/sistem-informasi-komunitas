<?php

class Pengguna extends CI_Controller
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
            'title' => 'List Pengguna',
            'items' => $this->user->findAll([
                'role' => 'pengguna'
            ]),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pages/pengguna/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
            'action_url' => base_url('admin/pengguna/tambah'),
            'item' => NULL,
            'title' => "Form Tambah Pengguna",
            'is_update' => false,
            'user' => $this->user->findOneById($this->session->userdata('id')),
        ];

        $this->form_validation->set_rules($this->user->newUserRules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/pengguna/form', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $password = $this->input->post('password', true);
            $encryptedPassword = password_hash($password, PASSWORD_BCRYPT);

            $request = [
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'password' => $encryptedPassword,
                'role' => 'pengguna'
            ];

            $this->user->create($request, true);
            $this->session->set_flashdata('success', 'Pengguna Berhasil Ditambahkan');
            redirect(base_url('admin/pengguna'));
        }
    }

    public function ubah($id)
    {
        if (!isset($id)) redirect(base_url('admin/pengguna'));

        $data = [
            'action_url' => base_url("admin/pengguna/ubah/{$id}"),
            'item' => $this->user->findOneById($id),
            'title' => "Form Ubah Pengguna",
            'is_update' => true,
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->form_validation->set_rules($this->user->updateUserRules($id));

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/pengguna/form', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $request = [
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'role' => 'pengguna'
            ];

            if (!empty($this->input->post('password', true))) {
                $password = $this->input->post('password', true);
                $request['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            $this->user->updateById($id, $request);
            $this->session->set_flashdata('success', 'Pengguna Berhasil Diubah');
            redirect(base_url('admin/pengguna'));
        }
    }

    public function hapus($id)
    {
        if (!isset($id)) show_404();
        
        $this->user->deleteById($id);
        $this->session->set_flashdata('success', 'Pengguna Berhasil Dihapus');
        redirect(base_url('admin/pengguna'));
    }

    public function print()
    {
        $data = [
            'title' => 'Laporan Event',
            'items' => $this->user->findAll([
                'role' => 'pengguna'
            ]),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $dompdf = new Dompdf\Dompdf();
        $this->load->view('admin/pdf/data-pengguna', $data);

        $paper_size = 'A4';
        $orientation = "landscape";
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("data-pengguna-{$data['user']->code}.pdf", array('Attachment' => 0));
    }
}