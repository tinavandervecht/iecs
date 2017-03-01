-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2017 at 04:38 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_erosionapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `activity_id` smallint(6) NOT NULL,
  `company_id` smallint(6) NOT NULL,
  `activity_desc` text NOT NULL,
  `activity_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activity`
--

INSERT INTO `tbl_activity` (`activity_id`, `company_id`, `activity_desc`, `activity_date`) VALUES
(1, 6, 'Edited form for: Activity Check', '2017-02-01 10:24:15'),
(2, 6, 'Finished form for: Activity Check 2', '2017-02-01 10:27:05'),
(3, 6, 'Deleted form for: ', '2017-02-01 15:29:23'),
(4, 6, 'Deleted one of their forms', '2017-02-01 15:34:21'),
(5, 6, 'Updated their company profile.', '2017-02-01 12:38:55'),
(6, 6, 'Updated their company profile.', '2017-02-01 12:39:39'),
(7, 6, 'Updated their company profile.', '2017-02-01 12:48:53'),
(8, 6, 'Updated their company profile.', '2017-02-01 12:49:00'),
(9, 6, 'Updated their company profile.', '2017-02-07 12:42:51'),
(10, 6, 'Updated their company profile.', '2017-02-07 12:42:57'),
(11, 6, 'Deleted one of their forms', '2017-02-07 13:22:40'),
(12, 6, 'Deleted one of their forms', '2017-02-07 13:46:16'),
(13, 6, 'Deleted one of their forms', '2017-02-07 13:46:18'),
(14, 6, 'Deleted one of their forms', '2017-02-07 13:46:34'),
(15, 6, 'Deleted one of their forms', '2017-02-07 13:46:54'),
(16, 6, 'Edited form for: Testing 8', '2017-02-14 12:31:45'),
(17, 6, 'Finished form for: Testing 9', '2017-02-14 12:32:38'),
(18, 6, 'Edited form for: Testing 9', '2017-02-14 12:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_username` varchar(15) NOT NULL,
  `admin_pw` varchar(15) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_lastLogin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_pw`, `admin_name`, `admin_lastLogin`) VALUES
(1, 'admin1', 'adminpw', 'Admin', 1487341711);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` smallint(5) UNSIGNED NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `company_email` varchar(40) NOT NULL DEFAULT 'Your Email Here',
  `company_phone` varchar(12) NOT NULL DEFAULT '000-000-0000',
  `company_pw` varchar(30) NOT NULL,
  `company_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_contactName` varchar(30) NOT NULL,
  `company_lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_status` smallint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_email`, `company_phone`, `company_pw`, `company_date`, `company_contactName`, `company_lastLogin`, `company_status`) VALUES
(1, 'Test Company', 'test@email.com', '000-000-0000', 'test', '2016-10-11 14:53:13', 'test contact name', '2016-10-11 14:53:13', 1),
(2, 'Fanshawe College', 'fanshawe@fanshawe.com', '000-000-0000', 'fanshawpw', '2016-10-11 14:55:18', 'Adam Luxton', '2016-10-11 14:55:18', 1),
(3, 'Company ', 'company2@email.com', '000-000-0000', 'password', '2016-10-11 17:08:31', 'name name', '2016-10-11 17:08:31', 1),
(4, 'odadas', 'dasdadad', '000-000-0000', 'password', '2016-11-01 17:16:17', 'dsdasdada', '2016-11-01 17:16:17', 1),
(5, 'dasdasdasdsa', 'asdasdasdadad', '000-000-0000', 'asdasdsadas', '2016-11-03 00:02:08', 'asddasdasd', '2016-11-03 00:02:08', 1),
(6, 'John Doe\'s Company', 'johndoe@johndoe.ca', '000-000-0000', 'doe', '2017-02-07 17:42:57', 'John Doe', '2017-02-07 17:42:57', 1),
(7, 'Adam\'s Company', 'a_luxton@fanshaweonline.ca', '000-000-0000', 'password', '2016-11-18 00:27:29', 'Adam Luxton', '2016-11-18 00:27:29', 1),
(8, 'newcompany', 'Your Email Here', '000-000-0000', 'newuser', '2016-11-22 16:40:11', 'newperson', '2016-11-22 16:40:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_estimates`
--

CREATE TABLE `tbl_estimates` (
  `estimate_id` smallint(5) UNSIGNED NOT NULL,
  `company_id` smallint(5) UNSIGNED NOT NULL,
  `estimate_name` varchar(50) NOT NULL,
  `estimate_date` datetime NOT NULL,
  `estimate_projectedDate` varchar(50) NOT NULL DEFAULT 'Not Specified',
  `estimate_address` varchar(50) NOT NULL DEFAULT 'Not Specified',
  `estimate_engineer` varchar(50) NOT NULL DEFAULT 'Not Specified',
  `estimate_status` smallint(1) NOT NULL,
  `estimate_location` varchar(50) NOT NULL,
  `estimate_expectedFlow` decimal(5,2) NOT NULL,
  `estimate_expectedVelocity` decimal(5,2) NOT NULL,
  `estimate_bedSlope` decimal(5,2) NOT NULL,
  `estimate_sideSlope` decimal(5,2) NOT NULL,
  `estimate_flowType` smallint(2) NOT NULL COMMENT 'needs review, option form?',
  `estimate_bedWidth` decimal(5,2) NOT NULL,
  `estimate_alignment` smallint(1) NOT NULL,
  `estimate_crestRadius` decimal(5,2) NOT NULL,
  `estimate_channelLength` decimal(5,2) NOT NULL,
  `estimate_channelDepth` decimal(5,2) NOT NULL,
  `estimate_topWidth` decimal(5,2) NOT NULL,
  `estimate_outLetSource` smallint(2) NOT NULL,
  `estimate_soilType` text NOT NULL,
  `estimate_modifiedDate` datetime NOT NULL,
  `estimate_comments` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_estimates`
--

INSERT INTO `tbl_estimates` (`estimate_id`, `company_id`, `estimate_name`, `estimate_date`, `estimate_projectedDate`, `estimate_address`, `estimate_engineer`, `estimate_status`, `estimate_location`, `estimate_expectedFlow`, `estimate_expectedVelocity`, `estimate_bedSlope`, `estimate_sideSlope`, `estimate_flowType`, `estimate_bedWidth`, `estimate_alignment`, `estimate_crestRadius`, `estimate_channelLength`, `estimate_channelDepth`, `estimate_topWidth`, `estimate_outLetSource`, `estimate_soilType`, `estimate_modifiedDate`, `estimate_comments`) VALUES
(1, 1, '', '2016-10-31 11:37:38', '', 'Not Specified', 'Not Specified', 1, 'Fansawe College, London, Ontario, Canada', '2.00', '6.00', '0.00', '1.00', 3, '1.00', 3, '22.00', '80.00', '1.00', '2.00', 4, 'Soil Type and Related Conditions', '2016-11-17 16:17:27', ''),
(2, 2, '', '2016-10-11 11:02:47', '', 'Not Specified', 'Not Specified', 1, 'Adam\'s House, Oakville, Ontario, Canada', '41.00', '57.00', '27.00', '13.00', 2, '127.00', 2, '98.00', '21.00', '87.00', '87.00', 6, 'Soil Type and Related Conditions', '2016-11-17 16:17:27', ''),
(3, 1, '', '2016-10-17 13:35:27', '', 'Not Specified', 'Not Specified', 1, 'Location', '20.00', '282.00', '21.00', '291.00', 1, '291.00', 1, '291.00', '291.00', '291.00', '291.00', 1, 'Text', '2016-11-17 16:17:27', ''),
(4, 6, 'John Doe\'s Estimate #1', '2016-11-17 15:58:11', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s House', '11.00', '11.00', '22.00', '33.00', 1, '22.00', 1, '22.00', '22.00', '22.00', '22.00', 1, 'Cool Soil Type', '2016-11-17 16:17:27', ''),
(5, 6, 'John Doe\'s Estimate #2', '2016-11-17 15:58:11', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s Cottage', '11.00', '11.00', '11.00', '11.00', 1, '11.00', 1, '11.00', '11.00', '11.00', '11.00', 1, 'Some soil stuff.', '2016-11-17 16:17:27', ''),
(6, 6, 'John Doe\'s Estimate #3', '2016-11-17 15:59:54', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s Apartment', '11.00', '11.00', '11.00', '11.00', 1, '11.00', 1, '11.00', '11.00', '11.00', '11.00', 1, 'Soil soil soil', '2016-11-17 16:17:27', ''),
(7, 6, 'John Doe\'s Estimate #4', '2016-11-17 15:59:54', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s Park', '11.00', '11.00', '11.00', '11.00', 1, '11.00', 1, '11.00', '11.00', '11.00', '11.00', 1, 'Soil soil soil', '2016-11-17 16:17:27', ''),
(8, 6, 'Adam\'s Project', '2016-11-24 14:43:40', 'Soon', '2241 Carpenters', 'Adam Luxton', 1, 'Oakville, Ontario', '11.11', '11.11', '11.11', '11.11', 1, '11.11', 1, '11.11', '11.11', '11.11', '11.11', 1, 'Hello', '2016-11-24 14:43:40', 'Here are some comments'),
(9, 6, 'Project 2', '2016-11-25 11:10:42', 'Soon', '1111 Somewhere', 'Adam', 1, 'Somewhere', '99.66', '11.22', '0.12', '0.12', 1, '11.11', 1, '11.11', '11.11', '11.11', '11.11', 1, 'Text', '2016-11-25 11:10:42', 'Text'),
(10, 6, 'Adam\'s Project 2', '2016-11-25 06:30:42', 'Soon', '2241 Carpenters', 'Adam Luxton', 1, 'Oakville, Ontario', '11.11', '11.11', '11.11', '0.12', 1, '11.11', 1, '11.11', '11.11', '11.11', '11.11', 1, 'Hello', '2016-11-25 13:30:42', 'Comments'),
(11, 6, 'Project 2', '2016-12-01 05:36:12', '', '1111 Somewhere', 'Bob', 1, 'Somewhere', '99.66', '11.22', '0.12', '0.12', 1, '11.11', 1, '11.11', '11.11', '11.11', '11.11', 1, 'Text', '2016-12-01 12:36:12', 'comments'),
(12, 6, 'Project 3', '2016-12-06 05:32:53', '', '1111 Somewhere', 'Bob', 1, 'Somewhere', '99.66', '11.22', '0.12', '0.12', 1, '11.11', 1, '11.11', '11.11', '11.11', '11.11', 1, 'Text', '2016-12-06 12:32:53', 'Comment new'),
(13, 6, 'New one', '2016-12-06 05:33:58', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s House', '11.00', '11.00', '22.00', '33.00', 1, '22.00', 1, '22.00', '22.00', '22.00', '22.00', 1, 'Cool Soil Type', '2016-12-06 12:33:58', ''),
(14, 6, 'Testing', '2017-01-31 03:11:05', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:11:05', '11111'),
(15, 6, 'Testing', '2017-01-31 03:14:01', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:14:01', '11111'),
(16, 6, 'Testing 2', '2017-01-31 03:22:15', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:22:15', '11111'),
(17, 6, 'Testing 3', '2017-01-31 03:30:52', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:30:52', '11111'),
(18, 6, 'Testing 4', '2017-01-31 03:30:52', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:34:25', '11111'),
(19, 6, 'Testing 5', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:35:25', '11111'),
(20, 6, 'Testing 6', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:37:49', '11111'),
(21, 6, 'Testing 8', '2017-01-31 03:30:52', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-02-14 12:31:45', '11111'),
(22, 6, 'Testing 8', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:39:13', '11111'),
(23, 6, 'Testing 9', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:50:50', '11111'),
(24, 6, 'Testing 11', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', 1, '1.11', 1, '1.11', '1.11', '1.11', '0.34', 1, '1', '2017-01-31 03:56:32', '11111'),
(25, 6, 'Adam Testing', '2017-01-31 16:43:10', '', '', 'Adam', 0, '', '1.00', '1.00', '1.00', '1.00', 1, '1.00', 1, '1.00', '1.00', '1.00', '1.00', 1, '1', '2017-01-31 16:43:10', '1'),
(26, 6, 'Adam Testing', '2017-01-31 16:43:45', '', '', '1', 0, '', '1.00', '1.00', '1.00', '1.00', 1, '1.00', 1, '1.00', '1.00', '1.00', '1.00', 1, '1', '2017-01-31 16:43:45', '1'),
(27, 6, 'Adamin tes', '2017-01-31 16:44:18', '', '', '11', 0, '', '1.00', '1.00', '1.00', '1.00', 1, '1.00', 1, '1.00', '1.00', '1.00', '1.00', 1, '1', '2017-01-31 16:44:18', '1'),
(28, 6, 'a', '2017-01-31 16:44:48', '', '', '', 0, '', '1.00', '1.00', '1.00', '1.00', 1, '1.00', 1, '1.00', '1.00', '1.00', '1.00', 1, '1', '2017-01-31 16:44:48', '1'),
(29, 6, 'Activity Check', '2017-01-31 16:45:28', '', '', '', 0, '', '1.00', '1.00', '1.00', '1.00', 1, '1.00', 1, '1.00', '1.00', '1.00', '1.00', 1, '1', '2017-02-01 10:24:15', '1'),
(30, 6, 'Activity Check 2', '2017-02-01 10:26:17', '', '', 'Adam Luxton', 0, '', '1.00', '1.00', '1.00', '1.00', 1, '1.00', 1, '1.00', '1.00', '1.00', '1.00', 1, '1', '2017-02-01 10:26:17', 'Comments'),
(31, 6, 'Activity Check 2', '2017-02-01 10:27:05', '', '', 'Adam Luxton', 0, '', '1.00', '1.00', '1.00', '1.00', 1, '1.00', 1, '1.00', '1.00', '1.00', '1.00', 1, '1', '2017-02-01 10:27:05', 'Comments'),
(32, 6, 'Testing 9', '2017-02-14 12:32:38', '2017-02-08', '2241 Carpenters Circle', 'Adam', 1, 'Oakville', '1.00', '1.00', '0.01', '0.01', 5, '1.00', 2, '1.00', '1.00', '1.00', '1.00', 0, '0', '2017-02-14 12:38:07', 'Comment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `products_id` smallint(5) UNSIGNED NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_size` smallint(6) NOT NULL,
  `product_modifier` decimal(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_results`
--

CREATE TABLE `tbl_results` (
  `result_id` smallint(6) NOT NULL,
  `estimate_id` smallint(6) NOT NULL,
  `result_cc35_sf` decimal(4,2) NOT NULL,
  `result_cc35_slope` decimal(4,2) NOT NULL,
  `result_cc35_flow` decimal(4,2) NOT NULL,
  `result_cc45_sf` decimal(4,2) NOT NULL,
  `result_cc45_slope` decimal(4,2) NOT NULL,
  `result_cc45_flow` decimal(4,2) NOT NULL,
  `result_cc70_sf` decimal(4,2) NOT NULL,
  `result_cc70_slope` decimal(4,2) NOT NULL,
  `result_cc70_flow` decimal(4,2) NOT NULL,
  `result_cc90_sf` decimal(4,2) NOT NULL,
  `result_cc90_slope` decimal(4,2) NOT NULL,
  `result_cc90_flow` decimal(4,2) NOT NULL,
  `result_recBlock` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_estimates`
--
ALTER TABLE `tbl_estimates`
  ADD PRIMARY KEY (`estimate_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `tbl_results`
--
ALTER TABLE `tbl_results`
  ADD PRIMARY KEY (`result_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `activity_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_estimates`
--
ALTER TABLE `tbl_estimates`
  MODIFY `estimate_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `products_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_results`
--
ALTER TABLE `tbl_results`
  MODIFY `result_id` smallint(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
