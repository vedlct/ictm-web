-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2017 at 08:52 AM
-- Server version: 10.1.24-MariaDB-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sakibrahman_ictm`
--

-- --------------------------------------------------------

--
-- Table structure for table `ictmaffiliations`
--

CREATE TABLE IF NOT EXISTS `ictmaffiliations` (
  `AffiliationsId` int(11) NOT NULL AUTO_INCREMENT,
  `AffiliationsDetails` longtext,
  `AffiliationsPhotoPath` varchar(255) DEFAULT NULL,
  `InsertedBy` varchar(255) DEFAULT NULL,
  `InsertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(255) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `affiliationsStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`AffiliationsId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmcollegeinfo`
--

CREATE TABLE IF NOT EXISTS `ictmcollegeinfo` (
  `collegeInfoId` int(11) NOT NULL AUTO_INCREMENT,
  `collegeName` varchar(45) DEFAULT NULL,
  `collegeDomain` varchar(45) DEFAULT NULL,
  `collegeAddress` varchar(45) DEFAULT NULL,
  `collegeTelephone1` varchar(45) DEFAULT NULL,
  `collegeTelephone2` varchar(45) DEFAULT NULL,
  `collegeFax` varchar(255) DEFAULT NULL,
  `collegeFacebook` varchar(255) DEFAULT NULL,
  `collegeTwitter` varchar(45) DEFAULT NULL,
  `collegeLinkedIn` varchar(45) DEFAULT NULL,
  `collegeGoogle` varchar(45) DEFAULT NULL,
  `collegeYoutube` varchar(45) DEFAULT NULL,
  `InsertedBy` int(11) DEFAULT NULL,
  `InsertedDate` varchar(45) DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` varchar(45) DEFAULT NULL,
  `collegeInfoStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`collegeInfoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmcontactus`
--

CREATE TABLE IF NOT EXISTS `ictmcontactus` (
  `contactUsId` int(11) NOT NULL AUTO_INCREMENT,
  `contactUsname` varchar(45) DEFAULT NULL,
  `contactUsEmain` varchar(100) DEFAULT NULL,
  `contactUsSubject` varchar(255) DEFAULT NULL,
  `contactUsMessage` longtext,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `contactUsStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`contactUsId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmcourse`
--

