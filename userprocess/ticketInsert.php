<?php
include '../connection/connection.php';

// Check if the form's submit button was clicked
if (isset($_POST['submit'])) {
    // Retrieve the form data using the POST array
    $ticketType = $_POST['ticketType'];
    $groupName = $_POST['groupName'];
    $cottageType = $_POST['cottageType'];
    $timeSchedule = $_POST['timeSchedule'];
    $contactNumber = $_POST['contactNumber'];
    $stayType = $_POST['stayType'];
    $address = $_POST['address'];
    $checkIn = $_POST['checkinTime'];
    $date = $_POST['date'];
    $boat = $_POST['boat'];


    // Check if the group name already exists in the database
    $checkGroupNameSql = "SELECT COUNT(*) FROM bookings WHERE group_name = '$groupName'";
    $checkGroupNameResult = $conn->query($checkGroupNameSql);

    // If the group name already exists, display an error message and stay on the same page
    if ($checkGroupNameResult->fetch_row()[0] > 0) {
        echo "<script>
                alert('Group name already exists!');
                window.location.href = '../user/userticket.php'; 
              </script>";
        return;
    }

    // If the group name does not exist, insert the data into the database
    $sql = "INSERT INTO bookings (ticket_type, group_name, cottage_type, checkinTime, checkoutTime, contact_number, address, stayType, date,boat) 
            VALUES ('$ticketType', '$groupName', '$cottageType','$checkIn', '$timeSchedule', '$contactNumber', '$address', '$stayType','$date','$boat')";

    // Execute the query and store the result
    $result = $conn->query($sql);

    // Check if the insert was successful
    if ($result) {
      // Update the cottage_count for the selected cottage_type
      $updateCottageCountSql = "UPDATE cottages SET cottage_count = cottage_count - 1 WHERE cottage_type = ?";
      
      // Use prepared statements to prevent SQL injection
      $stmt = $conn->prepare($updateCottageCountSql);
      $stmt->bind_param("s", $cottageType);
      $stmt->execute();
      $stmt->close();
  
      // If successful, display an alert and redirect
      $encodedGroupName = urlencode($groupName);
      ?>
      <!DOCTYPE html>
      <html>
      <head>
          <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
      </head>
      <body>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <script>
              Swal.fire({
                  title: "Success!",
                  text: "Ticket submitted. Add members.",
                  icon: "success", // Change the icon to "success"
                  confirmButtonText: "OK"
              }).then(function() {
                  window.location.href = "../user/addmember.php?groupName=<?php echo $encodedGroupName; ?>";
              });
          </script>
      </body>
      </html>
      <?php
        
       
    } else {
        // If not successful, display an alert and stay on the same page
        echo '<html>
        <head>
          <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        </head>
        <body>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <script>
            Swal.fire({
              title: "Error!",
              text: "Error inserting ticket",
              icon: "error",
              confirmButtonText: "OK"
            }).then(function() {
              window.location.href = "../user/userticket.php"; 
            });
          </script>
        </body>
      </html>';
     
    }

    // Close the database connection
    $conn->close();
}
?>
