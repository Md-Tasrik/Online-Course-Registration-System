-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2023 at 11:41 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinecourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2022-01-31 16:21:18', '2022-01-31 16:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int NOT NULL,
  `courseCode` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `courseUnit` varchar(255) DEFAULT NULL,
  `noofSeats` int DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCode`, `courseName`, `courseUnit`, `noofSeats`, `creationDate`, `updationDate`) VALUES
(1, 'WEB01', 'Web Development', '5', 10, '2022-02-10 17:23:28', NULL),
(2, 'C001', 'C++', '12', 25, '2022-02-11 00:52:46', '11-02-2022 06:23:06 AM'),
(3, 'CSE3001', 'Python', '5', 15, '2023-12-12 09:27:10', NULL),
(4, 'CSE013', 'Java Essentials', '8', 15, '2023-12-12 09:29:14', NULL),
(5, 'ECE004', 'Micro-Controllers', '7', 15, '2023-12-12 09:29:14', NULL),
(6, 'CSE05', 'Software Engineering', '7', 15, '2023-12-12 09:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `session` int DEFAULT NULL,
  `department` int DEFAULT NULL,
  `level` int DEFAULT NULL,
  `semester` int DEFAULT NULL,
  `course` int DEFAULT NULL,
  `enrollDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseenrolls`
--

INSERT INTO `courseenrolls` (`id`, `studentRegno`, `pincode`, `session`, `department`, `level`, `semester`, `course`, `enrollDate`) VALUES
(3, '10806121', '822894', 3, 1, 1, 1, 1, '2023-12-12 09:26:16'),
(4, '10806121', '390022', 3, 1, 2, 4, 4, '2023-12-12 09:58:00'),
(5, '10806121', '390022', 3, 1, 1, 4, 6, '2023-12-12 10:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `creationDate`) VALUES
(1, 'Computer Science', '2022-02-10 17:23:04'),
(2, 'Mechanical', '2022-02-10 17:23:09'),
(4, 'Electrical', '2023-12-12 09:17:19'),
(5, 'Chemical', '2023-12-12 09:17:57'),
(6, 'Civil', '2023-12-12 09:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `creationDate`) VALUES
(1, 'Beginner', '2022-02-11 00:59:02'),
(2, 'Intermediate', '2022-02-11 00:59:02'),
(3, 'Advanced', '2022-02-11 00:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `newstitle` varchar(255) DEFAULT NULL,
  `newsDescription` mediumtext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newstitle`, `newsDescription`, `postingDate`) VALUES
(4, 'Announcement for CSE Students', 'Registration window for course CSE001 closes today at 11:59 p.m.', '2023-12-12 09:50:58'),
(5, 'Extra Credit Registration', 'Registration for extra credits started, 15 seats available for course \"Java Essentials\"', '2023-12-12 09:52:05'),
(6, 'New Course Alert', 'Registrations open for CSE05', '2023-12-12 10:00:59'),
(7, 'Welcome to Bharat University', 'Welcome', '2023-12-12 10:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `creationDate`, `updationDate`) VALUES
(1, 'Fall Semester', '2022-02-10 17:22:49', NULL),
(2, 'Summer Semester', '2022-02-10 17:22:55', NULL),
(3, 'Winter Semester', '2022-02-11 00:51:43', NULL),
(4, 'Interim Semester', '2023-12-12 09:25:18', NULL),
(5, 'Winter-Inter Semester', '2023-12-12 09:59:19', NULL),
(6, 'Summer - Inter Semester', '2023-12-12 10:19:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `creationDate`) VALUES
(3, '2023', '2023-12-12 09:15:21'),
(4, '2024', '2023-12-12 09:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentRegno` varchar(255) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `studentName` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `cgpa` decimal(10,2) DEFAULT NULL,
  `creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentRegno`, `studentPhoto`, `password`, `studentName`, `pincode`, `session`, `department`, `semester`, `cgpa`, `creationdate`, `updationDate`) VALUES
('10806121', '21BCE11108_Photo.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'Bhavya Lalchandani', '390022', NULL, NULL, NULL, 8.91, '2022-02-11 00:53:31', '12-12-2023 03:02:59 PM');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `studentRegno`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, '10806121', 0x3a3a3100000000000000000000000000, '2022-02-11 00:55:07', NULL, 1),
(2, '10806121', 0x3a3a3100000000000000000000000000, '2022-02-11 00:57:00', NULL, 1),
(3, '10806121', 0x3a3a3100000000000000000000000000, '2022-02-11 00:57:22', '11-02-2022 06:31:26 AM', 1),
(4, '10806121', 0x3a3a3100000000000000000000000000, '2023-12-12 08:54:57', '12-12-2023 02:26:07 PM', 1),
(5, '10806121', 0x3a3a3100000000000000000000000000, '2023-12-12 08:56:11', '12-12-2023 02:38:20 PM', 1),
(6, '10806121', 0x3a3a3100000000000000000000000000, '2023-12-12 09:09:24', '12-12-2023 03:03:11 PM', 1),
(7, '10806121', 0x3a3a3100000000000000000000000000, '2023-12-12 09:33:16', '12-12-2023 03:13:28 PM', 1),
(8, '10806121', 0x3a3a3100000000000000000000000000, '2023-12-12 09:45:34', '12-12-2023 03:16:26 PM', 1),
(9, '10806121', 0x3a3a3100000000000000000000000000, '2023-12-12 09:57:25', '12-12-2023 03:28:40 PM', 1),
(10, '10806121', 0x3a3a3100000000000000000000000000, '2023-12-12 10:16:28', '12-12-2023 03:47:54 PM', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentRegno`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
