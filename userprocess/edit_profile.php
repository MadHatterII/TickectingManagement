<?php
include '../connection/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have sanitized your input data (for demonstration purposes)
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming you have the agentID in the session
    if (isset($_SESSION['agentID'])) {
        $agentID = $_SESSION['agentID'];

        // Update the user's profile in the 'useraccounts' table
        $sql = "UPDATE useraccounts SET
                FirstName = '$firstName',
                LastName = '$lastName',
                PhoneNumber = '$phoneNumber',
                Birthdate = '$birthdate',
                Address = '$address',
                Email = '$email',
                Username = '$username',
                Password = '$password'
                WHERE agentID = $agentID";

        if ($conn->query($sql) === TRUE) {
            // Profile updated successfully, trigger success toast
            echo "
            <script>
                $(document).ready(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        icon: 'success',
                        title: 'Profile updated successfully'
                    });
                });
            </script>";
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    } else {
        echo "Agent ID not set in the session";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
