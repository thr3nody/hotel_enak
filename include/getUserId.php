<?php
session_start();
include 'dbh.inc.php';

// Check if the user is logged in
if (isset($_SESSION['id_user'])) {
    // If logged in, return the user ID
    echo json_encode(['id_user' => $_SESSION['id_user']]);
} else {
    // If not logged in, return a default value (you can choose what makes sense)
    echo json_encode(['id_user' => null]);
}
?>

