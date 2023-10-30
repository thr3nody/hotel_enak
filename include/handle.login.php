<?php
error_reporting(E_ALL);
ini_set("display_errors", true);
include 'dbh.inc.php';

$username = '';
$password = '';

$error = array();

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    
    if (empty($username)) {
        array_push($error, "Username is required");
    }
    if (empty($password)) {
        array_push($error,"Password is required");
    }
    
    if (count($error) == 0) {
        $query = "SELECT * FROM the_user WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user["password"])) {
                session_start();

                $_SESSION['username'] = $user['username'];
                // $_SESSION['password'] = $user['password'];
                $_SESSION['id_user'] = $user['id_user'];

            header("Location: ../dist/index.php");
            } else {
                array_push($error,"Password salah suuu:(");
            }
        } else {
            array_push($error,"Salah username kontool:(");
        }
    }
}