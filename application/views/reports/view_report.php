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
        <h1>Report Detail</h1>
        <div><a href="<?php echo base_url(); ?>reports">All Reports</a></div>
        <table style="width:100%;">
            <tr>
                <th>Test Name</th>
                <th>Value</th>
            </tr>
            <?php foreach ($report as $value) { ?>
                <tr>
                    <td><?php
                        try {
                            echo $value->test_name;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></td>
                    <td><?php
                        try {
                            echo $value->test_value;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></td> 
                </tr>
            <?php } ?> 
        </table>
    </body>
</html>