<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        check_logged_in(); // Ensure the user is logged in
    }

    public function index() {
        $this->load->view('dashboard');
    }
}
