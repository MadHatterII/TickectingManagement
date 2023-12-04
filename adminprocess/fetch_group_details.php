<?php
// fetch_group_details.php

// Include your database connection or any necessary files
include '../connection/connection.php';

// Check if the 'groupName' parameter is set
if (isset($_POST['groupName'])) {
    // Sanitize the input to prevent SQL injection
    $groupName = $conn->real_escape_string($_POST['groupName']);

    // Perform a query to fetch details based on the group name
    $query = "SELECT * FROM members WHERE groupName = '$groupName'";
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result) {
        // Display the details inside a table
        echo '<table class="table">';
        echo '<thead><tr><th>Name</th><th>Email</th></tr></thead>';
        echo '<tbody>';

        // Loop through the results and display each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    } else {
        // Handle the case where the query failed
        echo 'Error executing the query: ' . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where 'groupName' parameter is not set
    echo 'Group name not provided.';
}
?>
