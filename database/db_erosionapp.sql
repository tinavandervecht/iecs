-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 05:54 PM
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
(18, 6, 'Edited form for: Testing 9', '2017-02-14 12:38:07'),
(19, 6, 'Deleted one of their forms', '2017-03-24 10:54:34'),
(20, 6, 'Deleted one of their forms', '2017-03-24 10:54:39'),
(21, 6, 'Edited form for: Testing 9', '2017-04-04 11:25:37'),
(22, 6, 'Sent an Analysis to IECS for review.', '2017-04-04 11:58:34'),
(23, 6, 'Edited form for: Testing 9', '2017-04-04 13:11:29'),
(24, 6, 'Edited form for: Testing 9', '2017-04-04 13:12:24'),
(25, 6, 'Edited form for: Testing 9', '2017-04-04 13:13:16'),
(26, 6, 'Edited form for: Testing 9', '2017-04-04 13:21:33'),
(27, 6, 'Edited form for: Testing 9', '2017-04-04 13:24:21'),
(28, 6, 'Edited form for: Testing 9', '2017-04-04 13:27:45'),
(29, 6, 'Edited form for: Testing 9', '2017-04-04 13:50:21'),
(30, 6, 'Edited form for: Testing 9', '2017-04-05 11:50:21');

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
(1, 'admin1', 'adminpw', 'Admin', 1491930067);

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
  `company_date` datetime NOT NULL,
  `company_contactName` varchar(30) NOT NULL,
  `company_lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_status` smallint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_email`, `company_phone`, `company_pw`, `company_date`, `company_contactName`, `company_lastLogin`, `company_status`) VALUES
(1, 'Test Company', 'test@email.com', '000-000-0000', 'test', '2016-10-11 10:53:13', 'test contact name', '2016-10-11 14:53:13', 1),
(2, 'Fanshawe College', 'fanshawe@fanshawe.com', '000-000-0000', 'fanshawpw', '2016-10-11 10:55:18', 'Adam Luxton', '2016-10-11 14:55:18', 1),
(3, 'Company ', 'company2@email.com', '000-000-0000', 'password', '2016-10-11 13:08:31', 'name name', '2016-10-11 17:08:31', 1),
(4, 'odadas', 'dasdadad', '000-000-0000', 'password', '2016-11-01 13:16:17', 'dsdasdada', '2016-11-01 17:16:17', 1),
(5, 'dasdasdasdsa', 'asdasdasdadad', '000-000-0000', 'asdasdsadas', '2016-11-02 20:02:08', 'asddasdasd', '2016-11-03 00:02:08', 1),
(6, 'John Doe\'s Company', 'johndoe@johndoe.ca', '000-000-0000', 'doe', '2017-02-07 12:42:57', 'John Doe', '2017-02-07 17:42:57', 1),
(7, 'Adam\'s Company', 'a_luxton@fanshaweonline.ca', '000-000-0000', 'password', '2016-11-17 19:27:29', 'Adam Luxton', '2016-11-18 00:27:29', 1),
(8, 'newcompany', 'Your Email Here', '000-000-0000', 'newuser', '2016-11-22 11:40:11', 'newperson', '2016-11-22 16:40:11', 1);

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
  `estimate_friction` decimal(5,0) NOT NULL DEFAULT '30',
  `estimate_flowType` smallint(2) NOT NULL COMMENT 'needs review, option form?',
  `estimate_blockType` tinyint(1) NOT NULL,
  `estimate_blockUse` tinyint(1) NOT NULL,
  `estimate_bedWidth` decimal(5,2) NOT NULL,
  `estimate_alignment` smallint(1) NOT NULL,
  `estimate_crestRadius` decimal(5,0) NOT NULL DEFAULT '0',
  `estimate_channelLength` decimal(5,0) NOT NULL DEFAULT '0',
  `estimate_channelDepth` decimal(5,0) NOT NULL DEFAULT '0',
  `estimate_topWidth` decimal(5,0) NOT NULL DEFAULT '0',
  `estimate_outLetSource` smallint(2) NOT NULL,
  `estimate_soilType` text NOT NULL,
  `estimate_modifiedDate` datetime NOT NULL,
  `estimate_comments` text NOT NULL,
  `estimate_sent` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_estimates`
--

