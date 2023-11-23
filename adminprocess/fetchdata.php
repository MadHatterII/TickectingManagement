<?php
include '../connection/connection.php';

if (isset($_POST['agentID'])) {
    $agentID = $_POST['agentID'];

    // Fetch user data from the database based on the agentID
    $query = "SELECT * FROM Useraccounts WHERE agentID = $agentID"; // Adjust the table name as needed
    $result = mysqli_query($conn, $query);

    if ($result) {
        $userData = mysqli_fetch_assoc($result);
        echo json_encode($userData);
    } else {
        echo json_encode(['error' => 'Error fetching user data']);
    }
} else {
    echo json_encode(['error' => 'AgentID not provided']);
}

// Close the database connection
mysqli_close($conn);
?>
