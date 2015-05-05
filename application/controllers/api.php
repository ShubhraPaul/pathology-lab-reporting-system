<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Api extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('report', '', TRUE);
        $this->load->model('user', '', TRUE);
    }

    function index() {
        
    }
    
    function patients(){
        $patients = $this->user->all_patients();
        $names = array();
        foreach ($patients as $value) {
            $names[] = $value->username;
        }
        echo json_encode(array('patients'=>$names));
    }
    

}

?>