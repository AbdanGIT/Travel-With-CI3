<?php
class M_kelas extends CI_Model{

	function get_all_kelas(){
		$hsl=$this->db->query("SELECT * FROM tbl_kelas");
		return $hsl;
	}
	function simpan_kategori($kategori){
		$hsl=$this->db->query("insert into tbl_kelas(kelas_nama) values('$kategori')");
		return $hsl;
	}
	function update_kategori($kode,$kategori){
		$hsl=$this->db->query("update tbl_kelas set kelas_nama='$kategori' where kelas_id='$kode'");
		return $hsl;
	}
	function hapus_kategori($kode){
		$hsl=$this->db->query("delete from tbl_kelas where kelas_id='$kode'");
		return $hsl;
	}
	
	function get_kategori_byid($kelas_id){
		$hsl=$this->db->query("select * from tbl_kelas where kelas_id='$kelas_id'");
		return $hsl;
	}
}