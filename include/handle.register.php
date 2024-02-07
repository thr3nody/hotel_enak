<?php
include 'dbh.inc.php';

$username = '';
$password = '';
$confirmPassword = '';

$error = array();
echo'1';
if (isset($_POST['register'])) {
    echo('2');
    $username = mysqli_escape_string($conn, $_POST['Username']);
    $password = mysqli_escape_string($conn, $_POST['Password']);
    $confirmPassword = mysqli_escape_string($conn, $_POST['ConfirmPassword']);

    if (empty($username)) {
        array_push($error, "Username is required");
    }
    if (empty($password)) {
        array_push($error,"Passwordnya mana sayang???");
    }
        if (strlen($password) < 8) {
        array_push($error,"Minimum pasword: 8 char");
    }
    if ($password != $confirmPassword) {
        array_push($error,"Password does not match");
    }
    
    if (count($error) == 0) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO the_user (username, password)
            VALUES ('$username', '$password_hashed');";
        mysqli_query($conn, $query);
echo("
        INSERT INTO the_user (username, password)
            VALUES ('$username', '$password');
        
");
        header('location: ../dist/pages/login.php');
    }
}
