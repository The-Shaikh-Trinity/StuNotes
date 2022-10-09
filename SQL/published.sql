-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 02:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `published`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(4) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cat_name`, `cat_desc`) VALUES
(1, 'mechanical Engineering2', 'What Is Mechatronics Engineering? Definition and Examples Mechatronics is a type of engineering that focuses on a combination of mechanical, computer and electrical systems. Mechatronics engineers specialize in both electrical engineering and mechanics and can work in a variety of jobs across multiple disciplines.'),
(3, 'Mechatronics ', 'What Is Mechatronics Engineering? Definition and Examples Mechatronics is a type of engineering that focuses on a combination of mechanical, computer and electrical systems. Mechatronics engineers specialize in both electrical engineering and mechanics and can work in a variety of jobs across multiple disciplines.'),
(115, 'information Science Engineerin', 'about software'),
(116, 'civil engineering ', 'construction'),
(117, 'Electronic Engineering ', 'about  the transformer');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `id` int(11) NOT NULL,
  `sub-id` int(11) NOT NULL,
  `doc-name` varchar(50) NOT NULL,
  `doc-desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`id`, `sub-id`, `doc-name`, `doc-desc`) VALUES
(11, 3, 'FS program 1 to 4 .pdf', 'fs program');

-- --------------------------------------------------------

--
-- Table structure for table `sem`
--

CREATE TABLE `sem` (
  `id` int(11) NOT NULL,
  `sem-num` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`id`, `sem-num`, `cat_id`) VALUES
(89, 8, 115),
(90, 7, 116),
(91, 4, 3),
(92, 3, 117);

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `id` int(11) NOT NULL,
  `sem-id` int(11) NOT NULL,
  `sub-name` varchar(100) NOT NULL,
  `sub-code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`id`, `sem-id`, `sub-name`, `sub-code`) VALUES
(3, 89, 'computer network', '18cs41'),
(4, 90, 'Automata Theory', '18cs43'),
(6, 91, 'python', '18cs44'),
(7, 92, 'supplychainmanagement', '18cs61');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `cat` ADD FULLTEXT KEY `cat_name` (`cat_name`,`cat_desc`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub-id` (`sub-id`);
ALTER TABLE `doc` ADD FULLTEXT KEY `doc-name` (`doc-name`);

--
-- Indexes for table `sem`
--
ALTER TABLE `sem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sem-id` (`sem-id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sem`
--
ALTER TABLE `sem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doc`
--
ALTER TABLE `doc`
  ADD CONSTRAINT `doc_ibfk_1` FOREIGN KEY (`sub-id`) REFERENCES `sub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sem`
--
ALTER TABLE `sem`
  ADD CONSTRAINT `test` FOREIGN KEY (`cat_id`) REFERENCES `cat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub`
--
ALTER TABLE `sub`
  ADD CONSTRAINT `sub_ibfk_1` FOREIGN KEY (`sem-id`) REFERENCES `sem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
