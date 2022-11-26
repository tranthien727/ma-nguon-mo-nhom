-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2022 lúc 03:18 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qldienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `Mactdh` int(11) NOT NULL,
  `Madon` int(11) NOT NULL,
  `Masp` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Giatien` decimal(18,0) NOT NULL,
  `Thanhtien` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`Mactdh`, `Madon`, `Masp`, `Soluong`, `Giatien`, `Thanhtien`) VALUES
(15, 35, 1, 3, '10000000', '30000000'),
(16, 35, 5, 2, '10000000', '20000000'),
(17, 36, 2, 1, '12000000', '12000000'),
(18, 36, 6, 2, '12000000', '24000000'),
(19, 36, 4, 3, '16000000', '48000000'),
(20, 37, 1, 1, '10000000', '10000000'),
(21, 37, 2, 1, '12000000', '12000000'),
(22, 38, 10, 1, '15000000', '15000000'),
(23, 38, 11, 1, '11000000', '11000000'),
(24, 38, 16, 1, '13000000', '13000000'),
(25, 39, 4, 1, '16000000', '16000000'),
(26, 39, 8, 1, '14000000', '14000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `Madon` int(11) NOT NULL,
  `Ngaydat` datetime NOT NULL,
  `Tinhtrang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaNguoidung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`Madon`, `Ngaydat`, `Tinhtrang`, `MaNguoidung`) VALUES
