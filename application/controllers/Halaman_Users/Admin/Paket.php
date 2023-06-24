<?php

class paket extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('istrator');
			redirect($url);
		};
		$this->load->model('m_paket');
		$this->load->model('m_pengguna');
		$this->load->model('m_paket');
		$this->load->library('upload');
	}

	function index()
	{
		$x['data'] = $this->m_paket->get_all_paket();
		$x['css'] = '';
		$x['page_title'] = 'KPHG | Paket';
		$this->load->view('halaman_users/admin/layout/header', $x);
		$this->load->view('halaman_users/admin/layout/sidebar');
		$this->load->view('halaman_users/admin/v_paket', $x);
		$this->load->view('halaman_users/admin/layout/footer');
	}

	function simpan_paket()
	{
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //id_pemesanan yang terupload nantinya

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

				$nama_paket = strip_tags($this->input->post('xnama_paket'));
				$tgl_keberangkatan = strip_tags($this->input->post('xtgl_keberangkatan'));
				$tgl_kembali = strip_tags($this->input->post('xtgl_kembali'));
				$kota_keberangkatan = strip_tags($this->input->post('xkota_keberangkatan'));
				$hotel = strip_tags($this->input->post('xhotel'));
				$maskapai = strip_tags($this->input->post('xmaskapai'));
				$harga = strip_tags($this->input->post('xharga'));
				$porsi = strip_tags($this->input->post('xporsi'));
				$keterangan = strip_tags($this->input->post('xketerangan'));
				$photo = $gbr['file_name'];

				$this->m_paket->simpan_paket($nama_paket, $tgl_keberangkatan, $tgl_kembali, $kota_keberangkatan, $hotel, $maskapai, $harga, $porsi, $keterangan, $photo);
				echo $this->session->set_flashdata('msg', 'success');
				redirect('halaman_users/admin/paket');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('halaman_users/admin/paket');
			}
		} else {
			$nama_paket = strip_tags($this->input->post('xnama_paket'));
			$tgl_keberangkatan = strip_tags($this->input->post('xtgl_keberangkatan'));
			$tgl_kembali = strip_tags($this->input->post('xtgl_kembali'));
			$kota_keberangkatan = strip_tags($this->input->post('xkota_keberangkatan'));
			$hotel = strip_tags($this->input->post('xhotel'));
			$maskapai = strip_tags($this->input->post('xmaskapai'));
			$harga = strip_tags($this->input->post('xharga'));
			$porsi = strip_tags($this->input->post('xporsi'));
			$keterangan = strip_tags($this->input->post('xketerangan'));

			$this->m_paket->simpan_paket_tanpa_img($nama_paket, $tgl_keberangkatan, $tgl_kembali, $kota_keberangkatan, $hotel, $maskapai, $harga, $porsi, $keterangan);
			echo $this->session->set_flashdata('msg', 'success');
			redirect('halaman_users/admin/paket');
		}
	}

	function update_paket()
	{

		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //id_pemesanan yang terupload nantinya

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
				$photo = $this->input->post('photo');
				$path = './assets/images/' . $photo;
				unlink($path);

				$kode = $this->input->post('kode');
				$nama_paket = strip_tags($this->input->post('xnama_paket'));
				$tgl_keberangkatan = strip_tags($this->input->post('xtgl_keberangkatan'));
				$tgl_kembali = strip_tags($this->input->post('xtgl_kembali'));
				$kota_keberangkatan = strip_tags($this->input->post('xkota_keberangkatan'));
				$hotel = strip_tags($this->input->post('xhotel'));
				$maskapai = strip_tags($this->input->post('xmaskapai'));
				$harga = strip_tags($this->input->post('xharga'));
				$porsi = strip_tags($this->input->post('xporsi'));
				$keterangan = strip_tags($this->input->post('xketerangan'));
				$photo = $gbr['file_name'];

				$this->m_paket->update_paket($kode, $nama_paket, $tgl_keberangkatan, $tgl_kembali, $kota_keberangkatan, $hotel, $maskapai, $harga, $porsi, $keterangan, $photo);
				echo $this->session->set_flashdata('msg', 'info');
				redirect('halaman_users/admin/paket');
			} else {
				echo $this->session->set_flashdata('msg', 'warning');
				redirect('halaman_users/admin/paket');
			}
		} else {
			$kode = $this->input->post('kode');
			$nama_paket = strip_tags($this->input->post('xnama_paket'));
			$tgl_keberangkatan = strip_tags($this->input->post('xtgl_keberangkatan'));
			$tgl_kembali = strip_tags($this->input->post('xtgl_kembali'));
			$kota_keberangkatan = strip_tags($this->input->post('xkota_keberangkatan'));
			$hotel = strip_tags($this->input->post('xhotel'));
			$maskapai = strip_tags($this->input->post('xmaskapai'));
			$harga = strip_tags($this->input->post('xharga'));
			$porsi = strip_tags($this->input->post('xporsi'));
			$keterangan = strip_tags($this->input->post('xketerangan'));

			$this->m_paket->update_paket_tanpa_img($kode, $nama_paket, $tgl_keberangkatan, $tgl_kembali, $kota_keberangkatan, $hotel, $maskapai, $harga, $porsi, $keterangan);
			echo $this->session->set_flashdata('msg', 'info');
			redirect('halaman_users/admin/paket');
		}
	}

	function hapus_paket()
	{
		$kode = $this->input->post('kode');
		$photo = $this->input->post('photo');
		$path = './assets/images/' . $photo;
		unlink($path);
		$this->m_paket->hapus_paket($kode);
		echo $this->session->set_flashdata('msg', 'success-hapus');
		redirect('halaman_users/admin/paket');
	}
}
