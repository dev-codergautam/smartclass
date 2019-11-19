-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 06:47 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `name` varchar(520) NOT NULL,
  `email` varchar(420) NOT NULL,
  `image` varchar(110) NOT NULL,
  `password` varchar(630) NOT NULL,
  `adminColor` varchar(110) NOT NULL,
  `adminFont` varchar(110) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `name`, `email`, `image`, `password`, `adminColor`, `adminFont`, `doc`) VALUES
(1, 'Gautam Kumar', 'gautam', '', '123', '0', '0', '2019-08-28 20:39:42'),
(2, 'JIIT', 'jiit@smartclass', '', 'Satya@97095', '', '', '2019-09-28 04:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(11) NOT NULL,
  `courseName` varchar(200) NOT NULL,
  `courseCode` varchar(200) NOT NULL,
  `courseDuration` varchar(200) NOT NULL,
  `courseDescription` varchar(200) NOT NULL,
  `courseSlug` varchar(520) NOT NULL,
  `courseDate` varchar(200) NOT NULL,
  `courseTime` varchar(200) NOT NULL,
  `courseDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lession`
--

CREATE TABLE `lession` (
  `lessionId` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `lessionName` varchar(200) NOT NULL,
  `subjectName` varchar(200) NOT NULL,
  `topicName` varchar(200) NOT NULL,
  `lessionDate` varchar(200) NOT NULL,
  `lessionTime` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationId` int(11) NOT NULL,
  `notificationTitle` varchar(200) NOT NULL,
  `notificationURL` varchar(520) NOT NULL,
  `notificationDate` varchar(200) NOT NULL,
  `notificationTime` varchar(200) NOT NULL,
  `notificationSlug` varchar(520) NOT NULL,
  `notificationDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `orgId` int(11) NOT NULL,
  `orgName` varchar(200) NOT NULL,
  `orgAadhar` varchar(200) NOT NULL,
  `orgPan` varchar(200) NOT NULL,
  `orgRegNo` varchar(520) NOT NULL,
  `orgCname` varchar(200) NOT NULL,
  `orgEmail` varchar(200) NOT NULL,
  `orgContact` varchar(200) NOT NULL,
  `orgSlug` varchar(200) NOT NULL,
  `orgDate` varchar(200) NOT NULL,
  `orgTime` varchar(200) NOT NULL,
  `orgdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orgPassword` varchar(200) NOT NULL,
  `orgImage` varchar(620) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`orgId`, `orgName`, `orgAadhar`, `orgPan`, `orgRegNo`, `orgCname`, `orgEmail`, `orgContact`, `orgSlug`, `orgDate`, `orgTime`, `orgdatetime`, `orgPassword`, `orgImage`) VALUES
(1, 'Demo', '', '', '', '', 'demo@sc.com', '', '', '', '', '2019-09-28 13:46:20', 'scdemo', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subId` int(11) NOT NULL,
  `subName` varchar(200) NOT NULL,
  `subSlug` varchar(200) NOT NULL,
  `subParent` varchar(200) NOT NULL,
  `subDate` varchar(200) NOT NULL,
  `subTime` varchar(200) NOT NULL,
  `subDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subId`, `subName`, `subSlug`, `subParent`, `subDate`, `subTime`, `subDateTime`) VALUES
(1, 'ms excel', 'ms-excel', '0', '28-09-2019', '07:10:15', '2019-09-28 13:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `syllabusId` int(11) NOT NULL,
  `syCourseName` int(11) NOT NULL,
  `sySubjectName` varchar(200) NOT NULL,
  `syDate` varchar(200) NOT NULL,
  `syTime` varchar(200) NOT NULL,
  `syDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topicId` int(11) NOT NULL,
  `topicName` varchar(200) NOT NULL,
  `topicSubject` varchar(200) NOT NULL,
  `topicLession` varchar(200) NOT NULL,
  `topicVideo` varchar(520) NOT NULL,
  `topicVideoPath` varchar(520) NOT NULL,
  `topicVideoType` varchar(520) NOT NULL,
  `topicSlug` varchar(200) NOT NULL,
  `topicDate` varchar(200) NOT NULL,
  `topicTime` varchar(200) NOT NULL,
  `topicdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `lession`
--
ALTER TABLE `lession`
  ADD PRIMARY KEY (`lessionId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationId`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`orgId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subId`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`syllabusId`),
  ADD KEY `syCourseName` (`syCourseName`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topicId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lession`
--
ALTER TABLE `lession`
  MODIFY `lessionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `orgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syllabusId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topicId` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
