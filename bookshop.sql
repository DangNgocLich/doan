-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 01, 2020 lúc 03:34 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookshop`
--
CREATE DATABASE IF NOT EXISTS `bookshop` DEFAULT CHARACTER SET utf32 COLLATE utf32_general_ci;
USE `bookshop`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonban`
--

DROP TABLE IF EXISTS `chitiethoadonban`;
CREATE TABLE `chitiethoadonban` (
  `MAHOADON` int(11) NOT NULL,
  `MASP` varchar(50) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `DONGIA` int(11) NOT NULL,
  `THANHTIEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadonban`
--

INSERT INTO `chitiethoadonban` (`MAHOADON`, `MASP`, `SOLUONG`, `DONGIA`, `THANHTIEN`) VALUES
(25, '12312', 20, 12, 120),
(26, 'kinh di 2', 500, 100, 5000),
(29, '12312111111', 2, 111111111, 222222222),
(30, '12312111111', 1, 111111111, 111111111),
(31, '0', 1, 12, 12),
(31, '12312111111', 1, 111111111, 111111111),
(32, '0', 20, 12, 240),
(32, '12312111111', 5, 111111111, 555555555);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonkho`
--

DROP TABLE IF EXISTS `chitiethoadonkho`;
CREATE TABLE `chitiethoadonkho` (
  `MAHOADON` int(11) NOT NULL,
  `MASP` varchar(50) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `DONGIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadonkho`
--

INSERT INTO `chitiethoadonkho` (`MAHOADON`, `MASP`, `SOLUONG`, `DONGIA`) VALUES
(27, '12312', 900, 12),
(27, 'kinh di 2', 1000, 100),
(30, 'kinh di 2', 1000, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE `hoadon` (
  `MAHOADON` int(11) NOT NULL,
  `TONGIA` int(50) NOT NULL,
  `NGAYBAN` date NOT NULL DEFAULT current_timestamp(),
  `MANV` varchar(50) NOT NULL,
  `MASUKIEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHOADON`, `TONGIA`, `NGAYBAN`, `MANV`, `MASUKIEN`) VALUES
(25, 240, '2020-05-01', '1', '0'),
(26, 50000, '2020-05-01', '1', '0'),
(29, 222222222, '2020-05-01', '1', '0'),
(30, 111111111, '2020-05-01', '1', '20'),
(31, 88888898, '2020-05-01', '1', '20'),
(32, 444444636, '2020-05-01', '1', '20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhapkho`
--

DROP TABLE IF EXISTS `hoadonnhapkho`;
CREATE TABLE `hoadonnhapkho` (
  `MAPHIEUNHAPKHO` int(11) NOT NULL,
  `TONGTIEN` int(11) NOT NULL,
  `MANV` varchar(50) NOT NULL,
  `NGAYNHAP` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `hoadonnhapkho`
--

INSERT INTO `hoadonnhapkho` (`MAPHIEUNHAPKHO`, `TONGTIEN`, `MANV`, `NGAYNHAP`) VALUES
(27, 100800, '1', '2020-05-01'),
(30, 100000, '1', '2020-05-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE `nhanvien` (
  `CMND` varchar(50) NOT NULL,
  `TENNV` varchar(50) NOT NULL,
  `SDT` varchar(50) NOT NULL,
  `CHUCVU` int(11) NOT NULL,
  `MATKHAU` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`CMND`, `TENNV`, `SDT`, `CHUCVU`, `MATKHAU`) VALUES
('1', 'admin1', '1', 3, '1'),
('2', 'bc1', '11', 2, '1'),
('admin', 'admin', 'admin', 1, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham` (
  `MASP` varchar(50) NOT NULL,
  `anh` varchar(50) NOT NULL,
  `TENSP` varchar(50) NOT NULL,
  `TACGIA` varchar(50) NOT NULL,
  `MATL` int(11) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `DONGIA` int(30) NOT NULL,
  `LUOTMUA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `anh`, `TENSP`, `TACGIA`, `MATL`, `SOLUONG`, `DONGIA`, `LUOTMUA`) VALUES
('0', '=)).jpg', 'abcd', 'e', 132, 76, 12, 24),
('12312', 'bí thuật.jpg', 'abcdeeeeeeeee', '12345', 132, 7990, 12, 210),
('12312111111', '=)).jpg', 'abcdeeee', '321321', 132, 9987, 111111111, 13),
('123456', '=)).jpg', 'abcd1235', 'bbbb', 132, 500, 110000, 0),
('kinh di 2', '2.jpg', 'asdsadsa', '12345', 132, 3200, 100, 1000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sukien`
--

DROP TABLE IF EXISTS `sukien`;
CREATE TABLE `sukien` (
  `MASUKIEN` varchar(50) NOT NULL,
  `TENSUKIEN` varchar(50) NOT NULL,
  `DISCOUNT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `sukien`
--

INSERT INTO `sukien` (`MASUKIEN`, `TENSUKIEN`, `DISCOUNT`) VALUES
('0', 'Khong GIam', 0),
('20', 'giamgia 20%', 20),
('21', 'giamgia 22%', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

DROP TABLE IF EXISTS `theloai`;
CREATE TABLE `theloai` (
  `MATL` int(11) NOT NULL,
  `TENTL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`MATL`, `TENTL`) VALUES
(128, 'kinh di'),
(132, 'kinh di 1 2 3 4 5 6 7 8 9 10'),
(135, 'kinh 3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadonban`
--
ALTER TABLE `chitiethoadonban`
  ADD PRIMARY KEY (`MAHOADON`,`MASP`),
  ADD KEY `masp_chitietban_sanpham` (`MASP`);

--
-- Chỉ mục cho bảng `chitiethoadonkho`
--
ALTER TABLE `chitiethoadonkho`
  ADD PRIMARY KEY (`MAHOADON`,`MASP`),
  ADD KEY `masp_chitietkho_sanpham` (`MASP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHOADON`),
  ADD KEY `manv_hoadon_nhanvien` (`MANV`),
  ADD KEY `mask_hoadon_sukien` (`MASUKIEN`);

--
-- Chỉ mục cho bảng `hoadonnhapkho`
--
ALTER TABLE `hoadonnhapkho`
  ADD PRIMARY KEY (`MAPHIEUNHAPKHO`),
  ADD KEY `manv_hoadonnhapkho_nhanvien` (`MANV`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`CMND`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `matl_sanpham_theloai` (`MATL`);

--
-- Chỉ mục cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`MASUKIEN`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MATL`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHOADON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `hoadonnhapkho`
--
ALTER TABLE `hoadonnhapkho`
  MODIFY `MAPHIEUNHAPKHO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `MATL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadonban`
--
ALTER TABLE `chitiethoadonban`
  ADD CONSTRAINT `mahoadon_chitietban_hoadon` FOREIGN KEY (`MAHOADON`) REFERENCES `hoadon` (`MAHOADON`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `masp_chitietban_sanpham` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethoadonkho`
--
ALTER TABLE `chitiethoadonkho`
  ADD CONSTRAINT `mahoadon_chitietnhap_hoadonnhap` FOREIGN KEY (`MAHOADON`) REFERENCES `hoadonnhapkho` (`MAPHIEUNHAPKHO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `masp_chitietkho_sanpham` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `manv_hoadon_nhanvien` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`CMND`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mask_hoadon_sukien` FOREIGN KEY (`MASUKIEN`) REFERENCES `sukien` (`MASUKIEN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonnhapkho`
--
ALTER TABLE `hoadonnhapkho`
  ADD CONSTRAINT `manv_hoadonnhapkho_nhanvien` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`CMND`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `matl_sanpham_theloai` FOREIGN KEY (`MATL`) REFERENCES `theloai` (`MATL`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
