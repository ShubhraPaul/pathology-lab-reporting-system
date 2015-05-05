<?php $this->load->view("header_common.php"); ?>
    <style>
        table, th, td {
            border: 1px solid black;
            text-align: center;
           
        }
    </style>
    <body>
        <?php $this->load->view("patients/patient_menu.php"); ?>
        <div class="container" style="margin-top: 40px;">
        <h1><?php echo $email_message; ?></h1>
        </div>
    </body>
</html>