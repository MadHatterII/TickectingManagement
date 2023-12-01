<?php
// PHP code
include('../connection/connection.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Prices</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>
<style>
    .sidebar {
        background: rgb(13, 126, 194);
        background: linear-gradient(0deg, rgba(13, 126, 194, .453321321) 58%, rgba(208, 170, 89, 0.8548669467787114) 77%);
    }

    th {
        background-color: #3ea175;
        /* Header background color */
        color: #fff;
    }

    .cottage-type {
        font-size: 9px;
        /* Adjust the font size as needed */
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <?php include '../userside/nav.php'; ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="adminhome.php" class="brand-link">
                <img src="../img/slsulogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
                <span class="brand-text font-weight-light">WanderLust</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/canigs.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="userdash.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="userticket.php" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p> Agent Management</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="adminprice.php" class="nav-link">
                                        <i class="fas fa-money-bill nav-icon"></i>
                                        <p>Price Management</p>
                                    </a>
                                </li> -->

                            </ul>
                        </li>

                        <li class="nav-item  menu-open">
                            <a href="#" class="nav-link">
                                <i class="far fa-check-circle nav-icon"></i>
                                <p>
                                    Cottage/Boat Status
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="userboat.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Boat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="usercottage.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cottage</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Other</li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-line text-info"></i>
                                <p>Report</p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Logout</p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>



        <!-- Sidebar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">


                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- =========================================================== -->


                        <div class="row">
                            <?php
                            include '../connection/connection.php';

                            // SQL query to get cottage information
                            $cottageQuery = "SELECT cottage_type, cottage_count FROM cottages";
                            $cottageResult = $conn->query($cottageQuery);

                            // Display cottage information in the specified format
                            while ($cottageRow = $cottageResult->fetch_assoc()) {
                                echo '<div class="col-md-3 col-sm-6 col-12">';
                                echo '<div class="info-box">';
                                echo '<span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>';
                                echo '<div class="info-box-content">';
                                echo '<span class="info-box-text">' . $cottageRow['cottage_type'] . '</span>';
                                echo '<span class="info-box-number">' . $cottageRow['cottage_count'] . '</span>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }

                            // Close connection
                            $conn->close();
                            ?>
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Responsive Hover Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <!-- Add an id to the search input for easy access -->
                                        <input type="text" id="table_search" name="table_search" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <div id="searchResults"></div>
                                <table class="table table-hover text-nowrap" id="originalTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Cottage Type</th>
                                            <th>Stay Type</th>
                                            <th>Group Names</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        include '../connection/connection.php';
                                        // Set the number of records to display per page
                                        $recordsPerPage = 5;

                                        // Get the current page number from the query string
                                        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                                        // Calculate the starting record index for the SQL query
                                        $startIndex = ($currentPage - 1) * $recordsPerPage;

                                        // SQL query to retrieve limited records from the database
                                        $sql = "SELECT * FROM bookings ORDER BY cottage_type DESC LIMIT $startIndex, $recordsPerPage";
                                        $result = $conn->query($sql);

                                        // Display data in the table
                                        if ($result->num_rows > 0) {
                                            $counter = $startIndex + 1;
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $counter . "</td>";
                                                echo "<td>" . $row['cottage_type'] . "</td>";
                                                echo "<td>" . $row['stayType'] . "</td>";
                                                echo "<td>" . $row['group_name'] . "</td>";
                                                echo "<td>" . $row['status'] . "</td>";
                                                echo "<td><button class='btn btn-primary' data-row-id='" . $row['id'] . "' data-cottage-type='" . $row['cottage_type'] . "' onclick='changeStatus(this)'>Edit</button></td>";

                                                echo "</tr>";
                                                $counter++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No records found</td></tr>";
                                        }

                                        // Close connection
                                        $conn->close();
                                        ?>

                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <?php
                                        // Calculate the total number of pages
                                        $totalPages = ceil($counter / $recordsPerPage);

                                        // Generate pagination links
                                        if ($currentPage > 1) {
                                            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>&laquo;</a></li>";
                                        }
                                        for ($i = 1; $i <= $totalPages; $i++) {
                                            echo "<li class='page-item " . ($i == $currentPage ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
                                        }
                                        if ($currentPage < $totalPages) {
                                            echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'>&raquo;</a></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- End Pagination -->

                            </div>
                            <!-- /.card-body -->


                        </div>
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">

                        </section>

                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">


                        </section>

                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>


        <!-- ./wrapper -->



        <?php include '../footer.php' ?>




        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var searchInput = document.getElementById('table_search');
                searchInput.addEventListener('input', function() {
                    liveSearch();
                });

                // Add event listeners for action buttons
                var actionButtons = document.querySelectorAll('.action-btn');
                actionButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        updateStatus(this);
                    });
                });
            });

            function liveSearch() {
                var searchInput = document.getElementById('table_search');
                var searchQuery = searchInput.value;

                // Make an AJAX request to the cottagesearch.php file
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Update the searchResults div with the response
                        document.getElementById('searchResults').innerHTML = this.responseText;

                        // Hide or show the original table based on the search query
                        var originalTable = document.getElementById('originalTable');
                        if (originalTable) {
                            originalTable.style.display = (searchQuery.trim() === '') ? 'table' : 'none';
                        }
                    }
                };

                // If not empty, make a request with the search query parameter
                if (searchQuery.trim() !== '') {
                    xhttp.open('GET', '../search/cottagesearch.php?q=' + searchQuery, true);
                    xhttp.send();
                } else {
                    // If empty, clear the searchResults div and show the original table
                    document.getElementById('searchResults').innerHTML = '';

                    var originalTable = document.getElementById('originalTable');
                    if (originalTable) {
                        originalTable.style.display = 'table'; // Set the display property based on your original table's styling
                    }
                }
            }
            $(document).ready(function() {
                // Number of items per page
                var itemsPerPage = 5;

                // Hide all rows and show only the first "itemsPerPage" rows
                var rows = $("#originalTable tbody tr");
                rows.hide();
                rows.slice(0, itemsPerPage).show();

                // Calculate the number of pages
                var numPages = Math.ceil(rows.length / itemsPerPage);

                // Generate pagination links
                for (var i = 1; i <= numPages; i++) {
                    $("#pagination").append("<a href='#' class='page-link' data-page='" + i + "'>" + i + "</a> ");
                }

                // Handle pagination click event
                $("#pagination a").click(function() {
                    var page = $(this).data("page");
                    var start = (page - 1) * itemsPerPage;
                    var end = start + itemsPerPage;

                    // Hide all rows and show only the selected page's rows
                    rows.hide();
                    rows.slice(start, end).show();
                });
            });

            function changeStatus(button) {
                var rowId = $(button).data('row-id');
                var cottageType = $(button).data('cottage-type');
                console.log("Row ID:", rowId);
                console.log("Cottage Type:", cottageType);

                // Make an AJAX request to update the status
                $.ajax({
                    type: "POST",
                    url: "../userprocess/SetOutCottage.php", // Replace with your server-side script
                    data: {
                        row_id: rowId,
                        new_status: 'OUT'
                    },
                    success: function(response) {
                        // Update the UI if needed
                        console.log("Response:", response);
                    },
                    error: function(error) {
                        console.error("Error:", error);
                    }
                });
            }
        </script>





        <script src="../adminsidebar/activesidebar.js">
        </script> <!--jQuery -- >
        <script src = "../plugins/jquery/jquery.min.js" >
    </script>
    <!-- jQuery UI 1.11.4 -->
        <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="../plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="../plugins/sparklines/sparkline.js"></script>

        <!-- jQuery Knob Chart -->
        <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="../plugins/moment/moment.min.js"></script>
        <script src="../plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="../plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.js"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../dist/js/pages/dashboard.js"></script>
</body>

</html>