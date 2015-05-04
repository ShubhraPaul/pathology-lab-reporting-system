<?php

Class Report extends CI_Model {
    /*
     * return all reports
     */

    function all() {
        $query = $this->db->get('reports');
        return $query->result();
    }
    
    function patient_reports($patient_id){
        $query = $this->db->get_where('reports', array('patient_id' => $patient_id));
        return $query->result();
    }

    /*
     * return report details
     */

    function report_details($report_id) {
        $query = $this->db->get_where('report_details', array('report_id' => $report_id));
        return $query->result();
    }
    
    function get_report($report_id){
        $query = $this->db->get_where('reports', array('id' => $report_id));
        return $query->result();
    }

    /*
     * create report and return created object 
     */

    function create($patient_id, $created_at) {
        $data = array(
            'patient_id' => $patient_id,
            'created_at' => $created_at
        );
        try {
            $this->db->insert('reports', $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $query = $this->db->get_where('reports', array('patient_id' => $patient_id, 'created_at' => $created_at));
        //var_dump($query->result());
        foreach ($query->result() as $row) {
            $report_result = array(
                'id' => $row->id,
                'createad_at' => $row->created_at
            );
        }
        return $report_result;
    }

    function delete($report_id) {
        $this->db->delete('report_details', array('report_id' => $report_id));
        $this->db->delete('reports', array('id' => $report_id));
    }

    function insert_details($details_object) {
        try {
            $query = $this->db->insert_batch('report_details', $details_object);
            return $query;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

?>