-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th1 18, 2024 lúc 05:04 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baitaplonphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'admin', '123', 'admin@example.com'),
(8, 'admin2', '2', 'admin2@example.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` int(11) NOT NULL,
  `num_people` int(11) NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp(),
  `request` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `tour_id`, `full_name`, `email`, `birth_date`, `phone_number`, `num_people`, `booking_date`, `request`) VALUES
(9, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '0000-00-00', 705688261, 2, '0000-00-00 00:00:00', ''),
(10, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 705688261, 2, '0000-00-00 00:00:00', ''),
(11, NULL, 16, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 6, '0000-00-00 00:00:00', ''),
(12, NULL, 16, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 6, '0000-00-00 00:00:00', ''),
(13, NULL, 14, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-09-19', 2147483647, 2, '0000-00-00 00:00:00', ''),
(14, NULL, 14, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-09-19', 2147483647, 2, '0000-00-00 00:00:00', ''),
(15, NULL, 14, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-09-19', 2147483647, 2, '0000-00-00 00:00:00', ''),
(16, NULL, 14, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-09-19', 2147483647, 2, '0000-00-00 00:00:00', ''),
(17, NULL, 14, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-09-19', 2147483647, 2, '0000-00-00 00:00:00', ''),
(18, NULL, 15, 'Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 705688261, 3, '0000-00-00 00:00:00', 'YC'),
(19, NULL, 15, 'Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 705688261, 3, '2024-01-18 22:19:59', 'YC'),
(20, NULL, 14, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '0000-00-00', 2147483647, 1, '2024-01-18 22:25:05', ''),
(21, NULL, 14, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '0000-00-00', 2147483647, 1, '2024-01-18 22:26:31', ''),
(22, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:27:09', ''),
(23, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:27:38', ''),
(24, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:27:41', ''),
(25, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:28:21', ''),
(26, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:28:23', ''),
(27, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:28:25', ''),
(28, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:28:27', ''),
(29, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:28:47', ''),
(30, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:28:50', ''),
(31, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:28:52', ''),
(32, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:32:38', ''),
(33, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:32:41', ''),
(34, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:32:53', ''),
(35, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:33:09', NULL),
(36, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:33:14', NULL),
(37, NULL, 15, 'Đường Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:36:50', ''),
(38, NULL, 15, 'Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:37:17', ''),
(39, NULL, 15, 'Quốc Thắng', '1dt19042003@gmail.com', '2003-04-19', 2147483647, 2, '2024-01-18 22:41:18', 'ABC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`) VALUES
(7, 'Event 6', '2024-01-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `informationpages`
--

CREATE TABLE `informationpages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `informationpages`
--

INSERT INTO `informationpages` (`page_id`, `page_name`, `content`) VALUES
(1, 'Page 1', 'Content for Page 1'),
(2, 'Page 2', 'Content for Page 2'),
(3, 'Page 3', 'Content for Page 3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roombookings`
--

CREATE TABLE `roombookings` (
  `room_booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roombookings`
--

INSERT INTO `roombookings` (`room_booking_id`, `user_id`, `room_id`, `booking_date`) VALUES
(9, 2, 2, '2024-01-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tours`
--

CREATE TABLE `tours` (
  `tour_id` int(11) NOT NULL,
  `tour_name` varchar(100) NOT NULL,
  `tour_image` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `starting_point` varchar(255) NOT NULL,
  `available_seats` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `itinerary` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tours`
--

INSERT INTO `tours` (`tour_id`, `tour_name`, `tour_image`, `duration`, `departure_time`, `arrival_time`, `starting_point`, `available_seats`, `price`, `itinerary`) VALUES
(14, '5', 'image/alchemyrefiner_alchemymagic_3_5237079a-1733-4f49-99b7-dbfceea46b6a_0.jpg', '3 ngày', '12:31:00', '12:31:00', '5', 5, 123, '5'),
(15, '6', 'image/alchemyrefiner_alchemymagic_0_474f13d9-f760-4e42-a400-b992bf6930ed_0.jpg', '6', '21:46:00', '09:46:00', '6', 6, 6, '6'),
(16, '7', 'image/alchemyrefiner_alchemymagic_3_f8efaf5a-c0b2-4609-b0dd-75456a0aefb1_0.jpg', '7', '12:46:00', '00:59:00', '7', 7, 7, '7'),
(18, '5', 'image/Screenshot 2023-12-14 010749.png', '3 ngày', '08:18:00', '20:18:00', '5', 5, 123, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`) VALUES
(1, 'user1', 'password1', 'user1@example.com', 'User One'),
(2, 'user2', 'password2', 'user2@example.com', 'User Two'),
(3, 'user3', 'password3', 'user3@example.com', 'User Three'),
(33, '4', '4', '4@example.com', '4'),
(34, '5', '5', '5@example.com', '5'),
(35, '6', '7', '6@example.com', '6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_name`) VALUES
(1, 'Máy bay'),
(3, 'Ô tô'),
(7, 'Tàu'),
(8, 'Thuyền'),
(9, 'Xe đạp');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Username`);

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Chỉ mục cho bảng `informationpages`
--
ALTER TABLE `informationpages`
  ADD PRIMARY KEY (`page_id`);

--
-- Chỉ mục cho bảng `roombookings`
--
ALTER TABLE `roombookings`
  ADD PRIMARY KEY (`room_booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tour_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `informationpages`
--
ALTER TABLE `informationpages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `roombookings`
--
ALTER TABLE `roombookings`
  MODIFY `room_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tours`
--
ALTER TABLE `tours`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`);

--
-- Các ràng buộc cho bảng `roombookings`
--
ALTER TABLE `roombookings`
  ADD CONSTRAINT `roombookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
