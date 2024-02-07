<?php

$conn = mysqli_connect('localhost', 'root', '', 'hotel_enak');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}