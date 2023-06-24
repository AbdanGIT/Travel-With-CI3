<?php
class M_paket extends CI_Model
{

	function get_all_paket()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_paket");
		return $hsl;
	}

	function simpan_paket($nama_paket, $tgl_keberangkatan, $tgl_kembali, $kota_keberangkatan, $hotel, $maskapai, $harga, $porsi, $keterangan, $photo)
	{
		$hsl = $this->db->query("INSERT INTO tbl_paket (nama_paket,tgl_keberangkatan,tgl_kembali,kota_keberangkatan,hotel,maskapai,harga,porsi,keterangan,photo) VALUES ('$nama_paket','$tgl_keberangkatan','$tgl_kembali','$kota_keberangkatan','$hotel','$maskapai','$harga','$porsi','$keterangan','$photo')");
		return $hsl;
	}
	function simpan_paket_tanpa_img($nama_paket, $tgl_keberangkatan, $tgl_kembali, $kota_keberangkatan, $hotel, $maskapai, $harga, $porsi, $keterangan)
	{
		$hsl = $this->db->query("INSERT INTO tbl_paket (nama_paket,tgl_keberangkatan,tgl_kembali,kota_keberangkatan,hotel,maskapai,harga,porsi,keterangan) VALUES ('$nama_paket','$tgl_keberangkatan','$tgl_kembali','$kota_keberangkatan','$hotel','$maskapai','$harga','$porsi','$keterangan')");
		return $hsl;
	}

	function update_paket($kode, $nama_paket, $tgl_keberangkatan, $tgl_kembali, $kota_keberangkatan, $hotel, $maskapai, $harga, $porsi, $keterangan, $photo)
	{
		$hsl = $this->db->query("UPDATE tbl_paket SET nama_paket='$nama_paket',tgl_keberangkatan='$tgl_keberangkatan',tgl_kembali='$tgl_kembali',kota_keberangkatan='$kota_keberangkatan',hotel='$hotel',maskapai='$maskapai',harga='$harga',porsi='$porsi',keterangan='$keterangan',photo='$photo' Where id_paket='$kode'");
		return $hsl;
	}
	function update_paket_tanpa_img($kode, $nama_paket, $tgl_keberangkatan, $tgl_kembali, $kota_keberangkatan, $hotel, $maskapai, $harga, $porsi, $keterangan)
	{
		$hsl = $this->db->query("UPDATE tbl_paket SET nama_paket='$nama_paket',tgl_keberangkatan='$tgl_keberangkatan',tgl_kembali='$tgl_kembali',kota_keberangkatan='$kota_keberangkatan',hotel='$hotel',maskapai='$maskapai',harga='$harga',porsi='$porsi',keterangan='$keterangan' WHERE id_paket='$kode'");
		return $hsl;
	}
	function hapus_paket($kode)
	{
		$hsl = $this->db->query("DELETE FROM tbl_paket WHERE id_paket='$kode'");
		return $hsl;
	}

	function paket()
	{
		$hsl = $this->db->query("SELECT tbl_paket.*,kelas_nama FROM tbl_paket JOIN tbl_kelas ON paket_kelas_id=kelas_id");
		return $hsl;
	}
	function paket_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT tbl_paket.*,kelas_nama FROM tbl_paket JOIN tbl_kelas ON paket_kelas_id=kelas_id limit $offset,$limit");
		return $hsl;
	}
	function nama_pemesanan($kode)
	{
		$this->db->query("SELECT * from tbl_jamaah where id_jamaah = $kode");
	}
	function detail_paket($id_paket)
	{
		$this->db->where('id_paket', $id_paket);
		$query = $this->db->get('tbl_paket');

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
}
