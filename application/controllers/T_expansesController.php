<?php
class T_expansesController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('T_expanses_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['expenses'] = $this->T_expanses_model->get_all_expenses();
        $this->load->view('total_expenses_report', $data);
    }

    // public function create() {
    //     if ($this->input->post()) {
    //         $data = [
    //             'emp_id' => $this->input->post('emp_id'),
    //             't_expans' => $this->input->post('t_expenses'),
    //             'received' => $this->input->post('received'),
    //             'remaning' => $this->input->post('remaining')
    //         ];
    //         $this->T_expanses_model->insert_expense($data);
    //         redirect('total_expenses');
    //     } 
    // }
    public function create()
    {
        // Set validation rules
        $this->form_validation->set_rules('emp_id', 'Employee ID', 'required|integer');
        $this->form_validation->set_rules('t_expenses', 'Total Expenses', 'required|greater_than_equal_to[0]');
        $this->form_validation->set_rules('received', 'Received Amount', 'required|greater_than_equal_to[0]');
        $this->form_validation->set_rules('remaining', 'Remaining Amount', 'required|greater_than_equal_to[0]');
        // $this->form_validation->set_rules('remaining', 'Remaining Amount', 'required|callback_check_remaining_amount');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form
            $data['expense'] = $this->input->post();
            $this->load->view('admin/total_expenses', $data); // Adjust the view name accordingly
        } else {
            // Validation succeeded, process the form data
            $data = [
                'emp_id' => $this->input->post('emp_id'),
                't_expans' => $this->input->post('t_expenses'),
                'received' => $this->input->post('received'),
                'remaning' => $this->input->post('remaining')
            ];

            $this->T_expanses_model->insert_expense($data);
            redirect('total_expenses'); // Adjust the redirect URL accordingly
        }
    }



    public function edit($id)
    {
        // Set validation rules
        $this->form_validation->set_rules('emp_id', 'Employee ID', 'required|integer');
        $this->form_validation->set_rules('t_expenses', 'Total Expenses', 'required|greater_than_equal_to[0]');
        $this->form_validation->set_rules('received', 'Received Amount', 'required|greater_than_equal_to[0]');
        $this->form_validation->set_rules('remaining', 'Remaining Amount', 'required|greater_than_equal_to[0]');
        // $this->form_validation->set_rules('remaining', 'Remaining Amount', 'required|callback_check_remaining_amount');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form with current leave data
            $data['expense'] = $this->T_expanses_model->get_expense_by_id($id);
            $this->load->view('admin/total_expenses', $data); // Adjust the view name accordingly
        } else {
            // Validation succeeded, process the form data
            $data = [
                'emp_id' => $this->input->post('emp_id'),
                't_expans' => $this->input->post('t_expenses'),
                'received' => $this->input->post('received'),
                'remaning' => $this->input->post('remaining')
            ];
            $this->T_expanses_model->update_expense($id, $data);
            redirect('total_expenses_report');
        }
    }
    // public function edit($id){
    //     if ($this->input->post()) {
    //         $data = [
    //             'emp_id' => $this->input->post('emp_id'),
    //             't_expans' => $this->input->post('t_expenses'),
    //             'received' => $this->input->post('received'),
    //             'remaning' => $this->input->post('remaining')
    //         ];
    //         $this->T_expanses_model->update_expense($id, $data);
    //         redirect('total_expenses_report');
    //     } else {
    //         $data['expense'] = $this->T_expanses_model->get_expense_by_id($id);
    //         $this->load->view('admin/total_expenses', $data);
    //     }
    // }

    public function delete($id)
    {
        $this->T_expanses_model->delete_expense($id);
        redirect('total_expenses_report');
    }
}
