<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeController extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;

    public function __construct()
    {

        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('Attendance_model');
        $this->load->model('User_model');
        $this->load->model('Salary_model');
        $this->load->model('Settings_model'); // Load the model
        $this->settings =  $this->Settings_model->get_footer();
        $this->setting =  $this->Settings_model->get_footer_con();
        $this->logo =  $this->Settings_model->get_logo();
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $this->load->view('employees-list', $data);
    }


    public function create()
    {
        // Set validation rules
        $this->form_validation->set_rules('dep_id', 'Department', 'required');
        $this->form_validation->set_rules('emp_name', 'Employee Name', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabet.'
        ]);
        $this->form_validation->set_rules('emp_gardian', 'Guardian Name', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabet.'
        ]);
        $this->form_validation->set_rules('emp_contact', 'Mobile', 'required|integer');
        $this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('emp_password', 'Password', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required|callback_validate_dob');
        $this->form_validation->set_rules('doj', 'Date of Joining', 'required|callback_validate_doj');
        $this->form_validation->set_rules('emp_gender', 'Gender', 'required');
        $this->form_validation->set_rules('basic_salary', 'Salary', 'required|integer');
        $this->form_validation->set_rules('emp_address', 'Address', 'required');
        log_message('debug', 'Validation running...');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB max size
        $config['file_name'] = uniqid(); // Unique filename

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('emp_image')) {
            $upload_error = $this->upload->display_errors('<div class="text-danger">', '</div>');
            $data['upload_error'] = $upload_error;
            $data['departments'] = $this->User_model->get_departments();
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/add-employees', $data);
        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $data = [
                'dep_id' => $this->input->post('dep_id'),
                'emp_name' => $this->input->post('emp_name'),
                'emp_gardian' => $this->input->post('emp_gardian'),
                'emp_contact' => $this->input->post('emp_contact'),
                'emp_email' => $this->input->post('emp_email'),
                'emp_password' => $this->input->post('emp_password'),
                'dob' => $this->input->post('dob'),
                'doj' => $this->input->post('doj'),
                'basic_salary' => $this->input->post('basic_salary'),
                'emp_gender' => $this->input->post('emp_gender'),
                'emp_address' => $this->input->post('emp_address'),
                'emp_image' => $file_name // Add file name to the data array
            ];

            // Debugging output to check the data array
            log_message('debug', 'Employee data before insertion: ' . print_r($data, true));

            // Insert data into the database
            $inserted = $this->Employee_model->insert_employee($data);


            if ($inserted) {
                // Redirect to a success page or list page
                redirect('add-employees'); // Adjust the redirect URL accordingly
            } else {
                // Handle the case where the data could not be inserted
                log_message('error', 'Employee data could not be inserted into the database');
                $data['departments'] = $this->User_model->get_departments();
                $data['db_error'] = 'An error occurred while inserting the data. Please try again.';
                $this->load->view('admin/add-employees', $data);
            }
        }
    }
    public function validate_dob($dob)
    {
        $dobDate = new DateTime($dob);
        $currentDate = new DateTime();
        $age = $currentDate->diff($dobDate)->y;

        if ($age < 20) {
            $this->form_validation->set_message('validate_dob', 'The Date of Birth must be at least 20 years ago.');
            return false;
        }

        return true;
    }

    public function validate_doj($doj)
    {
        $dob = $this->input->post('dob');
        if (!$dob) {
            $this->form_validation->set_message('validate_doj', 'The Date of Birth field is required.');
            return false;
        }

        $dojDate = new DateTime($doj);
        $dobDate = new DateTime($dob);

        $joiningAge = $dojDate->diff($dobDate)->y;

        if ($joiningAge < 20) {
            $this->form_validation->set_message('validate_doj', 'The Date of Joining must be at least 20 years from the Date of Birth.');
            return false;
        }

        return true;
    }



    // public function validate_dob($dob) {
    //     $dobDate = new DateTime($dob);
    //     $currentDate = new DateTime();
    //     $age = $currentDate->diff($dobDate)->y;

    //     if ($age < 20) {
    //         $this->form_validation->set_message('validate_dob', 'The Date of Birth must be at least 20 years ago.');
    //         return false;
    //     }

    //     return true;
    // }

    // public function validate_doj($doj) {
    //     $dob = $this->input->post('dob');
    //     if (!$dob) {
    //         $this->form_validation->set_message('validate_doj', 'The Date of Birth field is required.');
    //         return false;
    //     }

    //     $dojDate = new DateTime($doj);
    //     $dobDate = new DateTime($dob);

    //     $joiningAge = $dojDate->diff($dobDate)->y;

    //     if ($joiningAge < 20) {
    //         $this->form_validation->set_message('validate_doj', 'The Date of Joining must be at least 20 years from the Date of Birth.');
    //         return false;
    //     }

    //     return true;
    // }




    public function update($emp_id)
    {
        // Set validation rules
        $this->form_validation->set_rules('dep_id', 'Department', 'required');
        $this->form_validation->set_rules('emp_name', 'Employee Name', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabet.'
        ]);
        $this->form_validation->set_rules('emp_gardian', 'Guardian Name', 'required|regex_match[/^[a-zA-Z ]+$/]', [
            'required' => 'The %s field is required.',
            'regex_match' => 'The %s field may only contain alphabet.'
        ]);
        $this->form_validation->set_rules('emp_contact', 'Mobile', 'required|integer');
        $this->form_validation->set_rules('emp_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('emp_password', 'Password', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required|callback_validate_dob');
        $this->form_validation->set_rules('doj', 'Date of Joining', 'required|callback_validate_doj');
        $this->form_validation->set_rules('emp_gender', 'Gender', 'required');
        $this->form_validation->set_rules('basic_salary', 'Salary', 'required|integer');
        $this->form_validation->set_rules('emp_address', 'Address', 'required');
        log_message('debug', 'Validation running...');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB max size
        $config['file_name'] = uniqid(); // Unique filename

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE || (!$this->upload->do_upload('emp_image') && $_FILES['emp_image']['size'] > 0)) {
            $upload_error = $this->upload->display_errors('<div class="text-danger">', '</div>');
            $data['upload_error'] = $upload_error;
            $data['departments'] = $this->User_model->get_departments();
            $data['employee'] = $this->Employee_model->get_employee($emp_id); // Load existing employee data
            // var_dump($this->input->post());die;
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $this->load->view('admin/add-employees', $data);
        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            $data = [
                'dep_id' => $this->input->post('dep_id'),
                'emp_name' => $this->input->post('emp_name'),
                'emp_gardian' => $this->input->post('emp_gardian'),
                'emp_contact' => $this->input->post('emp_contact'),
                'emp_email' => $this->input->post('emp_email'),
                'emp_password' => $this->input->post('emp_password'),
                'dob' => $this->input->post('dob'),
                'doj' => $this->input->post('doj'),
                'basic_salary' => $this->input->post('basic_salary'),
                'emp_gender' => $this->input->post('emp_gender'),
                'emp_address' => $this->input->post('emp_address'),
            ];

            if ($_FILES['emp_image']['size'] > 0) {
                $data['emp_image'] = $file_name; // Add file name to the data array if a new file is uploaded
            }

            // Debugging output to check the data array
            log_message('debug', 'Employee data before update: ' . print_r($data, true));

            // Update data in the database
            $updated = $this->Employee_model->update_employee($emp_id, $data);
            // var_dump('kjhkj');die;

            if ($updated) {
                // Redirect to a success page or list page
                redirect('employees-list'); // Adjust the redirect URL accordingly
            }
        }
    }

    // public function view($emp_id)
    // {
    //     $data['employees'] = $this->Employee_model->get_employee($emp_id);
    //     $data['attendance'] = $this->Employee_model->get_all_attendance($emp_id);
    //     $this->load->view('admin/profile', $data);
    // }




    // public function view($emp_id)
    // {
    //     $data['employees'] = $this->Employee_model->get_employee($emp_id);
    //     // $attendance = $this->Employee_model->get_all_attendance($emp_id);    
    //     $month = 6;  // Example month (August)
    //     $year = 2024; // Example year

    //     $attendance = $this->Employee_model->get_attendance_by_month($emp_id, $month, $year);

    //     $data['attendance'] = $attendance;

    //     // Initialize variables
    //     $totalWorkMinutesAllDays = 0;
    //     $totalMissingMinutesAllDays = 0;
    //     $totalOvertimeMinutesAllDays = 0;
    //     $totalPresentWorkMinutesAllDays = 0; // Total work minutes on present days
    //     $basic_salary = $data['employees']->basic_salary;
    //     $this->Settings_model->get_standard_work_time();
    //     $pay_per_minute = (((int) $basic_salary / 30) / $this->Settings_model->get_standard_work_time()) / 60;
    //     $groupedAttendance = [];

    //     // Group attendance records by employee_id and date
    //     foreach ($attendance as $record) {
    //         $key = $record->employee_id . '_' . $record->date;
    //         if (!isset($groupedAttendance[$key])) {
    //             $groupedAttendance[$key] = [
    //                 'employee_id' => $record->employee_id,
    //                 'date' => $record->date,
    //                 'work_holiday' => $record->work_holiday,
    //                 'total_check_in_time' => $record->work_holiday != 'absent' ? new DateTime($record->check_in_time) : null,
    //                 'total_check_out_time' => $record->work_holiday != 'absent' ? new DateTime($record->check_out_time) : null,
    //                 'total_work_minutes' => 0
    //             ];
    //         } else {
    //             if ($record->work_holiday != 'absent') {
    //                 $groupedAttendance[$key]['total_check_in_time'] = min($groupedAttendance[$key]['total_check_in_time'], new DateTime($record->check_in_time));
    //                 $groupedAttendance[$key]['total_check_out_time'] = max($groupedAttendance[$key]['total_check_out_time'], new DateTime($record->check_out_time));
    //             }
    //         }

    //         if ($record->work_holiday != 'absent') {
    //             $check_in = new DateTime($record->check_in_time);
    //             $check_out = new DateTime($record->check_out_time);
    //             $work_time = $check_in->diff($check_out);
    //             $groupedAttendance[$key]['total_work_minutes'] += $work_time->h * 60 + $work_time->i;

    //             // Sum up the total work minutes for present days (excluding holidays and leaves)
    //             if ($record->work_holiday == 'present') {
    //                 $totalPresentWorkMinutesAllDays += $work_time->h * 60 + $work_time->i;
    //             }
    //         } elseif ($record->work_holiday == 'holiday' || $record->work_holiday == 'leave') {
    //             // Assuming full workday credit for holidays and leaves
    //             $groupedAttendance[$key]['total_work_minutes'] += $this->Settings_model->get_standard_work_time() * 60; // Standard work time in minutes
    //         }
    //     }

    //     // Calculate totals
    //     foreach ($groupedAttendance as $record) {
    //         $standard_minutes = $this->Settings_model->get_standard_work_time() * 60;
    //         $missing_minutes = $record['work_holiday'] != 'absent' ? max(0, $standard_minutes - $record['total_work_minutes']) : 0;
    //         $overtime_minutes = $record['work_holiday'] != 'absent' ? max(0, $record['total_work_minutes'] - $standard_minutes) : 0;

    //         if ($record['work_holiday'] != 'absent') {
    //             $totalWorkMinutesAllDays += $record['total_work_minutes'];
    //             $totalMissingMinutesAllDays += $missing_minutes;
    //             $totalOvertimeMinutesAllDays += $overtime_minutes;
    //         }
    //     }

    //     // Calculate total salary
    //     $salary = $pay_per_minute * $totalWorkMinutesAllDays;

    //     // Prepare data for insertion
    //     $calculatedData = [
    //         'employee_id' => $emp_id,
    //         'total_work_time' => intdiv($totalWorkMinutesAllDays, 60) . ':' . sprintf('%02d', $totalWorkMinutesAllDays % 60),
    //         'total_missing_time' => intdiv($totalMissingMinutesAllDays, 60) . ':' . sprintf('%02d', $totalMissingMinutesAllDays % 60),
    //         'total_overtime' => intdiv($totalOvertimeMinutesAllDays, 60) . ':' . sprintf('%02d', $totalOvertimeMinutesAllDays % 60),
    //         'total_work_minutes' => $totalWorkMinutesAllDays,
    //         'total_missing_minutes' => $totalMissingMinutesAllDays,
    //         'total_overtime_minutes' => $totalOvertimeMinutesAllDays,
    //         // 'net_work_minutes' => $net_work_minutes,
    //         'total_salary' => $salary,
    //         'calculation_date' => date('Y-m-d'),
    //         'salary_paid' => 0
    //     ];

    //     // Save data to the database
    //     $this->Employee_model->store_calculated_data($calculatedData);

    //     // Pass calculated data to the view
    //     $data['total_work_time'] = $calculatedData['total_work_time'];
    //     $data['total_missing_time'] = $calculatedData['total_missing_time'];
    //     $data['total_overtime'] = $calculatedData['total_overtime'];
    //     $data['total_work_minutes'] = $calculatedData['total_work_minutes'];
    //     $data['total_missing_minutes'] = $calculatedData['total_missing_minutes'];
    //     $data['total_overtime_minutes'] = $calculatedData['total_overtime_minutes'];
    //     // $data['net_work_minutes'] = $calculatedData['net_work_minutes'];
    //     $data['total_salary'] = $calculatedData['total_salary'];
    //     $data['settings'] = $this->settings;
    //     $data['setting'] = $this->setting;
    //     $data['logoo'] = $this->logo;
    //     $this->load->view('admin/profile', $data);
    // }
    public function view($emp_id)
    {
        $data['employees'] = $this->Employee_model->get_employee($emp_id);
        $month = $this->Settings_model->get_attendance_month(); 
        // var_dump($month);die;
        $year = 2024; // Example year

        // Fetch attendance records for the specified month and year
        $attendance = $this->Employee_model->get_attendance_by_month($emp_id, $month, $year);

        $data['attendance'] = $attendance;

        // Calculate the last day of the specified month and year
        $last_day_of_month = date('Y-m-t', strtotime("$year-$month-01"));

        // Initialize variables
        $totalWorkMinutesAllDays = 0;
        $totalMissingMinutesAllDays = 0;
        $totalOvertimeMinutesAllDays = 0;
        $totalPresentWorkMinutesAllDays = 0; // Total work minutes on present days
        $basic_salary = $data['employees']->basic_salary;
        $standard_work_time = $this->Settings_model->get_standard_work_time();
        $pay_per_minute = (($basic_salary / 30) / $standard_work_time) / 60;
        $groupedAttendance = [];

        // Group attendance records by employee_id and date
        foreach ($attendance as $record) {
            $key = $record->employee_id . '_' . $record->date;
            if (!isset($groupedAttendance[$key])) {
                $groupedAttendance[$key] = [
                    'employee_id' => $record->employee_id,
                    'date' => $record->date,
                    'work_holiday' => $record->work_holiday,
                    'total_check_in_time' => $record->work_holiday != 'absent' ? new DateTime($record->check_in_time) : null,
                    'total_check_out_time' => $record->work_holiday != 'absent' ? new DateTime($record->check_out_time) : null,
                    'total_work_minutes' => 0
                ];
            } else {
                if ($record->work_holiday != 'absent') {
                    $groupedAttendance[$key]['total_check_in_time'] = min($groupedAttendance[$key]['total_check_in_time'], new DateTime($record->check_in_time));
                    $groupedAttendance[$key]['total_check_out_time'] = max($groupedAttendance[$key]['total_check_out_time'], new DateTime($record->check_out_time));
                }
            }

            if ($record->work_holiday != 'absent') {
                $check_in = new DateTime($record->check_in_time);
                $check_out = new DateTime($record->check_out_time);
                $work_time = $check_in->diff($check_out);
                $groupedAttendance[$key]['total_work_minutes'] += $work_time->h * 60 + $work_time->i;

                // Sum up the total work minutes for present days (excluding holidays and leaves)
                if ($record->work_holiday == 'present') {
                    $totalPresentWorkMinutesAllDays += $work_time->h * 60 + $work_time->i;
                }
            } elseif ($record->work_holiday == 'holiday' || $record->work_holiday == 'leave') {
                // Assuming full workday credit for holidays and leaves
                $groupedAttendance[$key]['total_work_minutes'] += $standard_work_time * 60; // Standard work time in minutes
            }
        }

        // Calculate totals
        foreach ($groupedAttendance as $record) {
            $standard_minutes = $standard_work_time * 60;
            $missing_minutes = $record['work_holiday'] != 'absent' ? max(0, $standard_minutes - $record['total_work_minutes']) : 0;
            $overtime_minutes = $record['work_holiday'] != 'absent' ? max(0, $record['total_work_minutes'] - $standard_minutes) : 0;

            if ($record['work_holiday'] != 'absent') {
                $totalWorkMinutesAllDays += $record['total_work_minutes'];
                $totalMissingMinutesAllDays += $missing_minutes;
                $totalOvertimeMinutesAllDays += $overtime_minutes;
            }
        }

        // Calculate total salary
        $salary = $pay_per_minute * $totalWorkMinutesAllDays;

        // Prepare data for insertion
        $calculatedData = [
            'employee_id' => $emp_id,
            'total_work_time' => intdiv($totalWorkMinutesAllDays, 60) . ':' . sprintf('%02d', $totalWorkMinutesAllDays % 60),
            'total_missing_time' => intdiv($totalMissingMinutesAllDays, 60) . ':' . sprintf('%02d', $totalMissingMinutesAllDays % 60),
            'total_overtime' => intdiv($totalOvertimeMinutesAllDays, 60) . ':' . sprintf('%02d', $totalOvertimeMinutesAllDays % 60),
            'total_work_minutes' => $totalWorkMinutesAllDays,
            'total_missing_minutes' => $totalMissingMinutesAllDays,
            'total_overtime_minutes' => $totalOvertimeMinutesAllDays,
            'total_salary' => $salary,
            'calculation_date' => $last_day_of_month, // Use the last day of the specified month
            'salary_paid' => 0
        ];
        $this->Employee_model->store_calculated_data($calculatedData);

        // Pass calculated data to the view
        $data['total_work_time'] = $calculatedData['total_work_time'];
        $data['total_missing_time'] = $calculatedData['total_missing_time'];
        $data['total_overtime'] = $calculatedData['total_overtime'];
        $data['total_work_minutes'] = $calculatedData['total_work_minutes'];
        $data['total_missing_minutes'] = $calculatedData['total_missing_minutes'];
        $data['total_overtime_minutes'] = $calculatedData['total_overtime_minutes'];
        $data['total_salary'] = $calculatedData['total_salary'];
        $data['settings'] = $this->settings;
        $data['setting'] = $this->setting;
        $data['logoo'] = $this->logo;
        $this->load->view('admin/profile', $data);
    }












    public function delete($id)
    {
        $this->Employee_model->delete_employee($id);
        redirect('employees-list');
    }
}
