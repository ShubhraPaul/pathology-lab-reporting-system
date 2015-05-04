<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Reports</title>
    </head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <body>
        <div>
            <a href="<?php echo base_url() ?>reports">Reports</a> | 
            <a href="<?php echo base_url() ?>patients">Patients</a> |
            <a href="<?php echo base_url() ?>home">Home</a>
        </div>
        <h1>Reports</h1>
        <table style="width:100%;">
            <tr>
                <th>Patient</th>
                <th>Created At</th> 
                <th>Actions</th>
            </tr>
            <?php foreach ($reports as $value) { ?>
                <tr>
                    <td style="text-align: center"><?php
                        try {
                            echo $value->patient_id;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></td>
                    <td style="text-align: center"><?php
                        try {
                            echo $value->created_at;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></td> 
                    <td style="text-align: center"><a href="<?php echo base_url(); ?>reports/view_report/<?php echo $value->id; ?>">View</a> | <a href="">Edit</a> | <a href="<?php echo base_url(); ?>reports/delete/<?php echo $value->id; ?>">Delete</a></td>
                </tr>
            <?php } ?> 
        </table>
    </body>
</html>