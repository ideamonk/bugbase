-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2010 at 10:48 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `bughistory`
--

INSERT INTO `bughistory` (`id`, `bug_id`, `addedBy`, `timestamp`, `status`, `comment`, `assignedTo`, `priority`) VALUES
(1, 1, 8, '2010-04-23 04:29:47', 1, '', 0, 6),
(2, 1, 6, '2010-04-24 04:30:42', 1, 'I think ''Install updates/packages'' comes closer to the purpose of apt-offline, which is to install updates/specific packages when you come back home from office/cafe. Since you didn''t have the packages you''re installing through it, ''restore'' might give a different meaning', 6, 6),
(3, 1, 6, '2010-04-26 04:31:14', 1, 'Its not a very urgent task as of now.', 6, 1),
(4, 1, 8, '2010-04-26 04:31:48', 1, 'Allright you go ahead with it.', 6, 1),
(5, 1, 6, '2010-04-26 04:32:58', 6, 'Just committed a change for this in trunk. I think install will be good.', 6, 1),
(6, 1, 9, '2010-04-26 04:33:47', 6, 'Alright, the changes have been reviewed you can mark it as fixed now.', 6, 1),
(7, 1, 6, '2010-04-26 04:34:25', 9, 'Fix committed. Minor changes done to .ui files.', 6, 1),
(8, 2, 7, '2010-04-26 04:35:50', 1, '', 0, 6),
(9, 2, 7, '2010-04-26 04:36:23', 6, 'Assigning to myself. started working on it.', 7, 6),
(10, 3, 2, '2010-04-26 04:37:42', 1, '', 0, 2),
(11, 3, 2, '2010-04-26 04:38:20', 1, 'This could be easily done in PyQt, I''m assigning it to Abhishek.', 9, 2),
(12, 4, 2, '2010-04-26 04:41:08', 1, '', 0, 2),
(13, 5, 2, '2010-04-20 04:42:42', 1, '', 0, 6),
(14, 5, 8, '2010-04-21 04:44:35', 1, 'This should definitely be reported upstream, and filing the bug against gedit is probably a good start.\r\n\r\nI wanted to thank you for investigating this bug as much as you did--while patches are always nice, they are by no means necessarily the most important part of a bug report, and the clear explanation as well as the research you did is extremely valuable.', 0, 6),
(15, 5, 7, '2010-04-24 04:45:05', 1, 'Glad I could help.\r\n\r\nI''ll see if I can find the faulty function again (it''s been a few months since I tried to come up with a patch) and try to report it upstream properly (a bug against the library, that is).', 7, 6),
(16, 6, 8, '2010-04-26 04:47:50', 1, '', 0, 1),
(17, 4, 8, '2010-04-26 04:48:46', 1, 'I would love to fix this. I think the problem is with the system calls made.', 8, 2),
(18, 4, 9, '2010-04-26 22:09:23', 1, 'Another point to ponder is that in issue #3345, put_Copt() has been reimplemented by Akash.', 8, 2),
(19, 3, 9, '2010-04-26 22:10:46', 6, 'Have started working on it. Adding a QTab to get the job done. ', 9, 2),
(20, 6, 9, '2010-04-26 22:11:17', 1, 'Assigning to myself as I''m free this weekend.', 9, 1),
(21, 7, 2, '2010-04-26 22:13:56', 1, '', 0, 2),
(22, 8, 2, '2010-04-26 22:14:53', 1, '', 0, 1),
(23, 9, 7, '2010-04-26 22:20:47', 1, '', 0, 1),
(24, 9, 6, '2010-04-26 22:21:13', 1, 'Valid "constraints" are methods on Rack::Request. Request#method is actually Object#method(sym). You''re looking for "request_method" which returns a uppercase string of the request method name.', 0, 1),
(25, 9, 7, '2010-04-26 22:21:40', 1, 'Ah, then the README in the repository is misleading, because it shows this in the example:\r\n\r\nset.add_route FooApp, :method => ''get'', :path => %{/foo}', 0, 1),
(26, 9, 6, '2010-04-26 22:22:42', 1, '"README in the repository is misleading" - touché :)\r\n\r\nTry\r\n\r\nset.add_route Rack::Lobster.new, { :request_method => "GET", :path_info => %r{^/foo} }\r\nThe tests are probably a better source of examples: http://github.com/josh/rack-mount/blob/master/test/fixtures/basic_set_map_19.rb', 0, 1),
(27, 10, 8, '2010-04-26 22:25:38', 1, '', 0, 8),
(28, 10, 7, '2010-04-26 22:26:49', 1, 'I just integrated rack-mount into master. You should no longer use the plugin.\r\n', 7, 8),
(29, 10, 8, '2010-04-26 22:27:16', 6, 'Does this mean that rack-mount is bundled inside rails 3 now? I put it in vendor/plugins because I don''t want to install it to my Ruby LIB PATH', 7, 8),
(30, 10, 7, '2010-04-26 22:27:40', 9, 'Ok got it. I''ve just checked out the latest rack-mount and it''s working again now.\r\nCheers.', 7, 8),
(31, 11, 7, '2010-04-26 22:36:57', 1, '', 0, 6),
(32, 11, 8, '2010-04-26 22:38:26', 1, 'Universe contains broken packages for amd64 (and it is not the subject of this\r\nbugreport), and apt refuses to install them:\r\napt-get install konq-plugins\r\n............\r\nThe following packages have unmet dependencies:\r\n  konq-plugins: Depends: kdelibs4 (>= 4:3.3.2-1ubuntu8) but it is not going to\r\nbe installed', 0, 6),
(33, 11, 6, '2010-04-26 22:39:21', 1, 'Message-Id: <1067700102.458440.909.nullmailer@haimon.lan.henning.makholm.net>\r\nDate: Sat, 01 Nov 2003 15:21:42 +0000\r\nFrom: Henning Makholm <henning@makholm.net>\r\nTo: Debian Bug Tracking System <submit@bugs.debian.org>\r\nSubject: apt: misleading dependency problem message\r\n\r\nPackage: apt\r\nVersion: 0.5.14\r\nSeverity: normal\r\n\r\nIf, on system with the following installed, all current from unstable:\r\n\r\napt 0.5.14\r\nperl 5.8.1-4\r\nperl-modules 5.8.1-4 (provides libtile-temp-perl)\r\nautoconf 2.57-11', 0, 2),
(34, 11, 9, '2010-04-26 22:39:56', 1, 'Message-ID: <20031102184949.GC6350@dijkstra.csh.rit.edu>\r\nDate: Sun, 2 Nov 2003 13:49:49 -0500\r\nFrom: Matt Zimmerman <mdz@debian.org>\r\nTo: control@bugs.debian.org\r\nSubject: Re: Bug#218605: apt: misleading dependency problem message\r\n\r\nseverity 218605 minor\r\nretitle 218605 Error messages for broken packages are not always enlightening\r\nthanks', 0, 2),
(35, 11, 7, '2010-04-26 22:40:26', 1, 'This just can''t be an issue anymore?? The Debian bug is dated back in 2003.....And the Ubuntu one is 1+ years old, without any comments. Reject?', 0, 2),
(36, 11, 7, '2010-04-26 22:40:50', 6, 'I see this all the time, and I have to agree, it''s a pretty odd way to report a package conflict.', 7, 2),
(37, 5, 9, '2010-04-26 22:43:37', 1, 'I suggest we go by modifying the get_packages() function. I''m addigning it to me for the purpose.', 9, 6);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `bugName`, `description`, `affectedVersion`, `project`, `affectedProject`, `bugType`, `keywords`, `createdBy`, `createdAt`) VALUES
(1, 'Use "Install" keyword instead of "Restore" ', 'In the main dialog box, the second button is "Restore Packages or Upgrades".\r\nShould it be "Install updates/package upgrades"\r\n\r\nViews are invited.', '1.0, 1.1', 1, 0, 3, 'Ui', 8, '2010-04-26 04:29:47'),
(2, 'Create Signature - Browse button functionality ', 'Currently the browse button shows a folder tree, and allows the user to select a directory where he/she will store the signature. However this does not give anyone the ability to specify the filename to store the signature.\r\n\r\nOne alternate way is to have a predefined filename - {compname}.sig, but then again it also takes freedom of the user in some ways.\r\n\r\nA better alternative would be to use QFileDialog.getSaveFileName instead. http://twitpic.com/11v512 http://doc.trolltech.com/4.6/qfiledialog.html#getSaveFileName\r\n\r\nSay, the user wants to replace an old signature file, he just navigates to the path and pin points that file.', 'all', 1, 0, 2, 'functionality', 7, '2010-04-26 04:35:50'),
(3, 'Add a License Tab in the About Dialog ', 'At present the About Dialog has only\r\n* About\r\n* Author\r\n* Thanks To\r\n\r\nPlease add a "License" Tab.', '1.0', 1, 0, 4, 'Ui, Qt', 2, '2010-04-26 04:37:42'),
(4, 'Program crashes on startup', 'I downloaded pyroom 0.4.1, and when I start the program I get this message:\r\n\r\npyroom-0.4.1 $ LC_ALL=C ./pyroom\r\nTraceback (most recent call last):\r\n  File "./pyroom", line 35, in <module>\r\n    import sys, PyRoom.cmdline', '2.3', 2, 0, 2, 'crash', 2, '2010-04-26 04:41:08'),
(5, 'Wordcount reports extra words', 'A document containing "this doesn''t seem right" is reported as having 5 words, it looks like pyroom splits on an apostrophe.\r\n\r\nAlso, it looks like trailing space at the end of a document is counted as an additional word (this is rather minor, however).', '2.6', 2, 0, 2, 'text processing', 2, '2010-04-26 04:42:42'),
(6, 'Java Docs Package Won''t Install  ', 'Binary package hint: sun-java6-doc\r\n\r\nThis is also a problem with the java5 version of this package\r\n\r\nTrying to install these packages produces a message:\r\n\r\nSetting up sun-java6-doc (6-00-2ubuntu1) ...\r\nThis package is an installer package, it does not actually contain the\r\nJDK documentation. You will need to go download one of the\r\narchives:\r\n\r\n    jdk-6-doc.zip jdk-6-doc-ja.zip\r\n\r\n(choose the non-update version if this is the first installation).', 'all', 1, 0, 4, 'java', 8, '2010-04-26 04:47:50'),
(7, 'SVG support', 'As far as I know most platforms which support SVG support Canvas too. SVG is just another layer of complexity to what is looking like an awesome tool. In my opinion it''s better to focus dev on just Canvas.', 'all', 3, 0, 5, 'vector graphics', 2, '2010-04-26 22:13:56'),
(8, 'Events, texts, lines', 'What would be the difficulty in adding text to each particle? I have a personal project I would love to incorporate this into, but without being able to add labels, it would be difficult for users to know what''s going on.\r\n\r\nBeing able to draw lines between particles would also be useful, along with event handlers per particle (at the very least, associate a URL with them so that if I click on it, I could "drill down" or go to a page which explains what the user is looking at.', '1.2', 3, 0, 3, 'feature request', 2, '2010-04-26 22:14:53'),
(9, 'Unable to pass constraints to add_route', 'I seem to be unable to pass constraints to add_route, using the rake-mount from rubygems. Here''s the simplest code I have to show it:\r\n\r\nrequire "rack/mount"\r\nrequire "rack/lobster"\r\n\r\nroutes = Rack::Mount::RouteSet.new do |set|\r\n  set.add_route Rack::Lobster.new, :method => :GET, :path => "/"\r\nend\r\n\r\nrun routes', '2.1', 4, 0, 2, 'functionality', 7, '2010-04-26 22:20:47'),
(10, 'superclass mismatch for class URISegment (TypeError)', 'I encounter this error when running Rails 3 with Rack 1.0.1\r\n\r\n=> Booting WEBrick => Rails 3.0.pre application starting on http://0.0.0.0:3000} vendor/plugins/rack-mount/rails/route_set.rb:312:in `<class:RouteSet>'': superclass mismatch for class URISegment (TypeError)', '1.23', 4, 0, 2, 'runtime error', 8, '2010-04-26 22:25:38'),
(11, 'apt prints wrong error message when installing broken package', 'Universe contains broken packages for amd64 (and it is not the subject of this\r\nbugreport), and apt refuses to install them:\r\napt-get install konq-plugins\r\n............\r\nThe following packages have unmet dependencies:\r\n  konq-plugins: Depends: kdelibs4 (>= 4:3.3.2-1ubuntu8) but it is not going to\r\nbe installed\r\n                Depends: konqueror (>= 4:3.3.2) but it is not going to be installed\r\n                Depends: libkonq4 (>= 4:3.3.2) but it is not going to be installed\r\n                Depends: ark but it is not going to be installed', '2.2', 1, 0, 2, 'dependency issue ', 7, '2010-04-26 22:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `label`) VALUES
(5, 'Feature'),
(2, 'Defect'),
(3, 'Wishlist'),
(4, 'Requirement'),
(7, 'Enhancement');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE IF NOT EXISTS `priorities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `label`) VALUES
(1, 'Low'),
(2, 'High'),
(6, 'Medium'),
(7, 'TBD'),
(8, 'Urgent');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `owner`, `keywords`) VALUES
(1, 'Apt-Offline', 'apt-offline is an offline package management tool written in the Python Programming Language.\r\nThis program, as of now, is intended for people using Debian (And Debian based) systems. ', 9, 'python, qt'),
(2, 'PyRoom', 'PyRoom is a free editor that stays out your way - and keeps other things out of your way, too. As a fullscreen editor without buttons, widgets, formatting options, menus and with only the minimum of required dialog windows, it doesn''t have any distractions and lets you focus on writing and only writing.', 2, 'Python, Writing'),
(3, 'Three.js', 'A 3D graphics engine written in javascript, html5 using Canvas.', 2, 'javascript, canvas, html5'),
(4, 'Rack-Mount', 'A stackable dynamic tree based Rack router.\r\n\r\nRack::Mount supports Rack’s +X-Cascade+ convention to continue trying routes if the response returns pass. This allows multiple routes to be nested or stacked on top of each other. Since the application endpoint can trigger the router to continue matching, middleware can be used to add arbitrary conditions to any route. This allows you to route based on other request attributes, session information, or even data dynamically pulled from a database.', 2, 'Ruby');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `label`) VALUES
(1, 'open'),
(10, 'closed'),
(6, 'in progress'),
(9, 'fixed');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `is_admin`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@company.com', 1),
(7, 'akash', '5f4dcc3b5aa765d61d8327deb882cf99', 'Akash', 'akash@foo.com', 0),
(6, 'mrigank', '5f4dcc3b5aa765d61d8327deb882cf99', 'Mrigank', 'mrochan@gmail.com', 0),
(8, 'subhash', '5f4dcc3b5aa765d61d8327deb882cf99', 'Subhash', 'sub@foo.com', 0),
(9, 'abhishek', '5f4dcc3b5aa765d61d8327deb882cf99', 'Abhishek', 'ideamonk@gmail.com', 0);
