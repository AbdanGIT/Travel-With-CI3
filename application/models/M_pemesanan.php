<?php
class M_pemesanan extends CI_Model
{

    function get_all_pemesanan()
    {
        $hsl = $this->db->query("SELECT tbl_pemesanan.id_pemesanan,tbl_jamaah.nama_paspor,tbl_paket.nama_paket,tbl_paket.kota_keberangkatan,tbl_paket.tgl_keberangkatan,tbl_paket.tgl_kembali,tbl_pemesanan.jenis_pemesanan,tbl_paket.harga,tbl_paket.keterangan from tbl_pemesanan left join tbl_jamaah on tbl_pemesanan.id_jamaah_P = tbl_jamaah.id_jamaah
        left join tbl_paket on tbl_pemesanan.id_paket_P = tbl_paket.id_paket ");
        return $hsl;
    }

    function tambahan_pemesanan($nama_jamaah, $email_jamaah, $alamat_jamaah, $telepon_jamaah, $metode_pembayaran, $porsi_paket, $keterangan_paket)
    {
    }

    function tampil_edit_pemesanan()
    {
        $hsl = $this->db->query("SELECT * From tbl_pemesanan where id_pemesanan = '' ");
        return $hsl;
    }

    function simpan_pemesanan($id_jamaah, $id_paket, $jenis_pemesanan)
    {
        $hsl = $this->db->query("INSERT INTO tbl_pemesanan(id_jamaah_p,id_paket_p,jenis_pemesanan) VALUES ('$id_jamaah','$id_paket','$jenis_pemesanan')");
        return $hsl;
    }
    function update_pemesanan($kode, $id_jamaah, $id_paket, $jenis_pemesanan)
    {
        $hsl = $this->db->query("UPDATE tbl_pemesanan SET id_jamaah_p='$id_jamaah',id_paket_p='$id_paket',jenis_pemesanan='$jenis_pemesanan' WHERE id_pemesanan='$kode'");
        return $hsl;
    }
    function update_pemesanan_tanpa_img($kode, $id_jamaah, $id_paket, $nama_pemesanan, $nama_paket, $kota_keberangkatan, $tgl_berangkat, $tgl_kembali, $jenis_pemesanan, $total_harga, $keterangan)
    {
        $hsl = $this->db->query("UPDATE tbl_pemesanan SET id_jamaah='$id_jamaah',id_paket='$id_paket',nama_pemesanan='$nama_pemesanan',nama_paket='$nama_paket',kota_keberangkatan='$kota_keberangkatan',tgl_berangkat='$tgl_berangkat',tgl_kembali='$tgl_kembali',jenis_pemesanan='$jenis_pemesanan',total_harga='$total_harga',keterangan='$keterangan' WHERE id_pemesanan='$kode'");
        return $hsl;
    }
    function hapus_pemesanan($kode)
    {
        $hsl = $this->db->query("DELETE FROM tbl_pemesanan WHERE id_pemesanan='$kode'");
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
