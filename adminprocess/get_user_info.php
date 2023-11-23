<?php
// get_user_info.php

include '../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $agentID = $_POST['agentID'];

    $sql = "SELECT * FROM Useraccounts WHERE agentID = $agentID";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Output user information as JSON
        echo json_encode($user);
    } else {
        // Handle errors or return an empty JSON object
        echo json_encode([]);
    }
}
