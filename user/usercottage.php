<?php
// PHP code
include('../connection/connection.php');

// Query the database to get the initial counts for each cottage type
$sqlCounts = "SELECT `cottage_type`, `cottage_count` FROM `cottages`";
$resultCounts = $conn->query($sqlCounts);

// Initialize an associative array to store the counts
$counts = [];

if ($resultCounts->num_rows > 0) {
    while ($rowCounts = $resultCounts->fetch_assoc()) {
        $cottageType = $rowCounts["cottage_type"];
        $count = $rowCounts["cottage_count"];

        // Store the count for each cottage type
        $counts[$cottageType] = $count;
    }
}

// Assume you have received a POST request for the "IN" action, and you have the relevant data
// For example, assuming you have a form with a button named "IN" and the selected cottage type
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "IN") {
    $selectedCottageType = $_POST["cottage_type"];

    // Check if the selectedCottageType exists in the counts array
    if (!isset($counts[$selectedCottageType])) {
        // Handle the case where the selected cottage_type is not found in the initial counts
        echo "Invalid cottage_type: $selectedCottageType";
        exit; // Stop further execution
    }

    // Check if there are available cottages for the selected type
    if ($counts[$selectedCottageType] > 0) {
        // Deduct one count for the selected cottage type
        $counts[$selectedCottageType]--;

        // Insert a record into the database for the "IN" status
        $insertSql = "INSERT INTO `bookings` (`cottage_type`, `status`) VALUES ('$selectedCottageType', 'IN')";
        $conn->query($insertSql);
    } else {
        // Handle the case where there are no available cottages for the selected type
        echo "No available cottages for the selected type.";
    }
}

// Query the database to count cottages with both "IN" and "OUT" statuses
$sql = "SELECT `cottage_type`, `status`, COUNT(*) as `count` FROM `bookings` GROUP BY `cottage_type`, `status`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cottageType = $row["cottage_type"];
        $status = $row["status"];
        $count = $row["count"];

    // Check if the cottage_type key exists in the $counts array
if (isset($counts[$cottageType])) {
    if ($status === "IN") {
        // Deduct the count, but ensure it doesn't go below 0
        $counts[$cottageType] = max(0, $counts[$cottageType] - $count);
    } else {
        // Add the count, but ensure it doesn't exceed the maximum count
        // Assuming the maximum count is 5 based on your original code
        $maxCount = 5;
        $counts[$cottageType] = min($maxCount, $counts[$cottageType] + $count);
    }
} else {
    // Log the error for debugging purposes
    error_log("Invalid cottage_type: $cottageType");

    // Handle the case where the cottage_type key doesn't exist in $counts
    echo "Invalid cottage_type: $cottageType";
}
    }
}

// Rest of your code...

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
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

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

                        <?php
                        // Display counts for each cottage type
                        foreach ($counts as $cottageType => $count) {
                            $infoBoxClass = "";
                            if ($count > 2) {
                                $infoBoxClass = "bg-gradient-info";
                            } elseif ($count > 1) {
                                $infoBoxClass = "bg-gradient-success";
                            } elseif ($count > 0) {
                                $infoBoxClass = "bg-gradient-warning";
                            } else {
                                $infoBoxClass = "bg-gradient-danger";
                            }
                        ?>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box <?php echo $infoBoxClass; ?>">
                                    <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"><?php echo $cottageType; ?></span>
                                        <span class="info-box-number" id="availableCottages"><?php echo $count; ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        <?php } ?>
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
                                <?php
                                // Fetch distinct cottage types
                                $cottageTypesQuery = "SELECT DISTINCT cottage_type FROM bookings";
                                $cottageTypesResult = $conn->query($cottageTypesQuery);

                                if ($cottageTypesResult->num_rows > 0) {
                                    // Start the table outside the loop
                                    echo '<table class="table table-hover text-nowrap" id="originalTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Cottage Type</th>
                                        
                                            <th>Stay Type</th>
                                            <th>Group Names</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                                    $counter = 1; // Initialize the counter for cottage numbers

                                    while ($cottageTypeRow = $cottageTypesResult->fetch_assoc()) {
                                        $cottageType = $cottageTypeRow["cottage_type"];

                                        // Fetch data for the current cottage type
                                        $sql = "SELECT DISTINCT stayType, group_name, status, id FROM bookings WHERE cottage_type = '$cottageType' ";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $stayType = $row["stayType"];
                                                $groupName = $row["group_name"];
                                                $action = $row["status"];
                                                $id = $row["id"];

                                                // Display the combination of cottage_type, stay_type, and group_name
                                                echo '<tr>
                                                    <td>' . $counter . '</td>
                                                    <td>' . $cottageType . '</td>
                                                   
                                                    <td>' . $stayType . '</td>
                                                    <td>' . $groupName . '</td>
                                                    <td>
                                                        <button class="action-btn" data-cottage="' . $cottageType . '" data-id="' . $id . '" data-action="' . $action . '">' . $action . '</button>
                                                    </td>
                                                </tr>';

                                                $counter++; // Increment the counter for the next cottage
                                            }
                                        } else {
                                            // Display a message if no records are found for the current cottage type
                                            echo '<tr><td colspan="6">No records found for ' . $cottageType . '.</td></tr>';
                                        }
                                    }

                                    // End the table outside the loop
                                    echo '</tbody></table>';
                                } else {
                                    // Display a message if no distinct cottage types are found
                                    echo '<p>No distinct cottage types found.</p>';
                                }
                                ?>


                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->

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



    <!-- Add an event listener to trigger the search function -->
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


        function updateStatus(button) {
            var cottageType = button.dataset.cottage;
            var currentStatus = button.dataset.action; // Corrected from 'status' to 'action'
            var id = button.dataset.id;

            // Make an AJAX request to update the database
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Update the button text based on the response
                    if (this.responseText.trim().toLowerCase() === 'out') {
                        button.innerText = 'OUT';
                        button.dataset.action = 'OUT'; // Updated from 'status' to 'action'
                    } else {
                        button.innerText = 'IN';
                        button.dataset.action = 'IN'; // Updated from 'status' to 'action'
                    }

                    // Reload the status after the update
                    reloadStatus();
                    location.reload();
                }
            };

            // Send a request to your update script with cottageType, currentStatus, and id
            xhttp.open('GET', '../userprocess/cottagestatus_update.php?cottageType=' + cottageType + '&currentStatus=' + currentStatus + '&id=' + id, true);
            xhttp.send();
        }

        function reloadStatus() {
            // Reload the status by making an AJAX request to fetch the updated counts
            var statusRequest = new XMLHttpRequest();
            statusRequest.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Parse the JSON response containing the updated counts
                    var counts = JSON.parse(this.responseText);

                    // Update the counts for each cottage type on the page
                    for (var cottageType in counts) {
                        var count = counts[cottageType];
                        // Update the count on the page based on your HTML structure
                        var infoBox = document.querySelector('[data-cottage-type="' + cottageType + '"] .info-box-number');
                        if (infoBox) {
                            infoBox.innerText = count;
                        }
                    }
                }
            };

            // Send a request to your PHP script to fetch the updated counts
            statusRequest.open('GET', '../userprocess/cottagecount.php', true);
            statusRequest.send();
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