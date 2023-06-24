<?php
class M_jamaah extends CI_Model
{

	function get_all_jamaah()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_jamaah");
		return $hsl;
	}

	function simpan_jamaah($nama_ktp, $nama_paspor, $no_identitas, $no_tlp, $nama_ayah, $email, $tanggal_lahir, $jenis_kelamin, $kewarganegaraan, $tempat_lahir, $alamat, $pendidikan, $provinsi, $kota, $kecamatan, $kelurahan, $kategori_usia, $status_menikah, $pekerjaan, $status_keluarga, $ukuran_baju, $tipe_anggota, $porsi, $penyiar, $perwakilan)
	{
		$hsl = $this->db->query("INSERT INTO `tbl_jamaah`( `nama_ktp`, `nama_paspor`, `no_identitas`, `no_tlp`, `nama_ayah`, `email`, `tanggal_lahir`, `jenis_kelamin`, `kewarganegaraan`, `tempat_lahir`, `alamat`, `pendidikan`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `kategori_usia`, `status_menikah`, `pekerjaan`, `status_keluarga`, `ukuran_baju`, `tipe_anggota`, `porsi`, `penyiar`, `perwakilan`) VALUES ('$nama_ktp','$nama_paspor','$no_identitas','$no_tlp','$nama_ayah','$email','$tanggal_lahir','$jenis_kelamin','$kewarganegaraan','$tempat_lahir','$alamat','$pendidikan','$provinsi','$kota','$kecamatan','$kelurahan','$kategori_usia','$status_menikah','$pekerjaan','$status_keluarga','$ukuran_baju', '$tipe_anggota','$porsi','$penyiar','$perwakilan')");
		return $hsl;
	}
	function simpan_jamaah_tanpa_img($nama_ktp, $nama_paspor, $no_identitas, $no_tlp, $nama_ayah, $email, $tanggal_lahir, $jenis_kelamin, $kewarganegaraan, $tempat_lahir, $alamat, $pendidikan, $provinsi, $kota, $kecamatan, $kelurahan, $kategori_usia, $status_menikah, $pekerjaan, $status_keluarga, $ukuran_baju, $tipe_anggota, $porsi, $penyiar, $perwakilan)
	{
		$hsl = $this->db->query("INSERT INTO tbl_jamaah (nama_ktp,nama_paspor,no_identitas,no_tlp,nama_ayah,email,tanggal_lahir,jenis_kelamin,kewarganegaraan,tempat_lahir,alamat,pendidikan,provinsi,kota,kecamatan,kelurahan,kategori_usia,status_menikah,pekerjaan,status_keluarga,ukuran_baju,tipe_anggota,porsi,penyiar,perwakilan) VALUES ('$nama_ktp', '$nama_paspor', '$no_identitas', '$no_tlp', '$nama_ayah', '$email', '$tanggal_lahir', '$jenis_kelamin', '$kewarganegaraan', '$tempat_lahir', '$alamat', '$pendidikan', '$provinsi', '$kota', '$kecamatan', '$kelurahan', '$kategori_usia', '$status_menikah', '$pekerjaan', '$status_keluarga', '$ukuran_baju', ''$tipe_anggota', '$porsi', '$penyiar', '$perwakilan')");
		return $hsl;
	}

	function update_jamaah($kode, $nama_ktp, $nama_paspor, $no_identitas, $no_tlp, $nama_ayah, $email, $tanggal_lahir, $jenis_kelamin, $kewarganegaraan, $tempat_lahir, $alamat, $pendidikan, $provinsi, $kota, $kecamatan, $kelurahan, $kategori_usia, $status_menikah, $pekerjaan, $status_keluarga, $ukuran_baju, $tipe_anggota, $porsi, $penyiar, $perwakilan)
	{
		$hsl = $this->db->query("UPDATE tbl_jamaah SET  nama_ktp='$nama_ktp',nama_paspor='$nama_paspor',no_identitas='$no_identitas',no_tlp='$no_tlp',nama_ayah='$nama_ayah',email='$email',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',kewarganegaraan='$kewarganegaraan',tempat_lahir='$tempat_lahir',alamat='$alamat',pendidikan='$pendidikan',provinsi='$provinsi',kota='$kota',kecamatan='$kecamatan',kelurahan='$kelurahan',kategori_usia='$kategori_usia',status_menikah='$status_menikah',pekerjaan='$pekerjaan',status_keluarga='$status_keluarga',ukuran_baju='$ukuran_baju',tipe_anggota='$tipe_anggota',porsi='$porsi',penyiar='$penyiar',perwakilan='$perwakilan'WHERE id_jamaah='$kode'");
		return $hsl;
	}
	function update_jamaah_tanpa_img($kode, $nama_ktp, $nama_paspor, $no_identitas, $no_tlp, $nama_ayah, $email, $tanggal_lahir, $jenis_kelamin, $kewarganegaraan, $tempat_lahir, $alamat, $pendidikan, $provinsi, $kota, $kecamatan, $kelurahan, $kategori_usia, $status_menikah, $pekerjaan, $status_keluarga, $ukuran_baju, $tipe_anggota, $porsi, $penyiar, $perwakilan)
	{
		$hsl = $this->db->query("UPDATE tbl_jamaah SET nama_ktp='$nama_ktp',nama_paspor='$nama_paspor',no_identitas='$no_identitas',no_tlp='$no_tlp',nama_ayah='$nama_ayah',email='$email',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',kewarganegaraan='$kewarganegaraan',tempat_lahir='$tempat_lahir',alamat='$alamat',pendidikan='$pendidikan',provinsi='$provinsi',kota='$kota',kecamatan='$kecamatan',kelurahan='$kelurahan',kategori_usia='$kategori_usia',status_menikah='$status_menikah',pekerjaan='$pekerjaan',status_keluarga='$status_keluarga',ukuran_baju='$ukuran_baju',tipe_anggota='$tipe_anggota',porsi='$porsi',penyiar='$penyiar',perwakilan='$perwakilan'WHERE id_jamaah='$kode'");
		return $hsl;
	}
	function hapus_jamaah($kode)
	{
		$hsl = $this->db->query("DELETE FROM tbl_jamaah WHERE id_jamaah='$kode'");
		return $hsl;
	}

	function jamaah()
	{
		$hsl = $this->db->query("SELECT tbl_jamaah.*,kelas_nama FROM tbl_jamaah JOIN tbl_kelas ON jamaah_kelas_id=kelas_id");
		return $hsl;
	}
	function jamaah_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT tbl_jamaah.*,kelas_nama FROM tbl_jamaah JOIN tbl_kelas ON jamaah_kelas_id=kelas_id limit $offset,$limit");
		return $hsl;
	}
}
