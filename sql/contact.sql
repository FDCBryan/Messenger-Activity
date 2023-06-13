-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 05:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `contactid` int(10) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fromId` int(10) NOT NULL,
  `toId` int(10) NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fromId`, `toId`, `message`, `seen`, `created`, `modified`) VALUES
(1, 5, 2, 'test', 0, '2023-06-07 11:13:39', '2023-06-07 11:13:39'),
(2, 5, 2, 'another one', 0, '2023-06-07 11:14:04', '2023-06-07 11:14:04'),
(3, 2, 5, 'hello', 0, '2023-06-07 11:15:27', '2023-06-07 11:15:27'),
(4, 1, 5, 'hello', 0, '2023-06-08 10:04:52', '2023-06-08 10:04:52'),
(5, 5, 1, 'hello\n', 0, '2023-06-08 10:05:34', '2023-06-08 10:05:34'),
(6, 6, 1, 'asdasd\n', 0, '2023-06-09 07:22:03', '2023-06-09 07:22:03'),
(7, 1, 2, 'ZXZ', 0, '2023-06-09 10:01:25', '2023-06-09 10:01:25'),
(8, 1, 2, 'ZXZX', 0, '2023-06-09 10:01:27', '2023-06-09 10:01:27'),
(9, 1, 2, 'ZXZXZXZ', 0, '2023-06-09 10:01:29', '2023-06-09 10:01:29'),
(10, 1, 2, 'ZXZXZX', 0, '2023-06-09 10:01:30', '2023-06-09 10:01:30'),
(11, 1, 2, 'ZXZXZX', 0, '2023-06-09 10:01:32', '2023-06-09 10:01:32'),
(12, 1, 2, 'ZXZXZXZX', 0, '2023-06-09 10:01:35', '2023-06-09 10:01:35'),
(13, 1, 2, 'ZXXXZXZXZX', 0, '2023-06-09 10:01:37', '2023-06-09 10:01:37'),
(14, 1, 2, 'ZXXXZXZXZX', 0, '2023-06-09 10:01:41', '2023-06-09 10:01:42'),
(15, 1, 2, 'wew', 0, '2023-06-12 02:19:13', '2023-06-12 02:19:13'),
(16, 1, 5, 'xZXZXZXZ', 0, '2023-06-12 07:25:27', '2023-06-12 07:25:27'),
(17, 1, 5, 'testting\n', 0, '2023-06-12 07:27:40', '2023-06-12 07:27:40'),
(18, 1, 5, 'wakoko', 0, '2023-06-12 07:31:52', '2023-06-12 07:31:52'),
(23, 1, 5, 'asdasdasdasd', 0, '2023-06-12 10:31:47', '2023-06-12 10:31:47'),
(24, 1, 5, 'sample 1231312', 0, '2023-06-12 10:33:17', '2023-06-12 10:33:17'),
(25, 1, 5, 'wew', 0, '2023-06-13 03:43:46', '2023-06-13 03:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_picture` text NOT NULL,
  `role` tinyint(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hobby` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `profile_picture`, `role`, `name`, `birthday`, `gender`, `hobby`, `created`, `modified`) VALUES
(1, 'wakoko', '945188e9189bf675b6b3280dce48312ac1ed0168', 'wakoko@gmail.com', 'images.jpg', 1, 'Bryan Badocdoc 1', '1990-01-17', 'male', 'Playing Dota and ML and watching movies 2', '2023-06-07 05:20:43', '2023-06-09 03:56:38'),
(2, 'user1', '945188e9189bf675b6b3280dce48312ac1ed0168', 'user1@gmail.com', 'default.jpg', 1, '', '0000-00-00', '', '', '2023-06-07 06:29:25', '2023-06-07 06:29:25'),
(3, 'wakoko1', '945188e9189bf675b6b3280dce48312ac1ed0168', 'wakoko1@fdasda', 'default.jpg', 1, '', '0000-00-00', '', '', '2023-06-07 06:33:57', '2023-06-07 06:33:57'),
(4, 'sample', '945188e9189bf675b6b3280dce48312ac1ed0168', 'wakoko1@fdasda', 'default.jpg', 1, '', '0000-00-00', '', '', '2023-06-07 07:03:41', '2023-06-07 07:03:41'),
(5, 'sample new', '945188e9189bf675b6b3280dce48312ac1ed0168', 'new@gsafdas.com', 'default.jpg', 1, 'john wick the third asdasdasd', '1950-06-19', 'male', 'pamusil', '2023-06-07 07:08:53', '2023-06-08 10:09:56'),
(6, 'ambot', '945188e9189bf675b6b3280dce48312ac1ed0168', 'wakoko1@fdasda', 'default.jpg', 1, '', '0000-00-00', '', '', '2023-06-08 04:25:10', '2023-06-08 04:25:10'),
(7, 'last try', '945188e9189bf675b6b3280dce48312ac1ed0168', 'lasttry@gasda', 'default.jpg', 1, '', '0000-00-00', '', '', '2023-06-08 08:26:26', '2023-06-08 08:26:26'),
(8, 'lastpromise', '945188e9189bf675b6b3280dce48312ac1ed0168', 'dsasdsda@sasdas', 'default.jpg', 1, '', '0000-00-00', '', '', '2023-06-08 08:28:32', '2023-06-08 08:28:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
