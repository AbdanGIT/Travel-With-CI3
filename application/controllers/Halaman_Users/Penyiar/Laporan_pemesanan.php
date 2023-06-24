<?php
class Laporan_pemesanan extends CI_Controller
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
        $pdf->Cell(190, 7, 'Laporan Data Pemesanan', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'Daftar list Pemesanan ', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 6, 'No', 1, 0);
        $pdf->Cell(85, 6, 'nama_pemesanan', 1, 0);
        $pdf->Cell(38, 6, 'nama_paket', 1, 0);
        $pdf->Cell(27, 6, 'jenis_pemesanan', 1, 1);
        $pdf->Cell(27, 6, 'total_harga', 1, 1);
        $pdf->Cell(27, 6, 'keterangan', 1, 1);
        $pdf->SetFont('Arial', '', 10);
        $mahasiswa = $this->db->get('tbl_pemesanan')->result();
        foreach ($mahasiswa as $row) {
            $pdf->Cell(20, 6, $row->id_pemesanan, 1, 0);
            $pdf->Cell(85, 6, $row->nama_pemesanan, 1, 0);
            $pdf->Cell(38, 6, $row->nama_paket, 1, 0);
            $pdf->Cell(27, 6, $row->jenis_pemesanan, 1, 1);
            $pdf->Cell(27, 6, $row->total_harga, 1, 1);
            $pdf->Cell(27, 6, $row->keterangan, 1, 1);
        }
        $pdf->Output();
    }
}
