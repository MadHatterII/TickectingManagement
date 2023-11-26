<?php
session_start();
function insertMembers(){
 // Check if the form is submitted
 if (isset($_POST['submitMembers'])) {
    $groupName = $_GET['groupName'];
    $memberCount = $_POST['memberCount'];
    echo "Group Name from URL: " . $groupName;
 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wanderlustdb";
    
    // Create a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $conn->begin_transaction();

    try {
        // Loop through each member's name based on the member count
        for ($i = 0; $i < $memberCount; $i++) {
            // Check if member name is set in the POST array
            if (isset($_POST["memberName"][$i])) {
                // Escape the member name to prevent SQL injection (not recommended for production, use prepared statements instead)
                $memberName = $conn->real_escape_string($_POST["memberName"][$i]);
                // Insert the member name into the database
                $sql = "INSERT INTO members (name,groupName) VALUES ('$memberName','$groupName')";
                // Execute the query
                if (!$conn->query($sql)) {
                    // If there's an error, throw an exception  
                    throw new Exception("Error inserting member $i: " . $conn->error);
                }
            }
        }
        // If no exceptions were thrown, commit the transaction
        $conn->commit();
        
        $user_id = $_SESSION["user_id"];
        $user_description = "Created a Ticket";
        $timestamp = date("Y-m-d H:i:s");
    
        // Insert the log into the user_logs table
        $sql = "INSERT INTO user_logs (user_id, activity_description, timestamp) VALUES (?, ?, ?)";
    
        $log_stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($log_stmt, "iss", $user_id, $user_description, $timestamp);
        mysqli_stmt_execute($log_stmt);

        echo "<script>
        alert('Ticket completed successfully!');
        window.location.href = 'addmember.php'; 
      </script>";
    } catch (Exception $e) {
        // If an exception was thrown, roll back the transaction
        $conn->rollback();
        echo "Transaction failed: " . $e->getMessage();
    }
    // Close the connection
    $conn->close();
}
}

?>