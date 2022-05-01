<?php

class Welcome extends CI_Controller
{
     
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            "Admin_db",
            "Banner_db",
            "Blogger_db"
        ));

        $this->load->helper(array(
            'form',
            'url',
            'security',
            "blogger"
        ));

        $this->load->library("Session");

        $this->userdata = $this->session->all_userdata();
        
        $this->userrole = isset($this->userdata['role'])?$this->userdata['role']:null;
    }

    public function index()
    {
        
        $data['userrole'] =  $this->userrole;
        $data['topics'] = $this->Blogger_db->getAllTopics();
        $data['posts'] = $this->Blogger_db->getPublishedPosts();
        $this->load->view('template/welcome_header');
        $this->load->view('welcome_message', $data);
        $this->load->view('template/welcome_footer');
    }
    
    
    public function about(){
        
        $this->load->view('template/welcome_header');
        $this->load->view('about');
        $this->load->view('template/welcome_footer');
    }
    
    
    public function contact(){
        
        $this->load->view('template/welcome_header');
        $this->load->view('contact_us_form');
        $this->load->view('template/welcome_footer');
    }
    
    
    public function submit_contact_us()
    {
        $data = $this->input->post();
        
        if (strlen($data['email']) == 0) {
            redirect(base_url());
        } else {
            
            sleep(2);
            
            $this->email->from($data['email'], 'Contact Us');
            $this->email->to('info@zululandinformer.co.za');
            $this->email->subject('zululandinformer : Contact Us');
            $this->email->message($data['message'] . " # " . $data['phone'] . " # " . $data['fullnames'] . ' # ' . $data['email']);
            
            $this->email->send();
            
            sleep(2);
            
       
           
            
            redirect(base_url("welcome/contact"));
        }
    }
    

    
}
