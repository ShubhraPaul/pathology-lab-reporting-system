<?php

Class Report extends CI_Model {

    function create($patient_id, $created_at) {
        $data = array(
            'patient_id' => $patient_id,
            'created_at' => $created_at
        );
        try {
        $query =  $this->db->insert('reports', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
        return $query;
    }

    function delete($report_id) {
        
    }

}

?>