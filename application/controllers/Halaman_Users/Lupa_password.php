<?php
class Lupa_password extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('m_pengguna');
        $this->load->library('upload');
    }
    function index()
    {
        $kode = $this->session->userdata('idadmin');
        $x['user'] = $this->m_pengguna->get_pengguna_login($kode);
        $this->load->view('halaman_users/v_login_lupa');
    }
}
