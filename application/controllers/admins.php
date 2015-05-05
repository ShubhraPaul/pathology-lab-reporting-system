<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Admins extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login', 'refresh');
        }
        $this->load->model('user', '', TRUE);
        $this->load->model('report', '', TRUE);
    }

    function index() {
        $this->check_auth();
        $data['admins'] = $this->user->all_admins();
        $this->load->view('admins/view_all', $data);
    }

    function add() {
        $this->check_auth();
        $this->load->view('admins/create_admin');
    }

    function create() {
        $this->check_auth();
        $admin = $this->input->post('admin');
        $admin['password'] = MD5($admin['password']);
        $admin['type'] = '1';
        if ($this->user->create_admin($admin)) {
            redirect(base_url() . 'admins', 'refresh');
        } else {
            $data['error'] = 'user already exist,try with different username and passowrd';
            $this->load->view('admins/create_admin',$data );
        }
    }

    function check_auth() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if ($session_data['type'] == '2') {
                redirect(base_url() . 'patients/forbidden', 'refresh');
            }
        } else {
            redirect(base_url() . 'login', 'refresh');
        }
    }

}

?>