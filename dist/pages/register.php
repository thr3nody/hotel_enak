<?php
include '../../include/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user.css">
    <title>Hotel Register</title>
</head>
<body>
    <main>
        <h1>Register</h1>

        <form action="../../../hotel_enak/include/handle.register.php" class="interaction" method="post">
            <label for="username">Username: </label>
            <input type="text" id="username" name="Username" required>

            <label for="password">Password: </label>
            <input type="password" id="password" name="Password" required>

            <label for="confirm-password">Confirm password: </label>
            <input type="password" id="confirm-password" name="ConfirmPassword" required>

            <div class="theButtons">
                <button type="submit" name="register">Register</button>
                <button type="button" onclick="window.location.href='../index.php'">Cancel</button>
            </div>

            <p>
                Already have an account?
                <a href="login.php">Login</a>
            </p>
        </form>
    </main>
    
    <div id="background-pattern"></div>
    <dir id="background-image"></dir>
</body>
</html>