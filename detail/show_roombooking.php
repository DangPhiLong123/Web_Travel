<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_room_booking"])) {
    $room_booking_id_to_delete = $_POST["delete_room_booking"];

    $delete_query = "DELETE FROM RoomBookings WHERE room_booking_id = '$room_booking_id_to_delete'";
    $delete_result = mysqli_query($conn, $delete_query);

    if (!$delete_result) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_room_booking"])) {
    $room_booking_id_to_edit = $_POST["edit_room_booking"];

    $edit_query = "SELECT * FROM RoomBookings WHERE room_booking_id = '$room_booking_id_to_edit'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $room_booking_data = mysqli_fetch_assoc($edit_result);
        echo "<form method='post' action='' id='edit_form'" . $_SERVER["PHP_SELF"] . "'>";
        echo "<input type='hidden' name='room_booking_id_to_update' value='" . $room_booking_data["room_booking_id"] . "'>";
        echo "User ID: <input type='text' name='new_user_id' value='" . $room_booking_data["user_id"] . "'><br>";
        echo "Room ID: <input type='text' name='new_room_id' value='" . $room_booking_data["room_id"] . "'><br>";
        echo "Booking Date: <input type='text' name='new_booking_date' value='" . $room_booking_data["booking_date"] . "'><br>";
        echo "<button type='submit' name='close'>Đóng</button>";
        echo "<button type='submit' name='update_room_booking'>Cập nhật</button>";
        echo "</form>";
    } else {
        echo "Error fetching room booking data: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_room_booking"])) {
    $room_booking_id_to_update = $_POST["room_booking_id_to_update"];
    $new_user_id = $_POST["new_user_id"];
    $new_room_id = $_POST["new_room_id"];
    $new_booking_date = $_POST["new_booking_date"];

    $update_query = "UPDATE RoomBookings SET user_id = '$new_user_id', room_id = '$new_room_id', booking_date = '$new_booking_date' WHERE room_booking_id = '$room_booking_id_to_update'";
    $update_result = mysqli_query($conn, $update_query);

    if (!$update_result) {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM RoomBookings";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>User ID</th><th>Room ID</th><th>Booking Date</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["room_booking_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["room_id"] . "</td>";
        echo "<td>" . $row["booking_date"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
        echo "<button type='submit' name='edit_room_booking' value='" . $row["room_booking_id"] . "'>Edit</button>";
        echo "<button type='submit' name='delete_room_booking' value='" . $row["room_booking_id"] . "'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có đặt phòng nào.";
}

mysqli_close($conn);
