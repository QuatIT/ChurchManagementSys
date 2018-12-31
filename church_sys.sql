-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 10:33 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tb`
--

CREATE TABLE `attendance_tb` (
  `id` int(11) NOT NULL,
  `attendance_id` varchar(255) NOT NULL,
  `children` varchar(255) NOT NULL,
  `youth` varchar(255) NOT NULL,
  `adult` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `baptism_tb`
--

CREATE TABLE `baptism_tb` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `date_baptised` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `church_login`
--

CREATE TABLE `church_login` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `a_level` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `church_login`
--

INSERT INTO `church_login` (`id`, `user`, `pass`, `a_level`, `email`) VALUES
(1, 'kofi', 'Admin-3609919', 1, 'authenticartmuzik@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `event_tb`
--

CREATE TABLE `event_tb` (
  `id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `hostname` varchar(255) NOT NULL,
  `guest_speaker` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership_tb`
--

CREATE TABLE `membership_tb` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `other_name` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `residential_address` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `home_town` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `baptism_status` varchar(255) NOT NULL,
  `confirmation_status` varchar(255) NOT NULL,
  `membership_type` varchar(255) NOT NULL,
  `parental_name` varchar(255) NOT NULL,
  `parental_status` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `member_image` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ministry_tb`
--

CREATE TABLE `ministry_tb` (
  `id` int(11) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ministry_tb`
--

INSERT INTO `ministry_tb` (`id`, `group_id`, `group_name`, `doe`) VALUES
(1, '45673735', 'Counseling', '2018-08-09 16:50:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_tb`
--
ALTER TABLE `attendance_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baptism_tb`
--
ALTER TABLE `baptism_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `church_login`
--
ALTER TABLE `church_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tb`
--
ALTER TABLE `event_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_tb`
--
ALTER TABLE `membership_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministry_tb`
--
ALTER TABLE `ministry_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_tb`
--
ALTER TABLE `attendance_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `baptism_tb`
--
ALTER TABLE `baptism_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `church_login`
--
ALTER TABLE `church_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event_tb`
--
ALTER TABLE `event_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership_tb`
--
ALTER TABLE `membership_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1436;
--
-- AUTO_INCREMENT for table `ministry_tb`
--
ALTER TABLE `ministry_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



create table `welfare_tb`(
    `id` int(255) not null primary key auto_increment,
    `welfare_id` varchar(255) not null,
    `member_id` varchar(255) not null,
    `welfare_amount` decimal(65,2) not null,
    `welfare_date` varchar(50) not null,
    `doe` timestamp
)engine = InnoDB;

create table `pledge_td`(
    `id` int(255) not null primary key auto_increment,
    `pledge_id` varchar(255) not null,
    `member_name` varchar(255) not null,
    `event_pledged` varchar(255) not null,
    `payment_date` varchar(255) not null,
    `amount` decimal(65,2) not null,
    `phone` varchar(255) not null,
    `address` varchar(255) not null,
    `pledge_status` varchar(30) not null,
    `doe` timestamp
)engine = InnoDB;
