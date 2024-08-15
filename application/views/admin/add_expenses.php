<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/health/add-department.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:48 GMT -->

<?php include 'includes/head.php' ?>
<!-- Include jQuery and jQuery UI libraries -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Initialize the date picker with month and year dropdowns -->
<script>
    $(function() {
        $("#date").datepicker({
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
                    <h1>Expenses</h1>
                    <small>expenses form</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Expenses</li>
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
                                    <a class="btn btn-success" href="<?= base_url('expnses_list') ?>"> <i class="fa fa-table" aria-hidden="true"></i>
                                        Expnsess table</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // Get current date
                                $current_date = isset($expense['expense_date']) ? $expense['expense_date'] : date('Y-m-d');
                                ?>

                                <form class="col-sm-12" action="<?= isset($expense) ? base_url('ExpenseController/edit/' . $expense['id']) : base_url('ExpenseController/create') ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= isset($expense) ? $expense['id'] : '' ?>">
                                    <div class="col-sm-6 form-group">
                                        <label>Employee ID</label>                                        
                                        <select class="form-control" name="employee_id">
                                            <option value="">Select Employee</option>
                                            <?php if (isset($employees)) : ?>
                                                <?php foreach ($employees as $employee) : ?>
                                                    <option value="<?= $employee->emp_id ?>" <?= set_select('employee_id', $employee->emp_id, isset($expense['employee_id']) && $expense['employee_id'] == $employee->emp_id) ?>>
                                                        <?= $employee->emp_name ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <div class="text-danger"><?= form_error('employee_id') ?></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Amount</label>
                                        <input type="text" step="0.01" class="form-control" placeholder="Enter Amount" name="amount" value="<?= set_value('amount', isset($expense) ? $expense['amount'] : '') ?>">
                                        <div class="text-danger"><?= form_error('amount') ?></div>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter Description" name="description"><?= set_value('description', isset($expense) ? $expense['description'] : '') ?></textarea>
                                        <div class="text-danger"><?= form_error('description') ?></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Expense Date</label>
                                        <input type="date" class="form-control" id="date" placeholder="Enter Expense Date" name="expense_date" value="<?= set_value('expense_date', $current_date) ?>">
                                        <div class="text-danger"><?= form_error('expense_date') ?></div>
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


    <!-- End Core Plugins
        =====================================================================-->
    <!-- Start Theme label Script
        =====================================================================-->
    <!-- Dashboard js -->
    <script src="<?= base_url() ?>assets/dist/js/custom.js" type="text/javascript"></script>
    <!-- End Theme label Script
        =====================================================================-->

</body>

<!-- Mirrored from thememinister.com/health/add-department.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:48 GMT -->

</html>