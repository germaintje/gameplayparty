-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                10.1.33-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Versie:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Structuur van  tabel gameplayparty.bioscopen wordt geschreven
CREATE TABLE IF NOT EXISTS `bioscopen` (
  `b_naam_int` int(11) NOT NULL,
  `b_naam` varchar(50) NOT NULL,
  `openingstijden` varchar(50) DEFAULT NULL,
  `tarieven` varchar(50) DEFAULT NULL,
  `toeslagen` varchar(50) DEFAULT NULL,
  `voorwaarden` varchar(50) DEFAULT NULL,
  `zaal` int(11) DEFAULT NULL,
  `b_addres_int` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_naam_int`),
  UNIQUE KEY `zaal` (`zaal`),
  UNIQUE KEY `b_addres_int` (`b_addres_int`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporteren was gedeselecteerd
-- Structuur van  tabel gameplayparty.bioscopen_koppeling wordt geschreven
CREATE TABLE IF NOT EXISTS `bioscopen_koppeling` (
  `reserverings_id` int(11) NOT NULL,
  `b_naam_id` int(11) NOT NULL,
  PRIMARY KEY (`reserverings_id`),
  KEY `b_naam` (`b_naam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporteren was gedeselecteerd
-- Structuur van  tabel gameplayparty.klantenregister wordt geschreven
CREATE TABLE IF NOT EXISTS `klantenregister` (
  `k_naam_id` int(11) NOT NULL,
  `k_naam` varchar(50) NOT NULL,
  `k_addres` varchar(140) NOT NULL,
  `k_provincie` varchar(140) NOT NULL,
  `k_regio` varchar(140) NOT NULL,
  `k_telefoon` varchar(140) NOT NULL,
  `registratie_datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`k_naam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporteren was gedeselecteerd
-- Structuur van  tabel gameplayparty.klanten_reservering wordt geschreven
CREATE TABLE IF NOT EXISTS `klanten_reservering` (
  `reserverings_id` int(11) NOT NULL,
  `k_naam_id` int(11) NOT NULL,
  PRIMARY KEY (`reserverings_id`),
  KEY `k_naam` (`k_naam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporteren was gedeselecteerd
-- Structuur van  tabel gameplayparty.locatie wordt geschreven
CREATE TABLE IF NOT EXISTS `locatie` (
  `b_addres_int` int(11) NOT NULL AUTO_INCREMENT,
  `b_addres` varchar(50) NOT NULL DEFAULT '',
  `bereikbaarheid_auto` mediumtext NOT NULL,
  `bereikbaarheid_fiets` mediumtext NOT NULL,
  `bereikbaarheid_ov` mediumtext NOT NULL,
  `b_regio` varchar(50) NOT NULL,
  `b_provincie` varchar(50) NOT NULL,
  PRIMARY KEY (`b_addres_int`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporteren was gedeselecteerd
-- Structuur van  tabel gameplayparty.reserveringen wordt geschreven
CREATE TABLE IF NOT EXISTS `reserveringen` (
  `reserverings_id` int(11) NOT NULL AUTO_INCREMENT,
  `dienst` varchar(50) NOT NULL,
  `tarief` varchar(50) NOT NULL,
  `reserverings_tijd` time NOT NULL,
  `reserverings_datum` date NOT NULL,
  PRIMARY KEY (`reserverings_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporteren was gedeselecteerd
-- Structuur van  tabel gameplayparty.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporteren was gedeselecteerd
-- Structuur van  tabel gameplayparty.zalen wordt geschreven
CREATE TABLE IF NOT EXISTS `zalen` (
  `zaal` int(11) NOT NULL,
  `aantal_stoelen` varchar(50) NOT NULL,
  `schermgroote` varchar(140) NOT NULL,
  `faciliteiten` varchar(140) NOT NULL,
  `versies` varchar(140) NOT NULL,
  `bios_info` mediumtext NOT NULL,
  PRIMARY KEY (`zaal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporteren was gedeselecteerd
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
