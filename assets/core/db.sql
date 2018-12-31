create database `cheque_monitor`;
use `cheque_monitor`;
create table `customer_loan_detail`(
    `id` int not null primary key auto_increment,
    `c_fullname` varchar(255) not null,
    `phone` varchar(255) not null,
    `email` varchar(255) not null,
    `branch_code` varchar(255) not null,
    `l_amount` varchar(255) not null,
    `d_date` datetime,
    `m_date` datetime,
    `s_status` varchar(255) not null,
    `rm_code` varchar(255) not null,
    `loan_no` varchar(255) not null,
    `system_date` datetime,
    `doe` timestamp
);

create table `customer_loan_detail_hist`(
   `id` int not null primary key auto_increment,
    `c_fullname` varchar(255) not null,
    `phone` varchar(255) not null,
    `branch_code` varchar(255) not null,
    `l_amount` varchar(255) not null,
    `d_date` datetime,
    `m_date` datetime,
    `s_status` varchar(255) not null,
    `rm_code` varchar(255) not null,
    `loan_no` varchar(255) not null,
    `system_date` datetime,
    `doe` timestamp
);


create table `user_login`(
   `id` int not null primary key auto_increment,
    `username` varchar(255) not null,
    `password` varchar(255) not null,
    `branch_code` varchar(255) not null,
    `a_level` varchar(255) not null,
    `rm_code` varchar(255) not null,
    `doe` timestamp
);



create table `schedule_loan_detail`(
   `id` int not null primary key auto_increment,
    `due_date` datetime,
    `l_amount` varchar(255) not null,
    `cheque_no` varchar(255) not null,
    `c_bank` varchar(255) not null,
    `loan_no` varchar(255) not null,
    `sq_no` varchar(255) not null,
    `doe` timestamp
);


create table `schedule_loan_detail_old`(
   `id` int not null primary key auto_increment,
    `due_date` datetime,
    `l_amount` varchar(255) not null,
    `cheque_no` varchar(255) not null,
    `c_bank` varchar(255) not null,
    `loan_no` varchar(255) not null,
    `sq_no` varchar(255) not null,
    `doe` timestamp
);

