<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wages_model  extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    


    public function insert_wages($data) {
        return $this->db->insert('wages', $data);  // Replace 't_wages' with your actual table name
    }

    public function get_all_wages() {
        $query = $this->db->get('wages');  // Replace 't_wages' with your actual table name
        return $query->result_array();
    }

    public function get_wages_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('wages');  // Replace 't_wages' with your actual table name
        return $query->row_array();
    }

    public function update_wages($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('wages', $data);  // Replace 't_wages' with your actual table name
    }





    public function delete_wages($id) {
        $this->db->where('id', $id);
        return $this->db->delete('wages');  // Replace 't_wages' with your actual table name
    }

}