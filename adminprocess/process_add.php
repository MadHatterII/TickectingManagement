<?php
include '../connection/connection.php';

// Initialize response array
$response = array();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $birthdate = $_POST["birthdate"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $role = $_POST["role"];

    // Handle file upload
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES["file"]["tmp_name"]);
    } else {
        // Handle error if file upload fails
        $response['error'] = "Error uploading file.";
        echo json_encode($response);
        exit;
    }

    // Insert data into the database, including the image data
    $sql = "INSERT INTO Useraccounts (FirstName, LastName,Username, Birthdate, Email, Password, PhoneNumber,Role, Address, ProfileImage)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssb", $firstName, $lastName, $username, $birthdate, $email, $password, $phoneNumber,$role, $address, $imageData);
    
    if ($stmt->execute()) {
        header("Location: ../admin/adminticket.php");
    } else {
        $response['error'] = "Error adding record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

// Send JSON response
echo json_encode($response);
?>
