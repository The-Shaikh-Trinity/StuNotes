-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Host: 127.0.0.1

-- Generation Time: Sep 17, 2022 at 03:53 PM

-- Server version: 10.4.24-MariaDB

-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `published`

--

-- --------------------------------------------------------

--

-- Table structure for table `cat`

--

CREATE TABLE
    `cat` (
        `id` int(4) NOT NULL,
        `cat_name` varchar(30) NOT NULL,
        `cat_desc` text NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `cat`

--

INSERT INTO
    `cat` (`id`, `cat_name`, `cat_desc`)
VALUES (
        1,
        'Computer Science/IT',
        'Various resources related to Computer Science and Information technology field.'
    ), (
        2,
        'Mechanical Engineering',
        'Various resources related to Mechanical Engineering field, organized and well maintained.'
    );

-- --------------------------------------------------------

--

-- Table structure for table `doc`

--

CREATE TABLE
    `doc` (
        `id` int(11) NOT NULL,
        `sub-id` int(11) NOT NULL,
        `doc-name` varchar(50) NOT NULL,
        `doc-desc` text NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `sem`

--

CREATE TABLE
    `sem` (
        `id` int(11) NOT NULL,
        `cat-id` int(11) NOT NULL,
        `sem-num` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `sub`

--

CREATE TABLE
    `sub` (
        `id` int(11) NOT NULL,
        `sem-id` int(11) NOT NULL,
        `sub-name` int(100) NOT NULL,
        `sub-code` varchar(10) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Indexes for dumped tables

--

--

-- Indexes for table `cat`

--

ALTER TABLE `cat` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `doc`

--

ALTER TABLE `doc`
ADD PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `sub-id` (`sub-id`);

--

-- Indexes for table `sem`

--

ALTER TABLE `sem`
ADD
    PRIMARY KEY (`id`),
    --
    -- Indexes for table `sub`
    --
ALTER TABLE `sub`
ADD PRIMARY KEY (`id`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `cat`

--

ALTER TABLE
    `cat` MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--

-- AUTO_INCREMENT for table `doc`

--

ALTER TABLE `doc` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `sem`

--

ALTER TABLE `sem` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `sub`

--

ALTER TABLE `sub` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `doc`

--

ALTER TABLE `doc`
ADD
    CONSTRAINT `doc_ibfk_1` FOREIGN KEY (`sub-id`) REFERENCES `sub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--

-- Constraints for table `sem`

--

ALTER TABLE `sem`
ADD
    CONSTRAINT `sem_ibfk_1` FOREIGN KEY (`cat-id`) REFERENCES `cat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--

-- Constraints for table `sub`

--

ALTER TABLE `sub`
ADD
    CONSTRAINT `sub_ibfk_1` FOREIGN KEY (`sem-id`) REFERENCES `sem` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;