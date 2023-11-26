<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
/* <<<<<<< Gadiz */
  .status{
    cursor: pointer;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
  }

 
  @media (max-width: 767px) {
  /* Styles for screens smaller than 768px wide */

  /* Adjust the font size for better readability on small screens */
  body {
    font-size: 14px;
  }
=======
/* >>>>>>> main */

  /* Make the sidebar and content full-width for better mobile experience */
  .sidebar, .content-wrapper {
    width: 100%;
  }

  /* Hide some elements or reduce their size to save space */
  /* .navbar {
    display: none; /* or adjust as needed */
  } 


</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Your existing content here -->

    <?php include '../adminsidebar/navbar.php'; ?>
    <?php include '../adminsidebar/boatside.php'; ?>

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
                  <h3 class="card-title">Boat List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Boat Name</th>
                        <th>Owner</th>
                        <th>Capacity</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../connection/connection.php';

                      $query = "SELECT * FROM boats";
                      $result = $conn->query($query);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>{$row['id']}</td>";
                          echo "<td>{$row['boatName']}</td>";
                          echo "<td>{$row['owners_name']}</td>";
                          echo "<td>{$row['capacity']}</td>";
                          
                          echo "<td class='status' data-boat-id='{$row['id']}' data-current-status='{$row['boat_status']}'>{$row['boat_status']}</td>";
                          echo "</tr>";
                        }
                      } else {
                        echo "<tr><td colspan='5'>No data available</td></tr>";
                      }

                      $conn->close();
                      ?>
                    </tbody>
                  </table>
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
        var boatId = $(this).data('boat-id');
        var storedStatus = localStorage.getItem('boatStatus_' + boatId);

        if (storedStatus) {
            // Apply styling based on stored status
            updateStatusStyle(boatId, storedStatus);
        }

        $(this).click(function () {
            var currentStatus = $(this).data('current-status');
            var newStatus = (currentStatus === 'available') ? 'not available' : 'available';

            // Perform AJAX request to update the status in the database
            $.ajax({
                url: '../adminprocess/update_status.php', // Create this file to handle the update
                type: 'POST',
                data: {
                    boatId: boatId,
                    newStatus: newStatus
                },
                success: function (response) {
                    // Display the response from the server (you may modify this part)
                    

                    // Update the status in the table cell
                    $('.status[data-boat-id="' + boatId + '"]').text(newStatus);
                    $('.status[data-boat-id="' + boatId + '"]').data('current-status', newStatus);

                    // Update button class
                    var buttonClass = (newStatus === 'available') ? 'btn-available' : 'btn-not-available';
                    $('.status[data-boat-id="' + boatId + '"]').removeClass('btn-available btn-not-available').addClass(buttonClass);

                    // Store the updated status in local storage
                    localStorage.setItem('boatStatus_' + boatId, newStatus);
                },
                error: function (error) {
                    console.log('Error updating status: ', error);
                }
            });
        });
    });

    // Function to update styling based on boat status
    function updateStatusStyle(boatId, status) {
        var buttonClass = (status === 'available') ? 'btn-available' : 'btn-not-available';
        $('.status[data-boat-id="' + boatId + '"]').removeClass('btn-available btn-not-available').addClass(buttonClass);
    }
});

</script>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- ./wrapper -->

  <?php include '../footer.php' ?>
</body>

</html> 
