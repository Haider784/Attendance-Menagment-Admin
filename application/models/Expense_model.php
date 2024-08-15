<?php
class Expense_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_expenses() {
        $query = $this->db->get('expenses');
        return $query->result_array();
    }
    public function get_all_employees($id)
    {
        return $this->db->get_where('employees', ['emp_id' => $id])->row();
    }

    public function get_expense_by_id($id) {
        $query = $this->db->get_where('expenses', array('id' => $id));
        return $query->row_array();
    }


    public function insert_expense($data) {
        return $this->db->insert('expenses', $data);
    }
    


    public function update_expense($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('expenses', $data);
    }
    

    public function delete_expense($id) {
        $this->db->where('id', $id);
        return $this->db->delete('expenses');
    }
}
?>
