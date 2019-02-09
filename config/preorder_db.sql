-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 08:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preorder_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bread_tbl`
--

CREATE TABLE `bread_tbl` (
  `p_bid` int(255) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bread_tbl`
--

INSERT INTO `bread_tbl` (`p_bid`, `p_name`, `details`) VALUES
(1, 'Whole Wheat', NULL),
(2, 'Italian Herb', NULL),
(3, 'Jalapeno Parmesan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cheese_tbl`
--

CREATE TABLE `cheese_tbl` (
  `p_cid` int(255) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `details` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheese_tbl`
--

INSERT INTO `cheese_tbl` (`p_cid`, `p_name`, `details`) VALUES
(1, 'American', NULL),
(2, 'Swiss', NULL),
(3, 'Pepperjack', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE `orders_tbl` (
  `o_id` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `odate` varchar(20) NOT NULL,
  `otime` varchar(20) NOT NULL,
  `bread` varchar(20) NOT NULL,
  `souce` varchar(20) NOT NULL,
  `swtype` varchar(20) NOT NULL,
  `cheese` varchar(20) NOT NULL,
  `veggies` varchar(20) NOT NULL,
  `orderStat` varchar(20) NOT NULL DEFAULT 'unverified',
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_tbl`
--

INSERT INTO `orders_tbl` (`o_id`, `fullName`, `email`, `odate`, `otime`, `bread`, `souce`, `swtype`, `cheese`, `veggies`, `orderStat`, `token`) VALUES
(17, 'alvin katapusan', 'alvinkatapusan@gmail.com', '2019-02-08', '10:04:26pm', 'Whole Wheat', 'Honey mustard', 'Swiss', 'Oven Roasted Turkey', 'Peppers - Banana', 'unverified', 'ab0384d0fad4a82b93721a950500e49b'),
(18, 'alvin katapusan', 'alvinkatapusan@gmail.com', '2019-02-08', '11:23:56pm', 'Whole Wheat', 'Mayo', 'American', 'Turkey Bacon Club', 'Tomato', 'unverified', '802dbd4a20349b7f473bfc9cadc94fcb'),
(19, 'alvin katapusan', 'alvinkatapusan@gmail.com', '2019-02-08', '11:24:23pm', 'Jalapeno Parmesan', 'Spicy Mayo', 'American', 'Turkey Bacon Club', 'Onion', 'unverified', 'dc134f5567183375907e228ec2bef6ac'),
(20, 'alvin katapusan', 'alvinkatapusan@gmail.com', '2019-02-08', '12:14:57am', 'Whole Wheat', 'Mayo', 'American', 'Turkey Bacon Club', 'Peppers - Banana', 'unverified', '49cdfce6df431f79ee92574623702992'),
(21, 'alvin katapusan', 'alvinkatapusan@gmail.com', '2019-02-08', '03:28:36am', 'Whole Wheat', 'Spicy Mayo', 'American', 'Turkey Bacon Club', 'Peppers - Green and ', 'unverified', '2bfac0dfbe3a61a75e1f17b853f5c7ca'),
(22, 'alvin katapusan', 'alvinkatapusan@gmail.com', '2019-02-08', '03:28:39am', 'Whole Wheat', 'Spicy Mayo', 'American', 'Turkey Bacon Club', 'Peppers - Green and ', 'unverified', 'cfee23bb01bea65e3d704572c7949dcd'),
(23, 'alvin katapusan', 'alvinkatapusan@gmail.com', '2019-02-08', '03:28:42am', 'Whole Wheat', 'Spicy Mayo', 'American', 'Turkey Bacon Club', 'Peppers - Green and ', 'unverified', '1682a050d01c7ab8e48749792380b89f'),
(24, 'alvin katapusan', 'alvinkatapusan@gmail.com', '2019-02-08', '03:30:34am', 'Jalapeno Parmesan', 'Spicy Mayo', 'Swiss', 'Oven Roasted Turkey', 'Pickles', 'unverified', '7f33bf67f931b96e6f103936a58de0c7'),
(25, 'alvin katapuusan', 'alvinkatapusan@gmail.com', '2019-02-08', '03:33:42am', 'Whole Wheat', 'Mayo', 'American', 'Turkey Bacon Club', 'Spinach', 'unverified', '4a1a740075e739a38bfaa7a7b107ccdd');

-- --------------------------------------------------------

--
-- Table structure for table `souce_tbl`
--

CREATE TABLE `souce_tbl` (
  `p_sid` int(255) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `details` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `souce_tbl`
--

INSERT INTO `souce_tbl` (`p_sid`, `p_name`, `details`) VALUES
(1, 'Mayo', NULL),
(2, 'Mustard', NULL),
(3, 'Honey mustard', NULL),
(4, 'Spicy Mayo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `swtype_tbl`
--

CREATE TABLE `swtype_tbl` (
  `p_stid` int(255) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `swtype_tbl`
--

INSERT INTO `swtype_tbl` (`p_stid`, `p_name`, `details`) VALUES
(1, 'Turkey Bacon Club', NULL),
(2, 'Oven Roasted Turkey', NULL),
(3, 'Savory Ham', NULL),
(4, 'Italian', 'Salami,Ham & Pepperoni');

-- --------------------------------------------------------

--
-- Table structure for table `veggies_tbl`
--

CREATE TABLE `veggies_tbl` (
  `p_vid` int(255) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veggies_tbl`
--

INSERT INTO `veggies_tbl` (`p_vid`, `p_name`, `details`) VALUES
(1, 'Cucumber', NULL),
(2, 'Lettuce', NULL),
(3, 'Peppers - Banana', NULL),
(4, 'Peppers - Jalapeno', NULL),
(5, 'Peppers - Green and Red', NULL),
(6, 'Pickles', NULL),
(7, 'Spinach', NULL),
(8, 'Tomato', NULL),
(9, 'Olives', NULL),
(10, 'Onion', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bread_tbl`
--
ALTER TABLE `bread_tbl`
  ADD PRIMARY KEY (`p_bid`);

--
-- Indexes for table `cheese_tbl`
--
ALTER TABLE `cheese_tbl`
  ADD PRIMARY KEY (`p_cid`);

--
-- Indexes for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `souce_tbl`
--
ALTER TABLE `souce_tbl`
  ADD PRIMARY KEY (`p_sid`);

--
-- Indexes for table `swtype_tbl`
--
ALTER TABLE `swtype_tbl`
  ADD PRIMARY KEY (`p_stid`);

--
-- Indexes for table `veggies_tbl`
--
ALTER TABLE `veggies_tbl`
  ADD PRIMARY KEY (`p_vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bread_tbl`
--
ALTER TABLE `bread_tbl`
  MODIFY `p_bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cheese_tbl`
--
ALTER TABLE `cheese_tbl`
  MODIFY `p_cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `souce_tbl`
--
ALTER TABLE `souce_tbl`
  MODIFY `p_sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `swtype_tbl`
--
ALTER TABLE `swtype_tbl`
  MODIFY `p_stid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `veggies_tbl`
--
ALTER TABLE `veggies_tbl`
  MODIFY `p_vid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
