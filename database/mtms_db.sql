-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 11:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch_list`
--

CREATE TABLE `branch_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_list`
--

INSERT INTO `branch_list` (`id`, `name`, `address`, `status`, `date_created`) VALUES
(1, 'Branch 101', 'Sample Address', 1, '2021-10-28 10:05:08'),
(2, 'Branch 102', 'Sample Address 2', 1, '2021-10-28 10:05:19'),
(3, 'Branch 103', 'Sample Address 3', 1, '2021-10-28 10:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `fee_list`
--

CREATE TABLE `fee_list` (
  `id` int(30) NOT NULL,
  `amount_from` float NOT NULL DEFAULT 0,
  `amount_to` float NOT NULL DEFAULT 0,
  `fee` float NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_list`
--

INSERT INTO `fee_list` (`id`, `amount_from`, `amount_to`, `fee`, `date_created`) VALUES
(1, 0.01, 500, 10, '2021-10-28 10:51:15'),
(2, 501, 1500, 15, '2021-10-28 10:51:54'),
(3, 1501, 3000, 25, '2021-10-28 10:52:17'),
(4, 3001, 1000000000, 100, '2021-10-28 10:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Money Transfer Management System - PHP'),
(6, 'short_name', 'MTMS- PHP'),
(11, 'logo', 'uploads/logo-1635385798.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1635386199.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_list`
--

CREATE TABLE `transaction_list` (
  `id` int(30) NOT NULL,
  `tracking_code` varchar(50) NOT NULL,
  `branch_id` int(30) DEFAULT NULL,
  `sending_amount` float NOT NULL DEFAULT 0,
  `fee` float NOT NULL DEFAULT 0,
  `purpose` text DEFAULT NULL,
  `user_id` int(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_list`
--

INSERT INTO `transaction_list` (`id`, `tracking_code`, `branch_id`, `sending_amount`, `fee`, `purpose`, `user_id`, `status`, `date_created`, `date_updated`) VALUES
(1, 'TPL-769266515474', 1, 2500, 25, 'Allowance', 1, 0, '2021-10-28 14:09:11', '2021-10-28 15:24:48'),
(2, 'LBK-950392952803', 1, 5500, 100, 'Payment', 1, 1, '2021-10-28 14:20:40', '2021-10-28 16:38:15'),
(3, 'YIC-803727495099', 1, 10500, 100, 'Sample only', 2, 1, '2021-10-28 17:24:49', '2021-10-28 17:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_meta`
--

CREATE TABLE `transaction_meta` (
  `transaction_id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_meta`
--

INSERT INTO `transaction_meta` (`transaction_id`, `meta_field`, `meta_value`, `date_created`) VALUES
(1, 'sender_lastname', 'Smith', '2021-10-28 14:09:11'),
(1, 'sender_firstname', 'John', '2021-10-28 14:09:11'),
(1, 'sender_middlename', 'D', '2021-10-28 14:09:11'),
(1, 'sender_contact', '09123456789', '2021-10-28 14:09:11'),
(1, 'sender_address', 'Sample Address', '2021-10-28 14:09:11'),
(1, 'receiver_lastname', 'Blake', '2021-10-28 14:09:11'),
(1, 'receiver_firstname', 'Claire', '2021-10-28 14:09:11'),
(1, 'receiver_middlename', 'C', '2021-10-28 14:09:11'),
(1, 'receiver_contact', '097894561423', '2021-10-28 14:09:11'),
(1, 'receiver_address', '23rd St, Here City', '2021-10-28 14:09:11'),
(1, 'branch_id', '1', '2021-10-28 14:09:11'),
(2, 'sender_lastname', 'Smith', '2021-10-28 14:20:40'),
(2, 'sender_firstname', 'John', '2021-10-28 14:20:40'),
(2, 'sender_middlename', 'D', '2021-10-28 14:20:40'),
(2, 'sender_contact', '09123456789', '2021-10-28 14:20:40'),
(2, 'sender_address', 'Sample Address 101', '2021-10-28 14:20:40'),
(2, 'receiver_lastname', 'Williams', '2021-10-28 14:20:40'),
(2, 'receiver_firstname', 'Mike', '2021-10-28 14:20:40'),
(2, 'receiver_middlename', 'C', '2021-10-28 14:20:40'),
(2, 'receiver_contact', '097855465222', '2021-10-28 14:20:40'),
(2, 'receiver_address', 'Sample Address 102', '2021-10-28 14:20:40'),
(2, 'branch_id', '1', '2021-10-28 14:20:40'),
(2, 'sender_lastname', 'Smith', '2021-10-28 14:26:34'),
(2, 'sender_firstname', 'John', '2021-10-28 14:26:34'),
(2, 'sender_middlename', '', '2021-10-28 14:26:34'),
(2, 'sender_contact', '09123456789', '2021-10-28 14:26:34'),
(2, 'sender_address', 'Sample Address 101', '2021-10-28 14:26:34'),
(2, 'receiver_lastname', 'Williams', '2021-10-28 14:26:34'),
(2, 'receiver_firstname', 'Mike', '2021-10-28 14:26:34'),
(2, 'receiver_middlename', '', '2021-10-28 14:26:34'),
(2, 'receiver_contact', '097855465222', '2021-10-28 14:26:34'),
(2, 'receiver_address', 'Sample Address 102', '2021-10-28 14:26:34'),
(2, 'branch_id', '1', '2021-10-28 14:26:34'),
(2, 'sender_lastname', 'Smith', '2021-10-28 15:24:42'),
(2, 'sender_firstname', 'John', '2021-10-28 15:24:42'),
(2, 'sender_middlename', '', '2021-10-28 15:24:42'),
(2, 'sender_contact', '09123456789', '2021-10-28 15:24:42'),
(2, 'sender_address', 'Sample Address 101', '2021-10-28 15:24:42'),
(2, 'receiver_lastname', 'Williams', '2021-10-28 15:24:42'),
(2, 'receiver_firstname', 'Mike', '2021-10-28 15:24:42'),
(2, 'receiver_middlename', '', '2021-10-28 15:24:42'),
(2, 'receiver_contact', '097855465222', '2021-10-28 15:24:42'),
(2, 'receiver_address', 'Sample Address 102', '2021-10-28 15:24:42'),
(2, 'branch_id', '1', '2021-10-28 15:24:42'),
(1, 'sender_lastname', 'Smith', '2021-10-28 15:24:48'),
(1, 'sender_firstname', 'John', '2021-10-28 15:24:48'),
(1, 'sender_middlename', '', '2021-10-28 15:24:48'),
(1, 'sender_contact', '09123456789', '2021-10-28 15:24:48'),
(1, 'sender_address', 'Sample Address', '2021-10-28 15:24:48'),
(1, 'receiver_lastname', 'Blake', '2021-10-28 15:24:48'),
(1, 'receiver_firstname', 'Claire', '2021-10-28 15:24:48'),
(1, 'receiver_middlename', '', '2021-10-28 15:24:48'),
(1, 'receiver_contact', '097894561423', '2021-10-28 15:24:48'),
(1, 'receiver_address', '23rd St, Here City', '2021-10-28 15:24:48'),
(1, 'branch_id', '1', '2021-10-28 15:24:48'),
(2, 'sender_lastname', 'Smith', '2021-10-28 15:25:30'),
(2, 'sender_firstname', 'John', '2021-10-28 15:25:30'),
(2, 'sender_middlename', '', '2021-10-28 15:25:30'),
(2, 'sender_contact', '09123456789', '2021-10-28 15:25:30'),
(2, 'sender_address', 'Sample Address 101', '2021-10-28 15:25:30'),
(2, 'receiver_lastname', 'Williams', '2021-10-28 15:25:30'),
(2, 'receiver_firstname', 'Mike', '2021-10-28 15:25:30'),
(2, 'receiver_middlename', '', '2021-10-28 15:25:30'),
(2, 'receiver_contact', '097855465222', '2021-10-28 15:25:30'),
(2, 'receiver_address', 'Sample Address 102', '2021-10-28 15:25:30'),
(2, 'branch_id', '1', '2021-10-28 15:25:30'),
(2, 'sender_lastname', 'Smith', '2021-10-28 15:25:49'),
(2, 'sender_firstname', 'John', '2021-10-28 15:25:49'),
(2, 'sender_middlename', '', '2021-10-28 15:25:49'),
(2, 'sender_contact', '09123456789', '2021-10-28 15:25:49'),
(2, 'sender_address', 'Sample Address 101', '2021-10-28 15:25:49'),
(2, 'receiver_lastname', 'Williams', '2021-10-28 15:25:49'),
(2, 'receiver_firstname', 'Mike', '2021-10-28 15:25:49'),
(2, 'receiver_middlename', '', '2021-10-28 15:25:49'),
(2, 'receiver_contact', '097855465222', '2021-10-28 15:25:49'),
(2, 'receiver_address', 'Sample Address 102', '2021-10-28 15:25:49'),
(2, 'branch_id', '1', '2021-10-28 15:25:49'),
(2, 'sender_lastname', 'Smith', '2021-10-28 15:25:54'),
(2, 'sender_firstname', 'John', '2021-10-28 15:25:54'),
(2, 'sender_middlename', '', '2021-10-28 15:25:54'),
(2, 'sender_contact', '09123456789', '2021-10-28 15:25:54'),
(2, 'sender_address', 'Sample Address 101', '2021-10-28 15:25:54'),
(2, 'receiver_lastname', 'Williams', '2021-10-28 15:25:54'),
(2, 'receiver_firstname', 'Mike', '2021-10-28 15:25:54'),
(2, 'receiver_middlename', '', '2021-10-28 15:25:54'),
(2, 'receiver_contact', '097855465222', '2021-10-28 15:25:54'),
(2, 'receiver_address', 'Sample Address 102', '2021-10-28 15:25:54'),
(2, 'branch_id', '1', '2021-10-28 15:25:54'),
(2, 'receiver_presented_id_type', 'TIN', '2021-10-28 16:38:15'),
(2, 'receiver_presented_id_num', '123-45678-789995', '2021-10-28 16:38:15'),
(2, 'received_branch_id', '2', '2021-10-28 16:38:15'),
(2, 'receive_user_id', '1', '2021-10-28 16:38:15'),
(3, 'sender_lastname', 'Williams', '2021-10-28 17:24:49'),
(3, 'sender_firstname', 'Mike', '2021-10-28 17:24:49'),
(3, 'sender_middlename', 'C', '2021-10-28 17:24:49'),
(3, 'sender_contact', '09123546987', '2021-10-28 17:24:49'),
(3, 'sender_address', 'Sample Address', '2021-10-28 17:24:49'),
(3, 'receiver_lastname', 'Wilson', '2021-10-28 17:24:49'),
(3, 'receiver_firstname', 'George', '2021-10-28 17:24:49'),
(3, 'receiver_middlename', 'D', '2021-10-28 17:24:49'),
(3, 'receiver_contact', '097788455511', '2021-10-28 17:24:49'),
(3, 'receiver_address', 'Sample Address', '2021-10-28 17:24:49'),
(3, 'branch_id', '1', '2021-10-28 17:24:49'),
(3, 'receiver_presented_id_type', 'Driver\'s License', '2021-10-28 17:25:49'),
(3, 'receiver_presented_id_num', 'NVY-9875589988', '2021-10-28 17:25:49'),
(3, 'received_branch_id', '2', '2021-10-28 17:25:49'),
(3, 'receive_user_id', '3', '2021-10-28 17:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `branch_id` int(30) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `branch_id`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, NULL, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(2, 'John', 'Smith', 'jsmith', '39ce7e2a8573b41ce73b5ba41617f8f7', 'uploads/avatar-2.png?v=1635387469', NULL, 2, 1, '2021-10-28 10:17:49', '2021-10-28 10:17:49'),
(3, 'Claire', 'Blake', 'cblake', '4744ddea876b11dcb1d169fadf494418', 'uploads/avatar-3.png?v=1635413025', NULL, 2, 2, '2021-10-28 17:23:45', '2021-10-28 17:23:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch_list`
--
ALTER TABLE `branch_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_list`
--
ALTER TABLE `fee_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_list`
--
ALTER TABLE `transaction_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_meta`
--
ALTER TABLE `transaction_meta`
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch_list`
--
ALTER TABLE `branch_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fee_list`
--
ALTER TABLE `fee_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaction_list`
--
ALTER TABLE `transaction_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_list`
--
ALTER TABLE `transaction_list`
  ADD CONSTRAINT `transaction_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaction_list_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `branch_list` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transaction_meta`
--
ALTER TABLE `transaction_meta`
  ADD CONSTRAINT `transaction_meta_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch_list` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
