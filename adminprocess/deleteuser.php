<?php
include("../connection/connection.php");

// Check if the 'agentid' parameter is present in the URL
if (isset($_GET['agentid'])) {
    $agentid = mysqli_real_escape_string($conn, $_GET['agentid']);

    if (isset($_GET['confirm']) && $_GET['confirm'] === "true") {
        // User has confirmed the delete operation

        // First, delete associated records in the 'boat' table
        // ...

        // Now, delete the user record
        $sqlDeleteUser = "DELETE FROM useraccounts WHERE agentid = $agentid";

        if ($conn->query($sqlDeleteUser) === TRUE) {
            // User record deleted successfully, redirect to the 'ausermanagement.php' page
            header("Location: ../admin/adminticket.php");
            exit; // Ensure that no more content is sent to the browser
        } else {
            echo "Error deleting user record: " . $conn->error;
        }
    } else {
        // Ask the user for confirmation using JavaScript alert
        echo '<html>
            <head>
              <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
            </head>
            <body>
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
              <script>
                Swal.fire({
                  title: "Are you sure?",
                  text: "This action will delete the user. Do you want to proceed?",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel!",
                }).then(function(result) {
                  if (result.isConfirmed) {
                    window.location.href = "deleteuser.php?agentid=' . $agentid . '&confirm=true"; 
                  } else {
                    window.location.href = "../admin/adminticket.php"; 
                  }
                });
              </script>
            </body>
          </html>';
    }
} else {
    echo "No 'agentid' parameter found in the URL.";
}
?>
