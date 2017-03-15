/*
Navicat MySQL Data Transfer

Source Server         : root's local database
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : library_db

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-06-12 12:26:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `administrator`
-- ----------------------------
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `adminurn` varchar(20) DEFAULT NULL,
  `adminpwd` varchar(20) DEFAULT NULL,
  `adminlevel` varchar(8) DEFAULT NULL,
  `adminemail` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administrator
-- ----------------------------

-- ----------------------------
-- Table structure for `book`
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publisher_id` varchar(8) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `booklevel` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES ('6', '深入理解计算机系统', '978-7-111-32133-0', 'Randal E.Bryant', '3', '99.00', '1');
INSERT INTO `book` VALUES ('8', '马克思主义基本原理概论', '978-7-04-037745-3', '本书编写组', '8', '21.00', '1');
INSERT INTO `book` VALUES ('5', '数据库系统概念·第六版', '978-7-111-37529-6', 'Abraham Silberschatz', '1', '99.00', '1');
INSERT INTO `book` VALUES ('9', 'GRE写作5.5', '978-7-5600-4435-4', '李建林', '12', '33.00', '1');
INSERT INTO `book` VALUES ('10', '钢笔字循序练习册', '7-80530-367-3', '朱涛', '14', '10.00', '1');
INSERT INTO `book` VALUES ('11', 'Java编程思想', '978-7-111-21382-6', 'Bruce Eckel', '3', '108.00', '1');
INSERT INTO `book` VALUES ('12', '英语词汇的奥秘升级版', '978-7-5078-3165-8', '蒋争', '13', '38.00', '1');
INSERT INTO `book` VALUES ('13', 'C++ Primer Plus', '978-7-115-27946-0', 'Stephen Prata', '6', '99.00', '1');
INSERT INTO `book` VALUES ('14', '苹果达人：Mac OS X玩家秘籍', '978-7-115-22736-2', 'Buick', '6', '59.00', '1');
INSERT INTO `book` VALUES ('15', '高等数学 第六版 上册', '978-7-04-020549-7', '同济大学数学系', '8', '27.60', '1');
INSERT INTO `book` VALUES ('16', '概率论教程', '978-7-111-30289-6', 'Kai Lai Chung', '3', '49.00', '1');
INSERT INTO `book` VALUES ('17', '演讲的艺术', '978-7-5600-9239-3', 'Stepen E.Lucas', '12', '48.90', '1');
INSERT INTO `book` VALUES ('18', 'Effective C++', '7-1212-02909-X', 'Scott Meyers', '11', '58.00', '1');
INSERT INTO `book` VALUES ('19', '自控力', '978-7-5142-0503-9', '凯利&middot;麦格尼格尔', '10', '39.80', '1');
INSERT INTO `book` VALUES ('20', '艺术的故事', '978-7-80746-372-6', '贡布里希', '9', '280.00', '1');
INSERT INTO `book` VALUES ('21', '数据库系统概念·第五版', '978-7-04-019245-2', 'Abraham Silberschatz', '8', '72.00', '1');
INSERT INTO `book` VALUES ('22', '社会学·第十一版', '978-7-300-08078-9', '戴维&middot;波普诺', '7', '98.00', '1');
INSERT INTO `book` VALUES ('23', '离散数学', '978-7-115-25305-7', '赵一鸣 阚海斌 吴永辉', '6', '35.00', '1');
INSERT INTO `book` VALUES ('24', '计算机系统基础', '978-7-111-46477-8', '袁春风', '3', '49.00', '1');
INSERT INTO `book` VALUES ('25', '线性代数', '7-308-01316-2', '孙兰芬 陈一巾', '5', '9.00', '1');
INSERT INTO `book` VALUES ('26', '3500 Words SAT 巴朗词表', '978-7-5605-5328-3', '余任唐', '4', '40.00', '1');
INSERT INTO `book` VALUES ('87', '盗墓笔记1·七星鲁王宫', '978-7-807-40727-0', '南派三叔', '15', '19.20', '1');
INSERT INTO `book` VALUES ('88', '盗墓笔记2·秦岭神树', '978-7-807-40727-1', '南派三叔', '15', '19.30', '1');
INSERT INTO `book` VALUES ('89', '盗墓笔记3·云顶天宫', '978-7-807-40727-2', '南派三叔', '15', '19.40', '1');
INSERT INTO `book` VALUES ('90', '盗墓笔记4·蛇沼鬼城', '978-7-807-40727-3', '南派三叔', '15', '19.50', '1');
INSERT INTO `book` VALUES ('91', '盗墓笔记5·谜海归巢', '978-7-807-40727-4', '南派三叔', '15', '19.60', '1');
INSERT INTO `book` VALUES ('92', '盗墓笔记6·阴山古楼', '978-7-807-40727-5', '南派三叔', '15', '19.70', '1');
INSERT INTO `book` VALUES ('93', '盗墓笔记7·邛笼石影', '978-7-807-40727-6', '南派三叔', '15', '24.70', '1');
INSERT INTO `book` VALUES ('94', '盗墓笔记8·大结局（上）', '978-7-807-40727-7', '南派三叔', '15', '25.70', '1');
INSERT INTO `book` VALUES ('95', '盗墓笔记8·大结局（下）', '978-7-807-40727-8', '南派三叔', '15', '26.70', '1');
INSERT INTO `book` VALUES ('96', 'GRE作文', '978-9-99999-9', '许陆', '3', '99.00', '1');
INSERT INTO `book` VALUES ('97', '盗墓笔记1·七星鲁王宫', '978-7-807-40727-0', '南派三叔', '15', '19.20', '1');
INSERT INTO `book` VALUES ('98', '盗墓笔记2·秦岭神树', '978-7-807-40727-1', '南派三叔', '15', '19.30', '1');
INSERT INTO `book` VALUES ('99', '盗墓笔记3·云顶天宫', '978-7-807-40727-2', '南派三叔', '15', '19.40', '1');
INSERT INTO `book` VALUES ('100', '盗墓笔记4·蛇沼鬼城', '978-7-807-40727-3', '南派三叔', '15', '19.50', '1');
INSERT INTO `book` VALUES ('101', '盗墓笔记5·谜海归巢', '978-7-807-40727-4', '南派三叔', '15', '19.60', '1');
INSERT INTO `book` VALUES ('102', '盗墓笔记6·阴山古楼', '978-7-807-40727-5', '南派三叔', '15', '19.70', '1');
INSERT INTO `book` VALUES ('103', '盗墓笔记7·邛笼石影', '978-7-807-40727-6', '南派三叔', '15', '24.70', '1');
INSERT INTO `book` VALUES ('104', '盗墓笔记8·大结局（上）', '978-7-807-40727-7', '南派三叔', '15', '25.70', '1');
INSERT INTO `book` VALUES ('105', '盗墓笔记8·大结局（下）', '978-7-807-40727-8', '南派三叔', '15', '26.70', '1');

-- ----------------------------
-- Table structure for `borrow`
-- ----------------------------
DROP TABLE IF EXISTS `borrow`;
CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) DEFAULT NULL,
  `repo_id` varchar(8) DEFAULT NULL,
  `borrowtime` timestamp NULL DEFAULT NULL,
  `duetime` timestamp NULL DEFAULT NULL,
  `returntime` timestamp NULL DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`borrow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of borrow
-- ----------------------------
INSERT INTO `borrow` VALUES ('1', '102128', '10', '2016-06-01 01:07:07', '2016-08-30 00:00:00', '2016-06-11 12:56:18', '9');
INSERT INTO `borrow` VALUES ('2', '102128', '6', '2016-06-01 01:07:17', '2016-08-30 00:00:00', '2016-06-08 02:32:41', '9');
INSERT INTO `borrow` VALUES ('3', '102128', '7', '2016-06-11 00:18:28', '2016-09-10 00:00:00', '2016-06-11 13:20:57', '9');
INSERT INTO `borrow` VALUES ('4', '102131', '12', '2016-04-01 01:56:38', '2016-05-01 00:00:00', null, '9');
INSERT INTO `borrow` VALUES ('6', '102133', '22', '2016-06-11 13:11:59', '2016-09-10 00:00:00', null, '5');
INSERT INTO `borrow` VALUES ('7', '102133', '59', '2016-06-11 13:12:14', '2016-09-10 00:00:00', '2016-06-12 01:31:45', '21');
INSERT INTO `borrow` VALUES ('8', '102133', '8', '2016-06-11 13:12:36', '2016-09-10 00:00:00', '2016-06-11 13:14:02', '9');
INSERT INTO `borrow` VALUES ('9', '102133', '11', '2016-06-11 13:12:44', '2016-09-10 00:00:00', '2016-06-12 01:32:22', '9');
INSERT INTO `borrow` VALUES ('10', '102133', '38', '2016-06-11 13:13:29', '2016-09-10 00:00:00', '2016-06-11 13:14:12', '15');
INSERT INTO `borrow` VALUES ('11', '102134', '35', '2016-06-11 13:15:03', '2016-09-10 00:00:00', '2016-06-11 13:21:07', '14');
INSERT INTO `borrow` VALUES ('12', '102134', '10', '2016-06-11 13:15:13', '2016-09-10 00:00:00', '2016-06-11 13:29:53', '9');
INSERT INTO `borrow` VALUES ('13', '102134', '9', '2016-06-11 13:15:18', '2016-09-10 00:00:00', '2016-06-11 13:21:14', '9');
INSERT INTO `borrow` VALUES ('14', '102134', '56', '2016-06-11 13:15:27', '2016-09-10 00:00:00', '2016-06-11 13:21:21', '21');
INSERT INTO `borrow` VALUES ('15', '102134', '65', '2016-06-11 13:16:16', '2016-09-10 00:00:00', '2016-06-11 13:29:36', '23');
INSERT INTO `borrow` VALUES ('16', '102134', '66', '2016-06-11 13:16:23', '2016-09-10 00:00:00', '2016-06-11 13:30:00', '23');
INSERT INTO `borrow` VALUES ('17', '102135', '13', '2016-06-11 13:18:32', '2016-09-10 00:00:00', '2016-06-11 13:19:30', '9');
INSERT INTO `borrow` VALUES ('18', '102135', '8', '2016-06-11 13:18:38', '2016-09-10 00:00:00', '2016-06-11 13:19:36', '9');
INSERT INTO `borrow` VALUES ('19', '102135', '58', '2016-06-11 13:18:46', '2016-09-10 00:00:00', '2016-06-11 13:19:48', '21');
INSERT INTO `borrow` VALUES ('20', '102135', '24', '2016-06-11 13:18:54', '2016-09-10 00:00:00', '2016-06-11 13:19:41', '11');
INSERT INTO `borrow` VALUES ('21', '102135', '25', '2016-06-11 13:19:01', '2016-09-10 00:00:00', '2016-06-11 13:19:54', '11');
INSERT INTO `borrow` VALUES ('22', '102128', '71', '2016-06-11 14:34:01', '2016-09-10 00:00:00', '2016-06-11 22:32:49', '26');
INSERT INTO `borrow` VALUES ('23', '102137', '58', '2016-06-11 16:46:41', '2016-09-10 00:00:00', '2016-06-11 16:55:11', '21');
INSERT INTO `borrow` VALUES ('24', '102137', '57', '2016-04-01 16:57:41', '2016-06-02 00:00:00', null, '21');
INSERT INTO `borrow` VALUES ('25', '102128', '21', '2016-06-12 01:37:25', '2016-09-10 00:00:00', null, '5');
INSERT INTO `borrow` VALUES ('26', '102128', '59', '2016-06-12 09:49:18', '2016-09-10 00:00:00', '2016-06-12 09:53:33', '21');

-- ----------------------------
-- Table structure for `branch`
-- ----------------------------
DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branchname` varchar(255) DEFAULT NULL,
  `branchaddr` varchar(255) DEFAULT NULL,
  `branchphone` varchar(255) DEFAULT NULL,
  `branchemail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of branch
-- ----------------------------
INSERT INTO `branch` VALUES ('1', '张江分馆', '张衡路825号', '51355027', 'zjb@fudan.edu.cn');
INSERT INTO `branch` VALUES ('2', '枫林分馆', '东安路130号', '54237503', 'flgwh@fudan.edu.cn');
INSERT INTO `branch` VALUES ('3', '邯郸分馆', '邯郸路220号', '65642222', 'main@fudan.edu.cn');
INSERT INTO `branch` VALUES ('4', '江湾分馆', '淞沪路2005号', '65642333', 'jw@fudan.edu.cn');

-- ----------------------------
-- Table structure for `feedback`
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feedback
-- ----------------------------
INSERT INTO `feedback` VALUES ('1', '102128', '图书馆可以去多买一点书啦蛤蛤', '2016-06-01 00:41:52');
INSERT INTO `feedback` VALUES ('2', '102134', '张江图书馆的前台阿姨态度真好~点个赞', '2016-06-01 00:42:39');

-- ----------------------------
-- Table structure for `publisher`
-- ----------------------------
DROP TABLE IF EXISTS `publisher`;
CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of publisher
-- ----------------------------
INSERT INTO `publisher` VALUES ('4', '西安交通大学出版社');
INSERT INTO `publisher` VALUES ('3', '机械工业出版社');
INSERT INTO `publisher` VALUES ('5', '浙江大学出版社');
INSERT INTO `publisher` VALUES ('6', '人民邮电出版社');
INSERT INTO `publisher` VALUES ('7', '中国人民大学出版社');
INSERT INTO `publisher` VALUES ('8', '高等教育出版社');
INSERT INTO `publisher` VALUES ('9', '广西美术出版社');
INSERT INTO `publisher` VALUES ('10', '印刷工业出版社');
INSERT INTO `publisher` VALUES ('11', '电子工业出版社');
INSERT INTO `publisher` VALUES ('12', '外语教学与研究出版社');
INSERT INTO `publisher` VALUES ('13', '中国国际广播出版社');
INSERT INTO `publisher` VALUES ('14', '上海画报出版社');
INSERT INTO `publisher` VALUES ('15', '上海文化出版社');
INSERT INTO `publisher` VALUES ('16', '601');

-- ----------------------------
-- Table structure for `repo`
-- ----------------------------
DROP TABLE IF EXISTS `repo`;
CREATE TABLE `repo` (
  `repo_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` varchar(8) DEFAULT NULL,
  `current_branch` varchar(8) DEFAULT NULL,
  `state` decimal(3,0) DEFAULT NULL,
  PRIMARY KEY (`repo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of repo
-- ----------------------------
INSERT INTO `repo` VALUES ('5', '8', '1', '1');
INSERT INTO `repo` VALUES ('6', '9', '1', '1');
INSERT INTO `repo` VALUES ('7', '9', '2', '1');
INSERT INTO `repo` VALUES ('8', '9', '3', '1');
INSERT INTO `repo` VALUES ('9', '9', '3', '1');
INSERT INTO `repo` VALUES ('10', '9', '4', '1');
INSERT INTO `repo` VALUES ('11', '9', '2', '1');
INSERT INTO `repo` VALUES ('12', '9', '2', '2');
INSERT INTO `repo` VALUES ('13', '9', '3', '1');
INSERT INTO `repo` VALUES ('14', '9', '3', '1');
INSERT INTO `repo` VALUES ('15', '10', '4', '1');
INSERT INTO `repo` VALUES ('16', '10', '4', '1');
INSERT INTO `repo` VALUES ('17', '10', '4', '1');
INSERT INTO `repo` VALUES ('18', '10', '3', '1');
INSERT INTO `repo` VALUES ('19', '10', '3', '1');
INSERT INTO `repo` VALUES ('20', '8', '3', '1');
INSERT INTO `repo` VALUES ('21', '5', '1', '2');
INSERT INTO `repo` VALUES ('22', '5', '1', '2');
INSERT INTO `repo` VALUES ('23', '11', '1', '1');
INSERT INTO `repo` VALUES ('24', '11', '1', '1');
INSERT INTO `repo` VALUES ('25', '11', '1', '1');
INSERT INTO `repo` VALUES ('26', '11', '2', '1');
INSERT INTO `repo` VALUES ('27', '11', '2', '1');
INSERT INTO `repo` VALUES ('28', '12', '4', '1');
INSERT INTO `repo` VALUES ('29', '12', '4', '1');
INSERT INTO `repo` VALUES ('30', '12', '4', '1');
INSERT INTO `repo` VALUES ('31', '12', '4', '1');
INSERT INTO `repo` VALUES ('32', '13', '1', '1');
INSERT INTO `repo` VALUES ('33', '13', '1', '1');
INSERT INTO `repo` VALUES ('34', '14', '3', '1');
INSERT INTO `repo` VALUES ('35', '14', '3', '1');
INSERT INTO `repo` VALUES ('36', '14', '3', '1');
INSERT INTO `repo` VALUES ('37', '14', '1', '1');
INSERT INTO `repo` VALUES ('38', '15', '4', '1');
INSERT INTO `repo` VALUES ('39', '16', '2', '1');
INSERT INTO `repo` VALUES ('40', '16', '2', '1');
INSERT INTO `repo` VALUES ('41', '16', '2', '1');
INSERT INTO `repo` VALUES ('42', '16', '2', '1');
INSERT INTO `repo` VALUES ('43', '16', '1', '1');
INSERT INTO `repo` VALUES ('44', '17', '3', '1');
INSERT INTO `repo` VALUES ('45', '17', '3', '1');
INSERT INTO `repo` VALUES ('46', '17', '3', '1');
INSERT INTO `repo` VALUES ('47', '17', '3', '1');
INSERT INTO `repo` VALUES ('48', '18', '3', '1');
INSERT INTO `repo` VALUES ('49', '18', '3', '1');
INSERT INTO `repo` VALUES ('50', '18', '2', '1');
INSERT INTO `repo` VALUES ('51', '18', '2', '1');
INSERT INTO `repo` VALUES ('52', '18', '2', '1');
INSERT INTO `repo` VALUES ('53', '19', '2', '1');
INSERT INTO `repo` VALUES ('54', '20', '2', '1');
INSERT INTO `repo` VALUES ('55', '20', '2', '1');
INSERT INTO `repo` VALUES ('56', '21', '1', '1');
INSERT INTO `repo` VALUES ('57', '21', '1', '2');
INSERT INTO `repo` VALUES ('58', '21', '1', '1');
INSERT INTO `repo` VALUES ('59', '21', '4', '1');
INSERT INTO `repo` VALUES ('60', '21', '4', '1');
INSERT INTO `repo` VALUES ('61', '22', '4', '1');
INSERT INTO `repo` VALUES ('62', '22', '4', '1');
INSERT INTO `repo` VALUES ('63', '22', '4', '1');
INSERT INTO `repo` VALUES ('64', '22', '4', '1');
INSERT INTO `repo` VALUES ('65', '23', '2', '1');
INSERT INTO `repo` VALUES ('66', '23', '2', '1');
INSERT INTO `repo` VALUES ('67', '24', '2', '1');
INSERT INTO `repo` VALUES ('68', '24', '2', '1');
INSERT INTO `repo` VALUES ('69', '25', '4', '1');
INSERT INTO `repo` VALUES ('70', '25', '4', '1');
INSERT INTO `repo` VALUES ('71', '26', '1', '1');
INSERT INTO `repo` VALUES ('72', '26', '1', '1');
INSERT INTO `repo` VALUES ('73', '9', '1', '1');
INSERT INTO `repo` VALUES ('74', '9', '1', '1');
INSERT INTO `repo` VALUES ('75', '9', '1', '1');
INSERT INTO `repo` VALUES ('76', '5', '2', '1');
INSERT INTO `repo` VALUES ('77', '5', '2', '1');
INSERT INTO `repo` VALUES ('78', '21', '1', '1');
INSERT INTO `repo` VALUES ('79', '21', '1', '1');
INSERT INTO `repo` VALUES ('80', '21', '1', '1');
INSERT INTO `repo` VALUES ('81', '21', '1', '1');
INSERT INTO `repo` VALUES ('82', '90', '1', '1');
INSERT INTO `repo` VALUES ('83', '90', '1', '1');
INSERT INTO `repo` VALUES ('84', '90', '1', '1');
INSERT INTO `repo` VALUES ('85', '90', '1', '1');
INSERT INTO `repo` VALUES ('86', '90', '1', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` decimal(3,0) DEFAULT NULL,
  `umail` varchar(255) DEFAULT NULL,
  `udept` varchar(20) DEFAULT NULL,
  `Expire_date` timestamp NOT NULL,
  `Member_data` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=102140 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('102128', 'xulu', '960805', '1', '572605156@qq.com', 'comp', '2018-06-30 23:59:59', '2016-05-13 01:25:53');
INSERT INTO `user` VALUES ('102129', '20160513', '960805', '1', '572605156@qq.com', 'comp', '2018-06-30 23:59:59', '2016-05-13 01:46:12');
INSERT INTO `user` VALUES ('102130', '20160514', '960805', '1', '572605156@qq.com', 'comp', '2018-06-30 23:59:59', '2016-05-13 01:47:38');
INSERT INTO `user` VALUES ('102131', 'stuff1', '960805', '10', '572605156@qq.com', 'comp', '2018-06-30 23:59:59', '2016-05-13 01:48:19');
INSERT INTO `user` VALUES ('102132', 'admin', '960805', '100', '572605156@qq.com', 'comp', '2018-06-30 23:59:59', '2016-05-13 01:56:57');
INSERT INTO `user` VALUES ('102133', 'joe', '960805', '1', 'xulusjb1@163.com', 'comp', '2018-06-30 23:59:59', '2016-06-01 00:19:47');
INSERT INTO `user` VALUES ('102134', 'john', '960805', '1', 'xulusjb2@163.com', 'comp', '2018-06-30 23:59:59', '2016-06-01 00:21:57');
INSERT INTO `user` VALUES ('102135', 'andy', '960805', '2', '644760178@qq.com', 'data', '2018-06-30 23:59:59', '2016-06-01 00:22:35');
INSERT INTO `user` VALUES ('102136', 'bob', '960805', '2', '754830031@qq.com', 'data', '2018-06-30 23:59:59', '2016-06-01 00:23:18');
INSERT INTO `user` VALUES ('102137', 'lemonnie', '950322', '1', '572605156@qq.com', 'comp', '2018-06-30 23:59:59', '2016-06-11 16:44:55');
INSERT INTO `user` VALUES ('102138', 'xulu2', '960805', '1', '572605156@qq.com', 'comp', '2018-06-30 23:59:59', '2016-06-12 01:13:06');
INSERT INTO `user` VALUES ('102139', 'xulu3', '960805', '1', '572605156@qq.com', 'comp', '2018-06-30 23:59:59', '2016-06-12 01:14:30');

-- ----------------------------
-- Table structure for `userlevel`
-- ----------------------------
DROP TABLE IF EXISTS `userlevel`;
CREATE TABLE `userlevel` (
  `userlevel_id` int(11) NOT NULL AUTO_INCREMENT,
  `maxborrow` decimal(3,0) DEFAULT NULL,
  PRIMARY KEY (`userlevel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userlevel
-- ----------------------------
INSERT INTO `userlevel` VALUES ('2', '10');
INSERT INTO `userlevel` VALUES ('5', '100');
INSERT INTO `userlevel` VALUES ('1', '5');
INSERT INTO `userlevel` VALUES ('10', '200');
INSERT INTO `userlevel` VALUES ('100', '500');

-- ----------------------------
-- Procedure structure for `back`
-- ----------------------------
DROP PROCEDURE IF EXISTS `back`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `back`(repoid varchar(8), bid int(11))
begin
 
update repo set state = 1 where repo_id = repoid;
 
update borrow set returntime =current_timestamp where borrow_id = bid;
 
end
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `borrow`
-- ----------------------------
DROP PROCEDURE IF EXISTS `borrow`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `borrow`(repoid varchar(8), uid varchar(11),bid int(11))
begin
 
update repo set state = 2 where repo_id = repoid ;
 
insert into borrow values (null, uid, repoid, current_timestamp,date_sub('2016-06-12',interval -90 day),null,bid);
 
end
;;
DELIMITER ;
