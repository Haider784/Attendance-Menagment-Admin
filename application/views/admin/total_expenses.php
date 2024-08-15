<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/health/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:47 GMT -->

<?php include 'includes/head.php' ?>

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
                    <h1>Total expenses</h1>
                    <small>total_expenses form</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Dashboard</li>
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
                                    <a class="btn btn-primary" href="pt-list.html">
                                        <i class="fa fa-wpforms" aria-hidden="true"></i>
                                        Total Expenses form</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form class="col-sm-12" action="<?= isset($expense) ? base_url('T_expansesController/edit/' . $expense['id']) : base_url('T_expansesController/create') ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= isset($expense) ? $expense['id'] : '' ?>">
                                    <div class="col-sm-6 form-group">
                                        <label>Employee ID</label>
                                        <input type="number" class="form-control" placeholder="Enter Employee ID" name="emp_id" value="<?= set_value('emp_id', isset($expense) ? $expense['emp_id'] : '') ?>">
                                        <div class="text-danger"><?= form_error('emp_id') ?></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Total Expenses</label>
                                        <input type="number" class="form-control" placeholder="Enter Total Expenses" name="t_expenses" value="<?= set_value('t_expenses', isset($expense) ? $expense['t_expans'] : '') ?>">
                                        <div class="text-danger"><?= form_error('t_expenses') ?></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Received Amount</label>
                                        <input type="number" class="form-control" placeholder="Enter Received Amount" name="received" value="<?= set_value('received', isset($expense) ? $expense['received'] : '') ?>">
                                        <div class="text-danger"><?= form_error('received') ?></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Remaining Amount</label>
                                        <input type="number" class="form-control" placeholder="Enter Remaining Amount" name="remaining" value="<?= set_value('remaining', isset($expense) ? $expense['remaning'] : '') ?>" >
                                        <div class="text-danger"><?= form_error('remaining') ?></div>
                                    </div>

                                    <div class="col-sm-12 reset-button">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>





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
    <!-- jQuery -->
    <?php include 'includes/jslinks.php' ?>

    <!-- End Theme label Script
        =====================================================================-->

</body>

<!-- Mirrored from thememinister.com/health/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:47 GMT -->

</html>