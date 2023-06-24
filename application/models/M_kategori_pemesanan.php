<?php
class M_kategori_pemesanan extends CI_Model
{

    function get_all_pemesanan()
    {
        $hsl = $this->db->query("SELECT * FROM kategori_pemesanan");
        return $hsl;
    }

    function simpan_pemesanan($nama_pemesanan, $nama_paket, $jenis_pemesanan, $total_harga, $keterangan)
    {
        $hsl = $this->db->query("INSERT INTO `tbl_pemesanan`(`nama_pemesanan`, `nama_paket`, `jenis_pemesanan`, `total_harga`, `keterangan`) VALUES (`nama_pemesanan`, `nama_paket`, `jenis_pemesanan`, `total_harga`, `keterangan`)");
        return $hsl;
    }
    function simpan_pemesanan_tanpa_img($nama_pemesanan, $nama_paket, $jenis_pemesanan, $total_harga, $keterangan)
    {
        $hsl = $this->db->query("INSERT INTO tbl_pemesanan (nama_pemesanan,nama_paket,jenis_pemesanan,total_harga,keterangan) VALUES ('$nis','$nama','$kelas')");
        return $hsl;
    }

    function update_pemesanan($kode, $nis, $nama, $jenkel, $kelas, $photo)
    {
        $hsl = $this->db->query("UPDATE tbl_pemesanan SET produk_nis='$nis',produk_nama='$nama',produk_kelas_id='$kelas',produk_photo='$photo' WHERE produk_id='$kode'");
        return $hsl;
    }
    function update_pemesanan_tanpa_img($kode, $nis, $nama, $jenkel, $kelas)
    {
        $hsl = $this->db->query("UPDATE tbl_pemesanan SET produk_nis='$nis',produk_nama='$nama',produk_kelas_id='$kelas' WHERE produk_id='$kode'");
        return $hsl;
    }
    function hapus_pemesanan($kode)
    {
        $hsl = $this->db->query("DELETE FROM tbl_pemesanan WHERE produk_id='$kode'");
        return $hsl;
    }

    function pemesanan()
    {
        $hsl = $this->db->query("SELECT tbl_pemesanan.*,kelas_nama FROM tbl_pemesanan JOIN tbl_kelas ON produk_kelas_id=kelas_id");
        return $hsl;
    }
    function pemesanan_perpage($offset, $limit)
    {
        $hsl = $this->db->query("SELECT tbl_pemesanan.*,kelas_nama FROM tbl_pemesanan JOIN tbl_kelas ON produk_kelas_id=kelas_id limit $offset,$limit");
        return $hsl;
    }
}
