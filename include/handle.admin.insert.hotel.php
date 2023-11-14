<?php
include 'dbh.inc.php';

if (isset($_POST['insertHotel'])) {
    $cityId = mysqli_real_escape_string($conn, $_POST['selectCity']);
    $hotelName = mysqli_real_escape_string($conn, $_POST['hotelName']);
    $hotelAddress = mysqli_real_escape_string($conn, $_POST['hotelAddress']);
    $hotelRating = mysqli_real_escape_string($conn, $_POST['hotelRating']);

    // Perform validation or additional checks if needed

    $query = "INSERT INTO hotel (id_city, hotel_name, address, rating) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        // Set id_city to NULL or provide default values if needed
        $stmt->bind_param("isss", $cityId, $hotelName, $hotelAddress, $hotelRating);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            echo "Hotel inserted successfully!";
        } else {
            echo "Failed to insert hotel.";
        }

        $stmt->close();
    } else {
        echo "Database error: " . mysqli_error($conn);
    }
}

// Close the database connection if needed
$conn->close();
?>
