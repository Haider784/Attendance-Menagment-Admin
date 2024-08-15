<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

    public function get_departments() {
        $query = $this->db->get('departments');
        return $query->result();
    }
    

    public function insert_user($data)
    {
        return $this->db->insert('employees', $data);
    }

    public function log($emp_email, $emp_password) {
        // var_dump($username, $password);die
        $this->db->where('emp_email', $emp_email);
        $this->db->where('emp_password', ($emp_password)); // Assuming passwords are hashed with MD5
        $query = $this->db->get('employees');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
