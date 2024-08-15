<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from thememinister.com/health/add-schedule.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:49 GMT -->
<?php include 'includes/head.php' ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

            <!-- Initialize the date picker with month and year dropdowns -->
            <script>
                $(function() {
                    $("#start_date").datepicker({
                        dateFormat: "yy-mm-dd", // Change format as needed
                        changeMonth: true,
                        changeYear: true
                    });
                    $("#end_date").datepicker({
                        dateFormat: "yy-mm-dd", // Change format as needed
                        changeMonth: true,
                        changeYear: true
                    });
                });
            </script>
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
                    <h1>Leave</h1>
                    <small>leave form</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Add_leave</li>
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
                                     <a class="btn btn-success" href="<?=base_url('leav_list')?>"> <i class="fa fa-table" aria-hidden="true"></i>
                                     Leaves table</a>
                                 </div>
                            </div>
                            <div class="panel-body">
                                <form class="col-sm-12" action="<?= isset($leave) ? base_url('LeaveController/edit/' . $leave['id']) : base_url('LeaveController/create') ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= isset($leave) ? $leave['id'] : '' ?>">

                                    <div class="col-sm-6 form-group">
                                        <label>Employee</label>
                                        <div class="text-danger"><?= form_error('employee_id') ?></div>
                                        <select class="form-control" name="employee_id">
                                            <option value="">Select Employee</option>
                                            <?php foreach ($employees as $employee) : ?>
                                                <option value="<?= $employee->emp_id ?>" <?= set_select('employee_id',  $employee->emp_id, (isset($leave) && $leave['employee_id'] == $employee->emp_id)) ?>>
                                                    <?= $employee->emp_name ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-6 form-group">
                                        <label>Reason</label>
                                        <textarea class="form-control" rows="2" placeholder="Enter Reason" name="reason"><?= set_value('reason', isset($leave) ? $leave['reason'] : '') ?></textarea>
                                        <div class="text-danger"><?= form_error('reason') ?></div>
                                    </div>

                                    <div class="col-sm-6 form-group">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" placeholder="Enter Start Date" id="start_date" name="start_date" value="<?= set_value('start_date', isset($leave) ? $leave['start_date'] : '') ?>">
                                        <div class="text-danger"><?= form_error('start_date') ?></div>
                                    </div>

                                    <div class="col-sm-6 form-group">
                                        <label>End Date</label>
                                        <input type="date" class="form-control" placeholder="Enter End Date" id="end_date" name="end_date" value="<?= set_value('end_date', isset($leave) ? $leave['end_date'] : '') ?>">
                                        <div class="text-danger"><?= form_error('end_date') ?></div>
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

<!-- Mirrored from thememinister.com/health/add-schedule.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:49 GMT -->

</html>