-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 พ.ค. 2021 เมื่อ 07:31 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.17-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diversition`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `lottery`
--

CREATE TABLE `lottery` (
  `lottery_id` int(11) NOT NULL,
  `lottery_number` int(3) NOT NULL,
  `type_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `lottery_type`
--

CREATE TABLE `lottery_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `lottery_type`
--

INSERT INTO `lottery_type` (`type_id`, `type_name`) VALUES
(1, 'รางวัลที่ 1'),
(2, 'รางวัลที่ 2'),
(3, 'รางวัลเลขข้างเคียงรางวัลที่ 1'),
(4, 'รางวัลเลขท้าย 2 ตัว');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lottery`
--
ALTER TABLE `lottery`
  ADD PRIMARY KEY (`lottery_id`);

--
-- Indexes for table `lottery_type`
--
ALTER TABLE `lottery_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lottery`
--
ALTER TABLE `lottery`
  MODIFY `lottery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lottery_type`
--
ALTER TABLE `lottery_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
