-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-04-16 04:56:39
-- 服务器版本： 5.5.57
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `message_board`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'zhangsan', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `poster` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `reply` text,
  `mail` varchar(60) NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `date`, `poster`, `message`, `reply`, `mail`, `ip`) VALUES
(1, '2018-04-09 02:36:27', '张三', '这是张三的留言', NULL, 'zhangsan@aa.com', '127.0.0.1'),
(2, '2018-04-09 02:38:38', '张三', '这是张三的留言', '这是给张三的回复0416', 'zhangsan@aa.com', '127.0.0.1'),
(3, '2018-04-09 02:42:25', '李四', '这是李四的留言', NULL, 'lisi@aa.com', '127.0.0.1'),
(4, '2018-04-09 02:42:57', '李四', '这是李四的留言', NULL, 'lisi@aa.com', '127.0.0.1'),
(5, '2018-04-09 02:49:10', '李四', '这是李四的留言', NULL, 'lisi@aa.com', '127.0.0.1'),
(6, '2018-04-09 02:52:40', '李四', '这是李四的留言', NULL, 'lisi@aa.com', '127.0.0.1'),
(7, '2018-04-09 02:55:24', '王五', 'wangwudeliuyan', NULL, 'wangwu@aa.com', '127.0.0.1'),
(8, '2018-04-15 13:29:30', '赵四', '赵四留言留言留言', NULL, 'zhaosi@aa.com', '127.0.0.1'),
(9, '2018-04-15 13:37:10', '', '在此处输入留言', NULL, '', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
