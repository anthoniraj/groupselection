SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `csevit`
--
CREATE DATABASE `csevit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `csevit`;

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `groupid` varchar(4) character set utf8 collate utf8_bin NOT NULL,
  `topic` varchar(250) character set utf8 collate utf8_bin NOT NULL,
  `description` text character set utf8 collate utf8_bin NOT NULL,
  `count` int(3) NOT NULL,
  PRIMARY KEY  (`groupid`),
  KEY `topic` (`topic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `username` varchar(100) character set utf8 NOT NULL,
  `password` varchar(50) character set utf8 NOT NULL,
  `regno` varchar(15) character set utf8 NOT NULL,
  `name` varchar(100) character set utf8 NOT NULL,
  `topic` varchar(250) character set utf8 NOT NULL,
  `groupid` varchar(4) character set utf8 collate utf8_bin NOT NULL default '0',
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
