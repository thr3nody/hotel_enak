<?php
include 'dbh.inc.php';

if (isset($_GET['id_country'])) {
    $id_country = $_GET['id_country'];

    $query = "SELECT * FROM city_country WHERE id_country = '$id_country'";
    $result = mysqli_query($conn, $query);
    $data = [];

    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode($data);
} else {
    echo json_encode(["message" => "No Selected Country"]);
}