<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;
    public function __construct()
    {
        parent::__construct();

        // Load models
        $this->load->library('session'); 
        $this->load->model('User_model');
        $this->load->model('Attendance_model');
        $this->load->model('Leave_model');
        $this->load->model('Department_model');
        $this->load->model('Employee_model');
        $this->load->model('Expense_model');
        $this->load->model('T_expanses_model');
        $this->load->model('Salary_model');
        $this->load->model('Accounts_model');
        $this->load->model('Wages_model');
        $this->load->model('Settings_model');
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
        // Load form validation library
        $this->load->library('form_validation');

        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('login'); // Redirect to login page if not logged in
        }
    }

    public function index()
    {
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;
        if ($this->session->userdata('logged_in') == true) {
            $this->load->view('admin/index', $data);
        } else {

            redirect('login');
        }
    }

    public function attsndance()
    {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;

        $this->load->view('admin/Attendance', $data);
    }
    public function veiw()
    {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;

        $data['attendance'] = $this->Attendance_model->get_all_attendance();
        $this->load->view('admin/attsndance_table', $data);
    }

    public function register()
    {

        $data['departments'] = $this->User_model->get_departments();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;

        $this->load->view('admin/register', $data);
    }
    public function employes()
    {

        $data['departments'] = $this->User_model->get_departments();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;

        $this->load->view('admin/add-employees', $data);
    }
    public function employes_list()
    {

        $data['employees'] = $this->Employee_model->get_all_employees();
        $data['departments'] = $this->User_model->get_departments();
        $data['logoo'] = $this->logo;

        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;

        $this->load->view('admin/employees-list', $data);
    }
    public function departmen()
    {
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/add_department', $data);
    }
    public function department()
    {

        $data['departments'] = $this->Department_model->get_all_departments();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;

        $this->load->view('admin/department_list', $data);
    }
    public function expnses()
    {
        $data['employees'] = $this->Employee_model->get_all_employees();

        $data['expenses'] = $this->Expense_model->get_all_expenses();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;

        $this->load->view('admin/expnses_list', $data);
    }
    public function expnse()
    {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/add_expenses', $data);
    }
    public function leave()
    {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $data['logoo'] = $this->logo;

        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;


        $this->load->view('admin/add_leave', $data);
    }
    public function leav()
    {
        $data['leaves'] = $this->Leave_model->get_all_leave_records();
        $data['employees'] = $this->Employee_model->get_all_employees();

        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/leav_list', $data);
    }

    public function ad_salary()
    {
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/add_salary', $data);
    }
    public function salay_list()
    {
        $data['salaries'] = $this->Salary_model->get_all_salaries();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/salary_list', $data);
    }
    public function t_expenses()
    {
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/total_expenses', $data);
    }
    public function acount()
    {
        $data['expenses'] = $this->Accounts_model->get_all_expenses();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/Accounts', $data);
    }
    public function wages()
    {
        $data['wages'] = $this->Wages_model->get_all_wages();

        $data['employees'] = $this->Employee_model->get_all_employees();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/add_wages', $data);
    }
    public function t_expenses_report()
    {
        $data['expenses'] = $this->T_expanses_model->get_all_expenses();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/total_expenses_report', $data);
    }
    public function slip()
    {
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;
        $data['calculated_salaries'] = $this->Employee_model->get_all_salaries();
        $data['employees'] = $this->Employee_model->get_all_employees();
        
        $data['wages'] = $this->Wages_model->get_all_wages();

        $this->load->view('admin/Pay_slip', $data);
    }
    public function settings()
    {
        $emp_id = $this->session->userdata('emp_id');
        $data['employee'] = $this->Employee_model->get_employee($emp_id);
        $data['standard_work_time'] = $this->Settings_model->get_standard_work_time();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;
        $data['departments'] = $this->User_model->get_departments();



        $this->load->view('admin/setting', $data);
    }
    public function foter()
    {
        $data['footer_text'] = $this->Settings_model->get_footer();
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $this->load->view('admin/includes/footer', $data);
    }


    public function slugs($slug = '')
    {
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;


        $slug = uri_string();
        $this->load->view('admin/' . $slug, $data);
    }
}
