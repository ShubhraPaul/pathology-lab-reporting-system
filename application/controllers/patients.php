<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Patients extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('report', '', TRUE);
        $this->load->library('pdf/fpdf');
        try {
            require_once APPPATH . "/third_party/PHPMailer/PHPMailerAutoload.php";
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function index() {
        $data['patients'] = $this->user->all_patients();
        $this->load->view('patients/view_patients', $data);
    }

    function home() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['reports'] = $this->report->patient_reports($session_data['id']);
            $data['username'] = $session_data['username'];
            $this->load->view('patients/home', $data);
        } else {
            redirect(base_url() . 'login', 'refresh');
        }
    }

    function view_home_report($report_id) {
        $data['report'] = $this->report->report_details($report_id);
        $data['report_id'] = $report_id;
        $this->load->view('patients/home_report_detail', $data);
    }

    function login() {
        $user = $this->input->post('user');
        $result = $this->user->patient_login($user['username'], $user['password']);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'type' => $row->type,
                    'phone' => $row->phone
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }

            redirect(base_url() . 'patients/home', 'refresh');
        } else {
            $this->load->view('login_view');
        }
    }

    function view_report($report_id) {
        $data['report'] = $this->report->report_details($report_id);
        $this->load->view('reports/view_report', $data);
    }

    function add() {
        $this->load->view('patients/add_patient');
    }

    function create_patient() {
        $patient = $this->input->post('patient');
        $patient['type'] = '2'; //type for patient 
        $patient['password'] = $this->generateRandomString(8);
        $this->user->create_patient($patient);
        //unset($this->input->post('patient'));
        redirect(base_url() . 'patients', 'refresh');
    }

    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function edit($id) {
        $patient = $this->user->get_patient($id);
        foreach ($patient as $value) {
            $data['patient'] = $value;
        }
        $this->load->view('patients/update_patient', $data);
    }

    function update($id) {
        $patient = $this->input->post('patient');
        $this->user->update_patient($id, $patient);
        redirect(base_url() . 'patients', 'refresh');
    }

    function delete($patient_id) {
        $this->user->delete_patient($patient_id);
        redirect(base_url() . 'patients', 'refresh');
    }

    function print_report($report_id) {
        $header = array('Test Name', 'Value');
        $report = $this->report->get_report($report_id);
        $date = $report[0]->created_at;
        $data = $this->report->report_details($report_id);
        $report_name_and_value = array();
        foreach ($data as $value) {
            $report_name_and_value[] = array('test_name' => $value->test_name, 'test_value' => $value->test_value);
        }
        $session_data = $this->session->userdata('logged_in');
        $name = $session_data['username'];
        $phone = $session_data['phone'];
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(60, 10, 'Patient Name: ' . $name, 0, 1);
        $pdf->Cell(60, 10, 'Phone: ' . $phone, 0, 1);
        $pdf->Cell(60, 10, 'Date: ' . $date, 0, 1);
        $pdf->Cell(60, 10, 'Report Detail:', 0, 1);
        foreach ($header as $col) {
            $pdf->Cell(40, 7, $col, 1);
        }
        $pdf->Ln();
        // Data
        foreach ($report_name_and_value as $row) {
            foreach ($row as $col)
                $pdf->Cell(40, 6, $col, 1);
            $pdf->Ln();
        }

        $pdf->Output();
    }

    function email_report($report_id) {
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'mudasserajaz@gmail.com';                 // SMTP username
        $mail->Password = 'jhwntqzdxfraaiiv';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->From = 'mudasserajaz@gmail.com';
        $mail->FromName = 'Pathology Lab';
        $mail->addAddress('mudasserajaz@gmail.com', 'Joe User');             // Name is optional
        $mail->addReplyTo('mudasserajaz@gmail.com', 'Information');
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Here is the subject';
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';

        if (!$mail->send()) {
            $data['email_message'] = 'Email Sending Failed. Plese check receipt email is valid or not.';
            $data['report_id'] = $report_id;
            $this->load->view('patients/email_sent.php',$data);
        } else {
            $data['email_message'] = 'Report Sent to your email account.';
            $data['report_id'] = $report_id;
            $this->load->view('patients/email_sent.php',$data);        
        }
    }

}

?>