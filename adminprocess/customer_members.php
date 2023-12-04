<?php
// your_backend_endpoint.php

// Include your database connection
include '../connection/connection.php';

// Handle the AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $groupName = $_POST['groupName'];

    // Implement database query to fetch member names based on the group name
    $memberNames = getMemberNamesFromDatabase($groupName, $conn);

    // Return the data in JSON format
    echo json_encode(['memberNames' => $memberNames]);
    exit();

}

// Function to fetch member names from the database
function getMemberNamesFromDatabase($groupName, $conn) {
    $memberNames = [];

    // Sanitize input to prevent SQL injection
    $groupName = mysqli_real_escape_string($conn, $groupName);

    // Perform the database query
    $query = "SELECT name FROM members WHERE groupName = '$groupName'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch data and create an array of member names
        while ($row = mysqli_fetch_assoc($result)) {
            $memberNames[] = $row['name'];
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle the error if the query fails
        $error = mysqli_error($conn);
        // You might want to log the error or handle it in some way
        // For now, let's add it to the response for debugging
        $memberNames[] = "Error: $error";
    }

    return $memberNames;
}

// Close the database connection
mysqli_close($conn);
?>
