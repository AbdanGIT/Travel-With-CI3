<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('midtrans');
    }

    public function index()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = $this->config->item('midtrans_server_key');
        \Midtrans\Config::$isProduction = false;

        // Buat transaksi baru
        $transaction = new \Midtrans\Snap();

        // Set detail transaksi
        $transaction_details = array(
            'order_id' => uniqid(),
            'gross_amount' => 10000
        );

        // Set item yang dibeli (opsional)
        $items = array(
            array(
                'id' => 'item1',
                'price' => 10000,
                'quantity' => 1,
                'name' => 'Product Item'
            )
        );

        // Buat array data transaksi
        $params = array(
            'transaction_details' => $transaction_details,
            'item_details' => $items
        );

        // Buat token pembayaran menggunakan Midtrans Snap
        $token = $transaction->getSnapToken($params);

        // Redirect ke halaman pembayaran Midtrans
        $this->load->view('payment/pay' . $token);
    }
}