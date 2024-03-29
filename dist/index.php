<?php
include '../include/dbh.inc.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../dist/css/main.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- <script src="../js/handle.book.js"></script> -->
  <title>Aku Suka Hotel</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <ul class="menu">
        <li><a><img src="../dist/img/ERINE.FullSize.NoBG.Dark.png" alt=""></a></li>
        <li><a href="./pages/coupons.php">Coupons</a></li>
        <!-- <li><a href="">Services</a></li> -->

        <li><a href="./pages/myReservation.php">My Reservation</a></li>
        <?php


        //if logged in, set login button to log out
        if (isset($_SESSION["username"])) {
        ?>
          <li><a href="../include/handle.logout.php" class="userButton">LogOut</a></li>
        <?php
        } else {
        ?>
          <li><a href="./pages/login.php" class="userButton">LogIn</a></li>
        <?php
        }
        ?>
      </ul>
    </nav>
  </header>

  <main>
    <div class="title">
      <h2>Welcome to Los Alamos Hotel</h2>
      <p>A solution to book hotel rooms quickly.</p>
    </div>

    <div class="interaction">
      <form method="post">
        <select name="country" id="selectCountry">
          <option value="hereCountry" disabled selected>Destination Country</option>
        </select>

        <select name="city" id="selectCity">
          <option value="hereCity" disabled selected>Destination City</option>
        </select>
        <script src="../js/handle.dropdown.js"></script>


        <div id="hotelContainer" class="hotel-container">
          <script src="../js/handle.preview.js"></script>
        </div>

      </form>
    </div>


    <!-- <span id="totalPriceDisplay">Total Price: $0.00</span> -->
  </main>

  <div class="onHotelClick"></div>
  <div id="imageBG"></div>

  <script src="../js/handle.loader.js"></script>
  <div id="loader">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>
</body>

</html>
