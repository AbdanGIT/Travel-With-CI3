<?php
class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('halaman_users/administrator');
            redirect($url);
        };
        $this->load->model('m_pemesanan');
        $this->load->model('m_pengguna');
        $this->load->model('m_kelas');
        $this->load->model('m_kategori_pemesanan');
        $this->load->library('upload');
    }


    function index()
    {
        $x['kelas'] = $this->m_kelas->get_all_kelas();
        $x['data'] = $this->m_pemesanan->get_all_pemesanan();
        $x['kategori'] = $this->m_kategori_pemesanan->get_all_pemesanan();
        $x['page_title'] = 'Jamaah | pemesanan';
        $this->load->view('halaman_users/jamaah/layout/header', $x);
        $this->load->view('halaman_users/jamaah/layout/sidebar');
        $this->load->view('halaman_users/jamaah/v_Pemesanan', $x);
        $this->load->view('halaman_users/jamaah/layout/footer');
    }

    function simpan_pemesanan()
    {

        $nama_pemesanan = strip_tags($this->input->post('xnama_pemesanan'));
        $nama_paket = strip_tags($this->input->post('xnama_paket'));
        $jenis_pemesanan = strip_tags($this->input->post('xjenis_pemesanan'));
        $total_harga = strip_tags($this->input->post('xtotal_harga'));
        $keterangan = strip_tags($this->input->post('xketerangan'));

        $this->m_pemesanan->simpan_pemesanan($nama_pemesanan, $nama_paket, $jenis_pemesanan, $total_harga, $keterangan);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('halaman_users/jamaah/pemesanan');
    }

    function update_pemesanan()
    {

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

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
                $gambar = $this->input->post('gambar');
                $path = './assets/images/' . $gambar;
                unlink($path);

                $photo = $gbr['file_name'];
                $kode = $this->input->post('kode');
                $nama_pemesanan = strip_tags($this->input->post('xnama_pemesanan'));
                $nama_paket = strip_tags($this->input->post('xnama_paket'));
                $jenis_pemesanan = strip_tags($this->input->post('xjenis_pemesanan'));
                $total_harga = strip_tags($this->input->post('xtotal_harga'));
                $keterangan = strip_tags($this->input->post('xketerangan'));

                $this->m_pemesanan->update_pemesanan($kode, $nama_pemesanan, $nama_paket, $jenis_pemesanan, $total_harga, $keterangan);
                echo $this->session->set_flashdata('msg', 'info');
                redirect('halaman_users/jamaah/pemesanan');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('halaman_users/jamaah/pemesanan');
            }
        } else {
            $kode = $this->input->post('kode');
            $nama_pemesanan = strip_tags($this->input->post('xnama_pemesanan'));
            $nama_paket = strip_tags($this->input->post('xnama_paket'));
            $jenis_pemesanan = strip_tags($this->input->post('xjenis_pemesanan'));
            $total_harga = strip_tags($this->input->post('xtotal_harga'));
            $keterangan = strip_tags($this->input->post('xketerangan'));

            $this->m_pemesanan->update_pemesanan_tanpa_img($kode, $nama_pemesanan, $nama_paket, $jenis_pemesanan, $total_harga, $keterangan);
            echo $this->session->set_flashdata('msg', 'info');
            redirect('halaman_users/jamaah/pemesanan');
        }
    }

    function hapus_pemesanan()
    {
        $kode = $this->input->post('kode');
        $this->m_pemesanan->hapus_pemesanan($kode);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('halaman_users/jamaah/pemesanan');
    }
}
