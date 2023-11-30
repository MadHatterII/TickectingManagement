<?php

include '../connection/connection.php';

// Function to calculate ticket price
function calculateTicketPrice($stayType, $cottageType = null, $conn)
{
  

    // Check if a cottage type is provided
    if ($cottageType !== null) {
        // Determine the correct price column based on the stay type
        $priceColumn = ($stayType == 'Overnight') ? 'price_overnight' : 'price_day_tour';

        // Fetch the specific cottage price based on the stay type and cottage type
        $priceQuery = "SELECT $priceColumn as cottagePrice FROM cottages WHERE cottage_type = '$cottageType'";
        $priceResult = mysqli_query($conn, $priceQuery);

        if ($priceResult) {
            // Check if there is a row returned
            if ($row = mysqli_fetch_assoc($priceResult)) {
                $cottagePrice = isset($row['cottagePrice']) ? $row['cottagePrice'] : 0;

                // Set the specific cottage price based on the stay type
                $totalPrice = $cottagePrice;
            } else {
                // Handle the case where no row is found for the provided cottage type
                die("Error: No price found for cottage type '$cottageType'");
            }
        } else {
            // Handle the case where the price query fails
            die("Error fetching cottage price: " . mysqli_error($conn));
        }
    }

  

    return $totalPrice;
}

?>
