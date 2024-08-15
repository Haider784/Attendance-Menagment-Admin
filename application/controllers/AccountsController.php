<?php
class AccountsController extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wages_model');
        $this->load->model('Accounts_model');
        $this->load->model('Settings_model');
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
        $this->load->library('form_validation');
        $this->load->helper('form');


    }

    public function index() {
        $data['expenses'] = $this->Accounts_model->get_all_expenses();
        $this->load->view('expenses_view', $data);
    }


    public function insert_expense() {
        // Set validation rules
        $this->form_validation->set_rules('expense_type', 'Expense Type', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required|integer');
        // $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical characters and spaces.'
        ]);
        $this->form_validation->set_rules('date', 'Expense Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Load the form with validation errors
            $data['validation_error'] = true;
            $data['expenses'] = $this->Accounts_model->get_all_expenses();
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/Accounts', $data);
            // $this->load->view('admin/Accounts');
        } else {
            // Process the form submission
            $data = array(
                'expense_type' => $this->input->post('expense_type'),
                'amount' => $this->input->post('amount'),
                'description' =>$this->input->post('description'),
                'date' => $this->input->post('date')
            );
        

            // Save the data or perform other actions
            $this->Accounts_model->insert_expense($data);

            // Redirect or load success page
            redirect('Accounts');
        }
    }


 

    public function edit_expense($id) {
        $data['expense'] = $this->Accounts_model->get_expense_by_id($id);
        $data['expenses'] = $this->Accounts_model->get_all_expenses();
        $data['open_modal'] = true;
        $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
        $this->load->view('admin/Accounts', $data);
    }




    public function update_expense($id) {
        // Set validation rules
        $this->form_validation->set_rules('expense_type', 'Expense Type', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required|integer');
        $this->form_validation->set_rules('description', 'Description', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical characters and spaces.'
        ]);
        $this->form_validation->set_rules('date', 'Expense Date', 'required');
       

        if ($this->form_validation->run() == FALSE) {
            // Load the form with validation errors and set a flag to indicate validation failure
            $data['validation_error'] = true;
            $data['expense'] = $this->Accounts_model->get_expense_by_id($id);
            $data['expenses'] = $this->Accounts_model->get_all_expenses();
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/Accounts', $data);
        } else {
            // Process the form submission
            $data = array(
                'expense_type' => $this->input->post('expense_type'),
                'amount' => $this->input->post('amount'),
                'description' => $this->input->post('description'),
                'date' => $this->input->post('date')
            );
            // var_dump($data);die;

            // Update the data in the database
            $this->Accounts_model->update_expense($id, $data);

            // Redirect or load success page
            redirect('Accounts');
        }
    }


    public function delete_expense($id) {
        $this->Accounts_model->delete_expense($id);
        redirect('Accounts');
    }
    
}