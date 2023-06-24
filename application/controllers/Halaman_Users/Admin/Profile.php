<?php
class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('administrator');
            redirect($url);
        };

        $this->load->model('m_pengguna');
        $this->load->library('upload');
    }

    function index()
    {
        if ($this->session->userdata('akses') == '1') {
            $kode = $this->session->userdata('idadmin');
            $x['user'] = $this->m_pengguna->get_pengguna_login($kode);
            $x['data'] = $this->m_pengguna->get_all_pengguna();
            $x['page_title'] = 'Admin | Profile';
            $x['css'] = 'profile';
            $this->load->view('halaman_users/admin/layout/header', $x);
            $this->load->view('halaman_users/admin/layout/sidebar');
            $this->load->view('halaman_users/admin/v_profil', $x);
            $this->load->view('halaman_users/admin/layout/footer');
        }
    }
}
