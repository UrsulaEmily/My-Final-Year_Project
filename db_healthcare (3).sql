-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 12:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `icDoctor` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `doctorId` int(3) NOT NULL,
  `doctorFirstName` varchar(50) NOT NULL,
  `doctorLastName` varchar(50) NOT NULL,
  `doctorAddress` varchar(100) NOT NULL,
  `doctorPhone` varchar(15) NOT NULL,
  `doctorEmail` varchar(20) NOT NULL,
  `doctorDOB` date NOT NULL,
  `speciality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`icDoctor`, `password`, `doctorId`, `doctorFirstName`, `doctorLastName`, `doctorAddress`, `doctorPhone`, `doctorEmail`, `doctorDOB`, `speciality`) VALUES
(123456789, '123', 123, 'Doctor', 'Sehgal', 'kuala lumpur', '0173567758', 'dsehgal@gmail.com', '1990-04-10', 'Dialysis');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `icPatient` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `patientFirstName` varchar(20) NOT NULL,
  `patientLastName` varchar(20) NOT NULL,
  `patientMaritialStatus` varchar(10) NOT NULL,
  `patientDOB` date NOT NULL,
  `patientGender` varchar(10) NOT NULL,
  `patientAddress` varchar(100) NOT NULL,
  `patientPhone` varchar(15) NOT NULL,
  `patientEmail` varchar(100) NOT NULL,
  `inout` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`icPatient`, `password`, `patientFirstName`, `patientLastName`, `patientMaritialStatus`, `patientDOB`, `patientGender`, `patientAddress`, `patientPhone`, `patientEmail`, `inout`) VALUES
(1, '1', 'Elina', 'kolidede', '', '1997-08-12', 'female', '', '', 'm@m.m', ''),
(3, '4', 'Elina', 'kolidede', '', '1992-09-12', 'female', '', '', 'harry@gmail.com', ''),
(22, '22', 'Clin', 'Mwamidi', '', '1998-12-18', 'male', '', '', 'm@m.m', ''),
(34, '34', 'fsf', 'fs', '', '2000-10-19', 'female', '', '', 'fsdf@fdas.fsd', ''),
(2323, 'new', 'Elina', 'kolidede', '', '1999-09-15', 'male', '', '', 'harry@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `patienttreatment`
--

CREATE TABLE `patienttreatment` (
  `id` int(11) NOT NULL,
  `icPatient` bigint(12) NOT NULL,
  `symptoms` text NOT NULL,
  `test` text NOT NULL,
  `suggestion` text NOT NULL,
  `treatment` text NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `checkout` int(1) NOT NULL DEFAULT '0',
  `datein` datetime NOT NULL,
  `dateout` datetime NOT NULL,
  `ward` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patienttreatment`
--

INSERT INTO `patienttreatment` (`id`, `icPatient`, `symptoms`, `test`, `suggestion`, `treatment`, `doctor`, `checkout`, `datein`, `dateout`, `ward`) VALUES
(17, 1, 'qweqw\r\neqeqw', 'eqewe', 'eqe', 'eqweq', 'Said', 0, '2003-09-23 11:21:06', '2023-09-03 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `icPatient` bigint(12) NOT NULL,
  `symptoms` text NOT NULL,
  `test` text NOT NULL,
  `suggestion` text NOT NULL,
  `treatment` text NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `checkout` int(1) NOT NULL DEFAULT '0',
  `datein` datetime NOT NULL,
  `dateout` datetime NOT NULL,
  `ward` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `icPatient`, `symptoms`, `test`, `suggestion`, `treatment`, `doctor`, `checkout`, `datein`, `dateout`, `ward`) VALUES
(17, 1, 'qweqw\r\neqeqw', 'eqewe', 'eqe', 'eqweq', 'Said', 1, '2003-09-23 11:21:06', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `wardno` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `speciality` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`wardno`, `name`, `speciality`) VALUES
(1, 'ml2', 'dialysis'),
(2, 'Children', 'Dr. Imran'),
(3, 'Male', 'Dr. Seyid'),
(4, 'Female', 'Dr. Catherine');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`icDoctor`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`icPatient`);

--
-- Indexes for table `patienttreatment`
--
ALTER TABLE `patienttreatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patienttreatment`
--
ALTER TABLE `patienttreatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
