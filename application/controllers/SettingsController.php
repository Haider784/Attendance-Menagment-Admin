<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingsController  extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Settings_model');
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
        $this->load->library('form_validation');

        $this->load->model('Settings_model'); // Load the model
    }

    public function index()
    {
        $data['standard_work_time'] = $this->Settings_model->get_standard_work_time();
        $this->load->view('admin/setting', $data); // Ensure the correct path to the view
    }


    // public function insert()
    // {
    //     // Load form validation library
    //     $this->load->library('form_validation');

    //     // Set validation rules
    //     $this->form_validation->set_rules('standard_work_time', 'Standard Work Time', 'required|integer|greater_than_equal_to[1]|less_than_equal_to[24]');

    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed, reload the form with error messages
    //         $this->load->view('admin/setting');
    //     } else {
    //         // Validation successful, get the form data
    //         $standard_work_time = $this->input->post('standard_work_time');
    //         $footer_text = $this->input->post('footer_text');
    //         $footer_con = $this->input->post('footer_con');

    //         // Prepare data for updating
    //         $data = array(
    //             'standard_work_time' => $standard_work_time,
    //             'footer_text' => $footer_text,
    //             'footer_contact' => $footer_con
    //         );


    //         // Update data in database
    //         $updated = $this->Settings_model->update_standard_work_time($data);

    //         if ($updated) {
    //             // Redirect or load success message view
    //             redirect('setting');
    //         }else {
    //             // Handle error, reload form with error message
    //             $this->load->view('admin/setting', array('error' => 'Failed to update data'));
    //         }
    //     }
    // }

    //     public function insert()
    // {
    //     // Load form validation and file upload libraries
    //     $this->load->library('form_validation');
    //     $this->load->library('upload');

    //     // Set validation rules
    //     $this->form_validation->set_rules('standard_work_time', 'Standard Work Time', 'required|integer|greater_than_equal_to[1]|less_than_equal_to[24]');

    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed, reload the form with error messages
    //         $this->load->view('admin/setting');
    //     } else {

    //         // Validation successful, get the form data
    //         $standard_work_time = $this->input->post('standard_work_time');
    //         $footer_text = $this->input->post('footer_text');
    //         $footer_con = $this->input->post('footer_con');

    //         // Prepare data for updating
    //         $data = array(
    //             'standard_work_time' => $standard_work_time,
    //             'footer_text' => $footer_text,
    //             'footer_contact' => $footer_con
    //         );

    //         // Set upload preferences
    //         $config['upload_path'] = './uploads/';
    //         $config['allowed_types'] = 'jpg|jpeg|png|gif';
    //         $config['max_size'] = 2048; // 2MB max size
    //         // $config['encrypt_name'] = TRUE; // Encrypt file name for security

    //         $this->upload->initialize($config);

    //         // Check if a file is being uploaded
    //         if ($_FILES['logo']['name']) {
    //             if ($this->upload->do_upload('logo')) {
    //                 $upload_data = $this->upload->data();
    //                 $data['logo'] = $upload_data['file_name'];
    //             } else {
    //                 // Handle upload error, reload form with error message
    //                 $error = $this->upload->display_errors();
    //                 $this->load->view('admin/setting', array('error' => $error));
    //                 return;
    //             }
    //         }
    //         // Update data in the database
    //         $updated = $this->Settings_model->update_standard_work_time($data);

    //         if ($updated) {
    //             // Redirect or load success message view
    //             redirect('setting');
    //         } else {
    //             // Handle error, reload form with error message
    //             $this->load->view('admin/setting', array('error' => 'Failed to update data'));
    //         }
    //     }
    // }

    public function insert()
    {
        // Load form validation and file upload libraries
        $this->load->library('form_validation');
        $this->load->library('upload');
    
        // Set validation rules
        $this->form_validation->set_rules('standard_work_time', 'Standard Work Time', 'integer|greater_than_equal_to[1]|less_than_equal_to[24]', array(
            'integer' => 'The %s field must be an integer.',
            'greater_than_equal_to' => 'The %s field must be between 1 and 24.',
            'less_than_equal_to' => 'The %s field must be between 1 and 24.'
        ));
        $this->form_validation->set_rules('month', 'Attendance Month', 'integer|greater_than_equal_to[1]|less_than_equal_to[12]', array(
            'required' => 'The %s field is required.',
            'integer' => 'The %s field must be an integer.',
            'greater_than_equal_to' => 'The %s field must be between 1 and 12.',
            'less_than_equal_to' => 'The %s field must be between 1 and 12.'
        ));
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form with error messages
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/setting', $data);
        } else {
            // Validation successful, get the form data
            $standard_work_time = $this->input->post('standard_work_time');
            $footer_text = $this->input->post('footer_text');
            $footer_con = $this->input->post('footer_con');
            $month = $this->input->post('month');
    
            // Prepare data for updating
            $data = array(
                'standard_work_time' => $standard_work_time,
                'footer_text' => $footer_text,
                'footer_contact' => $footer_con,
                'month' => $month
            );
    
            // Set upload preferences
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB max size
    
            $this->upload->initialize($config);
    
            // Check if a file is being uploaded
            if ($_FILES['logo']['name']) {
                if ($this->upload->do_upload('logo')) {
                    $upload_data = $this->upload->data();
                    $data['logo'] = $upload_data['file_name'];
                } else {
                    // Handle upload error, reload form with error message
                    $error = $this->upload->display_errors();
                    $data['settings'] = $this->settings;
                    $data['setting'] = $this->setting;
                    $data['logoo'] = $this->logo;
                    $this->load->view('admin/setting', $data, array('error' => $error));
                    return;
                }
            } else {
                // No new file uploaded, retain the previous image
                $current_setting = $this->Settings_model->get_current_settings();
                if ($current_setting && !empty($current_setting->logo)) {
                    $data['logo'] = $current_setting->logo;
                }
            }
    
            // Update data in the database
            $updated = $this->Settings_model->update_standard_work_month($data);
    
            if ($updated) {
                // Redirect or load success message view
                redirect('setting');
            } else {
                // Handle error, reload form with error message
                $this->load->view('admin/setting', array('error' => 'Failed to update data'));
            }
        }
    }
    



    public function save()
    {

        $standard_work_time = $this->input->post('standard_work_time');
        $this->Settings_model->update_standard_work_time($standard_work_time);
        redirect('SettingsController'); // Redirect back to the settings page
    }
}
