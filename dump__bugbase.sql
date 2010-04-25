-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2010 at 05:03 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `bugbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bughistory`
--

CREATE TABLE IF NOT EXISTS `bughistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bug_id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `comment` varchar(2000) NOT NULL DEFAULT '',
  `assignedTo` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `bughistory`
--

INSERT INTO `bughistory` (`id`, `bug_id`, `addedBy`, `timestamp`, `status`, `comment`, `assignedTo`, `priority`) VALUES
(1, 11, 1, '2010-04-22 00:55:59', 1, 'another bug', 0, 1),
(2, 13, 0, '2010-04-22 00:59:35', 1, '', 1, 1),
(3, 13, 1, '2010-04-22 01:19:49', 1, 'foo test', 1, 2),
(4, 12, 1, '2010-04-22 01:58:29', 1, 'foo comment2', 1, 1),
(5, 14, 0, '2010-04-22 03:01:29', 2, '', 0, 2),
(6, 15, 0, '2010-04-22 03:20:58', 3, '', 1, 2),
(7, 16, 0, '2010-04-22 03:22:12', 1, '', 0, 2),
(8, 17, 0, '2010-04-22 07:38:04', 4, '', 0, 2),
(9, 18, 0, '2010-04-22 10:57:55', 2, 'foo', 0, 2),
(18, 19, 1, '2010-04-24 21:54:39', 3, 'assigned this bug to Ram Kumar', 1, 1),
(11, 20, 0, '2010-04-23 19:38:13', 1, '', 0, 1),
(12, 21, 0, '2010-04-23 20:17:08', 2, '', 0, 2),
(13, 19, 1, '2010-04-24 21:34:49', 1, 'fsdfsdf', 0, 1),
(14, 19, 1, '2010-04-24 21:34:56', 1, 'dkflsfsdf', 0, 1),
(15, 19, 1, '2010-04-24 21:35:36', 1, 'sdfvsdfds', 1, 1),
(16, 19, 1, '2010-04-24 21:37:51', 2, 'Just started working on the bug', 0, 1),
(17, 19, 1, '2010-04-24 21:39:02', 3, 'Just fixed :D', 0, 1),
(19, 19, 1, '2010-04-24 22:47:31', 1, 'opens again...', 1, 1),
(20, 15, 1, '2010-04-24 23:29:57', 1, 'still not fixed', 1, 2),
(21, 19, 1, '2010-04-25 11:17:38', 1, 'Created by Ram Kumar at 2010-04-22 15:25:58 affects version 1.0  and the project gedit  Keywords check\r\nBug history\r\nRev. id  Status  Priority  Revised by  Assigned to  Updated on #1  open  Low  Ram Kumar  no one  2010-04-24 21:34:49\r\nRam Kumar says: fsdfsdf\r\n#2  open  Low  Ram Kumar  no one', 1, 1),
(22, 19, 1, '2010-04-25 11:22:21', 1, '<a href="google.com">foo</a>', 1, 1),
(23, 19, 1, '2010-04-25 11:22:33', 1, '</div>', 1, 1),
(24, 19, 1, '2010-04-25 11:22:43', 1, '<div>', 1, 1),
(25, 19, 2, '2010-04-25 14:20:23', 2, 'No I will take care of the issue.', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bugName` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `affectedVersion` varchar(50) NOT NULL DEFAULT 'na',
  `project` int(11) NOT NULL DEFAULT '-1',
  `affectedProject` int(11) NOT NULL DEFAULT '-1',
  `bugType` int(11) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `bugName`, `description`, `affectedVersion`, `project`, `affectedProject`, `bugType`, `keywords`, `createdBy`, `createdAt`) VALUES
(17, 'test bug', 'kjgkjjhkjhj', '1.0', 1, 0, 1, 'php', 0, '2010-04-22 07:38:04'),
(16, 'kjfhjdshfjshdfjkh', 'kjhkjfhkjdshkhfjkjh', 'jhsdklsd', 2, 0, 1, 'hjkh', 0, '2010-04-22 03:22:12'),
(15, 'slkjdlkj', 'lkjsdkljlkfj', '', 3, 1, 2, 'fooo', 0, '2010-04-22 03:20:58'),
(14, 'A new bug', 'somehting new', '1.2', 3, 2, 2, 'php, c++', 0, '2010-04-22 03:01:29'),
(13, 'FOOOO', 'kjhsdkj', 'kshjf', 1, 1, 1, 'djfhl', 0, '2010-04-22 00:59:35'),
(11, 'sjdhj', 'kjhsdkj', 'kshjf', 1, 1, 1, 'djfhl', 0, '2010-04-22 00:18:19'),
(12, 'sjdhj', 'kjhsdkj', 'kshjf', 1, 1, 1, 'djfhl', 0, '2010-04-22 00:18:23'),
(18, 'Maximize button not working', 'In project ABC, maximize button fails to work on linux.', '1.4, 1.5', 2, 3, 2, 'usability', 0, '2010-04-22 10:57:55'),
(19, 'win7', 'graphics', '1.0', 2, 2, 2, 'check', 1, '2010-04-22 15:25:58'),
(20, 'Testfoo bug', 'Foo bar foo', '1.4, 1.5', 1, 1, 1, 'foo, bar', 0, '2010-04-23 19:38:12'),
(21, 'Foo bar', 'foo foo bar bar', '1.34', 2, 1, 2, 'foo, bar', 0, '2010-04-23 20:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `label`) VALUES
(1, 'Feature'),
(2, 'Defect');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE IF NOT EXISTS `priorities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `label`) VALUES
(1, 'Low'),
(2, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `owner` int(11) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `owner`, `keywords`) VALUES
(1, 'Project Bugbase', 'a bug tracking system', 1, 'php'),
(2, 'gedit', 'a text editor', 1, ''),
(3, 'kate', 'another text editor', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `label`) VALUES
(1, 'open'),
(2, 'in progress'),
(3, 'fixed'),
(4, 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL DEFAULT 'none',
  `is_admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `is_admin`) VALUES
(1, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ram Kumar', 'ram_kumar@yahoo.com', 0),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@company.com', 1);