CREATE TABLE IF NOT EXISTS `ictmcourse` (
  `courseId` int(11) NOT NULL AUTO_INCREMENT,
  `departmentId` int(11) DEFAULT NULL,
  `courseCodePearson` varchar(100) DEFAULT NULL,
  `courseCodeIcon` varchar(100) DEFAULT NULL,
  `ucasCode` varchar(100) DEFAULT NULL,
  `courseTitle` varchar(255) NOT NULL,
  `awardingTitle` varchar(255) DEFAULT NULL,
  `awardingBody` varchar(255) DEFAULT NULL,
  `accreditationType` varchar(45) DEFAULT NULL,
  `accreditationNumber` varchar(45) DEFAULT NULL,
  `courseDuration` int(11) DEFAULT NULL,
  `creditValue` int(11) DEFAULT NULL,
  `courseStructutre` varchar(255) DEFAULT NULL,
  `studyMode` varchar(100) DEFAULT NULL,
  `studyLanguage` varchar(100) DEFAULT NULL,
  `academicYear` varchar(100) DEFAULT NULL,
  `courseFees` int(11) DEFAULT NULL,
  `couseLocation` varchar(100) DEFAULT NULL,
  `timeTable` varchar(255) DEFAULT NULL,
  `courseStatus` varchar(255) DEFAULT NULL,
  `courseImage` varchar(255) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`courseId`),
  KEY `fk_ictmCourse_ictmDepartment1_idx` (`departmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ictmcourse`
--

INSERT INTO `ictmcourse` (`courseId`, `departmentId`, `courseCodePearson`, `courseCodeIcon`, `ucasCode`, `courseTitle`, `awardingTitle`, `awardingBody`, `accreditationType`, `accreditationNumber`, `courseDuration`, `creditValue`, `courseStructutre`, `studyMode`, `studyLanguage`, `academicYear`, `courseFees`, `couseLocation`, `timeTable`, `courseStatus`, `courseImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`) VALUES
(4, 1, NULL, NULL, NULL, 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, NULL, NULL, NULL, 'Bangla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, NULL, NULL, NULL, 'Urdu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ictmcoursesection`
--

CREATE TABLE IF NOT EXISTS `ictmcoursesection` (
  `courseSectionId` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `courseSectionTitle` varchar(255) DEFAULT NULL,
  `courseSectionContent` longtext,
  `courseSectionImage` varchar(255) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `courseSectionStatus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`courseSectionId`),
  KEY `fk_ictmCourseSection_ictmCourse1_idx` (`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmcourseunits`
--

CREATE TABLE IF NOT EXISTS `ictmcourseunits` (
  `courseUnitd` int(11) NOT NULL AUTO_INCREMENT,
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
  `courseUnitsStatus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`courseUnitd`),
  KEY `fk_ictmCurseUnits_ictmCourse1_idx` (`courseId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmdepartment`
--

CREATE TABLE IF NOT EXISTS `ictmdepartment` (
  `departmentId` int(11) NOT NULL AUTO_INCREMENT,
  `departmentName` varchar(255) DEFAULT NULL,
  `departmentHead` varchar(100) DEFAULT NULL,
  `departmentSummary` mediumtext,
  `insertedBy` varchar(50) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(50) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `departmentStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`departmentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ictmdepartment`
--

INSERT INTO `ictmdepartment` (`departmentId`, `departmentName`, `departmentHead`, `departmentSummary`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `departmentStatus`) VALUES
(1, 'qweqw', 'qweqw', '<p>qweqw</p>\r\n', 'rumi@gmail.com', '2017-08-16 12:31:42', NULL, NULL, 'Active'),
(2, 'ada', 'ad', '<p>asda</p>\r\n', 'rumi@gmail.com', '2017-08-16 12:32:38', NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmevent`
--

CREATE TABLE IF NOT EXISTS `ictmevent` (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `eventTitle` varchar(255) DEFAULT NULL,
  `eventStartDate` datetime DEFAULT NULL,
  `eventEndDate` datetime DEFAULT NULL,
  `eventLocation` varchar(45) DEFAULT NULL,
  `eventContent` mediumtext,
  `eventPhotoPath` varchar(100) DEFAULT NULL,
  `eventType` varchar(45) DEFAULT NULL,
  `insertedBy` varchar(50) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(50) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `eventStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`eventId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ictmevent`
--

INSERT INTO `ictmevent` (`eventId`, `eventTitle`, `eventStartDate`, `eventEndDate`, `eventLocation`, `eventContent`, `eventPhotoPath`, `eventType`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `eventStatus`) VALUES
(14, 'New Event', '2018-01-01 19:44:00', '2017-08-30 10:45:00', 'xxxcxcxcv', '<p>asdasdweqwe</p>\r\n', 'rsz_img_1414.jpg', 'asdasd', 'rumi@gmail.com', '2017-08-16 10:45:45', 'rumi@gmail.com', '2017-08-16 10:46:09', 'Active'),
(15, 'New Event 2', '2017-12-01 15:46:00', '2017-06-03 15:46:00', 'sadasd', '<p>aaa</p>\r\n', 'magic_ball_library_columns_castle_63093_1920x1080.jpg', 'asdasd', 'rumi@gmail.com', '2017-08-16 10:46:53', 'rumi@gmail.com', '2017-08-16 11:04:17', 'InActive'),
(16, 'asd', '2017-08-17 12:59:00', '2017-08-17 12:59:00', 'asds', '<p>asd</p>\r\n', 'magic_ball_library_columns_castle_63093_1920x1080.jpg', 'Seminar', 'rumi@gmail.com', '2017-08-17 07:59:46', NULL, NULL, 'Active'),
(17, 'adds', '1970-01-01 01:00:00', '1970-01-01 01:00:00', 'asd', '<p>asd</p>\r\n', 'rsz_img_1414.jpg', 'Training', 'rumi@gmail.com', '2017-08-17 09:07:00', 'rumi@gmail.com', '2017-08-17 09:07:14', 'Active'),
(18, 'asdads', '2017-08-17 15:49:00', '2017-08-17 15:49:00', 'adasd', '<p>asdasdasdw<img alt="" src="/ictm-web/dev/public/ckeditor/kcfinder/upload/images/1-Vpk_qBCr1cDRpLv8SNv3oQ.jpeg" style="height:200px; width:356px" /></p>\r\n', 'magic_ball_library_columns_castle_63093_1920x1080.jpg', 'Training', 'rumi@gmail.com', '2017-08-17 11:09:24', NULL, NULL, 'InActive');

-- --------------------------------------------------------

--
-- Table structure for table `ictmfaculty`
--

CREATE TABLE IF NOT EXISTS `ictmfaculty` (
  `facultyId` int(11) NOT NULL AUTO_INCREMENT,
  `facultyFirstName` varchar(100) DEFAULT NULL,
  `facultyLastName` varchar(100) DEFAULT NULL,
  `facultyDegree` varchar(255) DEFAULT NULL,
  `facultyPosition` varchar(255) DEFAULT NULL,
  `facultyEmpType` varchar(100) DEFAULT NULL,
  `facultyEmail` varchar(100) DEFAULT NULL,
  `faultyPhone` varchar(45) DEFAULT NULL,
  `facultyTwitter` varchar(100) DEFAULT NULL,
  `facultyLinkedIn` varchar(255) DEFAULT NULL,
  `facultyIntro` mediumtext,
  `facultyImage` varchar(255) DEFAULT NULL,
  `insertedBy` varchar(50) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(50) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `facultyStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`facultyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ictmfaculty`
--

INSERT INTO `ictmfaculty` (`facultyId`, `facultyFirstName`, `facultyLastName`, `facultyDegree`, `facultyPosition`, `facultyEmpType`, `facultyEmail`, `faultyPhone`, `facultyTwitter`, `facultyLinkedIn`, `facultyIntro`, `facultyImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `facultyStatus`) VALUES
(16, 'Nurun', 'Nabi', 'BCom Honours, M.Com,MBA(Henley at Oxon), PhD, FInstLM(Lond), MPDSE', 'PRINCIPAL', 'Full Time', 'nurunnabi@gmail.com', '01680000000', '', '', '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n\r\n<p>To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure.</p>\r\n', 'magic_ball_library_columns_castle_63093_1920x1080.jpg', 'rumi@gmail.com', '2017-08-14 06:15:53', 'rumi@gmail.com', '2017-08-14 06:18:31', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmfacultycontact`
--

CREATE TABLE IF NOT EXISTS `ictmfacultycontact` (
  `facultyContactId` int(11) NOT NULL AUTO_INCREMENT,
  `facultyId` int(11) NOT NULL,
  `visitorName` varchar(45) DEFAULT NULL,
  `visitorInterest` varchar(45) DEFAULT NULL,
  `visitorEmail` varchar(45) DEFAULT NULL,
  `visitorPhone` varchar(45) DEFAULT NULL,
  `visitorEnquary` varchar(45) DEFAULT NULL,
  `inserDate` date DEFAULT NULL,
  PRIMARY KEY (`facultyContactId`),
  KEY `fk_ictmFacultyContact_ictmFaculty1_idx` (`facultyId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmfacultycourse`
--

CREATE TABLE IF NOT EXISTS `ictmfacultycourse` (
  `facultyCourseId` int(11) NOT NULL AUTO_INCREMENT,
  `facultyId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  PRIMARY KEY (`facultyCourseId`),
  KEY `fk_ictmFacultyCourse_ictmFaculty1_idx` (`facultyId`),
  KEY `fk_ictmFacultyCourse_ictmCourse1_idx` (`courseId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `ictmfacultycourse`
--

INSERT INTO `ictmfacultycourse` (`facultyCourseId`, `facultyId`, `courseId`) VALUES
(28, 16, 4),
(33, 16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ictmfeedback`
--

CREATE TABLE IF NOT EXISTS `ictmfeedback` (
  `feedbackId` int(11) NOT NULL AUTO_INCREMENT,
  `feedbackDetails` varchar(100) DEFAULT NULL,
  `feedbackName` varchar(45) DEFAULT NULL,
  `feedbackPhotePath` varchar(100) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `feedbackStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`feedbackId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmhome`
--

CREATE TABLE IF NOT EXISTS `ictmhome` (
  `homeId` int(11) NOT NULL AUTO_INCREMENT,
  `homeTitle` varchar(100) DEFAULT NULL,
  `homeDetails` mediumtext,
  `homePhotoPath` varchar(255) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `homeStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`homeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmmenu`
--

CREATE TABLE IF NOT EXISTS `ictmmenu` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) DEFAULT NULL,
  `pageId` int(11) DEFAULT NULL,
  `menuName` varchar(100) DEFAULT NULL,
  `menuType` varchar(45) DEFAULT NULL,
  `insertedBy` varchar(50) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(50) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `menuStatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menuId`),
  KEY `fk_ictmMenu_ictmPage_idx` (`pageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `ictmmenu`
--

INSERT INTO `ictmmenu` (`menuId`, `parentId`, `pageId`, `menuName`, `menuType`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `menuStatus`) VALUES
(49, NULL, NULL, 'About', 'MainMenu', 'admin@gmail.com', '2017-08-20 07:50:55', NULL, NULL, 'Active'),
(50, NULL, NULL, 'Courses', 'MainMenu', 'admin@gmail.com', '2017-08-20 07:51:09', NULL, NULL, 'Active'),
(51, NULL, NULL, 'Admission', 'MainMenu', 'admin@gmail.com', '2017-08-20 07:51:24', NULL, NULL, 'Active'),
(52, NULL, NULL, 'College Life', 'MainMenu', 'admin@gmail.com', '2017-08-20 07:51:49', NULL, NULL, 'Active'),
(53, NULL, NULL, 'News & Events', 'MainMenu', 'admin@gmail.com', '2017-08-20 07:52:09', NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmnews`
--

CREATE TABLE IF NOT EXISTS `ictmnews` (
  `newsId` int(11) NOT NULL AUTO_INCREMENT,
  `newsTitle` varchar(255) DEFAULT NULL,
  `newsPhoto` varchar(255) DEFAULT NULL,
  `newsContent` mediumtext,
  `newsDate` datetime DEFAULT NULL,
  `newsType` varchar(45) DEFAULT NULL,
  `insertedBy` varchar(50) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(50) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `newsStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ictmnews`
--

INSERT INTO `ictmnews` (`newsId`, `newsTitle`, `newsPhoto`, `newsContent`, `newsDate`, `newsType`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `newsStatus`) VALUES
(11, 'ad', 'rsz_img_1414.jpg', '<p>asd</p>\r\n', '2017-08-17 12:46:00', 'News', 'rumi@gmail.com', '2017-08-17 07:46:58', 'rumi@gmail.com', '2017-08-17 08:12:41', 'InActive'),
(14, 'asasd', 'magic_ball_library_columns_castle_63093_1920x1080.jpg', '<p>asdzx</p>\r\n', '1970-01-01 01:00:00', 'Press Release', 'rumi@gmail.com', '2017-08-17 09:07:40', 'rumi@gmail.com', '2017-08-17 09:07:58', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmnotices`
--

CREATE TABLE IF NOT EXISTS `ictmnotices` (
  `noticeId` int(11) NOT NULL AUTO_INCREMENT,
  `noticeTitle` varchar(255) DEFAULT NULL,
  `noticeContent` mediumtext,
  `noticeDate` datetime DEFAULT NULL,
  `noticeType` varchar(45) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `noticeStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`noticeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmpage`
--

CREATE TABLE IF NOT EXISTS `ictmpage` (
  `pageId` int(11) NOT NULL AUTO_INCREMENT,
  `pageTitle` varchar(255) DEFAULT NULL,
  `pageKeywords` varchar(255) DEFAULT NULL,
  `pageMetaData` varchar(255) DEFAULT NULL,
  `pageType` varchar(45) DEFAULT NULL,
  `pageContent` longtext,
  `pageImage` varchar(255) DEFAULT NULL,
  `insertedBy` varchar(50) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(50) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `pageStatus` varchar(100) DEFAULT NULL,
  `approvedBy` varchar(100) DEFAULT NULL,
  `publishingDate` datetime DEFAULT NULL,
  PRIMARY KEY (`pageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `ictmpage`
--

INSERT INTO `ictmpage` (`pageId`, `pageTitle`, `pageKeywords`, `pageMetaData`, `pageType`, `pageContent`, `pageImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `pageStatus`, `approvedBy`, `publishingDate`) VALUES
(22, 'Welcome to Icon College', 'Welcome,Icon College', 'Welcome,Icon College', 'Health Type', '', '002.jpg', 'admin@gmail.com', '2017-08-20 07:53:23', 'admin@gmail.com', '2017-08-26 13:49:07', 'InActive', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ictmpagesection`
--

CREATE TABLE IF NOT EXISTS `ictmpagesection` (
  `pageSectionId` int(11) NOT NULL AUTO_INCREMENT,
  `pageId` int(11) NOT NULL,
  `pageSectionTitle` varchar(255) DEFAULT NULL,
  `pageSectionContent` longtext,
  `pageSectionImage` varchar(255) DEFAULT NULL,
  `insertedBy` varchar(255) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(50) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `pageSectionStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pageSectionId`),
  KEY `fk_ictmPageSection_ictmPage1_idx` (`pageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `ictmpagesection`
--

INSERT INTO `ictmpagesection` (`pageSectionId`, `pageId`, `pageSectionTitle`, `pageSectionContent`, `pageSectionImage`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `pageSectionStatus`) VALUES
(23, 22, 'Our Vision & Mission', '<p>ICON College of Technology and Management was established to meet the demand for quality education at an affordable price and to make world-class UK university degrees more accessible to UK and international students. To satisfy this demand, the College seeks to prepare students for effective and profitable roles in their choice of careers and to offer a cultural experience which will aid them in taking their place as productive members of society at minimum cost with no compromise of quality. Indeed, we pride ourselves on providing maximum support to ensure that students reach their full potential.</p>\r\n\r\n<p>The curriculum of our programmes is designed to prepare students to cope with changing business conditions and to present both theoretical and practical approaches to the diverse needs of the ever changing global economy. In support of this goal, the College is supported by faculty staff selected from wide ranging appropriate academic disciplines and from the professional community, on the basis of their knowledge, teaching skills and practical experience.</p>\r\n\r\n<p>While academic learning contributes to one&#39;s knowledge of specific subject matter, managerial success depends as well on an individual&#39;s ability to analyse, to plan and to venture. The College mixes the analytical approach with independent assignments, case studies and practical training. Lectures are combined with discussion, oral presentations, creative projects and teamwork.</p>\r\n\r\n<p>The aim of the College is not just to equip graduates with knowledge and skills to deal with the exacting standards of the twenty-first century and the pursuit of excellence, we go far further than that: we develop the skills and attitudes to ensure that individuals have enjoyable and fulfilling careers and therefore a happy life in the service of society and isn&#39;t that what education is about?</p>\r\n\r\n<p>The College is committed to expanding access to higher education to those sections of the community historically (and currently) underrepresented in the sector. This commitment to widening participation is reflected in the demography of our student body: the College is proud that the vast majority of or students are mature, many of whom having been out of education for a considerable period of time, are from Black and Minority Ethnic Communities, and come from lower socio-economic backgrounds.</p>\r\n', NULL, 'admin@gmail.com', '2017-08-20 07:56:30', 'admin@gmail.com', '2017-08-23 11:49:25', 'InActive'),
(26, 22, 'Where are we', '<p>ICON College is centrally located in London, on the eastern border of the City of London, the Capital&#39;s banking and financial centre. It occupies a building in Adler Street, London E1. This is close to Aldgate East underground station and within easy walking distance from Whitechapel (Underground and Overground station), and two main-line railway stations (Liverpool Street and Fenchurch Street).</p>\r\n\r\n<p><img src="http://www.iconcollege.com/images/tower_of_london.jpg" /></p>\r\n\r\n<p>The College is also close to the Tower of London (a World Heritage site) and the tourist attractions of St. Paul&#39;s Cathedral, Tower Bridge, the London Eye and the Monument. The London&#39;s West End, which is renowned for its theatres, art galleries and shopping, is only a short bus or tube ride away.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Within easy reach is also London Docklands, based around Canary Wharf, with its many new high-rise office blocks and the new EXCEL exhibition centre. The College is very near to the vibrant community of Brick Lane, famous for its many Indian Restaurants but now also recognised as a thriving centre for new media, fashion and the arts.</p>\r\n\r\n<p><img src="http://www.iconcollege.com/images/london_docklands.JPG" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The excellent Whitechapel Art Gallery and colourful London street markets of Whitechapel and Petticoat Lane are also within easy walking distance from the College.</p>\r\n\r\n<p>The main East London Mosque, in Whitechapel, is less than 5 minutes walk away from the College, as is several churches. To find out where ICON College is, check out the&nbsp;<a href="http://iconcollege.ac.uk/wireframe202/about.php#">Travel Guide.</a></p>\r\n', NULL, 'admin@gmail.com', '2017-08-20 08:36:06', NULL, NULL, 'Active'),
(27, 22, 'Why choose Icon College', '<p>ICON College is a dynamic and independent Higher Education institution, in the heart of London, providing academic and professional courses of an exceptional standard at competitive prices.</p>\r\n\r\n<p>All our courses can be followed full time and are also available in the evenings and saturday for UK/EU citizens for maximum flexibility in planning your programme of study.</p>\r\n\r\n<p>The College provides high quality teaching and support in a caring and friendly environment. It has all the facilities you will need for an effective and enjoyable learning experience &ndash; facilities we believe are vital to your ultimate success.</p>\r\n\r\n<p>Our aim is to ensure that all our students gain the maximum benefit from their time here. All the staff at the College are dedicated to helping you gain the skills and qualifications you need and enjoy your time in London.</p>\r\n\r\n<h3>Quality Teaching and Training</h3>\r\n\r\n<p>All our teaching staff are highly qualified and experienced teachers, with wide experience of working in their own fields. High quality lecture notes and handouts are provided for all courses. Our friendly and approachable staff are committed to helping you successfully complete your course. They will offer you every assistance and support.</p>\r\n\r\n<h3>Excellent College Environment</h3>\r\n\r\n<p>Whether you live around the corner from the College or are from the other side of the world, we are here to provide you with a stimulating learning environment while you are at ICON College.</p>\r\n\r\n<p>All the excellent business, entertainment, cultural, shopping, religious and educational facilities that make London one of the best cities in the world for entertainment, cultural enrichment and education, are also within easy reach.</p>\r\n\r\n<p><img src="http://www.iconcollege.com/images/pic1.jpg" /></p>\r\n\r\n<h3>Competitive Fees</h3>\r\n\r\n<p>We are able to offer high quality teaching and education at a competitive fees, by keeping our administration costs and overheads low.</p>\r\n\r\n<p><img src="http://www.iconcollege.com/images/pic2.jpg" /></p>\r\n\r\n<h3>Technology at ICON</h3>\r\n\r\n<p>ICON College uses advanced technology, both in the computer suites and lecture rooms. We have high specification computers, LCD projectors and printers. The College also has video and DVD equipment available to the classrooms. We also have appropriate library resources to support you and your studies.</p>\r\n\r\n<p><img src="http://www.iconcollege.com/images/pic3.jpg" /></p>\r\n\r\n<h3>Equal Opportunities</h3>\r\n\r\n<p>ICON College is committed to Equal Opportunities. We are here to support all students in their pursuit of new skills, knowledge and education regardless of their culture, ethnic origin, gender, religion, nationality, disability, political affiliations or age.</p>\r\n\r\n<p>Our flexible study programmes allow for full-time or evenings and week-end attendance available for UK/EU citizens, to enable as many students as possible to further their education.</p>\r\n\r\n<p><img src="http://www.iconcollege.com/images/pic4.jpg" /></p>\r\n\r\n<h3>Reason to come at ICON</h3>\r\n\r\n<ul>\r\n	<li>Affordable fees</li>\r\n	<li>Finance for tuition fees and maintenance available to eligible students from the Student Loans Company.</li>\r\n	<li>Good transport links and excellent local facilities in the heart of London.</li>\r\n	<li>QAA reviewed.</li>\r\n	<li>Lively provision of extra-curricular activities.</li>\r\n	<li>All courses lead to world recognised qualifications.</li>\r\n	<li>High quality teaching by experienced and scholarly tutors.</li>\r\n	<li>Flexible start dates: we admit new students in September, February and May sessions.</li>\r\n	<li>State-of-the-art Engineering Lab, well equiped IT labs,VLE, well-resourced library and fully serviced canteen..</li>\r\n	<li>Multicultural: our students come to us from many different countries.</li>\r\n	<li>Providing wide range of support including days out of town, health and financial advice, social events and accommodation support.</li>\r\n	<li>Well established college with high reputation for its educational standards, integrity and friendly partnership with our students including pastoral and academic support for all those who need additional help.</li>\r\n	<li>Excellent reports from Pearson.</li>\r\n	<li>Students integrated in the management of teaching/learning with full time student/management liaison officer. Each student is assigned an academic tutor for the duration of their study.</li>\r\n</ul>\r\n', NULL, 'admin@gmail.com', '2017-08-20 08:36:06', NULL, NULL, 'InActive'),
(37, 22, 'About Icon College', '<p>ICON College of Technology and Management is a modern, friendly and dynamic independent college for Higher Education in the heart of London. We offer a wide range of academic courses leading to internationally recognised accredited British qualifications in Computing and Systems Development; Electrical and Electronic Engineering; Business Studies; Management; Travel and Tourism, Hospitality Management and Health and Social Care.</p>\r\n\r\n<p>Pearson (formerly known as Edexcel) is the UK&#39;s largest awarding body, has accredited ICON College of Technology and Management as an approved centre to offer HND in Business, HND in Computing and Systems Development, HND in Electrical and Electronic Engineering, HND in Travel and Tourism Management, HND in Hospitality Management and HND in Health and Social Care.</p>\r\n\r\n<p>Students successfully completing the HND in Computing, Business, Travel &amp;Tourism, Hospitality, Health and Social Care or Electrical and Electronic Engineering at ICON College may transfer at many UK universities to complete Bachelor Degrees via top-up programmes. Students with good grades will be able to apply for direct entry into the final year of the BSc/BEng (Hons) in IT/Telecommunication, BA (Hons) in Business Administration, BA (Hons) in Tourism and Hospitality Management, BA/BSc. (Hons) in Health and Social Care following completion of the relevant HND courses.</p>\r\n\r\n<p><strong>We have received the following judgements from QAA:</strong></p>\r\n\r\n<p>The QAA monitoring team has concluded that ICON College of Technology and Management Ltd is making progress but further improvement is required with continuing to monitor, review and enhance its higher education provision before the QA monitoring visit for Higher Education Review (AP) in July 2017.</p>\r\n', NULL, 'admin@gmail.com', '2017-08-26 13:50:41', NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmphoto`
--

CREATE TABLE IF NOT EXISTS `ictmphoto` (
  `photoId` int(11) NOT NULL AUTO_INCREMENT,
  `photoPath` varchar(45) DEFAULT NULL,
  `photoName` varchar(45) DEFAULT NULL,
  `photoDetails` longtext,
  `insertedBy` varchar(45) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` varchar(45) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `photoStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`photoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmregisterinterest`
--

CREATE TABLE IF NOT EXISTS `ictmregisterinterest` (
  `registerInterestId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `surName` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `session` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `hearAboutUs` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `disabilityRequire` varchar(45) DEFAULT NULL,
  `appointmentDate` date DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `inserDate` date DEFAULT NULL,
  PRIMARY KEY (`registerInterestId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmrole`
--

CREATE TABLE IF NOT EXISTS `ictmrole` (
  `roleId` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(45) DEFAULT NULL,
  `roleDesc` varchar(45) DEFAULT NULL,
  `insertedBy` varchar(50) DEFAULT NULL,
  `insertedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `lastModifiedBy` varchar(50) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `roleStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ictmrole`
--

INSERT INTO `ictmrole` (`roleId`, `roleName`, `roleDesc`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `roleStatus`) VALUES
(1, 'Admin', 'web admin', '1', '2017-08-07 00:00:00', '1', '2017-08-07 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ictmunitsection`
--

CREATE TABLE IF NOT EXISTS `ictmunitsection` (
  `UnitSectionId` int(11) NOT NULL AUTO_INCREMENT,
  `courseUnitd` int(11) NOT NULL,
  `UnitSectionTitle` varchar(255) DEFAULT NULL,
  `UnitSectionContent` longtext,
  `UnitSectionImage` varchar(255) DEFAULT NULL,
  `insertedBy` int(11) DEFAULT NULL,
  `insertedDate` datetime DEFAULT NULL,
  `lastModifiedBy` int(11) DEFAULT NULL,
  `lastModifiedDate` datetime DEFAULT NULL,
  `unitSectionStatus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UnitSectionId`),
  KEY `fk_unitSection_ictmCurseUnits1_idx` (`courseUnitd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ictmusers`
--

CREATE TABLE IF NOT EXISTS `ictmusers` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
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
  `usersStatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `fk_ictmUsers_ictmRole1_idx` (`roleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ictmusers`
--

INSERT INTO `ictmusers` (`userId`, `roleId`, `userEmail`, `userPassword`, `userTitle`, `firstName`, `surName`, `jobTitle`, `insertedBy`, `insertedDate`, `lastModifiedBy`, `lastModifiedDate`, `usersStatus`) VALUES
(2, 1, 'admin@gmail.com', 'admin@123', 'admin', 'Admin admin', 'admin', 'web developer', 1, '2017-08-07 00:00:00', 1, '2017-08-07 00:00:00', 'Active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ictmcourse`
--
ALTER TABLE `ictmcourse`
  ADD CONSTRAINT `fk_ictmCourse_ictmDepartment1` FOREIGN KEY (`departmentId`) REFERENCES `ictmdepartment` (`departmentId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictmcoursesection`
--
ALTER TABLE `ictmcoursesection`
  ADD CONSTRAINT `fk_ictmCourseSection_ictmCourse1` FOREIGN KEY (`courseId`) REFERENCES `ictmcourse` (`courseId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `ictmunitsection`
--
ALTER TABLE `ictmunitsection`
  ADD CONSTRAINT `fk_unitSection_ictmCurseUnits1` FOREIGN KEY (`courseUnitd`) REFERENCES `ictmcourseunits` (`courseUnitd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ictmusers`
--
ALTER TABLE `ictmusers`
  ADD CONSTRAINT `fk_ictmUsers_ictmRole1` FOREIGN KEY (`roleId`) REFERENCES `ictmrole` (`roleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
