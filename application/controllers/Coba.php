<?php
class Coba extends CI_Controller
{
    public function index()
    {
        $this->load->model('m_paket');
        $x['list'] = $this->m_paket->get_all_paket();
        $this->load->view('coba', $x);
    }

    public function menampilkan_penulis()
    {
        $id_buku = $this->input->post('id_buku');
        $s = "SELECT nama_paket as nama_paket_b FROM tbl_paket WHERE id_paket='$id_buku'";
        $res = $this->db->query($s)->row_array();
        echo json_encode($res);
    }
}
