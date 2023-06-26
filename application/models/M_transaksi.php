<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaksi extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // Get Data
    public function get_transaction()
    {
        $query = $this->db->get('tb_transaction');
        return $query->result();
    }
    public function save_transaction($data)
    {
        $save = $this->db->insert('tb_transaction', $data);
        if ($save) {
            return true;
        } else {
            return false;
        }
    }
}