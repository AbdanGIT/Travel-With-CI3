<?php
class Tentang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_tulisan');
        // $this->load->model('m_galeri');
        // $this->load->model('m_pengumuman');
        // $this->load->model('m_agenda');
        // $this->load->model('m_files');
        // $this->load->model('m_pengunjung');
        // $this->m_pengunjung->count_visitor();
    }
    function index()
    {
        $x['page_title'] = 'Tentang Kami';
        $x['berita'] = $this->m_tulisan->get_berita_home();
        $x['css'] = 'adminlte';
        // $x['pengumuman'] = $this->m_pengumuman->get_pengumuman_home();
        // $x['agenda'] = $this->m_agenda->get_agenda_home();
        // $x['tot_guru'] = $this->db->get('tbl_guru')->num_rows();
        // $x['tot_siswa'] = $this->db->get('tbl_siswa')->num_rows();
        // $x['tot_files'] = $this->db->get('tbl_files')->num_rows();
        // $x['tot_agenda'] = $this->db->get('tbl_agenda')->num_rows();
        $this->load->view('halaman_users/jamaah/layout/header', $x);
        $this->load->view('halaman_users/jamaah/layout/sidebar');
        $this->load->view('halaman_users/jamaah/v_tentang');
        $this->load->view('halaman_users/jamaah/layout/footer');
        // $this->load->view('depan/v_home',$x);
    }
}
