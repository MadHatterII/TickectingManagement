<?php
include '../connection/connection.php';


    // // Retrieve data from the form
    // $data = $_GET['data']; //array type
    // $agentID = $data[0]['value'];
    // $firstName = $data[1]['value'];
    // $lastName = $data[2]['value'];
    // $phoneNumber = $data[3]['value'];
    // $birthdate =  $data[44]['value'];
    // $address =  $data[5]['value'];
    // $email =  $data[6]['value'];
    // $username =  $data[7]['value'];



    // // Update user information in the database
    // $sql = "UPDATE Useraccounts SET
    //         FirstName = '$firstName',
    //         LastName = '$lastName',
    //         PhoneNumber = '$phoneNumber',
    //         Birthdate = '$birthdate',
    //         Address = '$address',
    //         Email = '$email',
    //         Username = '$username'
    //         WHERE agentID = $agentID";

    // $result = mysqli_query($conn, $sql);

    // if ($result) {
    //     // Successful update
    //     header("Location: ../dashboard.php"); // Redirect to the dashboard or another page
    //     exit();
    // } else {
    //     // Handle errors
    //     echo "Error updating user information: " . mysqli_error($conn);
    // }
 

    
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
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request";
    }

    
?>
