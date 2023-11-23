
<?php
include '../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $boatId = $_POST['boatId'];
    $newStatus = $_POST['newStatus'];

    // Update the status in the database
    $updateQuery = "UPDATE boats SET boat_status = '$newStatus' WHERE id = $boatId";
    $updateResult = $conn->query($updateQuery);

    if ($updateResult) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating status']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}

$conn->close();
?>

