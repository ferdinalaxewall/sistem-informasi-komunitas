<?php

class Laporan extends CI_Controller
{
    public function forum()
    {
        $data = [
            'title' => 'Laporan Forum',
            'items' => $this->forum->reportForum(),
            'user' => $this->user->findOneById($this->session->userdata('id'))
        ];

        // var_dump($data['items']);

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
            'items' => $this->forum->reportForum(),
            'user' => $this->user->findOneById($this->session->userdata('id'))
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

    }
}