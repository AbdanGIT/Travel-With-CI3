<?php
class Register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('m_login');
        $this->load->model('m_pengguna');
        $this->load->library('upload');
    }
    function index()
    {
        $kode = $this->session->userdata('idadmin');
        $x['user'] = $this->m_pengguna->get_pengguna_login($kode);
        $this->load->view('halaman_users/v_register');
    }
    function simpan_pengguna()
    {
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

    }
}
