<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Pathology Lab </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a  href="<?php echo base_url() ?>reports">Reports</a></li>
                <li><a href="<?php echo base_url() ?>patients">Patients</a></li>
                <li><a href="<?php echo base_url() ?>patients/add">Add Patient</a></li>
                <li><a href="<?php echo base_url() ?>admins">Admins</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>