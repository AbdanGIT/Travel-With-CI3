<?php
class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('halaman_users/administrator');
            redirect($url);
        };
        $this->load->model('m_pembayaran');
        $this->load->model('m_pengguna');
        $this->load->library('upload');
    }


    function index()
    {
        // $x['status'] = $this->m_status->get_all_status();
        $x['data'] = $this->m_pembayaran->get_all_pembayaran();
        $x['page_title'] = 'penyiar | pembayaran';
        $this->load->view('halaman_users/penyiar/layout/header', $x);
        $this->load->view('halaman_users/penyiar/layout/sidebar');
        $this->load->view('halaman_users/penyiar/v_pembayaran', $x);
        $this->load->view('halaman_users/penyiar/layout/footer');
    }

    function simpan_pembayaran()
    {

        $jenis_pembayaran = strip_tags($this->input->post('xjenis_pembayaran'));
        $metode_pembayaran = strip_tags($this->input->post('xmetode_pembayaran'));
        $status = strip_tags($this->input->post('xstatus'));

        $this->m_pembayaran->simpan_pembayaran($jenis_pembayaran, $metode_pembayaran, $status);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('halaman_users/penyiar/pembayaran');
    }
}
