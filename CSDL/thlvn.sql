-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 10:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thlvn`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangkylophoc`
--

CREATE TABLE `dangkylophoc` (
  `MaLop` int(255) NOT NULL,
  `MaHS` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dangkylophoc`
--

INSERT INTO `dangkylophoc` (`MaLop`, `MaHS`) VALUES
(1, 2),
(1, 1155),
(3, 1155),
(4, 1155),
(7, 1155),
(8, 1155),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 1155),
(20, 1155);

-- --------------------------------------------------------

--
-- Table structure for table `diemdanh`
--

CREATE TABLE `diemdanh` (
  `MaHS` int(255) NOT NULL,
  `MaLop` int(255) NOT NULL,
  `Buoi1` text DEFAULT NULL,
  `Buoi2` text DEFAULT NULL,
  `Buoi3` text DEFAULT NULL,
  `Buoi4` text DEFAULT NULL,
  `Buoi5` text DEFAULT NULL,
  `Buoi6` text DEFAULT NULL,
  `Buoi7` text DEFAULT NULL,
  `Buoi8` text DEFAULT NULL,
  `Buoi9` text DEFAULT NULL,
  `Buoi10` text DEFAULT NULL,
  `Buoi11` text DEFAULT NULL,
  `Buoi12` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diemdanh`
--

INSERT INTO `diemdanh` (`MaHS`, `MaLop`, `Buoi1`, `Buoi2`, `Buoi3`, `Buoi4`, `Buoi5`, `Buoi6`, `Buoi7`, `Buoi8`, `Buoi9`, `Buoi10`, `Buoi11`, `Buoi12`) VALUES
(2, 1, '0', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 15, '1', '0', '1', '0', '1', '1', '0', '1', '1', '0', '1', '1'),
(3, 15, '1', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 15, '0', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 15, '0', '0', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1155, 1, '0', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1155, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1155, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1155, 7, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1155, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1155, 15, '1', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1155, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `CMND` varchar(255) NOT NULL,
  `HoTen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Password` varchar(255) NOT NULL,
  `GioiTinh` text NOT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `NgayVaoTT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`CMND`, `HoTen`, `Password`, `GioiTinh`, `DiaChi`, `SDT`, `NgayVaoTT`) VALUES
('415105001', 'Phạm Văn Hù', '0000', '0', '55555', '55555544444', '06/09/2021'),
('415105002', 'Nguyễn Thị Bích Hằng', '00002', '0', '84 Điện Biên Phủ', '0331234125', '2019-05-13'),
('415105003', 'Phạm Đình Vũ', '00003', '1', '15 Thành Thái ', '0331241123', '2021-05-10'),
('415105004', 'Hà My', '00004', '0', '01 Hoàng Văn Thụ', '0332362141', '2019-05-15'),
('415105005', 'Võ Thị Mỹ', '00005', '0', '8 Võ Liệu', '0334521621', '2019-05-15'),
('dfvdf', 'huy', '1111', '1', 'tregre', 'gdfd', '06/25/2021'),
('htrhtrh', 'Phạm Thị Ngọc Ngân', '2222', '0', 'tregre', 'gdfd', '06/18/2021'),
('qqqq', 'dsv', '2222', '0', 'tregre', 'gdfd', '06/25/2021');

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `MaHS` int(255) NOT NULL,
  `HoTen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Password` varchar(255) NOT NULL,
  `GioiTinh` text NOT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `NgayVaoHoc` varchar(255) NOT NULL,
  `PhuHuynh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDTPH` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`MaHS`, `HoTen`, `Password`, `GioiTinh`, `DiaChi`, `SDT`, `NgayVaoHoc`, `PhuHuynh`, `SDTPH`) VALUES
(2, 'Nguyễn Linh', '0012', '1', '15 Xuân Thủy ', '0124585235', '2021-05-02', 'Nguyễn Hùng', '0120452135'),
(3, 'Phạm Thái Bình ', '0013', '1', '15 Võ Liệu', '0162248845', '2021-05-01', 'La Thị Thúy', '0126645123'),
(4, 'Huỳnh Thị Mỹ Duyên', '0014', '0', '15 Võ Mười', '0154456785', '2021-05-01', 'Lê Thái', '0124846845'),
(5, 'Lê Vũ ', '0015', '1', '02 Võ Văn Liệu', '0156645254', '2021-05-03', 'Mã Văn Thái', '0163224578'),
(1155, 'Phạm Thái Hòa', '00000', '0', '12 Hoàng Văn ', '0124578151', '2021-05-01', 'Phạm Nhân', '0124785213'),
(1167, 'ngan', '111', '1', 'gfgsfgs', 'dgsdgsd', '06/26/2021', 'fdfs', 'gsdgsd'),
(1168, 'huy', '', '0', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `MaLop` int(255) NOT NULL,
  `TenLop` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CMND` varchar(255) NOT NULL,
  `MaPhong` int(255) NOT NULL,
  `MaMH` int(255) NOT NULL,
  `MaTN` int(255) NOT NULL,
  `MaTG` int(255) NOT NULL,
  `Trinhdo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`MaLop`, `TenLop`, `CMND`, `MaPhong`, `MaMH`, `MaTN`, `MaTG`, `Trinhdo`) VALUES
(1, 'Toán (Hùng)', '415105001', 1, 1, 1, 1, 'Lớp 10'),
(3, 'Anh(Vũ)', '415105003', 3, 3, 2, 2, 'Lớp 12'),
(4, 'Lý(My)', '415105004', 4, 4, 3, 3, 'Lớp 10'),
(7, 'Hóa(Mỹ)', '415105005', 5, 5, 4, 4, 'Lớp 11'),
(8, 'Toán(Hùng)', '415105001', 6, 1, 5, 5, 'Lớp 12'),
(15, 'Văn(Hằng)', '415105002', 7, 2, 6, 6, 'Lớp 11'),
(20, 'anh', '415105003', 7, 1, 3, 1, '11');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMH` int(255) NOT NULL,
  `TenMH` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`MaMH`, `TenMH`) VALUES
(1, 'Toán '),
(2, 'Văn'),
(3, 'Anh'),
(4, 'Lý'),
(5, 'Hóa');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MaPhong` int(255) NOT NULL,
  `TenPhong` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MaPhong`, `TenPhong`) VALUES
