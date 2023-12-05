<?php
// Start the session
session_start();

// Include your database connection file
include_once("../connection/connection.php");

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the session agentID
    $agentID = $_SESSION['agentID'];

    // Get form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform validation and sanitize input data here

    // Update the user profile in the database
    $sql = "UPDATE useraccounts SET 
            FirstName = '$firstName',
            LastName = '$lastName',
            PhoneNumber = '$phoneNumber',
            Birthdate = '$birthdate',
            Address = '$address',
            Email = '$email',
            Username = '$username',
            Password = '$password'
            WHERE agentID = '$agentID'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Update successful
        // Redirect to userprofile.php
        header("Location: ../user/userprofile.php");
        exit();
    } else {
        // Update failed
        echo "Error updating profile: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
