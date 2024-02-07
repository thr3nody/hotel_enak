<?php
include '../../include/dbh.inc.php';

session_start();

if (!isset($_SESSION["admin-username"])) {
    header("Location: http://localhost/hotel_enak/dist/pages/admin.login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/css/main.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Insert Country</title>
</head>
<body>
    <main>
        <div class="title">
            <h2>Insert Country</h2>
        </div>

        <div class="interaction">
            <form method="post" action="../../include/handle.admin.insert.country.php">
                <label for="countryId">Country ID</label>
                <input type="text" id="countryId" name="countryId">

                <label for="countryName">Country Name:</label>
                <input type="text" id="countryName" name="countryName" required>

                <button type="submit" name="insertCountry">Insert Country</button>
                <a href="admin.insert.data.php">Cancel</a>
            </form>
        </div>
    </main>
</body>
</html>
