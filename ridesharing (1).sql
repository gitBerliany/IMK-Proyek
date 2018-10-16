-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 07:39 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ridesharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_plate` varchar(10) NOT NULL,
  `car_img` varchar(100) NOT NULL,
  `car_drvid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_name`, `car_plate`, `car_img`, `car_drvid`) VALUES
(1, 'Toyota Avanza', 'L1234AL', 'avanza.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `drv_id` int(11) NOT NULL,
  `drv_usrid` int(11) NOT NULL,
  `drv_simnum` varchar(30) NOT NULL,
  `drv_totalrating` int(11) DEFAULT NULL,
  `drv_smoking` int(11) NOT NULL,
  `drv_pets` int(11) NOT NULL,
  `drv_chat` int(11) NOT NULL,
  `drv_music` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`drv_id`, `drv_usrid`, `drv_simnum`, `drv_totalrating`, `drv_smoking`, `drv_pets`, `drv_chat`, `drv_music`) VALUES
(1, 1, '251235102038879', NULL, 3, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `passenger_detail`
--

CREATE TABLE `passenger_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_rideid` int(11) NOT NULL,
  `detail_usrid` int(11) NOT NULL,
  `detail_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger_detail`
--

INSERT INTO `passenger_detail` (`detail_id`, `detail_rideid`, `detail_usrid`, `detail_price`) VALUES
(1, 1, 2, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `ride_id` int(11) NOT NULL,
  `ride_from` varchar(255) NOT NULL,
  `ride_dest` varchar(255) NOT NULL,
  `ride_date` date NOT NULL,
  `ride_time` time NOT NULL,
  `ride_capacity` int(11) NOT NULL,
  `ride_price` int(11) NOT NULL,
  `ride_status` int(11) NOT NULL,
  `ride_drvid` int(11) NOT NULL,
  `ride_carid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`ride_id`, `ride_from`, `ride_dest`, `ride_date`, `ride_time`, `ride_capacity`, `ride_price`, `ride_status`, `ride_drvid`, `ride_carid`) VALUES
(1, 'ukp', 'tp', '2018-06-02', '11:30:00', 2, 15000, 0, 1, 1),
(9, 'loc1', 'loc2', '2018-06-09', '12:00:00', 3, 12, 1, 1, 1),
(10, 'loc3', 'loc4', '2018-06-05', '07:13:00', 2, 123, 1, 1, 1),
(12, 'try7', 'try8', '2018-06-15', '07:18:00', 4, 15000, 0, 1, 1),
(13, 'coba', 'cobacoba', '2018-06-05', '07:20:00', 4, 15000, 1, 1, 1),
(14, 'coba', 'cobaa', '2018-06-05', '07:20:00', 4, 1200, 0, 1, 1),
(15, 'coba', 'cobacoba', '2018-06-05', '07:21:00', 5, 55, 0, 1, 1),
(16, 'haha', 'hihi', '2018-06-22', '11:35:00', 4, 10000, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(100) NOT NULL,
  `usr_sex` varchar(10) NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  `usr_pass` varchar(255) NOT NULL,
  `usr_phone` varchar(20) NOT NULL,
  `usr_totalride` int(11) DEFAULT NULL,
  `usr_img` varchar(100) NOT NULL,
  `usr_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_id`, `usr_name`, `usr_sex`, `usr_email`, `usr_pass`, `usr_phone`, `usr_totalride`, `usr_img`, `usr_status`) VALUES
(1, 'Arlyn', 'Male', 'm26416100@john.petra.ac.id', 'e807f1fcf82d132f9bb018ca6738a19f', '0312345678', 0, 'pic.png', 2),
(2, 'Gita', 'Female', 'm26416129@john.petra.ac.id', '6fb42da0e32e07b61c9f0251fe627a9c', '098789098', 0, 'cth1.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`drv_id`),
  ADD KEY `drv_usrid` (`drv_usrid`);

--
-- Indexes for table `passenger_detail`
--
ALTER TABLE `passenger_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `detail_rideid` (`detail_rideid`),
  ADD KEY `detail_usrid` (`detail_usrid`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `ride_carid` (`ride_carid`),
  ADD KEY `ride_drvid` (`ride_drvid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `drv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passenger_detail`
--
ALTER TABLE `passenger_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `drv_usrid` FOREIGN KEY (`drv_usrid`) REFERENCES `user` (`usr_id`);

--
-- Constraints for table `passenger_detail`
--
ALTER TABLE `passenger_detail`
  ADD CONSTRAINT `detail_rideid` FOREIGN KEY (`detail_rideid`) REFERENCES `ride` (`ride_id`),
  ADD CONSTRAINT `detail_usrid` FOREIGN KEY (`detail_usrid`) REFERENCES `user` (`usr_id`);

--
-- Constraints for table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `ride_carid` FOREIGN KEY (`ride_carid`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `ride_drvid` FOREIGN KEY (`ride_drvid`) REFERENCES `driver` (`drv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
