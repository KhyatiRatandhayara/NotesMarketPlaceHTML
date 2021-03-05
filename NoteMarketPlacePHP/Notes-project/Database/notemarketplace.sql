-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 08:01 PM
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
(1, 'India', '+91', '2021-02-27 17:50:57', NULL, NULL, NULL, b'1'),
(2, 'Afghanistan', '+93', '2021-02-27 17:53:24', NULL, NULL, NULL, b'1'),
(3, 'Banglabesh', '+880', '2021-02-27 17:53:24', NULL, NULL, NULL, b'1'),
(4, 'China', '+86', '2021-02-27 17:53:24', NULL, NULL, NULL, b'1'),
(5, 'Japan', '+81', '2021-02-27 17:53:24', NULL, NULL, NULL, b'1');

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
(2, 4, 4, 3, b'1', NULL, '2021-03-04 12:14:41.0', b'1', 2, NULL, 'computer', 'CA', '2021-03-04 12:14:41', NULL, NULL, NULL),
(3, 4, 4, 3, b'1', NULL, '2021-03-04 12:15:45.0', b'1', 3, NULL, 'computer', 'IT', NULL, NULL, NULL, NULL),
(4, 14, 3, 1, b'1', NULL, '2021-03-04 12:16:38.0', b'0', 1, NULL, 'khyati', 'MBA', '2021-03-04 12:16:38', NULL, NULL, NULL),
(6, 12, 4, 1, b'1', NULL, '2021-03-04 12:17:50.0', b'0', 2, NULL, 'khyati', 'history', '2021-03-04 12:17:50', NULL, NULL, NULL),
(7, 1, 1, 3, b'1', NULL, '2021-03-04 12:32:17.0', b'1', 10, NULL, 'khyati', 'CA', '2021-03-04 12:32:17', NULL, NULL, NULL);

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
(1, 'MBA', 'Commerce stream subject', '2021-02-27 18:00:47', NULL, NULL, NULL, b'1'),
(2, 'IT', 'Engineering Stream Subject', '2021-02-27 18:00:47', NULL, NULL, NULL, b'1'),
(3, 'CA', 'Commerse Stream Subject', '2021-02-27 18:00:47', NULL, NULL, NULL, b'1'),
(4, 'Maths', 'Topics of Trigronometry', '2021-02-27 18:00:47', NULL, NULL, NULL, b'1'),
(5, 'Chemistry', 'Science Stream Subject', '2021-02-27 18:00:47', NULL, NULL, NULL, b'1'),
(6, 'History', 'History of India', '2021-02-27 18:00:47', NULL, NULL, NULL, b'1');

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
(1, 'Handwritten Notes', 'Notes which are written by hand', '2021-02-27 18:05:22', NULL, NULL, NULL, b'1'),
(2, 'University Notes', 'Which are Provided by different university', '2021-02-27 18:05:22', NULL, NULL, NULL, b'1'),
(3, 'Notebook', 'Reference books', '2021-02-27 18:05:22', NULL, NULL, NULL, b'1'),
(4, 'Novel', 'A book that tells a story about people and events', '2021-02-27 18:05:22', NULL, NULL, NULL, b'1');

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
(10, 'Female', 'Fe', 'Gender', NULL, 3, NULL, NULL, b'1'),
(11, 'Published', 'Approved', 'Notes Status', '2021-03-04 13:27:44', 3, NULL, NULL, b'1');

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
(1, 1, 3, NULL, NULL, '2021-03-03 01:46:29', 'khyati', 1, '../Members/1/1/DP_1614716189.jpg', 3, 12, 'nschfb', 'government', 1, 'fbbyg', '12', 'hdbvhfg', 2, '45756.00', '../Members/1/1/Preview_1614716189.jpg', '2021-03-03 01:46:29', NULL, NULL, NULL, b'0'),
(2, 1, 5, NULL, NULL, '2021-03-03 01:47:30', 'nnbbfrh', 1, '../Members/default/DP.jpg', 3, 12, 'nfhr', 'bbf h', 1, 'fbbyg', '235', 'hdbvhfg', 2, '45756.00', '../Members/1/2/Preview_1614716250.jpg', '2021-03-03 01:47:30', NULL, NULL, NULL, b'1'),
(4, 4, 3, NULL, NULL, '2021-03-03 11:04:23', 'nnbbfrh', 1, '../Members/default/DP.jpg', 2, 12, 'nfbhrgh', 'bbf h', 2, 'gth', '235', 'nbfh', 2, '12.00', '../Members/4/4/Preview_1614749664.jpg', '2021-03-03 11:04:23', NULL, NULL, NULL, b'0'),
(5, 4, 3, NULL, NULL, '2021-03-03 14:06:28', 'khyati', 1, '../Members/4/5/DP_1614760588.jpg', 1, 12, 'ndvhgnh', 'nbfh', 2, 'hffhyrb', '235', 'nbfh', 2, '45.00', '../Members/4/5/Preview_1614760588.jpg', '2021-03-03 14:06:28', NULL, NULL, NULL, b'0'),
(6, 4, 11, NULL, NULL, '2021-03-03 14:07:23', 'kashish', 3, '../Members/default/DP.jpg', 2, 12, 'dnvdbvfh', 'nbfh', 1, 'hffhyrb', '235', 'hdbvhfg', 2, '45.00', '../Members/4/6/Preview_1614760643.jpg', '2021-03-03 14:07:23', NULL, NULL, NULL, b'0'),
(7, 4, 11, NULL, NULL, '2021-03-03 14:08:29', 'notemarketplace', 6, '../Members/default/DP.jpg', 1, 12, 'nhbgth', 'nbfh', 4, 'hffhyrb', '12', 'hdbvhfg', 2, '12.20', '../Members/4/7/Preview_1614760709.jpg', '2021-03-03 14:08:29', NULL, NULL, NULL, b'1'),
(8, 4, 11, NULL, NULL, '2021-03-03 14:09:51', 'computer', 2, '../Members/4/8/DP_1614760791.png', 1, 12, 'dnvhgfv', 'nbfh', 1, 'fbbyg', '12', 'nbfh', 2, '12.12', '../Members/4/8/Preview_1614760792.jpg', '2021-03-03 14:09:51', NULL, NULL, NULL, b'1'),
(9, 4, 9, NULL, NULL, '2021-03-03 14:11:21', 'khyati', 4, '../Members/4/9/DP_1614760881.jpg', 3, 12, 'ndnc', 'bbf h', 3, 'fbbyg', '12', 'nbhgr', 1, '45.00', '../Members/4/9/Preview_1614760881.png', '2021-03-03 14:11:21', NULL, NULL, NULL, b'1'),
(10, 1, 11, NULL, NULL, '2021-03-03 21:15:19', 'khyati', 3, '../Members/default/DP.jpg', 1, 12, 'fgmmyb', 'government', 2, 'hffhyrb', '12', 'nbfh', 2, '45756.00', '../Members/1/10/Preview_1614786319.jpg', '2021-03-03 21:15:19', NULL, NULL, NULL, b'1'),
(11, 1, 9, NULL, NULL, '2021-03-03 21:15:31', 'khyati', 3, '../Members/default/DP.jpg', 1, 12, 'fgmmyb', 'government', 2, 'hffhyrb', '12', 'nbfh', 2, '45756.00', '../Members/1/11/Preview_1614786331.jpg', '2021-03-03 21:15:31', NULL, NULL, NULL, b'1'),
(12, 1, 3, NULL, NULL, '2021-03-03 21:15:35', 'khyati', 3, '../Members/default/DP.jpg', 1, 12, 'fgmmyb', 'government', 2, 'hffhyrb', '12', 'nbfh', 2, '45756.00', '../Members/1/12/Preview_1614786336.jpg', '2021-03-03 21:15:35', NULL, NULL, NULL, b'1'),
(13, 1, 11, NULL, NULL, '2021-03-03 21:16:17', 'khyati', 3, '../Members/default/DP.jpg', 1, 12, 'fgmmyb', 'government', 2, 'hffhyrb', '12', 'nbfh', 2, '45756.00', '../Members/1/13/Preview_1614786377.jpg', '2021-03-03 21:16:17', NULL, NULL, NULL, b'1'),
(14, 1, 3, NULL, NULL, '2021-03-03 21:16:21', 'khyati', 3, '../Members/default/DP.jpg', 1, 12, 'fgmmyb', 'government', 2, 'hffhyrb', '12', 'nbfh', 2, '45756.00', '../Members/1/14/Preview_1614786381.jpg', '2021-03-03 21:16:21', NULL, NULL, NULL, b'1'),
(15, 1, 3, NULL, NULL, '2021-03-03 21:16:25', 'khyati', 3, '../Members/default/DP.jpg', 1, 12, 'fgmmyb', 'government', 2, 'hffhyrb', '12', 'nbfh', 2, '45756.00', '../Members/1/15/Preview_1614786385.jpg', '2021-03-03 21:16:25', NULL, NULL, NULL, b'1'),
(16, 1, 11, NULL, NULL, '2021-03-03 21:16:28', 'khyati', 3, '../Members/default/DP.jpg', 1, 12, 'fgmmyb', 'government', 2, 'hffhyrb', '12', 'nbfh', 2, '45756.00', '../Members/1/16/Preview_1614786388.jpg', '2021-03-03 21:16:28', NULL, NULL, NULL, b'0'),
(17, 1, 9, NULL, NULL, '2021-03-03 21:16:31', 'khyati', 3, '../Members/default/DP.jpg', 1, 12, 'fgmmyb', 'government', 2, 'hffhyrb', '12', 'nbfh', 2, '45756.00', '../Members/1/17/Preview_1614786391.jpg', '2021-03-03 21:16:31', NULL, NULL, NULL, b'0'),
(18, 1, 3, NULL, NULL, '2021-03-03 21:16:34', 'khyati', 3, '../Members/default/DP.jpg', 1, 12, 'fgmmyb', 'government', 2, 'hffhyrb', '12', 'nbfh', 2, '45756.00', '../Members/1/18/Preview_1614786394.jpg', '2021-03-03 21:16:34', NULL, NULL, NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotereportedissues`
--

CREATE TABLE `sellernotereportedissues` (
  `Reportedissue_id` int(10) UNSIGNED NOT NULL,
  `Seller_note_id` int(11) UNSIGNED NOT NULL,
  `ReportedByID` int(11) UNSIGNED NOT NULL,
  `AgainstDownloadID` int(11) UNSIGNED NOT NULL,
  `Remarks` int(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 29, '1_1614715243pdf', '../Members/1/29/Attachements/1_1614715243.pdf', '2021-03-03 01:30:43', NULL, NULL, NULL, b'1'),
(2, 30, '2_1614715289pdf', '../Members/1/30/Attachements/2_1614715289.pdf', '2021-03-03 01:31:29', NULL, NULL, NULL, b'1'),
(4, 1, '4_1614716189pdf', '../Members/1/1/Attachements/4_1614716189.pdf', '2021-03-03 01:46:29', NULL, NULL, NULL, b'1'),
(5, 2, '5_1614716250pdf', '../Members/1/2/Attachements/5_1614716250.pdf', '2021-03-03 01:47:30', NULL, NULL, NULL, b'1'),
(6, 4, '6_1614749664pdf', '../Members/4/4/Attachements/6_1614749664.pdf', '2021-03-03 11:04:24', NULL, NULL, NULL, b'1'),
(7, 5, '7_1614760589pdf', '../Members/4/5/Attachements/7_1614760589.pdf', '2021-03-03 14:06:28', NULL, NULL, NULL, b'1'),
(8, 6, '8_1614760644pdf', '../Members/4/6/Attachements/8_1614760644.pdf', '2021-03-03 14:07:24', NULL, NULL, NULL, b'1'),
(9, 7, '9_1614760710pdf', '../Members/4/7/Attachements/9_1614760710.pdf', '2021-03-03 14:08:30', NULL, NULL, NULL, b'1'),
(10, 8, '10_1614760792pdf', '../Members/4/8/Attachements/10_1614760792.pdf', '2021-03-03 14:09:52', NULL, NULL, NULL, b'1'),
(11, 9, '11_1614760881pdf', '../Members/4/9/Attachements/11_1614760881.pdf', '2021-03-03 14:11:21', NULL, NULL, NULL, b'1'),
(13, 10, '13_1614786319pdf', '../Members/1/10/Attachements/13_1614786319.pdf', '2021-03-03 21:15:19', NULL, NULL, NULL, b'1'),
(14, 11, '14_1614786332pdf', '../Members/1/11/Attachements/14_1614786332.pdf', '2021-03-03 21:15:32', NULL, NULL, NULL, b'1'),
(15, 12, '15_1614786336pdf', '../Members/1/12/Attachements/15_1614786336.pdf', '2021-03-03 21:15:36', NULL, NULL, NULL, b'1'),
(16, 13, '16_1614786378pdf', '../Members/1/13/Attachements/16_1614786378.pdf', '2021-03-03 21:16:18', NULL, NULL, NULL, b'1'),
(17, 14, '17_1614786381pdf', '../Members/1/14/Attachements/17_1614786381.pdf', '2021-03-03 21:16:21', NULL, NULL, NULL, b'1'),
(18, 15, '18_1614786385pdf', '../Members/1/15/Attachements/18_1614786385.pdf', '2021-03-03 21:16:25', NULL, NULL, NULL, b'1'),
(19, 16, '19_1614786388pdf', '../Members/1/16/Attachements/19_1614786388.pdf', '2021-03-03 21:16:28', NULL, NULL, NULL, b'1'),
(20, 17, '20_1614786391pdf', '../Members/1/17/Attachements/20_1614786391.pdf', '2021-03-03 21:16:31', NULL, NULL, NULL, b'1'),
(21, 18, '21_1614786395pdf', '../Members/1/18/Attachements/21_1614786395.pdf', '2021-03-03 21:16:35', NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreviews`
--

CREATE TABLE `sellernotesreviews` (
  `Sellernotereview_id` int(11) UNSIGNED NOT NULL,
  `Seller_note_id` int(11) UNSIGNED NOT NULL,
  `ReviewedByID` int(11) UNSIGNED NOT NULL,
  `AgainstDownloadsID` int(11) UNSIGNED NOT NULL,
  `Rating` decimal(10,0) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `Profile_id` int(10) UNSIGNED NOT NULL,
  `User_id` int(11) UNSIGNED NOT NULL,
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) UNSIGNED DEFAULT NULL,
  `SecondaryEmail` varchar(100) NOT NULL,
  `Phonenumber_Countrycode` int(10) UNSIGNED NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `ProfilePicture` varchar(500) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Country` int(10) UNSIGNED NOT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 2, 'khyati', 'thakkar', 'khyatiratanghayara001@gmail.com', '1234567', b'1', NULL, NULL, NULL, NULL, b'1'),
(3, 1, 'sumit', 'thakkar', 'gopirathod@gmail.com', 'FbMRo-lJ', b'1', NULL, NULL, NULL, NULL, b'1'),
(4, 1, 'khyati', 'ratandhayara', 'kthakkar9426@gmail.com', '1234567', b'1', NULL, NULL, NULL, NULL, b'1'),
(5, 1, 'parag', 'ratandhayara', 'abcd@gmail.com', '12654332', b'0', NULL, NULL, NULL, NULL, b'1'),
(6, 1, 'sumit', 'thakkar', 'sumitthakkar890220@gmail.com', '1234567', b'0', NULL, NULL, NULL, NULL, b'1'),
(7, 1, 'sumit', 'thakkar', 'ndbhf@gmail.com', '1234', b'0', NULL, NULL, NULL, NULL, b'1');

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
  ADD KEY `ReportedByID` (`ReportedByID`),
  ADD KEY `AgainstDownloadID` (`AgainstDownloadID`);

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
  MODIFY `Country_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `Downloads_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `note_categories`
--
ALTER TABLE `note_categories`
  MODIFY `Category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `note_type`
--
ALTER TABLE `note_type`
  MODIFY `Type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `Refdata_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sellernote`
--
ALTER TABLE `sellernote`
  MODIFY `Seller_Note_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sellernotereportedissues`
--
ALTER TABLE `sellernotereportedissues`
  MODIFY `Reportedissue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  MODIFY `Sellattachement_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  MODIFY `Sellernotereview_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_configuration`
--
ALTER TABLE `system_configuration`
  MODIFY `Config_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `Profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `Userrole_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `sellernotereportedissues_ibfk_2` FOREIGN KEY (`ReportedByID`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `sellernotereportedissues_ibfk_3` FOREIGN KEY (`AgainstDownloadID`) REFERENCES `downloads` (`Downloads_id`);

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
  ADD CONSTRAINT `sellernotesreviews_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `downloads` (`Downloads_id`);

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
