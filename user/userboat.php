<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin  | Prices</title>


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
    background-color: #3ea175; /* Header background color */
    color: #fff;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <?php include '../adminsidebar/navbar.php'; ?>

    <?php include '../adminsidebar/boatside.php'; ?>

    <!-- Sidebar -->



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
     
   

<<<<<<< HEAD
=======
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
                                    <a href="userboat.php" class="nav-link active">
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

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Expandable Table</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Boat Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../connection/connection.php';

                                // Sample array of boat names
                                $boatNames = ["Duran Duran", "Lorwinds", "Island Rose", "Franklyn", "San Pedro de Nonok"];

                                // Display boat names with buttons
                                // Display boat names with buttons and modals
          for ($i = 0; $i < count($boatNames); $i++) {
            echo "<tr data-widget='expandable-table' aria-expanded='false'>";
            echo "<td>" . ($i + 1) . "</td>";
            echo "<td>" . $boatNames[$i] . "</td>";
            echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#myModal" . ($i + 1) . "'>Perform Action " . ($i + 1) . "</button></td>";
            echo "</tr>";

            // Modal for each button
            echo "<div class='modal fade' id='myModal" . ($i + 1) . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>"; 
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='exampleModalLabel'>Modal " . ($i + 1) . "</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "Modal content for boat " . ($i + 1);
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
            echo "<button type='button' class='btn btn-primary'>Save changes</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
                                // Close the database connection
                                $conn->close();
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>



                <!-- /.card-body -->
        </div>
        <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
>>>>>>> 5c9f14cd12b467138a3230c0600b64d8d770be51
    <!-- /.content-wrapper -->
    

    </div>
  </div>
  <!-- ./wrapper -->
        <h4>Boat Types</h4>
      
        <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-body">
                <h5 class="card-title">San Pedro de Nonok</h5>
                <button class="btn btn-primary" data-toggle="modal" data-target="#sanpedrodenonokModal">View Details</button>
              </div>
            </div>
          </div>
      
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Speedboat</h5>
                <button class="btn btn-primary" data-toggle="modal" data-target="#lordwindsModal">View Details</button>
              </div>
            </div>
          </div>
      
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Canoe</h5>
                <button class="btn btn-primary" data-toggle="modal" data-target="#islandroseModal">View Details</button>
              </div>
            </div>
          </div>
        </div>
<br>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Duran-Duran</h5>
                <button class="btn btn-primary" data-toggle="modal" data-target="#duranduranModal">View Details</button>
              </div>
            </div>
          </div>
      
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Kayak</h5>
                <button class="btn btn-primary" data-toggle="modal" data-target="#franklynModal">View Details</button>
              </div>
            </div>
          </div>
      
    
       <!-- sanpedrodenonok Modal -->
<div class="modal fade" id="sanpedrodenonokModal" tabindex="-1" role="dialog" aria-labelledby="sanpedrodenonokModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sanpedrodenonokModalLabel">San Pedro de Nonok Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                // Include your database connection code here
                include 'connection.php';

                // Perform a SELECT query to retrieve data for Sailboat
                $sql = "SELECT group_name FROM bookings WHERE boat = 'San Pedro de Nonok' LIMIT 1";
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                    die("Error: " . mysqli_error($conn));
                }

                // Check if there are rows returned
                if ($row = mysqli_fetch_assoc($result)) {
                    // Display San Pedro de Nonok details
                    echo '<p>Group Name: ' . $row['group_name'] . '</p>';
                    // Add more details as needed
                } else {
                    // No rows found
                    echo '<p>No details found for San Pedro de Nonok</p>';
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
      
        <!-- Speedboat Modal -->
        <div class="modal fade" id="speedboatModal" tabindex="-1" role="dialog" aria-labelledby="speedboatModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="sapeedboatModalLabel">Speedboat Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <?php
                // Include your database connection code here
                include 'connection.php';

                // Perform a SELECT query to retrieve data for Sailboat
                $sql = "SELECT group_name FROM bookings WHERE group_name = 'Group 20' LIMIT 1";
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                    die("Error: " . mysqli_error($conn));
                }

                // Display Speedboatboat details
                $row = mysqli_fetch_assoc($result);
                echo '<p>Group Name: ' . $row['group_name'] . '</p>';
                // Add more details as needed

                // Close the database connection
                mysqli_close($conn);
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        <!-- Speedboat modal content here -->
        </div>
      
        <!-- Canoe Modal -->
        <div class="modal fade" id="canoeModal" tabindex="-1" role="dialog" aria-labelledby="canoeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="canoeModalLabel">Canoe Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <?php
                // Include your database connection code here
                include 'connection.php';

                // Perform a SELECT query to retrieve data for Sailboat
                $sql = "SELECT group_name FROM bookings WHERE group_name = 'asd' LIMIT 1";
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                    die("Error: " . mysqli_error($conn));
                }

                // Display Canoeboatboat details
                $row = mysqli_fetch_assoc($result);
                echo '<p>Group Name: ' . $row['group_name'] . '</p>';
                // Add more details as needed

                // Close the database connection
                mysqli_close($conn);
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        <!-- Canoe modal content here -->
        </div>
      
        <!-- Duran-Duran Modal -->
        <div class="modal fade" id="duranduranModal" tabindex="-1" role="dialog" aria-labelledby="duranduranModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="duranduranModalLabel">Duran-Duran Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <?php
                // Include your database connection code here
                include 'connection.php';

                // Perform a SELECT query to retrieve data for Sailboat
                $sql = "SELECT group_name FROM bookings WHERE group_name = 'tdytd' LIMIT 1";
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                    die("Error: " . mysqli_error($conn));
                }

                // Display Duran-Duranboat details
                $row = mysqli_fetch_assoc($result);
                echo '<p>Group Name: ' . $row['group_name'] . '</p>';
                // Add more details as needed

                // Close the database connection
                mysqli_close($conn);
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        <!-- Duran-Duran modal content here -->
        </div>
        
      </div>
    </div>
    <!-- Kayak Modal -->
    <div class="modal fade" id="kayakModal" tabindex="-1" role="dialog" aria-labelledby="kayakModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="kayakModalLabel">Kayak Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <?php
                // Include your database connection code here
                include 'connection.php';

                // Perform a SELECT query to retrieve data for Sailboat
                $sql = "SELECT group_name FROM bookings WHERE group_name = 'Group 13' LIMIT 1";
                $result = mysqli_query($conn, $sql);

                // Check if the query was successful
                if (!$result) {
                    die("Error: " . mysqli_error($conn));
                }

                // Display Kayakboat details
                $row = mysqli_fetch_assoc($result);
                echo '<p>Group Name: ' . $row['group_name'] . '</p>';
                // Add more details as needed

                // Close the database connection
                mysqli_close($conn);
                ?>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        <!-- Canoe modal content here -->
        </div>
        
      </div>
    </div>
    </main>
    <!-- Footer -->
    <?php include '../footer.php' ?>






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