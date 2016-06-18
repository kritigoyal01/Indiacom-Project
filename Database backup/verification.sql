-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2016 at 09:28 PM
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
  `extension` varchar(20) NOT NULL,
  `sub_category` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`sno`, `mid`, `category`, `id`, `upload_name`, `extension`, `sub_category`, `status`) VALUES
(1, 27, 'student', '65', 'DV_8_27.jpg', 'image/jpeg', NULL, 'Not Approved'),
(2, 27, 'Professional Body', '556', 'DV_9_27.jpg', 'image/jpeg', 'IEEE', 'Verified'),
(3, 33, 'Foreign Author', NULL, 'DV_8_33.jpg', 'image/jpeg', NULL, 'Not Approved'),
(4, 13, 'alumini', '78', 'DV_1_13.jpg', 'image/jpeg', NULL, 'Pending'),
(5, 34, 'alumini', '242434', 'DV_1_34.jpg', 'image/jpeg', NULL, 'Pending'),
(6, 34, 'Professional Body', '4899kkmkm', 'DV_2_34.pdf', 'application/pdf', 'ISTE', 'Verified');

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
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
