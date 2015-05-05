<?php

Class User extends CI_Model {

    function login($username, $password) {
        $this->db->select('id, username, password,type');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function create_admin($admin){
        $this->db->insert('users', $admin);
    }
    
    function patient_login($username, $password){
        $this->db->select('id, username, password,email');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();
        $query = $this->db->get_where('users', array('username'=>$username,'password'=>$password,'type' => '2'));
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    /*
     * return all patients
     */

    function all_patients() {
        $query = $this->db->get_where('users', array('type' => '2')); //type 2 is for patients
        return $query->result();
    }
    
    function all_admins() {
        $query = $this->db->get_where('users', array('type' => '1')); //type 2 is for patients
        return $query->result();
    }

    function create_patient($patient) {
        $this->db->insert('users', $patient);
    }

    function get_patient($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->result();
    }

    function update_patient($id, $patient) {
        $this->db->where('id', $id);
        $this->db->update('users', $patient);
    }

    function delete_patient($patient_id) {
        $query = $this->db->get_where('reports', array('patient_id' => $patient_id));
        foreach ($query->result() as $value) {
            $this->db->delete('report_details', array('report_id' => $value->id));
            $this->db->delete('reports', array('id' => $value->id));
        }
        $this->db->delete('users', array('id' => $patient_id));
    }
    
    function get_user_of_report($report_id){
        $report_query = $this->db->get_where('reports', array('id' => $report_id));
        $result = $report_query->result();
        $user_query = $this->db->get_where('users', array('id' => $result[0]->patient_id));
        return $user_query->result();
        
    }

}

?>