<?php
class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('halaman_users/administrator');
            redirect($url);
        };
        $this->load->model('m_pemesanan');
        $this->load->model('m_pengguna');
        $this->load->model('m_kelas');
        $this->load->model('m_kategori_pemesanan');
        $this->load->library('upload');
    }


    function index()
    {
        $x['kelas'] = $this->m_kelas->get_all_kelas();
        $x['data'] = $this->m_pemesanan->get_all_pemesanan();
        $x['kategori'] = $this->m_kategori_pemesanan->get_all_pemesanan();
        $x['page_title'] = 'penyiar | pemesanan';
        $this->load->view('halaman_users/penyiar/layout/header', $x);
        $this->load->view('halaman_users/penyiar/layout/sidebar');
        $this->load->view('halaman_users/penyiar/v_pemesanan', $x);
        $this->load->view('halaman_users/penyiar/layout/footer');
    }

    function simpan_pemesanan()
    {

        $nama_pemesanan = strip_tags($this->input->post('xnama_pemesanan'));
        $nama_paket = strip_tags($this->input->post('xnama_paket'));
        $jenis_pemesanan = strip_tags($this->input->post('xjenis_pemesanan'));
        $total_harga = strip_tags($this->input->post('xtotal_harga'));
        $keterangan = strip_tags($this->input->post('xketerangan'));

        $this->m_pemesanan->simpan_pemesanan($nama_pemesanan, $nama_paket, $jenis_pemesanan, $total_harga, $keterangan);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('halaman_users/penyiar/pemesanan');
    }
}
