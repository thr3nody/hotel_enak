<?php
include 'dbh.inc.php';

session_start();

header("Access-Control-Allow-Origin: *");

// Get booking details from POST data
$id_user = $_SESSION['id_user'];
$id_room_type = $_POST['selectRoom'];
$id_hotel = $_POST['selectHotel'];
$check_in_date = $_POST['checkInDate'];
$check_out_date = $_POST['checkOutDate'];
$total_price = getRoomPrice($id_room_type, $check_in_date, $check_out_date);

error_log("Before validation: " . print_r($_POST, true));

// Validate required fields
if (!$id_user || !$id_room_type || !$id_hotel || !$check_in_date || !$check_out_date) {
    die("Incomplete booking details");
}

error_log("After validation: " . print_r($_POST, true));

// Insert booking
$query = "INSERT INTO booking
    (id_user, id_room_type, id_hotel, check_in_date, check_out_date, total_price)
    VALUES ('$id_user', '$id_room_type', '$id_hotel', '$check_in_date', '$check_out_date', '$total_price')";

$insert = mysqli_query($conn, $query);

if ($insert) {
    // Booking success

    // Return booking details along with hotel details
    $hotelDetails = array('id_hotel' => $id_hotel);
    $result = array_merge($hotelDetails);

    echo json_encode(['success' => true, 'message' => 'Booking successful!', 'result' => $result]);
} else {
    // Booking failed
    die("Booking failed: " . mysqli_error($conn));
}

// Function to get room price based on room type and duration of stay
function getRoomPrice($id_room_type, $check_in_date, $check_out_date)
{
    global $conn;

    // Fetch price_per_night from the room_type table
    $query = "SELECT price_per_night FROM room_type WHERE id_room_type = '$id_room_type'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $price_per_night = $row['price_per_night'];

        // Calculate the total price
        $check_in = new DateTime($check_in_date);
        $check_out = new DateTime($check_out_date);
        $duration = $check_in->diff($check_out)->days;

        return $price_per_night * $duration;
    } else {
        die("Failed to fetch room price: " . mysqli_error($conn));
    }
}
