-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 05:09 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'irene', 'jebiwotirene@gmail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` text NOT NULL,
  `activate` int(11) NOT NULL DEFAULT '1',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`id`, `username`, `email`, `department`, `activate`, `password`) VALUES
(1, 'lilian', 'lilian@gmail.com', 'ICT\r\n', 0, '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 'sammy', 'sammy@gmail.com', 'Library', 1, 'a37231fd2822e95f8879b69386164f41');

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `school` text NOT NULL,
  `regno` varchar(25) NOT NULL,
  `start` date NOT NULL,
  `hadi` date NOT NULL,
  `gender` text NOT NULL,
  `assign` int(11) NOT NULL DEFAULT '0',
  `password` text NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`id`, `username`, `email`, `school`, `regno`, `start`, `hadi`, `gender`, `assign`, `password`, `trn_date`) VALUES
(1, 'naomi', 'naomi@gmail.com', 'Moi University', 'sP17/24555/17', '2020-11-24', '2021-03-18', 'female', 0, '3ded9fcee467201116fb2718b389b2a8', '2020-11-22 21:13:46'),
(11, 'jessica', 'jessica@gmail.com', 'East African University', 'sP17/24555/17', '2020-11-26', '2021-02-26', 'female', 0, '5ee7745831554b6732ea7e8181dd7c87', '2020-11-25 11:25:13'),
(12, 'george', 'george@gmail.com', 'Egerton University', 'CS17212554513', '2020-11-26', '2021-03-19', 'male', 0, '5f4dcc3b5aa765d61d8327deb882cf99', '2021-01-19 07:25:42'),
(13, 'shiko', 'shiko@gmail.com', 'JKUAT University', 'SP1812227489', '2021-01-21', '2021-03-12', 'female', 0, 'c1c7000226e8c7a107fcc51a6198ae3f', '2021-01-15 12:09:50'),
(14, 'george', 'george@gmail.com', 'Egerton University', 'CS17212554513', '2020-11-26', '2021-03-19', 'male', 0, '5f4dcc3b5aa765d61d8327deb882cf99', '2021-01-19 07:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `school` text NOT NULL,
  `regno` varchar(25) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `gender` text NOT NULL,
  `password` text NOT NULL,
  `message` text NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `username`, `email`, `school`, `regno`, `start`, `end`, `gender`, `password`, `message`, `trn_date`) VALUES
(3, 'gerald', 'gerald@gmail.com', 'East African University', 'SP1812227489', '2021-01-22', '2021-04-09', 'male', 'c1c7000226e8c7a107fcc51a6198ae3f', 'gerald would like to request an account.', '2021-01-15 12:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `username`, `email`, `school`, `gender`, `password`) VALUES
(1, 'mercy', 'mery@gmail.com', 'East African University', 'female', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'vivin', 'vivin@gmail.com', 'Laikipia University', 'female', 'c1c7000226e8c7a107fcc51a6198ae3f'),
(6, 'viinvc', 'viinvc@gmail.com', 'Maseno University', 'male', 'c1c7000226e8c7a107fcc51a6198ae3f'),
(7, 'samantha', 'samantha@gmail.com', 'JKUAT University', 'female', 'c1c7000226e8c7a107fcc51a6198ae3f'),
(8, 'john', 'john@gmail.com', 'East African University', 'male', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `regno` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(50) NOT NULL,
  `task` varchar(255) NOT NULL,
  `sub_date` date NOT NULL,
  `report` varchar(255) NOT NULL,
  `remark` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `regno`, `email`, `school`, `task`, `sub_date`, `report`, `remark`) VALUES
(5, 'CS17212554513', 'george@gmail.com', 'Egerton University', 'lick your monitor', '2020-12-04', 'No report yet', 'No remarks given'),
(6, 'sP17/24555/17', 'naomi@gmail.com', 'Nairobi University', 'Touch your friends laptop', '2020-12-09', 'upload/Product Description.docx', 'powerful powerful magic well done'),
(7, 'sP17/24555/17', 'jessica@gmail.com', 'East African University', 'love your motherboard', '2020-12-25', 'No report yet', 'No remarks given'),
(8, 'CS17212554513', 'george@gmail.com', 'Egerton University', 'Install driver', '2020-12-14', 'No report yet', 'No remarks given'),
(9, 'sP17/24555/17', 'naomi@gmail.com', 'Moi University', 'Reboot WindowXP by Hiren CD', '2021-01-22', 'No report yet', 'No remarks given'),
(12, 'SP1812227489', 'shiko@gmail.com', 'JKUAT University', 'Repair Modern Printer in Room 3', '2021-01-22', 'No report yet', 'No remarks given'),
(13, 'sP17/24555/17', 'jessica@gmail.com', 'East African University', 'copy files from harddrive C to drive E', '2021-01-22', 'No report yet', 'No remarks given'),
(18, 'sP17/24555/17', 'naomi@gmail.com', 'Moi University', 'Format Desktop Drive F in Room8', '2021-01-22', 'No report yet', 'No remarks given'),
(19, 'CS17212554513', 'george@gmail.com', 'Egerton University', 'Install Linux in Registrar Office Room 4', '2021-01-22', 'No report yet', 'No remarks given');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `host`
--
ALTER TABLE `host`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
