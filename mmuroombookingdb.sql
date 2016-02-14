-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2016 at 11:25 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mmuroombookingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
`admin_id` int(5) NOT NULL,
  `admin_username` varchar(25) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`booking_id` int(5) NOT NULL,
  `member_id` int(10) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `room_id` varchar(20) DEFAULT NULL,
  `organizer` varchar(50) DEFAULT NULL,
  `number_of_participants` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `member_id`, `booking_date`, `time_start`, `time_end`, `room_id`, `organizer`, `number_of_participants`) VALUES
(32, 1131326444, '2014-07-12', '16:30:00', '22:30:00', 'CLCR2001  ', 'Alex Song', 35),
(33, 1131326723, '2015-08-26', '21:00:00', '23:00:00', 'MXMX0001  ', 'Nurul Aini', 100),
(34, 1131327308, '2014-12-23', '19:30:00', '21:00:00', 'MAHL0001 ', 'Mohd. Ali', 250),
(35, 1141326540, '2014-06-07', '17:00:00', '19:00:00', 'CLCR2004', 'Calvin Teo', 50),
(36, 1141326892, '2015-03-21', '20:00:00', '22:45:00', 'CLCR2005 ', 'Muhd. Abdul', 40),
(37, 1141326958, '2015-09-11', '18:00:00', '19:30:00', 'CLCR2004', 'Muthu', 40),
(38, 1141327342, '2014-08-08', '20:00:00', '22:00:00', 'MAHL0001 ', 'Balan', 350),
(39, 1141364565, '2015-12-04', '19:30:00', '21:30:00', 'MXMX2002', 'Ambika', 60),
(40, 1151234561, '2015-07-05', '20:00:00', '21:45:00', 'CLCR0004', 'Alice Low', 32),
(41, 1151236876, '2014-09-15', '15:30:00', '17:00:00', 'CLCR0005', 'Kumar', 40),
(42, 1000001001, '2014-04-04', '20:00:00', '22:00:00', 'EXMH0002', 'Rahman', 750),
(43, 1000001023, '2015-10-18', '11:00:00', '12:30:00', 'MEET0001', 'Harris', 20),
(44, 1000001045, '2015-07-06', '17:00:00', '18:30:00', 'STDO0001', 'Alaba', 45),
(45, 1000001090, '2015-04-03', '20:15:00', '22:30:00', 'CLCR0001', 'Tan', 40),
(46, 1000001123, '2015-08-16', '16:45:00', '18:30:00', 'MXMX2005', 'Rani', 90),
(47, 1000001134, '2014-09-19', '19:50:00', '21:30:00', 'EXMH0002', 'Nasir', 800),
(48, 1000001456, '2014-08-29', '18:15:00', '19:20:00', 'MEET1001', 'Vincent', 10),
(49, 1000001876, '2014-07-27', '12:30:00', '14:45:00', 'MXMX0004', 'Mila', 180),
(50, 1000001879, '2014-03-09', '14:50:00', '17:00:00', 'MAHL0001', 'Mike', 450),
(51, 1000001999, '2015-02-02', '14:30:00', '16:00:00', 'CLCR1002', 'Mia', 40);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(10) NOT NULL,
  `member_name` varchar(25) DEFAULT NULL,
  `member_password` varchar(35) DEFAULT NULL,
  `membership_type` varchar(50) DEFAULT NULL,
  `phone_num` int(12) DEFAULT NULL,
  `member_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_password`, `membership_type`, `phone_num`, `member_email`) VALUES
