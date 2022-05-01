<?php 

class Subscription_db extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function add_subscription($data) {
        $this->db->insert("subscription",$data);
    }
    
    public function gettotalsubscriptions() {
        $sql = "select count(*) as numsubscriptions from subscription";
        
        $query = $this->db->query($sql);
        
        return !empty($query)?$query->row_array():FALSE;
        
    }
    
    public function get_subscriptions($colunm = NULL)
    {
        $sql = "select * from subscription";
        
        if ($colunm == 'email') {
            $sql = "select email from subscription where email not in ('.')";
        } else if ($colunm == 'phone') {
            $sql = "select phone from subscription where phone not in ('.')";
        }
        
        $query = $this->db->query($sql);
        return ! empty($query) ? $query->result_array() : FALSE;
    }
    
}


?>