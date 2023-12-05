<?php
include '../connection/connection.php';

if (isset($_GET['groupName'])) {
    $groupName = $_GET['groupName'];

    // Fetch ticket details based on the groupName
    $ticketSql = "SELECT * FROM ticket WHERE groupName = '$groupName'";
    $ticketResult = $conn->query($ticketSql);

    if ($ticketResult->num_rows > 0) {
        $ticketRow = $ticketResult->fetch_assoc();

        // Fetch booking details based on the ticket ID and group_name
        $bookingSql = "SELECT * FROM bookings WHERE group_name = '" . $ticketRow['groupName'] . "'";
        $bookingResult = $conn->query($bookingSql);

      // Display ticket details
echo "<div class='ticket'>";
echo "<h4>Ticket Amount:</h4>";
echo "<p>Group Name: " . $ticketRow['groupName'] . "</p>";
echo "<p>Entrance Fee: ₱" . $ticketRow['entryFee'] . "</p>";
echo "<p>Cottage Fee: ₱" . $ticketRow['cottageFee'] . "</p> <hr>";
echo "<p>Total Amount: ₱" . $ticketRow['totalAmount'] . "</p>";
// Add more fields from the ticket table as needed
echo "</div>";

// Display booking details if available
if ($bookingResult->num_rows > 0) {
    echo "<div class='booking-details'>";
    echo "<h5>Booking Details:</h5>";
            while ($bookingRow = $bookingResult->fetch_assoc()) {
                echo "<p>Booking Date: " . $bookingRow['date'] . "</p>";
                echo "<p>Ticket Type: " . $bookingRow['ticket_type'] . "</p>";

                echo "<p>Contact Number: " . $bookingRow['contact_number'] . "</p>";
                echo "<p>Address: " . $bookingRow['address'] . "</p>";

                echo "<p>Cottage Type: " . $bookingRow['cottage_type'] . "</p>";
                echo "<p>Stay Type: " . $bookingRow['stayType'] . "</p>";

                echo "<p>Check In Time: " . $bookingRow['checkinTime'] . "</p>";
                echo "<p>Check Out Time: " . $bookingRow['checkoutTime'] . "</p>";

                echo "<p>Boat: " . $bookingRow['boat'] . "</p>";
               
                // Add more fields from the bookings table as needed
            }
        } else {
            echo "<p>No booking details available.</p>";
        }
    } else {
        echo "Ticket not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
