-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 11:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asperia_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dname`, `description`, `image`, `ord`) VALUES
(2, 'test', 'test', './images/doctorhisto.png', 1),
(3, 'test 1', 'test 1', './images/doctorlab.png', 2),
(4, 'test 2', 'test 2', './images/doctormol.png', 3),
(5, 'test 3', 'test 3', './images/doctoroncoloy.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(2) NOT NULL,
  `head` varchar(20) NOT NULL,
  `menutext` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL,
  `menuorder` int(2) NOT NULL,
  `status` int(11) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `head`, `menutext`, `link`, `menuorder`, `status`, `access`) VALUES
(1, 'Services', 'Department', 'department', 21, 1, 1),
(2, 'Services', 'Service', 'service', 22, 1, 1),
(3, 'Services', 'Test', 'dtest', 23, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(15) NOT NULL,
  `category` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `ord` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `category`, `des`, `details`, `image`, `icon`, `ord`, `status`) VALUES
(5, 'General Health Checkup', 'General health checkup package for all under 60 years old', '<p>Feeling more thirsty than usual</p>\r\n<p>Urinating often or urine volume is more than usual</p>\r\n<p>Hungry often and eat more than usual</p>\r\n<p>Losing weight without any reason</p>\r\n<p>Having slow-healing wound</p>\r\n<p>Feeling numbness, burning sensation, or tingling at in your extremities</p>', 'images/package/82528.jpg', '', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `package_detail`
--

CREATE TABLE `package_detail` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `feature` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(11) NOT NULL,
  `dept` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `image` int(11) NOT NULL,
  `image_alt` varchar(500) NOT NULL,
  `keywords` int(200) NOT NULL,
  `ord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `dept`, `sname`, `des`, `image`, `image_alt`, `keywords`, `ord`) VALUES
(1, 2, 'test-service-1', 'test-service-1', 1, './images/doctorhisto-md.png', 0, 1),
(2, 2, 'test-service-2', 'test-service-2', 1, './images/doctorlab-sm.png', 0, 2),
(3, 4, 'test-service-3', 'test-service-3', 1, './images/doctormol-md.png', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `testid` int(11) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `servicehead` int(11) NOT NULL,
  `tdes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`testid`, `tname`, `servicehead`, `tdes`) VALUES
(7, 'test', 1, 1),
(8, 'test 1', 2, 2),
(9, 'test 2', 2, 3),
(10, 'test 3', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(1) NOT NULL,
  `description` varchar(50) NOT NULL,
  `login_limit` int(10) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `level`, `description`, `login_limit`, `expiry_date`, `status`) VALUES
(1, 'Admin', '123', 1, 'null', 1, '0000-00-00', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_detail`
--
ALTER TABLE `package_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package_detail`
--
ALTER TABLE `package_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
