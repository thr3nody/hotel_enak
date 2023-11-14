<?php
include '../../include/dbh.inc.php';

session_start();

if (!isset($_SESSION["admin-username"])) {
    header("Location: http://localhost/hotelEnak/dist/pages/admin.login.php");
    exit();
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
    <script src="../../js/admin.city.dropdown.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Insert City</title>
</head>
<body>
    <main>
        <div class="title">
            <h2>Insert City</h2>
        </div>

        <div class="interaction">
            <form method="post" action="../../include/handle.admin.insert.city.php">
                <label for="selectCountry">Select Country:</label>
                <select name="selectCountry" id="selectCountry" required>
                    <option value="" disabled selected>Select Country</option>
                    <?php foreach ($countries as $country) : ?>
                        <option value="<?= $country['id_country']; ?>"><?= $country['country_name']; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="cityName">City Name:</label>
                <input type="text" id="cityName" name="cityName" required>

                <button type="submit" name="insertCity">Insert City</button>
                <a href="admin.insert.data.php">Cancel</a>
            </form>
        </div>
    </main>
</body>
</html>
