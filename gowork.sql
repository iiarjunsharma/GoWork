-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 05:43 PM
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
-- Database: `gowork`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_subtitle` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_subtitle`, `created_time`) VALUES
(1, 'Graphics & Design', 'Designs to make you stand out.', '2023-07-02 07:40:34'),
(2, 'Digital Marketing', 'Build your brand. Grow your business.', '2023-07-02 07:42:41'),
(3, 'Writing & Translation', 'Get your words across—in any language.', '2023-07-02 07:43:16'),
(4, 'Video & Animation', 'Bring your story to life with creative videos.', '2023-07-02 07:43:47'),
(5, 'Music & Audio', 'Don\'t miss a beat. Bring your sound to life.', '2023-07-02 07:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `contact_list`
--

CREATE TABLE `contact_list` (
  `contact_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `contact_username` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_list`
--

INSERT INTO `contact_list` (`contact_id`, `user_id`, `profile_picture`, `contact_username`, `timestamp`) VALUES
(276, 12, '', '1234', '2023-08-19 19:10:06'),
(277, 9, '', '5501', '2023-08-19 19:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(255) NOT NULL,
  `participant_1_id` int(255) NOT NULL,
  `participant_2_id` int(255) NOT NULL,
  `last_message` varchar(255) NOT NULL,
  `last_message_timestamp` datetime NOT NULL,
  `unread_message_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `participant_1_id`, `participant_2_id`, `last_message`, `last_message_timestamp`, `unread_message_count`) VALUES
(60, 12, 9, 'sdf', '2023-08-19 21:11:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `gig_id` int(255) NOT NULL,
  `seller_user_id` int(255) NOT NULL,
  `gig_title` varchar(80) NOT NULL,
  `package_name` varchar(35) NOT NULL,
  `package_describe` varchar(100) NOT NULL,
  `delivery_time` varchar(20) NOT NULL,
  `package_price` int(5) NOT NULL,
  `images` text NOT NULL,
  `upload_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gigs`
--

INSERT INTO `gigs` (`gig_id`, `seller_user_id`, `gig_title`, `package_name`, `package_describe`, `delivery_time`, `package_price`, `images`, `upload_time`) VALUES
(123, 9, '22222222222222222222222222222222222222222222222222222222222222222222222222222222', '22222222222222222222222222222222222', '2222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222', '60 day Delivery', 15, '64ce1e16d2494.jpg', '2023-07-11 10:42:16'),
(124, 9, 'sssssssssssssssssdfgsdfg1111111', 'ssdsfgsdfgsdfg11111111', 'sssdfasdfsdfgsdfg111111111', '30 day Delivery', 20, '64ce5f2f53076.jpg', '2023-07-11 10:44:15'),
(125, 9, '11111111111111111111111111111111111111111111111111111111111111111111111111111111', '11111111111111111111111111111111111', '11111111111111111111111111111111111111111111111', '45 day Delivery', 55, '64ce5f524671b.jpg', '2023-07-11 10:44:20'),
(126, 12, '22222222222222222222222222222222222222222222222222222222222222222222222222222222', '22222222222222222222222222222222222', '22222222222222222222222222222222222222222222222222222222222222222222222222222222', '10 day Delivery', 60, '64ace5e842954.jpg', '2023-07-11 10:47:28'),
(127, 12, '22222222222222222222222222222222222222222222222222222222222222222222222222222222', '22222222222222222222222222222222222', '22222222222222222222222222222222222222222222222222222222222222222222222222222222', '10 day Delivery', 60, '64ace5eb9937c.jpg', '2023-07-11 10:47:31'),
(128, 12, '22222222222222222222222222222222222222222222222222222222222222222222222222222222', '22222222222222222222222222222222222', '22222222222222222222222222222222222222222222222222222222222222222222222222222222', '10 day Delivery', 60, '64ace5edaae92.jpg', '2023-07-11 10:47:33'),
(130, 29, 'dsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'dssssssssssssssssssssssssssssssssss', 'dsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '30 day Delivery', 25, '64b68f2276714.jpg', '2023-07-18 18:39:54'),
(131, 29, 'dsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'dssssssssssssssssssssssssssssssssss', 'dsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '30 day Delivery', 25, '64b68f65150d8.jpg', '2023-07-18 18:41:01'),
(132, 29, '11111111111111111111111111111111111111111111111111111111111111111111111111111111', '11111111111111111111111111111111111', '11111111111111111111111111111111111111111111111111111111111111111111111111111111', '30 day Delivery', 45, '64b690e8160b2.jpg', '2023-07-18 18:47:28'),
(133, 9, 'tedgdsfgsdfgdffgsdfgsdfgdfghdfghdfgh', 'dfghdfghdfghdfghdfghd', 'sdfghdfghdfghdfghd', '90 day Delivery', 15, '64ce605acf2d1.jpg', '2023-08-05 15:58:28'),
(134, 9, '€fgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfgsdfgf', 'fgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdf', 'fgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfg', '30 day Delivery', 15, '64ce60e8c1709.jpg', '2023-08-05 20:17:04'),
(135, 9, 'fgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfgsdfgfg', 'fgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdf', 'fgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfgsdfgfgsdfgsdfgsdfgsdfgsdfg', '3 day Delivery', 15, '64ce6189acb92.png', '2023-08-05 20:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(255) NOT NULL,
  `conversation_id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `conversation_id`, `sender_id`, `receiver_id`, `message`, `timestamp`) VALUES
(54, 60, 12, 9, 'sdfgsfffffff', '2023-08-19 19:10:06'),
(55, 60, 12, 9, 'sdfgsfffffff', '2023-08-19 19:10:06'),
(56, 60, 12, 9, 'sdfgsfffffff', '2023-08-19 19:10:06'),
(57, 60, 9, 12, 'dsfsdfsssssssssssssssss', '2023-08-19 19:13:16'),
(58, 60, 12, 9, 'dsfsddfsasfffffffffffff', '2023-08-19 19:21:23'),
(59, 60, 9, 12, 'sffffffffffffffffffffffffffffffffffffff', '2023-08-19 19:21:43'),
(60, 60, 12, 9, 'sfffffffffffffffff', '2023-08-19 19:22:01'),
(61, 60, 12, 9, 'sdffffffffffffffffffffffffffffff', '2023-08-19 19:26:22'),
(62, 60, 12, 9, 'dfgsdfg', '2023-08-19 20:20:12'),
(63, 60, 12, 9, '1212', '2023-08-19 20:20:23'),
(64, 60, 12, 9, 'sdfsfsfd', '2023-08-19 20:21:41'),
(65, 60, 9, 12, 'sdf', '2023-08-19 20:50:22'),
(66, 60, 9, 12, 'dsfsfd', '2023-08-19 20:54:25'),
(67, 60, 9, 12, 'sdfsdfsdf', '2023-08-19 20:54:31'),
(68, 60, 9, 12, 'asdfasdf', '2023-08-19 21:02:00'),
(69, 60, 12, 9, 'sdfgsdfg', '2023-08-19 21:11:17'),
(70, 60, 12, 9, 'sdf', '2023-08-19 21:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(255) NOT NULL,
  `wallet_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `type(credit,debit)` varchar(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `wallet_id`, `amount`, `type(credit,debit)`, `created_at`) VALUES
(475, 9, 15, 'debit', '2023-08-06 16:53:51'),
(476, 9, 15, 'credit', '2023-08-06 16:53:57'),
(477, 9, 15, 'credit', '2023-08-06 16:53:59'),
(478, 9, 15, 'credit', '2023-08-06 16:54:00'),
(479, 9, 15, 'credit', '2023-08-06 16:54:00'),
(480, 9, 15, 'credit', '2023-08-06 16:54:00'),
(481, 9, 15, 'credit', '2023-08-06 16:54:00'),
(482, 9, 75, 'debit', '2023-08-06 16:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `timestamp`) VALUES
(9, '1234', '1234@gmail.com', '$2y$10$ZN.Yhu5UZw0QQqlXmHw5ZeLO0DPD7sglUxRyGMmW3IICKvoenoC7C', '2023-08-05 10:45:08'),
(12, '5501', '5501@gmail.com', '$2y$10$NFAVepBMGHOkPr7yXVL4Ce.VMs0AyLwwkrIMK.1FuiChexRhKv9CO', '2023-08-05 10:52:51'),
(29, '1', '1@gmail.com', '$2y$10$DhtD2hGVNV1g6EMHxbsYX.uQd3umJIeQVWUEVqyE9wjUOtiegH/he', '2023-08-05 10:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `sno` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `display_name` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`sno`, `user_id`, `display_name`, `description`, `time_stamp`) VALUES
(5, 48, '', '', '2023-08-05 10:53:50'),
(6, 49, '', '', '2023-08-05 11:08:25'),
(7, 9, 'arjun ', '111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111', '2023-08-05 11:41:14'),
(8, 12, '', '', '2023-08-05 11:59:22'),
(9, 29, '', '', '2023-08-06 11:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `type(in,out)` varchar(3) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `user_id`, `balance`, `type(in,out)`, `updated_at`) VALUES
(826, 9, 15, 'in', '2023-08-06 16:53:51'),
(827, 9, 15, 'out', '2023-08-06 16:53:57'),
(828, 9, 15, 'out', '2023-08-06 16:53:59'),
(829, 9, 15, 'out', '2023-08-06 16:54:00'),
(830, 9, 15, 'out', '2023-08-06 16:54:00'),
(831, 9, 15, 'out', '2023-08-06 16:54:00'),
(832, 9, 15, 'out', '2023-08-06 16:54:00'),
(833, 9, 75, 'in', '2023-08-06 16:54:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_list`
--
ALTER TABLE `contact_list`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`gig_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_list`
--
ALTER TABLE `contact_list`
  MODIFY `contact_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `gig_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=834;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
