<?php

class Career_db extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addcareer($data)
    {
        $this->db->insert("career", $data);
    }

    public function updatecareer($where, $data)
    {
        $this->db->where($where)->update("career", $data);
    }

    public function getcareers($clerk_id = null)
    {
        if ($clerk_id != NULL) {
            $sql = "select * from career where clerk_id = '$clerk_id'";
        } else {
            $sql = "select * from career";
        }

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->result_array() : FALSE;
    }

    public function getcareerbyid($id)
    {
        $sql = "select * from career where id = $id";

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->row_array() : FALSE;
    }

    public function remove_career($id)
    {
        $sql = "delete from career where id = $id";
        $this->db->query($sql);
    }

    public function addclerk($data)
    {
        $data['date_added'] = date("Y-m-d H:i:s");

        $this->db->insert("career_clerk", $data);
    }

    public function get_clerk_email_password($email, $password)
    {
        $sql = "select * from career_clerk where  (email = '$email' AND password = '$password')";

        $query = $this->db->query($sql);

        return ! empty($query) ? $query->row_array() : FALSE;
    }

    public function get_admin_email_password($email, $password)
    {
        $sql = "select * from career_admin where  (email = '$email' AND password = '$password')";

        $query = $this->db->query($sql);
        return ! empty($query) ? $query->row_array() : FALSE;
    }
    
    
    public function countcareers()
    {
        $sql = "select count(id) as numcareers from career";
        
        $query = $this->db->query($sql);
        
        return ! empty($query) ? $query->row_array() : FALSE;
    }
}

?>