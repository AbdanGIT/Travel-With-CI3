<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_pengunjung');
		$this->load->model('m_pengumuman');
		$this->load->library('upload');
	}
	function index()
	{
		if ($this->session->userdata('akses') == '1') {
			$x['data'] = $this->m_pengumuman->get_all_pengumuman();
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$x['page_title'] = 'Admin | Dashboard';
			$x['css'] = 'AdminLTE.min.css';
			$this->load->view('halaman_users/admin/layout/header', $x);
			$this->load->view('halaman_users/admin/layout/sidebar');
			$this->load->view('halaman_users/admin/v_dashboard', $x);
			$this->load->view('halaman_users/admin/layout/footer');
		} else {
			redirect('administrator');
		}
	}
}
