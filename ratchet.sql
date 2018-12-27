-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 04:12 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratchet`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatrooms`
--

CREATE TABLE `chatrooms` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatrooms`
--

INSERT INTO `chatrooms` (`id`, `userid`, `msg`, `created_at`) VALUES
(1, 7, 'fgfdg', '2018-12-25 09:27:19'),
(2, 8, 'gfd', '2018-12-25 09:27:36'),
(3, 8, 'hello\n', '2018-12-25 09:30:16'),
(4, 8, 'hello', '2018-12-25 09:30:57'),
(5, 7, 'hi', '2018-12-25 09:31:02'),
(6, 8, 'fdg', '2018-12-25 09:31:23'),
(7, 8, 'hello', '2018-12-25 09:31:49'),
(8, 7, 'hi', '2018-12-25 09:31:53'),
(9, 8, 'hi', '2018-12-25 09:32:35'),
(10, 7, 'hello', '2018-12-25 09:32:39'),
(11, 8, 'hello', '2018-12-25 09:41:08'),
(12, 8, 'aaj kya kar raha he', '2018-12-25 09:41:19'),
(13, 7, 'gfd', '2018-12-25 09:43:21'),
(14, 8, 'deep', '2018-12-25 09:46:01'),
(15, 7, 'fsdf', '2018-12-25 09:46:09'),
(16, 8, 'dkfsdf', '2018-12-25 11:29:12'),
(17, 8, 'dfdsfk', '2018-12-25 11:29:21'),
(18, 8, 'hi', '2018-12-26 11:47:53'),
(19, 9, 'hello', '2018-12-26 11:48:12'),
(20, 8, 'haji', '2018-12-26 11:48:22'),
(21, 9, 'or', '2018-12-26 11:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login_status` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login_status`, `last_login`) VALUES
(7, 'deepak', 'deepak@ail.cc', 1, '2018-12-25 08:21:42'),
(8, 'dheru', 'dheru@mail.cc', 1, '2018-12-26 11:47:23'),
(9, 'shail', 'shil@mail.cc', 1, '2018-12-26 11:46:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatrooms`
--
ALTER TABLE `chatrooms`
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
-- AUTO_INCREMENT for table `chatrooms`
--
ALTER TABLE `chatrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
