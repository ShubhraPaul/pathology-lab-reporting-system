<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Reports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('report', '', TRUE);
    }

    function index() {
        $data['reports'] = $this->report->all();
        $this->load->view('reports/view_reports', $data);
    }

    function view($patient_id) {
        $data['reports'] = $this->report->patient_reports($patient_id);
        $this->load->view('reports/view_reports', $data);
    }

    function view_report($report_id) {
        $data['report'] = $this->report->report_details($report_id);
        $this->load->view('reports/view_report', $data);
    }

    function edit() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

    function add($patient_id) {
        $data['patient_id'] = $patient_id;
        $this->load->view('reports/add_report', $data);
    }

    function create($patient_id) {
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

    function delete($report_id) {
        $this->report->delete($report_id);
        redirect(base_url() . 'reports', 'refresh');
    }

}

?>