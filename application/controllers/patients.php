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
        $this->check_auth();
        $data['patients'] = $this->user->all_patients();
        $this->load->view('patients/view_patients', $data);
    }

    function home() {
        $this->check_patient_auth();
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
        $this->check_patient_auth();
        $session_data = $this->session->userdata('logged_in');
        $data['report'] = $this->report->report_details($report_id);
        $data['report_id'] = $report_id;
        $data['username'] = $session_data['username'];
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
                    'phone' => $row->phone,
                    'email' => $row->email
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }

            redirect(base_url() . 'patients/home', 'refresh');
        } else {
            $data['patientloginerror'] = 'Invalid username or password';
            $this->load->view('login_view', $data);
        }
    }

    function view_report($report_id) {
        $this->check_auth();
        $data['report'] = $this->report->report_details($report_id);
        $this->load->view('reports/view_report', $data);
    }

    function add() {
        $this->check_auth();
        $this->load->view('patients/add_patient');
    }

    function create_patient() {
        $this->check_auth();
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
        $this->check_auth();
        $patient = $this->user->get_patient($id);
        foreach ($patient as $value) {
            $data['patient'] = $value;
        }
        $this->load->view('patients/update_patient', $data);
    }

    function update($id) {
        $this->check_auth();
        $patient = $this->input->post('patient');
        $this->user->update_patient($id, $patient);
        redirect(base_url() . 'patients', 'refresh');
    }

    function delete($patient_id) {
        $this->check_auth();
        $this->user->delete_patient($patient_id);
        redirect(base_url() . 'patients', 'refresh');
    }

    function print_report($report_id) {
        $header = array('Test Name', 'Value');
        $report = $this->report->get_report($report_id);
        $date = $report[0]->created_at;
        $data = $this->report->report_details($report_id);
        $user = $this->user->get_user_of_report($report_id);
        $report_name_and_value = array();
        foreach ($data as $value) {
            $report_name_and_value[] = array('test_name' => $value->test_name, 'test_value' => $value->test_value);
        }
        //$session_data = $this->session->userdata('logged_in');
        $name = $user[0]->username;
        $phone = $user[0]->phone;
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
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'pathologylabtest@gmail.com';                 // SMTP username
        $mail->Password = 'mxidkswqicnhzopd';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->From = 'mudasserajaz@gmail.com';
        $mail->FromName = 'Pathology Lab';
        $mail->addAddress($session_data['email'], $session_data['username']);
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Lab Report';
        $mail->Body = $this->mail_body($report_id);

        if (!$mail->send()) {
            $data['email_message'] = 'Email Sending Failed. Plese check receipt email is valid or not.';
            $data['report_id'] = $report_id;
            $this->load->view('patients/email_sent', $data);
        } else {
            $data['email_message'] = 'Report Sent to your email account.';
            $data['report_id'] = $report_id;
            $this->load->view('patients/email_sent', $data);
        }
    }

    function mail_body($report_id) {
        $session_data = $this->session->userdata('logged_in');
        $report = $this->report->get_report($report_id);
        $report_detail = $this->report->report_details($report_id);
        $mail_body = '<div>Patient Name: ' . $session_data['username'] . '</div><br/><div>Phone:' . $session_data['phone'] . '</div><br/>';
        $mail_body .= '<div>Date:' . $report[0]->created_at . '</div><br/>';
        $mail_body .= '<table style="width:100%; border: 1px solid black; text-align: center;"><tr style="width:100%; border: 1px solid black; text-align: center;"><th style="border: 1px solid black; text-align: center;">Test Name</th><th style=" border: 1px solid black; text-align: center;">Value</th></tr>';
        foreach ($report_detail as $value) {
            $mail_body .= '<tr style="border: 1px solid black; text-align: center;"><td style="border: 1px solid black; text-align: center;">' . $value->test_name . '</td><td style="border: 1px solid black; text-align: center;">' . $value->test_value . '</td></tr>';
        }
        $mail_body .= '</table> <br/>';
        $mail_body .= '<div><a href="' . base_url() . 'patients/print_report/' . $report_id . '">Download your report from this link</a></div>';
        return $mail_body;
    }

    function forbidden() {
        $this->load->view('forbidden');
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
    
    function check_patient_auth(){
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            if ($session_data['type'] == '1') {
                redirect(base_url() . 'patients/forbidden', 'refresh');
            }
        } else {
            redirect(base_url() . 'login', 'refresh');
        }
    }

}

?>