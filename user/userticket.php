<?php
// You should also include the session start if it's not already done
session_start();

// Check if the user is logged in (agentID is set in the session)
if (!isset($_SESSION['agentID'])) {
    // Redirect to login page or handle not logged in user
    header("Location: index.php");
    exit();
}

include '../connection/connection.php';


//tourist count

$sql = "SELECT * FROM members";

// Execute the query and store the result in a variable
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}


$activeTouristCount = mysqli_num_rows($result);


// Total cottages
$totalCottages = 20;

// Query to get the count of booked cottages
$sql1 = "SELECT COUNT(cottage_type) as bookedCottages FROM bookings WHERE status = 'IN'";
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result1);
$bookedCottages = $row['bookedCottages'];

// Query to get the remaining cottages
$sql2 = "SELECT SUM(cottage_count) as totalCottageCount FROM cottages";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$totalCottageCount = $row2['totalCottageCount'];;

// Calculate available cottages
$availableCottages = $totalCottages - $bookedCottages;

//boat count
$sql2 = "SELECT * FROM boats";

// Execute the query and store the result in a variable
$result2 = mysqli_query($conn, $sql2);

// Check if the query was successful
if (!$result2) {
    die("Error: " . mysqli_error($conn));
}


$activeBoatsCount = mysqli_num_rows($result2);


//ticketing agent count
$sql3 = "SELECT * FROM Useraccounts";

// Execute the query and store the result in a variable
$result3 = mysqli_query($conn, $sql3);

// Check if the query was successful
if (!$result3) {
    die("Error: " . mysqli_error($conn));
}

// Count the active Ticketing Agents
$activeTicketingAgentsCount = mysqli_num_rows($result3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create | Ticket</title>


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
                    <?php
                        // Start or resume the session
                

                        // Check if agentID and Username are set in the session
                        if (isset($_SESSION['agentID']) && isset($_SESSION['username'])&& isset($_SESSION['lastname'])) {
                            // Display the user's name (agentID) and username from the session
                            echo '<div class="info">
                            <a href="#" class="d-block">'. $_SESSION['username'] .' '. $_SESSION['lastname'] . '</a>
                            </div>';
                        } else {
                            // Default text if agentID or Username is not set
                            echo '<a href="#" class="d-block">Guest</a>';
                        }
                        ?>
                    
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
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
                                    <a href="userticket.php" class="nav-link active">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Ticket Form</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="far fa-check-circle nav-icon"></i>
                                <p>
                                    Cottage/Boat Status
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="userboat.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Boat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="usercottage.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cottage</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">Others</li>



                        <li class="nav-item">
                            <a href="userprofile.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-line text-info"></i>
                                <p>Profile</p>
                            </a>
                        </li>



                      
                        <li class="nav-item">
                                <a href="../logout.php" class="nav-link">
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
                    
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">


                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $activeTouristCount; ?></h3>
                                    <p>Tourist</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>

                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $activeBoatsCount; ?></h3>
                                    <p>Active Boat</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-ship"></i>
                                </div>
                                <a href="userboat.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>

                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><?php echo $availableCottages; ?></h3>
                                    <p>Available Cottage</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <a href="usercottage.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>

                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $activeTicketingAgentsCount; ?></h3>
                                    <p>Ticketing Agent</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-secret"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>

                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- Left col -->
                    <!-- <section class="col-lg-7 connectedSortable">  -->
                    <!-- <div class="content-wrapper"> -->
                    <!-- Content Header (Page header) -->

                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Ticket Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="ticketForm" action="../userprocess/ticketInsert.php" method="POST">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Ticket Type -->
                                        <div class="form-group">
                                            <label>Ticket Type</label>
                                            <select class="form-control" id="ticketType" name="ticketType">
                                                <option value="standard">Standard Ticket</option>
                                                <option value="vip">VIP Ticket</option>
                                                <option value="family">Family Ticket</option>
                                            </select>
                                        </div>
                                        <!-- Contact Number -->
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter Contact Number" required>
                                        </div>
                                        <!-- Address -->
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                                        </div>
                                        <!-- Group Name -->
                                        <div class="form-group">
                                            <label>Group Name</label>
                                            <input type="text" class="form-control" id="groupName" name="groupName" placeholder="Enter Group Name" required>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <!-- Boat Selection -->
                                        <div class="form-group">
                                            <label>Boat Selection</label>
                                            <select class="form-control" id="boatSelection" name="boat">
                                                <option value="Duran Duran">Duran Duran</option>
                                                <option value="San Pedro de Nonok">San Pedro de Nonok</option>
                                                <option value="Franklyn">Franklyn</option>
                                                <option value="Lorwinds">Lorwinds</option>
                                                <option value="Island Rose">Island Rose</option>
                                            </select>
                                        </div>
                                        <!-- Stay Type -->
                                        <div class="form-group">
                                            <label>Stay Type</label>
                                            <select class="form-control" id="stayType" name="stayType" required>
                                                <option value="Daytour">Day Tour</option>
                                                <option value="Overnight">Overnight</option>
                                            </select>
                                        </div>

                                        <!-- Date -->
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" id="date" name="date" required>
                                        </div>

                                        <!-- Check-in Time -->
                                        <div class="form-group">
                                            <label>Check-in Time</label>
                                            <input type="time" class="form-control" id="checkinTime" name="checkinTime" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php
                                    // Assuming you already have a database connection established
                                    include '../connection/connection.php';;
                                    // Fetch cottage type counts from the database
                                    $sql = "SELECT cottage_type, cottage_count FROM cottages";
                                    $result = $conn->query($sql);

                                    // Generate the select options based on the database data
                                    $options = "";
                                    while ($row = $result->fetch_assoc()) {
                                        if ($row['cottage_count'] > 0) {
                                            $options .= "<option value='" . $row['cottage_type'] . "'>" . $row['cottage_type'] . "</option>";
                                        }
                                    }
                                    ?>

                                    <!-- HTML part with the dynamically generated options -->
                                    <div class="col-sm-6">
                                        <!-- Cottage Selection -->
                                        <div class="form-group">
                                            <label>Cottage Selection (optional)</label>
                                            <select class="form-control" id="cottageSelection" name="cottageType">
                                                <?php echo $options; ?>
                                            </select>
                                            <small class="text-muted">Note: Cottage availability depends on the specific type, as there are 5 cottages available for each type.</small>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <!-- Time to be Checkout -->
                                        <div class="form-group">
                                            <label>Time to be Checkout</label>
                                            <input type="time" class="form-control" id="timeSchedule" name="timeSchedule" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Common Footer for Both Columns -->
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>




                </div>



                <!-- </div> -->



                <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- ./wrapper -->



    <?php include '../footer.php' ?>



    

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../adminsidebar/activesidebar.js"></script>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
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
    <!-- JQVMap -->
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
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

</html>