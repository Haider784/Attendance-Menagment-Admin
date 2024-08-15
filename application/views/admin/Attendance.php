<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from thememinister.com/health/forms_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:46 GMT -->
<style>
    .error-message {
        color: red;
    }
</style>

<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- jQuery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI Library -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>passets/css/bootstrap.min.css">
<?php include 'includes/head.php' ?>
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
                    <h1>Attendance</h1>
                    <small>Attendance form</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Attendance</li>
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
                                    <a class="btn btn-success" href="<?= base_url('attsndance_table') ?>">
                                        <i class="fa fa-table" aria-hidden="true"></i> Attendance table
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!-- <?php if ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-danger">
                                        <?= $this->session->flashdata('error') ?>
                                    </div>
                                <?php endif; ?> -->
                                <?php
                                // Get current date and time
                                $current_date = isset($attendance_item['date']) ? $attendance_item['date'] : date('Y-m-d');
                                $current_time = isset($attendance_item['check_in_time']) ? $attendance_item['check_in_time'] : date('H:i');
                                ?>
                                <form action="<?= isset($attendance_item) ? base_url('AttendanceController/update/' . $attendance_item['id']) : base_url('AttendanceController/create') ?>" method="post" class="col-sm-12" id="attendanceForm">

                                    <div class="col-sm-6 form-group">
                                        <label>Employee</label>
                                        <div class="text-danger"><?= form_error('employee_id') ?></div>
                                        <select class="form-control" name="employee_id">
                                            <option value="">Select Employee</option>
                                            <?php foreach ($employees as $employee) : ?>
                                                <option value="<?= $employee->emp_id ?>" <?= set_select('employee_id', $employee->emp_id, isset($attendance_item['employee_id']) && $attendance_item['employee_id'] == $employee->emp_id) ?>>
                                                    <?= $employee->emp_name ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Date</label>
                                        <div class="text-danger"><?= form_error('date') ?></div>
                                        <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date" value="<?= set_value('date', $current_date) ?>">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Check-in Time</label>
                                        <div class="text-danger"><?= form_error('check_in_time') ?></div>
                                        <input type="time" class="form-control" name="check_in_time" id="checkInTime" value="<?= set_value('check_in_time', isset($attendance_item['check_in_time']) ? $attendance_item['check_in_time'] : $current_time) ?>" <?= isset($attendance_item) && $attendance_item['work_holiday'] == 'leave' ? 'disabled' : '' ?>>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Check-out Time</label>
                                        <div class="text-danger"><?= form_error('check_out_time') ?></div>
                                        <input type="time" class="form-control" placeholder="Enter Check-out Time" name="check_out_time" id="checkOutTime" value="<?= set_value('check_out_time', isset($attendance_item['check_out_time']) ? $attendance_item['check_out_time'] : '') ?>" <?= isset($attendance_item) && $attendance_item['work_holiday'] == 'leave' ? 'disabled' : '' ?>>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="work_holiday">Work Day</label>
                                        <div class="text-danger"><?= form_error('work_holiday') ?></div>
                                        <div class="d-flex">
                                            <div class="radio-inline">
                                                <input class="form-check-input" type="radio" name="work_holiday" id="work_day" value="present" <?= set_radio('work_holiday', 'present', isset($attendance_item['work_holiday']) && $attendance_item['work_holiday'] == 'present') ?> checked>
                                                <label class="form-check-label" for="work_day">Present</label>
                                            </div>
                                            <div class="radio-inline">
                                                <input class="form-check-input" type="radio" name="work_holiday" id="holiday_day" value="absent" <?= set_radio('work_holiday', 'absent', isset($attendance_item['work_holiday']) && $attendance_item['work_holiday'] == 'absent') ?>>
                                                <label class="form-check-label" for="holiday_day">Absent</label>
                                            </div>
                                            <div class="radio-inline">
                                                <input class="form-check-input" type="radio" name="work_holiday" id="leave_day" value="leave" <?= set_radio('work_holiday', 'leave', isset($attendance_item['work_holiday']) && $attendance_item['work_holiday'] == 'leave') ?>>
                                                <label class="form-check-label" for="leave_day">Leave</label>
                                            </div>
                                            <div class="radio-inline">
                                                <input class="form-check-input" type="radio" name="work_holiday" id="holiday" value="holiday" <?= set_radio('work_holiday', 'holiday', isset($attendance_item['work_holiday']) && $attendance_item['work_holiday'] == 'holiday') ?>>
                                                <label class="form-check-label" for="holiday">Holiday</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="status">Status</label>
                                        <div class="text-danger"><?= form_error('status') ?></div>
                                        <div class="d-flex">
                                            <div class="radio-inline">
                                                <input class="form-check-input" type="radio" name="status" id="status_active" value="1" <?= set_radio('status', '1', isset($attendance_item['status']) && $attendance_item['status'] == '1') ?>>
                                                <label class="form-check-label" for="status_active">Active</label>
                                            </div>
                                            <div class="radio-inline">
                                                <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" <?= set_radio('status', '0', isset($attendance_item['status']) && $attendance_item['status'] == '0') ?>>
                                                <label class="form-check-label" for="status_inactive">Inactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 reset-button">
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                                <!-- ajax -->
                                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('#attendanceForm').on('submit', function(e) {
                                            e.preventDefault();

                                            var employee_id = $('select[name="employee_id"]').val();
                                            var date = $('input[name="date"]').val();
                                            var check_in_time = $('input[name="check_in_time"]').val();
                                            var check_out_time = $('input[name="check_out_time"]').val();

                                            $.ajax({
                                                url: '<?= base_url("AttendanceController/check_duplicate_attendance") ?>',
                                                method: 'post',
                                                data: {
                                                    employee_id: employee_id,
                                                    date: date,
                                                    check_in_time: check_in_time,
                                                    check_out_time: check_out_time
                                                },
                                                success: function(response) {
                                                    if (response == 'exists') {
                                                        alert('Attendance record already exists for the specified time range.');
                                                    } else {
                                                        $('#attendanceForm')[0].submit();
                                                    }
                                                }
                                            });
                                        });
                                    });
                                </script> -->

                                <!-- this is the ajax is not work when data is updating -->
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                <!-- <script>
                                    $(document).ready(function() {
                                        // Only bind the submit event with AJAX check if it's a create operation
                                        <?php if (!isset($attendance_item)) : ?>
                                            $('#attendanceForm').on('submit', function(e) {
                                                e.preventDefault();

                                                var employee_id = $('select[name="employee_id"]').val();
                                                var date = $('input[name="date"]').val();
                                                var check_in_time = $('input[name="check_in_time"]').val();
                                                var check_out_time = $('input[name="check_out_time"]').val();

                                                $.ajax({
                                                    url: '<?= base_url("AttendanceController/check_duplicate_attendance") ?>',
                                                    method: 'post',
                                                    data: {
                                                        employee_id: employee_id,
                                                        date: date,
                                                        check_in_time: check_in_time,
                                                        check_out_time: check_out_time
                                                    },
                                                    success: function(response) {
                                                        if (response == 'exists') {
                                                            alert('Attendance record already exists for the specified time range.');
                                                        } else {
                                                            $('#attendanceForm')[0].submit();
                                                        }
                                                    }
                                                });
                                            });
                                        <?php endif; ?>
                                    });
                                </script> -->
                                <script>
                                    $(document).ready(function() {
                                        $('#attendanceForm').on('submit', function(e) {
                                            e.preventDefault();

                                            var employee_id = $('select[name="employee_id"]').val();
                                            var date = $('input[name="date"]').val();
                                            var check_in_time = $('input[name="check_in_time"]').val();
                                            var check_out_time = $('input[name="check_out_time"]').val();

                                            $.ajax({
                                                url: '<?= base_url("AttendanceController/check_duplicate_attendance") ?>',
                                                method: 'post',
                                                data: {
                                                    employee_id: employee_id,
                                                    date: date,
                                                    check_in_time: check_in_time,
                                                    check_out_time: check_out_time
                                                },
                                                success: function(response) {
                                                    if (response == 'exists') {
                                                        toastr.options = {
                                                            closeButton: true,
                                                            progressBar: true,
                                                            showMethod: 'slideDown',
                                                            timeOut: 2000
                                                        };
                                                        toastr.error('Attendance record already exists for the specified time range.');
                                                    } else {
                                                        $('#attendanceForm')[0].submit();
                                                    }
                                                }
                                            });
                                        });
                                    });
                                </script>






                                <script>
                                    document.getElementById('checkInTime').addEventListener('click', function() {
                                        this.showPicker();
                                    });

                                    document.getElementById('checkOutTime').addEventListener('click', function() {
                                        this.showPicker();
                                    });
                                </script>



                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const leaveRadio = document.getElementById('holiday');
                                        const checkInTimeInput = document.getElementById('checkInTime');
                                        const checkOutTimeInput = document.getElementById('checkOutTime');
                                        const statusActiveRadio = document.getElementById('status_active');
                                        const statusInactiveRadio = document.getElementById('status_inactive');

                                        function handleLeaveSelection() {
                                            if (leaveRadio.checked) {
                                                checkInTimeInput.value = '09:00';
                                                checkOutTimeInput.value = '17:00';
                                                checkInTimeInput.disabled = true;
                                                checkOutTimeInput.disabled = true;
                                                statusInactiveRadio.checked = true;
                                                statusActiveRadio.disabled = true;
                                                statusInactiveRadio.disabled = true;
                                            } else {
                                                checkInTimeInput.disabled = false;
                                                checkOutTimeInput.disabled = false;
                                                statusActiveRadio.disabled = false;
                                                statusInactiveRadio.disabled = false;
                                            }
                                        }

                                        leaveRadio.addEventListener('change', handleLeaveSelection);

                                        const workHolidayRadios = document.getElementsByName('work_holiday');
                                        workHolidayRadios.forEach(radio => {
                                            radio.addEventListener('change', handleLeaveSelection);
                                        });

                                        handleLeaveSelection();
                                    });
                                </script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const leaveRadio = document.getElementById('leave_day');
                                        const checkInTimeInput = document.getElementById('checkInTime');
                                        const checkOutTimeInput = document.getElementById('checkOutTime');
                                        const statusActiveRadio = document.getElementById('status_active');
                                        const statusInactiveRadio = document.getElementById('status_inactive');

                                        function handleLeaveSelection() {
                                            if (leaveRadio.checked) {
                                                checkInTimeInput.value = '09:00';
                                                checkOutTimeInput.value = '17:00';
                                                checkInTimeInput.disabled = true;
                                                checkOutTimeInput.disabled = true;
                                                statusInactiveRadio.checked = true;
                                                statusActiveRadio.disabled = true;
                                                statusInactiveRadio.disabled = true;
                                            } else {
                                                checkInTimeInput.disabled = false;
                                                checkOutTimeInput.disabled = false;
                                                statusActiveRadio.disabled = false;
                                                statusInactiveRadio.disabled = false;
                                            }
                                        }

                                        leaveRadio.addEventListener('change', handleLeaveSelection);

                                        const workHolidayRadios = document.getElementsByName('work_holiday');
                                        workHolidayRadios.forEach(radio => {
                                            radio.addEventListener('change', handleLeaveSelection);
                                        });

                                        handleLeaveSelection();
                                    });
                                </script>














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
    <!-- =====================================================================-->
    <?php include 'includes/jslinks.php' ?>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const workHolidayRadio = document.querySelectorAll('input[name="work_holiday"]');
            const checkInTime = document.getElementById('checkInTime');
            const checkOutTime = document.getElementById('checkOutTime');
            const statusActive = document.getElementById('status_active');
            const statusInactive = document.getElementById('status_inactive');

            workHolidayRadio.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (radio.value === 'absent') {
                        checkInTime.disabled = true;
                        checkOutTime.disabled = true;
                        statusActive.disabled = true;
                        statusInactive.disabled = true;
                        statusActive.checked = false;
                        statusInactive.checked = true;
                        checkInTime.value = '00:00';
                        checkOutTime.value = '00:00';
                    } else {
                        checkInTime.disabled = false;
                        checkOutTime.disabled = false;
                        statusActive.disabled = false;
                        statusInactive.disabled = false;
                    }
                });
            });
        });
    </script>
    <style>
        .custom-datepicker {
            background-color: #f9f9f9;
        }
    </style>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "1900:2100", // Adjust the range as needed
                beforeShow: function(input, inst) {
                    $(inst.dpDiv).addClass('custom-datepicker');
                }
            });
        });
    </script>

</body>

<!-- Mirrored from thememinister.com/health/forms_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:46 GMT -->

</html>