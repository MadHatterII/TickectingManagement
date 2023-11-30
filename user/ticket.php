<?php

include '../connection/connection.php';
include '../userprocess/calculateticket.php';

$sql = "SELECT  stayType,cottage_type FROM bookings ORDER BY id DESC LIMIT 1";;

// Execute the query 
$result = $conn->query($sql);

// Fetch the data
if ($result->num_rows > 0) {
    
    // Output data from each row
    while($row = $result->fetch_assoc()) {

        // Assign to variables 
        $cottageType = $row['cottage_type'];
        $stayType = $row['stayType'];
        
  

// Fetch the latest groupName from the members table
$latestGroupNameQuery = "SELECT groupName FROM members ORDER BY id DESC LIMIT 1";
$latestGroupNameResult = mysqli_query($conn, $latestGroupNameQuery);

// Check if the query was successful
if (!$latestGroupNameResult) {
    die("Error fetching latest groupName: " . mysqli_error($conn));
}

// Fetch the latest groupName
$latestGroupName = '';
if ($row = mysqli_fetch_assoc($latestGroupNameResult)) {
    $latestGroupName = isset($row['groupName']) ? $row['groupName'] : '';
}

// Count the number of members with the same groupName
if (!empty($latestGroupName)) {
    $countMembersQuery = "SELECT COUNT(*) as memberCount FROM members WHERE groupName = '$latestGroupName'";
    $countMembersResult = mysqli_query($conn, $countMembersQuery);

    // Check if the query was successful
    if (!$countMembersResult) {
        die("Error counting members with the latest groupName: " . mysqli_error($conn));
    }

    // Fetch the member count
    $memberCount = 0;
    if ($row = mysqli_fetch_assoc($countMembersResult)) {
        $memberCount = isset($row['memberCount']) ? $row['memberCount'] : 0;
    }

    // Fetch the sum of all amounts from the fee table
    $sumAmountQuery = "SELECT SUM(amount) as totalAmount FROM fee";
    $sumAmountResult = mysqli_query($conn, $sumAmountQuery);

    // Check if the query was successful
    if (!$sumAmountResult) {
        die("Error fetching sum of amounts: " . mysqli_error($conn));
    }

    // Fetch the total sum amount
    $totalAmount = 0;
    if ($row = mysqli_fetch_assoc($sumAmountResult)) {
        $totalAmount = isset($row['totalAmount']) ? $row['totalAmount'] : 0;
    }

    // Use the calculateTicketPrice function to get the ticket price based on stayType and cottageType
   
    $ticketPrice = calculateTicketPrice($stayType, $cottageType, $conn);

    // Multiply $totalAmount with the member count
    $totalAmount *= $memberCount;
    $grandTotal = $totalAmount + $ticketPrice;

    $sql = "INSERT INTO ticket (groupName, entryFee, cottageFee, totalAmount) VALUES ('$latestGroupName', '$totalAmount', '$ticketPrice', '$grandTotal')";
    
    // Execute the query
    $insertResult = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$insertResult) {
        die("Error inserting into ticket table: " . mysqli_error($conn));
    } else {
        echo "Ticket record inserted successfully!";
    }
} else {
    echo "Latest groupName not found.";
}
}
    
}
?>
