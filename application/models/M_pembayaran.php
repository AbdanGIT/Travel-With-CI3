<?php
class M_pembayaran extends CI_Model
{
 public function get_transaction()
    {
        $query = $this->db->get('tb_transaction');
        return $query->result();
    }
    function get_all_pembayaran()
    {
        $hsl = $this->db->query("SELECT * FROM tbl_pembayaran");
        return $hsl;
    }

    function simpan_pembayaran($jenis_pembayaran, $metode_pembayaran, $status)
    {
        $hsl = $this->db->query("INSERT INTO `tbl_pembayaran`(`jenis_pembayaran`, `metode_pembayaran`, `status`) VALUES ('$jenis_pembayaran', '$metode_pembayaran', '$status')");
        return $hsl;
    }
    function update_pembayaran($kode, $jenis_pembayaran, $metode_pembayaran, $status)
    {
        $hsl = $this->db->query("UPDATE `tbl_pembayaran` SET `jenis_pembayaran`='$jenis_pembayaran',`metode_pembayaran`='$metode_pembayaran',`status`='$status' WHERE id_pembayaran='$kode'");
        return $hsl;
    }

    function hapus_pembayaran($kode)
    {
        $hsl = $this->db->query("DELETE FROM tbl_pembayaran WHERE id_pembayaran='$kode'");
        return $hsl;
    }

    function pembayaran()
    {
        $hsl = $this->db->query("SELECT tbl_pembayaran.*,jenis_pembayaran FROM tbl_pembayaran");
        return $hsl;
    }
    function pembayaran_perpage($offset, $limit)
    {
        $hsl = $this->db->query("SELECT tbl_pembayaran.*,jenis_pembayaran FROM tbl_pembayaran limit $offset,$limit");
        return $hsl;
    }
}
