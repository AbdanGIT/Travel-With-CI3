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
        $this->load->model('m_jamaah');
        $this->load->model('m_paket');
        $this->load->model('m_kelas');
        $this->load->model('m_kategori_pemesanan');
        $this->load->library('upload');
    }


    function index()
    {
        $x['kelas'] = $this->m_kelas->get_all_kelas();
        $x['data'] = $this->m_pemesanan->get_all_pemesanan();
        $x['pemesan'] = $this->m_jamaah->get_all_jamaah();
        $x['paket'] = $this->m_paket->get_all_paket();
        $x['page_title'] = 'Admin | Pemesanan';
        $x['css'] = '';
        $this->load->view('halaman_users/admin/layout/header', $x);
        $this->load->view('halaman_users/admin/layout/sidebar');
        $this->load->view('halaman_users/admin/v_Pemesanan', $x);
        $this->load->view('halaman_users/admin/layout/footer');
    }

    function simpan_pemesanan()
    {
        $id_jamaah = strip_tags($this->input->post('xnama_paspor'));
        $id_paket = strip_tags($this->input->post('xnama_paket'));
        $jenis_pemesanan = strip_tags($this->input->post('xjenis_pemesanan'));

        $this->m_pemesanan->simpan_pemesanan($id_jamaah, $id_paket, $jenis_pemesanan);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('halaman_users/admin/pemesanan');
    }

    function update_pemesanan()
    {

        $kode = $this->input->post('kode');

        $id_jamaah = strip_tags($this->input->post('xnama_paspor'));
        $id_paket = strip_tags($this->input->post('xnama_paket'));
        $jenis_pemesanan = strip_tags($this->input->post('xjenis_pemesanan'));

        $this->m_pemesanan->update_pemesanan($kode, $id_jamaah, $id_paket, $jenis_pemesanan);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('halaman_users/admin/pemesanan');
    }

    function hapus_pemesanan()
    {
        $kode = $this->input->post('kode');
        $this->m_pemesanan->hapus_pemesanan($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('halaman_users/admin/pemesanan');
    }
}
