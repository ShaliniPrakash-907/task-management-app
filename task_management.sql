-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2026 at 01:38 PM
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
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `priority` enum('Low','Medium','High') DEFAULT 'Medium',
  `status` enum('Pending','In Progress','Completed') DEFAULT 'Pending',
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `priority`, `status`, `due_date`, `created_at`) VALUES
(3, 1, 'Complete DSA Sheet', 'Solve 10 array and string problems from LeetCode.', 'High', 'Completed', '2026-06-08', '2026-06-06 10:43:39'),
(4, 1, 'Prepare Nokia Interview Notes', 'Revise Networking, DBMS and OS concepts.', 'High', 'Completed', '2026-06-07', '2026-06-06 10:43:39'),
(5, 1, 'Update Resume', 'Add Future Intern project and latest skills.', 'Medium', 'Completed', '2026-06-05', '2026-06-06 10:43:39'),
(7, 1, 'Practice SQL Queries', 'Complete joins, subqueries and aggregate function problems.', 'Medium', 'In Progress', '2026-06-10', '2026-06-06 10:43:39'),
(8, 1, 'LinkedIn Profile Update', 'Add internship experience and recent project screenshots.', 'Low', 'Completed', '2026-06-04', '2026-06-06 10:43:39'),
(9, 1, 'Complete Power BI Dashboard', 'Finalize charts, KPIs and formatting for submission.', 'High', 'Completed', '2026-06-03', '2026-06-06 10:43:39'),
(10, 1, 'Review OOP Concepts', 'Revise inheritance, polymorphism and abstraction.', 'Medium', 'Pending', '2026-06-11', '2026-06-06 10:43:39'),
(11, 1, 'Apply for Internship Roles', 'Apply to software development internship openings.', 'Low', 'Pending', '2026-06-12', '2026-06-06 10:43:39'),
(12, 1, 'Prepare Project Presentation', 'Create slides and project demo walkthrough.', 'Medium', 'In Progress', '2026-06-13', '2026-06-06 10:43:39'),
(13, 1, 'task manager', 'to make a full stack project', 'High', 'Completed', '2026-06-06', '2026-06-06 10:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Shalini Prakash', 'hsvp2007@gmail.com', '$2y$10$LaV7l/2bHBCHU9MaOTc6Gevdi4bcls.6v4eBupUduIBDSEKuA4cM2', '2026-06-06 09:28:40'),
(2, 'hsvp', 'hema200@gmail.com', '$2y$10$8azmial3sKk6yTJGZkkVdOKJ/AnvxCww0zboS7UbD1BvmUnFIkHPO', '2026-06-06 09:41:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
