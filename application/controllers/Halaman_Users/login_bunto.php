<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login')) {
            redirect(base_url() . 'user');
        } else {
            $cookie = get_cookie('l02ei9jdihd72ys90w');
            if ($cookie != NULL) {
                $getCookie = $this->db->get_where('users', ['cookie' => $cookie])->row_array();
                if ($getCookie) {
                    $dataSession = [
                        'id' => $getCookie['id']
                    ];
                    $this->session->set_userdata('login', true);
                    $this->session->set_userdata($dataSession);
                    redirect(base_url() . 'user');
                }
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);
            if ($email == "" || $email == NULL) {
                $erremail = "Email harus diisi";
            }
            if ($password == "" || $password == NULL) {
                $errpass = "Password harus diisi";
            }
            if ($erremail != "" || $errpass != "") {
                echo json_encode([
                    'success' => false,
                    'email' => $erremail,
                    'password' => $errpass,
                    'error' => ''
                ]);
            } else {
                $user = $this->db->get_where('users', ['email' => $email])->row_array();
                $username = $this->db->get_where('users', ['username' => $email])->row_array();
                if ($user || $username) {
                    $userfix = $user ? $user : $username;
                    if (password_verify($password, $userfix['password'])) {
                        if ($userfix['is_active'] == 1) {
                            $this->session->set_userdata('login', true);
                            $this->session->set_userdata(['id' => $userfix['id']]);
                            echo json_encode([
                                'success' => true,
                                'error' => ''
                            ]);
                        } else {
                            echo json_encode([
                                'success' => false,
                                'error' => 'Akun belum aktif, mohon verifikasi email terlebih dulu'
                            ]);
                        }
                    } else {
                        echo json_encode([
                            'success' => false,
                            'error' => 'Email/Username atau Password salah!'
                        ]);
                    }
                } else {
                    echo json_encode([
                        'success' => false,
                        'error' => 'Email/Username atau Password salah!'
                    ]);
                }
            }
        } else {
            $data['title'] = $this->Settings_model->getTitle('login_page');
            $data['titleHead'] = '';
            $data['css'] = 'auth';
            $this->load->view('auth/login', $data);
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $this->input->post('name', TRUE);
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);
            $password2 = $this->input->post('password2', TRUE);
            if ($name == "" || $name == NULL) {
                $errname = "Nama harus diisi";
            }
            if ($email == "" || $email == NULL) {
                $erremail = "Email harus diisi";
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $erremail = "Masukkan email yang valid";
                } else {
                    $checkemail = $this->db->get_where('users', ['email' => $email])->row_array();
                    if ($checkemail) {
                        $erremail = "Email sudah ada, gunakan email lain";
                    }
                }
            }
            if ($password == "" || $password == NULL) {
                $errpassword = "Password harus diisi";
            }
            if ($password != $password2) {
                $errpassword2 = "Password tidak sama";
            }
            if ($errname || $erremail || $errpassword || $errpassword2) {
                echo json_encode([
                    'success' => false,
                    'name' => $errname,
                    'email' => $erremail,
                    'password' => $errpassword,
                    'password2' => $errpassword2
                ]);
            } else {
                $insert = $this->User_model->register($name, $email, $password);
                if ($insert) {
                    echo json_encode([
                        'success' => true
                    ]);
                } else {
                    echo json_encode([
                        'success' => false,
                        'other' => true
                    ]);
                }
            }
        } else {
            $data['title'] = $this->Settings_model->getTitle('register_page');
            $data['titleHead'] = '';
            $data['css'] = 'auth';
            $this->load->view('auth/register', $data);
        }
    }

    public function password_reset()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $this->input->post('email');
            $db = $this->db->get_where('users', ['email' => $email])->row_array();
            if ($db) {
                $send = $this->User_model->changeEmail($email, "password", FALSE);
                if ($send) {
                    echo json_encode([
                        'success' => true
                    ]);
                } else {
                    redirect(base_url() . 'password-reset');
                }
            } else {
                echo json_encode([
                    'success' => false
                ]);
            }
        } else {
            $data['title'] = $this->Settings_model->getTitle('reset_password_page');
            $data['titleHead'] = '';
            $data['css'] = 'auth';
            $this->load->view('auth/password_reset', $data);
        }
    }

    function verification_change_email()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $this->input->post('email');
            $token = $this->input->post('token');
            $password = $this->input->post('password');
            $get = $this->db->get_where('token', ['email' => $email, 'type' => 3, 'token' => $token])->row_array();
            if ($get) {
                $this->db->where('email', $email);
                $this->db->delete('token');
                $this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
                $this->db->where('email', $email);
                if ($this->db->update('users')) {
                    echo json_encode([
                        'success' => true
                    ]);
                } else {
                    echo json_encode([
                        'success' => false
                    ]);
                }
            } else {
                redirect(base_url());
            }
        } else {
            $token = $_GET['token'];
            $email = $_GET['email'];
            $get = $this->db->get_where('token', ['email' => $email, 'type' => 3, 'token' => $token])->row_array();
            if ($get) {
                $data['title'] = $this->Settings_model->getTitle('new_password_page');
                $data['css'] = 'user';
                $this->load->view('auth/change_password', $data);
            } else {
                $data['success'] = false;
                $data['title'] = 'Token Salah';
                $data['css'] = 'auth';
                $data['change'] = "email";
                $this->load->view('auth/verification', $data);
            }
        }
    }

    public function verification()
    {
        $token = $_GET['token'];
        $email = $_GET['email'];
        $get = $this->db->get_where('token', ['email' => $email, 'type' => 1, 'token' => $token])->row_array();
        if ($get) {
            $point = $this->Settings_model->point();
            if ($point['verify_email'] == 1 && $point['verify_email_msg'] != "") {
                $user = $this->db->get_where('users', ['email' => $email])->row_array();
                $this->Settings_model->insertNotification($user['id'], $point['title_point'], str_replace("%point%", $point['verify_email_point'], $point['verify_email_msg']), base_url('user'));
                $this->User_model->insertPoint($user['id'], $point['verify_email_point']);
            }
            $this->db->set('is_active', 1);
            $this->db->set('date_login', date('Y-m-d'));
            $this->db->where('email', $email);
            $this->db->update('users');
            $this->db->where('email', $email);
            $this->db->delete('token');
            $data['success'] = true;
            $data['title'] = 'Berhasil Aktivasi';
            $data['css'] = 'auth';
            $this->load->view('auth/verification', $data);
        } else {
            $data['success'] = false;
            $data['title'] = 'Token Salah';
            $data['css'] = 'auth';
            $this->load->view('auth/verification', $data);
        }
    }
}
