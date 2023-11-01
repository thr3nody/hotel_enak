<?php
session_start();
session_unset();
session_destroy();
header("Location: http://localhost/hotelEnak/dist/pages/admin.login.php");
exit();
?>