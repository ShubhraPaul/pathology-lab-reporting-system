<?php $this->load->view("header_common.php"); ?>
<style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
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
    .form-signin .checkbox {
        font-weight: normal;
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
    <div class="container">
        <form action="<?php echo base_url(); ?>verifylogin/check_database" method="post" class="form-signin">
            <h2 class="form-signin-heading">Admin sign in</h2>
            <label for="username" class="sr-only">Username</label>
            <input type="text" class="form-control"  id="username" name="user[username]" required placeholder="Username"/>
            <br/>
            <label for="password" class="sr-only">Password</label>
            <input type="password" class="form-control"  id="passowrd" name="user[password]" required placeholder="Password"/>
            <br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <?php if (isset($adminloginerror)) { ?>
                <label>Invalid username or password</label>
            <?php } ?>
        </form>
        <form action="<?php echo base_url(); ?>patients/login" method="post" class="form-signin">
            <h2 class="form-signin-heading">Patient sign in</h2>
            <label for="patientusername" class="sr-only">Name</label>
            <input type="text" class="form-control" id="patientusername" name="user[username]" required placeholder="Name"/>
            <br/>
            <label for="password" class="sr-only">Pass Code</label>
            <input type="password" class="form-control" id="passowrd" name="user[password]" required placeholder="Pass Code"/>
            <br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <?php if (isset($patientloginerror)) { ?>
                <label>Invalid username or password</label>
            <?php } ?>
        </form>
    </div>
</body>
<script src="<?php echo $this->config->item('base_directory'); ?>media/jquery-ui/jquery-ui.js"></script>
<script>
    $.ajax({url: base_url + 'api/patients', success: function (result) {
            var names = JSON.parse(result);
            console.log(names.patients);
            $("#patientusername").autocomplete({
                source: names.patients
            });
        }});
</script>
</html>
