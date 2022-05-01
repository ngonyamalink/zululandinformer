<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            "Admin_db",
            "Banner_db"
        ));

        $this->load->helper(array(
            'form',
            'url'
        ));
    }

    public function index()
    {
        $this->load->view('template/welcome_header');
        $this->load->view('admin/index');
        $this->load->view('template/welcome_footer');
    }

    public function send_broadcast()
    {
        $fdata = $this->input->post();

        if ($fdata['publisherkey'] != '%xRoNB&cVdF%') {
            die("We are unable to process your request.");
        }

        // send email push notifications
        $data = $this->Admin_db->get_subscriptions('email');

        $email_string = 'info@ngonyamalink.co.za';

        $cnt = 0;

        foreach ($data as $key => $value) {
            $cnt = $cnt + 1;
            $email_string = $email_string . "," . $value['email'];
        }

        if ($email_string != NULL) {

            echo ("Email Receipients : " . $email_string);

            $this->email->from('no-reply@ngonyamalink.co.za', 'NginyamaLink Wesbite');
            $this->email->bcc($email_string);
            $this->email->subject($fdata['subject']);
            $this->email->message($fdata['message']);
            $this->email->send();
        }

        sleep(2);

        // send sms push notifications
        echo "<br/><br/>";
        $data = $this->Admin_db->get_subscriptions('phone');
        $phone_string = '+27633861016';
        $cnt = 0;
        foreach ($data as $key => $value) {
            $cnt = $cnt + 1;
            $phone_string = $phone_string . "," . $value['phone'];
        }

        $phone_string = substr($phone_string, 1, strlen($phone_string));

        if ($phone_string != NULL) {

            echo ("SMS Receipients : " . $phone_string);

            $url = "https://platform.clickatell.com/messages/http/send?apiKey=uqTlIWcPRviI0IGfaVtBgg==&to=+27713022315&content=Accelerating+dreams+through+technology+Ngonyama+Link+Team.";

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            var_dump($response);
        }

        redirect(base_url("admin"));
    }

    public function banner_upload_form()
    {
        $this->load->view('template/welcome_header');
        $this->load->view('admin/banner_upload_form');
        $this->load->view('template/welcome_footer');
    }

    public function upload_banner()
    {
        $fdata = $this->input->post();

        if ($fdata['publisherkey'] != '%xRoNB&cVdF%') {
            die("We are unable to process your request.");
        }
        unset($fdata['publisherkey']);

        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "*",
            'overwrite' => TRUE,
            'max_size' => "2048000777777",
            'max_height' => "768555",
            'max_width' => "1024555",
            'encrypt_name' => TRUE
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("userfile")) {
            $data = array(
                'upload_data' => $this->upload->data()
            );
            $attachment_url = base_url() . "uploads/" . $data['upload_data']['file_name'];

            $fdata['link'] = $attachment_url;

            $fdata['date_from'] = date("Y-m-d H:i:s");
            $fdata['date_to'] = date("Y-m-d H:i:s");

            $fdata['status'] = 'Active';

            $this->Banner_db->update_banner(array(
                'status' => 'Active'
            ), array(
                'status' => 'InActive'
            ));

            $this->Banner_db->add_banner($fdata);

            $data = $this->Admin_db->get_subscriptions();

            $email_string = NULL;

            $cnt = 0;

            foreach ($data as $key => $value) {
                $cnt = $cnt + 1;
                $email_string = $email_string . "," . $value['email'];
            }

            $email_string = substr($email_string, 1, strlen($email_string));

            if ($email_string != NULL) {

                $this->email->from('no-reply@ngonyamalink.co.za', 'NginyamaLink Wesbite');
                $this->email->bcc($email_string);
                $this->email->subject($fdata['title']);
                $this->email->message("Site has published : " . $fdata['title'] . ". " . $fdata['description'] . ". Visit www.ngonyamalink.co.za");
                $this->email->send();
            }
        } else {
            $error = array(
                'error' => $this->upload->display_errors()
            );
            print_r($error);
            die();
        }

        redirect(base_url("admin/banner_upload_form"));
    }
}
?>



