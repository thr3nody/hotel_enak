<?php
include 'dbh.inc.php';

if (isset($_POST['countryId'])) {
    $countryId = mysqli_real_escape_string($conn, $_POST['countryId']);

    $query = "SELECT * FROM city_country WHERE id_country = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $countryId);
        $stmt->execute();

        $result = $stmt->get_result();
        
        // Debugging statements
        if ($result === false) {
            die('Query failed: ' . $stmt->error);
        }

        $cities = $result->fetch_all(MYSQLI_ASSOC);

        echo json_encode($cities);

        $stmt->close();
    } else {
        echo json_encode(array("error" => "Database error"));
    }
}
?>
