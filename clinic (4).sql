/*
Navicat MySQL Data Transfer

Source Server         : Heroku DB
Source Server Version : 80020
Source Host           : u6354r3es4optspf.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306
Source Database       : i70znixrntrouc7k

Target Server Type    : MYSQL
Target Server Version : 80020
File Encoding         : 65001

Date: 2021-03-26 20:13:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `districts`
-- ----------------------------
DROP TABLE IF EXISTS `districts`;
CREATE TABLE `districts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_province_id_foreign` (`province_id`),
  CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of districts
-- ----------------------------
INSERT INTO `districts` VALUES ('1', 'មង្គលបូរី', 'Mungkul Borey', '0102', '1', null, null);
INSERT INTO `districts` VALUES ('2', 'ភ្នំស្រុក', 'Phnum Srok', '0103', '1', null, null);
INSERT INTO `districts` VALUES ('3', 'ព្រះនេត្រព្រះ', 'Preah Netr Preah', '0104', '1', null, null);
INSERT INTO `districts` VALUES ('4', 'អូរជ្រៅ', 'Ou Chrov', '0105', '1', null, null);
INSERT INTO `districts` VALUES ('5', 'សិរីសោភ័ណ', 'Serey Sophorn', '0106', '1', null, null);
INSERT INTO `districts` VALUES ('6', 'ថ្មពួក', 'Thma Puok', '0107', '1', null, null);
INSERT INTO `districts` VALUES ('7', 'ស្វាយចេក', 'Svay Chek', '0108', '1', null, null);
INSERT INTO `districts` VALUES ('8', 'ម៉ាឡៃ', 'Malai', '0109', '1', null, null);
INSERT INTO `districts` VALUES ('9', 'បាណន់', 'Banan', '0201', '2', null, null);
INSERT INTO `districts` VALUES ('10', 'ថ្មគោល', 'Thmor Koul', '0202', '2', null, null);
INSERT INTO `districts` VALUES ('11', 'បវេល', 'Bavel', '0204', '2', null, null);
INSERT INTO `districts` VALUES ('12', 'ឯកភ្នំ', 'Aek Phnum', '0205', '2', null, null);
INSERT INTO `districts` VALUES ('13', 'មោងឫស្សី', 'Maung Russey', '0206', '2', null, null);
INSERT INTO `districts` VALUES ('14', 'រុក្ខគីរី', 'Rukhakiri', '0214', '2', null, null);
INSERT INTO `districts` VALUES ('15', 'រតនមណ្ឌល', 'Ratanak Mondul', '0207', '2', null, null);
INSERT INTO `districts` VALUES ('16', 'សង្កែ', 'Sangke', '0208', '2', null, null);
INSERT INTO `districts` VALUES ('17', 'សំឡូត', 'Samlaut', '0209', '2', null, null);
INSERT INTO `districts` VALUES ('18', 'សំពៅលូន', 'Sampov Loun', '0210', '2', null, null);
INSERT INTO `districts` VALUES ('19', 'ភ្នំព្រឹក', 'Phnum Proek', '0211', '2', null, null);
INSERT INTO `districts` VALUES ('20', 'កំរៀង', 'Kamreang', '0212', '2', null, null);
INSERT INTO `districts` VALUES ('21', 'គាស់ក្រឡ', 'Koas Krala', '0213', '2', null, null);
INSERT INTO `districts` VALUES ('22', 'បាត់ដំបង', 'Battambang', '0203', '2', null, null);
INSERT INTO `districts` VALUES ('23', 'ប៉ោយប៉ែត', 'Poipet', '0110', '1', null, null);
INSERT INTO `districts` VALUES ('24', 'កំពង់ចាម', 'Kampong Cham', '0304', '3', null, null);
INSERT INTO `districts` VALUES ('25', 'បាធាយ​', 'Batheay', '0301', '3', null, null);
INSERT INTO `districts` VALUES ('26', 'ចំការលើ​', 'Chamkar Leu', '0302', '3', null, null);
INSERT INTO `districts` VALUES ('27', 'ជើងព្រៃ​', 'Cheung Prey', '0303', '3', null, null);
INSERT INTO `districts` VALUES ('28', 'កំពង់សៀម​', 'Kampong Siem', '0305', '3', null, null);
INSERT INTO `districts` VALUES ('29', 'កងមាស​', 'Kang Meas', '0306', '3', null, null);
INSERT INTO `districts` VALUES ('30', 'កោះសូទិន​', 'Kaoh Soutin', '0307', '3', null, null);
INSERT INTO `districts` VALUES ('31', 'ព្រៃឈរ​', 'Prey Chhor', '0308', '3', null, null);
INSERT INTO `districts` VALUES ('32', 'ស្រីសន្ធរ​', 'Srey Santhor', '0309', '3', null, null);
INSERT INTO `districts` VALUES ('33', 'ស្ទឹងត្រង់', 'Stueng Trang', '0310', '3', null, null);
INSERT INTO `districts` VALUES ('34', 'បរិបូណ៌', 'Baribour', '0401', '4', null, null);
INSERT INTO `districts` VALUES ('35', 'ជលគីរី', 'Chol Kiri', '0402', '4', null, null);
INSERT INTO `districts` VALUES ('36', 'កំពង់ឆ្នាំង', 'Kampong Chhnang', '0403', '4', null, null);
INSERT INTO `districts` VALUES ('37', 'កំពង់លែង', 'Kampong Leaeng', '0404', '4', null, null);
INSERT INTO `districts` VALUES ('38', 'កំពង់ត្រឡាច', 'Kampong Tralach', '0405', '4', null, null);
INSERT INTO `districts` VALUES ('39', 'រលាប្អៀរ', 'Rolea B\'ier', '0406', '4', null, null);
INSERT INTO `districts` VALUES ('40', 'សាមគ្គីមានជ័យ', 'Sameakki Mean Chey', '0407', '4', null, null);
INSERT INTO `districts` VALUES ('41', 'ទឹកផុស', 'Tuek Phos', '0408', '4', null, null);
INSERT INTO `districts` VALUES ('42', 'បរសេដ្ឋ', 'Borsedth', '0501', '5', null, null);
INSERT INTO `districts` VALUES ('43', 'ច្បារមន', 'Chbar Mon', '0502', '5', null, null);
INSERT INTO `districts` VALUES ('44', 'គងពិសី', 'Kong Pisei', '0503', '5', null, null);
INSERT INTO `districts` VALUES ('45', 'ឱរ៉ាល់', 'Aoral', '0504', '5', null, null);
INSERT INTO `districts` VALUES ('46', 'ឧដុង្គ', 'Odongk', '0505', '5', null, null);
INSERT INTO `districts` VALUES ('47', 'ភ្នំស្រួច', 'Phnum Sruoch', '0506', '5', null, null);
INSERT INTO `districts` VALUES ('48', 'សំរោងទង', 'Samraong Tong', '0507', '5', null, null);
INSERT INTO `districts` VALUES ('49', 'ថ្ពង', 'Thpong', '0508', '5', null, null);
INSERT INTO `districts` VALUES ('50', 'បារាយណ៍', 'Baray', '0601', '6', null, null);
INSERT INTO `districts` VALUES ('51', 'កំពង់ស្វាយ', 'Kampong Svay', '0602', '6', null, null);
INSERT INTO `districts` VALUES ('52', 'ស្ទឹងសែន', 'Stueng Saen', '0603', '6', null, null);
INSERT INTO `districts` VALUES ('53', 'ប្រាសាទបល្ល័ង្ក', 'Prasat Balang', '0604', '6', null, null);
INSERT INTO `districts` VALUES ('54', 'ប្រាសាទសំបូរ', 'Prasat Sambour', '0605', '6', null, null);
INSERT INTO `districts` VALUES ('55', 'សណ្ដាន់', 'Sandan', '0606', '6', null, null);
INSERT INTO `districts` VALUES ('56', 'សន្ទុក', 'Santuk', '0607', '6', null, null);
INSERT INTO `districts` VALUES ('57', 'ស្ទោង', 'Stoung', '0608', '6', null, null);
INSERT INTO `districts` VALUES ('58', 'អង្គរជ័យ', 'Angkor Chey', '', '7', null, null);
INSERT INTO `districts` VALUES ('59', 'បន្ទាយមាស', 'Bantay Meas', '', '7', null, null);
INSERT INTO `districts` VALUES ('60', 'ឈូក', 'Chouk', '', '7', null, null);
INSERT INTO `districts` VALUES ('61', 'ជុំគីរី', 'Chum Kiri', '', '7', null, null);
INSERT INTO `districts` VALUES ('62', 'ដងទង់', 'Dong Tung', '', '7', null, null);
INSERT INTO `districts` VALUES ('63', 'កំពង់ត្រាច', 'Kampong Trach', '', '7', null, null);
INSERT INTO `districts` VALUES ('64', 'កំពត', 'Kampot', '', '7', null, null);
INSERT INTO `districts` VALUES ('65', 'ទឹកឈូ', 'Tuek Chu', '', '7', null, null);
INSERT INTO `districts` VALUES ('66', 'កណ្ដាលស្ទឹង', 'Kandal Stueng', '0801', '8', null, null);
INSERT INTO `districts` VALUES ('67', 'កៀនស្វាយ', 'Kien Svay', '0802', '8', null, null);
INSERT INTO `districts` VALUES ('68', 'ខ្សាច់កណ្តាល', 'Khsach Kandal', '0803', '8', null, null);
INSERT INTO `districts` VALUES ('69', 'កោះធំ', 'Kaoh Thum', '0804', '8', null, null);
INSERT INTO `districts` VALUES ('70', 'លើកដែក', 'Leuk Daek', '0805', '8', null, null);
INSERT INTO `districts` VALUES ('71', 'ល្វាឯម', 'Lvea Aem', '0806', '8', null, null);
INSERT INTO `districts` VALUES ('72', 'មុខកំពូល', 'Mukh Kampul', '0807', '8', null, null);
INSERT INTO `districts` VALUES ('73', 'អង្គស្នួល', 'Angk Snuol', '0808', '8', null, null);
INSERT INTO `districts` VALUES ('74', 'ពញាឮ', 'Ponhea Lueu', '0809', '8', null, null);
INSERT INTO `districts` VALUES ('75', 'ស្អាង', 'S\'ang', '0810', '8', null, null);
INSERT INTO `districts` VALUES ('76', 'តាខ្មៅ', 'Ta Khmau', '0811', '8', null, null);
INSERT INTO `districts` VALUES ('77', 'បទុមសាគរ', 'Botum Sakor', '0901', '9', null, null);
INSERT INTO `districts` VALUES ('78', 'គីរីសាគរ', 'Kiri Sakor', '0902', '9', null, null);
INSERT INTO `districts` VALUES ('79', 'កោះកុង', 'Koh Kong', '0903', '9', null, null);
INSERT INTO `districts` VALUES ('80', 'ស្មាច់មានជ័យ', 'Smach Mean Chey', '0904', '9', null, null);
INSERT INTO `districts` VALUES ('81', 'មណ្ឌលសីមា', 'Mondol Seima', '0905', '9', null, null);
INSERT INTO `districts` VALUES ('82', 'ស្រែអំបិល', 'Srae Ambel', '0906', '9', null, null);
INSERT INTO `districts` VALUES ('83', 'ថ្មបាំង', 'Thmo Bang', '0907', '9', null, null);
INSERT INTO `districts` VALUES ('84', 'កំពង់សិលា', 'Kampong Seila', '0908', '9', null, null);
INSERT INTO `districts` VALUES ('85', 'ឆ្លូង​', 'Chhloung', '1001', '10', null, null);
INSERT INTO `districts` VALUES ('86', 'ក្រចេះ', 'Kratie', '1002', '10', null, null);
INSERT INTO `districts` VALUES ('87', 'ព្រែកប្រសព្វ', 'Preaek Prasab', '1003', '10', null, null);
INSERT INTO `districts` VALUES ('88', 'សំបូរ', 'Sambour', '1004', '10', null, null);
INSERT INTO `districts` VALUES ('89', 'ស្នួល', 'Snuol', '1005', '10', null, null);
INSERT INTO `districts` VALUES ('90', 'ចិត្របុរី', 'Chet Borei', '1006', '10', null, null);
INSERT INTO `districts` VALUES ('91', 'ស្រុកកែវសីមា', 'Kaev Seima', '1101', '11', null, null);
INSERT INTO `districts` VALUES ('92', 'ស្រុកកោះញែក', 'Kaoh Nheaek', '1102', '11', null, null);
INSERT INTO `districts` VALUES ('93', 'ស្រុកអូររាំង', 'Ou Reang', '1103', '11', null, null);
INSERT INTO `districts` VALUES ('94', 'ស្រុកពេជ្រាដា', 'Pech Chreada', '1104', '11', null, null);
INSERT INTO `districts` VALUES ('95', 'សែនមនោរម្យ', 'Senmonorom', '1105', '11', null, null);
INSERT INTO `districts` VALUES ('96', 'ចំការមន', 'Chamkar Mon', '', '12', null, null);
INSERT INTO `districts` VALUES ('97', 'ដូនពេញ', 'Doun Penh', '', '12', null, null);
INSERT INTO `districts` VALUES ('98', '៧មករា', '7 Meakkakra', '', '12', null, null);
INSERT INTO `districts` VALUES ('99', 'ទួលគោក', 'Tuol Kouk', '', '12', null, null);
INSERT INTO `districts` VALUES ('100', 'ដង្កោ', 'Dangkao', '', '12', null, null);
INSERT INTO `districts` VALUES ('101', 'មានជ័យ', 'Mean Chey', '', '12', null, null);
INSERT INTO `districts` VALUES ('102', 'ឫស្សីកែវ', 'Russey Keo', '', '12', null, null);
INSERT INTO `districts` VALUES ('103', 'សែនសុខ', 'Sen Sok', '', '12', null, null);
INSERT INTO `districts` VALUES ('104', 'ពោធិ៍សែនជ័យ', 'Pur SenChey', '', '12', null, null);
INSERT INTO `districts` VALUES ('105', 'ជ្រោយចង្វារ', 'Chraoy Chongvar', '', '12', null, null);
INSERT INTO `districts` VALUES ('106', 'ព្រែកព្នៅ', 'Praek Pnov', '', '12', null, null);
INSERT INTO `districts` VALUES ('107', 'ច្បារអំពៅ', 'Chbar Ampov', '', '12', null, null);
INSERT INTO `districts` VALUES ('108', 'ជ័យសែន', 'Chey Saen', '1301', '13', null, null);
INSERT INTO `districts` VALUES ('109', 'ឆែប', 'Chhaeb', '1302', '13', null, null);
INSERT INTO `districts` VALUES ('110', 'ជាំក្សាន្ត', 'Choam Khsant', '1303', '13', null, null);
INSERT INTO `districts` VALUES ('111', 'គូលែន', 'Kuleaen', '1304', '13', null, null);
INSERT INTO `districts` VALUES ('112', 'វៀង', 'Rovieng', '1305', '13', null, null);
INSERT INTO `districts` VALUES ('113', 'សង្គមថ្មី', 'Sangkom Thmei', '1306', '13', null, null);
INSERT INTO `districts` VALUES ('114', 'ត្បែងមានជ័យ', 'Tbaeng Mean chey', '1307', '13', null, null);
INSERT INTO `districts` VALUES ('115', 'ព្រៃវែង​', 'Prey Veng', '1401', '14', null, null);
INSERT INTO `districts` VALUES ('116', 'កំចាយមារ​', 'Kamchay Mea', '1402', '14', null, null);
INSERT INTO `districts` VALUES ('117', 'កំពង់ត្របែក', 'Kampong Trobek', '1403', '14', null, null);
INSERT INTO `districts` VALUES ('118', 'កញ្ច្រៀច​', 'Kachreach', '1404', '14', null, null);
INSERT INTO `districts` VALUES ('119', 'មេសាង​', 'Mesang', '1405', '14', null, null);
INSERT INTO `districts` VALUES ('120', 'ពាមជរ​', 'Peamchor', '1406', '14', null, null);
INSERT INTO `districts` VALUES ('121', 'ពាមរ​', 'Peamr', '1407', '14', null, null);
INSERT INTO `districts` VALUES ('122', 'ពារាំង​', 'Peareang', '1408', '14', null, null);
INSERT INTO `districts` VALUES ('123', 'ព្រះស្ដេច​', 'Prehsdach', '1409', '14', null, null);
INSERT INTO `districts` VALUES ('124', 'ស្វាយអន្ទរ​', 'Svay Ontor', '1410', '14', null, null);
INSERT INTO `districts` VALUES ('125', 'បាភ្នំ​', 'Baphnum', '1411', '14', null, null);
INSERT INTO `districts` VALUES ('126', 'ស៊ីធរកណ្ដាល​', 'Sithor Kandal', '1412', '14', null, null);
INSERT INTO `districts` VALUES ('127', 'កំពង់លាវ', 'Kampong Leav', '1413', '14', null, null);
INSERT INTO `districts` VALUES ('128', 'បាកាន', 'Bakan', '1501', '15', null, null);
INSERT INTO `districts` VALUES ('129', 'កណ្តៀង', 'Kandeang', '1502', '15', null, null);
INSERT INTO `districts` VALUES ('130', 'ក្រគរ', 'Krokor', '1503', '15', null, null);
INSERT INTO `districts` VALUES ('131', 'ភ្នំក្រវាញ', 'Phnum Kravanh', '1504', '15', null, null);
INSERT INTO `districts` VALUES ('132', 'ពោធិ៍សាត់', 'Pursat', '1505', '15', null, null);
INSERT INTO `districts` VALUES ('133', 'វាលវែង', 'Veal Veaeng', '1506', '15', null, null);
INSERT INTO `districts` VALUES ('134', 'អណ្តូងមាស​', 'Andoung Meas', '1601', '16', null, null);
INSERT INTO `districts` VALUES ('135', 'បានលុង', 'Ban Lung', '1602', '16', null, null);
INSERT INTO `districts` VALUES ('136', 'បរកែវ', 'Bar Kaev', '1603', '16', null, null);
INSERT INTO `districts` VALUES ('137', 'កូនមុំ', 'Koun Mom', '1604', '16', null, null);
INSERT INTO `districts` VALUES ('138', 'លំផាត់', 'Lumphat', '1605', '16', null, null);
INSERT INTO `districts` VALUES ('139', 'អូរជុំ', 'Ou Chum', '1606', '16', null, null);
INSERT INTO `districts` VALUES ('140', 'អូរយ៉ាដាវ', 'Ou Ya Dav', '1607', '16', null, null);
INSERT INTO `districts` VALUES ('141', 'តាវែង', 'Ta Veaeng', '1608', '16', null, null);
INSERT INTO `districts` VALUES ('142', 'វើនសៃ', 'Veun Sai', '1609', '16', null, null);
INSERT INTO `districts` VALUES ('143', 'អង្គរជុំ', 'Angkor Chum', '1701', '17', null, null);
INSERT INTO `districts` VALUES ('144', 'អង្គរធំ', 'Angkor Thum', '1702', '17', null, null);
INSERT INTO `districts` VALUES ('145', 'បន្ទាយស្រី', 'Banteay Srei', '1703', '17', null, null);
INSERT INTO `districts` VALUES ('146', 'ជីក្រែង', 'Chi Kraeng', '1704', '17', null, null);
INSERT INTO `districts` VALUES ('147', 'ក្រឡាញ់', 'Kralanh', '1706', '17', null, null);
INSERT INTO `districts` VALUES ('148', 'ពួក', 'Puok', '1707', '17', null, null);
INSERT INTO `districts` VALUES ('149', 'ប្រាសាទបាគង', 'Prasat Bakong', '1709', '17', null, null);
INSERT INTO `districts` VALUES ('150', 'សៀមរាប', 'Siem Reab', '1710', '17', null, null);
INSERT INTO `districts` VALUES ('151', 'សូទ្រនិគម', 'Soutr Nikom', '1711', '17', null, null);
INSERT INTO `districts` VALUES ('152', 'ស្រីស្នំ', 'Srei Snam', '1712', '17', null, null);
INSERT INTO `districts` VALUES ('153', 'ស្វាយលើ', 'Svay Leu', '1713', '17', null, null);
INSERT INTO `districts` VALUES ('154', 'វ៉ារិន', 'Varin', '1714', '17', null, null);
INSERT INTO `districts` VALUES ('155', 'មិត្តភាព', 'Mittakpheap', '1801', '18', null, null);
INSERT INTO `districts` VALUES ('156', 'ព្រៃនប់', 'Prey Nob', '1802', '18', null, null);
INSERT INTO `districts` VALUES ('157', 'ស្ទឹងហាវ', 'Stueng Hav', '1803', '18', null, null);
INSERT INTO `districts` VALUES ('158', 'កំពង់សីលា', 'Kampong Seila', '1804', '18', null, null);
INSERT INTO `districts` VALUES ('159', 'សេសាន', 'Sesan', '1901', '19', null, null);
INSERT INTO `districts` VALUES ('160', 'សៀមបូក', 'Siem Bouk', '1902', '19', null, null);
INSERT INTO `districts` VALUES ('161', 'សៀមប៉ាង', 'Siem Pang', '1903', '19', null, null);
INSERT INTO `districts` VALUES ('162', 'ស្ទឹងត្រែង', 'Stueng Traeng', '1904', '19', null, null);
INSERT INTO `districts` VALUES ('163', 'ថាឡាបរិវ៉ាត់', 'Thala Barivat', '1905', '19', null, null);
INSERT INTO `districts` VALUES ('164', 'ចន្រ្ទា​', 'Chanthrea', '2001', '20', null, null);
INSERT INTO `districts` VALUES ('165', 'កំពង់រោទិ៍', 'Kampong Rou', '2002', '20', null, null);
INSERT INTO `districts` VALUES ('166', 'រំដួល', 'Romdoul', '2003', '20', null, null);
INSERT INTO `districts` VALUES ('167', 'រមាសហែក', 'Romeas Haek', '2004', '20', null, null);
INSERT INTO `districts` VALUES ('168', 'ស្វាយជ្រំ', 'Svay Chrom', '2005', '20', null, null);
INSERT INTO `districts` VALUES ('169', 'ស្វាយរៀង', 'Svay Rieng', '2006', '20', null, null);
INSERT INTO `districts` VALUES ('170', 'ស្វាយទាប', 'Svay Theab', '2007', '20', null, null);
INSERT INTO `districts` VALUES ('171', 'បាវិត', 'Bavet', '2008', '20', null, null);
INSERT INTO `districts` VALUES ('172', 'អង្គរបូរី​', 'Angkor Borei', '2101', '21', null, null);
INSERT INTO `districts` VALUES ('173', 'បាទី', 'Bati', '2102', '21', null, null);
INSERT INTO `districts` VALUES ('174', 'បូរីជលសារ', 'Borei Cholsar', '2103', '21', null, null);
INSERT INTO `districts` VALUES ('175', 'គិរីវង់', 'Kiri Vong', '2104', '21', null, null);
INSERT INTO `districts` VALUES ('176', 'កោះអណ្តែត', 'Kaoh Andaet', '2105', '21', null, null);
INSERT INTO `districts` VALUES ('177', 'ព្រៃកប្បាស', 'Prey Kabbas', '2106', '21', null, null);
INSERT INTO `districts` VALUES ('178', 'សំរោង', 'Samraong', '2107', '21', null, null);
INSERT INTO `districts` VALUES ('179', 'ដូនកែវ', 'Doun Kaev', '2108', '21', null, null);
INSERT INTO `districts` VALUES ('180', 'ត្រាំកក់', 'Tram Kak', '2109', '21', null, null);
INSERT INTO `districts` VALUES ('181', 'ទ្រាំង', 'Treang', '2110', '21', null, null);
INSERT INTO `districts` VALUES ('182', 'ដំណាក់ចង្អើរ', 'Damnak Chang\'aeur', '2201', '23', null, null);
INSERT INTO `districts` VALUES ('183', 'កែប', 'Kep', '2202', '23', null, null);
INSERT INTO `districts` VALUES ('184', 'ប៉ៃលិន​', 'Pailin', '2301', '24', null, null);
INSERT INTO `districts` VALUES ('185', 'សាលា​​ក្រៅ', 'Salakrao', '2302', '24', null, null);
INSERT INTO `districts` VALUES ('186', 'អន្លង់វែង', 'Anlong Veng', '2201', '22', null, null);
INSERT INTO `districts` VALUES ('187', 'បន្ទាយអំពិល', 'Banteay Ampil', '2202', '22', null, null);
INSERT INTO `districts` VALUES ('188', 'ចុងកាល់', 'Chong Kal', '2203', '22', null, null);
INSERT INTO `districts` VALUES ('189', 'សំរោង', 'Samraong', '2204', '22', null, null);
INSERT INTO `districts` VALUES ('190', 'ត្រពាំងប្រាសាទ', 'Trapeang Prasat', '2205', '22', null, null);
INSERT INTO `districts` VALUES ('191', 'ដំបែ', 'Dambe', '', '25', null, null);
INSERT INTO `districts` VALUES ('192', 'ក្រូចឆ្មារ', 'Krochhma', '', '25', null, null);
INSERT INTO `districts` VALUES ('193', 'មេមត់', 'Memut', '', '25', null, null);
INSERT INTO `districts` VALUES ('194', 'អូររាំងឪ', 'Orangov', '', '25', null, null);
INSERT INTO `districts` VALUES ('195', 'ពញាក្រែក', 'Punhea Krek', '', '25', null, null);
INSERT INTO `districts` VALUES ('196', 'ត្បូងឃ្មុំ', 'Tboung Khmum', '', '25', null, null);
INSERT INTO `districts` VALUES ('197', 'សួង', 'Soung', '', '25', null, null);
INSERT INTO `districts` VALUES ('198', 'ព្រះសីហនុ', 'Sihanoukville', '០', '18', null, null);
INSERT INTO `districts` VALUES ('199', 'បឹងកេងកង', 'Boeung Keng Kang', '120000', '12', null, null);
INSERT INTO `districts` VALUES ('200', 'កំបូល', 'Kantaok', '0000', '12', null, null);

-- ----------------------------
-- Table structure for `doctors`
-- ----------------------------
DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_kh` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `full_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_village` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_commune` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_district_id` bigint unsigned DEFAULT NULL,
  `address_province_id` bigint unsigned DEFAULT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctors_address_district_id_foreign` (`address_district_id`),
  KEY `doctors_address_province_id_foreign` (`address_province_id`),
  KEY `doctors_created_by_foreign` (`created_by`),
  KEY `doctors_updated_by_foreign` (`updated_by`),
  CONSTRAINT `doctors_address_district_id_foreign` FOREIGN KEY (`address_district_id`) REFERENCES `districts` (`id`),
  CONSTRAINT `doctors_address_province_id_foreign` FOREIGN KEY (`address_province_id`) REFERENCES `provinces` (`id`),
  CONSTRAINT `doctors_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `doctors_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of doctors
-- ----------------------------

-- ----------------------------
-- Table structure for `echoes`
-- ----------------------------
DROP TABLE IF EXISTS `echoes`;
CREATE TABLE `echoes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pt_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pt_age` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_diagnosis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pt_village` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pt_commune` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pt_district_id` bigint unsigned DEFAULT NULL,
  `pt_province_id` bigint unsigned DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` bigint unsigned DEFAULT NULL,
  `echo_default_description_id` bigint unsigned NOT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `echoes_patient_id_foreign` (`patient_id`),
  KEY `echoes_echo_default_description_id_foreign` (`echo_default_description_id`),
  KEY `echoes_created_by_foreign` (`created_by`),
  KEY `echoes_updated_by_foreign` (`updated_by`),
  CONSTRAINT `echoes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `echoes_echo_default_description_id_foreign` FOREIGN KEY (`echo_default_description_id`) REFERENCES `echo_default_descriptions` (`id`),
  CONSTRAINT `echoes_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `echoes_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of echoes
-- ----------------------------
INSERT INTO `echoes` VALUES ('11', '2021-02-20', 'Chenda', '15', 'ប្រុស', '5244324', 'hhi', 'hjkb', 'hvgj', '68', '8', 'default.png', '<p style=\"margin-left:48px\"><span style=\"font-size:10pt\"><span style=\"font-size:14.0pt\">Nombre du f&oelig;tus (</span><span style=\"font-size:11.0pt\">ចំនួន</span><span style=\"font-size:14.0pt\">) : 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DDR&nbsp;: </span><span style=\"font-size:14.0pt\">&nbsp;/&nbsp; / 2020</span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><u><span style=\"font-size:12.0pt\">Technique</span></u><span style=\"font-size:12.0pt\">&nbsp;: L`examen est r&eacute;alis&eacute; par voie transcutan&eacute;e</span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Ut&eacute;rus est gravide de: mm DAP, pr&eacute;sence d&rsquo;un sac claire </span>&nbsp;<span style=\"font-size:12.0pt\">mesure d<strong>e</strong></span><strong><span style=\"font-size:12.0pt\">:</span></strong><strong><span style=\"font-size:12.0pt\"> mm</span></strong><span style=\"font-size:12.0pt\"> avec </span><span style=\"font-size:12.0pt\">point de vitalit&eacute;</span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Absence d&rsquo;anomalie de structure de l&#39;ovaire </span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:10pt\"><strong><u><span style=\"font-size:12.0pt\">Conclusion </span></u></strong><strong><span style=\"font-size:12.0pt\">: </span></strong><span style=\"font-size:12.0pt\">Echographie pelvienne montre<strong> une grossesse de:&nbsp; <span style=\"color:blue\">SA J&nbsp;</span></strong></span><strong><span style=\"font-size:12.0pt\"><span style=\"color:blue\">vienn &eacute;volutive</span></span></strong><strong><span style=\"font-size:12.0pt\"><span style=\"color:blue\">.</span></span></strong></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:blue\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terme echographique&nbsp;:&nbsp;&nbsp;&nbsp; /&nbsp;&nbsp;&nbsp; /2021&nbsp;&nbsp;&nbsp;&nbsp; +/- 1w0d</span></span></strong>&nbsp;&nbsp;&nbsp;&nbsp; </span></p>', '21', '2', '3', '3', '2021-02-20 08:37:45', '2021-02-20 08:37:45');
INSERT INTO `echoes` VALUES ('12', '2021-02-20', 'Chenda', '15', 'ប្រុស', '5244324', null, null, null, '68', '8', 'default.png', '<p style=\"margin-left:48px\"><span style=\"font-size:10pt\"><span style=\"font-size:14.0pt\">Nombre du f&oelig;tus (</span><span style=\"font-size:11.0pt\">ចំនួន</span><span style=\"font-size:14.0pt\">) : 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DDR&nbsp;: </span><span style=\"font-size:14.0pt\">&nbsp;/&nbsp; / 2020</span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><u><span style=\"font-size:12.0pt\">Technique</span></u><span style=\"font-size:12.0pt\">&nbsp;: L`examen est r&eacute;alis&eacute; par voie transcutan&eacute;e</span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Ut&eacute;rus est gravide de: mm DAP, pr&eacute;sence d&rsquo;un sac claire </span>&nbsp;<span style=\"font-size:12.0pt\">mesure d<strong>e</strong></span><strong><span style=\"font-size:12.0pt\">:</span></strong><strong><span style=\"font-size:12.0pt\"> mm</span></strong><span style=\"font-size:12.0pt\"> avec </span><span style=\"font-size:12.0pt\">point de vitalit&eacute;</span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Absence d&rsquo;anomalie de structure de l&#39;ovaire </span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:10pt\"><strong><u><span style=\"font-size:12.0pt\">Conclusion </span></u></strong><strong><span style=\"font-size:12.0pt\">: </span></strong><span style=\"font-size:12.0pt\">Echographie pelvienne montre<strong> une grossesse de:&nbsp; <span style=\"color:blue\">SA J&nbsp;</span></strong></span><strong><span style=\"font-size:12.0pt\"><span style=\"color:blue\">vienn &eacute;volutive</span></span></strong><strong><span style=\"font-size:12.0pt\"><span style=\"color:blue\">.</span></span></strong></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:blue\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terme echographique&nbsp;:&nbsp;&nbsp;&nbsp; /&nbsp;&nbsp;&nbsp; /2021&nbsp;&nbsp;&nbsp;&nbsp; +/- 1w0d</span></span></strong>&nbsp;&nbsp;&nbsp;&nbsp; </span></p>', '21', '2', '3', '3', '2021-02-20 08:40:45', '2021-02-20 08:40:45');
INSERT INTO `echoes` VALUES ('13', '2021-02-23', 'mongkul', null, 'ប្រុស', null, null, null, null, null, null, 'default.png', '<p><span style=\"font-size:12px\"><u>Technique</u>&nbsp;: L`examen est r&eacute;alis&eacute; par voie transcutan&eacute;e</span></p>\r\n\r\n<p><span style=\"font-size:12px\"><strong>Echographie pelvienne :</strong></span></p>\r\n\r\n<p><span style=\"font-size:12px\">Ut&eacute;rus est gravide, pr&eacute;sence d&rsquo;un sac claire mesure d<strong>e: 15.6</strong><strong>mm</strong> avec sac d&eacute;form&eacute;.</span></p>\r\n\r\n<p><span style=\"font-size:12px\">Absence d&rsquo;anomalie de structure de l&#39;ovaire </span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:12px\"><strong><u>Conclusion </u>: </strong>Echographie pelvienne montre<strong> une grossesse arret&eacute;<span style=\"color:blue\">.</span></strong></span></p>', '22', '1', '2', '1', '2021-02-23 08:34:01', '2021-02-27 09:43:55');
INSERT INTO `echoes` VALUES ('14', '2021-02-23', 'mongkul', null, 'ប្រុស', null, null, null, null, null, null, 'default.png', '<p><span style=\"font-size:10pt\"><u><span style=\"font-size:12.0pt\">Technique</span></u><span style=\"font-size:12.0pt\">&nbsp;: L`examen est r&eacute;alis&eacute; par voie transcutan&eacute;e</span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><strong><span style=\"font-size:12.0pt\">Echographie pelvienne :</span></strong></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Ut&eacute;rus est gravide, pr&eacute;sence d&rsquo;un sac claire mesure d<strong>e: </strong></span><strong><span style=\"font-size:12.0pt\">15.6</span></strong><strong><span style=\"font-size:12.0pt\">mm</span></strong><span style=\"font-size:12.0pt\"> avec sac d&eacute;form&eacute;.</span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:12.0pt\">Absence d&rsquo;anomalie de structure de l&#39;ovaire </span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:10pt\"><strong><u><span style=\"font-size:12.0pt\">Conclusion </span></u></strong><strong><span style=\"font-size:12.0pt\">: </span></strong><span style=\"font-size:12.0pt\">Echographie pelvienne montre<strong> une grossesse arret&eacute;<span style=\"color:blue\">.</span></strong></span></span></p>', '22', '1', '2', '2', '2021-02-23 08:34:01', '2021-02-23 08:34:01');

-- ----------------------------
-- Table structure for `echo_default_descriptions`
-- ----------------------------
DROP TABLE IF EXISTS `echo_default_descriptions`;
CREATE TABLE `echo_default_descriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of echo_default_descriptions
-- ----------------------------
INSERT INTO `echo_default_descriptions` VALUES ('1', 'Grossesse non évolué', 'grossesse-non-evolue', '<p><span style=\"font-size:12px\"><u>Technique</u>&nbsp;: L`examen est r&eacute;alis&eacute; par voie transcutan&eacute;e</span></p>\r\n\r\n<p><span style=\"font-size:12px\"><strong>Echographie pelvienne :</strong></span></p>\r\n\r\n<p><span style=\"font-size:12px\">Ut&eacute;rus est gravide, pr&eacute;sence d&rsquo;un sac claire mesure d<strong>e: 15.6</strong><strong>mm</strong> avec sac d&eacute;form&eacute;.</span></p>\r\n\r\n<p><span style=\"font-size:12px\">Absence d&rsquo;anomalie de structure de l&#39;ovaire </span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:12px\"><strong><u>Conclusion </u>: </strong>Echographie pelvienne montre<strong> une grossesse arret&eacute;<span style=\"color:blue\">.</span></strong></span></p>', null, '2021-02-27 09:39:27');
INSERT INTO `echo_default_descriptions` VALUES ('2', 'Grossesse évolué', 'grossesse-evolue', '<p style=\"margin-left:48px\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Nombre du f&oelig;tus (</span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">ចំនួន</span></span><span style=\"font-size:14.0pt\">) : 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DDR&nbsp;: </span><span style=\"font-size:14.0pt\">&nbsp;/&nbsp; / 2020</span></span></span></p>\r\n\r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><u><span style=\"font-size:12.0pt\">Technique</span></u><span style=\"font-size:12.0pt\">&nbsp;: L`examen est r&eacute;alis&eacute; par voie transcutan&eacute;e</span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">Ut&eacute;rus est gravide de: mm DAP, pr&eacute;sence d&rsquo;un sac claire </span>&nbsp;<span style=\"font-size:12.0pt\">mesure d<strong>e</strong></span><strong><span style=\"font-size:12.0pt\">:</span></strong><strong><span style=\"font-size:12.0pt\"> mm</span></strong><span style=\"font-size:12.0pt\"> avec </span><span style=\"font-size:12.0pt\">point de vitalit&eacute;</span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">Absence d&rsquo;anomalie de structure de l&#39;ovaire </span></span></span></p>\r\n              \r\n              <p>&nbsp;</p>\r\n              \r\n              <p>&nbsp;</p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><u><span style=\"font-size:12.0pt\">Conclusion </span></u></strong><strong><span style=\"font-size:12.0pt\">: </span></strong><span style=\"font-size:12.0pt\">Echographie pelvienne montre<strong> une grossesse de:&nbsp; <span style=\"color:blue\">SA J&nbsp;</span></strong></span><strong><span style=\"font-size:12.0pt\"><span style=\"color:blue\">vienn &eacute;volutive</span></span></strong><strong><span style=\"font-size:12.0pt\"><span style=\"color:blue\">.</span></span></strong></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:blue\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terme echographique&nbsp;:&nbsp;&nbsp;&nbsp; /&nbsp;&nbsp;&nbsp; /2021&nbsp;&nbsp;&nbsp;&nbsp; +/- 1w0d</span></span></strong>&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>\r\n              ', null, null);
INSERT INTO `echo_default_descriptions` VALUES ('3', 'Echo abdominaleF', 'echo-abdominalef', '<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><u><span style=\"font-size:14.0pt\">R&eacute;sultat </span></u></strong></span></span></p>\r\n\r\n              <ul>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Le foie est de taille (FD&nbsp;: mm,FG&nbsp;: mm)&nbsp; de contours r&eacute;guliers, d&#39;&eacute;cho-structure homog&egrave;ne surface liss borde inf&eacute;rieux tranchante.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Le tronc porte et les veines sus-h&eacute;patiques sont dilat&eacute;.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">La v&eacute;sicule biliaire alithiasique, la paroi fine et r&eacute;guli&egrave;re.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Les voies biliaires intra et extra h&eacute;patiques sont &nbsp;dilat&eacute;es.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Le pancr&eacute;as est de tailles normales, de contours r&eacute;guliers. </span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">La rate est homog&egrave;ne, de taille normale. </span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Les reins de taille normale (RD: mm,RG:mm) la diff&eacute;renciation cortico-m&eacute;dullaire bien visible, absence de dilatations des cavit&eacute;s py&eacute;localicielles.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">La vessie an&eacute;chogene la paroi fine et absence de diverticule ni de calcul.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Ut&eacute;rus</span><span style=\"font-size:14.0pt\">:ant&eacute;vers&eacute;</span><span style=\"font-size:22.5pt\"><span style=\"font-family:DaunPenh\">​​</span></span><span style=\"font-size:14.0pt\"> de 40mm de DAP ligne vacuit&eacute; r&eacute;guli&eacute;</span> </span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Annex :normale</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Douglas&nbsp;: libre.</span></span></span></li>\r\n              </ul>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:14.0pt\"><span style=\"color:blue\">&nbsp;&nbsp;&nbsp;&nbsp; Au total</span></span></strong><span style=\"font-size:14.0pt\"> : Echographie pelvienne normale</span></span></span></p>\r\n              ', null, null);
INSERT INTO `echo_default_descriptions` VALUES ('4', 'Echo abdominaleM', 'echo-abdominalem', '<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><u><span style=\"font-size:14.0pt\">R&eacute;sultat </span></u></strong></span></span></p>\r\n\r\n              <ul>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Le foie est de taille (FD&nbsp;: mm,FG&nbsp;: mm)&nbsp; de contours r&eacute;guliers, d&#39;&eacute;cho-structure homog&egrave;ne surface liss borde inf&eacute;rieux tranchante .</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">Le tronc porte et les veines sus-h&eacute;patiques sont perm&eacute;ables.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">La v&eacute;sicule biliaire alithiasique, la paroi fine et r&eacute;guli&egrave;re.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">Les voies biliaires intra et extra h&eacute;patiques ne sont pas dilat&eacute;es.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">Le pancr&eacute;as est de tailles normales, de contours r&eacute;guliers. </span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">La rate est homog&egrave;ne, de taille normale. </span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Les reins de taille normale (RD: mm,RG:mm) la diff&eacute;renciation cortico-m&eacute;dullaire bien visible, absence de dilatations des cavit&eacute;s py&eacute;localicielles</span><span style=\"font-size:22.5pt\"><span style=\"font-family:DaunPenh\">​</span></span> </span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">La vessie an&eacute;chogene la paroi fine et absence de diverticule ni de calcul</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">Prostat&nbsp;:normale</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">Douglas&nbsp;: libre.</span></span></span></li>\r\n                  <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:12.0pt\">Gaz intent</span></span></span></li>\r\n              </ul>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:22.5pt\"><span style=\"font-family:DaunPenh\">​​&nbsp;&nbsp;&nbsp; </span></span><strong><u><span style=\"font-size:14.0pt\">Au total</span></u></strong><span style=\"font-size:14.0pt\"> : Echographie abdominale normale a ce jour</span></span></span></p>\r\n              ', null, null);
INSERT INTO `echo_default_descriptions` VALUES ('5', 'Echo SEIN', 'echo-sein', '<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Nom et Pr&eacute;nom :&nbsp;&nbsp; </span></span></span></p>\r\n\r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Clinique : </span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">M&eacute;decin demander&nbsp;:</span></span></span></p>\r\n              \r\n              <p style=\"text-align:center\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><u><span style=\"font-size:16.0pt\">R&eacute;sultat </span></u></strong></span></span></p>\r\n              \r\n              <p>&nbsp;</p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tissue sous cutan&eacute;e et graisseuse sont normaux.</span></span></span></p>\r\n              \r\n              <p style=\"margin-left:48px\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Absence anomalie de morphologie et de structure de la glande mammaire.</span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Absence ad&eacute;nopathie </span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size:14.0pt\">Absence </span><span style=\"font-size:14.0pt\">de calcification ou de formation tumorale .</span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; La vascularisation est normale. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span></p>\r\n              \r\n              <p>&nbsp;</p>\r\n              \r\n              <p>&nbsp;</p>\r\n              \r\n              <p>&nbsp;</p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><u><span style=\"font-size:14.0pt\">Au total</span></u></strong><span style=\"font-size:14.0pt\">: Echographie du seins sont normaeux.</span></span></span></p>\r\n              ', null, null);
INSERT INTO `echo_default_descriptions` VALUES ('6', 'Echo thyroïdienne', 'echo-thyroidienne', '<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Nom et pr&eacute;nom : &nbsp;</span></span></span></p>\r\n\r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Clinique :&nbsp; </span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">M&eacute;decin demander&nbsp;: &nbsp;</span></span></span></p>\r\n              \r\n              <p style=\"text-align:center\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><u><span style=\"font-size:16.0pt\">R&eacute;sultat </span></u></strong></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">La glande thyro&iuml;de est mesur&eacute;e&nbsp; au : &nbsp;</span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:14.0pt\">Lobe droit</span></strong><span style=\"font-size:14.0pt\">&nbsp;: L&nbsp;: mm X&nbsp; L&rsquo; : mm X AP&nbsp;: mm&nbsp; </span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:14.0pt\">Lobe gauche</span></strong><span style=\"font-size:14.0pt\">&nbsp;: L&nbsp;: mm X&nbsp; L&rsquo; : mm X AP&nbsp;: mm &nbsp;</span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:14.0pt\">Isthme&nbsp;</span></strong><span style=\"font-size:14.0pt\">: &nbsp; mm en ant&eacute;ropost&eacute;rieur (AP).</span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><span style=\"font-size:14.0pt\">Volume</span></strong><span style=\"font-size:14.0pt\"> estim&eacute; &agrave;&nbsp; <strong>g</strong> pour un lobe [<strong><em>normal inf&eacute;rieur &agrave; 7g</em></strong>].</span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">L&#39;&eacute;chostructure glandulaire est l&eacute;g&egrave;rement granuleuse, homog&egrave;ne et &eacute;chog&egrave;ne. Les contours de l&#39;isthme et de chaque lobe sont r&eacute;guliers.&nbsp;&nbsp; </span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Diff&eacute;renciation de gradient musculo-parenchymateux.</span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Absence d&#39;ad&eacute;nopathie le long des axes jugulo-carotidiennes.&nbsp;&nbsp; </span></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Pas d&#39;argument en faveur d&#39;une pathologie para-thyro&iuml;dienne.&nbsp;&nbsp; </span></span></span></p>\r\n              \r\n              <p>&nbsp;</p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><strong><u><span style=\"font-size:14.0pt\">Au total</span></u></strong><span style=\"font-size:14.0pt\">: Echographie thyro&iuml;dienne normale.</span></span></span></p>\r\n              ', null, null);
INSERT INTO `echo_default_descriptions` VALUES ('7', 'Obst 3 trimestre', 'obst-3-trimestre', '<p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><u><span style=\"font-size:16.0pt\"><span style=\"color:red\">R&eacute;sultat</span></span></u></span></span></p>\r\n\r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<span style=\"font-size:14.0pt\">&nbsp;&nbsp;Nombre du f&oelig;tus (</span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">ចំនួន</span></span><span style=\"font-size:14.0pt\">) : 01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DDR&nbsp;: </span><span style=\"font-size:14.0pt\">&nbsp;/ &nbsp;/ 2020</span></span></span></p>\r\n              \r\n              <table cellspacing=\"0\" class=\"Table\" style=\"border-collapse:collapse; border:none; margin-left:73px\">\r\n                <tbody>\r\n                  <tr>\r\n                    <td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:162px\">\r\n                    <p style=\"text-align:center\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">Poids (</span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">ទម្ងន់កូន</span></span><span style=\"font-size:14.0pt\">):</span></span></span></p>\r\n                    </td>\r\n                    <td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:168px\">\r\n                    <p style=\"text-align:center\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">DBP (</span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">ទំហំក្បាល</span></span><span style=\"font-size:14.0pt\">)</span></span></span></p>\r\n                    </td>\r\n                    <td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:150px\">\r\n                    <p style=\"text-align:center\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">F</span><span style=\"font-size:14.0pt\">L(</span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">ប្រវែងភ្លៅកូន</span></span><span style=\"font-size:14.0pt\">)</span></span></span></p>\r\n                    </td>\r\n                  </tr>\r\n                  <tr>\r\n                    <td style=\"border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:162px\">\r\n                    <p style=\"text-align:center\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">g</span></span></span></p>\r\n                    </td>\r\n                    <td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:168px\">\r\n                    <p style=\"text-align:center\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">mm</span></span></span></p>\r\n                    </td>\r\n                    <td style=\"border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:150px\">\r\n                    <p style=\"text-align:center\"><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:14.0pt\">mm</span></span></span></p>\r\n                    </td>\r\n                  </tr>\r\n                </tbody>\r\n              </table>\r\n              \r\n              <ul>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">&nbsp;<span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">Absence anormalie morphologie d&eacute;c&eacute;lable<span style=\"color:red\"> (</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">រូបរាងកូនគ្រប់លកិខណ</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:red\">:</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:red\">)</span></span></span></span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">&nbsp;Bonne movement <span style=\"color:red\">(</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">ចលនាកូនល្អ</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:red\">)</span></span></span></span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">&nbsp;Activit&eacute; cardiaque (</span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">ចលនាបេះដូងកូនល្អ</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">):&nbsp; b/mn</span></span></span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">&nbsp;Bonne placenta (<span style=\"color:#bf8f00\">សុកកូនល្អ</span>) post&eacute;rieux en haut( <span style=\"color:#bf8f00\">នៅផ្នែកខាង</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">ក្រោយខាងលើ</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">)</span></span></span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">&nbsp;Pr&eacute;sentation(</span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">ការបង្ហាញ</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">ទម្រង់</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">): sommet dose a G&nbsp; (</span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">ក្បាលនៅខាងក្រោម</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">)</span></span></span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">Cordon circulaire 2toure A/V du cou</span></span></span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">&nbsp;Liquide amniotique normale (<span style=\"color:#bf8f00\">បរិមាណទឹកភ្លោះកូន ល្អគ្រប់គ្រាន់</span>) AFI: 13</span></span></span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">&nbsp;Sex (ភេទ)&nbsp;: </span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:red\">ស្រី ​ ប្រុស</span></span></span>&nbsp; </span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:22.5pt\"><span style=\"font-family:DaunPenh\">​ </span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">អាយុកូន</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">ចំនួន</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">:</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">​​&nbsp; សប្ដាហ៍​និង​​ ថ្ងៃ​ </span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">ការលូតលាស់ល្អ</span></span></span></span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">Les ovairese sont de taille et de morphologie normale, sans formation kystique a leur niveau.</span></span></span></span></li>\r\n                <li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">Abcence d&rsquo; &eacute;panchement dans le cul de sac de Douglas</span></span></span></span></li>\r\n              </ul>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><u><span style=\"font-size:22.5pt\"><span style=\"font-family:DaunPenh\">​</span></span></u>&nbsp;&nbsp;&nbsp; <strong><u><span style=\"font-size:14.0pt\"><span style=\"color:#002060\">Au total</span></span></u></strong><strong><span style=\"font-size:14.0pt\">:</span></strong><span style=\"font-size:14.0pt\">&Eacute;chographie pelvienne montrant de grossesse de(</span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">អាយុកូនចំនួន</span></span></span><span style=\"font-size:14.0pt\">):SA et:jours(</span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#bf8f00\">ថ្ងៃ</span></span></span><span style=\"font-size:14.0pt\">)</span><strong> </strong></span></span></p>\r\n              \r\n              <p><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"font-size:22.5pt\"><span style=\"font-family:DaunPenh\">​​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span style=\"font-size:14.0pt\">Pr&eacute;sum&eacute; de terme le (</span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\"><span style=\"color:#ffc000\">គ្រប់ខែនៅថ្ងៃទី</span></span></span><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Khmer OS System&quot;\">)</span></span><span style=\"font-size:14.0pt\"><span style=\"color:#00b0f0\">:</span></span> <strong><span style=\"font-size:12.0pt\"><span style=\"color:#00b0f0\">/&nbsp;&nbsp; /2021&nbsp;&nbsp;&nbsp;&nbsp; +/- w</span></span></strong><span style=\"font-size:19.5pt\"><span style=\"font-family:DaunPenh\"><span style=\"color:#00b0f0\">​</span></span></span><strong> </strong><strong><span style=\"font-size:12.0pt\"><span style=\"color:#00b0f0\">d</span></span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>\r\n              ', null, null);
INSERT INTO `echo_default_descriptions` VALUES ('8', 'Hématologie analyse', 'hematologie-analyse', '<p style=\"text-align:center\"><u><span style=\"color:red\">R&eacute;sultat</span></u></p>', null, null);
INSERT INTO `echo_default_descriptions` VALUES ('9', 'Letter from the hospital', 'letter-form-the-hospital', '<p style=\"text-align:center\"><span style=\"font-size:10pt\"><u><span style=\"font-size:14.0pt\"><span style=\"color:#44546a\">លិខិតចេញពីបន្ទប់សំរាកព្យាបាលនិងសម្ភព</span></span></u></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:#44546a\">គ្រូពេទ្យព្យាបាលបញ្ជាក់ថា</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:#00b0f0\">​​​​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">អ្នកជម្ងឺឈ្មោះ</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">:​​&nbsp; ​ស៊ា សុផល&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ភេទ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ស្រី&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;អាយុ​:&nbsp;&nbsp;&nbsp; ២២​&nbsp;&nbsp; ឆ្នាំ&nbsp;&nbsp;&nbsp;&nbsp; សញ្ជាតិ: ​ខ្មែរ</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;ថ្ងៃ&nbsp; ខែ ឆ្នាំ កំណើត</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">:&nbsp;&nbsp;&nbsp;&nbsp; ១៨​ /០១/ ១៩៩៩&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">​​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ទីកន្លែងកំណើត​​​</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">: ភូមិ&nbsp; ផ្លាក​ ​​/ &nbsp;ឃុំ&nbsp; តាប្រុក&nbsp; / ស្រុក ចំការលើ&nbsp;&nbsp;&nbsp; /&nbsp; ខេត្ត​ កំពង់ចាម</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;មុខរបរ</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;សន្តិសុខ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; អង្គភាព :</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ប្រពន្ធ</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">ឈ្មោះ</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">:​&nbsp;&nbsp; ហឿន រីដា&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; អាយុ​:&nbsp;&nbsp;&nbsp; ២៤​&nbsp;&nbsp; ឆ្នាំ&nbsp;&nbsp;&nbsp;&nbsp; សញ្ជាតិ: ​ខ្មែរ</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;ទីកន្លែងកំណើត​​​: ភូមិ&nbsp; ផ្លាក​ ​​/&nbsp; ឃុំ&nbsp; តាប្រុក&nbsp; / ស្រុក ចំការលើ&nbsp;&nbsp;&nbsp; /&nbsp; ខេត្ត​ កំពង់ចាម​&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ​មុខរបរ</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">:&nbsp;&nbsp; ចុងភៅ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;អង្គភាព :</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;អាស័យដ្ឋាន: ភូមិ&nbsp; ផ្លាក​ ​​/&nbsp; ឃុំ&nbsp; តាប្រុក&nbsp; / ស្រុក ចំការលើ&nbsp;&nbsp;&nbsp; /&nbsp; ខេត្ត​ កំពង់ចាម</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ចុលសំរាកព្យាបាល​ ថ្ងៃទី&nbsp; ១៩ ​ ខែ​&nbsp; មករា&nbsp;&nbsp; ឆ្នាំ​​​​&nbsp;&nbsp; ២០២០&nbsp;&nbsp; </span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ចេញសំរាកព្យាបាល​ ថ្ងៃទី ​​ ២១&nbsp; ខែ​ &nbsp;មករា&nbsp; ឆ្នាំ​​​​&nbsp;&nbsp; ២០២០</span></span>&nbsp;&nbsp; </span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;រោគវិនិច្ឆ័យ នៅពេលចូលសំរាក​</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">:រលាកក្រពះធ្ងន់ធ្ង</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; រោគវិនិច្ឆ័យ នៅពេលចូលសំរាក</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">:រលាកក្រពះធ្ងន់ធ្ង</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:black\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;សភាពអ្នកជម្ងឺនៅពេលចេញ</span></span><span style=\"font-size:11.0pt\"><span style=\"color:black\">:ធូស្រាល</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<u><span style=\"font-size:11.0pt\"><span style=\"color:red\">ចំណាំ</span></span></u><span style=\"font-size:11.0pt\"><span style=\"color:red\">:</span></span><span style=\"font-size:11.0pt\"><span style=\"color:#002060\">សូមយកលិខិតចេញពីមន្ទីសំរាកព្យាបាលនេះដើម្បីសុំច្បាប់កន្លែងការងារតាមតម្រូវការ</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:#002060\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ធ្វើនៅចំការលើ ថ្ងៃទី​​២១​ ខែ មករា ឆ្នាំ​២០២០</span></span></span></p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:#002060\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; គ្រូពេទ្យព្យាបាល</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:10pt\"><span style=\"font-size:11.0pt\"><span style=\"color:#002060\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;វេជ្ជបណ្ឌិត អ៊ុត ព្រង</span></span></span></p>', null, '2021-02-17 12:14:18');

-- ----------------------------
-- Table structure for `invoices`
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `inv_number` int NOT NULL,
  `rate` int NOT NULL DEFAULT '4000',
  `pt_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pt_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pt_age` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_age_type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `pt_gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_diagnosis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pt_village` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pt_commune` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pt_district_id` bigint unsigned DEFAULT NULL,
  `pt_province_id` bigint unsigned DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `patient_id` bigint unsigned DEFAULT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_patient_id_foreign` (`patient_id`),
  KEY `invoices_created_by_foreign` (`created_by`),
  KEY `invoices_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoices
-- ----------------------------
INSERT INTO `invoices` VALUES ('18', '2021-02-19', '1', '4000', '000019', 'ra dy', '30', '1', 'ស្រី', '031503333', null, null, null, null, null, '1', null, '19', '3', '3', '2021-02-19 05:15:00', '2021-02-19 05:15:00');
INSERT INTO `invoices` VALUES ('19', '2021-02-19', '2', '4000', '000014', 'Mr. ABC', '18', '1', 'ស្រី', '84674746', 'headach', 'Prek Chhmuos', 'Prekrey', '68', '8', '1', null, '14', '3', '3', '2021-02-19 05:23:24', '2021-02-19 05:23:24');
INSERT INTO `invoices` VALUES ('20', '2021-02-20', '3', '4000', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, null, null, '68', '8', '1', null, '21', '2', '2', '2021-02-20 06:30:35', '2021-02-20 06:30:35');
INSERT INTO `invoices` VALUES ('21', '2021-02-22', '4', '4000', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', 'dfa', 'ds', 'd', '68', '8', '1', null, '21', '3', '3', '2021-02-22 03:57:03', '2021-02-22 03:57:03');
INSERT INTO `invoices` VALUES ('22', '2021-02-22', '5', '4000', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, 'dfaz', 'dfaf', '68', '8', '1', null, '21', '3', '3', '2021-02-22 03:58:55', '2021-02-22 03:58:55');
INSERT INTO `invoices` VALUES ('23', '2021-03-15', '6', '4000', '000022', 'mongkul', null, '1', 'ប្រុស', null, null, null, null, null, null, '1', null, '22', '7', '7', '2021-03-15 11:03:36', '2021-03-15 11:03:36');
INSERT INTO `invoices` VALUES ('24', '2021-03-15', '6', '4000', '000022', 'mongkul', null, '1', 'ប្រុស', null, null, null, null, null, null, '1', null, '22', '7', '7', '2021-03-15 11:03:58', '2021-03-15 11:03:58');

-- ----------------------------
-- Table structure for `invoice_details`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE `invoice_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `index` int NOT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `invoice_id` bigint unsigned NOT NULL,
  `service_id` bigint unsigned DEFAULT NULL,
  `medicine_id` bigint unsigned DEFAULT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_details_invoice_id_foreign` (`invoice_id`),
  KEY `invoice_details_created_by_foreign` (`created_by`),
  KEY `invoice_details_updated_by_foreign` (`updated_by`),
  KEY `invoice_details_medicine_id_foreign` (`medicine_id`),
  CONSTRAINT `invoice_details_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `invoice_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `invoice_details_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `invoice_details_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoice_details
-- ----------------------------
INSERT INTO `invoice_details` VALUES ('26', 'Medicine', '40', null, '1', '0', '18', '3', null, '3', '3', '2021-02-19 05:15:00', '2021-02-19 05:15:00');
INSERT INTO `invoice_details` VALUES ('27', 'Medicine', '5', null, '1', '0', '19', '3', null, '3', '3', '2021-02-19 05:23:24', '2021-02-19 05:23:24');
INSERT INTO `invoice_details` VALUES ('28', 'Echo', '20', 'asdf', '1', '0', '20', '1', null, '2', '2', '2021-02-20 06:30:35', '2021-02-20 06:30:35');
INSERT INTO `invoice_details` VALUES ('29', 'Consulting', '10', null, '1', '0', '21', '2', null, '3', '3', '2021-02-22 03:57:03', '2021-02-22 03:57:03');
INSERT INTO `invoice_details` VALUES ('30', 'Medicine', '20', 'd', '1', '0', '22', '3', null, '3', '3', '2021-02-22 03:58:55', '2021-02-22 03:58:55');
INSERT INTO `invoice_details` VALUES ('31', 'តេស្ដឈាម', '30', null, '1', '0', '23', '14', null, '7', '7', '2021-03-15 11:03:36', '2021-03-15 11:03:36');

-- ----------------------------
-- Table structure for `labors`
-- ----------------------------
DROP TABLE IF EXISTS `labors`;
CREATE TABLE `labors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `labor_number` int NOT NULL,
  `pt_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pt_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pt_age` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_village` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_commune` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_district_id` bigint unsigned DEFAULT NULL,
  `pt_province_id` bigint unsigned DEFAULT NULL,
  `price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labor_type` tinyint NOT NULL DEFAULT '1',
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `simple_labor_detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `patient_id` bigint unsigned DEFAULT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `labors_patient_id_foreign` (`patient_id`),
  KEY `labors_pt_district_id_foreign` (`pt_district_id`),
  KEY `labors_pt_province_id_foreign` (`pt_province_id`),
  KEY `labors_created_by_foreign` (`created_by`),
  KEY `labors_updated_by_foreign` (`updated_by`),
  CONSTRAINT `labors_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `labors_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  CONSTRAINT `labors_pt_district_id_foreign` FOREIGN KEY (`pt_district_id`) REFERENCES `districts` (`id`),
  CONSTRAINT `labors_pt_province_id_foreign` FOREIGN KEY (`pt_province_id`) REFERENCES `provinces` (`id`),
  CONSTRAINT `labors_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of labors
-- ----------------------------
INSERT INTO `labors` VALUES ('73', '2021-03-24', '1', '000022', 'mongkul', null, 'ប្រុស', null, null, null, null, null, '0', 'labor-standard', '1', null, '', '22', '1', '1', '2021-03-24 22:32:28', '2021-03-24 22:32:28');

-- ----------------------------
-- Table structure for `labor_categories`
-- ----------------------------
DROP TABLE IF EXISTS `labor_categories`;
CREATE TABLE `labor_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `labor_categories_created_by_foreign` (`created_by`),
  KEY `labor_categories_updated_by_foreign` (`updated_by`),
  CONSTRAINT `labor_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `labor_categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of labor_categories
-- ----------------------------
INSERT INTO `labor_categories` VALUES ('1', 'HEMATOLOGIE', 'HEMATOLOGIE', '1', '1', '2021-02-28 14:54:43', '2021-03-23 21:19:49');
INSERT INTO `labor_categories` VALUES ('2', 'BIOLOGIE', 'BIOLOGIE', '1', '1', '2021-03-23 21:19:58', '2021-03-23 21:19:58');
INSERT INTO `labor_categories` VALUES ('3', 'URINE', 'URINE', '1', '1', '2021-03-23 21:20:25', '2021-03-23 21:20:25');
INSERT INTO `labor_categories` VALUES ('4', 'SEROLOGIE', 'SEROLOGIE', '1', '1', '2021-03-23 21:20:27', '2021-03-23 21:20:27');
INSERT INTO `labor_categories` VALUES ('5', 'Blood Type', 'Blood Type', '1', '1', '2021-03-23 21:20:48', '2021-03-23 21:20:48');

-- ----------------------------
-- Table structure for `labor_details`
-- ----------------------------
DROP TABLE IF EXISTS `labor_details`;
CREATE TABLE `labor_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `labor_id` bigint unsigned NOT NULL,
  `service_id` bigint unsigned NOT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `labor_details_labor_id_foreign` (`labor_id`),
  KEY `labor_details_service_id_foreign` (`service_id`),
  KEY `labor_details_created_by_foreign` (`created_by`),
  KEY `labor_details_updated_by_foreign` (`updated_by`),
  CONSTRAINT `labor_details_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `labor_details_labor_id_foreign` FOREIGN KEY (`labor_id`) REFERENCES `labors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `labor_details_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `labor_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `labor_details_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of labor_details
-- ----------------------------

-- ----------------------------
-- Table structure for `labor_services`
-- ----------------------------
DROP TABLE IF EXISTS `labor_services`;
CREATE TABLE `labor_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_from` double DEFAULT NULL,
  `ref_to` double DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` bigint unsigned NOT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `labor_services_category_id_foreign` (`category_id`),
  KEY `labor_services_created_by_foreign` (`created_by`),
  KEY `labor_services_updated_by_foreign` (`updated_by`),
  CONSTRAINT `labor_services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `labor_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `labor_services_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `labor_services_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of labor_services
-- ----------------------------
INSERT INTO `labor_services` VALUES ('10', 'WBC', '10^9/L', '3.5', '9.5', null, '1', '1', '1', '2021-02-28 14:56:58', '2021-03-23 21:24:09');
INSERT INTO `labor_services` VALUES ('11', 'Neu%', '%', '40', '75', null, '1', '1', '1', '2021-02-28 15:04:32', '2021-03-23 21:24:39');
INSERT INTO `labor_services` VALUES ('12', 'Lym%', '%', '20', '50', null, '1', '7', '1', '2021-03-11 19:10:35', '2021-03-23 21:24:59');
INSERT INTO `labor_services` VALUES ('13', 'Mon%', '%', '3', '10', null, '1', '7', '1', '2021-03-11 19:10:51', '2021-03-23 21:25:33');
INSERT INTO `labor_services` VALUES ('17', 'Eos%', '%', '0.4', '8', null, '1', '7', '1', '2021-03-11 19:12:09', '2021-03-23 21:26:12');
INSERT INTO `labor_services` VALUES ('18', 'Bas%', '%', '0', '1', null, '1', '7', '1', '2021-03-11 19:12:27', '2021-03-23 21:26:43');
INSERT INTO `labor_services` VALUES ('19', 'Neu#', '10^9/L', '1.8', '6.3', null, '1', '7', '1', '2021-03-11 19:12:45', '2021-03-23 21:27:21');
INSERT INTO `labor_services` VALUES ('20', 'Lym#', '10^9/L', '1.1', '3.2', null, '1', '7', '1', '2021-03-18 20:30:33', '2021-03-23 21:28:57');
INSERT INTO `labor_services` VALUES ('21', 'Mon#', '10^9/L', '0.1', '0.6', null, '1', '7', '1', '2021-03-18 20:30:39', '2021-03-23 21:29:50');
INSERT INTO `labor_services` VALUES ('22', 'Eos#', '10^9/L', '0.02', '0.52', null, '1', '1', '1', '2021-03-23 21:30:33', '2021-03-23 21:30:33');
INSERT INTO `labor_services` VALUES ('23', 'Bas#', '10^9/L', '0', '0.06', null, '1', '1', '1', '2021-03-23 21:30:53', '2021-03-23 21:31:12');
INSERT INTO `labor_services` VALUES ('24', 'AL#', '10^9/L', '0', '0.2', null, '1', '1', '1', '2021-03-23 21:31:39', '2021-03-23 21:31:39');
INSERT INTO `labor_services` VALUES ('25', 'AL%', '%', '0', '0.2', null, '1', '1', '1', '2021-03-23 21:32:02', '2021-03-23 21:32:02');
INSERT INTO `labor_services` VALUES ('26', 'IG#', '10^9/L', '0', '0.2', null, '1', '1', '1', '2021-03-23 21:33:29', '2021-03-23 21:33:29');
INSERT INTO `labor_services` VALUES ('27', 'IG%', '%', '0', '2.5', null, '1', '1', '1', '2021-03-23 21:33:54', '2021-03-23 21:33:54');
INSERT INTO `labor_services` VALUES ('28', 'RBC', '10^12/L', '4.3', '5.8', null, '1', '1', '1', '2021-03-23 21:34:29', '2021-03-23 21:34:29');
INSERT INTO `labor_services` VALUES ('29', 'HGB', 'g/L', '130', '175', null, '1', '1', '1', '2021-03-23 21:35:06', '2021-03-23 21:35:06');
INSERT INTO `labor_services` VALUES ('30', 'HCT', '%', '40', '50', null, '1', '1', '1', '2021-03-23 21:35:22', '2021-03-23 21:35:22');
INSERT INTO `labor_services` VALUES ('31', 'MCV', 'fL', '82', '100', null, '1', '1', '1', '2021-03-23 21:35:44', '2021-03-23 21:35:44');
INSERT INTO `labor_services` VALUES ('32', 'MCH', 'pg', '27', '34', null, '1', '1', '1', '2021-03-23 21:36:01', '2021-03-23 21:36:01');
INSERT INTO `labor_services` VALUES ('33', 'MCHC', 'g/L', '316', '354', null, '1', '1', '1', '2021-03-23 21:36:27', '2021-03-23 21:36:27');
INSERT INTO `labor_services` VALUES ('34', 'RDW-CV', '%', '11', '16', null, '1', '1', '1', '2021-03-23 21:36:53', '2021-03-23 21:36:53');
INSERT INTO `labor_services` VALUES ('35', 'RDW-SD', 'fL', '35', '56', null, '1', '1', '1', '2021-03-23 21:37:11', '2021-03-23 21:37:11');
INSERT INTO `labor_services` VALUES ('36', 'PLT', '10^9/L', '125', '350', null, '1', '1', '1', '2021-03-23 21:37:35', '2021-03-23 21:37:35');
INSERT INTO `labor_services` VALUES ('37', 'MPV', 'fL', '6.5', '12', null, '1', '1', '1', '2021-03-23 21:37:54', '2021-03-23 21:37:54');
INSERT INTO `labor_services` VALUES ('38', 'PDW', 'fL', '9', '17', null, '1', '1', '1', '2021-03-23 21:38:17', '2021-03-23 21:38:17');
INSERT INTO `labor_services` VALUES ('39', 'PCT', '%', '0.108', '0.282', null, '1', '1', '1', '2021-03-23 21:38:48', '2021-03-23 21:38:48');
INSERT INTO `labor_services` VALUES ('40', 'P-LCR', '%', '11', '45', null, '1', '1', '1', '2021-03-23 21:39:09', '2021-03-23 21:39:09');
INSERT INTO `labor_services` VALUES ('41', 'P-LCC', '10^9/L', '30', '90', null, '1', '1', '1', '2021-03-23 21:39:30', '2021-03-23 21:39:30');
INSERT INTO `labor_services` VALUES ('42', '▢ Calcium Arsenazo', 'mg/dL', '8.6', '10.2', null, '2', '1', '1', '2021-03-23 21:39:54', '2021-03-24 20:54:25');
INSERT INTO `labor_services` VALUES ('43', '▢ CHOLLn', 'mg/l', '120', '200', null, '2', '1', '1', '2021-03-23 21:40:13', '2021-03-24 20:54:28');
INSERT INTO `labor_services` VALUES ('44', '▢ Creatinine', 'mg/dl', '0.7', '1.4', null, '2', '1', '1', '2021-03-23 21:40:32', '2021-03-24 20:54:31');
INSERT INTO `labor_services` VALUES ('45', '▢ GLUCLn', 'mg/dl', '74', '100', null, '2', '1', '1', '2021-03-23 21:40:51', '2021-03-24 20:54:35');
INSERT INTO `labor_services` VALUES ('46', '▢ GOT(ast)Liquid', 'U/L', '3.1', '38', null, '2', '1', '1', '2021-03-23 21:41:08', '2021-03-24 20:54:38');
INSERT INTO `labor_services` VALUES ('47', '▢ GPL(alt)Liquid', 'U/L', '3', '40', null, '2', '1', '1', '2021-03-23 21:41:38', '2021-03-24 20:54:40');
INSERT INTO `labor_services` VALUES ('48', '▢ TRIGLn', 'mg/dl', '40', '160', null, '2', '1', '1', '2021-03-23 21:41:59', '2021-03-24 20:54:44');
INSERT INTO `labor_services` VALUES ('49', '▢ UALn', 'mg/l', '3.6', '7.7', null, '2', '1', '1', '2021-03-23 21:42:22', '2021-03-24 20:54:47');
INSERT INTO `labor_services` VALUES ('50', '▢ Proteine', null, null, null, null, '3', '1', '1', '2021-03-24 18:51:56', '2021-03-24 18:53:27');
INSERT INTO `labor_services` VALUES ('51', 'Hematie', null, null, null, null, '3', '1', '1', '2021-03-24 18:53:58', '2021-03-25 21:58:35');
INSERT INTO `labor_services` VALUES ('52', '▢ PH', null, null, null, null, '3', '1', '1', '2021-03-24 18:54:24', '2021-03-25 21:59:21');
INSERT INTO `labor_services` VALUES ('53', 'Leucocyte', null, null, null, null, '3', '1', '1', '2021-03-24 18:55:03', '2021-03-24 18:55:03');
INSERT INTO `labor_services` VALUES ('54', '▢ Glucose', null, null, null, null, '3', '1', '1', '2021-03-24 18:55:41', '2021-03-24 18:55:41');
INSERT INTO `labor_services` VALUES ('55', 'Cylinder', null, null, null, null, '3', '1', '1', '2021-03-24 18:55:53', '2021-03-24 18:55:53');
INSERT INTO `labor_services` VALUES ('56', '▢ T. Grosses', null, null, null, null, '3', '1', '1', '2021-03-24 18:55:59', '2021-03-24 18:55:59');
INSERT INTO `labor_services` VALUES ('57', 'Bacterie', null, null, null, null, '3', '1', '1', '2021-03-24 18:56:05', '2021-03-24 18:56:05');
INSERT INTO `labor_services` VALUES ('58', '▢ Sediment Urinarire', null, null, null, null, '3', '1', '1', '2021-03-24 18:56:12', '2021-03-24 18:56:12');
INSERT INTO `labor_services` VALUES ('59', 'Cristaux', null, null, null, null, '3', '1', '1', '2021-03-24 18:56:23', '2021-03-24 18:56:23');
INSERT INTO `labor_services` VALUES ('60', '- Cellule epitteliales', null, null, null, null, '3', '1', '1', '2021-03-24 18:56:30', '2021-03-24 18:56:30');
INSERT INTO `labor_services` VALUES ('61', 'Candida', null, null, null, null, '3', '1', '1', '2021-03-24 18:56:50', '2021-03-24 18:56:50');
INSERT INTO `labor_services` VALUES ('62', '▢ HBs.Ag', null, null, null, null, '4', '1', '1', '2021-03-24 18:57:33', '2021-03-24 18:57:33');
INSERT INTO `labor_services` VALUES ('63', '▢ ASLO', null, null, null, null, '4', '1', '1', '2021-03-24 18:58:04', '2021-03-24 18:58:04');
INSERT INTO `labor_services` VALUES ('64', '▢ HBs.Ab', null, null, null, null, '4', '1', '1', '2021-03-24 18:58:21', '2021-03-24 18:58:21');
INSERT INTO `labor_services` VALUES ('65', '▢ H. Pylori', null, null, null, null, '4', '1', '1', '2021-03-24 18:58:34', '2021-03-24 18:58:34');
INSERT INTO `labor_services` VALUES ('66', '▢ AFP', null, null, null, null, '4', '1', '1', '2021-03-24 18:58:47', '2021-03-24 18:58:47');
INSERT INTO `labor_services` VALUES ('67', '▢ Widal:', null, null, null, null, '4', '1', '1', '2021-03-24 18:58:59', '2021-03-24 18:58:59');
INSERT INTO `labor_services` VALUES ('68', '▢ HCV.Ab', null, null, null, null, '4', '1', '1', '2021-03-24 18:59:11', '2021-03-24 18:59:11');
INSERT INTO `labor_services` VALUES ('69', ' ​ ​ ​ ​ ​ TO', null, null, null, null, '4', '1', '1', '2021-03-24 18:59:25', '2021-03-24 18:59:25');
INSERT INTO `labor_services` VALUES ('70', '▢ Syphilis', null, null, null, null, '4', '1', '1', '2021-03-24 18:59:43', '2021-03-24 18:59:43');
INSERT INTO `labor_services` VALUES ('71', ' ​ ​ ​ ​ ​ TH', null, null, null, null, '4', '1', '1', '2021-03-24 18:59:54', '2021-03-24 18:59:54');
INSERT INTO `labor_services` VALUES ('72', '▢ Anti.HIV', null, null, null, null, '4', '1', '1', '2021-03-24 18:59:59', '2021-03-24 18:59:59');
INSERT INTO `labor_services` VALUES ('73', 'ក្រុមឈាម', null, null, null, null, '5', '1', '1', '2021-03-24 19:00:52', '2021-03-24 19:00:52');

-- ----------------------------
-- Table structure for `labor_types`
-- ----------------------------
DROP TABLE IF EXISTS `labor_types`;
CREATE TABLE `labor_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of labor_types
-- ----------------------------
INSERT INTO `labor_types` VALUES ('1', 'Labo', 'labor-standard', '', null, null);
INSERT INTO `labor_types` VALUES ('2', 'Hematology', 'hematology', '', null, null);
INSERT INTO `labor_types` VALUES ('3', 'Biologie', 'biologie', '', null, null);
INSERT INTO `labor_types` VALUES ('4', 'Urine', 'urine', '', null, null);
INSERT INTO `labor_types` VALUES ('5', 'Serologie', 'serologie', '', null, null);
INSERT INTO `labor_types` VALUES ('6', 'Blood type', 'blood-type', '', null, null);

-- ----------------------------
-- Table structure for `medicines`
-- ----------------------------
DROP TABLE IF EXISTS `medicines`;
CREATE TABLE `medicines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `usage_id` int unsigned NOT NULL DEFAULT '1',
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `medicines_usage_id_foreign` (`usage_id`),
  KEY `medicines_created_by_foreign` (`created_by`),
  KEY `medicines_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of medicines
-- ----------------------------
INSERT INTO `medicines` VALUES ('5', 'Panadol', null, null, '1', '1', '1', '2021-02-19 07:11:39', '2021-02-19 07:11:39', '0');
INSERT INTO `medicines` VALUES ('6', 'Exnadol', null, null, '1', '1', '1', '2021-02-19 07:11:39', '2021-02-19 07:11:39', '0');
INSERT INTO `medicines` VALUES ('7', 'AAAAAAAAAA', null, null, '1', '1', '1', '2021-02-19 07:13:44', '2021-02-19 07:13:44', '0');
INSERT INTO `medicines` VALUES ('8', 'Panadol1', null, null, '1', '2', '2', '2021-02-23 08:35:02', '2021-02-23 08:35:02', '0');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2018_12_18_094613_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2', '2019_02_22_004943_create_users_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_02_22_085134_create_provinces_table', '1');
INSERT INTO `migrations` VALUES ('5', '2019_02_22_085150_create_districts_table', '1');
INSERT INTO `migrations` VALUES ('6', '2020_07_29_091923_create_permission_tables', '1');
INSERT INTO `migrations` VALUES ('7', '2020_07_30_091923_create_default_datas_tables', '1');
INSERT INTO `migrations` VALUES ('8', '2020_12_17_110019_create_sessions_table', '1');
INSERT INTO `migrations` VALUES ('9', '2020_12_18_110019_create_patients_table', '1');
INSERT INTO `migrations` VALUES ('10', '2020_12_18_110019_create_usages_table', '1');
INSERT INTO `migrations` VALUES ('11', '2020_12_18_110020_create_medicines_table', '1');
INSERT INTO `migrations` VALUES ('12', '2020_12_18_110021_create_doctors_table', '1');
INSERT INTO `migrations` VALUES ('13', '2020_12_18_110030_create_services_table', '1');
INSERT INTO `migrations` VALUES ('14', '2020_12_18_110031_create_invoices_table', '1');
INSERT INTO `migrations` VALUES ('15', '2020_12_18_110032_create_invoice_details_table', '1');
INSERT INTO `migrations` VALUES ('16', '2020_12_18_110034_create_prescriptions_table', '1');
INSERT INTO `migrations` VALUES ('17', '2020_12_18_110035_create_prescription_details_table', '1');
INSERT INTO `migrations` VALUES ('35', '2019_02_22_085133_create_setting_table', '2');
INSERT INTO `migrations` VALUES ('36', '2020_12_18_110037_create_echo_default_descriptions_table', '2');
INSERT INTO `migrations` VALUES ('37', '2020_12_18_110037_create_echoes_table', '2');
INSERT INTO `migrations` VALUES ('38', '2021_02_05_220905_update_medicine_service_and_invoice', '3');
INSERT INTO `migrations` VALUES ('45', '2021_02_27_213423_create_labor_categories_table', '5');
INSERT INTO `migrations` VALUES ('46', '2021_02_27_213530_create_labor_services_table', '5');
INSERT INTO `migrations` VALUES ('47', '2021_02_28_220038_create_labors_table', '6');
INSERT INTO `migrations` VALUES ('48', '2021_02_28_220140_create_labor_details_table', '6');
INSERT INTO `migrations` VALUES ('49', '2021_02_28_220037_create_labor_types_table', '7');

-- ----------------------------
-- Table structure for `model_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `model_has_roles`
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('1', 'App\\Models\\User', '1');
INSERT INTO `model_has_roles` VALUES ('2', 'App\\Models\\User', '2');
INSERT INTO `model_has_roles` VALUES ('1', 'App\\Models\\User', '3');
INSERT INTO `model_has_roles` VALUES ('1', 'App\\Models\\User', '4');
INSERT INTO `model_has_roles` VALUES ('4', 'App\\Models\\User', '5');
INSERT INTO `model_has_roles` VALUES ('5', 'App\\Models\\User', '6');
INSERT INTO `model_has_roles` VALUES ('6', 'App\\Models\\User', '7');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `patients`
-- ----------------------------
DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `age` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `full_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_village` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_commune` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_district_id` bigint unsigned DEFAULT NULL,
  `address_province_id` bigint unsigned DEFAULT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patients_address_district_id_foreign` (`address_district_id`),
  KEY `patients_address_province_id_foreign` (`address_province_id`),
  KEY `patients_created_by_foreign` (`created_by`),
  KEY `patients_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of patients
-- ----------------------------
INSERT INTO `patients` VALUES ('21', 'Chenda', '524525', 'me@me.com', '5244324', '1', '15', '1', null, null, null, null, '68', '8', '3', '3', '2021-02-19 06:05:31', '2021-02-19 06:05:31');
INSERT INTO `patients` VALUES ('22', 'mongkul', null, null, null, '1', null, '1', null, null, null, null, null, null, '2', '2', '2021-02-23 08:34:01', '2021-02-23 08:34:01');
INSERT INTO `patients` VALUES ('23', 'Testing', null, null, '0', '1', '13', '1', null, null, null, null, '25', '3', '1', '1', '2021-02-28 02:18:35', '2021-02-28 02:18:35');
INSERT INTO `patients` VALUES ('24', 'monglyly', null, null, null, '1', '33', '1', null, null, null, null, null, null, '2', '2', '2021-03-08 21:36:41', '2021-03-08 21:36:41');
INSERT INTO `patients` VALUES ('25', 'Phea', null, null, null, '1', '01', '1', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '2', '2', '2021-03-10 10:54:39', '2021-03-10 10:54:39');
INSERT INTO `patients` VALUES ('26', 'ផា', null, null, null, '1', '២០', '1', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', '24', '3', '2', '2', '2021-03-10 11:01:36', '2021-03-10 11:01:36');
INSERT INTO `patients` VALUES ('27', 'rey', null, null, null, '1', '31', '1', null, null, null, null, null, null, '2', '2', '2021-03-10 11:14:20', '2021-03-10 11:14:20');
INSERT INTO `patients` VALUES ('28', 'ណុល', null, null, '0714863333', '1', '50', '1', null, null, 'ថ្នល់បែកលិច', 'ស្វាយទាប', '24', '3', '7', '7', '2021-03-11 15:13:04', '2021-03-11 15:13:04');

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'Permission Index', 'web', 'Visit Permission Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('2', 'Permission Create', 'web', 'Create new Permission', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('3', 'Permission Edit', 'web', 'Edit Existed Permission', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('4', 'Permission Delete', 'web', 'Delete Existed Permission', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('5', 'Permission Assign User', 'web', 'Assign Permissions to Users', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('6', 'Permission Assign Role', 'web', 'Assign Permissions to Roles', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('7', 'Role Index', 'web', 'Visit Role Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('8', 'Role Create', 'web', 'Create new Role', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('9', 'Role Edit', 'web', 'Edit Existed Role', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('10', 'Role Delete', 'web', 'Delete Existed Role', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('11', 'Role Assign User', 'web', 'Assign Roles to Users', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('12', 'Role Assign Permission', 'web', 'Assign Permission to Users', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('13', 'User Index', 'web', 'Visit User Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('14', 'User Create', 'web', 'Create new User', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('15', 'User Edit', 'web', 'Edit Existed User', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('16', 'User Delete', 'web', 'Delete Existed User', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('17', 'User Password', 'web', 'Change Password User', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('18', 'User Assign Role', 'web', 'Assign Roles to Users', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('19', 'User Assign Permission', 'web', 'Assign Permission to Users', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('20', 'Province Index', 'web', 'Visit Province Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('21', 'Province Create', 'web', 'Create new Province', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('22', 'Province Edit', 'web', 'Edit Existed Province', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('23', 'Province Delete', 'web', 'Delete Existed Province', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('24', 'District Index', 'web', 'Visit District Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('25', 'District Create', 'web', 'Create new District', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('26', 'District Edit', 'web', 'Edit Existed District', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('27', 'District Delete', 'web', 'Delete Existed District', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('28', 'Medicine Index', 'web', 'Visit Medicine Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('29', 'Medicine Create', 'web', 'Create new Medicine', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('30', 'Medicine Edit', 'web', 'Edit Existed Medicine', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('31', 'Medicine Delete', 'web', 'Delete Existed Medicine', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('32', 'Usage Index', 'web', 'Visit Usage Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('33', 'Usage Create', 'web', 'Create new Usage', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('34', 'Usage Edit', 'web', 'Edit Existed Usage', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('35', 'Usage Delete', 'web', 'Delete Existed Usage', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('36', 'Doctor Index', 'web', 'Visit Doctor Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('37', 'Doctor Create', 'web', 'Create new Doctor', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('38', 'Doctor Edit', 'web', 'Edit Existed Doctor', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('39', 'Doctor Delete', 'web', 'Delete Existed Doctor', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('40', 'Doctor Show', 'web', 'Show Doctor detail', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('41', 'Patient Index', 'web', 'Visit Patient Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('42', 'Patient Create', 'web', 'Create new Patient', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('43', 'Patient Edit', 'web', 'Edit Existed Patient', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('44', 'Patient Delete', 'web', 'Delete Existed Patient', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('45', 'Patient Show', 'web', 'Show Patient detail', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('46', 'Service Index', 'web', 'Visit Service Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('47', 'Service Create', 'web', 'Create new Service', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('48', 'Service Edit', 'web', 'Edit Existed Service', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('49', 'Service Delete', 'web', 'Delete Existed Service', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('50', 'Service Show', 'web', 'Show Service detail', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('51', 'Invoice Index', 'web', 'Visit Invoice Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('52', 'Invoice Create', 'web', 'Create new Invoice', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('53', 'Invoice Edit', 'web', 'Edit Existed Invoice', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('54', 'Invoice Delete', 'web', 'Delete Existed Invoice', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('55', 'Invoice Show', 'web', 'Show Invoice detail', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('56', 'Invoice Print', 'web', 'Show Invoice detail', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('57', 'Prescription Index', 'web', 'Visit Prescription Index', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('58', 'Prescription Create', 'web', 'Create new Prescription', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('59', 'Prescription Edit', 'web', 'Edit Existed Prescription', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('60', 'Prescription Delete', 'web', 'Delete Existed Prescription', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('61', 'Prescription Show', 'web', 'Show Prescription detail', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('62', 'Prescription Print', 'web', 'Print Prescription detail', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `permissions` VALUES ('63', 'Setting Index', 'web', null, '2021-01-31 06:40:33', '2021-01-31 06:40:33');
INSERT INTO `permissions` VALUES ('64', 'Echo Default Description Index', 'web', 'Echo Default Description Index', '2021-01-31 07:16:49', '2021-01-31 07:16:49');
INSERT INTO `permissions` VALUES ('65', 'Echo Default Description Create', 'web', 'Create new Echo Default Description', '2021-01-31 07:16:49', '2021-01-31 07:16:49');
INSERT INTO `permissions` VALUES ('66', 'Echo Default Description Edit', 'web', 'Edit Existed Echo Default Description', '2021-01-31 07:16:49', '2021-01-31 07:16:49');
INSERT INTO `permissions` VALUES ('67', 'Echo Default Description Delete', 'web', 'Delete Existed  Echo Default Description', '2021-01-31 07:16:49', '2021-01-31 07:16:49');
INSERT INTO `permissions` VALUES ('68', 'Echo Index', 'web', 'Echo Index', '2021-01-31 07:16:54', '2021-01-31 07:16:54');
INSERT INTO `permissions` VALUES ('69', 'Echo Create', 'web', 'Create new Echo', '2021-01-31 07:16:54', '2021-01-31 07:16:54');
INSERT INTO `permissions` VALUES ('70', 'Echo Edit', 'web', 'Edit Existed Echo', '2021-01-31 07:16:54', '2021-01-31 07:16:54');
INSERT INTO `permissions` VALUES ('71', 'Echo Delete', 'web', 'Delete Existed  Echo', '2021-01-31 07:16:54', '2021-01-31 07:16:54');
INSERT INTO `permissions` VALUES ('72', 'Echo Print', 'web', null, '2021-02-07 10:48:28', '2021-02-07 10:48:28');
INSERT INTO `permissions` VALUES ('73', 'Labor Index', 'web', 'Labor Index', '2021-02-26 15:10:18', '2021-02-26 15:10:18');
INSERT INTO `permissions` VALUES ('74', 'Labor Create', 'web', 'Create new Labor', '2021-02-26 15:10:18', '2021-02-26 15:10:18');
INSERT INTO `permissions` VALUES ('75', 'Labor Edit', 'web', 'Edit Existed Labor', '2021-02-26 15:10:18', '2021-02-26 15:10:18');
INSERT INTO `permissions` VALUES ('76', 'Labor Delete', 'web', 'Delete Existed  Labor', '2021-02-26 15:10:18', '2021-02-26 15:10:18');
INSERT INTO `permissions` VALUES ('82', 'Labor Print', 'web', null, '2021-02-26 15:11:15', '2021-02-26 15:11:15');
INSERT INTO `permissions` VALUES ('83', 'Labor Show', 'web', null, '2021-02-26 15:11:44', '2021-02-26 15:11:44');
INSERT INTO `permissions` VALUES ('84', 'Labor Service Index', 'web', 'Labor Service Index', '2021-02-27 15:24:40', '2021-02-27 15:24:40');
INSERT INTO `permissions` VALUES ('85', 'Labor Service Create', 'web', 'Create new Labor Service', '2021-02-27 15:24:40', '2021-02-27 15:24:40');
INSERT INTO `permissions` VALUES ('86', 'Labor Service Edit', 'web', 'Edit Existed Labor Service', '2021-02-27 15:24:40', '2021-02-27 15:24:40');
INSERT INTO `permissions` VALUES ('87', 'Labor Service Delete', 'web', 'Delete Existed  Labor Service', '2021-02-27 15:24:40', '2021-02-27 15:24:40');
INSERT INTO `permissions` VALUES ('88', 'Labor Category Index', 'web', 'Labor Category Index', '2021-02-27 15:24:46', '2021-02-27 15:24:46');
INSERT INTO `permissions` VALUES ('89', 'Labor Category Create', 'web', 'Create new Labor Category', '2021-02-27 15:24:46', '2021-02-27 15:24:46');
INSERT INTO `permissions` VALUES ('90', 'Labor Category Edit', 'web', 'Edit Existed Labor Category', '2021-02-27 15:24:46', '2021-02-27 15:24:46');
INSERT INTO `permissions` VALUES ('91', 'Labor Category Delete', 'web', 'Delete Existed  Labor Category', '2021-02-27 15:24:46', '2021-02-27 15:24:46');
INSERT INTO `permissions` VALUES ('92', 'Labor Report', 'web', 'Labor Report Labor Report', '2021-02-28 14:57:37', '2021-02-28 14:57:37');

-- ----------------------------
-- Table structure for `prescriptions`
-- ----------------------------
DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE `prescriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `code` int NOT NULL,
  `pt_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pt_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pt_age` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_age_type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `pt_gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt_diagnosis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pt_village` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pt_commune` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pt_district_id` bigint unsigned DEFAULT NULL,
  `pt_province_id` bigint unsigned DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `patient_id` bigint unsigned DEFAULT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prescriptions_patient_id_foreign` (`patient_id`),
  KEY `prescriptions_created_by_foreign` (`created_by`),
  KEY `prescriptions_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of prescriptions
-- ----------------------------
INSERT INTO `prescriptions` VALUES ('23', '2021-02-19', '1', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', '1111111111111', '111111111', '111111111', '68', '8', '0', '11111111', '21', '1', '1', '2021-02-19 07:11:39', '2021-02-19 07:11:39');
INSERT INTO `prescriptions` VALUES ('24', '2021-02-20', '2', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, 'ស្វាយទាប', 'ស្វាយទាប', '26', '3', '0', null, '21', '2', '2', '2021-02-20 06:32:43', '2021-02-20 06:32:43');
INSERT INTO `prescriptions` VALUES ('25', '2021-02-22', '3', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, null, null, '68', '8', '0', null, '21', '2', '2', '2021-02-22 03:40:54', '2021-02-22 03:40:54');
INSERT INTO `prescriptions` VALUES ('26', '2021-02-22', '4', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, 'sdfgs', 'daf', '68', '8', '0', null, '21', '3', '3', '2021-02-22 03:58:12', '2021-02-22 03:58:12');
INSERT INTO `prescriptions` VALUES ('27', '2021-02-23', '5', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, null, null, '68', '8', '0', null, '21', '2', '2', '2021-02-23 08:35:02', '2021-02-23 08:35:02');
INSERT INTO `prescriptions` VALUES ('28', '2021-03-08', '6', '000022', 'mongkul', null, '1', 'ប្រុស', null, null, null, null, '67', '8', '0', null, '22', '2', '2', '2021-03-08 21:53:03', '2021-03-08 21:53:03');
INSERT INTO `prescriptions` VALUES ('29', '2021-03-08', '6', '000022', 'mongkul', null, '1', 'ប្រុស', null, null, null, null, null, null, '0', null, '22', '2', '2', '2021-03-08 21:53:16', '2021-03-08 21:53:16');
INSERT INTO `prescriptions` VALUES ('30', '2021-03-08', '6', '000022', 'mongkul', null, '1', 'ប្រុស', null, null, null, null, null, null, '0', null, '22', '2', '2', '2021-03-08 21:53:54', '2021-03-08 21:53:54');
INSERT INTO `prescriptions` VALUES ('31', '2021-03-08', '7', '000023', 'Testing', '13', '1', 'ប្រុស', '0', 'trytdry', 'rsres', 'yg', '25', '3', '0', null, '23', '3', '3', '2021-03-08 21:58:44', '2021-03-08 21:58:44');
INSERT INTO `prescriptions` VALUES ('32', '2021-03-08', '7', '000022', 'mongkul', '564', '1', 'ប្រុស', null, null, null, null, '26', '3', '0', null, '22', '3', '3', '2021-03-08 21:59:25', '2021-03-08 21:59:25');
INSERT INTO `prescriptions` VALUES ('33', '2021-03-09', '8', '000023', 'Testing', '13', '1', 'ប្រុស', '0', '11', '44', '33', '25', '3', '0', '22', '23', '1', '1', '2021-03-09 09:22:59', '2021-03-09 09:22:59');
INSERT INTO `prescriptions` VALUES ('34', '2021-03-09', '8', '000023', 'Testing', '13', '1', 'ប្រុស', '0', '11', '44', '33', '25', '3', '0', '22', '23', '1', '1', '2021-03-09 09:23:58', '2021-03-09 09:23:58');
INSERT INTO `prescriptions` VALUES ('35', '2021-03-10', '9', '000022', 'mongkul', null, '1', 'ប្រុស', null, null, null, null, null, null, '0', null, '22', '2', '2', '2021-03-10 11:12:11', '2021-03-10 11:12:11');
INSERT INTO `prescriptions` VALUES ('36', '2021-03-10', '10', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, null, null, '68', '8', '0', null, '21', '2', '2', '2021-03-10 11:17:58', '2021-03-10 11:17:58');
INSERT INTO `prescriptions` VALUES ('37', '2021-03-11', '11', '000025', 'Phea', '01', '1', 'ប្រុស', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '0', null, '25', '6', '6', '2021-03-11 13:07:04', '2021-03-11 13:07:04');
INSERT INTO `prescriptions` VALUES ('38', '2021-03-11', '12', '000024', 'monglyly', '33', '1', 'ប្រុស', '54565344', 'fff', 'f', 'f', '35', '4', '0', null, '24', '7', '7', '2021-03-11 13:35:01', '2021-03-11 13:35:01');
INSERT INTO `prescriptions` VALUES ('39', '2021-03-11', '13', '000028', 'ណុល', '50', '1', 'ប្រុស', '0714863333', null, 'ថ្នល់បែកលិច', 'ស្វាយទាប', '24', '3', '0', null, '28', '7', '7', '2021-03-11 15:19:13', '2021-03-11 15:19:13');
INSERT INTO `prescriptions` VALUES ('40', '2021-03-11', '14', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, null, null, '68', '8', '0', null, '21', '7', '7', '2021-03-11 15:29:12', '2021-03-11 15:29:12');
INSERT INTO `prescriptions` VALUES ('41', '2021-03-11', '15', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, null, null, '26', '3', '0', null, '21', '7', '7', '2021-03-11 19:40:51', '2021-03-11 19:40:51');
INSERT INTO `prescriptions` VALUES ('42', '2021-03-11', '16', '000025', 'Phea', '01', '1', 'ប្រុស', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', '26', '3', '0', null, '25', '7', '7', '2021-03-11 20:04:01', '2021-03-11 20:04:03');
INSERT INTO `prescriptions` VALUES ('43', '2021-03-11', '17', '000022', 'mongkul', null, '1', 'ប្រុស', null, null, null, null, null, null, '0', null, '22', '7', '7', '2021-03-11 20:06:04', '2021-03-11 20:06:04');
INSERT INTO `prescriptions` VALUES ('44', '2021-03-11', '18', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, null, null, '68', '8', '0', null, '21', '7', '7', '2021-03-11 20:09:28', '2021-03-11 20:09:28');
INSERT INTO `prescriptions` VALUES ('45', '2021-03-11', '19', '000025', 'Phea', '01', '1', 'ប្រុស', null, 'Test', 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '0', null, '25', '7', '7', '2021-03-11 20:12:26', '2021-03-11 20:12:26');
INSERT INTO `prescriptions` VALUES ('46', '2021-03-11', '20', '000025', 'Phea', '01', '1', 'ប្រុស', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '0', null, '25', '7', '7', '2021-03-11 20:16:54', '2021-03-11 20:16:54');
INSERT INTO `prescriptions` VALUES ('47', '2021-03-11', '21', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, null, null, '68', '8', '0', null, '21', '7', '7', '2021-03-11 20:18:07', '2021-03-11 20:18:07');
INSERT INTO `prescriptions` VALUES ('48', '2021-03-11', '22', '000025', 'Phea', '01', '1', 'ប្រុស', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '0', null, '25', '7', '7', '2021-03-11 20:19:05', '2021-03-11 20:19:05');
INSERT INTO `prescriptions` VALUES ('49', '2021-03-11', '23', '000025', 'Phea', '01', '1', 'ប្រុស', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '0', null, '25', '7', '7', '2021-03-11 20:30:33', '2021-03-11 20:30:33');
INSERT INTO `prescriptions` VALUES ('50', '2021-03-12', '24', '000025', 'Phea', '01', '1', 'ប្រុស', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '0', null, '25', '7', '7', '2021-03-12 09:52:32', '2021-03-12 09:52:32');
INSERT INTO `prescriptions` VALUES ('51', '2021-03-12', '25', '000022', 'mongkul', null, '1', 'ប្រុស', null, null, null, null, null, null, '0', null, '22', '7', '7', '2021-03-12 09:59:51', '2021-03-12 09:59:51');
INSERT INTO `prescriptions` VALUES ('52', '2021-03-15', '26', '000025', 'Phea', '01', '1', 'ប្រុស', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '0', null, '25', '7', '7', '2021-03-15 08:53:53', '2021-03-15 08:53:53');
INSERT INTO `prescriptions` VALUES ('53', '2021-03-15', '27', '000022', 'mongkul', null, '1', 'ប្រុស', null, null, null, null, null, null, '0', null, '22', '7', '7', '2021-03-15 10:29:25', '2021-03-15 10:29:25');
INSERT INTO `prescriptions` VALUES ('54', '2021-03-16', '28', '000021', 'Chenda', '15', '1', 'ប្រុស', '5244324', null, null, null, '68', '8', '0', null, '21', '7', '7', '2021-03-16 14:12:46', '2021-03-16 14:12:46');
INSERT INTO `prescriptions` VALUES ('55', '2021-03-16', '29', '000025', 'Phea', '01', '1', 'ប្រុស', null, null, 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '0', null, '25', '7', '7', '2021-03-16 15:40:00', '2021-03-16 15:40:00');
INSERT INTO `prescriptions` VALUES ('56', '2021-03-16', '30', '000025', 'Phea', '01', '1', 'ប្រុស', null, 'hii', 'ថ្នល់បែក', 'ស្វាយទាប', null, '3', '0', null, '25', '7', '7', '2021-03-16 15:44:53', '2021-03-16 15:44:53');
INSERT INTO `prescriptions` VALUES ('57', '2021-03-16', '31', '000024', 'monglyly', '33', '1', 'ប្រុស', null, null, null, null, null, null, '0', null, '24', '7', '7', '2021-03-16 15:55:04', '2021-03-16 15:55:04');
INSERT INTO `prescriptions` VALUES ('58', '2021-03-17', '32', '000024', 'monglyly', '33', '1', 'ប្រុស', null, null, null, null, null, null, '0', null, '24', '7', '7', '2021-03-17 11:30:22', '2021-03-17 11:30:22');

-- ----------------------------
-- Table structure for `prescription_details`
-- ----------------------------
DROP TABLE IF EXISTS `prescription_details`;
CREATE TABLE `prescription_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_usage` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `morning` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `afternoon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evening` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `night` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_days` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `index` int NOT NULL,
  `medicine_id` bigint unsigned DEFAULT NULL,
  `prescription_id` bigint unsigned NOT NULL,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prescription_details_medicine_id_foreign` (`medicine_id`),
  KEY `prescription_details_prescription_id_foreign` (`prescription_id`),
  KEY `prescription_details_created_by_foreign` (`created_by`),
  KEY `prescription_details_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of prescription_details
-- ----------------------------
INSERT INTO `prescription_details` VALUES ('1', 'asdfaasdf', 'លេប', '1', '0', '0', '1', '0', null, '1', '3', '1', '1', '1', '2021-01-31 06:54:57', '2021-01-31 06:54:57');
INSERT INTO `prescription_details` VALUES ('2', 'Paracetamol 500', 'លេប', '1', '0', '1', '0', '0', null, '1', null, '4', '1', '1', '2021-02-10 15:02:03', '2021-02-10 15:02:03');
INSERT INTO `prescription_details` VALUES ('3', 'Wood Serum', 'ផឹក', '1', '1', '1', '1', '0', null, '2', null, '4', '1', '1', '2021-02-10 15:02:03', '2021-02-10 15:02:03');
INSERT INTO `prescription_details` VALUES ('4', 'Paracetamol 500', 'លេប', '2', '1', '2', '2', '0', null, '1', null, '5', '1', '1', '2021-02-10 15:11:46', '2021-02-10 15:56:46');
INSERT INTO `prescription_details` VALUES ('7', 'Testing', 'លាប', '1', '1', '1', '1', '0', null, '2', null, '5', '1', '1', '2021-02-10 16:07:38', '2021-02-10 16:07:38');
INSERT INTO `prescription_details` VALUES ('20', 'M A', '111', '1', '1', '1', '1', '0', '1111', '1', null, '7', '2', '2', '2021-02-11 05:11:42', '2021-02-11 05:11:42');
INSERT INTO `prescription_details` VALUES ('21', 'M A', '1111', '1', '1', '1', '1', '0', '1111', '2', null, '7', '2', '2', '2021-02-11 05:11:42', '2021-02-11 05:11:42');
INSERT INTO `prescription_details` VALUES ('22', 'M C', '5', '1', '2', '3', '4', '0', '6', '1', null, '8', '2', '2', '2021-02-11 05:15:47', '2021-02-11 05:15:47');
INSERT INTO `prescription_details` VALUES ('23', 'MD', '6', '2', '3', '4', '5', '0', '7', '2', null, '8', '2', '2', '2021-02-11 05:15:47', '2021-02-11 05:15:47');
INSERT INTO `prescription_details` VALUES ('24', 'para', 'លេប', '2', '2', '2', '1', '0', null, '1', null, '9', '2', '2', '2021-02-13 03:13:57', '2021-02-13 03:13:57');
INSERT INTO `prescription_details` VALUES ('25', 'amox', 'លាប', '1', '1', '1', '1', '0', null, '2', null, '9', '2', '2', '2021-02-13 03:13:57', '2021-02-13 03:13:57');
INSERT INTO `prescription_details` VALUES ('26', 'cloa', 'លេប', '1', '1', '1', '1', '0', null, '1', null, '10', '2', '2', '2021-02-13 03:34:00', '2021-02-13 03:34:00');
INSERT INTO `prescription_details` VALUES ('27', 'amox', 'លាប', '1', '2', '7', '10', '0', null, '2', null, '10', '2', '2', '2021-02-13 03:34:00', '2021-02-13 03:34:00');
INSERT INTO `prescription_details` VALUES ('28', 'para', 'លេប', '1', '1', '18', '1', '0', null, '3', null, '10', '2', '2', '2021-02-13 03:34:00', '2021-02-13 03:34:00');
INSERT INTO `prescription_details` VALUES ('29', 'para', 'លេប', '4', '4', '2', '8', '0', null, '1', null, '11', '2', '2', '2021-02-13 04:14:29', '2021-02-13 04:14:29');
INSERT INTO `prescription_details` VALUES ('30', 'Paracetamol 500', 'លេប', '1', '0', '0', '1', '0', null, '1', null, '12', '2', '2', '2021-02-13 11:09:09', '2021-02-13 11:09:09');
INSERT INTO `prescription_details` VALUES ('31', 'Wood', 'ផឹក', '1', '0', '1', '0', '0', null, '2', null, '12', '2', '2', '2021-02-13 11:09:09', '2021-02-13 11:09:09');
INSERT INTO `prescription_details` VALUES ('33', 'aaa', 'ចាក់', '0', '1', '0', '0', '0', null, '2', null, '12', '2', '2', '2021-02-13 11:10:35', '2021-02-13 11:10:35');
INSERT INTO `prescription_details` VALUES ('34', 'para', 'លេប', '9', '1', '1', '1', '0', null, '1', null, '13', '2', '2', '2021-02-14 03:31:09', '2021-02-14 03:31:09');
INSERT INTO `prescription_details` VALUES ('35', 'amox', 'លេប', '1', '1', '1', '1', '0', null, '2', null, '13', '2', '2', '2021-02-14 03:31:09', '2021-02-14 03:31:09');
INSERT INTO `prescription_details` VALUES ('36', 'co', 'លេប', '1', '1', '1', '1', '0', null, '3', null, '13', '2', '2', '2021-02-14 03:31:09', '2021-02-14 03:31:09');
INSERT INTO `prescription_details` VALUES ('37', 'cloa', 'លេប', '1', '1', '1', '1', '0', null, '4', null, '13', '2', '2', '2021-02-14 03:31:09', '2021-02-14 03:31:09');
INSERT INTO `prescription_details` VALUES ('38', 'para', 'លេប', '9', '9', '9', '9', '0', null, '1', null, '14', '2', '2', '2021-02-14 03:47:03', '2021-02-14 03:47:03');
INSERT INTO `prescription_details` VALUES ('39', 'Paracetamol 500', 'លេប', '1', null, null, '1', '0', null, '1', null, '15', '2', '2', '2021-02-16 13:14:23', '2021-02-16 13:14:23');
INSERT INTO `prescription_details` VALUES ('40', 'asd', 'asdf', null, '1', '1', null, '0', null, '2', null, '15', '2', '2', '2021-02-16 13:14:43', '2021-02-16 13:14:43');
INSERT INTO `prescription_details` VALUES ('41', 'para', 'លេប', '1', '1', '1', null, '0', null, '1', null, '16', '2', '2', '2021-02-17 00:17:40', '2021-02-17 00:17:40');
INSERT INTO `prescription_details` VALUES ('42', '1', 'ytftyu', '1', null, null, null, '0', null, '1', null, '17', '3', '1', '2021-02-17 00:27:02', '2021-02-17 14:01:02');
INSERT INTO `prescription_details` VALUES ('43', 'amox 250', 'លេប', '1', '2', '1', '3', '0', null, '1', null, '18', '2', '2', '2021-02-17 05:06:38', '2021-02-17 05:06:38');
INSERT INTO `prescription_details` VALUES ('44', 'Para Sitamol 500g', 'លេប', '1', '1', '1', null, '0', 'ញាំក្រោយបាយ', '1', null, '19', '3', '3', '2021-02-17 05:19:37', '2021-02-17 05:19:37');
INSERT INTO `prescription_details` VALUES ('45', 'cloa', 'លេប', '1', '1', '1', null, '0', null, '1', null, '20', '2', '2', '2021-02-18 00:38:32', '2021-02-18 00:38:32');
INSERT INTO `prescription_details` VALUES ('46', 'amox 250', 'លេប', '1', '1', '1', null, '0', null, '2', null, '20', '2', '2', '2021-02-18 00:38:32', '2021-02-18 00:38:32');
INSERT INTO `prescription_details` VALUES ('47', 'Paractamol 500', 'លេប', '1', '1', '1', null, '0', null, '1', null, '21', '2', '2', '2021-02-18 10:00:56', '2021-02-18 10:00:56');
INSERT INTO `prescription_details` VALUES ('48', 'para', 'លេប', '1', '1', '1', '1', '0', null, '1', null, '22', '2', '2', '2021-02-19 01:09:26', '2021-02-19 01:09:26');
INSERT INTO `prescription_details` VALUES ('49', 'amox 250', 'លេប', '1', '1', '1', null, '0', null, '2', null, '22', '2', '2', '2021-02-19 01:09:26', '2021-02-19 01:09:26');
INSERT INTO `prescription_details` VALUES ('50', 'Panadol', '1', '1', '1', '1', '1', '0', '1', '1', '5', '23', '1', '1', '2021-02-19 07:11:39', '2021-02-19 07:11:39');
INSERT INTO `prescription_details` VALUES ('51', 'AAAAAAAAAA', '2', '2', '2', '2', '2', '0', '2', '2', '7', '23', '1', '1', '2021-02-19 07:11:39', '2021-02-19 07:13:44');
INSERT INTO `prescription_details` VALUES ('52', 'Panadol', 'លេប', '1', '1', null, '1', '0', 'មុនបាយ ៣០នាទី', '1', '5', '24', '2', '2', '2021-02-20 06:32:43', '2021-02-20 06:32:43');
INSERT INTO `prescription_details` VALUES ('53', 'Exnadol', 'លេប', '1', null, null, '1', '0', 'មុនបាយ៣០នាទី', '2', '6', '24', '2', '2', '2021-02-20 06:32:43', '2021-02-20 06:32:43');
INSERT INTO `prescription_details` VALUES ('54', 'Exnadol', 'លេប', '1', '1', '1', '1', '0', '7', '1', '6', '25', '2', '2', '2021-02-22 03:40:54', '2021-02-22 03:40:54');
INSERT INTO `prescription_details` VALUES ('55', 'Exnadol', 'ljdfa', '1', '1', '1', '1', '0', null, '1', '6', '26', '3', '3', '2021-02-22 03:58:12', '2021-02-22 03:58:12');
INSERT INTO `prescription_details` VALUES ('56', 'Panadol1', 'លេប', '1', '1', '1', null, '0', null, '1', '8', '27', '2', '2', '2021-02-23 08:35:02', '2021-02-23 08:35:02');
INSERT INTO `prescription_details` VALUES ('57', 'Panadol', 'លាយទឹក', '1', '2', '3', '4', '5', '6', '1', '5', '34', '1', '1', '2021-03-09 09:23:58', '2021-03-09 09:23:58');
INSERT INTO `prescription_details` VALUES ('58', 'Exnadol', 'លេប', '1', '0', '1', '0', '5', null, '1', '6', '35', '2', '2', '2021-03-10 11:12:11', '2021-03-10 11:12:11');
INSERT INTO `prescription_details` VALUES ('59', 'Panadol1', 'លេប', '1', '1', '1', '0', '5', null, '2', '8', '35', '2', '2', '2021-03-10 11:12:11', '2021-03-10 11:12:11');
INSERT INTO `prescription_details` VALUES ('60', 'Panadol', 'លេប', '1', '1', '1', '0', '5', null, '3', '5', '35', '2', '2', '2021-03-10 11:12:11', '2021-03-10 11:12:11');
INSERT INTO `prescription_details` VALUES ('61', 'Exnadol', 'លេប', '1', '0', '1', '0', '1', null, '1', '6', '36', '2', '2', '2021-03-10 11:17:58', '2021-03-10 11:17:58');
INSERT INTO `prescription_details` VALUES ('62', 'AAAAAAAAAA', 'លាប', '0', '0', '0', '0', '0', null, '1', null, '31', '1', '1', '2021-03-10 22:58:18', '2021-03-10 22:58:18');
INSERT INTO `prescription_details` VALUES ('63', 'Panadol', 'លេប', '0', '0', '0', '0', '0', null, '2', null, '31', '1', '1', '2021-03-10 22:58:39', '2021-03-10 22:58:39');
INSERT INTO `prescription_details` VALUES ('64', 'Panadol', 'លេប', '0', '0', '0', '0', '0', null, '1', null, '30', '1', '1', '2021-03-10 23:04:41', '2021-03-10 23:04:41');
INSERT INTO `prescription_details` VALUES ('65', 'Exnadol', 'លេប', '1', '1', '0', '1', '3', null, '1', '6', '37', '6', '6', '2021-03-11 13:07:04', '2021-03-11 13:07:04');
INSERT INTO `prescription_details` VALUES ('66', 'Exnadol', 'លេប', '1', '1', '1', '1', '3', null, '1', '6', '38', '7', '7', '2021-03-11 13:35:01', '2021-03-11 13:35:01');
INSERT INTO `prescription_details` VALUES ('67', 'Exnadol', 'លេប', '1', '1', '1', '0', '5', null, '1', '6', '39', '7', '7', '2021-03-11 15:19:13', '2021-03-11 15:19:13');
INSERT INTO `prescription_details` VALUES ('68', 'Panadol1', 'លេប', '2', '0', '0', '2', '5', null, '2', '8', '39', '7', '7', '2021-03-11 15:19:13', '2021-03-11 15:19:13');
INSERT INTO `prescription_details` VALUES ('69', 'Exnadol', 'លេប', '1', '0', '1', '0', '5', null, '1', '6', '40', '7', '7', '2021-03-11 15:29:12', '2021-03-11 15:29:12');
INSERT INTO `prescription_details` VALUES ('70', 'Exnadol', 'លេប', '1', '1', '1', '0', '5', null, '1', '6', '41', '7', '7', '2021-03-11 19:40:51', '2021-03-11 19:40:51');
INSERT INTO `prescription_details` VALUES ('71', 'Panadol', 'លេប', '2', '2', '2', '0', '5', null, '2', '5', '41', '7', '7', '2021-03-11 19:40:51', '2021-03-11 19:40:51');
INSERT INTO `prescription_details` VALUES ('72', 'Exnadol', 'លេប', '1', '1', '1', '1', '3', null, '1', '6', '42', '7', '7', '2021-03-11 20:04:01', '2021-03-11 20:04:01');
INSERT INTO `prescription_details` VALUES ('73', 'Exnadol', 'លេប', '1', '0', '0', '0', '1', null, '1', '6', '43', '7', '7', '2021-03-11 20:06:04', '2021-03-11 20:06:04');
INSERT INTO `prescription_details` VALUES ('74', 'Exnadol', 'លេប', '1', '1', '1', '0', '5', null, '1', '6', '44', '7', '7', '2021-03-11 20:09:28', '2021-03-11 20:09:28');
INSERT INTO `prescription_details` VALUES ('75', 'Panadol', 'លេប', '1', '1', '1', '1', '3', null, '1', '5', '45', '7', '7', '2021-03-11 20:12:26', '2021-03-11 20:12:26');
INSERT INTO `prescription_details` VALUES ('76', 'Panadol', 'លេប', '1', '1', '1', '1', '3', null, '1', '5', '46', '7', '7', '2021-03-11 20:16:54', '2021-03-11 20:16:54');
INSERT INTO `prescription_details` VALUES ('77', 'Exnadol', 'លេប', '1', '0', '3', '0', '6', null, '1', '6', '47', '7', '7', '2021-03-11 20:18:07', '2021-03-11 20:18:07');
INSERT INTO `prescription_details` VALUES ('78', 'Panadol', 'លេប', '1', '1', '1', '2', '2', null, '1', '5', '48', '7', '7', '2021-03-11 20:19:05', '2021-03-11 20:19:05');
INSERT INTO `prescription_details` VALUES ('79', 'Panadol', 'លេប', '1', '1', '1', '1', '3', null, '1', '5', '49', '7', '7', '2021-03-11 20:30:33', '2021-03-11 20:30:33');
INSERT INTO `prescription_details` VALUES ('80', 'Exnadol', 'លេប', '1', '1', '1', '0', '2', null, '1', '6', '50', '7', '7', '2021-03-12 09:52:32', '2021-03-12 09:52:32');
INSERT INTO `prescription_details` VALUES ('81', 'AAAAAAAAAA', 'លេប', '1', '1', '1', '0', '5', null, '1', '7', '51', '7', '7', '2021-03-12 09:59:51', '2021-03-12 09:59:51');
INSERT INTO `prescription_details` VALUES ('82', 'Panadol', 'លេប', '1', '1', '1', '0', '5', null, '2', '5', '51', '7', '7', '2021-03-12 09:59:51', '2021-03-14 13:07:18');
INSERT INTO `prescription_details` VALUES ('83', 'Panadol', 'លេប', '1', '1', '1', '0', '2', null, '1', '5', '52', '7', '7', '2021-03-15 08:53:53', '2021-03-15 08:53:53');
INSERT INTO `prescription_details` VALUES ('84', 'Exnadol', 'លេប', '1', '0', '0', '1', '5', null, '1', '6', '53', '7', '7', '2021-03-15 10:29:25', '2021-03-15 10:29:25');
INSERT INTO `prescription_details` VALUES ('85', 'AAAAAAAAAA', 'លេប', '1', '1', '0', '1', '6', null, '2', '7', '53', '7', '7', '2021-03-15 10:29:25', '2021-03-15 10:29:25');
INSERT INTO `prescription_details` VALUES ('86', 'AAAAAAAAAA', 'លេប', '1', '1', '1', '0', '5', null, '1', '7', '54', '7', '7', '2021-03-16 14:12:46', '2021-03-16 14:12:46');
INSERT INTO `prescription_details` VALUES ('87', 'Panadol', 'លេប', '2', '2', '2', '0', '3', null, '1', '5', '55', '7', '7', '2021-03-16 15:40:00', '2021-03-16 15:40:00');
INSERT INTO `prescription_details` VALUES ('88', 'Exnadol', 'លេប', '1', '1', '1', '0', '4', null, '1', '6', '56', '7', '7', '2021-03-16 15:44:53', '2021-03-16 15:44:53');
INSERT INTO `prescription_details` VALUES ('89', 'Exnadol', 'លេប', '1', '0', '1', '0', '6', null, '1', '6', '57', '7', '7', '2021-03-16 15:55:04', '2021-03-16 15:55:04');
INSERT INTO `prescription_details` VALUES ('90', 'Exnadol', 'លេប', '1', '1', '1', '0', '5', null, '1', '6', '58', '7', '7', '2021-03-17 11:30:22', '2021-03-17 11:30:22');

-- ----------------------------
-- Table structure for `provinces`
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of provinces
-- ----------------------------
INSERT INTO `provinces` VALUES ('1', 'បន្ទាយមានជ័យ', 'Banteay Meanchey', null, null);
INSERT INTO `provinces` VALUES ('2', 'បាត់ដំបង', 'Battambang', null, null);
INSERT INTO `provinces` VALUES ('3', 'កំពង់ចាម', 'Kampong Cham', null, null);
INSERT INTO `provinces` VALUES ('4', 'កំពង់ឆ្នាំង', 'Kampong Chhnang', null, null);
INSERT INTO `provinces` VALUES ('5', 'កំពង់ស្ពឺ', 'Kampong Speu', null, null);
INSERT INTO `provinces` VALUES ('6', 'កំពង់ធំ', 'Kampong Thom', null, null);
INSERT INTO `provinces` VALUES ('7', 'កំពត', 'Kampot', null, null);
INSERT INTO `provinces` VALUES ('8', 'កណ្ដាល', 'Kandal', null, null);
INSERT INTO `provinces` VALUES ('9', 'កោះកុង', 'Koh Kong', null, null);
INSERT INTO `provinces` VALUES ('10', 'ក្រចេះ', 'Kratie', null, null);
INSERT INTO `provinces` VALUES ('11', 'មណ្ឌលគិរី', 'Mondul Kiri', null, null);
INSERT INTO `provinces` VALUES ('12', 'ភ្នំពេញ', 'Phnom Penh', null, null);
INSERT INTO `provinces` VALUES ('13', 'ព្រះវិហារ', 'Preah Vihear', null, null);
INSERT INTO `provinces` VALUES ('14', 'ព្រៃវែង', 'Prey Veng', null, null);
INSERT INTO `provinces` VALUES ('15', 'ពោធិ៍សាត់', 'Pursat', null, null);
INSERT INTO `provinces` VALUES ('16', 'រតនគិរី', 'Ratanak', null, null);
INSERT INTO `provinces` VALUES ('17', 'សៀមរាប', 'Siemreap', null, null);
INSERT INTO `provinces` VALUES ('18', 'ព្រះសីហនុ', 'Preah Sihanouk', null, null);
INSERT INTO `provinces` VALUES ('19', 'ស្ទឹងត្រែង', 'Stung Treng', null, null);
INSERT INTO `provinces` VALUES ('20', 'ស្វាយរៀង', 'Svay Rieng', null, null);
INSERT INTO `provinces` VALUES ('21', 'តាកែវ', 'Takeo', null, null);
INSERT INTO `provinces` VALUES ('22', 'ឧត្ដរមានជ័យ', 'Oddar Meanchey', null, null);
INSERT INTO `provinces` VALUES ('23', 'កែប', 'Kep', null, null);
INSERT INTO `provinces` VALUES ('24', 'ប៉ៃលិន', 'Pailin', null, null);
INSERT INTO `provinces` VALUES ('25', 'ត្បូងឃ្មុំ', 'Tboung Khmum', null, null);

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Dev Admin', 'web', 'Power Administrator or Super Administrator is the highest admin that has all right to CRUD or coding to change everything', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `roles` VALUES ('2', 'Admin', 'web', 'Administrator is a no normal admin.', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `roles` VALUES ('3', 'User', 'web', 'User with no right', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `roles` VALUES ('4', 'Receptionist', 'web', 'Teacher', '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `roles` VALUES ('5', 'OUT PRENG CLINIC', 'web', null, '2021-03-10 19:31:31', '2021-03-10 19:31:31');
INSERT INTO `roles` VALUES ('6', 'THAI SOKLEN CLINIC', 'web', null, '2021-03-10 19:31:45', '2021-03-10 19:31:45');

-- ----------------------------
-- Table structure for `role_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES ('1', '1');
INSERT INTO `role_has_permissions` VALUES ('2', '1');
INSERT INTO `role_has_permissions` VALUES ('3', '1');
INSERT INTO `role_has_permissions` VALUES ('4', '1');
INSERT INTO `role_has_permissions` VALUES ('5', '1');
INSERT INTO `role_has_permissions` VALUES ('6', '1');
INSERT INTO `role_has_permissions` VALUES ('7', '1');
INSERT INTO `role_has_permissions` VALUES ('8', '1');
INSERT INTO `role_has_permissions` VALUES ('9', '1');
INSERT INTO `role_has_permissions` VALUES ('10', '1');
INSERT INTO `role_has_permissions` VALUES ('11', '1');
INSERT INTO `role_has_permissions` VALUES ('12', '1');
INSERT INTO `role_has_permissions` VALUES ('13', '1');
INSERT INTO `role_has_permissions` VALUES ('14', '1');
INSERT INTO `role_has_permissions` VALUES ('15', '1');
INSERT INTO `role_has_permissions` VALUES ('16', '1');
INSERT INTO `role_has_permissions` VALUES ('17', '1');
INSERT INTO `role_has_permissions` VALUES ('18', '1');
INSERT INTO `role_has_permissions` VALUES ('19', '1');
INSERT INTO `role_has_permissions` VALUES ('20', '1');
INSERT INTO `role_has_permissions` VALUES ('21', '1');
INSERT INTO `role_has_permissions` VALUES ('22', '1');
INSERT INTO `role_has_permissions` VALUES ('23', '1');
INSERT INTO `role_has_permissions` VALUES ('24', '1');
INSERT INTO `role_has_permissions` VALUES ('25', '1');
INSERT INTO `role_has_permissions` VALUES ('26', '1');
INSERT INTO `role_has_permissions` VALUES ('27', '1');
INSERT INTO `role_has_permissions` VALUES ('28', '1');
INSERT INTO `role_has_permissions` VALUES ('29', '1');
INSERT INTO `role_has_permissions` VALUES ('30', '1');
INSERT INTO `role_has_permissions` VALUES ('31', '1');
INSERT INTO `role_has_permissions` VALUES ('32', '1');
INSERT INTO `role_has_permissions` VALUES ('33', '1');
INSERT INTO `role_has_permissions` VALUES ('34', '1');
INSERT INTO `role_has_permissions` VALUES ('35', '1');
INSERT INTO `role_has_permissions` VALUES ('36', '1');
INSERT INTO `role_has_permissions` VALUES ('37', '1');
INSERT INTO `role_has_permissions` VALUES ('38', '1');
INSERT INTO `role_has_permissions` VALUES ('39', '1');
INSERT INTO `role_has_permissions` VALUES ('40', '1');
INSERT INTO `role_has_permissions` VALUES ('41', '1');
INSERT INTO `role_has_permissions` VALUES ('42', '1');
INSERT INTO `role_has_permissions` VALUES ('43', '1');
INSERT INTO `role_has_permissions` VALUES ('44', '1');
INSERT INTO `role_has_permissions` VALUES ('45', '1');
INSERT INTO `role_has_permissions` VALUES ('46', '1');
INSERT INTO `role_has_permissions` VALUES ('47', '1');
INSERT INTO `role_has_permissions` VALUES ('48', '1');
INSERT INTO `role_has_permissions` VALUES ('49', '1');
INSERT INTO `role_has_permissions` VALUES ('50', '1');
INSERT INTO `role_has_permissions` VALUES ('51', '1');
INSERT INTO `role_has_permissions` VALUES ('52', '1');
INSERT INTO `role_has_permissions` VALUES ('53', '1');
INSERT INTO `role_has_permissions` VALUES ('54', '1');
INSERT INTO `role_has_permissions` VALUES ('55', '1');
INSERT INTO `role_has_permissions` VALUES ('56', '1');
INSERT INTO `role_has_permissions` VALUES ('57', '1');
INSERT INTO `role_has_permissions` VALUES ('58', '1');
INSERT INTO `role_has_permissions` VALUES ('59', '1');
INSERT INTO `role_has_permissions` VALUES ('60', '1');
INSERT INTO `role_has_permissions` VALUES ('61', '1');
INSERT INTO `role_has_permissions` VALUES ('62', '1');
INSERT INTO `role_has_permissions` VALUES ('63', '1');
INSERT INTO `role_has_permissions` VALUES ('64', '1');
INSERT INTO `role_has_permissions` VALUES ('65', '1');
INSERT INTO `role_has_permissions` VALUES ('66', '1');
INSERT INTO `role_has_permissions` VALUES ('67', '1');
INSERT INTO `role_has_permissions` VALUES ('68', '1');
INSERT INTO `role_has_permissions` VALUES ('69', '1');
INSERT INTO `role_has_permissions` VALUES ('70', '1');
INSERT INTO `role_has_permissions` VALUES ('71', '1');
INSERT INTO `role_has_permissions` VALUES ('72', '1');
INSERT INTO `role_has_permissions` VALUES ('73', '1');
INSERT INTO `role_has_permissions` VALUES ('74', '1');
INSERT INTO `role_has_permissions` VALUES ('75', '1');
INSERT INTO `role_has_permissions` VALUES ('76', '1');
INSERT INTO `role_has_permissions` VALUES ('82', '1');
INSERT INTO `role_has_permissions` VALUES ('83', '1');
INSERT INTO `role_has_permissions` VALUES ('84', '1');
INSERT INTO `role_has_permissions` VALUES ('85', '1');
INSERT INTO `role_has_permissions` VALUES ('86', '1');
INSERT INTO `role_has_permissions` VALUES ('87', '1');
INSERT INTO `role_has_permissions` VALUES ('88', '1');
INSERT INTO `role_has_permissions` VALUES ('89', '1');
INSERT INTO `role_has_permissions` VALUES ('90', '1');
INSERT INTO `role_has_permissions` VALUES ('91', '1');
INSERT INTO `role_has_permissions` VALUES ('92', '1');
INSERT INTO `role_has_permissions` VALUES ('1', '2');
INSERT INTO `role_has_permissions` VALUES ('2', '2');
INSERT INTO `role_has_permissions` VALUES ('3', '2');
INSERT INTO `role_has_permissions` VALUES ('4', '2');
INSERT INTO `role_has_permissions` VALUES ('5', '2');
INSERT INTO `role_has_permissions` VALUES ('13', '2');
INSERT INTO `role_has_permissions` VALUES ('14', '2');
INSERT INTO `role_has_permissions` VALUES ('15', '2');
INSERT INTO `role_has_permissions` VALUES ('16', '2');
INSERT INTO `role_has_permissions` VALUES ('17', '2');
INSERT INTO `role_has_permissions` VALUES ('19', '2');
INSERT INTO `role_has_permissions` VALUES ('20', '2');
INSERT INTO `role_has_permissions` VALUES ('21', '2');
INSERT INTO `role_has_permissions` VALUES ('22', '2');
INSERT INTO `role_has_permissions` VALUES ('23', '2');
INSERT INTO `role_has_permissions` VALUES ('24', '2');
INSERT INTO `role_has_permissions` VALUES ('25', '2');
INSERT INTO `role_has_permissions` VALUES ('26', '2');
INSERT INTO `role_has_permissions` VALUES ('27', '2');
INSERT INTO `role_has_permissions` VALUES ('28', '2');
INSERT INTO `role_has_permissions` VALUES ('29', '2');
INSERT INTO `role_has_permissions` VALUES ('30', '2');
INSERT INTO `role_has_permissions` VALUES ('31', '2');
INSERT INTO `role_has_permissions` VALUES ('32', '2');
INSERT INTO `role_has_permissions` VALUES ('33', '2');
INSERT INTO `role_has_permissions` VALUES ('34', '2');
INSERT INTO `role_has_permissions` VALUES ('35', '2');
INSERT INTO `role_has_permissions` VALUES ('41', '2');
INSERT INTO `role_has_permissions` VALUES ('42', '2');
INSERT INTO `role_has_permissions` VALUES ('43', '2');
INSERT INTO `role_has_permissions` VALUES ('44', '2');
INSERT INTO `role_has_permissions` VALUES ('45', '2');
INSERT INTO `role_has_permissions` VALUES ('46', '2');
INSERT INTO `role_has_permissions` VALUES ('47', '2');
INSERT INTO `role_has_permissions` VALUES ('48', '2');
INSERT INTO `role_has_permissions` VALUES ('49', '2');
INSERT INTO `role_has_permissions` VALUES ('50', '2');
INSERT INTO `role_has_permissions` VALUES ('51', '2');
INSERT INTO `role_has_permissions` VALUES ('52', '2');
INSERT INTO `role_has_permissions` VALUES ('53', '2');
INSERT INTO `role_has_permissions` VALUES ('54', '2');
INSERT INTO `role_has_permissions` VALUES ('55', '2');
INSERT INTO `role_has_permissions` VALUES ('56', '2');
INSERT INTO `role_has_permissions` VALUES ('57', '2');
INSERT INTO `role_has_permissions` VALUES ('58', '2');
INSERT INTO `role_has_permissions` VALUES ('59', '2');
INSERT INTO `role_has_permissions` VALUES ('60', '2');
INSERT INTO `role_has_permissions` VALUES ('61', '2');
INSERT INTO `role_has_permissions` VALUES ('62', '2');
INSERT INTO `role_has_permissions` VALUES ('63', '2');
INSERT INTO `role_has_permissions` VALUES ('73', '2');
INSERT INTO `role_has_permissions` VALUES ('74', '2');
INSERT INTO `role_has_permissions` VALUES ('75', '2');
INSERT INTO `role_has_permissions` VALUES ('76', '2');
INSERT INTO `role_has_permissions` VALUES ('82', '2');
INSERT INTO `role_has_permissions` VALUES ('83', '2');
INSERT INTO `role_has_permissions` VALUES ('84', '2');
INSERT INTO `role_has_permissions` VALUES ('85', '2');
INSERT INTO `role_has_permissions` VALUES ('86', '2');
INSERT INTO `role_has_permissions` VALUES ('87', '2');
INSERT INTO `role_has_permissions` VALUES ('92', '2');
INSERT INTO `role_has_permissions` VALUES ('28', '5');
INSERT INTO `role_has_permissions` VALUES ('29', '5');
INSERT INTO `role_has_permissions` VALUES ('30', '5');
INSERT INTO `role_has_permissions` VALUES ('31', '5');
INSERT INTO `role_has_permissions` VALUES ('32', '5');
INSERT INTO `role_has_permissions` VALUES ('33', '5');
INSERT INTO `role_has_permissions` VALUES ('34', '5');
INSERT INTO `role_has_permissions` VALUES ('35', '5');
INSERT INTO `role_has_permissions` VALUES ('41', '5');
INSERT INTO `role_has_permissions` VALUES ('42', '5');
INSERT INTO `role_has_permissions` VALUES ('43', '5');
INSERT INTO `role_has_permissions` VALUES ('44', '5');
INSERT INTO `role_has_permissions` VALUES ('45', '5');
INSERT INTO `role_has_permissions` VALUES ('46', '5');
INSERT INTO `role_has_permissions` VALUES ('47', '5');
INSERT INTO `role_has_permissions` VALUES ('48', '5');
INSERT INTO `role_has_permissions` VALUES ('49', '5');
INSERT INTO `role_has_permissions` VALUES ('50', '5');
INSERT INTO `role_has_permissions` VALUES ('51', '5');
INSERT INTO `role_has_permissions` VALUES ('52', '5');
INSERT INTO `role_has_permissions` VALUES ('53', '5');
INSERT INTO `role_has_permissions` VALUES ('54', '5');
INSERT INTO `role_has_permissions` VALUES ('55', '5');
INSERT INTO `role_has_permissions` VALUES ('56', '5');
INSERT INTO `role_has_permissions` VALUES ('57', '5');
INSERT INTO `role_has_permissions` VALUES ('58', '5');
INSERT INTO `role_has_permissions` VALUES ('59', '5');
INSERT INTO `role_has_permissions` VALUES ('60', '5');
INSERT INTO `role_has_permissions` VALUES ('61', '5');
INSERT INTO `role_has_permissions` VALUES ('62', '5');
INSERT INTO `role_has_permissions` VALUES ('68', '5');
INSERT INTO `role_has_permissions` VALUES ('69', '5');
INSERT INTO `role_has_permissions` VALUES ('70', '5');
INSERT INTO `role_has_permissions` VALUES ('71', '5');
INSERT INTO `role_has_permissions` VALUES ('72', '5');
INSERT INTO `role_has_permissions` VALUES ('28', '6');
INSERT INTO `role_has_permissions` VALUES ('29', '6');
INSERT INTO `role_has_permissions` VALUES ('30', '6');
INSERT INTO `role_has_permissions` VALUES ('31', '6');
INSERT INTO `role_has_permissions` VALUES ('32', '6');
INSERT INTO `role_has_permissions` VALUES ('33', '6');
INSERT INTO `role_has_permissions` VALUES ('34', '6');
INSERT INTO `role_has_permissions` VALUES ('35', '6');
INSERT INTO `role_has_permissions` VALUES ('41', '6');
INSERT INTO `role_has_permissions` VALUES ('42', '6');
INSERT INTO `role_has_permissions` VALUES ('43', '6');
INSERT INTO `role_has_permissions` VALUES ('44', '6');
INSERT INTO `role_has_permissions` VALUES ('45', '6');
INSERT INTO `role_has_permissions` VALUES ('46', '6');
INSERT INTO `role_has_permissions` VALUES ('47', '6');
INSERT INTO `role_has_permissions` VALUES ('48', '6');
INSERT INTO `role_has_permissions` VALUES ('49', '6');
INSERT INTO `role_has_permissions` VALUES ('50', '6');
INSERT INTO `role_has_permissions` VALUES ('51', '6');
INSERT INTO `role_has_permissions` VALUES ('52', '6');
INSERT INTO `role_has_permissions` VALUES ('53', '6');
INSERT INTO `role_has_permissions` VALUES ('54', '6');
INSERT INTO `role_has_permissions` VALUES ('55', '6');
INSERT INTO `role_has_permissions` VALUES ('56', '6');
INSERT INTO `role_has_permissions` VALUES ('57', '6');
INSERT INTO `role_has_permissions` VALUES ('58', '6');
INSERT INTO `role_has_permissions` VALUES ('59', '6');
INSERT INTO `role_has_permissions` VALUES ('60', '6');
INSERT INTO `role_has_permissions` VALUES ('61', '6');
INSERT INTO `role_has_permissions` VALUES ('62', '6');
INSERT INTO `role_has_permissions` VALUES ('63', '6');
INSERT INTO `role_has_permissions` VALUES ('73', '6');
INSERT INTO `role_has_permissions` VALUES ('74', '6');
INSERT INTO `role_has_permissions` VALUES ('75', '6');
INSERT INTO `role_has_permissions` VALUES ('76', '6');
INSERT INTO `role_has_permissions` VALUES ('82', '6');
INSERT INTO `role_has_permissions` VALUES ('83', '6');
INSERT INTO `role_has_permissions` VALUES ('84', '6');
INSERT INTO `role_has_permissions` VALUES ('85', '6');
INSERT INTO `role_has_permissions` VALUES ('86', '6');
INSERT INTO `role_has_permissions` VALUES ('87', '6');
INSERT INTO `role_has_permissions` VALUES ('88', '6');
INSERT INTO `role_has_permissions` VALUES ('89', '6');
INSERT INTO `role_has_permissions` VALUES ('90', '6');
INSERT INTO `role_has_permissions` VALUES ('91', '6');
INSERT INTO `role_has_permissions` VALUES ('92', '6');

-- ----------------------------
-- Table structure for `services`
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `is_labor` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` bigint unsigned NOT NULL,
  `updated_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_created_by_foreign` (`created_by`),
  KEY `services_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', 'Echo', '20', '0', 'asdf', '1', '1', '2021-01-30 07:55:33', '2021-01-30 07:55:33');
INSERT INTO `services` VALUES ('2', 'Consulting', '10', '0', null, '1', '1', '2021-01-30 07:55:53', '2021-01-30 07:55:53');
INSERT INTO `services` VALUES ('3', 'Medicine', '0', '0', null, '1', '1', '2021-01-30 07:56:09', '2021-01-30 07:56:09');
INSERT INTO `services` VALUES ('10', 'ពិគ្រោះជម្ងឺ', '15', '0', 'ពិគ្រោះជម្ងឺ ទូទៅ', '2', '2', '2021-02-11 05:23:21', '2021-02-11 05:23:21');
INSERT INTO `services` VALUES ('14', 'តេស្ដឈាម', '30', '0', null, '2', '2', '2021-02-13 11:01:54', '2021-02-13 11:01:54');

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('6jJmD1EDIJidA4ozHa1Idp3JkjkkHf2CUwg9ZCgK', null, '10.102.191.252', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDNGQUl6WTVxenZZN0llaENibWJoZjVGSU9Fb0lpaUFzRGRSRGxUciI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL2Jzcy1jbGluaWMuaGVyb2t1YXBwLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', '1616755653');
INSERT INTO `sessions` VALUES ('M0JCSRvIDg4GRHFUw7Me2lbgf6nqWhorL3zBUWeZ', '1', '10.35.254.83', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMDBwMUIzZEphaXpRNTNVdjVPa3lQT3Q2M3BycUVZbXc3Y1VyRm02ViI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vYnNzLWNsaW5pYy5oZXJva3VhcHAuY29tL2ludm9pY2UvMjMvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', '1616680570');
INSERT INTO `sessions` VALUES ('R56MpzxfMtRAWyeWECbRjBix8S4Tjj1oqowI6Y6q', '1', '10.7.244.15', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ1JKWE5xam12UmZodUhEQ0R3akh4ZVhuRHRGTVNKNk10OWRiQU95NyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vYnNzLWNsaW5pYy5oZXJva3VhcHAuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', '1616764269');

-- ----------------------------
-- Table structure for `setting`
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_name_kh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `clinic_name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_name_kh` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `echo_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `echo_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `navbar_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'navbar-white navbar-light',
  `sidebar_color` tinyint(1) NOT NULL DEFAULT '0',
  `legacy` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'logo.png', 'បន្ទប់ពិគ្រោះព្យាបាលជំងឺ ប៉ោ រដ្ឋា', 'POR RATHA CABINET', 'ប៉ោ រដ្ឋា', 'POROTHA', '097 21 111 01 / 067 53 33 37', 'ភូមិស្រែប្រាំង ឃុំតាប្រុក ស្រុកចំការលើ ខេត្តកំពង់ចាម', '<div style=\"padding-bottom: 6px;\">ពិនិត្យ និងទទួលព្យាបាលជម្ងឺទូទៅលើ កុមារ មនុស្សចាស់  ពិនិត្យឈាម ចាក់វ៉ាក់សាំងឆ្កែឆ្កួត តេតាណូស</div>\r\n<div>វ៉ាក់សាំងថ្លើម និង ពិនិត្យអេកូពណ៌ 4D</div>', 'blank', 'blank', 'navbar-white navbar-light', '0', '1', null, '2021-03-23 22:19:31');

-- ----------------------------
-- Table structure for `usages`
-- ----------------------------
DROP TABLE IF EXISTS `usages`;
CREATE TABLE `usages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of usages
-- ----------------------------
INSERT INTO `usages` VALUES ('1', 'លេប', 'លេបចូលក្នុងខ្លួន', '2021-01-30 07:46:33', '2021-01-30 07:46:33');
INSERT INTO `usages` VALUES ('2', 'ចាក់', '', '2021-01-30 07:46:33', '2021-01-30 07:46:33');
INSERT INTO `usages` VALUES ('3', 'បន្ទក់', '', '2021-01-30 07:46:33', '2021-01-30 07:46:33');
INSERT INTO `usages` VALUES ('4', 'លាយទឹក', '', '2021-01-30 07:46:33', '2021-01-30 07:46:33');
INSERT INTO `usages` VALUES ('5', 'លាប', '', '2021-01-30 07:46:33', '2021-01-30 07:46:33');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_user.png',
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kh',
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `approval` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Web', 'Dev', 'web@dev.com', '$2y$10$t8QOzY6vEWArgzqEwGaj/etY/o09UHqwyFYw5K3eJogQbRFQkt6Xi', 'default_user.png', '0', 'kh', '1', '1', '1', null, null, '2021-01-30 07:46:32', '2021-01-30 07:46:32');
INSERT INTO `users` VALUES ('2', 'asdf', 'asdf', 'admin@clinic.com', '$2y$10$qey/hE4InCypbDqMA9xjNemeX3yu8.FyaFWSS9meuAsGUcjuFHBja', 'default_user.png', null, 'kh', '1', '1', '0', null, null, '2021-02-07 02:10:08', '2021-02-07 02:10:08');
INSERT INTO `users` VALUES ('3', 'buntheng', 'dev', 'buntheng@dev.com', '$2y$10$GhTLWAWhpjLn3GdEEzpXGOH0KQDgIyR6rpI8bQCv3HR3ixHmjCiYq', 'default_user.png', null, 'kh', '1', '1', '0', null, null, '2021-02-10 16:46:31', '2021-02-10 16:46:31');
INSERT INTO `users` VALUES ('4', 'cheantha', 'dev', 'cheatha@dev.com', '$2y$10$IQWIXJZzpg6flgBixkXiMuQt3sJHG/HHaeV0gVx1ZtLoYryib3G46', 'default_user.png', null, 'kh', '1', '1', '0', null, null, '2021-02-10 16:47:05', '2021-02-10 16:47:05');
INSERT INTO `users` VALUES ('5', 'Mr.', 'ABC', 'cashier@clinic.com', '$2y$10$Gmq0QHhsRTZ0/t6Wv2EsAOcY97Z6h/z/nspCehfL5fhgcImzO5sbG', 'default_user.png', null, 'kh', '1', '1', '0', null, null, '2021-02-13 11:18:02', '2021-02-13 11:18:02');
INSERT INTO `users` VALUES ('6', 'អ៊ុត', 'ព្រង', 'outpreng@clinic.com', '$2y$10$SvNaMGf8IgGH.uQCxMRel.eJ2WSGXB8wEx.rEoc8IUYAJH0FFAbhu', 'default_user.png', '012 792 243 / 088 453 0077', 'kh', '1', '1', '0', null, null, '2021-03-10 19:23:13', '2021-03-10 19:23:13');
INSERT INTO `users` VALUES ('7', 'ថៃ', 'សុខឡែន', 'thaisoklen@clinic.com', '$2y$10$TqlrmI.l9ITawVdUfdd2deJY9gCjEyocRKNHIBZHlw5y2MlLfCnKi', 'default_user.png', '012 68 12 38', 'kh', '1', '1', '0', null, null, '2021-03-10 19:28:00', '2021-03-11 18:29:46');