(35, '2022-11-25 13:24:57', 'Thành công', 1),
(36, '2022-11-25 13:28:15', 'Thành công', 1),
(37, '2022-11-25 13:29:18', 'Thành công', 1),
(38, '2022-11-25 13:30:09', 'Thành công', 2),
(39, '2022-11-25 13:30:19', 'Thành công', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `Mahang` int(11) NOT NULL,
  `Tenhang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`Mahang`, `Tenhang`) VALUES
(1, 'Sam Sung'),
(2, 'Apple'),
(3, 'Xiaomi'),
(4, 'Vsmart'),
(5, 'Oppo'),
(6, 'Huawei'),
(7, 'LG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hedieuhanh`
--

CREATE TABLE `hedieuhanh` (
  `Mahdh` int(11) NOT NULL,
  `Tenhdh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hedieuhanh`
--

INSERT INTO `hedieuhanh` (`Mahdh`, `Tenhdh`) VALUES
(1, 'Android'),
(2, 'IOS'),
(3, 'VOS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoidung` int(11) NOT NULL,
  `Hoten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dienthoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Matkhau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hinhanh` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Diachi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaNguoidung`, `Hoten`, `Email`, `Dienthoai`, `Matkhau`, `Hinhanh`, `Diachi`, `IDQuyen`) VALUES
(1, 'Trần Việt Thiện', 'thien@gmail.com', '0123456789', '25f9e794323b453885f5181f1b624d0b', 'employee.png', 'Nha Trang', NULL),
(2, 'Trần Văn Tiền', 'tien@gmail.com', '0159635247', '25f9e794323b453885f5181f1b624d0b', 'n.jpg', 'Phú Yên', NULL),
(9, 'Trần Việt Thiện', 'tran.thien727@gmail.com', '0357617190', '25f9e794323b453885f5181f1b624d0b', 'z-w-gu-canal.jpg', 'Nha Trang', 2),
(10, 'Chu Hằng', 'chu.hang727@gmail.com', '0165874523', '25f9e794323b453885f5181f1b624d0b', 'abc.jpg', 'Nha Trang', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `IDQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`IDQuyen`, `TenQuyen`) VALUES
(1, 'Member'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `Masp` int(11) NOT NULL,
  `Tensp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Giatien` decimal(18,0) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Thesim` int(11) NOT NULL,
  `Bonhotrong` int(11) NOT NULL,
  `Ram` int(11) NOT NULL,
  `Anhbia` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mahang` int(11) NOT NULL,
  `Mahdh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`Masp`, `Tensp`, `Giatien`, `Soluong`, `Thesim`, `Bonhotrong`, `Ram`, `Anhbia`, `Mahang`, `Mahdh`) VALUES
(1, 'Apple Iphone 11', '10000000', 5, 1, 8, 4, 'ip11.jpg', 2, 2),
(2, 'Apple Iphone 12', '12000000', 6, 1, 16, 8, 'ip12.jpg', 2, 2),
(3, 'Apple Iphone 13', '14000000', 7, 2, 32, 4, 'ip13.jpg', 2, 2),
(4, 'Apple Iphone 14', '16000000', 8, 1, 64, 8, 'ip14.jpg', 2, 2),
(5, 'SamSung GalaxyS19', '10000000', 5, 1, 8, 1, 'ss19.jpg', 1, 1),
(6, 'SamSung GalaxyS20', '12000000', 6, 2, 16, 2, 'ss20.jpg', 1, 1),
(7, 'SamSung GalaxyS21', '16000000', 7, 1, 32, 4, 'ss21.jpg', 1, 1),
(8, 'SamSung GalaxyS22', '14000000', 8, 2, 64, 8, 'ss22.jpg', 1, 1),
(9, 'Xiaomi mi9', '10000000', 5, 1, 8, 1, 'mi9.jpg', 3, 1),
(10, 'Xiaomi mi10', '15000000', 6, 2, 16, 2, 'mi10.jpg', 3, 1),
(11, 'Xiaomi mi11', '11000000', 7, 1, 32, 4, 'mi11.jpg', 3, 1),
(12, 'Xiaomi mi12', '9000000', 8, 2, 64, 8, 'mi12.jpg', 3, 1),
(13, 'Huawei nova 3i', '8000000', 5, 1, 8, 1, 'hwnv3.jpg', 6, 1),
(14, 'Huawei nova 4i', '10000000', 6, 2, 16, 1, 'hwnv4.jpg', 6, 1),
(15, 'Huawei nova 5i', '12000000', 7, 1, 32, 4, 'hwnv5.jpg', 6, 1),
(16, 'Huawei nova 6i', '13000000', 8, 2, 64, 8, 'hwnv6.jpg', 6, 1),
(17, 'LG G4', '7000000', 5, 1, 8, 1, 'lgg4.jpg', 7, 1),
(18, 'LG G5', '9000000', 6, 2, 16, 2, 'lgg5.jpg', 7, 1),
(19, 'LG G6', '10000000', 7, 1, 32, 4, 'lgg6.jpg', 7, 1),
(20, 'LG G7', '12000000', 8, 2, 64, 8, 'lgg7.jpg', 7, 1),
(21, 'Oppo reno 3', '5000000', 5, 1, 8, 1, 'oprn3.jpg', 5, 1),
(22, 'Oppo reno 4', '7000000', 6, 2, 16, 2, 'oprn4.jpg', 5, 1),
(23, 'Oppo reno 5', '9000000', 7, 1, 32, 4, 'oprn5.jpg', 5, 1),
(24, 'Oppo reno 6', '10000000', 8, 2, 64, 8, 'oprn6.jpg', 5, 1),
(25, 'Vsmart Joy 1', '6000000', 5, 1, 8, 1, 'vsj1.jpg', 4, 3),
(26, 'Vsmart Joy 2', '7000000', 6, 2, 16, 2, 'vsj2.jpg', 4, 3),
(27, 'Vsmart Joy 3', '8000000', 7, 1, 32, 4, 'vsj3.jpg', 4, 3),
(28, 'Vsmart Joy 4', '9000000', 8, 2, 64, 8, 'vsj4.jpg', 4, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`Mactdh`),
  ADD KEY `Madon` (`Madon`,`Masp`),
  ADD KEY `Masp` (`Masp`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`Madon`),
  ADD KEY `MaNguoidung` (`MaNguoidung`);

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`Mahang`);

--
-- Chỉ mục cho bảng `hedieuhanh`
--
ALTER TABLE `hedieuhanh`
  ADD PRIMARY KEY (`Mahdh`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaNguoidung`),
  ADD KEY `IDQuyen` (`IDQuyen`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`IDQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Masp`),
  ADD KEY `Mahang` (`Mahang`,`Mahdh`),
  ADD KEY `Mahdh` (`Mahdh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `Mactdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `Madon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `Mahang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hedieuhanh`
--
ALTER TABLE `hedieuhanh`
  MODIFY `Mahdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaNguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `IDQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`Masp`) REFERENCES `sanpham` (`Masp`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`Madon`) REFERENCES `donhang` (`Madon`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaNguoidung`) REFERENCES `nguoidung` (`MaNguoidung`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`IDQuyen`) REFERENCES `phanquyen` (`IDQuyen`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`Mahang`) REFERENCES `hangsanxuat` (`Mahang`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`Mahdh`) REFERENCES `hedieuhanh` (`Mahdh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
