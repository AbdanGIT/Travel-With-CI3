<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_model extends CI_Model
{

    public function setting()
    {
        return $this->db->get('settings')->row_array();
    }

    public function design()
    {
        return $this->db->get('design')->row_array();
    }

    public function point()
    {
        return $this->db->get('points')->row_array();
    }

    public function design_blog()
    {
        return $this->db->get('design_blog')->row_array();
    }

    public function title_page()
    {
        return $this->db->get('title_page')->row_array();
    }

    public function banner()
    {
        return $this->db->get('banner');
    }

    public function sidebar()
    {
        return $this->db->get('sidebar');
    }

    public function shipment()
    {
        return $this->db->get('shipment');
    }

    public function medsos_platform()
    {
        return $this->db->get('medsos_platform');
    }

    public function social_media()
    {
        return $this->db->get('social_media');
    }

    public function rangking()
    {
        return $this->db->get('rangking');
    }

    public function city()
    {
        return $this->db->get('city');
    }

    public function getRankingById($id)
    {
        return $this->db->get_where('rangking', ['id' => $id])->row_array();
    }

    public function getTitle($field)
    {
        $title = $this->title_page();
        $setting = $this->setting();
        $string = ["[app_name]"];
        $change = [$setting['app_name']];
        return str_replace($string, $change, $title[$field]);
    }

    public function visitWebsite($type)
    {
        $date = date('Y-m-d');
        $check = $this->db->get_where('visitor', ['date_visit' => $date, 'type' => $type])->row_array();
        if ($check) {
            $this->db->set('total_views', 'total_views+1', FALSE);
            $this->db->where('id', $check['id']);
            $this->db->update('visitor');
        } else {
            $data = [
                'total_views' => 1,
                'date_visit' => $date,
                'type' => $type
            ];
            $this->db->insert('visitor', $data);
        }
    }

    public function getRekeningById($id)
    {
        return $this->db->get_where('rekening', ['id' => $id])->row_array();
    }

    public function getVisitorMonthly($type)
    {
        $date = date('d') + 1;
        $data = array();
        for ($x = 1; $x < $date; $x++) {
            $query['visitor' . $x] = $this->db->query('select total_views as tViews from visitor where type = ' . $type . ' and MONTH(date_visit) = ' . date('m') . ' and DAY(date_visit) = ' . $x . ' order by DAY(date_visit) asc')->result();
            array_push($data, $query);
        }
        return $data[date('d') - 1];
    }

    public function getDashboardData($type)
    {
        if ($type == "lead") {
            return $this->db->query('SELECT * FROM orders');
        } else if ($type == "order") {
            return $this->db->query('SELECT * FROM orders WHERE status = 4');
        } else if ($type == "omset") {
            $db = $this->db->query('SELECT * FROM orders WHERE status = 4');
            $omset = 0;
            foreach ($db->result_array() as $d) {
                $omset += $d['total_bill'];
            }
            return $omset;
        }
    }

    public function templatePagination($baseUrl, $totalRows, $perPage, $urlSegment, $page)
    {
        $config['base_url'] = base_url() . $baseUrl;
        $config['total_rows'] = $totalRows;
        $config['per_page'] = $perPage;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $from = $this->uri->segment($urlSegment);
        $this->pagination->initialize($config);
        switch ($page) {
            case "users":
                return $this->User_model->allUser("id", "desc", $perPage, $from);
                break;
            case "orders":
                return $this->Orders_model->getOrders("id", "desc", "", "", $perPage, $from);
                break;
            case "complaint":
                return $this->getComplaints("", "", $perPage, $from);
                break;
            case "products":
                return $this->Products_model->getPaginationAllProducts($perPage, $from);
                break;
            case "help":
                return $this->getHelp("2", "", "", $perPage, $from);
                break;
            case "notification":
                return $this->getNotification($perPage, $from);
                break;
            case "email":
                return $this->getEmail($perPage, $from);
                break;
            case "articles":
                return $this->Blog_model->articles("id", "desc", $perPage, $from);
                break;
            default:
                return false;
                break;
        }
    }

    public function generateMsgWa($msg, $orders)
    {
        $string = ["[subtotal]", "[ongkir]", "[total]", "[nama]", "[no_hp]", "[alamat]", "[nama_bank]", "[nomer_rekening]", "[pemilik_rekening]"];
        $change = [number_format($orders['shopping_total'], 0, ",", "."), number_format($orders['courier_value'], 0, ",", "."), number_format($orders['total_bill'], 0, ",", "."), $orders['orderName'], $orders['telp'], $orders['address'] . ', Kec. ' . $orders['subdistrict_name'] . ', ' . $orders['city_type'] . ' ' . $orders['city_name'] . ', ' . $orders['province_name'] . ' - ' . $orders['zip_code'], $orders['type'], $orders['number'], $orders['rekeningName']];
        return str_replace($string, $change, $msg);
    }

    public function deleteRankingById($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('rangking');
    }

    public function getNotification($number = "", $offset = "")
    {
        $this->db->select("*, notification.id AS notifId");
        $this->db->join('users', 'users.id=notification.user_rcvd', 'left');
        $this->db->order_by('notification.id', 'desc');
        $this->db->where('admin_sent', 1);
        return $this->db->get('notification', $number, $offset);
    }

    public function getEmail($number = "", $offset = "")
    {
        $this->db->select("*, send_email.id AS emailId");
        $this->db->join('users', 'users.id=send_email.mail_to', 'left');
        $this->db->order_by('send_email.id', 'desc');
        return $this->db->get('send_email', $number, $offset);
    }

    public function notification($orderby = NULL, $ascdesc = NULL, $limit = NULL, $start = NULL)
    {
        $user = $this->User_model->user();
        $lastMonth = date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 7));
        $this->db->where('user_rcvd', $this->session->userdata('id'));
        $this->db->or_where('user_rcvd', 1);
        $this->db->where('date_notif >=', $lastMonth);
        $this->db->where('date_notif >=', date($user['date_register'], time()));
        if ($orderby != NULL && $ascdesc != NULL) {
            $this->db->order_by($orderby, $ascdesc);
        }
        $this->db->limit($limit, $start);
        return $this->db->get('notification');
    }

    public function checkNotifAndRead()
    {
        $count = 0;
        foreach ($this->notification()->result_array() as $data) {
            $get = $this->db->get_where('read_notif', ['notif_id' => $data['id']])->row_array();
            if (!$get) {
                $count += 1;
            }
        }
        return $count;
    }

    public function readNotifById($id)
    {
        return $this->db->get_where('read_notif', ['user_rcvd' => $this->session->userdata('id'), 'notif_id' => $id])->row_array();
    }

    public function readNotif($id)
    {
        $data = [
            'user_rcvd' => $this->session->userdata('id'),
            'notif_id' => $id
        ];
        return $this->db->insert('read_notif', $data);
    }

    public function getComplaints($limit = NULL, $start = NULL, $number = "", $offset = "")
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get('complaint', $number, $offset);
    }

    public function getComplaintById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('complaint')->row_array();
    }

    public function getHelpById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('help')->row_array();
    }

    public function getHelp($status, $limit = NULL, $start = NULL, $number = "", $offset = "")
    {
        $this->db->select("*, help.id helpId");
        $this->db->join("users", "help.user=users.id");
        $this->db->where('help.status', $status);
        $this->db->order_by('help.id', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get('help', $number, $offset);
    }

    public function explore_link_footer()
    {
        $this->db->select("*, pages.id AS idPage, footer_explore.id exploreId");
        $this->db->join('pages', 'pages.id=footer_explore.page');
        return $this->db->get('footer_explore');
    }

    public function rekening($orderby, $ascdesc)
    {
        if ($orderby != "" && $ascdesc != "") {
            $this->db->order_by($orderby, $ascdesc);
        }
        return $this->db->get('rekening');
    }

    function textToSlug($text = '')
    {
        $text = trim($text);
        if (empty($text)) return '';
        $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
        $text = strtolower(trim($text));
        $text = str_replace(' ', '-', $text);
        $text = preg_replace('/\-{2,}/', '-', $text);
        return $text;
    }

    public function getSectionPage($orderby = "id", $ascdesc = "asc")
    {
        $this->db->order_by($orderby, $ascdesc);
        return $this->db->get('section');
    }

    public function getSectionById($id)
    {
        return $this->db->get_where('section', ['id' => $id])->row_array();
    }

    public function getProductSectionByIdSection($id)
    {
        $this->db->select("*, section_products.id AS section_id");
        $this->db->join('products', 'section_products.id_product=products.id');
        $this->db->where('section_products.id_section', $id);
        $this->db->order_by('section_products.id', 'desc');
        return $this->db->get('section_products');
    }

    public function getBannerById($id)
    {
        return $this->db->get_where('banner', ['id' => $id])->row_array();
    }

    public function getSidebarMenuById($id)
    {
        return $this->db->get_where('sidebar', ['id' => $id])->row_array();
    }

    public function getFAQ()
    {
        return $this->db->get('faq');
    }

    public function getPages()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get('pages');
    }

    public function getPageBy($by, $val)
    {
        $this->db->where($by, $val);
        return $this->db->get('pages')->row_array();
    }

    public function getComplaintChatById($id)
    {
        return $this->db->get_where('complaint_chat', ['complaint_id' => $id]);
    }

    public function getHelpChatById($id)
    {
        return $this->db->get_where('help_chat', ['help_id' => $id]);
    }

    public function readComplaintChat($id, $admin)
    {
        $this->db->set('read_chat', 1);
        if ($admin) {
            $this->db->where('type', 2);
        } else {
            $this->db->where('type', 1);
        }
        $this->db->where('complaint_id', $id);
        return $this->db->update('complaint_chat');
    }

    public function readHelpChat($id, $admin)
    {
        $this->db->set('read_chat', 1);
        if ($admin) {
            $this->db->where('type', 2);
        } else {
            $this->db->where('type', 1);
        }
        $this->db->where('help_id', $id);
        return $this->db->update('help_chat');
    }

    public function deleteSectionById($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('section');
    }

    public function deleteBannerById($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('banner');
    }

    public function deleteSidebarById($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('sidebar');
    }

    public function uploadIcon()
    {
        $config['upload_path'] = './assets/images/icon/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '100';
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('icon')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function uploadLogoFavicon()
    {
        $config['upload_path'] = './assets/images/logo/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('img')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function uploadRangkingIcon()
    {
        $config['upload_path'] = './assets/images/icon/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('icon')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function insertRangking($upload)
    {
        $data = [
            'name' => $this->input->post('name'),
            'point' => $this->input->post('point'),
            'icon' => $upload['file']['file_name']
        ];
        $this->db->insert('rangking', $data);
    }

    public function updateRangking($upload, $id)
    {
        if ($upload === "") {
            $data = [
                'name' => $this->input->post('name'),
                'point' => $this->input->post('point')
            ];
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'point' => $this->input->post('point'),
                'icon' => $upload
            ];
        }
        $this->db->where('id', $id);
        $this->db->update('rangking', $data);
    }

    public function uploadPaymentProof()
    {
        $config['upload_path'] = './assets/images/proof/';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
        $config['max_size'] = '5120';
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function uploadBannerSectionPage()
    {
        $config['upload_path'] = './assets/images/section/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('img')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function acceptComplaint($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('complaint');
        return true;
    }

    public function acceptHelp($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        if ($this->db->update('help')) {
            return true;
        } else {
            return false;
        }
    }

    public function insertPage($title, $slug, $description, $content)
    {
        $data = [
            'title' => $title,
            'slug' => $slug == "" ? $this->textToSlug($title) : $slug,
            'description' => $description,
            'content' => $content,
            'date_input' => date('Y-m-d H:i:s'),
            'date_updated' => date('Y-m-d H:i:s'),
        ];
        return $this->db->insert('pages', $data);
    }

    public function updatePage($title, $slug, $description, $content, $id)
    {
        $data = [
            'title' => $title,
            'slug' => $slug == "" ? $this->textToSlug($title) : $slug,
            'description' => $description,
            'content' => $content,
            'date_updated' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id', $id);
        return $this->db->update('pages', $data);
    }

    public function insertSectionPage($banner)
    {
        if ($banner == "") {
            $data = [
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url') == "" ? "section/" . $this->textToSlug($this->input->post('title')) : $this->input->post('url'),
                'title_show' => $this->input->post('title_show') == "on" ? 1 : 0,
                'link_banner' => $this->input->post('link_banner') == "on" ? 1 : 0,
                'link_seemore' => $this->input->post('link_seemore') == "on" ? 1 : 0,
                'status' => $this->input->post('status') == "on" ? 1 : 0
            ];
            $this->db->insert('section', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url') == "" ? "section/" . $this->textToSlug($this->input->post('title')) : $this->input->post('url'),
                'banner' => $banner['file']['file_name'],
                'title_show' => $this->input->post('title_show') == "on" ? 1 : 0,
                'link_banner' => $this->input->post('link_banner') == "on" ? 1 : 0,
                'link_seemore' => $this->input->post('link_seemore') == "on" ? 1 : 0,
                'status' => $this->input->post('status') == "on" ? 1 : 0
            ];
            $this->db->insert('section', $data);
        }
    }

    public function updateSectionPage($banner, $id)
    {
        if ($banner == "") {
            $data = [
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url') == "" ? "section/" . $this->textToSlug($this->input->post('title')) : $this->input->post('url'),
                'title_show' => $this->input->post('title_show') == "on" ? 1 : 0,
                'link_banner' => $this->input->post('link_banner') == "on" ? 1 : 0,
                'link_seemore' => $this->input->post('link_seemore') == "on" ? 1 : 0,
                'status' => $this->input->post('status') == "on" ? 1 : 0
            ];
            $this->db->where('id', $id);
            $this->db->update('section', $data);
        } else {
            $getdb = $this->getSectionById($id);
            $bannerdb = $getdb['banner'];
            unlink("./assets/images/section/$bannerdb");
            $data = [
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url') == "" ? "section/" . $this->textToSlug($this->input->post('title')) : $this->input->post('url'),
                'banner' => $banner['file']['file_name'],
                'title_show' => $this->input->post('title_show') == "on" ? 1 : 0,
                'link_banner' => $this->input->post('link_banner') == "on" ? 1 : 0,
                'link_seemore' => $this->input->post('link_seemore') == "on" ? 1 : 0,
                'status' => $this->input->post('status') == "on" ? 1 : 0
            ];
            $this->db->where('id', $id);
            $this->db->update('section', $data);
        }
    }

    public function insertProductToSection($id)
    {
        $product = $this->input->post('product');
        $data = [
            'id_section' => $id,
            'id_product' => $product
        ];
        $this->db->insert('section_products', $data);
    }

    public function uploadBanner()
    {
        $config['upload_path'] = './assets/images/banner/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5120';
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('img')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function uploadImgToEmail()
    {
        $config['upload_path'] = './assets/images/email/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '5120';
        $config['file_name'] = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('img')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function insertBanner($upload)
    {
        $data = [
            'img' => $upload['file']['file_name'],
            'url' => $this->input->post('url')
        ];
        $this->db->insert('banner', $data);
    }

    public function updateBanner($upload, $id)
    {
        if ($upload == "") {
            $data = [
                'url' => $this->input->post('url')
            ];
            $this->db->where('id', $id);
            $this->db->update('banner', $data);
        } else {
            $banner = $this->getBannerById($id);
            $img = $banner['img'];
            unlink("./assets/images/banner/$img");
            $data = [
                'img' => $upload['file']['file_name'],
                'url' => $this->input->post('url')
            ];
            $this->db->where('id', $id);
            $this->db->update('banner', $data);
        }
    }

    public function insertSidebar()
    {
        $data = [
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
        ];
        $this->db->insert('sidebar', $data);
    }

    public function updateSidebar($id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
        ];
        $this->db->where('id', $id);
        $this->db->update('sidebar', $data);
    }

    public function nonactiveFlashSaleStatus()
    {
        $this->db->set('status_flash_sale', 0);
        $this->db->update('design');
    }

    public function insertRekening()
    {
        $data = [
            'type' => $this->input->post('type'),
            'name' => $this->input->post('name'),
            'number' => $this->input->post('number'),
        ];
        $this->db->insert('rekening', $data);
    }

    public function updateRekening($id)
    {
        $data = [
            'type' => $this->input->post('type'),
            'name' => $this->input->post('name'),
            'number' => $this->input->post('number'),
        ];
        $this->db->where('id', $id);
        $this->db->update('rekening', $data);
    }

    public function config_send_email()
    {
        $setting = $this->setting();
        $config['charset'] = 'iso-8859-1';
        $config['useragent'] = $setting['app_name'];
        $config['smtp_crypto'] = $setting['crypto_mail'];
        $config['protocol'] = 'smtp';
        $config['mailtype'] = 'html';
        $config['smtp_host'] = $setting['host_mail'];
        $config['smtp_port'] = $setting['port_mail'];
        $config['smtp_timeout'] = '5';
        $config['smtp_user'] = $setting['username_mail'];
        $config['smtp_pass'] = $setting['pass_mail'];
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
        return $config;
    }

    public function contentEmailSend($name, $username, $defaultLink, $content)
    {
        $setting = $this->Settings_model->setting();
        $explodeName = explode(" ", trim($name));
        $changedWord = ["[app_name]", "[default_link]", "[domain]", "[name]", "[first_name]", "[username]", "button-full", "h3-code"];
        $changeWith = [$setting['app_name'], $defaultLink, base_url(), $name, $explodeName[0], $username, "button class='width-full''", "h3 class='code'"];
        return str_replace($changedWord, $changeWith, $content);
    }

    public function insertNotification($user_rcvd, $title, $message, $url)
    {
        $data = [
            'user_rcvd' => $user_rcvd,
            'title' => $title,
            'message' => $message,
            'url' => $url,
            'date_notif' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('notification', $data);
    }

    public function sendNotification()
    {
        $user = $this->input->post('user');
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $message = $this->input->post('message');
        $data = [
            'user_rcvd' => $user,
            'title' => $title,
            'message' => $message,
            'url' => $url,
            'date_notif' => date('Y-m-d H:i:s'),
            'admin_sent' => 1
        ];
        return $this->db->insert('notification', $data);
    }

    public function sendEmail()
    {
        $userId = $this->input->post('user');
        $subject = $this->input->post('subject');
        $content = $this->input->post('message');

        $setting = $this->setting();
        $design = $this->design();
        $configEmail = $this->config_send_email();
        if ($userId == "1") {
            $data = [
                'mail_to' => 0,
                'subject' => $subject,
                'message' => $content,
                'date_send' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('send_email', $data);
            foreach ($this->User_model->allUserButJustContact()->result_array() as $user) {
                $explodeName = explode(" ", trim($user['name']));
                $changedWord = ["&name&", "&first_name&", "&username&"];
                $changeWith = [$user['name'], $explodeName[0], $user['username']];
                $newSubject = str_replace($changedWord, $changeWith, $subject);
                $newContent = str_replace($changedWord, $changeWith, $content);
                $payload = [
                    'subject' => $newSubject,
                    'name' => $user['name'],
                    'app_name' => $setting['app_name'],
                    'logo' => base_url() . 'assets/images/logo/' . $setting['logo-light'],
                    'primary_color' => $design['primary_color'],
                    'content' => $newContent
                ];
                $message = $this->load->view('emails/send_mail.php', $payload, TRUE);
                $this->email->initialize($configEmail);
                $this->email->from($setting['username_mail'], $setting['app_name']);
                $this->email->to($user['email']);
                $this->email->subject($newSubject);
                $this->email->message($message);
                $this->email->send();
            }
            return true;
        } else {
            $user = $this->User_model->userid($userId);
            $explodeName = explode(" ", trim($user['name']));
            $changedWord = ["&name&", "&first_name&", "&username&"];
            $changeWith = [$user['name'], $explodeName[0], $user['username']];
            $newSubject = str_replace($changedWord, $changeWith, $subject);
            $newContent = str_replace($changedWord, $changeWith, $content);
            $data = [
                'mail_to' => $user['id'],
                'subject' => $newSubject,
                'message' => $newContent,
                'date_send' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('send_email', $data);
            $payload = [
                'subject' => $newSubject,
                'name' => $user['name'],
                'app_name' => $setting['app_name'],
                'logo' => base_url() . 'assets/images/logo/' . $setting['logo-light'],
                'primary_color' => $design['primary_color'],
                'content' => $newContent
            ];
            $message = $this->load->view('emails/send_mail.php', $payload, TRUE);
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
    }

    function digitCode($count)
    {
        $characters = '1234567890';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $count; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function resetWebsite()
    {
        $this->db->delete('address');
        $this->db->delete('banner');
    }
}
