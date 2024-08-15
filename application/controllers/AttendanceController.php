<?php
class AttendanceController extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Karachi');
        $this->load->library('form_validation');

        $this->load->model('Employee_model');
        $this->load->model('Attendance_model');
        $this->load->model('Settings_model');
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
    }

    public function index()
    {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $data['attendance'] = $this->Attendance_model->get_all_attendance();
        $this->load->view('attsndance_table', $data);
    }



    // public function create()
    // {
    //     $this->form_validation->set_rules('employee_id', 'Employee', 'required');
    //     $this->form_validation->set_rules('date', 'Date', 'required');
    //     $this->form_validation->set_rules('work_holiday', 'Work Day', 'required');

    //     if ($this->form_validation->run() === FALSE) {
    //         $data['employees'] = $this->Employee_model->get_all_employees();
    //         $data['settings'] = $this->settings;
    //         $data['setting'] = $this->setting;
    //         $data['logoo'] = $this->logo;
    //         // Load the form view with errors
    //         $this->load->view('admin/Attendance', $data);
    //     } else {
    //         $employee_id = $this->input->post('employee_id');
    //         $date = $this->input->post('date');
    //         $work_holiday = $this->input->post('work_holiday');

    //         // Check if 'Leave' is selected
    //         if ($work_holiday == 'leave') {
    //             $check_in_time = '0';
    //             $check_out_time = '0';
    //         } else {
    //             $check_in_time = $this->input->post('check_in_time');
    //             $check_out_time = $this->input->post('check_out_time');
    //         }

    //         $status = $this->input->post('status');

    //         $data = array(
    //             'employee_id' => $employee_id,
    //             'date' => $date,
    //             'check_in_time' => $check_in_time,
    //             'check_out_time' => $check_out_time,
    //             'work_holiday' => $work_holiday,
    //             'status' => $status
    //         );

    //         $this->Attendance_model->insert_attendance($data);
    //         redirect('Attendance');
    //     }
    // }

    public function create()
    {
        $this->form_validation->set_rules('employee_id', 'Employee', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('work_holiday', 'Work Day', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['employees'] = $this->Employee_model->get_all_employees();
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/Attendance', $data);
        } else {
            $employee_id = $this->input->post('employee_id');
            $date = $this->input->post('date');
            $work_holiday = $this->input->post('work_holiday');
    
            if ($work_holiday == 'leave') {
                $check_in_time = '0';
                $check_out_time = '0';
            } else {
                $check_in_time = $this->input->post('check_in_time');
                $check_out_time = $this->input->post('check_out_time');
            }
    
            $status = $this->input->post('status');
    
            // Check for duplicate attendance
            $duplicate = $this->Attendance_model->check_duplicate_attendance($employee_id, $date, $check_in_time, $check_out_time);
    
            if ($duplicate) {
                // Handle duplicate attendance
                $this->session->set_flashdata('error', 'Attendance record already exists for the specified time range.');
                redirect('Attendance/create');
            } else {
                $data = array(
                    'employee_id' => $employee_id,
                    'date' => $date,
                    'check_in_time' => $check_in_time,
                    'check_out_time' => $check_out_time,
                    'work_holiday' => $work_holiday,
                    'status' => $status
                );
    
                $this->Attendance_model->insert_attendance($data);
                redirect('Attendance');
            }
        }
    }
    

// public function check_duplicate_attendance()
// {
//     $employee_id = $this->input->post('employee_id');
//     $date = $this->input->post('date');
//     $check_in_time = $this->input->post('check_in_time');
//     $check_out_time = $this->input->post('check_out_time');

//     $exists = $this->Attendance_model->check_duplicate_attendance($employee_id, $date, $check_in_time, $check_out_time);

//     echo $exists ? 'exists' : 'available';
// }


public function check_duplicate_attendance()
{
    $employee_id = $this->input->post('employee_id');
    $date = $this->input->post('date');
    $check_in_time = $this->input->post('check_in_time');
    $check_out_time = $this->input->post('check_out_time');

    $exists = $this->Attendance_model->check_duplicate_attendance($employee_id, $date, $check_in_time, $check_out_time);

    echo $exists ? 'exists' : 'available';
}







    // public function create()
    // {
    //     // Set validation rules
    //     $this->form_validation->set_rules('employee_id', 'Employee', 'required');
    //     $this->form_validation->set_rules('date', 'Date', 'required');
    //     // $this->form_validation->set_rules('check_in_time', 'Check-in Time', 'required');
    //     // $this->form_validation->set_rules('check_out_time', 'Check-out Time', 'required');
    //     $this->form_validation->set_rules('work_holiday', 'Work Day', 'required');
    //     //$this->form_validation->set_rules('status', 'Status', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed, reload the form
    //         $data['employees'] = $this->Employee_model->get_all_employees();
    //         date_default_timezone_set('Asia/Karachi'); // Set timezone to Pakistani time
    //         $data['current_date'] = date('Y-m-d');
    //         $data['current_time'] = date('H:i');
    //         // var_dump($data['employees']);die;
    //         $this->load->view('admin/Attendance', $data); // Adjust the view name accordingly
    //     } else {
    //         // Validation succeeded, process the form data
    //         $data = [
    //             'employee_id' => $this->input->post('employee_id'),
    //             'date' => $this->input->post('date'),
    //             'check_in_time' => $this->input->post('check_in_time'),
    //             'check_out_time' => $this->input->post('check_out_time'),
    //             'work_holiday' => $this->input->post('work_holiday'),
    //             'status' => $this->input->post('status') ? $this->input->post('status') : 'absent',

    //         ];

    //         $this->Attendance_model->insert_attendance($data);
    //         redirect('Attendance'); // Adjust the redirect URL accordingly
    //     }
    // }


    public function update($id)
    {
        // Set validation rules
        $this->form_validation->set_rules('employee_id', 'Employee', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        // $this->form_validation->set_rules('check_in_time', 'Check-in Time', 'required');
        // $this->form_validation->set_rules('check_out_time', 'Check-out Time', 'required');
        $this->form_validation->set_rules('work_holiday', 'Work Day', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the form with existing data
            $data['employees'] = $this->Employee_model->get_all_employees();
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $data['attendance_item'] = $this->Attendance_model->get_attendance_by_id($id);
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/Attendance', $data); // Adjust the view name accordingly
        } else {
            // Validation succeeded, process the form data
            $data = [
                'employee_id' => $this->input->post('employee_id'),
                'date' => $this->input->post('date'),
                'check_in_time' => $this->input->post('check_in_time'),
                'check_out_time' => $this->input->post('check_out_time'),
                'work_holiday' => $this->input->post('work_holiday'),
                'status' => $this->input->post('status') ? $this->input->post('status') : 'absent',

                // 'status' => $this->input->post('status')
            ];
            // var_dump($this->input->post());die;

            $this->Attendance_model->update_attendance($id, $data);
            redirect('attsndance_table'); // Adjust the redirect URL accordingly
        }
    }

    public function delete_attendance($id)
    {
        $this->db->delete('attendance', array('id' => $id));
        redirect('attsndance_table');
    }
}
