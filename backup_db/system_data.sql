/*
 Navicat Premium Data Transfer

 Source Server         : Docker
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3366
 Source Schema         : tcds

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 24/07/2019 21:15:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for system_data
-- ----------------------------
DROP TABLE IF EXISTS `system_data`;
CREATE TABLE `system_data` (
  `id` varchar(255) NOT NULL,
  `data` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_data
-- ----------------------------
BEGIN;
INSERT INTO `system_data` VALUES ('system', '{\"his_api\":\"http://133f2fdb.ngrok.io/HIS/index.php/\",\"barcode_api\":\"http://127.0.0.1:5000/barcode-him\"}');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
