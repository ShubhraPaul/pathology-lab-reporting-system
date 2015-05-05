<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            if ($session_data['type'] == '1') {
                redirect(base_url() . 'home', 'refresh');
            } else {
                redirect(base_url() . 'patients/home', 'refresh');
            }
        } else {
            $this->load->helper('form');
            $this->load->view('login_view');
        }
    }

}

?>