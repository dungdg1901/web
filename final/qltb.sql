-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2022 lúc 03:02 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `actived_flag` int(1) NOT NULL,
  `reset_password_token` varchar(100) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`, `actived_flag`, `reset_password_token`, `updated`, `created`) VALUES
(1, 'vanh12345', '12345678', 1, '', '2022-12-22 17:34:35', '2022-12-22 17:34:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `building` char(10) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `device`
--

CREATE TABLE `devices` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `device_transactions`
--

CREATE TABLE `device_transactions` (
  `id` int(10) NOT NULL,
  `device_id` int(10) DEFAULT NULL,
  `teacher_id` int(10) DEFAULT NULL,
  `classroom_id` int(10) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `start_transaction_plan` datetime DEFAULT NULL,
  `end_transaction_plan` datetime DEFAULT NULL,
  `returned_date` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `specialized` char(10) DEFAULT NULL,
  `degree` char(10) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Chỉ mục cho bảng `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `device`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `device_transactions`
--
ALTER TABLE `device_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `device`
--
ALTER TABLE `devices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `device_transactions`
--
ALTER TABLE `device_transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
