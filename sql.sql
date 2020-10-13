-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for royaldoc
DROP DATABASE IF EXISTS `royaldoc`;
CREATE DATABASE IF NOT EXISTS `royaldoc` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `royaldoc`;

-- Dumping structure for table royaldoc.auth_assignment
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `royalsk`.`auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table royaldoc.auth_assignment: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

-- Dumping structure for table royaldoc.auth_item
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` mediumtext DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  KEY `rule_name` (`rule_name`) USING BTREE,
  KEY `type` (`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `royalsk`.`auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table royaldoc.auth_item: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

-- Dumping structure for table royaldoc.auth_item_child
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`) USING BTREE,
  KEY `child` (`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `royalsk`.`auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `royalsk`.`auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table royaldoc.auth_item_child: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

-- Dumping structure for table royaldoc.auth_rule
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` mediumtext DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table royaldoc.auth_rule: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- Dumping structure for table royaldoc.country
DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `country_code` varchar(50) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `international_dialing` varchar(50) DEFAULT NULL,
  `active` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`country_code`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table royaldoc.country: ~245 rows (approximately)
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
REPLACE INTO `country` (`country_code`, `country_name`, `international_dialing`, `active`) VALUES
	('AD', 'Andorra, Principality of ', '+376', ''),
	('AE', 'United Arab Emirates (UAE) (Former Trucial Oman, Trucial States)', '+971', ''),
	('AF', 'Afghanistan ', '+93', ''),
	('AG', 'Antigua and Barbuda', '+1-268', ''),
	('AI', 'Anguilla ', '+1-264', ''),
	('AL', 'Albania ', '+355', ''),
	('AM', 'Armenia', '+374', ''),
	('AN', 'Netherlands Antilles (Former Curacao and Dependencies)', '+599', ''),
	('AO', 'Angola', '+244', ''),
	('AQ', 'Antarctica', '+672', ''),
	('AR', 'Argentina ', '+54', ''),
	('AS', 'American Samoa', '+1-684', ''),
	('AT', 'Austria', '+43', ''),
	('AU', 'Australia', '+61', ''),
	('AW', 'Aruba', '+297', ''),
	('AZ', 'Azerbaijan or Azerbaidjan (Former Azerbaijan Soviet Socialist Republic)', '+994', ''),
	('BA', 'Bosnia and Herzegovina ', '+387', ''),
	('BB', 'Barbados ', '+1-246', ''),
	('BD', 'Bangladesh (Former East Pakistan)', '+880', ''),
	('BE', 'Belgium ', '+32', ''),
	('BF', 'Burkina Faso (Former Upper Volta)', '+226', ''),
	('BG', 'Bulgaria ', '+359', ''),
	('BH', 'Bahrain, Kingdom of (Former Dilmun)', '+973', ''),
	('BI', 'Burundi (Former Urundi)', '+257', ''),
	('BJ', 'Benin (Former Dahomey)', '+229', ''),
	('BM', 'Bermuda ', '+1-441', ''),
	('BN', 'Brunei (Negara Brunei Darussalam) ', '+673', ''),
	('BO', 'Bolivia ', '+591', ''),
	('BR', 'Brazil ', '+55', ''),
	('BS', 'Bahamas, Commonwealth of The', '+1-242', ''),
	('BT', 'Bhutan, Kingdom of', '+975', ''),
	('BV', 'Bouvet Island (Territory of Norway)', '', ''),
	('BW', 'Botswana (Former Bechuanaland)', '+267', ''),
	('BY', 'Belarus (Former Belorussian [Byelorussian] Soviet Socialist Republic)', '+375', ''),
	('BZ', 'Belize (Former British Honduras)', '+501', ''),
	('CA', 'Canada ', '+1', ''),
	('CC', 'Cocos (Keeling) Islands ', '+61', ''),
	('CD', 'Congo, Democratic Republic of the (Former Zaire) ', '+243', ''),
	('CF', 'Central African Republic ', '+236', ''),
	('CG', 'Congo, Republic of the', '+242', ''),
	('CH', 'Switzerland ', '+41', ''),
	('CI', 'Cote D\'Ivoire (Former Ivory Coast) ', '+225', ''),
	('CK', 'Cook Islands (Former Harvey Islands)', '+682', ''),
	('CL', 'Chile ', '+56', ''),
	('CM', 'Cameroon (Former French Cameroon)', '+237', ''),
	('CN', 'China ', '+86', ''),
	('CO', 'Colombia ', '+57', ''),
	('country_code', 'country_name', 'international_dialing', 'active'),
	('CR', 'Costa Rica ', '+506', ''),
	('CS', 'Czechoslavakia (Former) See CZ Czech Republic or Slovakia', '', ''),
	('CU', 'Cuba ', '+53', ''),
	('CV', 'Cape Verde ', '+238', ''),
	('CX', 'Christmas Island ', '+53', ''),
	('CY', 'Cyprus ', '+357', ''),
	('CZ', 'Czech Republic', '+420', ''),
	('DE', 'Germany ', '+49', ''),
	('DJ', 'Djibouti (Former French Territory of the Afars and Issas, French Somaliland)', '+253', ''),
	('DK', 'Denmark ', '+45', ''),
	('DM', 'Dominica ', '+1-767', ''),
	('DO', 'Dominican Republic ', '+1-809 and +1-829? ', ''),
	('DZ', 'Algeria ', '+213', ''),
	('EC', 'Ecuador ', '+593 ', ''),
	('EE', 'Estonia (Former Estonian Soviet Socialist Republic)', '+372', ''),
	('EG', 'Egypt (Former United Arab Republic - with Syria)', '+20', ''),
	('EH', 'Western Sahara (Former Spanish Sahara)', '', ''),
	('ER', 'Eritrea (Former Eritrea Autonomous Region in Ethiopia)', '+291', ''),
	('ES', 'Spain ', '+34', ''),
	('ET', 'Ethiopia (Former Abyssinia, Italian East Africa)', '+251', ''),
	('FI', 'Finland ', '+358', ''),
	('FJ', 'Fiji ', '+679', ''),
	('FK', 'Falkland Islands (Islas Malvinas) ', '+500', ''),
	('FM', 'Micronesia, Federated States of (Former Ponape, Truk, and Yap Districts - Trust Territory of the Pacific Islands)', '+691', ''),
	('FO', 'Faroe Islands ', '+298', ''),
	('FR', 'France ', '+33', ''),
	('GA', 'Gabon (Gabonese Republic)', '+241', ''),
	('GB', 'Great Britain (United Kingdom) ', '+44', ''),
	('GD', 'Grenada ', '+1-473', ''),
	('GE', 'Georgia (Former Georgian Soviet Socialist Republic)', '+995', ''),
	('GF', 'French Guiana or French Guyana ', '+594', ''),
	('GH', 'Ghana (Former Gold Coast)', '+233', ''),
	('GI', 'Gibraltar ', '+350', ''),
	('GL', 'Greenland ', '+299', ''),
	('GM', 'Gambia, The ', '+220', ''),
	('GN', 'Guinea (Former French Guinea)', '+224', ''),
	('GP', 'Guadeloupe', '+590', ''),
	('GQ', 'Equatorial Guinea (Former Spanish Guinea)', '+240', ''),
	('GR', 'Greece ', '+30', ''),
	('GS', 'South Georgia and the South Sandwich Islands', '', ''),
	('GT', 'Guatemala ', '+502', ''),
	('GU', 'Guam', '+1-671', ''),
	('GW', 'Guinea-Bissau (Former Portuguese Guinea)', '+245', ''),
	('GY', 'Guyana (Former British Guiana)', '+592', ''),
	('HK', 'Hong Kong ', '+852', ''),
	('HM', 'Heard Island and McDonald Islands (Territory of Australia)', '', ''),
	('HN', 'Honduras ', '+504', ''),
	('HR', 'Croatia (Hrvatska) ', '+385', ''),
	('HT', 'Haiti ', '+509', ''),
	('HU', 'Hungary ', '+36', ''),
	('ID', 'Indonesia (Former Netherlands East Indies; Dutch East Indies)', '+62', ''),
	('IE', 'Ireland ', '+353', ''),
	('IL', 'Israel ', '+972', ''),
	('IN', 'India ', '+91', ''),
	('IO', 'British Indian Ocean Territory (BIOT)', '', ''),
	('IQ', 'Iraq ', '+964', ''),
	('IR', 'Iran, Islamic Republic of', '+98', ''),
	('IS', 'Iceland ', '+354', ''),
	('IT', 'Italy ', '+39', ''),
	('JM', 'Jamaica ', '+1-876', ''),
	('JO', 'Jordan (Former Transjordan)', '+962', ''),
	('JP', 'Japan ', '+81', ''),
	('KE', 'Kenya (Former British East Africa)', '+254', ''),
	('KG', 'Kyrgyzstan (Kyrgyz Republic) (Former Kirghiz Soviet Socialist Republic)', '+996', ''),
	('KH', 'Cambodia, Kingdom of (Former Khmer Republic, Kampuchea Republic)', '+855', ''),
	('KI', 'Kiribati (Pronounced keer-ree-bahss) (Former Gilbert Islands)', '+686', ''),
	('KM', 'Comoros, Union of the ', '+269', ''),
	('KN', 'Saint Kitts and Nevis (Former Federation of Saint Christopher and Nevis)', '+1-869', ''),
	('KP', 'Korea, Democratic People\'s Republic of (North Korea)', '+850', ''),
	('KR', 'Korea, Republic of (South Korea) ', '+82', ''),
	('KW', 'Kuwait ', '+965', ''),
	('KY', 'Cayman Islands ', '+1-345', ''),
	('KZ', 'Kazakstan or Kazakhstan (Former Kazakh Soviet Socialist Republic)', '+7', ''),
	('LA', 'Lao People\'s Democratic Republic (Laos)', '+856', ''),
	('LB', 'Lebanon ', '+961', ''),
	('LC', 'Saint Lucia ', '+1-758', ''),
	('LI', 'Liechtenstein ', '+423', ''),
	('LK', 'Sri Lanka (Former Serendib, Ceylon) ', '+94', ''),
	('LR', 'Liberia ', '+231', ''),
	('LS', 'Lesotho (Former Basutoland)', '+266', ''),
	('LT', 'Lithuania (Former Lithuanian Soviet Socialist Republic)', '+370', ''),
	('LU', 'Luxembourg ', '+352', ''),
	('LV', 'Latvia (Former Latvian Soviet Socialist Republic)', '+371', ''),
	('LY', 'Libya (Libyan Arab Jamahiriya)', '+218', ''),
	('MA', 'Morocco ', '+212', ''),
	('MC', 'Monaco, Principality of', '+377', ''),
	('MD', 'Moldova, Republic of', '+373', ''),
	('MG', 'Madagascar (Former Malagasy Republic)', '+261', ''),
	('MH', 'Marshall Islands (Former Marshall Islands District - Trust Territory of the Pacific Islands)', '+692', ''),
	('MK', 'Macedonia, The Former Yugoslav Republic of', '+389', ''),
	('ML', 'Mali (Former French Sudan and Sudanese Republic) ', '+223', ''),
	('MM', 'Myanmar, Union of (Former Burma)', '+95', ''),
	('MN', 'Mongolia (Former Outer Mongolia)', '+976', ''),
	('MO', 'Macau ', '+853', ''),
	('MP', 'Northern Mariana Islands (Former Mariana Islands District - Trust Territory of the Pacific Islands)', '+1-670', ''),
	('MQ', 'Martinique (French) ', '+596', ''),
	('MR', 'Mauritania ', '+222', ''),
	('MS', 'Montserrat ', '+1-664', ''),
	('MT', 'Malta ', '+356', ''),
	('MU', 'Mauritius ', '+230', ''),
	('MV', 'Maldives ', '+960', ''),
	('MW', 'Malawi (Former British Central African Protectorate, Nyasaland)', '+265', ''),
	('MX', 'Mexico ', '+52', ''),
	('MY', 'Malaysia ', '+60', ''),
	('MZ', 'Mozambique (Former Portuguese East Africa)', '+258', ''),
	('NA', 'Namibia (Former German Southwest Africa, South-West Africa)', '+264', ''),
	('NC', 'New Caledonia ', '+687', ''),
	('NE', 'Niger ', '+227', ''),
	('NF', 'Norfolk Island ', '+672', ''),
	('NG', 'Nigeria ', '+234', ''),
	('NI', 'Nicaragua ', '+505', ''),
	('NL', 'Netherlands ', '+31', ''),
	('NO', 'Norway ', '+47', ''),
	('NP', 'Nepal ', '+977', ''),
	('NR', 'Nauru (Former Pleasant Island)', '+674', ''),
	('NU', 'Niue (Former Savage Island)', '+683', ''),
	('NZ', 'New Zealand (Aotearoa) ', '+64', ''),
	('OM', 'Oman, Sultanate of (Former Muscat and Oman)', '+968', ''),
	('PA', 'Panama ', '+507', ''),
	('PE', 'Peru ', '+51', ''),
	('PF', 'French Polynesia (Former French Colony of Oceania)', '+689', ''),
	('PG', 'Papua New Guinea (Former Territory of Papua and New Guinea)', '+675', ''),
	('PH', 'Philippines ', '+63', ''),
	('PK', 'Pakistan (Former West Pakistan)', '+92', ''),
	('PL', 'Poland ', '+48', 'x'),
	('PM', 'Saint Pierre and Miquelon ', '+508', ''),
	('PN', 'Pitcairn Island', '', ''),
	('PR', 'Puerto Rico ', '+1-787 or +1-939', ''),
	('PS', 'Palestinian State (Proposed)', '+970', ''),
	('PT', 'Portugal ', '+351', ''),
	('PW', 'Palau (Former Palau District - Trust Terriroty of the Pacific Islands)', '+680', ''),
	('PY', 'Paraguay ', '+595', ''),
	('QA', 'Qatar, State of ', '+974 ', ''),
	('RE', 'Reunion (French) (Former Bourbon Island)', '+262', ''),
	('RO', 'Romania ', '+40', ''),
	('RS', 'Serbia, Republic of', '', ''),
	('RU', 'Russian Federation ', '+7', ''),
	('RW', 'Rwanda (Rwandese Republic) (Former Ruanda)', '+250', ''),
	('SA', 'Saudi Arabia ', '+966', ''),
	('SB', 'Solomon Islands (Former British Solomon Islands)', '+677', ''),
	('SC', 'Seychelles ', '+248', ''),
	('SD', 'Sudan (Former Anglo-Egyptian Sudan) ', '+249', ''),
	('SE', 'Sweden ', '+46', ''),
	('SG', 'Singapore ', '+65', ''),
	('SH', 'Saint Helena ', '+290', ''),
	('SI', 'Slovenia ', '+386', ''),
	('SJ', 'Svalbard (Spitzbergen) and Jan Mayen Islands ', '', ''),
	('SK', 'Slovakia', '+421', ''),
	('SL', 'Sierra Leone ', '+232', ''),
	('SM', 'San Marino ', '+378', ''),
	('SN', 'Senegal ', '+221', ''),
	('SO', 'Somalia (Former Somali Republic, Somali Democratic Republic) ', '+252', ''),
	('SR', 'Suriname (Former Netherlands Guiana, Dutch Guiana)', '+597', ''),
	('ST', 'Sao Tome and Principe ', '+239', ''),
	('SU', 'Russia - USSR (Former Russian Empire, Union of Soviet Socialist Republics, Russian Soviet Federative Socialist Republic) Now RU - Russian Federation', '', ''),
	('SV', 'El Salvador ', '+503', ''),
	('SY', 'Syria (Syrian Arab Republic) (Former United Arab Republic - with Egypt)', '+963', ''),
	('SZ', 'Swaziland, Kingdom of ', '+268', ''),
	('TC', 'Turks and Caicos Islands ', '+1-649', ''),
	('TD', 'Chad ', '+235', ''),
	('TE', 'Tromelin Island ', '', ''),
	('TF', 'French Southern Territories and Antarctic Lands ', '', ''),
	('TG', 'Togo (Former French Togoland)', '', ''),
	('TH', 'Thailand (Former Siam)', '+66', ''),
	('TJ', 'Tajikistan (Former Tajik Soviet Socialist Republic)', '+992', ''),
	('TK', 'Tokelau ', '+690', ''),
	('TM', 'Turkmenistan (Former Turkmen Soviet Socialist Republic)', '+993', ''),
	('TN', 'Tunisia ', '+216', ''),
	('TO', 'Tonga, Kingdom of (Former Friendly Islands)', '+676', ''),
	('TP', 'East Timor (Former Portuguese Timor)', '+670', ''),
	('TR', 'Turkey ', '+90', ''),
	('TT', 'Trinidad and Tobago ', '+1-868', ''),
	('TV', 'Tuvalu (Former Ellice Islands)', '+688', ''),
	('TW', 'Taiwan (Former Formosa)', '+886', ''),
	('TZ', 'Tanzania, United Republic of (Former United Republic of Tanganyika and Zanzibar)', '+255', ''),
	('UA', 'Ukraine (Former Ukrainian National Republic, Ukrainian State, Ukrainian Soviet Socialist Republic)', '+380', ''),
	('UG', 'Uganda, Republic of', '+256', ''),
	('UM', 'United States Minor Outlying Islands ', '', ''),
	('US', 'United States ', '+1', ''),
	('UY', 'Uruguay, Oriental Republic of (Former Banda Oriental, Cisplatine Province)', '+598', ''),
	('UZ', 'Uzbekistan (Former UZbek Soviet Socialist Republic)', '+998', ''),
	('VA', 'Holy See (Vatican City State)', '', ''),
	('VC', 'Saint Vincent and the Grenadines ', '+1-784', ''),
	('VE', 'Venezuela ', '+58', ''),
	('VI', 'Virgin Islands, British ', '+1-284', ''),
	('VN', 'Vietnam ', '+84', ''),
	('VQ', 'Virgin Islands, United States (Former Danish West Indies) ', '+1-340', ''),
	('VU', 'Vanuatu (Former New Hebrides)', '+678', ''),
	('WF', 'Wallis and Futuna Islands ', '+681', ''),
	('WS', 'Samoa (Former Western Samoa)', '+685', ''),
	('YE', 'Yemen ', '+967', ''),
	('YT', 'Mayotte (Territorial Collectivity of Mayotte)', '+269', ''),
	('YU', 'Yugoslavia ', '', ''),
	('ZA', 'South Africa (Former Union of South Africa)', '+27', ''),
	('ZM', 'Zambia, Republic of (Former Northern Rhodesia) ', '+260', ''),
	('ZR', 'Zaire (Former Congo Free State, Belgian Congo, Congo/Leopoldville, Congo/Kinshasa, Zaire) Now CD - Congo, Democratic Republic of the ', '', ''),
	('ZW', 'Zimbabwe, Republic of (Former Southern Rhodesia, Rhodesia) ', '+263', '');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;

-- Dumping structure for table royaldoc.gender_copy
DROP TABLE IF EXISTS `gender_copy`;
CREATE TABLE IF NOT EXISTS `gender_copy` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table royaldoc.gender_copy: ~2 rows (approximately)
/*!40000 ALTER TABLE `gender_copy` DISABLE KEYS */;
REPLACE INTO `gender_copy` (`id`, `name`) VALUES
	('Nam', 'Nam'),
	('Nữ', 'Nữ');
/*!40000 ALTER TABLE `gender_copy` ENABLE KEYS */;

-- Dumping structure for table royaldoc.register_copy
DROP TABLE IF EXISTS `register_copy`;
CREATE TABLE IF NOT EXISTS `register_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(512) DEFAULT '0',
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `street` varchar(512) DEFAULT NULL,
  `city` varchar(512) DEFAULT NULL,
  `country` varchar(512) DEFAULT NULL,
  `postCode` varchar(255) DEFAULT NULL,
  `mobilePhone` varchar(50) NOT NULL,
  `phoneCountryCode` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` mediumtext DEFAULT NULL,
  `authKey` varchar(512) DEFAULT NULL,
  `accessToken` varchar(512) DEFAULT NULL,
  `registerTime` datetime DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `captcha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table royaldoc.register_copy: ~12 rows (approximately)
/*!40000 ALTER TABLE `register_copy` DISABLE KEYS */;
REPLACE INTO `register_copy` (`id`, `username`, `password`, `firstName`, `lastName`, `dateOfBirth`, `gender`, `address`, `street`, `city`, `country`, `postCode`, `mobilePhone`, `phoneCountryCode`, `email`, `note`, `authKey`, `accessToken`, `registerTime`, `role`, `captcha`) VALUES
	(78, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', 'lenhattung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
	(79, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', 'lenhattung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
	(80, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561473', '+48', 'lenhattung@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
	(81, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', '739561473', NULL, NULL, NULL, NULL, NULL, NULL),
	(82, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', '739561473', NULL, NULL, NULL, NULL, NULL, NULL),
	(83, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', '739561472', NULL, NULL, NULL, NULL, NULL, NULL),
	(84, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', '739561472', NULL, NULL, NULL, NULL, NULL, NULL),
	(85, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', '739561472', NULL, NULL, NULL, NULL, NULL, NULL),
	(86, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', '739561472', NULL, NULL, NULL, NULL, NULL, NULL),
	(87, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', '739561472', NULL, NULL, NULL, NULL, NULL, NULL),
	(88, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', '739561472', NULL, NULL, NULL, NULL, NULL, NULL),
	(89, NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', '739561472', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `register_copy` ENABLE KEYS */;

-- Dumping structure for table royaldoc.template
DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(255) NOT NULL DEFAULT '0',
  `name_vi` varchar(255) NOT NULL DEFAULT '0',
  `name_pl` varchar(255) DEFAULT NULL,
  `icon` varchar(512) DEFAULT NULL,
  `color_background` varchar(50) DEFAULT NULL,
  `link` varchar(512) DEFAULT NULL,
  `note` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table royaldoc.template: ~0 rows (approximately)
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
REPLACE INTO `template` (`id`, `name_en`, `name_vi`, `name_pl`, `icon`, `color_background`, `link`, `note`) VALUES
	(1, 'Đơn xin thẻ cư trú', 'Đơn xin thẻ cư trú', 'Đơn xin thẻ cư trú', '', '#F23030', '1', '1');
/*!40000 ALTER TABLE `template` ENABLE KEYS */;

-- Dumping structure for table royaldoc.tpl_temporary_residence
DROP TABLE IF EXISTS `tpl_temporary_residence`;
CREATE TABLE IF NOT EXISTS `tpl_temporary_residence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `p01` date NOT NULL COMMENT '//miejsce i data zlozenia wniosku',
  `p02` varchar(512) NOT NULL DEFAULT '' COMMENT '//do',
  `pa1` varchar(50) NOT NULL DEFAULT '',
  `pa2` varchar(50) NOT NULL DEFAULT '',
  `pa3` varchar(50) NOT NULL DEFAULT '',
  `pa4` varchar(50) NOT NULL DEFAULT '',
  `pa5` varchar(50) NOT NULL DEFAULT '',
  `pa6` varchar(50) NOT NULL DEFAULT '',
  `pa7` varchar(50) NOT NULL DEFAULT '',
  `pa8` varchar(50) NOT NULL DEFAULT '',
  `pa9` date NOT NULL,
  `pa10` varchar(50) NOT NULL DEFAULT '',
  `pa11` varchar(50) NOT NULL,
  `pa12` varchar(50) NOT NULL,
  `pa13` varchar(50) NOT NULL,
  `pa14` varchar(50) NOT NULL,
  `pa15` varchar(50) NOT NULL,
  `pa16` varchar(50) NOT NULL,
  `pa17a` varchar(50) NOT NULL,
  `pa17b` varchar(50) NOT NULL,
  `pa17c` varchar(50) NOT NULL,
  `pa18` varchar(50) NOT NULL,
  `pa19` varchar(50) NOT NULL,
  `pa20` varchar(50) NOT NULL,
  `pb0` varchar(1) NOT NULL DEFAULT '',
  `pb1` bigint(20) DEFAULT NULL,
  `pb2` varchar(50) DEFAULT NULL,
  `pb3` varchar(50) DEFAULT NULL,
  `pb4` varchar(50) DEFAULT NULL,
  `pb5` varchar(50) DEFAULT NULL,
  `pb6` varchar(50) DEFAULT NULL,
  `pci1` char(1) DEFAULT NULL,
  `pci2` char(1) DEFAULT NULL,
  `pci3` char(1) DEFAULT NULL,
  `pci4` char(1) DEFAULT NULL,
  `pci5` char(1) DEFAULT NULL,
  `pci6` char(1) DEFAULT NULL,
  `pci7` char(1) DEFAULT NULL,
  `pci8` char(1) DEFAULT NULL,
  `pci9` char(1) DEFAULT NULL,
  `pci10` char(1) DEFAULT NULL,
  `pci11` char(1) DEFAULT NULL,
  `pci12` char(1) DEFAULT NULL,
  `pci13` char(1) DEFAULT NULL,
  `pci14` char(1) DEFAULT NULL,
  `pci15` char(1) DEFAULT NULL,
  `pci16a` char(1) DEFAULT NULL,
  `pci16b` char(1) DEFAULT NULL,
  `pciiia` text DEFAULT NULL,
  `pciiib1a` char(1) DEFAULT NULL,
  `pciiib1b` char(1) DEFAULT NULL,
  `pciiib2` date DEFAULT NULL,
  `pciiib31` char(1) DEFAULT NULL,
  `pciiib32` char(1) DEFAULT NULL,
  `pciiib33` char(1) DEFAULT NULL,
  `pciiib34` char(1) DEFAULT NULL,
  `pciv` text DEFAULT NULL,
  `pcv` text DEFAULT NULL,
  `pcvi` text DEFAULT NULL,
  `pcvii` int(11) DEFAULT NULL,
  `pcviiia` char(1) DEFAULT NULL,
  `pcviiib` text DEFAULT NULL,
  `pcviiic` char(1) DEFAULT NULL,
  `pcixa` char(1) DEFAULT NULL,
  `pcixb` text DEFAULT NULL,
  `pcixc` char(1) DEFAULT NULL,
  `pcxa` char(1) DEFAULT NULL,
  `pcxb` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table royaldoc.tpl_temporary_residence: ~0 rows (approximately)
/*!40000 ALTER TABLE `tpl_temporary_residence` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpl_temporary_residence` ENABLE KEYS */;

-- Dumping structure for table royaldoc.tpl_temporary_residence_family_member
DROP TABLE IF EXISTS `tpl_temporary_residence_family_member`;
CREATE TABLE IF NOT EXISTS `tpl_temporary_residence_family_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tpl_temporary_residence` int(11) DEFAULT NULL,
  `pcii1` varchar(255) DEFAULT NULL,
  `pcii2` varchar(1) DEFAULT NULL,
  `pcii3` date DEFAULT NULL,
  `pcii4` varchar(255) DEFAULT NULL,
  `pcii5` varchar(512) DEFAULT NULL,
  `pcii6` varchar(50) DEFAULT NULL,
  `pcii7` varchar(50) DEFAULT NULL,
  `pcii8` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table royaldoc.tpl_temporary_residence_family_member: ~0 rows (approximately)
/*!40000 ALTER TABLE `tpl_temporary_residence_family_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpl_temporary_residence_family_member` ENABLE KEYS */;

-- Dumping structure for table royaldoc.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(512) DEFAULT '0',
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `street` varchar(512) DEFAULT NULL,
  `city` varchar(512) DEFAULT NULL,
  `country` varchar(512) DEFAULT NULL,
  `postCode` varchar(255) DEFAULT NULL,
  `mobilePhone` varchar(50) NOT NULL,
  `phoneCountryCode` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` mediumtext DEFAULT NULL,
  `authKey` varchar(512) DEFAULT NULL,
  `accessToken` varchar(512) DEFAULT NULL,
  `activeCode` varchar(255) DEFAULT NULL,
  `activeStatus` varchar(50) DEFAULT NULL,
  `registerTime` datetime DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `old_password` varchar(50) DEFAULT NULL,
  `new_password` varchar(50) DEFAULT NULL,
  `repeat_password` varchar(50) DEFAULT NULL,
  `request_delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table royaldoc.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `username`, `password`, `firstName`, `lastName`, `dateOfBirth`, `gender`, `address`, `street`, `city`, `country`, `postCode`, `mobilePhone`, `phoneCountryCode`, `email`, `note`, `authKey`, `accessToken`, `activeCode`, `activeStatus`, `registerTime`, `role`, `old_password`, `new_password`, `repeat_password`, `request_delete_time`) VALUES
	(27, '+48739561472', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561472', '+48', 'lenhattung@gmail.com', NULL, NULL, NULL, '748046', 'yes', '2020-09-21 13:16:06', 'client', '123456789', '', '', NULL),
	(28, '+48739561473', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PL', NULL, '739561473', '+48', 'lenhattung@gmail.com', NULL, NULL, NULL, '463167', 'yes', '2020-09-21 13:16:14', 'client', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
