<?php
include '../../include/dbh.inc.php';

session_start();

if (!isset($_SESSION["admin-username"])) {
    header("Location: http://localhost/hotel_enak/dist/pages/admin.login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/data-view.css">
    <title>Admin Page for Country Data</title>
</head>
<body>
    <div id="title">
        <h1>Country Data Here</h1>
    </div>
    
    <a href="../admin.php">Go Back</a>

    <table border="1">
        <tr>
            <td>ID</td>
            <td>Country Name</td> 
            <!-- Join country_name from the country table -->
            <td>Controller</td>
        </tr>

        <?php
            $query = "SELECT * FROM country";

            $data = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?php echo $row['id_country']; ?></td>
            <td><?php echo $row['country_name']; ?></td>
            <td>
                <form method="post" action="../../include/admin.handle.delete.data.php" onsubmit="return confirmDelete();">
                    <input type="hidden" name="dataType" value="country">
                    <input type="hidden" name="dataId" value="<?php echo $row['id_country']; ?>">
                    <button type="submit" name="deleteData">Delete</button>
                </form>

                <script>
                    function confirmDelete() {
                    console.log("Confirmation function called");
                    return confirm('Are you sure you want to delete?');
                    }
                </script>

            <a href="admin.update.country.php?id=<?php echo $row['id_country']; ?>">Edit</a>
            </td>
        </tr>    
        <?php
            }
        ?>
    </table><br>
</body>
</html>