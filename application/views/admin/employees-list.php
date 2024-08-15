<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thememinister.com/health/pt-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:47 GMT -->

<?php include 'includes/head.php' ?>
<style>
    /* Override the Toastr success background color */
    .toast-success {
        background-color: rgb(0, 150, 136) !important;
    }
</style>

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
                    <h1>Employees</h1>
                    <small>Employees table</small>
                    <ol class="breadcrumb hidden-xs">
                        <li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
                        <li class="active">Employees</li>
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
                                    <a class="btn btn-primary" href="<?= base_url('add-employees') ?>">
                                        <i class="fa fa-list"></i> Employees form </a>
                                </div>

                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="panel-header">
                                        <div class="col-sm-4">
                                            <div class="dataTables_length" id="example_length">
                                                <label>Display
                                                    <select id="recordsPerPage" name="example_length" onchange="changePage(1)">
                                                        
                                                        <option value="1">1</option>
                                                        <option value="3">3</option>
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> records per page
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="dataTables_length">
                                                <a class="btn btn-default buttons-copy btn-sm" id="copyTable" tabindex="0"><span>Copy</span></a>
                                                <a class="btn btn-default buttons-csv buttons-html5 btn-sm" id="downloadCSV" tabindex="0"><span>CSV</span></a>
                                                <a class="btn btn-default buttons-excel buttons-html5 btn-sm" id="downloadExcel" tabindex="0"><span>Excel</span></a>
                                                <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" id="downloadPDF" tabindex="0"><span>PDF</span></a>
                                                <a class="btn btn-default buttons-print btn-sm" id="printButton" tabindex="0"><span>Print</span></a>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="dataTables_length">
                                                <div class="input-group custom-search-form">
                                                <input type="search" id="searchInput" class="form-control" placeholder="Search..">
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
                                    <table id="printTable" class="table table-bordered table-hover">
                                        <thead class="success">
                                            <tr>
                                                <th>ID</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Department</th>
                                                <th class="no-print">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                            <?php if (!empty($employees)) : $i = 1; ?>
                                                <?php foreach ($employees as $employee) : ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td>
                                                            <?php if (!empty($employee->emp_image)) : ?>
                                                                <img src="<?= base_url('uploads/' .  $employee->emp_image); ?>" class="img-circle" style="max-width: 60px;">
                                                            <?php else : ?>
                                                                No Image
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo $employee->emp_name; ?></td>
                                                        <td><?php echo $employee->emp_email; ?></td>
                                                        <td>
                                                            <?php foreach ($departments as $department) : ?>
                                                                <?php if ($employee->dep_id == $department->id) : ?>
                                                                    <?= $department->name; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td class="no-print">
                                                            <a href="<?php echo base_url('EmployeController/update/' . $employee->emp_id); ?>"><i class="fa fa-pencil" aria-hidden="true" style="color: green;"></i></a> |
                                                            <a href="<?php echo base_url('EmployeController/view/' . $employee->emp_id); ?>">
                                                                <i class="fa fa-eye" aria-hidden="true" style="color: green;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6">No employees found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <script>
                                        document.getElementById('printButton').addEventListener('click', function() {
                                            // Clone the table to avoid altering the original
                                            var tableClone = document.getElementById('printTable').cloneNode(true);

                                            // Remove the Actions column header
                                            var thElements = tableClone.querySelectorAll('th.no-print');
                                            thElements.forEach(function(th) {
                                                th.parentNode.removeChild(th);
                                            });

                                            // Remove the Actions column data
                                            var tdElements = tableClone.querySelectorAll('td.no-print');
                                            tdElements.forEach(function(td) {
                                                td.parentNode.removeChild(td);
                                            });

                                            // Prepare the content for printing
                                            var printContents = tableClone.outerHTML;

                                            var iframe = document.createElement('iframe');
                                            iframe.name = "printFrame";
                                            iframe.style.position = "absolute";
                                            iframe.style.width = "0px";
                                            iframe.style.height = "0px";
                                            iframe.style.border = "none";

                                            document.body.appendChild(iframe);

                                            var doc = iframe.contentWindow.document;
                                            doc.open();
                                            doc.write('<html><head><title>Print</title>');
                                            doc.write('<style>body { font-family: Arial, sans-serif; } table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #000; padding: 8px; text-align: left; } th { background-color: #f2f2f2; }</style>');
                                            doc.write('</head><body>');
                                            doc.write(printContents);
                                            doc.write('</body></html>');
                                            doc.close();

                                            iframe.contentWindow.focus();
                                            iframe.contentWindow.print();

                                            document.body.removeChild(iframe);
                                        });
                                    </script>

                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script>

                                    <script>
                                        document.getElementById('downloadExcel').addEventListener('click', function() {
                                            var table = document.getElementById('printTable');

                                            // Clone the table to modify for Excel export
                                            var tableClone = table.cloneNode(true);

                                            // Remove the Actions column from the cloned table
                                            var thElements = tableClone.querySelectorAll('th.no-print');
                                            thElements.forEach(function(th) {
                                                th.parentNode.removeChild(th);
                                            });

                                            var tdElements = tableClone.querySelectorAll('td.no-print');
                                            tdElements.forEach(function(td) {
                                                td.parentNode.removeChild(td);
                                            });

                                            // Convert table to a worksheet
                                            var worksheet = XLSX.utils.table_to_sheet(tableClone);

                                            // Create a new workbook
                                            var workbook = XLSX.utils.book_new();
                                            XLSX.utils.book_append_sheet(workbook, worksheet, "Departments");

                                            // Download the Excel file
                                            XLSX.writeFile(workbook, 'Departments.xlsx');
                                        });
                                    </script>


                                    <script>
                                        document.getElementById('copyTable').addEventListener('click', function() {
                                            var table = document.getElementById('printTable');
                                            var range, sel;
                                            // Create a temporary hidden textarea to hold the table data
                                            var tempElement = document.createElement('textarea');
                                            tempElement.style.position = 'fixed';
                                            tempElement.style.left = '-9999px';

                                            // Clone the table to modify for copying
                                            var tableClone = table.cloneNode(true);

                                            // Remove the Actions column from the cloned table
                                            var thElements = tableClone.querySelectorAll('th.no-print');
                                            thElements.forEach(function(th) {
                                                th.parentNode.removeChild(th);
                                            });

                                            var tdElements = tableClone.querySelectorAll('td.no-print');
                                            tdElements.forEach(function(td) {
                                                td.parentNode.removeChild(td);
                                            });

                                            // Convert the table data to plain text
                                            tempElement.value = convertTableToText(tableClone);

                                            // Append the textarea to the document body
                                            document.body.appendChild(tempElement);

                                            // Select and copy the content
                                            tempElement.select();
                                            document.execCommand('copy');

                                            // Remove the textarea after copying
                                            document.body.removeChild(tempElement);

                                            // Show a toaster notification with the custom color
                                            toastr.success('Table data copied to clipboard!');
                                        });

                                        function convertTableToText(table) {
                                            var text = '';
                                            var rows = table.querySelectorAll('tr');
                                            rows.forEach(function(row) {
                                                var cols = row.querySelectorAll('td, th');
                                                var rowData = [];
                                                cols.forEach(function(col) {
                                                    rowData.push(col.innerText.trim());
                                                });
                                                text += rowData.join('\t') + '\n';
                                            });
                                            return text;
                                        }
                                    </script>
                                    <script>
                                        document.getElementById('downloadCSV').addEventListener('click', function() {
                                            var table = document.getElementById('printTable');

                                            // Clone the table to modify for CSV export
                                            var tableClone = table.cloneNode(true);

                                            // Remove the Actions column from the cloned table
                                            var thElements = tableClone.querySelectorAll('th.no-print');
                                            thElements.forEach(function(th) {
                                                th.parentNode.removeChild(th);
                                            });

                                            var tdElements = tableClone.querySelectorAll('td.no-print');
                                            tdElements.forEach(function(td) {
                                                td.parentNode.removeChild(td);
                                            });

                                            // Convert the table data to CSV format
                                            var csv = tableToCSV(tableClone);

                                            // Create a Blob from the CSV string and create a link to download it
                                            var blob = new Blob([csv], {
                                                type: 'text/csv;charset=utf-8;'
                                            });
                                            var link = document.createElement('a');
                                            var url = URL.createObjectURL(blob);

                                            link.setAttribute('href', url);
                                            link.setAttribute('download', 'Departments.csv');
                                            link.style.visibility = 'hidden';
                                            document.body.appendChild(link);
                                            link.click();
                                            document.body.removeChild(link);
                                        });

                                        function tableToCSV(table) {
                                            var rows = table.querySelectorAll('tr');
                                            var csv = [];

                                            rows.forEach(function(row) {
                                                var cols = row.querySelectorAll('td, th');
                                                var rowData = [];

                                                cols.forEach(function(col) {
                                                    rowData.push('"' + col.innerText.trim().replace(/"/g, '""') + '"');
                                                });

                                                csv.push(rowData.join(','));
                                            });

                                            return csv.join('\n');
                                        }
                                    </script>

                                    <!-- jsPDF -->
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

                                    <!-- jsPDF-AutoTable -->
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
                                    <script>
                                        document.getElementById('downloadPDF').addEventListener('click', function() {
                                            var {
                                                jsPDF
                                            } = window.jspdf;
                                            var doc = new jsPDF();

                                            // Clone the table to modify for PDF export
                                            var table = document.getElementById('printTable');
                                            var tableClone = table.cloneNode(true);

                                            // Remove the Actions column from the cloned table
                                            var thElements = tableClone.querySelectorAll('th.no-print');
                                            thElements.forEach(function(th) {
                                                th.parentNode.removeChild(th);
                                            });

                                            var tdElements = tableClone.querySelectorAll('td.no-print');
                                            tdElements.forEach(function(td) {
                                                td.parentNode.removeChild(td);
                                            });

                                            // Prepare the table data for AutoTable
                                            var tableBody = [];
                                            var rows = tableClone.querySelectorAll('tr');
                                            rows.forEach(function(row) {
                                                var rowData = [];
                                                var cols = row.querySelectorAll('td, th');
                                                cols.forEach(function(col) {
                                                    rowData.push(col.innerText.trim());
                                                });
                                                tableBody.push(rowData);
                                            });

                                            // Define table headers
                                            var headers = tableClone.querySelectorAll('thead tr th');
                                            var tableHeaders = Array.from(headers).map(header => header.innerText.trim());

                                            // Use jsPDF AutoTable to generate the table
                                            doc.autoTable({
                                                head: [tableHeaders],
                                                body: tableBody
                                            });

                                            // Save the PDF
                                            doc.save('Departments.pdf');
                                        });
                                    </script>




                                    <div id="paginationControls" class="text-center"></div>
                                </div>

                                <div class="page-nation text-right">
                                    <ul id="pagination" class="pagination pagination-large">
                                        <!-- Pagination buttons will be dynamically generated here -->
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tableBody = document.getElementById('tableBody');
            const pagination = document.getElementById('pagination');
            let currentPage = 1;

            // Retrieve the saved recordsPerPage from localStorage, if available
            let savedRecordsPerPage = localStorage.getItem('recordsPerPage');
            let recordsPerPage = savedRecordsPerPage ? parseInt(savedRecordsPerPage) : parseInt(document.getElementById('recordsPerPage').value);

            // Set the recordsPerPage select element to the saved value
            if (savedRecordsPerPage) {
                document.getElementById('recordsPerPage').value = savedRecordsPerPage;
            }

            function displayTable(page) {
                const start = (page - 1) * recordsPerPage;
                const end = start + recordsPerPage;

                for (let i = 0; i < tableBody.rows.length; i++) {
                    tableBody.rows[i].style.display = i >= start && i < end ? '' : 'none';
                }
            }

            function setupPagination() {
                pagination.innerHTML = '';

                const totalPages = Math.ceil(tableBody.rows.length / recordsPerPage);

                let maxVisibleButtons = 5; // Max number of visible pagination buttons
                let startPage = Math.max(1, currentPage - Math.floor(maxVisibleButtons / 2));
                let endPage = Math.min(totalPages, startPage + maxVisibleButtons - 1);

                // Previous button
                let li = document.createElement('li');
                li.innerHTML = '<span>&laquo;</span>';
                li.className = currentPage === 1 ? 'disabled' : '';
                li.onclick = function() {
                    if (currentPage > 1) {
                        currentPage--;
                        changePage(currentPage);
                    }
                };
                pagination.appendChild(li);

                // Numbered buttons
                for (let i = startPage; i <= endPage; i++) {
                    li = document.createElement('li');
                    li.innerHTML = '<a href="#">' + i + '</a>';
                    li.className = i === currentPage ? 'active' : '';
                    li.onclick = function() {
                        currentPage = i;
                        changePage(currentPage);
                    };
                    pagination.appendChild(li);
                }

                // Next button
                li = document.createElement('li');
                li.innerHTML = '<a href="#">&raquo;</a>';
                li.className = currentPage === totalPages ? 'disabled' : '';
                li.onclick = function() {
                    if (currentPage < totalPages) {
                        currentPage++;
                        changePage(currentPage);
                    }
                };
                pagination.appendChild(li);
            }

            function changePage(page) {
                displayTable(page);
                setupPagination();
            }

            document.getElementById('recordsPerPage').addEventListener('change', function() {
                recordsPerPage = parseInt(this.value);

                // Save the selected value to localStorage
                localStorage.setItem('recordsPerPage', recordsPerPage);

                changePage(1);
            });

            changePage(currentPage);
        });
    </script>

    <script>
        // Add an event listener to the search input
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = document.getElementById('searchInput').value.toLowerCase();
            var table = document.getElementById('printTable');
            var rows = table.getElementsByTagName('tr');

            // Loop through all table rows, excluding the header
            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var rowContainsSearchTerm = false;

                // Loop through all cells in the current row
                for (var j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        var cellText = cells[j].innerText.toLowerCase();
                        if (cellText.indexOf(input) > -1) {
                            rowContainsSearchTerm = true;
                            break;
                        }
                    }
                }

                // Show or hide the row based on the search term
                if (rowContainsSearchTerm) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        });
    </script>
    <?php include 'includes/jslinks.php' ?>

    <!-- End Theme label Script
        =====================================================================-->
</body>

<!-- Mirrored from thememinister.com/health/pt-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jul 2024 05:55:48 GMT -->

</html>