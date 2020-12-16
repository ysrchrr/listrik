/*
 Navicat Premium Data Transfer

 Source Server         : MyConn
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : listrik

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 16/12/2020 09:39:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `idPelanggan` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namaPelanggan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `daya` varchar(24) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis` enum('Listrik','Indihome','PDAM') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bulanIni` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10028 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES (10001, '520510228268', 'Wirjosunarto', '1300VA', 'Listrik', 0);
INSERT INTO `pelanggan` VALUES (10013, '520511058137', 'Kusno Hasyim', '900VA', 'Listrik', 0);
INSERT INTO `pelanggan` VALUES (10014, '502510379206', 'Praptodihardjo', '900VA', 'Listrik', 0);
INSERT INTO `pelanggan` VALUES (10025, 'r', 'e', 't', 'Listrik', 0);
INSERT INTO `pelanggan` VALUES (10027, '1216', '1216', '90va', 'Listrik', 0);

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `idPelanggan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `keTokped` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kePerson` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10011 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES (10001, '10101010', '2020-12-19', '90000', '3000', 1);
INSERT INTO `pembayaran` VALUES (10002, '10101011', '2020-12-19', '100000', '5000', 1);
INSERT INTO `pembayaran` VALUES (10003, '10101012', '2020-12-18', '50000', '3000', 0);
INSERT INTO `pembayaran` VALUES (10004, '10101013', '2020-12-18', '500000', '10000', 1);
INSERT INTO `pembayaran` VALUES (10005, '10101014', '2020-12-11', '40000', '3000', 1);
INSERT INTO `pembayaran` VALUES (10006, '10101015', '2020-12-19', '900000', '10000', 1);
INSERT INTO `pembayaran` VALUES (10007, '10101016', '2020-12-17', '100000', '5000', 1);
INSERT INTO `pembayaran` VALUES (10008, '10101017', '2020-12-16', '800000', '23000', 1);
INSERT INTO `pembayaran` VALUES (10009, '10101018', '2020-12-14', '100000', '30000', 1);
INSERT INTO `pembayaran` VALUES (10010, '10101019', '2020-12-17', '150000', '3000', 1);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namaLengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10002 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (10001, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 1);

SET FOREIGN_KEY_CHECKS = 1;
