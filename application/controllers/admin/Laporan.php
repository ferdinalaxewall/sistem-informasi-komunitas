<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_admin();
    }

    public function forum()
    {
        $data = [
            'title' => 'Laporan Forum',
            'items' => $this->forum->reportForum([
                'start_date' => $this->input->get('start_date'),
                'end_date' => $this->input->get('end_date'),
            ]),
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'filter' => [
                'start_date' => $this->input->get('start_date'),
                'end_date' => $this->input->get('end_date'),
            ]
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pages/laporan/forum', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function cetak_laporan_forum()
    {
        $data = [
            'title' => 'Laporan Forum',
            'items' => $this->forum->reportForum([
                'start_date' => $this->input->get('start_date'),
                'end_date' => $this->input->get('end_date'),
            ]),
            'user' => $this->user->findOneById($this->session->userdata('id')),
            'filter' => [
                'start_date' => $this->input->get('start_date'),
                'end_date' => $this->input->get('end_date'),
            ]
        ];

        $dompdf = new Dompdf\Dompdf();
        $this->load->view('admin/pdf/laporan-forum', $data);

        $paper_size = 'A4';
        $orientation = "potrait";
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan-forum-{$data['user']->code}.pdf", array('Attachment' => 0));
    }

    public function event()
    {
        $data = [
            'title' => 'Laporan Event',
            'items' => $this->event->reportEvent(),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pages/laporan/event', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function cetak_laporan_event()
    {
        $data = [
            'title' => 'Laporan Event',
            'items' => $this->event->reportEvent(),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        $dompdf = new Dompdf\Dompdf();
        $this->load->view('admin/pdf/laporan-event', $data);

        $paper_size = 'A4';
        $orientation = "potrait";
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan-event-{$data['user']->code}.pdf", array('Attachment' => 0));
    }
}