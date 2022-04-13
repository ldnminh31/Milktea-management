-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 13, 2022 lúc 02:21 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nlcs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idhoadon` int(10) DEFAULT NULL,
  `idsanpham` int(10) DEFAULT NULL,
  `soluong` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idhoadon` int(10) NOT NULL,
  `idkhachhang` int(10) DEFAULT NULL,
  `ngaylap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idkhachhang` int(10) NOT NULL,
  `tenkhachhang` varchar(50) DEFAULT NULL,
  `sdt` int(10) DEFAULT NULL,
  `diem` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnhanvien` int(10) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `ngaythangnamsinh` date NOT NULL,
  `sdt` int(10) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `vitri` varchar(50) NOT NULL,
  `luong` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idnhanvien`, `hoten`, `ngaythangnamsinh`, `sdt`, `diachi`, `vitri`, `luong`) VALUES
(4, 'MINH LE', '2001-03-31', 1234567, 'CAN THO', 'Manager', '200k/giờ'),
(5, 'LE ANH KHOI', '2022-04-12', 1234567, 'CAN THO', 'Manager', '200k/giờ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsanpham` int(10) NOT NULL,
  `tensanpham` varchar(50) NOT NULL,
  `dongia` varchar(10) NOT NULL,
  `mota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsanpham`, `tensanpham`, `dongia`, `mota`) VALUES
(2, 'Trà Sữa Truyền Thống', '200000', 'Topping tran chau'),
(9, 'Trà sữa lúa mạch', '300000', 'Thơm ngon bổ rẻ'),
(11, 'Trà Đào', '20000', 'Rất ngon\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinquan`
--

CREATE TABLE `thongtinquan` (
  `tenquan` varchar(50) DEFAULT NULL,
  `tenquanly` varchar(50) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `sdt` int(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idhoadon`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idkhachhang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnhanvien`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnhanvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
