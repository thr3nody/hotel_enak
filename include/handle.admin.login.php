<?php
error_reporting(E_ALL);
ini_set("display_errors", true);
include 'dbh.inc.php';

$adminUsername = '';
$adminPassword = '';

$error = array();

if (isset($_POST['login'])) {
    $adminUsername = mysqli_real_escape_string($conn, $_POST['admin-username']);
    $adminPassword = mysqli_real_escape_string($conn, $_POST['admin-password']);
    
    if (empty($adminUsername)) {
        array_push($error, "Username is required");
    }
    if (empty($adminPassword)) {
        array_push($error,"Password is required");
    }
    
    if (count($error) == 0) {
        $query = "SELECT * FROM admin_accounts WHERE admin_username='$adminUsername'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $admin = mysqli_fetch_assoc($result);

            if ($adminPassword == $admin["admin_password"]) {
                session_start();

                $_SESSION['admin-username'] = $admin['admin_username'];
                // $_SESSION['password'] = $user['password'];
                $_SESSION['admin-password'] = $admin['id_admin'];

                header("Location: http://localhost/hotelEnak/dist/admin.php");
            // echo "Login successful. Redirecting...";
            // echo "<meta http-equiv='refresh' content='2;url=../dist/index.php'>";
            // exit();
            } else {
                array_push($error,"Incorect Password");
            }
        } else {
            array_push($error,"Incorect Username");
        }
    }
}

var_dump($error);