-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 02, 2019 at 08:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hngi_miniclassroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacherId` int(11) NOT NULL COMMENT 'this is the teacher id',
  `description` text,
  `students` varchar(255) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`cid`, `name`, `teacherId`, `description`, `students`, `date_added`) VALUES
(1, 'First Class', 1, 'This is the first class to be created.', NULL, '2019-09-26 09:36:54'),
(2, 'Second Class', 1, 'This is the second class to be created.', NULL, '2019-09-26 09:39:30'),
(3, 'Third Class', 1, 'This is the third class to be created.', NULL, '2019-09-26 10:13:01'),
(4, 'First Real Class', 1, 'This class was created via the form', NULL, '2019-09-27 15:58:15'),
(5, 'First Real Class', 1, 'This class was created via the form', NULL, '2019-09-27 15:58:33'),
(6, 'Second Real Class', 1, 'Class created via form', NULL, '2019-09-27 16:04:16'),
(7, 'Sunday Class', 1, 'This will be a class for people that can make it to lectures during the week.                                                    \r\n                                                ', NULL, '2019-09-29 11:20:14'),
(8, 'Latest Class', 1, 'Class for the newest things in town.                                                    \r\n                                                ', NULL, '2019-09-29 13:26:16'),
(9, 'Sunday 2 Class', 1, 'A class to be held on Sundays                                                    \r\n                                                ', NULL, '2019-09-29 13:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `iid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `classId` int(11) DEFAULT NULL,
  `teacherId` int(11) DEFAULT NULL,
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`iid`, `name`, `description`, `classId`, `teacherId`, `date_added`) VALUES
(1, 'First Item', 'This is the first class to be created.', 1, 1, '2019-09-26 10:14:35'),
(2, 'Second Item', 'This is the second item to be created.', 2, 1, '2019-09-26 10:15:28'),
(3, 'Item for Second Real Class', 'item description for second real class', 6, 1, '2019-09-27 16:41:12'),
(4, 'Sunday Item', 'This item was created on Sunday                                                    \r\n                                                ', 2, 1, '2019-09-29 11:44:21'),
(5, 'Exciting Item', '   An item for this special class.                                                 \r\n                                                ', 1, 1, '2019-09-29 13:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `classes` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `name`, `email`, `password`, `classes`) VALUES
(1, 'Student One', 'student@school.com', 'password', NULL),
(2, 'Student Two', 'student2@school.com', 'password', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `scid` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `cid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`scid`, `sid`, `cid`) VALUES
(1, '1', '1'),
(4, '1', '4'),
(3, '1', '2'),
(5, '2', '2'),
(6, '2', '8');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tid`, `name`, `email`, `password`) VALUES
(1, 'Teacher One', 'teacher1@hotmail.com', 'password'),
(3, 'Teacher Two', 'teacher2@email.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `creator` (`teacherId`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`scid`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `scid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
