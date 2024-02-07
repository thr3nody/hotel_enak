<?php
include 'dbh.inc.php';

$query = "SELECT * FROM country";
$result = mysqli_query($conn, $query);
$data = [];

while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
