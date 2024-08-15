<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image pull-left">
                <img src="<?=base_url()?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <h4>Welcome</h4>
                <p>Mr. Ali</p>
            </div>
        </div>

        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <?php
            $current_url = current_url();
            $base_url = base_url();
            function is_active($url, $current_url, $base_url)
            {
                return $current_url === $base_url . $url ? 'active' : '';
            }
            ?>
            <li class="<?= is_active('index', $current_url, $base_url) ?>">
                <a href="<?= base_url('index') ?>"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?= is_active('add_department', $current_url, $base_url) || is_active('department_list', $current_url, $base_url) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-building-o" aria-hidden="true"></i><span>Departments</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= is_active('add_department', $current_url, $base_url) ?>"><a href="<?= base_url('add_department') ?>">Add departments</a></li>
                    <li class="<?= is_active('department_list', $current_url, $base_url) ?>"><a href="<?= base_url('department_list') ?>">departments list</a></li>
                </ul>
            </li>
            <li class="treeview <?= is_active('add-employees', $current_url, $base_url) || is_active('employees-list', $current_url, $base_url) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-user"></i><span>Employees</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= is_active('add-employees', $current_url, $base_url) ?>"><a href="<?= base_url('add-employees') ?>">Add Employees</a></li>
                    <li class="<?= is_active('employees-list', $current_url, $base_url) ?>"><a href="<?= base_url('employees-list') ?>">Employees list</a></li>
                </ul>
            </li>
            <li class="treeview <?= is_active('Attendance', $current_url, $base_url) || is_active('attsndance_table', $current_url, $base_url) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-clock-o" aria-hidden="true"></i><span>Attendance</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= is_active('Attendance', $current_url, $base_url) ?>"><a href="<?= base_url('Attendance') ?>">Attendance</a></li>
                    <li class="<?= is_active('attsndance_table', $current_url, $base_url) ?>"><a href="<?= base_url('attsndance_table') ?>">Attsndance_table</a></li>
                </ul>
            </li>
            <li class="treeview <?= is_active('Pay_slip', $current_url, $base_url)  ? 'active' : '' ?>">
                <a href="#">
                    <i  class="fa-solid fa-print" aria-hidden="true"></i><span>Pay Slip</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= is_active('Pay_slip', $current_url, $base_url) ?>"><a href="<?= base_url('Pay_slip') ?>">Show Slip</a></li>
                </ul>
            </li>
          
            <li class="treeview <?= is_active('add_expenses', $current_url, $base_url) || is_active('expnses_list', $current_url, $base_url)  || is_active('Accounts', $current_url, $base_url) ? 'active' : '' ?> ">
                <a href="#">
                    <i class="fa fa-money" aria-hidden="true"></i><span>Ledger</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= is_active('Accounts', $current_url, $base_url) ?>"><a href="<?= base_url('Accounts') ?>">Accounts</a></li>
                    <li class="<?= is_active('add_expenses', $current_url, $base_url) ?>"><a href="<?= base_url('add_expenses') ?>">Add Expenses</a></li>
                    <li class="<?= is_active('expnses_list', $current_url, $base_url) ?>"><a href="<?= base_url('expnses_list') ?>">Expenses list</a></li>
                </ul>
            </li>
            <li class="treeview <?= is_active('add_leave', $current_url, $base_url) || is_active('leav_list', $current_url, $base_url) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-wpforms" aria-hidden="true"></i><span>Leave_records</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= is_active('add_leave', $current_url, $base_url) ?>"><a href="<?= base_url('add_leave') ?>">Add Leave</a></li>
                    <li class="<?= is_active('leav_list', $current_url, $base_url) ?>"><a href="<?= base_url('leav_list') ?>">leave_records </a></li>
                </ul>
            </li>
            <li class="treeview <?= is_active('add_wages', $current_url, $base_url) ;?>">
                <a href="#">
                    <i class="fa fa-money" aria-hidden="true"></i><span>Wages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= is_active('add_wages', $current_url, $base_url) ?>"><a href="<?= base_url('add_wages') ?>">Add Wages</a></li>
                </ul>
            </li>
            <li class="treeview <?= is_active('setting', $current_url, $base_url) ;?>">
                <a href="#">
                    <i class="fa fa-money" aria-hidden="true"></i><span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li class="<?= is_active('setting', $current_url, $base_url) ?>"><a href="<?= base_url('setting') ?>">Setting</a></li>
                </ul>
            </li>

        
            <!-- <li class="treeview <?= is_active('total_expenses', $current_url, $base_url) || is_active('total_expenses_report', $current_url, $base_url) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-table" aria-hidden="true"></i><span>Total Expenses</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= is_active('total_expenses', $current_url, $base_url) ?>"><a href="<?= base_url('total_expenses') ?>">Total Expenses</a></li>
                    <li class="<?= is_active('total_expenses_report', $current_url, $base_url) ?>"><a href="<?= base_url('total_expenses_report') ?>">Expenses Report</a></li>
                </ul>
            </li> -->
            <!-- <li class="treeview">
                        <a href="widgets.html">
                            <i class="fa fa-user-circle-o"></i><span>Human Resources</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="add-emp.html">Add Employee</a></li>
                            <li><a href="emp-list.html">employee list</a></li>
                            <li><a href="add-ns.html">Add Nurse</a></li>
                            <li><a href="ns-list.html">Nurse list</a></li>
                            <li><a href="add-ph.html">Add pharmacist</a></li>
                            <li><a href="ph-list.html">pharmacist list</a></li>
                            <li><a href="add-rep.html">Add Representative</a></li>
                            <li><a href="rep-list.html">Representative list</a></li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bed"></i><span>Bed Manager</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="add-bed.html">Add Bed</a></li>
                            <li><a href="bed-list.html">Bed list</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i><span>Notice</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="add-notice.html">Add Notice</a></li>
                            <li><a href="not-list.html">Notice list</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="mailbox.html">
                            <i class="fa fa-envelope"></i><span> Mail</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html">
                            <i class="fa fa-shopping-bag"></i><span> Widgets</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text"></i><span>pages</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="register.html">Sign up</a></li>
                            <li><a href="login.html">Sign in</a></li>
                            <li><a href="forget_password.html">Forget password</a></li>
                            <li><a href="lockscreen.html">Lockscreen</a></li>
                            <li><a href="404.html">404 Error</a></li>
                            <li><a href="505.html">505 Error</a></li>
                            <li><a href="blank.html">Blank Page</a></li>
                            <li><a href="profile.html">Profile page</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list-alt fw"></i><span> User Interface</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="calender.html">Calender</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="panels.html">Panels</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="tabs.html">Tabs & accordian</a></li>
                            <li><a href="icons_fontawesome.html">Icons</a></li>
                            <li><a href="notification.html">Notifications</a></li>
                            <li><a href="profile.html">Modals</a></li>
                            <li><a href="gridSystem.html">grid</a></li>
                            <li><a href="slider.html">slider</a></li>
                            <li><a href="timeline.html">Timeline</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="labels-badges-alerts.html">Badges</a></li>
                            <li><a href="progressbars.html">progress bar</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="modals.html">
                            <i class="fa fa-window-maximize"></i><span> Modals</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-columns"></i><span> Layout</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="layout_fixed.html">Fixed layout</a></li>
                            <li><a href="layout_boxed.html">Boxed layout</a></li>
                            <li><a href="layout_collapsed_sidebar.html">collapsed layout</a></li>
                        </ul>
                    </li> -->
        </ul>
    </div> <!-- /.sidebar -->
</aside>