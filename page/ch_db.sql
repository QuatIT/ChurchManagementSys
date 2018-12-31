create database `church_sys`;
use `church_sys`;

CREATE TABLE IF NOT EXISTS  `membership_tb`(
	`id` int not null primary key auto_increment,
	`member_id` varchar(255) not null,
	`last_name` varchar(255) not null,
	`first_name` varchar(255) not null,
	`other_name` varchar(255) not null,
	`dob` date,
	`gender` varchar(255) not null,
	`residential_address` varchar(255) not null,
	`home_town` varchar(255) not null,
	`house_number` varchar(255) not null,
	`nationality` varchar(255) not null,
	`place_of_birth` varchar(255) not null,
	`occupation` varchar(255) not null,
	`marital_status` varchar(255) not null,
	`parental_status` varchar(255) not null,
	`email` varchar(255) not null,
	`phone_number` varchar(255) not null,
	`group_name` varchar(255) not null,
	`baptism_status` varchar(255) not null,
	`confirmation_status` varchar(255) not null,
	`membership_type` varchar(255) not null,
	`parental_name` varchar(255) not null,
	`position` varchar(255) not null,
	`member_image` varchar(255) not null,
	`doe` timestamp
);

CREATE TABLE IF NOT EXISTS `ministry_tb`(
	`id` int not null primary key auto_increment,
	`group_id` varchar(255) not null,
	`group_name` varchar(255) not null,
	`doe` timestamp
);

CREATE TABLE IF NOT EXISTS `event_tb`(
	`id` int not null primary key auto_increment,
	`event_id` varchar(255) not null,
	`theme` varchar(255) not null,
	`venue` varchar(255) not null,
	`start_date` varchar(255) not null,
	`end_date` varchar(255) not null,
	`start_time` varchar(255) not null,
	`end_time` varchar(255) not null,
	`hostname` varchar(255) not null,
	`guest_speaker` varchar(255) not null,
	`event_image` varchar(255) not null,
	`doe` timestamp
);

CREATE TABLE IF NOT EXISTS `baptism_tb`(
	`id` int not null primary key auto_increment,
	`member_id` varchar(255) not null,
	`date_baptised` varchar(255) not null,
	`doe` timestamp
);

CREATE TABLE IF NOT EXISTS `attendance_tb`(
	`id` int not null primary key auto_increment,
	`attendance_id` varchar(255) not null,
	`children` varchar(255) not null,
	`youth` varchar(255) not null,
	`adult` varchar(255) not null,
	`doe` timestamp
);
