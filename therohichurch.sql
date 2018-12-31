-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 03:11 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
create table `therohichurch`;
use `therohichurch`;
--
-- Database: `therohichurch`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_tb`
--

CREATE TABLE `account_tb` (
  `id` int(11) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_type_id` varchar(255) NOT NULL,
  `acc_balance` decimal(65,2) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `account_type_tb`
--

CREATE TABLE `account_type_tb` (
  `id` int(11) NOT NULL,
  `account_type_id` varchar(255) NOT NULL,
  `account_type_name` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type_tb`
--

INSERT INTO `account_type_tb` (`id`, `account_type_id`, `account_type_name`, `doe`) VALUES
(1, 'ACT-7979481018', 'Revenue', '2018-12-04 15:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tb`
--

CREATE TABLE `attendance_tb` (
  `id` int(11) NOT NULL,
  `attendance_id` varchar(255) NOT NULL,
  `ministry_id` varchar(255) NOT NULL,
  `men` int(11) NOT NULL,
  `women` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `youth` int(11) NOT NULL,
  `population` varchar(255) NOT NULL,
  `attend_date` date NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_tb`
--

INSERT INTO `attendance_tb` (`id`, `attendance_id`, `ministry_id`, `men`, `women`, `children`, `youth`, `population`, `attend_date`, `doe`) VALUES
(2, 'ATT-53029986', 'event', 12, 8, 3, 0, '20', '2018-11-29', '2018-12-04 09:27:27'),
(3, 'ATT-59997342', 'event', 12, 10, 0, 0, '22', '2018-11-29', '2018-12-04 09:34:53'),
(4, 'ATT-35096721', 'service2', 9, 16, 6, 7, '38', '2018-11-29', '2018-12-04 09:35:00'),
(5, 'ATT-59278110', 'service1', 89, 99, 45, 11, '244', '2018-11-28', '2018-12-04 09:35:07'),
(6, 'ATT-62311300', 'all', 19, 98, 17, 10, '144', '2018-11-29', '2018-12-04 09:35:16'),
(7, 'ATT-19071276', 'service2', 10, 6, 4, 6, '26', '2018-11-29', '2018-12-04 09:35:24');

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
  `fullname` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `a_level` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `dateInsert` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `church_login`
--

INSERT INTO `church_login` (`id`, `fullname`, `user`, `pass`, `a_level`, `email`, `tel`, `branch`, `flag`, `dateInsert`, `doe`) VALUES
(1, 'KOFI BERCHIE', 'kofi', 'Admin-3609919', 1, 'authenticartmuzik@gmail.com', '', 'branch1', '', '', '2018-12-08 12:05:56'),
(2, 'New Name', 'user1', '0f9ac0ce', 2, 'kingicon05@gmail.com', '', 'branch2', '', '', '2018-12-08 12:06:02'),
(3, 'mike', 'miki', '1234', 3, 'kberch23@yahoo.com', '', 'branch1', '', '', '2018-12-28 09:22:12'),
(46, 'kwame adink', 'kadin', 'y9ibtf02', 4, 'kofi@yahoo.com', '53234567', '1', '', '2018-12-28', '2018-12-28 12:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `counselling`
--

CREATE TABLE `counselling` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `counsellor` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `dateInsert` date NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counselling`
--

INSERT INTO `counselling` (`id`, `member_id`, `full_name`, `counsellor`, `msg`, `dateInsert`, `doe`) VALUES
(1, 'cjcjocjojco', 'Sanity John Lin', 'ginhar', 'xnsjsjisjjsjssjijsis', '2018-12-06', '2018-12-06 16:51:00'),
(43, ' MEM-9901', 'Sanity John Lin', 'Mike Long', 'suffering from mental issues', '2018-12-08', '2018-12-08 11:24:09'),
(44, ' MEM-9901', 'Sanity John Lin', '', '', '2018-12-08', '2018-12-08 11:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `event_tb`
--

CREATE TABLE `event_tb` (
  `id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `startdate` varchar(255) NOT NULL,
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
-- Table structure for table `group_attendance`
--

CREATE TABLE `group_attendance` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `g_id` varchar(255) NOT NULL,
  `g_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `g_assign_member`
--

CREATE TABLE `g_assign_member` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_assign_member`
--

INSERT INTO `g_assign_member` (`id`, `member_id`, `group_id`, `doe`) VALUES
(1, 'MEM-8599', 'G-MINS-54323', '2018-11-21 09:46:37'),
(2, 'MEM-2208', 'G-MINS-98792', '2018-11-21 09:47:04'),
(3, 'MEM-9901', 'G-MINS-54323', '2018-11-21 13:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `g_ministry_tb`
--

CREATE TABLE `g_ministry_tb` (
  `id` int(11) NOT NULL,
  `g_id` varchar(255) NOT NULL,
  `g_name` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_ministry_tb`
--

INSERT INTO `g_ministry_tb` (`id`, `g_id`, `g_name`, `doe`) VALUES
(1, 'G-MINS-54323', 'Drama', '2018-11-14 12:07:36'),
(2, 'G-MINS-98792', 'shalom', '2018-11-14 15:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_status` varchar(255) NOT NULL,
  `item_quantity` varchar(255) NOT NULL,
  `item_value` varchar(255) NOT NULL,
  `dateInsert` date NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_id`, `item_name`, `item_status`, `item_quantity`, `item_value`, `dateInsert`, `doe`) VALUES
(40, 'Rohi-4331233', 'drum', 'good', '100', '1000', '2018-12-06', '2018-12-06 16:13:03'),
(44, 'Rohi-126782', 'guitar', 'Excellent', '2', '800', '2018-12-08', '2018-12-08 12:00:38');

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
  `full_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
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
  `member_status` varchar(255) NOT NULL,
  `invited_by` varchar(255) NOT NULL,
  `member_image` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_tb`
--

INSERT INTO `membership_tb` (`id`, `member_id`, `last_name`, `first_name`, `other_name`, `full_name`, `dob`, `gender`, `residential_address`, `postal_address`, `home_town`, `phone_number`, `nationality`, `place_of_birth`, `occupation`, `marital_status`, `email`, `group_name`, `baptism_status`, `confirmation_status`, `membership_type`, `parental_name`, `parental_status`, `position`, `member_status`, `invited_by`, `member_image`, `doe`) VALUES
(5, 'MEM-2208', 'Hander', 'John', 'Kyrie', 'John Kyrie Hander', '2018-12-04', 'male', '326 Glicon', '', '', '233543228227', 'Arab', 'Accra', 'Hustler', 'Married', '', 'MINS-62618', 'baptized', 'confirmed', '', '', 'Living', 'member', 'Yes', '', '', '2018-12-04 11:40:44'),
(6, 'MEM-9901', 'Sanity', 'Lin', 'John', 'Sanity John Lin', '2018-11-28', 'Male', '33 Garin st', 'p.o.box 67 mamprobi', 'accra', '233505446279', 'Finnish', 'Accra', 'Pimp', 'Single', 'kingicon@hotmail.com', 'MINS-62618', 'Baptised', 'Confirmed', 'Regular/Local Member', '', 'Living', '', 'Yes', '', '1542807631.JPG', '2018-11-28 09:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `mem_attendance`
--

CREATE TABLE `mem_attendance` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `ministry_id` varchar(255) NOT NULL,
  `ministry_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_reg` date NOT NULL,
  `flag1` int(11) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mem_attendance`
--

INSERT INTO `mem_attendance` (`id`, `member_id`, `ministry_id`, `ministry_name`, `full_name`, `gender`, `phone`, `status`, `date_reg`, `flag1`, `doe`) VALUES
(42, 'MEM-2208', 'MINS-62618', 'YOUTH', 'John Kyrie Hander', 'male', '233543228227', 'present', '2018-12-27', 1, '2018-12-27 13:15:32'),
(43, 'MEM-9901', 'MINS-62618', 'YOUTH', 'Sanity John Lin', 'Male', '233505446279', 'absent', '2018-12-27', 1, '2018-12-27 13:15:34');

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
(1, 'MINS-62618', 'YOUTH', '2018-11-14 08:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `min_grp_attend`
--

CREATE TABLE `min_grp_attend` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_reg` date NOT NULL,
  `flag1` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `min_grp_attend`
--

INSERT INTO `min_grp_attend` (`id`, `member_id`, `group_id`, `group_name`, `full_name`, `gender`, `status`, `date_reg`, `flag1`, `phone`, `doe`) VALUES
(167, 'MEM-2208', 'MINS-62618', 'YOUTH', 'John Kyrie Hander', 'male', 'present', '2018-12-27', 1, '233543228227', '2018-12-27 10:44:43'),
(168, 'MEM-2208', 'MINS-62618', 'YOUTH', 'John Kyrie Hander', 'male', 'absent', '2018-12-27', 1, '233543228227', '2018-12-27 10:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `pledge_tb`
--

CREATE TABLE `pledge_tb` (
  `id` int(255) NOT NULL,
  `pledge_id` varchar(255) NOT NULL,
  `member_type` varchar(50) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `amount` decimal(65,2) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pledge_status` varchar(30) NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pledge_tb`
--

INSERT INTO `pledge_tb` (`id`, `pledge_id`, `member_type`, `member_name`, `event_name`, `payment_date`, `amount`, `phone`, `address`, `pledge_status`, `doe`) VALUES
(1, 'PLDG-3732587102', 'Member', 'Anderson Osorio Mike', 'Info shop', '2018-11-29', '300.00', '0505446279', '443 Arston Ville', 'Fulfilled', '2018-12-04 09:33:41'),
(2, 'PLDG-3840379032', 'Member', 'Sanity John Lin', 'yard', '2018-11-29', '900.00', '09876', '443 Arston Ville', 'Fulfilled', '2018-12-04 09:33:47'),
(3, 'PLDG-1457628216', 'Visitor', 'Kwam Eliu', 'instar', '2018-11-29', '200.00', '906654438', '676 halon miskit', 'Fulfilled', '2018-12-04 09:33:53'),
(4, 'PLDG-9208965924', 'Visitor', 'Erin Ocharvic', 'instar', '2018-11-29', '600.00', '0342217895', '890 Hamlit st', 'Pledged', '2018-12-04 09:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `tithe`
--

CREATE TABLE `tithe` (
  `id` int(11) NOT NULL,
  `member_id` varchar(200) NOT NULL,
  `tithe_id` varchar(255) NOT NULL,
  `tithe_amount` varchar(255) NOT NULL,
  `tithe_date` date NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tithe`
--

INSERT INTO `tithe` (`id`, `member_id`, `tithe_id`, `tithe_amount`, `tithe_date`, `doe`) VALUES
(10, 'MEM-8599', 'TITH-5558369623', '4000', '2018-12-06', '2018-12-11 06:59:15'),
(11, 'MEM-2208', 'TITH-5672311833', '300', '2018-12-06', '2018-12-11 06:59:26'),
(12, 'MEM-8599', 'TITH-55583696233', '4000', '2018-11-06', '2018-12-27 14:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tb`
--

CREATE TABLE `transaction_tb` (
  `id` int(255) NOT NULL,
  `creditAccName` varchar(255) NOT NULL,
  `creditAccID` varchar(255) NOT NULL,
  `creditAccBal` decimal(65,2) NOT NULL,
  `debitAccName` varchar(255) NOT NULL,
  `debitAccID` varchar(255) NOT NULL,
  `debitAccBal` decimal(65,2) NOT NULL,
  `amount` decimal(65,2) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `naration` longtext NOT NULL,
  `date` date NOT NULL,
  `doe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_tb`
--

INSERT INTO `transaction_tb` (`id`, `creditAccName`, `creditAccID`, `creditAccBal`, `debitAccName`, `debitAccID`, `debitAccBal`, `amount`, `member_id`, `member_name`, `transaction_type`, `naration`, `date`, `doe`) VALUES
(4, '', '', '0.00', '', '', '0.00', '200.00', 'MEM-8599', 'Anderson Osorio Mike', 'Tithe', 'Tithe', '2018-11-17', '2018-11-17 11:27:07'),
(5, '', '', '0.00', '', '', '0.00', '200.00', 'MEM-8599', 'Anderson Osorio Mike', 'Tithe', 'Tithe', '2018-11-17', '2018-11-17 11:31:52'),
(6, '', '', '0.00', '', '', '0.00', '4000.00', 'MEM-8599', 'Anderson Osorio Mike', 'Tithe', 'Tithe', '2018-11-17', '2018-11-17 11:42:39'),
(7, '', '', '0.00', '', '', '0.00', '300.00', 'MEM-2208', 'John Kyrie Hander', 'Tithe', 'Tithe', '2018-12-04', '2018-12-04 11:13:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tb`
--
ALTER TABLE `account_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_type_tb`
--
ALTER TABLE `account_type_tb`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `counselling`
--
ALTER TABLE `counselling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tb`
--
ALTER TABLE `event_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_attendance`
--
ALTER TABLE `group_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_assign_member`
--
ALTER TABLE `g_assign_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g_ministry_tb`
--
ALTER TABLE `g_ministry_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_tb`
--
ALTER TABLE `membership_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mem_attendance`
--
ALTER TABLE `mem_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministry_tb`
--
ALTER TABLE `ministry_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `min_grp_attend`
--
ALTER TABLE `min_grp_attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pledge_tb`
--
ALTER TABLE `pledge_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tithe`
--
ALTER TABLE `tithe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_tb`
--
ALTER TABLE `transaction_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tb`
--
ALTER TABLE `account_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `account_type_tb`
--
ALTER TABLE `account_type_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance_tb`
--
ALTER TABLE `attendance_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `baptism_tb`
--
ALTER TABLE `baptism_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `church_login`
--
ALTER TABLE `church_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `counselling`
--
ALTER TABLE `counselling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `event_tb`
--
ALTER TABLE `event_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_attendance`
--
ALTER TABLE `group_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `g_assign_member`
--
ALTER TABLE `g_assign_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `g_ministry_tb`
--
ALTER TABLE `g_ministry_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `membership_tb`
--
ALTER TABLE `membership_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mem_attendance`
--
ALTER TABLE `mem_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `ministry_tb`
--
ALTER TABLE `ministry_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `min_grp_attend`
--
ALTER TABLE `min_grp_attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `pledge_tb`
--
ALTER TABLE `pledge_tb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tithe`
--
ALTER TABLE `tithe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transaction_tb`
--
ALTER TABLE `transaction_tb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
