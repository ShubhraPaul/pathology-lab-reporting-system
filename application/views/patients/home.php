<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Pathology Lab</title>
    </head>
    <body>
        <a href="<?php echo base_url(); ?>logout">Logout</a>
        <h1>Home</h1>
        <h2>Welcome <?php echo $username; ?>!</h2>
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
                    <td style="text-align: center"><a href="<?php echo base_url(); ?>patients/view_home_report/<?php echo $value->id; ?>">View</a></td>
                </tr>
            <?php } ?> 
        </table>
    </body>
</html>