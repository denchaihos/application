/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : hi

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2015-01-28 14:31:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tsu_labpcu`
-- ----------------------------
DROP TABLE IF EXISTS `tsu_labpcu`;
CREATE TABLE `tsu_labpcu` (
  `vn` varchar(12) NOT NULL,
  `pcucode` varchar(5) NOT NULL,
  `hn` int(11) NOT NULL,
  `dateserv` date DEFAULT NULL,
  `timeserv` time DEFAULT NULL,
  `bloodgrp` char(2) DEFAULT NULL,
  `rh` varchar(4) DEFAULT NULL,
  `hct` varchar(11) DEFAULT NULL,
  `dcip` varchar(3) DEFAULT NULL,
  `hiv` varchar(15) DEFAULT NULL,
  `hbsag` varchar(4) DEFAULT NULL,
  `vdrl` varchar(15) DEFAULT NULL,
  `mcv` int(11) DEFAULT NULL,
  `lab_note` text,
  `lab_staff` int(11) DEFAULT NULL,
  PRIMARY KEY (`vn`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of tsu_labpcu
-- ----------------------------
INSERT INTO `tsu_labpcu` VALUES ('580128022641', '03791', '5', '2015-01-28', '02:26:41', 'B', 'Rh+', '5', 'Pos', 'Pos', 'Pos', 'Neg', '5', 'test\r\ntest\r\ntest\r\n\r\n', '1');
