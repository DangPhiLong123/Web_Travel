<?php
include('db_connection.php');

$message = "";

if (isset($_POST["add_user"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];

    $user_sql = "INSERT INTO Users (username, password, email, full_name) VALUES ('$username', '$password', '$email', '$full_name')";

    if (mysqli_query($conn, $user_sql)) {
        $message = "Người dùng đã được thêm thành công.";
    } else {
        $message = "Lỗi: " . $user_sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST["add_tour"])) {
    $tour_name = $_POST["tour_name"];
    $duration = $_POST["duration"];
    $departure_time = $_POST["departure_time"];
    $arrival_time = $_POST["arrival_time"];
    $starting_point = $_POST["starting_point"];
    $available_seats = $_POST["available_seats"];
    $price = $_POST["price"];
    $itinerary = $_POST["itinerary"];

    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["tour_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["add_tour"])) {
        $check = getimagesize($_FILES["tour_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $message = "Lỗi: Tệp tin không phải là hình ảnh.";
            $uploadOk = 0;
        }
    }

    if ($_FILES["tour_image"]["size"] > 5000000) {
        $message = "Lỗi: Kích thước tệp tin quá lớn.";
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $message = "Lỗi: Chỉ chấp nhận các tệp tin JPG, JPEG, PNG và GIF.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $message = "Lỗi: Tệp tin của bạn không được tải lên.";
    } else {
        if (move_uploaded_file($_FILES["tour_image"]["tmp_name"], $target_file)) {
            $tour_sql = "INSERT INTO Tours (tour_name, tour_image, duration, departure_time, arrival_time, starting_point, available_seats, price, itinerary) VALUES ('$tour_name', '$target_file', '$duration', '$departure_time', '$arrival_time', '$starting_point', '$available_seats', '$price', '$itinerary')";

            if (mysqli_query($conn, $tour_sql)) {
                $message = "Tour du lịch đã được thêm thành công.";
            } else {
                $message = "Lỗi: " . $tour_sql . "<br>" . mysqli_error($conn);
            }
        } else {
            $message = "Lỗi: Có lỗi xảy ra khi tải lên tệp tin.";
        }
    }
}

if (isset($_POST["book_tour"])) {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $birth_date = $_POST["birth_date"];
    $phone_number = $_POST["phone_number"];
    $num_people = $_POST["num_people"];
    $selected_tour = $_POST["selected_tour"];

    $request = isset($_POST["request"]) ? $_POST["request"] : "";

    $booktour_sql = "INSERT INTO Bookings (full_name, email, birth_date, phone_number, num_people, tour_id, request) VALUES ('$full_name', '$email', '$birth_date', '$phone_number', '$num_people', '$selected_tour', '$request')";

    if (mysqli_query($conn, $booktour_sql)) {
        $message = "Đặt tour thành công.";
    } else {
        $message = "Lỗi: " . $booktour_sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST["add_booking"])) {
    $user_id = $_POST['user_id'];
    $tour_id = $_POST['tour_id'];
    $num_people = $_POST['num_people'];
    $booking_date = $_POST['booking_date'];

    $booking_sql = "INSERT INTO Bookings (user_id, tour_id, num_people, booking_date) VALUES ('$user_id', '$tour_id', '$num_people', '$booking_date')";

    if (mysqli_query($conn, $booking_sql)) {
        $message = "Đặt tour đã được thêm thành công.";
    } else {
        $message = "Lỗi: " . $booking_sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST["add_informationpages"])) {
    $page_name = $_POST['page_name'];
    $content = $_POST['content'];

    $page_sql = "INSERT INTO InformationPages (page_name, content) VALUES ('$page_name', '$content')";

    if (mysqli_query($conn, $page_sql)) {
        $message = "Trang thông tin đã được thêm thành công.";
    } else {
        $message = "Lỗi: " . $page_sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST["add_admin"])) {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];
    $admin_email = $_POST['email'];

    $admin_sql = "INSERT INTO Admins (username, password, email) VALUES ('$admin_username', '$admin_password', '$admin_email')";

    if (mysqli_query($conn, $admin_sql)) {
        $message = "Admin đã được thêm thành công.";
    } else {
        $message = "Lỗi: " . $admin_sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST["add_vehicle"])) {
    $vehicle_name = $_POST['vehicle_name'];

    $vehicle_sql = "INSERT INTO Vehicles (vehicle_name) VALUES ('$vehicle_name')";

    if (mysqli_query($conn, $vehicle_sql)) {
        $message = "Phương tiện đã được thêm thành công.";
    } else {
        $message = "Lỗi: " . $vehicle_sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST["add_roombooking"])) {
    $user_id = $_POST['user_id'];
    $room_id = $_POST['room_id'];
    $booking_date = $_POST['booking_date'];

    $room_booking_sql = "INSERT INTO RoomBookings (user_id, room_id, booking_date) VALUES ('$user_id', '$room_id', '$booking_date')";

    if (mysqli_query($conn, $room_booking_sql)) {
        $message = "Đặt phòng đã được thêm thành công.";
    } else {
        $message = "Lỗi: " . $room_booking_sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST["add_event"])) {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];

    $event_sql = "INSERT INTO Events (event_name, event_date) VALUES ('$event_name', '$event_date')";

    if (mysqli_query($conn, $event_sql)) {
        $message = "Sự kiện đã được thêm thành công.";
    } else {
        $message = "Lỗi: " . $event_sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo</title>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>

<body>
    <div>
        <p><?php echo $message; ?></p>
        <button onclick="goBack()">Quay lại</button>
    </div>
</body>

</html>