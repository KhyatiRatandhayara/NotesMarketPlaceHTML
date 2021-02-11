-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 05:57 PM
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
-- Database: `notemarketplace_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `Country_id` int(11) UNSIGNED NOT NULL,
  `CountryName` varchar(100) NOT NULL,
  `CountryCode` int(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `AttachmentDownloadedDate` bit(1) DEFAULT NULL,
  `AttachmentDownloaded` bit(1) NOT NULL,
  `IsPaid` bit(1) NOT NULL,
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `SellingPrice` decimal(10,0) DEFAULT NULL,
  `NotesPreview` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `Downloaders` (`Downloaders`);

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
  ADD KEY `UserRole_id` (`UserRole_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `Country_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `Downloads_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note_categories`
--
ALTER TABLE `note_categories`
  MODIFY `Category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note_type`
--
ALTER TABLE `note_type`
  MODIFY `Type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `Refdata_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellernote`
--
ALTER TABLE `sellernote`
  MODIFY `Seller_Note_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellernotereportedissues`
--
ALTER TABLE `sellernotereportedissues`
  MODIFY `Reportedissue_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellernotesattachments`
--
ALTER TABLE `sellernotesattachments`
  MODIFY `Sellattachement_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `Userrole_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`Seller_note_id`) REFERENCES `sellernote` (`Seller_Note_id`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`Downloaders`) REFERENCES `users` (`User_id`);

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
