<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Pathology Lab</title>
    </head>
    <body>
        <div>
            <a href="<?php echo base_url() ?>reports">Reports</a> | 
            <a href="<?php echo base_url() ?>patients">Patients</a> |
            <a href="<?php echo base_url() ?>home">Home</a>
        </div>
        <h1>Home</h1>
        <h2>Welcome <?php echo $username; ?>!</h2>
        <a href="home/create_report">Create Report</a>
        <a href="<?php echo base_url(); ?>patients">Patients</a>
        <a href="<?php echo base_url(); ?>logout">Logout</a>
    </body>
</html>
