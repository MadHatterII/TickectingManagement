<?php
include '../connection/connection.php';

// Get parameters from the AJAX request
$bookingId = $_GET['booking_id'];
$cottageType = $_GET['cottage_type'];

// Update status in the 'bookings' table
$updateStatusQuery = "UPDATE bookings SET status = 'OUT' WHERE id = $bookingId";
$conn->query($updateStatusQuery);

// Add 1 to cottage_count in the 'cottages' table
$updateCottageCountQuery = "UPDATE cottages SET cottage_count = cottage_count + 1 WHERE cottage_type = '$cottageType'";
$conn->query($updateCottageCountQuery);

// Close connection
$conn->close();
?>
