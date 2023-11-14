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
    <title>Admin Page for City Data</title>
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
            <td>City Name</td>
            <td>Country</td> 
            <!-- Join country_name from the country table -->
            <td>Controller</td>
        </tr>

        <?php
            $query = "SELECT cc.id_city, cc.city_name, c.country_name
            FROM city_country cc
            JOIN country c ON cc.id_country = c.id_country
            ORDER BY cc.id_city";

            $data = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?php echo $row['id_city']; ?></td>
            <td><?php echo $row['city_name']; ?></td>
            <td><?php echo $row['country_name']; ?></td>
            <td>
                <!-- TODO: Create admin.delete.hotel.php and admin.update.hotel.php -->
                <form method="post" action="../../include/admin.handle.delete.data.php" onsubmit="return confirmDelete();">
                    <input type="hidden" name="dataType" value="city_country">
                    <input type="hidden" name="dataId" value="<?php echo $row['id_city']; ?>">
                    <button type="submit" name="deleteData">Delete</button>
                </form>

                <script>
                function confirmDelete() {
                console.log("Confirmation function called");
                return confirm('Are you sure you want to delete?');
                }
                </script>
            </td>
        </tr>    
        <?php
            }
        ?>
    </table><br>
</body>
</html>