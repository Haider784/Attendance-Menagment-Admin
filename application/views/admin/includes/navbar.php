<a href="" class="logo">
    <span class="logo-mini">
        <img src="<?= base_url() ?>assets/dist/img/mini-logo.png" alt="">
    </span>
    <span class="logo-lg">
        <img src="<?= $logoo ?>" alt="">
    </span>
</a>
<nav class="navbar navbar-static-top ">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
        <span class="sr-only">Toggle navigation</span>
        <span class="fa fa-tasks"></span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Orders -->

            <!-- Messages -->

            <!-- Tasks
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="pe-7s-file"></i>
                                <span class="label label-danger">9</span>
                            </a>
                          

                        </li> -->
            <!-- user -->
            <li class="dropdown dropdown-user admin-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="user-image">
                        <img src="<?= base_url() ?>assets/dist/img/avatar4.png" class="img-circle" height="40" width="40" alt="User Image">
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('setting#secondForm') ?>"><i class="fa fa-users"></i> User Profile</a></li>
                    <li><a href="<?= base_url('setting') ?>"><i class="fa fa-gear"></i> Settings</a></li>
                    <li><a href="<?php echo site_url('loginController/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>