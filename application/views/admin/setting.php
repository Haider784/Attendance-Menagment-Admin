<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php'; ?>
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <?php include 'includes/navbar.php'; ?>
        </header>
        <?php include 'includes/sidebar.php'; ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="header-icon">
                    <i class="pe-7s-note2"></i>
                </div>
                <div class="header-title">
                    <h1>Settings</h1>
                    <small>Set your preferences</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href=""><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </div>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="btn-group">
                                    <a class="btn btn-success" href="">
                                        <i class="fa fa-table" aria-hidden="true"></i> Setting table
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger">
                                        <?= $error; ?>
                                    </div>
                                <?php endif; ?>

                                <form class="col-sm-12" action="<?= base_url('SettingsController/insert'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="col-sm-6 form-group">
                                        <label for="standard_work_time">Standard Work Time (in hours)</label>
                                        <input type="number" class="form-control" id="standard_work_time" placeholder="Enter Standard Work Time" name="standard_work_time" value="<?= set_value('standard_work_time'); ?>">
                                        <div class="text-danger"><?= form_error('standard_work_time'); ?></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="footer_text">Footer Text</label>
                                        <input type="text" class="form-control" id="footer_text" placeholder="Enter Footer Text" name="footer_text" value="<?= set_value('footer_text'); ?>">
                                        <div class="text-danger"><?= form_error('footer_text'); ?></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="footer_con">Footer Contact</label>
                                        <input type="number" class="form-control" id="footer_con" placeholder="Enter Footer Contact" name="footer_con" value="<?= set_value('footer_con'); ?>">
                                        <div class="text-danger"><?= form_error('footer_con'); ?></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="logo">Upload Image</label>
                                        <input type="file" class="form-control" id="logo" name="logo">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="month">Attendance Month</label>
                                        <input type="number" class="form-control" id="month" name="month" placeholder="Enter Month" value="<?php echo set_value('month'); ?>">
                                        <?php echo form_error('month', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-sm-12 reset-button">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="btn-group">
                                    <a class="btn btn-success" href="">
                                        <i class="fa fa-table" aria-hidden="true"></i> Setting table
                                    </a>
                                </div>
                            </div>

                            <div class="panel-body" id="secondForm">
                                <form class="col-sm-12" action="<?= isset($employee) ? base_url('loginController/update/' . $employee->emp_id) : ''; ?>" method="POST" id="employeeForm" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="department">Department</label>
                                            <div class="text-danger"><?= form_error('dep_id'); ?></div>
                                            <select class="form-control" id="department" name="dep_id">
                                                <option disabled selected value="">Select Department</option>
                                                <?php if (isset($departments)) : ?>
                                                    <?php foreach ($departments as $department) : ?>
                                                        <option value="<?= $department->id; ?>" <?= isset($employee) && $employee->dep_id == $department->id ? 'selected' : set_select('dep_id', $department->id); ?>><?= $department->name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_name">Employee Name</label>
                                            <div class="text-danger"><?= form_error('emp_name'); ?></div>
                                            <input type="text" class="form-control" id="emp_name" name="emp_name" value="<?= isset($employee) ? $employee->emp_name : set_value('emp_name'); ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_gardian">Guardian Name</label>
                                            <div class="text-danger"><?= form_error('emp_gardian'); ?></div>
                                            <input type="text" class="form-control" id="emp_gardian" name="emp_gardian" value="<?= isset($employee) ? $employee->emp_gardian : set_value('emp_gardian'); ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_contact">Mobile</label>
                                            <div class="text-danger"><?= form_error('emp_contact'); ?></div>
                                            <input type="text" class="form-control" id="emp_contact" name="emp_contact" value="<?= isset($employee) ? $employee->emp_contact : set_value('emp_contact'); ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_email">Email</label>
                                            <div class="text-danger"><?= form_error('emp_email'); ?></div>
                                            <input type="email" class="form-control" id="emp_email" name="emp_email" value="<?= isset($employee) ? $employee->emp_email : set_value('emp_email'); ?>">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label for="emp_password">Password</label>
                                            <div class="text-danger"><?= form_error('emp_password'); ?></div>
                                            <input type="password" class="form-control" id="emp_password" name="emp_password" value="<?= isset($employee) ? $employee->emp_password : set_value('emp_password'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 reset-button">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-success"><?= isset($employee) ? 'Update' : 'Register'; ?></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/jslinks.php'; ?>
    <script src="<?= base_url('assets/dist/js/custom.js'); ?>" type="text/javascript"></script>
</body>

</html>