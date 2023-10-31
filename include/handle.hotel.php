<?php
include 'dbh.inc.php';

if (isset($_POST['idCity'])) {
    $idCity = $_POST['idCity'];

    $query = "SELECT * FROM hotel WHERE id_city = $idCity";

    // Fetch the result into an associative array
    $result = $conn->query($query);

    if ($result) {
        $hotels = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($hotels);
    } else {
        echo json_encode(array("error" => "Error fetching hotels."));
    }
} else {
    echo json_encode(array("error" => "No city id specified."));
}
?>
