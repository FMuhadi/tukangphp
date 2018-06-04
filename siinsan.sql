-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for siinsan
CREATE DATABASE IF NOT EXISTS `siinsan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `siinsan`;

-- Dumping structure for table siinsan.jumlahpenduduk
CREATE TABLE IF NOT EXISTS `jumlahpenduduk` (
  `jumlahpendudukid` int(11) NOT NULL AUTO_INCREMENT,
  `jumlahpenduduktahun` int(11) NOT NULL,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  `jumlahpendudukkota` int(11) DEFAULT NULL,
  `jumlahpendudukdesa` int(11) DEFAULT NULL,
  UNIQUE KEY `unique` (`jumlahpendudukid`,`jumlahpenduduktahun`),
  KEY `Index 1` (`jumlahpendudukid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.jumlahpenduduk: ~0 rows (approximately)
/*!40000 ALTER TABLE `jumlahpenduduk` DISABLE KEYS */;
/*!40000 ALTER TABLE `jumlahpenduduk` ENABLE KEYS */;

-- Dumping structure for table siinsan.kabupatenkota
CREATE TABLE IF NOT EXISTS `kabupatenkota` (
  `kabupatenkotaid` int(11) NOT NULL AUTO_INCREMENT,
  `kabupatenkotaname` varchar(200) DEFAULT NULL,
  `r_provinsiid` int(11) DEFAULT NULL,
  `kabupatenkotalat` varchar(50) DEFAULT NULL,
  `kabupatenkotalong` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kabupatenkotaid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.kabupatenkota: ~0 rows (approximately)
/*!40000 ALTER TABLE `kabupatenkota` DISABLE KEYS */;
INSERT INTO `kabupatenkota` (`kabupatenkotaid`, `kabupatenkotaname`, `r_provinsiid`, `kabupatenkotalat`, `kabupatenkotalong`) VALUES
	(1, 'belitung', 5, '12222', '24121123');
/*!40000 ALTER TABLE `kabupatenkota` ENABLE KEYS */;

-- Dumping structure for table siinsan.kecamatan
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `kecamatanid` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatanname` varchar(200) DEFAULT NULL,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`kecamatanid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.kecamatan: ~1 rows (approximately)
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
INSERT INTO `kecamatan` (`kecamatanid`, `kecamatanname`, `r_kabupatenkotaid`) VALUES
	(1, 'SSS', 1),
	(2, 'ttt', 1);
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;

-- Dumping structure for table siinsan.kelurahan
CREATE TABLE IF NOT EXISTS `kelurahan` (
  `kelurahanid` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahanname` varchar(200) DEFAULT NULL,
  `r_kecamatanid` int(11) DEFAULT NULL,
  PRIMARY KEY (`kelurahanid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.kelurahan: ~0 rows (approximately)
/*!40000 ALTER TABLE `kelurahan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelurahan` ENABLE KEYS */;

-- Dumping structure for table siinsan.provinsi
CREATE TABLE IF NOT EXISTS `provinsi` (
  `provinsiid` int(11) NOT NULL AUTO_INCREMENT,
  `provinsiname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`provinsiid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.provinsi: ~2 rows (approximately)
/*!40000 ALTER TABLE `provinsi` DISABLE KEYS */;
INSERT INTO `provinsi` (`provinsiid`, `provinsiname`) VALUES
	(4, 'sumatra utara 1'),
	(5, 'bangka');
/*!40000 ALTER TABLE `provinsi` ENABLE KEYS */;

-- Dumping structure for table siinsan.user
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `userpassword` varchar(50) DEFAULT NULL,
  `r_provinsiid` int(11) DEFAULT NULL,
  `usercreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `userlastlogin` datetime DEFAULT NULL,
  `userexpired` date DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `Uniqusername` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userid`, `username`, `userpassword`, `r_provinsiid`, `usercreated`, `userlastlogin`, `userexpired`, `usertype`) VALUES
	(1, 'novantio', '8812a3ba0ddd1e0cb57bbbebaa182dc5', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
