<?php
class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengumuman');
        $this->load->model('m_tulisan');
        $this->load->model('m_produk');
        $this->load->model('m_paket');
        // $this->m_pengunjung->count_visitor();
    }
    function index()
    {

        $page = $this->uri->segment(3);
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 7;
        $config['base_url'] = base_url() . 'halaman_depan/produk/index/';
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        //Tambahan untuk styling
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] = $this->pagination->create_links();
        $x['data'] = $this->m_paket->get_all_paket();
        $x['page_title'] = 'Produk';
        $this->load->view('halaman_depan/layout/header', $x);
        $this->load->view('halaman_depan/layout/sidebar');
        $this->load->view('halaman_depan/v_produk', $x);
        $this->load->view('halaman_depan/layout/footer');
        // $this->load->view('depan/v_home',$x);
    }
}
