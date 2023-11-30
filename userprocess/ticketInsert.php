<?php
include '../connection/connection.php';

// Process the first form (ticket information)
if (isset($_POST['submit'])) {
    $ticketType = $_POST['ticketType'];
    $groupName = $_POST['groupName'];
    $cottageType = $_POST['cottageType'];
    $timeSchedule = $_POST['timeSchedule'];
    $contactNumber = $_POST['contactNumber'];
    $stayType = $_POST['stayType'];
    $address = $_POST['address'];
    $checkIn = $_POST['checkinTime'];
    $date = $_POST['date'];

    $checkGroupNameSql = "SELECT COUNT(*) FROM bookings WHERE group_name = '$groupName'";
    $checkGroupNameResult = $conn->query($checkGroupNameSql);

    if ($checkGroupNameResult->fetch_row()[0] > 0) {
        echo "<script>
                alert('Group name already exists!');
                window.location.href = '../user/userticket.php'; 
              </script>";
        return;
    }

    // Fetch pricing information for the selected cottage type from the database
    $fetchCottagePriceSql = "SELECT * FROM cottages WHERE cottage_type = '$cottageType'";
    $cottagePriceResult = $conn->query($fetchCottagePriceSql);
    $cottagePriceRow = $cottagePriceResult->fetch_assoc();

    $baseTicketPrice = ($stayType == 'Overnight') ? $cottagePriceRow['price_overnight'] : $cottagePriceRow['price_day_tour'];

    $sql = "INSERT INTO bookings (ticket_type, group_name, cottage_type, checkinTime, checkoutTime, contact_number, address, date, stayType, base_ticket_price) 
            VALUES ('$ticketType', '$groupName', '$cottageType','$checkIn', '$timeSchedule', '$contactNumber', '$address','$date', '$stayType', '$baseTicketPrice')";

    $result = $conn->query($sql);

    if ($result) {
        $updateCottageCountSql = "UPDATE cottages SET cottage_count = cottage_count - 1 WHERE cottage_type = '$cottageType'";
        $conn->query($updateCottageCountSql);

        $encodedGroupName = urlencode($groupName);
        echo "<script>
                alert('Ticket submitted. Add members.');
                window.location.href = '../user/addmember.php?groupName=$encodedGroupName'; 
              </script>";
    } else {
        echo "<script>
                alert('Error creating a ticket!');
                window.location.href = '../user/userticket.php'; 
              </script>";
    }

    $conn->close();
}

// Process the second form (add members)
if (isset($_POST['submitMembers'])) {
    $memberNames = $_POST['memberName'];

    foreach ($memberNames as $memberName) {
        $insertMemberSql = "INSERT INTO members (group_name, member_name) VALUES ('$groupName', '$memberName')";
        $conn->query($insertMemberSql);
    }

    // Calculate total price including additional fees for each member
    $totalPrice = calculateTotalPrice($baseTicketPrice, $memberNames);

    echo "<script>
            alert('Members added successfully. Total Price: $totalPrice');
            window.location.href = '../user/confpage.php?totalPrice=$totalPrice';
          </script>";

    $conn->close();
}

function calculateTotalPrice($baseTicketPrice, $memberNames) {
    global $conn;

    // Fetch additional fee information from the database
    $fetchFeeInfoSql = "SELECT * FROM fees";
    $feeInfoResult = $conn->query($fetchFeeInfoSql);

    // Initialize total price with the base ticket price
    $totalPrice = $baseTicketPrice;

    // Iterate through fee information and add fees to the total price
    while ($feeInfoRow = $feeInfoResult->fetch_assoc()) {
        $feeType = $feeInfoRow['fee_type'];
        $amount = $feeInfoRow['amount'];

        // Add the fee for each member
        $totalPrice += $amount * count($memberNames);
    }

    return $totalPrice;
}
?>
