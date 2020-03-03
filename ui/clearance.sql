-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 05:22 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clearance`
--
CREATE DATABASE IF NOT EXISTS `clearance` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clearance`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `crequest`
--

CREATE TABLE IF NOT EXISTS `crequest` (
`rid` int(11) NOT NULL,
  `sId` int(11) NOT NULL,
  `sName` varchar(50) NOT NULL,
  `regNo` varchar(20) NOT NULL,
  `sDepartment` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `hodreply` varchar(10) NOT NULL,
  `hRepdate` varchar(20) DEFAULT NULL,
  `libreply` varchar(10) NOT NULL,
  `lRepdate` varchar(20) DEFAULT NULL,
  `csoreply` varchar(10) NOT NULL,
  `csoRepdate` varchar(20) DEFAULT NULL,
  `saoreply` varchar(10) NOT NULL,
  `saoRepdate` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crequest`
--

INSERT INTO `crequest` (`rid`, `sId`, `sName`, `regNo`, `sDepartment`, `program`, `hodreply`, `hRepdate`, `libreply`, `lRepdate`, `csoreply`, `csoRepdate`, `saoreply`, `saoRepdate`) VALUES
(1, 1, 'Ibrahim Lukman', '17/123402', 'Computer Science', 'Diploma', 'check', '2019-11-16', 'check', '2019-11-16', 'check', '2019-11-16', 'check', '2019-11-16'),
(2, 5, 'Audu Agbor', '17/128702', 'Computer Science', 'Diploma', 'check', '2019-11-16', 'check', '2019-11-16', 'check', '2019-11-16', 'check', '2019-11-16'),
(3, 3, 'Adam Aisha', '17/123702', 'Mass Communication', 'National Diploma', 'check', '2019-11-18', 'check', '2019-11-16', 'check', '2019-11-16', 'check', '2019-11-16'),
(4, 6, 'David Patient', '17/126781', 'Mass Communication', 'Higher National Diploma', 'check', '2019-11-18', 'check', '2019-11-16', 'check', '2019-11-16', 'check', '2019-11-16'),
(5, 10, 'Tanko Rooth', '17/120088', 'Mass Communication', 'Diploma', 'pending', '', 'check', '2019-11-16', 'check', '2019-11-16', 'check', '2019-11-16'),
(6, 9, 'Olamie Adam', '17/125577', 'Public Administration', 'National Diploma', 'check', '2019-11-18', 'check', '2019-11-16', 'check', '2019-11-16', 'check', '2019-11-16'),
(7, 4, 'Ibrahim Patient', '17/123502', 'Computer Science', 'National Diploma', 'check', '2019-11-16', 'check', '2019-11-16', 'check', '2019-11-18', 'check', '2019-11-16'),
(8, 2, 'Adamu Bako', '17/121203', 'Public Administration', 'Higher National Diploma', 'check', '2019-11-18', 'check', '2019-11-18', 'check', '2019-11-18', 'pending', ''),
(9, 11, 'Isaac Ajayi', '17/222211', 'Food Science Technology', 'Higher National Diploma', 'check', '2019-11-18', 'check', '2019-11-18', 'check', '2019-11-18', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `csoinfo`
--

CREATE TABLE IF NOT EXISTS `csoinfo` (
`csoId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csoinfo`
--

INSERT INTO `csoinfo` (`csoId`, `name`, `pass`) VALUES
(1, 'Danjuma Yakub', 'cso');

-- --------------------------------------------------------

--
-- Table structure for table `hodinfo`
--

CREATE TABLE IF NOT EXISTS `hodinfo` (
`hodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hodinfo`
--

INSERT INTO `hodinfo` (`hodId`, `name`, `pass`, `department`) VALUES
(1, 'Danjuma Yakub', 'hod', 'Computer Science'),
(2, 'Adamu Issa', 'hod', 'Mass Communication'),
(3, 'Hajia Rabi', 'hod', 'Public Administration'),
(4, 'Mr David Sunday', 'hod', 'Food Science Technology');

-- --------------------------------------------------------

--
-- Table structure for table `librarianinfo`
--

CREATE TABLE IF NOT EXISTS `librarianinfo` (
`libId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarianinfo`
--

INSERT INTO `librarianinfo` (`libId`, `name`, `pass`) VALUES
(1, 'Mallam Issa Adamu', 'lib');

-- --------------------------------------------------------

--
-- Table structure for table `saoinfo`
--

CREATE TABLE IF NOT EXISTS `saoinfo` (
`saoId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saoinfo`
--

INSERT INTO `saoinfo` (`saoId`, `name`, `pass`) VALUES
(1, 'Mr Adam David', 'sao');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE IF NOT EXISTS `studentinfo` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `department` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `regNo` varchar(20) NOT NULL,
  `yearEnt` varchar(10) NOT NULL,
  `yearGrad` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `name`, `phone`, `department`, `program`, `stream`, `regNo`, `yearEnt`, `yearGrad`, `pass`) VALUES
(1, 'Ibrahim Lukman', '09012345676', 'Computer Science', 'Diploma', 'B', '17/123402', '2018', '2019', 'stud'),
(2, 'Adamu Bako', '08012375676', 'Public Administration', 'Higher National Diploma', 'A', '17/121203', '2018', '2019', 'stud'),
(3, 'Adam Aisha', '07012345600', 'Mass Communication', 'National Diploma', 'A', '17/123702', '2018', '2019', 'stud'),
(4, 'Ibrahim Patient', '08122345676', 'Computer Science', 'National Diploma', 'A', '17/123502', '2018', '2019', 'stud'),
(5, 'Audu Agbor', '08012377676', 'Computer Science', 'Diploma', 'B', '17/128702', '2018', '2019', 'stud'),
(6, 'David Patient', '09078935671', 'Mass Communication', 'Higher National Diploma', 'A', '17/126781', '2018', '2019', 'stud'),
(7, 'Abdullahi Sariki', '08178935671', 'Mass Communication', 'Higher National Diploma', 'A', '17/129781', '2018', '2019', 'stud'),
(8, 'Abdul akeem Mariam', '08078935671', 'Mass Communication', 'Higher National Diploma', 'B', '17/121100', '2018', '2019', 'stud'),
(9, 'Olamie Adam', '07078935671', 'Public Administration', 'National Diploma', 'A', '17/125577', '2018', '2019', 'stud'),
(10, 'Tanko Rooth', '09078922671', 'Mass Communication', 'Diploma', 'B', '17/120088', '2018', '2019', 'stud'),
(11, 'Isaac Ajayi', '08123677788', 'Food Science Technology', 'Higher National Diploma', 'A', '17/222211', '2018', '2019', 'stud'),
(12, 'Issa Jide', '09077886655', 'Food Science Technology', 'National Diploma', 'B', '17/138890', '2018', '2019', 'stud');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crequest`
--
ALTER TABLE `crequest`
 ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `csoinfo`
--
ALTER TABLE `csoinfo`
 ADD PRIMARY KEY (`csoId`);

--
-- Indexes for table `hodinfo`
--
ALTER TABLE `hodinfo`
 ADD PRIMARY KEY (`hodId`);

--
-- Indexes for table `librarianinfo`
--
ALTER TABLE `librarianinfo`
 ADD PRIMARY KEY (`libId`);

--
-- Indexes for table `saoinfo`
--
ALTER TABLE `saoinfo`
 ADD PRIMARY KEY (`saoId`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `crequest`
--
ALTER TABLE `crequest`
MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `csoinfo`
--
ALTER TABLE `csoinfo`
MODIFY `csoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hodinfo`
--
ALTER TABLE `hodinfo`
MODIFY `hodId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `librarianinfo`
--
ALTER TABLE `librarianinfo`
MODIFY `libId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `saoinfo`
--
ALTER TABLE `saoinfo`
MODIFY `saoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
