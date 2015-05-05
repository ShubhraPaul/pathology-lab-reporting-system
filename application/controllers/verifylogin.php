<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
    }

    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('login_view');
        } else {
            //Go to private area
            redirect(base_url() . 'reports', 'refresh');
        }
    }

    function check_database() {

        $user = $this->input->post('user');
        $result = $this->user->login($user['username'], $user['password']);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'type' => $row->type
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }

            redirect(base_url() . 'reports', 'refresh');
        } else {
            $data['adminloginerror'] = 'Invalid username or password';
            $this->load->view('login_view',$data);
        }
    }

}

?>