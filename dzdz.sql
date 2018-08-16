-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-06-24 15:53:29
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dzdz`
--

-- --------------------------------------------------------

--
-- 替换视图以便查看 `count_opinion`
--
CREATE TABLE IF NOT EXISTS `count_opinion` (
`user_id` int(11)
,`count` bigint(21)
);
-- --------------------------------------------------------

--
-- 表的结构 `dzdz_hero`
--

CREATE TABLE IF NOT EXISTS `dzdz_hero` (
  `hero_id` smallint(11) NOT NULL AUTO_INCREMENT,
  `heroName` varchar(25) NOT NULL,
  `logURL` varchar(100) NOT NULL,
  PRIMARY KEY (`hero_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `dzdz_hero`
--

INSERT INTO `dzdz_hero` (`hero_id`, `heroName`, `logURL`) VALUES
(1, 'BaiLishouyue', '/CI_Forum/images/heroes/BaiLishouyue.jpg'),
(2, 'GongSunli', '/CI_Forum/images/heroes/GongSunli.jpg'),
(5, 'PeiQinghu', '/CI_Forum/images/heroes/PeiQinghu.jpg'),
(6, 'Kai', '/CI_Forum/images/heroes/Kai.jpg'),
(11, 'SunWukong', '/CI_Forum/images/heroes/SunWukong.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `dzdz_heroinfo`
--

CREATE TABLE IF NOT EXISTS `dzdz_heroinfo` (
  `hero_id` smallint(6) NOT NULL,
  `heroType` tinyint(4) NOT NULL,
  `viability` tinyint(4) NOT NULL,
  `attackDamage` tinyint(4) NOT NULL,
  `skillEffect` tinyint(4) NOT NULL,
  `difficultStarted` tinyint(4) NOT NULL,
  `log1` varchar(100) NOT NULL,
  `log2` varchar(100) NOT NULL,
  `bg1` varchar(100) NOT NULL,
  `bg2` varchar(100) NOT NULL,
  UNIQUE KEY `hero_id` (`hero_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `dzdz_heroinfo`
--

INSERT INTO `dzdz_heroinfo` (`hero_id`, `heroType`, `viability`, `attackDamage`, `skillEffect`, `difficultStarted`, `log1`, `log2`, `bg1`, `bg2`) VALUES
(1, 5, 20, 70, 40, 70, '/CI_FORUM/images/heroes/BaiLishouyue/QuietEye.jpg', '/CI_FORUM/images/heroes/BaiLishouyue/Agent.jpg', '/CI_FORUM/images/heroes/BaiLishouyue/BLSY1.jpg', '/CI_FORUM/images/heroes/BaiLishouyue/BLSY2.jpg'),
(2, 5, 20, 80, 30, 70, '/CI_FORUM/images/heroes/GongSunli/Flower.jpg', '/CI_FORUM/images/heroes/GongSunli/Fantasy.jpg', '/CI_FORUM/images/heroes/GongSunli/GSL1.jpg', '/CI_FORUM/images/heroes/GongSunli/GSL2.jpg'),
(5, 1, 40, 80, 50, 70, '/CI_Forum/images/heroes/PeiQinghu/log1.jpg', '/CI_Forum/images/heroes/PeiQinghu/log2.jpg', '/CI_Forum/images/heroes/PeiQinghu/bg1.jpg', '/CI_Forum/images/heroes/PeiQinghu/bg2.jpg'),
(6, 1, 70, 70, 40, 20, '/CI_Forum/images/heroes/Kai/193-smallskin-1.jpg', '/CI_Forum/images/heroes/Kai/193-smallskin-3.jpg', '/CI_Forum/images/heroes/Kai/0 (1).jpg', '/CI_Forum/images/heroes/Kai/0.jpg'),
(11, 1, 50, 80, 50, 40, '/CI_Forum/images/heroes/SunWukong/167-smallskin-1.jpg', '/CI_Forum/images/heroes/SunWukong/167-smallskin-5.jpg', '/CI_Forum/images/heroes/SunWukong/0 (5).jpg', '/CI_Forum/images/heroes/SunWukong/0 (4).jpg');

-- --------------------------------------------------------

--
-- 表的结构 `dzdz_login`
--

CREATE TABLE IF NOT EXISTS `dzdz_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `userType` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `dzdz_login`
--

INSERT INTO `dzdz_login` (`id`, `username`, `password`, `userType`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, '571878', 'e10adc3949ba59abbe56e057f20f883e', 0),
(8, 'qq123456', 'e10adc3949ba59abbe56e057f20f883e', 0),
(9, 'ad', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- 表的结构 `dzdz_opinion`
--

CREATE TABLE IF NOT EXISTS `dzdz_opinion` (
  `user_id` int(11) NOT NULL,
  `opin_id` int(11) NOT NULL AUTO_INCREMENT,
  `opin_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `content` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `situation` int(1) NOT NULL DEFAULT '0',
  `note` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'null',
  PRIMARY KEY (`opin_id`),
  KEY `user_id_fk` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `dzdz_opinion`
--

INSERT INTO `dzdz_opinion` (`user_id`, `opin_id`, `opin_name`, `content`, `situation`, `note`) VALUES
(6, 2, 'UI', 'change to beautiful', 2, 'just beautiful'),
(6, 4, 'hello', 'change to beautiful', 0, 'null'),
(6, 5, 'Eric', 'change ', 0, 'null'),
(8, 6, 'asda', 'dasdasdasd', 0, 'null'),
(9, 7, 'dasd asd', 'dsasadasd', 0, 'null'),
(8, 8, 'ddd', 'gasga', 0, 'null');

-- --------------------------------------------------------

--
-- 表的结构 `dzdz_userinfo`
--

CREATE TABLE IF NOT EXISTS `dzdz_userinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `game_field` varchar(50) NOT NULL,
  `common_heroes` varchar(50) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `phone` char(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `dzdz_userinfo`
--

INSERT INTO `dzdz_userinfo` (`id`, `name`, `game_field`, `common_heroes`, `qq`, `phone`) VALUES
(6, 'zhang', '204', 'huangzhong', '57187811', '57178'),
(8, 'tttt', '89', 'Huangzhong', '132465', '132465'),
(9, 'DASD', '89', 'huangzhong', '571878', '147258');

-- --------------------------------------------------------

--
-- 表的结构 `dzdz_video`
--

CREATE TABLE IF NOT EXISTS `dzdz_video` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `vName` varchar(50) NOT NULL,
  `picURL` varchar(100) NOT NULL,
  `vURL` varchar(100) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `dzdz_video`
--

INSERT INTO `dzdz_video` (`v_id`, `vName`, `picURL`, `vURL`) VALUES
(2, '[FabledGenius]TheThirdPeriod', '/CI_Forum/images/video/[FabledGenius]TheThirdPeriod.jpg', '/CI_Forum/images/video/[FabledGenius]TheThirdPeriod.mp4'),
(7, 'MonkeyPentaKill', '/CI_Forum/images/video/MonkeyPentaKill.jpg', '/CI_Forum/images/video/MonkeyPentaKill.mp4'),
(8, 'MulanPentaKill', '/CI_Forum/images/video/MulanPentaKill.jpg', '/CI_Forum/images/video/MulanPentaKill.mp4'),
(10, 'GongsunliPentaKill', '/CI_Forum/images/video/GongsunliPentaKill.jpg', '/CI_Forum/images/video/GongsunliPentaKill.mp4');

-- --------------------------------------------------------

--
-- 表的结构 `dzdz_wallpaper`
--

CREATE TABLE IF NOT EXISTS `dzdz_wallpaper` (
  `wp_id` int(11) NOT NULL AUTO_INCREMENT,
  `wpName` varchar(50) NOT NULL,
  `wpURL` varchar(100) NOT NULL,
  PRIMARY KEY (`wp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `dzdz_wallpaper`
--

INSERT INTO `dzdz_wallpaper` (`wp_id`, `wpName`, `wpURL`) VALUES
(4, 'BeachLiying-ZhongWuyan', '/CI_Forum/images/wallpaper/BeachLiying-ZhongWuyan.jpg'),
(5, 'JiangZiya-FashionGodfather', '/CI_Forum/images/wallpaper/JiangZiya-FashionGodfather.jpg'),
(6, 'Kai-TwilightKeeper', '/CI_Forum/images/wallpaper/Kai-TwilightKeeper.jpg'),
(7, 'LiBai-QinglianLegend', '/CI_Forum/images/wallpaper/LiBai-QinglianLegend.jpg'),
(8, 'Mulan-YouthSeason', '/CI_Forum/images/wallpaper/Mulan-YouthSeason.jpg'),
(9, 'Snow-seekingMei-Comet', '/CI_Forum/images/wallpaper/Snow-seekingMei-Comet.jpg'),
(10, 'SunShangxiang-Powerofcalm', '/CI_Forum/images/wallpaper/SunShangxiang-Powerofcalm.jpg'),
(11, 'Tigers-Messi', '/CI_Forum/images/wallpaper/Tigers-Messi.jpg');

-- --------------------------------------------------------

--
-- 视图结构 `count_opinion`
--
DROP TABLE IF EXISTS `count_opinion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `count_opinion` AS select `dzdz_opinion`.`user_id` AS `user_id`,count(`dzdz_opinion`.`opin_id`) AS `count` from `dzdz_opinion` group by `dzdz_opinion`.`user_id`;

--
-- 限制导出的表
--

--
-- 限制表 `dzdz_heroinfo`
--
ALTER TABLE `dzdz_heroinfo`
  ADD CONSTRAINT `hero_id_fk` FOREIGN KEY (`hero_id`) REFERENCES `dzdz_hero` (`hero_id`);

--
-- 限制表 `dzdz_opinion`
--
ALTER TABLE `dzdz_opinion`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `dzdz_login` (`id`);

--
-- 限制表 `dzdz_userinfo`
--
ALTER TABLE `dzdz_userinfo`
  ADD CONSTRAINT `id_fk` FOREIGN KEY (`id`) REFERENCES `dzdz_login` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
