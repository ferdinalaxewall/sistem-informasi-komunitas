<?php

function cek_login()
{
    $ci = get_instance();
    if (! $ci->session->userdata('email')) {
        $ci->session->set_flashdata(
            'error',
            'Akses tidak diizinkan, silahkan login terlebih dahulu!'
        );

        redirect(base_url('autentikasi'));
    }
}

function cek_admin()
{
    $ci = get_instance();
    $role = $this->session->userdata('role');

    if ($role != 'admin') {
        $this->session->set_flashdata('error', 'Akses tidak diizinkan!');
        redirect(base_url());
    }
}