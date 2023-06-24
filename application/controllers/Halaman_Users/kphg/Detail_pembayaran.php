<?php
class Detail_pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('halaman_users/administrator');
            redirect($url);
        };
        $this->load->model('m_detail_pembayaran');
        $this->load->model('m_pengguna');
        $this->load->library('upload');
    }


    function index()
    {
        // $x['status'] = $this->m_status->get_all_status();
        $x['data'] = $this->m_detail_pembayaran->get_all_pembayaran();
        $x['page_title'] = 'KPHG | Detail_pembayaran';
        $this->load->view('halaman_users/kphg/layout/header', $x);
        $this->load->view('halaman_users/kphg/layout/sidebar');
        $this->load->view('halaman_users/kphg/v_detail_pembayaran', $x);
        $this->load->view('halaman_users/kphg/layout/footer');
    }

    function simpan_detail_pembayaran()
    {

        $id_pemesanan = strip_tags($this->input->post('xid_pemesanan'));
        $metode_pembayaran = strip_tags($this->input->post('xmetode_pembayaran'));
        $status_pembayaran = strip_tags($this->input->post('xstatus_pembayaran'));
        $harga = strip_tags($this->input->post('xharga'));
        $tanggal_transaksi = strip_tags($this->input->post('xtanggal_transaksi'));
        $createdate = strip_tags($this->input->post('xcreatedate'));
        $updatedate = strip_tags($this->input->post('xupdatedate'));
        $status = strip_tags($this->input->post('xstatus'));

        $this->m_detail_pembayaran->simpan_detail_pembayaran($id_pemesanan, $metode_pembayaran, $status_pembayaran, $harga, $tanggal_transaksi, $createdate, $updatedate, $status);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('halaman_users/kphg/detail_pembayaran');
    }

    function update_detail_pembayaran()
    {
        $kode = $this->input->post('kode');
        $id_pemesanan = strip_tags($this->input->post('xid_pemesanan'));
        $metode_pembayaran = strip_tags($this->input->post('xmetode_pembayaran'));
        $status_pembayaran = strip_tags($this->input->post('xstatus_pembayaran'));
        $harga = strip_tags($this->input->post('xharga'));
        $tanggal_transaksi = strip_tags($this->input->post('xtanggal_transaksi'));
        $createdate = strip_tags($this->input->post('xcreatedate'));
        $updatedate = strip_tags($this->input->post('xupdatedate'));
        $status = strip_tags($this->input->post('xstatus'));

        $this->m_detail_pembayaran->update_detail_pembayaran($kode, $id_pemesanan, $metode_pembayaran, $status_pembayaran, $harga, $tanggal_transaksi, $createdate, $updatedate, $status);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('halaman_users/kphg/detail_pembayaran');
    }

    function hapus_detail_pembayaran()
    {
        $kode = $this->input->post('kode');
        $this->m_detail_pembayaran->hapus_detail_pembayaran($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('halaman_users/kphg/detail_pembayaran');
    }
}
