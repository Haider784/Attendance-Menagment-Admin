<?php
class Leave_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_leave_records() {
        $query = $this->db->get('leave_records');
        return $query->result_array();
    }

    public function get_leave_record_by_id($id) {
        $query = $this->db->get_where('leave_records', array('id' => $id));
        return $query->row_array();
    }

    public function insert_leave_record($data) {
        return $this->db->insert('leave_records', $data);
    }

    public function update_leave_record($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('leave_records', $data);
    }

    public function delete_leave_record($id) {
        $this->db->where('id', $id);
        return $this->db->delete('leave_records');
    }
}
?>
