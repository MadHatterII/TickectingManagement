<?php
include '../connection/connection.php';

    // Get the new price and fee type from the form
    $newPrice = $_POST["new_price"];
    $feeType = $_POST["fee_type"];

    // Update the price in the database
    $sql = "UPDATE fee SET amount = '$newPrice' WHERE fee_type = '$feeType'";

    if ($conn->query($sql) === TRUE) {
        // echo "Price updated successfully";
        // header("Location: ../admin/adminprice.php");
        echo '<html>
        <head>
          <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        </head>
        <body>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <script>
            Swal.fire({
              title: "Success!",
              text: "Price updated successfully",
              icon: "success",
              confirmButtonText: "OK"
            }).then(function() {
              window.location.href = "../admin/adminprice.php";
            });
          </script>
        </body>
      </html>';
    } else {
        echo "Error updating price: " . $conn->error;
    }

    $conn->close();

?>
