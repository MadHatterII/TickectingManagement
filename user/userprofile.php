<?php
// Assuming you have the necessary PHP logic here to retrieve user data and set it in $row
include '../connection/connection.php';

// You should also include the session start if it's not already done
session_start();

// Check if the user is logged in (agentID is set in the session)
if (!isset($_SESSION['agentID'])) {
    // Redirect to login page or handle not logged in user
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User | Boat</title>


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

    .lawas {
        margin: 0;
        font-family: 'Arial', sans-serif;

    }

    .container {
        max-width: 800px;
        margin: 0 auto;

    }

    .small-btn {
        padding: 5px 10px;
        /* Adjust the padding as needed */
        font-size: 12px;
        /* Adjust the font size as needed */
    }

    h1 {
        font-family: 'Libre Baskerville', serif;
        font-size: 2.5em;
        margin-bottom: 10px;
        color: #2e7d32;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        line-height: 1.2;
        /* Improved line height for better readability */
    }

    /* Add a hover effect for a subtle interaction */
    h1:hover {
        color: #4caf50
            /* Darker green on hover */
    }





    .profile-info {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        position: relative;
        margin-bottom: 20px;
    }

    .with-background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        width: 60%;
        /* Adjust the width as needed */
        background: url('../img/Canigao5.png');
        /* Replace with the path to your image */
        background-size: 1000px;
        /* Adjust as needed */
        background-position: center;
    }


    .info-pair {
        margin-bottom: 15px;
        margin-left: 60%;
        /* Added to move the info to the right */
        padding-left: 20px;
        /* Added to create space between the info and the background */
    }

    .info-pair strong {
        display: block;
        margin-bottom: 0px;

        color: #333;
        /* Dark color for labels */
    }

    .info-pair p {
        margin: 0;
        color: #666;
        /* Slightly lighter color for values */
        font-size: medium;
    }

    .fa {
        margin-right: 5px;
    }

    .edit-button-container {
        text-align: center;
        margin-top: 20px;
    }




    /* Add more styles as needed */
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
                                    <a href="userdash.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="userticket.php" class="nav-link">
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
                                <li class="nav-item ">
                                    <a href="userboat.php" class="nav-link ">
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
                            <a href="userprofile.php" class="nav-link  active">
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
                    <div class="row mb-2">

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
                <div class="lawas">
                    <h1>Ticketing Agent Profile <span> <a class='btn btn-app btn'  data-toggle="modal" data-target="#modal-default">
                                <i class='fas fa-edit'></i> Edit
                            </a></span></h1>
                    <div class="container">

                        <?php
                        include '../connection/connection.php';

                        // Assuming the agent_id is stored in the session
                        if (isset($_SESSION['agentID'])) {
                            $agentID = $_SESSION['agentID'];

                            // Assuming the ticketing agent's information is stored in a table named 'useraccounts'
                            $sql = "SELECT * FROM useraccounts WHERE agentID = $agentID";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<div class='profile-info with-background'>";


                                echo "<div class='info-pair'>";
                                echo "<strong><i class='fas fa-user'></i> First Name:</strong>";
                                echo "<p>" . $row["FirstName"] . "</p>";
                                echo "</div>";

                                echo "<div class='info-pair'>";
                                echo "<strong><i class='fas fa-user'></i> Last Name:</strong>";
                                echo "<p>" . $row["LastName"] . "</p>";
                                echo "</div>";
                                echo "<div class='info-pair'>";
                                echo "<strong><i class='fas fa-phone'></i> Phone:</strong>";
                                echo "<p>" . $row["PhoneNumber"] . "</p>";
                                echo "</div>";

                                echo "<div class='info-pair'>";
                                echo "<strong><i class='fas fa-birthday-cake'></i> Birthdate:</strong>";
                                echo "<p>" . $row["Birthdate"] . "</p>";
                                echo "</div>";

                                echo "<div class='info-pair'>";
                                echo "<strong><i class='fas fa-map-marker'></i> Address:</strong>";
                                echo "<p>" . $row["Address"] . "</p>";
                                echo "</div>";

                                echo "<div class='info-pair'>";
                                echo "<strong><i class='fas fa-envelope'></i> Email:</strong>";
                                echo "<p>" . $row["Email"] . "</p>";
                                echo "</div>";

                                echo "<div class='info-pair'>";
                                echo "<strong><i class='fas fa-user'></i> Username:</strong>";
                                echo "<p>" . $row["Username"] . "</p>";
                                echo "</div>";
                                echo "<div class='info-pair'>";
                                echo "<strong><i class='fas fa-lock'></i> Password:</strong>";
                                echo "<p>" . $row["Password"] . "</p>";

                                echo "</div>";

                                // Add more fields as needed

                                echo "</div>";
                            } else {
                                echo "<p>No data found</p>";
                            }
                        } else {
                            echo "<p>Agent ID not set in the session</p>";
                        }

                        $conn->close();
                        ?>
                    </div>
                </div>

            </section>



            <!-- /.card-body -->
        </div>
        <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include '../footer.php' ?>



    <!-- ./wrapper -->




    <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your form content goes here -->
                <form action="../userprocess/edit_profile.php" method="post" ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName">First Name:</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $row['FirstName']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastName">Last Name:</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $row['LastName']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number:</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $row['PhoneNumber']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Birthdate:</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $row['Birthdate']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address"><?php echo $row['Address']; ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['Username']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['Password']; ?>">
                    </div>

                    <!-- Add more form fields as needed -->

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
  
</script>




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