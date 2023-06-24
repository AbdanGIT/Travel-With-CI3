<?php
class paspor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('halaman_users/administrator');
            redirect($url);
        };
        $this->load->model('m_paspor');
        $this->load->model('m_pengguna');
        $this->load->model('m_kelas');
        $this->load->library('upload');
    }


    function index()
    {
        if ($this->session->userdata('akses') == '1') {
            $x['kelas'] = $this->m_kelas->get_all_kelas();
            $x['data'] = $this->m_paspor->get_all_paspor();
            $x['page_title'] = 'Admin | paspor';
            $x['css'] = 'AdminLTE.min.css';
            $this->load->view('halaman_users/admin/layout/header', $x);
            $this->load->view('halaman_users/admin/layout/sidebar');
            $this->load->view('halaman_users/admin/v_paspor', $x);
            $this->load->view('halaman_users/admin/layout/footer');
        }
    }

    function simpan_paspor()
    {
        $jenis_paspor = strip_tags($this->input->post('xjenis_paspor'));
        $metode_paspor = ($this->input->post('xmetode_paspor'));
        $status = strip_tags($this->input->post('xstatus'));

        $this->m_paspor->simpan_paspor($jenis_paspor, $metode_paspor, $status);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('halaman_users/admin/paspor');
    }

    function update_paspor()
    {

        $kode = $this->input->post('kode');
        $jenis_paspor = strip_tags($this->input->post('xjenis_paspor'));
        $metode_paspor = strip_tags($this->input->post('xmetode_paspor'));
        $status = strip_tags($this->input->post('xstatus'));

        $this->m_paspor->update_paspor($kode, $jenis_paspor, $metode_paspor, $status);
        echo $this->session->set_flashdata('msg', 'info');
        redirect('halaman_users/admin/paspor');
    }

    function hapus_paspor()
    {
        $kode = $this->input->post('kode');
        $this->m_paspor->hapus_paspor($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('halaman_users/admin/paspor');
    }
}
