-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sevima_insta
CREATE DATABASE IF NOT EXISTS `sevima_insta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sevima_insta`;

-- Dumping structure for table sevima_insta.ms_photo
CREATE TABLE IF NOT EXISTS `ms_photo` (
  `pht_id` int(11) NOT NULL AUTO_INCREMENT,
  `pht_usr_id` int(11) NOT NULL,
  `pht_description` text NOT NULL,
  `pht_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pht_image` varchar(100) DEFAULT NULL,
  `pht_lke_status` int(11) NOT NULL,
  `pht_cmn_status` int(11) NOT NULL,
  `pht_private` int(11) NOT NULL,
  `pht_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pht_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table sevima_insta.ms_photo: ~3 rows (approximately)
/*!40000 ALTER TABLE `ms_photo` DISABLE KEYS */;
INSERT INTO `ms_photo` (`pht_id`, `pht_usr_id`, `pht_description`, `pht_date`, `pht_image`, `pht_lke_status`, `pht_cmn_status`, `pht_private`, `pht_status`) VALUES
	(2, 11, 'Red flower', '2021-09-16 12:14:11', '1631769251_b50ce0dec5631e86ef75.jpg', 0, 0, 1, 1),
	(3, 11, 'standing still fli', '2021-09-16 12:26:15', '1631769975_cc92364f31e25d43ca42.jpg', 0, 0, 0, 1),
	(4, 12, 'little creature', '2021-09-16 12:30:28', '1631770228_0c034769afe0c12cc8fd.jpg', 1, 1, 0, 1),
	(5, 11, 'Lady Bug', '2021-09-16 06:20:01', '1631748001_4816b3ba9d7c366f5494.jpg', 1, 1, 0, 1),
	(6, 14, 'Sunflower Seeds', '2021-09-16 20:57:27', '1631800647_2590776fb34322a5a37c.jpg', 0, 1, 0, 1);
/*!40000 ALTER TABLE `ms_photo` ENABLE KEYS */;

-- Dumping structure for table sevima_insta.ms_user
CREATE TABLE IF NOT EXISTS `ms_user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_nama` varchar(50) NOT NULL,
  `usr_username` varchar(50) NOT NULL,
  `usr_password` varchar(50) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table sevima_insta.ms_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `ms_user` DISABLE KEYS */;
INSERT INTO `ms_user` (`usr_id`, `usr_nama`, `usr_username`, `usr_password`) VALUES
	(11, 'Agung Palito F', 'agung', '5f4dcc3b5aa765d61d8327deb882cf99'),
	(12, 'Serlli Yulita', 'serlli', '5f4dcc3b5aa765d61d8327deb882cf99'),
	(13, 'Blake', 'blake', '5f4dcc3b5aa765d61d8327deb882cf99'),
	(14, 'John Kennedi', 'john', '5f4dcc3b5aa765d61d8327deb882cf99');
/*!40000 ALTER TABLE `ms_user` ENABLE KEYS */;

-- Dumping structure for table sevima_insta.tr_comment
CREATE TABLE IF NOT EXISTS `tr_comment` (
  `cmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmt_pht_id` int(11) NOT NULL,
  `cmt_usr_id` int(11) NOT NULL,
  `cmt_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cmt_text` text NOT NULL,
  PRIMARY KEY (`cmt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sevima_insta.tr_comment: ~2 rows (approximately)
/*!40000 ALTER TABLE `tr_comment` DISABLE KEYS */;
INSERT INTO `tr_comment` (`cmt_id`, `cmt_pht_id`, `cmt_usr_id`, `cmt_date`, `cmt_text`) VALUES
	(14, 5, 13, '2021-09-16 20:36:27', 'Nice photography'),
	(15, 5, 11, '2021-09-16 20:37:17', 'Thanks blake'),
	(16, 5, 14, '2021-09-16 20:58:03', 'Amazing'),
	(17, 6, 11, '2021-09-16 20:58:33', 'great');
/*!40000 ALTER TABLE `tr_comment` ENABLE KEYS */;

-- Dumping structure for table sevima_insta.tr_like
CREATE TABLE IF NOT EXISTS `tr_like` (
  `lke_id` int(11) NOT NULL AUTO_INCREMENT,
  `lke_pht_id` int(11) NOT NULL,
  `lke_usr_id` int(11) NOT NULL,
  `lke_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`lke_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- Dumping data for table sevima_insta.tr_like: ~5 rows (approximately)
/*!40000 ALTER TABLE `tr_like` DISABLE KEYS */;
INSERT INTO `tr_like` (`lke_id`, `lke_pht_id`, `lke_usr_id`, `lke_date`) VALUES
	(23, 5, 12, '2021-09-16 17:43:04'),
	(51, 2, 11, '2021-09-16 18:41:44'),
	(53, 4, 11, '2021-09-16 18:45:33'),
	(55, 4, 12, '2021-09-16 19:35:36'),
	(58, 4, 14, '2021-09-16 20:57:45'),
	(59, 5, 14, '2021-09-16 20:57:56');
/*!40000 ALTER TABLE `tr_like` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
