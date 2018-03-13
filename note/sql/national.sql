-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 10 月 19 日 03:24
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `national`
--

-- --------------------------------------------------------

--
-- 表的结构 `adminuser`
--

CREATE TABLE IF NOT EXISTS `adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'leslie');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(10) NOT NULL,
  `fid` int(11) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  `isshow` tinyint(1) DEFAULT '0',
  `ordernum` smallint(3) DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `cname`, `fid`, `deleted`, `isshow`, `ordernum`) VALUES
(1, '摄影', 0, 0, 1, 1),
(2, '文化', 0, 0, 0, 2),
(3, '环境', 0, 0, 0, 3),
(4, '旅游', 0, 0, 0, 4),
(5, '摄影大赛', 1, 0, 0, 50),
(6, '获奖作品', 1, 0, 0, 50),
(7, '中华传统', 2, 0, 0, 50),
(8, '欧美历史', 2, 0, 0, 50),
(9, '环境保护', 3, 0, 0, 50),
(10, '植树活动', 3, 0, 0, 50),
(11, '厦门之行', 4, 0, 0, 50),
(12, '旅游攻略', 4, 0, 0, 22),
(13, '人文', 0, 0, 1, 5),
(14, '动物', 0, 0, 1, 6),
(15, '探险', 0, 0, 0, 7),
(16, '科技', 0, 0, 1, 8);

-- --------------------------------------------------------

--
-- 表的结构 `photography`
--

CREATE TABLE IF NOT EXISTS `photography` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `content` text,
  `imagename` varchar(40) DEFAULT NULL,
  `pubtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0',
  `clicknum` int(11) DEFAULT '0',
  `adminid` int(11) DEFAULT NULL,
  `fcid` int(11) NOT NULL,
  `cateid` int(11) DEFAULT NULL,
  `recommend` tinyint(1) DEFAULT '0',
  `dayphoto` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `photography`
--

INSERT INTO `photography` (`id`, `title`, `content`, `imagename`, `pubtime`, `deleted`, `clicknum`, `adminid`, `fcid`, `cateid`, `recommend`, `dayphoto`) VALUES
(1, '电饭锅电饭锅', '大概', '58042bb0da492.jpg', '2016-10-17 01:38:56', 0, 0, 1, 1, 6, 0, 0),
(2, '大概地方', '大锅饭', '58042bb9dd592.jpg', '2016-10-17 01:39:05', 0, 0, 1, 2, 7, 0, 0),
(3, '电饭锅电饭锅', '大概', '58042bc4b3be4.jpg', '2016-10-17 01:42:04', 0, 0, 1, 2, 8, 1, 0),
(4, '大概', '大概', '58042bd10a152.jpg', '2016-10-17 01:42:02', 0, 0, 1, 4, 12, 1, 0),
(5, '豆腐干豆腐', '大概', '58042bd9ad1a1.jpg', '2016-10-17 01:39:37', 0, 0, 1, 1, 6, 0, 0),
(6, '大范甘迪', '大概', '58042be313277.jpg', '2016-10-17 01:42:01', 0, 0, 1, 1, 6, 1, 0),
(7, '大范甘迪', '大概', '58042bedc2fed.jpg', '2016-10-17 01:39:57', 0, 0, 1, 3, 10, 0, 0),
(8, '地方郭德纲的', '大概', '58042bf843d73.jpg', '2016-10-17 01:42:00', 0, 0, 1, 1, 6, 1, 0),
(9, '梵蒂冈和地方', '发货', '58042c046f41b.jpg', '2016-10-17 01:40:20', 0, 0, 1, 2, 8, 0, 0),
(10, '需不需', '', '58042c114681d.jpg', '2016-10-17 01:40:33', 0, 0, 1, 0, NULL, 0, 1),
(11, '需不需', '下次vbx', '58042c1cea14b.jpg', '2016-10-17 01:40:44', 0, 0, 1, 0, NULL, 0, 1),
(12, '小葱拌豆腐', '下次VB', '58042c2798c7b.jpg', '2016-10-17 01:40:55', 0, 0, 1, 0, NULL, 0, 1),
(13, '想不出vbx', '续保', '58042c3505040.jpg', '2016-10-17 01:41:09', 0, 0, 1, 0, NULL, 0, 1),
(14, '的更好的发挥', '发货', '58042c42d42bb.jpg', '2016-10-17 01:41:22', 0, 0, 1, 0, NULL, 0, 1),
(15, '法规和地方', '发货', '58042c4bac514.jpg', '2016-10-17 01:41:31', 0, 0, 1, 0, NULL, 0, 1),
(16, '啥地方郭德纲', '大概', '580434fb7ad41.jpg', '2016-10-17 02:18:35', 0, 0, 1, 0, NULL, 0, 1),
(17, '地方郭德纲', '大概', '58043505eb941.jpg', '2016-10-17 02:18:45', 0, 0, 1, 0, NULL, 0, 1),
(18, '电饭锅电饭锅', '电饭锅电饭锅', '5804350f2dc82.jpg', '2016-10-17 02:18:55', 0, 0, 1, 0, NULL, 0, 1),
(19, '电饭锅电饭锅', '大概', '5804351a8250b.jpg', '2016-10-17 02:19:06', 0, 0, 1, 0, NULL, 0, 1),
(20, '电饭锅电饭锅', '大概', '5804352602e27.jpg', '2016-10-17 02:19:18', 0, 0, 1, 0, NULL, 0, 1),
(21, '电饭锅电饭锅', '大概', '580435358da5a.jpg', '2016-10-17 02:19:33', 0, 0, 1, 0, NULL, 0, 1),
(22, '刚发的鬼地方个', '官方回复的话', '58043540399ca.jpg', '2016-10-17 02:19:44', 0, 0, 1, 0, NULL, 0, 1),
(23, '房管局和法国', '防护服', '58043549cbbfc.jpg', '2016-10-17 02:19:53', 0, 0, 1, 0, NULL, 0, 1),
(24, '梵蒂冈和地方和', '对方过后', '5804355680461.jpg', '2016-10-17 02:20:06', 0, 0, 1, 0, NULL, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
