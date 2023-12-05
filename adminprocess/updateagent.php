<?php
include '../connection/connection.php';


   
 

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the values from the form
        $agentID = $_POST['agentID'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phoneNumber = $_POST['phoneNumber'];
        $birthdate = $_POST['birthdate'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $updateQuery = "UPDATE Useraccounts SET FirstName='$firstName', LastName='$lastName', PhoneNumber='$phoneNumber', Birthdate='$birthdate', Address='$address', Email='$email', Username='$username', Password='$password' WHERE agentID='$agentID'";
    
        if (mysqli_query($conn, $updateQuery)) {
            
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request";
    }

    
?>
