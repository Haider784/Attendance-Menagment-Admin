<?php
class ExpenseController extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Expense_model');
        $this->load->model('Employee_model');
        $this->load->model('Settings_model');
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['expenses'] = $this->Expense_model->get_all_expenses();
        // var_dump($data['expenses']);die;
        $this->load->view('expnses_list', $data);
    }

    public function create()
    {
        // Set validation rules
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required|integer');
        $this->form_validation->set_rules('expense_date', 'Expense Date', 'required');
        $this->form_validation->set_rules('description', 'Expense Description', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical characters and spaces.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form
            $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;
            $data['employees'] = $this->Employee_model->get_all_employees();
            $this->load->view('admin/add_expenses', $data); // Adjust the view name accordingly
        } else {
            // Validation succeeded, process the form data
            $data = [
                'employee_id' => $this->input->post('employee_id'),
                'amount' => $this->input->post('amount'),
                'expense_date' => $this->input->post('expense_date'),
                'description' => $this->input->post('description'),
                'invoice_number' => $this->generate_invoice_number()
            ];

            $this->Expense_model->insert_expense($data);
            redirect('add_expenses'); // Adjust the redirect URL accordingly
        }
    }

    // Function to generate a unique invoice number
    private function generate_invoice_number()
    {
        // You can use any logic here to generate a unique invoice number
        // For example, combining the current timestamp with a random number
        return 'INV-' . time() . '-' . rand(1000, 9999);
    }



    public function edit($id)
    {
        // Fetch the existing expense data
        $data['expense'] = $this->Expense_model->get_expense_by_id($id);
        $data['employees'] = $this->Employee_model->get_all_employees();

        // Set validation rules
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required|integer');
        $this->form_validation->set_rules('expense_date', 'Expense Date', 'required');
        $this->form_validation->set_rules('description', 'Expense Description', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabetical characters and spaces.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form with existing data
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/add_expenses', $data); // Adjust the view name accordingly
        } else {
            // Validation succeeded, process the form data
            $update_data = [
                'employee_id' => $this->input->post('employee_id'),
                'amount' => $this->input->post('amount'),
                'expense_date' => $this->input->post('expense_date'),
                'description' => $this->input->post('description'),
                'invoice_number' => $this->generate_invoice_numbe('invoice_number') // Retain the invoice number
            ];
            $this->Expense_model->update_expense($id, $update_data);
            redirect('expnses_list'); // Adjust the redirect URL accordingly
        }
    }
    private function generate_invoice_numbe()
    {
        // You can use any logic here to generate a unique invoice number
        // For example, combining the current timestamp with a random number
        return 'INV-' . time() . '-' . rand(1000, 9999);
    }
  

    public function delete($id)
    {
        $this->Expense_model->delete_expense($id);
        redirect('expnses_list');
    }
}
