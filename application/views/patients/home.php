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
        <h1>Reports</h1>
        <table style="width:100%;">
            <tr>
                <th>Created At</th> 
                <th>Actions</th>
            </tr>
            <?php foreach ($reports as $value) { ?>
                <tr>
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
        </div>
    </body>
</html>