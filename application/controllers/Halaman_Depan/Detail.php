<?php

class Detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('m_tulisan');
        $this->load->model('m_paket');
        $this->load->database('hannas');

        // $this->m_pengunjung->count_visitor();
    }

    function detail_paket($id_paket)
    {

        $x['data'] = $this->m_paket->detail_paket($id_paket);
        $x['page_title'] = 'Detail Pemesanan';
        $this->load->view('Halaman_depan/layout/header', $x);
        $this->load->view('Halaman_depan/layout/sidebar');
        $this->load->view('Halaman_depan/v_detail_paket', $x);
        $this->load->view('Halaman_depan/layout/footer');
    }
    function tambah_pemesanan($id_paket)
    {

        if ($this->session->userdata('akses') == '4') {
            $x['data'] = $this->m_paket->detail_paket($id_paket);
            $x['page_title'] = 'Pemesanan';
            $this->load->view('Halaman_depan/layout/header', $x);
            $this->load->view('Halaman_depan/layout/sidebar');
            $this->load->view('Halaman_depan/v_detail_paket', $x);
            $this->load->view('Halaman_depan/layout/footer');
        } else {
            redirect('halaman_depan/detail/belum_login');
        }
    }

    function belum_login()
    {
        $x['page_title'] = 'Maaf anda belum Login';
        $this->load->view('Halaman_depan/layout/header', $x);
        // $this->load->view('Halaman_depan/layout/sidebar');
        $this->load->view('Halaman_depan/v_belum_login', $x);
        // $this->load->view('Halaman_depan/layout/footer');
    }
}
