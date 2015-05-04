<?php

Class User extends CI_Model {

    function login($username, $password) {
        $this->db->select('id, username, password');
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

    /*
     * return all patients
     */

    function all_patients() {
        $query = $this->db->get_where('users', array('type' => '2')); //type 2 is for patients
        return $query->result();
    }
    
    function create_patient($patient) {
        $this->db->insert('users', $patient);
    }
    
    function delete_patient(){
        
    }

}

?>