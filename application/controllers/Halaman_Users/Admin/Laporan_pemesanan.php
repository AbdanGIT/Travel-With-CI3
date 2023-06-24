<?php
class Laporan_Pemesanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
    }

    function index()
    {
        if ($this->session->userdata('akses') == '1') {
            $pdf = new FPDF('l', 'mm', 'A5');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial', 'B', 16);
            // mencetak string
            $pdf->Cell(190, 7, 'Laporan Data Pembayaran', 0, 1, 'C');
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(190, 7, 'Daftar Pembayaran ', 0, 1, 'C');
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10, 7, '', 0, 1);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(20, 6, 'No', 1, 0);
            $pdf->Cell(40, 6, 'Nama Pemesana', 1, 0);
            $pdf->Cell(25, 6, 'Nama Paket', 1, 0);
            $pdf->Cell(40, 6, 'Jenis Pemesanan', 1, 0);
            $pdf->Cell(25, 6, 'Total Harga', 1, 0);
            $pdf->Cell(80, 6, 'Keterangan', 1, 1);
            $pdf->SetFont('Arial', '', 10);
            $data = $this->db->get('tbl_pemesanan')->result();
            foreach ($data as $row) {
                $pdf->Cell(20, 6, $row->id_pemesanan, 1, 0);
                $pdf->Cell(40, 6, $row->nama_pemesanan, 1, 0);
                $pdf->Cell(25, 6, $row->nama_paket, 1, 0);
                $pdf->Cell(40, 6, $row->jenis_pemesanan, 1, 0);
                $pdf->Cell(25, 6, $row->total_harga, 1, 0);
                $pdf->Cell(80, 6, $row->keterangan, 1, 1);
            }
            $pdf->Output();
        }
    }
}
