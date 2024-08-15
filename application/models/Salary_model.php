<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salary_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_salaries() {
        $query = $this->db->get('calculated_salaries');
        return $query->result();
    }

    public function get_salary_by_id($id) {
        $query = $this->db->get_where('calculated_salaries', array('id' => $id));
        return $query->row();
    }


    public function update_salary_status($id, $salary_paid) {
        $this->db->where('id', $id);
        $this->db->update('calculated_salaries', array('salary_paid' => $salary_paid));
    }

    public function store_totals($data) {
        return $this->db->insert('salary_rescored', $data);
    }

    public function get_employee_salaries($id)
    {
        return $this->db->get_where('calculated_salaries', ['id' => $id])->row();
    }
}
