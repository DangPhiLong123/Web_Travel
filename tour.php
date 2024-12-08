<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tour</title>

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
   height:1600px;
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
    <h2>Quản Lý Tour</h2>

    <h3>Danh Sách Tour</h3>
    <div>
      <?php require 'detail/show_tour.php'; ?>
    </div>

    <div>
      <h3>Thêm Tour</h3>
      <form action="add.php" method="post" id="edit_form" enctype="multipart/form-data">
        <label for="tour_name">Tên Tour:</label>
        <input type="text" id="tour_name" name="tour_name" required>

        <label for="tour_image">Ảnh:</label>
        <input type="file" id="tour_image" name="tour_image" accept="image/*" required>

        <label for="duration">Thời gian:</label>
        <input type="text" id="duration" name="duration" required>

        <label for="departure_time">Thời gian Xuất Phát:</label>
        <input type="time" id="departure_time" name="departure_time" required>

        <label for="arrival_time">Thời gian Đến:</label>
        <input type="time" id="arrival_time" name="arrival_time" required>

        <label for="starting_point">Điểm Xuất Phát:</label>
        <input type="text" id="starting_point" name="starting_point" required>

        <label for="available_seats">Số Chỗ Còn:</label>
        <input type="text" id="available_seats" name="available_seats" required>

        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" required>

        <label for="itinerary">Lịch Trình:</label>
        <textarea id="itinerary" name="itinerary" required></textarea>

        <input type="submit" name="add_tour" value="Thêm Tour">
      </form>
    </div>

  </div>

</body>

</html>