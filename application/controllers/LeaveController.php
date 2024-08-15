<?php
class LeaveController extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;

    public function __construct()
    {
        
        parent::__construct();
        $this->load->model('Leave_model');
        $this->load->model('Employee_model');
        $this->load->model('Settings_model');
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['leaves'] = $this->Leave_model->get_all_leave_records();
        $this->load->view('leav_list', $data);
    }

    public function create()
    {
        // Set validation rules
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        // $this->form_validation->set_rules('reason', 'Reason', 'required');
        $this->form_validation->set_rules('reason', 'Reason ', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical characters and spaces.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form
            $data['employees'] = $this->Employee_model->get_all_employees();
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/add_leave',$data); // Adjust the view name accordingly
        } else {
            // Validation succeeded, process the form data
            // var_dump($this->input->post());die;
            $data = [
                'employee_id' => $this->input->post('employee_id'),
                'reason' => $this->input->post('reason'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
            ];

            $this->Leave_model->insert_leave_record($data);
            redirect('add_leave'); // Adjust the redirect URL accordingly
        }
    }


    public function edit($id) {
        // Set validation rules
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        // $this->form_validation->set_rules('reason', 'Reason', 'required');
        $this->form_validation->set_rules('reason', 'Reason ', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical characters and spaces.'
        ]);
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form with current leave data
            $data['employees'] = $this->Employee_model->get_all_employees();

            $data['leave'] = $this->Leave_model->get_leave_record_by_id($id,$data);
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/add_leave', $data); // Adjust the view name accordingly
        } else {
            // Validation succeeded, process the form data
            $data = [
                'employee_id' => $this->input->post('employee_id'),
                'reason' => $this->input->post('reason'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
            ];

            $this->Leave_model->update_leave_record($id, $data);
            redirect('leav_list'); // Adjust the redirect URL accordingly
        }
    }

    

    public function delete($id)
    {
        $this->Leave_model->delete_leave_record($id);
        redirect('leav_list');
    }
}
