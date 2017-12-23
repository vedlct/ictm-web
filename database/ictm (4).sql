-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 09:00 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ictm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cadidatelanguagetestscores`
--

CREATE TABLE `cadidatelanguagetestscores` (
  `fkCandidateTestId` int(11) NOT NULL,
  `fkTestHeadId` tinyint(4) NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidateinfo`
--

CREATE TABLE `candidateinfo` (
  `id` int(11) NOT NULL,
  `applicationId` int(11) DEFAULT NULL,
  `title` varchar(12) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `surName` varchar(50) DEFAULT NULL,
  `otherNames` varchar(50) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL COMMENT ' M = MALE, F = FEMALE, O = OTHER',
  `placeOfBirth` varchar(45) DEFAULT NULL,
  `nationality` char(3) DEFAULT NULL,
  `passportNo` varchar(45) DEFAULT NULL,
  `passportExpiryDate` date DEFAULT NULL,
  `ukEntryDate` date DEFAULT NULL,
  `visaExpiryDate` date DEFAULT NULL,
  `visaType` int(11) DEFAULT NULL,
  `courseChoiceStatement` longtext,
  `collegeChoiceStatement` longtext,
  `ownAssessment` varchar(45) DEFAULT NULL,
  `currentAddress` varchar(150) DEFAULT NULL,
  `currentAddressPo` varchar(15) DEFAULT NULL,
  `overseasAddress` varchar(150) DEFAULT NULL,
  `overseasAddressPo` varchar(15) DEFAULT NULL,
  `emergencyContactName` varchar(100) DEFAULT NULL,
  `emergencyContactTitle` varchar(12) DEFAULT NULL,
  `emergencyContactRelation` varchar(45) DEFAULT NULL,
  `emergencyContactAddress` varchar(150) DEFAULT NULL,
  `emergencyContactAddressPo` varchar(15) DEFAULT NULL,
  `emergencyContactMobile` varchar(45) DEFAULT NULL,
  `emergencyContactEmail` varchar(45) DEFAULT NULL,
  `selfFinance` char(1) DEFAULT NULL COMMENT 'y = yes, n = no',
  `photograph` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `applydate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidatelanguagetest`
--

CREATE TABLE `candidatelanguagetest` (
  `id` int(11) NOT NULL,
  `fkCandidateId` int(11) NOT NULL,
  `fkTestId` tinyint(4) NOT NULL,
  `overallScore` float NOT NULL,
  `testDate` date NOT NULL,
  `expireDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidatereferees`
--

CREATE TABLE `candidatereferees` (
  `id` int(11) NOT NULL,
  `fkCandidateId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(12) DEFAULT NULL,
  `workingCompany` varchar(80) NOT NULL,
  `jobTitle` varchar(60) NOT NULL,
  `address` varchar(120) NOT NULL,
  `postCode` varchar(8) DEFAULT NULL,
  `fkCountry` char(3) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacttype`
--

CREATE TABLE `contacttype` (
  `id` tinyint(4) NOT NULL,
  `contactTitle` varchar(20) NOT NULL COMMENT 'mobile, land phone, fax etc'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `code` char(3) NOT NULL DEFAULT '',
  `Name` varchar(52) NOT NULL DEFAULT '',
  `Continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') NOT NULL DEFAULT 'Asia',
  `Region` char(26) NOT NULL DEFAULT '',
  `SurfaceArea` float(10,2) NOT NULL DEFAULT '0.00',
  `IndepYear` smallint(6) DEFAULT NULL,
  `Population` int(11) NOT NULL DEFAULT '0',
  `LifeExpectancy` float(3,1) DEFAULT NULL,
  `GNP` float(10,2) DEFAULT NULL,
  `GNPOld` float(10,2) DEFAULT NULL,
  `LocalName` char(45) NOT NULL DEFAULT '',
  `GovernmentForm` char(45) NOT NULL DEFAULT '',
  `HeadOfState` char(60) DEFAULT NULL,
  `Capital` int(11) DEFAULT NULL,
  `Code2` char(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails`
--

CREATE TABLE `coursedetails` (
  `id` int(11) NOT NULL,
  `fkCandidateId` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `awardingBody` varchar(100) NOT NULL,
  `courseLevel` varchar(20) DEFAULT NULL,
  `courseStartDate` date DEFAULT NULL,
  `courseEndDate` date DEFAULT NULL,
  `methodOfStudy` varchar(3) DEFAULT NULL COMMENT 'FT = full time, PT = Part time, D = Day, E&W = Evening and Weekend'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equalopportunitygroup`
--

CREATE TABLE `equalopportunitygroup` (
  `id` int(11) NOT NULL,
  `opportunityTitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equalopportunitysubgroup`
--

CREATE TABLE `equalopportunitysubgroup` (
  `id` int(11) NOT NULL,
  `fkGroupId` int(11) NOT NULL,
  `subGroupTitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `financer`
--

CREATE TABLE `financer` (
  `id` int(11) NOT NULL,
  `fkCandidateId` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `title` varchar(10) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `address` varchar(120) NOT NULL,
  `addressPo` varchar(8) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ictmaffiliations`
--

CREATE TABLE `ictmaffiliations` (
  `AffiliationsId` int(11) NOT NULL,
  `affiliationsTitle` varchar(100) DEFAULT NULL,
  `AffiliationsDetails` longtext,
  `AffiliationsPhotoPath` varchar(255) DEFAULT NULL,
  `InsertedBy` varchar(255) DEFAULT NULL,
  `InsertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(255) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `affiliationsStatus` varchar(45) DEFAULT NULL,
  `homeStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmaffiliations`
--

INSERT INTO `ictmaffiliations` (`AffiliationsId`, `affiliationsTitle`, `AffiliationsDetails`, `AffiliationsPhotoPath`, `InsertedBy`, `InsertedDate`, `lastModifiedBy`, `lastModifiedDate`, `affiliationsStatus`, `homeStatus`) VALUES
(8, 'BTEC', '<p>et</p>\r\n', '8.jpg', 'admin@gmail.com', '2017-10-14 13:22:34', NULL, NULL, 'Active', 'Yes'),
(9, 'hefcf', '<p>dsf</p>\r\n', '9.jpg', 'admin@gmail.com', '2017-10-14 13:23:12', NULL, NULL, 'Active', 'Yes'),
(10, 'QAA', '<p>sfd</p>\r\n', '10.png', 'admin@gmail.com', '2017-10-14 13:23:26', 'admin@gmail.com', '2017-11-16 12:01:07', 'Active', 'Yes'),
(11, 'sfe', '<p>sdf</p>\r\n', '11.png', 'admin@gmail.com', '2017-10-14 13:23:38', NULL, NULL, 'Active', 'Yes'),
(12, 'slc', '<p>dfg</p>\r\n', '12.jpg', 'admin@gmail.com', '2017-10-14 13:23:51', NULL, NULL, 'Active', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `ictmalbum`
--

CREATE TABLE `ictmalbum` (
  `albumId` int(100) NOT NULL,
  `albumTitle` varchar(255) NOT NULL,
  `albumCategoryName` varchar(255) NOT NULL,
  `albumDescription` text,
  `insertedBy` varchar(100) NOT NULL,
  `insertedDate` datetime NOT NULL,
  `lastModifiedBy` varchar(100) NOT NULL,
  `lastModifiedDate` datetime NOT NULL,
  `albumStatus` varchar(45) NOT NULL,
  `homeStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmalbum`
--

INSERT INTO `ictmalbum` (`albumId`, `albumTitle`, `albumCategoryName`, `albumDescription`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `albumStatus`, `homeStatus`) VALUES
(14, 'Picture of Student', 'category1', NULL, 'admin@gmail.com', '2017-10-14 21:24:08', '', '0000-00-00 00:00:00', 'Active', 'Yes'),
(15, 'student in Campus', 'Category2', NULL, 'admin@gmail.com', '2017-10-16 07:45:31', '', '0000-00-00 00:00:00', 'Active', 'Yes'),
(16, 'ICON Convocation 2017', 'Yearly Event', NULL, 'admin@gmail.com', '2017-11-16 11:35:07', '', '0000-00-00 00:00:00', 'Active', NULL),
(17, 'ICON Convocation 2016', 'Yearly Event', NULL, 'admin@gmail.com', '2017-11-16 11:44:19', '', '0000-00-00 00:00:00', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ictmcollegeinfo`
--

CREATE TABLE `ictmcollegeinfo` (
  `collegeInfoId` int(11) NOT NULL,
  `collegeName` varchar(255) DEFAULT NULL,
  `collegeDomain` varchar(255) DEFAULT NULL,
  `collegeAddress` varchar(1000) DEFAULT NULL,
  `collegeTelephone1` varchar(45) DEFAULT NULL,
  `collegeTelephone2` varchar(45) DEFAULT NULL,
  `collegeFax` varchar(255) DEFAULT NULL,
  `collegeEmail` varchar(100) DEFAULT NULL,
  `collegeFacebook` varchar(1000) DEFAULT NULL,
  `collegeTwitter` varchar(1000) DEFAULT NULL,
  `collegeLinkedIn` varchar(1000) DEFAULT NULL,
  `collegeGoogle` varchar(1000) DEFAULT NULL,
  `collegeYoutube` varchar(1000) DEFAULT NULL,
  `InsertedBy` varchar(100) DEFAULT NULL,
  `InsertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `collegeInfoStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmcollegeinfo`
--

INSERT INTO `ictmcollegeinfo` (`collegeInfoId`, `collegeName`, `collegeDomain`, `collegeAddress`, `collegeTelephone1`, `collegeTelephone2`, `collegeFax`, `collegeEmail`, `collegeFacebook`, `collegeTwitter`, `collegeLinkedIn`, `collegeGoogle`, `collegeYoutube`, `InsertedBy`, `InsertedDate`, `lastModifiedBy`, `lastModifiedDate`, `collegeInfoStatus`) VALUES
(2, 'ICON College of Technology and Management', 'http://www.iconcollege.com/', 'Unit 21-22, 1-13 Adler Street, London E1 1EG United Kingdom', '01234567890123456789', '01111', '+44 20 7377 0822', 'info@iconcollege.com', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.linkedin.com/', 'https://plus.google.com/icon College', 'https://www.youtube.com/', 'admin@gmail.com', '2017-08-30 11:30:34', 'admin@gmail.com', '2017-11-11 11:22:48', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmcontactus`
--

CREATE TABLE `ictmcontactus` (
  `contactUsId` int(11) NOT NULL,
  `contactUsname` varchar(45) DEFAULT NULL,
  `contactUsEmain` varchar(100) DEFAULT NULL,
  `contactUsSubject` varchar(255) DEFAULT NULL,
  `contactUsMessage` longtext,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `contactUsStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ictmcourse`
--

CREATE TABLE `ictmcourse` (
  `courseId` int(11) NOT NULL,
  `departmentId` int(11) DEFAULT NULL,
  `courseCodePearson` varchar(100) DEFAULT NULL,
  `courseCodeIcon` varchar(100) DEFAULT NULL,
  `ucasCode` varchar(100) DEFAULT NULL,
  `courseTitle` varchar(255) NOT NULL,
  `awardingTitle` varchar(255) DEFAULT NULL,
  `awardingBody` varchar(255) DEFAULT NULL,
  `accreditationType` varchar(100) DEFAULT NULL,
  `accreditationNumber` varchar(45) DEFAULT NULL,
  `courseDuration` varchar(50) DEFAULT NULL,
  `creditValue` varchar(100) DEFAULT NULL,
  `courseStructutre` varchar(255) DEFAULT NULL,
  `studyMode` varchar(100) DEFAULT NULL,
  `studyLanguage` varchar(100) DEFAULT NULL,
  `academicYear` varchar(100) DEFAULT NULL,
  `courseFees` varchar(255) DEFAULT NULL,
  `couseLocation` varchar(100) DEFAULT NULL,
  `timeTable` varchar(255) DEFAULT NULL,
  `courseStatus` varchar(50) DEFAULT NULL,
  `courseImage` varchar(255) DEFAULT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmcourse`
--

INSERT INTO `ictmcourse` (`courseId`, `departmentId`, `courseCodePearson`, `courseCodeIcon`, `ucasCode`, `courseTitle`, `awardingTitle`, `awardingBody`, `accreditationType`, `accreditationNumber`, `courseDuration`, `creditValue`, `courseStructutre`, `studyMode`, `studyLanguage`, `academicYear`, `courseFees`, `couseLocation`, `timeTable`, `courseStatus`, `courseImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`) VALUES
(11, 6, 'TNA67', 'ICON0001', NULL, 'HND in Computing', 'Pearson BTEC Level 5 Higher National Diploma (RQF) ', ' Pearson', 'Pearson Qualification', '601/8365/2', '2 years', '240 credits, levels 4 and 5.', '14 X 15 credits units, 1 X 30-unit research project.', 'FT', 'English', '2017-18', '£6,000', 'ICTM', 'Weekend and Evening', 'Active', NULL, 'admin@gmail.com', '2017-09-09 12:21:36', NULL, NULL),
(13, 18, 'test', 'ICON0001', NULL, 'BTEC Level 5 HND in Business', ' BTEC Level 5 HND in Business - RQF', 'Pearson', 'Pearson Qualification', '(QAN): 601/8365/2', '2 years', '240 credits, levels 4 and 5. ', '14 X 15 credits units, 1 X 30-unit research project.', 'Full Time', 'English', '2017-18', '£6,000/Yr (UK/EU Student)\r\n*ICON college reserves the right to alter course fees without prior notice.', 'ICTM', 'Weekend and Evening', 'Active', NULL, 'admin@gmail.com', '2017-09-27 11:06:09', NULL, NULL),
(14, 19, 'test', 'ICON0001', NULL, 'BTEC HND in Health and Social Care', 'BTEC Level 5 HND in Business - RQF', 'Pearson', 'Pearson Qualification', '(QAN): 601/8365/2', '2 years', '240 credits, levels 4 and 5.', '14 X 15 credits units, 1 X 30-unit research project.', 'Full Time', 'English', '2017-18', '£6,000/Yr (UK/EU Student)\r\n*ICON college reserves the right to alter course fees without prior notice. ', 'ICTM', 'Weekend and Evening', 'Active', NULL, 'admin@gmail.com', '2017-09-27 11:11:56', NULL, NULL),
(15, 20, 'test', 'ICON0001', '', 'BTEC HND in Computing and Systems Development', 'BTEC Level 5 HND in Business - RQF', 'Pearson', 'Pearson Qualification', '(QAN): 601/8365/2', '2 years', '240 credits, levels 4 and 5.', '14 X 15 credits units, 1 X 30-unit research project.', 'Full Time', 'English', '2017-18', ' £6,000/Yr (UK/EU Student)  \r\n*ICON college reserves the right to alter course fees without prior notice. ', 'ICTM', 'Weekend and Evening', 'Active', '15.jpg', 'admin@gmail.com', '2017-09-27 11:14:06', 'admin@gmail.com', '2017-10-31 11:18:28'),
(16, 20, 'test', 'ICON0001', NULL, 'BTEC HND in Electrical and Electronic Engineering', 'BTEC Level 5 HND in Business - RQF', 'Pearson', 'Pearson Qualification', '(QAN): 601/8365/2', '2 years', '240 credits, levels 4 and 5.', '14 X 15 credits units, 1 X 30-unit research project.', 'Full Time', 'English', '2017-18', '£6,000/Yr (UK/EU Student)\r\n*ICON college reserves the right to alter course fees without prior notice. ', 'ICTM', 'Weekend and Evening', 'Active', NULL, 'admin@gmail.com', '2017-09-27 11:15:16', NULL, NULL),
(17, 22, 'test', 'ICON0001', '', 'BTEC Level 5 HND in Travel and Tourism Management', 'BTEC Level 5 HND in Business - RQF', 'Pearson', 'Pearson Qualification', '(QAN): 601/8365/2', '2 years', '240 credits, levels 4 and 5.', '14 X 15 credits units, 1 X 30-unit research project.', 'Full Time', 'English', '2017-18', '£6,000/Yr (UK/EU Student)\r\n*ICON college reserves the right to alter course fees without prior notice. ', 'ICTM', 'Weekend and Evening', 'Inactive', '17.jpg', 'admin@gmail.com', '2017-09-27 11:16:17', 'admin@gmail.com', '2017-10-16 14:23:12'),
(18, 22, 'sdadsad', 'asdasdasd', '', 'asdasdasd', 'sadasdasd', 'asdasda', 'sadsadsad', 'asdasdasd', 'dsadasd', 'asdsadas', 'asdasd', 'sdsadsad', 'sadsaddas', 'asdasd', 'dsadsadas', 'asdasdsa', 'sadasdas', 'Inactive', '18.jpg', 'admin@gmail.com', '2017-10-14 13:14:08', 'admin@gmail.com', '2017-10-31 11:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `ictmcoursesection`
--

CREATE TABLE `ictmcoursesection` (
  `courseSectionId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `courseSectionTitle` varchar(255) DEFAULT NULL,
  `courseSectionContent` longtext,
  `courseSectionImage` varchar(255) DEFAULT NULL,
  `orderNumber` int(11) DEFAULT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `courseSectionStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmcoursesection`
--

INSERT INTO `ictmcoursesection` (`courseSectionId`, `courseId`, `courseSectionTitle`, `courseSectionContent`, `courseSectionImage`, `orderNumber`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `courseSectionStatus`) VALUES
(11, 13, 'Course Overview', '<p>The BTEC (Business Technology Engineering Council) Higher National Diploma (HND) is a specialist programme with a strong workrelated emphasis. The qualification provides a thorough grounding in the key concepts and practical skills required in the sector with national recognition by employers allowing progression direct into employment or to degree.</p>\r\n\r\n<p>This HND in Business is ideal for those who wish to study at the undergraduate level to become better managers. Successful completion of HND allows students direct entry to top up honours degree at many UK universities.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:18:31', NULL, NULL, 'Active'),
(12, 11, 'Course Overview', '<p>The BTEC (Business Technology Engineering Council) Higher National Diploma (HND) is a specialist programme with a strong workrelated emphasis. The qualification provides a thorough grounding in the key concepts and practical skills required in the sector with national recognition by employers allowing progression direct into employment or to degree.</p>\r\n\r\n<p>This HND in Business is ideal for those who wish to study at the undergraduate level to become better managers. Successful completion of HND allows students direct entry to top up honours degree at many UK universities.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(13, 11, 'Progression', '<p>The Level 5 Higher National Diploma allows students to specialise by committing to specific career paths and progression routes to degree-level study.</p>\r\n\r\n<p>On successful completion of the Level 5 Higher National Diploma, students can develop their careers in the business sector through:</p>\r\n\r\n<ul>\r\n	<li>Entering employment</li>\r\n	<li>Continuing existing employment</li>\r\n	<li>Linking with the appropriate Professional Body</li>\r\n	<li>Committing to Continuing Professional Development (CPD)</li>\r\n	<li>Progressing to university.</li>\r\n</ul>\r\n\r\n<p>The Level 5 Higher National Diploma is recognised by Higher Education providers as meeting admission requirements to many relevant business-related courses, for example:</p>\r\n\r\n<ul>\r\n	<li>BSc (Hons) in Business and Management</li>\r\n	<li>BA and BSc (Hons) in Business Studies</li>\r\n	<li>BSc (Hons) in International Management.</li>\r\n</ul>\r\n\r\n<p>Students should always check the entry requirements for degree Courses at specific Higher Education providers. After completing a BTEC Higher National Diploma, students can also progress directly into employment.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(14, 11, 'Course Structure/Unit Details', '<p>This course consists of 15 units (8 core units + 7 optional units) including a Project. There are 60 learning hours for each unit and 120 learning hours for the Project.</p>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th style=\"text-align: left;\">Unit No</th>\r\n			<th style=\"text-align: left;\">Level 4 Units (Eight Units, 120 Credit Value)</th>\r\n			<th style=\"text-align: left;\">Unit Credit</th>\r\n			<th style=\"text-align: left;\">Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>1</strong></td>\r\n			<td>Business and the Business Environment</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2</strong></td>\r\n			<td>Marketing Essentials</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3</strong></td>\r\n			<td>Human Resource Management</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4</strong></td>\r\n			<td>Management and Operations</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5</strong></td>\r\n			<td>Management Accounting</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6</strong></td>\r\n			<td>Managing a Successful Business Project (Pearson-set)</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>8</strong></td>\r\n			<td>Innovation and Commercialisation</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>9</strong></td>\r\n			<td>Entrepreneurship and Small Business</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th style=\"text-align: left;\">Unit No</th>\r\n			<th style=\"text-align: left;\">Level 5 Units (Seven Units, 120 Credit Value)</th>\r\n			<th style=\"text-align: left;\">Unit Credit</th>\r\n			<th style=\"text-align: left;\">Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>11</strong></td>\r\n			<td>Research Project (Pearson-set)</td>\r\n			<td>30</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>12</strong></td>\r\n			<td>Organisational Behaviour</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>17</strong></td>\r\n			<td>Understanding and Leading Change</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>32</strong></td>\r\n			<td>Business Strategy</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>35</strong></td>\r\n			<td>Developing Individuals, Teams and Organisations</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>40</strong></td>\r\n			<td>International Marketing</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>41</strong></td>\r\n			<td>Brand Management</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(15, 11, 'Entry Requirements', '<p>To meet the entry criteria for admission to level 5 HND Courses:</p>\r\n\r\n<p>A candidate must have either:</p>\r\n\r\n<ul>\r\n	<li>a level 3 qualification</li>\r\n	<li>a level 2 qualifications and relevant work experience</li>\r\n	<li>or substantial work experience related to the field of proposed study and,</li>\r\n	<li>Demonstrate capability in English equivalent to CEFR level B2 e.g. IELTS 5.5 (including 5.5 for reading and writing), PTE 51 or equivalent. and,</li>\r\n	<li>Demonstrate a Commitment to Study and a reasonable expectation of success on the Course</li>\r\n</ul>\r\n\r\n<p>International qualifications at the appropriate level will also be accepted. The College will use UK NARIC to determine the equivalence of any international qualifications.</p>\r\n\r\n<p>Where applicants do not have a formal qualification to demonstrate capability in English, they will be required to undertake the Colleges written English Language test before an offer of a place on a Course is made. Judgement of their capability in spoken English will be assessed by the Head of Department at the interview. Suitable alternative arrangements to written tests will be made where a student declares a disability, specific learning difficulty or long-term health condition on their application form, e.g. oral questioning, amanuensis etc.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(16, 11, 'Module Information/Semester Structure', '<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th colspan=\"3\">The modules available on the course are as follows.</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 1 for full-time students (Level 4)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Unit 1: Business Environment Credit 15</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 2 for full-time students (Level 5)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Credit</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(17, 11, 'Teaching and Learning', '<p>The College recognises that its Teaching, Learning and Assessment Strategy is fundamental to achieving the aims set out in its Mission Statement and to satisfy expectations contained in appropriate indicators in Chapter B3, B4 and B6 of the UK Quality Code for the Assurance of Academic Quality and Standards in Higher Education.</p>\r\n\r\n<p>The aims of the Teaching, Learning and Assessment Strategy is to achieve the following:</p>\r\n\r\n<ul>\r\n	<li>To widen participation from students who are mature, from Black and Minority Ethnic Communities, and come from lower socio-economic backgrounds</li>\r\n	<li>To educate students who are motivated and self-directed critical thinkers, capable of independent enquiry</li>\r\n	<li>To provide students with both sound academic knowledge and vocational expertise</li>\r\n	<li>To foster independent and collaborative learning among students and to encourage lifelong learning leading to enhancing their career potentials</li>\r\n	<li>To develop and implement approaches to feedback and assessment that maximise learning and student outcomes.</li>\r\n</ul>\r\n\r\n<p>(For more details please see The College Quality and Enhancement Manual)</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(18, 11, 'Assessment and Feedback', '<p>The College adheres to the adopted assessment policies and procedures that are published in the Quality and Enhancement Manual (QAEM) which is in line with the UK Quality Code. Effective assessment rests with the purpose for which the assessment is carried out as well as the nature and type of appropriate assessment tools used. In essence the assessment materials and tools should be fit-for-purpose. The college assessor and internal verifier assured that assignment brief of the assignments are fair and accurate as much as possible.</p>\r\n\r\n<p>As required by Pearson, according to the Course specifications, the key assessment objectives and strategies are aimed at assessing the achievement of a number of specific learning outcomes in every unit against specific assessment criteria.</p>\r\n\r\n<p>The College uses both formal and informal assessment strategies. The College uses a variety of assessment methods to enhance learning and improves the validity of assessment. The assessment methods improve the knowledge of the assessment criteria and what is required to gain higher grade achievement. There is a range of assessment methods that are utilised, such as: presentations; written reports. As an informal assessment strategy, the College implements a formative method of assessment which requires students to submit &lsquo;task by task&rsquo; coursework during the semester.</p>\r\n\r\n<p>This Course is assessed using a combination of ICON College and Pearson-set assignments. Each year, Pearson will issue a Theme and (for Level 4) a set of related Topics. ICON College will develop an assignment, to be internally assessed, to engage students in work related to the Pearson-set Theme.</p>\r\n\r\n<p>At Level 4, students will select a Topic to further define their approach to the Theme and assignment. At Level 5, it is expected that students will define their own Topic, in negotiation with Tutors, based on the Pearson-set Theme.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(19, 11, 'Purpose of the Course', '<p>The purpose of BTEC Higher Nationals in Business is to develop students as professional, self-reflecting individuals able to meet the demands of employers in the business sector and adapt to a constantly changing world. The qualifications aim to widen access to higher education and enhance the career prospects of those who undertake them.</p>\r\n\r\n<p><strong>Objectives of the Course</strong></p>\r\n\r\n<p>The objectives of the BTEC Higher Nationals in Business are as follows:</p>\r\n\r\n<ul>\r\n	<li>To equip students with business skills, knowledge and the understanding necessary to achieve high performance in the global business environment.</li>\r\n	<li>To provide education and training for a range of careers in business, including management, administration, human resources, marketing, entrepreneurship, accounting and finance.</li>\r\n	<li>To provide insight and understanding into international business operations and the opportunities and challenges presented by a globalised market place.</li>\r\n	<li>To equip students with knowledge and understanding of culturally diverse organisations, cross-cultural issues, diversity and values.</li>\r\n	<li>To provide opportunities for students to enter or progress in employment in business, or progress to higher education qualifications such as an Honours degree in business or a related area.</li>\r\n	<li>To provide opportunities for students to develop the skills, techniques and personal attributes essential for successful working lives.</li>\r\n	<li>To provide opportunities for those students with a global outlook to aspire to international career pathways.</li>\r\n	<li>To provide opportunities for students to achieve a nationally-recognised professional qualification.</li>\r\n	<li>To offer students the chance of career progression in their chosen field.</li>\r\n	<li>To allow flexibility of study and to meet local or specialist needs.</li>\r\n	<li>To offer a balance between employability skills and the knowledge essential for students with entrepreneurial, employment or academic aspirations</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(20, 11, 'Course Learning Outcomes', '<p><strong>Knowledge and understanding</strong></p>\r\n\r\n<p>Students will be expected to gain the following knowledge during the Course of study:</p>\r\n\r\n<ul>\r\n	<li>Developing the knowledge, understanding and skills of organisations, the business environment in which they operate and their management.</li>\r\n	<li>Demonstrating knowledge and understanding Markets, and Marketing and sales, the management of resources including the supply chain, procurement, logistics, and outsourcing.</li>\r\n	<li>Equipping students with awareness of Customer management and relationship and leadership.</li>\r\n	<li>Developing knowledge of different financial sources and the use of accounting and managing financial risk.</li>\r\n	<li>Understanding the use of relevant communication in business and management including the use of digital technology.</li>\r\n	<li>Developing appropriate policies and strategies within a changing environment to meet stakeholders&rsquo; interest and the use of risk management techniques.</li>\r\n	<li>Providing innovative business ideas to create new products, services or organisations.</li>\r\n	<li>Realising the need for individuals and organisations to manage responsibility and behave ethically in relation to social, cultural, economic and environmental issues.</li>\r\n</ul>\r\n\r\n<p><strong>Skills</strong></p>\r\n\r\n<p>Students will be expected to develop the following skills during the Course of study:</p>\r\n\r\n<p><strong>Employability skills:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Cognitive and problem-solving skills:</strong> critical thinking, approaching non- routine problems by applying expert and creative solutions, use of systems and digital technology, generating and communicating ideas creatively.</li>\r\n	<li><strong>Intra-personal skills:</strong> self-management, adaptability and resilience, self- monitoring and self-development, self-analysis and reflection, planning and prioritising.</li>\r\n	<li><strong>Interpersonal skills:</strong> effective communication and articulation of information, working collaboratively, negotiating and influencing, self-presentation.</li>\r\n</ul>\r\n\r\n<p><strong>Knowledge and academic study skills:</strong></p>\r\n\r\n<ul>\r\n	<li>Active research skills</li>\r\n	<li>Effective writing skills</li>\r\n	<li>Analytical skills</li>\r\n	<li>Critical thinking</li>\r\n	<li>Creative problem-solving</li>\r\n	<li>Decision-making</li>\r\n	<li>Team building</li>\r\n	<li>Exam preparation skills</li>\r\n	<li>Digital literacy</li>\r\n	<li>Competence in assessment methods used in higher education.</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(21, 11, 'Relevant External Reference Points', '<ul>\r\n	<li>QAA subject benchmark statements for Business and Business Management</li>\r\n	<li>The qualification remains as intermediate level qualifications on the FHEQ. Please refer to the Pearson programme specification for RQF.</li>\r\n</ul>\r\n\r\n<p>Chartered Institute of Management (CIM), Association of Chartered Certified Accountants (ACCA), Chartered Institute of Personnel and Development (CIPD).</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:29:29', NULL, NULL, 'Active'),
(22, 13, 'Course Overview', '<p>The BTEC (Business Technology Engineering Council) Higher National Diploma (HND) is a specialist programme with a strong workrelated emphasis. The qualification provides a thorough grounding in the key concepts and practical skills required in the sector with national recognition by employers allowing progression direct into employment or to degree.</p>\r\n\r\n<p>This HND in Business is ideal for those who wish to study at the undergraduate level to become better managers. Successful completion of HND allows students direct entry to top up honours degree at many UK universities.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(23, 13, 'Progression', '<p>The Level 5 Higher National Diploma allows students to specialise by committing to specific career paths and progression routes to degree-level study.</p>\r\n\r\n<p>On successful completion of the Level 5 Higher National Diploma, students can develop their careers in the business sector through:</p>\r\n\r\n<ul>\r\n	<li>Entering employment</li>\r\n	<li>Continuing existing employment</li>\r\n	<li>Linking with the appropriate Professional Body</li>\r\n	<li>Committing to Continuing Professional Development (CPD)</li>\r\n	<li>Progressing to university.</li>\r\n</ul>\r\n\r\n<p>The Level 5 Higher National Diploma is recognised by Higher Education providers as meeting admission requirements to many relevant business-related courses, for example:</p>\r\n\r\n<ul>\r\n	<li>BSc (Hons) in Business and Management</li>\r\n	<li>BA and BSc (Hons) in Business Studies</li>\r\n	<li>BSc (Hons) in International Management.</li>\r\n</ul>\r\n\r\n<p>Students should always check the entry requirements for degree Courses at specific Higher Education providers. After completing a BTEC Higher National Diploma, students can also progress directly into employment.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(24, 13, 'Course Structure/Unit Details', '<p>This course consists of 15 units (8 core units + 7 optional units) including a Project. There are 60 learning hours for each unit and 120 learning hours for the Project.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 4 Units (Eight Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>1</strong></td>\r\n			<td>Business and the Business Environment</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2</strong></td>\r\n			<td>Marketing Essentials</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3</strong></td>\r\n			<td>Human Resource Management</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4</strong></td>\r\n			<td>Management and Operations</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5</strong></td>\r\n			<td>Management Accounting</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6</strong></td>\r\n			<td>Managing a Successful Business Project (Pearson-set)</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>8</strong></td>\r\n			<td>Innovation and Commercialisation</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>9</strong></td>\r\n			<td>Entrepreneurship and Small Business</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 5 Units (Seven Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>11</strong></td>\r\n			<td>Research Project (Pearson-set)</td>\r\n			<td>30</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>12</strong></td>\r\n			<td>Organisational Behaviour</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>17</strong></td>\r\n			<td>Understanding and Leading Change</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>32</strong></td>\r\n			<td>Business Strategy</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>35</strong></td>\r\n			<td>Developing Individuals, Teams and Organisations</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>40</strong></td>\r\n			<td>International Marketing</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>41</strong></td>\r\n			<td>Brand Management</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(25, 13, 'Entry Requirements', '<p>To meet the entry criteria for admission to level 5 HND Courses:</p>\r\n\r\n<p>A candidate must have either:</p>\r\n\r\n<ul>\r\n	<li>a level 3 qualification</li>\r\n	<li>a level 2 qualifications and relevant work experience</li>\r\n	<li>or substantial work experience related to the field of proposed study and,</li>\r\n	<li>Demonstrate capability in English equivalent to CEFR level B2 e.g. IELTS 5.5 (including 5.5 for reading and writing), PTE 51 or equivalent. and,</li>\r\n	<li>Demonstrate a Commitment to Study and a reasonable expectation of success on the Course</li>\r\n</ul>\r\n\r\n<p>International qualifications at the appropriate level will also be accepted. The College will use UK NARIC to determine the equivalence of any international qualifications.</p>\r\n\r\n<p>Where applicants do not have a formal qualification to demonstrate capability in English, they will be required to undertake the Colleges written English Language test before an offer of a place on a Course is made. Judgement of their capability in spoken English will be assessed by the Head of Department at the interview. Suitable alternative arrangements to written tests will be made where a student declares a disability, specific learning difficulty or long-term health condition on their application form, e.g. oral questioning, amanuensis etc.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(26, 13, 'Module Information/Semester Structure', '<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th colspan=\"3\">The modules available on the course are as follows.</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 1 for full-time students (Level 4)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Unit 1: Business Environment Credit 15</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 2 for full-time students (Level 5)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Credit</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(27, 13, 'Teaching and Learning', '<p>The College recognises that its Teaching, Learning and Assessment Strategy is fundamental to achieving the aims set out in its Mission Statement and to satisfy expectations contained in appropriate indicators in Chapter B3, B4 and B6 of the UK Quality Code for the Assurance of Academic Quality and Standards in Higher Education.</p>\r\n\r\n<p>The aims of the Teaching, Learning and Assessment Strategy is to achieve the following:</p>\r\n\r\n<ul>\r\n	<li>To widen participation from students who are mature, from Black and Minority Ethnic Communities, and come from lower socio-economic backgrounds</li>\r\n	<li>To educate students who are motivated and self-directed critical thinkers, capable of independent enquiry</li>\r\n	<li>To provide students with both sound academic knowledge and vocational expertise</li>\r\n	<li>To foster independent and collaborative learning among students and to encourage lifelong learning leading to enhancing their career potentials</li>\r\n	<li>To develop and implement approaches to feedback and assessment that maximise learning and student outcomes.</li>\r\n</ul>\r\n\r\n<p>(For more details please see The College Quality and Enhancement Manual)</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(28, 13, 'Assessment and Feedback', '<p>The College adheres to the adopted assessment policies and procedures that are published in the Quality and Enhancement Manual (QAEM) which is in line with the UK Quality Code. Effective assessment rests with the purpose for which the assessment is carried out as well as the nature and type of appropriate assessment tools used. In essence the assessment materials and tools should be fit-for-purpose. The college assessor and internal verifier assured that assignment brief of the assignments are fair and accurate as much as possible.</p>\r\n\r\n<p>As required by Pearson, according to the Course specifications, the key assessment objectives and strategies are aimed at assessing the achievement of a number of specific learning outcomes in every unit against specific assessment criteria.</p>\r\n\r\n<p>The College uses both formal and informal assessment strategies. The College uses a variety of assessment methods to enhance learning and improves the validity of assessment. The assessment methods improve the knowledge of the assessment criteria and what is required to gain higher grade achievement. There is a range of assessment methods that are utilised, such as: presentations; written reports. As an informal assessment strategy, the College implements a formative method of assessment which requires students to submit &lsquo;task by task&rsquo; coursework during the semester.</p>\r\n\r\n<p>This Course is assessed using a combination of ICON College and Pearson-set assignments. Each year, Pearson will issue a Theme and (for Level 4) a set of related Topics. ICON College will develop an assignment, to be internally assessed, to engage students in work related to the Pearson-set Theme.</p>\r\n\r\n<p>At Level 4, students will select a Topic to further define their approach to the Theme and assignment. At Level 5, it is expected that students will define their own Topic, in negotiation with Tutors, based on the Pearson-set Theme.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(29, 13, 'Purpose of the Course', '<p>The purpose of BTEC Higher Nationals in Business is to develop students as professional, self-reflecting individuals able to meet the demands of employers in the business sector and adapt to a constantly changing world. The qualifications aim to widen access to higher education and enhance the career prospects of those who undertake them.</p>\r\n\r\n<p><strong>Objectives of the Course</strong></p>\r\n\r\n<p>The objectives of the BTEC Higher Nationals in Business are as follows:</p>\r\n\r\n<ul>\r\n	<li>To equip students with business skills, knowledge and the understanding necessary to achieve high performance in the global business environment.</li>\r\n	<li>To provide education and training for a range of careers in business, including management, administration, human resources, marketing, entrepreneurship, accounting and finance.</li>\r\n	<li>To provide insight and understanding into international business operations and the opportunities and challenges presented by a globalised market place.</li>\r\n	<li>To equip students with knowledge and understanding of culturally diverse organisations, cross-cultural issues, diversity and values.</li>\r\n	<li>To provide opportunities for students to enter or progress in employment in business, or progress to higher education qualifications such as an Honours degree in business or a related area.</li>\r\n	<li>To provide opportunities for students to develop the skills, techniques and personal attributes essential for successful working lives.</li>\r\n	<li>To provide opportunities for those students with a global outlook to aspire to international career pathways.</li>\r\n	<li>To provide opportunities for students to achieve a nationally-recognised professional qualification.</li>\r\n	<li>To offer students the chance of career progression in their chosen field.</li>\r\n	<li>To allow flexibility of study and to meet local or specialist needs.</li>\r\n	<li>To offer a balance between employability skills and the knowledge essential for students with entrepreneurial, employment or academic aspirations</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(30, 13, 'Course Learning Outcomes', '<p><strong>Knowledge and understanding</strong></p>\r\n\r\n<p>Students will be expected to gain the following knowledge during the Course of study:</p>\r\n\r\n<ul>\r\n	<li>Developing the knowledge, understanding and skills of organisations, the business environment in which they operate and their management.</li>\r\n	<li>Demonstrating knowledge and understanding Markets, and Marketing and sales, the management of resources including the supply chain, procurement, logistics, and outsourcing.</li>\r\n	<li>Equipping students with awareness of Customer management and relationship and leadership.</li>\r\n	<li>Developing knowledge of different financial sources and the use of accounting and managing financial risk.</li>\r\n	<li>Understanding the use of relevant communication in business and management including the use of digital technology.</li>\r\n	<li>Developing appropriate policies and strategies within a changing environment to meet stakeholders&rsquo; interest and the use of risk management techniques.</li>\r\n	<li>Providing innovative business ideas to create new products, services or organisations.</li>\r\n	<li>Realising the need for individuals and organisations to manage responsibility and behave ethically in relation to social, cultural, economic and environmental issues.</li>\r\n</ul>\r\n\r\n<p><strong>Skills</strong></p>\r\n\r\n<p>Students will be expected to develop the following skills during the Course of study:</p>\r\n\r\n<p><strong>Employability skills:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Cognitive and problem-solving skills:</strong> critical thinking, approaching non- routine problems by applying expert and creative solutions, use of systems and digital technology, generating and communicating ideas creatively.</li>\r\n	<li><strong>Intra-personal skills:</strong> self-management, adaptability and resilience, self- monitoring and self-development, self-analysis and reflection, planning and prioritising.</li>\r\n	<li><strong>Interpersonal skills:</strong> effective communication and articulation of information, working collaboratively, negotiating and influencing, self-presentation.</li>\r\n</ul>\r\n\r\n<p><strong>Knowledge and academic study skills:</strong></p>\r\n\r\n<ul>\r\n	<li>Active research skills</li>\r\n	<li>Effective writing skills</li>\r\n	<li>Analytical skills</li>\r\n	<li>Critical thinking</li>\r\n	<li>Creative problem-solving</li>\r\n	<li>Decision-making</li>\r\n	<li>Team building</li>\r\n	<li>Exam preparation skills</li>\r\n	<li>Digital literacy</li>\r\n	<li>Competence in assessment methods used in higher education.</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(31, 13, 'Relevant External Reference Points', '<ul>\r\n	<li>QAA subject benchmark statements for Business and Business Management</li>\r\n	<li>The qualification remains as intermediate level qualifications on the FHEQ. Please refer to the Pearson programme specification for RQF.</li>\r\n</ul>\r\n\r\n<p>Chartered Institute of Management (CIM), Association of Chartered Certified Accountants (ACCA), Chartered Institute of Personnel and Development (CIPD).</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:34:32', NULL, NULL, 'Active'),
(32, 14, 'Course Overview', '<p>he BTEC (Business Technology Engineering Council) Higher National Diploma (HND) is a specialist programme with a strong workrelated emphasis. The qualification provides a thorough grounding in the key concepts and practical skills required in the sector with national recognition by employers allowing progression direct into employment or to degree.</p>\r\n\r\n<p>This HND in Business is ideal for those who wish to study at the undergraduate level to become better managers. Successful completion of HND allows students direct entry to top up honours degree at many UK universities.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', NULL, NULL, 'Active'),
(33, 14, 'Progression', '<p>The Level 5 Higher National Diploma allows students to specialise by committing to specific career paths and progression routes to degree-level study.</p>\r\n\r\n<p>On successful completion of the Level 5 Higher National Diploma, students can develop their careers in the business sector through:</p>\r\n\r\n<ul>\r\n	<li>Entering employment</li>\r\n	<li>Continuing existing employment</li>\r\n	<li>Linking with the appropriate Professional Body</li>\r\n	<li>Committing to Continuing Professional Development (CPD)</li>\r\n	<li>Progressing to university.</li>\r\n</ul>\r\n\r\n<p>The Level 5 Higher National Diploma is recognised by Higher Education providers as meeting admission requirements to many relevant business-related courses, for example:</p>\r\n\r\n<ul>\r\n	<li>BSc (Hons) in Business and Management</li>\r\n	<li>BA and BSc (Hons) in Business Studies</li>\r\n	<li>BSc (Hons) in International Management.</li>\r\n</ul>\r\n\r\n<p>Students should always check the entry requirements for degree Courses at specific Higher Education providers. After completing a BTEC Higher National Diploma, students can also progress directly into employment.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', 'admin@gmail.com', '2017-11-15 11:31:54', 'Inactive'),
(34, 14, 'Course Structure/Unit Details', '<p>This course consists of 15 units (8 core units + 7 optional units) including a Project. There are 60 learning hours for each unit and 120 learning hours for the Project.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 4 Units (Eight Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>1</strong></td>\r\n			<td>Business and the Business Environment</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2</strong></td>\r\n			<td>Marketing Essentials</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3</strong></td>\r\n			<td>Human Resource Management</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4</strong></td>\r\n			<td>Management and Operations</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5</strong></td>\r\n			<td>Management Accounting</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6</strong></td>\r\n			<td>Managing a Successful Business Project (Pearson-set)</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>8</strong></td>\r\n			<td>Innovation and Commercialisation</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>9</strong></td>\r\n			<td>Entrepreneurship and Small Business</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 5 Units (Seven Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>11</strong></td>\r\n			<td>Research Project (Pearson-set)</td>\r\n			<td>30</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>12</strong></td>\r\n			<td>Organisational Behaviour</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>17</strong></td>\r\n			<td>Understanding and Leading Change</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>32</strong></td>\r\n			<td>Business Strategy</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>35</strong></td>\r\n			<td>Developing Individuals, Teams and Organisations</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>40</strong></td>\r\n			<td>International Marketing</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>41</strong></td>\r\n			<td>Brand Management</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', NULL, NULL, 'Active'),
(35, 14, 'Entry Requirements', '<p>To meet the entry criteria for admission to level 5 HND Courses:</p>\r\n\r\n<p>A candidate must have either:</p>\r\n\r\n<ul>\r\n	<li>a level 3 qualification</li>\r\n	<li>a level 2 qualifications and relevant work experience</li>\r\n	<li>or substantial work experience related to the field of proposed study and,</li>\r\n	<li>Demonstrate capability in English equivalent to CEFR level B2 e.g. IELTS 5.5 (including 5.5 for reading and writing), PTE 51 or equivalent. and,</li>\r\n	<li>Demonstrate a Commitment to Study and a reasonable expectation of success on the Course</li>\r\n</ul>\r\n\r\n<p>International qualifications at the appropriate level will also be accepted. The College will use UK NARIC to determine the equivalence of any international qualifications.</p>\r\n\r\n<p>Where applicants do not have a formal qualification to demonstrate capability in English, they will be required to undertake the Colleges written English Language test before an offer of a place on a Course is made. Judgement of their capability in spoken English will be assessed by the Head of Department at the interview. Suitable alternative arrangements to written tests will be made where a student declares a disability, specific learning difficulty or long-term health condition on their application form, e.g. oral questioning, amanuensis etc.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', NULL, NULL, 'Active'),
(36, 14, 'Module Information/Semester Structure', '<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th colspan=\"3\">The modules available on the course are as follows.</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 1 for full-time students (Level 4)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Unit 1: Business Environment Credit 15</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 2 for full-time students (Level 5)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Credit</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', NULL, NULL, 'Active'),
(37, 14, 'Teaching and Learning', '<p>The College recognises that its Teaching, Learning and Assessment Strategy is fundamental to achieving the aims set out in its Mission Statement and to satisfy expectations contained in appropriate indicators in Chapter B3, B4 and B6 of the UK Quality Code for the Assurance of Academic Quality and Standards in Higher Education.</p>\r\n\r\n<p>The aims of the Teaching, Learning and Assessment Strategy is to achieve the following:</p>\r\n\r\n<ul>\r\n	<li>To widen participation from students who are mature, from Black and Minority Ethnic Communities, and come from lower socio-economic backgrounds</li>\r\n	<li>To educate students who are motivated and self-directed critical thinkers, capable of independent enquiry</li>\r\n	<li>To provide students with both sound academic knowledge and vocational expertise</li>\r\n	<li>To foster independent and collaborative learning among students and to encourage lifelong learning leading to enhancing their career potentials</li>\r\n	<li>To develop and implement approaches to feedback and assessment that maximise learning and student outcomes.</li>\r\n</ul>\r\n\r\n<p>(For more details please see The College Quality and Enhancement Manual)</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', NULL, NULL, 'Active'),
(38, 14, 'Assessment and Feedback', '<p>The College adheres to the adopted assessment policies and procedures that are published in the Quality and Enhancement Manual (QAEM) which is in line with the UK Quality Code. Effective assessment rests with the purpose for which the assessment is carried out as well as the nature and type of appropriate assessment tools used. In essence the assessment materials and tools should be fit-for-purpose. The college assessor and internal verifier assured that assignment brief of the assignments are fair and accurate as much as possible.</p>\r\n\r\n<p>As required by Pearson, according to the Course specifications, the key assessment objectives and strategies are aimed at assessing the achievement of a number of specific learning outcomes in every unit against specific assessment criteria.</p>\r\n\r\n<p>The College uses both formal and informal assessment strategies. The College uses a variety of assessment methods to enhance learning and improves the validity of assessment. The assessment methods improve the knowledge of the assessment criteria and what is required to gain higher grade achievement. There is a range of assessment methods that are utilised, such as: presentations; written reports. As an informal assessment strategy, the College implements a formative method of assessment which requires students to submit &lsquo;task by task&rsquo; coursework during the semester.</p>\r\n\r\n<p>This Course is assessed using a combination of ICON College and Pearson-set assignments. Each year, Pearson will issue a Theme and (for Level 4) a set of related Topics. ICON College will develop an assignment, to be internally assessed, to engage students in work related to the Pearson-set Theme.</p>\r\n\r\n<p>At Level 4, students will select a Topic to further define their approach to the Theme and assignment. At Level 5, it is expected that students will define their own Topic, in negotiation with Tutors, based on the Pearson-set Theme.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', NULL, NULL, 'Active'),
(39, 14, 'Purpose of the Course', '<p>The purpose of BTEC Higher Nationals in Business is to develop students as professional, self-reflecting individuals able to meet the demands of employers in the business sector and adapt to a constantly changing world. The qualifications aim to widen access to higher education and enhance the career prospects of those who undertake them.</p>\r\n\r\n<p><strong>Objectives of the Course</strong></p>\r\n\r\n<p>The objectives of the BTEC Higher Nationals in Business are as follows:</p>\r\n\r\n<ul>\r\n	<li>To equip students with business skills, knowledge and the understanding necessary to achieve high performance in the global business environment.</li>\r\n	<li>To provide education and training for a range of careers in business, including management, administration, human resources, marketing, entrepreneurship, accounting and finance.</li>\r\n	<li>To provide insight and understanding into international business operations and the opportunities and challenges presented by a globalised market place.</li>\r\n	<li>To equip students with knowledge and understanding of culturally diverse organisations, cross-cultural issues, diversity and values.</li>\r\n	<li>To provide opportunities for students to enter or progress in employment in business, or progress to higher education qualifications such as an Honours degree in business or a related area.</li>\r\n	<li>To provide opportunities for students to develop the skills, techniques and personal attributes essential for successful working lives.</li>\r\n	<li>To provide opportunities for those students with a global outlook to aspire to international career pathways.</li>\r\n	<li>To provide opportunities for students to achieve a nationally-recognised professional qualification.</li>\r\n	<li>To offer students the chance of career progression in their chosen field.</li>\r\n	<li>To allow flexibility of study and to meet local or specialist needs.</li>\r\n	<li>To offer a balance between employability skills and the knowledge essential for students with entrepreneurial, employment or academic aspirations</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', NULL, NULL, 'Active'),
(40, 14, 'Course Learning Outcomes', '<p><strong>Knowledge and understanding</strong></p>\r\n\r\n<p>Students will be expected to gain the following knowledge during the Course of study:</p>\r\n\r\n<ul>\r\n	<li>Developing the knowledge, understanding and skills of organisations, the business environment in which they operate and their management.</li>\r\n	<li>Demonstrating knowledge and understanding Markets, and Marketing and sales, the management of resources including the supply chain, procurement, logistics, and outsourcing.</li>\r\n	<li>Equipping students with awareness of Customer management and relationship and leadership.</li>\r\n	<li>Developing knowledge of different financial sources and the use of accounting and managing financial risk.</li>\r\n	<li>Understanding the use of relevant communication in business and management including the use of digital technology.</li>\r\n	<li>Developing appropriate policies and strategies within a changing environment to meet stakeholders&rsquo; interest and the use of risk management techniques.</li>\r\n	<li>Providing innovative business ideas to create new products, services or organisations.</li>\r\n	<li>Realising the need for individuals and organisations to manage responsibility and behave ethically in relation to social, cultural, economic and environmental issues.</li>\r\n</ul>\r\n\r\n<p><strong>Skills</strong></p>\r\n\r\n<p>Students will be expected to develop the following skills during the Course of study:</p>\r\n\r\n<p><strong>Employability skills:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Cognitive and problem-solving skills:</strong> critical thinking, approaching non- routine problems by applying expert and creative solutions, use of systems and digital technology, generating and communicating ideas creatively.</li>\r\n	<li><strong>Intra-personal skills:</strong> self-management, adaptability and resilience, self- monitoring and self-development, self-analysis and reflection, planning and prioritising.</li>\r\n	<li><strong>Interpersonal skills:</strong> effective communication and articulation of information, working collaboratively, negotiating and influencing, self-presentation.</li>\r\n</ul>\r\n\r\n<p><strong>Knowledge and academic study skills:</strong></p>\r\n\r\n<ul>\r\n	<li>Active research skills</li>\r\n	<li>Effective writing skills</li>\r\n	<li>Analytical skills</li>\r\n	<li>Critical thinking</li>\r\n	<li>Creative problem-solving</li>\r\n	<li>Decision-making</li>\r\n	<li>Team building</li>\r\n	<li>Exam preparation skills</li>\r\n	<li>Digital literacy</li>\r\n	<li>Competence in assessment methods used in higher education.</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', NULL, NULL, 'Active');
INSERT INTO `ictmcoursesection` (`courseSectionId`, `courseId`, `courseSectionTitle`, `courseSectionContent`, `courseSectionImage`, `orderNumber`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `courseSectionStatus`) VALUES
(41, 14, 'Relevant External Reference Points', '<ul>\r\n	<li>QAA subject benchmark statements for Business and Business Management</li>\r\n	<li>The qualification remains as intermediate level qualifications on the FHEQ. Please refer to the Pearson programme specification for RQF.</li>\r\n</ul>\r\n\r\n<p>Chartered Institute of Management (CIM), Association of Chartered Certified Accountants (ACCA), Chartered Institute of Personnel and Development (CIPD).</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:38:05', NULL, NULL, 'Active'),
(42, 15, 'Course Overview', '<p>The BTEC (Business Technology Engineering Council) Higher National Diploma (HND) is a specialist programme with a strong workrelated emphasis. The qualification provides a thorough grounding in the key concepts and practical skills required in the sector with national recognition by employers allowing progression direct into employment or to degree.</p>\r\n\r\n<p>This HND in Business is ideal for those who wish to study at the undergraduate level to become better managers. Successful completion of HND allows students direct entry to top up honours degree at many UK universities.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(43, 15, 'Progression', '<p>The Level 5 Higher National Diploma allows students to specialise by committing to specific career paths and progression routes to degree-level study.</p>\r\n\r\n<p>On successful completion of the Level 5 Higher National Diploma, students can develop their careers in the business sector through:</p>\r\n\r\n<ul>\r\n	<li>Entering employment</li>\r\n	<li>Continuing existing employment</li>\r\n	<li>Linking with the appropriate Professional Body</li>\r\n	<li>Committing to Continuing Professional Development (CPD)</li>\r\n	<li>Progressing to university.</li>\r\n</ul>\r\n\r\n<p>The Level 5 Higher National Diploma is recognised by Higher Education providers as meeting admission requirements to many relevant business-related courses, for example:</p>\r\n\r\n<ul>\r\n	<li>BSc (Hons) in Business and Management</li>\r\n	<li>BA and BSc (Hons) in Business Studies</li>\r\n	<li>BSc (Hons) in International Management.</li>\r\n</ul>\r\n\r\n<p>Students should always check the entry requirements for degree Courses at specific Higher Education providers. After completing a BTEC Higher National Diploma, students can also progress directly into employment.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(44, 15, 'Course Structure/Unit Details', '<p>This course consists of 15 units (8 core units + 7 optional units) including a Project. There are 60 learning hours for each unit and 120 learning hours for the Project.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 4 Units (Eight Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>1</strong></td>\r\n			<td>Business and the Business Environment</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2</strong></td>\r\n			<td>Marketing Essentials</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3</strong></td>\r\n			<td>Human Resource Management</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4</strong></td>\r\n			<td>Management and Operations</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5</strong></td>\r\n			<td>Management Accounting</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6</strong></td>\r\n			<td>Managing a Successful Business Project (Pearson-set)</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>8</strong></td>\r\n			<td>Innovation and Commercialisation</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>9</strong></td>\r\n			<td>Entrepreneurship and Small Business</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 5 Units (Seven Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>11</strong></td>\r\n			<td>Research Project (Pearson-set)</td>\r\n			<td>30</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>12</strong></td>\r\n			<td>Organisational Behaviour</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>17</strong></td>\r\n			<td>Understanding and Leading Change</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>32</strong></td>\r\n			<td>Business Strategy</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>35</strong></td>\r\n			<td>Developing Individuals, Teams and Organisations</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>40</strong></td>\r\n			<td>International Marketing</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>41</strong></td>\r\n			<td>Brand Management</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(45, 15, 'Entry Requirements', '<p>To meet the entry criteria for admission to level 5 HND Courses:</p>\r\n\r\n<p>A candidate must have either:</p>\r\n\r\n<ul>\r\n	<li>a level 3 qualification</li>\r\n	<li>a level 2 qualifications and relevant work experience</li>\r\n	<li>or substantial work experience related to the field of proposed study and,</li>\r\n	<li>Demonstrate capability in English equivalent to CEFR level B2 e.g. IELTS 5.5 (including 5.5 for reading and writing), PTE 51 or equivalent. and,</li>\r\n	<li>Demonstrate a Commitment to Study and a reasonable expectation of success on the Course</li>\r\n</ul>\r\n\r\n<p>International qualifications at the appropriate level will also be accepted. The College will use UK NARIC to determine the equivalence of any international qualifications.</p>\r\n\r\n<p>Where applicants do not have a formal qualification to demonstrate capability in English, they will be required to undertake the Colleges written English Language test before an offer of a place on a Course is made. Judgement of their capability in spoken English will be assessed by the Head of Department at the interview. Suitable alternative arrangements to written tests will be made where a student declares a disability, specific learning difficulty or long-term health condition on their application form, e.g. oral questioning, amanuensis etc.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(46, 15, 'Module Information/Semester Structure', '<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th colspan=\"3\">The modules available on the course are as follows.</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 1 for full-time students (Level 4)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Unit 1: Business Environment Credit 15</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 2 for full-time students (Level 5)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Credit</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(47, 15, 'Teaching and Learning', '<p>The College recognises that its Teaching, Learning and Assessment Strategy is fundamental to achieving the aims set out in its Mission Statement and to satisfy expectations contained in appropriate indicators in Chapter B3, B4 and B6 of the UK Quality Code for the Assurance of Academic Quality and Standards in Higher Education.</p>\r\n\r\n<p>The aims of the Teaching, Learning and Assessment Strategy is to achieve the following:</p>\r\n\r\n<ul>\r\n	<li>To widen participation from students who are mature, from Black and Minority Ethnic Communities, and come from lower socio-economic backgrounds</li>\r\n	<li>To educate students who are motivated and self-directed critical thinkers, capable of independent enquiry</li>\r\n	<li>To provide students with both sound academic knowledge and vocational expertise</li>\r\n	<li>To foster independent and collaborative learning among students and to encourage lifelong learning leading to enhancing their career potentials</li>\r\n	<li>To develop and implement approaches to feedback and assessment that maximise learning and student outcomes.</li>\r\n</ul>\r\n\r\n<p>(For more details please see The College Quality and Enhancement Manual)</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(48, 15, 'Assessment and Feedback', '<p>The College adheres to the adopted assessment policies and procedures that are published in the Quality and Enhancement Manual (QAEM) which is in line with the UK Quality Code. Effective assessment rests with the purpose for which the assessment is carried out as well as the nature and type of appropriate assessment tools used. In essence the assessment materials and tools should be fit-for-purpose. The college assessor and internal verifier assured that assignment brief of the assignments are fair and accurate as much as possible.</p>\r\n\r\n<p>As required by Pearson, according to the Course specifications, the key assessment objectives and strategies are aimed at assessing the achievement of a number of specific learning outcomes in every unit against specific assessment criteria.</p>\r\n\r\n<p>The College uses both formal and informal assessment strategies. The College uses a variety of assessment methods to enhance learning and improves the validity of assessment. The assessment methods improve the knowledge of the assessment criteria and what is required to gain higher grade achievement. There is a range of assessment methods that are utilised, such as: presentations; written reports. As an informal assessment strategy, the College implements a formative method of assessment which requires students to submit &lsquo;task by task&rsquo; coursework during the semester.</p>\r\n\r\n<p>This Course is assessed using a combination of ICON College and Pearson-set assignments. Each year, Pearson will issue a Theme and (for Level 4) a set of related Topics. ICON College will develop an assignment, to be internally assessed, to engage students in work related to the Pearson-set Theme.</p>\r\n\r\n<p>At Level 4, students will select a Topic to further define their approach to the Theme and assignment. At Level 5, it is expected that students will define their own Topic, in negotiation with Tutors, based on the Pearson-set Theme.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(49, 15, 'Purpose of the Course', '<p>The purpose of BTEC Higher Nationals in Business is to develop students as professional, self-reflecting individuals able to meet the demands of employers in the business sector and adapt to a constantly changing world. The qualifications aim to widen access to higher education and enhance the career prospects of those who undertake them.</p>\r\n\r\n<p><strong>Objectives of the Course</strong></p>\r\n\r\n<p>The objectives of the BTEC Higher Nationals in Business are as follows:</p>\r\n\r\n<ul>\r\n	<li>To equip students with business skills, knowledge and the understanding necessary to achieve high performance in the global business environment.</li>\r\n	<li>To provide education and training for a range of careers in business, including management, administration, human resources, marketing, entrepreneurship, accounting and finance.</li>\r\n	<li>To provide insight and understanding into international business operations and the opportunities and challenges presented by a globalised market place.</li>\r\n	<li>To equip students with knowledge and understanding of culturally diverse organisations, cross-cultural issues, diversity and values.</li>\r\n	<li>To provide opportunities for students to enter or progress in employment in business, or progress to higher education qualifications such as an Honours degree in business or a related area.</li>\r\n	<li>To provide opportunities for students to develop the skills, techniques and personal attributes essential for successful working lives.</li>\r\n	<li>To provide opportunities for those students with a global outlook to aspire to international career pathways.</li>\r\n	<li>To provide opportunities for students to achieve a nationally-recognised professional qualification.</li>\r\n	<li>To offer students the chance of career progression in their chosen field.</li>\r\n	<li>To allow flexibility of study and to meet local or specialist needs.</li>\r\n	<li>To offer a balance between employability skills and the knowledge essential for students with entrepreneurial, employment or academic aspirations</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(50, 15, 'Course Learning Outcomes', '<p><strong>Knowledge and understanding</strong></p>\r\n\r\n<p>Students will be expected to gain the following knowledge during the Course of study:</p>\r\n\r\n<ul>\r\n	<li>Developing the knowledge, understanding and skills of organisations, the business environment in which they operate and their management.</li>\r\n	<li>Demonstrating knowledge and understanding Markets, and Marketing and sales, the management of resources including the supply chain, procurement, logistics, and outsourcing.</li>\r\n	<li>Equipping students with awareness of Customer management and relationship and leadership.</li>\r\n	<li>Developing knowledge of different financial sources and the use of accounting and managing financial risk.</li>\r\n	<li>Understanding the use of relevant communication in business and management including the use of digital technology.</li>\r\n	<li>Developing appropriate policies and strategies within a changing environment to meet stakeholders&rsquo; interest and the use of risk management techniques.</li>\r\n	<li>Providing innovative business ideas to create new products, services or organisations.</li>\r\n	<li>Realising the need for individuals and organisations to manage responsibility and behave ethically in relation to social, cultural, economic and environmental issues.</li>\r\n</ul>\r\n\r\n<p><strong>Skills</strong></p>\r\n\r\n<p>Students will be expected to develop the following skills during the Course of study:</p>\r\n\r\n<p><strong>Employability skills:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Cognitive and problem-solving skills:</strong> critical thinking, approaching non- routine problems by applying expert and creative solutions, use of systems and digital technology, generating and communicating ideas creatively.</li>\r\n	<li><strong>Intra-personal skills:</strong> self-management, adaptability and resilience, self- monitoring and self-development, self-analysis and reflection, planning and prioritising.</li>\r\n	<li><strong>Interpersonal skills:</strong> effective communication and articulation of information, working collaboratively, negotiating and influencing, self-presentation.</li>\r\n</ul>\r\n\r\n<p><strong>Knowledge and academic study skills:</strong></p>\r\n\r\n<ul>\r\n	<li>Active research skills</li>\r\n	<li>Effective writing skills</li>\r\n	<li>Analytical skills</li>\r\n	<li>Critical thinking</li>\r\n	<li>Creative problem-solving</li>\r\n	<li>Decision-making</li>\r\n	<li>Team building</li>\r\n	<li>Exam preparation skills</li>\r\n	<li>Digital literacy</li>\r\n	<li>Competence in assessment methods used in higher education.</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(51, 15, 'Relevant External Reference Points', '<ul>\r\n	<li>QAA subject benchmark statements for Business and Business Management</li>\r\n	<li>The qualification remains as intermediate level qualifications on the FHEQ. Please refer to the Pearson programme specification for RQF.</li>\r\n</ul>\r\n\r\n<p>Chartered Institute of Management (CIM), Association of Chartered Certified Accountants (ACCA), Chartered Institute of Personnel and Development (CIPD).</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:42:53', NULL, NULL, 'Active'),
(52, 16, 'Course Overview', '<p>The BTEC (Business Technology Engineering Council) Higher National Diploma (HND) is a specialist programme with a strong workrelated emphasis. The qualification provides a thorough grounding in the key concepts and practical skills required in the sector with national recognition by employers allowing progression direct into employment or to degree.</p>\r\n\r\n<p>This HND in Business is ideal for those who wish to study at the undergraduate level to become better managers. Successful completion of HND allows students direct entry to top up honours degree at many UK universities.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(53, 16, 'Progression', '<p>The Level 5 Higher National Diploma allows students to specialise by committing to specific career paths and progression routes to degree-level study.</p>\r\n\r\n<p>On successful completion of the Level 5 Higher National Diploma, students can develop their careers in the business sector through:</p>\r\n\r\n<ul>\r\n	<li>Entering employment</li>\r\n	<li>Continuing existing employment</li>\r\n	<li>Linking with the appropriate Professional Body</li>\r\n	<li>Committing to Continuing Professional Development (CPD)</li>\r\n	<li>Progressing to university.</li>\r\n</ul>\r\n\r\n<p>The Level 5 Higher National Diploma is recognised by Higher Education providers as meeting admission requirements to many relevant business-related courses, for example:</p>\r\n\r\n<ul>\r\n	<li>BSc (Hons) in Business and Management</li>\r\n	<li>BA and BSc (Hons) in Business Studies</li>\r\n	<li>BSc (Hons) in International Management.</li>\r\n</ul>\r\n\r\n<p>Students should always check the entry requirements for degree Courses at specific Higher Education providers. After completing a BTEC Higher National Diploma, students can also progress directly into employment.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(54, 16, 'Course Structure/Unit Details', '<p>This course consists of 15 units (8 core units + 7 optional units) including a Project. There are 60 learning hours for each unit and 120 learning hours for the Project.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 4 Units (Eight Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>1</strong></td>\r\n			<td>Business and the Business Environment</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2</strong></td>\r\n			<td>Marketing Essentials</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3</strong></td>\r\n			<td>Human Resource Management</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4</strong></td>\r\n			<td>Management and Operations</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5</strong></td>\r\n			<td>Management Accounting</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6</strong></td>\r\n			<td>Managing a Successful Business Project (Pearson-set)</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>8</strong></td>\r\n			<td>Innovation and Commercialisation</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>9</strong></td>\r\n			<td>Entrepreneurship and Small Business</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 5 Units (Seven Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>11</strong></td>\r\n			<td>Research Project (Pearson-set)</td>\r\n			<td>30</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>12</strong></td>\r\n			<td>Organisational Behaviour</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>17</strong></td>\r\n			<td>Understanding and Leading Change</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>32</strong></td>\r\n			<td>Business Strategy</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>35</strong></td>\r\n			<td>Developing Individuals, Teams and Organisations</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>40</strong></td>\r\n			<td>International Marketing</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>41</strong></td>\r\n			<td>Brand Management</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(55, 16, 'Entry Requirements', '<p>To meet the entry criteria for admission to level 5 HND Courses:</p>\r\n\r\n<p>A candidate must have either:</p>\r\n\r\n<ul>\r\n	<li>a level 3 qualification</li>\r\n	<li>a level 2 qualifications and relevant work experience</li>\r\n	<li>or substantial work experience related to the field of proposed study and,</li>\r\n	<li>Demonstrate capability in English equivalent to CEFR level B2 e.g. IELTS 5.5 (including 5.5 for reading and writing), PTE 51 or equivalent. and,</li>\r\n	<li>Demonstrate a Commitment to Study and a reasonable expectation of success on the Course</li>\r\n</ul>\r\n\r\n<p>International qualifications at the appropriate level will also be accepted. The College will use UK NARIC to determine the equivalence of any international qualifications.</p>\r\n\r\n<p>Where applicants do not have a formal qualification to demonstrate capability in English, they will be required to undertake the Colleges written English Language test before an offer of a place on a Course is made. Judgement of their capability in spoken English will be assessed by the Head of Department at the interview. Suitable alternative arrangements to written tests will be made where a student declares a disability, specific learning difficulty or long-term health condition on their application form, e.g. oral questioning, amanuensis etc.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(56, 16, 'Module Information/Semester Structure', '<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th colspan=\"3\">The modules available on the course are as follows.</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 1 for full-time students (Level 4)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Unit 1: Business Environment Credit 15</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 2 for full-time students (Level 5)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Credit</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(57, 16, 'Teaching and Learning', '<p>The College recognises that its Teaching, Learning and Assessment Strategy is fundamental to achieving the aims set out in its Mission Statement and to satisfy expectations contained in appropriate indicators in Chapter B3, B4 and B6 of the UK Quality Code for the Assurance of Academic Quality and Standards in Higher Education.</p>\r\n\r\n<p>The aims of the Teaching, Learning and Assessment Strategy is to achieve the following:</p>\r\n\r\n<ul>\r\n	<li>To widen participation from students who are mature, from Black and Minority Ethnic Communities, and come from lower socio-economic backgrounds</li>\r\n	<li>To educate students who are motivated and self-directed critical thinkers, capable of independent enquiry</li>\r\n	<li>To provide students with both sound academic knowledge and vocational expertise</li>\r\n	<li>To foster independent and collaborative learning among students and to encourage lifelong learning leading to enhancing their career potentials</li>\r\n	<li>To develop and implement approaches to feedback and assessment that maximise learning and student outcomes.</li>\r\n</ul>\r\n\r\n<p>(For more details please see The College Quality and Enhancement Manual)</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(58, 16, 'Assessment and Feedback', '<p>The College adheres to the adopted assessment policies and procedures that are published in the Quality and Enhancement Manual (QAEM) which is in line with the UK Quality Code. Effective assessment rests with the purpose for which the assessment is carried out as well as the nature and type of appropriate assessment tools used. In essence the assessment materials and tools should be fit-for-purpose. The college assessor and internal verifier assured that assignment brief of the assignments are fair and accurate as much as possible.</p>\r\n\r\n<p>As required by Pearson, according to the Course specifications, the key assessment objectives and strategies are aimed at assessing the achievement of a number of specific learning outcomes in every unit against specific assessment criteria.</p>\r\n\r\n<p>The College uses both formal and informal assessment strategies. The College uses a variety of assessment methods to enhance learning and improves the validity of assessment. The assessment methods improve the knowledge of the assessment criteria and what is required to gain higher grade achievement. There is a range of assessment methods that are utilised, such as: presentations; written reports. As an informal assessment strategy, the College implements a formative method of assessment which requires students to submit &lsquo;task by task&rsquo; coursework during the semester.</p>\r\n\r\n<p>This Course is assessed using a combination of ICON College and Pearson-set assignments. Each year, Pearson will issue a Theme and (for Level 4) a set of related Topics. ICON College will develop an assignment, to be internally assessed, to engage students in work related to the Pearson-set Theme.</p>\r\n\r\n<p>At Level 4, students will select a Topic to further define their approach to the Theme and assignment. At Level 5, it is expected that students will define their own Topic, in negotiation with Tutors, based on the Pearson-set Theme.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(59, 16, 'Purpose of the Course', '<p>The purpose of BTEC Higher Nationals in Business is to develop students as professional, self-reflecting individuals able to meet the demands of employers in the business sector and adapt to a constantly changing world. The qualifications aim to widen access to higher education and enhance the career prospects of those who undertake them.</p>\r\n\r\n<p><strong>Objectives of the Course</strong></p>\r\n\r\n<p>The objectives of the BTEC Higher Nationals in Business are as follows:</p>\r\n\r\n<ul>\r\n	<li>To equip students with business skills, knowledge and the understanding necessary to achieve high performance in the global business environment.</li>\r\n	<li>To provide education and training for a range of careers in business, including management, administration, human resources, marketing, entrepreneurship, accounting and finance.</li>\r\n	<li>To provide insight and understanding into international business operations and the opportunities and challenges presented by a globalised market place.</li>\r\n	<li>To equip students with knowledge and understanding of culturally diverse organisations, cross-cultural issues, diversity and values.</li>\r\n	<li>To provide opportunities for students to enter or progress in employment in business, or progress to higher education qualifications such as an Honours degree in business or a related area.</li>\r\n	<li>To provide opportunities for students to develop the skills, techniques and personal attributes essential for successful working lives.</li>\r\n	<li>To provide opportunities for those students with a global outlook to aspire to international career pathways.</li>\r\n	<li>To provide opportunities for students to achieve a nationally-recognised professional qualification.</li>\r\n	<li>To offer students the chance of career progression in their chosen field.</li>\r\n	<li>To allow flexibility of study and to meet local or specialist needs.</li>\r\n	<li>To offer a balance between employability skills and the knowledge essential for students with entrepreneurial, employment or academic aspirations</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(60, 16, 'Course Learning Outcomes', '<p><strong>Knowledge and understanding</strong></p>\r\n\r\n<p>Students will be expected to gain the following knowledge during the Course of study:</p>\r\n\r\n<ul>\r\n	<li>Developing the knowledge, understanding and skills of organisations, the business environment in which they operate and their management.</li>\r\n	<li>Demonstrating knowledge and understanding Markets, and Marketing and sales, the management of resources including the supply chain, procurement, logistics, and outsourcing.</li>\r\n	<li>Equipping students with awareness of Customer management and relationship and leadership.</li>\r\n	<li>Developing knowledge of different financial sources and the use of accounting and managing financial risk.</li>\r\n	<li>Understanding the use of relevant communication in business and management including the use of digital technology.</li>\r\n	<li>Developing appropriate policies and strategies within a changing environment to meet stakeholders&rsquo; interest and the use of risk management techniques.</li>\r\n	<li>Providing innovative business ideas to create new products, services or organisations.</li>\r\n	<li>Realising the need for individuals and organisations to manage responsibility and behave ethically in relation to social, cultural, economic and environmental issues.</li>\r\n</ul>\r\n\r\n<p><strong>Skills</strong></p>\r\n\r\n<p>Students will be expected to develop the following skills during the Course of study:</p>\r\n\r\n<p><strong>Employability skills:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Cognitive and problem-solving skills:</strong> critical thinking, approaching non- routine problems by applying expert and creative solutions, use of systems and digital technology, generating and communicating ideas creatively.</li>\r\n	<li><strong>Intra-personal skills:</strong> self-management, adaptability and resilience, self- monitoring and self-development, self-analysis and reflection, planning and prioritising.</li>\r\n	<li><strong>Interpersonal skills:</strong> effective communication and articulation of information, working collaboratively, negotiating and influencing, self-presentation.</li>\r\n</ul>\r\n\r\n<p><strong>Knowledge and academic study skills:</strong></p>\r\n\r\n<ul>\r\n	<li>Active research skills</li>\r\n	<li>Effective writing skills</li>\r\n	<li>Analytical skills</li>\r\n	<li>Critical thinking</li>\r\n	<li>Creative problem-solving</li>\r\n	<li>Decision-making</li>\r\n	<li>Team building</li>\r\n	<li>Exam preparation skills</li>\r\n	<li>Digital literacy</li>\r\n	<li>Competence in assessment methods used in higher education.</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(61, 16, 'Relevant External Reference Points', '<ul>\r\n	<li>QAA subject benchmark statements for Business and Business Management</li>\r\n	<li>The qualification remains as intermediate level qualifications on the FHEQ. Please refer to the Pearson programme specification for RQF.</li>\r\n</ul>\r\n\r\n<p>Chartered Institute of Management (CIM), Association of Chartered Certified Accountants (ACCA), Chartered Institute of Personnel and Development (CIPD).</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:46:05', NULL, NULL, 'Active'),
(62, 17, 'Course Overview', '<p>The BTEC (Business Technology Engineering Council) Higher National Diploma (HND) is a specialist programme with a strong workrelated emphasis. The qualification provides a thorough grounding in the key concepts and practical skills required in the sector with national recognition by employers allowing progression direct into employment or to degree.</p>\r\n\r\n<p>This HND in Business is ideal for those who wish to study at the undergraduate level to become better managers. Successful completion of HND allows students direct entry to top up honours degree at many UK universities.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:04', NULL, NULL, 'Active'),
(63, 17, 'Progression', '<p>The Level 5 Higher National Diploma allows students to specialise by committing to specific career paths and progression routes to degree-level study.</p>\r\n\r\n<p>On successful completion of the Level 5 Higher National Diploma, students can develop their careers in the business sector through:</p>\r\n\r\n<ul>\r\n	<li>Entering employment</li>\r\n	<li>Continuing existing employment</li>\r\n	<li>Linking with the appropriate Professional Body</li>\r\n	<li>Committing to Continuing Professional Development (CPD)</li>\r\n	<li>Progressing to university.</li>\r\n</ul>\r\n\r\n<p>The Level 5 Higher National Diploma is recognised by Higher Education providers as meeting admission requirements to many relevant business-related courses, for example:</p>\r\n\r\n<ul>\r\n	<li>BSc (Hons) in Business and Management</li>\r\n	<li>BA and BSc (Hons) in Business Studies</li>\r\n	<li>BSc (Hons) in International Management.</li>\r\n</ul>\r\n\r\n<p>Students should always check the entry requirements for degree Courses at specific Higher Education providers. After completing a BTEC Higher National Diploma, students can also progress directly into employment.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:04', NULL, NULL, 'Active'),
(64, 17, 'Course Structure/Unit Details', '<p>This course consists of 15 units (8 core units + 7 optional units) including a Project. There are 60 learning hours for each unit and 120 learning hours for the Project.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 4 Units (Eight Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>1</strong></td>\r\n			<td>Business and the Business Environment</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>2</strong></td>\r\n			<td>Marketing Essentials</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>3</strong></td>\r\n			<td>Human Resource Management</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>4</strong></td>\r\n			<td>Management and Operations</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>5</strong></td>\r\n			<td>Management Accounting</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>6</strong></td>\r\n			<td>Managing a Successful Business Project (Pearson-set)</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>8</strong></td>\r\n			<td>Innovation and Commercialisation</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>9</strong></td>\r\n			<td>Entrepreneurship and Small Business</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\" style=\"height:218px; width:494px\">\r\n	<thead>\r\n		<tr>\r\n			<th>Unit No</th>\r\n			<th>Level 5 Units (Seven Units, 120 Credit Value)</th>\r\n			<th>Unit Credit</th>\r\n			<th>Unit</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>11</strong></td>\r\n			<td>Research Project (Pearson-set)</td>\r\n			<td>30</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>12</strong></td>\r\n			<td>Organisational Behaviour</td>\r\n			<td>15</td>\r\n			<td>Core</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>17</strong></td>\r\n			<td>Understanding and Leading Change</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>32</strong></td>\r\n			<td>Business Strategy</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>35</strong></td>\r\n			<td>Developing Individuals, Teams and Organisations</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>40</strong></td>\r\n			<td>International Marketing</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>41</strong></td>\r\n			<td>Brand Management</td>\r\n			<td>15</td>\r\n			<td>Optional</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:04', 'admin@gmail.com', '2017-10-16 12:59:51', 'Active'),
(65, 17, 'Entry Requirements', '<p>To meet the entry criteria for admission to level 5 HND Courses:</p>\r\n\r\n<p>A candidate must have either:</p>\r\n\r\n<ul>\r\n	<li>a level 3 qualification</li>\r\n	<li>a level 2 qualifications and relevant work experience</li>\r\n	<li>or substantial work experience related to the field of proposed study and,</li>\r\n	<li>Demonstrate capability in English equivalent to CEFR level B2 e.g. IELTS 5.5 (including 5.5 for reading and writing), PTE 51 or equivalent. and,</li>\r\n	<li>Demonstrate a Commitment to Study and a reasonable expectation of success on the Course</li>\r\n</ul>\r\n\r\n<p>International qualifications at the appropriate level will also be accepted. The College will use UK NARIC to determine the equivalence of any international qualifications.</p>\r\n\r\n<p>Where applicants do not have a formal qualification to demonstrate capability in English, they will be required to undertake the Colleges written English Language test before an offer of a place on a Course is made. Judgement of their capability in spoken English will be assessed by the Head of Department at the interview. Suitable alternative arrangements to written tests will be made where a student declares a disability, specific learning difficulty or long-term health condition on their application form, e.g. oral questioning, amanuensis etc.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:04', NULL, NULL, 'Active'),
(66, 17, 'Module Information/Semester Structure', '<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th colspan=\"3\">The modules available on the course are as follows.</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 1 for full-time students (Level 4)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Unit 1: Business Environment Credit 15</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td rowspan=\"2\"><strong>Year 2 for full-time students (Level 5)</strong></td>\r\n			<td>Semester-1 Compulsory Modules Credit</td>\r\n			<td>Semester-1 Optional Modules Credit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Semester-2 Compulsory Modules Credit</td>\r\n			<td>Semester-2 Optional Modules Credit</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:04', NULL, NULL, 'Active'),
(67, 17, 'Teaching and Learning', '<p>The College recognises that its Teaching, Learning and Assessment Strategy is fundamental to achieving the aims set out in its Mission Statement and to satisfy expectations contained in appropriate indicators in Chapter B3, B4 and B6 of the UK Quality Code for the Assurance of Academic Quality and Standards in Higher Education.</p>\r\n\r\n<p>The aims of the Teaching, Learning and Assessment Strategy is to achieve the following:</p>\r\n\r\n<ul>\r\n	<li>To widen participation from students who are mature, from Black and Minority Ethnic Communities, and come from lower socio-economic backgrounds</li>\r\n	<li>To educate students who are motivated and self-directed critical thinkers, capable of independent enquiry</li>\r\n	<li>To provide students with both sound academic knowledge and vocational expertise</li>\r\n	<li>To foster independent and collaborative learning among students and to encourage lifelong learning leading to enhancing their career potentials</li>\r\n	<li>To develop and implement approaches to feedback and assessment that maximise learning and student outcomes.</li>\r\n</ul>\r\n\r\n<p>(For more details please see The College Quality and Enhancement Manual)</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:04', NULL, NULL, 'Active'),
(68, 17, 'Assessment and Feedback', '<p>The College adheres to the adopted assessment policies and procedures that are published in the Quality and Enhancement Manual (QAEM) which is in line with the UK Quality Code. Effective assessment rests with the purpose for which the assessment is carried out as well as the nature and type of appropriate assessment tools used. In essence the assessment materials and tools should be fit-for-purpose. The college assessor and internal verifier assured that assignment brief of the assignments are fair and accurate as much as possible.</p>\r\n\r\n<p>As required by Pearson, according to the Course specifications, the key assessment objectives and strategies are aimed at assessing the achievement of a number of specific learning outcomes in every unit against specific assessment criteria.</p>\r\n\r\n<p>The College uses both formal and informal assessment strategies. The College uses a variety of assessment methods to enhance learning and improves the validity of assessment. The assessment methods improve the knowledge of the assessment criteria and what is required to gain higher grade achievement. There is a range of assessment methods that are utilised, such as: presentations; written reports. As an informal assessment strategy, the College implements a formative method of assessment which requires students to submit &lsquo;task by task&rsquo; coursework during the semester.</p>\r\n\r\n<p>This Course is assessed using a combination of ICON College and Pearson-set assignments. Each year, Pearson will issue a Theme and (for Level 4) a set of related Topics. ICON College will develop an assignment, to be internally assessed, to engage students in work related to the Pearson-set Theme.</p>\r\n\r\n<p>At Level 4, students will select a Topic to further define their approach to the Theme and assignment. At Level 5, it is expected that students will define their own Topic, in negotiation with Tutors, based on the Pearson-set Theme.</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:04', NULL, NULL, 'Active'),
(69, 17, 'Purpose of the Course', '<p>The purpose of BTEC Higher Nationals in Business is to develop students as professional, self-reflecting individuals able to meet the demands of employers in the business sector and adapt to a constantly changing world. The qualifications aim to widen access to higher education and enhance the career prospects of those who undertake them.</p>\r\n\r\n<p><strong>Objectives of the Course</strong></p>\r\n\r\n<p>The objectives of the BTEC Higher Nationals in Business are as follows:</p>\r\n\r\n<ul>\r\n	<li>To equip students with business skills, knowledge and the understanding necessary to achieve high performance in the global business environment.</li>\r\n	<li>To provide education and training for a range of careers in business, including management, administration, human resources, marketing, entrepreneurship, accounting and finance.</li>\r\n	<li>To provide insight and understanding into international business operations and the opportunities and challenges presented by a globalised market place.</li>\r\n	<li>To equip students with knowledge and understanding of culturally diverse organisations, cross-cultural issues, diversity and values.</li>\r\n	<li>To provide opportunities for students to enter or progress in employment in business, or progress to higher education qualifications such as an Honours degree in business or a related area.</li>\r\n	<li>To provide opportunities for students to develop the skills, techniques and personal attributes essential for successful working lives.</li>\r\n	<li>To provide opportunities for those students with a global outlook to aspire to international career pathways.</li>\r\n	<li>To provide opportunities for students to achieve a nationally-recognised professional qualification.</li>\r\n	<li>To offer students the chance of career progression in their chosen field.</li>\r\n	<li>To allow flexibility of study and to meet local or specialist needs.</li>\r\n	<li>To offer a balance between employability skills and the knowledge essential for students with entrepreneurial, employment or academic aspirations</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:05', NULL, NULL, 'Active'),
(70, 17, 'Course Learning Outcomes', '<p><strong>Knowledge and understanding</strong></p>\r\n\r\n<p>Students will be expected to gain the following knowledge during the Course of study:</p>\r\n\r\n<ul>\r\n	<li>Developing the knowledge, understanding and skills of organisations, the business environment in which they operate and their management.</li>\r\n	<li>Demonstrating knowledge and understanding Markets, and Marketing and sales, the management of resources including the supply chain, procurement, logistics, and outsourcing.</li>\r\n	<li>Equipping students with awareness of Customer management and relationship and leadership.</li>\r\n	<li>Developing knowledge of different financial sources and the use of accounting and managing financial risk.</li>\r\n	<li>Understanding the use of relevant communication in business and management including the use of digital technology.</li>\r\n	<li>Developing appropriate policies and strategies within a changing environment to meet stakeholders&rsquo; interest and the use of risk management techniques.</li>\r\n	<li>Providing innovative business ideas to create new products, services or organisations.</li>\r\n	<li>Realising the need for individuals and organisations to manage responsibility and behave ethically in relation to social, cultural, economic and environmental issues.</li>\r\n</ul>\r\n\r\n<p><strong>Skills</strong></p>\r\n\r\n<p>Students will be expected to develop the following skills during the Course of study:</p>\r\n\r\n<p><strong>Employability skills:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Cognitive and problem-solving skills:</strong> critical thinking, approaching non- routine problems by applying expert and creative solutions, use of systems and digital technology, generating and communicating ideas creatively.</li>\r\n	<li><strong>Intra-personal skills:</strong> self-management, adaptability and resilience, self- monitoring and self-development, self-analysis and reflection, planning and prioritising.</li>\r\n	<li><strong>Interpersonal skills:</strong> effective communication and articulation of information, working collaboratively, negotiating and influencing, self-presentation.</li>\r\n</ul>\r\n\r\n<p><strong>Knowledge and academic study skills:</strong></p>\r\n\r\n<ul>\r\n	<li>Active research skills</li>\r\n	<li>Effective writing skills</li>\r\n	<li>Analytical skills</li>\r\n	<li>Critical thinking</li>\r\n	<li>Creative problem-solving</li>\r\n	<li>Decision-making</li>\r\n	<li>Team building</li>\r\n	<li>Exam preparation skills</li>\r\n	<li>Digital literacy</li>\r\n	<li>Competence in assessment methods used in higher education.</li>\r\n</ul>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:05', NULL, NULL, 'Active'),
(71, 17, 'Relevant External Reference Points', '<ul>\r\n	<li>QAA subject benchmark statements for Business and Business Management</li>\r\n	<li>The qualification remains as intermediate level qualifications on the FHEQ. Please refer to the Pearson programme specification for RQF.</li>\r\n</ul>\r\n\r\n<p>Chartered Institute of Management (CIM), Association of Chartered Certified Accountants (ACCA), Chartered Institute of Personnel and Development (CIPD).</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-09-27 11:49:05', NULL, NULL, 'Active');
INSERT INTO `ictmcoursesection` (`courseSectionId`, `courseId`, `courseSectionTitle`, `courseSectionContent`, `courseSectionImage`, `orderNumber`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `courseSectionStatus`) VALUES
(72, 18, 'sdffsdfsd fdsfd', '<p>dsfsdf sdf sdf sfdf sdf sdf sdf sdf sdfsdf sdf sdf sfdf sdfsdf sfsdfasedaawcz&nbsp;</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-10-14 13:22:41', NULL, NULL, 'Active'),
(73, 18, 'egdfgdfgdfg', '<p>dfgdfgdfg dfgtregdfgfd rgdfgdfg ddfgdfg dg</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-10-14 13:22:41', NULL, NULL, 'Active'),
(74, 13, 'Course Overview', '<p>Course Overview Course Overview Course Overview</p>\r\n', NULL, NULL, 'admin@gmail.com', '2017-10-16 10:04:06', NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmcourseunits`
--

CREATE TABLE `ictmcourseunits` (
  `courseUnitd` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `unitNumber` int(11) DEFAULT NULL,
  `unitCode` varchar(45) DEFAULT NULL,
  `unitName` varchar(255) DEFAULT NULL,
  `unitCredit` int(11) DEFAULT NULL,
  `unitType` varchar(45) DEFAULT NULL,
  `unitLevel` varchar(45) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifieDate` datetime DEFAULT NULL,
  `courseUnitsStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ictmdepartment`
--

CREATE TABLE `ictmdepartment` (
  `departmentId` int(11) NOT NULL,
  `departmentName` varchar(255) DEFAULT NULL,
  `departmentHead` varchar(100) DEFAULT NULL,
  `departmentSummary` mediumtext,
  `departmentImage` varchar(255) NOT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `departmentStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmdepartment`
--

INSERT INTO `ictmdepartment` (`departmentId`, `departmentName`, `departmentHead`, `departmentSummary`, `departmentImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `departmentStatus`) VALUES
(6, 'test department', 'test Department Head', '<p>test&nbsp;department &nbsp;summary</p>\r\n', '', 'admin@gmail.com', '2017-08-30 11:43:21', 'admin@gmail.com', '2017-09-15 19:15:34', 'Active'),
(18, 'Department of Business and Management Studies', 'Test', '<p>The Department of Business and Management focuses on offering quality undergraduate diploma in Business and Management studies.</p>\r\n\r\n<p>Students gain an in-depth knowledge of business organisation and operation. The HND programme has specialist units for Business Studies. Students may take the relevant units to gain specialisation in the respective areas.</p>\r\n\r\n<p>After successful completion of this HND programme at ICON College, students will be qualified to apply for a top-up degree at many UK universities (subject to acceptance).</p>\r\n\r\n<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Course Title</th>\r\n			<th>Awarding Body</th>\r\n			<th>Duration</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><a href=\"http://iconcollege.ac.uk/wireframe202/course-detail.php\">BTEC Level 5 HND in Business</a></td>\r\n			<td>Pearson</td>\r\n			<td>2 Years</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', 'admin@gmail.com', '2017-09-27 10:57:11', 'admin@gmail.com', '2017-10-05 11:52:05', 'Active'),
(19, 'Department of Health and Social Care', 'test', '<p>The Department of Business and Management focuses on offering quality undergraduate diploma in Business and Management studies.</p>\r\n\r\n<p>Students gain an in-depth knowledge of business organisation and operation. The HND programme has specialist units for Business Studies. Students may take the relevant units to gain specialisation in the respective areas.</p>\r\n\r\n<p>After successful completion of this HND programme at ICON College, students will be qualified to apply for a top-up degree at many UK universities (subject to acceptance).</p>\r\n\r\n<div class=\"table-responsive\">\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Course Title</th>\r\n			<th>Awarding Body</th>\r\n			<th>Duration</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><a href=\"http://iconcollege.ac.uk/wireframe202/course-detail.php\">BTEC Level 5 HND in Business</a></td>\r\n			<td>Pearson</td>\r\n			<td>2 Years</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n<div>&nbsp;</div>\r\n\r\n', '', 'admin@gmail.com', '2017-09-27 10:57:41', 'admin@gmail.com', '2017-10-05 11:49:25', 'Active'),
(20, 'Faculty of Information Technology and Engineering', 'test', '<p>The Department of Business and Management focuses on offering quality undergraduate diploma in Business and Management studies.</p>\r\n\r\n<p>Students gain an in-depth knowledge of business organisation and operation. The HND programme has specialist units for Business Studies. Students may take the relevant units to gain specialisation in the respective areas.</p>\r\n\r\n<p>After successful completion of this HND programme at ICON College, students will be qualified to apply for a top-up degree at many UK universities (subject to acceptance).</p>\r\n\r\n<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Course Title</th>\r\n			<th>Awarding Body</th>\r\n			<th>Duration</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><a href=\"http://iconcollege.ac.uk/wireframe202/course-detail.php\">BTEC Level 5 HND in Business</a></td>\r\n			<td>Pearson</td>\r\n			<td>2 Years</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', 'admin@gmail.com', '2017-09-27 10:58:03', 'admin@gmail.com', '2017-10-18 11:26:34', 'Active'),
(21, 'Department of Travel, Tourism and Hospitality Management', 'test', '<p>The Department of Business and Management focuses on offering quality undergraduate diploma in Business and Management studies.</p>\r\n\r\n<p>Students gain an in-depth knowledge of business organisation and operation. The HND programme has specialist units for Business Studies. Students may take the relevant units to gain specialisation in the respective areas.</p>\r\n\r\n<p>After successful completion of this HND programme at ICON College, students will be qualified to apply for a top-up degree at many UK universities (subject to acceptance).</p>\r\n\r\n<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Course Title</th>\r\n			<th>Awarding Body</th>\r\n			<th>Duration</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><a href=\"http://iconcollege.ac.uk/wireframe202/course-detail.php\">BTEC Level 5 HND in Business</a></td>\r\n			<td>Pearson</td>\r\n			<td>2 Years</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', 'admin@gmail.com', '2017-09-27 10:58:25', 'admin@gmail.com', '2017-10-16 14:27:09', 'Inactive'),
(22, 'fsdfhsdlhfkjds', 'test', '<p>srdfsfd1111111111111111111111111</p>\r\n', '22.jpg', 'admin@gmail.com', '2017-10-14 12:43:51', 'admin@gmail.com', '2017-10-18 11:25:00', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `ictmevent`
--

CREATE TABLE `ictmevent` (
  `eventId` int(11) NOT NULL,
  `eventTitle` varchar(255) DEFAULT NULL,
  `eventStartDate` datetime DEFAULT NULL,
  `eventEndDate` datetime DEFAULT NULL,
  `eventLocation` varchar(1000) DEFAULT NULL,
  `eventContent` mediumtext,
  `eventPhotoPath` varchar(255) DEFAULT NULL,
  `eventType` varchar(100) DEFAULT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `eventStatus` varchar(50) DEFAULT NULL,
  `homeStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmevent`
--

INSERT INTO `ictmevent` (`eventId`, `eventTitle`, `eventStartDate`, `eventEndDate`, `eventLocation`, `eventContent`, `eventPhotoPath`, `eventType`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `eventStatus`, `homeStatus`) VALUES
(4, 'Chicago Architecture Foundation River Cruise', '2017-09-13 15:33:00', '2017-09-14 15:33:00', 'test', '<p>test</p>\r\n', NULL, 'Seminar', 'admin@gmail.com', '2017-09-27 10:33:41', NULL, NULL, 'Active', NULL),
(5, 'Good Morning America', '2017-09-05 15:34:00', '2017-09-05 15:34:00', 'test', '<p>test</p>\r\n', NULL, 'Training', 'admin@gmail.com', '2017-09-27 10:34:23', NULL, NULL, 'Active', NULL),
(6, 'Vegie Garden Wednesday Workshops', '2017-09-17 15:34:00', '2017-09-18 15:34:00', 'test', '<p>test</p>\r\n', NULL, 'Seminar', 'admin@gmail.com', '2017-09-27 10:34:48', NULL, NULL, 'Active', NULL),
(7, 'The Ecosystem Within Us', '2017-09-21 15:35:00', '2017-09-21 15:35:00', 'test', '<p>test</p>\r\n', NULL, 'Training', 'admin@gmail.com', '2017-09-27 10:35:16', NULL, NULL, 'Active', NULL),
(8, 'Science In The New Era', '2017-09-11 15:35:00', '2017-09-13 15:35:00', 'test', '<p>test</p>\r\n', NULL, 'Festival', 'admin@gmail.com', '2017-09-27 10:35:50', NULL, NULL, 'Active', NULL),
(9, 'How To Sell Anything', '2017-09-22 15:36:00', '2017-09-23 15:36:00', 'test', '<p>test</p>\r\n', NULL, 'Seminar', 'admin@gmail.com', '2017-09-27 10:36:17', NULL, NULL, 'Active', 'Yes'),
(10, 'Event 1', '2017-10-11 13:34:00', '2017-10-12 13:34:00', 'Icon College ', '<p>\nBusiness it will frequently occur that pleasures have to be repudiated and annoyances accepted. \nThe wise man therefore always holds.</p>\n', NULL, 'Seminar', 'admin@gmail.com', '2017-10-11 08:35:46', 'admin@gmail.com', '2017-10-11 09:52:35', 'Active', 'Yes'),
(11, 'new Event', '2017-10-14 15:32:00', '2017-10-18 15:32:00', 'new YYorrk', '<p>asdasd</p>\r\n', NULL, 'Training', 'admin@gmail.com', '2017-10-11 10:32:32', 'admin@gmail.com', '2017-10-11 10:37:04', 'Active', 'Yes'),
(12, 'event testing ', '2017-10-19 13:34:00', '2017-10-23 14:34:00', 'Ic', '<p>xxxxxxxxxxxxxxxx</p>\r\n', NULL, 'Seminar', 'admin@gmail.com', '2017-10-12 08:54:01', 'admin@gmail.com', '2017-10-16 10:42:49', 'Active', NULL),
(14, 'UKNARIC17 annual conference.', '2017-11-20 11:16:00', '2017-11-22 11:16:00', 'Park Plaza Victoria, London SW1V 1EQ', '<form action=\"./\" id=\"form1\" method=\"post\">\r\n<div>\r\n<div id=\"main\">\r\n<div>\r\n<div id=\"fullmaincontent\">\r\n<h2>UKNARIC17</h2>\r\n<a href=\"http://www.ielts.org/\" target=\"_blank\" title=\"http://www.ielts.org\"><img alt=\"IELTS\" src=\"https://www.naric.org.uk/images/site/naric/side/IELTS_trans.png?id=2\" style=\"float:right; margin:-55px 0px 0px; position:relative\" /></a>\r\n\r\n<p><strong><a href=\"http://www.vfmii.com/exc/aspquery?command=invoke&amp;ipid=LNUK&amp;ids=95707&amp;tab=2\" target=\"_blank\">Park Plaza</a> Victoria, London <a href=\"https://www.parkplaza.co.uk/london-hotel-gb-sw1v-1eq/gbvictor/area/map\" target=\"_blank\">SW1V 1EQ</a><br />\r\n20 and 21 November 2017</strong></p>\r\n\r\n<p>Only a limited number of delegate places still remain. To book, visit our&nbsp;<a href=\"http://events.naric.org.uk/2017\" id=\"cphMainContent_HyperLink1\" target=\"_blank\">delegate booking pages</a>. After booking your place, you can choose and book your workshops.</p>\r\n\r\n<p><a href=\"https://www.naric.org.uk/naric/documents/conference/2017/UKNARIC17%20full%20workshop%20programme%20PDF.pdf\" target=\"_blank\">You can view (PDF) our full programme of over 50 specialist workshops, organised into 5 colour-coded themes </a> &ndash; tailor your UK NARIC conference experience to suit your needs and interests.</p>\r\n\r\n<p>Our plenary speakers include:</p>\r\n\r\n<p>CONRAD BIRD &ndash; director of the <a href=\"http://www.greatbritaincampaign.com/#!/home\" id=\"cphMainContent_HyperLink2\" target=\"_blank\">GREAT Britain Campaign</a>, Department for International Trade, on developing the UK&rsquo;s exports and global opportunities for education</p>\r\n\r\n<p>BILL RAMMELL &ndash; <a href=\"https://www.beds.ac.uk/about-us/our-people/vc-office/our-office/bill-rammell\" id=\"cphMainContent_HyperLink3\" target=\"_blank\">vice chancellor, University of Bedfordshire</a>; former Government minister for further and higher education, 2005-2008; and former deputy vice chancellor at Plymouth University responsible for internationalisation</p>\r\n\r\n<p>RAJAY NAIK &ndash; <a href=\"http://keypath.uk.com/leadership/rajay-naik\" id=\"cphMainContent_HyperLink4\" target=\"_blank\">CEO, Keypath Education Europe</a>; member of the UK-ASEAN Business Council and the Education Advisory Board of the British Council; on how technological innovation can support growth and new development.</p>\r\n\r\n<p>Workshop speakers include:</p>\r\n\r\n<p>Marie Green, director, global mobility, PwC, on risk in international education</p>\r\n\r\n<p>Dr Mohd Nor Azman Hassan, deputy director general, Ministry of Higher Education, Malaysia, on UK-Malaysia partnerships</p>\r\n\r\n<p>Katerina Fytatzi, senior analyst, political risk, Oxford Analytica, on North Africa</p>\r\n\r\n<p>Emma Meredith, international director, Association of Colleges</p>\r\n\r\n<p>David Clark, international affairs manager, Engineering Council</p>\r\n\r\n<p>Dr Sultan Abu-Orabi, Secretary-General, AARU (the Association of Arab Universities)</p>\r\n\r\n<p>Guangcai Dong, of Liaoning Normal University, on UK-China partnerships</p>\r\n\r\n<p>Kong Lingtao, chair of the Confucius International Education Group and the World Confucius Foundation</p>\r\n\r\n<p>Dr Gretchen Dobson on managing &lsquo;multiple affinities&rsquo; and current practice in alumni relations</p>\r\n\r\n<p>Bharat Pamnani, Tier 4 Sponsorship, UKVI; and Sheena Kerr, Student Policy, Border, Immigration &amp; Citizenship Policy, Home Office</p>\r\n\r\n<p>Tim Steele, UCLan</p>\r\n\r\n<p>Ian Myson, director of higher education partnerships, Chartered Management Institute</p>\r\n\r\n<p>Douglas Nairne, CEO, DataFlow Group, on detecting fraud</p>\r\n\r\n<p>Aisling Conboy, DIT; Raegan Hiles, HE Global/UUKi; Michael Osbaldeston, City &amp; Guilds;</p>\r\n\r\n<p>&hellip; and many more.</p>\r\n\r\n<p>Our overarching conference theme is: &#39;Charting the course ahead&#39;. The conversation will focus on many varied aspects of achieving growth and reducing risk, at a time that sees education institutions face strategic choices and decisions.</p>\r\n\r\n<p><strong>Have you done the survey on alumni relations?</strong> We are working with Academic Assembly Inc. to be able to understand more about international alumni engagement in transnational education. The findings of a survey of UK providers will be presented at the conference. To take part in the survey please click&nbsp;<a href=\"https://www.surveymonkey.com/r/58RJPQL\" target=\"_blank\">here</a>.</p>\r\n\r\n<p>Come and join us at UKNARIC17! &nbsp;Take a look below at what UK NARIC 2016 was like.</p>\r\n\r\n<h5>UKNARIC17 is supported by</h5>\r\n\r\n<div class=\"ICTable\" style=\"margin-top:0px; width:750px\">\r\n<div class=\"Row\">\r\n<div class=\"Cell\" style=\"margin-left:0px; margin-right:0px\"><a href=\"http://botosoft.com/\" style=\"display:inline-block\" target=\"_blank\" title=\"http://botosoft.com\"><img alt=\"\" src=\"https://www.naric.org.uk/images/site/naric/conference/Botosoft.png\" title=\"http://botosoft.com\" /></a></div>\r\n\r\n<div class=\"Cell\" style=\"margin-left:0px; margin-right:0px\"><a href=\"https://www.ets.org/toefl\" style=\"display:inline-block\" target=\"_blank\" title=\"https://www.ets.org\"><img alt=\"\" src=\"https://www.naric.org.uk/images/site/naric/conference/ets.png\" title=\"https://www.ets.org\" /></a></div>\r\n\r\n<div class=\"Cell\" style=\"margin-left:0px; margin-right:0px\"><a href=\"https://corp.dataflowgroup.com/\" style=\"display:inline-block\" target=\"_blank\" title=\"https://corp.dataflowgroup.com\"><img alt=\"\" src=\"https://www.naric.org.uk/images/site/naric/conference/DataFlow.png\" title=\"https://corp.dataflowgroup.com\" /></a></div>\r\n\r\n<div class=\"Cell\" style=\"margin-left:0px; margin-right:0px\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</form>\r\n', '14.png', 'Seminar', 'admin@gmail.com', '2017-11-16 11:18:01', 'admin@gmail.com', '2017-11-16 11:22:36', 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ictmfaculty`
--

CREATE TABLE `ictmfaculty` (
  `facultyId` int(11) NOT NULL,
  `facultyTitle` varchar(20) DEFAULT NULL,
  `facultyFirstName` varchar(50) DEFAULT NULL,
  `facultyLastName` varchar(50) DEFAULT NULL,
  `facultyDegree` varchar(255) DEFAULT NULL,
  `facultyPosition` varchar(255) DEFAULT NULL,
  `facultyEmpType` varchar(100) DEFAULT NULL,
  `facultyEmail` varchar(100) DEFAULT NULL,
  `faultyPhone` varchar(45) DEFAULT NULL,
  `facultyTwitter` varchar(255) DEFAULT NULL,
  `facultyLinkedIn` varchar(255) DEFAULT NULL,
  `facultyIntro` mediumtext,
  `facultyImage` varchar(255) DEFAULT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `facultyStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmfaculty`
--

INSERT INTO `ictmfaculty` (`facultyId`, `facultyTitle`, `facultyFirstName`, `facultyLastName`, `facultyDegree`, `facultyPosition`, `facultyEmpType`, `facultyEmail`, `faultyPhone`, `facultyTwitter`, `facultyLinkedIn`, `facultyIntro`, `facultyImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `facultyStatus`) VALUES
(1, 'Mr', 'Professor Reza ', 'Joadat', 'BCom Honours, M.Com; MBA(Henley at Oxon); PhD, FInstLM(Lond), MPDSE', 'PRINCIPAL', 'Full Time', 'mujtaba.rumi1@gmail.com', '016809999', 'http://Twitter-id', 'http://Linkedin-id', '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n\r\n<p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure.</p>\r\n', '1.png', 'admin@gmail.com', '2017-10-09 10:48:03', 'admin@gmail.com', '2017-11-25 15:49:09', 'Active'),
(2, 'Prof.', 'Nurun', 'Nabi', 'BCom Honours, M.Com; MBA(Henley at Oxon); PhD, FInstLM(Lond), MPDSE', 'Principal ', 'Full Time', 'nabi@iconcollege.ac.uk', '02073772800', '', '', '<p>I have 42 years teaching at the global Universities and main areas are strategic management and leadership. Currently Principal and Chair of BOG ICON College.</p>\r\n', '2.jpg', 'admin@gmail.com', '2017-11-15 11:39:11', 'admin@gmail.com', '2017-11-20 07:11:52', 'Active'),
(3, 'MR', 'Mujtaba Rafid', 'Rumi', 'B.Sc', 'Assistant Software Engineer', 'Full Time', 'mujtaba.rumi13@gmail.com', '01680674598', 'http://twitter', 'http://Linkedin', '<p>sd</p>\r\n', NULL, 'admin@gmail.com', '2017-11-20 07:17:07', NULL, NULL, 'Active'),
(4, 'mr', 'aewae', 'zxczxc', 'xfsdfrer', 'fhfhd', 'Part Time', 'dfgd@n.com', '456489', 'http://serxfxgx', 'http://drfsertsr', '<p>hfghdftyertyrty</p>\r\n', '4.jpg', 'admin@gmail.com', '2017-11-20 09:52:15', NULL, NULL, 'Active'),
(5, 'Mr', 'srwer', 'zzcxc', 'aers', 'rtert', 'Full Time', 'mujtaba.rumi1m@gmail.com', '46879', 'http://asdasdasd', 'http://weaszcx', '<p>weewqwe</p>\r\n', '5.jpg', 'admin@gmail.com', '2017-11-20 09:54:05', 'admin@gmail.com', '2017-11-25 15:48:04', 'Active'),
(6, 'Mr.', 'sfsf', 'sfsfs', 'sfsfs', 'sfsdf', 'Part Time', 's@d.vb', '02073772800', '', '', '<p>wewerwe</p>\r\n', '6.jpg', 'admin@gmail.com', '2017-11-20 13:36:20', 'admin@gmail.com', '2017-11-20 13:42:55', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmfacultycontact`
--

CREATE TABLE `ictmfacultycontact` (
  `facultyContactId` int(11) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `visitorName` varchar(100) DEFAULT NULL,
  `visitorInterest` varchar(100) DEFAULT NULL,
  `visitorEmail` varchar(100) DEFAULT NULL,
  `visitorPhone` varchar(45) DEFAULT NULL,
  `visitorEnquary` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `insertedBy` varchar(100) NOT NULL,
  `lastModifiedBy` varchar(100) NOT NULL,
  `lastModifiedDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ictmfacultycourse`
--

CREATE TABLE `ictmfacultycourse` (
  `facultyCourseId` int(11) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmfacultycourse`
--

INSERT INTO `ictmfacultycourse` (`facultyCourseId`, `facultyId`, `courseId`) VALUES
(1, 1, 11),
(2, 1, 13),
(3, 1, 14),
(4, 2, 13),
(5, 3, 13),
(6, 4, 13),
(7, 5, 16),
(9, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `ictmfeedback`
--

CREATE TABLE `ictmfeedback` (
  `feedbackId` int(11) NOT NULL,
  `feedbackByName` varchar(100) DEFAULT NULL,
  `feedbackByProfession` varchar(100) DEFAULT NULL,
  `feedbackDetails` varchar(255) DEFAULT NULL,
  `feedbackByPhoto` varchar(255) DEFAULT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `feedbackStatus` varchar(50) DEFAULT NULL,
  `feedbackSource` varchar(100) DEFAULT NULL,
  `feedbackApprove` varchar(20) DEFAULT NULL,
  `feedbackApprovedBy` varchar(100) DEFAULT NULL,
  `feedbackApprovedDate` datetime DEFAULT NULL,
  `homeStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmfeedback`
--

INSERT INTO `ictmfeedback` (`feedbackId`, `feedbackByName`, `feedbackByProfession`, `feedbackDetails`, `feedbackByPhoto`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `feedbackStatus`, `feedbackSource`, `feedbackApprove`, `feedbackApprovedBy`, `feedbackApprovedDate`, `homeStatus`) VALUES
(7, 'John Doe', 'Student', 'I have really enjoyed the course, and my tutor has provided really useful feedback through all the lessons.', '7.PNG', 'admin@gmail.com', '2017-10-14 19:23:25', NULL, NULL, 'Active', 'Other source', 'Yes', 'admin@gmail.com', '2017-10-14 19:23:25', 'Yes'),
(8, 'Mr. John', 'Student', 'I\'ve certainly learnt a lot from the course and I\'m looking forward to taking that learning forward into the future.', '8.PNG', 'admin@gmail.com', '2017-10-14 19:24:26', NULL, NULL, 'Active', 'Other source', 'Yes', 'admin@gmail.com', '2017-10-14 19:24:26', 'Yes'),
(9, 'Bikash Pal', 'Student', 'I would like to thank you for having taken me through the course with much patience and understanding, and for having taught me in such a way that I always felt encouraged to outdo myself the next time.', '9.PNG', 'admin@gmail.com', '2017-10-14 19:25:14', NULL, NULL, 'Active', 'Other source', 'Yes', 'admin@gmail.com', '2017-10-14 19:25:14', 'Yes'),
(10, 'Cherry Gems', 'Student', 'I\'d just like to say how much I\'ve enjoyed the course, and how much I\'ve appreciated your constructive feedback.', '10.PNG', 'admin@gmail.com', '2017-10-14 19:26:03', NULL, NULL, 'Active', 'Other source', 'Yes', 'admin@gmail.com', '2017-10-14 19:26:03', 'Yes'),
(11, 'Amina Islam', 'Student', 'I have very much enjoyed the course and have found the feedback from my tutor to be very supportive, motivating and challenging.', '11.PNG', 'admin@gmail.com', '2017-10-14 19:26:59', NULL, NULL, 'Active', 'Other source', 'Yes', 'admin@gmail.com', '2017-10-14 19:26:59', 'Yes'),
(12, 'Abiaaodun Oladipo', 'Student', 'I want to continue my work with my tutor! I have nothing but praise for her! She truly understands every difficulty I have faced so far.', '12.PNG', 'admin@gmail.com', '2017-10-14 19:27:41', NULL, NULL, 'Active', 'Other source', 'Yes', 'admin@gmail.com', '2017-10-14 19:27:41', 'Yes'),
(13, 'dfgdg', 'dfgfdgdf', 'dfgdfgfg dfg dfg', '13.jpg', 'admin@gmail.com', '2017-10-16 12:07:16', NULL, NULL, 'Active', 'Twitter', 'Yes', 'admin@gmail.com', '2017-10-16 12:07:16', 'Yes'),
(14, 'Rrr', 'Student', 'fewrfwe werew wer werwer werwer fewrfwe werew wer werwer werwer fewrfwe werew wer werwer werwer fewrfwe werew wer werwer werwer fewrfwe werew wer werwer werwer fewrfwe werew wer werwer werwer fewrfwe werew wer werwer werwer fewrfwe werew wer werwer werwer', '14.jpg', 'admin@gmail.com', '2017-10-18 10:01:08', 'admin@gmail.com', '2017-10-18 10:05:14', 'Active', 'Website', 'Yes', 'admin@gmail.com', '2017-10-18 10:05:14', 'Yes'),
(15, 'sakib', 'software engineer', 'dsf sdfsdf sdf sff', '15.jpg', 'sakib', '2017-11-09 07:07:39', NULL, NULL, 'Inactive', 'Feedback Form', 'No', NULL, NULL, NULL),
(16, 'eqw', 'qweq', 'qweqw', '16.jpg', 'eqw', '2017-11-09 07:16:21', NULL, NULL, 'Inactive', 'Feedback Form', 'No', NULL, NULL, NULL),
(17, 'sakib', 'student', 'sdf sfd sf ', '17.jpg', 'sakib', '2017-11-09 07:17:18', NULL, NULL, 'Inactive', 'Feedback Form', 'No', NULL, NULL, NULL),
(18, 'Rumi', 'Student', 'feedBack Details', '18.jpg', 'Rumi', '2017-11-11 06:39:52', NULL, NULL, 'Inactive', 'Feedback Form', 'No', NULL, NULL, NULL),
(19, 'sakib', 'student', 'sdf sfsfsf', '19.jpg', 'sakib', '2017-11-11 07:03:37', NULL, NULL, 'Inactive', 'Feedback Form', 'No', NULL, NULL, NULL),
(20, 'Anis', 'Developer', 'good job', '20.png', 'admin@gmail.com', '2017-11-16 12:04:17', NULL, NULL, 'Active', 'Feedback Form', 'Yes', 'admin@gmail.com', '2017-11-16 12:04:17', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `ictmhome`
--

CREATE TABLE `ictmhome` (
  `homeId` int(11) NOT NULL,
  `slideImage1` varchar(255) DEFAULT NULL,
  `slideText1` varchar(255) DEFAULT NULL,
  `slideImage2` varchar(255) DEFAULT NULL,
  `slideText2` varchar(255) DEFAULT NULL,
  `slideImage3` varchar(255) DEFAULT NULL,
  `slideText3` varchar(255) DEFAULT NULL,
  `verticalBarTitle1` varchar(255) DEFAULT NULL,
  `verticalBarText1` varchar(255) DEFAULT NULL,
  `verticalBarImage1` varchar(255) DEFAULT NULL,
  `verticalBarLink1` varchar(255) DEFAULT NULL,
  `verticalBarText2` varchar(255) DEFAULT NULL,
  `verticalBarImage2` varchar(255) DEFAULT NULL,
  `verticalBarTitle2` varchar(255) DEFAULT NULL,
  `verticalBarLink2` varchar(255) DEFAULT NULL,
  `verticalBarTitle3` varchar(255) DEFAULT NULL,
  `verticalBarText3` varchar(255) DEFAULT NULL,
  `verticalBarImage3` varchar(255) DEFAULT NULL,
  `verticalBarLink3` varchar(255) DEFAULT NULL,
  `verticalBarTitle4` varchar(255) DEFAULT NULL,
  `verticalBarText4` varchar(255) DEFAULT NULL,
  `verticalBarImage4` varchar(255) DEFAULT NULL,
  `verticalBarLink4` varchar(255) DEFAULT NULL,
  `middleBannerTitle1` varchar(255) DEFAULT NULL,
  `middleBannerText1` varchar(255) DEFAULT NULL,
  `middleBannerLink1` varchar(255) DEFAULT NULL,
  `middleBannerTitle2` varchar(255) DEFAULT NULL,
  `middleBannerText2` varchar(255) DEFAULT NULL,
  `middleBannerLink2` varchar(255) DEFAULT NULL,
  `middleBannerTitle3` varchar(255) DEFAULT NULL,
  `middleBannerText3` varchar(255) DEFAULT NULL,
  `middleBannerLink3` varchar(255) DEFAULT NULL,
  `squareBoxImage1` varchar(255) DEFAULT NULL,
  `squareBoxTitle1` varchar(255) DEFAULT NULL,
  `squareBoxLink1` varchar(255) DEFAULT NULL,
  `squareBoxImage2` varchar(255) DEFAULT NULL,
  `squareBoxTitle2` varchar(255) DEFAULT NULL,
  `squareBoxLink2` varchar(255) DEFAULT NULL,
  `squareBoxImage3` varchar(255) DEFAULT NULL,
  `squareBoxTitle3` varchar(255) DEFAULT NULL,
  `squareBoxLink3` varchar(255) DEFAULT NULL,
  `squareBoxImage4` varchar(255) DEFAULT NULL,
  `squareBoxTitle4` varchar(255) DEFAULT NULL,
  `squareBoxLink4` varchar(255) DEFAULT NULL,
  `squareBoxImage5` varchar(255) DEFAULT NULL,
  `squareBoxTitle5` varchar(255) DEFAULT NULL,
  `squareBoxLink5` varchar(255) DEFAULT NULL,
  `squareBoxTitle6` varchar(255) DEFAULT NULL,
  `squareBoxLink6` varchar(255) DEFAULT NULL,
  `squareBoxImage6` varchar(255) DEFAULT NULL,
  `squareBoxImage7` varchar(255) DEFAULT NULL,
  `squareBoxTitle7` varchar(255) DEFAULT NULL,
  `squareBoxLink7` varchar(255) DEFAULT NULL,
  `squareBoxImage8` varchar(255) DEFAULT NULL,
  `squareBoxTitle8` varchar(255) DEFAULT NULL,
  `squareBoxLink8` varchar(255) DEFAULT NULL,
  `bottomBannerTitle` varchar(255) DEFAULT NULL,
  `bottomBannerSubTitle` varchar(255) DEFAULT NULL,
  `bottomBannerImage` varchar(255) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `homeStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmhome`
--

INSERT INTO `ictmhome` (`homeId`, `slideImage1`, `slideText1`, `slideImage2`, `slideText2`, `slideImage3`, `slideText3`, `verticalBarTitle1`, `verticalBarText1`, `verticalBarImage1`, `verticalBarLink1`, `verticalBarText2`, `verticalBarImage2`, `verticalBarTitle2`, `verticalBarLink2`, `verticalBarTitle3`, `verticalBarText3`, `verticalBarImage3`, `verticalBarLink3`, `verticalBarTitle4`, `verticalBarText4`, `verticalBarImage4`, `verticalBarLink4`, `middleBannerTitle1`, `middleBannerText1`, `middleBannerLink1`, `middleBannerTitle2`, `middleBannerText2`, `middleBannerLink2`, `middleBannerTitle3`, `middleBannerText3`, `middleBannerLink3`, `squareBoxImage1`, `squareBoxTitle1`, `squareBoxLink1`, `squareBoxImage2`, `squareBoxTitle2`, `squareBoxLink2`, `squareBoxImage3`, `squareBoxTitle3`, `squareBoxLink3`, `squareBoxImage4`, `squareBoxTitle4`, `squareBoxLink4`, `squareBoxImage5`, `squareBoxTitle5`, `squareBoxLink5`, `squareBoxTitle6`, `squareBoxLink6`, `squareBoxImage6`, `squareBoxImage7`, `squareBoxTitle7`, `squareBoxLink7`, `squareBoxImage8`, `squareBoxTitle8`, `squareBoxLink8`, `bottomBannerTitle`, `bottomBannerSubTitle`, `bottomBannerImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `homeStatus`) VALUES
(1, 'sliderImage1.jpg', 'Do you have A levels but missed your offer from university?', 'sliderImage2.jpg', 'Are you a mature student and have GCSEs and work experience?', 'sliderImage3.jpg', 'Then, Achieve your Degree via HND at ICON college ', 'Prospectus', 'The BTEC Higher National Diploma (HND) is a specialist programme with a strong work-related emphasis. Click here for our latest prospectus.', 'verticalBar1.jpg', 'ICON-College-Prospectus.pdf', 'The qualifications aim to widen access to higher education and enhance the career prospects of those who undertake them. Click here for downloading the application form.', 'verticalBar2.jpg', 'Application Form', 'http://sakibrahman.com/demo/ictm/AdminPanel/public/pdf-files/Application_Form.pdf', 'Register Interest', 'The Level 5 Higher National Diploma is recognised by Higher Education providers as meeting admission requirements to many relevant business-related courses.', 'verticalBar3.jpg', 'http://sakibrahman.com/demo/ictm/RegisterInterest', 'Our Courses', 'UK and EU students may be entitled to a student loan from the Student Loans Company to cover the cost of their tuition fees.\r\n', 'verticalBar4.jpg', 'http://sakibrahman.com/demo/ictm/course-list', 'About ICON College', 'ICON College is a modern, friendly and dynamic independent College for higher education in the heart of London, offering high quality education and training with very competitive tuition fees. It was established in 2003. Our students come from many countr', 'http://sakibrahman.com/demo/ictm/Page/26', 'Quality Education', 'All our lecturers are highly qualified and experienced. High quality lecture notes are provided for all courses. By looking at our accreditations you can be confident that you arejoining a quality college, with courses leading to recognised UK qualificati', 'http://sakibrahman.com/demo/ictm/course-list', 'Competitive Fees', 'Our goal is to provide you with a quality education at an affordable price, which we achieve by keeping our adminis­tration costs and overheads low. Studying at ICON College can save you UK university fees, whilst you can still achieve a UK University awa', 'http://sakibrahman.com/demo/ictm/page/38', NULL, 'You Are Welcome', 'http://sakibrahman.com/demo/ictm/', 'squareBoxImage2.jpg', 'Why ICON college ', 'http://sakibrahman.com/demo/ictm/', 'squareBoxImage3.jpg', 'Students Loan &amp; Maintenance', 'http://sakibrahman.com/demo/ictm/page/38v', 'squareBoxImage4.jpg', 'Enroll Now', 'http://sakibrahman.com/demo/ictm/', 'squareBoxImage5.jpg', 'Fees', 'http://sakibrahman.com/demo/ictm/', 'Clearing Students', 'http://sakibrahman.com/demo/ictm/', 'squareBoxImage6.jpg', 'squareBoxImage7.jpg', 'How to Find us ', 'http://sakibrahman.com/demo/ictm/', 'squareBoxImage8.jpg', 'Admission', 'http://sakibrahman.com/demo/ictm/', 'WE BELIEVE THAT EDUCATION IS FOR EVERYONE', 'There are many features available to help you complete your project', 'bottomBanner.jpg', NULL, NULL, 0, '2017-11-15 11:23:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ictmmenu`
--

CREATE TABLE `ictmmenu` (
  `menuId` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `pageId` int(11) DEFAULT NULL,
  `menuName` varchar(100) DEFAULT NULL,
  `menuType` varchar(100) DEFAULT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `menuStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmmenu`
--

INSERT INTO `ictmmenu` (`menuId`, `parentId`, `pageId`, `menuName`, `menuType`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `menuStatus`) VALUES
(1, NULL, 23, 'VLE Login', 'Top', 'admin@gmail.com', '2017-09-20 12:15:14', 'admin@gmail.com', '2017-09-21 09:15:57', 'Active'),
(2, NULL, NULL, 'Student Portal', 'Top', 'admin@gmail.com', '2017-09-20 12:15:40', NULL, NULL, 'Active'),
(4, NULL, NULL, 'Alumi', 'Top', 'admin@gmail.com', '2017-09-20 12:17:27', NULL, NULL, 'Active'),
(5, NULL, 36, 'Contact Us', 'Top', 'admin@gmail.com', '2017-09-20 12:17:54', 'admin@gmail.com', '2017-10-18 09:31:54', 'Active'),
(6, NULL, 27, 'Health and Safety', 'KeyInfo', 'admin@gmail.com', '2017-09-23 08:08:53', 'admin@gmail.com', '2017-09-27 08:32:13', 'Active'),
(7, NULL, NULL, 'Prevent Duty', 'KeyInfo', 'admin@gmail.com', '2017-09-23 08:09:13', NULL, NULL, 'Active'),
(8, NULL, NULL, 'Equal Opportunity', 'KeyInfo', 'admin@gmail.com', '2017-09-23 08:09:27', NULL, NULL, 'Active'),
(9, NULL, NULL, 'Admissions', 'KeyInfo', 'admin@gmail.com', '2017-09-23 08:09:45', NULL, NULL, 'Active'),
(10, NULL, NULL, 'Student Handbook', 'KeyInfo', 'admin@gmail.com', '2017-09-23 08:09:59', NULL, NULL, 'Active'),
(11, NULL, NULL, 'Office of the Independent Adjudicator (OIA)', 'KeyInfo', 'admin@gmail.com', '2017-09-23 08:10:13', NULL, NULL, 'Active'),
(12, NULL, 27, 'Competitions and Markets Authority (CMA)', 'KeyInfo', 'admin@gmail.com', '2017-09-23 08:10:53', 'admin@gmail.com', '2017-10-14 11:36:08', 'Active'),
(13, NULL, NULL, 'Students Support', 'ImportantLink', 'admin@gmail.com', '2017-09-23 08:12:19', NULL, NULL, 'Active'),
(14, NULL, NULL, 'Students Union', 'ImportantLink', 'admin@gmail.com', '2017-09-23 08:13:22', NULL, NULL, 'Active'),
(15, NULL, NULL, 'Accommodation', 'ImportantLink', 'admin@gmail.com', '2017-09-23 08:15:52', NULL, NULL, 'Active'),
(16, NULL, NULL, 'Academic Calendar', 'ImportantLink', 'admin@gmail.com', '2017-09-23 08:16:29', NULL, NULL, 'Active'),
(17, NULL, 32, 'HESA Data Return', 'ImportantLink', 'admin@gmail.com', '2017-09-23 08:17:08', 'admin@gmail.com', '2017-10-14 11:30:40', 'Active'),
(18, NULL, 29, 'QAA Report', 'ImportantLink', 'admin@gmail.com', '2017-09-23 08:17:35', 'admin@gmail.com', '2017-10-14 11:29:00', 'Active'),
(19, NULL, 28, 'Terms & Conditions', 'Bottom', 'admin@gmail.com', '2017-09-23 08:19:10', 'admin@gmail.com', '2017-09-27 11:25:49', 'Active'),
(20, NULL, NULL, ' Privacy Policy', 'Bottom', 'admin@gmail.com', '2017-09-23 08:19:27', NULL, NULL, 'Active'),
(21, NULL, NULL, 'Data Protection', 'Bottom', 'admin@gmail.com', '2017-09-23 08:19:54', NULL, NULL, 'Active'),
(22, NULL, NULL, 'Accessibility', 'Bottom', 'admin@gmail.com', '2017-09-23 08:20:14', NULL, NULL, 'Active'),
(23, NULL, NULL, 'Site Map', 'Bottom', 'admin@gmail.com', '2017-09-23 08:20:37', 'admin@gmail.com', '2017-10-14 09:13:48', 'Active'),
(24, NULL, NULL, 'Cookies', 'Bottom', 'admin@gmail.com', '2017-09-23 08:23:03', 'admin@gmail.com', '2017-10-18 11:21:24', 'Active'),
(25, NULL, NULL, 'About', 'MainMenu', 'admin@gmail.com', '2017-09-23 10:50:13', 'admin@gmail.com', '2017-10-16 13:56:13', 'Active'),
(26, 25, 26, 'About Icon College', 'MainMenu', 'admin@gmail.com', '2017-09-23 10:50:38', 'admin@gmail.com', '2017-10-14 18:56:05', 'Active'),
(27, 25, 39, 'Board of Directors', 'MainMenu', 'admin@gmail.com', '2017-09-23 10:51:17', 'admin@gmail.com', '2017-10-16 13:40:57', 'Active'),
(28, 25, NULL, 'College Governance', 'MainMenu', 'admin@gmail.com', '2017-09-23 10:54:18', NULL, NULL, 'Active'),
(29, 25, NULL, 'Organisational Structure', 'MainMenu', 'admin@gmail.com', '2017-09-23 11:09:09', NULL, NULL, 'Active'),
(30, 25, 35, 'Affiliation &amp; Accreditations', 'MainMenu', 'admin@gmail.com', '2017-09-23 11:09:34', 'admin@gmail.com', '2017-10-16 10:32:35', 'Active'),
(31, 25, NULL, 'Policies & Procedures', 'MainMenu', 'admin@gmail.com', '2017-09-23 11:09:57', NULL, NULL, 'Active'),
(32, 25, NULL, 'Location and Maps', 'MainMenu', 'admin@gmail.com', '2017-09-23 11:10:21', NULL, NULL, 'Active'),
(33, NULL, NULL, 'Courses', 'MainMenu', 'admin@gmail.com', '2017-09-23 11:11:10', NULL, NULL, 'Active'),
(34, NULL, NULL, 'Admission', 'MainMenu', 'admin@gmail.com', '2017-09-23 11:12:13', NULL, NULL, 'Active'),
(35, NULL, NULL, 'College Life', 'MainMenu', 'admin@gmail.com', '2017-09-23 11:12:43', 'admin@gmail.com', '2017-09-25 10:41:14', 'Active'),
(36, NULL, NULL, 'News & Events', 'MainMenu', 'admin@gmail.com', '2017-09-23 11:13:09', NULL, NULL, 'Active'),
(37, NULL, NULL, 'Open Days', 'QuickLink', 'admin@gmail.com', '2017-09-25 12:54:58', NULL, NULL, 'Active'),
(38, NULL, NULL, 'Loans & Maintenances', 'QuickLink', 'admin@gmail.com', '2017-09-25 12:55:17', NULL, NULL, 'Active'),
(39, NULL, NULL, 'Our Courses', 'QuickLink', 'admin@gmail.com', '2017-09-25 12:55:38', 'admin@gmail.com', '2017-10-18 10:45:47', 'Active'),
(40, NULL, NULL, 'Students Services', 'QuickLink', 'admin@gmail.com', '2017-09-25 12:55:56', NULL, NULL, 'Active'),
(41, NULL, NULL, 'Clearing Students', 'QuickLink', 'admin@gmail.com', '2017-09-25 12:56:17', NULL, NULL, 'Active'),
(42, NULL, NULL, 'Enrol Now', 'QuickLink', 'admin@gmail.com', '2017-09-25 12:56:30', NULL, NULL, 'Active'),
(43, NULL, NULL, 'How to Find Us', 'QuickLink', 'admin@gmail.com', '2017-09-25 12:56:43', NULL, NULL, 'Active'),
(44, NULL, 26, 'new menu ', 'MainMenu', 'admin@gmail.com', '2017-10-02 08:14:56', NULL, NULL, 'Active'),
(45, 33, 29, 'Our Courses', 'MainMenu', 'admin@gmail.com', '2017-10-03 08:27:50', NULL, NULL, 'Active'),
(46, 25, 30, 'test', 'MainMenu', 'admin@gmail.com', '2017-10-05 10:33:38', 'admin@gmail.com', '2017-10-05 10:34:25', 'Active'),
(47, 44, 31, 'subofnew', 'MainMenu', 'admin@gmail.com', '2017-10-07 09:49:38', 'admin@gmail.com', '2017-10-07 09:51:20', 'Active'),
(48, 33, 32, 'Teaching Faculty', 'MainMenu', 'admin@gmail.com', '2017-10-09 10:38:24', 'admin@gmail.com', '2017-10-09 10:42:47', 'Active'),
(49, 35, 33, 'Photo Gallery', 'MainMenu', 'admin@gmail.com', '2017-10-10 07:53:52', 'admin@gmail.com', '2017-10-10 07:55:27', 'Active'),
(50, 36, 34, 'news', 'MainMenu', 'admin@gmail.com', '2017-10-11 07:53:50', 'admin@gmail.com', '2017-10-11 07:54:13', 'Active'),
(51, 36, 35, 'Events', 'MainMenu', 'admin@gmail.com', '2017-10-11 08:59:08', NULL, NULL, 'Active'),
(52, NULL, 36, 'Contact Us', 'MainMenu', 'admin@gmail.com', '2017-10-11 12:26:17', 'admin@gmail.com', '2017-10-18 09:29:27', 'Active'),
(61, 39, 25, 'some menu', 'QuickLink', 'admin@gmail.com', '2017-10-14 10:58:07', 'admin@gmail.com', '2017-10-14 11:01:17', 'Active'),
(66, NULL, NULL, 'Staff Login', 'Top', 'admin@gmail.com', '2017-10-18 09:33:06', 'admin@gmail.com', '2017-11-15 11:22:27', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmnews`
--

CREATE TABLE `ictmnews` (
  `newsId` int(11) NOT NULL,
  `newsTitle` varchar(255) DEFAULT NULL,
  `newsContent` mediumtext,
  `newsDate` datetime DEFAULT NULL,
  `newsType` varchar(100) DEFAULT NULL,
  `newsPhoto` varchar(255) NOT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `newsStatus` varchar(50) DEFAULT NULL,
  `homeStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmnews`
--

INSERT INTO `ictmnews` (`newsId`, `newsTitle`, `newsContent`, `newsDate`, `newsType`, `newsPhoto`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `newsStatus`, `homeStatus`) VALUES
(1, 'Your Career Starts Here', '<p>test</p>\r\n', '2017-09-12 15:31:00', 'News', '1.jpg', 'admin@gmail.com', '2017-09-27 10:32:03', 'admin@gmail.com', '2017-10-14 06:28:23', 'Active', 'Yes'),
(2, 'Spark Of Genius', '<p>Spark Of Genius</p>\r\n', '2017-09-05 15:32:00', 'News', '2.jpg', 'admin@gmail.com', '2017-09-27 10:32:30', 'admin@gmail.com', '2017-10-16 13:48:29', 'Active', 'Yes'),
(3, 'University Ranking', '<p>test&nbsp;</p>\r\n', '2017-09-01 15:32:00', 'News', '', 'admin@gmail.com', '2017-09-27 10:32:57', 'admin@gmail.com', '2017-10-19 07:40:41', 'Active', 'Yes'),
(5, 'Migrating to .ac.uk', '<p>we are migrating to .ac.uk</p>\r\n', '2017-11-16 11:29:00', 'Announcement', '5.jpg', 'admin@gmail.com', '2017-11-16 11:31:37', NULL, NULL, 'Active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ictmnotices`
--

CREATE TABLE `ictmnotices` (
  `noticeId` int(11) NOT NULL,
  `noticeTitle` varchar(255) DEFAULT NULL,
  `noticeContent` mediumtext,
  `noticeDate` datetime DEFAULT NULL,
  `noticeType` varchar(45) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `noticeStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ictmpage`
--

CREATE TABLE `ictmpage` (
  `pageId` int(11) NOT NULL,
  `pageTitle` varchar(255) DEFAULT NULL,
  `pageKeywords` varchar(255) DEFAULT NULL,
  `pageMetaData` varchar(255) DEFAULT NULL,
  `pageType` varchar(100) DEFAULT NULL,
  `pageContent` longtext,
  `pageImage` varchar(255) DEFAULT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `pageStatus` varchar(50) DEFAULT NULL,
  `approvedBy` varchar(100) DEFAULT NULL,
  `publishingDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmpage`
--

INSERT INTO `ictmpage` (`pageId`, `pageTitle`, `pageKeywords`, `pageMetaData`, `pageType`, `pageContent`, `pageImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `pageStatus`, `approvedBy`, `publishingDate`) VALUES
(22, 'Welcome to Icon College', 'Welcome,Icon College', 'Welcome,Icon College', 'Health Type', '<p>jhjhjokpij fdg dfg dfg dfg</p>\r\n', '002.jpg', 'admin@gmail.com', '2017-08-20 07:53:23', 'admin@gmail.com', '2017-09-18 11:13:46', 'Active', NULL, NULL),
(23, 'VLE', '', '', 'Link Type', 'http://icon.moodle.webanywhere.co.uk/login/index.php\r\n', NULL, 'admin@gmail.com', '2017-09-21 09:15:20', NULL, NULL, 'Active', NULL, NULL),
(25, 'QAA', 'dsf', 'sdf', 'Link Type', 'http://www.qaa.ac.uk/reviews-and-reports/provider?UKPRN=10003239', NULL, 'admin@gmail.com', '2017-09-25 08:18:57', NULL, NULL, 'Active', NULL, NULL),
(26, 'About Icon College', 'test', 'tset', 'About Type', '', NULL, 'admin@gmail.com', '2017-09-26 09:43:42', 'admin@gmail.com', '2017-10-14 18:56:45', 'Active', NULL, NULL),
(27, 'Health & Safety', '', '', 'Health Type', '<p>This Health and Safety policy has been adopted by ICON College of Technology and Management as a general statement of safety and for determining line responsibility for health, safety and welfare compliance through the management structure as required by the Health and Safety at Work Act 1974. The following Regulations also particularly apply to the college&rsquo;s activities, although the list is not exhaustive:<br />\r\n<br />\r\n&bull; Management of Health and Safety at Work Regulations1999<br />\r\n&bull; Manual Handling Operations Regulations 1992<br />\r\n&bull; Health and Safety (Display Screen Equipment) Regulations 1992<br />\r\n&bull; Reporting of Injuries, Diseases and Dangerous Occurrences Regulations (RIDDOR) 1996</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:22:44', 'admin@gmail.com', '2017-09-27 10:12:24', 'Active', NULL, NULL),
(28, 'Terms & Conditions', '', '', 'Terms Type', '', NULL, 'admin@gmail.com', '2017-09-27 10:18:08', NULL, NULL, 'Active', NULL, NULL),
(29, 'course list', '', '', 'Static Type', 'course-list.php', NULL, 'admin@gmail.com', '2017-10-03 08:27:00', NULL, NULL, 'Active', NULL, NULL),
(30, 'new test', 'sdf', 'sf', 'About Type', '<p>this is test</p>\r\n', NULL, 'admin@gmail.com', '2017-10-05 10:34:03', 'admin@gmail.com', '2017-10-05 10:36:02', 'Active', NULL, NULL),
(31, 'test 3', 'tes', 'sdf', 'Static Type', 'course-list.php\r\n', NULL, 'admin@gmail.com', '2017-10-07 09:50:56', 'admin@gmail.com', '2017-10-07 10:08:43', 'Active', NULL, NULL),
(32, 'All Faculty', '', '', 'Static Type', 'faculty-members.php', NULL, 'admin@gmail.com', '2017-10-09 10:37:50', 'admin@gmail.com', '2017-10-09 10:39:50', 'Active', NULL, NULL),
(33, 'Photo Gallery', '', '', 'Static Type', 'photo-gallery.php', NULL, 'admin@gmail.com', '2017-10-10 07:52:53', NULL, NULL, 'Active', NULL, NULL),
(34, 'news', '', '', 'Static Type', 'news.php', NULL, 'admin@gmail.com', '2017-10-11 07:53:34', NULL, NULL, 'Active', NULL, NULL),
(35, 'Event-List', '', '', 'Static Type', 'event-list.php', NULL, 'admin@gmail.com', '2017-10-11 08:58:40', NULL, NULL, 'Active', NULL, NULL),
(36, 'contact', '', '', 'Static Type', 'contact.php', NULL, 'admin@gmail.com', '2017-10-11 12:25:15', NULL, NULL, 'Active', NULL, NULL),
(37, 'fdgdfgd', 'fgfdg', 'fdgfdg', 'Link Type', 'drgdfhgfdgdf', '37.jpg', 'admin@gmail.com', '2017-10-14 13:44:09', NULL, NULL, 'Active', NULL, NULL),
(38, 'Student Funding', 'loan', 'loan', 'About Type', '', NULL, 'admin@gmail.com', '2017-10-16 11:53:04', NULL, NULL, 'Active', NULL, NULL),
(39, 'NEW PAGE', 'Page Keywords', ' Page MetaData', 'About Type', '<p>GFSDFSDFS</p>\r\n', '39.jpg', 'admin@gmail.com', '2017-10-16 13:39:20', 'admin@gmail.com', '2017-10-16 13:42:35', 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ictmpagesection`
--

CREATE TABLE `ictmpagesection` (
  `pageSectionId` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `pageSectionTitle` varchar(255) DEFAULT NULL,
  `pageSectionContent` longtext,
  `pageSectionImage` varchar(255) DEFAULT NULL,
  `insertedBy` varchar(100) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(100) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `pageSectionStatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmpagesection`
--

INSERT INTO `ictmpagesection` (`pageSectionId`, `pageId`, `pageSectionTitle`, `pageSectionContent`, `pageSectionImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `pageSectionStatus`) VALUES
(23, 22, 'Our Vision & Mission', '<p>fdgdgfdgdfgdfgfd</p>\r\n', NULL, 'admin@gmail.com', '2017-08-20 07:56:30', 'admin@gmail.com', '2017-09-15 10:38:48', 'Active'),
(26, 22, 'Where are we', '<p>ICON College is centrally located in London, on the eastern border of the City of London, the Capital&#39;s banking and financial centre. It occupies a building in Adler Street, London E1. This is close to Aldgate East underground station and within easy walking distance from Whitechapel (Underground and Overground station), and two main-line railway stations (Liverpool Street and Fenchurch Street).</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/tower_of_london.jpg\" /></p>\r\n\r\n<p>The College is also close to the Tower of London (a World Heritage site) and the tourist attractions of St. Paul&#39;s Cathedral, Tower Bridge, the London Eye and the Monument. The London&#39;s West End, which is renowned for its theatres, art galleries and shopping, is only a short bus or tube ride away.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Within easy reach is also London Docklands, based around Canary Wharf, with its many new high-rise office blocks and the new EXCEL exhibition centre. The College is very near to the vibrant community of Brick Lane, famous for its many Indian Restaurants but now also recognised as a thriving centre for new media, fashion and the arts.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/london_docklands.JPG\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The excellent Whitechapel Art Gallery and colourful London street markets of Whitechapel and Petticoat Lane are also within easy walking distance from the College.</p>\r\n\r\n<p>The main East London Mosque, in Whitechapel, is less than 5 minutes walk away from the College, as is several churches. To find out where ICON College is, check out the&nbsp;<a href=\"http://iconcollege.ac.uk/wireframe202/about.php#\">Travel Guide.</a></p>\r\n', NULL, 'admin@gmail.com', '2017-08-20 08:36:06', NULL, NULL, 'Active'),
(27, 22, 'Why choose Icon College', '<p>ICON College is a dynamic and independent Higher Education institution, in the heart of London, providing academic and professional courses of an exceptional standard at competitive prices.</p>\r\n\r\n<p>All our courses can be followed full time and are also available in the evenings and saturday for UK/EU citizens for maximum flexibility in planning your programme of study.</p>\r\n\r\n<p>The College provides high quality teaching and support in a caring and friendly environment. It has all the facilities you will need for an effective and enjoyable learning experience &ndash; facilities we believe are vital to your ultimate success.</p>\r\n\r\n<p>Our aim is to ensure that all our students gain the maximum benefit from their time here. All the staff at the College are dedicated to helping you gain the skills and qualifications you need and enjoy your time in London.</p>\r\n\r\n<h3>Quality Teaching and Training</h3>\r\n\r\n<p>All our teaching staff are highly qualified and experienced teachers, with wide experience of working in their own fields. High quality lecture notes and handouts are provided for all courses. Our friendly and approachable staff are committed to helping you successfully complete your course. They will offer you every assistance and support.</p>\r\n\r\n<h3>Excellent College Environment</h3>\r\n\r\n<p>Whether you live around the corner from the College or are from the other side of the world, we are here to provide you with a stimulating learning environment while you are at ICON College.</p>\r\n\r\n<p>All the excellent business, entertainment, cultural, shopping, religious and educational facilities that make London one of the best cities in the world for entertainment, cultural enrichment and education, are also within easy reach.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/pic1.jpg\" /></p>\r\n\r\n<h3>Competitive Fees</h3>\r\n\r\n<p>We are able to offer high quality teaching and education at a competitive fees, by keeping our administration costs and overheads low.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/pic2.jpg\" /></p>\r\n\r\n<h3>Technology at ICON</h3>\r\n\r\n<p>ICON College uses advanced technology, both in the computer suites and lecture rooms. We have high specification computers, LCD projectors and printers. The College also has video and DVD equipment available to the classrooms. We also have appropriate library resources to support you and your studies.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/pic3.jpg\" /></p>\r\n\r\n<h3>Equal Opportunities</h3>\r\n\r\n<p>ICON College is committed to Equal Opportunities. We are here to support all students in their pursuit of new skills, knowledge and education regardless of their culture, ethnic origin, gender, religion, nationality, disability, political affiliations or age.</p>\r\n\r\n<p>Our flexible study programmes allow for full-time or evenings and week-end attendance available for UK/EU citizens, to enable as many students as possible to further their education.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/pic4.jpg\" /></p>\r\n\r\n<h3>Reason to come at ICON</h3>\r\n\r\n<ul>\r\n	<li>Affordable fees</li>\r\n	<li>Finance for tuition fees and maintenance available to eligible students from the Student Loans Company.</li>\r\n	<li>Good transport links and excellent local facilities in the heart of London.</li>\r\n	<li>QAA reviewed.</li>\r\n	<li>Lively provision of extra-curricular activities.</li>\r\n	<li>All courses lead to world recognised qualifications.</li>\r\n	<li>High quality teaching by experienced and scholarly tutors.</li>\r\n	<li>Flexible start dates: we admit new students in September, February and May sessions.</li>\r\n	<li>State-of-the-art Engineering Lab, well equiped IT labs,VLE, well-resourced library and fully serviced canteen..</li>\r\n	<li>Multicultural: our students come to us from many different countries.</li>\r\n	<li>Providing wide range of support including days out of town, health and financial advice, social events and accommodation support.</li>\r\n	<li>Well established college with high reputation for its educational standards, integrity and friendly partnership with our students including pastoral and academic support for all those who need additional help.</li>\r\n	<li>Excellent reports from Pearson.</li>\r\n	<li>Students integrated in the management of teaching/learning with full time student/management liaison officer. Each student is assigned an academic tutor for the duration of their study.</li>\r\n</ul>\r\n', NULL, 'admin@gmail.com', '2017-08-20 08:36:06', NULL, NULL, 'InActive'),
(37, 22, 'About Icon College', '<p>ICON College of Technology and Management is a modern, friendly and dynamic independent college for Higher Education in the heart of London. We offer a wide range of academic courses leading to internationally recognised accredited British qualifications in Computing and Systems Development; Electrical and Electronic Engineering; Business Studies; Management; Travel and Tourism, Hospitality Management and Health and Social Care.</p>\r\n\r\n<p>Pearson (formerly known as Edexcel) is the UK&#39;s largest awarding body, has accredited ICON College of Technology and Management as an approved centre to offer HND in Business, HND in Computing and Systems Development, HND in Electrical and Electronic Engineering, HND in Travel and Tourism Management, HND in Hospitality Management and HND in Health and Social Care.</p>\r\n\r\n<p>Students successfully completing the HND in Computing, Business, Travel &amp;Tourism, Hospitality, Health and Social Care or Electrical and Electronic Engineering at ICON College may transfer at many UK universities to complete Bachelor Degrees via top-up programmes. Students with good grades will be able to apply for direct entry into the final year of the BSc/BEng (Hons) in IT/Telecommunication, BA (Hons) in Business Administration, BA (Hons) in Tourism and Hospitality Management, BA/BSc. (Hons) in Health and Social Care following completion of the relevant HND courses.</p>\r\n\r\n<p><strong>We have received the following judgements from QAA:</strong></p>\r\n\r\n<p>The QAA monitoring team has concluded that ICON College of Technology and Management Ltd is making progress but further improvement is required with continuing to monitor, review and enhance its higher education provision before the QA monitoring visit for Higher Education Review (AP) in July 2017.</p>\r\n', NULL, 'admin@gmail.com', '2017-08-26 13:50:41', NULL, NULL, 'Active'),
(38, 26, 'About ICON College', '<p>ICON College of Technology and Management is a modern, friendly and dynamic independent college for Higher Education in the heart of London. We offer a wide range of academic courses leading to internationally recognised accredited British qualifications in Computing and Systems Development; Electrical and Electronic Engineering; Business Studies; Management; Travel and Tourism, Hospitality Management and Health and Social Care.</p>\r\n\r\n<p>Pearson (formerly known as Edexcel) is the UK&#39;s largest awarding body, has accredited ICON College of Technology and Management as an approved centre to offer HND in Business, HND in Computing and Systems Development, HND in Electrical and Electronic Engineering, HND in Travel and Tourism Management, HND in Hospitality Management and HND in Health and Social Care.</p>\r\n\r\n<p>Students successfully completing the HND in Computing, Business, Travel &amp;Tourism, Hospitality, Health and Social Care or Electrical and Electronic Engineering at ICON College may transfer at many UK universities to complete Bachelor Degrees via top-up programmes. Students with good grades will be able to apply for direct entry into the final year of the BSc/BEng (Hons) in IT/Telecommunication, BA (Hons) in Business Administration, BA (Hons) in Tourism and Hospitality Management, BA/BSc. (Hons) in Health and Social Care following completion of the relevant HND courses.</p>\r\n\r\n<p><strong>We have received the following judgements from QAA:</strong></p>\r\n\r\n<p>The QAA monitoring team has concluded that ICON College of Technology and Management Ltd is making progress but further improvement is required with continuing to monitor, review and enhance its higher education provision before the QA monitoring visit for Higher Education Review (AP) in July 2017.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-26 11:12:09', 'admin@gmail.com', '2017-10-16 14:43:43', 'Active'),
(39, 26, 'Our Vision & Mission', '<p>ICON College of Technology and Management was established to meet the demand for quality education at an affordable price and to make world-class UK university degrees more accessible to UK and international students. To satisfy this demand, the College seeks to prepare students for effective and profitable roles in their choice of careers and to offer a cultural experience which will aid them in taking their place as productive members of society at minimum cost with no compromise of quality. Indeed, we pride ourselves on providing maximum support to ensure that students reach their full potential.</p>\r\n\r\n<p>The curriculum of our programmes is designed to prepare students to cope with changing business conditions and to present both theoretical and practical approaches to the diverse needs of the ever changing global economy. In support of this goal, the College is supported by faculty staff selected from wide ranging appropriate academic disciplines and from the professional community, on the basis of their knowledge, teaching skills and practical experience.</p>\r\n\r\n<p>While academic learning contributes to one&#39;s knowledge of specific subject matter, managerial success depends as well on an individual&#39;s ability to analyse, to plan and to venture. The College mixes the analytical approach with independent assignments, case studies and practical training. Lectures are combined with discussion, oral presentations, creative projects and teamwork.</p>\r\n\r\n<p>The aim of the College is not just to equip graduates with knowledge and skills to deal with the exacting standards of the twenty-first century and the pursuit of excellence, we go far further than that: we develop the skills and attitudes to ensure that individuals have enjoyable and fulfilling careers and therefore a happy life in the service of society and isn&#39;t that what education is about?</p>\r\n\r\n<p>The College is committed to expanding access to higher education to those sections of the community historically (and currently) underrepresented in the sector. This commitment to widening participation is reflected in the demography of our student body: the College is proud that the vast majority of or students are mature, many of whom having been out of education for a considerable period of time, are from Black and Minority Ethnic Communities, and come from lower socio-economic backgrounds.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-26 11:12:09', NULL, NULL, 'Active'),
(40, 26, 'Why choose ICON College', '<p>ICON College is a dynamic and independent Higher Education institution, in the heart of London, providing academic and professional courses of an exceptional standard at competitive prices.</p>\r\n\r\n<p>All our courses can be followed full time and are also available in the evenings and saturday for UK/EU citizens for maximum flexibility in planning your programme of study.</p>\r\n\r\n<p>The College provides high quality teaching and support in a caring and friendly environment. It has all the facilities you will need for an effective and enjoyable learning experience &ndash; facilities we believe are vital to your ultimate success.</p>\r\n\r\n<p>Our aim is to ensure that all our students gain the maximum benefit from their time here. All the staff at the College are dedicated to helping you gain the skills and qualifications you need and enjoy your time in London.</p>\r\n\r\n<h3>Quality Teaching and Training</h3>\r\n\r\n<p>All our teaching staff are highly qualified and experienced teachers, with wide experience of working in their own fields. High quality lecture notes and handouts are provided for all courses. Our friendly and approachable staff are committed to helping you successfully complete your course. They will offer you every assistance and support.</p>\r\n\r\n<h3>Excellent College Environment</h3>\r\n\r\n<p>Whether you live around the corner from the College or are from the other side of the world, we are here to provide you with a stimulating learning environment while you are at ICON College.</p>\r\n\r\n<p>All the excellent business, entertainment, cultural, shopping, religious and educational facilities that make London one of the best cities in the world for entertainment, cultural enrichment and education, are also within easy reach.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/pic1.jpg\" /></p>\r\n\r\n<h3>Competitive Fees</h3>\r\n\r\n<p>We are able to offer high quality teaching and education at a competitive fees, by keeping our administration costs and overheads low.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/pic2.jpg\" /></p>\r\n\r\n<h3>Technology at ICON</h3>\r\n\r\n<p>ICON College uses advanced technology, both in the computer suites and lecture rooms. We have high specification computers, LCD projectors and printers. The College also has video and DVD equipment available to the classrooms. We also have appropriate library resources to support you and your studies.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/pic3.jpg\" /></p>\r\n\r\n<h3>Equal Opportunities</h3>\r\n\r\n<p>ICON College is committed to Equal Opportunities. We are here to support all students in their pursuit of new skills, knowledge and education regardless of their culture, ethnic origin, gender, religion, nationality, disability, political affiliations or age.</p>\r\n\r\n<p>Our flexible study programmes allow for full-time or evenings and week-end attendance available for UK/EU citizens, to enable as many students as possible to further their education.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/pic4.jpg\" style=\"height:354px; width:948px\" /></p>\r\n\r\n<h3>Reason to come at ICON</h3>\r\n\r\n<ul>\r\n	<li>Affordable fees</li>\r\n	<li>Finance for tuition fees and maintenance available to eligible students from the Student Loans Company.</li>\r\n	<li>Good transport links and excellent local facilities in the heart of London.</li>\r\n	<li>QAA reviewed.</li>\r\n	<li>Lively provision of extra-curricular activities.</li>\r\n	<li>All courses lead to world recognised qualifications.</li>\r\n	<li>High quality teaching by experienced and scholarly tutors.</li>\r\n	<li>Flexible start dates: we admit new students in September, February and May sessions.</li>\r\n	<li>State-of-the-art Engineering Lab, well equiped IT labs,VLE, well-resourced library and fully serviced canteen..</li>\r\n	<li>Multicultural: our students come to us from many different countries.</li>\r\n	<li>Providing wide range of support including days out of town, health and financial advice, social events and accommodation support.</li>\r\n	<li>Well established college with high reputation for its educational standards, integrity and friendly partnership with our students including pastoral and academic support for all those who need additional help.</li>\r\n	<li>Excellent reports from Pearson.</li>\r\n	<li>Students integrated in the management of teaching/learning with full time student/management liaison officer. Each student is assigned an academic tutor for the duration of their study.</li>\r\n</ul>\r\n', NULL, 'admin@gmail.com', '2017-09-26 11:12:09', 'admin@gmail.com', '2017-10-16 13:26:14', 'Active'),
(41, 26, 'where are we', '<p>ICON College is centrally located in London, on the eastern border of the City of London, the Capital&#39;s banking and financial centre. It occupies a building in Adler Street, London E1. This is close to Aldgate East underground station and within easy walking distance from Whitechapel (Underground and Overground station), and two main-line railway stations (Liverpool Street and Fenchurch Street).</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/tower_of_london.jpg\" /></p>\r\n\r\n<p>The College is also close to the Tower of London (a World Heritage site) and the tourist attractions of St. Paul&#39;s Cathedral, Tower Bridge, the London Eye and the Monument. The London&#39;s West End, which is renowned for its theatres, art galleries and shopping, is only a short bus or tube ride away.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Within easy reach is also London Docklands, based around Canary Wharf, with its many new high-rise office blocks and the new EXCEL exhibition centre. The College is very near to the vibrant community of Brick Lane, famous for its many Indian Restaurants but now also recognised as a thriving centre for new media, fashion and the arts.</p>\r\n\r\n<p><img src=\"http://www.iconcollege.com/images/london_docklands.JPG\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The excellent Whitechapel Art Gallery and colourful London street markets of Whitechapel and Petticoat Lane are also within easy walking distance from the College.</p>\r\n\r\n<p>The main East London Mosque, in Whitechapel, is less than 5 minutes walk away from the College, as is several churches. To find out where ICON College is, check out the&nbsp;<a href=\"http://iconcollege.ac.uk/wireframe202/about.php#\">Travel Guide.</a></p>\r\n', NULL, 'admin@gmail.com', '2017-09-26 11:12:09', NULL, NULL, 'Active'),
(42, 27, 'Aims', '<p>&bull; To ensure, as far as is reasonably practicable, the health and safety of all students and employees whilst at work.<br />\r\n&bull; To comply with all relevant health and safety legislation, regulations and codes of practice.<br />\r\n&bull; To provide safe and healthy conditions of training, work, plant, premises and systems.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(43, 27, 'Responsibilities of the College', '<p>&bull; To work towards the achievement of these policy aims.<br />\r\n&bull; To provide appropriate training, advice, protective clothing, equipment and documentation as is necessary or advisable.<br />\r\n&bull; To carry out assessment of risks and endeavour to reduce or eliminate these risks.<br />\r\n&bull; To provide written systems of work for all and any procedures which are exposed to hazard.<br />\r\n&bull; To record notification of hazards and accidents and incorporate improvements suggested as a result of investigations conducted following such notifications as soon as possible.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(44, 27, 'Responsibilities of managers and supervisors', '<p>&bull; To be personally responsible for the execution of the safety policy as far as the department/employees for which he/she is responsible.<br />\r\n&bull; To be personally responsible, as far as reasonably practicable, for the safety of all persons working in or visiting his/her department, and for all equipment under his/her control.<br />\r\n&bull; To ensure, in the event of any accident, prompt and appropriate first aid is administered, and that further medical assistance is obtained if necessary, the circumstances of the incident are investigated and reported, and that recommendations made as a result of an investigation are implemented.<br />\r\n&bull; To ensure the workplace safety folder is kept and displayed, its contents are brought to the attention of every employee, and all employees are conversant with such data.<br />\r\n&bull; To ensure protective clothing/equipment is used at all times where and when necessary.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(45, 27, 'Responsibilities of students, trainees, agents and employees', '<p>&bull; To ensure that students, trainees agents and employees (on site) are conversant with the accident/hazard reporting procedure and that notification of hazards is passed to the appropriate person for action.<br />\r\n&bull; To make them familiar with and adhere to safety procedures, including the fire alarm procedure and evacuation route(s).<br />\r\n&bull; To wear protective clothing/equipment at all times when necessary, and to report any defects in such clothing/equipment to their supervisor.<br />\r\n&bull; To report all accidents/incidents to a supervisor, and to carry out instructions given by a supervisor.<br />\r\n&bull; To report all safety and health hazards and machinery defects using the hazard report procedure.<br />\r\n&bull; To co-operate with the organisation at all times on matters of safety.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(46, 27, 'Responsibilities of safety representatives', '<p>&bull; To assist the employer in the assessment and reduction of risk and hazards, by being aware of the implementation and effect of procedures and work in the workplace.<br />\r\n&bull; To advise the employer on matters of concern voiced by employees and liaise/help in rectification thereof.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(47, 27, 'Administration', '<p>The Safety Officer is Nasir Uddin (Extension 28; nas@iconcollege.com) and Senior Fire Marshal Waseem Ahammed (Extension 25; waseem@iconcollege.com) are responsible for:<br />\r\n&bull; Preparing, reviewing and updating this policy and reporting his activity in these regards to Academic Committee.<br />\r\n&bull; Accident/hazard reporting procedures<br />\r\n&bull; Fire and safety procedures and evacuation guidance.<br />\r\n&bull; Ensuring compliance with the responsibilities laid down in this policy statement and reporting any non-compliance to senior management for sanctions to be applied.<br />\r\n&bull; Liaison with Health and Safety Officers, Insurers, Factory and Environmental Health Officers, Fire Brigade, etc., and ensuring appropriate recommendations are effected.<br />\r\n&bull; Implementing the requirements of the Reporting of Injuries, Diseases and Dangerous Occurrences Regulations 1995 (RIDDOR)<br />\r\n&bull; Implementing all other relevant/applicable legislation, regulations, and codes of practice or requirements.<br />\r\n&bull; To further the interest of all involved in the reduction and/or elimination of risk,<br />\r\nor, failing this, of its control.<br />\r\n&bull; To advise management on safety matters.<br />\r\n&bull; To assist in the education of employees in operating safe working practices.<br />\r\n&bull; To raise awareness of the need for a high-profile safety policy/procedure.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(48, 27, 'Emergency Evacuation Procedure', '<p>This statement will be referred to during the induction of new students<br />\r\nAccording to the Health and Safety at Work Act (1974) and reflected in the College&rsquo;s Health and Safety Policy, each individual needs to be aware of evacuation procedures in the cases of an emergency and must comply fully with them. This part of the Handbook outlines the evacuation procedures that ICON College of Technology and Management carries out for all people within its responsibilities (employees, work placement trainees, students and visitors to the college), as well as evacuation procedures carried out by the management of the premises occupied by ICON for all occupiers of the building. It applies to drills as well as genuine emergencies.<br />\r\nYou should ensure that you have read and understood these instructions, as your life and health and that of your colleagues and friends may depend on this.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(49, 27, 'Fire regulations', '<p><strong>Fire Marshals:</strong><br />\r\n<br />\r\nThe Fire Marshals are responsible for overseeing the evacuation procedures, ensuring that everybody is safe and accounted for, and that the premises/ buildings are safe before anyone returns to his/ her workstation. They will take the daily register to the assembly points to check that all persons in attendance, noted in the register, are safely out of the building and accounted for. You must know where the assembly point is and who the Fire Marshals are, and report to them once you have evacuated the building.<br />\r\n<strong>ICON&rsquo;s Senior Fire Marshal:&nbsp;</strong>Waseem Ahammed (Extension 25; Waseem@iconcollege.com)<br />\r\n<br />\r\n<strong>Assembly point in cases of emergency evacuation:</strong><br />\r\n<br />\r\n<strong>Front of Altab Ali Park in Adler Street&nbsp;</strong>(please try not to block the road)</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(50, 27, 'Fire prevention', '<p>&bull; Keep all doors, especially fire doors, and walkways clear. Do not prop open fire doors.<br />\r\n&bull; Ensure that all paper rubbish is put into the rubbish receptacles provided.<br />\r\n&bull; Ensure that all staff and students are made aware of the health and safety rules and regulations, disciplinary procedures, ICON&rsquo;s and the centre&rsquo;s rules and regulations governing their attendance and behaviour whilst on the premises.<br />\r\n&bull; The building which ICON occupies is an all non-smoking environment, Smoking is strictly prohibited in all ICON`s premises, as well as the corridors, balconies, hallways and entrances of the building.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(51, 27, 'Health and safety notices', '<p>There are health and safety notices all-round the College and in every room in ICON&rsquo;s premises. You must ensure you have read and familiarise yourself with the contents. You must also ensure you know where the fire exits, signs and the fire extinguishers are.<br />\r\nNormally it is the premises manager or Fire Marshal in ICON who should sound the fire alarm and summon the fire brigade. No one else should normally be called upon to fight a fire, but in exceptional emergency cases, such as coming upon a small fire and tackling it, you need to know which fire extinguisher to use and how to tackle the fire.<br />\r\nFire extinguisher types: water and CO2.<br />\r\nInstructions on how to use the fire extinguishers are found on the equipment.<br />\r\n<br />\r\n<strong>If you discover a fire: the emergency plan</strong><br />\r\n<br />\r\n&bull; Operate the nearest fire alarm<br />\r\n&bull; Inform the Fire Marshal or another member of senior staff immediately.<br />\r\n&bull; Attack the fire, if possible, with (appropriate) appliances provided, but do not take personal risks.<br />\r\n&nbsp;</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:26:56', NULL, NULL, 'Active'),
(52, 27, 'Calling the Fire Brigade', '<p>&bull; This should normally be done by the Fire Marshal or another senior member of staff.<br />\r\n&bull; However, if they are not available and you need to call the Fire Brigade, dial 999.<br />\r\n&bull; Give the operator your telephone number and ask for the Fire Brigade.<br />\r\n&bull; When the Fire Brigade replies, tell them distinctly:<br />\r\n&lsquo;Fire in ICON College of Technology and Management,<br />\r\nlocation: Unit 21-22, 1-13 Adler Street, London E1 1EG&rsquo;<br />\r\n&bull; Do not ring off or replace the receiver until the Fire Brigade has repeated the address.<br />\r\n&bull; Leave the building immediately and report to the Fire Marshal at the assembly point.<br />\r\n&nbsp;</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:27:47', NULL, NULL, 'Active'),
(53, 27, 'Golden rules for your safety in the event of an emergency', '<p>&bull; Walk! Do not run! You should have enough time to get out of the building safely. In the past, deaths and serious injuries have occurred when people have given way to panic and rushed to evacuate a building. Leave your personal property behind.<br />\r\n&bull; When you arrive at the assembly point, stay with your group and do not wander off. Watch out for traffic and don`t block the road.<br />\r\n&bull; When the register is being called, make sure that, when your name is called you answer loudly enough to be heard clearly.<br />\r\n&bull; Do not assume that everyone has heard the fire alarm. Although your hearing may be perfect, there could be some people who haven`t heard the alarm; some may have hearing problems. If in doubt, remind people that the fire alarm is ringing.<br />\r\n&bull; Do not re- enter the building until you have been told that it is safe by the Fire Marshal.<br />\r\n<br />\r\n<strong>On hearing the fire alarm:</strong><br />\r\n<br />\r\n<strong>ICON staff:</strong><br />\r\n&bull; Stop what you are doing immediately and proceed out of the building.<br />\r\n&bull; Use the nearest available exit.<br />\r\n&bull; Do not use lifts (except where special arrangements exist for disabled people).<br />\r\n&bull; Do not stop to collect belongings.<br />\r\n&bull; Leave the building immediately and proceed at once to the assembly point.<br />\r\n<br />\r\n<strong>ICON Fire Marshal:</strong><br />\r\n&bull; Co-ordinate actions of ICON staff.<br />\r\n&bull; Ensure evacuation of offices/ floor proceeds and is completed by checking all rooms, lavatories, etc.<br />\r\n&bull; Close doors and windows to prevent fire spreading. Ensure that you collect the daily register record(s)<br />\r\n&bull; Leave building and check the names of those present against the register<br />\r\n&bull; Report the details of incident and evacuation when complete to Senior (Building) Fire Marshal.<br />\r\n<br />\r\n<strong>Senior Fire Marshal:</strong><br />\r\n&bull; Ensure the Fire Brigade has been called.<br />\r\n&bull; Report to assembly point.<br />\r\n&bull; Record details of incident and evacuation from floor to ICON Fire Marshals.<br />\r\n&bull; Report details to Fire Brigade on arrival.<br />\r\n&bull; Assist Fire Brigade if requested.<br />\r\n<br />\r\n&nbsp;</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 08:27:47', NULL, NULL, 'Active'),
(54, 28, 'Introduction', '<p>1.1 These terms and conditions represent an agreement between City, University of London (<strong>&quot;the institution&quot;</strong>) and you, a prospective student. By accepting the institution&#39;s offer of a place on a programme (whether through UCAS or otherwise), you accept these terms and conditions in full, which along with:</p>\r\n\r\n<p>(i) your offer letter from the institution (&quot;the Offer&quot;);<br />\r\n<br />\r\n(ii) the institution&#39;s regulations, policies and procedures (see&nbsp;<a href=\"http://www.city.ac.uk/about/city-information/governance/constitution/senate-regulations\">Senate Regulations</a>;&nbsp;<a href=\"http://www.city.ac.uk/about/city-information/governance/constitution/ordinances\">Ordinances</a>;&nbsp;<a href=\"http://www.city.ac.uk/about/education/quality-manual\">Quality Manual&nbsp;</a>) (as amended from time to time); and</p>\r\n\r\n<p>(iii) the prospectus as at the date of the Offer, (including information on the institution&#39;s website, referenced in the prospectus)</p>\r\n\r\n<p>form the contract between you and the institution in relation to your studies at the institution (&ldquo;the Contract&quot;).</p>\r\n\r\n<p>1.2 If you have any questions or concerns about these terms and conditions or the Contract, please contact the institution&#39;s Student &amp; Academic Services Directorate &ndash; the email address is&nbsp;<a href=\"mailto:termsandconditions@city.ac.uk\">termsandconditions@city.ac.uk</a>.</p>\r\n\r\n<p>1.3 Some programmes may require you to agree to the terms and conditions of professional bodies or third party providers, such as industrial partners or funding bodies. Details of these requirements are set out in the programme information section of the prospectus. By agreeing to these terms and conditions, you also agree to abide by any relevant professional bodies&#39; terms and conditions, if they relate to your Offer.</p>\r\n\r\n<p>1.4 If you require a visa or other immigration permission to be able to study at the institution it is your responsibility to obtain the appropriate visa before starting your programme. By agreeing to these terms and conditions, you also agree to abide by the terms and conditions of your visa throughout the course of your studies at the institution.</p>\r\n\r\n<p>1.5 If you do not act in accordance with the Contract, or if you do not meet our expectation that you will maintain a standard of conduct which is not harmful to the work, good order or good name of the institution, we may take disciplinary action against you, under&nbsp;<a href=\"http://www.city.ac.uk/__data/assets/pdf_file/0003/285078/Senate_Regulation_13_Student_Discipline-20150708.pdf\">Senate Regulation 13: Student Disciplinary Regulation</a>. One of the possible outcomes of such an action is that your Contract with us may be terminated and you may be removed from your programme.</p>\r\n\r\n<p>1.6 If you do not register within 14 days of the start of the term that your programme begins in, the institution reserves the right to refuse to register you and withdraw you from your programme (without liability). Tier 4 sponsored students and other students who require a visa or other immigration permission to be able to study at the institution shall additionallycomply with Clause 3 of these terms and conditions. Students who are not registered are not entitled to attend classes or participate in assessments for any modules.</p>\r\n\r\n<p>1.7 In the event of any conflict between a provision in these terms and conditions and the documents forming part of the Contract these terms and conditions shall take precedence. However, this clause shall not apply to any professional bodies&rsquo; terms and conditions and any visa or other immigration conditions which shall take precedence over these terms and conditions.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', 'admin@gmail.com', '2017-09-27 10:23:48', 'Active'),
(55, 28, 'Applications', '<p>2.1 It is your responsibility to ensure that all of the information you provide to the institution (and/or the Home Office if you require immigration permission to study at the institution) is true and accurate.</p>\r\n\r\n<p>2.2 If it is discovered that your application contains material inaccuracies or fraudulent information, or that significant information has been omitted from your application form, the institution may withdraw or amend your Offer, or terminate your registration at the institution, according to the circumstances, without liability to you.</p>\r\n\r\n<p>2.3 The Offer the institution makes to you will be conditional or unconditional. If your Offer is conditional, the institution will set out the conditions which you will need to fulfil in order to be admitted onto your chosen programme. If your first language is not English, your Offer may be conditional upon you also passing an English language test, as specified by the institution.</p>\r\n\r\n<p>2.4 If you have not fulfilled the conditions of your Offer before the date notified to you in your Offer or any other date notified to you, the institution reserves the right to withdraw your Offer.</p>\r\n\r\n<p>2.5 You will be required, at the request of the institution, to provide satisfactory evidence of your qualifications (including English language qualifications if required) before admission. Failure to provide such evidence to the institution&#39;s reasonable satisfaction may result in the termination of your Offer, the revocation of your registration as a student of the institution and the termination of the Contract.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', 'admin@gmail.com', '2017-09-27 10:23:58', 'Active'),
(56, 28, ' Immigration', '<p>3.1 The institution is required to verify that you have the correct immigration permission to study at the institution and to keep a copy of your passport and visa or Biometric Residence Permit on file. If you fail to demonstrate that you have the correct immigration permission the institution will not register you for your programme and you will be liable for any personal costs incurred.</p>\r\n\r\n<p>3.2 You must notify the City Visa Compliance Team immediately if there are any changes whatsoever to your immigration status at any time before or after registration and during the course of your studies.</p>\r\n\r\n<p>3.3 All Tier 4 sponsored students and any other students who require a visa or immigration permission to be able to study at the institution must comply with the information contained on the institution&#39;s&nbsp;<a href=\"http://www.city.ac.uk/international/visa-immigration-advice/tier4/responsibilities\">Visa &amp; immigration advice&nbsp;</a>webpages at all times during a student&#39;s period of study at the institution.</p>\r\n\r\n<p>3.4 If you choose to withdraw from your studies or if your registration is terminated by the institution, this could affect the validity of your visa and your ability to enter and/or remain in the United Kingdom.</p>\r\n\r\n<p>3.5 If you do not have valid immigration permission to remain in the UK, the institution shall have no choice but to terminate your registration on your programme. In the event that your application for a Tier 4 visa is refused, the institution shall not sponsor you again for a Confirmation of Acceptance for Studies (&ldquo;CAS&rdquo;).</p>\r\n\r\n<p>3.6 On occasion, the institution will need to contact the Home Office to clarify details on outstanding visa applications and previous immigration history. By accepting the terms of the Contract, you consent to the institution contacting the Home Office on your behalf and the Home Office releasing such information to the institution.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', 'admin@gmail.com', '2017-09-27 10:24:09', 'Active'),
(57, 28, ' Conditions of admission and registration', '<p>4.1 Your admission to the institution, attendance on a programme, and right to enjoy any of the privileges of membership of the institution, including access to services and facilities, is subject to you complying with the terms of the Contract and registering with the institution.</p>\r\n\r\n<p>4.2 All new students of the institution are required to complete registration. All information relating to the registration process can be found on the&nbsp;<a href=\"http://www.city.ac.uk/student-administration/registration\">Registration&nbsp;</a>webpages.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', 'admin@gmail.com', '2017-09-27 10:24:19', 'Active'),
(58, 28, 'Deposits', '<p>5.1 Your Offer will highlight if you are required to pay a deposit to secure a place on your programme (in addition to meeting any conditions). If you do not pay the deposit monies in accordance with the payment terms advised in your Offer, your application shall be withdrawn without further notice. It is therefore essential that you have funding for your deposit in place before you apply to the institution.</p>\r\n\r\n<p>5.2 Any deposit you pay will be offset against the balance of tuition fees owed to the institution.</p>\r\n\r\n<p>5.3 Deposits are non-refundable unless:</p>\r\n\r\n<p>5.3.1 you cancel the Contract in accordance with Clause 7, Clause 8 or Clause 9; or</p>\r\n\r\n<p>5.3.2 you fail to secure your Tier 4 visa for any reason other than the provision of fraudulent information and are able to evidence this to the reasonable satisfaction of the institution.</p>\r\n\r\n<p>5.3.3 the institution terminates the Contract in accordance with Clause 8.4 and is unable to find a replacement programme for which you are qualified and which you are happy with.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', 'admin@gmail.com', '2017-09-27 10:24:29', 'Active'),
(59, 28, 'Tuition fees and other charges', '<p>6.1 The tuition fees for your programme and information on how to pay can be found on the institution&#39;s website (<a href=\"http://www.city.ac.uk/study/undergraduate/fees\">undergraduate fees information</a>;<a href=\"http://www.city.ac.uk/study/postgraduate/fees\">postgraduate fees information</a>) and in your Offer.</p>\r\n\r\n<p>6.2 If you accept an Offer, you agree to pay all tuition fees (and any other related costs as applicable, as per Clause 6.9 below), as and when they fall due, in accordance with the payment terms agreed by you and us. If you fail to pay your tuition fees, as and when they fall due, we reserve the right to withdraw you from your programme (without liability to you).</p>\r\n\r\n<p>6.3 The institution reserves the right to increase your tuition fees annually in line with the Retail Prices Index to take account of the institution&#39;s increased costs of delivering educational services. If the institution intends to increase your tuition fees it will notify you of this as soon as is reasonably practical.</p>\r\n\r\n<p>6.4 You will not be deemed to have completed registration until the institution has received payment of your tuition fees, either in full or the first instalment, or satisfactory evidence has been produced that such fees will be paid by a sponsoring authority or scholarship. You will be personally liable to pay your tuition fees if a sponsoring authority fails to do so.</p>\r\n\r\n<p>6.5 In the event that your tuition fees have not been paid in full by their due date, the institution shall be entitled, but not bound to, refuse to permit you to continue on your programme of study and terminate the Contract (without incurring any liability to you).</p>\r\n\r\n<p>6.6 The institution may pursue legal proceedings in relation to non-payment of tuition fees.</p>\r\n\r\n<p>6.7 A refund of tuition fees may be made if you decide to withdraw from your programme, or are required to withdraw, as per Clause 13. Refunds are authorised in accordance with set criteria and are dependent upon the point during the academic year in which your withdrawal occurs. Full details, including the&nbsp;<a href=\"https://www.city.ac.uk/study/postgraduate/fees/paying-fees-and-refunds/refund-form\">Refund Request Form</a>&nbsp;which must be completed, can be found on the&nbsp;<a href=\"https://www.city.ac.uk/study/postgraduate/fees/paying-fees-and-refunds\">Paying fees and refunds</a>&nbsp;webpage.</p>\r\n\r\n<p>6.8 If you have any concerns regarding payment of fees or refund of fees, please contact the Income Manager at&nbsp;<a href=\"mailto:income@city.ac.uk\">income@city.ac.uk</a>.</p>\r\n\r\n<p>6.9 In addition to your tuition fees, you may incur additional expenditure during your time at the institution, depending upon your chosen programme. Please see the fees and finance section of the programme description in the prospectus for programme-specific information and likely costs. Queries regarding any aspect of such other charges should be directed to your Course Office.</p>\r\n\r\n<p>6.10 Please be aware that membership to CitySport, the sports and fitness centre of the institution, is not included within your tuition fees. All information relating to the facilities offered at CitySport and the various membership options can be found on the&nbsp;<a href=\"http://www.city.ac.uk/citysport\">CitySport&nbsp;</a>website.&nbsp;<br />\r\n<br />\r\n6.11 In addition, any provision of accommodation will be subject to: (i) an additional charge over and above your tuition fees; and (ii) a separate contract.</p>\r\n\r\n<p>6.12 The institution may pursue legal proceedings against you if you are in debt to the institution. In addition, if you are in debt to the institution (whether for tuition or other fees) you will be recorded as a debtor of the institution in any references requested from the institution.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', 'admin@gmail.com', '2017-09-27 10:24:39', 'Active'),
(60, 28, 'Your Cancellation rights', '<p>7.1 Once you have accepted an Offer, you have a legal right to cancel the Contract at any time within 14 days of the date that you formally accepted your Offer.</p>\r\n\r\n<p>7.2 In order to cancel the Contract in accordance with Clause 7.1, you must notify the institution (either orally or in writing) within the timescales referred to in Clause 7.1 and you may give the institution notice by completing the&nbsp;<a href=\"http://www.city.ac.uk/__data/assets/word_doc/0008/309464/Schedule-1.doc\">cancellation form at Schedule 1</a>of your Offer letter.</p>\r\n\r\n<p>7.3 If you have made any payment under the Contract prior to the date of cancellation of the Contract then the institution will provide you with a full refund as soon as reasonably possible but in any event within 14 days of the institution receiving your cancellation form.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', NULL, NULL, 'Active');
INSERT INTO `ictmpagesection` (`pageSectionId`, `pageId`, `pageSectionTitle`, `pageSectionContent`, `pageSectionImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `pageSectionStatus`) VALUES
(61, 28, 'Changes to your taught programme of study', '<p>This Clause relates to changes made to taught programmes. If you are an applicant for a doctoral programme, please refer to Clause 9.</p>\r\n\r\n<p><strong>8.1 Withdrawal of a programme prior to registration</strong></p>\r\n\r\n<p>The institution will use all reasonable endeavours to deliver all programmes described in the prospectus. However, if there are insufficient enrolments the institution may be forced to cancel the programme. If you have received an offer for any programme described in the prospectus which the institution discontinues prior to you registering at the institution, the institution will notify you as soon as possible and will use reasonable endeavours to provide a suitable replacement programme for which you are qualified. If you do not wish to take up the replacement programme provided by the institution or if the institution is unable to provide a suitable replacement programme, you may cancel the Contract and withdraw from the programme without any liability for tuition fees (even if the cancellation period referenced in Clause 7.1 has expired).</p>\r\n\r\n<p><strong>8.2 Programme changes between prospectus publication and your registration</strong></p>\r\n\r\n<p>Due to the period between prospectus publication and registration, circumstances may change that lead the institution to make changes to the programme. These changes may occur due to enhancing or updating the quality and content of educational provision; responding to student feedback; academic staffing changes; a lack of student demand for certain modules; or factors beyond the institution&rsquo;s reasonable control which include meeting the latest requirements of a commissioning or accrediting body. The institution will use all reasonable endeavours to ensure that changes are kept to a minimum, but if we are required to make any material changes to the terms of the Contract or your programme (as described in your Offer and/or prospectus) before you register at the institution, the institution shall bring these to your attention as soon as possible. If you reasonably believe that the proposed change will prejudicially affect you, you may either cancel the Contract and withdraw from the programme without any liability to the institution for tuition fees (even if the cancellation period referenced in Clause 7.1 has expired) or transfer to such other programme as may be offered by the institution for which you are qualified.</p>\r\n\r\n<p><strong>8.3 Programme changes after your registration</strong></p>\r\n\r\n<p>8.3.1 The institution may vary elements of your programme from that described in the prospectus once you are registered on the programme for the same reasons as set out in Clause 8.2.</p>\r\n\r\n<p>8.3.2 The institution will undertake suitable consultation with students where it proposes to make a change to your programme that materially changes the outcomes of, or a large part of, your programme (such as the nature of the award or a major change to the curriculum). If the institution makes such a material change (in the institution&#39;s reasonable opinion) which you reasonably believe will prejudicially affect you, you may either cancel the Contract and withdraw from the programme without any liability to the institution for tuition fees or transfer to such other programme (if any) as may be offered by the institution for which you are qualified. This clause 8.3 of the terms and conditions shall not apply to Tier 4 sponsored students or students who require a visa or other immigration permission to be able to carry out their studies.</p>\r\n\r\n<p><strong>8.4 Withdrawal of a programme after registration</strong></p>\r\n\r\n<p>If after you have registered as a student of the institution, the institution is forced to discontinue your programme as a result of a Force Majeure Event (as defined in Clause 12.3), the institution will notify you as soon as possible and use reasonable endeavours to transfer you to a suitable replacement programme for which you are qualified. If you are unhappy with the replacement programme provided by the institution or if the institution is unable to provide a suitable replacement programme, you may cancel the Contract and withdraw from the programme without incurring any further liability for tuition fees and you shall be entitled to a refund of all tuition fees (including any deposit) paid to date.</p>\r\n\r\n<p>8.5 If you choose to cancel the Contract (and withdraw from your programme) in accordance with Clause 8.4 the institution will use reasonable endeavours to assist you in finding an alternative comparable programme with another Higher Education provider in the UK.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', NULL, NULL, 'Active'),
(62, 28, 'Changes to your supervision and/or support for your research study', '<p><strong>9.1 Change in or withdrawal of suitable research expertise and/or support for your doctoral research study prior to registration</strong></p>\r\n\r\n<p>If, prior to registration, suitable research expertise and/or access to additional research skills and methods training changes or becomes unavailable, the institution may be forced to amend or withdraw an offer of study on a doctoral programme. If this occurs, you will be notified as soon as possible and the institution will endeavour to identify alternative research expertise and/or access to alternative research skills and methods training. If you do not wish to accept the proposed alternative arrangements or if the institution is unable to provide suitable research expertise and/or research skills and methods training you may cancel the Contract and withdraw from the doctoral programme without any liability for tuition fees (even if the cancellation period referenced in Clause 7.1 has expired).</p>\r\n\r\n<p><strong>9.2 Change in support for your doctoral research study after registration</strong></p>\r\n\r\n<p>If after you have registered to study on a doctoral programme there is a change in support, such as co-funding through third party contributors and collaboration with industrial partners, or there are intellectual property or research integrity matters arising that you reasonably believe will prejudicially affect you, you may either cancel the Contract and withdraw from the doctoral programme without any liability to the institution for tuition fees or transfer to such other doctoral programme (if appropriate) as may be offered by the institution, for which you are qualified.</p>\r\n\r\n<p><strong>9.3 Withdrawal of suitable research expertise and/or support for your doctoral research study after registration</strong></p>\r\n\r\n<p>If, after you have registered to study on a doctoral programme, circumstances change which lead to the institution no longer being able to offer you suitable research expertise, you may either cancel the Contract and withdraw from the doctoral programme without any liability to the institution for tuition fees or transfer to such other doctoral programme (if appropriate) as may be offered by the institution for which you are qualified.</p>\r\n\r\n<p>9.4 Academic Technology Approval Scheme (ATAS) clearance</p>\r\n\r\n<p>All Tier 4 sponsored students and any other students who require a visa or immigration permission to be able to study at the institution shall, if required in order to carry out their research, apply for an ATAS certificate and shall be responsible for renewing their ATAS certificate in the event of any changes to their research programme.</p>\r\n\r\n<p>9.5 If you choose to cancel the Contract (and withdraw from your doctoral programme) in accordance with Clause 9.3 the institution will use reasonable endeavours to assist you in finding alternative comparable research expertise with another Higher Education provider in the UK.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', NULL, NULL, 'Active'),
(63, 28, 'Educational provision', '<p>10.1 The institution will:-</p>\r\n\r\n<p>10.1.1 deliver your Programme with reasonable care and skill;</p>\r\n\r\n<p>10.1.2 clearly explain the academic requirements of your programme to you.</p>\r\n\r\n<p>10.2 You must use all efforts to fulfil all the academic requirements of your programme in accordance with the terms of the Contract, the requirements for which are set out in the programme handbook.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:21:43', NULL, NULL, 'Active'),
(64, 28, 'Complaints procedure', '<p>11.1 If you have a complaint about the institution, you should follow the institution&#39;s Complaints Procedure (see<a href=\"http://www.city.ac.uk/about/education/academic-services/student-appeals-and-complaints/complaints\">&nbsp;Complaints information for registered students</a>;&nbsp;<a href=\"http://www.city.ac.uk/__data/assets/pdf_file/0009/68886/admissions_policy.pdf\">Complaints information for applicants</a>). These procedures have been produced to help the institution resolve any complaints you may have as promptly, fairly and amicably as possible.</p>\r\n\r\n<p>11.2 If, having followed the institution&#39;s Complaints Procedure to completion, you remain dissatisfied, you have the right to make a complaint to the Office of the Independent Adjudicator for Higher Education.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:23:36', NULL, NULL, 'Active'),
(65, 28, 'Liability', '<p>12.1 Whilst the institution takes all reasonable care to ensure the safety and security of its students whilst on the institution&#39;s campus, the institution cannot accept responsibility, and expressly excludes liability, for loss or damage to your personal property (including computer equipment and software). You are advised to insure your property against theft and other risks.</p>\r\n\r\n<p>12.2 The institution shall not be held responsible for any injury to you (financial or otherwise), or for any damage to your property, caused by another student, or by any person who is not an employee or authorised representative of the institution unless such injury or damage is caused by the institution&rsquo;s negligence.</p>\r\n\r\n<p>12.3 The institution shall not be liable for failure to perform any obligations under the Contract if such failure is caused by any act or event beyond the institution&#39;s reasonable control including acts of God, war, terrorism, industrial disputes (including disputes involving the institution&#39;s employees), fire, flood, storm and national emergencies (&quot;Force Majeure Event&quot;). If the institution is the subject of a Force Majeure Event, it will take all reasonable steps to minimise the disruption to your studies.</p>\r\n\r\n<p>12.4 Nothing in these terms and conditions shall limit the institution&#39;s liability to you for fraud or wilful default or for death or personal injury caused by the institution&rsquo;s negligence. Subject to the foregoing sentence, the institution shall not under any circumstances whatsoever be liable to you for any special, indirect or consequential losses.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:23:36', NULL, NULL, 'Active'),
(66, 28, 'Termination', '<p>13.1 The institution reserves the right to terminate the Contract and withdraw you from the institution:</p>\r\n\r\n<p>13.1.1 if,&nbsp;&nbsp;in accordance with&nbsp;<a href=\"http://www.city.ac.uk/__data/assets/word_doc/0003/69249/s19.docx\">Senate Regulation 19: Assessment Regulations</a>, the Assessment Board determines that you have failed your programme. You should also note that your progression on your programme and your final award are not guaranteed and are dependent upon your academic performance;</p>\r\n\r\n<p>13.1.2 for non-registration, for non-payment of tuition-related debt, or for inadequate attendance or academic performance on your programme, in line with the information contained in your programme handbook and with the relevant policies and procedures (see&nbsp;<a href=\"http://www.city.ac.uk/about/city-information/governance/constitution/senate-regulations\">Senate Regulations;</a>&nbsp;<a href=\"http://www.city.ac.uk/about/education/quality-manual\">Quality Manual</a>;</p>\r\n\r\n<p>13.1.3 if you are considered to have breached the institution&rsquo;s&nbsp;<a href=\"http://www.city.ac.uk/__data/assets/pdf_file/0003/285078/Senate_Regulation_13_Student_Discipline-20150708.pdf\">Senate Regulation 13: Student Disciplinary Regulation</a>;</p>\r\n\r\n<p>13.1.4 if, in accordance with Clause 3, you are no longer able to demonstrate that you have a valid immigration status, if you have not complied with the conditions of your Tier 4 or any other visa required for you to carry out your studies of if, in the institution&rsquo;s reasonable opinion your acts or omissions could reasonably put the institution&rsquo;s Tier 4 Sponsor status at risk.</p>\r\n\r\n<p>13.1.5 if, in the case of programmes which are regulated by professional statutory and regulatory bodies, you are deemed unfit to practise by a Fitness to Practise Panel. This could be as a result of a Cause for Concern referral or a disclosure via the Disclosure and Barring Service. Further information can be found in the&nbsp;<a href=\"http://www.city.ac.uk/__data/assets/pdf_file/0005/160754/Fitness-to-Practise-Policy-and-Procedure-final-16-17.pdf\">Cause for Concern and Fitness to Practise Policy</a>.</p>\r\n\r\n<p>13.2 If you have been withdrawn from the institution, you will no longer be entitled to attend lectures, classes or seminars, use the institution&#39;s facilities or services, submit assessments, take tests/examinations, or proceed to any degree, diploma or other award of the institution. You will also cease to be a member of the Students&rsquo; Union and will therefore be unable to participate in clubs, societies or other activities associated with the Students&rsquo; Union. To the extent that you are engaged in any procedures of the institution or Office of the Independent Adjudicator (OIA) associated with that withdrawal, you may be entitled to the support services offered by the&nbsp;<a href=\"http://www.culsu.co.uk/advice\">Students&rsquo; Union Support Service</a><a href=\"http://www.culsu.co.uk/advice\">.</a></p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:23:36', NULL, NULL, 'Active'),
(67, 28, 'Data protection', '<p>14.1 The institution holds information about all applicants to the institution and all students at the institution. The institution uses the information provided by applicants and/or students (including information from application forms):-</p>\r\n\r\n<p>14.1.1 to administer applications; and</p>\r\n\r\n<p>14.1.2 to compile statistics about applicants and/or students that may be published or passed to government bodies or the Higher Education Statistics Agency (HESA). For further information please see our&nbsp;<a href=\"http://www.city.ac.uk/student-administration/hesa-student-data-collection-notice\">HESA Student Data Protection Notice</a>.</p>\r\n\r\n<p>14.2 If your application is successful the institution will also use the information:-</p>\r\n\r\n<p>14.2.1 to deliver your programme and provide educational services to you, to administer your studies, to provide you with the institution&#39;s facilities and services, to monitor your performance and attendance, to provide you with support, to conduct research and to identify ways to enhance learning, teaching, assessment and the broader student experience;</p>\r\n\r\n<p>14.2.2 to send communications to you;</p>\r\n\r\n<p>14.2.3 to process any payments made by you to the institution;</p>\r\n\r\n<p>14.2.4 for credit scoring, credit assessment, debt tracing or fraud and money-laundering prevention and the institution may disclose this information or data about you to credit reference agencies or other credit assessment, debt tracing, fraud prevention organisations or solicitors as appropriate;</p>\r\n\r\n<p>14.2.5 for legal, personnel, administrative and management purposes and including the processing of any sensitive personal data (as defined in the Data Protection Act 1998) relating to you, which may include, as appropriate: information about your physical or mental health or condition in order to monitor leave from study or extenuating circumstances and take decisions as to your fitness for study or for other uses as may be required by law; and</p>\r\n\r\n<p>14.2.6 for other activities that fall within the pursuit of the institution&#39;s legitimate interests (including the development and maintenance of an Alumni Programme, or in the event that the institution is required to terminate the Contract and withdraw you in accordance with Clause 13).</p>\r\n\r\n<p>14.3 In certain circumstances the institution may be under a duty to disclose or share your personal data in order to comply with any legal or regulatory obligation, and to protect the institution&#39;s rights, property, or safety of our employees, students or others.</p>\r\n\r\n<p>14.4 The institution will only process your personal data in accordance with (i) the specific purposes notified to you above; (ii) the institution&#39;s Data Protection Notice and Privacy Policy (as amended from time to time); and/or (iii) otherwise as permitted by the Data Protection Act 1998.</p>\r\n\r\n<p>14.5 By submitting your application form and/or accepting your Offer, you consent to the use of your personal data in accordance with this Clause 14. You should refer to the institution&#39;s following data protection policies for more information:</p>\r\n\r\n<p>14.5.1&nbsp;<a href=\"http://www.city.ac.uk/about/city-information/legal/data-protection-notice\">Data Protection Notice for Students</a>;</p>\r\n\r\n<p>14.5.2&nbsp;<a href=\"http://www.city.ac.uk/student-administration/hesa-student-data-collection-notice\">HESA Student Data Protection Notice</a>;</p>\r\n\r\n<p>and</p>\r\n\r\n<p>14.5.3&nbsp;<a href=\"http://www.city.ac.uk/about/city-information/legal/data-protection\">Privacy Policy</a>.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:23:36', NULL, NULL, 'Active'),
(68, 28, 'Intellectual Property and research integrity', '<p>Depending on your level of study, you may be entitled to own any intellectual property you generate and provide to us during your programme including, without limitation, the content of examination scripts and assignments. For postgraduate research students, intellectual property will normally be owned by the institution. For all the necessary detail around intellectual property ownership, all students are asked to refer to the institution&#39;s&nbsp;<a href=\"http://www.city.ac.uk/__data/assets/pdf_file/0005/77063/City-University-London-IP-Policy-v0.86-1410101.pdf\">Intellectual Property Policy</a>. Students are also asked to refer to the institution&#39;s published information on&nbsp;<a href=\"http://www.city.ac.uk/research/research-and-enterprise/research-ethics\">Research Ethics&nbsp;</a>and to the&nbsp;<a href=\"http://www.city.ac.uk/research/about-our-research/framework-for-good-practice-in-research\">Framework for Good Practice in Research</a>.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:23:36', NULL, NULL, 'Active'),
(69, 28, 'General', '<p>16.1 The terms of the Contract shall only be enforceable by you and the institution.&nbsp;</p>\r\n\r\n<p>16.2 The Contract constitutes the entire agreement between you and the institution in relation to its subject matter.</p>\r\n\r\n<p>16.3 No failure or delay by the institution or you to exercise any right or remedy provided under the Contract or by law shall constitute a waiver of that or any other right or remedy, nor shall it prevent or restrict the exercise of that or any other right or remedy.</p>\r\n\r\n<p>16.4 If any provision or part-provision of the Contract is or becomes invalid, illegal or unenforceable, it shall be deemed modified to the minimum extent necessary to make it valid, legal and enforceable. If such modification is not possible, the relevant provision or part provision shall be deemed deleted. Any modification to or deletion of a provision or part provision shall not affect the validity and enforceability of the rest of the Contract.</p>\r\n\r\n<p>16.5 The courts in England and Wales will have exclusive jurisdiction to settle any dispute or claim arising out of or in relation to the Contract and that in any such proceedings these terms and conditions and the Contract into which they are incorporated will be governed by and interpreted in accordance with the laws of England and Wales.</p>\r\n', NULL, 'admin@gmail.com', '2017-09-27 10:23:36', 'admin@gmail.com', '2017-10-18 11:20:28', 'Active'),
(70, 38, 'Introduction', '<p>For students to be eligible for SLC funding, they must be studying on a course designated each year by Department for Education. All BTEC Higher National Diploma courses at ICON College have been designated for the 2016-17 academic year. Our designation for 2017-18 is subject to a satisfactory outcome at our QAA HER (AP) review visit due in July 2017. Further information on student loans visit&nbsp;<a href=\"http://www.hefce.ac.uk/reg/desig/cdforstudents%20for%20more%20information\" target=\"_blank\">http://www.hefce.ac.uk/reg/desig/cdforstudents for more information.</a></p>\r\n\r\n<p>UK and EU students may be entitled to a student loan from the Student Loans Company to cover the cost of their tuition fees. UK and EU students may also be eligible for a student loan or grant to cover their maintenance cost whilst studying. Funding from the Student Loans Company is dependent upon meeting the eligibility criteria for public funding. Please see the details for eligibility at&nbsp;<a href=\"https://www.gov.uk/student-finance/who-qualifies\" target=\"_blank\">https://www.gov.uk/student-finance/who-qualifies.</a></p>\r\n', NULL, 'admin@gmail.com', '2017-10-16 11:56:52', NULL, NULL, 'Active'),
(71, 38, 'Tuition Fee Loans', '<p>The Tuition Fee Loan covers the fees you&#39;re charged each year of your course. It&#39;s paid directly to the college. Your Tuition Fee Loan covers all of your fees for the following two year full-time courses. Below are the tuition fee loans for the academic year 2016/17.</p>\r\n\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Courses</th>\r\n			<th>Tuition Fee Loan (per year)</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>HND Business</td>\r\n			<td>&pound;6000.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HND Travel and Tourism Management</td>\r\n			<td>&pound;6000.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HND Hospitality Management</td>\r\n			<td>&pound;6000.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HND Health and Social Care</td>\r\n			<td>&pound;6000.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HND Electrical &amp; Electronic Engineering</td>\r\n			<td>&pound;6000.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>HND Computing and Systems Development</td>\r\n			<td>&pound;6000.00</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, 'admin@gmail.com', '2017-10-16 11:56:52', 'admin@gmail.com', '2017-10-16 12:04:21', 'Active'),
(72, 38, 'Maintenance Loans for living costs', '<p>The exact amount full-time students can borrow depends on: your family&#39;s income; where you live; what year of study you&#39;re in etc. Further information is available at https://www.gov.uk/student-finance</p>\r\n\r\n<p><br />\r\n<strong>Maximum Maintenance Loan rates for full-time students at ICON College</strong></p>\r\n\r\n<p>All the maximum amount stated below are per academic year of study. The loan is paid directly into your bank account at the start of term. You have to pay the loan back</p>\r\n\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Full Time student</th>\r\n			<th>Loan for the 2016 to 2017 academic year</th>\r\n			<th>Loan for the 2017 to 2018 academic year</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Living at home and study at ICON</td>\r\n			<td>Up to &pound;6,904.00</td>\r\n			<td>Up to &pound;7,097.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Living away from home, in London and study at ICON</td>\r\n			<td>Up to &pound;10,702.00</td>\r\n			<td>Up to &pound;11,002.00</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>*Above figures are subject to change depending on government policy, for the current information please see at https://www.gov.uk/student-finance/new-fulltime-students</p>\r\n', NULL, 'admin@gmail.com', '2017-10-16 11:56:52', 'admin@gmail.com', '2017-10-16 12:02:13', 'Active'),
(73, 38, 'Repaying Your Student Loan', '<p>Full-time students begin paying back their student loan once they finish their course and earn more than &pound;21,000 per year. However, if your income falls below &pound;21,000 a year, your repayments stop.</p>\r\n\r\n<p>Your employer will automatically take repayments from your salary if your income, before tax, is over the UK threshold. The current thresholds for repayment are &pound;21,000 a year, &pound;1,750 a month or &pound;404 a week. You pay 9% of your income over the threshold. For example, if you&#39;re paid monthly and earn &pound;2,250 before tax you&#39;ll repay 9% of the difference between what you earn and what the threshold is. Your payslips will show how much has been deducted</p>\r\n\r\n<p>If you&#39;re self-employed you&#39;ll pay through self-assessment.</p>\r\n\r\n<p>The following table gives some examples of what your repayments might be:</p>\r\n\r\n<table class=\"table table-bordered\">\r\n	<thead>\r\n		<tr>\r\n			<th>Income each year before tax</th>\r\n			<th>Monthly income</th>\r\n			<th>Approximate monthly repayment</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Up to &pound;21,000</td>\r\n			<td>Up to &pound;1,750</td>\r\n			<td>&pound;0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&pound;22,000</td>\r\n			<td>&pound;1,833</td>\r\n			<td>&pound;7</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&pound;23,500</td>\r\n			<td>&pound;1,833</td>\r\n			<td>&pound;18</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&pound;25,000</td>\r\n			<td>&pound;1,833</td>\r\n			<td>&pound;29</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&pound;27,000</td>\r\n			<td>&pound;1,833</td>\r\n			<td>&pound;45</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&pound;30,000</td>\r\n			<td>&pound;1,833</td>\r\n			<td>&pound;67</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>* Above figures are subject to change depending on government policy, for the current information please see at&nbsp;<a href=\"http://iconcollege.ac.uk/wireframe202/%3Ehttp://www.slc.co.uk/students-and-customers/loan-repayment/your-plan-type.aspx\" target=\"_blank\">http://www.slc.co.uk/students-and-customers/loan-repayment/your-plan-type.aspx or at&nbsp;</a><a href=\"https://www.gov.uk/repaying-your-student-loan\" target=\"_blank\">https://www.gov.uk/repaying-your-student-loan</a></p>\r\n', NULL, 'admin@gmail.com', '2017-10-16 11:56:52', 'admin@gmail.com', '2017-10-16 12:04:43', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmphoto`
--

CREATE TABLE `ictmphoto` (
  `photoId` int(11) NOT NULL,
  `photoPath` varchar(45) DEFAULT NULL,
  `albumId` int(100) NOT NULL,
  `photoName` varchar(45) DEFAULT NULL,
  `photoDetails` longtext,
  `insertedBy` varchar(45) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(45) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `photoStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmphoto`
--

INSERT INTO `ictmphoto` (`photoId`, `photoPath`, `albumId`, `photoName`, `photoDetails`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `photoStatus`) VALUES
(24, NULL, 14, '31.JPG', '<p>testghfh</p>\r\n', 'admin@gmail.com', '2017-10-14 21:24:58', 'admin@gmail.com', '2017-10-16 07:39:38', 'Active'),
(25, NULL, 14, '32.JPG', 'Photo Details 1', 'admin@gmail.com', '2017-10-16 07:39:05', NULL, NULL, 'Active'),
(26, NULL, 14, '33.JPG', 'fgdsfsdf', 'admin@gmail.com', '2017-10-16 07:42:55', NULL, NULL, 'Active'),
(27, NULL, 15, '28.JPG', 'fsdfsfsdf', 'admin@gmail.com', '2017-10-16 07:46:27', NULL, NULL, 'Active'),
(28, NULL, 15, '29.JPG', 'fsdfsfsdf', 'admin@gmail.com', '2017-10-16 07:46:27', NULL, NULL, 'Active'),
(29, NULL, 15, '30.JPG', 'fsdfsfsdf', 'admin@gmail.com', '2017-10-16 07:46:27', NULL, NULL, 'Active'),
(32, NULL, 16, '32.JPG', 'dgdfg', 'admin@gmail.com', '2017-11-16 11:40:34', NULL, NULL, 'Active'),
(33, NULL, 16, '33.JPG', 'dfgdfg', 'admin@gmail.com', '2017-11-16 11:40:34', NULL, NULL, 'Active'),
(34, NULL, 16, '34.jpg', '<p>fyiyui</p>\r\n', 'admin@gmail.com', '2017-11-16 11:40:34', 'admin@gmail.com', '2017-11-16 11:42:04', 'Active'),
(35, NULL, 17, '35.JPG', 'etertret werererrt', 'admin@gmail.com', '2017-11-16 11:47:18', NULL, NULL, 'Active'),
(36, NULL, 17, '36.JPG', '<p>aswrwetwertwret drgregre skfbksjbfksdkfs skjfsldflsdklfs</p>\r\n', 'admin@gmail.com', '2017-11-16 11:47:18', 'admin@gmail.com', '2017-11-16 11:48:04', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmregisterinterest`
--

CREATE TABLE `ictmregisterinterest` (
  `registerInterestId` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `surName` varchar(100) DEFAULT NULL,
  `House` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `hearAboutUs` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `disabilityRequire` varchar(45) DEFAULT NULL,
  `appointmentDate` datetime DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `inserDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmregisterinterest`
--

INSERT INTO `ictmregisterinterest` (`registerInterestId`, `title`, `firstName`, `surName`, `House`, `street`, `city`, `postalCode`, `country`, `mobile`, `email`, `course`, `hearAboutUs`, `other`, `disabilityRequire`, `appointmentDate`, `comments`, `inserDate`) VALUES
(3, '', 'sad', 'sad', 'asd', 'asd', 'asd', 'asd', NULL, '34234', 'md.saibm@gmail.com', NULL, NULL, 'asd', 'ads', '0000-00-00 00:00:00', 'sad', '2017-11-02'),
(4, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '234', 'md.sakib@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(5, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '324234', 'md.skib@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(6, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '324234', 'md.skib@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(7, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '34234', 'md.sakib@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(8, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '34234', 'md.sakib@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(9, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '34234', 'md.sakib@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(10, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '324', 'dfdsf@fg.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'dsf', '2017-11-02'),
(11, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '234234', 'fdjf@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(12, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '23424', 'md.sk@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(13, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '234534535', 'md.sakib@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(14, '', 'df', 'df', 'df', 'df', 'sfd', 'sdf', NULL, '2134234', 'md.sakib@gmail.com', NULL, NULL, 'sdf', 'sdf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(15, '', 'asd', 'asd', 'asd', 'ads', 'sdf', '234', NULL, '324234', 'dsf@gmail.com', NULL, NULL, 'dsfsdf', 'dssdfsdf', '0000-00-00 00:00:00', 'dsfsdf', '2017-11-02'),
(16, '', 'dsf', 'asf', 'asf', 'saf', 'sfd', '324', NULL, '324234', 'sdfsf@gmail.com', NULL, NULL, 'dsfsdf', 'sdfsf', '0000-00-00 00:00:00', 'sdf', '2017-11-02'),
(17, '', 'dsf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', NULL, '23424', 'md@gmail.com', NULL, NULL, 'dsf', 'sfd', '2017-11-30 17:42:00', 'dsfsdf', '2017-11-02'),
(18, '', 'asd', 'ads', 'dfg', 'dfgd', 'sdgf', '346546', NULL, '4356345', 'sdg@gmail.com', NULL, NULL, 'dsf', 'sdfsf', '2017-11-24 17:48:00', 'sdf', '2017-11-02'),
(20, '', 'dsfs', 'sdf', 'sf', 'sdf', 'sdfsf', '32442344', 'Bahrain', '342243', 'sdaf@gmail.com', 'BTEC HND in Health and Social Care', 'Whatuni', 'sdf', 'sdfsf', '2017-11-15 17:51:00', 'asdfsf', '2017-11-02'),
(21, '', 'sa', 'asd', 'asd', 'asd', 'ad', 'asd', 'Afghanistan', '32424', 'asd@gmail.com', 'BTEC Level 5 HND in Business', NULL, 'asd', 'ads', '2017-11-03 17:48:00', 'asd', '2017-11-03'),
(22, '', 'sa', 'asd', 'asd', 'asd', 'ad', 'asd', 'Afghanistan', '32424', 'asd@gmail.com', 'BTEC Level 5 HND in Business', NULL, 'asd', 'ads', '2017-11-03 17:48:00', 'asd', '2017-11-03'),
(23, '', 'dsf', 'sdf', 'sdf', 'sadf', 'sdf', 'sdf', 'Albania', '232323', 'sdf@gmai.com', 'BTEC Level 5 HND in Business', NULL, 'sdf', 'sfd', '2017-12-08 17:50:00', 'sdf', '2017-11-03'),
(24, 'Whatuni', 'sfsf', 'eweqwe', '434', 'dsfs', '345345', '4234', 'Bahrain', '45345', 'sdf@f.com', 'BTEC HND in Electrical and Electronic Engineering', 'Facebook', '445', 'eert', '2017-11-22 17:24:00', 'fdfgd', '2017-11-11'),
(25, 'Engr', 'sakib', 'rahman', '2342', 'sdkfjsf ', 'dhaka', '2323', 'Bangladesh', '243', 'md.sakib@gmail.com', 'BTEC Level 5 HND in Business', 'Other', 'sdffs', 'sfsf', '2017-11-11 17:19:00', 'sdf', '2017-11-11'),
(26, 'Mr', 'Rumi', 'Rumi', 'Rumi', 'Rumi', 'Rumi', '123', 'Bangladesh', '234', 'rumi@gmail.com', NULL, 'TV advert', 'sdfsdf', 'errwe', '2017-12-01 17:27:00', 'sdfsdf', '2017-11-11'),
(27, 'Mr', 'saifur', 'hasan', '45', 'aklsdjak', 'dhaka', '1000', 'Albania', '0171190', 'mujtaba.rumi@gmail.com', 'HND in Computing', 'Hotcourses', 'asdsdfs2758275', '35757275', '2017-11-17 15:12:00', 'ujkyurty', '2017-11-15'),
(28, 'Mr', 'Nahid', 'hasan', '45', 'aklsdjak', 'dhaka', '1000', 'American Samoa', '01711902', 'mujtaba.rumi@gmail.com', 'HND in Computing', 'Hotcourses', 'asdsdfs2758275', '35757275', '2017-11-25 15:16:00', 'dfghdf', '2017-11-15'),
(29, 'Mr', 'Nahid', 'hasan', '45', 'aklsdjak', 'dhaka', '1000', 'Aruba', '01711902', 'mujtaba.rumi@gmail.com', 'HND in Computing', 'Friends', 'asdsdfs2758275', '35757275', '2017-11-01 15:13:00', 'fsdefsf', '2017-11-15'),
(30, 'Mr', '54654', 'hasan', '45', 'aklsdjak', 'dhaka', '1000', 'Albania', '01711902', 'mujtaba.rumi@gmail.com', 'BTEC Level 5 HND in Business', 'Whatuni', 'asdsdfs2758275', '35757275', '1969-12-31 19:00:00', 'ghfghfg', '2017-11-15'),
(31, 'Mr', '54654', '56456', '45', 'aklsdjak', 'dhaka', '1000', 'Armenia', '01711902', 'mujtaba.rumi@gmail.com', 'BTEC Level 5 HND in Business', 'Metro Newspaper', 'asdsdfs2758275', '35757275', '1969-12-31 19:00:00', 'gdfgdfg', '2017-11-15'),
(32, 'Mr', 'Nahid', 'hasan', 'gdfg', 'aklsdjak', 'dhaka', '1000', 'Albania', '01711902', 'mujtaba.rumi@gmail.com', 'HND in Computing', 'Whatuni', 'asdsdfs2758275', '35757275', '2017-11-01 15:13:00', 'ghbfgfgh', '2017-11-15'),
(33, 'Doc', 'Rumi', 'Rumi', 'wewe', 'dffs', 'sdrser', 'weresr', 'Bangladesh', '34234', 'mujtaba.rumi@gmail.com', 'BTEC HND in Health and Social Care', 'Internet', 'rtrdtff', 'tdrt', '2017-12-02 08:32:00', 'jvghgvhhj', '2017-11-15'),
(34, 'Mr', 'jhj', 'kj', 'ljk,', 'klj', 'klj', '123', 'Angola', '121231', 'md.sa@gmail.com', 'BTEC Level 5 HND in Business', 'Whatuni', 'kjnkj', 'hj', '2017-11-30 21:34:00', 'jhgjhg jhg h', '2017-11-25'),
(35, 'Miss', 'dfgd', 'rter', 'etegdfgd', 'dfgert', 'dfgete', 'drteter', 'Bangladesh', '054684', 'dfg@j.com', 'BTEC Level 5 HND in Business', NULL, 'tyrt', 'fghfhf', '2017-11-15 21:35:00', 'yutfuy', '2017-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `ictmrole`
--

CREATE TABLE `ictmrole` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(45) DEFAULT NULL,
  `roleDesc` varchar(45) DEFAULT NULL,
  `insertedBy` varchar(50) DEFAULT NULL,
  `insertedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `lastModifiedBy` varchar(50) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `roleStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmrole`
--

INSERT INTO `ictmrole` (`roleId`, `roleName`, `roleDesc`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `roleStatus`) VALUES
(1, 'Admin', 'web admin', '1', '2017-08-07 00:00:00', '1', '2017-08-07 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmunitsection`
--

CREATE TABLE `ictmunitsection` (
  `UnitSectionId` int(11) NOT NULL,
  `courseUnitd` int(11) NOT NULL,
  `UnitSectionTitle` varchar(255) DEFAULT NULL,
  `UnitSectionContent` longtext,
  `UnitSectionImage` varchar(255) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `unitSectionStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ictmusers`
--

CREATE TABLE `ictmusers` (
  `userId` int(11) NOT NULL,
  `roleId` int(11) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `userPassword` varchar(45) DEFAULT NULL,
  `userTitle` varchar(45) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `surName` varchar(100) DEFAULT NULL,
  `jobTitle` varchar(100) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `usersStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ictmusers`
--

INSERT INTO `ictmusers` (`userId`, `roleId`, `userEmail`, `userPassword`, `userTitle`, `firstName`, `surName`, `jobTitle`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `usersStatus`) VALUES
(2, 1, 'admin@gmail.com', '$2y$10$Hh21S0bFFtKf0oRS3vfygOvOkkEcJVu15QRLvJ', 'admin', 'Admin admin', 'admin', 'web developer', 1, '2017-08-07 00:00:00', 0, '2017-08-07 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `languagetestheads`
--

CREATE TABLE `languagetestheads` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languagetests`
--

CREATE TABLE `languagetests` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personalcontacts`
--

CREATE TABLE `personalcontacts` (
  `fkCandidateId` int(11) NOT NULL,
  `fkContactTypeId` tinyint(4) NOT NULL,
  `contactNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personequalopportunity`
--

CREATE TABLE `personequalopportunity` (
  `fkCandidateId` int(11) NOT NULL,
  `fkEqualOpportunitySubGroupId` int(11) NOT NULL,
  `otherText` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personexperience`
--

CREATE TABLE `personexperience` (
  `id` int(11) NOT NULL,
  `fkCandidateId` int(11) NOT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `positionHeld` varchar(100) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personqualifications`
--

CREATE TABLE `personqualifications` (
  `id` int(11) NOT NULL,
  `fkCandidateId` int(11) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `obtainResult` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentregistration`
--

CREATE TABLE `studentregistration` (
  `id` int(11) NOT NULL,
  `type` varchar(11) DEFAULT NULL,
  `title` varchar(11) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visatype`
--

CREATE TABLE `visatype` (
  `id` int(11) NOT NULL,
  `visaTypetitle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadidatelanguagetestscores`
--
ALTER TABLE `cadidatelanguagetestscores`
  ADD UNIQUE KEY `uk_candidateLanguageTest` (`fkCandidateTestId`,`fkTestHeadId`),
  ADD KEY `fk_candidateLanugageTestScoreHeadId` (`fkTestHeadId`);

--
-- Indexes for table `candidateinfo`
--
ALTER TABLE `candidateinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidatelanguagetest`
--
ALTER TABLE `candidatelanguagetest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_candidateLanguageTestCandidateId` (`fkCandidateId`),
  ADD KEY `fk_candidateLanguageTestTestId` (`fkTestId`);

--
-- Indexes for table `candidatereferees`
--
ALTER TABLE `candidatereferees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_candidateRefereesCandidateId` (`fkCandidateId`);

--
-- Indexes for table `contacttype`
--
ALTER TABLE `contacttype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contactTitle` (`contactTitle`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courseDetailsCandidateId` (`fkCandidateId`);

--
-- Indexes for table `equalopportunitygroup`
--
ALTER TABLE `equalopportunitygroup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `opportunityTitle` (`opportunityTitle`);

--
-- Indexes for table `equalopportunitysubgroup`
--
ALTER TABLE `equalopportunitysubgroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_equalOpportunitySubgroupGroupId` (`fkGroupId`);

--
-- Indexes for table `financer`
--
ALTER TABLE `financer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_financerCandidateId` (`fkCandidateId`);

--
-- Indexes for table `ictmaffiliations`
--
ALTER TABLE `ictmaffiliations`
  ADD PRIMARY KEY (`AffiliationsId`);

--
-- Indexes for table `ictmalbum`
--
ALTER TABLE `ictmalbum`
  ADD PRIMARY KEY (`albumId`);

--
-- Indexes for table `ictmcollegeinfo`
--
ALTER TABLE `ictmcollegeinfo`
  ADD PRIMARY KEY (`collegeInfoId`);

--
-- Indexes for table `ictmcontactus`
--
ALTER TABLE `ictmcontactus`
  ADD PRIMARY KEY (`contactUsId`);

--
-- Indexes for table `ictmcourse`
--
ALTER TABLE `ictmcourse`
  ADD PRIMARY KEY (`courseId`),
  ADD KEY `fk_ictmCourse_ictmDepartment1_idx` (`departmentId`);

--
-- Indexes for table `ictmcoursesection`
--
ALTER TABLE `ictmcoursesection`
  ADD PRIMARY KEY (`courseSectionId`),
  ADD KEY `fk_ictmCourseSection_ictmCourse1_idx` (`courseId`);

--
-- Indexes for table `ictmcourseunits`
--
ALTER TABLE `ictmcourseunits`
  ADD PRIMARY KEY (`courseUnitd`),
  ADD KEY `fk_ictmCurseUnits_ictmCourse1_idx` (`courseId`);

--
-- Indexes for table `ictmdepartment`
--
ALTER TABLE `ictmdepartment`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `ictmevent`
--
ALTER TABLE `ictmevent`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `ictmfaculty`
--
ALTER TABLE `ictmfaculty`
  ADD PRIMARY KEY (`facultyId`);

--
-- Indexes for table `ictmfacultycontact`
--
ALTER TABLE `ictmfacultycontact`
  ADD PRIMARY KEY (`facultyContactId`),
  ADD KEY `fk_ictmFacultyContact_ictmFaculty1_idx` (`facultyId`);

--
-- Indexes for table `ictmfacultycourse`
--
ALTER TABLE `ictmfacultycourse`
  ADD PRIMARY KEY (`facultyCourseId`),
  ADD KEY `fk_ictmFacultyCourse_ictmFaculty1_idx` (`facultyId`),
  ADD KEY `fk_ictmFacultyCourse_ictmCourse1_idx` (`courseId`);

--
-- Indexes for table `ictmfeedback`
--
ALTER TABLE `ictmfeedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `ictmhome`
--
ALTER TABLE `ictmhome`
  ADD PRIMARY KEY (`homeId`);

--
-- Indexes for table `ictmmenu`
--
ALTER TABLE `ictmmenu`
  ADD PRIMARY KEY (`menuId`),
  ADD KEY `fk_ictmMenu_ictmPage_idx` (`pageId`);

--
-- Indexes for table `ictmnews`
--
ALTER TABLE `ictmnews`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `ictmnotices`
--
ALTER TABLE `ictmnotices`
  ADD PRIMARY KEY (`noticeId`);

--
-- Indexes for table `ictmpage`
--
ALTER TABLE `ictmpage`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `ictmpagesection`
--
ALTER TABLE `ictmpagesection`
  ADD PRIMARY KEY (`pageSectionId`),
  ADD KEY `fk_ictmPageSection_ictmPage1_idx` (`pageId`);

--
-- Indexes for table `ictmphoto`
--
ALTER TABLE `ictmphoto`
  ADD PRIMARY KEY (`photoId`),
  ADD KEY `fk_ictmPhoto_ictmAlbum` (`albumId`);

--
-- Indexes for table `ictmregisterinterest`
--
ALTER TABLE `ictmregisterinterest`
  ADD PRIMARY KEY (`registerInterestId`);

--
-- Indexes for table `ictmrole`
--
ALTER TABLE `ictmrole`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `ictmunitsection`
--
ALTER TABLE `ictmunitsection`
  ADD PRIMARY KEY (`UnitSectionId`),
  ADD KEY `fk_unitSection_ictmCurseUnits1_idx` (`courseUnitd`);

--
-- Indexes for table `ictmusers`
--
ALTER TABLE `ictmusers`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `fk_ictmUsers_ictmRole1_idx` (`roleId`);

--
-- Indexes for table `languagetestheads`
--
ALTER TABLE `languagetestheads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `languagetests`
--
ALTER TABLE `languagetests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `personalcontacts`
--
ALTER TABLE `personalcontacts`
  ADD KEY `fk_personalContactsCandidateId` (`fkCandidateId`),
  ADD KEY `fk_personalContactsContactType` (`fkContactTypeId`);

--
-- Indexes for table `personequalopportunity`
--
ALTER TABLE `personequalopportunity`
  ADD UNIQUE KEY `uk_PersonEqualOpportunity` (`fkCandidateId`,`fkEqualOpportunitySubGroupId`),
  ADD KEY `fk_PersonEqualOpportunitySubgroupId` (`fkEqualOpportunitySubGroupId`);

--
-- Indexes for table `personexperience`
--
ALTER TABLE `personexperience`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_personExperience` (`fkCandidateId`,`organization`,`positionHeld`);

--
-- Indexes for table `personqualifications`
--
ALTER TABLE `personqualifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_personQualifications` (`fkCandidateId`,`qualification`);

--
-- Indexes for table `studentregistration`
--
ALTER TABLE `studentregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visatype`
--
ALTER TABLE `visatype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visaTypetitle` (`visaTypetitle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidateinfo`
--
ALTER TABLE `candidateinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `candidatelanguagetest`
--
ALTER TABLE `candidatelanguagetest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `candidatereferees`
--
ALTER TABLE `candidatereferees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacttype`
--
ALTER TABLE `contacttype`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coursedetails`
--
ALTER TABLE `coursedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equalopportunitygroup`
--
ALTER TABLE `equalopportunitygroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equalopportunitysubgroup`
--
ALTER TABLE `equalopportunitysubgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `financer`
--
ALTER TABLE `financer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ictmaffiliations`
--
ALTER TABLE `ictmaffiliations`
  MODIFY `AffiliationsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ictmalbum`
--
ALTER TABLE `ictmalbum`
  MODIFY `albumId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ictmcollegeinfo`
--
ALTER TABLE `ictmcollegeinfo`
  MODIFY `collegeInfoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ictmcontactus`
--
ALTER TABLE `ictmcontactus`
  MODIFY `contactUsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ictmcourse`
--
ALTER TABLE `ictmcourse`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `ictmcoursesection`
--
ALTER TABLE `ictmcoursesection`
  MODIFY `courseSectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `ictmcourseunits`
--
ALTER TABLE `ictmcourseunits`
  MODIFY `courseUnitd` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ictmdepartment`
--
ALTER TABLE `ictmdepartment`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ictmevent`
--
ALTER TABLE `ictmevent`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ictmfaculty`
--
ALTER TABLE `ictmfaculty`
  MODIFY `facultyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ictmfacultycontact`
--
ALTER TABLE `ictmfacultycontact`
  MODIFY `facultyContactId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ictmfacultycourse`
--
ALTER TABLE `ictmfacultycourse`
  MODIFY `facultyCourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ictmfeedback`
--
ALTER TABLE `ictmfeedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ictmhome`
--
ALTER TABLE `ictmhome`
  MODIFY `homeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ictmmenu`
--
ALTER TABLE `ictmmenu`
  MODIFY `menuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `ictmnews`
--
ALTER TABLE `ictmnews`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ictmnotices`
--
ALTER TABLE `ictmnotices`
  MODIFY `noticeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ictmpage`
--
ALTER TABLE `ictmpage`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `ictmpagesection`
--
ALTER TABLE `ictmpagesection`
  MODIFY `pageSectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `ictmphoto`
--
ALTER TABLE `ictmphoto`
  MODIFY `photoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `ictmregisterinterest`
--
ALTER TABLE `ictmregisterinterest`
  MODIFY `registerInterestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `ictmrole`
--
ALTER TABLE `ictmrole`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ictmunitsection`
--
ALTER TABLE `ictmunitsection`
  MODIFY `UnitSectionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ictmusers`
--
ALTER TABLE `ictmusers`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `languagetestheads`
--
ALTER TABLE `languagetestheads`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languagetests`
--
ALTER TABLE `languagetests`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personexperience`
--
ALTER TABLE `personexperience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personqualifications`
--
ALTER TABLE `personqualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentregistration`
--
ALTER TABLE `studentregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visatype`
--
ALTER TABLE `visatype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cadidatelanguagetestscores`
--
ALTER TABLE `cadidatelanguagetestscores`
  ADD CONSTRAINT `fk_candidateLanguagetestScoresTestId` FOREIGN KEY (`fkCandidateTestId`) REFERENCES `candidatelanguagetest` (`id`),
  ADD CONSTRAINT `fk_candidateLanugageTestScoreHeadId` FOREIGN KEY (`fkTestHeadId`) REFERENCES `languagetestheads` (`id`);

--
-- Constraints for table `candidatelanguagetest`
--
ALTER TABLE `candidatelanguagetest`
  ADD CONSTRAINT `fk_candidateLanguageTestCandidateId` FOREIGN KEY (`fkCandidateId`) REFERENCES `candidateinfo` (`id`),
  ADD CONSTRAINT `fk_candidateLanguageTestTestId` FOREIGN KEY (`fkTestId`) REFERENCES `languagetests` (`id`);

--
-- Constraints for table `candidatereferees`
--
ALTER TABLE `candidatereferees`
  ADD CONSTRAINT `fk_candidateRefereesCandidateId` FOREIGN KEY (`fkCandidateId`) REFERENCES `candidateinfo` (`id`);

--
-- Constraints for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD CONSTRAINT `fk_courseDetailsCandidateId` FOREIGN KEY (`fkCandidateId`) REFERENCES `candidateinfo` (`id`);

--
-- Constraints for table `equalopportunitysubgroup`
--
ALTER TABLE `equalopportunitysubgroup`
  ADD CONSTRAINT `fk_equalOpportunitySubgroupGroupId` FOREIGN KEY (`fkGroupId`) REFERENCES `equalopportunitygroup` (`id`);

--
-- Constraints for table `financer`
--
ALTER TABLE `financer`
  ADD CONSTRAINT `fk_financerCandidateId` FOREIGN KEY (`fkCandidateId`) REFERENCES `candidateinfo` (`id`);

--
-- Constraints for table `ictmcourseunits`
--
ALTER TABLE `ictmcourseunits`
  ADD CONSTRAINT `fk_ictmCurseUnits_ictmCourse1` FOREIGN KEY (`courseId`) REFERENCES `ictmcourse` (`courseId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictmfacultycontact`
--
ALTER TABLE `ictmfacultycontact`
  ADD CONSTRAINT `fk_ictmFacultyContact_ictmFaculty1` FOREIGN KEY (`facultyId`) REFERENCES `ictmfaculty` (`facultyId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictmfacultycourse`
--
ALTER TABLE `ictmfacultycourse`
  ADD CONSTRAINT `fk_ictmFacultyCourse_ictmCourse1` FOREIGN KEY (`courseId`) REFERENCES `ictmcourse` (`courseId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ictmFacultyCourse_ictmFaculty1` FOREIGN KEY (`facultyId`) REFERENCES `ictmfaculty` (`facultyId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictmmenu`
--
ALTER TABLE `ictmmenu`
  ADD CONSTRAINT `fk_ictmMenu_ictmPage` FOREIGN KEY (`pageId`) REFERENCES `ictmpage` (`pageId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictmpagesection`
--
ALTER TABLE `ictmpagesection`
  ADD CONSTRAINT `fk_ictmPageSection_ictmPage1` FOREIGN KEY (`pageId`) REFERENCES `ictmpage` (`pageId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictmphoto`
--
ALTER TABLE `ictmphoto`
  ADD CONSTRAINT `fk_ictmPhoto_ictmAlbum` FOREIGN KEY (`albumId`) REFERENCES `ictmalbum` (`albumId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictmunitsection`
--
ALTER TABLE `ictmunitsection`
  ADD CONSTRAINT `fk_unitSection_ictmCurseUnits1` FOREIGN KEY (`courseUnitd`) REFERENCES `ictmcourseunits` (`courseUnitd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictmusers`
--
ALTER TABLE `ictmusers`
  ADD CONSTRAINT `fk_ictmUsers_ictmRole1` FOREIGN KEY (`roleId`) REFERENCES `ictmrole` (`roleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `personalcontacts`
--
ALTER TABLE `personalcontacts`
  ADD CONSTRAINT `fk_personalContactsCandidateId` FOREIGN KEY (`fkCandidateId`) REFERENCES `candidateinfo` (`id`),
  ADD CONSTRAINT `fk_personalContactsContactType` FOREIGN KEY (`fkContactTypeId`) REFERENCES `contacttype` (`id`);

--
-- Constraints for table `personequalopportunity`
--
ALTER TABLE `personequalopportunity`
  ADD CONSTRAINT `fk_PersonEqualOpportunityCadidateId` FOREIGN KEY (`fkCandidateId`) REFERENCES `candidateinfo` (`id`),
  ADD CONSTRAINT `fk_PersonEqualOpportunitySubgroupId` FOREIGN KEY (`fkEqualOpportunitySubGroupId`) REFERENCES `equalopportunitysubgroup` (`id`);

--
-- Constraints for table `personexperience`
--
ALTER TABLE `personexperience`
  ADD CONSTRAINT `fk_personExperienceCadidateId` FOREIGN KEY (`fkCandidateId`) REFERENCES `candidateinfo` (`id`);

--
-- Constraints for table `personqualifications`
--
ALTER TABLE `personqualifications`
  ADD CONSTRAINT `fk_personQualificationsCadidateId` FOREIGN KEY (`fkCandidateId`) REFERENCES `candidateinfo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
