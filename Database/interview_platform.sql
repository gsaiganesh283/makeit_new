-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2024 at 08:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `aiusers`
--

CREATE TABLE `aiusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aiusers`
--

INSERT INTO `aiusers` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'testuser1', '', '$2y$10$wNn6YHR/Rl9x9s.uwCB.kOecAEiR/TZHpJWRGRwXfcoLeW4pKFlWa', '2024-08-10 06:49:33'),
(2, 'testuser2', '', '$2y$10$lt/UCyXfFVhzxyT1vKp.u.TlgP48S0Gk53Hqf4RtM3iViLEuFfRli', '2024-08-10 06:49:33'),
(3, 'raju', 'saiganeshraju05@gmail.com', '$2y$10$JlLHI6aqIt6WML8y0pTxTuoQ7ztzKjcjvDORp0tCOrIRdmymzp.9a', '2024-08-12 04:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `clientusers`
--

CREATE TABLE `clientusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientusers`
--

INSERT INTO `clientusers` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'testuser1', '', '$2y$10$wNn6YHR/Rl9x9s.uwCB.kOecAEiR/TZHpJWRGRwXfcoLeW4pKFlWa', '2024-08-10 06:49:04'),
(2, 'testuser2', '', '$2y$10$lt/UCyXfFVhzxyT1vKp.u.TlgP48S0Gk53Hqf4RtM3iViLEuFfRli', '2024-08-10 06:49:04'),
(3, 'saiganesh', 'gg4906@srmist.edu.in', '$2y$10$Cjeb7tMVWqZj7Z90sPbL0OzMO02MNsjx7vc5McdP6j6xK38as/6Bi', '2024-08-10 07:04:38'),
(4, '', '', '$2y$10$MCH1oP69fhsZkGk7H9YPee1b3.2h54vc27QL2lJC/rUyQTph9Plwq', '2024-08-12 04:05:28'),
(6, 'raju', 'saiganeshraju05@gmail.com', '$2y$10$2rR0ayCXYLipE.7GW1FmIuvKLaoE8JDa.q0SF3B3rxAAQ24dt26AO', '2024-08-12 04:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `example` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `example`) VALUES
(1, 'Stock Market Analysis and Prediction using LSTM', 'zxdfcghmj,\r\ndfghjk\r\nfdghjk\r\nfdghjk\r\nfgdhjm\r\n', 'gfhgjk\r\nfdxghjk\r\ndfgnhmj\r\ndfghj\r\ndfgh\r\n'),
(2, 'Remove duplicate elements from sorted Array', 'Given a sorted array arr. Return the size of the modified array which contains only distinct elements.\r\nNote:\r\n1. Don\'t use set or HashMap to solve the problem.\r\n2. You must return the modified array size only where distinct elements are present and modify the original array such that all the distinct elements come at the beginning of the original array.', 'Input: arr = [2, 2, 2, 2, 2]\r\nOutput: [2]\r\nExplanation: After removing all the duplicates only one instance of 2 will remain i.e. [2] so modified array will contains 2 at first position and you should return 1 after modifying the array, the driver code will print the modified array elements.');

-- --------------------------------------------------------

--
-- Table structure for table `testcases`
--

CREATE TABLE `testcases` (
  `id` int(11) NOT NULL,
  `input1` varchar(255) NOT NULL,
  `input2` varchar(255) NOT NULL,
  `output1` varchar(255) NOT NULL,
  `output2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testcases`
--

INSERT INTO `testcases` (`id`, `input1`, `input2`, `output1`, `output2`) VALUES
(1, '8374966167', '6281718680', 'prabhakar', 'saiganesh'),
(2, '2 2 2 2 2', '1 1 1 1 1', '2', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aiusers`
--
ALTER TABLE `aiusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `clientusers`
--
ALTER TABLE `clientusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testcases`
--
ALTER TABLE `testcases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aiusers`
--
ALTER TABLE `aiusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clientusers`
--
ALTER TABLE `clientusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testcases`
--
ALTER TABLE `testcases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
