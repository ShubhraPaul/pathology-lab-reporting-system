<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Simple Login with CodeIgniter</title>
  </head>
  <body>
    <h1>Login as lab admin</h1>
    <form action="<?php echo base_url();?>verifylogin/check_database" method="post">
      <label for="username">Username:</label>
      <input type="text" size="20" id="username" name="user[username]" required/>
      <br/>
      <label for="password">Password:</label>
      <input type="password" size="20" id="passowrd" name="user[password]" required/>
      <br/>
      <input type="submit" value="Login"/>
    </form>
    <h1>Login as Patient</h1>
    <form action="<?php echo base_url();?>patients/login" method="post">
      <label for="username">Name:</label>
      <input type="text" size="20" id="username" name="user[username]" required/>
      <br/>
      <label for="password">Pass Code:</label>
      <input type="password" size="20" id="passowrd" name="user[password]" required/>
      <br/>
      <input type="submit" value="Login"/>
    </form>
  </body>
</html>
