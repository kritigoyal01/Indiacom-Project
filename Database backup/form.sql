-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2016 at 09:27 PM
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
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `mid` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `uploadV` int(3) NOT NULL DEFAULT '0',
  `uploadName` varchar(50) DEFAULT NULL,
  `pagecount` int(2) DEFAULT NULL,
  `extension` varchar(7) DEFAULT NULL,
  `docno` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`mid`, `email`, `name`, `password`, `uploadV`, `uploadName`, `pagecount`, `extension`, `docno`) VALUES
(13, 'abc@gmail.com', 'ABC DEF', '81dc9bdb52d04dc20036dbd8313ed055', 13, 'V13_13.pdf', 4, '.pdf', 1),
(27, 'def@gmail.com', 'def', '025e4da7edac35ede583f5e8d51aa7ec', 37, 'V37_27.doc', 3, '.doc', 1),
(28, 'lmn@gmail.com', 'lmn', 'c4ab4fc51c71a8c26ee4e1fa0d3ac15a', 2, 'V2_28.docx', 3, '.docx', 1),
(30, 'kg@gmail.com', 'kriti goyal', 'f19e1368ef58fde93d78ba396f9046e3', 3, 'V3_30.pdf', 92, '.pdf', 1),
(31, 'ishman@gmail.com', 'ishman preet', '1458c8f1f481e4241411358e7317c03a', 3, 'V3_31.doc', 3, '.doc', 1),
(32, 'pawan.deep55@gmail.com', 'pawan deep singh', '40eb95572d967a62183292ef5f78bf9a', 1, 'V1_32.pdf', 92, '.pdf', 1),
(33, 'mg@gmail.com', 'megha', '13e96516ed6773efbe6c51dadb8e2856', 5, 'V5_33.doc', 10, '.doc', 1),
(34, 'lol@lol.com', 'lol', 'e7af287f7c896a07485ff47fed078512', 1, 'V1_34.doc', 3, '.doc', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `mid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
