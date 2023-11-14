<?php
include '../../include/dbh.inc.php';

session_start();

if (!isset($_SESSION["admin-username"])) {
    header("Location: http://localhost/hotelEnak/dist/pages/admin.login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Insert Page</title>
</head>
<body>
    <div id="title">
        <h1>Insert Data Here</h1>
    </div>

    <a href="../admin.php">Go Back</a>

    <a href="admin.insert.country.php">Insert Country Data</a>
    <a href="admin.insert.city.php">Insert City Data</a>
    <a href="admin.insert.hotel.php">Insert Hotel Data</a>
</body>
</html>