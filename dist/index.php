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
    <script src="../js/handle.book.js"></script>
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
            <h2>Welcome</h2>
            <h1>to Los Alamos Hotel</h1>
        </div>

        <div class="interaction">
            <form method="post">
                <select name="Country" id="selectCountry">
                    <option value="hereCountry" disabled selected>Destination Country</option>
                </select>

                <select name="City" id="selectCity">
                    <option value="hereCity" disabled selected>Destination City</option>
                </select>

                <select name="Room" id="selectRoom"></select>

                <script src="../js/handle.dropdown.js"></script> 

                <input type="date" class="theDate" name="checkInDate" id="selectCheckIn" placeholder="Check In Date">
                <input type="date" class="theDate" name="checkOutDate" id="selectCheckOut" placeholder="Check Out Date" required>
                <script src="../js/handle.date.js"></script>

                <div id="hotelContainer" class="hotel-container">
                    <script src="../js/handle.preview.js"></script>
                </div>

                <?php
                // If not logged in, disable the "Book Now" button
                if (!isset($_SESSION["username"])) {
                    echo '<button class="notBookButton" onclick="window.location.href=\'./pages/login.php\'">Login to Start Booking</button>';
                } else {
                    echo '<button class="bookButton" id="bookButton">Book Now</button>';
                }
                ?>

            </form>
        </div>


        <span id="totalPriceDisplay">Total Price: $0.00</span>
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