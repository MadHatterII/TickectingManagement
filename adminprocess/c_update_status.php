<?php
// update_status.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
    include '../connection/connection.php';

    // Get data from the AJAX request
    $boatId = $_POST['id'];
    $newStatus = $_POST['newStatus'];

    // Update the status in the database
    $updateQuery = "UPDATE cottage_details SET status = '$newStatus' WHERE id = $boatId";

    if ($conn->query($updateQuery) === TRUE) {
        // Send a success response back to the JavaScript
        echo "Status updated successfully";
    } else {
        // Send an error response back to the JavaScript
        echo "Error updating status: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the request is not a POST request, handle accordingly (optional)
    echo "Invalid request method";
}
?>
