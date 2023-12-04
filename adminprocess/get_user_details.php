<?php
include '../connection/connection.php';

// Check for agentID in $_POST
if (isset($_POST['agentID'])) {
    $agentID = $_POST['agentID'];

    // Fetch user details from the database
    $sql = "SELECT FirstName, LastName, Email, Username, agentID, Role, PhoneNumber FROM Useraccounts WHERE agentID = $agentID";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Echo the HTML content for the modal body
        echo '<div class="user-details">
            <div class="profile-image">
                <img src="https://pyxis.nymag.com/v1/imgs/8a1/990/cd4d27fab205553dd1c9d5243b1fe79ffb-16-Chris-Hemsworth.rsquare.w330.jpg" alt="Profile Image" />
            </div>
            <div class="profile-info">
                <p><strong>First Name:</strong> ' . $row['FirstName'] . '</p>
                <p><strong>Last Name:</strong> ' . $row['LastName'] . '</p>
                <p><strong>Email:</strong> ' . $row['Email'] . '</p>
                <p><strong>Username:</strong> ' . $row['Username'] . '</p>
                <p><strong>Agent ID:</strong> ' . $row['agentID'] . '</p>
                <p><strong>Role:</strong> ' . $row['Role'] . '</p>
                <p><strong>Phone Number:</strong> ' . $row['PhoneNumber'] . '</p>
            </div>
        </div>';

    } else {
        // Handle the case where the user is not found
        echo 'User not found';
    }
} else {
    // Handle the case of an invalid request
    echo 'Invalid request';
}
?>
