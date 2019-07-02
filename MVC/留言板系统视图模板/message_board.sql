-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-05-27 16:36:15
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
  `mail` varchar(60) DEFAULT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `date`, `poster`, `message`, `reply`, `mail`, `ip`) VALUES
(1, '2018-04-09 02:36:27', '张三', '老师您好，我是一名大三学生，马上就大四了，想申请助学贷款，不知道需要哪些程序~谢谢 ', '这个程序比较长一些，要看你是否贫困生，贫困生等级，以及是否有家庭所在地的民政局证明之类，具体详情你可以打22866617、22866618电话咨询，或直接向辅导员咨询。', 'zhangsan@aa.com', '127.0.0.1'),
(2, '2018-04-09 02:38:38', '王鹏', '你好，请问要怎么申请勤工助学岗位 ', '可以向辅导员提出申请，或是校内的各个部门有发布勤工俭学通知时前去应聘，第三个渠道是直接到学生处学生资助管理中心进行报名审核。', 'wangpeng@aa.com', '127.0.0.1'),
(3, '2018-04-09 02:42:25', '徐明', '老师您好 请问为什么现在在预注册系统中查不到自己的宿舍情况？ ', '今年学校准备进行一次集中式调整，目前方案正在进行中，故你们无法查到住宿情况，但无需担心，到校会安排妥当的~！', 'xuming@aa.com', '127.0.0.1'),
(4, '2018-04-09 02:42:57', '张亚伦', '老师你好:我是2012年的新生 想买8月末的火车票 不知道在哪办理学生火车票优惠卡？  谢谢  ', '办理学生火车优惠卡是要到校后才能办理的，你还没入学还未注册，不能算高校学生，还无法办理，请到校后统一办理~\r\n', 'yalunzhang@aa.com', '127.0.0.1'),
(5, '2018-04-09 02:49:10', '周润忠', '老师   您好   我是今年的新生  我想请问一下和录取通知书一起寄到的银行卡的密码是多少   需要自己改密吗？ \r\n学费之类的钱存入银行就可以了吗？  还是需要别的什么工作？ ', '没有初始密码，考生需持本人身份证到工行激活，然后自行设置密码。 \r\n激活成功之后将学费存入卡中即可，其他无需要准备~', 'runzhongzhou@aa.com', '127.0.0.1'),
(6, '2018-04-09 02:52:40', '冯海林', '这学期的奖学金怎么还没开始评啊，一点动静都没有，这周不是都第九周了吗 ', '不对呀，都快评完了，怎么会没动静呢？哪个学院的？\r\n', 'hailinfeng@aa.com', '127.0.0.1'),
(7, '2018-04-09 02:55:24', '高明', '终于可以留言了，哎！！ ', '是学校主页改版了，留言版链接更换，所以有段时间无法直接链接了，抱歉~\r\n', 'gaoming@aa.com', '127.0.0.1'),
(8, '2018-04-15 13:29:30', '程凡', '请问老师，为什么现在我们的学生证贴不了磁条，不是随时都可以贴的吗？这样我们回家也打不了折啊~~~谢谢！！ ', '今年铁道部有新的规定，都有磁条，但是限定次数和车程了~\r\n', 'chengfan@aa.com', '127.0.0.1'),
(9, '2018-04-15 13:37:10', '张明', '您好，我想查询饭卡详细消费记录，请问您怎么查？', '持本人的学生证到财务处一卡通中心可以查明细帐目', 'gaoshang@qq.com', '127.0.0.1'),
(10, '2018-05-27 15:12:50', '彭建峰', '很久没有在这里留言了~', '欢迎常来', 'jianfengfeng@qq.com', '127.0.0.1');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
