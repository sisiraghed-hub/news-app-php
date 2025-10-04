-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2025 at 02:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(10, 'art'),
(7, 'e.g'),
(13, 'Health'),
(6, 'politics'),
(1, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `category_id`, `details`, `image_path`, `user_id`, `deleted`) VALUES
(3, 'wwww', 6, 'sss', '/php_corse/final_assig/uploads/img_68de7f3fb88fa.png', 6, 0),
(4, 'rrrrrr', 1, 'ssssssss', '/php_corse/final_assig/uploads/img_68de81928efca.png', 6, 0),
(5, 'www', 6, 'wwwwex', '/php_corse/final_assig/uploads/img_68e10ebc742f1.png', 2, 0),
(6, 'wwwww', 1, 'ddddddff', '/php_corse/final_assig/uploads/img_68e10eeb3d3a5.png', 4, 0),
(7, 'reem health', 13, 'sport and yogd', '/php_corse/final_assig/uploads/img_68e1121a15734.png', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`) VALUES
(2, 'raghad', 'raghad28@gimail.com', '$2y$10$1UviMAu5m6uj9MhlvyfwmuND3nuJZky1.WHGWJNSzU1v1EyNqTviO'),
(3, 'noor', 'noor@gmail.cpm', '$2y$10$BGHXr.0XgIgW85IELGR0ueXJFQHEE4s2hEJq4JSuMYo0UfDu/0f3q'),
(4, 'raghad', 'raghad@gmail.com', '$2y$10$4vLz83Ds58UFju9/vc2oh.pRYKL2MqappXh1lcORXAbSXF.nFCqvC'),
(5, 'raghad', 'raghad2@gmail.com', '$2y$10$.jFn.48vNrbf4cQm/WnNBeDX1GYJetHzjTNcDGXHxPkNbSu619WbO'),
(6, 'ali', 'ali@gmail.com', '$2y$10$eMT8ViGnVyOmqUtCv3GvxOaj1ZME2jl30WiwnY78b8jKPUYKLWwNu'),
(7, 'reem', 'reem@gmail.com', '$2y$10$8QtUGG/qGFJ.2BpwWTC5NO1oHFMwI9J8F6kcY6VyZDIgSl1ceOVWO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_cat` (`category_id`),
  ADD KEY `fk_news_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_cat` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_news_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
