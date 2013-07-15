-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2013 at 09:11 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soltrics`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `comments` text,
  `msg_id_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `msg_id_fk` (`msg_id_fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `comments`, `msg_id_fk`) VALUES
(1, 'hahahaha nakakatawa', 1),
(2, 'oo nga eh', 1),
(3, '<3', 1),
(4, 'Hi :D', 3),
(5, 'msk', 4);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `inst` varchar(100) NOT NULL,
  `author` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `work` mediumtext NOT NULL,
  `summary` mediumtext NOT NULL,
  `syllabus` varchar(100) NOT NULL,
  `faqs` mediumtext NOT NULL,
  `image` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `pre` mediumtext NOT NULL,
  `format` mediumtext NOT NULL,
  `readings` mediumtext NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `title`, `category`, `inst`, `author`, `session`, `work`, `summary`, `syllabus`, `faqs`, `image`, `video`, `pre`, `format`, `readings`) VALUES
(51, 'Solar PV System Design & Simulation', '', 'Sumit Chhazed', 28, 4, '6-8 hours per week', '', 'uploads/', '', '', '', '', '', ''),
(52, 'Algo', 'CS', 'Sourabh', 1, 4, 'XYZ', 'XYZ', 'uploads/srs_template.pdf', 'XYZ', 'img/algo.png', 'https://www.youtube.com/watch?v=JPyuH4qXLZ0', 'XYZ', 'XYZ', 'XYZ'),
(56, 'cpp', 'KS', 'skb', 29, 0, '6-7 weeks', 'njdvnj', 'uploads/50 Interview Question.pdf', 'jviejeri', 'uploads/success-quotes-hd-free-motivational-quote-158352.jpg', 'https://www.youtube.com/watch?v=aR8knyGXnGg', 'nvkdjsndjs', 'jscjsk', 'ksclvndslk'),
(60, 'hello', 'KY', 'skb', 30, 0, '6-7 weeks', '', 'uploads/', '', 'uploads/', 'https://www.youtube.com/watch?v=JPyuH4qXLZ0', '', '', ''),
(61, 'Introduction To Algorithms', 'LA', 'Mr Sumit', 30, 0, '6-7 weeks', 'Can I join a course that has already started? Can I enroll late?\r\nAre the courses free?', 'uploads/', 'Can I join a course that has already started? Can I enroll late?\r\nAre the courses free?', 'uploads/', 'https://www.youtube.com/watch?v=aR8knyGXnGg', '<ul><li><a href="http://help.coursera.org/customer/portal/articles/502626-can-i-join-a-class-that-has-already-started-can-i-enroll-late-" rel="nofollow" target="_blank">Can I join a course that has already started? Can I enroll late?</a></li><li><a href="http://help.coursera.org/customer/portal/articles/502629-are-the-classes-free-" rel="nofollow" target="_blank">Are the courses free?</a></li></ul><br>', 'Can I join a course that has already started? Can I enroll late?\r\nAre the courses free?', 'Cormen');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `cid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `week` int(11) NOT NULL,
  `doc` varchar(100) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `assignment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`cid`, `title`, `week`, `doc`, `video`, `assignment`) VALUES
(49, 'Apple', 1, NULL, 'http://www.youtube.com/watch?v=fDUKt_XgfJ4', NULL),
(49, 'Algorithms', 1, 'idp/uploads/Computer Science Eng 5th semester (NIT Scheme) (Date of declaration 07-03-2013).pdf', 'http://www.youtube.com/watch?v=HtSuA80QTyo', NULL),
(49, 'Hello', 1, 'idp/uploads/Computer Science Eng 5th semester (NIT Scheme) (Date of declaration 07-03-2013).pdf', 'http://www.youtube.com/watch?v=tyVhn0FWWB4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `uid` int(20) NOT NULL,
  `fuid` int(20) NOT NULL,
  PRIMARY KEY (`uid`,`fuid`),
  KEY `fuid` (`fuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `idp`
--

CREATE TABLE IF NOT EXISTS `idp` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `synopsis` mediumtext NOT NULL,
  `problem` mediumtext NOT NULL,
  `image` varchar(100) NOT NULL,
  `prerequisites` mediumtext,
  `faqs` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `author` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `title` (`title`),
  KEY `link` (`link`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `idp`
--

INSERT INTO `idp` (`cid`, `title`, `category`, `synopsis`, `problem`, `image`, `prerequisites`, `faqs`, `deadline`, `author`, `link`) VALUES
(24, 'Introduction to Algorithms', 'KY', 'vfdonlkjlonvapodv', 'dfvdkavhvldivhv', 'idp/img/377927_317166218304062_317158211638196_1091491_1180288628_n.jpg', 'evklenlvevknk', 'idp/faq/Android-Tutorial.pdf', '2013-03-29', '', 'editidp.php?cid=24'),
(25, 'evnwovioehoih', 'KY', 'gergouhoih', 'nlferifhipoh', '', 'gfnkplnoij', '', '2013-03-29', '', ''),
(26, 'velknrkenvl;n;', 'MS', 'jrnbvjrwnvrwbioq', 'nlknvqlkn;p', '', 'neklvnekvnkn', '', '2013-03-29', '', ''),
(27, 'rvklnklnk', 'WV', 'rehoejvhohoi', '`knklernkihnp', '', 'nfekrnkgvhepogpo', '', '2013-03-29', '', ''),
(28, 'ngverklnerklgnekln', 'KS', 'vnejvjlnblnb', 'ljvfnlvnklnlk', '', 'feknfklenn', '', '2013-03-29', '', ''),
(29, 'renkelrjhj;', 'VA', 'jergjer;ghoh', 'jg;ojer;j;oj', '', 'rgergnekljrihjpi', '', '2013-03-29', '', ''),
(30, 'kljrjgerjg;o', 'LA', 'nerkjppojo', 'nlkergergpoj', '', 'krnklernjjoj', '', '2013-03-29', '', ''),
(31, 'tpjgpierjpouj', 'LA', ';kltrjgtj;uo', 'jktr;gjjjo', '', 'j;lerjjgpo', '', '2013-03-29', '', ''),
(32, 'ktlngjeripjpoj', 'KY', 'joerjg[j[', 'erjg;jeorjgf[o', '', 'fjgergjepoj', '', '2013-03-29', '', ''),
(33, 'trgjpijpijp', 'MS', 'krkgjpgjpo', 'nmerkregejpgij', '', 'egkjjhpojh', '', '2013-03-29', '', ''),
(34, 'jgejripgipi', 'LA', 'gerhjipgpiopo', 'qjrjpejp', '', 'gerjgepgpju', '', '2013-03-29', '', ''),
(49, 'hi', '', '', '', '', '', '', '0000-00-00', '', ''),
(50, 'ram', '', '', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `message`) VALUES
(1, 'Pare1: pare parang malalim iniisip mo?\r\nPare2: nanaginip ako kagabi. kasama ko 50 contestants ng ms.universe\r\nPare1: suwerte mo ano problema mo?\r\nPare2: pare ako ang nanalo!!! '),
(2, 'Teacher: ok class our lesson 4 today is about planet. earth\r\nis the 3rd planed from the sun. now what is next to mercury?\r\nPedro: murag rose pharmacy mn tingali mam! d ko lang sure '),
(3, 'Hello'),
(4, 'jkcxmkmdx');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_detail`
--

CREATE TABLE IF NOT EXISTS `quiz_detail` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `qname` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `week` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `quiz_detail`
--

INSERT INTO `quiz_detail` (`qid`, `cid`, `qname`, `active`, `week`, `date`) VALUES
(35, 0, 'Introduction To Algorithms', 0, 1, '2013-07-08'),
(36, 51, 'quiz', 0, 0, '2013-07-06'),
(37, 0, 'Introduction to C++', 0, 0, '0000-00-00'),
(38, 0, 'test', 0, 0, '0000-00-00'),
(39, 0, 'test', 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_submissions`
--

CREATE TABLE IF NOT EXISTS `quiz_submissions` (
  `qs_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `cid` int(11) NOT NULL,
  `qname` varchar(255) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`qs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `quiz_submissions`
--

INSERT INTO `quiz_submissions` (`qs_id`, `uid`, `cid`, `qname`, `score`) VALUES
(1, 2, 49, 'Algorithms', 1),
(2, 1, 51, 'q_quiz', 1),
(14, 1, 0, 'q_quiz', 0),
(15, 1, 0, 'q_quiz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `q_quiz`
--

CREATE TABLE IF NOT EXISTS `q_quiz` (
  `ques_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `o1` varchar(255) NOT NULL,
  `o2` varchar(255) NOT NULL,
  `o3` varchar(255) NOT NULL,
  `o4` varchar(255) NOT NULL,
  `ans` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ques_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `q_quiz`
--

INSERT INTO `q_quiz` (`ques_id`, `type`, `question`, `o1`, `o2`, `o3`, `o4`, `ans`) VALUES
(1, 0, 'mul', '1', '3', '45', '65', '1');

-- --------------------------------------------------------

--
-- Table structure for table `q_test`
--

CREATE TABLE IF NOT EXISTS `q_test` (
  `type` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `o1` varchar(255) NOT NULL,
  `o2` varchar(255) NOT NULL,
  `o3` varchar(255) NOT NULL,
  `o4` varchar(255) NOT NULL,
  `ans` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_test`
--

INSERT INTO `q_test` (`type`, `question`, `o1`, `o2`, `o3`, `o4`, `ans`) VALUES
(3, 'Test', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE IF NOT EXISTS `registered` (
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `completed` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`uid`, `cid`, `completed`) VALUES
(23, 51, 0);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE IF NOT EXISTS `score` (
  `qname` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`qname`,`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `fb` varchar(50) DEFAULT NULL,
  `ln` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT 'img/def.jpg',
  `category` varchar(50) NOT NULL DEFAULT 'student',
  `interests` longtext,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `active`, `name`, `college`, `dob`, `phone`, `fb`, `ln`, `image`, `category`, `interests`) VALUES
(1, 'darshan.simha@yahoo.in', 'fddfec73285a1cf83692f59cc9a99bdf', 1, 'Darshan Simha U', 'VIT', '1992-08-08', '2147483647', NULL, NULL, 'img/def.jpg', 'student', NULL),
(2, 'kg@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', 1, 'Sourabh Banerjee', 'lfclvhihp', NULL, NULL, NULL, NULL, NULL, 'student', NULL),
(21, 'banu@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f', 0, 'Banwa', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'student', NULL),
(23, 'sksiitb@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f', 0, 'Saurabh Suman', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'student', NULL),
(24, 'nikhil@enelek.com', '1af6f2c1b253ac2f98c0d4a35998ff3d', 0, 'Nikhil Jain', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'author', NULL),
(25, 'sumitchhazed@gmail.com', 'dc94391d3b214bd65337190fe2c04470', 0, 'sumit', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'student', NULL),
(28, 'sumitc@enelek.com', '2a9d027f244539235369c342bd2a5b04', 0, 'Sumit Chhazed', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'author', NULL),
(29, 'sourabh.92@india.com', '5cbe3cdedd3a826c8c50ac04dd7f4185', 0, 'Sourabh Banerjee', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'author', NULL),
(30, 'sourabh.92@live.com', '21232f297a57a5a743894a0e4a801fc3', 0, 'Sourabh Banerjee', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'author', NULL),
(31, 'banwa@gmail.com', '5cbe3cdedd3a826c8c50ac04dd7f4185', 0, 'Banu', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'author', NULL),
(32, 'a@a.com', '5d41402abc4b2a76b9719d911017c592', 0, 'new', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'author', NULL),
(33, 'abcd@gmail.com', 'ab56b4d92b40713acc5af89985d4b786', 0, 'abc', NULL, NULL, NULL, NULL, NULL, 'img/def.jpg', 'author', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`fuid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
