/*
Navicat MySQL Data Transfer

Source Server         : koneksi01
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tp_mvc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-05-07 12:04:30
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `agensi`
-- ----------------------------
DROP TABLE IF EXISTS `agensi`;
CREATE TABLE `agensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `pendiri` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of agensi
-- ----------------------------
INSERT INTO `agensi` VALUES ('1', 'SM Entertaintment', 'Lee Soo-man');
INSERT INTO `agensi` VALUES ('2', 'JYP Entertaintment', 'Park Jin-young');

-- ----------------------------
-- Table structure for `grup`
-- ----------------------------
DROP TABLE IF EXISTS `grup`;
CREATE TABLE `grup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tahun_debut` int(5) NOT NULL,
  `agensi_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_AGENSI` (`agensi_id`),
  CONSTRAINT `FK_AGENSI` FOREIGN KEY (`agensi_id`) REFERENCES `agensi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of grup
-- ----------------------------
INSERT INTO `grup` VALUES ('1', 'AESPA', '2020', '1');
INSERT INTO `grup` VALUES ('2', 'TWICE', '2015', '2');
INSERT INTO `grup` VALUES ('4', 'NCT Dream', '2016', '1');

-- ----------------------------
-- Table structure for `members`
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `join_date` date NOT NULL,
  `grup_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_GRUP` (`grup_id`),
  CONSTRAINT `FK_GRUP` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of members
-- ----------------------------
