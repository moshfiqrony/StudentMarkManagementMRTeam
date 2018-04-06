-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 06:17 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbstudentgrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseinfo`
--

CREATE TABLE `courseinfo` (
  `id` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creditHour` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseinfo`
--

INSERT INTO `courseinfo` (`id`, `name`, `creditHour`) VALUES
('CSC433', 'Database', 3),
('CSC247', 'Computer Architecture And Organization', 3),
('CSC434', 'Database Lab', 3),
('CSC283', 'Programing C++', 3),
('CSC284', 'Programing C++ Lab', 3),
('CSC391', 'Data Structure And Algoritham', 3),
('MAT247', 'MAT247', 3),
('ENG250', 'Public Speaking', 3),
('ENG203', 'Basic English Composition', 3),
('MAT102', 'MAT102', 2),
('MAT103', 'MAT103', 3);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `st_id` varchar(11) NOT NULL,
  `crs_id` varchar(11) NOT NULL,
  `frstTerm` int(11) NOT NULL,
  `midTerm` int(11) NOT NULL,
  `attn` int(11) NOT NULL,
  `assign` int(11) NOT NULL,
  `prjct` int(11) NOT NULL,
  `final_marks` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `grade` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `st_id`, `crs_id`, `frstTerm`, `midTerm`, `attn`, `assign`, `prjct`, `final_marks`, `total_marks`, `grade`) VALUES
(43, '15203040', 'CSC197', 10, 0, 0, 0, 0, 0, 10, ''),
(44, '15203016', 'CSC197', 0, 0, 0, 0, 0, 35, 35, ''),
(45, '15203029', 'CSC197', 20, 20, 5, 5, 5, 35, 90, ''),
(42, '15203060', 'CSC433', 0, 20, 0, 0, 0, 0, 20, ''),
(41, '15203012', 'CSC284', 0, 20, 5, 5, 5, 0, 35, ''),
(40, '15203012', 'CSC197', 10, 10, 5, 0, 0, 30, 55, ''),
(47, '16203014', 'CSC433', 0, 0, 0, 0, 0, 35, 35, ''),
(53, '16202020', 'CSC434', 0, 25, 5, 5, 0, 35, 70, ''),
(50, '15203037', 'CSC284', 0, 20, 0, 0, 5, 0, 25, ''),
(52, '16103012', 'CSC197', 10, 0, 0, 0, 0, 0, 10, ''),
(54, '15203012', 'ENG250', 15, 10, 0, 0, 0, 0, 25, '');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `email`) VALUES
(15203012, 'Md. Moshfiqur Rahman', '15203012@iubat.edu'),
(15203060, 'Samia Rahman', '15203060@iubat.edu'),
(15203040, 'Nahiduzzaman Badhon', '15203040@iubat.edu'),
(15203029, 'Md. Shamim Sarker', '15203029@iubat.edu'),
(15203037, 'Dill Afroz Mitu', '15203037@iubat.edu'),
(15203038, 'Akhi Moni', '15203038@gmail.com'),
(16103012, 'Masudur Rahman', '16103012@iubat.edu'),
(15203015, 'Nazmun Nahar Tamanna', '15203016@iubat.edu'),
(16203014, 'Raiyaan Rahman', '16203014@iubat.edu'),
(16202020, 'Arifa', '16202020@gmail.com'),
(10, '10', '20');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `user_name`, `user_pass`) VALUES
(3, 'mrid', '1234mrid'),
(4, 'mosfiq1234', '12345mrid'),
(8, 'moshfiqrony', '22667722mrid'),
(9, 'hadi2016', '123456mrid'),
(10, 'shamim', '4545mrid'),
(11, 'Mim', 'mim123mrid'),
(12, 'masud', '292415mrid'),
(13, 'monibd', 'moni12mrid'),
(14, 'mas', '852mrid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseinfo`
--
ALTER TABLE `courseinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_pass` (`user_pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
