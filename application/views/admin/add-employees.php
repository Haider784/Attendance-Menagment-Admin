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
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

            <!-- Initialize the date picker with month and year dropdowns -->
            <script>
                $(function() {
                    $("#dob").datepicker({
                        dateFormat: "yy-mm-dd", // Change format as needed
                        changeMonth: true,
                        changeYear: true
                    });
                    $("#doj").datepicker({
                        dateFormat: "yy-mm-dd", // Change format as needed
                        changeMonth: true,
                        changeYear: true
                    });
                });
            </script>
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
                    <h1>Employees</h1>
                    <small>employees list</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Employees</li>
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
                                    <a class="btn btn-success" href="<?= base_url('employees-list')?>"> <i class="fa fa-table" aria-hidden="true"></i>
                                        Employees table</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form class="col-sm-12" action="<?= isset($employee) ? base_url('EmployeController/update/' . $employee->emp_id) : base_url('EmployeController/create') ?>" method="POST" id="employeeForm" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="department">Department</label>
                                            <div class="text-danger"><?= form_error('dep_id') ?></div>
                                            <select class="form-control" id="department" name="dep_id">
                                                <option disabled selected value="">Select Department</option>
                                                <?php if (isset($departments)) : ?>
                                                    <?php foreach ($departments as $department) : ?>
                                                        <option value="<?= $department->id ?>" <?= isset($employee) && $employee->dep_id == $department->id ? 'selected' : set_select('dep_id', $department->id) ?>><?= $department->name ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_name">Employee Name</label>
                                            <div class="text-danger"><?= form_error('emp_name') ?></div>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name" value="<?= isset($employee) ? $employee->emp_name : set_value('emp_name') ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_gardian">Guardian Name</label>
                                            <div class="text-danger"><?= form_error('emp_gardian') ?></div>
                                            <input type="text" class="form-control" id="emp_gardian" name="emp_gardian" value="<?= isset($employee) ? $employee->emp_gardian : set_value('emp_gardian') ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_contact">Mobile</label>
                                            <div class="text-danger"><?= form_error('emp_contact') ?></div>
                                            <input type="text" class="form-control" id="emp_contact" name="emp_contact" value="<?= isset($employee) ? $employee->emp_contact : set_value('emp_contact') ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_email">Email</label>
                                            <div class="text-danger"><?= form_error('emp_email') ?></div>
                                            <input type="email" class="form-control" id="emp_email" name="emp_email" value="<?= isset($employee) ? $employee->emp_email : set_value('emp_email') ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_password">Password</label>
                                            <div class="text-danger"><?= form_error('emp_password') ?></div>
                                            <input type="password" class="form-control" id="emp_password" name="emp_password" value="<?= isset($employee) ? $employee->emp_password : set_value('emp_password') ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="dob">Date of Birth</label>
                                            <div class="text-danger"><?= form_error('dob') ?></div>
                                            <input type="date" class="form-control" id="dob" name="dob" value="<?= isset($employee) ? $employee->dob : set_value('dob') ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="doj">Date of Joining</label>
                                            <div class="text-danger"><?= form_error('doj') ?></div>
                                            <input type="date" class="form-control" id="doj" name="doj" value="<?= isset($employee) ? $employee->doj : set_value('doj') ?>">
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <label for="basic_salary">Basic Salary</label>
                                            <div class="text-danger"><?= form_error('basic_salary') ?></div>
                                            <input type="text" class="form-control" id="basic_salary" name="basic_salary" value="<?= isset($employee) ? $employee->basic_salary : set_value('basic_salary') ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_gender">Gender</label><br>
                                            <div class="text-danger"><?= form_error('emp_gender') ?></div>
                                            <div>
                                                <input class="form-check-input" type="radio" id="gender_male" name="emp_gender" value="Male" <?= isset($employee) && $employee->emp_gender == 'Male' ? 'checked' : set_radio('emp_gender', 'Male') ?>>
                                                <label class="form-check-label" for="gender_male">Male</label>
                                            </div>
                                            <div>
                                                <input class="form-check-input" type="radio" id="gender_female" name="emp_gender" value="Female" <?= isset($employee) && $employee->emp_gender == 'Female' ? 'checked' : set_radio('emp_gender', 'Female') ?>>
                                                <label class="form-check-label" for="gender_female">Female</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_image">Upload Image</label>
                                            <div class="text-danger"><?= form_error('emp_image') ?></div>
                                            <input type="file" class="form-control" id="emp_image" name="emp_image">
                                            <?php if (isset($employee) && $employee->emp_image) : ?>
                                                <img src="<?= base_url() . '/uploads/' . $employee->emp_image ?>" width="100px" alt="Employee Image">
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_address">Address</label>
                                            <div class="text-danger"><?= form_error('emp_address') ?></div>
                                            <textarea class="form-control" id="emp_address" name="emp_address" rows="2"><?= isset($employee) ? $employee->emp_address : set_value('emp_address') ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 reset-button">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-success"><?= isset($employee) ? 'Update' : 'Register' ?></button>
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
    <!-- jQuery --> <?php include 'includes/jslinks.php' ?>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dobField = document.getElementById('dob');
            const dojField = document.getElementById('doj');
            const form = document.getElementById('employeeForm');

            form.addEventListener('submit', function(e) {
                const dob = new Date(dobField.value);
                const doj = new Date(dojField.value);
                const currentDate = new Date();

                const dobAge = currentDate.getFullYear() - dob.getFullYear();
                const dojAge = dob.getFullYear() - doj.getFullYear();

                if (dobAge < 20) {
                    alert('The Date of Birth must be at least 20 years ago.');
                    e.preventDefault();
                    return;
                }

                if (dojAge < 20) {
                    alert('The Date of Joining must be at least 20 years from the Date of Birth.');
                    e.preventDefault();
                    return;
                }
            });
        });
    </script> -->

</body>

<!-- Mirrored from thememinister.com/health/add-patient.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:47 GMT -->

</html>