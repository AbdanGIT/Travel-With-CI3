<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function user()
    {
        return $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
    }

    public function allUser($orderby, $ascdesc, $number, $offset)
    {
        $this->db->order_by($orderby, $ascdesc);
        return $this->db->get('users', $number, $offset);
    }

    public function ranking()
    {
        $user = $this->user();
        $this->db->order_by('id', 'desc');
        $this->db->where('point <=', $user['points']);
        return $this->db->get('rangking')->row_array();
    }

    public function points()
    {
        return $this->db->get('points')->row_array();
    }

    public function insertPoint($idUser, $point)
    {
        $this->db->where('id', $idUser);
        $this->db->set('points', 'points+' . $point, FALSE);
        return $this->db->update('users');
    }

    public function userid($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function cart()
    {
        return $this->db->get_where('cart', ['user' => $this->session->userdata('id')]);
    }

    public function isAuthentication($redirect = '')
    {
        if (!$this->session->userdata('login')) {
            $cookie = get_cookie('l02ei9jdihd72ys90w');
            if ($cookie == NULL) {
                if ($redirect) {
                    redirect(base_url() . 'login?redirect=' . $redirect);
                } else {
                    redirect(base_url() . 'login');
                }
            } else {
                $getCookie = $this->db->get_where('users', ['cookie' => $cookie])->row_array();
                if (!$getCookie) {
                    if ($redirect) {
                        redirect(base_url() . 'login?redirect=' . $redirect);
                    } else {
                        redirect(base_url() . 'login');
                    }
                } else {
                    $dataSession = [
                        'id' => $getCookie['id']
                    ];
                    $this->session->set_userdata('login', true);
                    $this->session->set_userdata($dataSession);
                }
            }
        }
    }

    public function checkLogin()
    {
        if (!$this->session->userdata('login')) {
            $cookie = get_cookie('l02ei9jdihd72ys90w');
            if ($cookie != NULL) {
                $getCookie = $this->db->get_where('users', ['cookie' => $cookie])->row_array();
                if ($getCookie) {
                    $dataSession = [
                        'id' => $getCookie['id']
                    ];
                    $this->session->set_userdata('login', true);
                    $this->session->set_userdata($dataSession);
                }
            }
        }
    }

    public function checkLoginEveryDay()
    {
        $user = $this->User_model->user();
        if ($user) {
            if ($user['date_login'] != date('Y-m-d')) {
                $point = $this->Settings_model->point();
                if ($point['login_everyday'] == 1 && $point['login_everyday_msg'] != "") {
                    $this->Settings_model->insertNotification($user['id'], $point['title_point'], str_replace("%point%", $point['login_everyday_point'], $point['login_everyday_msg']), base_url('user'));
                    $this->User_model->insertPoint($user['id'], $point['login_everyday_point']);
                    $this->db->set('date_login', date('Y-m-d'));
                    $this->db->where('id', $user['id']);
                    $this->db->update('users');
                }
            }
        }
    }

    public function allUserButJustContact()
    {
        $this->db->select("id, name, username, email");
        $this->db->where('is_active', 1);
        return $this->db->get('users');
    }

    public function usernameAndNameOnly()
    {
        $this->db->select("id, name, username");
        $this->db->order_by('id', 'desc');
        $this->db->where('is_active', 1);
        return $this->db->get('users');
    }

    public function getEmailOnly()
    {
        $this->db->select("id, email");
        $this->db->order_by('id', 'desc');
        $this->db->where('is_active', 1);
        return $this->db->get('users');
    }

    public function userByEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function complaint($status = NULL, $limit = NULL, $start = NULL)
    {
        if ($status != NULL) {
            $this->db->where('status', $status);
        }
        $this->db->where('user', $this->session->userdata('id'));
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        return $this->db->get('complaint');
    }

    public function help($limit = NULL, $start = NULL)
    {
        $this->db->where('user', $this->session->userdata('id'));
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        return $this->db->get('help');
    }

    public function getComplaintById($id)
    {
        $this->db->select("*, complaint.id AS complaintId");
        $this->db->join('products', 'complaint.product_id=products.id', 'left');
        $this->db->where('complaint.id', $id);
        $this->db->where('complaint.user', $this->session->userdata('id'));
        return $this->db->get('complaint')->row_array();
    }

    public function getHelpById($id)
    {
        $this->db->where('id', $id);
        $this->db->where('user', $this->session->userdata('id'));
        return $this->db->get('help')->row_array();
    }

    public function orders($status = NULL)
    {
        return $this->db->get_where('orders', ['user_id' => $this->session->userdata('id'), 'status' => $status]);
    }

    public function address()
    {
        return $this->db->get_where('address', ['user_id' => $this->session->userdata('id')])->row_array();
    }

    public function addressUser($id)
    {
        return $this->db->get_where('address', ['user_id' => $id])->row_array();
    }

    public function saveAddress($as, $name, $telp, $city, $subdistrict, $village, $zip_code, $address)
    {
        $data = [
            'address_as' => $as,
            'name' => $name,
            'telp' => $telp,
            'province_id' => explode("-", $city)[0],
            'province_name' => explode("-", $city)[1],
            'city_id' => explode("-", $city)[2],
            'city_name' => explode("-", $city)[3],
            'city_type' => explode("-", $city)[4],
            'subdistrict_id' => explode("-", $subdistrict)[0],
            'subdistrict_name' => explode("-", $subdistrict)[1],
            'village' => $village,
            'zip_code' => $zip_code,
            'address' => $address
        ];
        $check = $this->db->get_where('address', ['user_id' => $this->session->userdata('id')])->row_array();
        if ($check) {
            $this->db->where('user_id', $this->session->userdata('id'));
            if ($this->db->update('address', $data)) {
                return true;
            } else {
                return false;
            }
        } else {
            $data['user_id'] = $this->session->userdata('id');
            if ($this->db->insert('address', $data)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function uploadPhoto()
    {
        $config['upload_path'] = './assets/images/avatar/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('img')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            $gbr = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/images/avatar/' . $gbr['file_name'];
            $config['new_image'] = './assets/images/avatar/' . $gbr['file_name'];
            $this->Products_model->resize_crop($config, '100', '100');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function uploadFileCHelp($file)
    {
        $config['upload_path'] = './assets/images/chelp/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5120';
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload($file)) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function total_price_cart()
    {
        $db = $this->db->get_where('cart', ['user' => $this->session->userdata('id')]);
        $price = 0;
        foreach ($db->result_array() as $i) {
            $price += $i['price'] * $i['qty'];
        }
        return $price;
    }

    public function total_weight_cart()
    {
        $db = $this->db->get_where('cart', ['user' => $this->session->userdata('id')]);
        $weight = 0;
        foreach ($db->result_array() as $i) {
            $weight += $i['weight'] * $i['qty'];
        }
        return $weight;
    }

    public function nameToUsername($name)
    {
        return str_replace([" ", "'"], "", strtolower($name));
    }

    public function register($name, $email, $password)
    {
        $username = $this->nameToUsername($name);
        $setting = $this->Settings_model->setting();
        $design = $this->Settings_model->design();
        $checkusername = $this->db->get_where('users', ['username' => $username])->row_array();
        if ($checkusername) {
            $username = $username . time();
        }
        if ($setting['status_register_email_verification'] == 1) {
            $is_active = 0;
            $token = $this->generateRandomToken();
            $data = [
                'email' => $email,
                'type' => 1,
                'token' => $token
            ];
            $this->db->insert('token', $data);
        } else {
            $is_active = 1;
        }
        $data = [
            'name' => $name,
            'username' => $username,
            'email' => $email,
            'date_register' => date('Y-m-d H:i:s'),
            'is_active' => $is_active,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'birthday' => '0000-00-00'
        ];
        if ($this->db->insert('users', $data)) {
            if ($setting['status_register_email_verification'] == 1) {
                $configEmail = $this->Settings_model->config_send_email();
                $defaultLink = base_url() . "auth/verification?token=$token&email=$email";
                $newSubject = $this->Settings_model->contentEmailSend($name, $username, $defaultLink, $setting['subject_email_register_confirmation']);
                $newContent = $this->Settings_model->contentEmailSend($name, $username, $defaultLink, $setting['content_email_register_confirmation']);
                $payload = [
                    'subject' => $newSubject,
                    'app_name' => $setting['app_name'],
                    'logo' => base_url() . 'assets/images/logo/' . $setting['logo-light'],
                    'primary_color' => $design['primary_color'],
                    'content' => $newContent
                ];
                $message = $this->load->view('emails/send_mail.php', $payload, TRUE);
                $this->email->initialize($configEmail);
                $this->email->from($setting['username_mail'], $setting['app_name']);
                $this->email->to($email);
                $this->email->subject($newSubject);
                $this->email->message($message);
                $this->email->send();
                return true;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    function generateRandomToken()
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 50; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function send_code_email()
    {
        $user = $this->User_model->user();
        $token = $this->Settings_model->digitCode(6);
        $this->db->where('email', $user['email']);
        $this->db->delete('token');
        $data = [
            'email' => $user['email'],
            'type' => 2,
            'token' => $token,
            'time_exp' => date('Y-m-d H:i:s', strtotime("+10 minutes"))
        ];
        $this->db->insert('token', $data);
        $setting = $this->Settings_model->setting();
        $design = $this->Settings_model->design();
        $defaultLink = $token;
        $newSubject = $this->Settings_model->contentEmailSend($user['name'], $user['username'], $defaultLink, $setting['subject_email_send_code_verify']);
        $newContent = $this->Settings_model->contentEmailSend($user['name'], $user['username'], $defaultLink, $setting['content_email_send_code_verify']);
        $payload = [
            'subject' => $newSubject,
            'app_name' => $setting['app_name'],
            'logo' => base_url() . 'assets/images/logo/' . $setting['logo-light'],
            'primary_color' => $design['primary_color'],
            'content' => $newContent
        ];
        $message = $this->load->view('emails/send_mail.php', $payload, TRUE);
        $configEmail = $this->Settings_model->config_send_email();
        $this->email->initialize($configEmail);
        $this->email->from($setting['username_mail'], $setting['app_name']);
        $this->email->to($user['email']);
        $this->email->subject($newSubject);
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function changeEmail($email, $type, $login = TRUE)
    {
        if ($login) {
            $user = $this->user();
        } else {
            $user = $this->userByEmail($email);
        }
        $token = $this->generateRandomToken();
        $data = [
            'email' => $email,
            'type' => 3,
            'token' => $token,
            'user_id' => $user['id']
        ];
        $this->db->insert('token', $data);
        $setting = $this->Settings_model->setting();
        $design = $this->Settings_model->design();
        $configEmail = $this->Settings_model->config_send_email();
        if ($login) {
            $defaultLink = base_url() . "user/verification-change-email?token=$token&email=$email";
        } else {
            $defaultLink = base_url() . "auth/verification-change-email?token=$token&email=$email";
        }
        $newSubject = $this->Settings_model->contentEmailSend($user['name'], $user['username'], $defaultLink, $setting['subject_email_changemail_verify']);
        $newContent = $this->Settings_model->contentEmailSend($user['name'], $user['username'], $defaultLink, $setting['content_email_changemail_verify']);
        $newContent = str_replace("[type_change]", $type, $newContent);
        $payload = [
            'subject' => $newSubject,
            'app_name' => $setting['app_name'],
            'logo' => base_url() . 'assets/images/logo/' . $setting['logo-light'],
            'primary_color' => $design['primary_color'],
            'content' => $newContent
        ];
        $message = $this->load->view('emails/send_mail.php', $payload, TRUE);
        $this->email->initialize($configEmail);
        $this->email->from($setting['username_mail'], $setting['app_name']);
        $this->email->to($email);
        $this->email->subject($newSubject);
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertComplaint($invoice, $product, $subject, $content, $file1, $file2, $file3, $yt)
    {
        if ($product == 0) {
            $pName = "";
            $pId = 0;
        } else {
            $pId = explode("=-this++port-=", $product)[0];
            $pName = explode("=-this++port-=", $product)[1];
        }
        $data = [
            'user' => $this->session->userdata('id'),
            'invoice' => $invoice,
            'product_name' => $pName,
            'product_id' => $pId,
            'subject' => $subject,
            'content' => $content,
            'file1' => $file1,
            'file2' => $file2,
            'file3' => $file3,
            'date_complaint' => date('Y-m-d H:i:s'),
            'date_finish' => date('Y-m-d H:i:s'),
            'yt' => $yt
        ];
        if ($this->db->insert('complaint', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function insertHelp($content, $file1, $file2, $file3, $yt)
    {
        $data = [
            'user' => $this->session->userdata('id'),
            'content' => $content,
            'file1' => $file1,
            'file2' => $file2,
            'file3' => $file3,
            'date_help' => date('Y-m-d H:i:s'),
            'yt' => $yt
        ];
        if ($this->db->insert('help', $data)) {
            return true;
        } else {
            return false;
        }
    }
}
