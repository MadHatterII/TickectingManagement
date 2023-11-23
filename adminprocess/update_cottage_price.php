<?php
    include '../connection/connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_price_overnight = $_POST['new_price_overnight'];
        $new_price_day_tour = $_POST['new_price_day_tour'];
        $fee_type = $_POST['fee_type'];

        // Update the database with the new prices
        $sql = "UPDATE cottages SET price_overnight = ?, price_day_tour = ? WHERE cottage_type = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('dds', $new_price_overnight, $new_price_day_tour, $fee_type);
        
        if ($stmt->execute()) {
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
            echo 'Error updating prices: ' . $conn->error;
        }

        $stmt->close();
    }

    // Close the connection
    $conn->close();
?>
