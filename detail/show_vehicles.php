<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_vehicle"])) {
    $vehicle_id_to_delete = $_POST["delete_vehicle"];

    $delete_query = "DELETE FROM Vehicles WHERE vehicle_id = '$vehicle_id_to_delete'";
    $delete_result = mysqli_query($conn, $delete_query);

    if (!$delete_result) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_vehicle"])) {
    $vehicle_id_to_edit = $_POST["edit_vehicle"];

    $edit_query = "SELECT * FROM Vehicles WHERE vehicle_id = '$vehicle_id_to_edit'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $vehicle_data = mysqli_fetch_assoc($edit_result);
        echo "<form method='post' action='' id='edit_form'" . $_SERVER["PHP_SELF"] . "'>";
        echo "<input type='hidden' name='vehicle_id_to_update' value='" . $vehicle_data["vehicle_id"] . "'>";
        echo "Vehicle Name: <input type='text' name='new_vehicle_name' value='" . $vehicle_data["vehicle_name"] . "'><br>";
        echo "<button type='submit' name='close'>Đóng</button>";
        echo "<button type='submit' name='update_vehicle'>Cập nhật</button>";
        echo "</form>";
    } else {
        echo "Error fetching vehicle data: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_vehicle"])) {
    $vehicle_id_to_update = $_POST["vehicle_id_to_update"];
    $new_vehicle_name = $_POST["new_vehicle_name"];

    $update_query = "UPDATE Vehicles SET vehicle_name = '$new_vehicle_name' WHERE vehicle_id = '$vehicle_id_to_update'";
    $update_result = mysqli_query($conn, $update_query);

    if (!$update_result) {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM Vehicles";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Vehicle Name</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["vehicle_id"] . "</td>";
        echo "<td>" . $row["vehicle_name"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
        echo "<button type='submit' name='edit_vehicle' value='" . $row["vehicle_id"] . "'>Edit</button>";
        echo "<button type='submit' name='delete_vehicle' value='" . $row["vehicle_id"] . "'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có phương tiện nào.";
}

mysqli_close($conn);
