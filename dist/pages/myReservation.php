<?php
include '../../include/dbh.inc.php';

if (!$conn) {
  die("Connection failed" . mysqli_connect_error());
}

session_start();

$id_user = $_SESSION['id_user'];
$getData = "SELECT * FROM booking WHERE id_user=$id_user";
$result = mysqli_query($conn, $getData);

/* echo "SELECT * FROM booking WHERE id_user={$id_user}"; */

echo '<a href="..">Back to Main Page</a>';

if (mysqli_num_rows($result) > 0) {
  // Step 4: Display the data in a table
  echo "<table>";
  echo
  "<tr>
      <th>Hotel</th>
      <th>RoomType</th>
      <th>Check In Date</th>
      <th>Check Out Date</th>
      <th>Total Price</th>
    </tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo
    "<tr>
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

<html>

<head>
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

</html>
