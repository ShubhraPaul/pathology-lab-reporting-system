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
        <h1>Patients</h1>
        <table style="width:100%;">
            <tr>
                <th>Patient Name</th>
                <th>Email</th> 
                <th>Phone</th>
                <th>Pass Code</th>
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
                    <td><?php
                        try {
                            echo $value->password;
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                        ?></td>
                    <td><a href="<?php echo base_url(); ?>reports/view/<?php echo $value->id; ?>">View</a> | <a href="<?php echo base_url(); ?>reports/add/<?php echo $value->id; ?>">Add</a></td>
                    <td><a href="<?php echo base_url(); ?>patients/edit/<?php echo $value->id; ?>">Edit</a> | <a href="<?php echo base_url(); ?>patients/delete/<?php echo $value->id; ?>">Delete</a> </td>
                </tr>
            <?php } ?> 
        </table>
        </div>
    </body>
</html>