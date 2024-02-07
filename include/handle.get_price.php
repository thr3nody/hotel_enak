<?php
include 'dbh.inc.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['roomType'])) {
  $roomType = mysqli_real_escape_string($conn, $_POST['roomType']);

  $query = mysqli_query($conn, "SELECT price_per_night FROM room_type WHERE id_room_type='$roomType'");

  if ($query) {
    $result = mysqli_fetch_assoc($query);
    $pricePerNight = $result['price_per_night'];

    $checkInDate = isset($_POST['checkInDate']) ? $_POST['checkInDate'] : '';
    $checkOutDate = isset($_POST['checkOutDate']) ? $_POST['checkOutDate'] : '';

    if ($checkInDate && $checkOutDate) {
      $checkIn = strtotime($checkInDate);
      $checkOut = strtotime($checkOutDate);
      $numNights = ceil(($checkOut - $checkIn) / (60 * 60 * 24)); // Convert seconds to days

      $totalPrice = $pricePerNight * $numNights;

      $response['success'] = true;
      $response['price_per_night'] = $pricePerNight;
      $response['total_price'] = $totalPrice;
    } else {
      $response['success'] = false;
      $response['error'] = 'Invalid check-in or check-out date.';
    }
  } else {
    $response['success'] = false;
    $response['error'] = 'Error retrieving price.';
  }
} else {
  $response['success'] = false;
  $response['error'] = 'Invalid request.';
}

echo json_encode($response);
