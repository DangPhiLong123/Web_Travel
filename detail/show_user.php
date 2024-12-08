<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_user"])) {
    $user_id_to_delete = $_POST["delete_user"];

    $delete_query = "DELETE FROM Users WHERE user_id = '$user_id_to_delete'";
    $delete_result = mysqli_query($conn, $delete_query);

    if (!$delete_result) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_user"])) {
    $user_id_to_edit = $_POST["edit_user"];

    $edit_query = "SELECT * FROM Users WHERE user_id = '$user_id_to_edit'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $user_data = mysqli_fetch_assoc($edit_result);
        echo "<form method='post' action='' id='edit_form'" . $_SERVER["PHP_SELF"] . "'>";
        echo "<input type='hidden' name='user_id_to_update' value='" . $user_data["user_id"] . "'>";
        echo "Username: <input type='text' name='new_username' value='" . $user_data["username"] . "'><br>";
        echo "Password: <input type='text' name='new_password' value='" . $user_data["password"] . "'><br>";
        echo "Email: <input type='text' name='new_email' value='" . $user_data["email"] . "'><br>";
        echo "Full Name: <input type='text' name='new_full_name' value='" . $user_data["full_name"] . "'><br>";
        echo "<button type='submit' name='close'>Đóng</button>";
        echo "<button type='submit' name='update_user'>Cập nhật</button>";
        echo "</form>";
    } else {
        echo "Error fetching user data: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_user"])) {
    $user_id_to_update = $_POST["user_id_to_update"];
    $new_username = $_POST["new_username"];
    $new_password = $_POST["new_password"];
    $new_email = $_POST["new_email"];
    $new_full_name = $_POST["new_full_name"];

    $update_query = "UPDATE Users SET username = '$new_username', password = '$new_password', email = '$new_email', full_name = '$new_full_name' WHERE user_id = '$user_id_to_update'";
    $update_result = mysqli_query($conn, $update_query);

    if (!$update_result) {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM Users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Email</th><th>Full Name</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["full_name"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
        echo "<button type='submit' name='edit_user' value='" . $row["user_id"] . "'>Edit</button>";
        echo "<button type='submit' name='delete_user' value='" . $row["user_id"] . "'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có người dùng nào.";
}

mysqli_close($conn);
