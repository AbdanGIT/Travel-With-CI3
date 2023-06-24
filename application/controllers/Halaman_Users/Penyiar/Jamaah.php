<?php
class Jamaah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('halaman_users/administrator');
            redirect($url);
        };
        $this->load->model('m_jamaah');
        $this->load->model('m_pengguna');
        $this->load->model('m_pembayaran');
        $this->load->library('upload');
    }


    function index()
    {
        $x['pembayaran'] = $this->m_pembayaran->get_all_pembayaran();
        $x['data'] = $this->m_jamaah->get_all_jamaah();
        $x['page_title'] = 'penyiar | Jamaah';
        $this->load->view('halaman_users/penyiar/layout/header', $x);
        $this->load->view('halaman_users/penyiar/layout/sidebar');
        $this->load->view('halaman_users/penyiar/v_jamaah', $x);
        $this->load->view('halaman_users/penyiar/layout/footer');
    }

    function simpan_jamaah()
    {
        $nama_ktp = strip_tags($this->input->post('xnama_ktp'));
        $nama_paspor = strip_tags($this->input->post('xnama_paspor'));
        $no_identitas = strip_tags($this->input->post('xno_identitas'));
        $no_tlp = strip_tags($this->input->post('xno_tlp'));
        $nama_ayah = strip_tags($this->input->post('xnama_ayah'));
        $email = strip_tags($this->input->post('xemail'));
        $tanggal_lahir = strip_tags($this->input->post('xtanggal_lahir'));
        $jenis_kelamin = strip_tags($this->input->post('xjenis_kelamin'));
        $kewarganegaraan = strip_tags($this->input->post('xkewarganegaraan'));
        $tempat_lahir = strip_tags($this->input->post('xtempat_lahir'));
        $alamat = strip_tags($this->input->post('xalamat'));
        $pendidikan = strip_tags($this->input->post('xpendidikan'));
        $provinsi = strip_tags($this->input->post('xprovinsi'));
        $kota = strip_tags($this->input->post('xkota'));
        $kecamatan = strip_tags($this->input->post('xkecamatan'));
        $kelurahan = strip_tags($this->input->post('xkelurahan'));
        $kategori_usia = strip_tags($this->input->post('xkategori_usia'));
        $status_menikah = strip_tags($this->input->post('xstatus_menikah'));
        $pekerjaan = strip_tags($this->input->post('xpekerjaan'));
        $status_keluarga = strip_tags($this->input->post('xstatus_keluarga'));
        $ukuran_baju = strip_tags($this->input->post('xukuran_baju'));
        $tipe_anggota = strip_tags($this->input->post('xtipe_anggota'));
        $nama_paket = strip_tags($this->input->post('xnama_paket'));
        $porsi = strip_tags($this->input->post('xporsi'));
        $status = strip_tags($this->input->post('xstatus'));
        $penyiar = strip_tags($this->input->post('xpenyiar'));
        $perwakilan = strip_tags($this->input->post('xperwakilan'));

        $this->m_jamaah->simpan_jamaah($nama_ktp, $nama_paspor, $no_identitas, $no_tlp, $nama_ayah, $email, $tanggal_lahir, $jenis_kelamin, $kewarganegaraan, $tempat_lahir, $alamat, $pendidikan, $provinsi, $kota, $kecamatan, $kelurahan, $kategori_usia, $status_menikah, $pekerjaan, $status_keluarga, $ukuran_baju, $tipe_anggota, $nama_paket, $porsi, $status, $penyiar, $perwakilan);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('halaman_users/penyiar/jamaah');
    }
}
