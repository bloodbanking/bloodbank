-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 12:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(191) DEFAULT NULL,
  `lng` varchar(191) DEFAULT NULL,
  `lat` varchar(191) DEFAULT NULL,
  `map` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`b_id`, `b_name`, `lng`, `lat`, `map`) VALUES
(13, 'SHAR HOSPITAL', '45.44182687997818', '35.581704850370855', NULL),
(14, 'FARUK HOSPITAL', '45.465981513261795', '35.54950193732846', NULL),
(15, 'EMERGENCY HOSPITAL', '45.443749353289604', '35.56387260939801', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL,
  `blood_name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `blood_name`) VALUES
(1, 'O+'),
(2, 'O-'),
(4, 'A+'),
(5, 'A-'),
(6, 'B+'),
(7, 'B-'),
(8, 'AB+'),
(9, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `r_id` int(191) NOT NULL,
  `fname` varchar(191) DEFAULT NULL,
  `lname` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `age` varchar(191) DEFAULT NULL,
  `location` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `bloodgroup` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `finish` varchar(191) DEFAULT '0',
  `opposite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`r_id`, `fname`, `lname`, `phone`, `age`, `location`, `type`, `gender`, `bloodgroup`, `bank_id`, `date`, `finish`, `opposite`) VALUES
(39, 'bahar', 'nariman', '07738361211', '25', 'azady', '1', '0', 4, 13, '2022-04-23', '0', NULL),
(40, 'bafraw', 'tahir', '07701234567', '32', 'qrga', '0', '0', 1, 13, '2022-04-23', '0', NULL),
(41, 'las', 'soran', '07709876543', '32', 'twymalik', '0', '1', 1, 13, '2022-04-23', '0', NULL),
(42, 'lawan', 'soran', '09876543', '40', 'rzgary', '1', '1', 1, 13, '2022-04-23', '0', NULL),
(43, 'ahmad', 'bakhtyar', '07703334455', '43', 'rzgary', '0', '1', 4, 14, '2022-04-23', '0', NULL),
(44, 'hoshmand', 'nury', '07703334455', '40', 'twymalik', '1', '1', 4, 13, '2022-04-23', '0', NULL),
(45, 'nya', 'ali', '07731234567', '27', 'majidbag', '0', '0', 4, 13, '2022-04-23', '0', NULL),
(46, 'kosar', 'majed', '07701231237', '37', 'goizha', '0', '1', 8, 14, '2022-04-25', '0', NULL),
(47, 'hawkar', 'nury', '07708887766', '43', 'kaziwa', '1', '1', 8, 13, '2022-04-25', '0', NULL),
(48, 'ALI', 'abdul', '0771555', '35', 'majidbag', '0', '1', 5, 13, '2022-04-25', '0', NULL),
(49, 'sozan', 'tahir', '0771555', '32', 'twymalik', '1', '0', 5, 13, '2022-04-25', '0', NULL),
(50, 'nazir', 'hasan', '000000', '50', 'slemany', '0', '0', 4, 13, '2022-04-25', '0', NULL),
(51, 'shno', 'nariman', '8888', '33', 'twymalik', '1', '0', 4, 13, '2022-04-25', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `permition` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `password`, `permition`) VALUES
(38, 'bahar', '07738361211', 'bahar', 'user'),
(39, 'bafraw', '07701234567', 'bafraw', 'user'),
(40, 'las', '07709876543', 'las', 'user'),
(41, 'lawan', '09876543', 'lawan', 'user'),
(42, 'ahmad', '07703334455', 'ahmad', 'user'),
(43, 'nya', '07731234567', 'nya', 'user'),
(44, 'kosar', '07701231237', 'kosar', 'user'),
(45, 'hawkar', '07708887766', 'hawkar', 'user'),
(46, 'ALI', '0771555', 'ali', 'user'),
(47, 'nazir', '000000', 'nazir', 'user'),
(48, 'shno', '8888', 'shno', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `bloodgroup` (`bloodgroup`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `r_id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`bloodgroup`) REFERENCES `blood` (`blood_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`b_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
