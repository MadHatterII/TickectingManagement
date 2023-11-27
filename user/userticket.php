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
                                        <a href="userticket.php" class="nav-link active" >
                                            <i class="far fa-user nav-icon"></i>
                                            <p>Ticket Form</p>
                                        </a>
                                    </li>
                                  

                                </ul>
                            </li>

                        <li class="nav-item">
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
                        <li class="nav-header">MISCELLANEOUS</li>



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

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ticket Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="../userprocess/ticketInsert.php" method="POST">
                    <div class="row">
                        <!-- First Column (col-md-6) -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ticketType">Ticket Type</label>
                                    <select class="form-control" id="ticketType" name="ticketType">
                                        <option value="standard">Standard Ticket</option>
                                        <option value="vip">VIP Ticket</option>
                                        <option value="family">Family Ticket</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="textBox1">Contact Number:</label>
                                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter Contact Number" required>
                                </div>
                                <div class="form-group">
                                    <label for="textBox3">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="groupName">Group Name</label>
                                    <input type="text" class="form-control" id="groupName" name="groupName" placeholder="Group Name  / Group Representative" required>
                                </div>
                            </div>
                        </div>

                        <!-- Second Column (col-md-6) -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Boat</label>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <select class="form-control" id="boat" name="boat">
                                                <option value="standard">Select a Boat</option>

                                                <option value="Duran Duran">Duran Duran</option>
                                                <option value="Franklyn">Franklyn</option>
                                                <option value="Island Rose">Island Rose</option>
                                                <option value="Lorwinds">Lorwinds</option>
                                                <option value="San Pedro  de Nonok">San Pedro de Nonok</option>


                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <fieldset>
    <legend>Stay Type</legend>
    <div class="form-group">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="stayType" id="dayTourRadio" value="Daytour" onchange="updateTimeSchedule()" required>
            <label class="form-check-label" for="dayTourRadio">Day Tour</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="stayType" id="overnightRadio" value="Overnight" onchange="updateTimeSchedule()" required>
            <label class="form-check-label" for="overnightRadio">Overnight</label>
        </div>

    </div>
                                <div class="form-group">
    <label for="cottageTypeDropdown">Cottage Type: </label>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="cottageTypeButton" data-bs-toggle="dropdown" aria-expanded="false">
            Select Cottage
        </button>
        <ul class="dropdown-menu" aria-labelledby="cottageTypeButton">
            <li><a class="dropdown-item"  data-value="Two-Story w/ Attic">Two-Story w/ Attic</a></li>
            <li><a class="dropdown-item"  data-value="Duplex Cottage(Right Side of the Island)">Duplex Cottage(Right Side of the Island)</a></li>
            <li><a class="dropdown-item"  data-value="Duplex Cottage(Left Side of the Island)">Duplex Cottage(Left Side of the Island)</a></li>
            <li><a class="dropdown-item"  data-value="Duplex Cottage(Left Side of the Island)">Tourism Building Room</a></li>
        </ul>
    </div>
    <!-- Hidden input field to store the selected value -->
    <input type="hidden" name="cottageType" id="cottageType" value="" />
  
</div>
                                <div class="form-group">
                                    <label for="timeSchedule">Time Schedule</label>
                                    <select class="form-control" id="timeSchedule" name="timeSchedule">
                                        <option value="">Choose time...</option>
                                        <option value="2:00 P.M.">2:00 P.M.</option>
                                        <option value="2:30 P.M.">2:30 P.M.</option>
                                        <option value="3:00 P.M.">3:00 P.M.</option>
                                        <option value="3:30 P.M.">3:30 P.M.</option>
                                        <option value="4:00 P.M.">4:00 P.M.</option>
                                        <option value="4:30 P.M.">4:30 P.M.</option>
                                        <option value="5:00 P.M.">5:00 P.M.</option>
                                        <option value="5:30 P.M.">5:30 P.M.</option>
                                        <!-- Over Night -->
                                        <option value="6:00 A.M.">6:00 A.M.</option>
                                        <option value="6:30 A.M.">6:30 A.M.</option>
                                        <option value="7:00 A.M.">7:00 A.M.</option>
                                        <option value="7:30 A.M.">7:30 A.M.</option>
                                        <option value="8:00 A.M.">8:00 A.M.</option>
                                        <option value="8:30 A.M.">8:30 A.M.</option>
                                        <option value="9:00 A.M.">9:00 A.M.</option>
                                        <option value="10:30 A.M.">10:30 A.M.</option>
                                        <option value="11:00 A.M.">11:00 A.M.</option>
                                        <option value="12:30 P.M.">12:30 P.M.</option>
                                        <option value="1:00 P.M.">1:00 P.M.</option>
                                    </select>
                                </div>

                                <script>
                                    function updateTimeSchedule() {
                                        var dayTourRadio = document.getElementById("dayTourRadio");
                                        var timeSchedule = document.getElementById("timeSchedule");

                                        if (dayTourRadio.checked) {
                                            // If "Day Tour" is selected, update the select options
                                            timeSchedule.innerHTML = '<option value="">Choose Time for Day Tour</option><option value="2:00 PM">2:00 P.M.</option><option value="2:30 PM">2:30 P.M.</option><option value="3:00 PM">3:00 P.M.</option><option value="3:30 PM">3:30 P.M.</option><option value="4:00 PM">4:00 P.M.</option><option value="4:30 PM">4:30 P.M.</option><option value="5:00 PM">5:00 P.M.</option><option value="5:30 PM">5:30 P.M.</option>';
                                        } else {
                                            // If "Overnight" is selected, update the select options
                                            timeSchedule.innerHTML = '<option value="">Choose Time for Overnight</option><option value="6:00 AM">6:00 A.M.</option><option value="6:30 AM">6:30 A.M.</option><option value="7:00 AM">7:00 A.M.</option><option value="7:30 AM">7:30 A.M.</option><option value="8:00 AM">8:00 A.M.</option><option value="8:30 AM">8:30 A.M.</option><option value="9:00 AM">9:00 A.M.</option><option value="9:30 AM">9:30 A.M.</option><option value="10:00 AM">10:00 A.M.</option><option value="10:30 AM">10:30 A.M.</option><option value="11:00 AM">11:00 A.M.</option><option value="11:30 AM">11:30 A.M.</option><option value="12:00 PM">12:00 P.M.</option><option value="12:30 PM">12:30 P.M.</option><option value="1:00 PM">1:00 P.M.</option>';
                                        }
                                    }


                                    document.addEventListener('DOMContentLoaded', (event) => {
                                        // Get all dropdown items
                                        document.querySelectorAll('.dropdown-item').forEach(item => {
                                            item.addEventListener('click', function(e) {
                                                e.preventDefault(); // Prevent the default anchor behavior
                                                const value = this.getAttribute('data-value'); // Get the data-value of clicked item
                                                // Set the value to the hidden input
                                                document.getElementById('cottageType').value = value;
                                                // Change the button text to the selected item's text
                                                document.getElementById('cottageTypeButton').textContent = value;
                                            });
                                        });
                                    });
                                </script>
                            </div>

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