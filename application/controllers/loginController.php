<?php
defined('BASEPATH') or exit('No direct script access allowed');

class loginController extends CI_Controller
{
    public $settings;
    public $setting;
    public $logo;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); // Ensure session library is loaded
        $this->load->helper(array('form', 'url', 'auth', 'recaptcha'));
        $this->load->model('User_model');
        $this->load->model('Employee_model');
        $this->load->model('Settings_model');
        $this->settings = $this->Settings_model->get_footer();
        $this->setting = $this->Settings_model->get_footer_con();
        $this->logo = $this->Settings_model->get_logo();
        $this->load->library('form_validation');

    }
    

    public function index()
    {
        $this->load->view('admin/login');
    }


    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
            $userIp = $this->input->ip_address();
            $secret = '6LdKVBQqAAAAAJ-Uh8AKdSqiFimkGGtvTS8cnt5i';
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptchaResponse&remoteip=$userIp";
    
            $response = file_get_contents($url);
            $status = json_decode($response, true);
    
            if (!$status['success']) {
                $this->session->set_flashdata('error', 'CAPTCHA verification failed.');
                redirect('login');
            } else {
                $emp_email = $this->input->post('email');
                $emp_password = $this->input->post('password');
    
                $user = $this->User_model->log($emp_email, $emp_password);
    
                if ($user) {
                    $userdata = array(
                        'emp_id' => $user->emp_id,
                        'emp_name' => $user->emp_name,
                        'emp_email' => $user->emp_email,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($userdata);
                    log_message('debug', 'User logged in: ' . $user->emp_email);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Invalid email or password');
                    redirect('login');
                }
            }
        }
    }
    
    // public function login()
    // {
    //     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    //     $this->form_validation->set_rules('password', 'Password', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('admin/login');
    //     } else {
    //         $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
    //         $userIp = $this->input->ip_address();
    //         $secret = '6LdKVBQqAAAAAJ-Uh8AKdSqiFimkGGtvTS8cnt5i';
    //         $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptchaResponse&remoteip=$userIp";

    //         $response = file_get_contents($url);
    //         $status = json_decode($response, true);

    //         if (!$status['success']) {
    //             $this->session->set_flashdata('error', 'CAPTCHA verification failed.');
    //             redirect('login');
    //         } else {
    //             $emp_email = $this->input->post('email');
    //             $emp_password = $this->input->post('password');

    //             $user = $this->User_model->log($emp_email, $emp_password);

    //             if ($user) {
    //                 $userdata = array(
    //                     'emp_id' => $user->emp_id,
    //                     'emp_name' => $user->emp_name,
    //                     'emp_email' => $user->emp_email,
    //                     'logged_in' => TRUE
    //                 );
    //                 $this->session->set_userdata($userdata);
    //                 // $session_data = $this->session->userdata();
    //                 // var_dump($session_data);die;
    //                log_message('debug', 'User logged in: ' . $user->emp_email);
    //                 redirect('dashboard');
    //             } else {
    //                 $this->session->set_flashdata('error', 'Invalid email or password');
    //                 redirect('login');
    //             }
    //         }
    //     }
    // }



    public function view_form()
    {
        $emp_id = $this->session->userdata('emp_id');
        if ($emp_id) {
            
            $data['employee'] = $this->Employee_model->get_employee($emp_id);
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            $data['departments'] = $this->User_model->get_departments();

            $this->load->view('setting', $data);
        } else {
            redirect('login');
        }
    }



    public function update($emp_id)
    {
        // Set validation rule for the password field
        $this->form_validation->set_rules('emp_password', 'Password', 'required');
    
        log_message('debug', 'Validation running...');
    
        // Check if form validation is successful
        if ($this->form_validation->run() == FALSE) {
            // Validation failed or no file upload (file upload code is removed)
            $data['departments'] = $this->User_model->get_departments();
            $data['employee'] = $this->Employee_model->get_employee($emp_id); // Load existing employee data
            $this->load->view('admin/add-employees', $data);
        } else {
            // Prepare the data array with updated password
            $data = [
                'emp_password' => $this->input->post('emp_password'),
            ];
    
            // Debugging output to check the data array
            log_message('debug', 'Employee data before update: ' . print_r($data, true));
    
            // Update data in the database
            $updated = $this->Employee_model->update_employee($emp_id, $data);
    
            if ($updated) {
                // Redirect to a success page or list page
                redirect('setting'); // Adjust the redirect URL accordingly
            } else {
                // Handle the case where the update failed
                $this->session->set_flashdata('error', 'Update failed');
                redirect('setting');
            }
        }
    }
    
    
    public function logout()
    {
        $this->session->unset_userdata(array('email', 'role', 'logged_in'));
        $this->session->sess_destroy();
        redirect('login');
    }
}
