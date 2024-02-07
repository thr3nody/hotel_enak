<?php
include '../../include/dbh.inc.php'; // Connect
include '../../include/handle.roomtype.php';

session_start();

$id_url = $_GET['id'];
$hotel_query = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel='$id_url'");
$fetch_hotel_from_the_id_in_the_url = mysqli_fetch_assoc($hotel_query);
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    main {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    select,
    input[type="date"] {
      margin-bottom: 10px;
      padding: 8px;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    #totalPriceDisplay {
      margin-bottom: 10px;
      text-align: center;
    }

    .notBookButton,
    .bookButton {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .notBookButton:hover,
    .bookButton:hover {
      background-color: #0056b3;
    }

    a {
      display: block;
      margin-top: 20px;
      text-align: center;
      text-decoration: none;
      color: #007bff;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>

  <script>
    $(document).ready(function() {
      var totalPrice;

      /* $("#selectRoom").change(function() { */
      function updateTotalPrice() {
        var selectedRoom = $("#selectRoom").val();
        var checkInDate = $("#selectCheckIn").val();
        var checkOutDate = $("#selectCheckOut").val();

        $.ajax({
          url: '../../include/handle.get_price.php',
          method: 'POST',
          data: {
            roomType: selectedRoom,
            checkInDate: checkInDate,
            checkOutDate: checkOutDate
          },
          dataType: 'json',
          success: function(response) {
            console.log("Success block executed.")
            if (response.success) {
              console.log(response);
              totalPrice = response.total_price;
              /* $("#pricePerNight").val(response.price_per_night); */
              $("#totalPriceDisplay").text("Total price: " + response.total_price)
              /* $("body").append("<div>Total price: " + response.total_price + "</div>") */
            } else {
              console.error(response.error);
            }
          }
        });
      };

      $("#selectRoom, #selectCheckIn, #selectCheckOut").change(updateTotalPrice);

      $("form").submit(function(event) {
        event.preventDefault();

        $(this).append("<input type='hiden' name='totalPrice' value='" + totalPrice + "'>");

        this.submit();
      });
    });
  </script>

  <!-- <script src="../js/handle.book.js"></script> -->
  <title>Aku Suka Hotel</title>
</head>

<body>
  <main>
    <h1>
      <?php
      /* var_dump($fetch_hotel_from_the_id_in_the_url) */
      echo $fetch_hotel_from_the_id_in_the_url['hotel_name'];
      ?>
      Hotel
    </h1>
    <form method="post" action="../../include/handle.booking.php?id=<?php echo $fetch_hotel_from_the_id_in_the_url['id_hotel'] ?>">
      <select name="room" id="selectRoom">
        <option value="" disabled selected>
          Pilih tipe ruang.
        </option>
        <?php
        foreach ($roomTypes as $room) {
          echo "<option value='" . $room['id_room_type'] . "'>" . $room['type_name'] . "</option>";
        }
        ?>
      </select>

      <input type="date" class="theDate" name="checkInDate" id="selectCheckIn" placeholder="Check In Date">
      <input type="date" class="theDate" name="checkOutDate" id="selectCheckOut" placeholder="Check Out Date" required>
      <script src="../../js/handle.date.js"></script>

      <!-- <input type="hidden" name="pricePerNight" id="pricePerNight" value=""> -->
      <div id="totalPriceDisplay"></div>

      <?php
      // If not logged in, disable the "Book Now" button
      if (!isset($_SESSION["username"])) {
        echo '<button class="notBookButton" onclick="window.location.href=\'../pages/login.php\'">Login to Start Booking</button>';
      } else {
        echo '<button type="submit" class="bookButton" id="bookButton">Book Now</button>';
      }
      ?>
    </form>
    <a href="..">Cancel</a>
  </main>
</body>

</html>
