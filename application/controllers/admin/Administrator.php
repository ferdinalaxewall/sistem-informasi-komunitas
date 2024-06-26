<?php

class Administrator extends CI_Controller
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
            'title' => 'List Administrator',
            'items' => $this->user->findAll([
                'role' => 'admin'
            ]),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pages/administrator/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambah()
    {
        $data = [
            'action_url' => base_url('admin/administrator/tambah'),
            'item' => NULL,
            'title' => "Form Tambah Administrator",
            'is_update' => false,
            'user' => $this->user->findOneById($this->session->userdata('id')),
        ];

        $this->form_validation->set_rules($this->user->newUserRules());

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/administrator/form', $data);
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
                'role' => 'admin'
            ];

            $this->user->create($request, true);
            $this->session->set_flashdata('success', 'Administrator Berhasil Ditambahkan');
            redirect(base_url('admin/administrator'));
        }
    }

    public function ubah($id)
    {
        if (!isset($id)) redirect(base_url('admin/administrator'));

        $data = [
            'action_url' => base_url("admin/administrator/ubah/{$id}"),
            'item' => $this->user->findOneById($id),
            'title' => "Form Ubah Administrator",
            'is_update' => true,
            'user' => $this->user->findOneById($this->session->userdata('id')),
        ];

        $this->form_validation->set_rules($this->user->updateUserRules($id));

        if (!$this->form_validation->run()) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pages/administrator/form', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $request = [
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'role' => 'admin'
            ];

            if (!empty($this->input->post('password', true))) {
                $password = $this->input->post('password', true);
                $request['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            $this->user->updateById($id, $request);
            $this->session->set_flashdata('success', 'Administrator Berhasil Diubah');
            redirect(base_url('admin/administrator'));
        }
    }

    public function hapus($id)
    {
        if (!isset($id)) show_404();
        
        $this->user->deleteById($id);
        $this->session->set_flashdata('success', 'Administrator Berhasil Dihapus');
        redirect(base_url('admin/administrator'));
    }

    public function print()
    {
        $data = [
            'title' => 'Laporan Data Administrator',
            'items' => $this->user->findAll([
                'role' => 'admin'
            ]),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $dompdf = new Dompdf\Dompdf();
        $this->load->view('admin/pdf/data-admin', $data);

        $paper_size = 'A4';
        $orientation = "landscape";
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("data-admin-{$data['user']->code}.pdf", array('Attachment' => 0));
    }
}