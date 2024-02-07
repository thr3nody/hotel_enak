<?php
include 'dbh.inc.php';
session_start();

$id_user = $_SESSION['id_user'];
$id_room_type = $_POST['room'];
$id_hotel = $_GET['id'];
$check_in_date = $_POST['checkInDate'];
$check_out_date = $_POST['checkOutDate'];
$total_price = $_POST['totalPrice'];

mysqli_query($conn, "INSERT INTO booking
    (id_user, id_hotel, id_room_type, checkin, checkout, total_price)
    VALUES ('$id_user','$id_hotel', '$id_room_type', '$check_in_date', '$check_out_date', '$total_price')");

header("location: ../dist/pages/booking.success.php");
