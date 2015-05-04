<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Add Patient</title>
  </head>
  <body>
    <h1>Add Patient</h1>
    <form action="<?php echo base_url(); ?>patients/update/<?php echo $patient->id ?>" method="post">
      <label for="username">Name:</label>
      <input type="text" size="30" id="username" name="patient[username]" value="<?php echo $patient->username; ?>" required/>
      <br/>
      <label for="email">Email:</label>
      <input type="email" size="30" id="passowrd" name="patient[email]" value="<?php echo $patient->email; ?>"/>
      <br/>
      <label for="phone">Phone:</label>
      <input type="tel" size="20" id="phone" name="patient[phone]" value="<?php echo $patient->phone; ?>"/>
      <br/>
      <input type="submit" value="Update"/>
    </form>
  </body>
</html>