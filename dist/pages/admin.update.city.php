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

// Check if city ID is provided in the URL
if (isset($_GET['id'])) {
    $cityId = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch the city details based on the provided ID
    $query = "SELECT * FROM city_country WHERE id_city = '$cityId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $city = mysqli_fetch_assoc($result);
    } else {
        echo "Database error.";
        exit();
    }
} else {
    echo "City ID not provided.";
    exit();
}

// Fetch the list of countries for the dropdown
$countryQuery = "SELECT * FROM country";
$countryResult = mysqli_query($conn, $countryQuery);

if ($countryResult) {
    $countries = mysqli_fetch_all($countryResult, MYSQLI_ASSOC);
} else {
    echo "Failed to fetch countries.";
    exit();
}

// Handle form submission for updating city details
if (isset($_POST['updateCity'])) {
    $newCityName = mysqli_real_escape_string($conn, $_POST['newCityName']);
    $selectedCountryId = mysqli_real_escape_string($conn, $_POST['selectCountry']);

    // Perform validation or additional checks if needed

    // Update the city details in the database
    $updateCityQuery = "UPDATE city_country SET city_name = '$newCityName', id_country = '$selectedCountryId' WHERE id_city = '$cityId'";
    $updateCityResult = mysqli_query($conn, $updateCityQuery);

    if ($updateCityResult) {
        // Redirect to the city data view page
        header("Location: admin.city.data.php");
        exit();
    } else {
        echo "Failed to update city details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/main.css">
    <title>Edit City</title>
</head>
<body>
    <main>
        <div class="title">
            <h2>Edit City</h2>
        </div>

        <div class="interaction">
            <form method="post" action="">
                <label for="newCityName">New City Name:</label>
                <input type="text" id="newCityName" name="newCityName" value="<?php echo $city['city_name']; ?>" required>

                <label for="selectCountry">Select Country:</label>
                <select name="selectCountry" required>
                    <?php foreach ($countries as $country) : ?>
                        <option value="<?= $country['id_country']; ?>" <?php if ($country['id_country'] == $city['id_country']) echo 'selected'; ?>>
                            <?= $country['country_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" name="updateCity">Update City Details</button>
                <a href="admin.city.data.view.php">Cancel</a>
            </form>
        </div>
    </main>
</body>
</html>
