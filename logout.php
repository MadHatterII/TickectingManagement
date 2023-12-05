<?php
// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page (you can change the location as needed)
echo '<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    Swal.fire({
      title: "Success!",
      text: "Logged Out Successfully",
      icon: "success",
      confirmButtonText: "OK"
    }).then(function() {
      window.location.href = "index.php";
    });
  </script>
</body>
</html>';
exit;
?>