<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_admin"])) {
    $admin_id_to_delete = $_POST["delete_admin"];

    $delete_query = "DELETE FROM Admins WHERE admin_id = '$admin_id_to_delete'";
    $delete_result = mysqli_query($conn, $delete_query);

    if (!$delete_result) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_admin"])) {
    $admin_id_to_edit = $_POST["edit_admin"];

    $edit_query = "SELECT * FROM Admins WHERE admin_id = '$admin_id_to_edit'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $admin_data = mysqli_fetch_assoc($edit_result);
        echo "<form method='post' action='' id='edit_form'" . $_SERVER["PHP_SELF"] . "'>";
        echo "<input type='hidden' name='admin_id_to_update' value='" . $admin_data["admin_id"] . "'>";
        echo "Username: <input type='text' name='new_admin_username' value='" . $admin_data["username"] . "'><br>";
        echo "Password: <input type='text' name='new_admin_password' value='" . $admin_data["password"] . "'><br>";
        echo "Email: <input type='text' name='new_admin_email' value='" . $admin_data["email"] . "'><br>";
        // Add other fields as needed
        echo "<button type='submit' name='close'>Đóng</button>";
        echo "<button type='submit' name='update_admin'>Cập nhật</button>";
        echo "</form>";
    } else {
        echo "Error fetching admin data: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_admin"])) {
    $admin_id_to_update = $_POST["admin_id_to_update"];
    $new_admin_username = $_POST["new_admin_username"];
    $new_admin_password = $_POST["new_admin_password"];
    $new_admin_email = $_POST["new_admin_email"];

    $update_query = "UPDATE Admins SET username = '$new_admin_username', password = '$new_admin_password', email = '$new_admin_email' WHERE admin_id = '$admin_id_to_update'";
    $update_result = mysqli_query($conn, $update_query);

    if (!$update_result) {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM Admins";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Email</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["admin_id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
        echo "<button type='submit' name='edit_admin' value='" . $row["admin_id"] . "'>Edit</button>";
        echo "<button type='submit' name='delete_admin' value='" . $row["admin_id"] . "'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có người dùng (Admin) nào.";
}

mysqli_close($conn);
