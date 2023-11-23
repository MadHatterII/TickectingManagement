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

    <?php include '../adminsidebar/priceside.php'; ?>

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
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">



        <!-- /.row -->
        <!-- Main row -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Fee's</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
            

                <div class="input-group-append">
                  
                 
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">

            <?php
            include '../connection/connection.php';

            // Fetch data from the database
            $sql = "SELECT fee_type, amount FROM fee";
            $result = $conn->query($sql);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
              echo '<table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Fee Type</th>
                <th>Amount</th>
               
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';

              // Output data of each row
              while ($row = $result->fetch_assoc()) {
                echo '<tr>
                  <td>' . $row["fee_type"] . '</td>
                  <td>' . $row["amount"] . '</td>
                  <td>
                    <form action="../adminprocess/update_price.php" method="post">
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control"  name="new_price" value="' . $row["amount"] . '" placeholder="New Price">
                        <input type="hidden" name="fee_type" value="' . $row["fee_type"] . '">
                        <span class="input-group-append">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </span>
                      </div>
                    </form>
                  </td>
                </tr>';
              }



              echo '</tbody>
          </table>';
            } else {
              echo "No data found";
            }

            // Close the connection
            $conn->close();
            ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Cottage Prices</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
               

                <div class="input-group-append">
                
                    
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">

          <?php
              include '../connection/connection.php';

              // Fetch data from the database
              $sql = "SELECT id, price_overnight, price_day_tour, cottage_type FROM cottages";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  echo '<table class="table table-hover text-nowrap">
                      <thead>
                          <tr>
                              <th>Cottage Type</th>
                              <th>Price Overnight</th>
                              <th>Price Day Tour</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>';

                  // Output data of each row
                  while ($row = $result->fetch_assoc()) {
                      echo "<tr>
                          <td>{$row['cottage_type']}</td>
                          <td>₱{$row['price_overnight']}</td>
                          <td>₱{$row['price_day_tour']}</td>
                          <td>
                          <form action='../adminprocess/update_cottage_price.php' method='post'>
                          <div class='input-group input-group-sm'>
                              <input type='text' class='form-control' name='new_price_overnight' value='{$row['price_overnight']}' placeholder='New Price Overnight'>
                              <input type='text' class='form-control' name='new_price_day_tour' value='{$row['price_day_tour']}' placeholder='New Price Day Tour'>
                              <input type='hidden' name='fee_type' value='{$row['cottage_type']}'>
                              <!-- Assuming 'cottage_type' is the correct field name -->
                              <span class='input-group-append'>
                                  <button type='submit' class='btn btn-primary'>Update</button>
                              </span>
                          </div>
                      </form>
                      
                          </td>
                      </tr>";
                  }

                  echo '</tbody>
                  </table>';
              } else {
                  echo 'No data found';
              }

              // Close the connection
              $conn->close();
              ?>

          </div>
          <!-- /.card-body -->
        </div>
    </div>


    </section>
    <!-- /.content -->

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