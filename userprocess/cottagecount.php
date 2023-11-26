<?php
// fetch_cottage_counts.php

// Include the database connection file
include('../connection/connection.php');

// Query the database to get the counts for each cottage type
$sql = "SELECT `cottage_type`, COUNT(*) as `count` FROM `bookings` WHERE `status` = 'OUT' GROUP BY `cottage_type`";
$result = $conn->query($sql);

// Initialize counts for each cottage type with 5 initially
$counts = [
    "Two-Story w/ Attic" => 5,
    "Duplex Cottage(Right Side of the Island)" => 5,
    "Duplex Cottage(Left Side of the Island)" => 5,
    "Tourism Building Room" => 5
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cottageType = $row["cottage_type"];
        $count = $row["count"];

        // Update the count in the $counts array
        $counts[$cottageType] = $count;
    }
}

// Output the counts as JSON
header('Content-Type: application/json');
echo json_encode($counts);
?>
