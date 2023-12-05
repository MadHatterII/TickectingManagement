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

    <?php include '../adminsidebar/adminviewlogs.php'; ?>

    <!-- Sidebar -->



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">PRICES</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <div class="card">
          <div class="card-header">
            <h3 class="card-title">Fee's</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
            

                <div class="input-group-append">
                  
                 
                
                </div>
              </div>
            </div>
          </div> 
          <div class="card-body table-responsive p-0">

          <?php
include '../connection/connection.php';

// Pagination variables
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$recordsPerPage = 8;
$offset = ($page - 1) * $recordsPerPage;

// Fetch data from the database with pagination
$sql = "SELECT * FROM user_logs ORDER BY log_id DESC LIMIT $offset, $recordsPerPage";
$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
  echo '<table class="table table-hover text-nowrap">
<thead>
  <tr>
    <th>Log ID</th>
    <th>User ID</th>
    <th>Action Done</th>
    <th>Time</th>
  </tr>
</thead>
<tbody>';

  // Output data of each row
  while ($row = $result->fetch_assoc()) {
    echo '<tr>
      <td>' . $row["log_id"] . '</td>
      <td>' . $row["user_id"] . '</td>
      <td>' . $row["activity_description"] . '</td>
      <td>' . $row["timestamp"] . '</td>
    </tr>';
  }

  echo '</tbody>
</table>';

  // Pagination links
  $sqlCount = "SELECT COUNT(*) as totalRecords FROM user_logs";
  $resultCount = $conn->query($sqlCount);
  $rowCount = $resultCount->fetch_assoc()['totalRecords'];
  $totalPages = ceil($rowCount / $recordsPerPage);

  if ($totalPages > 1) {
    echo '<ul class="pagination justify-content-center">'; // Center pagination

    // Previous button
    if ($page > 1) {
      echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
    }

    // Display only the active pagination number and a few adjacent numbers
    for ($i = max(1, $page - 2); $i <= min($totalPages, $page + 2); $i++) {
      echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
    }

    // Next button
    if ($page < $totalPages) {
      echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
    }

    echo '</ul>';
  }
} else {
  echo "No data found";
}

// Close the connection
$conn->close();
?>


        
      </body>
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