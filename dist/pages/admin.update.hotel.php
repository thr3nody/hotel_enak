<?php
include '../../include/dbh.inc.php';

session_start();

if (!isset($_SESSION["admin-username"])) {
    header("Location: http://localhost/hotelEnak/dist/pages/admin.login.php");
    exit();
}

// Ensure the database connection is open
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if hotel ID is provided in the URL
if (isset($_GET['id'])) {
    $hotelId = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch the hotel details based on the provided ID
    $query = "SELECT * FROM hotel h
              JOIN city c ON h.id_city = c.id_city
              JOIN city_country cc ON c.id_city = cc.id_city
              JOIN country co ON cc.id_country = co.id_country
              WHERE id_hotel = '$hotelId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $hotel = mysqli_fetch_assoc($result);
    } else {
        echo "Database error.";
        exit();
    }
} else {
    echo "Hotel ID not provided.";
    exit();
}

// Fetch the list of cities for the city dropdown based on the selected country
$cityQuery = "SELECT * FROM city_country WHERE id_country = '{$hotel['id_country']}'";
$cityResult = mysqli_query($conn, $cityQuery);

if ($cityResult) {
    $cities = mysqli_fetch_all($cityResult, MYSQLI_ASSOC);
} else {
    echo "Failed to fetch cities.";
    exit();
}

// Handle form submission for updating hotel details
if (isset($_POST['updateHotel'])) {
    $newHotelName = mysqli_real_escape_string($conn, $_POST['newHotelName']);
    $newHotelAddress = mysqli_real_escape_string($conn, $_POST['newHotelAddress']);
    $newHotelRating = mysqli_real_escape_string($conn, $_POST['newHotelRating']);
    $selectedCityId = mysqli_real_escape_string($conn, $_POST['selectCity']);

    // Perform validation or additional checks if needed

    // Update the hotel details in the database
    $updateHotelQuery = "UPDATE hotel SET hotel_name = '$newHotelName', address = '$newHotelAddress', rating = '$newHotelRating', id_city = '$selectedCityId' WHERE id_hotel = '$hotelId'";
    $updateHotelResult = mysqli_query($conn, $updateHotelQuery);

    if ($updateHotelResult) {
        // Redirect to the hotel data view page
        header("Location: admin.hotel.data.view.php");
        exit();
    } else {
        echo "Failed to update hotel details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/main.css">
    <title>Edit Hotel</title>
</head>
<body>
    <main>
        <div class="title">
            <h2>Edit Hotel</h2>
        </div>

        <div class="interaction">
            <form method="post" action="">
                <label for="newHotelName">New Hotel Name:</label>
                <input type="text" id="newHotelName" name="newHotelName" value="<?php echo $hotel['hotel_name']; ?>" required>

                <label for="newHotelAddress">New Hotel Address:</label>
                <input type="text" id="newHotelAddress" name="newHotelAddress" value="<?php echo $hotel['address']; ?>" required>

                <label for="newHotelRating">New Hotel Rating:</label>
                <input type="number" id="newHotelRating" name="newHotelRating" min="1" max="5" value="<?php echo $hotel['rating']; ?>" required>

                <label for="selectCity">Select City:</label>
                <select name="selectCity" required>
                    <?php foreach ($cities as $city) : ?>
                        <option value="<?= $city['id_city']; ?>" <?php if ($city['id_city'] == $hotel['id_city']) echo 'selected'; ?>>
                            <?= $city['city_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" name="updateHotel">Update Hotel Details</button>
                <a href="admin.hotel.data.view.php">Cancel</a>
            </form>
        </div>
    </main>
</body>
</html>
