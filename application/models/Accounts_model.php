<?php
class Accounts_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_expense($data) {
        return $this->db->insert('accounts', $data);
    }




    public function get_all_expenses() {
        $query = $this->db->get('accounts');
        return $query->result_array();
    }

    public function delete_expense($id) {
        $this->db->where('id', $id);
        $this->db->delete('accounts');
    }

    public function get_expense_by_id($id) {
        $query = $this->db->get_where('accounts', array('id' => $id));
        return $query->row_array();
    }

   
    public function update_expense($id, $data) {
        
        $this->db->where('id', $id);
        $this->db->update('accounts', $data);
    }











}



?>