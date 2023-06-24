<?php
class Laporan_produk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
    }

    function index()
    {
        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string
        $pdf->Cell(190, 7, 'Laporan Data Produk', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'Daftar list Produk ', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, 'No', 1, 0);
        $pdf->Cell(85, 6, 'NAMA', 1, 0);
        $pdf->Cell(27, 6, 'Kategori', 1, 0);
        $pdf->Cell(25, 6, 'photo', 1, 1);
        $pdf->SetFont('Arial', '', 10);
        $mahasiswa = $this->db->get('tbl_produk')->result();
        foreach ($mahasiswa as $row) {
            $pdf->Cell(20, 6, $row->produk_id, 1, 0);
            $pdf->Cell(85, 6, $row->produk_nis, 1, 0);
            $pdf->Cell(27, 6, $row->produk_kelas_id, 1, 0);
            $pdf->Cell(25, 6, $row->produk_photo, 1, 1);
        }
        $pdf->Output();
    }
}
