<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalaryController extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;
    public function __construct() {
        parent::__construct();
        $this->load->model('Salary_model');
        $this->load->model('Employee_model');
        $this->load->model('Department_model');
        $this->load->model('Wages_model');
        $this->load->model('Settings_model');
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
        $this->load->library('form_validation');


    }

  
   
    public function edit($id) {
        $data['employees'] = $this->Employee_model->get_all_employees();

        $data['salary'] = $this->Salary_model->get_salary_by_id($id);
        $data['calculated_salaries'] = $this->Salary_model->get_all_salaries();
        $data['wages'] = $this->Wages_model->get_all_wages();

        $data['open_modal'] = true;
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;
        $this->load->view('admin/Pay_slip', $data);
    }

    public function update() {
        $this->form_validation->set_rules('salary_paid', 'Salary Paid', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $data['wages'] = $this->Wages_model->get_all_wages();

            redirect('salary/edit/'.$this->input->post('id'));
        } else {
            $id = $this->input->post('id');
            $salary_paid = $this->input->post('salary_paid') == 'yes' ? 1 : 0;
            $this->Salary_model->update_salary_status($id, $salary_paid);
            $this->session->set_flashdata('success', 'Salary status updated successfully.');
            redirect('Pay_slip');
        }
    }

    public function view($id)
    {
        $data['departments'] = $this->Department_model->get_all_departments();

        $data['employees'] = $this->Employee_model->get_employee($id);
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['Salary'] = $this->Salary_model->get_employee_salaries($id);
        $data['wages'] = $this->Wages_model->get_all_wages();
        
        $data['logoo'] = $this->logo;

    
        $this->load->view('admin/User_profile' , $data);

    }
  }

