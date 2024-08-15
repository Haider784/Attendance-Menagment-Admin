<?php
class Attendance_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

    public function get_all_attendance() {
        $query = $this->db->get('attendance');
        return $query->result_array();
    }

    
    public function get_attendance_by_id($id) {
        $query = $this->db->get_where('attendance', array('id' => $id));
        return $query->row_array();
    }
    
    public function update_attendance($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('attendance', $data);
    }
    
    public function delete_attendance($id) {
        $this->db->delete('attendance', array('id' => $id));
    }
    
    
    
    
    public function get_attendance_by_month($employee_id, $month, $year)
    {
        $this->db->where('employee_id', $employee_id);
        $this->db->where('MONTH(date)', $month);
        $this->db->where('YEAR(date)', $year);
        $query = $this->db->get('attendance');
        return $query->result();
    }
    
    public function get_attendance_by_employee_date_and_times($employee_id, $date, $check_in_time, $check_out_time)
    {
        $this->db->where('employee_id', $employee_id);
        $this->db->where('date', $date);
        $this->db->where('check_in_time', $check_in_time);
        $this->db->where('check_out_time', $check_out_time);
        $query = $this->db->get('attendance');
        return $query->row_array();
    }
    
public function insert_attendance($data) {
    $this->db->insert('attendance', $data);
}
// public function check_duplicate_attendance($employee_id, $date, $check_in_time, $check_out_time)
// {
//     $this->db->where('employee_id', $employee_id);
//     $this->db->where('date', $date);
//     $this->db->group_start();
//     $this->db->group_start();
//     $this->db->where('check_in_time <=', $check_in_time);
//     $this->db->where('check_out_time >=', $check_in_time);
//     $this->db->group_end();
//     $this->db->or_group_start();
//     $this->db->where('check_in_time <=', $check_out_time);
//     $this->db->where('check_out_time >=', $check_out_time);
//     $this->db->group_end();
//     $this->db->or_group_start();
//     $this->db->where('check_in_time >=', $check_in_time);
//     $this->db->where('check_out_time <=', $check_out_time);
//     $this->db->group_end();
//     $this->db->group_end();
//     $query = $this->db->get('attendance');

//     return $query->num_rows() > 0;
// }

public function check_duplicate_attendance($employee_id, $date, $check_in_time, $check_out_time)
{
    $this->db->where('employee_id', $employee_id);
    $this->db->where('date', $date);
    $this->db->group_start();
    $this->db->group_start();
    $this->db->where('check_in_time <=', $check_in_time);
    $this->db->where('check_out_time >=', $check_in_time);
    $this->db->group_end();
    $this->db->or_group_start();
    $this->db->where('check_in_time <=', $check_out_time);
    $this->db->where('check_out_time >=', $check_out_time);
    $this->db->group_end();
    $this->db->or_group_start();
    $this->db->where('check_in_time >=', $check_in_time);
    $this->db->where('check_out_time <=', $check_out_time);
    $this->db->group_end();
    $this->db->group_end();
    $query = $this->db->get('attendance');

    return $query->num_rows() > 0;
}





}
