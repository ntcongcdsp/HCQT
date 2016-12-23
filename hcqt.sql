-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2016 at 05:35 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcqt`
--

-- --------------------------------------------------------

--
-- Table structure for table `anhhoatdong`
--

CREATE TABLE `anhhoatdong` (
  `ID` int(11) NOT NULL,
  `TenFile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChuThich` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anhhoatdong`
--

INSERT INTO `anhhoatdong` (`ID`, `TenFile`, `ChuThich`) VALUES
(3, '201116.jpg', ''),
(4, '130516.jpg', ''),
(5, '40nam.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `cbgv`
--

CREATE TABLE `cbgv` (
  `ID` int(11) NOT NULL,
  `Ho` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ten` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TrinhDo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaTo` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cbgv`
--

INSERT INTO `cbgv` (`ID`, `Ho`, `Ten`, `TrinhDo`, `ChucVu`, `MaTo`) VALUES
(1, 'Võ Quang', 'Vinh', 'Cử nhân', 'Nhân Viên', 'QTTB'),
(2, 'Trần Thị Vân', 'Anh', 'Cử nhân', 'Nhân viên', 'KHTC');

-- --------------------------------------------------------

--
-- Table structure for table `gvdkphong`
--

CREATE TABLE `gvdkphong` (
  `ID` int(11) NOT NULL,
  `HoGV` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TenGV` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ngay` date NOT NULL,
  `TietBD` int(11) NOT NULL,
  `SoTiet` int(11) NOT NULL,
  `Phong` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `ID` int(11) NOT NULL,
  `HoTen` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SoDT` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Hoi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NgayHoi` date NOT NULL,
  `Dap` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`ID`, `HoTen`, `SoDT`, `Hoi`, `NgayHoi`, `Dap`) VALUES
(1, '142134', '1234123412341234', '11111111111111111111111111111111111111111111111', '2016-12-21', 'liên hệ đã được trả lời'),
(2, 'ádasdas', '2342343', 'ádasdasd', '2016-12-21', ''),
(3, 'âcsc', '45345', 'asssssssssssssssssssssssssss', '2016-12-21', ' bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb  bbbbbb ');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `ID` int(11) NOT NULL,
  `TieuDe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiDung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayDang` date NOT NULL,
  `DoUuTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`ID`, `TieuDe`, `TomTat`, `NoiDung`, `NgayDang`, `DoUuTien`) VALUES
(1, 'Giới thiệu Phòng Hành Chính Quản trị', '', 'Chức năng nhiệm vụ:\r\nTham mưu cho Hiệu trưởng và tổ chức, triển khai thực hiện các hoạt động:\r\n1.   Xây dựng kế hoạch phát triển ngắn hạn, dài hạn về cơ sở vật chất để đáp ứng với nhu cầu phát triển của nhà trường. Tham mưu việc mua sắm trang thiết bị phục vụ dạy học và sinh hoạt chính trị tư tưởng, văn hóa, văn nghệ, thể dục thể thao.\r\n2.   Lập dự toán ngân sách, kế hoạch chi tiêu, cấp phát và thanh toán theo đúng thủ tục tài chính. Lập sổ sách, chứng từ, báo cáo quyết toán đúng kỳ hạn. Quản lý, kiểm soát thu chi các nguồn vốn của nhà trường. Kiểm tra các đơn vị thu chi, thanh quyết toán, tổng hợp, kiểm kê, thanh lý tài sản. \r\n3.   Đảm bảo việc cấp phát lương, học bổng và các loại chế độ cho viên chức và sinh viên theo đúng các chế độ chính sách của Nhà nước và quy chế chi tiêu nội bộ của nhà trường.\r\n4.   Quản lý toàn bộ tài sản, cơ sở vật chất của nhà trường. Quản lý và sắp xếp phòng học theo thời khoá biểu và kế hoạch dạy học của trường. Chuẩn bị các điều kiện về cơ sở vật chất cho các hoạt động chung của các khoa và nhà trường.\r\n5.   Quản lý môi trường và vệ sinh toàn bộ khu học tập và làm việc, đảm bảo cho nhà trường xanh - sạch - đẹp. Phụ trách công tác xây dựng cơ bản và sửa chữa, tu bổ cơ sở vật chất. Quản trị thiết bị, quản lý điện nước khu học tập, làm việc và Ký túc xá sinh viên. Quản lý đội bảo vệ, tổ chức công tác bảo vệ an toàn, trật tự, phòng chống cháy nổ khu học tập và làm việc.\r\n6.   Quản lý các công văn giấy tờ gửi đến và đi các nơi trong và ngoài nhà trường. Cấp các loại giấy tờ theo phân cấp của Hiệu trưởng, quản lý con dấu nhà trường. \r\n7.   Quản lý cơ sở vật chất Ký túc xá sinh viên. Đảm bảo an ninh trật tự, việc tự học và sinh hoạt của sinh viên nội trú. Tổ chức các hoạt động vui chơi, giải trí lành mạnh cho sinh viên trong Ký túc xá.\r\n8.   Quản lý thuốc và hồ sơ y tế toàn trường. Phụ trách công tác vệ sinh phòng dịch, khám bệnh và sơ cứu; giới thiệu viên chức và sinh viên đi bệnh viện tuyến trên. Thực hiện công tác bảo hiểm y tế cho sinh viên toàn trường.\r\n9.   Phối hợp với lãnh đạo và công an địa phương nơi ký túc xá đóng để đảm bảo các điều kiện an ninh và trật tự xã hội. Tổ chức các Đội tự quản giúp việc đảm bảo an ninh, trật tự trong Ký túc xá. \r\n10.  Quản lý và khai thác các hoạt động dịch vụ của trường.\r\n11.  Thực hiện các nhiệm vụ được giao khác theo kế hoạch công tác của trường.\r\n   Công khai các thủ tục hành chính:\r\n1.   Thủ tục sửa chữa thiết bị.\r\n2.   Thủ tục mua sắm thiết bị.\r\n3.   Quy định sử dụng - bảo quản tài sản.\r\n4.   Quy định đăng ký : các Giảng đường, Phòng học.\r\n5.   Quy chế chi tiêu nội bộ.\r\n    Các thành tích đã đạt được:\r\n-        Chi bộ: Chi bộ trong sạch vững mạnh được Đảng uỷ dân chính Đảng tặng bằng khen\r\n-       Phòng: Nhiều năm liền được được danh hiệu tập thể lao động toàn trường và tập thể lao động xuất sắc được trường và ngành tặng giấy khen, bằng khen.\r\nCông đoàn phòng: Nhiều năm liền đạt công đoàn vững mạnh được liên đoàn lao động Tỉnh tặng bằng khen.', '2016-12-20', 99);

-- --------------------------------------------------------

--
-- Table structure for table `toql`
--

CREATE TABLE `toql` (
  `MaTo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenTo` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toql`
--

INSERT INTO `toql` (`MaTo`, `TenTo`) VALUES
('KHTC', 'Tổ Kế hoạch Tài chính'),
('QTTB', 'Tổ Quản trị thiết bị');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anhhoatdong`
--
ALTER TABLE `anhhoatdong`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cbgv`
--
ALTER TABLE `cbgv`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `MaTo` (`MaTo`),
  ADD KEY `MaTo_2` (`MaTo`);

--
-- Indexes for table `gvdkphong`
--
ALTER TABLE `gvdkphong`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `toql`
--
ALTER TABLE `toql`
  ADD PRIMARY KEY (`MaTo`),
  ADD UNIQUE KEY `MaTo` (`MaTo`),
  ADD KEY `MaTo_2` (`MaTo`),
  ADD KEY `MaTo_3` (`MaTo`),
  ADD KEY `MaTo_4` (`MaTo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anhhoatdong`
--
ALTER TABLE `anhhoatdong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cbgv`
--
ALTER TABLE `cbgv`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gvdkphong`
--
ALTER TABLE `gvdkphong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
