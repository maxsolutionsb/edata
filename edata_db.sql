/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50733
Source Host           : localhost:3306
Source Database       : edata_db

Target Server Type    : MYSQL
Target Server Version : 50733
File Encoding         : 65001

Date: 2022-06-22 23:40:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_daerah`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_daerah`;
CREATE TABLE `tbl_daerah` (
  `daerah_id` int(4) NOT NULL AUTO_INCREMENT,
  `daerah_kod` char(6) NOT NULL,
  `daerah_nama` varchar(155) NOT NULL,
  `daerah_status` varchar(15) NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`daerah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100001 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_daerah
-- ----------------------------
INSERT INTO `tbl_daerah` VALUES ('100000', '1401', 'Kuala Lumpur', 'Aktif');

-- ----------------------------
-- Table structure for `tbl_internet_interim`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_internet_interim`;
CREATE TABLE `tbl_internet_interim` (
  `interim_id` int(6) NOT NULL AUTO_INCREMENT,
  `inter_sek_id` int(8) DEFAULT NULL,
  `inter_bulan` varchar(50) NOT NULL COMMENT 'Jan - Dis',
  `inter_jenis` varchar(255) NOT NULL,
  `inter_kuantiti` int(2) DEFAULT '0',
  `inter_file` varchar(255) DEFAULT NULL,
  `inter_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Aktif; 2-Tidak Aktif',
  PRIMARY KEY (`interim_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_internet_interim
-- ----------------------------
INSERT INTO `tbl_internet_interim` VALUES ('20', '10000600', 'Januari', 'Celcom', '3', '10000600-Januari.pdf', '1');
INSERT INTO `tbl_internet_interim` VALUES ('21', '10000600', 'Februari', 'TM', '3', '10000600-Februari.pdf', '1');

-- ----------------------------
-- Table structure for `tbl_jenis_sekolah`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jenis_sekolah`;
CREATE TABLE `tbl_jenis_sekolah` (
  `jenis_id` int(4) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(25) NOT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1011 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_jenis_sekolah
-- ----------------------------
INSERT INTO `tbl_jenis_sekolah` VALUES ('1000', 'Kolej Ting 6');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1001', 'Kolej VK');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1002', 'SBP');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1003', 'SJKC');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1004', 'SJKT');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1005', 'SK');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1006', 'SK (Khas)');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1007', 'SM Teknik');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1008', 'SMK');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1009', 'SMK (Khas)');
INSERT INTO `tbl_jenis_sekolah` VALUES ('1010', 'SMK (Agama)');

-- ----------------------------
-- Table structure for `tbl_negeri`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_negeri`;
CREATE TABLE `tbl_negeri` (
  `negeri_id` int(2) NOT NULL AUTO_INCREMENT,
  `negeri_code` char(2) DEFAULT NULL,
  `negeri` varchar(50) NOT NULL,
  `negeri_status` varchar(12) NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`negeri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbl_negeri
-- ----------------------------
INSERT INTO `tbl_negeri` VALUES ('1', '01', 'Johor', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('2', '02', 'Kedah', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('3', '03', 'Kelantan', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('4', '04', 'Melaka', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('5', '05', 'Negeri Sembilan', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('6', '06', 'Pahang', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('7', '07', 'Pulau Pinang', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('8', '08', 'Perak', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('9', '09', 'Perlis', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('10', '10', 'Selangor', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('11', '11', 'Terengganu', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('12', '12', 'Sabah', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('13', '13', 'Sarawak', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('14', '14', 'W.P. Kuala Lumpur', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('15', '15', 'W.P. Labuan', 'Aktif');
INSERT INTO `tbl_negeri` VALUES ('16', '16', 'W.P. Putrajaya', 'Aktif');

-- ----------------------------
-- Table structure for `tbl_pengguna`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pengguna`;
CREATE TABLE `tbl_pengguna` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(255) NOT NULL,
  `user_nokp` varchar(12) NOT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Aktif; 2-Tidak Aktif',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_pengguna
-- ----------------------------
INSERT INTO `tbl_pengguna` VALUES ('1', 'KASTERIYA BIN SHUIB', '8888', '03-58000036', 'emel@emel.com1', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '1');
INSERT INTO `tbl_pengguna` VALUES ('2', 'YONG YUNG YI', '9999', '03-58000037', 'emel1@emel.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '1');

-- ----------------------------
-- Table structure for `tbl_pengguna_role`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pengguna_role`;
CREATE TABLE `tbl_pengguna_role` (
  `pengguna_role_id` int(6) NOT NULL AUTO_INCREMENT,
  `pr_user_id` int(6) NOT NULL,
  `pr_ppd_id` int(4) NOT NULL,
  `pr_sekolah_id` int(4) NOT NULL,
  `pr_role` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Pengguna; 2-JK, 3-Guru ICT',
  `pr_mula` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pr_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Aktif; 2-Tidak Aktif',
  `pr_ubah` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pengguna_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_pengguna_role
-- ----------------------------
INSERT INTO `tbl_pengguna_role` VALUES ('1', '1', '1002', '10000601', '1', '2022-06-10 23:19:47', '1', '2022-06-20 12:35:51');
INSERT INTO `tbl_pengguna_role` VALUES ('2', '2', '0', '10000595', '3', '2022-06-10 23:20:39', '1', '2022-06-20 11:46:42');

-- ----------------------------
-- Table structure for `tbl_ppd`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ppd`;
CREATE TABLE `tbl_ppd` (
  `ppd_id` int(4) NOT NULL AUTO_INCREMENT,
  `ppd_nama` varchar(255) NOT NULL,
  `ppd_alamat1` varchar(255) NOT NULL,
  `ppd_alamat2` varchar(150) DEFAULT NULL,
  `ppd_alamat` varchar(150) DEFAULT NULL,
  `ppd_poskod` char(5) NOT NULL,
  `ppd_daerah` int(6) NOT NULL,
  `ppd_negeri` int(6) NOT NULL,
  PRIMARY KEY (`ppd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_ppd
-- ----------------------------
INSERT INTO `tbl_ppd` VALUES ('1000', 'BANGSAR PUDU', 'Alamat', null, null, '56000', '1000', '14');
INSERT INTO `tbl_ppd` VALUES ('1001', 'KERAMAT', 'Alamat', null, null, '56000', '1000', '14');
INSERT INTO `tbl_ppd` VALUES ('1002', 'SENTUL', 'Alamat', null, null, '56000', '1000', '14');

-- ----------------------------
-- Table structure for `tbl_role`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE `tbl_role` (
  `role_id` int(2) NOT NULL AUTO_INCREMENT,
  `role_nama` varchar(150) NOT NULL,
  `role_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Aktif; 2-Tidak Aktif',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_role
-- ----------------------------
INSERT INTO `tbl_role` VALUES ('1', 'Pentadbir', '1');
INSERT INTO `tbl_role` VALUES ('2', 'Juruteknik', '1');
INSERT INTO `tbl_role` VALUES ('3', 'Guru ICT', '1');

-- ----------------------------
-- Table structure for `tbl_sekolah`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sekolah`;
CREATE TABLE `tbl_sekolah` (
  `sekolah_id` int(8) NOT NULL AUTO_INCREMENT,
  `sek_kod` varchar(10) NOT NULL,
  `sek_ppd_id` int(4) NOT NULL,
  `sek_nama` varchar(255) NOT NULL,
  `sek_jenis` varchar(15) NOT NULL,
  `sek_ptj` varchar(10) NOT NULL DEFAULT '1' COMMENT '1-True; 2-False',
  `sek_lokasi` varchar(20) NOT NULL,
  `sek_emel` varchar(155) DEFAULT NULL,
  `sek_alamat1` varchar(255) NOT NULL,
  `sek_alamat2` varchar(155) DEFAULT NULL,
  `sek_alamat3` varchar(155) DEFAULT NULL,
  `sek_poskod` char(5) DEFAULT '',
  `sek_daerah_id` int(6) NOT NULL DEFAULT '100000',
  `sek_negeri_id` int(2) NOT NULL DEFAULT '14',
  `sek_phone` varchar(20) DEFAULT NULL,
  `sek_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Aktif; 2-Tidak Aktif',
  PRIMARY KEY (`sekolah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000888 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_sekolah
-- ----------------------------
INSERT INTO `tbl_sekolah` VALUES ('10000595', 'WBA0003', '1000', 'SEKOLAH KEBANGSAAN JALAN PASAR 1', 'SK', 'TIDAK', 'Bandar', 'wba0003@moe.edu.my', 'JALAN RUSA ', '', '', '55100', '100000', '14', '0392218019', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000596', 'WBA0005', '1000', 'SEKOLAH KEBANGSAAN TUN HUSSEIN ONN', 'SK', 'TIDAK', 'Bandar', 'wba0005@moe.edu.my', 'JLN DUA, KG PANDAN 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392842316', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000597', 'WBA0011', '1000', 'SEKOLAH KEBANGSAAN BUKIT BANDARAYA', 'SK', 'TIDAK', 'Bandar', 'wba0011@moe.edu.my', 'JALAN BANGKUNG, BANGSAR 59100 KUALA LUMPUR', null, null, '', '100000', '14', '0320950162', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000598', 'WBA0012', '1000', 'SEKOLAH KEBANGSAAN BANGSAR', 'SK', 'TIDAK', 'Bandar', 'wba0012@moe.edu.my', 'JALAN PANTAI BHARU 59200 KUALA LUMPUR', null, null, '', '100000', '14', '0322824990', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000599', 'WBA0017', '1000', 'SEKOLAH KEBANGSAAN TAMAN MIDAH', 'SK', 'TIDAK', 'Bandar', 'wba0017@moe.edu.my', 'JALAN MIDAH 11, TAMAN MIDAH CHERAS 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391305519', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000600', 'WBA0018', '1000', 'SEKOLAH KEBANGSAAN TAMAN TUN DR ISMAIL 1', 'SK', 'TIDAK', 'Bandar', 'wba0018@moe.edu.my', 'JLN. AMINUDDIN BAKI, TMN. TUN DR. ISMAIL 60000 KUALA LUMPUR', null, null, '', '100000', '14', '0377273060', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000601', 'WBA0031', '1000', 'SEKOLAH KEBANGSAAN SG BESI', 'SK', 'TIDAK', 'Bandar', 'wba0031@moe.edu.my', 'KG SELAMAT SUNGAI BESI 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390577906', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000602', 'WBA0032', '1000', 'SEKOLAH KEBANGSAAN PENGKALAN TENTERA DARAT', 'SK', 'TIDAK', 'Bandar', 'wba0032@moe.edu.my', 'KEM SG BESI 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390585566', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000603', 'WBA0033', '1000', 'SEKOLAH KEBANGSAAN PETALING 1', 'SK', 'TIDAK', 'Bandar', 'wba0033@moe.edu.my', 'KM 10,TAMAN KANAGAPURAM, OFF JALAN KLANG LAMA 58000 KUALA LUMPUR', null, null, '', '100000', '14', '0377828025', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000604', 'WBA0035', '1000', 'SEKOLAH KEBANGSAAN SG PENCHALA', 'SK', 'TIDAK', 'Bandar', 'wba0035@moe.edu.my', 'JALAN DAMANSARA 60000 KUALA LUMPUR', null, null, '', '100000', '14', '0377287984', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000605', 'WBA0036', '1000', 'SEKOLAH KEBANGSAAN SERI MEGA', 'SK', 'TIDAK', 'Bandar', 'wba0036@moe.edu.my', 'JLN. HUJAN, TMN. OVERSEAS UNION 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0377829244', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000606', 'WBA0037', '1000', 'SEKOLAH KEBANGSAAN BKT DAMANSARA', 'SK', 'TIDAK', 'Bandar', 'wba0037@moe.edu.my', 'JLN BERINGIN, BKT DAMANSARA 50490 KUALA LUMPUR', null, null, '', '100000', '14', '0320948350', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000607', 'WBA0038', '1000', 'SEKOLAH KEBANGSAAN BUKIT PANTAI', 'SK', 'TIDAK', 'Bandar', 'wba0038@moe.edu.my', 'JALAN CENDERAI, BANGSAR 59100 KUALA LUMPUR', null, null, '', '100000', '14', '0320951312', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000608', 'WBA0039', '1000', 'SEKOLAH KEBANGSAAN BANDAR TUN RAZAK 1', 'SK', 'TIDAK', 'Bandar', 'wba0039@moe.edu.my', 'JLN YAACOB LATIF, CHERAS 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391317566', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000609', 'WBA0040', '1000', 'SEKOLAH KEBANGSAAN BANDAR TUN RAZAK 2', 'SK', 'TIDAK', 'Bandar', 'wba0040@moe.edu.my', 'JALAN YAACOB LATIF, BANDAR TUN RAZAK 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391303725', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000610', 'WBA0042', '1000', 'SEKOLAH KEBANGSAAN PETALING 2', 'SK', 'TIDAK', 'Bandar', 'wba0042@moe.edu.my', 'KM 10 TAMAN KUNAGAPURAM OFF JALAN KELANG LAMA 58000 KUALA LUMPUR', null, null, '', '100000', '14', '0377816896', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000611', 'WBA0043', '1000', 'SEKOLAH KEBANGSAAN BANDAR BARU SERI PETALING', 'SK', 'TIDAK', 'Bandar', 'wba0043@moe.edu.my', 'JALAN WAN SENDARI, SRI PETALING 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390570814', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000612', 'WBA0045', '1000', 'SEKOLAH KEBANGSAAN SERI CHERAS', 'SK', 'TIDAK', 'Bandar', 'wba0045@moe.edu.my', 'KM 5, JLN CHERAS, CHERAS 56100 KUALA LUMPUR', null, null, '', '100000', '14', '0392855010', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000613', 'WBA0050', '1000', 'SEKOLAH KEBANGSAAN PENDIDIKAN KHAS JLN PEEL', 'SK (KHAS)', 'TIDAK', 'Bandar', 'wba0050@moe.edu.my', 'JLN PEEL 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392851320', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000614', 'WBA0051', '1000', 'SEKOLAH KEBANGSAAN TAMAN DESA', 'SK', 'TIDAK', 'Bandar', 'wba0051@moe.edu.my', 'JALAN DESA UTAMA, TAMAN DESA 58100 KUALA LUMPUR', null, null, '', '100000', '14', '0379801012', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000615', 'WBA0052', '1000', 'SEKOLAH KEBANGSAAN TAMAN MALURI', 'SK', 'TIDAK', 'Bandar', 'wba0052@moe.edu.my', 'JALAN WIRAWATI 6, TAMAN MALURI 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392856796', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000616', 'WBA0055', '1000', 'SEKOLAH KEBANGSAAN TAMAN SEGAR', 'SK', 'TIDAK', 'Bandar', 'wba0055@moe.edu.my', 'JLN. MANIS, TAMAN SEGAR 56100 KUALA LUMPUR', null, null, '', '100000', '14', '0391300598', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000617', 'WBA0057', '1000', 'SEKOLAH KEBANGSAAN TAMAN TUN DR. ISMAIL (2)', 'SK', 'TIDAK', 'Bandar', 'wba0057@moe.edu.my', 'JALAN ABANG HJ. OPENG, TAMAN TUN DR. ISMAIL 60000 KUALA LUMPUR', null, null, '', '100000', '14', '0377288441', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000618', 'WBA0069', '1000', 'SEKOLAH KEBANGSAAN TAMAN MIDAH 2', 'SK', 'TIDAK', 'Bandar', 'wba0069@moe.edu.my', 'JALAN MIDAH 12, TAMAN MIDAH, CHERAS 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391332405', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000619', 'WBA0071', '1000', 'SEKOLAH KEBANGSAAN DESA PANDAN', 'SK', 'TIDAK', 'Bandar', 'wba0071@moe.edu.my', 'JALAN 4/76, DESA PANDAN 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392864643', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000620', 'WBA0073', '1000', 'SEKOLAH KEBANGSAAN SERI SURIA', 'SK', 'TIDAK', 'Bandar', 'wba0073@moe.edu.my', 'JALAN 8A, TAMAN TAN YEW LAI OFF JLN PUCHONG 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0377858942', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000621', 'WBA0074', '1000', 'SEKOLAH KEBANGSAAN SERI HARTAMAS', 'SK', 'TIDAK', 'Bandar', 'wba0074@moe.edu.my', 'TAMAN SRI HARTAMAS 50480 KUALA LUMPUR', null, null, '', '100000', '14', '0362018557', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000622', 'WBA0075', '1000', 'SEKOLAH KEBANGSAAN BANDAR BARU SERI PETALING 2', 'SK', 'TIDAK', 'Bandar', 'wba0075@moe.edu.my', 'JALAN RADIN, BANDAR BARU SERI PETALING 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390591570', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000623', 'WBA0076', '1000', 'SEKOLAH KEBANGSAAN DESA TASIK', 'SK', 'TIDAK', 'Bandar', 'wba0076@moe.edu.my', 'JLN 11/146, BANDAR TASIK SELATAN 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390581485', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000624', 'WBA0078', '1000', 'SEKOLAH KEBANGSAAN SERI INDAH', 'SK', 'TIDAK', 'Bandar', 'wba0078@moe.edu.my', 'JLN HUJAN BUKIT, TAMAN OVERSEAS UNION 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0379871384', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000625', 'WBA0080', '1000', 'SEKOLAH KEBANGSAAN BANDAR TASIK SELATAN', 'SK', 'TIDAK', 'Bandar', 'wba0080@moe.edu.my', 'JALAN 21/146 BANDAR TASIK SELATAN 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0391725829', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000626', 'WBA0081', '1000', 'SEKOLAH KEBANGSAAN DESA PETALING', 'SK', 'TIDAK', 'Bandar', 'wba0081@moe.edu.my', 'DESA PETALING 57100 KUALA LUMPUR', null, null, '', '100000', '14', '0390576614', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000627', 'WBA0082', '1000', 'SEKOLAH KEBANGSAAN DANAU PERDANA', 'SK', 'TIDAK', 'Bandar', 'wba0082@moe.edu.my', 'JALAN DESA BAKTI 2, TAMAN DESA 58100 KUALA LUMPUR', null, null, '', '100000', '14', '0379818457', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000628', 'WBA0083', '1000', 'SEKOLAH KEBANGSAAN BUKIT JALIL', 'SK', 'TIDAK', 'Bandar', 'wba0083@moe.edu.my', 'JLN 3/155A, BUKIT JALIL GOLF RESORT 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0389966436', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000629', 'WBA0084', '1000', 'SEKOLAH KEBANGSAAN ALAM DAMAI', 'SK', 'TIDAK', 'Bandar', 'wba0084@moe.edu.my', 'PERSIARAN BISTARI CHERAS 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391023267', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000630', 'WBA0085', '1000', 'SEKOLAH KEBANGSAAN SERI TASIK', 'SK', 'TIDAK', 'Bandar', 'wba0085@moe.edu.my', 'JALAN SRI PERMAISURI 1, BANDAR SRI PERMAISURI 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391718584', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000631', 'WBA0087', '1000', 'SEKOLAH KEBANGSAAN SERI SAUJANA', 'SK', 'TIDAK', 'Bandar', 'wba0087@moe.edu.my', 'JALAN MESRA RIA, BANDAR BARU SERI PETALING 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390592243', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000632', 'WBA0088', '1000', 'SEKOLAH KEBANGSAAN COCHRANE', 'SK', 'TIDAK', 'Bandar', 'wba0088@moe.edu.my', 'JALAN SHAHBANDAR 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392822661', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000633', 'WBA0092', '1000', 'SEKOLAH KEBANGSAAN SERI ANGGERIK', 'SK', 'TIDAK', 'Bandar', 'wba0092@moe.edu.my', 'JALAN 1/144A, TAMAN LEN SEN, CHERAS        56000        KUALA LUMPUR', null, null, '', '100000', '14', '0391012506', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000634', 'WBA0093', '1000', 'SEKOLAH KEBANGSAAN COCHRANE PERKASA', 'SK', 'TIDAK', 'Bandar', 'wba0093@moe.edu.my', 'JALAN COCHRANE 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392826352', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000635', 'WBA0098', '1000', 'SEKOLAH KEBANGSAAN SERI PERMAISURI', 'SK', 'TIDAK', 'Bandar', 'wba0098@moe.edu.my', 'JALAN 6/106, BANDAR SRI PERMAISURI, CHERAS 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391712403', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000636', 'WBB0043', '1000', 'SEKOLAH KEBANGSAAN JALAN BELLAMY', 'SK', 'TIDAK', 'Bandar', 'wbb0043@moe.edu.my', 'JALAN BELLAMY 50460 KUALA LUMPUR', null, null, '', '100000', '14', '0321423475', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000637', 'WBB0044', '1000', 'SEKOLAH KEBANGSAAN BRICKFIELDS 1', 'SK', 'TIDAK', 'Bandar', 'wbb0044@moe.edu.my', 'JALAN SULTAN ABDUL SAMAD, BRICKFIELDS 50470 KUALA LUMPUR', null, null, '', '100000', '14', '0322741245', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000638', 'WBB0045', '1000', 'SEKOLAH KEBANGSAAN BRICKFIELDS 2', 'SK', 'TIDAK', 'Bandar', 'wbb0045@moe.edu.my', 'JALAN SULTAN ABDUL SAMAD, BRICKFIELDS 50470 KUALA LUMPUR', null, null, '', '100000', '14', '0322741331', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000639', 'WBB0046', '1000', 'SEKOLAH KEBANGSAAN SERI BINTANG UTARA', 'SK', 'TIDAK', 'Bandar', 'wbb0046@moe.edu.my', 'TAMAN SHAMELIN PERKASA 56100 KUALA LUMPUR', null, null, '', '100000', '14', '0392838284', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000640', 'WBB0047', '1000', 'SEKOLAH KEBANGSAAN SERI BINTANG SELATAN', 'SK', 'TIDAK', 'Bandar', 'wbb0047@moe.edu.my', 'JALAN 3/91, TAMAN SHAMELIN PERKASA 56100 KUALA LUMPUR', null, null, '', '100000', '14', '0392838367', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000641', 'WBB0050', '1000', 'SEKOLAH KEBANGSAAN ST. TERESA BRICKFIELDS 1', 'SK', 'TIDAK', 'Bandar', 'wbb0050@moe.edu.my', 'LORONG ABDUL SAMAD, BRICKFIELDS 50470 KUALA LUMPUR', null, null, '', '100000', '14', '0322741438', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000642', 'WBB0052', '1000', 'SEKOLAH KEBANGSAAN CONVENT JLN PEEL', 'SK', 'TIDAK', 'Bandar', 'wbb0052@moe.edu.my', 'JALAN PEEL 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392846550', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000643', 'WBB0056', '1000', 'SEKOLAH KEBANGSAAN DATO ABU BAKAR', 'SK', 'TIDAK', 'Bandar', 'wbb0056@moe.edu.my', 'JLN DAVIS 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392222901', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000644', 'WBB0060', '1000', 'SEKOLAH KEBANGSAAN (P) METHODIST (1) BRICKFIELDS', 'SK', 'TIDAK', 'Bandar', 'wbb0060@moe.edu.my', 'JALAN SULTAN ABDUL SAMAD, BRICKFIELDS 50470 KUALA LUMPUR', null, null, '', '100000', '14', '0322741553', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000645', 'WBB0063', '1000', 'SEKOLAH KEBANGSAAN PUTERI PANDAN 1', 'SK', 'TIDAK', 'Bandar', 'wbb0063@moe.edu.my', 'JALAN PERWIRA, KG PANDAN 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392858432', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000646', 'WBB0064', '1000', 'SEKOLAH KEBANGSAAN PUTERI PANDAN 2', 'SK', 'TIDAK', 'Bandar', 'wbb0064@moe.edu.my', 'JALAN PERWIRA, KG PANDAN 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392847052', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000647', 'WBB0065', '1000', 'SEKOLAH KEBANGSAAN LA SALLE (1) BRICKFIELDS', 'SK', 'TIDAK', 'Bandar', 'wbb0065@moe.edu.my', 'JALAN TUN SAMBANTHAN 50470 KUALA LUMPUR', null, null, '', '100000', '14', '0322743975', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000648', 'WBB0067', '1000', 'SEKOLAH KEBANGSAAN YAACOB LATIF 1', 'SK', 'TIDAK', 'Bandar', 'wbb0067@moe.edu.my', 'JALAN PEEL 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392849060', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000649', 'WBB0071', '1000', 'SEKOLAH KEBANGSAAN METHODIST (L) JLN HANG JEBAT', 'SK', 'TIDAK', 'Bandar', 'wbb0071@moe.edu.my', 'JALAN HANG JEBAT 50150 KUALA LUMPUR', null, null, '', '100000', '14', '0320789854', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000650', 'WBB0077', '1000', 'SEKOLAH KEBANGSAAN JALAN PEEL', 'SK', 'TIDAK', 'Bandar', 'wbb0077@moe.edu.my', 'JLN PEEL 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392848570', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000651', 'WBB0078', '1000', 'SEKOLAH KEBANGSAAN (P) PUDU 1', 'SK', 'TIDAK', 'Bandar', 'wbb0078@moe.edu.my', 'JALAN FOSS, PUDU 55200 KUALA LUMPUR', null, null, '', '100000', '14', '0392218354', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000652', 'WBB0082', '1000', 'SEKOLAH KEBANGSAAN ST. GABRIEL', 'SK', 'TIDAK', 'Bandar', 'wbb0082@moe.edu.my', 'JALAN PERWIRA, KG PANDAN 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392850712', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000653', 'WBB0086', '1000', 'SEKOLAH KEBANGSAAN JALAN HANG TUAH 1', 'SK', 'TIDAK', 'Bandar', 'wbb0086@moe.edu.my', 'JALAN HANG TUAH 55200 KUALA LUMPUR', null, null, '', '100000', '14', '0392214494', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000654', 'WBB0089', '1000', 'SEKOLAH KEBANGSAAN JALAN SUNGEI BESI 1', 'SK', 'TIDAK', 'Bandar', 'wbb0089@moe.edu.my', 'BATU 3 3/4 JLN SG BESI 57100 KUALA LUMPUR', null, null, '', '100000', '14', '0379835869', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000655', 'WBB0090', '1000', 'SEKOLAH KEBANGSAAN JALAN SUNGAI BESI 2', 'SK', 'TIDAK', 'Bandar', 'wbb0090@moe.edu.my', 'BATU 3 3/4 JLN SG BESI 57100 KUALA LUMPUR', null, null, '', '100000', '14', '0379813990', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000656', 'WBB0101', '1000', 'SEKOLAH KEBANGSAAN SERI SETIA', 'SK', 'TIDAK', 'Bandar', 'wbb0101@moe.edu.my', 'BT 6 1/2, JLN KUCHAI LAMA 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0379834382', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000657', 'WBB0107', '1000', 'SEKOLAH KEBANGSAAN SALAK SOUTH', 'SK', 'TIDAK', 'Bandar', 'wbb0107@moe.edu.my', 'JALAN GEMPITA 1, TAMAN SALAK SELATAN 57100 KUALA LUMPUR', null, null, '', '100000', '14', '0390574020', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000658', 'WBC0115', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) CHIN WOO', 'SJKC', 'TIDAK', 'Bandar', 'wbc0115@moe.edu.my', 'JALAN SELADANG OFF JALAN PASAR	55100	KUALA LUMPUR', null, null, '', '100000', '14', '0392210618', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000659', 'WBC0118', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) CHUNG KWO', 'SJKC', 'TIDAK', 'Bandar', 'wbc0118@moe.edu.my', 'JALAN LOKE YEW 55200 KUALA LUMPUR', null, null, '', '100000', '14', '0392216685', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000660', 'WBC0120', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) CONFUCIAN', 'SJKC', 'TIDAK', 'Bandar', 'wbc0120@moe.edu.my', '6 KM, JLN SG BESI 57100 KUALA LUMPUR', null, null, '', '100000', '14', '0379813082', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000661', 'WBC0121', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) JALAN DAVIDSON', 'SJKC', 'TIDAK', 'Bandar', 'wbc0121@moe.edu.my', 'JALAN HANG JEBAT 50150 KUALA LUMPUR', null, null, '', '100000', '14', '0320721018', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000662', 'WBC0122', '1000', 'SEKOLAH JENIS KEBANGSAN (CINA) IMBI', 'SJKC', 'TIDAK', 'Bandar', 'wbc0122@moe.edu.my', 'LOT 11029-11055 JALAN 39/119 TAMAN TAYNTON VIEW 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391339980', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000663', 'WBC0124', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) KUNG MIN', 'SJKC', 'TIDAK', 'Bandar', 'wbc0124@moe.edu.my', 'JLN LANDAK, PUDU 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392224719', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000664', 'WBC0125', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) KUEN CHENG 1', 'SJKC', 'TIDAK', 'Bandar', 'wbc0125@moe.edu.my', 'JALAN BELFIELD 50460 KUALA LUMPUR', null, null, '', '100000', '14', '0321428271', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000665', 'WBC0126', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) LA SALLE', 'SJKC', 'TIDAK', 'Bandar', 'wbc0126@moe.edu.my', 'NO:10, JALAN 2/149 , SRI PETALING 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0379871818', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000666', 'WBC0128', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) LAI MENG', 'SJKC', 'TIDAK', 'Bandar', 'wbc0128@moe.edu.my', '1, BLOK B, SEKOLAH LAI MENG, JALAN 15/155C 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0389995175', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000667', 'WBC0131', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) NAAM KHEUNG', 'SJKC', 'TIDAK', 'Bandar', 'wbc0131@moe.edu.my', 'BATU 3 1/2 JLN CHERASb 56000b KUALA LUMPUR', null, null, '', '100000', '14', '0392847371', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000668', 'WBC0133', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) CHONG FAH PHIT CHEE', 'SJKC', 'TIDAK', 'Bandar', 'wbc0133@moe.edu.my', 'JLN BRUNAI, PUDUb 55100	KUALA LUMPUR', null, null, '', '100000', '14', '0321429107', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000669', 'WBC0135', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) SAM YOKE', 'SJKC', 'TIDAK', 'Bandar', 'wbc0135@moe.edu.my', 'KM 4, JALAN SUNGAI BESI 57100 KUALA LUMPUR', null, null, '', '100000', '14', '0392217985', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000670', 'WBC0138', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) ST. TERESA BRICKFIELDS', 'SJKC', 'TIDAK', 'Bandar', 'wbc0138@moe.edu.my', 'JALAN SULTAN ABDUL SAMAD BRICKFIELDS 50470 KUALA LUMPUR', null, null, '', '100000', '14', '0322744152', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000671', 'WBC0139', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) TAI THUNG', 'SJKC', 'TIDAK', 'Bandar', 'wbc0139@moe.edu.my', 'SALAK SOUTH 57100 KUALA LUMPUR', null, null, '', '100000', '14', '0379813928', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000672', 'WBC0140', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) TSUN JIN', 'SJKC', 'TIDAK', 'Bandar', 'wbc0140@moe.edu.my', 'JALAN PERWIRA, KG. PANDAN 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392857232', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000673', 'WBC0141', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) YOKE NAM', 'SJKC', 'TIDAK', 'Bandar', 'wbc0141@moe.edu.my', 'JALAN HUJAN EMAS 6 TAMAN OVERSEAS UNION 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0379825285', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000674', 'WBC0144', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) CHOONG WEN', 'SJKC', 'TIDAK', 'Bandar', 'wbc0144@moe.edu.my', 'BATU 4 1/2,JALAN KELANG LAMA 58000 KUALA LUMPUR', null, null, '', '100000', '14', '0379834473', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000675', 'WBC0153', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) KWONG HON', 'SJKC', 'TIDAK', 'Bandar', 'wbc0153@moe.edu.my', 'SUNGAI BESI 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390581013', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000676', 'WBC0158', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) SALAK SOUTH', 'SJKC', 'TIDAK', 'Bandar', 'wbc0158@moe.edu.my', 'JALAN 38 SALAK SOUTH BARU 57100 KUALA LUMPUR', null, null, '', '100000', '14', '0379835457', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000677', 'WBC0170', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) KUEN CHENG 2', 'SJKC', 'TIDAK', 'Bandar', 'wbc0170@moe.edu.my', 'JALAN KERAYONG AMAN 50460 KUALA LUMPUR', null, null, '', '100000', '14', '0322605680', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000678', 'WBC0171', '1000', 'SEKOLAH JENIS KEBANGSAAN (CINA) TAMAN CONNAUGHT', 'SJKC', 'TIDAK', 'Bandar', 'wbc0171@moe.edu.my', 'JALAN GELIGA,TAMAN CONNAUGHT 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391309373', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000679', 'WBD0169', '1000', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) JALAN BANGSAR', 'SJKT', 'TIDAK', 'Bandar', 'wbd0169@moe.edu.my', 'JALAN LENGKUK ABDULLAH 59000 KUALA LUMPUR', null, null, '', '100000', '14', '0322825668', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000680', 'WBD0170', '1000', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) CHERAS', 'SJKT', 'TIDAK', 'Bandar', 'wbd0170@moe.edu.my', 'BATU 2 1/2, JALAN CHERAS 56100	 KUALA LUMPUR', null, null, '', '100000', '14', '0392842739', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000681', 'WBD0172', '1000', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) KG PANDAN', 'SJKT', 'TIDAK', 'Bandar', 'wbd0172@moe.edu.my', 'JALAN THAVER 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392841049', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000682', 'WBD0174', '1000', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) JLN SAN PENG', 'SJKT', 'TIDAK', 'Bandar', 'wbd0174@moe.edu.my', 'JALAN SAN PENGb 55200 KUALA LUMPUR', null, null, '', '100000', '14', '0392213652', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000683', 'WBD0178', '1000', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) VIVEKANANDA', 'SJKT', 'TIDAK', 'Bandar', 'wbd0178@moe.edu.my', 'NO 4 JLN VIVEKANANDA BRICKFIELDS 50470 KUALA LUMPUR', null, null, '', '100000', '14', '0322748218', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000684', 'WBD0181', '1000', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) LADANG BUKIT JALIL', 'SJKT', 'TIDAK', 'Bandar', 'wbd0181@moe.edu.my', 'JALAN 5/155, TAMAN INDUSTRI BUKIT OUG 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0377831173', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000685', 'WBD0191', '1000', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) SARASWATHY', 'SJKT', 'TIDAK', 'Bandar', 'wbd0191@moe.edu.my', 'KM 10 JALAN KLANG LAMA, PETALING 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0377815787', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000686', 'WBD0193', '1000', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) SG BESI', 'SJKT', 'TIDAK', 'Bandar', 'wbd0193@moe.edu.my', 'SUNGAI BESI 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390581355', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000687', 'WEA0195', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SUNGAI BESI', 'SMK', 'YA', 'Bandar', 'wea0195@moe.edu.my', 'SUNGAI BESI 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390570334', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000688', 'WEA0196', '1000', 'SEKOLAH MENENGAH KEBANGSAAN AMINUDDIN BAKI', 'SMK', 'YA', 'Bandar', 'wea0196@moe.edu.my', 'JALAN KAMPONG PANDAN 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392858219', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000689', 'WEA0198', '1000', 'KOLEJ TINGKATAN ENAM PUDUJAYA', 'KOLEJ TING 6', 'TIDAK', 'Bandar', 'wea0198@moe.edu.my', 'JALAN PASAR PUDU 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392212494', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000690', 'WEA0201', '1000', 'SEKOLAH MENENGAH KEBANGSAAN PETALING', 'SMK', 'YA', 'Bandar', 'wea0201@moe.edu.my', 'BATU 6 JALAN KELANG LAMA 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0377829153', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000691', 'WEA0206', '1000', 'SEKOLAH MENENGAH SAINS SELANGOR', 'SBP', 'TIDAK', 'Bandar', 'wea0206@moe.edu.my', 'JALAN YAACOB LATIFF BANDAR TUN RAZAK 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391316093', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000692', 'WEA0210', '1000', 'SEKOLAH MENENGAH KEBANGSAAN TAMAN TUN DR. ISMAIL', 'SMK', 'YA', 'Bandar', 'wea0210@moe.edu.my', 'JALAN LEONG YEW KOH, TAMAN TUN DR. ISMAIL 60000 KUALA LUMPUR', null, null, '', '100000', '14', '0377286993', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000693', 'WEA0212', '1000', 'SEKOLAH MENENGAH KEBANGSAAN TAMAN DESA', 'SMK', 'YA', 'Bandar', 'wea0212@moe.edu.my', 'JALAN DESA BAKTI, OFF JALAN KLANG LAMA 58100 KUALA LUMPUR', null, null, '', '100000', '14', '0379823058', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000694', 'WEA0213', '1000', 'SEKOLAH MENENGAH KEBANGSAAN BUKIT BANDARAYA', 'SMK', 'YA', 'Bandar', 'wea0213@moe.edu.my', 'LORONG MAAROF, BANGSAR 59000 KUALA LUMPUR', null, null, '', '100000', '14', '0320953645', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000695', 'WEA0216', '1000', 'SEKOLAH MENENGAH KEBANGSAAN TAMAN CONNAUGHT', 'SMK', 'TIDAK', 'Bandar', 'wea0216@moe.edu.my', 'JALAN AHLIMAN, TAMAN CONNAUGHT 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391309049', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000696', 'WEA0218', '1000', 'SEKOLAH MENENGAH KEBANGSAAN BANDAR BARU SERI PETALING', 'SMK', 'YA', 'Bandar', 'wea0218@moe.edu.my', 'JALAN RADIN 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390573732', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000697', 'WEA0219', '1000', 'SEKOLAH MENENGAH KEBANGSAAN TAMAN YARL', 'SMK', 'YA', 'Bandar', 'wea0219@moe.edu.my', 'LORONG AWAN CINA, TAMAN YARL 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0379834552', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000698', 'WEA0220', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI HARTAMAS', 'SMK', 'YA', 'Bandar', 'wea0220@moe.edu.my', 'JLN 48/70A, DESA SERI HARTAMAS 50480 KUALA LUMPUR', null, null, '', '100000', '14', '0362030048', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000699', 'WEA0222', '1000', 'SEKOLAH MENENGAH KEBANGSAAN BANDAR TUN RAZAK', 'SMK', 'YA', 'Bandar', 'wea0222@moe.edu.my', 'JALAN JAYA, BANDAR TUN RAZAK	56000	KUALA LUMPUR', null, null, '', '100000', '14', '0391314375', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000700', 'WEA0223', '1000', 'SEKOLAH MENENGAH KEBANGSAAN DESA PERDANA', 'SMK', 'TIDAK', 'Bandar', 'wea0223@moe.edu.my', 'JALAN DESA UTAMA, TAMAN DESA	58100	KUALA LUMPUR', null, null, '', '100000', '14', '0379803603', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000701', 'WEA0230', '1000', 'SEKOLAH SUKAN BUKIT JALIL', 'SMK', 'TIDAK', 'Bandar', 'wea0230@moe.edu.my', 'BUKIT JALIL, 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390587335', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000702', 'WEA0233', '1000', 'SEKOLAH MENENGAH KEBANGSAAN BANDAR TASIK SELATAN', 'SMK', 'YA', 'Bandar', 'wea0233@moe.edu.my', 'JALAN 21/146, BANDAR TASIK SELATAN 57000N KUALA LUMPUR', null, null, '', '100000', '14', '0391734288', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000703', 'WEA0237', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI SAUJANA', 'SMK', 'YA', 'Bandar', 'wea0237@moe.edu.my', 'JALAN MESRA RIA, BANDAR BARU SERI PETALING 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0390565755', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000704', 'WEA0238', '1000', 'SEKOLAH MENENGAH KEBANGSAAN MIHARJA', 'SMK', 'TIDAK', 'Bandar', 'wea0238@moe.edu.my', 'TAMAN MIHARJA , JALAN CHERAS 55200 KUALA LUMPUR', null, null, '', '100000', '14', '0392810024', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000705', 'WEA0239', '1000', 'SEKOLAH MENENGAH KEBANGSAAN BUKIT JALIL', 'SMK', 'TIDAK', 'Bandar', 'wea0239@moe.edu.my', 'JALAN 3/155A, BUKIT JALIL GOLF & COUNTRY RESORT 57000 KUALA LUMPUR', null, null, '', '100000', '14', '0389963191', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000706', 'WEA0240', '1000', 'SEKOLAH MENENGAH KEBANGSAAN DESA PETALING', 'SMK', 'TIDAK', 'Bandar', 'wea0240@moe.edu.my', 'JALAN 3/125 DESA PETALING 57100 KUALA LUMPUR', null, null, '', '100000', '14', '0390589302', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000707', 'WEA0241', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI BINTANG SELATAN', 'SMK', 'TIDAK', 'Bandar', 'wea0241@moe.edu.my', 'JALAN 3/91A, TAMAN SHAMELIN PERKASA 56100 KUALA LUMPUR', null, null, '', '100000', '14', '0392004326', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000708', 'WEA0244', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI MULIA', 'SMK', 'TIDAK', 'Bandar', 'wea0244@moe.edu.my', 'JALAN BUDIMAN 19, TAMAN MULIA, BANDAR TUN RAZAK 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391724573', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000709', 'WEA0245', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI TASIK', 'SMK', 'TIDAK', 'Bandar', 'wea0245@moe.edu.my', 'JALAN 6/106, BANDAR SRI PERMAISURI, CHERAS 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391726824', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000710', 'WEA0246', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI PERMAISURI', 'SMK', 'TIDAK', 'Bandar', 'wea0246@moe.edu.my', 'BANDAR SRI PERMAISURI 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391731171', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000711', 'WEA0247', '1000', 'SEKOLAH MENENGAH SAINS ALAM SHAH', 'SBP', 'TIDAK', 'Bandar', 'wea0247@moe.edu.my', 'JALAN YAACOB LATIFF BANDAR TUN RAZAK 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391315014', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000712', 'WEA0250', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI MUTIARA', 'SMK', 'TIDAK', 'Bandar', 'wea0250@moe.edu.my', 'JALAN 31/119, TAMAN TAYNTON VIEW, CHERAS 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391325370', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000713', 'WEA0251', '1000', 'SEKOLAH MENENGAH KEBANGSAAN COCHRANE PERKASA', 'SMK', 'TIDAK', 'Bandar', 'wea0251@moe.edu.my', 'OFF JALAN COCHRANE 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392004300', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000714', 'WEA0252', '1000', 'SEKOLAH MENENGAH KEBANGSAAN ALAM DAMAI', 'SMK', 'TIDAK', 'Bandar', 'wea0252@moe.edu.my', 'PERSIARAN BESTARI, TAMAN ALAM DAMAI, CHERAS 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391001703', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000715', 'WEA0257', '1000', 'SEKOLAH MENENGAH KEBANGSAAN ORKID DESA', 'SMK', 'TIDAK', 'Bandar', 'wea0257@moe.edu.my', 'JALAN 13/142, TAMAN ORKID DESA 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391017086', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000716', 'WEA0258', '1000', 'SEKOLAH SENI MALAYSIA KUALA LUMPUR', 'SMK', 'TIDAK', 'Bandar', 'wea0258@moe.edu.my', 'JALAN SELADANG, OFF JALAN PASAR, 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392242046', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000717', 'WEB0209', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI BINTANG UTARA', 'SMK', 'YA', 'Bandar', 'web0209@moe.edu.my', 'JALAN 3/91, TAMAN SHAMELIN PERKASA, CHERASN 56100 KUALA LUMPUR', null, null, '', '100000', '14', '0392837924', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000718', 'WEB0210', '1000', 'SEKOLAH MENENGAH KEBANGSAAN CHERAS', 'SMK', 'YA', 'Bandar', 'web0210@moe.edu.my', 'JALAN YAACOB LATIF, BANDAR TUN RAZAK 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391318517', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000719', 'WEB0211', '1000', 'SEKOLAH MENENGAH KEBANGSAAN COCHRANE', 'SMK', 'YA', 'Bandar', 'web0211@moe.edu.my', 'JALAN SHAHBANDAR, OFF JALAN COCHRANE 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392857387', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000720', 'WEB0212', '1000', 'SEKOLAH MENENGAH KEBANGSAAN CONFUCIAN', 'SMK', 'TIDAK', 'Bandar', 'web0212@moe.edu.my', 'LORONG HANG JEBAT 50150 KUALA LUMPUR', null, null, '', '100000', '14', '0320783364', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000721', 'WEB0214', '1000', 'SEKOLAH MENENGAH KEBANGSAAN CONVENT JALAN PEEL', 'SMK', 'TIDAK', 'Bandar', 'web0214@moe.edu.my', 'JALAN PEEL 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392846562', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000722', 'WEB0217', '1000', 'SEKOLAH MENENGAH KEBANGSAAN (P) BANDARAYA', 'SMK', 'YA', 'Bandar', 'web0217@moe.edu.my', 'CHANGKAT THAMBI DOLLAH 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392210380', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000723', 'WEB0219', '1000', 'SEKOLAH MENENGAH KEBANGSAAN (L) METHODIST', 'SMK', 'TIDAK', 'Bandar', 'web0219@moe.edu.my', 'JLN HANG JEBAT,KUALA LUMPUR 50150 KUALA LUMPUR', null, null, '', '100000', '14', '0320782293', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000724', 'WEB0221', '1000', 'SEKOLAH MENENGAH KEBANGSAAN (P) PUDU', 'SMK', 'TIDAK', 'Bandar', 'web0221@moe.edu.my', 'JALAN FOSS, PUDU 55200 KUALA LUMPUR', null, null, '', '100000', '14', '0392212584', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000725', 'WEB0222', '1000', 'SEKOLAH MENENGAH KEBANGSAAN ST. GABRIEL', 'SMK', 'TIDAK', 'Bandar', 'web0222@moe.edu.my', 'JALAN PERWIRA, KG PANDAN	 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392859384', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000726', 'WEB0225', '1000', 'SEKOLAH MENENGAH KEBANGSAAN (P) METHODIST', 'SMK', 'TIDAK', 'Bandar', 'web0225@moe.eddu.my', 'JLN CENDERASARI 50480 KUALA LUMPUR', null, null, '', '100000', '14', '0326926010', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000727', 'WEB0226', '1000', 'VICTORIA INSTITUTION', 'SMK', 'YA', 'Bandar', 'web0226@moe.edu.my', 'JALAN HANG TUAH 55200 KUALA LUMPUR', null, null, '', '100000', '14', '0320782489', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000728', 'WEB0227', '1000', 'SEKOLAH MENENGAH KEBANGSAAN DATOK LOKMAN', 'SMK', 'YA', 'Bandar', 'web0227@moe.edu.my', 'JALAN KAMPUNG PANDAN 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392858754', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000729', 'WEB0229', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI PANTAI', 'SMK', 'YA', 'Bandar', 'web0229@moe.edu.my', 'KAMPUNG KERINCHI 59200 KUALA LUMPUR', null, null, '', '100000', '14', '0379567409', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000730', 'WEB0230', '1000', 'SEKOLAH MENENGAH KEBANGSAAN SERI SENTOSA', 'SMK', 'YA', 'Bandar', 'web0230@moe.edu.my', 'JALAN KUCHAI LAMA 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0379831764', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000731', 'WEB0231', '1000', 'SEKOLAH MENENGAH KEBANGSAAN DATO\' ONN', 'SMK', 'YA', 'Bandar', 'web0231@moe.edu.my', 'JALAN SAN PENG 55200 KUALA LUMPUR', null, null, '', '100000', '14', '0392212008', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000732', 'WEB0232', '1000', 'SEKOLAH MENENGAH KEBANGSAAN TAMAN MALURI', 'SMK', 'YA', 'Bandar', 'web0232@moe.edu.my', 'JLN WIRAWATI 6, TAMAN MALURI 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392853023', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000733', 'WEB0235', '1000', 'SEKOLAH MENENGAH KEBANGSAAN VIVEKANANDA', 'SMK', 'TIDAK', 'Bandar', 'web0235@moe.edu.my', 'JLN ROZARIO, BRICKFIELDS 50470 KUALA LUMPUR', null, null, '', '100000', '14', '0322741736', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000734', 'WEB0236', '1000', 'SEKOLAH MENENGAH KEBANGSAAN LA SALLE BRICKFIELDS', 'SMK', 'TIDAK', 'Bandar', 'web0236@moe.edu.my', 'JALAN TUN SAMBANTHAN 50470 KUALA LUMPUR', null, null, '', '100000', '14', '0322741852', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000735', 'WEB0237', '1000', 'SEKOLAH MENENGAH KEBANGSAAN YAACOB LATIF', 'SMK', 'YA', 'Bandar', 'web0237@moe.edu.my', 'LORONG PEEL, OFF JALAN PEEL 55100 KUALA LUMPUR', null, null, '', '100000', '14', '0392848870', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000736', 'WEB0243', '1000', 'SEKOLAH MENENGAH KEBANGSAAN DHARMA', 'SMK', 'TIDAK', 'Bandar', 'web0243@moe.edu.my', 'KM 10, JLN PUCHONG 58200 KUALA LUMPUR', null, null, '', '100000', '14', '0377829908', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000737', 'WEB0256', '1000', 'SEKOLAH MENENGAH KEBANGSAAN BANGSAR', 'SMK', 'YA', 'Bandar', 'web0256@moe.edu.my', 'LORONG MAAROF 1, BANGSAR PARK, BANGSAR 59000 KUALA LUMPUR', null, null, '', '100000', '14', '0322847134', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000738', 'WFT0001', '1000', 'SMA MAJLIS AGAMA ISLAM WILAYAH PERSEKUTUAN', 'SMK AGAMA', 'TIDAK', 'Bandar', 'wft0001@moe.edu.my', 'JALAN PERMAISURI 9, BANDAR SERI PERMAISURI 56000 CHERAS KUALA LUMPUR', null, null, '', '100000', '14', '0391713661', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000739', 'WFT0002', '1000', 'SEKOLAH MENENGAH INTEGRASI SAINS TAHFIZ (SMISTA) MAIWP', 'SMK AGAMA', 'TIDAK', 'Bandar', 'wft0002@moe.edu.my', 'JALAN BUDIMAN, BANDAR TUN RAZAK 56000 KUALA LUMPUR ', null, null, '', '100000', '14', '0391711005', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000740', 'WKB0001', '1000', 'SM TEKNIK KUALA LUMPUR', 'SM TEKNIK', 'TIDAK', 'Bandar', 'wkb0001@moe.edu.my', 'JALAN YAACOB LATIFF BANDAR TUN RAZAK 56000 KUALA LUMPUR', null, null, '', '100000', '14', '0391318052', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000741', 'WBA0006', '1001', 'SEKOLAH KEBANGSAAN DATOK KERAMAT 1', 'SK', 'TIDAK', 'Bandar', 'wba0006@moe.edu.my', 'KAMPONG DATOK KERAMAT 54000 KUALA LUMPUR', null, null, '', '100000', '14', '0342560061', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000742', 'WBA0007', '1001', 'SEKOLAH KEBANGSAAN DATOK KERAMAT 2', 'SK', 'TIDAK', 'Bandar', 'wba0007@moe.edu.my', 'KAMPUNG DATOK KERAMAT 54000 KUALA LUMPUR', null, null, '', '100000', '14', '0342566711', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000743', 'WBA0008', '1001', 'SEKOLAH KEBANGSAAN POLIS DEPOT', 'SK', 'TIDAK', 'Bandar', 'wba0008@moe.edu.my', 'JALAN SULTAN YAHYA PETRA 54100 KUALA LUMPUR', null, null, '', '100000', '14', '0326984954', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000744', 'WBA0010', '1001', 'SEKOLAH KEBANGSAAN SETAPAK', 'SK', 'TIDAK', 'Bandar', 'wba0010@moe.edu.my', 'JALAN CHAN CHIN MOOI, OFF JALAN PAHANG 53200 KUALA LUMPUR', null, null, '', '100000', '14', '0340236401', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000745', 'WBA0013', '1001', 'SEKOLAH KEBANGSAAN KAMPUNG BHARU', 'SK', 'TIDAK', 'Bandar', 'wba0013@moe.edu.my', 'JLN DATUK ABDUL RAZAK, KG BHARU 50300 KUALA LUMPUR', null, null, '', '100000', '14', '0326983557', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000746', 'WBA0015', '1001', 'SEKOLAH KEBANGSAAN WANGSA JAYA', 'SK', 'TIDAK', 'Bandar', 'wba0015@moe.edu.my', 'WANGSA MAJU, SEKSYEN 4        53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341494455', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000747', 'WBA0016', '1001', 'SEKOLAH KEBANGSAAN WANGSA MAJU SEKSYEN 1', 'SK', 'TIDAK', 'Bandar', 'wba0016@moe.edu.my', 'BANDAR BARU WANGSA MAJU, SETAPAK 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341493707', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000748', 'WBA0047', '1001', 'SEKOLAH KEBANGSAAN WANGSA MAJU SEKSYEN 2', 'SK', 'TIDAK', 'Bandar', 'wba0047@moe.edu.my', 'JALAN 4/27A, BANDAR BARU WANGSA MAJU 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341494545', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000749', 'WBA0048', '1001', 'SEKOLAH KEBANGSAAN PENDIDIKAN KHAS KG BAHARU', 'SK (KHAS)', 'TIDAK', 'Bandar', 'wba0048@moe.edu.my', 'JALAN RAJA ABDULLAH, KG. BHARU 50300 KUALA LUMPUR ', null, null, '', '100000', '14', '0326927141', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000750', 'WBA0053', '1001', 'SEKOLAH KEBANGSAAN AU KERAMAT', 'SK', 'TIDAK', 'Bandar', 'wba0053@moe.edu.my', 'JALAN 5/56 AU3 54200 KUALA LUMPUR', null, null, '', '100000', '14', '0341079639', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000751', 'WBA0058', '1001', 'SEKOLAH KEBANGSAAN SETIAWANGSA', 'SK', 'TIDAK', 'Bandar', 'wba0058@moe.edu.my', 'JALAN SETIAWANGSA 13,TAMAN SETIAWANGSA 54200 KUALA LUMPUR', null, null, '', '100000', '14', '0342528019', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000752', 'WBA0060', '1001', 'SEKOLAH KEBANGSAAN TAMAN SERI RAMPAI', 'SK', 'TIDAK', 'Bandar', 'wba0060@moe.edu.my', 'JALAN 67/26, TAMAN SRI RAMPAI, SETAPAK 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0340242990', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000753', 'WBA0061', '1001', 'SEKOLAH KEBANGSAAN DESA TUN HUSSEIN ONN', 'SK', 'TIDAK', 'Bandar', 'wba0061@moe.edu.my', 'DESA TUN HUSSEIN ONN, JLN. JELATEK, KERAMAT 54200 KUALA LUMPUR', null, null, '', '100000', '14', '0341436808', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000754', 'WBA0062', '1001', 'SEKOLAH KEBANGSAAN WANGSA MELAWATI', 'SK', 'TIDAK', 'Bandar', 'wba0062@moe.edu.my', 'JALAN GENTING KLANG 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341438188', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000755', 'WBA0063', '1001', 'SEKOLAH KEBANGSAAN JALAN RAJA MUDA', 'SK', 'TIDAK', 'Bandar', 'wba0063@moe.edu.my', 'JALAN RAJA MUDA ABDUL AZIZ 50300 KUALA LUMPUR', null, null, '', '100000', '14', '0326938080', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000756', 'WBA0066', '1001', 'SEKOLAH KEBANGSAAN WANGSA MAJU ZON R10', 'SK', 'TIDAK', 'Bandar', 'wba0066@moe.edu.my', 'SEKSYEN 10 WANGSA MAJU 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341420953', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000757', 'WBA0067', '1001', 'SEKOLAH KEBANGSAAN DESA SETAPAK', 'SK', 'TIDAK', 'Bandar', 'wba0067@moe.edu.my', 'TAMAN DESA SETAPAK 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341426989', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000758', 'WBA0068', '1001', 'SEKOLAH KEBANGSAAN SETAPAK INDAH', 'SK', 'TIDAK', 'Bandar', 'wba0068@moe.edu.my', 'JLN 2/6, SETAPAK INDAH 53100 KUALA LUMPUR', null, null, '', '100000', '14', '0340211013', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000759', 'WBA0070', '1001', 'SEKOLAH KEBANGSAAN DANAU KOTA', 'SK', 'TIDAK', 'Bandar', 'wba0070@moe.edu.my', 'JALAN 2/23E, TAMAN DANAU KOTA	53300	KUALA LUMPUR', null, null, '', '100000', '14', '0340251730', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000760', 'WBA0090', '1001', 'SEKOLAH KEBANGSAAN TAMAN MELATI', 'SK', 'TIDAK', 'Bandar', 'wba0090@moe.edu.my', 'TAMAN MELATI,SETAPAK 53100 KUALA LUMPUR', null, null, '', '100000', '14', '0341084420', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000761', 'WBA0096', '1001', 'SEKOLAH KEBANGSAAN DANAU KOTA 2', 'SK', 'TIDAK', 'Bandar', 'wba0096@moe.edu.my', 'LOT 21569, JALAN GENTING KLANG 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341498975', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000762', 'WBA0099', '1001', 'SEKOLAH KEBANGSAAN KEMENTAH', 'SK', 'TIDAK', 'Bandar', 'wba0099@moe.edu.my', 'JALAN LAKSAMANA KEM KEMENTAH 54200 KUALA LUMPUR', null, null, '', '100000', '14', '0326915044', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000763', 'WBA0100', '1001', 'SEKOLAH KEBANGSAAN SERI BONUS', 'SK', 'TIDAK', 'Bandar', 'wba0100@moe.edu.my', 'LOT 8757 JALAN AYER KEROH 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0340210482', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000764', 'WBB0038', '1001', 'SEKOLAH KEBANGSAAN JALAN AIR PANAS', 'SK', 'TIDAK', 'Bandar', 'wbb0038@moe.edu.my', 'JALAN AIR PANAS, SETAPAK 53200 KUALA LUMPUR', null, null, '', '100000', '14', '0340231405', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000765', 'WBB0048', '1001', 'SEKOLAH KEBANGSAAN CONVENT (1) BUKIT NANAS', 'SK', 'TIDAK', 'Bandar', 'wbb0048@moe.edu.my', 'JALAN BUKIT NANAS	50250	KUALA LUMPUR', null, null, '', '100000', '14', '0320725264', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000766', 'WBB0049', '1001', 'SEKOLAH KEBANGSAAN CONVENT (2) BUKIT NANAS', 'SK', 'TIDAK', 'Bandar', 'wbb0049@moe.edu.my', 'JALAN BUKIT NANAS 50250 KUALA LUMPUR', null, null, '', '100000', '14', '0320783824', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000767', 'WBB0055', '1001', 'SEKOLAH KEBANGSAAN MARIAN CONVENT SETAPAK', 'SK', 'TIDAK', 'Bandar', 'wbb0055@moe.edu.my', 'JALAN AIR JERNIH 53200 KUALA LUMPUR', null, null, '', '100000', '14', '0340236357', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000768', 'WBB0058', '1001', 'SEKOLAH KEBANGSAAN JALAN GURNEY 1', 'SK', 'TIDAK', 'Bandar', 'wbb0058@moe.edu.my', 'JALAN GURNEY SATU 54000 KUALA LUMPUR', null, null, '', '100000', '14', '0326988475', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000769', 'WBB0059', '1001', 'SEKOLAH KEBANGSAAN JALAN GURNEY 2', 'SK', 'TIDAK', 'Bandar', 'wbb0059@moe.edu.my', 'JALAN GURNEY SATU 54000 KUALA LUMPUR', null, null, '', '100000', '14', '0326922573', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000770', 'WBB0061', '1001', 'SEKOLAH KEBANGSAAN JALAN KUANTAN 1', 'SK', 'TIDAK', 'Bandar', 'wbb0061@moe.edu.my', 'JALAN KUANTAN 53200 KUALA LUMPUR', null, null, '', '100000', '14', '0340234671', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000771', 'WBB0062', '1001', 'SEKOLAH KEBANGSAAN JALAN KUANTAN 2', 'SK', 'TIDAK', 'Bandar', 'wbb0062@moe.edu.my', 'JALAN KUANTAN 53200 KUALA LUMPUR', null, null, '', '100000', '14', '0340235525', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000772', 'WBB0073', '1001', 'SEKOLAH KEBANGSAAN PADANG TEMBAK 1', 'SK', 'TIDAK', 'Bandar', 'wbb0073@moe.edu.my', 'JALAN SULTAN YAHYA PETRA 54100 KUALA LUMPUR', null, null, '', '100000', '14', '0326929910', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000773', 'WBB0074', '1001', 'SEKOLAH KEBANGSAAN PADANG TEMBAK 2', 'SK', 'TIDAK', 'Bandar', 'wbb0074@moe.edu.my', 'JALAN SULTAN YAHYA PETRA 54100 KUALA LUMPUR', null, null, '', '100000', '14', '0326921827', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000774', 'WBB0083', '1001', 'SEKOLAH KEBANGSAAN ST. JOHN 1', 'SK', 'TIDAK', 'Bandar', 'wbb0083@moe.edu.my', 'JALAN BUKIT NANAS 50250 KUALA LUMPUR', null, null, '', '100000', '14', '0320781643', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000775', 'WBC0117', '1001', 'SEKOLAH JENIS KEBANGSAAN (CINA) CHUNG HWA \'P\'', 'SK', 'TIDAK', 'Bandar', 'wbb0084@moe.edu.my', 'JALAN DAMAI OFF JALAN AMPANG 55000 KUALA LUMPUR', null, null, '', '100000', '14', '0320781849', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000776', 'WBC0130', '1001', 'SEKOLAH JENIS KEBANGSAAN (CINA) MUN YEE', 'SJKC', 'TIDAK', 'Bandar', 'wbc0117@moe.edu.my', 'JALAN MAWAR, SETAPAK 53000 KUALA LUMPUR', null, null, '', '100000', '14', '0321486453', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000777', 'WBC0132', '1001', 'SEKOLAH JENIS KEBANGSAAN (CINA) NAN KAI', 'SJKC', 'TIDAK', 'Bandar', 'wbc0130@moe.edu.my', 'PERSIARAN RAJA CHULAN 50200 KUALA LUMPUR', null, null, '', '100000', '14', '0340310631', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000778', 'WBC0155', '1001', 'SEKOLAH JENIS KEBANGSAAN (CINA) NAN YIK \'LEE RUBBER\'', 'SJKC', 'TIDAK', 'Bandar', 'wbc0132@moe.edu.my', 'BATU 5, JLN GOMBAK 53000 KUALA LUMPUR', null, null, '', '100000', '14', '0320725488', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000779', 'WBC0173', '1001', 'SEKOLAH JENIS KEBANGSAAN (CINA) WANGSA MAJU', 'SJKC', 'TIDAK', 'Bandar', 'wbc0155@moe.edu.my', '10, JALAN USAHAWAN 2, DANAU KOTA 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341316201', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000780', 'WBD0171', '1001', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) FLETCHER', 'SJKC', 'TIDAK', 'Bandar', 'wbc0173@moe.edu.my', 'JALAN TUN RAZAK 53200 KUALA LUMPUR', null, null, '', '100000', '14', '03-2693 5951', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000781', 'WEA0197', '1001', 'SEKOLAH MENENGAH KEBANGSAAN PUTERI WILAYAH', 'SJKT', 'TIDAK', 'Bandar', 'wbd0171@moe.edu.my', 'JALAN DEWAN SULTAN SULAIMAN, KG. BHARU 50300 KUALA LUMPUR', null, null, '', '100000', '14', '0326935951', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000782', 'WEA0199', '1001', 'SEKOLAH MENENGAH KEBANGSAAN PADANG TEMBAK', 'SMK', 'TIDAK', 'Bandar', 'wea0197@moe.edu.my', 'JALAN YAHYA PETRA 54100 KUALA LUMPUR', null, null, '', '100000', '14', '0326982686', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000783', 'WEA0211', '1001', 'SEKOLAH MENENGAH KEBANGSAAN PENDIDIKAN KHAS SETAPAK', 'SMK (KHAS)', 'TIDAK', 'Bandar', 'wea0199@moe.edu.my', 'JALAN GENTING KELANG, SETAPAK 53300 KUALA LUMPUR ', null, null, '', '100000', '14', '0326987535', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000784', 'WEA0214', '1001', 'SEKOLAH MENENGAH KEBANGSAAN WANGSA MAJU SEKSYEN 2', 'SMK', 'YA', 'Bandar', 'wea0211@moe.edu.my', 'SEKSYEN 2 WANGSA MAJU, JALAN 4A/27,SETAPAK 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341493701', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000785', 'WEA0215', '1001', 'SEKOLAH MENENGAH KEBANGSAAN ZON R1 WANGSA MAJU', 'SMK', 'YA', 'Bandar', 'wea0214@moe.edu.my', 'WANGSA MAJU SEKSYEN 1, SETAPAK 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341490630', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000786', 'WEA0221', '1001', 'SEKOLAH MENENGAH KEBANGSAAN TAMAN SERI RAMPAI', 'SMK', 'YA', 'Bandar', 'wea0215@moe.edu.my', 'JALAN REJANG, SETAPAK 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341496122', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000787', 'WEA0224', '1001', 'SEKOLAH MENENGAH KEBANGSAAN TAMAN MELATI', 'SMK', 'YA', 'Bandar', 'wea0221@moe.edu.my', 'JALAN TAMAN MELATI 1 53100 KUALA LUMPUR', null, null, '', '100000', '14', '0340243034', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000788', 'WEA0225', '1001', 'SEKOLAH MENENGAH KEBANGSAAN SEKSYEN 5 WANGSA MAJU', 'SMK', 'TIDAK', 'Bandar', 'wea0224@moe.edu.my', 'JLN. 8/27A WANGSA MAJU 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341055193', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000789', 'WEA0226', '1001', 'SEKOLAH MENENGAH KEBANGSAAN DESA TUN HUSSEIN ONN', 'SMK', 'YA', 'Bandar', 'wea0225@moe.edu.my', 'JALAN JELATEK 54200 KUALA LUMPUR', null, null, '', '100000', '14', '0341427822', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000790', 'WEA0229', '1001', 'SEKOLAH MENENGAH KEBANGSAAN WANGSA MELAWATI', 'SMK', 'YA', 'Bandar', 'wea0226@moe.edu.my', 'JALAN GENTING KELANG 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0341436806', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000791', 'WEA0232', '1001', 'SEKOLAH MENENGAH KEBANGSAAN TAMAN SETIAWANGSA', 'SMK', 'YA', 'Bandar', 'wea0229@moe.edu.my', 'JALAN BUKIT SETIAWANGSA 54200 KUALA LUMPUR', null, null, '', '100000', '14', '0341436171', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000792', 'WEA0235', '1001', 'SEKOLAH MENENGAH KEBANGSAAN SETAPAK INDAH', 'SMK', 'YA', 'Bandar', 'wea0232@moe.edu.my', 'JALAN 2/6, TAMAN SETAPAK INDAH 53100 KUALA LUMPUR', null, null, '', '100000', '14', '0342522891', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000793', 'WEA0242', '1001', 'SEKOLAH MENENGAH KEBANGSAAN DANAU KOTA', 'SMK', 'TIDAK', 'Bandar', 'wea0235@moe.edu.my', 'LOT 21570 JALAN GENTING KLANG 53300 KUALA LUMPUR', null, null, '', '100000', '14', '0340224964', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000794', 'WEA0255', '1001', 'SEKOLAH BIMBINGAN JALINAN KASIH', 'SMK', 'TIDAK', 'Bandar', 'wea0242@moe.edu.my', 'LORONG HAJI HUSSEIN 2, CHOW KIT 50300 KUALA LUMPUR ', null, null, '', '100000', '14', '0341438794', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000795', 'WEA0259', '1001', 'SEKOLAH MENENGAH KEBANGSAAN KERAMAT WANGSA', 'SMK', 'TIDAK', 'Bandar', 'wea0259@moe.edu.my', 'NO 3 JALAN 23/56, OFF TAMAN SETIAWANGSA 54200 KUALA LUMPUR', null, null, '', '100000', '14', '0326911040', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000796', 'WEB0206', '1001', 'SEKOLAH MENENGAH KEBANGSAAN SERI AMPANG', 'SMK', 'YA', 'Bandar', 'web0206@m,oe.edu.my', 'JALAN DAMAI OFF JALAN AMPANG 55000 KUALA LUMPUR', null, null, '', '100000', '14', '0342510294', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000797', 'WEB0207', '1001', 'SEKOLAH MENENGAH KEBANGSAAN PUTERI AMPANG', 'SMK', 'YA', 'Bandar', 'web0207@moe.edu.my', 'JALAN DAMAI OFF JALAN AMPANG 55000 KUALA LUMPUR', null, null, '', '100000', '14', '0321487065', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000798', 'WEB0208', '1001', 'SEKOLAH MENENGAH KEBANGSAAN (P) AIR PANAS', 'SMK', 'YA', 'Bandar', 'web0208@moe.edu.my', 'JALAN AIR PANAS, SETAPAK 53200 KUALA LUMPUR', null, null, '', '100000', '14', '0321487797', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000799', 'WEB0213', '1001', 'SEKOLAH MENENGAH KEBANGSAAN CONVENT BUKIT NANAS', 'SMK', 'TIDAK', 'Bandar', 'web0213@moe.edu.my', 'JALAN BUKIT NANAS 50250 KUALA LUMPUR', null, null, '', '100000', '14', '0340234886', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000800', 'WEB0216', '1001', 'SEKOLAH MENENGAH KEBANGSAAN TINGGI SETAPAK', 'SMK', 'YA', 'Bandar', 'web0216@moe.edu.my', 'JALAN AIR JERNIH SETAPAK 53200 KUALA LUMPUR', null, null, '', '100000', '14', '0320780559', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000801', 'WEB0223', '1001', 'ST. JOHN\'S INSTITUTION', 'SMK', 'TIDAK', 'Bandar', 'web0223@moe.edu.my', 'JALAN BUKIT NANAS 50250 KUALA LUMPUR', null, null, '', '100000', '14', '0340236191', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000802', 'WEB0233', '1001', 'SEKOLAH MENENGAH KEBANGSAAN SERI TITIWANGSA', 'SMK', 'YA', 'Bandar', 'web0233@moe.edu.my', 'JALAN TEMERLOH 53200 KUALA LUMPUR', null, null, '', '100000', '14', '0320782846', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000803', 'WEB0234', '1001', 'SEKOLAH MENENGAH KEBANGSAAN PUTERI TITIWANGSA', 'SMK', 'YA', 'Bandar', 'web0234@moe.edu.my', 'JALAN TEMERLOH 53200 KUALA LUMPUR', null, null, '', '100000', '14', '0340214882', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000804', 'WHA0001', '1001', 'KOLEJ VOKASIONAL ERT SETAPAK', 'KOLEJ VK', 'TIDAK', 'Bandar', 'wha0001@moe.edu.my', 'JALAN GENTING KELANG, SETAPAK 53300 KUALA LUMPUR ', null, null, '', '100000', '14', '0326923249', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000805', 'WHA0002', '1001', 'KOLEJ VOKASIONAL SETAPAK', 'KOLEJ VK', 'TIDAK', 'Bandar', 'wha0002@moe.edu.my', 'JALAN GENTING KELANG, SETAPAK 53300 KUALA LUMPUR ', null, null, '', '100000', '14', '0341421085', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000806', 'WBA0009', '1002', 'SEKOLAH KEBANGSAAN SENTUL 1', 'SK', 'TIDAK', 'Bandar', 'wba0009@moe.edu.my', 'JALAN SENTUL PASAR 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0341495578', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000807', 'WBA0014', '1002', 'SEKOLAH KEBANGSAAN TAMAN BUKIT MALURI', 'SK', 'TIDAK', 'Bandar', 'wba0014@moe.edu.my', 'JALAN BURUNG KASAWARI, TAMAN BUKIT MALURI 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362742666', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000808', 'WBA0020', '1002', 'SEKOLAH KEBANGSAAN KG SELAYANG', 'SK', 'TIDAK', 'Bandar', 'wba0020@moe.edu.my', 'KAMPUNG SELAYANG LAMA 68100 KUALA LUMPUR', null, null, '', '100000', '14', '0361367472', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000809', 'WBA0021', '1002', 'SEKOLAH KEBANGSAAN KG BATU', 'SK', 'TIDAK', 'Bandar', 'wba0021@moe.edu.my', 'BATU 4 1/2, JALAN IPOH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362589218', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000810', 'WBA0022', '1002', 'SEKOLAH KEBANGSAAN SEGAMBUT', 'SK', 'TIDAK', 'Bandar', 'wba0022@moe.edu.my', 'JALAN SEGAMBUT 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362580832', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000811', 'WBA0041', '1002', 'SEKOLAH KEBANGSAAN SENTUL 2', 'SK', 'TIDAK', 'Bandar', 'wba0041@moe.edu.my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340427858', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000812', 'WBA0046', '1002', 'SEKOLAH KEBANGSAAN BANDAR BARU SENTUL', 'SK', 'TIDAK', 'Bandar', 'wba0046@moe.edu.my', 'JLN 1A/41 BANDAR BARU SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340413911', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000813', 'WBA0049', '1002', 'SEKOLAH KEBANGSAAN PENDIDIKAN KHAS JLN BATU', 'SK (KHAS)', 'TIDAK', 'Bandar', 'wba0049@moe.edu.my', 'JALAN RAJA LAUT 50350 KUALA LUMPUR.', null, null, '', '100000', '14', '0326921261', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000814', 'WBA0054', '1002', 'SEKOLAH KEBANGSAAN SERI PERAK', 'SK', 'TIDAK', 'Bandar', 'wba0054@moe.edu.my', 'JALAN 1A/48A, BANDAR BARU SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340417696', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000815', 'WBA0056', '1002', 'SEKOLAH KEBANGSAAN TAMAN KOPERASI POLIS', 'SK', 'TIDAK', 'Bandar', 'wba0056@moe.edu.my', 'TAMAN KOPERASI POLIS FASA 2, BATU CAVES 68100 KUALA LUMPUR', null, null, '', '100000', '14', '0361871880', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000816', 'WBA0059', '1002', 'SEKOLAH KEBANGSAAN TAMAN KEPONG', 'SK', 'TIDAK', 'Bandar', 'wba0059@moe.edu.my', 'JALAN KELICAP KEPONG BARU 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362756122', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000817', 'WBA0064', '1002', 'SEKOLAH KEBANGSAAN MENJALARA', 'SK', 'TIDAK', 'Bandar', 'wba0064@moe.edu.my', 'BANDAR MENJALARA, KEPONG 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362760669', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000818', 'WBA0065', '1002', 'SEKOLAH KEBANGSAAN TAMAN SERI SINAR', 'SK', 'TIDAK', 'Bandar', 'wba0065@moe.edu.my', 'JALAN 6/38A, TAMAN SRI SINAR 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362724815', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000819', 'WBA0072', '1002', 'SEKOLAH KEBANGSAAN SERI MURNI', 'SK', 'TIDAK', 'Bandar', 'wba0072@moe.edu.my', 'TAMAN SERI MURNI BATU CAVES 68100 KUALA LUMPUR', null, null, '', '100000', '14', '0361379832', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000820', 'WBA0077', '1002', 'SEKOLAH KEBANGSAAN SERI NILAM', 'SK', 'TIDAK', 'Bandar', 'wba0077@moe.edu.my', 'TAMAN KOPERASI POLIS FASA 2 68100 KUALA LUMPUR', null, null, '', '100000', '14', '0361854178', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000821', 'WBA0079', '1002', 'SEKOLAH KEBANGSAAN SERI KEPONG', 'SK', 'TIDAK', 'Bandar', 'wba0079@moe.edu.my', 'JLN LANG PERUT PUTIH 9, TAMAN KEPONG BARU TAMBAHAN 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362726224', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000822', 'WBA0086', '1002', 'SEKOLAH KEBANGSAAN INTAN BAIDURI', 'SK', 'TIDAK', 'Bandar', 'wba0086@moe.edu.my', 'JALAN INTAN BAIDURI 5D, TAMAN INTAN BAIDURI 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0361381677', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000823', 'WBA0089', '1002', 'SEKOLAH KEBANGSAAN KIARAMAS', 'SK', 'TIDAK', 'Bandar', 'wba0089@moe.edu.my', 'PERSIARAN DUTAMAS 50480 KUALA LUMPUR', null, null, '', '100000', '14', '0362013697', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000824', 'WBA0091', '1002', 'SEKOLAH KEBANGSAAN SEGAMBUT MAKMUR', 'SK', 'TIDAK', 'Bandar', 'wba0091@moe.edu.my', 'JALAN 2/60A TAMAN DESA SEGAMBUT 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362572795', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000825', 'WBA0094', '1002', 'SEKOLAH KEBANGSAAN SENTUL UTAMA', 'SK', 'TIDAK', 'Bandar', 'wba0094@moe.edu.my', 'BATU 2 1/2 JALAN IPOH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0340432599', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000826', 'WBA0095', '1002', 'SEKOLAH KEBANGSAAN BATU MUDA', 'SK', 'TIDAK', 'Bandar', 'wba0095@moe.edu.my', 'PPR BATU MUDA, JALAN IPOH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362595642', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000827', 'WBA0097', '1002', 'SEKOLAH KEBANGSAAN TIARA PERMAI', 'SK', 'TIDAK', 'Bandar', 'wba0097@moe.edu.my', 'JALAN 8/18A, TAMAN MASTIARA, BATU 5, JALAN IPOH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362500412', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000828', 'WBB0039', '1002', 'SEKOLAH KEBANGSAAN (L) JALAN BATU', 'SK', 'TIDAK', 'Bandar', 'wbb0039@moe.edu.my', 'JALAN RAJA LAUT 50350 KUALA LUMPUR', null, null, '', '100000', '14', '0326985272', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000829', 'WBB0041', '1002', 'SEKOLAH KEBANGSAAN (P) JALAN BATU', 'SK', 'TIDAK', 'Bandar', 'wbb0041@moe.edu.my', 'JLN SULTAN ISMAIL 50350 KUALA LUMPUR', null, null, '', '100000', '14', '0326949941', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000830', 'WBB0053', '1002', 'SEKOLAH KEBANGSAAN CONVENT SENTUL 1', 'SK', 'TIDAK', 'Bandar', 'wbb0053@moe.edu.my', 'JALAN TANAH LAPANG, SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340419288', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000831', 'WBB0054', '1002', 'SEKOLAH KEBANGSAAN CONVENT SENTUL 2', 'SK', 'TIDAK', 'Bandar', 'wbb0054@moe.edu.my', 'JALAN TANAH LAPANG, SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340411149', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000832', 'WBB0069', '1002', 'SEKOLAH KEBANGSAAN LA SALLE (1) SENTUL', 'SK', 'TIDAK', 'Bandar', 'wbb0069@moe.edu.my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340443196', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000833', 'WBB0072', '1002', 'SEKOLAH KEBANGSAAN (L) METHODIST SENTUL', 'SK', 'TIDAK', 'Bandar', 'wbb0072@moe.edu.my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340420692', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000834', 'WBB0085', '1002', 'SEKOLAH KEBANGSAAN ST. MARY', 'SK', 'TIDAK', 'Bandar', 'wbb0085@moe.edu.my', 'JALAN INTAN BAIDURI 5D, TAMAN INTAN BAIDURI 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0361381258', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000835', 'WBB0088', '1002', 'SEKOLAH KEBANGSAAN SRI DHANDAYUTHAPANI', 'SK', 'TIDAK', 'Bandar', 'wbb0088@moe.edu.my', 'BATU 2 1/2, JALAN SULTAN AZLAN SHAH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0340415434', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000836', 'WBB0097', '1002', 'SEKOLAH KEBANGSAAN (1) BATU 4 JALAN IPOH', 'SK', 'TIDAK', 'Bandar', 'wbb0097@moe.edu.my', 'BT 4 1/2 , JALAN IPOH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362583040', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000837', 'WBB0098', '1002', 'SEKOLAH KEBANGSAAN SERI DELIMA', 'SK', 'TIDAK', 'Bandar', 'wbb0098@moe.edu.my', 'KAMPUNG BATU JALAN IPOH 52000 KUALA LUMPUR', null, null, '', '100000', '14', '0362582345', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000838', 'WBB0103', '1002', 'SEKOLAH KEBANGSAAN LA SALLE 1 JINJANG', 'SK', 'TIDAK', 'Bandar', 'wbb0103@moe.edu.my', 'EAST ROAD, JINJANG UTARA 52000 KUALA LUMPUR', null, null, '', '100000', '14', '0362581405', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000839', 'WBB0113', '1002', 'SEKOLAH KEBANGSAAN KEPONG BARU', 'SK', 'TIDAK', 'Bandar', 'wbb0113@moe.edu.my', 'JALAN API-API EMPAT, KEPONG BARU 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362583469', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000840', 'WBB0217', '1002', 'SEKOLAH KEBANGSAAN LA SALLE 2 JINJANG', 'SK', 'TIDAK', 'Bandar', 'wbb0217@moe.du.my', 'EAST ROAD, JINJANG UTARA 52000 KUALA LUMPUR', null, null, '', '100000', '14', '0362515908', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000841', 'WBC0113', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) CHI MAN', 'SJKC', 'TIDAK', 'Bandar', 'wbc0113@moe.edu.my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340420135', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000842', 'WBC0114', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) CHIAO NAN', 'SJKC', 'TIDAK', 'Bandar', 'wbc0114@moe.edu.my', '26-28, JALAN PAHANG 53000 KUALA LUMPUR', null, null, '', '100000', '14', '0340235589', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000843', 'WBC0116', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) CHONG HWA', 'SJKC', 'TIDAK', 'Bandar', 'wbc0116@moe.edu.my', 'JALAN PAHANG, SETAPAK 53000 KUALA LUMPUR', null, null, '', '100000', '14', '0340235856', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000844', 'WBC0119', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) CHUNG KWOK', 'SJKC', 'TIDAK', 'Bandar', 'wbc0119@moe.edu.my', 'JLN MERPATI OFF JLN RAJA LAUT 50350 KUALA LUMPUR', null, null, '', '100000', '14', '0326985995', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000845', 'WBC0123', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) KHAI CHEE', 'SJKC', 'TIDAK', 'Bandar', 'wbc0123@moe.edu.my', 'JALAN SEGAMBUT 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362433275', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000846', 'WBC0127', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) LAI CHEE', 'SJKC', 'TIDAK', 'Bandar', 'wbc0127@moe.edu.my', 'BATU 3 1/2 JALAN SULTAN AZLAN SHAH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362580655', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000847', 'WBC0136', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) SENTUL', 'SJKC', 'TIDAK', 'Bandar', 'wbc0136@moe.edu.my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340411485', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000848', 'WBC0137', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) SENTUL PASAR', 'SJKC', 'TIDAK', 'Bandar', 'wbc0137@moe.edu.my', 'JALAN KAMPUNG BANDAR DALAM, SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340420306', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000849', 'WBC0146', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) JINJANG TENGAH 1', 'SJKC', 'TIDAK', 'Bandar', 'wbc0146@moe.edu.my', 'JALAN JINJANG PERMAI 8,JINJANG UTARA 52000 KUALA LUMPUR', null, null, '', '100000', '14', '0362589927', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000850', 'WBC0147', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) JINJANG UTARA', 'SJKC', 'TIDAK', 'Bandar', 'wbc0147@moe.edu.my', 'JALAN JINJANG DAMAI 1 , JINJANG UTARA 52000 KUALA LUMPUR', null, null, '', '100000', '14', '0362580027', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000851', 'WBC0148', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) JINJANG SELATAN', 'SJKC', 'TIDAK', 'Bandar', 'wbc0148@moe.edu.my', 'JALAN JAMBU GAJUS, JALAN KEPONG, JINJANG SELATAN 52000 KUALA LUMPUR', null, null, '', '100000', '14', '0362589018', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000852', 'WBC0149', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) KEPONG 1', 'SJKC', 'TIDAK', 'Bandar', 'wbc0149@moe.edu.my', 'JALAN BESAR KEPONG, BELAKANG BALAI POLIS KEPONG 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362749745', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000853', 'WBC0150', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) KEPONG 2', 'SJKC', 'TIDAK', 'Bandar', 'wbc0150@moe.edu.my', 'JALAN BESAR KEPONG, BELAKANG BALAI POLIS KEPONG 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362749509', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000854', 'WBC0154', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) MUN CHOONG', 'SJKC', 'TIDAK', 'Bandar', 'wbc0154@moe.du.my', 'KAMPUNG BATU, BATU 5, JALAN IPOH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362516643', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000855', 'WBC0168', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) JINJANG TENGAH 2', 'SJKC', 'TIDAK', 'Bandar', 'wbc0168@moe.edu.my', 'JALAN JINJANG PERMAI 8, JINJANG 52000 KUALA LUMPUR', null, null, '', '100000', '14', '0361794025', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000856', 'WBC0172', '1002', 'SEKOLAH JENIS KEBANGSAAN (CINA) KEPONG 3', 'SJKC', 'TIDAK', 'Bandar', 'wbc0172@moe.edu.my', '1, JALAN SRI BINTANG UTAMA, DESA PARKCITY 52200 KUALA LUMPUR', null, null, '', '100000', '14', '0362735790', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000857', 'WBD0168', '1002', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) APPAR', 'SJKT', 'TIDAK', 'Bandar', 'wbd0168@moe.edu.my', 'JALAN MERPATI, OFF JALAN RAJA LAUT 50350 KUALA LUMPUR', null, null, '', '100000', '14', '0326984792', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000858', 'WBD0175', '1002', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) SENTUL', 'SJKT', 'TIDAK', 'Bandar', 'wbd0175@moe.edu.my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340416079', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000859', 'WBD0176', '1002', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) ST. JOSEPH', 'SJKT', 'TIDAK', 'Bandar', 'wbd0176@moe.edu.my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340419844', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000860', 'WBD0177', '1002', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) THAMBOOSAMY PILLAI', 'SJKT', 'TIDAK', 'Bandar', 'wbd0177@moe.edu.my', 'JALAN CEMPEDAK, SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340422175', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000861', 'WBD0184', '1002', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) LADANG EDINBURGH', 'SJKT', 'TIDAK', 'Bandar', 'wbd0184@moe.edu.my', 'TAMAN BUKIT MALURI, JALAN BURUNG JAMPUK, KEPONG 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362731242', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000862', 'WBD0192', '1002', 'SEKOLAH JENIS KEBANGSAAN (TAMIL) SEGAMBUT', 'SJKT', 'TIDAK', 'Bandar', 'wbd0192@moe.edu.my', 'JALAN UDANG KETAK, SEGAMBUT 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362527182', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000863', 'WEA0194', '1002', 'SEKOLAH MENENGAH KEBANGSAAN TAMAN BUKIT MALURI', 'SMK', 'YA', 'Bandar', 'wea0194@moe.edu.my', 'JALAN BURUNG KASAWARI, TAMAN BUKIT MALURI 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362766515', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000864', 'WEA0202', '1002', 'SEKOLAH MENENGAH KEBANGSAAN RAJA ALI', 'SMK', 'YA', 'Bandar', 'wea0202@moe.edu.my', 'KM.8 JLN SULTAN AZLAN SHAH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362589387', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000865', 'WEA0208', '1002', 'SEKOLAH MENENGAH KEBANGSAAN KEPONG BARU', 'SMK', 'YA', 'Bandar', 'wea0208@moe.edu.my', 'JALAN HELANG, KEPONG BARU 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362743287', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000866', 'WEA0217', '1002', 'SEKOLAH MENENGAH KEBANGSAAN BANDAR BARU SENTUL', 'SMK', 'YA', 'Bandar', 'wea0217@moe.edu.my', 'BANDAR BARU SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340414566', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000867', 'WEA0227', '1002', 'SEKOLAH MENENGAH KEBANGSAAN MENJALARA', 'SMK', 'TIDAK', 'Bandar', 'wea0227@moe.edu.my', 'BANDAR MENJALARA, KEPONG 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362725898', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000868', 'WEA0228', '1002', 'SEKOLAH MENENGAH KEBANGSAAN SEGAMBUT JAYA', 'SMK', 'YA', 'Bandar', 'wea0228@moe.edu.my', 'JALAN 4/38A SEGAMBUT 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362587622', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000869', 'WEA0231', '1002', 'SEKOLAH MENENGAH KEBANGSAAN DATO\' IBRAHIM YAACOB', 'SMK', 'YA', 'Bandar', 'wea0231@moe.edu.my', 'BATU 5 JALAN IPOH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362516658', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000870', 'WEA0234', '1002', 'SEKOLAH MENENGAH KEBANGSAAN BATU MUDA', 'SMK', 'TIDAK', 'Bandar', 'wea0234@moe.edu.my', 'KAMPUNG BATU MUDA 51100 KUALA LUMPUR', null, null, '', '100000', '14', '0362506791', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000871', 'WEA0236', '1002', 'SEKOLAH MENENGAH KEBANGSAAN SINAR BINTANG', 'SMK', 'TIDAK', 'Bandar', 'wea0236@moe.edu.my', 'JALAN 34/38A TAMAN SRI BINTANG, SEGAMBUT 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362733162', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000872', 'WEA0243', '1002', 'SEKOLAH MENENGAH KEBANGSAAN SEGAMBUT', 'SMK', 'TIDAK', 'Bandar', 'wea0243@moe.edu.my', 'JALAN SEGAMBUT, SEGAMBUT 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362570950', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000873', 'WEA0248', '1002', 'SEKOLAH MENENGAH SAINS SERI PUTERI', 'SBP', 'TIDAK', 'Bandar', 'wea0248@moe.edu.my', 'JALAN KOLAM AYER, 51200 KUALA LUMPUR.', null, null, '', '100000', '14', '0340411715', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000874', 'WEA0249', '1002', 'SEKOLAH MENENGAH KEBANGSAAN KIARAMAS', 'SMK', 'TIDAK', 'Bandar', 'wea0249@moe.edu.my', 'PERSIARAN DUTAMAS 50480 KUALA LUMPUR', null, null, '', '100000', '14', '0362014523', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000875', 'WEA0253', '1002', 'SEKOLAH MENENGAH KEBANGSAAN SENTUL UTAMA', 'SMK', 'TIDAK', 'Bandar', 'wea0253@moe.edu.my', 'BATU 2 1/2, JALAN SULTAN AZLAN SHAH51200KUALA LUMPUR', null, null, '', '100000', '14', '0340430214', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000876', 'WEA0256', '1002', 'KOLEJ TINGKATAN ENAM DESA MAHKOTA', 'KOLEJ TING 6', 'TIDAK', 'Bandar', 'wea0256@moe.edu.my', 'JALAN SRI BINTANG UTAMA, DESA PARK CITY 52200 KUALA LUMPUR', null, null, '', '100000', '14', '0362701480', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000877', 'WEA0260', '1002', 'SEKOLAH MENENGAH KEBANGSAAN TIARA PERMAI', 'SMK', 'TIDAK', 'Bandar', 'wea0260@moe.edu.my', 'NO 2A, JALAN 2/18A, TAMAN MASTIARA, JALAN IPOH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0361794752', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000878', 'WEB0215', '1002', 'SEKOLAH MENENGAH KEBANGSAAN CONVENT SENTUL', 'SMK', 'TIDAK', 'Bandar', 'web0215@moe.edu. my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340417190', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000879', 'WEB0218', '1002', 'SEKOLAH MENENGAH KEBANGSAAN MAXWELL', 'SMK', 'YA', 'Bandar', 'web0218@moe.edu.my', 'JALAN TUN ISMAIL 50480 KUALA LUMPUR', null, null, '', '100000', '14', '0340412895', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000880', 'WEB0220', '1002', 'SEKOLAH MENENGAH KEBANGSAAN (L) METHODIST SENTUL', 'SMK', 'TIDAK', 'Bandar', 'web0220@moe.edu.my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340413870', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000881', 'WEB0224', '1002', 'SEKOLAH MENENGAH KEBANGSAAN ST. MARY', 'SMK', 'TIDAK', 'Bandar', 'web0224@moe.edu.my', '7, JALAN INTAN BAIDURI 5D, TAMAN INTAN BAIDURI 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0361377841', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000882', 'WEB0228', '1002', 'SEKOLAH MENENGAH KEBANGSAAN (P) JALAN IPOH', 'SMK', 'YA', 'Bandar', 'web0228@moe.edu.my', 'BT 3 1/2 JALAN IPOH 51200 KUALA LUMPUR', null, null, '', '100000', '14', '0362581664', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000883', 'WEB0238', '1002', 'SEKOLAH MENENGAH KEBANGSAAN LA SALLE SENTUL', 'SMK', 'TIDAK', 'Bandar', 'web0238@moe.edu.my', 'JALAN SENTUL 51000 KUALA LUMPUR', null, null, '', '100000', '14', '0340417018', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000884', 'WEB0247', '1002', 'SEKOLAH MENENGAH KEBANGSAAN CHONG HWA', 'SMK', 'TIDAK', 'Bandar', 'web0247@moe.edu.my', 'JALAN GOMBAK 53000 KUALA LUMPUR', null, null, '', '100000', '14', '0340232411', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000885', 'WEB0248', '1002', 'SEKOLAH MENENGAH KEBANGSAAN RAJA ABDULLAH', 'SMK', 'YA', 'Bandar', 'web0248@moe.edu.my', 'OFF JALAN KEPONG 52000 KUALA LUMPUR', null, null, '', '100000', '14', '0362580937', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000886', 'WEB0249', '1002', 'SEKOLAH MENENGAH KEBANGSAAN JINJANG', 'SMK', 'YA', 'Bandar', 'web0249@moe.edu.my', 'JALAN JINJANG SETIA, JINJANG UTARA 52000 KUALA LUMPUR', null, null, '', '100000', '14', '0362576438', '1');
INSERT INTO `tbl_sekolah` VALUES ('10000887', 'WRA0004', '1002', 'SMA KUALA LUMPUR', 'SMK AGAMA', 'YA', 'Bandar', 'wra0004@moe.edu.my', 'BANDAR MENJALARA, KEPONG 52100 KUALA LUMPUR', null, null, '', '100000', '14', '0362758923', '1');

-- ----------------------------
-- Table structure for `tbl_sekolah_fasiliti`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_sekolah_fasiliti`;
CREATE TABLE `tbl_sekolah_fasiliti` (
  `fasiliti_id` int(8) NOT NULL AUTO_INCREMENT,
  `fas_sek_id` int(8) NOT NULL,
  `fas_nama` varchar(150) DEFAULT NULL,
  `fas_jenis` varchar(150) NOT NULL,
  `fas_kuantiti` int(2) NOT NULL,
  `fas_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-Aktif; 2-Tidak Aktif',
  PRIMARY KEY (`fasiliti_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_sekolah_fasiliti
-- ----------------------------
INSERT INTO `tbl_sekolah_fasiliti` VALUES ('1', '10000595', 'BiliK Komputer 1', 'Bilik Komputer', '20', '1');
INSERT INTO `tbl_sekolah_fasiliti` VALUES ('2', '10000595', 'Bunga Raya CC', 'Pusat Akses', '15', '1');
INSERT INTO `tbl_sekolah_fasiliti` VALUES ('3', '10000745', 'Bilik Anggerik', 'Bilik Komputer', '20', '1');
INSERT INTO `tbl_sekolah_fasiliti` VALUES ('4', '10000745', 'Bilik Utama', 'Pusat Akses', '5', '1');
INSERT INTO `tbl_sekolah_fasiliti` VALUES ('6', '10000806', 'Bilik PC', 'Bilik Komputer', '15', '1');
INSERT INTO `tbl_sekolah_fasiliti` VALUES ('24', '10000595', 'Bilik Angkasa', 'Makmal Komputer', '50', '1');
INSERT INTO `tbl_sekolah_fasiliti` VALUES ('25', '10000741', 'Bilik Angkasa', 'Bilik Komputer', '20', '1');
INSERT INTO `tbl_sekolah_fasiliti` VALUES ('26', '10000595', 'Bilik Angkasa 2', 'Makmal Komputer', '50', '1');
