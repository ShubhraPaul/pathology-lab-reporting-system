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
        <h1>Admins</h1>
        <div><a href="<?php echo base_url(); ?>admins/add" class="btn btn-primary"> Add Admin</a></div>
        <table style="width:100%;">
            <tr>
                <th>username</th>
                <th>Email</th> 
                <th>Phone</th>
            </tr>
            <?php foreach ($admins as $value) { ?>
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
                </tr>
            <?php } ?> 
        </table>
        </div>
    </body>
</html>