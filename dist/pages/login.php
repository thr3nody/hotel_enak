<?php
include '../../include/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user.css">
    <title>Hotel Login</title>
</head>
<body>

    <main>
        <h1>Login</h1>

        <form action="../../include/handle.login.php" class="interaction" method="post">
            <label for="username">Username: </label>
            <input type="text" id="username" name="Username" required>

            <label for="password">Password: </label>
            <input type="password" id="password" name="Password" required>

            <div class="theButtons">
                <button type="submit" name="login">Login</button>
                <button type="button" onclick="window.location.href='../index.php'">Cancel</button>
            </div>

            <p>
                Don't have an account?
                <a href="register.php">Register</a>
            </p>
        </form>
    </main>
    
    <div id="background-pattern"></div>
    <dir id="background-image"></dir>
</body>
</html>