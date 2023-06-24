<?php
class Laporan_paket extends CI_Controller
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
        $pdf->Cell(190, 7, 'Laporan Data paket', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'Daftar list paket ', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(27, 6, 'Id Paket', 1, 0);
        $pdf->Cell(27, 6, 'Id Jamaah', 1, 0);
        $pdf->Cell(27, 6, 'Id Pemesanan', 1, 0);
        $pdf->Cell(27, 6, 'Tipe Paket', 1, 0);
        $pdf->Cell(85, 6, 'Nama Paket', 1, 0);
        $pdf->Cell(27, 6, 'Hotel', 1, 0);
        $pdf->Cell(27, 6, 'Maskapai', 1, 0);
        $pdf->Cell(27, 6, 'Harga', 1, 0);
        $pdf->Cell(27, 6, 'Keterangan', 1, 0);
        $pdf->Cell(20, 6, 'No', 1, 0);
        $pdf->SetFont('Arial', '', 10);
        $data = $this->db->get('tbl_paket')->result();
        foreach ($data as $row) {
            $pdf->Cell(27, 6, 'Id Paket', 1, 0);
            $pdf->Cell(27, 6, 'Id Jamaah', 1, 0);
            $pdf->Cell(27, 6, 'Id Pemesanan', 1, 0);
            $pdf->Cell(27, 6, 'Tipe Paket', 1, 0);
            $pdf->Cell(85, 6, 'Nama Paket', 1, 0);
            $pdf->Cell(27, 6, 'Hotel', 1, 0);
            $pdf->Cell(27, 6, 'Maskapai', 1, 0);
            $pdf->Cell(27, 6, 'Harga', 1, 0);
            $pdf->Cell(27, 6, 'Keterangan', 1, 0);
        }
        $pdf->Output();
    }
}
