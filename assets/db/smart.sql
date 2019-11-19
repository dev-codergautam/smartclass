-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 06:44 PM
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
(1, 'Gautam Kumar', 'gautam', '', '123', '0', '0', '2019-08-28 20:39:42');

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

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseName`, `courseCode`, `courseDuration`, `courseDescription`, `courseSlug`, `courseDate`, `courseTime`, `courseDateTime`) VALUES
(2, 'ADCA', '001', '5', 'kitna bar check karen', '', '17-09-2019', '10:13:42', '2019-09-17 04:43:42'),
(4, 'wq', '002', '5', 'eew', 'wq', '18-09-2019', '11:42:31', '2019-09-18 06:12:31'),
(5, 'something', '003', '2', 'lkewL', 'something', '18-09-2019', '12:54:08', '2019-09-18 07:24:08');

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

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationId`, `notificationTitle`, `notificationURL`, `notificationDate`, `notificationTime`, `notificationSlug`, `notificationDateTime`) VALUES
(3, 'iohGS jbs S ', '', '18-09-2019', '11:03:29', 'iohgs-jbs-s', '2019-09-18 05:33:29'),
(4, 'second notification', '', '18-09-2019', '11:05:39', 'second-notification', '2019-09-18 05:35:40'),
(5, 'Webjagriti', 'https://www.webjagriti.com', '18-09-2019', '03:41:17', 'webjagriti', '2019-09-18 10:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `orgId` int(11) NOT NULL,
  `orgName` varchar(200) NOT NULL,
  `orgAadhar` varchar(200) NOT NULL,
  `orgPan` varchar(200) NOT NULL,
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

INSERT INTO `organisation` (`orgId`, `orgName`, `orgAadhar`, `orgPan`, `orgCname`, `orgEmail`, `orgContact`, `orgSlug`, `orgDate`, `orgTime`, `orgdatetime`, `orgPassword`, `orgImage`) VALUES
(1, 'Gautam Kumar', '638416162307', 'EYUPK0649R', 'SGM Digital Infotech', 'gautammpurnia@gmail.com', '9110937613', 'sgm-digital-infotech', '', '', '2019-09-12 16:54:14', 'gautam@123', ''),
(2, 'kbkbv', '555525485515', 'ibib', 'ghihgiw', 'g@g.com', '7358237560', 'ghihgiw', '17-09-2019', '08:08:15', '2019-09-17 14:38:15', '', '');

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
(2, 'MS - Excel', 'ms-excel', '0', '10-09-2019', '01:32:42', '2019-09-09 20:02:42'),
(3, 'MS - Word', 'ms-word', '0', '18-09-2019', '12:53:13', '2019-09-18 07:23:13'),
(5, 'View Menu', 'view-menu', '2', '10-09-2019', '12:58:45', '2019-09-09 19:28:45'),
(6, 'Font', 'font', '2', '10-09-2019', '01:48:39', '2019-09-09 20:18:39'),
(7, 'Edit Menu', 'edit-menu', '3', '10-09-2019', '12:59:12', '2019-09-09 19:29:12'),
(8, 'View Menu', 'view-menu', '3', '10-09-2019', '12:59:22', '2019-09-09 19:29:22'),
(9, 'Notepad', 'notepad', '0', '10-09-2019', '12:59:32', '2019-09-09 19:29:32'),
(10, 'Edit Menu', 'edit-menu', '9', '10-09-2019', '12:59:43', '2019-09-09 19:29:43'),
(11, 'Fonts', 'fonts', '9', '10-09-2019', '12:59:51', '2019-09-09 19:29:51'),
(12, 'Wrap', 'wrap', '9', '10-09-2019', '01:00:01', '2019-09-09 19:30:01'),
(13, 'Edit Menu', 'edit-menu', '2', '10-09-2019', '01:47:31', '2019-09-09 20:17:31'),
(14, 'Insert Menu', 'insert-menu', '2', '10-09-2019', '01:49:34', '2019-09-09 20:19:34'),
(15, 'Page Layout', 'page-layout', '2', '10-09-2019', '01:50:57', '2019-09-09 20:20:57'),
(16, 'Print Menu', 'print-menu', '2', '10-09-2019', '01:51:08', '2019-09-09 20:21:08'),
(17, 'Formula', 'formula', '2', '10-09-2019', '01:53:01', '2019-09-09 20:23:01'),
(18, 'Data', 'data', '2', '10-09-2019', '01:53:10', '2019-09-09 20:23:10'),
(19, 'Review', 'review', '2', '10-09-2019', '01:53:17', '2019-09-09 20:23:17'),
(20, 'File Menu', 'file-menu', '2', '10-09-2019', '01:53:54', '2019-09-09 20:23:54'),
(21, 'Formate', 'formate', '2', '10-09-2019', '01:54:35', '2019-09-09 20:24:35'),
(22, 'testing', 'testing', '3', '11-09-2019', '07:05:41', '2019-09-11 01:35:41'),
(23, 'Powerpoint', 'powerpoint', '0', '11-09-2019', '09:14:18', '2019-09-11 03:44:18'),
(24, 'introduction', 'introduction', '23', '11-09-2019', '09:14:58', '2019-09-11 03:44:58'),
(25, 'Lession 1: Introduction', 'lession-1-introduction', '2', '11-09-2019', '09:26:10', '2019-09-11 03:56:10'),
(26, 'kuchh bhi', '', '0', '', '', '2019-09-17 02:02:27'),
(27, 'Lession 1', 'lession-1', '26', '17-09-2019', '07:47:24', '2019-09-17 02:17:24'),
(28, 'Lession 2', 'lession-2', '26', '17-09-2019', '09:05:35', '2019-09-17 03:35:35');

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

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syllabusId`, `syCourseName`, `sySubjectName`, `syDate`, `syTime`, `syDateTime`) VALUES
(1, 2, '2', '18-09-2019', '11:49:07', '2019-09-18 06:19:07'),
(3, 4, '3', '18-09-2019', '12:19:03', '2019-09-18 06:49:03'),
(4, 5, '23', '18-09-2019', '12:55:18', '2019-09-18 07:25:18');

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
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topicId`, `topicName`, `topicSubject`, `topicLession`, `topicVideo`, `topicVideoPath`, `topicVideoType`, `topicSlug`, `topicDate`, `topicTime`, `topicdatetime`) VALUES
(1, 'How to Start Excel', '2', '25', '1_Codeigniter_Mini_Project_Tutorial_in_Hindi_Urdu_(Installation)___Project_Introdu.mp4', './assets/topicvideo', 'video/mp4', 'how-to-start-excel', '17-09-2019', '10:10:16', '2019-09-17 16:40:52'),
(2, 'testing for progress bar', '3', '7', '2_Codeigniter_Mini_Project_Tutorial_in_Hindi_Urdu_(Create_Database)___Tables_.mp4', './assets/topicvideo', 'video/mp4', 'testing-for-progress-bar', '18-09-2019', '09:30:00', '2019-09-18 04:46:43'),
(3, '3rd video', '2', '5', '3_Codeigniter_Mini_Project_Tutorial_in_Hindi_Urdu_(Base_Controller)___Core_Classes.mp4', './assets/topicvideo', 'video/mp4', '3rd-video', '18-09-2019', '10:24:50', '2019-09-18 04:55:03'),
(4, '4th video', '2', '5', '4_Codeigniter_mini_Project_Tutorial_in_Hindi_Urdu_(_Removing_Index_php_).mp4', './assets/topicvideo', 'video/mp4', '4th-video', '18-09-2019', '10:26:16', '2019-09-18 04:56:43'),
(5, 'djhsfj', '2', '6', '', '', '', 'djhsfj', '19-09-2019', '09:57:32', '2019-09-19 04:27:32'),
(6, 'jf', '2', '5', '14_CodeIgniter_Mini_Project_Tutorial_(_Fet`ching___Listing_Articles_in_AdminPanel_)_.mp4', './assets/topicvideo', 'video/mp4', 'jf', '19-09-2019', '10:35:32', '2019-09-19 06:45:30'),
(7, 'test', '2', '5', '1.mp4', './assets/topicvideo', 'video/mp4', 'test', '19-09-2019', '12:15:55', '2019-09-19 06:47:12');

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
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lession`
--
ALTER TABLE `lession`
  MODIFY `lessionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `orgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syllabusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topicId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
