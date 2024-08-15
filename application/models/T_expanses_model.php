<?php
class T_expanses_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_expenses() {
        $query = $this->db->get('t_expanses');
        return $query->result_array();
    }

    public function get_expense_by_id($id) {
        $query = $this->db->get_where('t_expanses', array('id' => $id));
        return $query->row_array();
    }

    public function insert_expense($data) {
        return $this->db->insert('t_expanses', $data);
    }

    public function update_expense($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('t_expanses', $data);
    }

    public function delete_expense($id) {
        $this->db->where('id', $id);
        return $this->db->delete('t_expanses');
    }
}
?>
