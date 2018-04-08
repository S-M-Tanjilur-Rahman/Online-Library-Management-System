-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2016 at 10:01 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`user_name`, `password`, `contact`, `email`) VALUES
('verbal', 'amiadmin', '123456789', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE `book_info` (
  `serial_no` bigint(20) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `availability` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `edition` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`serial_no`, `book_name`, `author`, `availability`, `category`, `edition`) VALUES
(1, 'a', 'a', 1, 'Engineering', 'a'),
(2, 'a', 'a', 1, 'Engineering', 'a'),
(3, 'b', 'b', 1, 'Engineering', 'b'),
(4, 'b', 'b', 1, 'Engineering', 'b'),
(5, 'b', 'b', 1, 'Engineering', 'b'),
(6, 'c', 'c', 1, 'Engineering', 'c'),
(7, 'c', 'c', 1, 'Engineering', 'c'),
(8, 'c', 'c', 1, 'Engineering', 'c'),
(9, 'e', 'e', 1, 'Medical', 'e'),
(10, 'e', 'e', 1, 'Medical', 'e'),
(11, 'f', 'f', 1, 'Literature', 'f'),
(12, 'f', 'f', 1, 'Literature', 'f'),
(13, 'f', 'f', 1, 'Literature', 'f'),
(14, 'g', 'g', 1, 'Literature', 'g'),
(15, 'g', 'g', 1, 'Literature', 'g'),
(16, 'g', 'g', 1, 'Literature', 'g'),
(17, 'h', 'h', 1, 'Philosophy', 'h'),
(18, 'h', 'h', 1, 'Philosophy', 'h'),
(19, 'h', 'h', 1, 'Philosophy', 'h'),
(20, 'h', 'h', 1, 'Philosophy', 'h'),
(21, 'h', 'h', 1, 'Philosophy', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_info`
--

CREATE TABLE `reservation_info` (
  `student_id` varchar(50) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `bserial_no` bigint(20) NOT NULL,
  `issuedate` date NOT NULL,
  `returndate` date NOT NULL,
  `deliverydate` date DEFAULT NULL,
  `fine` int(11) NOT NULL,
  `submit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_info`
--

INSERT INTO `reservation_info` (`student_id`, `book_name`, `bserial_no`, `issuedate`, `returndate`, `deliverydate`, `fine`, `submit`) VALUES
('a', 'a', 1, '2016-07-18', '2016-07-06', '2016-07-18', 24, 1),
('a', 'b', 3, '2016-07-18', '2016-07-08', '2016-07-18', 20, 1),
('a', 'c', 6, '2016-07-18', '2016-08-01', '2016-07-18', 0, 1),
('a', 'e', 9, '2016-07-18', '2016-07-04', '2016-07-18', 28, 1),
('a', 'f', 11, '2016-07-18', '2016-07-03', '2016-07-18', 30, 1),
('b', 'f', 12, '2016-07-18', '2016-07-07', '2016-07-18', 22, 1),
('f', 'f', 13, '2016-07-18', '2016-08-01', '2016-07-18', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `serail_no` bigint(20) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`serail_no`, `staff_name`, `staff_id`, `address`, `contact`, `email`, `user_name`, `password`) VALUES
(2, 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(3, 'x', 'x', 'x', 'x', 'x', 'x', 'x'),
(4, 'xxx', 'xxx', 'xxx', 'xxx', 'xxx', 'xxx', 'xxx'),
(5, 'f', 'f', 'f', 'fjk', 'f', 'f', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `stock_table`
--

CREATE TABLE `stock_table` (
  `serial_no` bigint(20) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `edition` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_table`
--

INSERT INTO `stock_table` (`serial_no`, `book_name`, `author`, `category`, `edition`, `stock`) VALUES
(1, 'a', 'a', 'Engineering', 'a', 2),
(2, 'b', 'b', 'Engineering', 'b', 3),
(3, 'c', 'c', 'Engineering', 'c', 3),
(5, 'e', 'e', 'Medical', 'e', 2),
(6, 'f', 'f', 'Literature', 'f', 3),
(7, 'g', 'g', 'Literature', 'g', 3),
(8, 'h', 'h', 'Philosophy', 'h', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `serial_no` bigint(20) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `department` varchar(15) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `section` varchar(5) NOT NULL,
  `email` varchar(35) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `quota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`serial_no`, `student_name`, `student_id`, `department`, `semester`, `section`, `email`, `user_name`, `password`, `contact`, `address`, `quota`) VALUES
(3, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 2),
(4, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 2),
(6, 'aa', 'aa', 'aa', 'aa', 'aa', 'aaa', 'aa', 'vc', 'cx', 'xx', 2),
(9, 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 2),
(10, 'ty', 'ty', 'ty', 'ty', 'ty', '1', 'vo', 'vo', 'vo', 'vo', 2),
(11, 'hi', 'hi', 'cse', '3-1', 'B', 'sd', 'ds', 'asd', 'hihi', 'hihi', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `book_info`
--
ALTER TABLE `book_info`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`serail_no`),
  ADD UNIQUE KEY `email` (`email`,`user_name`);

--
-- Indexes for table `stock_table`
--
ALTER TABLE `stock_table`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`serial_no`),
  ADD UNIQUE KEY `email` (`email`,`user_name`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_info`
--
ALTER TABLE `book_info`
  MODIFY `serial_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `serail_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stock_table`
--
ALTER TABLE `stock_table`
  MODIFY `serial_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `serial_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
