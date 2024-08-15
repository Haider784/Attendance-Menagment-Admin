<?php
class DepartmentController extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model('Settings_model');
        $this->load->model('Department_model');
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
    }

    public function index()
    {
        $data['departments'] = $this->Department_model->get_all_departments();
        $searchTerm = $this->input->post('search');
        $data['departments'] = $this->Department_model->searchDepartments($searchTerm);

        $this->load->view('attsndance_table', $data);
    }

    
    

    public function create(){
        // Set validation rules
        $this->form_validation->set_rules('name', 'Department Name', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical characters.'
        ]);
        $this->form_validation->set_rules('hr', 'Hr Name', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical character.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form
            $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;
            $this->load->view('admin/add_department',$data); // Adjust the view name accordingly
        } else {
            // Validation succeeded, process the form data
            // var_dump($this->input->post());die;
            $data = [
                'name' => $this->input->post('name'),
                'hr' => $this->input->post('hr')
            ];

            $this->Department_model->insert_department($data);
            redirect('departments'); // Adjust the redirect URL accordingly
        }
    }


    public function update($id)
    {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Department Name', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabet.'
        ]);
        $this->form_validation->set_rules('hr', 'HR Name', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabet'
        ]);

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form with current department data
            $data['department'] = $this->Department_model->get_department_by_id($id);
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/add_department', $data); 
        } else {
            // var_dump($data);die;
            // Validation succeeded, process the form data
            $data = [
                'name' => $this->input->post('name'),
                'hr' => $this->input->post('hr')
            ];

            $this->Department_model->update_department($id, $data);
            redirect('department_list'); // Adjust the redirect URL accordingly
        }
    }


    public function delete($id)
    {
        $this->Department_model->delete_department($id);
        redirect('department_list');
    }
}
