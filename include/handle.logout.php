<?php
session_start();
session_destroy();
header("location: ../dist/index.php");
exit;
?>