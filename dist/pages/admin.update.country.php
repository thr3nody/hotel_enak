<?php
include '../../include/dbh.inc.php';

session_start();

if (!isset($_SESSION["admin-username"])) {
    header("Location: http://localhost/hotel_enak/dist/pages/admin.login.php");
    exit();
}

// Ensure the database connection is open
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if country ID is provided in the URL
if (isset($_GET['id'])) {
    $countryId = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch the country details based on the provided ID
    $query = "SELECT * FROM country WHERE id_country = '$countryId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $country = mysqli_fetch_assoc($result);
    } else {
        echo "Database error.";
        exit();
    }
} else {
    echo "Country ID not provided.";
    exit();
}

// Handle form submission for updating country name
if (isset($_POST['updateCountry'])) {
    $newCountryName = mysqli_real_escape_string($conn, $_POST['newCountryName']);

    // Perform validation or additional checks if needed

    // Update the country name in the database
    $updateQuery = "UPDATE country SET country_name = '$newCountryName' WHERE id_country = '$countryId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // echo "Country name updated successfully!";
        // Optionally, redirect to the country data view page or any other page
        header("Location: admin.country.data.php");
        exit();
    } else {
        echo "Failed to update country name.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/main.css">
    <title>Edit Country</title>
</head>
<body>
    <main>
        <div class="title">
            <h2>Edit Country</h2>
        </div>

        <div class="interaction">
            <form method="post" action="">
                <label for="newCountryName">New Country Name:</label>
                <input type="text" id="newCountryName" name="newCountryName" value="<?php echo $country['country_name']; ?>" required>

                <button type="submit" name="updateCountry">Update Country Name</button>
                <a href="admin.country.data.view.php">Cancel</a>
            </form>
        </div>
    </main>
</body>
</html>
