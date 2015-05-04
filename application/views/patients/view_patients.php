<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Simple Login with CodeIgniter - Private Area</title>
    </head>
    <style>
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
    <body>
        <div>
            <a href="<?php echo base_url() ?>reports">Reports</a> | 
            <a href="<?php echo base_url() ?>patients">Patients</a> |
            <a href="<?php echo base_url() ?>home">Home</a>
        </div>
        <h1>Reports</h1>
        <div><a href="<?php echo base_url(); ?>patients/add">Add Patient</a></div>
        <table style="width:100%;">
            <tr>
                <th>Patient Name</th>
                <th>Email</th> 
                <th>Phone</th>
                <th>Reports</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($patients as $value) { ?>
                <tr>
                    <td><?php
                        try {
                            echo $value->username;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></td>
                    <td><?php
                        try {
                            echo $value->email;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></td>
                    <td><?php
                        try {
                            echo $value->phone;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></td>
                    <td><a href="<?php echo base_url(); ?>reports/view/<?php echo $value->id; ?>">View</a> | <a href="<?php echo base_url(); ?>reports/add/<?php echo $value->id; ?>">Add</a></td>
                    <td><a href="<?php echo base_url(); ?>patients/edit/<?php echo $value->id; ?>">Edit</a> | <a href="<?php echo base_url(); ?>patients/delete/<?php echo $value->id; ?>">Delete</a> </td>
                </tr>
            <?php } ?> 
        </table>
    </body>
</html>