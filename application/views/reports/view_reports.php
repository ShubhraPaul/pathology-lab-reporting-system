<?php $this->load->view("header_common.php"); ?>
    <style>
        table, th, td {
            border: 1px solid black;
            text-align: center;
           
        }
    </style>
    <body>
        <?php $this->load->view("admin_menu.php"); ?>
        <div class="container" style="margin-top: 40px;">
        <h1>Reports</h1>
        <?php if(isset($patient)){ ?>
        <div><b>Patient Name:</b> <?php echo $patient->username; ?> </div>
        <?php } ?>
        <table style="width:80%;">
            <tr>
                <th>Patient ID</th>
                <th>Created At</th> 
                <th>Actions</th>
            </tr>
            <?php foreach ($reports as $value) { ?>
                <tr>
                    <td style="text-align: center"><a href="<?php echo base_url(); ?>reports/view/<?php echo $value->patient_id; ?>"><?php
                        try {
                            echo $value->patient_id;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></a></td>
                    <td style="text-align: center"><?php
                        try {
                            echo $value->created_at;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></td> 
                    <td style="text-align: center"><a href="<?php echo base_url(); ?>reports/view_report/<?php echo $value->id; ?>">View Detail</a> | <a href="<?php echo base_url(); ?>reports/edit/<?php echo $value->id; ?>">Edit</a> | <a href="<?php echo base_url(); ?>reports/delete/<?php echo $value->id; ?>">Delete</a></td>
                </tr>
            <?php } ?> 
        </table>
        </div>
    </body>
</html>