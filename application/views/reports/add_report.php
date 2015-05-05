<?php $this->load->view("header_common.php"); ?>
    <style>
        table, th, td {
            //border: 1px solid black;
            text-align: center;
           
        }
    </style>
    <body>
        <?php $this->load->view("admin_menu.php"); ?>
        <div class="container" style="margin-top: 40px;">
        <h1>Create Report</h1>
        <form action="<?php echo base_url(); ?>reports/create/<?php echo $patient_id; ?>" method="post">
            <table id="container">
                <tr>
                    <th>Test Name</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td><input type="text" name="test[0][name]"  value="" required class="form-control"/></td>
                    <td><input type="number" name="test[0][measurement]" step="any" value="" required class="form-control"/></td>
                </tr>
            </table>
            <div style="margin-top: 5px;" ><input type="button" id="addreports" class="btn btn-xs" value="add test field"/></div>
            
            <div style="margin-top: 42px;"><input type="submit" value="submit Report" class="btn btn-primary"/></div>
        </form>
        
        </div>
    </body>
    <script type="text/javascript">
        var counter = 1;
        $('#addreports').click(function () {
            $('#container').append('<tr><td><input type="text" name="test[' + counter + '][name]" value="" required class="form-control"/></td><td><input type="number" step="any" name="test[' + counter + '][measurement]" value="" required class="form-control"/></td></tr>');
            counter = counter + 1;
        });
    </script>
</html>
