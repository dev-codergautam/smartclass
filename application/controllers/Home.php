<?php
class Home extends CI_Controller {
    // HOMEPAGE
    public function index(){
        date_default_timezone_set('Asia/Calcutta');
        $date = date("d-m-Y");

        $data['mainCate'] = $this->admin_datawork->get_table('category', ['catParent' => '0'], 'catSlug DESC', '10');

        $data['news'] = $this->admin_datawork->get_table_wc('blog', 'blogId DESC', '20');

        $data['lnews'] = $this->admin_datawork->get_table_wc('blog', 'blogId DESC', '20');

        
        $this->load->view('page/include/header', $data);
        $this->load->view('page/index', $data);
        $this->load->view('page/include/footer');
    }

        // mail function
    function sendNotificationMail($email, $msg) {
        $from_email    = "info@skulam.com";
        $to_email      = "skulamerp@gmail.com";
        
        $name    = 'Login Alert';
        $subject = 'GDGPS Purnea - Skulam ERP';
        $message = $msg;
        
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($from_email, $name);
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
    }
    // mail function
    function sendNotiMail($email, $msg, $ip, $type) {
        $from_email    = "info@skulam.com";
        $to_email      = "skulamerp@gmail.com";
        
        $name    = 'Login Alert';
        $subject = 'GDGPS Purnea - Skulam ERP';
        $message = '<html><head><style>.title-color{color:#222}.button-color{background-color:#06c}.banner-color{background-color:#10ac84}.button-color{background-color:#eb681f}.button-color2{background-color:#3ab54a}.text-dark{color:#111}</style><style type="text/css">:root #header+#content>#left>#rlblock_left{display:none !important}</style></head><body><div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important"><table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%"><tbody><tr><td align="center"><center style="width:100%"><table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512"><tbody><tr><td align="left"><table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%"><tbody><tr><td width="100%"><table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%"><tbody><tr><td align="center" bgcolor="#8BC34A" style="padding:20px 48px;color: #111111;" class="banner-color"><table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%"><tbody><tr><td align="center" width="100%"><h1 style="padding:0;margin:0;color:#eeeeee;font-weight:500;font-size:20px;line-height:24px">Login Alert</h1></td></tr></tbody></table></td></tr><tr><td align="center" style="padding:20px 0 10px 0"><table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%"><tbody><tr><td align="center" width="100%" style="padding: 0 15px;text-align: justify;color: #222;font-size: 12px;line-height: 18px;"><h3 style="font-weight: 600; padding: 0px; margin-top: 20px; font-size: 20px; line-height: 10px; text-align: center;" class="title-color"> We noticed a New Login</h3><p class="text-dark" style="margin: 0px 0 10px 0;font-size: 15px;text-align: center;line-height:22px;">We have notice a login from '.$type.'</p><p class="text-dark" style="margin: 20px 0 10px 0;font-size: 15px;text-align: center;line-height:22px;">Email Id : ' .$email.'</p><p class="text-dark" style="margin: 10px 0 10px 0;font-size: 15px;text-align: center;line-height:22px;">Ip '.$ip.'</p></td></tr></tbody></table></td></tr><tr></tr><tr></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align="left"><table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%"><tbody><tr><td align="center" width="100%"><table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%"><tbody><tr><td align="center" valign="middle" width="100%" style="border-top:1px solid #d9d9d9;padding:12px 0px 20px 0px;text-align:center;color:#4c4c4c;font-weight:200;font-size:12px;line-height:18px"><p style="text-align:center;margin-top:0px;margin-bottom:5px;">Powered by WebNirmanam, <br> Gulabbagh, Purnea - 854301, Bihar (India)</p></td></tr></tbody></table></td></tr><tr><td align="center" width="100%"><table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%"><tbody><tr><td align="center" style="padding:0 0 8px 0" width="100%"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></center></td></tr></tbody></table></div></body></html>';
        
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from($from_email, $name);
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
    }
}
?>
