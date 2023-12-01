<?php
// Include your database connection file
include('../connection/connection.php');

// Function to display a row in the table
function displayTableRow($counter, $cottageType, $stayType, $groupName, $status, $id) {
    echo "<tr>";
    echo "<td>$counter</td>";
    echo "<td>$cottageType</td>";
    echo "<td>$stayType</td>";
    echo "<td>$groupName</td>";
    echo "<td>$status</td>";
    echo "<td><button class='btn btn-primary' data-row-id='$id' data-cottage-type='$cottageType' onclick='changeStatus(this)'>Check Out</button></td>";
    echo "</tr>";
}

// Function to display the cottage table structure
function displayCottageTable($conn, $cottageType) {
    $sql = "SELECT DISTINCT stayType, group_name FROM bookings WHERE cottage_type = '$cottageType'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<tbody>';
        $counter = 1;
        while ($row = $result->fetch_assoc()) {
            $stayType = $row["stayType"];
            $groupName = $row["group_name"];
            displayTableRow($counter, $cottageType, $stayType, $groupName, '', '');
            $counter++;
        }
        echo '</tbody>';
    } else {
        // Display a message if no records are found for the current cottage type
        echo '<tbody><tr><td class="no-records" colspan="6">No records found for ' . $cottageType . '.</td></tr></tbody>';
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
                        <th>#</th>
                        <th>Cottage Type</th>
                        <th>Stay Type</th>
                        <th>Group Names</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>';

            while ($row = $result->fetch_assoc()) {
                displayTableRow($row['id'], $row['cottage_type'], $row['stayType'], $row['group_name'], $row['status'], $row['id']);
            }
            
            echo '</table>';
        } else {
            echo '
            <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Cottage Type</th>
                        <th>Stay Type</th>
                        <th>Group Names</th>
                        <th>Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <br></table><p class="no-records">No records found for the search query.</p>';
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
                        <th>#</th>
                        <th>Cottage Type</th>
                        <th>Stay Type</th>
                        <th>Group Names</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>';

        while ($cottageTypeRow = $cottageTypesResult->fetch_assoc()) {
            $cottageType = $cottageTypeRow["cottage_type"];
            displayCottageTable($conn, $cottageType);
        }
        
        echo '</table>';
    } else {
        echo '<p>No distinct cottage types found.</p>';
    }
}

// Close connection
$conn->close();
?>
