-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 07:19 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `PASSWORD` (IN `emp` INT(10), IN `passwrd` VARCHAR(15))  NO SQL
BEGIN
	UPDATE admin SET pass= passwrd WHERE empid=emp;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `empid` int(10) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`empid`, `pass`) VALUES
(55022, '1111');

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

CREATE TABLE `command` (
  `cid` int(10) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `region` varchar(30) NOT NULL,
  `commanderid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`cid`, `cname`, `region`, `commanderid`) VALUES
(102, 'Eastern Air Command', 'Kolkata', 55022),
(103, 'Central Air Command', 'Allahabad', 55022),
(104, 'Southern Air Command', 'Trivandrum', 55022);

-- --------------------------------------------------------

--
-- Table structure for table `dependant`
--

CREATE TABLE `dependant` (
  `name` varchar(30) NOT NULL,
  `age` int(5) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `empid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dependant`
--

INSERT INTO `dependant` (`name`, `age`, `relation`, `empid`) VALUES
('XYZ', 10, 'Son', 2005);

-- --------------------------------------------------------

--
-- Table structure for table `jet`
--

CREATE TABLE `jet` (
  `jetid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `weight` int(5) NOT NULL,
  `mspeed` int(5) NOT NULL,
  `empid` int(10) NOT NULL,
  `sid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jet`
--

INSERT INTO `jet` (`jetid`, `name`, `weight`, `mspeed`, `empid`, `sid`) VALUES
(17, 'MI-V5', 5200, 310, 55022, 309),
(25, 'JAGUAR', 6500, 1350, 55022, 304),
(27, 'MiG', 6500, 1700, 55022, 303);

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `empid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `rank` varchar(20) NOT NULL,
  `salary` int(10) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `superid` int(10) DEFAULT NULL,
  `sid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`empid`, `name`, `age`, `rank`, `salary`, `contact`, `superid`, `sid`) VALUES
(2005, 'ABC', 20, 'General ', 30000, 7895463210, 55022, 308),
(55022, 'Arjan Singh', 49, 'Marshal', 250000, 9635988663, 55022, 306);

-- --------------------------------------------------------

--
-- Table structure for table `offusrpass`
--

CREATE TABLE `offusrpass` (
  `empid` int(10) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offusrpass`
--

INSERT INTO `offusrpass` (`empid`, `pass`) VALUES
(2005, 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `sid` int(10) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `cid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`sid`, `sname`, `area`, `cid`) VALUES
(301, 'VOYK', 'Bangalore', 101),
(302, 'VOSX', 'Coimbatore', 104),
(303, 'VABJ', 'Gujrat', 101),
(304, 'VIAR', 'Amritsar', 101),
(305, 'VOHK', 'Hyderabad', 105),
(306, 'VIGR', 'Gwalior', 103),
(307, 'VIBL', 'Lucknow', 103),
(308, 'VECC', 'Calcutta', 101),
(309, 'VEGT', 'Guwahati', 102),
(310, 'VICX', 'Kanpur', 101),
(311, 'PQR', 'XYZ', 102);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `empid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`empid`, `name`, `age`, `contact`, `pass`) VALUES
(5000, 'Abhishek', 25, 8754965478, 'Akash0000'),
(6000, 'XYZ', 20, 4578965478, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `empid` (`empid`);

--
-- Indexes for table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `command_ibfk_1` (`commanderid`);

--
-- Indexes for table `dependant`
--
ALTER TABLE `dependant`
  ADD KEY `dependant_ibfk_1` (`empid`);

--
-- Indexes for table `jet`
--
ALTER TABLE `jet`
  ADD PRIMARY KEY (`jetid`),
  ADD KEY `jet_ibfk_1` (`empid`),
  ADD KEY `jet_ibfk_2` (`sid`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`empid`),
  ADD KEY `officer_ibfk_1` (`superid`),
  ADD KEY `officer_ibfk_2` (`sid`);

--
-- Indexes for table `offusrpass`
--
ALTER TABLE `offusrpass`
  ADD PRIMARY KEY (`empid`,`pass`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `station_ibfk_1` (`cid`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`empid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `officer` (`empid`);

--
-- Constraints for table `command`
--
ALTER TABLE `command`
  ADD CONSTRAINT `command_ibfk_1` FOREIGN KEY (`commanderid`) REFERENCES `officer` (`empid`) ON DELETE CASCADE;

--
-- Constraints for table `dependant`
--
ALTER TABLE `dependant`
  ADD CONSTRAINT `dependant_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `officer` (`empid`) ON DELETE CASCADE;

--
-- Constraints for table `jet`
--
ALTER TABLE `jet`
  ADD CONSTRAINT `jet_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `officer` (`empid`) ON DELETE CASCADE,
  ADD CONSTRAINT `jet_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `station` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `officer`
--
ALTER TABLE `officer`
  ADD CONSTRAINT `officer_ibfk_1` FOREIGN KEY (`superid`) REFERENCES `officer` (`empid`) ON DELETE CASCADE,
  ADD CONSTRAINT `officer_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `station` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `offusrpass`
--
ALTER TABLE `offusrpass`
  ADD CONSTRAINT `offusrpass_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `officer` (`empid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
