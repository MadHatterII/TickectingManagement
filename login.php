<?php
// Initialize a session
session_start();

// Check if the user is already logged in and redirect them if they are
if (isset($_SESSION["agentID"])) {
    // Check the user type and redirect accordingly
    if ($_SESSION["login_type"] == "admin") {
        header("Location: ./admin/adminhome.php");
    } elseif ($_SESSION["login_type"] == "ticketing_agent") {
        header("Location: ./user/userdash.php");
    }
    exit;
}

// Include the database connection
include "./connection/connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];
    $login_type = $_POST["login_type"];

    // Validate and sanitize inputs (you should use a more robust validation and sanitization method)
    $user = mysqli_real_escape_string($conn, $user);
    $password = mysqli_real_escape_string($conn, $password);

    // Set the ID column name based on login type
    if ($login_type == "admin") {
        $query = "SELECT * FROM admin WHERE username = '$user' AND password = '$password'";
        $id_column = "adminID"; // Use the correct column name for the ID in the admin table
    } elseif ($login_type == "ticketing_agent") {
        $query = "SELECT * FROM useraccounts WHERE username = '$user' AND password = '$password'";
        $id_column = "agentID"; // Use the correct column name for the ID in the useraccounts table
    } else {
        $login_error = "Invalid login type. Please try again.";
    }

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // User exists, log them in and redirect to a welcome page
        $row = mysqli_fetch_assoc($result); // Retrieve user data
        $_SESSION["agentID"] = $row[$id_column]; // Store user ID in the session
        $_SESSION["username"] = $row["FirstName"]; // Store user name in the session
        $_SESSION["lastname"] = $row["LastName"];
        $_SESSION["login_type"] = $login_type; // Store login type in the session

        if ($login_type == "admin") {
            echo '<html>
            <head>
              <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
            </head>
            <body>
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
              <script>
                Swal.fire({
                  title: "Success!",
                  text: "Admin logged in successfully",
                  icon: "success",
                  confirmButtonText: "OK"
                }).then(function() {
                  window.location.href = "admin/adminhome.php";
                });
              </script>
            </body>
          </html>';
            // header("Location: ./admin/adminhome.php");
        } elseif ($login_type == "ticketing_agent") {
            echo '<html>
            <head>
              <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
            </head>
            <body>
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
              <script>
                Swal.fire({
                  title: "Success!",
                  text: "User logged in successfully ",
                  icon: "success",
                  confirmButtonText: "OK"
                }).then(function() {
                  window.location.href = "user/userdash.php";
                });
              </script>
            </body>
          </html>';
            // header("Location: ./user/userdash.php");
        }
        exit;
    } else {
         echo '<html>
        <head>
          <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        </head>
        <body>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <script>
            Swal.fire({
              title: "Error!",
              text: "Invalid Username or Password",
              icon: "error",
              confirmButtonText: "OK"
            }).then(function() {
              window.location.href = "index.php";
            });
          </script>
        </body>
      </html>';
    }
}
?>
