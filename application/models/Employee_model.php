<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_attendance($emp_id)
    {
        $this->db->where('employee_id', $emp_id);

        $query = $this->db->get_where('attendance', ['employee_id' => $emp_id]);

        return $query->result();
    }

    // public function get_all_attendance() {
    //     $query = $this->db->get('attendance');
    //     return $query->result_array();
    // }


    public function get_all_employees()
    {
        return $this->db->get('employees')->result();
    }
    public function insert_employee($data)
    {
        return $this->db->insert('employees', $data);
    }

    public function get_employee($emp_id)
    {
        return $this->db->get_where('employees', ['emp_id' => $emp_id])->row();
    }

    // public function insert_employee($data) {
    //     return $this->db->insert('employees', $data);
    // }

    // public function update_employee($emp_id, $data) {
    //     $this->db->where('emp_id', $emp_id);
    //     return $this->db->update('employees', $data);
    // }
    public function update_employee($emp_id, $data)
    {
        $this->db->where('emp_id', $emp_id);
        return $this->db->update('employees', $data);
    }


    public function delete_employee($emp_id)
    {
        $this->db->where('emp_id', $emp_id);
        return $this->db->delete('employees');
    }

// for salary 
// public function get_attendance_by_month($emp_id, $month)
// {
//     $this->db->where('employee_id', $emp_id);
//     $this->db->like('date', $month, 'after');
//     return $this->db->get('attendance')->result();
// }

// public function get_attendance_by_month($emp_id, $month, $year)
// {
//     $this->db->where('employee_id', $emp_id);
//     $this->db->where('MONTH(date)', $month);
//     $this->db->where('YEAR(date)', $year);
//     return $this->db->get('attendance')->result();
// }

public function get_attendance_by_month($emp_id, $month, $year)
{
    $this->db->where('employee_id', $emp_id);
    $this->db->where('MONTH(date)', $month);
    $this->db->where('YEAR(date)', $year);
    $query = $this->db->get('attendance');
    return $query->result();
}




// public function get_attendance_by_current_month($emp_id)
// {
//     $this->db->where('employee_id', $emp_id);
//     $this->db->where('DATE_FORMAT(date, "%Y-%m") = DATE_FORMAT(CURDATE(), "%Y-%m")');
//     return $this->db->get('attendance')->result();
// }


public function insert_salary_record($data)
{
    return $this->db->insert('employee_salaries', $data);
}

public function get_employee_salary($emp_id)
{
    $this->db->where('employee_id', $emp_id);
    return $this->db->get('employee_salaries')->result();
}
  

public function store_calculated_data($calculatedData) {
    // Extract the month and year from the calculation_date in the calculatedData
    $calculationDate = new DateTime($calculatedData['calculation_date']);
    $month = $calculationDate->format('m');
    $year = $calculationDate->format('Y');

    // Check if a record for the specified month and year already exists
    $this->db->where('employee_id', $calculatedData['employee_id']);
    $this->db->where('MONTH(calculation_date)', $month);
    $this->db->where('YEAR(calculation_date)', $year);
    $query = $this->db->get('calculated_salaries');

    if ($query->num_rows() > 0) {
        // Record exists, update it
        $this->db->where('id', $query->row()->id);
        return $this->db->update('calculated_salaries', $calculatedData);
    } else {
        // No record exists, insert a new one
        return $this->db->insert('calculated_salaries', $calculatedData);
    }
}



public function get_all_salaries() {
    $query = $this->db->get('calculated_salaries');
    return $query->result();
}
}
