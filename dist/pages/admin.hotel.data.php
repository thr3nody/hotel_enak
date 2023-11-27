<?php
include '../../include/dbh.inc.php';

session_start();

if (!isset($_SESSION["admin-username"])) {
    header("Location: http://localhost/hotelEnak/dist/pages/admin.login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/data-view.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Admin Page for Hotel Data</title>
</head>
<body>
    <div id="title">
        <h1>Hotel Data Here</h1>
        <!-- Add filter mechanism -->
    </div>

    <a href="../admin.php">Go Back</a>

    <table border="1">
        <tr>
            <td>ID</td>
            <td>Hotel Name</td>
            <td>Country</td> 
            <!-- Join country_name from the country -->
            <td>City</td>
            <!-- Join city_name from the city_country table -->
            <td>Detailed Address</td>
            <td>Rating</td>
            <td>Controller</td>
        </tr>

        <?php
            $query = "SELECT h.id_hotel, h.hotel_name, c.country_name, cc.city_name, h.address, h.rating
            FROM hotel h
            JOIN city_country cc ON h.id_city = cc.id_city
            JOIN country c ON cc.id_country = c.id_country
            ORDER BY h.id_hotel";

            $data = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?php echo $row['id_hotel']; ?></td>
            <td><?php echo $row['hotel_name']; ?></td>
            <td><?php echo $row['country_name']; ?></td>
            <td><?php echo $row['city_name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['rating']; ?></td>
            <td>
                <!-- TODO: Create admin.delete.hotel.php and admin.update.hotel.php -->
                <form method="post" action="../../include/admin.handle.delete.data.php" onsubmit="return confirmDelete();">
                    <input type="hidden" name="dataType" value="hotel">
                    <input type="hidden" name="dataId" value="<?php echo $row['id_hotel']; ?>">
                    <button type="submit" name="deleteData">Delete</button>
                </form>

                <script>
                function confirmDelete() {
                console.log("Confirmation function called");
                return confirm('Are you sure you want to delete?');
                }
                </script>


                <a href="admin.update.hotel.php?id=<?php echo $row['id_hotel']; ?>">Edit</a>
            </td>
        </tr>    
        <?php
            }
        ?>
    </table><br>
</body>
</html>