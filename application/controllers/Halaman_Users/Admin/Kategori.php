<?php
class Kategori extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		};
		$this->load->model('m_kategori');
		$this->load->model('m_kelas');
		$this->load->model('m_produk');
		$this->load->library('upload');
	}


	function index()
	{
		if ($this->session->userdata('akses') == '1') {
			$x['data'] = $this->m_kelas->get_all_kelas();
			// $x['data']=$this->m_produk->get_all_Produk();
			$x['page_title'] = 'Admin | Kategori';
			$x['css'] = 'AdminLTE.min.css';
			$this->load->view('halaman_users/admin/layout/header', $x);
			$this->load->view('halaman_users/admin/layout/sidebar', $x);
			$this->load->view('halaman_users/admin/v_kategori', $x);
			$this->load->view('halaman_users/admin/layout/footer', $x);
		}
	}

	function simpan_kategori()
	{
		$kategori = strip_tags($this->input->post('xkategori'));
		$this->m_kelas->simpan_kategori($kategori);
		// $this->m_kategori->simpan_kategori($kategori);
		echo $this->session->set_flashdata('msg', 'success');
		redirect('halaman_users/admin/kategori');
	}

	function update_kategori()
	{
		$kode = strip_tags($this->input->post('kode'));
		$kategori = strip_tags($this->input->post('xkategori'));
		$this->m_kelas->update_kategori($kode, $kategori);
		echo $this->session->set_flashdata('msg', 'info');
		redirect('halaman_users/admin/kategori');
	}
	function hapus_kategori()
	{
		$kode = strip_tags($this->input->post('kode'));
		$this->m_kelas->hapus_kategori($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('halaman_users/admin/kategori');
	}
}
