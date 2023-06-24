<?php
class Produk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('halaman_users/administrator');
			redirect($url);
		};
		$this->load->model('m_produk');
		$this->load->model('m_pengguna');
		$this->load->model('m_kelas');
		$this->load->library('upload');
	}

	function index()
	{
		$x['kelas'] = $this->m_kelas->get_all_kelas();
		$x['data'] = $this->m_produk->get_all_Produk();
		$x['page_title'] = 'KPHG | Produk';
		$this->load->view('halaman_users/kphg/layout/header', $x);
		$this->load->view('halaman_users/kphg/layout/sidebar');
		$this->load->view('halaman_users/kphg/v_produk', $x);
		$this->load->view('halaman_users/kphg/layout/footer');
	}

	function simpan_Produk()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$photo = $gbr['file_name'];
				$nis = strip_tags($this->input->post('xnis'));
				$nama = strip_tags($this->input->post('xnama'));
				$kelas = strip_tags($this->input->post('xkelas'));

				$this->m_produk->simpan_Produk($nis, $nama, $kelas, $photo);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('halaman_users/kphg/produk');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('halaman_users/kphg/produk');
			}
		} else {
			$nis = strip_tags($this->input->post('xnis'));
			$nama = strip_tags($this->input->post('xnama'));
			$jenkel = strip_tags($this->input->post('xjenkel'));
			$kelas = strip_tags($this->input->post('xkelas'));

			$this->m_produk->simpan_Produk_tanpa_img($nis, $nama, $kelas);
			echo $this->session->set_flashdata('msg', 'success');
			redirect('halaman_users/kphg/produk');
		}
	}

	function update_Produk()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$gbr = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/images/' . $gbr['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = './assets/images/' . $gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$gambar = $this->input->post('gambar');
				$path = './assets/images/' . $gambar;
				unlink($path);

				$photo = $gbr['file_name'];
				$kode = $this->input->post('kode');
				$nis = strip_tags($this->input->post('xnis'));
				$nama = strip_tags($this->input->post('xnama'));
				$kelas = strip_tags($this->input->post('xkelas'));

				$this->m_produk->update_Produk($kode, $nis, $nama, $jenkel, $kelas, $photo);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('halaman_users/kphg/produk');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('halaman_users/kphg/produk');
			}
		} else {
			$kode = $this->input->post('kode');
			$nis = strip_tags($this->input->post('xnis'));
			$nama = strip_tags($this->input->post('xnama'));
			$kelas = strip_tags($this->input->post('xkelas'));

			$this->m_produk->update_Produk_tanpa_img($kode, $nis, $nama, $jenkel, $kelas);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('halaman_users/kphg/produk');
		}
	}

	function hapus_Produk()
	{
		$kode = $this->input->post('kode');
		$gambar = $this->input->post('gambar');
		$path = './assets/images/' . $gambar;
		unlink($path);
		$this->m_produk->hapus_Produk($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('halaman_users/kphg/produk');
	}
}
