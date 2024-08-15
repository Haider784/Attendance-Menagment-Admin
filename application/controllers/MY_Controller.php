<?php
class MY_Controller extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('Settings_model');
            $footer_text = $this->Settings_model->get_footer();
            $data['footer_text'] = $footer_text;
            $this->load->vars($data);
        }
    
        public function index() {
            $this->load->view('footer');
        }
    }
    