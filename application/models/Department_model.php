<?php
class Department_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

    public function get_all_departments() {
        $query = $this->db->get('departments');
        return $query->result_array();
    }

    public function insert_department($data) {
        $this->db->insert('departments', $data);
    }

    public function get_department_by_id($id) {
        $query = $this->db->get_where('departments', array('id' => $id));
        return $query->row_array();
    }

    public function update_department($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('departments', $data);
    }

    public function delete_department($id) {
        $this->db->delete('departments', array('id' => $id));
    }
}
?>
