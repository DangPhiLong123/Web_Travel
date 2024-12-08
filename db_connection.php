<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "btlphp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}
