<?php

require_once('vendor/autoload.php');

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;


class Detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('halaman_users/administrator');
            redirect($url);
        };
        $this->load->model('m_login');
        $this->load->model('m_tulisan');
        $this->load->model('m_paket');
        $this->load->database('hannas');



        // $this->m_pengunjung->count_visitor();
    }

    function detail_paket($id_paket)
    {

        if ($this->session->userdata('akses') == '4') {

            $x['data'] = $this->m_paket->detail_paket($id_paket);
            $x['page_title'] = 'Detail Pemesanan';
            $x['css'] = 'adminlte';
            $this->load->view('halaman_users/jamaah/layout/header', $x);
            $this->load->view('halaman_users/jamaah/layout/sidebar');
            $this->load->view('halaman_users/jamaah/v_detail_paket', $x);
            $this->load->view('halaman_users/jamaah/layout/footer');
        } else {
            redirect('halaman_depan/detail/belum_login');
        }
    }
    function tambah_pemesanan($id_paket)
    {

        if ($this->session->userdata('akses') == '4') {

            $kode = $this->session->userdata('idadmin');
            $x['data'] = $this->m_paket->detail_paket($id_paket);
            $x['pemesan'] = $this->m_paket->nama_pemesanan($kode);
            $x['page_title'] = 'Pemesanan';
            $x['css'] = 'adminlte';

            $this->load->view('halaman_users/jamaah/layout/header', $x);
            $this->load->view('halaman_users/jamaah/layout/sidebar');
            $this->load->view('halaman_users/jamaah/v_pemesanan_paket', $x);
            $this->load->view('halaman_users/jamaah/layout/footer');
        } else {
            redirect('halaman_depan/detail/belum_login');
        }
    }
    public function Checkout_prosess()
    {

        // Konfigurasi Midtrans
        Config::$serverKey = 'Mid-server-D1NlrZEk3m4KWPQxt2B1cXEb';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Ambil data dari form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $umrohPackage = $_POST['umroh-package'];
        $amount = $_POST['amount'];

        // Membuat objek transaksi Midtrans
        $transactionDetails = array(
            'order_id' => uniqid(),
            'gross_amount' => $amount
        );

        // Membuat objek customer
        $customerDetails = array(
            'first_name' => $name,
            'email' => $email,
            'phone' => $phone
        );

        // Membuat objek item
        $itemDetails = array(
            array(
                'id' => $umrohPackage,
                'price' => $amount,
                'quantity' => 1,
                'name' => 'Paket Umroh'
            )
        );

        // Menggabungkan data transaksi
        $transactionData = array(
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $itemDetails
        );

        try {
            // Membuat transaksi menggunakan Midtrans Snap API
            $snapToken = Snap::getSnapToken($transactionData);

            // Mengirimkan response berupa snapToken ke frontend
            echo json_encode(array('snapToken' => $snapToken));
        } catch (Exception $e) {
            // Menangani error
            echo json_encode(array('error_message' => $e->getMessage()));
        }
    }
    function belum_login()
    {
        $x['page_title'] = 'Maaf anda belum Login';
        $this->load->view('halaman_users/jamaah/layout/header', $x);
        // $this->load->view('halaman_users/jamaah/layout/sidebar');?
        $this->load->view('halaman_users/jamaah/v_belum_login', $x);
        // $this->load->view('halaman_users/jamaah/layout/footer');
    }
}
