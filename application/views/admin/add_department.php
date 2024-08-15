<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/health/add-payment.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:49 GMT -->
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

<!-- jQuery (Required by Toastr) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- <style>
    .error-toast {
        font-family: 'Alegreya Sans', sans-serif;
        background-color: #E5343D;
        color: #FFFFFF;
        border-radius: 3px;
        padding: 15px 15px 15px 50px;
        margin-bottom: 10px;
        position: relative;
        width: 300px;
        box-shadow: 0 0 12px #999999;
        overflow: hidden;
    }

    .error-toast-title {
        font-weight: 400;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .error-toast-message {
        word-wrap: break-word;
    }

    .error-toast a,
    .error-toast label {
        color: #FFFFFF;
    }

    .error-toast a:hover {
        color: #CCCCCC;
        text-decoration: none;
    }

    .error-toast-close-button {
        position: absolute;
        top: 12px;
        right: 12px;
        font-size: 20px;
        font-weight: bold;
        color: #FFFFFF;
        opacity: 0.8;
        cursor: pointer;
    }

    .error-toast-close-button:hover,
    .error-toast-close-button:focus {
        opacity: 0.4;
        color: #000000;
    }

    .error-toast-progress {
        position: absolute;
        left: 0;
        bottom: 0;
        height: 4px;
        background-color: #000000;
        opacity: 0.4;
    }

    #error-toast-container {
        position: fixed;
        z-index: 999999;
        pointer-events: none;
        top: 12px;
        right: 12px;
        width: 300px;
    }
</style> -->
<?php include 'includes/head.php' ?>
<style>
    .error-message {
        color: red;
    }
</style>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">

            <!-- Header Navbar -->
            <?php include 'includes/navbar.php' ?>

        </header>
        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <?php include 'includes/sidebar.php' ?>


        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="header-icon">
                    <i class="pe-7s-note2"></i>
                </div>
                <div class="header-title">
                    <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <h1>Departments</h1>
                    <small>departments form</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href=""><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">departments</li>
                    </ol>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- Form controls -->
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">

                                <div class="btn-group">
                                    <a class="btn btn-success" href="<?= base_url('department_list') ?>"> <i class="fa fa-table" aria-hidden="true"></i>
                                        </i> Department table</a>
                                </div>
                            </div>
                            <div class="panel-body">

                                <form class="col-sm-12" action="<?= isset($department) ? base_url('DepartmentController/update/' . $department['id']) : base_url('DepartmentController/create') ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= isset($department) ? $department['id'] : '' ?>">
                                    <div class="col-sm-6 form-group">
                                        <label>Add Department</label>
                                        <div class="text-danger"><?= form_error('name') ?></div>
                                        <input type="text" class="form-control" placeholder="Enter Department Name" name="name" value="<?= set_value('name', isset($department) ? $department['name'] : '') ?>">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>HR Name</label>
                                        <div class="text-danger"><?= form_error('hr') ?></div>
                                        <input type="text" class="form-control" placeholder="Enter Department Name" name="hr" value="<?= set_value('hr', isset($department) ? $department['hr'] : '') ?>">
                                    </div>
                                    <div class="col-sm-12 reset-button">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                                <!-- <div id="error-toast-container">
                                    <div class="error-toast">
                                        <span class="error-toast-title">Error</span>
                                        <span class="error-toast-message">Something went wrong. Please try again later.</span>
                                        <button class="error-toast-close-button">&times;</button>
                                        <div class="error-toast-progress"></div>
                                    </div>
                                </div> -->



                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- /.content -->
        </div> <!-- /.content-wrapper -->
        <?php include 'includes/footer.php' ?>

    </div> <!-- ./wrapper -->
    <!-- Start Core Plugins
        =====================================================================-->
    <?php include 'includes/jslinks.php' ?>


    <!-- End Core Plugins
        =====================================================================-->
    <!-- Start Theme label Script
        =====================================================================-->
    <!-- Dashboard js -->
    <script src="<?= base_url() ?><?= base_url() ?>assets/dist/js/custom.js" type="text/javascript"></script>
    <!-- End Theme label Script
        =====================================================================-->

</body>

<!-- Mirrored from thememinister.com/health/add-payment.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:49 GMT -->

</html>