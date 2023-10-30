<?php
include 'dbh.inc.php';

if (isset($_POST['idCity'])) {
    // Assuming you're sending the selected city id via POST
    $idCity = $_POST['idCity'];

    // Prepare and execute your SQL query to fetch hotels based on $idCity
    $query = "SELECT * FROM hotel WHERE city_id = $idCity";

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
