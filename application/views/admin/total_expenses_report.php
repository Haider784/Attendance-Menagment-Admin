<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/health/pay-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:49 GMT -->
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
                    <i class="fa fa-table" aria-hidden="true"></i>
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
                    <small>expenses table</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">expenses</li>
                    </ol>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">

                                <div class="btn-group">
                                    <a class="btn btn-success" href=""> <i class="fa fa-table" aria-hidden="true"></i>
                                        Total_expenses table</a>
                                </div>

                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="panel-header">
                                        <div class="col-sm-4">
                                            <div class="dataTables_length">
                                                <label>Display <select name="example_length">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> records per page</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="dataTables_length">
                                                <a class="btn btn-default buttons-copy btn-sm" tabindex="0"><span>Copy</span></a>
                                                <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>
                                                <a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>
                                                <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>
                                                <a class="btn btn-default buttons-print btn-sm" tabindex="0"><span>Print</span></a>

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="dataTables_length" id="example_length">
                                                <div class="input-group custom-search-form">
                                                    <input type="search" class="form-control" placeholder="search..">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button">
                                                            <span class="glyphicon glyphicon-search"></span>
                                                        </button>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="success">
                                            <tr>
                                                <th>ID</th>
                                                <th>Employee ID</th>
                                                <th>Total Expenses</th>
                                                <th>Received Amount</th>
                                                <th>Remaining Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($expenses)) : ?>
                                                <?php foreach ($expenses as $expense) : ?>
                                                    <tr>
                                                        <td><?= $expense['id'] ?></td>
                                                        <td><?= $expense['emp_id'] ?></td>
                                                        <td><?= $expense['t_expans'] ?></td>
                                                        <td><?= $expense['received'] ?></td>
                                                        <td><?= $expense['remaning'] ?></td>
                                                        <td>
                                                            <a href="<?= site_url('T_expansesController/edit/' . $expense['id']) ?>"><i class="fa fa-pencil" aria-hidden="true" style="color: #007BFF;"></i></a> |
                                                            <a href="<?= site_url('T_expansesController/delete/' . $expense['id']) ?>"><i class="fa fa-trash-o" aria-hidden="true" style="color: red;"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6">No expenses found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page-nation text-right">
                                    <ul class="pagination pagination-large">
                                        <li class="disabled"><span>«</span></li>
                                        <li class="active"><span>1</span></li>
                                        <li><a href="#">2</a></li>
                                        <li class="disabled"><span>...</span></li>
                                        <li>
                                        <li><a rel="next" href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- /.content -->
        </div> <!-- /.content-wrapper -->
        <?php include 'includes/footer.php' ?> 

    </div> <!-- ./wrapper -->
    <!-- ./wrapper -->
    <?php include 'includes/jslinks.php' ?>

    <!-- End Theme label Script
        =====================================================================-->
</body>

<!-- Mirrored from thememinister.com/health/pay-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:49 GMT -->

</html>