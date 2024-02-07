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

// Fetch the list of countries for the dropdown
$query = "SELECT * FROM country";
$result = mysqli_query($conn, $query);

$countries = array();

while ($row = mysqli_fetch_assoc($result)) {
    $countries[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/main.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../js/admin.city.dropdown.js"></script>
    <title>Insert Hotel</title>
</head>
<body>
    <main>
        <div class="title">
            <h2>Insert Hotel</h2>
        </div>

        <div class="interaction">
            <form method="post" action="../../include/handle.admin.insert.hotel.php">
                <label for="selectCountry">Select Country:</label>
                <select name="selectCountry" id="selectCountry" required>
                    <option value="" disabled selected>Select Country</option>
                    <?php foreach ($countries as $country) : ?>
                        <option value="<?= $country['id_country']; ?>"><?= $country['country_name']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="selectCity">Select City:</label>
                <select name="selectCity" id="selectCity" required>
                    <option value="" disabled selected>Select City</option>
                    <!-- City options will be populated using AJAX based on the selected country -->
                </select>

                <label for="hotelName">Hotel Name:</label>
                <input type="text" id="hotelName" name="hotelName" required>

                <label for="hotelAddress">Hotel Address:</label>
                <input type="text" id="hotelAddress" name="hotelAddress" required>

                <label for="hotelRating">Hotel Rating:</label>
                <input type="number" id="hotelRating" name="hotelRating" min="1" max="5" required>

                <button type="submit" name="insertHotel">Insert Hotel</button>
                <a href="admin.insert.data.php">Cancel</a>
            </form>
        </div>
    </main>
</body>
</html>
