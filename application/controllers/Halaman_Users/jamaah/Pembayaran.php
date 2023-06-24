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
        $x['page_title'] = 'Jamaah | pembayaran';
        $this->load->view('halaman_users/jamaah/layout/header', $x);
        $this->load->view('halaman_users/jamaah/layout/sidebar');
        $this->load->view('halaman_users/jamaah/v_pembayaran', $x);
        $this->load->view('halaman_users/jamaah/layout/footer');
    }

    function simpan_pembayaran()
    {

        $jenis_pembayaran = strip_tags($this->input->post('xjenis_pembayaran'));
        $metode_pembayaran = strip_tags($this->input->post('xmetode_pembayaran'));
        $status = strip_tags($this->input->post('xstatus'));

        $this->m_pembayaran->simpan_pembayaran($jenis_pembayaran, $metode_pembayaran, $status);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('halaman_users/jamaah/pembayaran');
    }

    function update_pembayaran()
    {
        $kode = $this->input->post('kode');
        $jenis_pembayaran = strip_tags($this->input->post('xjenis_pembayaran'));
        $metode_pembayaran = strip_tags($this->input->post('xmetode_pembayaran'));
        $status = strip_tags($this->input->post('xstatus'));

        $this->m_pembayaran->update_pembayaran($kode, $jenis_pembayaran, $metode_pembayaran, $status);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('halaman_users/jamaah/pembayaran');
    }

    function hapus_pembayaran()
    {
        $kode = $this->input->post('kode');
        $this->m_pembayaran->hapus_pembayaran($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('halaman_users/jamaah/pembayaran');
    }
}
