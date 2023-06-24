<?php
class buatakun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('m_login');
        $this->load->model('m_pengguna');
        $this->load->library('upload');
    }
    function index()
    {
        $kode = $this->session->userdata('idadmin');
        $x['user'] = $this->m_pengguna->get_pengguna_login($kode);
        $this->load->view('halaman_users/v_login_buat');
    }
    function simpan_pengguna()
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

                $gambar = $gbr['file_name'];
                $nama = $this->input->post('xnama');
                $jenkel = $this->input->post('xjenkel');
                $username = $this->input->post('xusername');
                $password = $this->input->post('xpassword');
                $konfirm_password = $this->input->post('xpassword2');
                $email = $this->input->post('xemail');
                $nohp = $this->input->post('xkontak');
                $level = $this->input->post('xlevel');
                if ($password <> $konfirm_password) {
                    echo $this->session->set_flashdata('msg', 'error');
                    redirect('halaman_users/jamaah/dashboard');
                } else {
                    $this->m_pengguna->simpan_pengguna($nama, $jenkel, $username, $password, $email, $nohp, $level, $gambar);
                    echo $this->session->set_flashdata('msg', 'success');
                    redirect('halaman_users/jamaah/dashboard');
                }
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('halaman_users/jamaah/dashboard');
            }
        } else {
            $nama = $this->input->post('xnama');
            $jenkel = $this->input->post('xjenkel');
            $username = $this->input->post('xusername');
            $password = $this->input->post('xpassword');
            $konfirm_password = $this->input->post('xpassword2');
            $email = $this->input->post('xemail');
            $nohp = $this->input->post('xkontak');
            $level = $this->input->post('xlevel');
            if ($password <> $konfirm_password) {
                echo $this->session->set_flashdata('msg', 'error');
                redirect('halaman_users/jamaah/dashboard');
            } else {
                $this->m_pengguna->simpan_pengguna_tanpa_gambar($nama, $jenkel, $username, $password, $email, $nohp, $level);
                echo $this->session->set_flashdata('msg', 'success');
                redirect('halaman_users/jamaah/dashboard');
            }
        }
    }
}
