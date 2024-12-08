<?php
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_information_page"])) {
    $page_id_to_delete = $_POST["delete_information_page"];

    $delete_query = "DELETE FROM InformationPages WHERE page_id = '$page_id_to_delete'";
    $delete_result = mysqli_query($conn, $delete_query);

    if (!$delete_result) {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_information_page"])) {
    $page_id_to_edit = $_POST["edit_information_page"];

    $edit_query = "SELECT * FROM InformationPages WHERE page_id = '$page_id_to_edit'";
    $edit_result = mysqli_query($conn, $edit_query);

    if ($edit_result && mysqli_num_rows($edit_result) > 0) {
        $information_page_data = mysqli_fetch_assoc($edit_result);
        echo "<form method='post' action='' id='edit_form'" . $_SERVER["PHP_SELF"] . "'>";
        echo "<input type='hidden' name='page_id_to_update' value='" . $information_page_data["page_id"] . "'>";
        echo "Page Name: <input type='text' name='new_page_name' value='" . $information_page_data["page_name"] . "'><br>";
        echo "Content: <input type='text' name='new_content' value='" . $information_page_data["content"] . "'><br>";
        // Add other fields as needed
        echo "<button type='submit' name='close'>Đóng</button>";
        echo "<button type='submit' name='update_information_page'>Cập nhật</button>";
        echo "</form>";
    } else {
        echo "Error fetching information page data: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_information_page"])) {
    $page_id_to_update = $_POST["page_id_to_update"];
    $new_page_name = $_POST["new_page_name"];
    $new_content = $_POST["new_content"];
    // Add other fields as needed

    $update_query = "UPDATE InformationPages SET page_name = '$new_page_name', content = '$new_content' WHERE page_id = '$page_id_to_update'";
    $update_result = mysqli_query($conn, $update_query);

    if (!$update_result) {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM InformationPages";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Page Name</th><th>Content</th><th>Actions</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["page_id"] . "</td>";
        echo "<td>" . $row["page_name"] . "</td>";
        echo "<td>" . $row["content"] . "</td>";
        echo "<td>";
        echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
        echo "<button type='submit' name='edit_information_page' value='" . $row["page_id"] . "'>Edit</button>";
        echo "<button type='submit' name='delete_information_page' value='" . $row["page_id"] . "'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có trang thông tin nào.";
}

mysqli_close($conn);
