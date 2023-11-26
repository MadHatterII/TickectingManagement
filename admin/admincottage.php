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


  .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 10px;
            margin: 0 5px;
            text-decoration: none;
            background-color: #ddd;
            color: #333;
            border-radius: 4px;
            cursor: pointer;
        }

        .pagination a:hover {
            background-color: #845bb3;
            color: #fff;
        }

        .pagination .active {
            background-color: #3498db;
            color: #fff;
        }
        .status{

          cursor: pointer;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            width: 280x;
        }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Your existing content here -->

    <?php include '../adminsidebar/navbar.php'; ?>
    <?php include '../adminsidebar/cottageside.php'; ?>

    <!-- Sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"> Cottage List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-striped" id="table1">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Cottage Type</th>
                        <th>Cottage Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      include '../connection/connection.php';

                      $limit = 5; // Number of rows per page
                      $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
                      $start = ($page - 1) * $limit; // Starting row number for the current page

                      $query = "SELECT * FROM cottage_details LIMIT $start, $limit";
                      $result = $conn->query($query);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>{$row['id']}</td>";
                          echo "<td>{$row['cottageType']}</td>";
                    
                          $buttonClass = '';

                          if ($row['status']=='available') {
                           // Button for borrowed status
                           $buttonClass = 'available-btn';
                          } elseif ($row['status'] == 'unavailable') {
                            // Button for a specific condition
                           $buttonClass = 'unavailable-btn';
                          } else {
                          // Default button class
                          $buttonClass = 'under_maintenance-btn';
                          }

                        $buttonText='';
                        if ($row['status']=='available') {
                          // Button for borrowed status
                          $buttonTlass = 'available';
                         } elseif ($row['status'] == 'unavailable') {
                           // Button for a specific condition
                          $buttonTlass = 'unavailable';
                         } else {
                         // Default button class
                         $buttonTlass = 'under maintenance';
                         }   
                    
                         echo "<td><div class='status-wrapper'>";
                         echo "<button class='status {$buttonClass}' data-cottage-id='{$row['id']}' data-current-status='{$row['status']}'>{$row['status']}</button>";
                         echo "</div></td>";
                         echo "</tr>";
                        }
                      } else {
                        echo "<tr><td colspan='5'>No data available</td></tr>";
                      }
                    
                      $conn->close();
                    
                    
                    ?>
                    </tbody>
                  </table>

                  <!-- Pagination links -->
                  <?php
                  include '../connection/connection.php';

                  $query = "SELECT COUNT(id) AS total FROM cottage_details";
                  $result = $conn->query($query);
                  $row = $result->fetch_assoc();
                  $totalPages = ceil($row['total'] / $limit);

                  echo "<ul class='pagination'>";
                  for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<li class='pagination'><a class='page-link' href='?page=$i'>$i</a></li>";
                  }
                  echo "</ul>";

                  $conn->close();
                  ?>
                </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>

      <!-- Add the following script at the end of the file -->
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
      <script>
     $(document).ready(function () {
    // Handle click event on status cell
    $('.status').each(function () {
        var id = $(this).data('cottage-id');
        var storedStatus = localStorage.getItem('cottageStatus_' + id);

        if (storedStatus) {
            // Apply styling based on stored status
            updateStatusStyle(id, storedStatus);
        }

        $(this).click(function () {
            var currentStatus = $(this).data('current-status');
            var newStatus = currentStatus === 'available'? 'not available': currentStatus === 'not available'? 'under maintenance': 'available';

            // Perform AJAX request to update the status in the database
            $.ajax({
                url: '../adminprocess/c_update_status.php', // Create this file to handle the update
                type: 'POST',
                data: {
                    id: id,
                    newStatus: newStatus
                },
                success: function (response) {
                    // Display the response from the server (you may modify this part)

                    // Update the status in the table cell
                    $('.status[data-cottage-id="' + id + '"]').text(newStatus);
                    $('.status[data-cottage-id="' + id + '"]').data('current-status', newStatus);

                    // Update button class
                    var buttonClass = newStatus === 'available' ? 'btn-available': newStatus === 'not available'? 'btn-not-available' : 'btn-under-maintenance';

                    $('.status[data-cottage-id="' + id + '"]').removeClass('btn-available btn-not-available btn-under-maintenance').addClass(buttonClass);

                    // Store the updated status in local storage
                    localStorage.setItem('cottageStatus_' + id, newStatus);
                    location.reload();
                },
                error: function (error) {
                    console.log('Error updating status: ', error);
                }
            });
        });
    });

    // Function to update styling based on boat status
    function updateStatusStyle(id, status) {
      var buttonClass;
      if (status === 'available') {
        buttonClass = 'btn-available';
      } else if (status === 'not available') {
        buttonClass = 'btn-not-available';
      } else if (status === 'under maintenance') {
        buttonClass = 'btn-under-maintenance';
      } else {
        // Default case, if status is none of the above
        buttonClass = '';
      }

      $('.status[data-cottage-id="' + id + '"]').removeClass('btn-available btn-not-available btn-under-maintenance').addClass(buttonClass);

      // Update the background color in the table cell
      var colorCode = getStatusColorCode(status);
      $('.status[data-cottage-id="' + id + '"]').css('background-color', colorCode);
    }

    // Function to get color code based on status
    function getStatusColorCode(status) {
      var colorCode = '';
      if (status === 'available') {
       
        colorCode = '#3498db'; // Blue color for available status
      } else if (status === 'not available') {
        colorCode = '#e74c3c'; // Red color for not available status
      } else if (status === 'under maintenance') {
        colorCode = '#f39c12'; // Orange color for under maintenance status
      }
      return colorCode;
    }
  });

</script>
<!-- 



    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- ./wrapper -->

  <?php include '../footer.php' ?>
</body>

</html> 