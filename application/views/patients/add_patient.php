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
        
        <form action="<?php echo base_url() ?>patients/create_patient" method="post" class="form-signin">
            <h1>Add Patient</h1>
            <label for="username" class="sr-only">Name:</label>
            <input type="text" id="username" class="form-control" name="patient[username]" required placeholder="name"/>
            <br/>
            <label for="email" class="sr-only">Email:</label>
            <input type="email"  id="passowrd" class="form-control" name="patient[email]" placeholder="email"/>
            <br/>
            <label for="phone" class="sr-only">Phone:</label>
            <input type="tel" id="phone" class="form-control" name="patient[phone]" placeholder="phone"/>
            <br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
        </form>
    </div>
</body>
</html>