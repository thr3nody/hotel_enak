<?php
include 'dbh.inc.php';

if (isset($_POST['insertCountry'])) {
    $countryId = mysqli_real_escape_string($conn, $_POST['countryId']);
    $countryName = mysqli_real_escape_string($conn, $_POST['countryName']);

    // Perform validation or additional checks if needed

    $query = "INSERT INTO country (id_country, country_name) VALUES (?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ss", $countryId, $countryName);
        $stmt->execute();

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            echo "Country inserted successfully!";
        } else {
            echo "Failed to insert country.";
        }

        $stmt->close();
    } else {
        echo "Database error.";
    }
}

// Close the database connection if needed
$conn->close();
?>
