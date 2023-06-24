<?php
class M_detail_pembayaran extends CI_Model
{

    function get_all_pembayaran()
    {
        $hsl = $this->db->query("SELECT * FROM tbl_detail_pembayaran");
        return $hsl;
    }

    function simpan_detail_pembayaran($id_pemesanan, $metode_pembayaran, $status_pembayaran, $harga, $tanggal_transaksi, $createdate, $updatedate, $status)
    {
        $hsl = $this->db->query("INSERT INTO `tbl_detail_pembayaran`(id_pemesanan, metode_pembayaran, status_pembayaran, harga, tanggal_transaksi, createdate, updatedate, status) VALUES ('$id_pemesanan', '$metode_pembayaran', '$status_pembayaran', '$harga', '$tanggal_transaksi', '$createdate', '$updatedate', '$status')");
        return $hsl;
    }
    function update_detail_pembayaran($kode, $id_pemesanan, $metode_pembayaran, $status_pembayaran, $harga, $tanggal_transaksi, $createdate, $updatedate, $status)
    {
        $hsl = $this->db->query("UPDATE `tbl_detail_pembayaran` SET `id_pemesanan`='$id_pemesanan',`metode_pembayaran`='$metode_pembayaran',`status_pembayaran`='$status_pembayaran',`harga`='$harga',`tanggal_transaksi`='$tanggal_transaksi',`createdate`='$createdate',`updatedate`='$updatedate',`status`='$status' WHERE id_pembayaran='$kode'");
        return $hsl;
    }

    function hapus_detail_pembayaran($kode)
    {
        $hsl = $this->db->query("DELETE FROM tbl_detail_pembayaran WHERE id_pembayaran='$kode'");
        return $hsl;
    }

    function pembayaran()
    {
        $hsl = $this->db->query("SELECT tbl_detail_pembayaran.*,id_pembayaran FROM tbl_detail_pembayaran");
        return $hsl;
    }
    function pembayaran_perpage($offset, $limit)
    {
        $hsl = $this->db->query("SELECT tbl_detail_pembayaran.*,id_pembayaran FROM tbl_detail_pembayaran limit $offset,$limit");
        return $hsl;
    }
}
