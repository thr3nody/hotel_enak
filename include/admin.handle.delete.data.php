<?php
include 'dbh.inc.php';

session_start();

if (!isset($_SESSION["admin-username"])) {
    header("Location: http://localhost/hotelEnak/dist/pages/admin.login.php");
    exit();
}

// Check if data deletion is requested
if (isset($_POST['deleteData'])) {
    $dataType = mysqli_real_escape_string($conn, $_POST['dataType']);
    $dataId = mysqli_real_escape_string($conn, $_POST['dataId']);

    // Perform validation or additional checks if needed

    // Determine the table based on the data type
    $tableName = "";
    $idColumn = "";

    switch ($dataType) {
        case 'country':
            $tableName = 'country';
            $idColumn = 'id_country';
            break;
        case 'city_country':
            $tableName = 'city_country';
            $idColumn = 'id_city';
            break;
        case 'hotel':
            $tableName = 'hotel';
            $idColumn = 'id_hotel';
            break;
        // Add more cases as needed for other data types

        default:
            // Handle unknown data type or provide an error response
            echo json_encode(array("error" => "Unknown data type"));
            exit();
    }

    // Delete the data from the respective table
    $query = "DELETE FROM $tableName WHERE $idColumn = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $dataId);
        $stmt->execute();

        // Check if the deletion was successful
        if ($stmt->affected_rows > 0) {
            echo json_encode(array("success" => "Data deleted successfully!"));
        } else {
            echo json_encode(array("error" => "Failed to delete data."));
        }

        $stmt->close();
    } else {
        echo json_encode(array("error" => "Database error."));
    }
}

// Close the database connection if needed
$conn->close();
?>
