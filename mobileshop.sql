-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2016 at 04:20 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `sessionid` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `deviceid` int(3) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `inserted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`sessionid`, `username`, `deviceid`, `quantity`, `inserted`, `modified`) VALUES
('idf780sjjerihnq5crvlis3317', 'test', 4, 2, '2016-08-24 14:15:24', '2016-08-24 14:15:24'),
('idf780sjjerihnq5crvlis3317', 'test', 2, 1, '2016-08-24 14:15:15', '2016-08-24 14:15:15'),
('7gfh03qhpfl45r8kpsfgihsco1', '', 4, 1, '2016-08-24 14:19:41', '2016-08-24 14:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `mobile_id` int(11) NOT NULL,
  `mobile_name` varchar(20) NOT NULL,
  `os` varchar(10) NOT NULL,
  `manufacturer` char(10) NOT NULL,
  `processor` varchar(40) NOT NULL,
  `memory` decimal(5,2) DEFAULT NULL,
  `camera` decimal(5,2) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `product_pic` varchar(50) DEFAULT NULL,
  `status` char(10) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`mobile_id`, `mobile_name`, `os`, `manufacturer`, `processor`, `memory`, `camera`, `price`, `product_pic`, `status`, `created`, `modified`) VALUES
(1, 'Nexus 5', 'Android', 'LG', 'Snapdragon 800', '2.00', '8.00', '34000.00', 'mobile/Nexus 5.png', 'live', '2014-07-14 19:28:48', '2014-07-14 19:41:56'),
(2, 'iPhone 5', 'iOS', 'Apple', 'Cortex A9', '1.00', '8.00', '45000.00', 'mobile/iPhone 5.png', 'live', '2014-07-14 19:39:05', '2014-07-14 23:45:50'),
(3, 'Moto X', 'Android', 'Motorola', 'Snapdragon 400', '2.00', '5.00', '25000.00', 'mobile/Moto X.png', 'live', '2014-07-14 19:39:42', '2014-07-14 19:42:10'),
(4, 'Note 7', 'Android', 'Samsung', 'Samsung Exynos 8 Octa', '4.00', '12.00', '60000.00', 'mobile/Note 7.png', 'live', '2016-08-24 19:32:19', '2016-08-24 19:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `role` char(7) NOT NULL,
  `account_created` datetime DEFAULT NULL,
  `account_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `first_name`, `last_name`, `role`, `account_created`, `account_login`) VALUES
(1, 'admin', '098f6bcd4621d373cade4e832627b4f6', 'psinghal4210@gmail.com', 'Prateek', 'Singhal', 'admin', '2014-07-14 23:35:06', '2016-08-24 19:30:04'),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 'psinghal@gmail.com', 'Prateek', 'Singhal', 'user', '2016-08-24 19:36:19', '2016-08-24 19:49:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`mobile_id`),
  ADD UNIQUE KEY `mobile_name` (`mobile_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `mobile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
