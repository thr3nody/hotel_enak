<?php
include '../../include/dbh.inc.php';
session_start();

if (!isset($_SESSION["admin-username"])) {
  header("Location: http://localhost/hotel_enak/dist/pages/admin.login.php");
  exit();
}

$getData = "SELECT * FROM booking";
$result = mysqli_query($conn, $getData);

if (mysqli_num_rows($result) > 0) {
  // Step 4: Display the data in a table
  echo "<table>";
  echo
  "<tr>
      <th>User ID</th>
      <th>Hotel</th>
      <th>RoomType</th>
      <th>Check In Date</th>
      <th>Check Out Date</th>
      <th>Total Price</th>
    </tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo
    "<tr>
        <td>" . $row["id_user"] . "</td>
        <td>" . $row["id_hotel"] . "</td>
        <td>" . $row["id_room_type"] . "</td>
        <td>" . $row["checkin"] . "</td>
        <td>" . $row["checkout"] . "</td>
        <td>" . $row["total_price"] . "</td>
      </tr>";
  }
  echo "</table>";
} else {
  echo "No data found";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reserved Data</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }

    a {
      display: block;
      margin-top: 20px;
      text-align: center;
      text-decoration: none;
      color: blue;
    }

    a:hover {
      color: darkblue;
    }
  </style>
</head>

<body>
  <a href="../admin.php">Go Back</a>
</body>

</html>
