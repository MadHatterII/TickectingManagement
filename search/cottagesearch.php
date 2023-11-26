<?php
// Include your database connection file
include('../connection/connection.php');

// Function to display the cottage table structure
function displayCottageTable($conn, $cottageType) {
    $sql = "SELECT DISTINCT stayType, group_name FROM bookings WHERE cottage_type = '$cottageType'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Cottage Type</th>
                        <th>Stay Type</th>
                        <th>Group Names</th>
                    </tr>
                </thead>
                <tbody>';
        while ($row = $result->fetch_assoc()) {
            $stayType = $row["stayType"];
            $groupName = $row["group_name"];

            echo '<tr>
                    <td>' . $cottageType . '</td>
                    <td>' . $stayType . '</td>
                    <td>' . $groupName . '</td>
                  </tr>';
        }
        echo '</tbody></table>';
    } else {
        // Display a message if no records are found for the current cottage type
        echo '<p>No records found for ' . $cottageType . '.</p>';
    }
}

// Check if the search query is provided
if (isset($_GET['q'])) {
    $searchQuery = $_GET['q'];

    // Check if the search query is not empty
    if (!empty($searchQuery)) {
        // Your search query logic here
        // Modify the SQL query to filter results based on the search query

        // Example: Fetch data where any column contains the search query
        $sql = "SELECT * FROM bookings WHERE 
                cottage_type LIKE '%$searchQuery%' OR 
                stayType LIKE '%$searchQuery%' OR 
                group_name LIKE '%$searchQuery%'";
        $result = $conn->query($sql);

        // Display search results
        if ($result->num_rows > 0) {
            echo '<table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Cottage Type</th>
                            <th>Stay Type</th>
                            <th>Group Names</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <td>' . $row["cottage_type"] . '</td>
                        <td>' . $row["stayType"] . '</td>
                        <td>' . $row["group_name"] . '</td>
                      </tr>';
            }
            echo '</tbody></table>';
        } else {
            echo '<p>No records found for the search query.</p>';
        }
    }
} else {
    // Display the original table structure when the search query is empty
    $cottageTypesQuery = "SELECT DISTINCT cottage_type FROM bookings";
    $cottageTypesResult = $conn->query($cottageTypesQuery);

    if ($cottageTypesResult->num_rows > 0) {
        // Only display the original table if there is no search query
        echo '<table id="originalTable" class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Cottage Type</th>
                        <th>Stay Type</th>
                        <th>Group Names</th>
                    </tr>
                </thead>
                <tbody>';
        while ($cottageTypeRow = $cottageTypesResult->fetch_assoc()) {
            $cottageType = $cottageTypeRow["cottage_type"];
            displayCottageTable($conn, $cottageType);
        }
        echo '</tbody></table>';
    } else {
        echo '<p>No distinct cottage types found.</p>';
    }
}
?>
