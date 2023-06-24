<?php 
class M_produk extends CI_Model{

	function get_all_produk(){
		$hsl=$this->db->query("SELECT tbl_produk.*,kelas_nama FROM tbl_produk JOIN tbl_kelas ON produk_kelas_id=kelas_id");
		return $hsl;
	}

	function simpan_produk($nis,$nama,$kelas,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_produk (produk_nis,produk_nama,produk_kelas_id,produk_photo) VALUES ('$nis','$nama','$kelas','$photo')");
		return $hsl;
	}
	function simpan_produk_tanpa_img($nis,$nama,$kelas){
		$hsl=$this->db->query("INSERT INTO tbl_produk (produk_nis,produk_nama,produk_kelas_id) VALUES ('$nis','$nama','$kelas')");
		return $hsl;
	}

	function update_produk($kode,$nis,$nama,$jenkel,$kelas,$photo){
		$hsl=$this->db->query("UPDATE tbl_produk SET produk_nis='$nis',produk_nama='$nama',produk_kelas_id='$kelas',produk_photo='$photo' WHERE produk_id='$kode'");
		return $hsl;
	}
	function update_produk_tanpa_img($kode,$nis,$nama,$jenkel,$kelas){
		$hsl=$this->db->query("UPDATE tbl_produk SET produk_nis='$nis',produk_nama='$nama',produk_kelas_id='$kelas' WHERE produk_id='$kode'");
		return $hsl;
	}
	function hapus_produk($kode){
		$hsl=$this->db->query("DELETE FROM tbl_produk WHERE produk_id='$kode'");
		return $hsl;
	}

	function produk(){
		$hsl=$this->db->query("SELECT tbl_produk.*,kelas_nama FROM tbl_produk JOIN tbl_kelas ON produk_kelas_id=kelas_id");
		return $hsl;
	}
	function produk_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT tbl_produk.*,kelas_nama FROM tbl_produk JOIN tbl_kelas ON produk_kelas_id=kelas_id limit $offset,$limit");
		return $hsl;
	}

}