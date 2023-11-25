<?php
include 'countcard.php';


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Agents</title>


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

    label {
        color: black;
    }

    .user-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }
    
    
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <?php include '../adminsidebar/navbar.php'; ?>

        <?php include '../adminsidebar/agentside.php'; ?>

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
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                    <?php
                    include '../connection/connection.php';

                    // Fetch and display all registered accounts from the database
                    $sql = "SELECT FirstName, LastName, Email, Username, agentID,Role, PhoneNumber FROM Useraccounts";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query was successful
                    if (!$result) {
                        die("Error: " . mysqli_error($conn));
                    }

                    ?>

                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Projects</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">
                                            #
                                        </th>
                                        <th style="width: 20%">
                                            Full Name
                                        </th>
                                        <th style="width: 20%">
                                            Username
                                        </th>
                                        <th style="width: 20%">
                                            Email
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Phone Number
                                        </th>
                                        <th style="width: 20%">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rowNumber = 1;

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";

                                        echo "<td>" . $rowNumber . "</td>"; // Display the row number
                                        echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
                                        echo "<td>" . $row['Username'] . "</td>";
                                        echo "<td>" . $row['Email'] . "</td>";
                                        echo "<td>" . $row['PhoneNumber'] . "</td>";

                                        echo '<td class="project-actions text-right">
                                                <a class="btn btn-primary btn-sm" href="#">
                                                    <i class="fas fa-folder"></i> View
                                                </a>
                                                <a class="btn btn-info btn-sm UpdateBtn" data-toggle="modal"  data-target="#modal-xl" href="#" data-agentid="' . $row['agentID'] . '">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                                 </a>
                                            
                                                <a class="btn btn-danger btn-sm" href="../adminprocess/deleteuser.php?agentid=' . $row['agentID'] . '">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </td>';

                                        echo "</tr>";

                                        $rowNumber++;
                                    }
                                    ?>

                                    </tr>


                                    <div class="modal fade" id="modal-xl">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Profile</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="editform" action="../adminprocess/updateagent.php" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="agentID" id="editAgentID">
                                                                <div class="form-group">
                                                                    <label for="firstName">First Name</label>
                                                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="lastName">Last Name</label>
                                                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phoneNumber">Phone Number</label>
                                                                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="birthdate">Birthday</label>
                                                                    <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Enter birthdate">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="address">Address</label>
                                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email address</label>
                                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="username">Username</label>
                                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="file">Upload Profile</label>
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="file" name="file">
                                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-info btn-sm" id="updateBtn">Update</button>
                                                    <!-- <a class="btn btn-info btn-sm UpdateBtn" data-toggle="modal" data-target="#modal-xl" href="#" data-agentid="' . $row['agentID'] . '">
                        <i class="fas fa-pencil-alt"></i> Edit
                    </a> -->


                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                        Launch Large Modal
                    </button>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <?php include '../footer.php' ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->



    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Ticketing Agent</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addform" action="../adminprocess/process_add.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php ?>" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthdate">Birthday</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Enter phone number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="username">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="file">Upload Profile</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 " id="roleFormGroup">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="Ticketing Agent">Ticketing Agent</option>
                                        <!-- Add other role options if needed -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="card-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Add User</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>






    <!-- Your HTML form goes here -->

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



    <!-- Your HTML code remains the same -->

    <script>
        $(document).ready(function() {
            // Set the agentID when the Edit button is clicked
            $('.UpdateBtn').click(function() {
                var agentID = $(this).data('agentid');
                console.log('Agent ID:', agentID);

                // Set the text of the displayAgentID element
                $('#displayAgentID').text('Agent ID: ' + agentID);

                // Set the agentID in the hidden input
                $('#editAgentID').val(agentID);

                // Make an AJAX request to fetch data for the specified agentID
                $.ajax({
                    type: 'POST',
                    url: '../adminprocess/fetchdata.php', // Replace with the actual server endpoint
                    data: {
                        agentID: agentID
                    },
                    success: function(response) {
                        console.log('Response:', response);

                        // Assuming your server returns a JSON object with user data
                        var userData = JSON.parse(response);
                        console.log('User Data:', userData);

                        // Populate the form fields with the retrieved data
                        $('#firstName').val(userData.firstName);
                        $('#lastName').val(userData.lastName);
                        $('#phoneNumber').val(userData.phoneNumber);
                        $('#birthdate').val(userData.birthdate);
                        $('#address').val(userData.address);
                        $('#email').val(userData.email);
                        $('#username').val(userData.username);
                        // Password field might not be pre-filled for security reasons

                        // Open the modal
                        $('#modal-xl').modal('show');
                    },
                    error: function(error) {
                        console.log('Error fetching user data:', error);
                    }
                });
            });

            // Handle the Update button click using AJAX
            $('#updateBtn').click(function() {
                $.ajax({
                    type: 'POST',
                    url: $('#editform').attr('action'),
                    data: $('#editform').serialize(), // Serialize the form data
                    success: function(response) {
                        if (response === "success") {
                            // Update the UI or provide feedback to the user
                            console.log("User updated successfully!");
                        } else {
                            console.error("Error updating user:", response);
                        }

                        // Optionally, close the modal
                        $('#modal-xl').modal('hide');
                        location.reload(true);
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            });
        });
    </script>




    <!-- The rest of your HTML code remains the same -->






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