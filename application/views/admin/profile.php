<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from thememinister.com/health/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:46 GMT -->
<?= include 'includes/head.php'; ?>
<style>
    .table-responsive {
        height: 400px;
        /* Adjust the height as needed */
        overflow-y: auto;
    }

    #attendanceTable thead th {
        position: sticky;
        top: 0;
        background-color: #fff;
        /* Optional: Set background color for the header */
        z-index: 1;
        /* Ensure the header is above the table rows */
    }
</style>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <?= include 'includes/navbar.php' ?>
        </header>
        <?= include 'includes/sidebar.php' ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="header-icon"><i class="pe-7s-user-female"></i></div>
                <div class="header-title">
                    <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <h1>Profile</h1>
                    <small>Show user data in clear profile design</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index-2.html"><i class="pe-7s-home"></i>Home</a></li>
                        <li><a href="#">UI Elements</a></li>
                        <li class="active">Profile</li>
                    </ol>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <?php if (!empty($employees)) :  ?>
                                <div class="card-header">
                                    <img src="<?= base_url('uploads/' . $employees->emp_image); ?>" alt="Employee Image" style="width: 200px; height: 200px; border-radius: 50%;">
                                </div>
                                <div class="card">
                                    <?php if (!empty($employees)) : ?>
                                        <div class="card-body rounded">
                                            <div class="card-content-languages">
                                                <div class="card-content-languages-group">
                                                    <div>
                                                        <h4>Name :</h4>
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li>
                                                                <h4 class="m-t-0"><?php echo $employees->emp_name; ?></h4>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content-languages-group">
                                                    <div>
                                                        <h4>Location :</h4>
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li>
                                                                <?php echo $employees->emp_address; ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content-languages-group">
                                                    <div>
                                                        <h4>Speaks:</h4>
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li>English
                                                                <div class="fluency fluency-4"></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content-languages-group">
                                                    <div>
                                                        <h4>Gender:</h4>
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li><?php echo $employees->emp_gender; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content-languages-group">
                                                    <div>
                                                        <h4>Contact :</h4>
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li><?php echo $employees->emp_contact; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content-languages-group">
                                                    <div>
                                                        <h4>Email :</h4>
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li><?php echo $employees->emp_email; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content-languages-group">
                                                    <div>
                                                        <h4>Password :</h4>
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li><?php echo $employees->emp_password; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content-languages-group">
                                                    <div>
                                                        <h4>Salary :</h4>
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            <li><?php echo $employees->basic_salary; ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="card-body">
                                            <p>No employees found</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php else : ?>
                                <tr>
                                    <td colspan="11">No employees found</td>
                                </tr>
                            <?php endif; ?>
                        </div>
                    </div>
            </section>
            <div class="review-block">
                <!-- <div class="table-responsive">

                    <table id="attendanceTable" class="table table-bordered table-hover">
                        <thead class="success">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Total Check-in Time</th>
                                <th>Total Check-out Time</th>
                                <th>Work Holiday</th>
                                <th>Total Work Time</th>
                                <th>Missing Time</th>
                                <th>Overtime</th>
                                <th>Total Missing Time (in minutes)</th>
                                <th>Total Work Time (in minutes)</th>
                                <th>Overtime (in minutes)</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php if (!empty($attendance)) : ?>
                                <?php
                                $totalWorkMinutesAllDays = 0;
                                $totalMissingMinutesAllDays = 0;
                                $totalOvertimeMinutesAllDays = 0;
                                $totalPresentWorkMinutesAllDays = 0; // New variable for total work minutes on present days
                                $basic_salary = $employees->basic_salary;
                                $pay_per_minute = (((int) $basic_salary / 30) / $this->Settings_model->get_standard_work_time()) / 60;
                                $groupedAttendance = [];

                                foreach ($attendance as $record) {
                                    $key = $record->employee_id . '_' . $record->date;
                                    if (!isset($groupedAttendance[$key])) {
                                        $groupedAttendance[$key] = [
                                            'employee_id' => $record->employee_id,
                                            'date' => $record->date,
                                            'work_holiday' => $record->work_holiday,
                                            'total_check_in_time' => $record->work_holiday != 'absent' ? new DateTime($record->check_in_time) : null,
                                            'total_check_out_time' => $record->work_holiday != 'absent' ? new DateTime($record->check_out_time) : null,
                                            'total_work_minutes' => 0
                                        ];
                                    } else {
                                        if ($record->work_holiday != 'absent') {
                                            $groupedAttendance[$key]['total_check_in_time'] = min($groupedAttendance[$key]['total_check_in_time'], new DateTime($record->check_in_time));
                                            $groupedAttendance[$key]['total_check_out_time'] = max($groupedAttendance[$key]['total_check_out_time'], new DateTime($record->check_out_time));
                                        }
                                    }

                                    if ($record->work_holiday != 'absent') {
                                        $check_in = new DateTime($record->check_in_time);
                                        $check_out = new DateTime($record->check_out_time);
                                        $work_time = $check_in->diff($check_out);
                                        $groupedAttendance[$key]['total_work_minutes'] += $work_time->h * 60 + $work_time->i;

                                        // Sum up the total work minutes for present days (excluding holidays and leaves)
                                        if ($record->work_holiday == 'present') {
                                            $totalPresentWorkMinutesAllDays += $work_time->h * 60 + $work_time->i;
                                        }
                                    } elseif ($record->work_holiday == 'holiday' || $record->work_holiday == 'leave') {
                                        // Assuming full workday credit for holidays and leaves
                                        $groupedAttendance[$key]['total_work_minutes'] += $this->Settings_model->get_standard_work_time() * 60; // 8 hours in minutes
                                    }
                                }

                                $i = 1;
                                foreach ($groupedAttendance as $record) :
                                    $total_work_hours = $record['work_holiday'] != 'absent' ? intdiv($record['total_work_minutes'], 60) : 0;
                                    $total_work_minutes = $record['work_holiday'] != 'absent' ? $record['total_work_minutes'] % 60 : 0;
                                    $this->load->model('Settings_model');
                                    $standard_minutes = $this->Settings_model->get_standard_work_time() * 60;
                                    // Calculate missing time
                                    $missing_minutes = $record['work_holiday'] != 'absent' ? max(0, $standard_minutes - $record['total_work_minutes']) : 0;

                                    // Calculate overtime
                                    $overtime_minutes = $record['work_holiday'] != 'absent' ? max(0, $record['total_work_minutes'] - $standard_minutes) : 0;

                                    // Sum up the total minutes for all days (excluding absent days)
                                    if ($record['work_holiday'] != 'absent') {
                                        $totalWorkMinutesAllDays += $record['total_work_minutes'];
                                        $totalMissingMinutesAllDays += $missing_minutes;
                                        $totalOvertimeMinutesAllDays += $overtime_minutes;
                                    }

                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $record['date']; ?></td>
                                        <td><?php echo $record['work_holiday'] != 'absent' ? $record['total_check_in_time']->format('h:i A') : '-'; ?></td>
                                        <td><?php echo $record['work_holiday'] != 'absent' ? $record['total_check_out_time']->format('h:i A') : '-'; ?></td>
                                        <td><?php echo $record['work_holiday']; ?></td>
                                        <td>
                                            <?php
                                            if ($record['work_holiday'] != 'absent') {
                                                echo $total_work_hours > 0 ? sprintf('%02d:%02d', $total_work_hours, $total_work_minutes) : sprintf('%02d', $total_work_minutes) . ' minutes';
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($record['work_holiday'] != 'absent' && $missing_minutes > 0) {
                                                echo intdiv($missing_minutes, 60) > 0 ? sprintf('%02d:%02d', intdiv($missing_minutes, 60), $missing_minutes % 60) : sprintf('%02d', $missing_minutes) . ' minutes';
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($record['work_holiday'] != 'absent' && $overtime_minutes > 0) {
                                                echo intdiv($overtime_minutes, 60) > 0 ? sprintf('%02d:%02d', intdiv($overtime_minutes, 60), $overtime_minutes % 60) : sprintf('%02d', $overtime_minutes) . ' minutes';
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $record['work_holiday'] != 'absent' && $missing_minutes > 0 ? $missing_minutes : '-'; ?></td>
                                        <td><?php echo $record['work_holiday'] != 'absent' ? $record['total_work_minutes'] : '-'; ?></td>
                                        <td><?php echo $record['work_holiday'] != 'absent' && $overtime_minutes > 0 ? $overtime_minutes : '-'; ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="11">No attendance records found for the current month</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table> -->
                <div class="review-block">
                    <div class="table-responsive">

                        <table id="attendanceTable" class="table table-bordered table-hover">
                            <thead class="success">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Total Check-in Time</th>
                                    <th>Total Check-out Time</th>
                                    <th>Work Holiday</th>
                                    <th>Total Work Time</th>
                                    <th>Missing Time</th>
                                    <th>Overtime</th>
                                    <th>Total Missing Time (in minutes)</th>
                                    <th>Total Work Time (in minutes)</th>
                                    <th>Overtime (in minutes)</th>
                                    <th>Default Time (in minutes)</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php if (!empty($attendance)) : ?>
                                    <?php
                                    $totalWorkMinutesAllDays = 0;
                                    $totalMissingMinutesAllDays = 0;
                                    $totalOvertimeMinutesAllDays = 0;
                                    $totalPresentWorkMinutesAllDays = 0; // New variable for total work minutes on present days
                                    $basic_salary = $employees->basic_salary;
                                    $pay_per_minute = (((int) $basic_salary / 30) / $this->Settings_model->get_standard_work_time()) / 60;
                                    $groupedAttendance = [];
                                    $default_time = $this->Settings_model->get_standard_work_time() * 60; // Default time in minutes

                                    foreach ($attendance as $record) {
                                        $key = $record->employee_id . '_' . $record->date;
                                        if (!isset($groupedAttendance[$key])) {
                                            $groupedAttendance[$key] = [
                                                'employee_id' => $record->employee_id,
                                                'date' => $record->date,
                                                'work_holiday' => $record->work_holiday,
                                                'total_check_in_time' => $record->work_holiday != 'absent' ? new DateTime($record->check_in_time) : null,
                                                'total_check_out_time' => $record->work_holiday != 'absent' ? new DateTime($record->check_out_time) : null,
                                                'total_work_minutes' => 0
                                            ];
                                        } else {
                                            if ($record->work_holiday != 'absent') {
                                                $groupedAttendance[$key]['total_check_in_time'] = min($groupedAttendance[$key]['total_check_in_time'], new DateTime($record->check_in_time));
                                                $groupedAttendance[$key]['total_check_out_time'] = max($groupedAttendance[$key]['total_check_out_time'], new DateTime($record->check_out_time));
                                            }
                                        }

                                        if ($record->work_holiday != 'absent') {
                                            $check_in = new DateTime($record->check_in_time);
                                            $check_out = new DateTime($record->check_out_time);
                                            $work_time = $check_in->diff($check_out);
                                            $groupedAttendance[$key]['total_work_minutes'] += $work_time->h * 60 + $work_time->i;

                                            if ($record->work_holiday == 'present') {
                                                $totalPresentWorkMinutesAllDays += $work_time->h * 60 + $work_time->i;
                                            }
                                        } elseif ($record->work_holiday == 'holiday' || $record->work_holiday == 'leave') {
                                            $groupedAttendance[$key]['total_work_minutes'] += $this->Settings_model->get_standard_work_time() * 60; // 8 hours in minutes
                                        }
                                    }

                                    // Sort the grouped attendance by date
                                    usort($groupedAttendance, function ($a, $b) {
                                        return strtotime($a['date']) - strtotime($b['date']);
                                    });

                                    $i = 1;
                                    foreach ($groupedAttendance as $record) :
                                        $total_work_hours = $record['work_holiday'] != 'absent' ? intdiv($record['total_work_minutes'], 60) : 0;
                                        $total_work_minutes = $record['work_holiday'] != 'absent' ? $record['total_work_minutes'] % 60 : 0;
                                        $this->load->model('Settings_model');
                                        $standard_minutes = $this->Settings_model->get_standard_work_time() * 60;
                                        $missing_minutes = $record['work_holiday'] != 'absent' ? max(0, $standard_minutes - $record['total_work_minutes']) : 0;

                                        $overtime_minutes = $record['work_holiday'] != 'absent' ? max(0, $record['total_work_minutes'] - $standard_minutes) : 0;

                                        if ($record['work_holiday'] != 'absent') {
                                            $totalWorkMinutesAllDays += $record['total_work_minutes'];
                                            $totalMissingMinutesAllDays += $missing_minutes;
                                            $totalOvertimeMinutesAllDays += $overtime_minutes;
                                        }

                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $record['date']; ?></td>
                                            <td><?php echo $record['work_holiday'] != 'absent' ? $record['total_check_in_time']->format('h:i A') : '-'; ?></td>
                                            <td><?php echo $record['work_holiday'] != 'absent' ? $record['total_check_out_time']->format('h:i A') : '-'; ?></td>
                                            <td><?php echo $record['work_holiday']; ?></td>
                                            <td>
                                                <?php
                                                if ($record['work_holiday'] != 'absent') {
                                                    echo $total_work_hours > 0 ? sprintf('%02d:%02d', $total_work_hours, $total_work_minutes) : sprintf('%02d', $total_work_minutes) . ' minutes';
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($record['work_holiday'] != 'absent' && $missing_minutes > 0) {
                                                    echo intdiv($missing_minutes, 60) > 0 ? sprintf('%02d:%02d', intdiv($missing_minutes, 60), $missing_minutes % 60) : sprintf('%02d', $missing_minutes) . ' minutes';
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($record['work_holiday'] != 'absent' && $overtime_minutes > 0) {
                                                    echo intdiv($overtime_minutes, 60) > 0 ? sprintf('%02d:%02d', intdiv($overtime_minutes, 60), $overtime_minutes % 60) : sprintf('%02d', $overtime_minutes) . ' minutes';
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $record['work_holiday'] != 'absent' && $missing_minutes > 0 ? $missing_minutes : '-'; ?></td>
                                            <td><?php echo $record['work_holiday'] != 'absent' ? $record['total_work_minutes'] : '-'; ?></td>
                                            <td><?php echo $record['work_holiday'] != 'absent' && $overtime_minutes > 0 ? $overtime_minutes : '-'; ?></td>
                                            <td><?php echo $default_time; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="12">No attendance records found for this current month</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="review-block">
                <table id="totalsTable" class="table table-bordered table-hover">
                    <thead class="success">
                        <tr>
                            <th>Total Present Days Work Time</th>
                            <th>Total Work Time</th>
                            <th>Total Missing Time</th>
                            <th>Total Overtime</th>
                            <th>Total Work Time (in minutes)</th>
                            <th>Total Missing Time (in minutes)</th>
                            <th>Total Overtime (in minutes)</th>
                            <th>Total Work Time (in minutes) - Missing Time (in minutes)</th>
                            <th>Deduct Salary</th>
                            <th>Total Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($totalPresentWorkMinutesAllDays) || !empty($totalWorkMinutesAllDays) || !empty($totalMissingMinutesAllDays) || !empty($totalOvertimeMinutesAllDays)) : ?>
                            <tr>
                                <td>
                                    <?php
                                    echo intdiv($totalPresentWorkMinutesAllDays, 60) > 0 ? intdiv($totalPresentWorkMinutesAllDays, 60) . ' : ' . sprintf('%02d', $totalPresentWorkMinutesAllDays % 60) : sprintf('%02d', $totalPresentWorkMinutesAllDays % 60) . ' minutes';
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo intdiv($totalWorkMinutesAllDays, 60) > 0 ? intdiv($totalWorkMinutesAllDays, 60) . ' : ' . sprintf('%02d', $totalWorkMinutesAllDays % 60) : sprintf('%02d', $totalWorkMinutesAllDays % 60) . ' minutes';
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo intdiv($totalMissingMinutesAllDays, 60) > 0 ? intdiv($totalMissingMinutesAllDays, 60) . ' : ' . sprintf('%02d', $totalMissingMinutesAllDays % 60) : sprintf('%02d', $totalMissingMinutesAllDays % 60) . ' minutes';
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo intdiv($totalOvertimeMinutesAllDays, 60) > 0 ? intdiv($totalOvertimeMinutesAllDays, 60) . ' : ' . sprintf('%02d', $totalOvertimeMinutesAllDays % 60) : sprintf('%02d', $totalOvertimeMinutesAllDays % 60) . ' minutes';
                                    ?>
                                </td>
                                <td><?php echo $totalWorkMinutesAllDays; ?></td>
                                <td><?php echo $totalMissingMinutesAllDays; ?></td>
                                <td><?php echo $totalOvertimeMinutesAllDays; ?></td>
                                <td><?php echo $totalWorkMinutesAllDays - $totalMissingMinutesAllDays; ?></td>
                                <td>
                                    <?php
                                    $remaining_minutes = $totalMissingMinutesAllDays - $totalOvertimeMinutesAllDays;
                                    $salary = round($remaining_minutes * $pay_per_minute);
                                    echo "  " . ($salary >= 15000 ? $salary :  $salary);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $remaining_minutes = $totalWorkMinutesAllDays - $totalMissingMinutesAllDays;
                                    $salary = round($totalWorkMinutesAllDays * $pay_per_minute);
                                    echo ($salary >= 15000 ? $salary : $salary);
                                    ?>
                                </td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td colspan="10" class="text-center">
                                    <p>No data available to display.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <?= include 'includes/jslinks.php' ?>
</body>

</html>