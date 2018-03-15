-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 02:46 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skill2`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_fname` varchar(255) NOT NULL,
  `student_mname` varchar(255) DEFAULT NULL,
  `student_lname` varchar(255) NOT NULL,
  `student_age` varchar(255) NOT NULL,
  `student_gender` varchar(255) NOT NULL,
  `student_bdate` date NOT NULL,
  `student_year` smallint(6) NOT NULL,
  `student_course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_fname`, `student_mname`, `student_lname`, `student_age`, `student_gender`, `student_bdate`, `student_year`, `student_course`) VALUES
(2, 'Desiree', '', 'Omapoy', '20', 'Female', '1998-09-21', 4, 'BIST'),
(3, 'Mickale', 'Lapasanda', 'Saturre', '19', 'Male', '1998-05-17', 4, 'BIST');

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `ss_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`ss_id`, `student_id`, `subject_id`, `status`) VALUES
(1, 2, 8, 'Enrolled'),
(2, 2, 9, 'Enrolled'),
(3, 3, 8, 'Enrolled'),
(4, 2, 10, 'Enrolled'),
(5, 2, 11, 'Enrolled'),
(6, 3, 10, 'Enrolled'),
(7, 3, 12, 'Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_details` varchar(255) NOT NULL,
  `subject_stime` time NOT NULL,
  `subject_etime` time NOT NULL,
  `subject_date` varchar(255) NOT NULL,
  `subject_status` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_details`, `subject_stime`, `subject_etime`, `subject_date`, `subject_status`, `teacher_id`) VALUES
(10, 'ITElectPHP2', 'PHP2', '18:30:00', '20:30:00', 'MWF', 'Open', 4),
(11, 'WebDev21', 'Web Development', '13:30:00', '15:00:00', 'TTH', 'Open', 4),
(12, 'ITElectEmSys', 'Embedded System', '08:30:00', '11:30:00', 'MWF', 'Open', 5),
(13, 'English 2', 'English Literature', '10:30:00', '12:00:00', 'TTH', 'Open', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_fname` varchar(255) NOT NULL,
  `teacher_mname` varchar(255) DEFAULT NULL,
  `teacher_lname` varchar(255) NOT NULL,
  `teacher_phone` varchar(255) NOT NULL,
  `teacher_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_fname`, `teacher_mname`, `teacher_lname`, `teacher_phone`, `teacher_address`) VALUES
(2, 'Dalisay', 'Lapasanda', 'Saturre', '09398345025', 'Saint Bernard Southern Leyte'),
(4, 'Gian Carlo', 'Margaja', 'Cataraja', '123456', 'Cebu City'),
(5, 'Dennis ', '', 'Durano', '65441222', 'Cebu City');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
