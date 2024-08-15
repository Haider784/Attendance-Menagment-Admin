<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function check_logged_in() {
    $CI =& get_instance();
    if (!$CI->session->userdata('logged_in')) {
        redirect('login');
    } else {
        log_message('debug', 'User is logged in: ' . $CI->session->userdata('username'));
    }
}
