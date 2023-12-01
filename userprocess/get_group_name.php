<?php
include '../connection/connection.php';

// Check if boatName is provided in the GET request
if (isset($_GET['boatName'])) {
    // Get boat name from the GET request
    $boatName = $_GET['boatName'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT group_name FROM bookings WHERE boat = ? ORDER BY group_name DESC");
    $stmt->bind_param("s", $boatName);

    // Execute the prepared statement
    $stmt->execute();

    // Bind the result variable
    $stmt->bind_result($groupName);

    // Initialize counter
    $counter = 1;

    // Start building the table
    $groupTable = '<table class="table table-bordered table-hover" style="text-align: center;"><thead><tr><th>#</th><th>Group Name</th></tr></thead><tbody>';

    // Fetch all results and append table rows
    while ($stmt->fetch()) {
        $groupTable .= '<tr><td>' . $counter . '</td><td>' . $groupName . '</td></tr>';
        $counter++;
    }

    // Complete the table
    $groupTable .= '</tbody></table>';

    // Close the statement
    $stmt->close();

    // Output the HTML for the table
    echo $groupTable;
} else {
    // If boatName is not provided in the GET request, output an error message
    echo "Boat name not provided.";
}

// Close the database connection
$conn->close();
?>
