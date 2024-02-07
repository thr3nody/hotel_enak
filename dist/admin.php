<?php
// include "../include/dbh.inc.php";
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
  <link rel="stylesheet" href="./css/admin.css">
  <title>Hotel Admin Page</title>
</head>

<body>
  <h1>ADMIN PAGE</h1>
  <header>
    <div id="logout">
      <a href="http://localhost/hotel_enak/include/handle.admin.logout.php" class="logout-btn">Log Out</a>
    </div>
  </header>

  <div id="action-btn">
    <ul>
      <td><button onclick="window.location.href='//localhost/hotel_enak/dist/pages/admin.country.data.php'" class="dashboard-btn">Country Data</button></td>
      <td><button onclick="window.location.href='//localhost/hotel_enak/dist/pages/admin.city.data.php'" class="dashboard-btn">City Data</button></td>
      <td><button onclick="window.location.href='//localhost/hotel_enak/dist/pages/admin.hotel.data.php'" class="dashboard-btn">Hotel Data</button></td>
      <td><button onclick="window.location.href='//localhost/hotel_enak/dist/pages/admin.insert.data.php'" class="dashboard-btn">Insert Data</button></td>
      <td><button onclick="window.location.href='//localhost/hotel_enak/dist/pages/admin.view.reserved.php'" class="dashboard-btn">View Booked</button></td>
    </ul>
  </div>
</body>

</html>
