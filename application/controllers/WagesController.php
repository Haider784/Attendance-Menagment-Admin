<?php

class WagesController extends CI_Controller {
    public $settings;
    public $setting;
    public $logo;
    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('Wages_model');
        $this->load->model('Settings_model');
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function view_Wages() {
        // Fetch wages data from the model
        $data['wages'] = $this->Wages_model->get_all_wages();

        // Load the view and pass the data
        $this->load->view('add_wages', $data);
    }

    public function insert_wages() {
        // Load form validation library

        // Set validation rules
        $this->form_validation->set_rules('emp_id', 'Select Employee', 'required');
        // $this->form_validation->set_rules('loan_type', 'Loan Type', 'required');
        // $this->form_validation->set_rules('a_type', 'Select Type', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required|integer');
        $this->form_validation->set_rules('description', 'Description', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical characters and spaces.'
        ]);
        $this->form_validation->set_rules('date', 'Expense Date', 'required');
       
        // Run validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form with errors
            $data['validation_error'] = true;
            $data['employees'] = $this->Employee_model->get_all_employees();
            $data['wages'] = $this->Wages_model->get_all_wages();
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;

            $this->load->view('admin/add_wages',$data);  // Replace 'your_form_view' with your actual form view
        } else {
            // Validation passed, process the form data
            $data = array(
                'emp_id' => $this->input->post('emp_id'),
                'amount' => $this->input->post('amount'),
                'loan_type' => $this->input->post('l_type'),
                'a_r_type' => $this->input->post('a_type'),
                'description' => $this->input->post('description'),
                'date' => $this->input->post('date')
            );

            // Load the model
            $this->Wages_model ->insert_wages($data);

            // Redirect or load success page
            redirect('add_wages');
        }
    }


    public function edit_Wages($id) {
        $data['wage'] = $this->Wages_model->get_wages_by_id($id);
        $data['wages'] = $this->Wages_model->get_all_wages();

        $data['employees'] = $this->Employee_model->get_all_employees();
        $data['open_modal'] = true;
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;
        // Load the form view with the data
        $this->load->view('admin/add_wages', $data);
    }


    public function update_Wages($id) {
        // Load form validation library

        // Set validation rules
        $this->form_validation->set_rules('emp_id', 'Select Employee', 'required');
        // $this->form_validation->set_rules('loan_type', 'Loan Type', 'required');
        // $this->form_validation->set_rules('a_type', 'Select Type', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required|integer');
        $this->form_validation->set_rules('description', 'Description', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical characters and spaces.'
        ]);
        $this->form_validation->set_rules('date', 'Expense Date', 'required');
       
        // Run validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form with errors
            $data['employees'] = $this->Employee_model->get_all_employees();
            $data['wage'] = $this->Wages_model->get_wages_by_id($id);
            $data['validation_error'] = true;
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/add_wages',$data);  // Replace 'your_form_view' with your actual form view
        } else {
            // Validation passed, process the form data
            $data = array(
                'emp_id' => $this->input->post('emp_id'),
                'amount' => $this->input->post('amount'),
                'loan_type' => $this->input->post('l_type'),
                'a_r_type' => $this->input->post('a_type'),
                'description' => $this->input->post('description'),
                'date' => $this->input->post('date')
            );

            // Update data in database
            if ($this->Wages_model->update_wages($id, $data)) {
                // Success, redirect to the view page
                redirect('add_wages');
            }
        }
    }






    public function delete_Wages($id) {
        if ($this->Wages_model->delete_wages($id)) {
            // Success, redirect to the view page
            redirect('add_wages');
            
        } 
}
}