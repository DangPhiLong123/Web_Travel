<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_tour"])) {
    $tour_id_to_delete = $_POST["delete_tour"];

    $delete_query = "DELETE FROM Tours WHERE tour_id = '$tour_id_to_delete'";
    $delete_result = mysqli_query($conn, $delete_query);

    if (!$delete_result) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_tour"])) {
    $tour_id_to_edit = $_POST["edit_tour"];

    $edit_query = "SELECT * FROM Tours WHERE tour_id = '$tour_id_to_edit'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $tour_data = mysqli_fetch_assoc($edit_result);
        echo "<form method='post' action='' id='edit_form' " . $_SERVER["PHP_SELF"] . "' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='tour_id_to_update' value='" . $tour_data["tour_id"] . "'>";
        echo "Tour Name: <input type='text' name='new_tour_name' value='" . $tour_data["tour_name"] . "'><br>";
        echo "Choose Image: <input type='file' name='tour_image' accept='image/*'><br>"; // Thêm trường input cho ảnh
        echo "Duration: <input type='text' name='new_duration' value='" . $tour_data["duration"] . "'><br>";
        echo "Departure Time: <input type='time' name='new_departure_time' value='" . $tour_data["departure_time"] . "'><br>";
        echo "Arrival Time: <input type='time' name='new_arrival_time' value='" . $tour_data["arrival_time"] . "'><br>";
        echo "Starting Point: <input type='text' name='new_starting_point' value='" . $tour_data["starting_point"] . "'><br>";
        echo "Available Seats: <input type='text' name='new_available_seats' value='" . $tour_data["available_seats"] . "'><br>";
        echo "Price: <input type='text' name='new_price' value='" . $tour_data["price"] . "'><br>";
        echo "Itinerary: <textarea name='new_itinerary'>" . $tour_data["itinerary"] . "</textarea><br>";
        echo "<button type='submit' name='close'>Đóng</button>";
        echo "<button type='submit' name='update_tour'>Cập nhật</button>";
        echo "</form>";
    } else {
        echo "Error fetching tour data: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_tour"])) {
    $tour_id_to_update = $_POST["tour_id_to_update"];
    $new_tour_name = $_POST["new_tour_name"];
    $new_duration = $_POST["new_duration"];
    $new_departure_time = $_POST["new_departure_time"];
    $new_arrival_time = $_POST["new_arrival_time"];
    $new_starting_point = $_POST["new_starting_point"];
    $new_available_seats = $_POST["new_available_seats"];
    $new_price = $_POST["new_price"];
    $new_itinerary = $_POST["new_itinerary"];

    if (isset($_FILES['tour_image']) && $_FILES['tour_image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['tour_image']['name'];
        $image_temp = $_FILES['tour_image']['tmp_name'];
        $image_path = "image/" . $image_name;

        move_uploaded_file($image_temp, $image_path);

        $update_query = "UPDATE Tours SET tour_name = '$new_tour_name', tour_image = '$image_path', duration = '$new_duration', departure_time = '$new_departure_time', arrival_time = '$new_arrival_time', starting_point = '$new_starting_point', available_seats = '$new_available_seats', price = '$new_price', itinerary = '$new_itinerary' WHERE tour_id = '$tour_id_to_update'";
        $update_result = mysqli_query($conn, $update_query);

        if (!$update_result) {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading image.";
    }
}

$sql = "SELECT * FROM Tours";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Tour Name</th><th>Tour Image</th><th>Duration</th><th>Departure Time</th><th>Arrival Time</th><th>Starting Point</th><th>Available Seats</th><th>Price</th><th>Itinerary</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["tour_id"] . "</td>";
        echo "<td>" . $row["tour_name"] . "</td>";
        echo "<td><img src='" . $row["tour_image"] . "' style='max-width: 200px; max-height: 200px;' alt='Tour Image'></td>";
        echo "<td>" . $row["duration"] . "</td>";
        echo "<td>" . $row["departure_time"] . "</td>";
        echo "<td>" . $row["arrival_time"] . "</td>";
        echo "<td>" . $row["starting_point"] . "</td>";
        echo "<td>" . $row["available_seats"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["itinerary"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
        echo "<button type='submit' name='edit_tour' value='" . $row["tour_id"] . "'>Edit</button>";
        echo "<button type='submit' name='delete_tour' value='" . $row["tour_id"] . "'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có tour nào.";
}

mysqli_close($conn);
