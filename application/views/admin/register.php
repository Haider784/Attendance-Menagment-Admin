<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/health/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:53 GMT -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>passets/css/min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php include 'includes/head.php' ?>

<body>
    <!-- Content Wrapper -->

    <!-- <div class="back-link">
            <a href="index-2.html" class="btn btn-success">Back to Dashboard</a>
        </div> -->
    <div class="container-center lg">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-unlock"></i>
                    </div>
                    <div class="header-title">
                        <h3>Register</h3>
                        <small><strong>Please enter your data to register.</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('RegisterController/register_user'); ?>" method="post" id="employeeForm" novalidate enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control <?php echo form_error('first_name') ? 'is-invalid' : ''; ?>" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('first_name'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control <?php echo form_error('last_name') ? 'is-invalid' : ''; ?>" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('last_name'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?php echo set_value('username'); ?>" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('username'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo set_value('email'); ?>" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="department_id">Department</label>
                            <select class="form-control <?php echo form_error('department_id') ? 'is-invalid' : ''; ?>" id="department_id" name="department_id" required>
                                <option disabled selected value="">Select Department</option>
                                <?php foreach ($departments as $department) : ?>
                                    <option value="<?php echo $department->id ?>" <?php echo set_select('department_id', $department->id); ?>>
                                        <?php echo $department->name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error('department_id'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="date_of_joining">Date of Joining</label>
                            <input type="date" class="form-control <?php echo form_error('date_of_joining') ? 'is-invalid' : ''; ?>" id="date_of_joining" name="date_of_joining" value="<?php echo set_value('date_of_joining'); ?>" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('date_of_joining'); ?>
                            </div>
                        </div>


                        <div class="form-group col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?php echo set_value('password'); ?>" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('password'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="retype_password">Retype Password</label>
                            <input type="password" class="form-control <?php echo form_error('retype_password') ? 'is-invalid' : ''; ?>" id="retype_password" name="retype_password" value="<?php echo set_value('retype_password'); ?>" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('retype_password'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="status">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?php echo form_error('status') ? 'is-invalid' : ''; ?>" type="radio" name="status" id="status_active" value="1" <?php echo set_radio('status', 'active', TRUE); ?> required>
                                <label class="form-check-label" for="status_active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?php echo form_error('status') ? 'is-invalid' : ''; ?>" type="radio" name="status" id="status_inactive" value="0" <?php echo set_radio('status', 'inactive'); ?> required>
                                <label class="form-check-label" for="status_inactive">Inactive</label>
                            </div>
                            <div class="invalid-feedback">
                                <?php echo form_error('status'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="image">Upload Image</label>
                            <input type="file" class="form-control <?php echo form_error('image') ? 'is-invalid' : ''; ?>" id="image" name="image" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('image'); ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning">Register</button>
                        <a class="btn btn-primary" href="<?php echo base_url('login') ?>">Login</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- /.content-wrapper -->
    <!-- jQuery -->
    <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
    <!-- bootstrap js -->
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

<!-- Mirrored from thememinister.com/health/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:53 GMT -->

</html>