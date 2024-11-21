-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2024 lúc 09:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctnhomquyen`
--

CREATE TABLE `ctnhomquyen` (
  `idNQ` int(11) NOT NULL,
  `idCN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ctnhomquyen`
--

INSERT INTO `ctnhomquyen` (`idNQ`, `idCN`) VALUES
(44, 1),
(44, 2),
(44, 3),
(44, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctnhomquyen`
--
ALTER TABLE `ctnhomquyen`
  ADD PRIMARY KEY (`idNQ`,`idCN`),
  ADD KEY `idCN` (`idCN`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctnhomquyen`
--
ALTER TABLE `ctnhomquyen`
  ADD CONSTRAINT `ctnhomquyen_ibfk_1` FOREIGN KEY (`idNQ`) REFERENCES `nhomquyen` (`idNQ`),
  ADD CONSTRAINT `ctnhomquyen_ibfk_2` FOREIGN KEY (`idCN`) REFERENCES `chucnang` (`idCN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
