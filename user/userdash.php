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


    // cottage query
    $totalCottages = 20;
    $sql1 = "SELECT COUNT(cottage_type) as cottage FROM bookings WHERE status = 'IN'";

    // Execute the query and store the result in a variable
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $bookedCottages = $row['cottage'];



    $activeAvailableCottagesCount = $totalCottages - $bookedCottages;

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
        <title>User | Dashboard</title>


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
    </style>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div>

            <?php include '../userside/nav.php'; ?>

             <!-- Main Sidebar Container -->
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
                                    <a href="userdash.php" class="nav-link active ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                        <a href="userticket.php" class="nav-link" >
                                            <i class="far fa-user nav-icon"></i>
                                            <p>Ticket Form</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="viewticket.php" class="nav-link ">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>View Ticket</p>
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
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    
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
                                        <h3><?php echo $activeAvailableCottagesCount; ?></h3>
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
                        <div class="row">

                            <!-- Left col -->
                            <section class="col-lg-7 connectedSortable">
                                <!-- Custom tabs (Charts with tabs)-->
                                <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="../img/canigao1.jpg" class="d-block w-100" alt="Image 1">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../img/canigao2.jpg" class="d-block w-100" alt="Image 2">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../img/canigao3.jpg" class="d-block w-100" alt="Image 3">
                                        </div>
                                        <!-- Add more items if needed -->
                                    </div>
                                    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </section>

                            <!-- /.Left col -->
                            <!-- right col (We are only adding the ID to make the widgets sortable)-->
                            <section class="col-lg-5 connectedSortable">

                                <!-- solid sales graph -->
                                <div class="card bg-gradient-info">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">
                                            <img src="../img/canigs.png" class="img-circle elevation-2" alt="LOGO" style="width: 50px; height: 50px;">
                                            CANIGAO ISLAND DESCRIPTION
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-content">
                                            <p>
                                                Canigao Island is uninhabited, featuring a lighthouse as its only significant man-made structure.
                                                The beaches have white sand, with tropical sea creatures and extensive coral reef in the surrounding waters.
                                                The climate is tropical and similar to that found in other areas of the Philippine islands.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer bg-transparent">
                                        <div class="row">
                                            <!-- Additional content or elements can be added here -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.card-footer -->
                                </div>

                                <!-- /.card -->

                            </section>

                            <!-- right col -->
                        </div>
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
           <?php include '../footer.php' ?>

        
        </div>
        <!-- ./wrapper -->










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
    </body>

    </html>