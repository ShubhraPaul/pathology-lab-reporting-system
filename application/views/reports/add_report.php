<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Report</title>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    </head>
    
    <body>
        <h1>Create Report</h1>
        <form action="<?php echo base_url(); ?>reports/create/<?php echo $patient_id;  ?>" method="post">
            <div id="container">
                <div>report type:</div>
                <input type="text" name="test[0][name]" value="" required/>
                <div>report value:</div>
                <input type="text" name="test[0][measurement]" value="" required/>
                <br/>
            </div>
            <input type="submit" value="submit form" />
        </form>
        <button id="addreports">add mor reports</button>
    </body>
    <script type="text/javascript">
    var counter = 1;
    $('#addreports').click(function (){
        $('#container').append('<div>report type:</div><input type="text" name="test['+counter+'][name]" value="" required/><div>report value:</div><input type="text" name="test['+counter+'][measurement]" value="" required/><br/>');
        counter = counter+1;
    });
    </script>
</html>
