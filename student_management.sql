-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 03:12 PM
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
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `c_id` int(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `c_id`, `book_name`, `book_author`) VALUES
(1, 2, 'Basic Java', 'Microsystem'),
(2, 2, 'Advance Java', 'Albert'),
(3, 1, 'Basics of Python', 'Anthony'),
(4, 1, 'Python with ML', 'Anthony'),
(5, 3, 'C Programming', 'brian'),
(6, 4, 'C# Programming', 'Peter Van');

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails1`
--

CREATE TABLE `coursedetails1` (
  `Course_ID` int(255) NOT NULL,
  `Course_Name` varchar(255) NOT NULL,
  `Course_credit` int(255) NOT NULL,
  `Start_date` date NOT NULL,
  `End_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursedetails1`
--

INSERT INTO `coursedetails1` (`Course_ID`, `Course_Name`, `Course_credit`, `Start_date`, `End_Date`) VALUES
(1, 'Python', 15, '2024-04-19', '2024-05-19'),
(2, 'Java', 14, '2024-06-23', '2024-06-30'),
(3, 'C', 15, '2024-05-31', '2024-06-22'),
(4, 'C#', 12, '2024-08-23', '2024-09-01'),
(5, 'C++', 15, '2024-08-01', '2024-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment1`
--

CREATE TABLE `enrollment1` (
  `e_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `Course_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment1`
--

INSERT INTO `enrollment1` (`e_id`, `id`, `Course_ID`) VALUES
(1, 1, 1),
(3, 4, 1),
(5, 4, 3),
(6, 1, 4),
(7, 1, 5),
(8, 5, 1),
(10, 3, 1),
(11, 4, 4),
(12, 4, 5),
(13, 5, 3),
(14, 5, 4),
(15, 8, 3),
(16, 8, 4),
(17, 8, 2),
(18, 3, 3),
(19, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students1`
--

CREATE TABLE `students1` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students1`
--

INSERT INTO `students1` (`id`, `name`, `email`, `phone`, `course`) VALUES
(1, 'Jatin', 'jatin@gmail.com', 2147483647, 'Nagpur'),
(3, 'Dushant', 'dushant@gmail.com', 2147483647, 'Pune'),
(4, 'Sahil', 'sahil@gmail.com', 2147483647, 'Nagpur'),
(5, 'Vedant Nisar ', 'vedant@gmail.com', 2147483647, 'Kolkata'),
(8, 'sushant', 'jatin@gmail.com', 2147483647, 'Nagpur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `c_id` int(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `contact`, `c_id`, `password`, `c_password`) VALUES
(1, 'Sushant', 'sushant@gmail.com', '9067483628', 2, '', ''),
(2, 'Sushant', 'sushant@gmail.com', '9067483628', 4, '', ''),
(3, 'jatin', 'jatin@gmail.com', '895749372', 4, '', ''),
(4, 'sangharsh', 'sangharsh@gmail.com', '895749372', 1, '', ''),
(6, 'asad', 'ad@gmail.com', '2457544', 0, '$2y$10$lZbYgy/PjE3OTOhKHyQjOuiEHz0oV1F9iRJmxs9uRxx8CPSolbkqC', ''),
(8, 'Ishant', 'ishant@gmail.com', '2457544', NULL, '$2y$10$GSWOONgdaNLi99apaPh/GOthQkfGRgQGQMI9H0xdlW3Wm7mA0W0a.', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_enrolled`
--

CREATE TABLE `user_enrolled` (
  `e_id` int(255) NOT NULL,
  `c_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_enrolled`
--

INSERT INTO `user_enrolled` (`e_id`, `c_id`, `u_id`) VALUES
(1, 2, 8),
(2, 3, 8),
(3, 4, 8),
(4, 1, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `coursedetails1`
--
ALTER TABLE `coursedetails1`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `enrollment1`
--
ALTER TABLE `enrollment1`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `Course_ID` (`Course_ID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `students1`
--
ALTER TABLE `students1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `user_enrolled`
--
ALTER TABLE `user_enrolled`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coursedetails1`
--
ALTER TABLE `coursedetails1`
  MODIFY `Course_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enrollment1`
--
ALTER TABLE `enrollment1`
  MODIFY `e_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students1`
--
ALTER TABLE `students1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_enrolled`
--
ALTER TABLE `user_enrolled`
  MODIFY `e_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `coursedetails1` (`Course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollment1`
--
ALTER TABLE `enrollment1`
  ADD CONSTRAINT `enrollment1_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `coursedetails1` (`Course_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment1_ibfk_2` FOREIGN KEY (`id`) REFERENCES `students1` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_enrolled`
--
ALTER TABLE `user_enrolled`
  ADD CONSTRAINT `user_enrolled_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_enrolled_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `coursedetails1` (`Course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
