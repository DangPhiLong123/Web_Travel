<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking</title>

  <link rel="stylesheet" href="style/aside.css">
</head>
<style>
  .content {
   margin: 20px;
   padding: 20px;
   background-color: #E0F7FA;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   border-radius: 10px;
   width: 80%;
   height:1450px;
   margin: 0 auto;
}

.content {
   margin: 20px;
   padding: 20px;
}
</style>
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
    <h2>Quản Lý Đặt Tour</h2>

    <h3>Danh Sách Đặt Tour</h3>
    <div>
      <?php require 'detail/show_booking.php'; ?>
    </div>

    <div>
      <h3>Thêm Đặt Tour</h3>
      <form action="add.php" method="post" id="edit_form">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required>

        <label for="tour_id">Tour ID:</label>
        <input type="text" id="tour_id" name="tour_id" required>

        <label for="tour_id">Number People:</label>
        <input type="text" id="num_people" name="num_people" required>

        <label for="booking_date">Booking Date:</label>
        <input type="date" id="booking_date" name="booking_date" required>

        <input type="submit" name="add_booking" value="Thêm Đặt Tour">
      </form>
    </div>
  </div>
</body>

</html>