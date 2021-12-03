-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2021 at 01:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_na_ilalapat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'Admin', '$2y$10$o8i1TLHAnLgthbvlDeOY8.EmPtKodlvXfB.7watODtlJm5ZZvuWba', 'Gov.', 'Admin', 'citylogo.jpg', '2021-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` varchar(255) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `employee_id`, `firstname`, `lastname`, `username`, `password`, `userlevel`, `question1`, `answer1`, `question2`, `answer2`, `email`, `status`, `photo`, `date_created`) VALUES
(1, 'DCU257084916', 'demo', 'meow', 'admin', '$2y$10$pUND/RQrPERVqWgbhnLYeOqY9P.D.sADkK6WRRg07rPGBQFslg70u', 'Department Head', 'What is your mothers maiden name?', 'Miming', 'Where did you meet your spouse?', 'Edsa', 'demo@meow.com', 'active', 'citylogo.jpg', '2021-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `break_time_out` time NOT NULL,
  `status` int(1) NOT NULL,
  `break_time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `employee_id`, `date`, `time_in`, `break_time_out`, `status`, `break_time_in`, `time_out`, `num_hr`) VALUES
(87, 'DYE473869250', '2021-05-08', '01:40:51', '00:00:00', 1, '00:00:00', '00:00:00', 0),
(90, 'DYE473869250', '2021-10-07', '06:45:00', '22:30:00', 0, '00:30:00', '00:30:00', 15.266666666667);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `departs_id` varchar(15) NOT NULL,
  `departments` varchar(50) NOT NULL,
  `shortname` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `departs_id`, `departments`, `shortname`, `status`) VALUES
(4, 'CAO3', 'CITY AGRICULTURE OFFICE', 'CAO', 'Active'),
(5, 'CAO4', 'CITY ASSESSORS OFFICE', 'ASSESSORS', 'Active'),
(6, 'BPALO1', 'BUSINESS PERMIT AND LICENSING  OFFICE', 'BPLO', 'Active'),
(7, 'CBO1', 'CITY BUDGET OFFICE', 'BUDGET', 'Active'),
(8, 'CCR1', 'CITY CIVIL REGISTRY', 'CCR', 'Active'),
(9, 'CCOT1', 'CITY COLLEGE OF TAGAYTAY', 'CCT', 'Active'),
(10, 'CEANRO1', 'CITY ENVIRONMENT AND NATURAL RESOURCES OFFICE', 'CENRO', 'Active'),
(11, 'CEO1', 'CITY ENGINEERING OFFICE', 'CEO', 'Active'),
(12, 'CCO1', 'CITY CHARACTER OFFICE', 'CHARACTER', 'Active'),
(13, 'CHO1', 'CITY HEALTH OFFICE', 'CHO', 'Active'),
(14, 'COE1', 'COMMISSION ON ELECTION', 'COMELEC', 'Active'),
(15, 'CO1', 'COOPERATIVE OFFICE', 'COOP', 'Active'),
(16, 'CPADO1', 'CITY PLANNING AND DEVELOPMENT OFFICE', 'CPDO', 'Active'),
(17, 'CSO1', 'CIVIL SECURITY OFFICE', 'CSU', 'Active'),
(18, 'CSWADO1', 'CITY SOCIAL WELFARE AND DEVELOPMENT OFFICE', 'CSWDO', 'Active'),
(19, 'CTO1', 'CITY TREASURY OFFICE', 'CTO', 'Active'),
(20, 'DOE1', 'DOE', '', 'Active'),
(21, 'ECM1', 'EEO/ CITY MARKET', '', 'Active'),
(22, 'FPTMNHS1', 'FPTMNHS', '', 'Active'),
(23, 'GSO1', 'GENERAL SERVICE OFFICE', 'GSO', 'Active'),
(24, 'HRMO1', 'HUMAN RESOURCE MANAGEMENT OFFICE', 'HRMO', 'Active'),
(25, 'ICT1', 'INTEGRATED CENTRAL TERMINAL', 'TERMINAL', 'Active'),
(26, 'ABC123456789', 'INTERNAL', '', 'Active'),
(27, 'ABC123456789', 'LOCAL CIVIL REGISTRY', 'LCR', 'Active'),
(28, 'ABC123456789', 'CITY LEGAL OFFICE', 'LEGAL', 'Active'),
(29, 'ABC123456789', 'LIBRARY', '', 'Active'),
(30, 'ABC123456789', 'MAHOGANY MARKET', '', 'Active'),
(31, 'ABC123456789', 'MAYOR\'S OFFICE', 'MO', 'Active'),
(32, 'ABC123456789', 'NUTRITION OFFICE', 'NUTRITION', 'Active'),
(33, 'ABC123456789', 'OSPITAL NG TAGAYTAY', 'ONT', 'Active'),
(34, 'ABC123456789', 'PDAO', '', 'Active'),
(35, 'ABC123456789', 'PICNIC GROVE', '', 'Active'),
(36, 'ABC123456789', 'PUBLIC INFORMATION OFFICE', 'PIO', 'Active'),
(37, 'ABC123456789', 'SANGGUNIANG PANGLUNSOD', 'SP', 'Active'),
(38, 'ABC123456789', 'TCCH/TICC', '', 'Active'),
(39, 'ABC123456789', 'THRDC', '', 'Active'),
(40, 'ABC123456789', 'TIPID IMPOK', '', 'Active'),
(41, 'ABC123456789', 'TOPS (ADMIN CSU)', '', 'Active'),
(42, 'ABC123456789', 'VICE MAYOR\'S OFFICE', 'VMO', 'Active'),
(43, '', 'ADMIN', 'ADS', 'Active'),
(44, '', 'DEMO1', 'Demo', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `extensionName` varchar(255) NOT NULL DEFAULT 'N/A',
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civil_status` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `Estatus` varchar(255) NOT NULL DEFAULT 'Active',
  `employmentDate` date NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `departs_id` int(11) NOT NULL,
  `day_offs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `employee_id`, `firstname`, `lastname`, `middlename`, `extensionName`, `contact_info`, `gender`, `civil_status`, `birthdate`, `address`, `Estatus`, `employmentDate`, `position_id`, `schedule_id`, `departs_id`, `day_offs`) VALUES
(2, 'DYE473869250', 'Jane', 'Suarez', 'Uwu', 'N/A', '09046455674', 'Female', 'Single', '1992-05-02', '3rd Floor GG Bldg Japan', 'Active', '2020-05-02', 5, 2, 16, 'N/A'),
(5, 'DCU257084916', 'john', 'doee', 'Ya', 'N/A', '09876543211', 'Male', 'Single', '2021-10-20', 'Japan ', 'Active', '2020-05-02', 11, 2, 4, 'Sat,Sun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `salary_grade` varchar(150) NOT NULL,
  `step_increment` varchar(150) NOT NULL,
  `monthly_salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `description`, `salary_grade`, `step_increment`, `monthly_salary`) VALUES
