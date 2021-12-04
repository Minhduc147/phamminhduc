-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2021 lúc 11:33 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gk`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh`
--

CREATE TABLE `binh` (
  `id` int(10) NOT NULL,
  `idsp` int(10) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh`
--

INSERT INTO `binh` (`id`, `idsp`, `user`, `noidung`, `date`) VALUES
(10, 2, 'lalsalkd', 'ád', '2021-12-02 09:11:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(10) NOT NULL,
  `iddh` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idsp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(20) NOT NULL,
  `gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(4) NOT NULL,
  `tendanhmuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anh` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`, `anh`, `soluong`) VALUES
(1, 'kinh tế', NULL, 0),
(2, 'Văn học', NULL, 0),
(3, 'Văn Hóa Và Xã Hội', NULL, 0),
(4, 'Sức khỏe và đời sống', NULL, 0),
(5, 'Ngoại ngữ', NULL, 0),
(6, 'Lịch sử và chính trị', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `iddh` int(20) NOT NULL,
  `iduser` int(50) NOT NULL,
  `thoidiemdh` datetime NOT NULL,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt` text COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `ghichukh` text COLLATE utf8_unicode_ci NOT NULL,
  `tong` float NOT NULL,
  `trangthai` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp`
--

CREATE TABLE `sp` (
  `id` int(4) NOT NULL,
  `tensp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `danhmuc` int(4) NOT NULL,
  `soluong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sp`
--

INSERT INTO `sp` (`id`, `tensp`, `gia`, `img`, `mota`, `danhmuc`, `soluong`) VALUES
(2, 'Kinh tế vĩ mô', 12, 'https://cdn0.fahasa.com/media/catalog/product/cache/1/thumbnail/362x/9df78eab33525d08d6e5fb8d27136e95/9/7/9786048690731-1.jpg', '', 1, 15),
(3, 'Tứ thư lãnh đạo', 12, 'https://i.pinimg.com/474x/d2/dc/c6/d2dcc691b53bbac3d034cabb395e16f5.jpg', '', 1, 12),
(4, 'Đắc Nhân tâm', 15, 'https://sach86.com/wp-content/uploads/2020/01/Dac-Nhan-Tam-788x1147.jpg', '', 1, 12),
(5, 'dám làm giàu', 10, 'https://i.pinimg.com/originals/ad/48/1d/ad481d0b1387f8d00620dec1074df342.jpg', '', 1, 10),
(6, 'bàn về cuộc đời', 10, 'https://i.pinimg.com/736x/95/2e/85/952e8510e5a74163cf7de4799407cbc8.jpg', '', 2, 10),
(7, 'Lão tử', 8, 'https://hoavouu.com/images/file/A7-U1mQx0QgBAIJM/w600/lao-tu-dao-duc-kinh.jpg', '', 2, 8),
(8, 'bán đảo', 7, 'https://i.pinimg.com/originals/75/dd/b5/75ddb591f9e5dd088696516f535674f7.jpg', '', 2, 8),
(9, 'chân đi không mỏi', 8, 'https://i.pinimg.com/originals/04/ec/db/04ecdbe080e2dd1a6e9af4813af3ca32.jpg', '', 2, 10),
(10, 'thiền và văn hóa Nhật Bản', 11, 'http://muasachhay.vn/wp-content/uploads/2017/05/thien-va-van-hoa-nhat-ban-mua-sach-hay.jpg', '', 3, 11),
(11, 'các nền văn hóa cổ Việt Nam', 12, 'https://cdn.khosachonline.com/uploads/2020/01/770/cac-nen-van-hoa-co-viet-nam.jpg', '', 3, 8),
(12, 'trăm lẻ một', 10, 'https://salt.tikicdn.com/ts/product/bc/dd/fc/c760a0447910ebd1b7e34a36ff2e84bb.jpg', '', 4, 11),
(13, 'cơ thể 4 giờ', 5, 'https://salt.tikicdn.com/cache/550x550/ts/product/34/1b/41/ce8adab1f2ffd243513b54614d079387.jpg', '', 4, 11),
(14, 'kho báu cuộc đời', 10, 'https://i.pinimg.com/originals/77/03/86/7703860d8b5f93095cbb4793f40a5bf9.jpg', '', 4, 15),
(15, 'IELST 10', 11, 'http://cdn-img-v2.webbnc.net/uploadv2/web/14/14633/product/2020/04/18/04/20/1587226847_cambridge-ielts-academic-10-with-answers.jpg?v=4', '', 5, 10),
(16, 'ngữ pháp cơ bản tiếng hàn', 10, 'https://giaotrinhngoaingu.com/wp-content/uploads/2021/07/QT900N56-ngu-phap-co-ban-tieng-han.jpg', '', 5, 15),
(17, '3500 từ vựng tiếng anh', 10, 'https://khosachngoaingu.com/wp-content/uploads/2018/08/1-718x1024.jpg', '', 5, 12),
(18, 'lịch sử chính trị', 10, 'https://bizweb.dktcdn.net/100/180/408/products/lich-su-chinh-tri-c2efcaf4-e396-40cf-93bb-3bc9524d38aa.jpg?v=1612019914793', '', 6, 11),
(19, ' những trận hải chiến', 7, 'https://tse4.mm.bing.net/th?id=OIP.zAsI1MgBrCZcxa8MUStYSgAAAA&pid=Api&P=0&w=112&h=179', '', 6, 8),
(20, 'bác hồ với châu phi', 11, 'https://cdn.khosachonline.com/uploads/2020/03/239/bac-ho-voi-chau-phi.jpg', '', 6, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `level`) VALUES
(8, 'lalsalkd', 'ducphamminh740@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh`
--
ALTER TABLE `binh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iddh` (`iddh`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`iddh`);

--
-- Chỉ mục cho bảng `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh`
--
ALTER TABLE `binh`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `iddh` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sp`
--
ALTER TABLE `sp`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
