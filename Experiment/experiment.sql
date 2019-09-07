-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019-09-04 22:17:41
-- 服务器版本： 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `experiment`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `Aid` int(10) NOT NULL,
  `Apwd` varchar(50) NOT NULL,
  `Aname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`Aid`, `Apwd`, `Aname`) VALUES
(1, '1', 'root');

-- --------------------------------------------------------

--
-- 表的结构 `docker_container`
--

CREATE TABLE `docker_container` (
  `id` int(5) NOT NULL,
  `Container_id` varchar(100) NOT NULL,
  `student_id` int(10) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `Image_id` varchar(20) NOT NULL,
  `ip_num` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `docker_container`
--

INSERT INTO `docker_container` (`id`, `Container_id`, `student_id`, `ip`, `Image_id`, `ip_num`) VALUES
(7, 'd1a5f5e4be', 174804050, '172.19.0.4', 'd0ae770d2ba7', 4),
(10, '35407fd37e', 1, '172.19.0.6', 'c84426304f6b', 6),
(18, '4322401f12', 1, '172.19.0.7', '92f7bf669a99', 7),
(19, 'a85ef8ab89', 174804050, '172.19.0.8', 'c84426304f6b', 8),
(20, '1705f88b7b', 174804050, '172.19.0.9', '92f7bf669a99', 9),
(22, '3aad9a0bcd', 1, '172.19.0.10', 'd0ae770d2ba7', 10),
(23, '8ae91bcb8c', 2, '172.19.0.11', 'd0ae770d2ba7', 11),
(24, '9f5b6f80cb', 2, '172.19.0.12', 'c84426304f6b', 12);

-- --------------------------------------------------------

--
-- 表的结构 `docker_image`
--

CREATE TABLE `docker_image` (
  `Image_id` varchar(20) NOT NULL,
  `name` longtext,
  `time` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `docker_image`
--

INSERT INTO `docker_image` (`Image_id`, `name`, `time`, `status`) VALUES
('92f7bf669a99', 'jianhanke/desktop_auto_docker', '2019-08-15 21:21:16', 1),
('c84426304f6b', 'jianhanke/base_desktop_auto', '2019-08-20 21:22:28', 1),
('d0ae770d2ba7', 'jianhanke/desktop_false_hadoop', '2019-08-07 21:21:11', 1);

-- --------------------------------------------------------

--
-- 表的结构 `experiment`
--

CREATE TABLE `experiment` (
  `Eid` int(5) NOT NULL,
  `Ename` varchar(50) NOT NULL,
  `goal` longtext,
  `theory` longtext,
  `environment` longtext,
  `image_id` varchar(20) DEFAULT NULL,
  `outcome_model` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `experiment`
--

INSERT INTO `experiment` (`Eid`, `Ename`, `goal`, `theory`, `environment`, `image_id`, `outcome_model`) VALUES
(1, 'Hadoop实验', '学会搭建PHP', '了解web', 'Apache,php,Mysql', 'd0ae770d2ba7', 'my.jpg'),
(2, 'Linux操作', 'PHP连接数据库', '连接Mysql', 'Mysql,PHP', 'c84426304f6b', '2.jpg'),
(3, 'Docker命令行', NULL, NULL, NULL, '92f7bf669a99', '3.jpg'),
(4, 'fdsafas', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `Sid` int(10) NOT NULL,
  `Sname` varchar(50) DEFAULT NULL,
  `Sage` int(3) DEFAULT NULL,
  `Ssex` varchar(3) DEFAULT NULL,
  `Stele` bigint(11) DEFAULT NULL,
  `Spwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`Sid`, `Sname`, `Sage`, `Ssex`, `Stele`, `Spwd`) VALUES
(1, 'root', 32, '男', 1, '1'),
(2, '测试', 66, '男', 322432432, '2'),
(174804050, '小王', 20, '女', 18337299830, '1'),
(174804055, '张三', 33, '男', 13952468542, '1');

-- --------------------------------------------------------

--
-- 表的结构 `student_experiment`
--

CREATE TABLE `student_experiment` (
  `Sid` int(10) NOT NULL,
  `Eid` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `IS_avtive` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student_experiment`
--

INSERT INTO `student_experiment` (`Sid`, `Eid`, `status`, `IS_avtive`) VALUES
(1, 1, 1, 1),
(1, 2, 1, 1),
(1, 3, 1, 1),
(2, 1, 1, 1),
(2, 2, 1, 1),
(174804050, 1, 1, 1),
(174804050, 2, 1, 1),
(174804050, 3, 1, 1);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `view_containerwithstuandexper`
-- (See below for the actual view)
--
CREATE TABLE `view_containerwithstuandexper` (
`id` int(5)
,`Container_id` varchar(100)
,`student_id` int(10)
,`ip` varchar(15)
,`Image_id` varchar(20)
,`ip_num` int(5)
,`Sid` int(10)
,`Sname` varchar(50)
,`name` longtext
,`Eid` int(5)
,`Ename` varchar(50)
);

-- --------------------------------------------------------

--
-- 视图结构 `view_containerwithstuandexper`
--
DROP TABLE IF EXISTS `view_containerwithstuandexper`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_containerwithstuandexper`  AS  select `t1`.`id` AS `id`,`t1`.`Container_id` AS `Container_id`,`t1`.`student_id` AS `student_id`,`t1`.`ip` AS `ip`,`t1`.`Image_id` AS `Image_id`,`t1`.`ip_num` AS `ip_num`,`t2`.`Sid` AS `Sid`,`t2`.`Sname` AS `Sname`,`t3`.`name` AS `name`,`t4`.`Eid` AS `Eid`,`t4`.`Ename` AS `Ename` from (((`docker_container` `t1` join `student` `t2`) join `docker_image` `t3`) join `experiment` `t4`) where ((`t1`.`student_id` = `t2`.`Sid`) and (`t1`.`Image_id` = `t3`.`Image_id`) and (`t1`.`Image_id` = `t4`.`image_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `docker_container`
--
ALTER TABLE `docker_container`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docker_image`
--
ALTER TABLE `docker_image`
  ADD PRIMARY KEY (`Image_id`);

--
-- Indexes for table `experiment`
--
ALTER TABLE `experiment`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Sid`);

--
-- Indexes for table `student_experiment`
--
ALTER TABLE `student_experiment`
  ADD PRIMARY KEY (`Sid`,`Eid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `docker_container`
--
ALTER TABLE `docker_container`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用表AUTO_INCREMENT `experiment`
--
ALTER TABLE `experiment`
  MODIFY `Eid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `Sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174804056;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
