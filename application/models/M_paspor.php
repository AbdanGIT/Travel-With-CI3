<?php
class M_paspor extends CI_Model
{

    function get_all_paspor()
    {
        $hsl = $this->db->query("SELECT * FROM tbl_paspor");
        return $hsl;
    }

    function simpan_paspor($nama_paspor, $nama_paket, $jenis_paspor, $total_harga, $keterangan)
    {
        $hsl = $this->db->query("INSERT INTO `tbl_paspor`(`nama_paspor`, `nama_paket`, `jenis_paspor`, `total_harga`, `keterangan`) VALUES ( '$nama_paspor','$nama_paket', '$jenis_paspor', '$total_harga', '$keterangan')");
        return $hsl;
    }


    function update_paspor($kode, $nama_paspor, $nama_paket, $jenis_paspor, $total_harga, $keterangan)
    {
        $hsl = $this->db->query("UPDATE tbl_paspor SET `nama_paspor`='$nama_paspor',`nama_paket`='$nama_paket',`jenis_paspor`='$jenis_paspor',`total_harga`='$total_harga',`keterangan`='$keterangan' WHERE id_paspor='$kode'");
        return $hsl;
    }
    function update_paspor_tanpa_img($kode, $nis, $nama, $jenkel, $kelas)
    {
        $hsl = $this->db->query("UPDATE tbl_paspor SET produk_nis='$nis',produk_nama='$nama',produk_kelas_id='$kelas' WHERE produk_id='$kode'");
        return $hsl;
    }
    function hapus_paspor($kode)
    {
        $hsl = $this->db->query("DELETE FROM tbl_paspor WHERE id_paspor='$kode'");
        return $hsl;
    }

    function paspor()
    {
        $hsl = $this->db->query("SELECT tbl_paspor.*,kelas_nama FROM tbl_paspor JOIN tbl_kelas ON produk_kelas_id=kelas_id");
        return $hsl;
    }
    function paspor_perpage($offset, $limit)
    {
        $hsl = $this->db->query("SELECT tbl_paspor.*,kelas_nama FROM tbl_paspor JOIN tbl_kelas ON produk_kelas_id=kelas_id limit $offset,$limit");
        return $hsl;
    }
}
