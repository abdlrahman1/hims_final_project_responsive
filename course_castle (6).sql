-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 01:15 PM
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
-- Database: `course_castle`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pro` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `img_title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `subheading2` varchar(255) DEFAULT NULL,
  `content2` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `subheading3` varchar(255) DEFAULT NULL,
  `content3` text DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `admin_id`, `admin_name`, `admin_pro`, `title`, `subheading`, `img_title`, `article`, `subheading2`, `content2`, `img2`, `subheading3`, `content3`, `img3`, `create_date`) VALUES
(48, 27, 'abdlrahman magdy', 'logo.png', 'The 10 Most Popular Articles in 2022 (So Far)', 'The 10 Most Popular Articles in 2022 (So Far)', 'GEN-Hooijberg-Future-Team-Leadership-1290x860-1.png', ' The 10 Most Popular Articles in 2022 (So Far)', '', ' ', '', '', ' ', '', '2023-02-21 18:16:28'),
(49, 27, 'abdlrahman magdy', 'logo.png', 'The 10 Most Popular Articles in 2022 (So Far)', 'The 10 Most Popular Articles in 2022 (So Far)', 'userrolebadges.png', ' The 10 Most Popular Articles in 2022 (So Far)', '', ' ', '', '', ' ', '', '2023-02-21 18:16:34'),
(50, 27, 'abdlrahman magdy', 'logo.png', 'The following are the 10 most popular', 'The following are the 10 most popular', 'userrolebadges.png', ' The following are the 10 most popular', '', ' ', '', '', ' ', '', '2023-02-21 18:18:01'),
(51, 27, 'abdlrahman magdy', 'logo.png', 'The following are the 10 most popular', 'The following are the 10 most popular', 'userrolebadges.png', ' The following are the 10 most popular', '', ' ', '', '', ' ', '', '2023-02-21 18:18:17'),
(52, 27, 'abdlrahman magdy', 'logo.png', 'visual studio code', 'visual studio code', 'scooter-7770871_960_720.png', ' visual studio code', '', ' ', '', '', ' ', '', '2023-02-21 21:23:21'),
(53, 27, 'abdlrahman magdy', 'logo.png', 'visual studio code', 'visual studio code', 'userrolebadges.png', ' visual studio code', '', ' ', '', '', ' ', '', '2023-02-21 21:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pro` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `img_title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `subheading2` varchar(255) DEFAULT NULL,
  `content2` text DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `subheading3` varchar(255) DEFAULT NULL,
  `content3` text DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `admin_id`, `admin_name`, `admin_pro`, `title`, `subheading`, `img_title`, `article`, `subheading2`, `content2`, `img2`, `subheading3`, `content3`, `img3`, `create_date`) VALUES
(38, 27, 'abdlrahman magdy', 'logo.png', 'The 10 Most Popular Articles in 2022 (So Far)', 'The 10 Most Popular Articles in 2022 (So Far)', 'userrolebadges.png', ' The 10 Most Popular Articles in 2022 (So Far)', '', ' ', '', '', ' ', '', '2023-02-21 18:16:07'),
(39, 27, 'abdlrahman magdy', 'logo.png', 'The following are the 10 most popular', 'The following are the 10 most popular', 'image.png', ' The following are the 10 most popular', '', ' ', '', '', ' ', '', '2023-02-21 18:17:35'),
(40, 27, 'abdlrahman magdy', 'logo.png', 'The following are the 10 most popularThe following are the 10 most popular', 'The following are the 10 most popularThe following are the 10 most popular', 'userrolebadges.png', ' The following are the 10 most popular', '', ' ', '', '', ' ', '', '2023-02-21 18:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pro` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subheading` varchar(255) NOT NULL,
  `img_title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `subheading2` varchar(255) DEFAULT NULL,
  `content2` text DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `subheading3` varchar(255) DEFAULT NULL,
  `content3` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `admin_id`, `admin_name`, `admin_pro`, `title`, `subheading`, `img_title`, `article`, `subheading2`, `content2`, `img2`, `subheading3`, `content3`, `img3`, `create_date`) VALUES
(18, 27, 'abdlrahman magdy', 'logo.png', 'visual studio code', 'visual studio code', 'userrolebadges.png', ' visual studio code', '', ' ', '', '', ' ', '', '2023-02-21 18:16:56'),
(19, 27, 'abdlrahman magdy', 'logo.png', 'visual studio code', 'visual studio code', 'userrolebadges.png', ' visual studio code', '', ' ', '', '', ' ', '', '2023-02-21 18:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` text NOT NULL,
  `time_message` datetime NOT NULL,
  `user_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `message`, `time_message`, `user_ip`) VALUES
(2, 'ahmed mohamed', '', 0, ' dasdsad', '2023-02-07 23:50:59', '::1'),
(5, 'adsad asdsad', 'bm8529391@gmail.com', 1128824223, ' adsadsad', '2023-02-20 00:01:43', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `img_profile` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`id`, `parent_id`, `username`, `email`, `message`, `parent_comment_id`, `img_profile`, `created_at`) VALUES
(184, 0, 'mido', 'mido', 'hello', 0, 'mido', '2023-02-21 22:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `login_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `pro_img`, `role`, `login_date`) VALUES
(5, 'mido', 'mido', 'mido', 'mido', 1234, 'mido', 'admin', '2023-02-08 00:54:28'),
(16, 'abdlrahman', 'abdlrahman', 'abdlrahman', 'Abdelrahman@gmail.com', 123456, 'Documents/logo (3).png', 'admin', '2023-02-12 14:31:11'),
(17, 'abdelrahman magdy', 'Abdelrahman Magdy', 'Abdelrahman Magdy', 'Abdelrahman Magdy', 1234, 'image.png', NULL, '2023-02-12 15:36:19'),
(27, 'abdlrahman magdy', 'abdelrahman ', 'magdy', 'abdlrahmanmagdy@gmail.com', 1234, 'logo.png', 'admin', '2023-02-18 00:54:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `admin_name` (`admin_name`),
  ADD KEY `admin_pro` (`admin_pro`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `admin_name` (`admin_name`),
  ADD KEY `admin_pro` (`admin_pro`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `admin_name` (`admin_name`),
  ADD KEY `admin_pro` (`admin_pro`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_profile` (`img_profile`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `pro_img` (`pro_img`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`admin_name`) REFERENCES `register` (`username`),
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`admin_pro`) REFERENCES `register` (`pro_img`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`admin_name`) REFERENCES `register` (`username`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`admin_pro`) REFERENCES `register` (`pro_img`);

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `challenges_ibfk_2` FOREIGN KEY (`admin_name`) REFERENCES `register` (`username`),
  ADD CONSTRAINT `challenges_ibfk_3` FOREIGN KEY (`admin_pro`) REFERENCES `register` (`pro_img`);

--
-- Constraints for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD CONSTRAINT `question_answers_ibfk_1` FOREIGN KEY (`img_profile`) REFERENCES `register` (`pro_img`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
