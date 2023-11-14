<?php
include 'dbh.inc.php';

$query = "SELECT * FROM room_type";

$result = $conn->query($query);

if ($result) {
    $roomTypes = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($roomTypes);
} else {
    echo json_encode(array("error" => "Error fetching room types."));
}
?>
