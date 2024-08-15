<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<?php include 'includes/head.php' ?>
<style>
   

    .card {
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        margin-bottom: 24px;
        border-radius: 5px;
        background: #fff;
    }

    .card-body {
        padding: 15px;
    }

    .rounded-circle {
        border-radius: 50%;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-outline-primary {
        color: #007bff;
        border: 1px solid #007bff;
    }

    .text-primary {
        color: #007bff !important;
    }

    .text-secondary {
        color: #6c757d !important;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .text-info {
        color: #17a2b8 !important;
    }

    .text-danger {
        color: #dc3545 !important;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }

    .mb-1 {
        margin-bottom: .25rem !important;
    }

    .mb-3 {
        margin-bottom: 1rem !important;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }

    .mt-4 {
        margin-top: 1.5rem !important;
    }

    .my-4 {
        margin: 1.5rem 0 !important;
    }

    .icon-inline {
        display: inline-block;
        width: 24px;
        height: 24px;
        stroke-width: 2;
        stroke: currentColor;
        fill: none;
    }

    .list-group-item {
        padding: .75rem 1.25rem;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.125);
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*="col-"] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .progress {
        display: flex;
        height: 1rem;
        overflow: hidden;
        font-size: .75rem;
        background-color: #e9ecef;
        border-radius: .25rem;
    }

    .progress-bar {
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        background-color: #007bff;
        transition: width .6s ease;
    }
</style>
<body class="hold-transition sidebar-mini">

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
                        <li class="active">Profile</li>
                    </ol>
                </div>
            </section>
            <section class="content">
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <?php if (!empty($employees)) : ?>
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="<?= base_url('uploads/' . $employees->emp_image); ?>" alt="Employee Image" class="rounded-circle p-1 bg-primary" width="110">


                                                <div class="mt-3">
                                                    <h4><?= $employees->emp_name ?></h4>
                                                    <p class="text-secondary mb-1">
                                                        <?php foreach ($departments as $department) : ?>
                                                            <?php if ($employees->dep_id == $department['id']) : ?>
                                                                <?= $department['name']; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?></p>
                                                    <p class="text-muted font-size-sm"><?= $employees->emp_address ?></p>

                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                                        </svg>Website
                                                    </h6>
                                                    <span class="text-secondary">https://bootdey.com</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline">
                                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                                        </svg>Github
                                                    </h6>
                                                    <span class="text-secondary">bootdey</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info">
                                                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                                        </svg>Twitter
                                                    </h6>
                                                    <span class="text-secondary">@bootdey</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger">
                                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                        </svg>Instagram
                                                    </h6>
                                                    <span class="text-secondary">bootdey</span>
                                                </li>

                                            </ul>
                                        <?php else : ?>
                                            <div class="card-body">
                                                <p>No employees found</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h5 class="mb-0">Full Name</h5>
                                            </div>
                                            <div class="col-sm-9 text-secondary">

                                                <input type="text" class="form-control" value="<?= $employees->emp_name ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h5 class="mb-0">Email</h5>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="<?= $employees->emp_email ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h5 class="mb-0">Phone</h5>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="<?= $employees->emp_contact ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h5 class="mb-0">Salary</h5>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="<?= $employees->basic_salary ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h5 class="mb-0">Type</h5>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php
                                                $loanType = 'none'; // Default value if no wage entry matches the employee ID
                                                foreach ($wages as $wage) :
                                                    if ($employees->emp_id == $wage['emp_id']) :
                                                        $loanType = ($wage['loan_type'] === 'none' || empty($wage['loan_type'])) ? 'none' : $wage['loan_type'];
                                                        break; // Stop loop once a match is found
                                                    endif;
                                                endforeach;
                                                ?>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($loanType, ENT_QUOTES, 'UTF-8'); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h5 class="mb-0">Loan</h5>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php
                                                $loanType = '0'; // Default value if no wage entry matches the employee ID
                                                foreach ($wages as $wage) :
                                                    if ($employees->emp_id == $wage['emp_id']) :
                                                        $loanType = ($wage['amount'] === 'none' || empty($wage['amount'])) ? '0' : $wage['amount'];
                                                        break; // Stop loop once a match is found
                                                    endif;
                                                endforeach;
                                                ?>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($loanType, ENT_QUOTES, 'UTF-8'); ?>">
                                            </div>
                                        </div>




                                        <div class="row mb-3">
                                            <div class="col-sm-2">
                                                <h5 class="mb-0">Address</h5>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="<?= $employees->emp_address ?>">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="totalsTable" class="table table-bordered table-hover">
                                            <thead class="success">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Total Work Time</th>
                                                    <th>Total Missing Time</th>
                                                    <th>Total Work Time (in minutes)</th>
                                                    <th>Total Missing Time (in minutes)</th>
                                                    <th>Total Overtime (in minutes)</th>
                                                    <th>Total Salary</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($Salary)) :  $i = 1 ?>
                                                    <tr>
                                                        <td><?php echo  $i++; ?></td>
                                                        <td><?php echo $Salary->total_work_time; ?></td>
                                                        <td><?php echo $Salary->total_missing_time; ?></td>
                                                        <td><?php echo $Salary->total_work_minutes; ?></td>
                                                        <td><?php echo $Salary->total_missing_minutes; ?></td>
                                                        <td><?php echo $Salary->total_overtime_minutes; ?></td>
                                                        <td><?php echo $Salary->total_salary; ?></td>
                                                        <td> <a href="<?php echo base_url() ?>"><i class="fas fa-paper-plane" aria-hidden="true" style="color: green;"></i></td>

                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>


        </div>

    </div>
    <?php include 'includes/jslinks.php' ?>
</body>

<!-- Mirrored from thememinister.com/health/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:46 GMT -->

</html>