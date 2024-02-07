<?php
include 'dbh.inc.php';

if (isset($_POST['insertCity'])) {
    $countryId = mysqli_real_escape_string($conn, $_POST['selectCountry']);
    $cityName = mysqli_real_escape_string($conn, $_POST['cityName']);

    // Perform validation or additional checks if needed

    $query = "INSERT INTO city_country (id_country, city_name) VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ss", $countryId, $cityName);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            echo "City inserted successfully!";
        } else {
            echo "Failed to insert city.";
        }

        $stmt->close();
    } else {
        echo "Database error.";
    }
}

// Close the database connection if needed
$conn->close();
?>
