-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 03:02 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `cl_balance` float DEFAULT '0',
  `ood_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `branch`, `cl_balance`, `ood_count`) VALUES
(1, 'CSE_Employee_1', 'CSE', 1.5, 1),
(2, 'CSE_Employee_2', 'CSE', 1, 0),
(3, 'CSE_Employee_3', 'CSE', 1, 0),
(4, 'CSE_Employee_4', 'CSE', 1, 0),
(5, 'CSE_Employee_5', 'CSE', 1, 0),
(6, 'CSE_Employee_6', 'CSE', 1, 0),
(7, 'CSE_Employee_7', 'CSE', 0, 0),
(8, 'CSE_Employee_8', 'CSE', 1, 0),
(9, 'CSE_Employee_9', 'CSE', 1, 0),
(10, 'CSE_Employee_10', 'CSE', 1, 0),
(11, 'CSM_Employee_1', 'CSM', 1, 0),
(12, 'CSM_Employee_2', 'CSM', 1, 0),
(13, 'CSM_Employee_3', 'CSM', 1, 0),
(14, 'CSM_Employee_4', 'CSM', 1, 0),
(15, 'CSM_Employee_5', 'CSM', 1, 0),
(16, 'CSM_Employee_6', 'CSM', 1, 0),
(17, 'CSM_Employee_7', 'CSM', 1, 0),
(18, 'CSM_Employee_8', 'CSM', 1, 0),
(19, 'CSM_Employee_9', 'CSM', 1, 0),
(20, 'CSM_Employee_10', 'CSM', 1, 0),
(21, 'HNBS_Employee_1', 'HNBS', 1, 0),
(22, 'HNBS_Employee_2', 'HNBS', 1, 0),
(23, 'HNBS_Employee_3', 'HNBS', 1, 0),
(24, 'HNBS_Employee_4', 'HNBS', 1, 0),
(25, 'HNBS_Employee_5', 'HNBS', 1, 0),
(26, 'HNBS_Employee_6', 'HNBS', 1, 0),
(27, 'HNBS_Employee_7', 'HNBS', 1, 0),
(28, 'HNBS_Employee_8', 'HNBS', 1, 0),
(29, 'HNBS_Employee_9', 'HNBS', 1, 0),
(30, 'HNBS_Employee_10', 'HNBS', 1, 0),
(31, 'ECE_Employee_1', 'ECE', 1, 0),
(32, 'ECE_Employee_2', 'ECE', 1, 0),
(33, 'ECE_Employee_3', 'ECE', 1, 0),
(34, 'ECE_Employee_4', 'ECE', 1, 0),
(35, 'ECE_Employee_5', 'ECE', 1, 0),
(36, 'ECE_Employee_6', 'ECE', 1, 0),
(37, 'ECE_Employee_7', 'ECE', 1, 0),
(38, 'ECE_Employee_8', 'ECE', 1, 0),
(39, 'ECE_Employee_9', 'ECE', 1, 0),
(40, 'ECE_Employee_10', 'ECE', 1, 0),
(41, 'EEE_Employee_1', 'EEE', 1, 0),
(42, 'EEE_Employee_2', 'EEE', 1, 0),
(43, 'EEE_Employee_3', 'EEE', 1, 0),
(44, 'EEE_Employee_4', 'EEE', 1, 0),
(45, 'EEE_Employee_5', 'EEE', 1, 0),
(46, 'EEE_Employee_6', 'EEE', 1, 0),
(47, 'EEE_Employee_7', 'EEE', 1, 0),
(48, 'EEE_Employee_8', 'EEE', 1, 0),
(49, 'EEE_Employee_9', 'EEE', 1, 0),
(50, 'EEE_Employee_10', 'EEE', 1, 0),
(51, 'MECH_Employee_1', 'MECH', 1, 0),
(52, 'MECH_Employee_2', 'MECH', 1, 0),
(53, 'MECH_Employee_3', 'MECH', 1, 0),
(54, 'MECH_Employee_4', 'MECH', 1, 0),
(55, 'MECH_Employee_5', 'MECH', 1, 0),
(56, 'MECH_Employee_6', 'MECH', 1, 0),
(57, 'MECH_Employee_7', 'MECH', 1, 0),
(58, 'MECH_Employee_8', 'MECH', 1, 0),
(59, 'MECH_Employee_9', 'MECH', 1, 0),
(60, 'MECH_Employee_10', 'MECH', 1, 0),
(61, 'TECH_Employee_1', 'TECHNICAL', 1, 0),
(62, 'TECH_Employee_2', 'TECHNICAL', 1, 0),
(63, 'TECH_Employee_3', 'TECHNICAL', 1, 0),
(64, 'TECH_Employee_4', 'TECHNICAL', 1, 0),
(65, 'TECH_Employee_5', 'TECHNICAL', 1, 0),
(66, 'TECH_Employee_6', 'TECHNICAL', 1, 0),
(67, 'TECH_Employee_7', 'TECHNICAL', 1, 0),
(68, 'TECH_Employee_8', 'TECHNICAL', 1, 0),
(69, 'TECH_Employee_9', 'TECHNICAL', 1, 0),
(70, 'TECH_Employee_10', 'TECHNICAL', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `sno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `am_attendance` enum('P','CL','OD','OOD','AB') DEFAULT NULL,
  `pm_attendance` enum('P','CL','OD','OOD','AB') DEFAULT NULL,
  `reason` text,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`sno`, `date`, `name`, `branch`, `am_attendance`, `pm_attendance`, `reason`, `updated`) VALUES
(21, '2024-08-25', 'CSE_Employee_1', 'CSE', 'P', 'P', '', '2024-08-25 18:07:47'),
(22, '2024-08-25', 'CSE_Employee_2', 'CSE', 'P', 'P', '', '2024-08-25 18:07:47'),
(23, '2024-08-25', 'CSE_Employee_3', 'CSE', 'P', 'P', '', '2024-08-25 18:07:47'),
(24, '2024-08-25', 'CSE_Employee_4', 'CSE', 'P', 'P', '', '2024-08-25 18:07:47'),
(25, '2024-08-25', 'CSE_Employee_5', 'CSE', 'P', 'P', '', '2024-08-25 18:07:48'),
(26, '2024-08-25', 'CSE_Employee_6', 'CSE', 'P', 'P', '', '2024-08-25 18:07:48'),
(27, '2024-08-25', 'CSE_Employee_7', 'CSE', 'P', 'P', '', '2024-08-25 18:07:48'),
(28, '2024-08-25', 'CSE_Employee_8', 'CSE', 'P', 'P', '', '2024-08-25 18:07:48'),
(29, '2024-08-25', 'CSE_Employee_9', 'CSE', 'P', 'P', '', '2024-08-25 18:07:48'),
(30, '2024-08-25', 'CSE_Employee_10', 'CSE', 'P', 'P', '', '2024-08-25 18:07:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
