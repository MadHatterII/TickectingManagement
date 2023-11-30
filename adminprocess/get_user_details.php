<?php
include '../connection/connection.php';

if (isset($_POST['agentID'])) {
    $agentID = $_POST['agentID'];

    // Fetch user details from the database
    $sql = "SELECT FirstName, LastName, Email, Username, agentID, Role, PhoneNumber FROM Useraccounts WHERE agentID = $agentID";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Echo the HTML content for the modal body
        echo '<div class="user-details">
        <img src="https://pyxis.nymag.com/v1/imgs/8a1/990/cd4d27fab205553dd1c9d5243b1fe79ffb-16-Chris-Hemsworth.rsquare.w330.jpg" alt="" />
        <table>
            <tr>
                <th>First Name :</th>
                <td>' . $row['FirstName'] . '</td>
            </tr>
            <tr>
                <th>Last Name :</th>
                <td>' . $row['LastName'] . '</td>
            </tr>
            <tr>
                <th>Email :</th>
                <td>' . $row['Email'] . '</td>
            </tr>
            <tr>
                <th>Username :</th>
                <td>' . $row['Username'] . '</td>
            </tr>
            <tr>
                <th>Agent ID :</th>
                <td>' . $row['agentID'] . '</td>
            </tr>
            <tr>
                <th>Role :</th>
                <td>' . $row['Role'] . '</td>
            </tr>
            <tr>
                <th>Phone Number :</th>
                <td>' . $row['PhoneNumber'] . '</td>
            </tr>
        </table>
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
    