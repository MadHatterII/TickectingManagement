
<?php
include '../adminprocess/customer_side.php';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Fetch data with pagination

?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Prices</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include '../adminsidebar/navbar.php'; ?>
        <?php include '../adminsidebar/customerside.php'; ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Member List</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Group Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php 
                                         $data = fetch_data($page);
                                         
                                         ?>
                                        
                                        </tbody>
                                    </table>
                                    <?php
                                    
                                    displayPaginationLinks($data['currentPage'], $data['totalPages']); 
                             
                                     ?>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Details for <span id="groupNameInModal"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Member names will be displayed here -->
                <ul id="memberList"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Add this JavaScript code wherever appropriate in your HTML -->
<script>
    $(document).ready(function() {
        $('.view-details-btn').click(function() {
            var groupName = $(this).data('groupname');
            
            // Make an AJAX request to fetch member names associated with the group name
            $.ajax({
                url: '../adminprocess/customer_members.php', // Replace with your actual backend endpoint
                method: 'POST',
                data: { groupName: groupName },
                dataType: 'json',
                
                success: function(response) {
                    // Populate the modal body with member names
           
                console.log(response);
                    $('#memberList').html('');
                    $.each(response.memberNames, function(index, value) {
                        $('#memberList').append('<li>' + value + '</li>');
                    });

                    // Update the text content of the groupNameInModal element
                    $('#groupNameInModal').text(groupName);

                    // Open the modal
                    $('#detailsModal').modal('show');
                },
                
                    error: function(xhr, status, error) {
    console.log('Error fetching member names. Status:', status);
    console.log('Error details:', error);

                }
            });
        });
    });
</script>


        <?php include '../footer.php' ?>
       
    </body>

</html>
