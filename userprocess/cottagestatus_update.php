<?php
// Include your database connection file
include('../connection/connection.php');

if (isset($_GET['cottageType']) && isset($_GET['currentStatus']) && isset($_GET['id'])) {
    $cottageType = $_GET['cottageType'];
    $currentStatus = $_GET['currentStatus'];
    $id = $_GET['id'];

    // Assuming 'status' is the column in your database table that stores the 'IN' or 'OUT' values
    $newStatus = ($currentStatus == 'IN') ? 'OUT' : 'IN';

    // Update the database
    $updateQuery = "UPDATE bookings SET status = '$newStatus' WHERE cottage_type = '$cottageType' AND id = '$id'";
    
    if ($conn->query($updateQuery) === TRUE) {
        echo $newStatus; // Return the updated status to the JavaScript for display
    } else {
        echo 'Error updating record: ' . $conn->error;
    }
} else {
    echo 'Invalid parameters';
}

// Close the database connection
$conn->close();
?>
