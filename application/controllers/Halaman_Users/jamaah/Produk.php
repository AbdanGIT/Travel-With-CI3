<?php
class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_pengumuman');
        $this->load->model('m_tulisan');
        $this->load->model('m_produk');
        $this->load->model('m_paket');
        // $this->m_pengunjung->count_visitor();
    }
    function index()
    {
        if ($this->session->userdata('akses') == '4') {
            $x['data'] = $this->m_paket->get_all_paket();
            $x['page_title'] = 'Produk';
            $x['css'] = 'adminlte';
            $this->load->view('halaman_users/jamaah/layout/header', $x);
            $this->load->view('halaman_users/jamaah/layout/sidebar');
            $this->load->view('halaman_users/jamaah/v_produk', $x);
            $this->load->view('halaman_users/jamaah/layout/footer');
            // $this->load->view('depan/v_home',$x);
        } else {
            redirect('halaman_depan/detail/belum_login');
        }
    }
}
