-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 11:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notemarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `Country_id` int(11) UNSIGNED NOT NULL,
  `CountryName` varchar(100) NOT NULL,
  `CountryCode` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`Country_id`, `CountryName`, `CountryCode`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'India', '91', '2021-02-27 17:50:57', 16, NULL, NULL, b'1'),
(2, 'Afghanistan', '93', '2021-02-27 17:53:24', 5, NULL, NULL, b'1'),
(3, 'Banglabesh', '880', '2021-02-27 17:53:24', 8, NULL, NULL, b'1'),
(4, 'China', '86', '2021-02-27 17:53:24', 16, NULL, NULL, b'1'),
(5, 'Japan', '81', '2021-02-27 17:53:24', 5, NULL, NULL, b'1'),
(6, 'Pakistan', '92', '2021-03-30 16:51:25', 8, '2021-03-30 16:51:25', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `Downloads_id` int(11) UNSIGNED NOT NULL,
  `Seller_note_id` int(11) UNSIGNED NOT NULL,
  `Seller` int(11) UNSIGNED NOT NULL,
  `Downloaders` int(11) UNSIGNED NOT NULL,
  `SellerAllowedDownload` bit(1) NOT NULL,
  `AttachmentPath` varchar(255) DEFAULT NULL,
  `AttachmentDownloadedDate` datetime(1) DEFAULT NULL,
  `AttachmentDownloaded` bit(1) NOT NULL,
  `IsPaid` int(10) UNSIGNED NOT NULL,
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`Downloads_id`, `Seller_note_id`, `Seller`, `Downloaders`, `SellerAllowedDownload`, `AttachmentPath`, `AttachmentDownloadedDate`, `AttachmentDownloaded`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(1, 1, 4, 2, b'1', '../Members/4/1/Attachements/2_1616846478.pdf', '2021-04-09 19:34:20.0', b'1', 1, '400', 'notemarketplace', 'CA', '2021-04-09 19:34:20', 2, '2021-04-09 19:34:20', NULL),
(2, 2, 4, 2, b'1', '../Members/4/2/Attachements/3_1616846497.pdf', '2021-04-09 19:35:13.0', b'1', 1, '45756', 'computer', 'MBA', '2021-04-09 19:35:13', 2, '2021-04-09 19:35:13', NULL),
(3, 2, 4, 2, b'1', '../Members/4/2/Attachements/4_1616846498.pdf', '2021-04-09 19:35:13.0', b'1', 1, '45756', 'computer', 'MBA', '2021-04-09 19:35:13', 2, '2021-04-09 19:35:13', NULL),
(4, 5, 9, 3, b'1', '../Members/4/5/Attachements/9_1616846523.pdf', '2021-04-10 11:28:03.0', b'1', 2, '0', 'design engineering', 'Maths', '2021-04-10 11:28:03', 3, '2021-04-10 11:28:03', NULL),
(5, 5, 9, 3, b'1', '../Members/4/5/Attachements/10_1616846523.pdf', '2021-04-10 11:28:03.0', b'1', 2, '0', 'design engineering', 'Maths', '2021-04-10 11:28:03', 3, '2021-04-10 11:28:03', NULL),
(6, 24, 8, 13, b'0', '../Members/8/24/Attachements/42_1618042557.pdf', '2021-04-10 14:04:27.0', b'1', 1, '45', 'business intelligence', 'Account', '2021-04-10 14:04:27', 13, '2021-04-10 14:04:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `note_categories`
--

CREATE TABLE `note_categories` (
  `Category_id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note_categories`
--

INSERT INTO `note_categories` (`Category_id`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'MBA', 'Commerce stream subject', '2021-02-27 18:00:47', 16, NULL, NULL, b'1'),
(2, 'IT', 'Engineering  Stream Subject', '2021-02-27 18:00:47', 5, NULL, NULL, b'1'),
(3, 'CA', 'Commerse Stream Subject', '2021-02-27 18:00:47', 8, NULL, NULL, b'1'),
(4, 'Maths', 'Topics of Trigronometry', '2021-02-27 18:00:47', 16, NULL, NULL, b'1'),
(5, 'Chemistry', 'Science Stream Subject', '2021-02-27 18:00:47', 5, NULL, NULL, b'1'),
(6, 'History', 'History of India', '2021-02-27 18:00:47', 8, NULL, NULL, b'1'),
(7, 'Account', 'Commerse Stream', '2021-03-30 16:40:42', 16, NULL, NULL, b'1'),
(8, 'Science', 'Science Stream', '2021-03-30 16:52:54', 5, '2021-03-30 16:52:54', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `note_type`
--

CREATE TABLE `note_type` (
  `Type_id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note_type`
--

INSERT INTO `note_type` (`Type_id`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Handwritten Notes', 'Notes which are written by hand', '2021-02-27 18:05:22', 16, NULL, NULL, b'1'),
(2, 'University Notes', 'Which are Provided by different university', '2021-02-27 18:05:22', 5, NULL, NULL, b'1'),
(3, 'Notebook', 'Reference Book', '2021-02-27 18:05:22', 8, NULL, NULL, b'1'),
(4, 'Novel', 'A book that tells a story about people and events', '2021-02-27 18:05:22', 16, NULL, NULL, b'1'),
(5, 'IT ', ' Coded Book', '2021-03-30 17:05:05', 5, '2021-03-30 17:05:05', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `reference_data`
--

CREATE TABLE `reference_data` (
  `Refdata_id` int(11) UNSIGNED NOT NULL,
  `Value` varchar(100) NOT NULL,
  `DataValue` varchar(100) NOT NULL,
  `RefCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reference_data`
--

INSERT INTO `reference_data` (`Refdata_id`, `Value`, `DataValue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Paid', 'P', 'Selling Mode', '2021-02-27 17:54:46', 3, NULL, NULL, b'1'),
(2, 'Free', 'F', 'Selling Mode', '2021-02-27 17:54:46', 3, NULL, NULL, b'1'),
(3, 'Draft', 'Draft', 'Notes Status', '2021-02-28 01:58:18', 3, NULL, NULL, b'1'),
(4, 'Submitted For Review', 'Submitted For Review', 'Notes Status', '2021-02-28 01:58:18', 3, NULL, NULL, b'1'),
(5, 'In Review', 'In Review', 'Notes Status', '2021-02-28 01:58:18', 3, NULL, NULL, b'1'),
(6, 'Approved', 'Approved', 'Notes Status', '2021-02-28 01:58:18', 3, NULL, NULL, b'1'),
(7, 'Rejected', 'Rejected', 'Notes Status', '2021-02-28 01:58:18', 3, NULL, NULL, b'1'),
(8, 'Removed', 'Removed', 'Notes Status', '2021-02-28 01:58:18', 3, NULL, NULL, b'1'),
(9, 'Male', 'M', 'Gender', '2021-02-28 02:03:14', 3, NULL, NULL, b'1'),
(10, 'Female', 'Fe', 'Gender', '2021-03-11 19:42:12', 3, NULL, NULL, b'1'),
(11, 'Published', 'Approved', 'Notes Status', '2021-03-04 13:27:44', 3, NULL, NULL, b'1'),
(12, 'Other', 'O', 'Gender', '2021-03-11 19:43:46', 3, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernote`
--

CREATE TABLE `sellernote` (
  `Seller_Note_id` int(11) UNSIGNED NOT NULL,
  `Seller_id` int(11) UNSIGNED NOT NULL,
  `Status` int(11) UNSIGNED NOT NULL,
  `ActionedBy` int(11) UNSIGNED DEFAULT NULL,
  `AdminRemarks` varchar(255) DEFAULT NULL,
  `PublishedDate` datetime DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` int(11) UNSIGNED NOT NULL,
  `DisplayPicture` varchar(500) DEFAULT NULL,
  `NoteType` int(11) UNSIGNED DEFAULT NULL,
  `NumberofPages` int(11) DEFAULT NULL,
  `Description` varchar(255) NOT NULL,
  `UniversityName` varchar(200) DEFAULT NULL,
  `Country` int(11) UNSIGNED DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `CourseCode` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `Ispaid` int(11) UNSIGNED NOT NULL,
  `SellingPrice` decimal(10,2) DEFAULT NULL,
  `NotesPreview` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernote`
--

INSERT INTO `sellernote` (`Seller_Note_id`, `Seller_id`, `Status`, `ActionedBy`, `AdminRemarks`, `PublishedDate`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `Ispaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 4, 11, 8, NULL, '2021-03-27 17:31:17', 'notemarketplace', 3, '../Members/4/15/DP_1616847759.jpg', 2, 12, 'notemarketplace', 'government', 1, 'computer science', '121', 'kpk', 1, '400.00', '../Members/4/1/Preview_1616846477.pdf', '2021-03-27 17:31:17', NULL, NULL, NULL, b'1'),
(2, 4, 11, 8, NULL, '2021-03-27 17:31:37', 'computer', 1, '../Members/4/0/DP_1616847452.jpg', 1, 12, 'notemarketplace', 'government', 1, 'computer science', '121', 'kp kandoriya', 1, '45756.00', '../Members/4/2/Preview_1616846497.pdf', '2021-03-27 17:31:37', NULL, NULL, NULL, b'1'),
(3, 4, 3, NULL, NULL, '2021-03-27 17:31:46', 'engineering', 2, '../Members/4/15/DP_1616847759.jpg', 3, 12, 'notemarketplace', 'government', 2, 'computer science', '121', 'prof kpk', 1, '45756.00', '../Members/4/3/Preview_1616846506.pdf', '2021-03-27 17:31:46', NULL, NULL, NULL, b'1'),
(4, 4, 3, NULL, NULL, '2021-03-27 17:31:56', 'computer graphics', 3, '../Members/4/0/DP_1616847680.jpg', 4, 12, 'notemarketplace', 'government of gujrat', 3, 'computer science', '12', 'kp rathod', 1, '4500.00', '../Members/4/4/Preview_1616846516.pdf', '2021-03-27 17:31:56', NULL, NULL, NULL, b'1'),
(5, 9, 11, 18, NULL, '2021-03-27 17:32:03', 'design engineering', 4, '../Members/4/15/DP_1616847759.jpg', 1, 12, 'notemarketplace', 'government', 4, 'computer science', '121', 'pooja rathod', 2, '0.00', '../Members/4/5/Preview_1616846523.pdf', '2021-03-27 17:32:03', NULL, NULL, NULL, b'1'),
(6, 9, 5, 18, NULL, '2021-03-27 17:32:11', 'physics', 1, '../Members/4/0/DP_1616847414.jpg', 2, 12, 'notemarketplace', 'government', 1, 'computer science', '121', 'khushali', 2, '0.00', '../Members/4/6/Preview_1616846531.pdf', '2021-03-27 17:32:11', NULL, NULL, NULL, b'1'),
(7, 3, 5, 18, NULL, '2021-03-27 17:34:39', 'chemistry', 5, '../Members/4/0/DP_1616847430.jpg', 3, 12, 'notemarketplace', 'gtu', 3, 'computer science', '121', 'siddhi', 1, '50.00', '../Members/4/7/Preview_1616846679.pdf', '2021-03-27 17:34:39', NULL, NULL, NULL, b'1'),
(8, 4, 11, 8, NULL, '2021-03-27 17:34:43', 'maths', 2, '../Members/4/0/DP_1616847452.jpg', 4, 12, 'notemarketplace', 'government', 1, 'computer science', '121', 'kpk', 2, '450.00', '../Members/4/8/Preview_1616846683.pdf', '2021-03-27 17:34:43', NULL, NULL, NULL, b'1'),
(9, 9, 5, 18, NULL, '2021-03-27 17:34:46', 'design engineering', 4, '../Members/4/0/DP_1616847452.jpg', 2, 12, 'notemarketplace', 'government', 1, 'maths', '121', 'professor', 2, '0.00', '../Members/4/9/Preview_1616846686.pdf', '2021-03-27 17:34:46', NULL, NULL, NULL, b'1'),
(10, 4, 8, 18, 'removed', '2021-03-27 17:34:48', 'compiler design', 1, '../Members/4/0/DP_1616847452.jpg', 3, 12, 'notemarketplace', 'bhavnagar university', 1, 'computer science', '121', 'kpk', 1, '45756.00', '../Members/4/10/Preview_1616846689.pdf', '2021-03-27 17:34:48', NULL, NULL, NULL, b'1'),
(11, 2, 11, 5, NULL, '2021-03-27 17:34:52', 'mcwc', 2, '../Members/4/0/DP_1616847662.jpg', 1, 12, 'notemarketplace', 'gujraat university', 1, 'computer science', '121', 'siddhi', 1, '200.00', '../Members/4/11/Preview_1616846693.pdf', '2021-03-27 17:34:52', NULL, NULL, NULL, b'1'),
(12, 4, 11, 8, NULL, '2021-03-27 17:34:55', 'artificial intelligence', 3, '../Members/4/0/DP_1616847452.jpg', 2, 12, 'notemarketplace', 'government', 1, 'computer science', '121', 'kpk', 2, '0.00', '../Members/4/12/Preview_1616846696.pdf', '2021-03-27 17:34:55', NULL, NULL, NULL, b'1'),
(13, 9, 11, 8, NULL, '2021-03-27 17:35:00', 'python', 1, '../Members/4/15/DP_1616847759.jpg', 4, 12, 'notemarketplace', 'maharastra', 1, 'computer science', '121', 'sahistabanu machhar', 1, '45756.00', '../Members/4/13/Preview_1616846701.pdf', '2021-03-27 17:35:00', NULL, NULL, NULL, b'1'),
(14, 4, 7, 18, 'mistake', '2021-03-27 17:44:49', 'notemarketplace', 5, '../Members/4/0/DP_1616847452.jpg', 3, 12, 'notemarketplace', 'government', 1, 'computer science', '121', 'kpk', 1, '90.00', '../Members/4/14/Preview_1616847289.pdf', '2021-03-27 17:44:49', NULL, NULL, NULL, b'1'),
(15, 4, 7, 5, 'invaid book', '2021-03-27 17:52:39', 'biology', 6, '../Members/4/15/DP_1616847759.jpg', 1, 14, 'notemarketplace', 'maharastra', 3, 'maths', '12', 'hdbvhfg', 2, '0.00', '../Members/4/15/Preview_1616847760.pdf', '2021-03-27 17:52:39', NULL, NULL, NULL, b'1'),
(16, 7, 7, 18, 'invaid book', '2021-03-27 18:49:47', 'mathematics', 4, '../Members/7/16/DP_1616851187.jpg', 4, 14, 'mathematics description', 'punjab university', 3, 'notemaketplace', '121', 'prof nimvat', 1, '12.00', '../Members/7/16/Preview_1616851187.pdf', '2021-03-27 18:49:47', NULL, NULL, NULL, b'1'),
(17, 7, 5, NULL, NULL, '2021-03-27 18:49:55', 'python', 4, '../Members/7/17/DP_1616851195.jpg', 4, 14, 'mathematics description', 'punjab university', 4, 'notemaketplace', '121', 'prof kpk', 1, '12.00', '../Members/7/17/Preview_1616851195.pdf', '2021-03-27 18:49:55', NULL, NULL, NULL, b'1'),
(18, 7, 3, NULL, NULL, '2021-03-27 18:49:59', 'chemistry', 4, '../Members/4/0/DP_1616847452.jpg', 4, 14, 'mathematics description', 'punjab university', 3, 'notemaketplace', '67', 'prof nimvat', 2, '0.00', '../Members/7/18/Preview_1616851200.pdf', '2021-03-27 18:49:59', NULL, NULL, NULL, b'1'),
(19, 7, 3, NULL, NULL, '2021-03-27 18:50:05', 'design engineering', 4, '../Members/4/0/DP_1616847452.jpg', 4, 14, 'mathematics description', 'punjab university', 1, 'notemaketplace', '100', 'prof rathod', 1, '12.00', '../Members/7/19/Preview_1616851205.pdf', '2021-03-27 18:50:05', NULL, NULL, NULL, b'1'),
(20, 4, 3, NULL, NULL, '2021-04-01 22:30:19', 'notemarketplace', 2, '../Members/4/0/DP_1616847452.jpg', 2, 12, 'chfvgy', 'nbfh', 3, 'notemaketplace', '12', 'nbfh', 1, '12.00', '../Members/4/20/Preview_1617296420.pdf', '2021-04-01 22:30:19', NULL, NULL, NULL, b'1'),
(21, 3, 3, NULL, NULL, '2021-04-09 17:50:25', 'commerse', 7, '../Members/3/21/DP_1617970825.jpg', 1, 13, 'commerse book', 'commerce institute', 3, 'account', '121', 'kpk', 1, '12.00', '../Members/3/21/Preview_1617970825.pdf', '2021-04-09 17:50:25', NULL, NULL, NULL, b'1'),
(24, 8, 11, 5, NULL, '2021-04-10 13:45:57', 'business intelligence', 7, '../Members/default/N.jpg', 2, 13, 'business', 'government', 1, 'inteligence', '12', 'kpk', 1, '45.00', '../Members/8/24/Preview_1618042557.pdf', '2021-04-10 13:45:57', NULL, NULL, NULL, b'1'),
(25, 13, 11, 8, NULL, '2021-04-10 13:59:59', 'AI ', 8, '../Members/13/25/DP_1618043399.jpg', 5, 14, 'artificial intelligence', 'government', 4, 'notemaketplace', '12', 'kpk', 1, '45.00', '../Members/13/25/Preview_1618043399.pdf', '2021-04-10 13:59:59', NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotereportedissues`
--

CREATE TABLE `sellernotereportedissues` (
  `Reportedissue_id` int(10) UNSIGNED NOT NULL,
  `Seller_note_id` int(11) UNSIGNED NOT NULL,
  `ReportedByID` int(11) UNSIGNED NOT NULL,
  `AgainstDownloadID` int(11) UNSIGNED NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotereportedissues`
--

INSERT INTO `sellernotereportedissues` (`Reportedissue_id`, `Seller_note_id`, `ReportedByID`, `AgainstDownloadID`, `Remarks`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(1, 9, 3, 4, 'inappropriate', NULL, NULL, '2021-04-09 12:02:46', NULL),
(2, 6, 3, 4, 'invalid', NULL, NULL, '2021-04-09 10:56:28', NULL),
(4, 9, 3, 4, 'invalid content', NULL, NULL, '2021-04-09 11:56:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesattachments`
--

CREATE TABLE `sellernotesattachments` (
  `Sellattachement_id` int(11) UNSIGNED NOT NULL,
  `Seller_note_id` int(11) UNSIGNED NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FilePath` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesattachments`
--

INSERT INTO `sellernotesattachments` (`Sellattachement_id`, `Seller_note_id`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(2, 1, '2_1616846478pdf', '../Members/4/1/Attachements/2_1616846478.pdf', '2021-03-27 17:31:18', NULL, NULL, NULL, b'1'),
(3, 2, '3_1616846497pdf', '../Members/4/2/Attachements/3_1616846497.pdf', '2021-03-27 17:31:37', NULL, NULL, NULL, b'1'),
(4, 2, '4_1616846498pdf', '../Members/4/2/Attachements/4_1616846498.pdf', '2021-03-27 17:31:38', NULL, NULL, NULL, b'1'),
(5, 3, '5_1616846506pdf', '../Members/4/3/Attachements/5_1616846506.pdf', '2021-03-27 17:31:46', NULL, NULL, NULL, b'1'),
(6, 3, '6_1616846507pdf', '../Members/4/3/Attachements/6_1616846507.pdf', '2021-03-27 17:31:46', NULL, NULL, NULL, b'1'),
(7, 4, '7_1616846516pdf', '../Members/4/4/Attachements/7_1616846516.pdf', '2021-03-27 17:31:56', NULL, NULL, NULL, b'1'),
(8, 4, '8_1616846516pdf', '../Members/4/4/Attachements/8_1616846516.pdf', '2021-03-27 17:31:56', NULL, NULL, NULL, b'1'),
(9, 5, '9_1616846523pdf', '../Members/4/5/Attachements/9_1616846523.pdf', '2021-03-27 17:32:03', NULL, NULL, NULL, b'1'),
(10, 5, '10_1616846523pdf', '../Members/4/5/Attachements/10_1616846523.pdf', '2021-03-27 17:32:03', NULL, NULL, NULL, b'1'),
(11, 6, '11_1616846531pdf', '../Members/4/6/Attachements/11_1616846531.pdf', '2021-03-27 17:32:11', NULL, NULL, NULL, b'1'),
(12, 6, '12_1616846531pdf', '../Members/4/6/Attachements/12_1616846531.pdf', '2021-03-27 17:32:11', NULL, NULL, NULL, b'1'),
(13, 7, '13_1616846679pdf', '../Members/4/7/Attachements/13_1616846679.pdf', '2021-03-27 17:34:39', NULL, NULL, NULL, b'1'),
(14, 7, '0_1617976910pdf', '../Members/3/0/Attachements/0_1617976910.pdf', '2021-03-27 17:34:39', NULL, NULL, NULL, b'1'),
(15, 8, '15_1616846683pdf', '../Members/4/8/Attachements/15_1616846683.pdf', '2021-03-27 17:34:43', NULL, NULL, NULL, b'1'),
(16, 8, '16_1616846683pdf', '../Members/4/8/Attachements/16_1616846683.pdf', '2021-03-27 17:34:43', NULL, NULL, NULL, b'1'),
(17, 9, '17_1616846686pdf', '../Members/4/9/Attachements/17_1616846686.pdf', '2021-03-27 17:34:46', NULL, NULL, NULL, b'1'),
(18, 9, '18_1616846686pdf', '../Members/4/9/Attachements/18_1616846686.pdf', '2021-03-27 17:34:46', NULL, NULL, NULL, b'1'),
(19, 10, '19_1616846689pdf', '../Members/4/10/Attachements/19_1616846689.pdf', '2021-03-27 17:34:49', NULL, NULL, NULL, b'1'),
(20, 10, '20_1616846689pdf', '../Members/4/10/Attachements/20_1616846689.pdf', '2021-03-27 17:34:49', NULL, NULL, NULL, b'1'),
(21, 11, '21_1616846693pdf', '../Members/4/11/Attachements/21_1616846693.pdf', '2021-03-27 17:34:53', NULL, NULL, NULL, b'1'),
(22, 11, '22_1616846693pdf', '../Members/4/11/Attachements/22_1616846693.pdf', '2021-03-27 17:34:53', NULL, NULL, NULL, b'1'),
(23, 12, '23_1616846696pdf', '../Members/4/12/Attachements/23_1616846696.pdf', '2021-03-27 17:34:56', NULL, NULL, NULL, b'1'),
(24, 12, '24_1616846696pdf', '../Members/4/12/Attachements/24_1616846696.pdf', '2021-03-27 17:34:56', NULL, NULL, NULL, b'1'),
(25, 13, '25_1616846701pdf', '../Members/4/13/Attachements/25_1616846701.pdf', '2021-03-27 17:35:01', NULL, NULL, NULL, b'1'),
(26, 13, '26_1616846701pdf', '../Members/4/13/Attachements/26_1616846701.pdf', '2021-03-27 17:35:01', NULL, NULL, NULL, b'1'),
(27, 14, '27_1616847289pdf', '../Members/4/14/Attachements/27_1616847289.pdf', '2021-03-27 17:44:49', NULL, NULL, NULL, b'1'),
(28, 14, '28_1616847289pdf', '../Members/4/14/Attachements/28_1616847289.pdf', '2021-03-27 17:44:49', NULL, NULL, NULL, b'1'),
(29, 16, '29_1616851187pdf', '../Members/7/16/Attachements/29_1616851187.pdf', '2021-03-27 18:49:47', NULL, NULL, NULL, b'1'),
(30, 17, '30_1616851195pdf', '../Members/7/17/Attachements/30_1616851195.pdf', '2021-03-27 18:49:55', NULL, NULL, NULL, b'1'),
(31, 18, '31_1616851200pdf', '../Members/7/18/Attachements/31_1616851200.pdf', '2021-03-27 18:50:00', NULL, NULL, NULL, b'1'),
(32, 19, '32_1616851205pdf', '../Members/7/19/Attachements/32_1616851205.pdf', '2021-03-27 18:50:05', NULL, NULL, NULL, b'1'),
(33, 20, '33_1617296420pdf', '../Members/4/20/Attachements/33_1617296420.pdf', '2021-04-01 22:30:20', NULL, NULL, NULL, b'1'),
(35, 21, '35_1617970826pdf', '../Members/3/21/Attachements/35_1617970826.pdf', '2021-04-09 17:50:25', NULL, NULL, NULL, b'1'),
(42, 24, '42_1618042557pdf', '../Members/8/24/Attachements/42_1618042557.pdf', '2021-04-10 13:45:57', NULL, NULL, NULL, b'1'),
(43, 25, '43_1618043399pdf', '../Members/13/25/Attachements/43_1618043399.pdf', '2021-04-10 13:59:59', NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreviews`
--

CREATE TABLE `sellernotesreviews` (
  `Sellernotereview_id` int(11) UNSIGNED NOT NULL,
  `Seller_note_id` int(11) UNSIGNED NOT NULL,
  `ReviewedByID` int(11) UNSIGNED NOT NULL,
  `AgainstDownloadsID` int(11) UNSIGNED NOT NULL,
  `Rating` decimal(10,3) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesreviews`
--

INSERT INTO `sellernotesreviews` (`Sellernotereview_id`, `Seller_note_id`, `ReviewedByID`, `AgainstDownloadsID`, `Rating`, `Comments`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 1, 3, 4, '4.716', 'wonderful book....yeahh', '2021-03-27 18:31:09', 1, '2021-03-27 18:31:09', 1, b'1'),
(2, 1, 2, 4, '4.652', 'very useful', '2021-03-27 18:34:24', 1, '2021-03-27 18:34:24', 1, b'1'),
(3, 1, 5, 4, '4.521', 'amazing...', '2021-03-27 18:36:54', 1, '2021-03-27 18:36:54', 1, b'1'),
(4, 11, 5, 4, '3.698', 'dnvh', '2021-04-01 22:42:42', 1, '2021-04-01 22:42:42', 1, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `system_configuration`
--

CREATE TABLE `system_configuration` (
  `Config_id` int(11) UNSIGNED NOT NULL,
  `ConfigKey` varchar(100) NOT NULL,
  `Value` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_configuration`
--

INSERT INTO `system_configuration` (`Config_id`, `ConfigKey`, `Value`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'SE', 'sumitthakkar890220@gmail.com', NULL, NULL, NULL, NULL, b'1'),
(2, 'PN', '9428130115', NULL, NULL, NULL, NULL, b'1'),
(3, 'E', 'kinjalmehta@gmail.com', NULL, NULL, NULL, NULL, b'1'),
(4, 'FB', 'https://www.facebook.com/', NULL, NULL, NULL, NULL, b'1'),
(5, 'TW', 'https://twitter.com/', NULL, NULL, NULL, NULL, b'1'),
(6, 'LI', 'https://in.linkedin.com/', NULL, NULL, NULL, NULL, b'1'),
(7, 'NU', '../Members/Default_1617977714.jpg', NULL, NULL, NULL, NULL, b'1'),
(8, 'DP', '../Members/Default_1617977714.png', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `Profile_id` int(10) UNSIGNED NOT NULL,
  `User_id` int(11) UNSIGNED NOT NULL,
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) UNSIGNED DEFAULT NULL,
  `SecondaryEmail` varchar(100) DEFAULT NULL,
  `Phonenumber_Countrycode` int(10) UNSIGNED DEFAULT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `ProfilePicture` varchar(500) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Country` int(10) UNSIGNED DEFAULT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`Profile_id`, `User_id`, `DOB`, `Gender`, `SecondaryEmail`, `Phonenumber_Countrycode`, `PhoneNumber`, `ProfilePicture`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(2, 2, '2021-03-09 17:06:46', 9, 'sumitthakkar890220@gmail.com', 1, '94276655434', '../Members/2/DP_1616844860.png', 'Gayatri Nagar Sosayti', 'Gayatri Nagar Sosayti', 'Talaja', 'gujrat', '364140', 1, 'GTU', 'GECbvn', '2021-03-27 17:04:20', NULL, NULL, NULL),
(3, 3, '2021-03-22 17:06:50', 10, 'kthakkar9426@gmail.com', 1, '94276655434', '../Members/3/DP_1616844985.png', 'Gayatri Nagar Sosayti', 'Gayatri Nagar Sosayti', 'Talaja', 'Gujarat', '364140', 1, 'GTUbvn', 'GECbvn', '2021-03-27 17:06:25', NULL, NULL, NULL),
(4, 8, '0000-00-00 00:00:00', 9, 'kashishrathod@gmail.com', 1, '94276655434', '../Members/8/DP_1616845855.png', 'Gayatri Nagar Sosayti', 'Gayatri Nagar Sosayti', 'Talaja', 'Gujarat', 'Gujarat', 1, 'GTU', 'GECrajkot', '2021-03-27 17:09:22', NULL, NULL, NULL),
(13, 4, '2021-04-17 00:00:00', 10, 'paragthakkar890220@gmail.com', 1, '94276655433', '../Members/8/DP_1616845855.png', 'Gayatri Nagar Sosayti', 'Gayatri Nagar Sosayti', 'Talaja', 'Gujarat', '364140', 1, 'GTU', 'GEC', '2021-04-02 12:18:52', NULL, NULL, NULL),
(17, 12, '0000-00-00 00:00:00', 10, 'sumitthakkar890220@gmail.com', 1, '94276655433', ' ../Members/Default_1617977714.png', 'Gayatri Nagar Sosayti', 'Gayatri Nagar Sosayti', 'Talaja', 'Gujarat', '364140', 1, 'GTU', 'GECrajkot', '2021-04-09 20:12:35', NULL, NULL, NULL),
(18, 27, NULL, NULL, NULL, 1, ' ', NULL, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `Userrole_id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`Userrole_id`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'member', 'member who use the system', '2021-02-27 17:31:01', NULL, NULL, NULL, b'1'),
(2, 'admin', 'who manage the system', '2021-02-27 17:31:01', NULL, NULL, NULL, b'1'),
(3, 'superadmin', 'superadmin manage whole system', '2021-02-27 17:31:01', NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) UNSIGNED NOT NULL,
  `UserRole_id` int(11) UNSIGNED NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(24) NOT NULL,
  `IsEmailVerified` bit(1) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `UserRole_id`, `FirstName`, `LastName`, `Email`, `Password`, `IsEmailVerified`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 3, 'khyati', 'thakkar', 'khyatiratanghayara001@gmail.com', 'superadmin', b'1', '2021-03-30 13:49:09', NULL, NULL, NULL, b'1'),
(2, 1, 'lalu', 'rathod', 'harshrathod982002@gmail.com', 'lalu98', b'1', '2021-03-27 16:37:20', 0, '2021-03-27 16:37:20', 0, b'1'),
(3, 1, 'gopi', 'rathod', 'gopirathod1601@gmail.com', 'FbMRo-lJ', b'1', '2021-03-30 22:37:52', NULL, NULL, NULL, b'1'),
(4, 1, 'hiral', 'ratandhayara', 'kthakkar9426@gmail.com', 'khyati51', b'1', '2021-03-30 13:48:33', NULL, NULL, NULL, b'1'),
(5, 2, 'dhara', 'solanki', 'dharasorthiya111@gmail.com', '12654332', b'1', '2021-03-30 13:48:53', NULL, NULL, NULL, b'1'),
(7, 1, 'harsh', 'rathod', 'hrathod1137@gmail.com', '1234', b'1', '2021-03-30 13:48:57', NULL, NULL, NULL, b'1'),
(8, 2, 'kashish', 'rathod', 'kashishrathod531@gmail.com', 'kashish', b'1', '2021-03-30 13:49:01', NULL, NULL, NULL, b'1'),
(9, 1, 'sumit', 'thakkar', 'sumitthakkat@gmail.com', 'sumit06', b'1', '2021-03-30 13:49:05', NULL, NULL, NULL, b'1'),
(12, 1, 'khushali', 'thakkar', 'khushalithakkar890220@gmail.com', 'admin123', b'1', '2021-03-30 22:37:52', NULL, '2021-03-30 22:37:52', NULL, b'1'),
(13, 1, 'prince', 'ratandhayara', 'prince123@gmail.com', 'admin123', b'1', '2021-03-30 18:29:24', NULL, '2021-03-30 18:29:24', NULL, b'1'),
(16, 2, 'dhaval', 'thakkar', 'thakkarr890220@gmail.com', 'admin123', b'1', '2021-03-30 22:39:14', NULL, '2021-03-30 22:39:14', NULL, b'1'),
(17, 2, 'parag', 'thakkar', 'thakkar890220@gmail.com', 'admin123', b'1', '2021-03-30 22:39:59', NULL, '2021-03-30 22:39:59', NULL, b'1'),
(18, 2, 'hardik', 'thakkar', 'akkar890220@gmail.com', 'admin123', b'1', '2021-03-30 22:42:08', NULL, '2021-03-30 22:42:08', NULL, b'1'),
(27, 2, 'radhi', 'thakkar', 'radhi@gmail.com', 'admin123', b'1', '2021-04-10 12:44:09', 1, '2021-04-10 12:44:09', NULL, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`Country_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`Downloads_id`),
  ADD KEY `Seller_note_id` (`Seller_note_id`),
  ADD KEY `Seller` (`Seller`),
  ADD KEY `Downloaders` (`Downloaders`),
  ADD KEY `IsPaid` (`IsPaid`);

--
-- Indexes for table `note_categories`
--
ALTER TABLE `note_categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `note_type`
--
ALTER TABLE `note_type`
  ADD PRIMARY KEY (`Type_id`);

--
-- Indexes for table `reference_data`
--
ALTER TABLE `reference_data`
  ADD PRIMARY KEY (`Refdata_id`);

--
-- Indexes for table `sellernote`
--
ALTER TABLE `sellernote`
  ADD PRIMARY KEY (`Seller_Note_id`),
  ADD KEY `sellernote_ibfk_1` (`Seller_id`),
  ADD KEY `Status` (`Status`),
  ADD KEY `ActionedBy` (`ActionedBy`),
  ADD KEY `Category` (`Category`),
  ADD KEY `NoteType` (`NoteType`),
  ADD KEY `Country` (`Country`),
  ADD KEY `Ispaid` (`Ispaid`);

--
-- Indexes for table `sellernotereportedissues`
--
ALTER TABLE `sellernotereportedissues`
  ADD PRIMARY KEY (`Reportedissue_id`),
  ADD KEY `Seller_note_id` (`Seller_note_id`),
  ADD KEY `ReportedByID` (`ReportedByID`);

--
-- Indexes for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  ADD PRIMARY KEY (`Sellattachement_id`),
  ADD KEY `Seller_note_id` (`Seller_note_id`);

--
-- Indexes for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD PRIMARY KEY (`Sellernotereview_id`),
  ADD KEY `Seller_note_id` (`Seller_note_id`),
  ADD KEY `ReviewedByID` (`ReviewedByID`),
  ADD KEY `AgainstDownloadsID` (`AgainstDownloadsID`);

--
-- Indexes for table `system_configuration`
--
ALTER TABLE `system_configuration`
  ADD PRIMARY KEY (`Config_id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`Profile_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Gender` (`Gender`),
  ADD KEY `Phonenumber_Countrycode` (`Phonenumber_Countrycode`),
  ADD KEY `Country` (`Country`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`Userrole_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `UserRole_id` (`UserRole_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `Country_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `Downloads_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `note_categories`
--
ALTER TABLE `note_categories`
  MODIFY `Category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `note_type`
--
ALTER TABLE `note_type`
  MODIFY `Type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `Refdata_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sellernote`
--
ALTER TABLE `sellernote`
  MODIFY `Seller_Note_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sellernotereportedissues`
--
ALTER TABLE `sellernotereportedissues`
  MODIFY `Reportedissue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  MODIFY `Sellattachement_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  MODIFY `Sellernotereview_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_configuration`
--
ALTER TABLE `system_configuration`
  MODIFY `Config_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `Profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `Userrole_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`Seller_note_id`) REFERENCES `sellernote` (`Seller_Note_id`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`Downloaders`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `downloads_ibfk_4` FOREIGN KEY (`IsPaid`) REFERENCES `reference_data` (`Refdata_id`);

--
-- Constraints for table `sellernote`
--
ALTER TABLE `sellernote`
  ADD CONSTRAINT `sellernote_ibfk_1` FOREIGN KEY (`Seller_id`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `sellernote_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `reference_data` (`Refdata_id`),
  ADD CONSTRAINT `sellernote_ibfk_3` FOREIGN KEY (`ActionedBy`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `sellernote_ibfk_4` FOREIGN KEY (`Category`) REFERENCES `note_categories` (`Category_id`),
  ADD CONSTRAINT `sellernote_ibfk_5` FOREIGN KEY (`NoteType`) REFERENCES `note_type` (`Type_id`),
  ADD CONSTRAINT `sellernote_ibfk_6` FOREIGN KEY (`Country`) REFERENCES `countries` (`Country_id`),
  ADD CONSTRAINT `sellernote_ibfk_7` FOREIGN KEY (`Ispaid`) REFERENCES `reference_data` (`Refdata_id`);

--
-- Constraints for table `sellernotereportedissues`
--
ALTER TABLE `sellernotereportedissues`
  ADD CONSTRAINT `sellernotereportedissues_ibfk_1` FOREIGN KEY (`Seller_note_id`) REFERENCES `sellernote` (`Seller_Note_id`),
  ADD CONSTRAINT `sellernotereportedissues_ibfk_2` FOREIGN KEY (`ReportedByID`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  ADD CONSTRAINT `sellernotesattachments_ibfk_1` FOREIGN KEY (`Seller_note_id`) REFERENCES `sellernote` (`Seller_Note_id`);

--
-- Constraints for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD CONSTRAINT `sellernotesreviews_ibfk_1` FOREIGN KEY (`Seller_note_id`) REFERENCES `sellernote` (`Seller_Note_id`),
  ADD CONSTRAINT `sellernotesreviews_ibfk_2` FOREIGN KEY (`ReviewedByID`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `sellernotesreviews_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `userprofile_ibfk_2` FOREIGN KEY (`Gender`) REFERENCES `reference_data` (`Refdata_id`),
  ADD CONSTRAINT `userprofile_ibfk_3` FOREIGN KEY (`Phonenumber_Countrycode`) REFERENCES `countries` (`Country_id`),
  ADD CONSTRAINT `userprofile_ibfk_4` FOREIGN KEY (`Country`) REFERENCES `countries` (`Country_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserRole_id`) REFERENCES `userroles` (`Userrole_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
