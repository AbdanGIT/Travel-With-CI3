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
        $this->load->model('m_kelas');
        $this->load->library('upload');
    }


    function index()
    {
        if ($this->session->userdata('akses') == '1') {
            $x['kelas'] = $this->m_kelas->get_all_kelas();
            $x['data'] = $this->m_pembayaran->get_all_pembayaran();
            $x['trx'] = $this->m_pembayaran->get_transaction();
            $x['page_title'] = 'Admin | Pembayaran';
            $x['css'] = 'AdminLTE.min.css';
            $this->load->view('halaman_users/admin/layout/header', $x);
            $this->load->view('halaman_users/admin/layout/sidebar');
            $this->load->view('halaman_users/admin/v_pembayaran', $x);
            $this->load->view('halaman_users/admin/layout/footer');
        }
    }

    function simpan_pembayaran()
    {
        $jenis_pembayaran = strip_tags($this->input->post('xjenis_pembayaran'));
        $metode_pembayaran = ($this->input->post('xmetode_pembayaran'));
        $status = strip_tags($this->input->post('xstatus'));

        $this->m_pembayaran->simpan_pembayaran($jenis_pembayaran, $metode_pembayaran, $status);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('halaman_users/admin/pembayaran');
    }

    function update_pembayaran()
    {

        $kode = $this->input->post('kode');
        $jenis_pembayaran = strip_tags($this->input->post('xjenis_pembayaran'));
        $metode_pembayaran = strip_tags($this->input->post('xmetode_pembayaran'));
        $status = strip_tags($this->input->post('xstatus'));

        $this->m_pembayaran->update_pembayaran($kode, $jenis_pembayaran, $metode_pembayaran, $status);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('halaman_users/admin/pembayaran');
    }

    function hapus_pembayaran()
    {
        $kode = $this->input->post('kode');
        $this->m_pembayaran->hapus_pembayaran($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('halaman_users/admin/pembayaran');
    }
}
