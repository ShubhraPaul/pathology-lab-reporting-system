<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url() . 'login', 'refresh');
        }
        $this->load->model('report', '', TRUE);
        $this->load->model('user', '', TRUE);
    }

    function index() {
        $this->check_auth();
        $data['reports'] = $this->report->all();
        $this->load->view('reports/view_reports', $data);
    }

    function view($patient_id) {
        $this->check_auth();
        $data['reports'] = $this->report->patient_reports($patient_id);
        $patient = $this->user->get_patient($patient_id);
        $data['patient'] = $patient[0];
        $this->load->view('reports/view_reports', $data);
    }
    

    function view_report($report_id) {
        $this->check_auth();
        $data['report_id'] = $report_id;
        $data['report'] = $this->report->report_details($report_id);
        $this->load->view('reports/view_report', $data);
    }

    function add($patient_id) {
        $this->check_auth();
        $data['patient_id'] = $patient_id;
        $this->load->view('reports/add_report', $data);
    }

    function create($patient_id) {
        $this->check_auth();
        $results = $this->input->post('test');
        $report_details = array();
        try {
            $report = $this->report->create($patient_id, date("Y-m-d h:i:sa"));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        //var_dump($report);
        foreach ($results as $key => $value) {
            $report_details[] = array('report_id' => $report['id'], 'test_name' => $results[$key]['name'], 'test_value' => $results[$key]['measurement']);
            //echo 'reports: name='.$results[$key]['name'].',value='.$results[$key]['measurement'].'<br>';
        }
        $inser_report_details = $this->report->insert_details($report_details);
        redirect(base_url() . 'reports', 'refresh');
    }

    function edit($report_id) {
        $this->check_auth();
        $data['report'] = $this->report->report_details($report_id);
        $data['report_id'] = $report_id;
        $this->load->view('reports/edit_report', $data);
    }

    function update($report_id) {
        $this->check_auth();
        $data = $this->input->post('test');
        foreach ($data as $key => $value) {
            $this->report->update($key, $value);
        }
        redirect(base_url() . 'reports/view_report/'.$report_id, 'refresh');
    }

    function delete($report_id) {
        $this->check_auth();
        $this->report->delete($report_id);
        redirect(base_url() . 'reports', 'refresh');
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