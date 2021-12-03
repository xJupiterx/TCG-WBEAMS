-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 02:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_attendance`
--

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
(90, 'DYE473869250', '2021-10-07', '06:45:00', '22:30:00', 0, '00:30:00', '00:30:00', 15.266666666667),
(116, 'DYE473869250', '2021-05-08', '01:40:51', '00:00:00', 1, '00:00:00', '00:00:00', 0),
(117, 'DYE473869250', '2021-10-07', '06:45:00', '22:30:00', 0, '00:30:00', '00:30:00', 15.266666666667),
(118, 'DYE473869250', '2021-05-08', '01:40:51', '00:00:00', 1, '00:00:00', '00:00:00', 0),
(119, 'DYE473869250', '2021-10-07', '06:45:00', '22:30:00', 0, '00:30:00', '00:30:00', 15.266666666667),
(120, 'DYE473869250', '2021-05-08', '01:40:51', '00:00:00', 1, '00:00:00', '00:00:00', 0),
(121, 'DYE473869250', '2021-10-07', '06:45:00', '22:30:00', 0, '00:30:00', '00:30:00', 15.266666666667),
(122, 'DYE473869250', '2021-05-08', '01:40:51', '00:00:00', 1, '00:00:00', '00:00:00', 0),
(123, 'DYE473869250', '2021-10-07', '06:45:00', '22:30:00', 0, '00:30:00', '00:30:00', 15.266666666667);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
