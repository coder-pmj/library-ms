/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 80015
Source Host           : localhost:3306
Source Database       : phpdata

Target Server Type    : MYSQL
Target Server Version : 80015
File Encoding         : 65001

Date: 2019-06-08 15:43:50
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tb_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `teacher_id` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO tb_admin VALUES ('1', '张三丰', '123456', '123', '16666666666', '男', '164@qq.com', '我是个大傻子');
INSERT INTO tb_admin VALUES ('2', '李世明', '123', '124', '17777777777', '男', null, null);
INSERT INTO tb_admin VALUES ('3', '王世凯', '12', '125', '18888888888', '男', null, null);

-- ----------------------------
-- Table structure for `tb_book`
-- ----------------------------
DROP TABLE IF EXISTS `tb_book`;
CREATE TABLE `tb_book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `counnt` varchar(255) DEFAULT NULL,
  `sl` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_book
-- ----------------------------
INSERT INTO tb_book VALUES ('1', '会计学', '文史', '56446', '64', '主图');
INSERT INTO tb_book VALUES ('2', '大学语文', '文史', '56989', '1', '主图');
INSERT INTO tb_book VALUES ('3', '大学英语', '文史', '26543', '110', '主图');
INSERT INTO tb_book VALUES ('4', '高等数学', '理工', '13433', '128', '主图');
INSERT INTO tb_book VALUES ('5', '安卓开发(入门)', '理工', '95546', '80', '逸夫');
INSERT INTO tb_book VALUES ('6', '高级java', '理工', '48673', '65', '逸夫');
INSERT INTO tb_book VALUES ('7', '数据结构', '理工', '57546', '54', '逸夫');
INSERT INTO tb_book VALUES ('8', '一千零一夜', '文史', '4564', '45', '主图');
INSERT INTO tb_book VALUES ('9', '131', '1', '20', '12321', '4');
INSERT INTO tb_book VALUES ('10', 'rfwr ', '理工', '13', '123', '主图');
INSERT INTO tb_book VALUES ('11', 'rfwr 31', '理工', '13', '123', '主图');
INSERT INTO tb_book VALUES ('12', '3213', '理工', '13', '3123', '主图');
INSERT INTO tb_book VALUES ('13', 'test1', '理工', '13', '12', '主图');
INSERT INTO tb_book VALUES ('18', 'test2', '理工', '13', '1', '逸夫');

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `yj` varchar(255) DEFAULT NULL,
  `yh` varchar(255) DEFAULT NULL,
  `book1` varchar(255) DEFAULT NULL,
  `book2` varchar(255) DEFAULT NULL,
  `book3` varchar(255) DEFAULT NULL,
  `book4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO tb_user VALUES ('1', '张三', '123', '12312312312312', '12@qq.com', '12', null, null, null, null, null, null);
INSERT INTO tb_user VALUES ('2', '李思思', '123', '12312312312312', '12@qq.com', '13', null, null, null, null, null, null);
INSERT INTO tb_user VALUES ('3', '张毅', '123', '12312312312312', '12@qq.com', '14', null, null, null, null, null, null);
INSERT INTO tb_user VALUES ('4', '李明', '123', '12312312312312', '12@qq.com', '15', null, null, null, null, null, null);
INSERT INTO tb_user VALUES ('5', '李好', '123', '123123123121312', '12@qq,con', '16', null, null, null, null, null, null);
INSERT INTO tb_user VALUES ('6', '王好', '123', '56565655556', '12@qq.com', '17', null, null, null, null, null, null);
INSERT INTO tb_user VALUES ('7', '张华', '123', '8687675758', '55@qq.com', '18', null, null, null, null, null, null);
