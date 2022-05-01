<?php

class Blogger_db extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getPublishedPosts()
    {
        $sql = "SELECT * FROM posts WHERE published=true";

        $query = $this->db->query($sql);

        if (! empty($query)) {

            $posts = $query->result_array();

            $final_posts = array();
            foreach ($posts as $post) {
                $post['topic'] = $this->getPostTopic($post['id']);
                array_push($final_posts, $post);
            }

            return $final_posts;
        }

        return FALSE;
    }

    public function getPostTopic($post_id)
    {
        $sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id limit 1) LIMIT 1";
        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array() : FALSE;
    }

    public function getPublishedPostsByTopic($topic_id)
    {
        $sql = "SELECT * FROM posts ps
			WHERE ps.id IN
			(SELECT pt.post_id FROM post_topic pt
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1)";

        $query = $this->db->query($sql);

        if (! empty($query)) {
            $posts = $query->result_array();

            $final_posts = array();
            foreach ($posts as $post) {
                $post['topic'] = $this->getPostTopic($post['id']);
                array_push($final_posts, $post);
            }
            return $final_posts;
        }
    }

    function getTopicNameById($id)
    {
        $sql = "SELECT name FROM topics WHERE id=$id";
        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array()['name'] : FALSE;
    }

    function getPost($post_slug)
    {
        $sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
        $query = $this->db->query($sql);

        $post = $query->row_array();

        if ($post) {

            $post['topic'] = $this->getPostTopic($post['id']);
        }

        return $post;
    }

    function getAllTopics()
    {
        $sql = "SELECT * FROM topics";
        $query = $this->db->query($sql);
        return ! empty($query) ? $query->result_array() : FALSE;
    }

    public function add_user($data)
    {
        $this->db->insert("users", $data);
    }

    public function get_user($username, $password)
    {
        $sql = "SELECT * FROM users where (email = '$username' AND password = '$password')";
        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array() : FALSE;
    }

    public function add_post($data)
    {
        $topicId = $data['topic_id'];

        unset($data['topic_id']);

        $data = array(
            "title" => $data['title'],
            "slug" => $data['slug'],
            "image" => "url",
            "body" => $data['body'],
            "published" => 1
        );
        $this->db->insert("posts", $data);

        $postId = $this->db->insert_id();

        $this->db->insert("post_topic", array(
            "post_id" => $postId,
            "topic_id" => $topicId
        ));
    }

    function getAdminUsers()
    {
        $sql = "SELECT * FROM users WHERE role IS NOT NULL";
        $query = $this->db->query($sql);
        return ! empty($query) ? $query->result_array() : FALSE;
    }

    // Get user info from user id
    function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array() : FALSE;
    }

    function updateAdmin($request_values)
    {
        // get id of the admin to be updated
        $admin_id = $request_values['admin_id'];
        // set edit state to false
        $isEditingUser = false;

        $username = $request_values['username'];
        $email = $request_values['email'];
        $password = $request_values['password'];
        $passwordConfirmation = $request_values['passwordConfirmation'];
        if (isset($request_values['role'])) {
            $role = $request_values['role'];
        }

        $sql = "UPDATE users SET username='$username', email='$email', role='$role', password='$password' WHERE id=$admin_id";

        $this->db->query($sql);
    }

    // delete admin user
    function deleteAdmin($admin_id)
    {
        $sql = "DELETE FROM users WHERE id=$admin_id";
        $this->db->query($sql);
    }

    function getTopic($topic_id)
    {
        $sql = "SELECT * FROM topics WHERE id=$topic_id LIMIT 1";
        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array() : FALSE;
    }

    function updateTopic($request_values)
    {
        $topic_name = $request_values['topic_name'];
        $topic_id = $request_values['topic_id'];
        // create slug: if topic is "Life Advice", return "life-advice" as slug
        $topic_slug = $this->makeSlug($topic_name);
        $sql = "UPDATE topics SET name='$topic_name', slug='$topic_slug' WHERE id=$topic_id";
        $this->db->query($sql);
    }

    function makeSlug(String $string)
    {
        $string = strtolower($string);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
    }

    // delete topic
    function deleteTopic($topic_id)
    {
        $sql = "DELETE FROM topics WHERE id=$topic_id";
        $this->db->query($sql);
    }

    function createTopic($request_values)
    {
        $topic_name = $request_values['topic_name'];
        // create slug: if topic is "Life Advice", return "life-advice" as slug
        $topic_slug = $this->makeSlug($topic_name);

        // Ensure that no topic is saved twice.
        $topic_check_query = "SELECT * FROM topics WHERE slug='$topic_slug' LIMIT 1";

        $query = $this->db->query($topic_check_query);

        if (! empty($query->row_array())) { // if topic exists
            die("Topic already exists");
        } else {
            $sql = "INSERT INTO topics (name, slug)
				  VALUES('$topic_name', '$topic_slug')";
            $this->db->query($sql);
        }
    }

    // get all posts from DB
    function getAllPosts($role, $user_id)
    {

        // Admin can view all posts
        // Author can only view their posts
        if ($role == "Admin") {
            $sql = "SELECT * FROM posts";
        } elseif ($role == "Author") {
            $sql = "SELECT * FROM posts WHERE user_id=$user_id";
        }

        $query = $this->db->query($sql);
        $posts = $query->result_array();

        $final_posts = array();
        foreach ($posts as $post) {
            $post['author'] = $this->getPostAuthorById($user_id);

            array_push($final_posts, $post);
        }
        return $final_posts;
    }

    // get the author/username of a post
    function getPostAuthorById($user_id)
    {
        $sql = "SELECT username FROM users WHERE id=$user_id";

        $query = $this->db->query($sql);
        $result = $query->row_array();
        if ($result) {
            // return username
            return $result['username'];
        } else {
            return null;
        }
    }

    function createPost($data, $user_id)
    {        
        $topicId = $data['topic_id'];
        
        unset($data['topic_id']);
        
        $data = array(
            "title" => $data['title'],
            "slug" => $this->makeSlug($data['title']),
            "image" => isset($data['image'])?$data['image']:'',
            "body" => $data['body'],
            "published" => isset($data['published'])?$data['published']:0,
            "user_id" =>$user_id
        );
        $this->db->insert("posts", $data);
        
        $postId = $this->db->insert_id();
        
        $this->db->insert("post_topic", array(
            "post_id" => $postId,
            "topic_id" => $topicId
        ));
        
    }

    public function editPost($post_id)
    {
        $sql = "SELECT * FROM posts WHERE id=$post_id LIMIT 1";
        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array() : FALSE;
    }

    function deletePost($post_id)
    {
        $sql = "DELETE FROM posts WHERE id=$post_id";
        $this->db->query($sql);
    }

    function updatePost($where, $data)
    {
        $res = $this->getTopicIdByPostId($where['id']);

        if (isset($data['title'])) {
            $data['title'] = $this->makeSlug($data['title']);
        }

        unset($data['topic_id']);

        $this->db->where($where)->update("posts", $data);

        $inserted_post_id = $where['id'];

        if ($res) {
            $topic_id = $res['topic_id'];

            // create relationship between post and topic
            $sql = "INSERT INTO post_topic (post_id, topic_id) VALUES($inserted_post_id, $topic_id )";
            $this->db->query($sql);
        }
    }

    public function getTopicIdByPostId($post_id)
    {
        $sql = "select topic_id from post_topic where post_id =$post_id ";

        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array() : FALSE;
    }
}