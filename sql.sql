/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 110302
 Source Host           : localhost:3306
 Source Schema         : ad2

 Target Server Type    : MySQL
 Target Server Version : 110302
 File Encoding         : 65001

 Date: 11/03/2024 20:32:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for test_data
-- ----------------------------
DROP TABLE IF EXISTS `test_data`;
CREATE TABLE `test_data`  (
  `ad_id` bigint NOT NULL,
  `impressions` int NULL DEFAULT NULL,
  `clicks` int NULL DEFAULT NULL,
  `unique_clicks` int NULL DEFAULT NULL,
  `leads` int NULL DEFAULT NULL,
  `conversion` int NULL DEFAULT NULL,
  `roi` double NULL DEFAULT NULL,
  PRIMARY KEY (`ad_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
