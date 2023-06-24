<?php
class paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('administrator');
            redirect($url);
        };
        $this->load->model('m_paket');
        $this->load->model('m_pengguna');
        $this->load->model('m_paket');
        $this->load->library('upload');
    }

    function index()
    {
        $x['data'] = $this->m_paket->get_all_paket();
        $x['page_title'] = 'penyiar | paket';
        $this->load->view('halaman_users/penyiar/layout/header', $x);
        $this->load->view('halaman_users/penyiar/layout/sidebar');
        $this->load->view('halaman_users/penyiar/v_paket', $x);
        $this->load->view('halaman_users/penyiar/layout/footer');
    }

    function simpan_paket()
    {
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //id_pemesanan yang terupload nantinya

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {
            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = 300;
                $config['height'] = 300;
                $config['new_image'] = './assets/images/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $photo = $gbr['file_name'];
                $id_jamaah = strip_tags($this->input->post('xid_jamaah'));
                $id_pemesanan = strip_tags($this->input->post('xid_pemesanan'));
                $tipe_paket = strip_tags($this->input->post('xtipe_paket'));
                $nama_paket = strip_tags($this->input->post('xnama_paket'));
                $hotel = strip_tags($this->input->post('xhotel'));
                $maskapai = strip_tags($this->input->post('xmaskapai'));
                $harga = strip_tags($this->input->post('xharga'));
                $keterangan = strip_tags($this->input->post('xketerangan'));

                $this->m_paket->simpan_paket($id_jamaah, $id_pemesanan, $tipe_paket, $nama_paket, $hotel, $maskapai, $harga, $keterangan, $photo);
                echo $this->session->set_flashdata('msg', 'success');
                redirect('halaman_users/penyiar/paket');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('halaman_users/penyiar/paket');
            }
        } else {
            $id_jamaah = strip_tags($this->input->post('xid_jamaah'));
            $id_pemesanan = strip_tags($this->input->post('xid_pemesanan'));
            $tipe_paket = strip_tags($this->input->post('xtipe_paket'));
            $nama_paket = strip_tags($this->input->post('xnama_paket'));
            $hotel = strip_tags($this->input->post('xhotel'));
            $maskapai = strip_tags($this->input->post('xmaskapai'));
            $harga = strip_tags($this->input->post('xharga'));
            $keterangan = strip_tags($this->input->post('xketerangan'));


            $this->m_paket->simpan_paket_tanpa_img($id_jamaah, $id_pemesanan, $tipe_paket, $nama_paket, $hotel, $maskapai, $harga, $keterangan);
            echo $this->session->set_flashdata('msg', 'success');
            redirect('halaman_users/penyiar/paket');
        }
    }
}