(4, 'Administrative Aide III (Clerk I)', '(3-1)', 'Step 1', 11432),
(5, 'Administrative Aide III (Clerk I)', '(3-1)', 'Step 2', 12893),
(6, 'Administrative Aide III (Clerk I)', '(3-1)', 'Step 3', 12993),
(7, 'Administrative Aide III (Driver I)', '(3-1)', 'Step 1', 12893),
(8, 'Administrative Aide III (Driver I)', '(3-1)', 'Step 2', 12993),
(9, 'Administrative Aide III (Utility Worker II)', '(3-1)', 'Step 1', 12893),
(10, 'Administrative Aide III (Utility Worker II)', '(3-1)', 'Step 2', 12993),
(11, 'Administrative Aide IV (Clerk II)', '(1-1)', 'Step 1', 13680),
(12, 'Administrative Aide IV (Driver II)', '(1-1)', 'Step 1', 13680),
(13, 'Administrative Aide VI (Clerk III)', '(1-1)', 'Step 1', 15390),
(14, 'Administrative Assistant I (bookbinder III)', '(1-1)', 'Step 1', 16320),
(15, 'Administrative Assistant II (Administrative Assistant)', '(1-1)', 'Step 1', 17338),
(16, 'Administrative Assistant II (Data Controller II)', '(1-1)', 'Step 1', 17338),
(17, 'Administrative Assistant V (Data Controller III)', '(1-1)', 'Step 1', 22683),
(18, 'Administrative Officer I', '(1-1)', 'Step 1', 22683),
(19, 'HUMAN RESOURCE MANAGEMENT OFFICER', '(1-1)', 'Step 1', 100145),
(20, 'Administrative Officer II (Administrative Officer I)', '(1-1)', 'Step 1', 22683),
(21, 'Administrative Officer IV (Management and Audit Analyst II)', '(1-1)', 'Step 1', 31896),
(22, 'Administrative Officer V (Public Relation Officer III)', '(1-1)', 'Step 1', 41497),
(23, 'Attorney III', '(1-1)', 'Step 1', 57856),
(24, 'Attorney V', '(1-1)', 'Step 1', 93942),
(25, 'City Mayor II', '(1-1)', 'Step 1', 173081),
(26, 'City Public Information Officer', '(1-1)', 'Step 1', 93942),
(27, 'City Social Welfare & Development Officer I', '(1-1)', 'Step 1', 93942),
(28, 'City Vice Mayor II', '(1-1)', 'Step 1', 118893),
(29, 'Civil Defense Assistant', '(1-1)', 'Step 1', 17338),
(30, 'Community Affairs Assistant II', '(1-1)', 'Step 1', 17496),
(31, 'Community Affairs Officer I', '(1-1)', 'Step 1', 22683),
(32, 'Computer Programmer', '(1-1)', 'Step 1', 31896),
(33, 'Executive Assistant I', '(1-1)', 'Step 1', 29259),
(34, 'Executive Assistant II (B)', '(1-1)', 'Step 1', 37987),
(35, 'Executive Assistant II (B) ', '(1-1)', 'Step 1', 37987),
(36, 'Executive Assistant III', '(1-1)', 'Step 1', 51538),
(37, 'Executive Assistant IV', '(1-1)', 'Step 1', 64994),
(38, 'Executive Assistant to the Vice Mayor', '(1-1)', 'Step 1', 29259),
(39, 'CITY ACCOUNTANT I', '(1-1)', 'Step 1', 82405),
(40, 'Housing and Homesite Regulation Assistant', '(1-1)', 'Step 1', 17338),
(41, 'Housing and Homesite Regulation Officer IV', '(1-1)', 'Step 1', 45897),
(42, 'Licensing Officer II', '(1-1)', 'Step 1', 31896),
(43, 'Licensing Officer III', '(1-1)', 'Step 1', 41497),
(44, 'Local Disaster Risk Reduction and Management Asst.', '(1-1)', 'Step 1', 17338),
(45, 'Local Disaster Risk Reduction and Management Officer I', '(1-1)', 'Step 1', 22683),
(46, 'Local Disaster Risk Reduction and Management Officer IV', '(1-1)', 'Step 1', 64994),
(47, 'Local Disaster Risk Reduction Mgt. Officer V', '(1-1)', 'Step 1', 82405),
(48, 'Local Legislative Staff Asst. II', '(1-1)', 'Step 1', 17338),
(49, 'Market Inspector II', '(1-1)', 'Step 1', 17338),
(50, 'Market Supervisor I', '(1-1)', 'Step 1', 20313),
(51, 'Market Supervisor II', '(1-1)', 'Step 1', 29259),
(52, 'Market Supervisor III', '(1-1)', 'Step 1', 41497),
(53, 'Meat Inspector II', '(1-1)', 'Step 1', 17338),
(54, 'Parking Aide I', '(1-1)', 'Step 1', 12151),
(55, 'Parking Aide II', '(1-1)', 'Step 1', 13680),
(56, 'Parking Aide III', '(1-1)', 'Step 1', 15390),
(57, 'Parking Aide IV', '(1-1)', 'Step 1', 16320),
(58, 'Private Secretary I', '(1-1)', 'Step 1', 22683),
(59, 'Private Secretary II', '(1-1)', 'Step 1', 31896),
(60, 'Security  Agent II', '(1-1)', 'Step 1', 20145),
(61, 'Security Guard I', '(1-1)', 'Step 1', 12893),
(62, 'Security Guard I', '(1-1)', 'Step 1', 12993),
(63, 'Security Guard II', '(1-1)', 'Step 1', 14511),
(64, 'Security Guard III', '(1-1)', 'Step 1', 17338),
(65, 'Social Welfare Aide', '(1-1)', 'Step 1', 13680),
(66, 'Social Welfare Aide ', '(1-1)', 'Step 1', 13891),
(67, 'Social Welfare Assistant ', '(1-1)', 'Step 1', 17338),
(68, 'Social Welfare Officer I', '(1-1)', 'Step 1', 22953),
(69, 'Social Welfare Officer II', '(1-1)', 'Step 1', 32255),
(70, 'Social Welfare Officer III', '(1-1)', 'Step 1', 41497),
(71, 'Social Welfare Officer IV', '(1-1)', 'Step 1', 64994),
(72, 'CITY ADMINISTRATOR', '(1-1)', 'Step 1', 120123),
(73, 'Traffic Aide I', '(1-1)', 'Step 1', 11432),
(75, 'Traffic Aide II', '(1-1)', 'Step 1', 14511),
(76, 'Traffic Aide III', '(1-1)', 'Step 1', 16320),
(78, 'Administrative Aide I (Utility Worker I)', '19000', 'Step 1', 19000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `id` int(11) NOT NULL,
  `inclusive_time_from` time NOT NULL,
  `inclusive_time_to` time NOT NULL,
  `schedule_type` varchar(150) NOT NULL,
  `day_off` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id`, `inclusive_time_from`, `inclusive_time_to`, `schedule_type`, `day_off`) VALUES
(2, '08:00:00', '17:00:00', 'Normal Work Time', 'N/A'),
(5, '22:45:00', '22:45:00', 'Fixed Schedule', 'Sat,Sun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
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
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
