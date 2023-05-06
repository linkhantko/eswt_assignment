-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 02:15 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazine_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `photo` text CHARACTER SET utf8mb4 NOT NULL,
  `uploadDate` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Description` text CHARACTER SET utf8mb4 NOT NULL,
  `article` text CHARACTER SET utf8mb4 NOT NULL,
  `faculties_id` int(11) NOT NULL,
  `student_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `photo`, `uploadDate`, `Description`, `article`, `faculties_id`, `student_name`, `student_id`) VALUES
(1, 'General Paints', 'images/icons8-news-48 (1).png', '02-November-2020', '-', 'articles/Proposal from COMP1682_Sample3 201819.pdf', 1, 'Phyo Han', 1),
(2, 'Max Plus', 'images/icons8-news-48.png', '02-November-2020', '', 'articles/Proposal from COMP1682_Sample3 201819.pdf', 2, 'Phyo Han', 1),
(3, 'Good-1', 'images/icons8-mac-logo-100.png', '02-November-2020', '-', 'articles/Proposal from COMP1682_Sample3 201819.pdf', 3, 'Phyo Han', 1),
(4, 'SCBI', 'images/icons8-refuse-48.png', '02-November-2020', '-', 'articles/Proposal from COMP1682_Sample3 201819.pdf', 3, 'Phyo Han', 1),
(5, 'SCBI 2', 'images/Best-Wallpapers-Ever-044.jpg', '02-November-2020', '-', 'articles/Proposal from COMP1682_Sample3 201819.pdf', 3, 'Phyo Han', 1),
(6, 'Professional Web Developer', 'images/PicsArt_10-22-06.19.57_Snapseed.jpg', '02-November-2020', 'This is about Our Project Proposal', 'articles/Undergraduate Final Year Project Proposal.pdf', 1, 'Phyo Han', 1),
(7, 'RockStar Developa', 'images/img_2.jpg', '02-November-2020', 'Heex', 'articles/Undergraduate Final Year Project Proposal.pdf', 1, 'Phyo Han', 1),
(8, 'YOOX', 'images/chat-img2.jpg', '03-November-2020', '', 'articles/BOBO_00180693_CP (1).pdf', 2, 'Phyo Han', 1),
(9, 'Information Technology', 'images/122336017_359670585259326_2474132869426396220_n.jpg', '03-November-2020', '', 'articles/Undergraduate Final Year Project Proposal.pdf', 1, 'LKKO1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `coordinator_id`, `article_id`, `comment`) VALUES
(1, 4, 1, 'Well Done!'),
(2, 4, 1, 'Noob'),
(3, 6, 1, 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `faculties_id` int(11) NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `roleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`id`, `name`, `gender`, `email`, `phone`, `address`, `photo`, `faculties_id`, `rolename`, `roleid`) VALUES
(5, 'Lin Khant Ko', 'Male', 'allghost.lf@gmail.com', '09798165400', 'YGN', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg', 2, 'Marketing Coordinator', 3),
(6, 'Khin Nilar Kyaw', 'Male', 'khinnilarkyaw08@gmail.com', '09791996201', 'YGN+HTD', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg', 1, 'Marketing Coordinator', 3);

-- --------------------------------------------------------

--
-- Table structure for table `deadlines`
--

CREATE TABLE `deadlines` (
  `id` int(11) NOT NULL,
  `first_date` varchar(255) NOT NULL,
  `final_date` varchar(255) NOT NULL,
  `academicyear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deadlines`
--

INSERT INTO `deadlines` (`id`, `first_date`, `final_date`, `academicyear`) VALUES
(1, '02-November-2020', '05-November-2020', 2020),
(2, '04-November-2020', '11-November-2020', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty`, `created_at`) VALUES
(1, 'IT', '2020-11-02 16:07:30'),
(2, 'Art', '2020-11-02 16:07:36'),
(3, 'Medical Technology', '2020-11-02 16:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `magazines`
--

CREATE TABLE `magazines` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `academicyear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `magazines`
--

INSERT INTO `magazines` (`id`, `article_id`, `academicyear`) VALUES
(1, 1, 2020),
(2, 6, 2020),
(3, 7, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `rolename` varchar(255) NOT NULL DEFAULT 'Marketing Manager',
  `roleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `email`, `phone`, `address`, `gender`, `photo`, `rolename`, `roleid`) VALUES
(2, 'Lin Khant Ko', 'linkhantko1@gmail.com', '09798165400', 'YGN+HTD', 'Male', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg', 'Marketing Manager', 2),
(3, 'Phyo Pyae Sone Han', 'phyohan1234@gmail.com', '09798165401', 'YGN', 'Male', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg', 'Marketing Manager', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`) VALUES
(1, 'Student'),
(2, 'Marketing Manager'),
(3, 'Marketing Coordinator'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `roleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `gender`, `email`, `password`, `phone`, `address`, `dob`, `photo`, `status`, `rolename`, `roleid`) VALUES
(1, 'Phyo Han', 'Male', 'student@gmail.com', 'student', '09798165400', 'YGN', '2020-11-19', 'images/icons8-mac-logo-64.png', 'Active', 'Student', 1),
(2, 'Lin Khant Ko', 'Male', 'admin@gmail.com', '772020', '09798165400', 'HTD', '2020-11-17', 'images/Proposal from COMP1682_Sample3 201819.pdf', 'Active', 'Student', 1),
(3, 'Lin Khant Ko', 'Male', 'linkhantko1@gmail.com', '123', '09798165400', 'HTD', '2020-11-20', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg', 'Active', 'Student', 1),
(4, 'Khin Nilar Kyaw', 'Female', 'khinnilarkyaw08@gmail.com', '123', '09791996201', 'YGN', '2020-11-12', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg', 'Active', 'Student', 1),
(5, 'LKKO', 'Male', 'lkko@gmail.com', '123', '09798165400', 'HTD', '2020-11-05', 'images/122336017_359670585259326_2474132869426396220_n.jpg', 'Active', 'Student', 1),
(6, 'LKKO1', 'Male', 'lkko1@gmail.com', '123', '09798165400', 'HTD', '2020-11-05', 'images/122336017_359670585259326_2474132869426396220_n.jpg', 'Active', 'Student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `rolename`, `phone`, `gender`, `address`, `photo`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 4, 'Admin', '09798165400', 'Male', 'YGN+HTD', 'images/game.gif'),
(2, 'Lin Khant Ko', 'linkhantko1@gmail.com', '123', 2, 'Marketing Manager', '09798165400', 'Male', 'YGN+HTD', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg'),
(3, 'Phyo Pyae Sone Han', 'phyohan1234@gmail.com', '123', 2, 'Marketing Manager', '09798165401', 'Male', 'YGN', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg'),
(5, 'Lin Khant Ko', 'allghost.lf@gmail.com', '123', 3, 'Marketing Coordinator', '09798165400', 'Male', 'YGN', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg'),
(6, 'Khin Nilar Kyaw', 'khinnilarkyaw08@gmail.com', '123', 3, 'Marketing Coordinator', '09791996201', 'Male', 'YGN+HTD', 'images/ebc677aaa0e2f9c5f2dcb4b893637b66.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_users` (`student_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_comments` (`article_id`);

--
-- Indexes for table `deadlines`
--
ALTER TABLE `deadlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `magazines`
--
ALTER TABLE `magazines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magazines_articles` (`article_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deadlines`
--
ALTER TABLE `deadlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `magazines`
--
ALTER TABLE `magazines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_users` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `articles_comments` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `magazines`
--
ALTER TABLE `magazines`
  ADD CONSTRAINT `magazines_articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
