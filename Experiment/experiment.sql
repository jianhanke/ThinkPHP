/*
Navicat MySQL Data Transfer

Source Server         : locallhost
Source Server Version : 50557
Source Host           : localhost:3306
Source Database       : experiment

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2019-09-17 19:59:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Aid` int(10) NOT NULL AUTO_INCREMENT,
  `Apwd` varchar(50) NOT NULL,
  `Aname` varchar(50) NOT NULL,
  PRIMARY KEY (`Aid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1', 'root');

-- ----------------------------
-- Table structure for chapter
-- ----------------------------
DROP TABLE IF EXISTS `chapter`;
CREATE TABLE `chapter` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `to_image` varchar(50) DEFAULT NULL,
  `to_course` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chapter
-- ----------------------------
INSERT INTO `chapter` VALUES ('1', 'MySql第一章节', '57b6a90d6f8b', '1');
INSERT INTO `chapter` VALUES ('2', 'MySql的第二章节', '57b6a90d6f8b', '1');
INSERT INTO `chapter` VALUES ('3', 'MySql第三个章节', '57b6a90d6f8b', '1');
INSERT INTO `chapter` VALUES ('4', 'Oracle第一个章节', null, '2');
INSERT INTO `chapter` VALUES ('5', 'Oracle章节第二个', null, '2');
INSERT INTO `chapter` VALUES ('6', 'Oracle章节第三个', null, '2');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `cid` int(5) NOT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `introduce` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `to_teacher_id` int(10) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', 'MySql', '简单的MySql数据库', '1', '1', '1.jpg');
INSERT INTO `course` VALUES ('2', 'Oracle', 'Oracle数据库操作', '1', '1', '2.jpg');

-- ----------------------------
-- Table structure for docker_container
-- ----------------------------
DROP TABLE IF EXISTS `docker_container`;
CREATE TABLE `docker_container` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Container_id` varchar(100) NOT NULL,
  `student_id` int(10) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `Image_id` varchar(20) NOT NULL,
  `ip_num` int(5) DEFAULT NULL,
  `to_chapter` varchar(50) DEFAULT NULL,
  `doc` varchar(50) DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docker_container
-- ----------------------------
INSERT INTO `docker_container` VALUES ('7', 'd1a5f5e4be', '174804050', '172.19.0.4', 'd0ae770d2ba7', '4', null, null, null, null);


-- ----------------------------
-- Table structure for docker_image
-- ----------------------------
DROP TABLE IF EXISTS `docker_image`;
CREATE TABLE `docker_image` (
  `Image_id` varchar(20) NOT NULL,
  `name` longtext,
  `time` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of docker_image
-- ----------------------------
INSERT INTO `docker_image` VALUES ('2483c90480a4', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/my_oracle', null, '1');
INSERT INTO `docker_image` VALUES ('57b6a90d6f8b', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/my_mysql', null, '1');
INSERT INTO `docker_image` VALUES ('92f7bf669a99', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/desktop_auto_docker', '2019-08-15 21:21:16', '1');
INSERT INTO `docker_image` VALUES ('c84426304f6b', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/base_desktop_auto', '2019-08-20 21:22:28', '1');
INSERT INTO `docker_image` VALUES ('d0ae770d2ba7', 'registry.cn-hangzhou.aliyuncs.com/jianhanke/desktop_false_hadoop', '2019-08-07 21:21:11', '1');

-- ----------------------------
-- Table structure for experiment
-- ----------------------------
DROP TABLE IF EXISTS `experiment`;
CREATE TABLE `experiment` (
  `Eid` int(5) NOT NULL AUTO_INCREMENT,
  `Ename` varchar(50) NOT NULL,
  `goal` longtext,
  `theory` longtext,
  `environment` longtext,
  `image_id` varchar(20) DEFAULT NULL,
  `outcome_model` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Eid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of experiment
-- ----------------------------
INSERT INTO `experiment` VALUES ('1', 'Hadoop实验', '学会搭建PHP', '了解web', 'Apache,php,Mysql', 'd0ae770d2ba7', 'my.jpg');
INSERT INTO `experiment` VALUES ('2', 'Linux操作', 'PHP连接数据库', '连接Mysql', 'Mysql,PHP', 'c84426304f6b', '2.jpg');
INSERT INTO `experiment` VALUES ('3', 'Docker命令行', null, null, null, '92f7bf669a99', '3.jpg');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `Sid` int(10) NOT NULL AUTO_INCREMENT,
  `Sname` varchar(50) DEFAULT NULL,
  `Sage` int(3) DEFAULT NULL,
  `Ssex` varchar(3) DEFAULT NULL,
  `Stele` bigint(11) DEFAULT NULL,
  `Spwd` varchar(50) NOT NULL,
  PRIMARY KEY (`Sid`)
) ENGINE=InnoDB AUTO_INCREMENT=174804056 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', 'root', '32', '男', '1', '1');
INSERT INTO `student` VALUES ('2', '测试', '66', '男', '322432432', '2');
INSERT INTO `student` VALUES ('174804050', '小王', '20', '女', '18337299830', '1');
INSERT INTO `student` VALUES ('174804055', '张三', '33', '男', '13952468542', '1');

-- ----------------------------
-- Table structure for student_chapter
-- ----------------------------
DROP TABLE IF EXISTS `student_chapter`;
CREATE TABLE `student_chapter` (
  `sid` int(10) DEFAULT NULL,
  `cid` int(5) DEFAULT NULL,
  `upload_file` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student_chapter
-- ----------------------------


-- ----------------------------
-- Table structure for student_experiment
-- ----------------------------
DROP TABLE IF EXISTS `student_experiment`;
CREATE TABLE `student_experiment` (
  `Sid` int(10) NOT NULL,
  `Eid` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `IS_avtive` int(1) DEFAULT '1',
  PRIMARY KEY (`Sid`,`Eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student_experiment
-- ----------------------------


-- ----------------------------
-- View structure for view_containerwithstuandexper
-- ----------------------------
DROP VIEW IF EXISTS `view_containerwithstuandexper`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_containerwithstuandexper` AS select `t1`.`id` AS `id`,`t1`.`Container_id` AS `Container_id`,`t1`.`student_id` AS `student_id`,`t1`.`ip` AS `ip`,`t1`.`Image_id` AS `Image_id`,`t1`.`ip_num` AS `ip_num`,`t2`.`Sid` AS `Sid`,`t2`.`Sname` AS `Sname`,`t3`.`name` AS `name`,`t4`.`Eid` AS `Eid`,`t4`.`Ename` AS `Ename` from (((`docker_container` `t1` join `student` `t2`) join `docker_image` `t3`) join `experiment` `t4`) where ((`t1`.`student_id` = `t2`.`Sid`) and (`t1`.`Image_id` = `t3`.`Image_id`) and (`t1`.`Image_id` = `t4`.`image_id`)) ;

-- ----------------------------
-- View structure for view_coursetochapter
-- ----------------------------
DROP VIEW IF EXISTS `view_coursetochapter`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_coursetochapter` AS select `t1`.`id` AS `id`,`t1`.`name` AS `name`,`t1`.`to_image` AS `to_image`,`t1`.`to_course` AS `to_course`,`t2`.`cname` AS `cname` from (`chapter` `t1` join `course` `t2`) where (`t2`.`cid` = `t1`.`to_course`) ;
