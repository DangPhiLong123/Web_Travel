<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_booking"])) {
    $booking_id_to_delete = $_POST["delete_booking"];

    $delete_query = "DELETE FROM Bookings WHERE booking_id = '$booking_id_to_delete'";
    $delete_result = mysqli_query($conn, $delete_query);

    if (!$delete_result) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_booking"])) {
    $booking_id_to_edit = $_POST["edit_booking"];

    $edit_query = "SELECT * FROM Bookings WHERE booking_id = '$booking_id_to_edit'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $booking_data = mysqli_fetch_assoc($edit_result);
        echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "' id='edit_form'>";
        echo "<input type='hidden' name='booking_id_to_update' value='" . $booking_data["booking_id"] . "'>";
        echo "User ID: <input type='text' name='new_user_id' value='" . $booking_data["user_id"] . "'><br>";
        echo "Tour ID: <input type='text' name='new_tour_id' value='" . $booking_data["tour_id"] . "'><br>";
        echo "Full Name: <input type='text' name='new_full_name' value='" . $booking_data["full_name"] . "'><br>";
        echo "Email: <input type='text' name='new_email' value='" . $booking_data["email"] . "'><br>";
        echo "Birth Date: <input type='text' name='new_birth_date' value='" . $booking_data["birth_date"] . "'><br>";
        echo "Phone Number: <input type='text' name='new_phone_number' value='" . $booking_data["phone_number"] . "'><br>";
        echo "Number People: <input type='text' name='num_people' value='" . $booking_data["num_people"] . "'><br>";
        echo "Booking Date: <input type='text' name='new_booking_date' value='" . $booking_data["booking_date"] . "'><br>";
        echo "Request: <input type='text' name='new_request' value='" . $booking_data["request"] . "'><br>";
        echo "<button type='submit' name='close'>Đóng</button>";
        echo "<button type='submit' name='update_booking'>Cập nhật</button>";
        echo "</form>";
    } else {
        echo "Error fetching booking data: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_booking"])) {
    $booking_id_to_update = $_POST["booking_id_to_update"];
    $new_user_id = $_POST["new_user_id"];
    $new_tour_id = $_POST["new_tour_id"];
    $new_full_name = $_POST["new_full_name"];
    $new_email = $_POST["new_email"];
    $new_birth_date = $_POST["new_birth_date"];
    $new_phone_number = $_POST["new_phone_number"];
    $num_people = $_POST["num_people"];
    $new_booking_date = $_POST["new_booking_date"];
    $new_request = $_POST["new_request"];

    $update_query = "UPDATE Bookings SET user_id = '$new_user_id', tour_id = '$new_tour_id', full_name = '$new_full_name', email = '$new_email', birth_date = '$new_birth_date', phone_number = '$new_phone_number', num_people = '$num_people', booking_date = '$new_booking_date', request = '$new_request' WHERE booking_id = '$booking_id_to_update'";
    $update_result = mysqli_query($conn, $update_query);

    if (!$update_result) {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM Bookings";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>User ID</th><th>Tour ID</th><th>Full Name</th><th>Email</th><th>Birth Date</th><th>Phone Number</th><th>Number People</th><th>Booking Date</th><th>Request</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["booking_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["tour_id"] . "</td>";
        echo "<td>" . $row["full_name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["birth_date"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td>" . $row["num_people"] . "</td>";
        echo "<td>" . $row["booking_date"] . "</td>";
        echo "<td>" . $row["request"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
        echo "<button type='submit' name='edit_booking' value='" . $row["booking_id"] . "'>Edit</button>";
        echo "<button type='submit' name='delete_booking' value='" . $row["booking_id"] . "'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có đặt tour nào.";
}

mysqli_close($conn);
