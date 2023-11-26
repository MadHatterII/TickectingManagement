<?php
include '../connection/connection.php';

if (isset($_POST['agentID'])) {
    $agentID = $_POST['agentID'];

    // Fetch user details based on agentID
    $sql = "SELECT FirstName, LastName, Email, Username, agentID, Role, PhoneNumber, Password, Address, Birthdate FROM Useraccounts WHERE agentID = $agentID";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $userData = mysqli_fetch_assoc($result);
        echo json_encode($userData);
    } else {
        echo "Error fetching user data: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>

