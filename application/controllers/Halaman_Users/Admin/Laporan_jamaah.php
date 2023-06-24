<?php
class Laporan_jamaah extends CI_Controller
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
            $pdf->Cell(190, 7, 'Laporan Data Jamaah', 0, 1, 'C');
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(190, 7, 'Daftar list Jamaah ', 0, 1, 'C');
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10, 7, '', 0, 1);
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(20, 6, 'No', 1, 0);
            $pdf->Cell(85, 6, 'nama_paspor', 1, 0);
            $pdf->Cell(38, 6, 'no_identitas', 1, 0);
            $pdf->Cell(27, 6, 'email', 1, 1);
            $pdf->Cell(27, 6, 'no_tlp', 1, 1);
            $pdf->Cell(27, 6, 'tanggal_lahir', 1, 1);
            $pdf->Cell(27, 6, 'jenis_kelamin', 1, 1);
            $pdf->Cell(27, 6, 'kategori_usia', 1, 1);
            $pdf->Cell(27, 6, 'nama_ayah', 1, 1);
            $pdf->Cell(27, 6, 'status', 1, 1);
            $pdf->Cell(27, 6, 'penyiar', 1, 1);
            $pdf->Cell(27, 6, 'perwakilan', 1, 1);
            $pdf->SetFont('Arial', '', 10);
            $index = $this->db->get('tbl_jamaah')->result();
            foreach ($index as $row) {
                $pdf->Cell(20, 6, 'No', 1, 0);
                $pdf->Cell(85, 6, 'nama_paspor', 1, 0);
                $pdf->Cell(38, 6, 'no_identitas', 1, 0);
                $pdf->Cell(27, 6, 'email', 1, 1);
                $pdf->Cell(27, 6, 'no_tlp', 1, 1);
                $pdf->Cell(27, 6, 'tanggal_lahir', 1, 1);
                $pdf->Cell(27, 6, 'jenis_kelamin', 1, 1);
                $pdf->Cell(27, 6, 'kategori_usia', 1, 1);
                $pdf->Cell(27, 6, 'nama_ayah', 1, 1);
                $pdf->Cell(27, 6, 'status', 1, 1);
                $pdf->Cell(27, 6, 'penyiar', 1, 1);
                $pdf->Cell(27, 6, 'perwakilan', 1, 1);
            }
            $pdf->Output();
        }
    }
}
