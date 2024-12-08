<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="style/admin.css">
</head>

<body>
    <div class="logo">
        <a href="index.php" class="name-company">
            <img src="image/logo.png" alt="" class="site-logo"> ViVuViet
        </a>
    </div>

    <section class="our-service-sect" id="ourservices">
        <div class="container">
            <h3 class="section-title"><span class="left-line"></span> ADMIN <span class="right-line"></span></h3>
            <h2 class="section-bold-title">Giao Diện Quản Lý</h2>

            <a href="user.php">
                <div class="our-services">
                    <div class="our-service-item">
                        <i class="fa fa-3x fa-globe"></i>
                        <h3 class="our-service-title">Quản Lý Người Dùng</h3>
                        <p class="our-service-text">Xem danh sách người dùng, tìm kiếm, chỉnh sửa và xóa thông tin</p>
                    </div>
            </a>

            <a href="tour.php">
                <div class="our-service-item">
                    <i class="fa fa-3x fa-hotel"></i>
                    <h3 class="our-service-title">Quản Lý Tour Du Lịch</h3>
                    <p class="our-service-text">Xem hành trình các tour du lịch, tìm kiếm, thêm, chỉnh sửa, xóa</p>
                </div>
            </a>

            <a href="booking.php">
                <div class="our-service-item">
                    <i class="fa fa-3x fa-user"></i>
                    <h3 class="our-service-title">Quản Lý Đặt Tour</h3>
                    <p class="our-service-text">Xem danh sách các tour đã đặt, tìm kiếm, chỉnh sửa, xóa tour</p>
                </div>
            </a>

            <a href="about.php">
                <div class="our-service-item">
                    <i class="fa fa-3x fa-cog"></i>
                    <h3 class="our-service-title">Quản Lý Trang Thông Tin</h3>
                    <p class="our-service-text">Chỉnh sửa thông tin, thêm, sửa , xóa nội dung</p>
                </div>
            </a>

            <a href="account.php">
                <div class="our-service-item">
                    <i class="fa fa-3x fa-globe"></i>
                    <h3 class="our-service-title">Quản Lý Tài Khoản Admin</h3>
                    <p class="our-service-text">Xem danh sách, Thêm, Sửa, Xóa tài khoản Admin</p>
                </div>
            </a>

            <a href="vehicles.php">
                <div class="our-service-item">
                    <i class="fa fa-3x fa-hotel"></i>
                    <h3 class="our-service-title">Quản Lý Phương Tiện </h3>
                    <p class="our-service-text">Xem danh sách các phương tiện, thêm, sửa, xóa</p>
                </div>
            </a>

            <a href="roombooking.php">
                <div class="our-service-item">
                    <i class="fa fa-3x fa-user"></i>
                    <h3 class="our-service-title">Quản Lý Đặt Phòng </h3>
                    <p class="our-service-text">Xem danh sách các phòng, them, sửa, xóa </p>
                </div>
            </a>

            <a href="event.php">
                <div class="our-service-item">
                    <i class="fa fa-3x fa-cog"></i>
                    <h3 class="our-service-title">Quản Lý Sự Kiện</h3>
                    <p class="our-service-text">Xem thông tin, thêm, sửa, xóa các sự kiện </p>
                </div>
            </a>
        </div>
    </section>
</body>

<?php
if (isset($_POST["submit"])) {
    header("location:admin.php");
}
?>

</html>