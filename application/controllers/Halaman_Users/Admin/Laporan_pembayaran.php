<?php
class Laporan_pembayaran extends CI_Controller
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
            $pdf->Cell(85, 6, 'Jenis Pembayaran', 1, 0);
            $pdf->Cell(40, 6, 'Metode Pembayaran', 1, 0);
            $pdf->Cell(25, 6, 'Status', 1, 1);
            $pdf->SetFont('Arial', '', 10);
            $data = $this->db->get('tbl_pembayaran')->result();
            foreach ($data as $row) {
                $pdf->Cell(20, 6, $row->id_pembayaran, 1, 0);
                $pdf->Cell(85, 6, $row->jenis_pembayaran, 1, 0);
                $pdf->Cell(40, 6, $row->metode_pembayaran, 1, 0);
                $pdf->Cell(25, 6, $row->status, 1, 1);
            }
            $pdf->Output();
        }
    }
}
