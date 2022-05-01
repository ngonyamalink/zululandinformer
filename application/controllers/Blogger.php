<?php

class Blogger extends CI_Controller
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
        
        $data['posts'] = $this->Blogger_db->getPublishedPosts();
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/index', $data);
        $this->load->view('template/welcome_footer');
    }

    public function filtered_posts($topic_id)
    {
        $data['userrole'] =  $this->userrole;
        
        $data['posts'] = $this->Blogger_db->getPublishedPostsByTopic($topic_id);
        $data['topicname'] = $this->Blogger_db->getTopicNameById($topic_id);
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/filtered_posts', $data);
        $this->load->view('template/welcome_footer');
    }

    public function single_post($post_slug)
    {
        
        $data['userrole'] =  $this->userrole;
        $data['post'] = $this->Blogger_db->getPost($post_slug);
        $data['topics'] = $this->Blogger_db->getAllTopics();
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/single_post', $data);
        $this->load->view('template/welcome_footer');
    }

    public function login()
    {
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/login');
        $this->load->view('template/welcome_footer');
    }

    public function send_login()
    {
        $fdata = $this->input->post();
        $fdata['password'] = do_hash($fdata['password'], "md5");

        $response = $this->Blogger_db->get_user($fdata['username'], $fdata['password']);

        if ($response) {
            $this->userdata = $this->session->set_userdata(array(
                "username" => $response['email'],
                "user_id" => $response['id'],
                "role" => $response['role']
            ));

            redirect(base_url("blogger/index"));
        } else {

            die("Incorrect username or password.");
        }
    }

    public function register()
    {
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/register');
        $this->load->view('template/welcome_footer');
    }

    public function send_register()
    {
        $fdata = $this->input->post();

        if ($fdata['password_1'] == $fdata['password_2']) {
            $fdata['password'] = $fdata['password_1'];
            unset($fdata['password_1']);
            unset($fdata['password_2']);
        }

        $fdata['password'] = do_hash($fdata['password'], "md5");

        $this->Blogger_db->add_user($fdata);
    }

    public function post_create_form()
    {
        
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/post_create_form');
        $this->load->view('template/welcome_footer');
    }

    public function create_post_submit()
    {
        $fdata = $this->input->post();

        $fdata['user_id'] = $this->userdata['user_id'];

        $this->Blogger_db->add_post($fdata);
    }

    public function dashboard()
    {
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/admin/dashboard');
        $this->load->view('template/welcome_footer');
    }

    public function users($admin_id = 0)
    {
        
        $data['userrole'] =  $this->userrole;
        $data['isEditingUser'] = ($admin_id != 0) ? true : FALSE;

        $data['admin_id'] = $admin_id;

        $data['username'] = "";
        $data['role'] = "";
        $data['email'] = "";

        if ($admin_id != 0) {

            $response = $this->Blogger_db->getUserById($admin_id);

            $data['username'] = $response['username'];
            $data['role'] = $response['role'];
            $data['email'] = $response['email'];
        }

        $data['admins'] = $this->Blogger_db->getAdminUsers();
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/admin/users', $data);
        $this->load->view('template/welcome_footer');
    }

    public function update_user()
    {
        $data = $this->input->post();

        $data['password'] = do_hash($data['password'], "md5");

        if (isset($data['update_admin'])) {
            unset($data['update_admin']);
            $this->Blogger_db->updateAdmin($data);
        } else if (isset($data['create_admin'])) {
            unset($data['create_admin']);

            unset($data['passwordConfirmation']);
            $this->Blogger_db->add_user($data);
        }

        redirect(base_url("blogger/users/"));
    }

    public function deleteuser($admin_id)
    {
        $this->Blogger_db->deleteAdmin($admin_id);
        redirect(base_url("blogger/users/"));
    }

    public function topics()
    {
        
        $data['userrole'] =  $this->userrole;
        $data['topic_name'] = '';
        $data['topic_id'] = '';
        $data['isEditingTopic'] = FALSE;

        $data['topics'] = $this->Blogger_db->getAllTopics();
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/admin/topics', $data);
        $this->load->view('template/welcome_footer');
    }

    public function update_create_topics()
    {
        $fdata = $this->input->post();

        if (isset($fdata['update_topic'])) {
            $this->Blogger_db->updateTopic($fdata);
        } else if (isset($fdata['create_topic'])) {

            $this->Blogger_db->createTopic($fdata);
        }
        redirect(base_url("blogger/topics"));
    }

    public function edittopic($topic_id)
    {
        $response = $this->Blogger_db->getTopic($topic_id);
        $data['userrole'] =  $this->userrole;
        $data['topic_name'] = $response['name'];
        $data['topic_id'] = $response['id'];
        $data['isEditingTopic'] = TRUE;

        $data['topics'] = $this->Blogger_db->getAllTopics();
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/admin/topics', $data);
        $this->load->view('template/welcome_footer');
    }

    public function deletetopic($topic_id)
    {
        $this->Blogger_db->deleteTopic($topic_id);
        redirect(base_url("blogger/topics"));
    }

    public function posts()
    {
        
        $data['userrole'] =  $this->userrole;
        $data['isEditingTopic'] = FALSE;
        $data['topic_name'] = '';

        $data['user_data'] = $this->userdata;
        $data['posts'] = $this->Blogger_db->getAllPosts($this->userdata['role'], $this->userdata['user_id']);

        $this->load->view('template/welcome_header');
        $this->load->view('blogger/admin/posts', $data);
        $this->load->view('template/welcome_footer');
    }

    public function create_edit_posts($post_id = 0)
    {
        
        $data['userrole'] =  $this->userrole;
        $data['isEditingPost'] = FALSE;
        $data['title'] = '';
        $data['body'] = '';
        $data['published'] = 0;

        if ($post_id > 0) {

            $res = $this->Blogger_db->editPost($post_id);

            $data['isEditingPost'] = TRUE;
            $data['post_id'] = $post_id;
            $data['title'] = $res['title'];
            $data['body'] = $res['body'];
            $data['published'] = $res['published'];
        }

        $data['user_data'] = $this->userdata;
        $data['topics'] = $this->Blogger_db->getAllTopics();
        $this->load->view('template/welcome_header');
        $this->load->view('blogger/admin/create_post', $data);
        $this->load->view('template/welcome_footer');
    }

    public function send_create_edit_post()
    {
        $fdata = $this->input->post();
        
        
        
        
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
            
            $fdata['image'] = $attachment_url;
        }
        
        
        unset($data['userfile']);

        if (isset($fdata['create_post'])) {
            $this->Blogger_db->createPost($fdata, $this->userdata['user_id']);
        } else if (isset($fdata['update_post'])) {

            
            unset($fdata['update_post']);
            $post_id = $fdata['post_id'];
            
            $fdata['id'] = $post_id ;
            
            unset($fdata['post_id']);

            $this->Blogger_db->updatePost($where = array(
                "id" => $post_id
            ),  $fdata);
        }
        
        redirect(base_url("blogger/posts"));
    }

    public function deletepost($post_id)
    {
        $this->Blogger_db->deletePost($post_id);

        redirect(base_url("blogger/posts"));
    }

    public function postsunpublish($post_id)
    {
        $this->Blogger_db->updatePost($where = array(
            "id" => $post_id
        ), $data = array(
            "published" => 0
        ));
        redirect(base_url("blogger/posts"));
    }

    public function postspublish($post_id)
    {
        $this->Blogger_db->updatePost($where = array(
            "id" => $post_id
        ), $data = array(
            "published" => 1
        ));
        redirect(base_url("blogger/posts"));
    }
   
    
    public function  logout(){
        
        $this->session->sess_destroy();
        unset($_SESSION);
        
        redirect(base_url("blogger/login"));
        
        
    }
}
