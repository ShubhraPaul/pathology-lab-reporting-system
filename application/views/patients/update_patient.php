<?php $this->load->view("header_common.php"); ?>
<style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        //background-color: #eee;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }
    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<body>
    <?php $this->load->view("admin_menu.php"); ?>
    <div class="container" style="margin-top: 40px;">
        <form action="<?php echo base_url(); ?>patients/update/<?php echo $patient->id ?>" method="post" class="form-signin">
            <label for="username" class="str">Name:</label>
      <input type="text" class="form-control" id="username" name="patient[username]" value="<?php echo $patient->username; ?>" required/>
    
      <label for="email" class="str">Email:</label>
      <input type="email" class="form-control" id="passowrd" name="patient[email]" value="<?php echo $patient->email; ?>"/>
      
      <label for="phone" class="str">Phone:</label>
      <input type="tel" class="form-control" id="phone" name="patient[phone]" value="<?php echo $patient->phone; ?>"/>
      <br/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
    </form>
    </div>
  </body>
</html>