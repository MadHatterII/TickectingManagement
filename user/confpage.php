<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
    <!-- Add your stylesheets or other head elements here -->
</head>
<body>

    <div>
        <h1>Booking Confirmation</h1>
        
        <?php
        // Retrieve the total price from the URL parameter
        include '../connection/connection.php';
        $totalPrice = isset($_GET['totalPrice']) ? $_GET['totalPrice'] : 'N/A';

        // Display the total price
        echo "<p>Total Price: $totalPrice</p>";
        ?>

        <!-- Add other confirmation details or messages as needed -->
    </div>

    <!-- Add your scripts or other body elements here -->

</body>
</html>
