<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Admins extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('report', '', TRUE);
    }

    function index() {
        $data['admins'] = $this->user->all_admins();
        $this->load->view('admins/view_all', $data);
    }
    
    function add(){
        $this->load->view('admins/create_admin');
    }
    
    function create(){
        $admin = $this->input->post('admin');
        $admin['password'] = MD5($admin['password']);
        $admin['type'] = '1';
        $this->user->create_admin($admin);
        redirect(base_url() . 'admins', 'refresh');
    }

}

?>