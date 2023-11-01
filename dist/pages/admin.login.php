<?php
include "../../include/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>

    <?php
    // Display any login error messages
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <form action="../../include/handle.admin.login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="admin-username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="admin-password" required>

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>