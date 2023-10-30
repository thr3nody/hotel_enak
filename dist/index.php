<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/main.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Aku Suka Hotel</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul class="menu">
                <li><a><img src="../dist/img/ERINE.FullSize.NoBG.Dark.png" alt=""></a></li>
                <li><a href="./pages/coupons.php">Coupons</a></li>
                <li><a href="">Services</a></li>
                <?php

                    //if logged in, set login button to log out
                    if (isset($_SESSION["username"])) {
                        ?>
                        <li><a href="../include/handle.logout.php" class="userButton">Log Out</a></li>
                        <?php
                    } else {
                        ?>
                        <li><a href="./pages/login.php" class="userButton">Log In</a></li>
                        <?php
                    }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <div class="title">
            <h2>to Los Alamos Hotel</h2>
            <h1>Welcome</h1>
        </div>

        <div class="interaction">
            <form action="">
                <select name="Country" id="selectCountry">
                    <option value="hereCountry" disabled selected>Destination Country</option>
                </select>
                <select name="City" id="selectCity">
                    <option value="hereCity" disabled selected>Destination City</option>
                </select>
                <script src="../js/handle.dropdown.js"></script>

                <select name="Hotel" id="selectHotel">
                    <option value="hereHotel" disabled selected>Hotel</option>
                </select>
                <select name="Room" id="selectRoom">
                    <option value="hereRoom" disabled selected>Room Type</option>
                    <option value="basic">Basic Single Bed</option>
                    <option value="standard">Standard Double Bed</option>
                    <option value="deluxe">Deluxe King Size Bed</option>
                    <option value="velvet">Velvet Package Room</option>
                </select>

                <input type="date" class="theDate" name="checkInDate" id="selectCheckIn" placeholder="Check In Date">
                <input type="date" class="theDate" name="checkOutDate" id="selectCheckOut" placeholder="Check Out Date" required>
                <!--<script>
                    const today = new Date().toISOString().split("T")[0];
                    NOT USED
                </script>-->
                <script src="../js/handle.date.js" defer></script>

                <button class="bookButton">Book Now</button>
            </form>
        </div>
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