(1000001001, 'Muhd. Rahman', '3796fbb8b99725399d2ad0f598d321cf', 'staff', 124561218, 'rahman1001@yahoo.com'),
(1000001023, 'Harris A/L Anbu', '8a499002c908afffccaccfd0f526300f', 'staff', 102121213, 'harris21@yahoo.com'),
(1000001045, 'David Alaba', '942eb5c6e94ae46c01a04b38992219e4', 'staff', 129874562, 'alaba@yahoo.com'),
(1000001090, 'Tan Chong Kim', '4a632bddac29784f796114407f150852', 'staff', 102702399, 'kim1090@yahoo.com'),
(1000001123, 'Rani A/P Samy', '8daed774c333aeac3b87b539f04966b2', 'staff', 196488236, 'rani123@gmail.com'),
(1000001134, 'Mohd. Nasir', 'e4487a4bae05dce109f54025cdd8fa69', 'staff', 105554466, 'nasir@yahoo.com'),
(1000001456, 'Vincent Chuah', '6fdd8512eb247380d3ad73ce6183c7f0', 'staff', 102502332, '50cent@gmail.com'),
(1000001876, 'Mila Lopez', '831865b302eaa45a77a016ff760bab85', 'staff', 126468001, 'mila23@gmail.com'),
(1000001879, 'Mike Tyson', '605ebcfac3d4171a1ab848209105d503', 'staff', 123689457, 'tyson_mike@yahoo.com'),
(1000001999, 'Mia Ogawa', '79c867cbf73ffc0700d85f209fd8a4d0', 'staff', 127451369, 'mia23@gmail.com'),
(1131326444, 'Alex Song', '946d20c91f154795805cebdefe919ef7', 'student', 171234986, 'alex_song@yahoo.com'),
(1131326723, 'Nurul Aini', 'b1ff9464a24ab7b26396d62876fa37af', 'student', 168975465, 'nurul6723@yahoo.com'),
(1131327308, 'Mohd. Ali', 'a3ab964c99cfd9caebaaf7793f2ccace', 'student', 126383008, 'aliabu@gmail.com'),
(1141326540, 'Calvin Teo', 'f60daa5d0464cd45ad540bb8cee0be84', 'student', 173166719, 'calvin6540@gmail.com'),
(1141326892, 'Muhd. Abdul', '63ac6b4bf9abd43dbe89a6831afc1c49', 'student', 108456329, 'abdul@gmail.com'),
(1141326958, 'Muthu A/l Mariappan', '7d26dd6666c785689a88204a0a1aaaf7', 'student', 108080808, 'muthu08@gmail.com'),
(1141327342, 'Balan A/L Raju', '1e405676abbe9c22dcc59e653bff8ff6', 'student', 173636369, 'balan36@gmail.com'),
(1141364565, 'Ambika A/P Deva', 'cbd610f442cc7f7f68222611a188cb66', 'student', 141823978, 'princessbika@gmail.com'),
(1151234561, 'Alice Low', 'a3f0f7d3eefb3cb9e9aefb573996d335', 'student', 142568749, 'low45@yahoo.com'),
(1151236876, 'Kumar A/L Samyveloo', '38519183debbd300623d41ddf014eb89', 'student', 140404184, 'kumar04@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` varchar(20) NOT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `capacity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `capacity`) VALUES
('CLCR0001', 'Tutorial room', 40),
('CLCR0002', 'Tutorial room', 40),
('CLCR0003', 'Tutorial room', 40),
('CLCR0004', 'Tutorial room', 40),
('CLCR0005', 'Tutorial room', 40),
('CLCR1001', 'Tutorial room', 40),
('CLCR1002', 'Tutorial room', 40),
('CLCR1003', 'Tutorial room', 40),
('CLCR1004', 'Tutorial room', 40),
('CLCR1005', 'Tutorial room', 40),
('CLCR2001', 'Tutorial room', 40),
('CLCR2003', 'Tutorial room', 40),
('CLCR2004', 'Tutorial room', 40),
('CLCR2005', 'Tutorial room', 40),
('EXMH0002', 'Exam Hall', 800),
('MAHL0001', 'Main Hall', 500),
('MEET0001', 'Meeting room', 20),
('MEET0002', 'Meeting room', 20),
('MEET0003', 'Meeting room', 20),
('MEET1001', 'Meeting room', 20),
('MEET1002', 'Meeting room', 20),
('MEET1003', 'Meeting room', 20),
('MEET2001', 'Meeting room', 20),
('MEET2002', 'Meeting room', 20),
('MXMX0001', 'Lecture room', 200),
('MXMX0002', 'Lecture room', 200),
('MXMX0003', 'Lecture room', 200),
('MXMX0004', 'Lecture room', 200),
('MXMX0005', 'Lecture room', 200),
('MXMX1001', 'Lecture room', 150),
('MXMX1002', 'Lecture room', 150),
('MXMX1003', 'Lecture room', 150),
('MXMX1004', 'Lecture room', 150),
('MXMX1005', 'Lecture room', 150),
('MXMX2001', 'Lecture room', 100),
('MXMX2002', 'Lecture room', 100),
('MXMX2003', 'Lecture room', 100),
('MXMX2004', 'Lecture room', 100),
('MXMX2005', 'Lecture room', 100),
('STDO0001', 'Design studio', 50),
('STDO0002', 'Design studio', 50),
('STDO0003', 'Design studio', 50),
('STDO0004', 'Design studio', 50),
('STDO0005', 'Design studio', 50),
('STDO1001', 'Design studio', 50),
('STDO1002', 'Design studio', 50),
('STDO1003', 'Design studio', 50),
('STDO1004', 'Design studio', 50),
('STDO1005', 'Design studio', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
 ADD PRIMARY KEY (`admin_id`), ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`booking_id`), ADD UNIQUE KEY `booking_id` (`booking_id`), ADD KEY `member_id` (`member_id`), ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`member_id`), ADD UNIQUE KEY `member_id` (`member_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`room_id`), ADD UNIQUE KEY `room_id` (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `booking_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
