-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 11:03 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `sno` int(20) NOT NULL,
  `mid` int(20) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `id` varchar(20) DEFAULT NULL,
  `upload_name` varchar(30) DEFAULT NULL,
  `sub_category` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'NOT VERIFIED'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`sno`, `mid`, `category`, `id`, `upload_name`, `sub_category`, `status`) VALUES
(1, 33, 'student', '876', 'DV_1_33.jpg', NULL, 'NOT VERIFIED'),
(2, 33, 'alumini', '12', 'DV_2_33.jpg', NULL, 'NOT VERIFIED'),
(3, 33, 'Foreign Author', NULL, 'DV_3_33.jpg', NULL, 'NOT VERIFIED'),
(4, 33, 'Professional Body', 'mg5535', 'DV_4_33.jpg', 'name1', 'NOT VERIFIED'),
(5, 33, 'Professional Body', 'tff', 'DV_5_33.jpg', 'name2', 'NOT VERIFIED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
