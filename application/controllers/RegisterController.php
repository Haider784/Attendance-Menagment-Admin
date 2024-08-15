<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }


    public function register_user() {
        // Set validation rules
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('department_id', 'Department', 'required');
        $this->form_validation->set_rules('date_of_joining', 'Date of Joining', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('retype_password', 'Retype Password', 'required|matches[password]');
        $this->form_validation->set_rules('image', 'Image', 'callback_file_check');

        if ($this->form_validation->run() == FALSE) {
            $data['departments'] = $this->User_model->get_departments();
            $data['settings'] = $this->settings;
            $data['setting'] = $this->setting;
            $data['logoo'] = $this->logo;
            // Validation failed, reload the form
            $this->load->view('admin/register',$data);
        } else {
            // Validation passed, process the data
            // var_dump($this->input->post());die;
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'department_id' => $this->input->post('department_id'),
                'date_of_joining' => $this->input->post('date_of_joining'),
                'status' => $this->input->post('status'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'image' => $this->upload_image()
            );

            if ($this->User_model->insert_user($data)) {
                $this->session->set_flashdata('success', 'Registration successful.');
                redirect('register');
            } else {
                $this->session->set_flashdata('error', 'Registration failed, please try again.');
                $this->load->view('register');
            }
        }
    }

    public function file_check($str) {
        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_message('file_check', 'The {field} field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    private function upload_image() {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        } else {
            return NULL;
        }
    }
    

}