(1, 'T1-001'),
(2, 'T1-002'),
(3, 'T1-003'),
(4, 'T1-004'),
(5, 'T2-001'),
(6, 'T2-002'),
(7, 'T2-003');

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE `quantri` (
  `MaQT` int(255) NOT NULL,
  `HoTen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`MaQT`, `HoTen`, `Password`) VALUES
(1, 'NGOCNGAN', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `thoigian`
--

CREATE TABLE `thoigian` (
  `MaTG` int(255) NOT NULL,
  `Thoigian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thoigian`
--

INSERT INTO `thoigian` (`MaTG`, `Thoigian`) VALUES
(1, '7h-9h'),
(2, '9h-11h'),
(3, '13h-15h'),
(4, '15h-17h'),
(5, '17h-19h'),
(6, '19h-21h');

-- --------------------------------------------------------

--
-- Table structure for table `thungay`
--

CREATE TABLE `thungay` (
  `MaTN` int(255) NOT NULL,
  `ThuNgay` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thungay`
--

INSERT INTO `thungay` (`MaTN`, `ThuNgay`) VALUES
(1, 'Thứ 2'),
(2, 'Thứ 3'),
(3, 'Thứ 4'),
(4, 'Thứ 5'),
(5, 'Thứ 6'),
(6, 'Thứ 7'),
(7, 'Chủ nhật');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dangkylophoc`
--
ALTER TABLE `dangkylophoc`
  ADD PRIMARY KEY (`MaLop`,`MaHS`) USING BTREE,
  ADD KEY `hocsinh` (`MaHS`);

--
-- Indexes for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`MaHS`,`MaLop`),
  ADD KEY `lienket5` (`MaHS`),
  ADD KEY `lienket27` (`MaLop`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`CMND`);

--
-- Indexes for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`MaHS`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `lienket1` (`CMND`),
  ADD KEY `lienket3` (`MaPhong`),
  ADD KEY `lienket4` (`MaMH`),
  ADD KEY `thungay` (`MaTN`),
  ADD KEY `thoigian` (`MaTG`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMH`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Indexes for table `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`MaQT`);

--
-- Indexes for table `thoigian`
--
ALTER TABLE `thoigian`
  ADD PRIMARY KEY (`MaTG`);

--
-- Indexes for table `thungay`
--
ALTER TABLE `thungay`
  ADD PRIMARY KEY (`MaTN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `MaHS` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1169;

--
-- AUTO_INCREMENT for table `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `MaLop` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `MaMH` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `MaPhong` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quantri`
--
ALTER TABLE `quantri`
  MODIFY `MaQT` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dangkylophoc`
--
ALTER TABLE `dangkylophoc`
  ADD CONSTRAINT `lienket2` FOREIGN KEY (`MaLop`) REFERENCES `lophoc` (`MaLop`) ON UPDATE CASCADE;

--
-- Constraints for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD CONSTRAINT `lienket26` FOREIGN KEY (`MaLop`) REFERENCES `lophoc` (`MaLop`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lienket27` FOREIGN KEY (`MaLop`) REFERENCES `lophoc` (`MaLop`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lienket5` FOREIGN KEY (`MaHS`) REFERENCES `hocsinh` (`MaHS`) ON UPDATE CASCADE;

--
-- Constraints for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lienket1` FOREIGN KEY (`CMND`) REFERENCES `giaovien` (`CMND`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lienket3` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lienket4` FOREIGN KEY (`MaMH`) REFERENCES `monhoc` (`MaMH`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
