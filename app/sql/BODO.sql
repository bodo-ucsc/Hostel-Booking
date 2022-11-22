-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 19, 2022 at 10:20 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BODO`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `AdminId` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ContactNumber` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `BoardingOwner`
--

CREATE TABLE `BoardingOwner` (
  `BoardingOwnerId` int(11) NOT NULL,
  `VerifiedStatus` varchar(10) NOT NULL,
  `NICScanLink` varchar(120) NOT NULL,
  `VerifiedBy` int(11) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ContactNumber` varchar(13) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `WorkPlace` varchar(100) DEFAULT NULL,
  `Occupation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `BoardingPlace`
--

CREATE TABLE `BoardingPlace` (
  `PlaceId` int(11) NOT NULL,
  `OwnerId` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `VerifiedStatus` varchar(10) NOT NULL,
  `UtilityBillReceiptLink` varchar(120) NOT NULL,
  `VerifiedBy` int(11) NOT NULL,
  `SummaryLine1` varchar(100) DEFAULT NULL,
  `SummaryLine2` varchar(100) DEFAULT NULL,
  `SummaryLine3` varchar(100) DEFAULT NULL,
  `Description` text NOT NULL,
  `Price` int(10) NOT NULL,
  `PriceType` varchar(11) NOT NULL,
  `HouseNo` varchar(5) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `CityName` varchar(40) NOT NULL,
  `GoogleMap` varchar(100) NOT NULL,
  `PropertyType` varchar(50) NOT NULL,
  `NoOfMembers` int(4) NOT NULL,
  `NoOfRooms` int(3) NOT NULL,
  `NoOfWashRooms` int(3) NOT NULL,
  `Gender` char(1) NOT NULL,
  `BoarderType` varchar(15) NOT NULL,
  `SquareFeet` int(4) NOT NULL,
  `Parking` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `BoardingPlacePicture`
--

CREATE TABLE `BoardingPlacePicture` (
  `BoardingPlace` int(11) NOT NULL,
  `PictureLink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `BoardingPlaceReminder`
--

CREATE TABLE `BoardingPlaceReminder` (
  `Tenant` int(11) NOT NULL,
  `ReminderType` varchar(20) NOT NULL,
  `NotificationStatus` varchar(10) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `BoardingPlaceRent`
--

CREATE TABLE `BoardingPlaceRent` (
  `Tenant` int(11) NOT NULL,
  `Month` varchar(10) NOT NULL,
  `PaymentStatus` varchar(20) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `BoardingPlaceTenant`
--

CREATE TABLE `BoardingPlaceTenant` (
  `PlaceId` int(11) NOT NULL,
  `TenantId` int(11) NOT NULL,
  `BoarderStatus` varchar(10) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `City`
--

CREATE TABLE `City` (
  `CityName` varchar(40) NOT NULL,
  `DistrictName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `Post` int(11) NOT NULL,
  `Commentor` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `District`
--

CREATE TABLE `District` (
  `DistrictName` varchar(40) NOT NULL,
  `ProvinceName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Friend`
--

CREATE TABLE `Friend` (
  `StudentFriendId` int(11) NOT NULL,
  `FriendId` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `FriendInvite`
--

CREATE TABLE `FriendInvite` (
  `Tenant` int(11) NOT NULL,
  `FriendId` int(11) NOT NULL,
  `PlaceId` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Issue`
--

CREATE TABLE `Issue` (
  `IssueId` int(11) NOT NULL,
  `RequestBy` int(11) NOT NULL,
  `RequestTo` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IssueTitle` varchar(125) NOT NULL,
  `IssueImageLink` varchar(125) NOT NULL,
  `IssueMessage` varchar(525) NOT NULL,
  `Issuestatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Like`
--

CREATE TABLE `Like` (
  `Post` int(11) NOT NULL,
  `Liker` int(11) NOT NULL,
  `Like` char(1) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `PostUpdate`
--

CREATE TABLE `PostUpdate` (
  `PostId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `PlaceId` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Caption` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Professional`
--

CREATE TABLE `Professional` (
  `ProfessionalId` int(11) NOT NULL,
  `VerifiedStatus` varchar(10) NOT NULL,
  `NICScanLink` varchar(120) NOT NULL,
  `VerifiedBy` int(11) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ContactNumber` varchar(13) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `WorkPlace` varchar(100) DEFAULT NULL,
  `Occupation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Province`
--

CREATE TABLE `Province` (
  `ProvinceName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ReviewRating`
--

CREATE TABLE `ReviewRating` (
  `ReviewId` int(11) NOT NULL,
  `Place` int(11) NOT NULL,
  `BoarderId` int(11) NOT NULL,
  `Rating` int(1) NOT NULL,
  `Review` varchar(500) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BoardingOwnerReply` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `StudentId` int(11) NOT NULL,
  `VerifiedStatus` varchar(10) NOT NULL,
  `NICScanLink` varchar(120) NOT NULL,
  `UniversityIDCopyLink` varchar(120) DEFAULT NULL,
  `UniversityAdmissionLetterCopyLink` varchar(120) DEFAULT NULL,
  `VerifiedBy` int(11) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ContactNumber` varchar(13) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `StudentUniversity` varchar(100) NOT NULL,
  `UniversityIDNo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Suggestion`
--

CREATE TABLE `Suggestion` (
  `SuggestionId` int(11) NOT NULL,
  `RequestBy` int(11) NOT NULL,
  `RequestTo` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `SuggestionTitle` varchar(125) NOT NULL,
  `SuggestionImageLink` varchar(125) NOT NULL,
  `SuggestionMessage` varchar(525) NOT NULL,
  `SUggestionstatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `University`
--

CREATE TABLE `University` (
  `UniversityName` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserId`, `FirstName`, `LastName`, `UserType`, `Username`, `Password`) VALUES
(4, 'Kasun', 'Pieris', 'VerificationTeam', 'kasun', '$2y$10$Bbgi9iLiOeZkVJu.7/7XyOq51O7JwHDDXCrY.CAO2Jkzrvyof0isK');

-- --------------------------------------------------------

--
-- Table structure for table `VerificationTeam`
--

CREATE TABLE `VerificationTeam` (
  `VerificationTeamId` int(11) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` char(1) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ContactNumber` varchar(13) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `VerificationTeam`
--

INSERT INTO `VerificationTeam` (`VerificationTeamId`, `DateOfBirth`, `Gender`, `NIC`, `Email`, `ContactNumber`, `Address`) VALUES
(4, '1986-10-12', 'm', '198612345678', 'kasun@bodo.com', '+94771234567', '31/2, Pieris Rd, Mt Lavinia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `BoardingOwner`
--
ALTER TABLE `BoardingOwner`
  ADD PRIMARY KEY (`BoardingOwnerId`),
  ADD UNIQUE KEY `NIC` (`NIC`,`ContactNumber`,`Email`),
  ADD KEY `VerifiedBy` (`VerifiedBy`);

--
-- Indexes for table `BoardingPlace`
--
ALTER TABLE `BoardingPlace`
  ADD PRIMARY KEY (`PlaceId`),
  ADD KEY `OwnerId` (`OwnerId`),
  ADD KEY `VerifiedBy` (`VerifiedBy`),
  ADD KEY `CityName` (`CityName`);

--
-- Indexes for table `BoardingPlacePicture`
--
ALTER TABLE `BoardingPlacePicture`
  ADD PRIMARY KEY (`BoardingPlace`,`PictureLink`);

--
-- Indexes for table `BoardingPlaceReminder`
--
ALTER TABLE `BoardingPlaceReminder`
  ADD PRIMARY KEY (`Tenant`,`DateTime`);

--
-- Indexes for table `BoardingPlaceRent`
--
ALTER TABLE `BoardingPlaceRent`
  ADD PRIMARY KEY (`Tenant`,`Month`);

--
-- Indexes for table `BoardingPlaceTenant`
--
ALTER TABLE `BoardingPlaceTenant`
  ADD PRIMARY KEY (`PlaceId`,`TenantId`),
  ADD KEY `TenantId` (`TenantId`);

--
-- Indexes for table `City`
--
ALTER TABLE `City`
  ADD PRIMARY KEY (`CityName`),
  ADD KEY `DistrictName` (`DistrictName`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`Post`,`Commentor`,`DateTime`),
  ADD KEY `UserId` (`Commentor`);

--
-- Indexes for table `District`
--
ALTER TABLE `District`
  ADD PRIMARY KEY (`DistrictName`),
  ADD KEY `ProvinceName` (`ProvinceName`);

--
-- Indexes for table `Friend`
--
ALTER TABLE `Friend`
  ADD PRIMARY KEY (`StudentFriendId`,`FriendId`),
  ADD KEY `FriendId` (`FriendId`);

--
-- Indexes for table `FriendInvite`
--
ALTER TABLE `FriendInvite`
  ADD PRIMARY KEY (`Tenant`,`FriendId`),
  ADD KEY `FriendId` (`FriendId`);

--
-- Indexes for table `Issue`
--
ALTER TABLE `Issue`
  ADD PRIMARY KEY (`IssueId`),
  ADD KEY `AdminId` (`RequestTo`),
  ADD KEY `UserId` (`RequestBy`);

--
-- Indexes for table `Like`
--
ALTER TABLE `Like`
  ADD PRIMARY KEY (`Post`,`Liker`,`DateTime`),
  ADD KEY `UserId` (`Liker`);

--
-- Indexes for table `PostUpdate`
--
ALTER TABLE `PostUpdate`
  ADD PRIMARY KEY (`PostId`),
  ADD KEY `PlaceId` (`PlaceId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `Professional`
--
ALTER TABLE `Professional`
  ADD PRIMARY KEY (`ProfessionalId`),
  ADD UNIQUE KEY `NIC` (`NIC`,`ContactNumber`,`Email`),
  ADD KEY `VerifiedBy` (`VerifiedBy`);

--
-- Indexes for table `Province`
--
ALTER TABLE `Province`
  ADD PRIMARY KEY (`ProvinceName`);

--
-- Indexes for table `ReviewRating`
--
ALTER TABLE `ReviewRating`
  ADD PRIMARY KEY (`ReviewId`),
  ADD KEY `BoarderId` (`BoarderId`),
  ADD KEY `PlaceId` (`Place`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentId`),
  ADD UNIQUE KEY `NIC` (`NIC`,`ContactNumber`,`Email`,`UniversityIDNo`),
  ADD KEY `StudentUniversity` (`StudentUniversity`),
  ADD KEY `VerifiedBy` (`VerifiedBy`);

--
-- Indexes for table `Suggestion`
--
ALTER TABLE `Suggestion`
  ADD PRIMARY KEY (`SuggestionId`),
  ADD KEY `RequestBy` (`RequestBy`),
  ADD KEY `RequestTo` (`RequestTo`);

--
-- Indexes for table `University`
--
ALTER TABLE `University`
  ADD PRIMARY KEY (`UniversityName`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `VerificationTeam`
--
ALTER TABLE `VerificationTeam`
  ADD PRIMARY KEY (`VerificationTeamId`),
  ADD UNIQUE KEY `NIC` (`NIC`,`ContactNumber`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BoardingPlace`
--
ALTER TABLE `BoardingPlace`
  MODIFY `PlaceId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Issue`
--
ALTER TABLE `Issue`
  MODIFY `IssueId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PostUpdate`
--
ALTER TABLE `PostUpdate`
  MODIFY `PostId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ReviewRating`
--
ALTER TABLE `ReviewRating`
  MODIFY `ReviewId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Suggestion`
--
ALTER TABLE `Suggestion`
  MODIFY `SuggestionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Admin`
--
ALTER TABLE `Admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`AdminId`) REFERENCES `User` (`UserId`);

--
-- Constraints for table `BoardingOwner`
--
ALTER TABLE `BoardingOwner`
  ADD CONSTRAINT `boardingowner_ibfk_1` FOREIGN KEY (`BoardingOwnerId`) REFERENCES `User` (`UserId`),
  ADD CONSTRAINT `boardingowner_ibfk_2` FOREIGN KEY (`VerifiedBy`) REFERENCES `VerificationTeam` (`VerificationTeamId`);

--
-- Constraints for table `BoardingPlace`
--
ALTER TABLE `BoardingPlace`
  ADD CONSTRAINT `boardingplace_ibfk_1` FOREIGN KEY (`OwnerId`) REFERENCES `BoardingOwner` (`BoardingOwnerId`),
  ADD CONSTRAINT `boardingplace_ibfk_2` FOREIGN KEY (`VerifiedBy`) REFERENCES `VerificationTeam` (`VerificationTeamId`),
  ADD CONSTRAINT `boardingplace_ibfk_3` FOREIGN KEY (`CityName`) REFERENCES `City` (`CityName`);

--
-- Constraints for table `BoardingPlacePicture`
--
ALTER TABLE `BoardingPlacePicture`
  ADD CONSTRAINT `boardingplacepicture_ibfk_1` FOREIGN KEY (`BoardingPlace`) REFERENCES `BoardingPlace` (`PlaceId`);

--
-- Constraints for table `BoardingPlaceReminder`
--
ALTER TABLE `BoardingPlaceReminder`
  ADD CONSTRAINT `boardingplacereminder_ibfk_1` FOREIGN KEY (`Tenant`) REFERENCES `BoardingPlaceTenant` (`TenantId`);

--
-- Constraints for table `BoardingPlaceRent`
--
ALTER TABLE `BoardingPlaceRent`
  ADD CONSTRAINT `boardingplacerent_ibfk_1` FOREIGN KEY (`Tenant`) REFERENCES `BoardingPlaceTenant` (`TenantId`);

--
-- Constraints for table `BoardingPlaceTenant`
--
ALTER TABLE `BoardingPlaceTenant`
  ADD CONSTRAINT `boardingplacetenant_ibfk_1` FOREIGN KEY (`PlaceId`) REFERENCES `BoardingPlace` (`PlaceId`),
  ADD CONSTRAINT `boardingplacetenant_ibfk_2` FOREIGN KEY (`TenantId`) REFERENCES `Student` (`StudentId`),
  ADD CONSTRAINT `boardingplacetenant_ibfk_3` FOREIGN KEY (`TenantId`) REFERENCES `Professional` (`ProfessionalId`);

--
-- Constraints for table `City`
--
ALTER TABLE `City`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`DistrictName`) REFERENCES `District` (`DistrictName`);

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`Post`) REFERENCES `PostUpdate` (`PostId`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Commentor`) REFERENCES `User` (`UserId`);

--
-- Constraints for table `District`
--
ALTER TABLE `District`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`ProvinceName`) REFERENCES `Province` (`ProvinceName`);

--
-- Constraints for table `Friend`
--
ALTER TABLE `Friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`FriendId`) REFERENCES `Student` (`StudentId`),
  ADD CONSTRAINT `friend_ibfk_2` FOREIGN KEY (`StudentFriendId`) REFERENCES `Student` (`StudentId`);

--
-- Constraints for table `FriendInvite`
--
ALTER TABLE `FriendInvite`
  ADD CONSTRAINT `friendinvite_ibfk_1` FOREIGN KEY (`Tenant`) REFERENCES `BoardingPlaceTenant` (`TenantId`),
  ADD CONSTRAINT `friendinvite_ibfk_2` FOREIGN KEY (`FriendId`) REFERENCES `Friend` (`FriendId`),
  ADD CONSTRAINT `friendinvite_ibfk_3` FOREIGN KEY (`FriendId`) REFERENCES `Friend` (`StudentFriendId`);

--
-- Constraints for table `Issue`
--
ALTER TABLE `Issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`RequestTo`) REFERENCES `Admin` (`AdminId`),
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`RequestBy`) REFERENCES `User` (`UserId`);

--
-- Constraints for table `Like`
--
ALTER TABLE `Like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`Post`) REFERENCES `PostUpdate` (`PostId`),
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`Liker`) REFERENCES `User` (`UserId`);

--
-- Constraints for table `PostUpdate`
--
ALTER TABLE `PostUpdate`
  ADD CONSTRAINT `postupdate_ibfk_1` FOREIGN KEY (`PlaceId`) REFERENCES `BoardingPlace` (`PlaceId`),
  ADD CONSTRAINT `postupdate_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `BoardingPlaceTenant` (`TenantId`),
  ADD CONSTRAINT `postupdate_ibfk_3` FOREIGN KEY (`UserId`) REFERENCES `BoardingOwner` (`BoardingOwnerId`);

--
-- Constraints for table `Professional`
--
ALTER TABLE `Professional`
  ADD CONSTRAINT `professional_ibfk_1` FOREIGN KEY (`ProfessionalId`) REFERENCES `User` (`UserId`),
  ADD CONSTRAINT `professional_ibfk_2` FOREIGN KEY (`VerifiedBy`) REFERENCES `VerificationTeam` (`VerificationTeamId`);

--
-- Constraints for table `ReviewRating`
--
ALTER TABLE `ReviewRating`
  ADD CONSTRAINT `reviewrating_ibfk_1` FOREIGN KEY (`BoarderId`) REFERENCES `BoardingPlaceTenant` (`TenantId`),
  ADD CONSTRAINT `reviewrating_ibfk_2` FOREIGN KEY (`Place`) REFERENCES `BoardingPlace` (`PlaceId`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `User` (`UserId`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`StudentUniversity`) REFERENCES `University` (`UniversityName`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`VerifiedBy`) REFERENCES `VerificationTeam` (`VerificationTeamId`);

--
-- Constraints for table `Suggestion`
--
ALTER TABLE `Suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`RequestBy`) REFERENCES `User` (`UserId`),
  ADD CONSTRAINT `suggestion_ibfk_2` FOREIGN KEY (`RequestTo`) REFERENCES `Admin` (`AdminId`);

--
-- Constraints for table `VerificationTeam`
--
ALTER TABLE `VerificationTeam`
  ADD CONSTRAINT `verificationteam_ibfk_1` FOREIGN KEY (`VerificationTeamId`) REFERENCES `User` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
