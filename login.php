<?php
include('db_connection.php');

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Admins WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        header("location:admin.php");
    } else {
        echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style/login.css">
</head>

<body>
    <div class="logo">
        <a href="index.php" class="name-company">
            <img src="image/logo.png" alt="" class="site-logo"> ViVuViet
        </a>
    </div>

    <div class="login-container">
        <form class="login-form" method="POST">
            <h1>Welcome back</h1>
            <p>Vui lòng điền thông tin đăng nhập</p>
            <div class="input-group">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="submit">Đăng nhập</button>
            <div class="bottom-text">
                <p>Chưa có tài khoản? <a href="#">Đăng ký</a></p>
                <p><a href="#">Quên mật khẩu?</a></p>
            </div>
        </form>
    </div>
</body>

</html>