INSERT INTO `tbl_estimates` (`estimate_id`, `company_id`, `estimate_name`, `estimate_date`, `estimate_projectedDate`, `estimate_address`, `estimate_engineer`, `estimate_status`, `estimate_location`, `estimate_expectedFlow`, `estimate_expectedVelocity`, `estimate_bedSlope`, `estimate_sideSlope`, `estimate_friction`, `estimate_flowType`, `estimate_blockType`, `estimate_blockUse`, `estimate_bedWidth`, `estimate_alignment`, `estimate_crestRadius`, `estimate_channelLength`, `estimate_channelDepth`, `estimate_topWidth`, `estimate_outLetSource`, `estimate_soilType`, `estimate_modifiedDate`, `estimate_comments`, `estimate_sent`) VALUES
(1, 1, '', '2016-10-31 11:37:38', '', 'Not Specified', 'Not Specified', 1, 'Fansawe College, London, Ontario, Canada', '2.00', '6.00', '0.00', '1.00', '30', 3, 0, 0, '1.00', 0, '22', '80', '1', '2', 4, 'Soil Type and Related Conditions', '2016-11-17 16:17:27', '', 0),
(2, 2, '', '2016-10-11 11:02:47', '', 'Not Specified', 'Not Specified', 1, 'Adam\'s House, Oakville, Ontario, Canada', '41.00', '57.00', '27.00', '13.00', '30', 2, 0, 0, '127.00', 0, '98', '21', '87', '87', 6, 'Soil Type and Related Conditions', '2016-11-17 16:17:27', '', 0),
(3, 1, '', '2016-10-17 13:35:27', '', 'Not Specified', 'Not Specified', 1, 'Location', '20.00', '282.00', '21.00', '291.00', '30', 1, 0, 0, '291.00', 1, '291', '291', '291', '291', 1, 'Text', '2016-11-17 16:17:27', '', 0),
(4, 6, 'John Doe\'s Estimate #1', '2016-11-17 15:58:11', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s House', '11.00', '11.00', '22.00', '33.00', '30', 1, 0, 0, '22.00', 1, '22', '22', '22', '22', 1, 'Cool Soil Type', '2016-11-17 16:17:27', '', 0),
(5, 6, 'John Doe\'s Estimate #2', '2016-11-17 15:58:11', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s Cottage', '11.00', '11.00', '11.00', '11.00', '30', 1, 0, 0, '11.00', 1, '11', '11', '11', '11', 1, 'Some soil stuff.', '2016-11-17 16:17:27', '', 0),
(6, 6, 'John Doe\'s Estimate #3', '2016-11-17 15:59:54', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s Apartment', '11.00', '11.00', '11.00', '11.00', '30', 1, 0, 0, '11.00', 1, '11', '11', '11', '11', 1, 'Soil soil soil', '2016-11-17 16:17:27', '', 0),
(7, 6, 'John Doe\'s Estimate #4', '2016-11-17 15:59:54', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s Park', '11.00', '11.00', '11.00', '11.00', '30', 1, 0, 0, '11.00', 1, '11', '11', '11', '11', 1, 'Soil soil soil', '2016-11-17 16:17:27', '', 0),
(8, 6, 'Adam\'s Project', '2016-11-24 14:43:40', 'Soon', '2241 Carpenters', 'Adam Luxton', 1, 'Oakville, Ontario', '11.11', '11.11', '11.11', '11.11', '30', 1, 0, 0, '11.11', 1, '11', '11', '11', '11', 1, 'Hello', '2016-11-24 14:43:40', 'Here are some comments', 0),
(9, 6, 'Project 2', '2016-11-25 11:10:42', 'Soon', '1111 Somewhere', 'Adam', 1, 'Somewhere', '99.66', '11.22', '0.12', '0.12', '30', 1, 0, 0, '11.11', 1, '11', '11', '11', '11', 1, 'Text', '2016-11-25 11:10:42', 'Text', 0),
(10, 6, 'Adam\'s Project 2', '2016-11-25 06:30:42', 'Soon', '2241 Carpenters', 'Adam Luxton', 1, 'Oakville, Ontario', '11.11', '11.11', '11.11', '0.12', '30', 1, 0, 0, '11.11', 1, '11', '11', '11', '11', 1, 'Hello', '2016-11-25 13:30:42', 'Comments', 0),
(11, 6, 'Project 2', '2016-12-01 05:36:12', '', '1111 Somewhere', 'Bob', 1, 'Somewhere', '99.66', '11.22', '0.12', '0.12', '30', 1, 0, 0, '11.11', 1, '11', '11', '11', '11', 1, 'Text', '2016-12-01 12:36:12', 'comments', 0),
(12, 6, 'Project 3', '2016-12-06 05:32:53', '', '1111 Somewhere', 'Bob', 1, 'Somewhere', '99.66', '11.22', '0.12', '0.12', '30', 1, 0, 0, '11.11', 1, '11', '11', '11', '11', 1, 'Text', '2016-12-06 12:32:53', 'Comment new', 0),
(13, 6, 'New one', '2016-12-06 05:33:58', '', 'Not Specified', 'Not Specified', 1, 'John Doe\'s House', '11.00', '11.00', '22.00', '33.00', '30', 1, 0, 0, '22.00', 1, '22', '22', '22', '22', 1, 'Cool Soil Type', '2016-12-06 12:33:58', '', 0),
(14, 6, 'Testing', '2017-01-31 03:11:05', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:11:05', '11111', 0),
(15, 6, 'Testing', '2017-01-31 03:14:01', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:14:01', '11111', 0),
(16, 6, 'Testing 2', '2017-01-31 03:22:15', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:22:15', '11111', 0),
(17, 6, 'Testing 3', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:30:52', '11111', 0),
(18, 6, 'Testing 4', '2017-01-31 03:30:52', '', '', 'Testing', 1, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:34:25', '11111', 0),
(19, 6, 'Testing 5', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:35:25', '11111', 0),
(20, 6, 'Testing 6', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:37:49', '11111', 0),
(21, 6, 'Testing 8', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-02-14 12:31:45', '11111', 0),
(22, 6, 'Testing 8', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:39:13', '11111', 0),
(23, 6, 'Testing 9', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:50:50', '11111', 0),
(24, 6, 'Testing 11', '2017-01-31 03:30:52', '', '', 'Testing', 0, '', '1.11', '1.11', '0.44', '0.44', '30', 1, 0, 0, '1.11', 1, '1', '1', '1', '0', 1, '1', '2017-01-31 03:56:32', '11111', 0),
(25, 6, 'Adam Testing', '2017-01-31 16:43:10', '', '', 'Adam', 0, '', '1.00', '1.00', '1.00', '1.00', '30', 1, 0, 0, '1.00', 1, '1', '1', '1', '1', 1, '1', '2017-01-31 16:43:10', '1', 0),
(26, 6, 'Adam Testing', '2017-01-31 16:43:45', '', '', '1', 0, '', '1.00', '1.00', '1.00', '1.00', '30', 1, 0, 0, '1.00', 1, '1', '1', '1', '1', 1, '1', '2017-01-31 16:43:45', '1', 0),
(27, 6, 'Adamin tes', '2017-01-31 16:44:18', '', '', '11', 0, '', '1.00', '1.00', '1.00', '1.00', '30', 1, 0, 0, '1.00', 1, '1', '1', '1', '1', 1, '1', '2017-01-31 16:44:18', '1', 0),
(28, 6, 'a', '2017-01-31 16:44:48', '', '', '', 0, '', '1.00', '1.00', '1.00', '1.00', '30', 1, 0, 0, '1.00', 1, '1', '1', '1', '1', 1, '1', '2017-01-31 16:44:48', '1', 0),
(29, 6, 'Activity Check', '2017-01-31 16:45:28', '', '', '', 0, '', '1.00', '1.00', '1.00', '1.00', '30', 1, 0, 0, '1.00', 1, '1', '1', '1', '1', 1, '1', '2017-02-01 10:24:15', '1', 0),
(30, 6, 'Activity Check 2', '2017-02-01 10:26:17', '', '', 'Adam Luxton', 0, '', '1.00', '1.00', '1.00', '1.00', '30', 1, 0, 0, '1.00', 1, '1', '1', '1', '1', 1, '1', '2017-02-01 10:26:17', 'Comments', 0),
(31, 6, 'Activity Check 2', '2017-02-01 10:27:05', '', '', 'Adam Luxton', 0, '', '1.00', '1.00', '1.00', '1.00', '30', 1, 0, 0, '1.00', 1, '1', '1', '1', '1', 1, '1', '2017-02-01 10:27:05', 'Comments', 0),
(32, 6, 'Testing 9', '2017-02-14 12:32:38', '2017-02-08', '2241 Carpenters Circle', 'Adam', 1, 'Oakville', '1.00', '1.00', '0.01', '0.01', '30', 5, 0, 0, '1.00', 0, '1', '1', '1', '1', 0, '0', '2017-04-05 11:50:21', 'Comment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `products_id` smallint(5) UNSIGNED NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `product_number` tinyint(4) NOT NULL,
  `product_size` decimal(8,2) NOT NULL,
  `product_openarea` decimal(4,2) NOT NULL,
  `product_height` decimal(8,2) NOT NULL,
  `product_length` decimal(8,2) NOT NULL,
  `product_image` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`products_id`, `product_name`, `product_number`, `product_size`, `product_openarea`, `product_height`, `product_length`, `product_image`) VALUES
(1, 'CCG2', 25, '25.00', '0.40', '88.00', '228.60', 'ccg2-block-JB.svg'),
(2, 'CC35', 35, '35.00', '0.00', '114.30', '393.70', 'cc35-block-JB.svg'),
(3, 'CC45', 45, '45.00', '0.00', '139.70', '393.70', 'cc45-block-JB.svg'),
(4, 'CC70', 70, '70.00', '0.00', '215.90', '393.70', 'cc70-block-JB.svg'),
(5, 'CC90', 90, '90.00', '0.00', '215.90', '802.60', 'cc90-block-JB.svg');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `activity_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
  MODIFY `products_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
