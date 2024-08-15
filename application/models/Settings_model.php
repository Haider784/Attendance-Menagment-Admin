<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Function to get the standard work time from the database
    public function get_standard_work_time() {
        $query = $this->db->get('settings');
        if ($query->num_rows() > 0) {
            $time =  $query->row()->standard_work_time; // Assuming the column name is 'standard_work_time'
            if($time > 0){
                return $time;
            } else {
                return 8;
            }
        }
        return 8; // Default to 8 hours if not set
    }
    public function get_footer() {
        $query = $this->db->get('settings');
        if ($query->num_rows() > 0) {
            $footer_con = $query->row()->footer_text; // Assuming the column name is 'footer_text'
            if($footer_con > 0){
                return $footer_con;
            } else {
                return 'All rights reserved';
            }
        }
        return " All rights reserved "; // Default text if not set
    }
    public function get_footer_con() {
        $query = $this->db->get('settings');
        if ($query->num_rows() > 0) {
            $footer = $query->row()->footer_contact; // Assuming the column name is 'footer_text'
            if($footer > 0){
                return $footer;
            } else {
                return '78900';
            }
        }
        return " 78900 "; // Default text if not set
    }
    public function get_logo() {
        $this->db->select('logo'); // Specify the column to retrieve
        $query = $this->db->get('settings'); // Fetch data from the 'settings' table
    
        if ($query->num_rows() > 0) {
            $result = $query->row(); // Get the result row
            $logo = $result->logo; // Retrieve the 'logo' field
    
            // Check if the 'logo' field is not empty
            if (!empty($logo) && file_exists('./uploads/' . $logo)) {
                return base_url('uploads/' . $logo); // Return the full URL of the logo
            } else {
                return base_url('assets/dist/img/a.png'); // Default image path
            }
        }


    
        return base_url('assets/dist/img/a.png'); // Default image path if no settings found
    }

    public function get_attendance_month() {
        $this->db->select('month');
        $query = $this->db->get('settings');
        
        if ($query->num_rows() > 0) {
            $month = $query->row()->month;
            if ($month > 0) {
                return $month; // Return the saved month if it's set
            }
        }
        
        // If month is not set, save the current month to the database
        $current_month = date('m');
        $this->update_standard_work_month(['month' => $current_month]);
        return $current_month; // Return the current month
    }
    
    public function update_standard_work_month($data) {
        $this->db->where('id', 1); // Assuming you're updating a single row with ID 1
        return $this->db->update('settings', $data);
    }
    
    
    
    
    

    // Function to update the standard work time in the database
 

    public function update_standard_work_time($data) {
        // Assuming there is only one settings record, you can update it by targeting a specific ID or condition
        // Here, we assume the settings table has a single row with an ID of 1
        $this->db->where('id', 1);
        return $this->db->update('settings', $data);
    }

    public function get_current_settings() {
        // Fetch the current settings, including the logo
        $this->db->where('id', 1); // Adjust as necessary to target the correct row
        $query = $this->db->get('settings');
        return $query->row();
    }

        public function save_standard_work_time($data) {
        return $this->db->insert('settings', $data);
    }
}

