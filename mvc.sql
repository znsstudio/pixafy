/*
 Navicat Premium Data Transfer

 Source Server         : mvc.azerny.com
 Source Server Type    : MySQL
 Source Server Version : 50536
 Source Host           : localhost
 Source Database       : mvc

 Target Server Type    : MySQL
 Target Server Version : 50536
 File Encoding         : utf-8

 Date: 04/03/2014 01:55:03 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `photos`
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(64) NOT NULL,
  `photo_name` varchar(64) NOT NULL,
  `photo_src` varchar(64) NOT NULL DEFAULT '10.00',
  `row_no` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `photos`
-- ----------------------------
BEGIN;
INSERT INTO `photos` VALUES ('9', '14', '36653152.jpg', 'f5692a951787a2cc492fb896ea953a25.jpg', '0'), ('13', '15', '1559487_659522927422714_1831773012_o.jpg', '01e43184a5f1310fd46d5fe37c78de79.jpg', '0'), ('15', '15', 'DSC_4872.jpg', 'ac345f99b134cc3a6f31deea1149cf77.jpg', '1');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` enum('default','admin','owner') NOT NULL DEFAULT 'default',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'root', '513868a1ab92de4c34d68013d59603fa', 'owner'), ('12', 'asdfasdf', 'a8804ec17d403f46a269b34dd33aa75dfa1f59499b6a1d59c8c4d8712bbf568c', 'default'), ('13', 'samiryahyazade', '0889bcc6832e0994d99a1930924c23dd75417a58ee308b9b2223c0573e536b3f', 'default'), ('14', 'azeroocom@gmail.com', '513868a1ab92de4c34d68013d59603fa', 'owner'), ('15', 'nigar@gmail.com', '513868a1ab92de4c34d68013d59603fa', 'default');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
