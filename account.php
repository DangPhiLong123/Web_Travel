<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Admin</title>

  <link rel="stylesheet" href="style/aside.css">
</head>

<body>
  <aside>
    <p> Tourist - Travel Việt Nam </p>
    <a href="user.php">
      <i class="fa fa-user-o" aria-hidden="true"></i>
      Quản Lý Người Dùng
    </a>
    <a href="tour.php">
      <i class="fa fa-laptop" aria-hidden="true"></i>
      Quản Lý Tour Du Lịch
    </a>
    <a href="booking.php">
      <i class="fa fa-clone" aria-hidden="true"></i>
      Quản Lý Đặt Tour
    </a>
    <a href="about.php">
      <i class="fa fa-star-o" aria-hidden="true"></i>
      Quản Lý Trang Thông Tin
    </a>
    <a href="account.php">
      <i class="fa fa-trash-o" aria-hidden="true"></i>
      Quản Lý Tài Khoản Admin
    </a>
    <a href="vehicles.php">
      <i class="fa fa-trash-o" aria-hidden="true"></i>
      Quản Lý Phươnng Tiện
    </a>
    <a href="roombooking.php">
      <i class="fa fa-trash-o" aria-hidden="true"></i>
      Quản Lý Đặt Phòng
    </a>
    <a href="event.php">
      <i class="fa fa-trash-o" aria-hidden="true"></i>
      Quản Lý Sự Kiện
    </a>
    <a href="admin.php">
      <i class="fa fa-trash-o" aria-hidden="true"></i>
      Quay Lại
    </a>
  </aside>

  <div class="content">
    <h2>Quản Lý Tài Khoản Admin</h2>

    <h3>Danh Sách Tài Khoản Admin</h3>
    <div>
      <?php require 'detail/show_admin.php'; ?>
    </div>

    <div>
      <h3>Thêm Tài Khoản Admin</h3>
      <form action="add.php" method="post" id="edit_form">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" name="add_admin" value="Thêm Admin">
      </form>
    </div>
  </div>
</body>

</html>