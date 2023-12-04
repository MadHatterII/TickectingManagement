<?php
// Function to fetch data with pagination
function fetch_data($page = 1, $limit = 8) {
    include '../connection/connection.php';

    // Calculate the offset based on the current page
    $offset = ($page - 1) * $limit;

    // Query to retrieve a specific range of records
    $query = "SELECT DISTINCT groupName FROM members ORDER BY id DESC LIMIT $offset, $limit";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch data and create an associative array
        $members = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // Handle the error if the query fails
        $error = mysqli_error($conn);
        echo "Query failed: $error";
        return; // Exit the function if there's an error
    }

    if (isset($members) && is_array($members)) {
        $counter = ($page - 1) * $limit + 1; // Initialize counter variable

        foreach ($members as $member) {
            echo "<tr>";
            echo "<td>{$counter}</td>"; // Display iterated ID
            echo "<td>{$member['groupName']}</td>";
            echo "<td><button class='view-details-btn' data-toggle='modal' data-target='#detailsModal' data-groupname='{$member['groupName']}'>View Details</button></td>"; // Button in the third column
            echo "</tr>";

            $counter++; // Increment the counter
        }
    } else {
        echo "<tr><td colspan='3'>No data available</td></tr>";
    }

    // Close the database connection
    mysqli_close($conn);

    // Return the current page and total pages for pagination
    return ['currentPage' => $page, 'totalPages' => ceil(getTotalRecords() / $limit)];
}

// Function to get the total number of records
function getTotalRecords() {
    include '../connection/connection.php';

    $query = "SELECT COUNT(DISTINCT groupName) as total FROM members";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    return 0;
}

// Function to display pagination links
function displayPaginationLinks($currentPage, $totalPages) {
    echo "<ul class='pagination'>";
    if ($currentPage > 1) {
        echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage - 1) . "'>&laquo; </a></li>";
    }

    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<li class='page-item " . ($i == $currentPage ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
    }

    if ($currentPage < $totalPages) {
        echo "<li class='page-item'><a class='page-link' href='?page=" . ($currentPage + 1) . "'> &raquo;</a></li>";
    }

    echo "</ul>";
}
?>