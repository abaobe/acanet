-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2011 at 07:40 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acanet`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE IF NOT EXISTS `community` (
  `community_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` enum('institution','subject','field','course','group') NOT NULL,
  `short_description` text NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`community_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`community_id`, `name`, `type`, `short_description`, `updated_date`) VALUES
(0, 'no name', 'institution', 'It is a dummy community for the global Institution and field', '2011-04-20 17:52:29'),
(1, 'BUET', 'institution', 'It is a community of BUET students', '2011-04-20 17:34:51'),
(2, 'DU', 'institution', 'It is a community of DU students', '2011-04-20 17:36:06'),
(3, 'CSE', 'field', 'It is a community of CSE Students of Bangladesh', '2011-04-20 17:37:07'),
(4, 'EEE Community', 'field', 'It is a community of EEE Students of Bangladesh', '2011-04-20 17:37:54'),
(5, 'BUET CSE Community', 'field', 'It is a community of BUET CSE students', '2011-04-20 17:39:08'),
(6, 'BUET EEE Community', 'field', 'It is a community of BUET EEE students', '2011-04-20 17:40:03'),
(7, 'DU CSE Community', 'field', 'It is a community of CSE students of DU', '2011-04-20 18:07:39'),
(8, 'DU EEE Community', 'field', 'It is a community of EEE students of DU', '2011-04-20 18:08:18'),
(9, 'Structered Programming language Community', 'subject', 'It is a community of structured programming language subject', '2011-04-20 17:41:39'),
(10, 'CSE 101 Community', 'course', 'It is a community of CSE 101 students ', '2011-04-20 17:42:58'),
(11, 'Jahanginagar University', 'institution', '', '0000-00-00 00:00:00'),
(12, 'Jahanginagar University', 'institution', '', '0000-00-00 00:00:00'),
(13, 'Jahanginagar University', 'institution', '', '0000-00-00 00:00:00'),
(14, 'American Int''l University', 'institution', '', '0000-00-00 00:00:00'),
(15, 'Jagannath', 'institution', '', '0000-00-00 00:00:00'),
(16, 'Naval Inst', 'institution', '', '0000-00-00 00:00:00'),
(17, 'Naval Instd', 'institution', '', '0000-00-00 00:00:00'),
(18, 'Naval Instds', 'institution', '', '0000-00-00 00:00:00'),
(19, 'Naval Instdss', 'institution', '', '0000-00-00 00:00:00'),
(20, 'Navald Instdss', 'institution', '', '0000-00-00 00:00:00'),
(21, 'Navsdald Instdss', 'institution', '', '0000-00-00 00:00:00'),
(22, 'Navsdald Instdsss', 'institution', '', '0000-00-00 00:00:00'),
(23, 'Navsdald sInstdsss', 'institution', '', '0000-00-00 00:00:00'),
(24, 'Navsdald sInstdssss', 'institution', '', '0000-00-00 00:00:00'),
(25, 'sNavsdald sInstdssss', 'institution', '', '0000-00-00 00:00:00'),
(26, 'sNssavsdald sInstdssss', 'institution', '', '0000-00-00 00:00:00'),
(27, 'Metalorgy', 'institution', '', '0000-00-00 00:00:00'),
(28, 'Dhaka University', 'institution', '', '0000-00-00 00:00:00'),
(29, 'Bangladesh University Of Engineering & Technology', 'institution', '', '0000-00-00 00:00:00'),
(30, 'Chittagong University', 'institution', '', '0000-00-00 00:00:00'),
(31, 'Rajsahi University', 'institution', 'sdfs', '0000-00-00 00:00:00'),
(32, 'Rajsahi University', 'institution', 'sdfs', '0000-00-00 00:00:00'),
(33, 'Rajsahi University', 'institution', 'sdfs', '0000-00-00 00:00:00'),
(34, 'North South', 'institution', 'blah', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `content_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` enum('link','text') NOT NULL,
  `content_link` varchar(100) NOT NULL,
  `publisher_name` char(20) NOT NULL,
  `date_time` datetime NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`content_id`),
  KEY `publisher_id` (`publisher_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `type`, `content_link`, `publisher_name`, `date_time`, `description`) VALUES
(1, 'link', 'test_link', 'ibrahim', '2011-05-01 19:16:56', NULL),
(2, 'link', 'test_link2', 'giga', '2011-05-01 19:17:12', NULL),
(3, 'link', 'test_link3', 'ibrahim', '2011-05-01 19:19:41', NULL),
(4, 'link', 'test_link4', 'giga', '2011-05-01 19:19:43', NULL),
(5, 'link', 'link test 1', 'ibrahim', '2011-05-17 14:56:44', '0'),
(7, 'link', 'link test 1', 'ibrahim', '2011-05-17 14:59:06', '0'),
(8, 'link', 'link test 1', 'ibrahim', '2011-05-17 14:59:28', '0'),
(9, 'link', 'link test 1', 'ibrahim', '2011-05-17 15:00:37', 'desc 1');

-- --------------------------------------------------------

--
-- Table structure for table `content_community`
--

CREATE TABLE IF NOT EXISTS `content_community` (
  `content_id` int(10) NOT NULL,
  `community_id` int(10) NOT NULL,
  PRIMARY KEY (`content_id`,`community_id`),
  KEY `community_id` (`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content_community`
--

INSERT INTO `content_community` (`content_id`, `community_id`) VALUES
(1, 0),
(1, 1),
(2, 3),
(7, 3),
(8, 3),
(9, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `field_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `community_id` int(10) NOT NULL,
  `short_description` text NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `field_id` (`field_id`),
  KEY `community_id` (`community_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `course`
--


-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `publisher_name` char(20) NOT NULL,
  `date_time` date DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `publisher_id` (`publisher_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `title`, `description`, `start_date_time`, `end_date_time`, `publisher_name`, `date_time`) VALUES
(1, 'Event 1', 'this is decs for event 1', '2011-05-03 19:25:22', '2011-05-05 19:25:32', 'ibrahim', NULL),
(2, 'Event 2', 'this is decs for event 2', '2011-05-04 19:25:42', '2011-05-06 19:25:45', 'giga', NULL),
(3, 'Event 3', 'this is decs for event 3', '2011-05-07 19:25:51', '2011-05-09 19:25:55', 'ibrahim', NULL),
(4, 'Event 4', 'this is decs for event 4', '2011-05-09 19:26:01', '2011-05-11 19:26:04', 'ibrahim', NULL),
(5, 'Event 5', 'this is decs for event 5', '2011-05-02 19:26:11', '2011-05-04 19:26:17', 'ibrahim', NULL),
(8, 'Event 6', 'this is event 6', '2011-04-07 19:29:12', '2011-04-09 19:29:18', 'ibrahim', NULL),
(9, 'Event 7', 'this is event 7', '2011-04-13 19:29:24', '2011-04-14 19:29:30', 'giga', NULL),
(10, 'test event 1', 'desc test 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ibrahim', NULL),
(11, 'test event 1', 'desc test 1', '2004-05-12 00:00:00', '2018-05-11 00:00:00', 'ibrahim', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_community`
--

CREATE TABLE IF NOT EXISTS `event_community` (
  `event_id` int(10) NOT NULL,
  `community_id` int(10) NOT NULL,
  PRIMARY KEY (`event_id`,`community_id`),
  KEY `community_id` (`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_community`
--

INSERT INTO `event_community` (`event_id`, `community_id`) VALUES
(1, 1),
(2, 1),
(2, 3),
(5, 3),
(10, 3),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE IF NOT EXISTS `field` (
  `field_id` int(10) NOT NULL AUTO_INCREMENT,
  `institution_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  `community_id` int(10) NOT NULL,
  `short_description` text NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`field_id`),
  KEY `community_id` (`community_id`),
  KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `field`
--


-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `institution_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `community_id` int(10) NOT NULL,
  `campuses` text NOT NULL,
  `short_description` text NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`institution_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `short_name` (`short_name`),
  KEY `community_id` (`community_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`institution_id`, `name`, `short_name`, `location`, `community_id`, `campuses`, `short_description`, `updated_date`, `status`) VALUES
(1, 'Dhaka University', 'DU', 'DU', 28, 'only one campus', 'DU', '0000-00-00 00:00:00', 'pending'),
(2, 'Bangladesh University Of Engineering & Technology', 'BUET', 'Polashi, Dhaka', 0, 'New Aca Building\nEME building', 'buet is a peculiar university', '0000-00-00 00:00:00', 'approved'),
(3, 'Chittagong University', 'CU', 'dfd\ndsf', 30, '\ndfsd\ndsf\nfsdfsf\n', 'dfsdf\nsdf\nsdf', '0000-00-00 00:00:00', 'pending'),
(4, 'Rajsahi University', 'RU', 'Rajsahi', 31, 'dfsd\nsdfs\nsdf', 'sdfs', '0000-00-00 00:00:00', 'pending'),
(6, 'North South', 'NSU', 'blah', 34, 'blah', 'blah', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `publisher_name` char(20) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `publisher_name` (`publisher_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--


-- --------------------------------------------------------

--
-- Table structure for table `news_community`
--

CREATE TABLE IF NOT EXISTS `news_community` (
  `news_id` int(10) NOT NULL,
  `community_id` int(10) NOT NULL,
  PRIMARY KEY (`news_id`,`community_id`),
  KEY `community_id` (`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_community`
--


-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `publisher_name` char(20) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `publisher_id` (`publisher_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `publisher_name`, `date_time`) VALUES
(1, 'fsadfsf', 'gffffff\n', 'ibrahim', '2011-05-01 08:56:50'),
(2, 'sdfsdf', 'dfsdasdfasdf', 'ibrahim', '2011-05-02 13:07:56'),
(3, 'sdfsdfsd', 'Helldslf;ajdl', 'ibrahim', '2011-05-02 13:08:04'),
(4, 'i am Histu', 'I am Hisu', 'ibrahim', '2011-05-02 13:20:24'),
(5, 'This is a Post with title', 'Hello', 'ibrahim', '2011-05-02 13:25:08'),
(6, '', '', 'ibrahim', '2011-05-02 15:31:47'),
(7, 'sdf', 'asdf', 'ibrahim', '2011-05-08 21:35:59'),
(8, 'sdf', 'asdfdddd', 'ibrahim', '2011-05-08 21:36:12'),
(15, 'title', 'dilam', 'giga', '2011-05-14 23:32:52'),
(31, '', '', 'ibrahim', '2011-05-15 12:09:43'),
(32, '', '', 'ibrahim', '2011-05-15 13:24:43'),
(33, 'sd', 'dasf', 'ibrahim', '2011-05-17 22:28:00'),
(34, 'asdfasd', 'asdfasdf', 'ibrahim', '2011-05-17 22:28:11'),
(35, 'this', 'all we do is done', 'ibrahim', '2011-05-18 02:50:51'),
(36, 'try another one', 'polish', 'ibrahim', '2011-05-18 02:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `post_community`
--

CREATE TABLE IF NOT EXISTS `post_community` (
  `post_id` int(10) NOT NULL,
  `community_id` int(10) NOT NULL,
  PRIMARY KEY (`post_id`,`community_id`),
  KEY `community_id` (`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_community`
--

INSERT INTO `post_community` (`post_id`, `community_id`) VALUES
(15, 0),
(2, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(1, 3),
(2, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(1, 7),
(3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `post_reply`
--

CREATE TABLE IF NOT EXISTS `post_reply` (
  `post_id` int(10) NOT NULL,
  `community_id` int(10) NOT NULL,
  `reply_id` int(10) NOT NULL,
  PRIMARY KEY (`post_id`,`community_id`,`reply_id`),
  KEY `community_id` (`community_id`),
  KEY `reply_id` (`reply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_reply`
--


-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `request_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `sender_name` char(20) NOT NULL,
  `referer_name` char(20) NOT NULL,
  `community_id` int(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` enum('pending','accepted','denied') NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `sender_id` (`sender_name`,`community_id`),
  KEY `community_id` (`community_id`),
  KEY `referer_id` (`referer_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `request`
--


-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subejct_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `community_id` int(10) NOT NULL,
  `short_description` text NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`subejct_id`),
  KEY `field_id` (`community_id`),
  KEY `community_id` (`community_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subejct_id`, `name`, `community_id`, `short_description`, `updated_date`) VALUES
(1, 'Structered Programming language', 9, 'It is one of the core subject of Computer programming', '2011-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `subject_course`
--

CREATE TABLE IF NOT EXISTS `subject_course` (
  `subject_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  PRIMARY KEY (`subject_id`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_course`
--


-- --------------------------------------------------------

--
-- Table structure for table `subject_field`
--

CREATE TABLE IF NOT EXISTS `subject_field` (
  `subject_id` int(10) NOT NULL,
  `field_id` int(10) NOT NULL COMMENT 'Only Global Fields',
  PRIMARY KEY (`subject_id`,`field_id`),
  KEY `field_id` (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_field`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` char(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `mail_address` varchar(100) NOT NULL,
  `type` enum('admin','moderator','subscriber') NOT NULL,
  `status` enum('pending','activated','deactivated') NOT NULL,
  `verification_data` varchar(100) NOT NULL COMMENT 'email verifiacation ',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `address`, `contact_number`, `mail_address`, `type`, `status`, `verification_data`) VALUES
('giga', '00d8c86d80f51dc38b694de6172f96b4ffbc571b', '', '', '', '', 'admin', 'pending', ''),
('ibrahim', 'f1c083e61b32d3a9be76bc21266b0648', 'Ibrahim ibrahim', 'dsafadsfasdf', 'asdfasdf', 'adsfasdf', 'subscriber', 'pending', 'abcdef'),
('sifat', 'e10adc3949ba59abbe56e057f20f883e', 'sdf asdfas', 'sifatasdfasdfasfd', 'sifat', 'sifat@gamil.com', 'subscriber', 'pending', 'abcdef');

-- --------------------------------------------------------

--
-- Table structure for table `user_community`
--

CREATE TABLE IF NOT EXISTS `user_community` (
  `username` char(20) NOT NULL,
  `community_id` int(10) NOT NULL,
  `role` enum('admin','subscriber') NOT NULL,
  PRIMARY KEY (`username`,`community_id`),
  KEY `user_id` (`username`),
  KEY `community_id` (`community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_community`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_field`
--

CREATE TABLE IF NOT EXISTS `user_field` (
  `username` char(20) NOT NULL,
  `field_id` int(10) NOT NULL,
  PRIMARY KEY (`username`,`field_id`),
  KEY `field_id` (`field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_field`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_institution`
--

CREATE TABLE IF NOT EXISTS `user_institution` (
  `username` char(20) NOT NULL,
  `institution_id` int(10) NOT NULL,
  `role` enum('owner','member','moderator','pending','banned') NOT NULL DEFAULT 'pending',
  `referer` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`username`,`institution_id`),
  KEY `institution_id` (`institution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_institution`
--

INSERT INTO `user_institution` (`username`, `institution_id`, `role`, `referer`) VALUES
('giga', 2, 'pending', 'ibrahim'),
('giga', 6, 'pending', 'ibrahim'),
('ibrahim', 1, 'owner', NULL),
('ibrahim', 2, 'owner', NULL),
('ibrahim', 3, 'owner', NULL),
('ibrahim', 4, 'owner', NULL),
('ibrahim', 6, 'owner', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`publisher_name`) REFERENCES `user` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `content_community`
--
ALTER TABLE `content_community`
  ADD CONSTRAINT `content_community_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `content_community_ibfk_2` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `field` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_4` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`publisher_name`) REFERENCES `user` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `event_community`
--
ALTER TABLE `event_community`
  ADD CONSTRAINT `event_community_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_community_ibfk_2` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `field_ibfk_1` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `field_ibfk_2` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`institution_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `institution`
--
ALTER TABLE `institution`
  ADD CONSTRAINT `institution_ibfk_1` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`publisher_name`) REFERENCES `user` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `news_community`
--
ALTER TABLE `news_community`
  ADD CONSTRAINT `news_community_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_community_ibfk_2` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`publisher_name`) REFERENCES `user` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `post_community`
--
ALTER TABLE `post_community`
  ADD CONSTRAINT `post_community_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_community_ibfk_2` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_reply`
--
ALTER TABLE `post_reply`
  ADD CONSTRAINT `post_reply_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_reply_ibfk_2` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_reply_ibfk_3` FOREIGN KEY (`reply_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`sender_name`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`referer_name`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_course`
--
ALTER TABLE `subject_course`
  ADD CONSTRAINT `subject_course_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subejct_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_field`
--
ALTER TABLE `subject_field`
  ADD CONSTRAINT `subject_field_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subejct_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_field_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `field` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_community`
--
ALTER TABLE `user_community`
  ADD CONSTRAINT `user_community_ibfk_2` FOREIGN KEY (`community_id`) REFERENCES `community` (`community_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_community_ibfk_3` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_field`
--
ALTER TABLE `user_field`
  ADD CONSTRAINT `user_field_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `field` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_field_ibfk_3` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_institution`
--
ALTER TABLE `user_institution`
  ADD CONSTRAINT `user_institution_ibfk_2` FOREIGN KEY (`institution_id`) REFERENCES `institution` (`institution_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_institution_ibfk_3` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
