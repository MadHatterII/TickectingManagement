<?php
include '../connection/connection.php';


//tourist count

$sql = "SELECT * FROM members";

// Execute the query and store the result in a variable
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}


$activeTouristCount = mysqli_num_rows($result);


// cottage query
$totalCottages = 20;
$sql1 = "SELECT COUNT(cottage_type) as cottage FROM bookings WHERE status = 'IN'";

// Execute the query and store the result in a variable
$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result1);
$bookedCottages = $row['cottage'];



$activeAvailableCottagesCount = $totalCottages - $bookedCottages;

//boat count
$sql2 = "SELECT * FROM boats";

// Execute the query and store the result in a variable
$result2 = mysqli_query($conn, $sql2);

// Check if the query was successful
if (!$result2) {
    die("Error: " . mysqli_error($conn));
}


$activeBoatsCount = mysqli_num_rows($result2);


//ticketing agent count
$sql3 = "SELECT * FROM Useraccounts";

// Execute the query and store the result in a variable
$result3 = mysqli_query($conn, $sql3);

// Check if the query was successful
if (!$result3) {
    die("Error: " . mysqli_error($conn));
}

// Count the active Ticketing Agents
$activeTicketingAgentsCount = mysqli_num_rows($result3);
?>