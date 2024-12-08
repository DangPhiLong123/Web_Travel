<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_event"])) {
    $event_id_to_delete = $_POST["delete_event"];

    $delete_query = "DELETE FROM Events WHERE event_id = '$event_id_to_delete'";
    $delete_result = mysqli_query($conn, $delete_query);

    if (!$delete_result) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_event"])) {
    $event_id_to_edit = $_POST["edit_event"];

    $edit_query = "SELECT * FROM Events WHERE event_id = '$event_id_to_edit'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $event_data = mysqli_fetch_assoc($edit_result);
        echo "<form method='post' action='' id='edit_form'" . $_SERVER["PHP_SELF"] . "'>";
        echo "<input type='hidden' name='event_id_to_update' value='" . $event_data["event_id"] . "'>";
        echo "Event Name: <input type='text' name='new_event_name' value='" . $event_data["event_name"] . "'><br>";
        echo "Event Date: <input type='text' name='new_event_date' value='" . $event_data["event_date"] . "'><br>";
        // Add other fields as needed
        echo "<button type='submit' name='close'>Đóng</button>";
        echo "<button type='submit' name='update_event'>Cập nhật</button>";
        echo "</form>";
    } else {
        echo "Error fetching event data: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_event"])) {
    $event_id_to_update = $_POST["event_id_to_update"];
    $new_event_name = $_POST["new_event_name"];
    $new_event_date = $_POST["new_event_date"];
    // Add other fields as needed

    $update_query = "UPDATE Events SET event_name = '$new_event_name', event_date = '$new_event_date' WHERE event_id = '$event_id_to_update'";
    $update_result = mysqli_query($conn, $update_query);

    if (!$update_result) {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM Events";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Tên Sự Kiện</th><th>Ngày Sự Kiện</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["event_id"] . "</td>";
        echo "<td>" . $row["event_name"] . "</td>";
        echo "<td>" . $row["event_date"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
        echo "<button type='submit' name='edit_event' value='" . $row["event_id"] . "'>Edit</button>";
        echo "<button type='submit' name='delete_event' value='" . $row["event_id"] . "'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có sự kiện nào.";
}

mysqli_close($conn);
