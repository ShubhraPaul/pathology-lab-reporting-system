<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Patients extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user','',TRUE);
  }

  function index()
  {
    $data['patients'] = $this->user->all_patients();
    $this->load->view('patients/view_patients', $data);
    
  }
  
  function view_report($report_id){
      $data['report'] = $this->report->report_details($report_id);
      $this->load->view('reports/view_report', $data);
  }
  
  function add(){
      $this->load->view('patients/add_patient',$data);
  }
  
  function create_patient(){
      $patient = $this->input->post('patient');
      $patient['type'] = '2'; //type for patient 
      $patient['password'] = 'aaaa';
      $this->user->create_patient($patient);
      //unset($this->input->post('patient'));
      redirect(base_url().'patients', 'refresh');
  }
  
  function edit()
  {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('home', 'refresh');
  }
  
  function delete($patient_id){
      $this->user->delete_patient($patient_id);
      redirect(base_url().'patients', 'refresh');
  }
  


}

?>