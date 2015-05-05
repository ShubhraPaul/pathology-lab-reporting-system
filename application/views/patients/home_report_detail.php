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
        <h1>Report Detail</h1>
        <div><a href="<?php echo base_url(); ?>patients/print_report/<?php echo $report_id; ?>" target="_blank">Export PDF </a> | 
        <a href="<?php echo base_url(); ?>patients/email_report/<?php echo $report_id; ?>"> Email Report</a></div>
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
        </div>
    </body>
</html>