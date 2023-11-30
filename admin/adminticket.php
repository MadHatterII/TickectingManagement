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



    /* Additional styles for the modal */
    #modal-default .modal-content {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: system-ui;
        text-transform: capitalize;
        text-align: center;
        padding: 20px 30px;
        border-radius: 20px;
        border: 1px rgba(211, 211, 211, 0.486) solid;
        transition: 0.6s;
    }

    #viewModalBody {
        text-align: center;
        color: #333;
    }

    .user-details {
        text-align: left;
        /* Adjust this if you want the details to be left-aligned */
        color: #333;
    }

    .user-details p {
        display: list-item;
        margin-right: 20px;
        /* Adjust the spacing between values */
    }

    .user-details img {
        display: block;
        margin: 0 auto;
        /* Center-align the image */
    }

    #modal-default .modal-content:hover {
        transition: 0.6s;
        box-shadow: 5px 5px 20px;
    }

    #modal-default .modal-content img {
        transition: 0.2s;
        width: 120px;
        border-radius: 50%;
        margin-bottom: 10px;
        padding: 2px;
    }

    #modal-default .modal-content:hover img {
        transition: 0.2s;
        outline: 4px solid grey;
    }

    #modal-default .modal-content p {
        color: #333;
    }

    #modal-default .modal-header {
        background-color: #007bff;
        /* Change header background color as needed */
        color: #ffffff;
        /* Change header text color as needed */
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
                                <a href="adminboat.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <a href="admincottage.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <a href="adminticket.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>

                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <?php
                    include '../connection/connection.php';

                    // Define the number of rows per page
                    $rowsPerPage = 5;

                    // Calculate the OFFSET based on the current page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $rowsPerPage;

                    // Fetch and display all registered accounts from the database with pagination
                    $sql = "SELECT FirstName, LastName, Email, Username, agentID, Role, PhoneNumber FROM Useraccounts ORDER BY agentID DESC LIMIT $rowsPerPage OFFSET $offset";
                    $result = mysqli_query($conn, $sql);

                    // Check if the query was successful
                    if (!$result) {
                        die("Error: " . mysqli_error($conn));
                    }

                    // Calculate the total number of rows in the table
                    $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM Useraccounts"));

                    // Calculate the total number of pages
                    $totalPages = ceil($totalRows / $rowsPerPage);

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
                                    $rowNumber = ($page - 1) * $rowsPerPage + 1;

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";

                                        echo "<td>" . $rowNumber . "</td>"; // Display the row number
                                        echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
                                        echo "<td>" . $row['Username'] . "</td>";
                                        echo "<td>" . $row['Email'] . "</td>";
                                        echo "<td>" . $row['PhoneNumber'] . "</td>";

                                        // Pass user details as data attributes
                                        echo '<td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm viewBtn" href="#" data-toggle="modal" data-target="#modal-default"
                                        data-agentid="' . $row['agentID'] . '">
                                            <i class="fas fa-folder"></i> View
                                        </a>
                                        <a class="btn btn-info btn-sm UpdateBtn" data-toggle="modal" data-target="#modal-xl" href="#" data-agentid="' . $row['agentID'] . '">
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
                                </tbody>
                            </table>


                            <!-- Pagination links -->
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <?php
                                    // Display previous page link
                                    if ($page > 1) {
                                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">&laquo;</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><span class="page-link">&laquo;</span></li>';
                                    }

                                    // Display page links
                                    for ($i = 1; $i <= $totalPages; $i++) {
                                        echo '<li class="page-item';
                                        if ($i == $page) {
                                            echo ' active';
                                        }
                                        echo '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                    }

                                    // Display next page link
                                    if ($page < $totalPages) {
                                        echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">&raquo;</a></li>';
                                    } else {
                                        echo '<li class="page-item disabled"><span class="page-link">&raquo;</span></li>';
                                    }
                                    ?>
                                </ul>
                            </div>

                            <?php
                            // Close your database connection
                            mysqli_close($conn);
                            ?>


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
    <!-- Updated modal -->
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
                            <!-- Include other form fields as needed -->

                            <!-- Password field -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Enter new password">
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
                            <!-- File input with dynamic label -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="file">Upload Profile</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file">
                                            <label class="custom-file-label" for="file">Choose file</label>
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
                </div>
            </div>
        </div>
    </div>


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


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="">
                    <h4 class="modal-title">User Profile</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="viewModalBody">
                    <!-- AJAX content will be loaded here -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
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
            url: '../adminprocess/get_user_edit.php', // Update with the correct path
            data: {
                agentID: agentID
            },
            success: function(response) {
                console.log('Response:', response);

                try {
                    // Attempt to parse the response as JSON
                    var userData = JSON.parse(response);

                    // Check if userData is not null and contains the expected properties
                    if (userData && userData.FirstName !== undefined && userData.LastName !== undefined) {
                        // Populate the form fields with the retrieved data
                        $('#firstName').val(userData.FirstName);
                        $('#lastName').val(userData.LastName);
                        $('#phoneNumber').val(userData.PhoneNumber);
                        $('#birthdate').val(userData.Birthdate);
                        $('#address').val(userData.Address);
                        $('#email').val(userData.Email);
                        $('#username').val(userData.Username);
                        $('#password').val(userData.Password); // Assuming password is included in the JSON

                        // Open the modal
                        $('#modal-xl').modal('show');
                    } else {
                        console.error('Invalid user data format:', userData);
                        // Add additional error handling if needed
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                    // Add additional error handling if needed
                }
            },
            error: function(error) {
                console.log('Error fetching user data:', error);
            }
        });
    });

    $('#updateBtn').click(function() {
        console.log('Update button clicked');
        $.ajax({
            type: 'POST',
            url: $('#editform').attr('action'),
            data: $('#editform').serialize(), // Serialize the form data
            success: function(response) {
                console.log('Ajax request success. Response:', response);
                if (response === "success") {
                    // Add success alert to the page
                    console.log('Updating success alert');
                    var successAlert = `
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                            User updated successfully.
                        </div>
                    `;
                    console.log('Alert Container:', $('#alertContainer'));
                    $('#alertContainer').html(successAlert).show(); // Show the alert container

                    console.log("User updated successfully!");
                } else {
                    // Add error alert to the page
                    console.log('Updating error alert');
                    var errorAlert = `
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                            Error updating user: ${response}
                        </div>
                    `;
                    console.log('Alert Container:', $('#alertContainer'));
                    $('#alertContainer').html(errorAlert).show(); // Show the alert container

                    console.error("Error updating user:", response);
                }

                // Optionally, close the modal
                $('#modal-xl').modal('hide');
                // location.reload(true); // Commented out for debugging
            },
            error: function(error) {
                console.log('Ajax request error. Error:', error);
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
    
    <!-- jQuery Knob Chart -->
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../plugins/moment/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
   
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
</body>

</html>