<?php
include '../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rowId = $_POST['row_id'];
    $newStatus = $_POST['new_status'];

    // Perform the update in the bookings table
    $updateSql = "UPDATE bookings SET status = '$newStatus' WHERE id = $rowId";

    if ($conn->query($updateSql) === TRUE) {
        echo "Status updated successfully";

        // Check if the status is 'out'
        if ($newStatus === 'out') {
            // Retrieve the cottage_type from the bookings table
            $selectSql = "SELECT cottage_type FROM bookings WHERE id = $rowId";
            $result = $conn->query($selectSql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $cottageType = $row['cottage_type'];

                // Check the current cottage_count
                $selectCottageSql = "SELECT cottage_count FROM cottages WHERE cottage_type = '$cottageType'";
                $resultCottage = $conn->query($selectCottageSql);

                if ($resultCottage->num_rows > 0) {
                    $rowCottage = $resultCottage->fetch_assoc();
                    $currentCount = $rowCottage['cottage_count'];

                    // Log the current count for debugging
                    echo "Current Cottage Count: $currentCount\n";

                    // Limit to 5 counts
                    if ($currentCount < 5) {
                        // Increment the cottage_count in the cottages table
                        $updateCottageSql = "UPDATE cottages SET cottage_count = cottage_count + 1 WHERE cottage_type = '$cottageType'";

                        if ($conn->query($updateCottageSql) === TRUE) {
                            echo "Cottage count updated successfully";
                        } else {
                            echo "Error updating cottage count: " . $conn->error;
                        }
                    } else {
                        echo "Cottage count limit reached (5 counts).";
                    }
                } else {
                    echo "Error retrieving cottage count: " . $conn->error;
                }
            } else {
                echo "Error retrieving cottage type: " . $conn->error;
            }
        }

        // Disable the button after it's clicked
        echo "<script>
                  document.querySelector('[data-row-id=\"$rowId\"]').setAttribute('disabled', 'true');
              </script>";
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
