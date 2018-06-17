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

-- Dumping structure for table siinsan.alokasibiaya
CREATE TABLE IF NOT EXISTS `alokasibiaya` (
  `alokasibiayaid` int(11) NOT NULL AUTO_INCREMENT,
  `alokasibiayatahun` int(11) DEFAULT NULL,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  `apbn` int(11) DEFAULT NULL,
  `apbdprovinsi` int(11) DEFAULT NULL,
  `apbddaerah` int(11) DEFAULT NULL,
  `dak` int(11) DEFAULT NULL,
  `hibah` int(11) DEFAULT NULL,
  `csr` int(11) DEFAULT NULL,
  PRIMARY KEY (`alokasibiayaid`),
  UNIQUE KEY `unique` (`alokasibiayatahun`,`r_kabupatenkotaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.alokasibiaya: ~0 rows (approximately)
/*!40000 ALTER TABLE `alokasibiaya` DISABLE KEYS */;
/*!40000 ALTER TABLE `alokasibiaya` ENABLE KEYS */;

-- Dumping structure for table siinsan.banjirrencana
CREATE TABLE IF NOT EXISTS `banjirrencana` (
  `banjirrencanaid` int(11) NOT NULL AUTO_INCREMENT,
  `namasungai` varchar(50) DEFAULT NULL,
  `r_kecamatanid` int(11) DEFAULT NULL,
  `r_kelurahanid` int(11) DEFAULT NULL,
  `titikkoordinatawal` varchar(200) DEFAULT NULL,
  `titikkoordinatakhir` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`banjirrencanaid`),
  UNIQUE KEY `Index 2` (`titikkoordinatawal`,`titikkoordinatakhir`,`r_kelurahanid`,`namasungai`,`r_kecamatanid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.banjirrencana: ~0 rows (approximately)
/*!40000 ALTER TABLE `banjirrencana` DISABLE KEYS */;
/*!40000 ALTER TABLE `banjirrencana` ENABLE KEYS */;

-- Dumping structure for table siinsan.datateknis
CREATE TABLE IF NOT EXISTS `datateknis` (
  `datateknisid` int(11) NOT NULL AUTO_INCREMENT,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  `masterplan` enum('Ada','Tidak') DEFAULT NULL,
  `masterplantahun` int(11) DEFAULT NULL,
  `outlineplan` enum('Ada','Tidak') DEFAULT NULL,
  `outlineplantahun` int(11) DEFAULT NULL,
  `ded` enum('Ada','Tidak') DEFAULT NULL,
  `dedtahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`datateknisid`),
  UNIQUE KEY `Index 2` (`r_kabupatenkotaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.datateknis: ~0 rows (approximately)
/*!40000 ALTER TABLE `datateknis` DISABLE KEYS */;
/*!40000 ALTER TABLE `datateknis` ENABLE KEYS */;

-- Dumping structure for table siinsan.genangan
CREATE TABLE IF NOT EXISTS `genangan` (
  `genanganid` int(11) NOT NULL AUTO_INCREMENT,
  `r_kecamatanid` int(11) DEFAULT NULL,
  `r_kelurahanid` int(11) DEFAULT NULL,
  `titikkoordinat` varchar(50) DEFAULT NULL,
  `luasgenangan` int(11) DEFAULT NULL,
  `lamagenangan` int(11) DEFAULT NULL,
  `frekuensigenangan` int(11) DEFAULT NULL,
  `penyebabgenangan` text,
  `tinggigenangan` int(11) DEFAULT NULL,
  `periodeulangduatahun` int(11) DEFAULT NULL,
  `periodeulanglimatahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`genanganid`),
  UNIQUE KEY `Index 2` (`r_kelurahanid`,`titikkoordinat`,`r_kecamatanid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.genangan: ~4 rows (approximately)
/*!40000 ALTER TABLE `genangan` DISABLE KEYS */;
INSERT INTO `genangan` (`genanganid`, `r_kecamatanid`, `r_kelurahanid`, `titikkoordinat`, `luasgenangan`, `lamagenangan`, `frekuensigenangan`, `penyebabgenangan`, `tinggigenangan`, `periodeulangduatahun`, `periodeulanglimatahun`) VALUES
	(1, NULL, NULL, '1', 1, 1, 1, '', 0, 0, 0),
	(2, NULL, NULL, '2', 2, 2, 2, '', 0, 0, 0),
	(3, NULL, NULL, '3', 1, 2, 1, '2', 0, 0, 0),
	(4, NULL, NULL, '4', 1, 3, 4, '', 0, 0, 0);
/*!40000 ALTER TABLE `genangan` ENABLE KEYS */;

-- Dumping structure for table siinsan.genset
CREATE TABLE IF NOT EXISTS `genset` (
  `gensetid` int(11) NOT NULL,
  `namalokasi` varchar(200) DEFAULT NULL,
  `r_kecamatanid` int(11) DEFAULT NULL,
  `r_kelurahanid` int(11) DEFAULT NULL,
  `titikkoordinat` varchar(200) DEFAULT NULL,
  `kapasitas` float DEFAULT NULL,
  `kondisi` enum('Baik','Tidak Baik') DEFAULT NULL,
  `keberfungsian` enum('Berfungsi','Tidak Berfungsi') DEFAULT NULL,
  PRIMARY KEY (`gensetid`),
  UNIQUE KEY `Index 2` (`r_kelurahanid`,`titikkoordinat`,`r_kecamatanid`,`namalokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.genset: ~0 rows (approximately)
/*!40000 ALTER TABLE `genset` DISABLE KEYS */;
/*!40000 ALTER TABLE `genset` ENABLE KEYS */;

-- Dumping structure for table siinsan.instansi
CREATE TABLE IF NOT EXISTS `instansi` (
  `instansiid` int(11) NOT NULL,
  `namainstansi` varchar(250) DEFAULT NULL,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  `pegawaitetap` int(11) DEFAULT NULL,
  `pegawaikontrak` int(11) DEFAULT NULL,
  `strukturorganisasi` enum('ada dan terlampir','ada tetapi tidak terlampir','tidak ada') DEFAULT NULL,
  `luluss2s3` int(11) DEFAULT NULL,
  `luluss1` int(11) DEFAULT NULL,
  `lulusd3` int(11) DEFAULT NULL,
  `lulussma` int(11) DEFAULT NULL,
  `lulussmp` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`instansiid`),
  UNIQUE KEY `Index 2` (`r_kabupatenkotaid`,`namainstansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.instansi: ~0 rows (approximately)
/*!40000 ALTER TABLE `instansi` DISABLE KEYS */;
/*!40000 ALTER TABLE `instansi` ENABLE KEYS */;

-- Dumping structure for table siinsan.institusi
CREATE TABLE IF NOT EXISTS `institusi` (
  `institusiid` int(11) DEFAULT NULL,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  `namainstitusi` varchar(200) DEFAULT NULL,
  `jabatanpengelola` varchar(200) DEFAULT NULL,
  `eselonjabatan` enum('Eselon IIb','Eselon IIIa','Eselon IIIb','Eselon IVa','Eselon IVb') DEFAULT NULL,
  `pns` int(11) DEFAULT NULL,
  `nonpns` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `strukturorganisasi` enum('ada dan terlampir','ada tetapi tidak terlampir','tidak ada') DEFAULT NULL,
  `luluss2s3` int(11) DEFAULT NULL,
  `luluss1` int(11) DEFAULT NULL,
  `lulusd3` int(11) DEFAULT NULL,
  `lulussma` int(11) DEFAULT NULL,
  `lulussmp` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.institusi: ~0 rows (approximately)
/*!40000 ALTER TABLE `institusi` DISABLE KEYS */;
/*!40000 ALTER TABLE `institusi` ENABLE KEYS */;

-- Dumping structure for table siinsan.jumlahpenduduk
CREATE TABLE IF NOT EXISTS `jumlahpenduduk` (
  `jumlahpendudukid` int(11) NOT NULL AUTO_INCREMENT,
  `jumlahpenduduktahun` int(11) NOT NULL,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  `jumlahpendudukkota` int(11) DEFAULT NULL,
  `jumlahpendudukdesa` int(11) DEFAULT NULL,
  PRIMARY KEY (`jumlahpendudukid`),
  UNIQUE KEY `unik` (`jumlahpenduduktahun`,`r_kabupatenkotaid`)
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
  PRIMARY KEY (`kabupatenkotaid`),
  UNIQUE KEY `Index 2` (`r_provinsiid`,`kabupatenkotaname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.kabupatenkota: ~1 rows (approximately)
/*!40000 ALTER TABLE `kabupatenkota` DISABLE KEYS */;
INSERT INTO `kabupatenkota` (`kabupatenkotaid`, `kabupatenkotaname`, `r_provinsiid`, `kabupatenkotalat`, `kabupatenkotalong`) VALUES
	(1, 'polk', 1, '', '');
/*!40000 ALTER TABLE `kabupatenkota` ENABLE KEYS */;

-- Dumping structure for table siinsan.kecamatan
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `kecamatanid` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatanname` varchar(200) DEFAULT NULL,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  PRIMARY KEY (`kecamatanid`),
  UNIQUE KEY `Index 2` (`r_kabupatenkotaid`,`kecamatanname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.kecamatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `kecamatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kecamatan` ENABLE KEYS */;

-- Dumping structure for table siinsan.kelurahan
CREATE TABLE IF NOT EXISTS `kelurahan` (
  `kelurahanid` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahanname` varchar(200) DEFAULT NULL,
  `r_kecamatanid` int(11) DEFAULT NULL,
  PRIMARY KEY (`kelurahanid`),
  UNIQUE KEY `Index 2` (`r_kecamatanid`,`kelurahanname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.kelurahan: ~0 rows (approximately)
/*!40000 ALTER TABLE `kelurahan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelurahan` ENABLE KEYS */;

-- Dumping structure for table siinsan.kolam
CREATE TABLE IF NOT EXISTS `kolam` (
  `kolamid` int(11) NOT NULL,
  `kolamtype` enum('Retensi','Tandon','Dentensi') DEFAULT NULL,
  `namakawasan` varchar(200) DEFAULT NULL,
  `r_kecamatanid` int(11) DEFAULT NULL,
  `r_kelurahanid` int(11) DEFAULT NULL,
  `titikkoordinat` varchar(200) DEFAULT NULL,
  `panjang` float DEFAULT NULL,
  `lebar` float DEFAULT NULL,
  `luas` float DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `kondisi` enum('Baik','Tidak Baik') DEFAULT NULL,
  `keberfungsian` enum('Berfungsi','Tidak Berfungsi') DEFAULT NULL,
  PRIMARY KEY (`kolamid`),
  UNIQUE KEY `Index 2` (`namakawasan`,`titikkoordinat`,`r_kelurahanid`,`r_kecamatanid`,`kolamtype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.kolam: ~0 rows (approximately)
/*!40000 ALTER TABLE `kolam` DISABLE KEYS */;
/*!40000 ALTER TABLE `kolam` ENABLE KEYS */;

-- Dumping structure for table siinsan.label
CREATE TABLE IF NOT EXISTS `label` (
  `labelid` int(11) NOT NULL AUTO_INCREMENT,
  `labelname` varchar(200) DEFAULT NULL,
  `labelvalue` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`labelid`),
  UNIQUE KEY `Index 2` (`labelname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.label: ~0 rows (approximately)
/*!40000 ALTER TABLE `label` DISABLE KEYS */;
/*!40000 ALTER TABLE `label` ENABLE KEYS */;

-- Dumping structure for table siinsan.pasangsurut
CREATE TABLE IF NOT EXISTS `pasangsurut` (
  `pasangsurutid` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(200) DEFAULT NULL,
  `r_kecamatanid` int(11) DEFAULT NULL,
  `r_kelurahanid` int(11) DEFAULT NULL,
  `titikkoordinat` varchar(200) DEFAULT NULL,
  `tertinggi` float DEFAULT NULL,
  `ratarata` float DEFAULT NULL,
  `terendah` float DEFAULT NULL,
  PRIMARY KEY (`pasangsurutid`),
  UNIQUE KEY `Index 2` (`r_kecamatanid`,`r_kelurahanid`,`lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.pasangsurut: ~0 rows (approximately)
/*!40000 ALTER TABLE `pasangsurut` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasangsurut` ENABLE KEYS */;

-- Dumping structure for table siinsan.petadrainase
CREATE TABLE IF NOT EXISTS `petadrainase` (
  `petadrainaseid` int(11) NOT NULL AUTO_INCREMENT,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  `petadrainasejalan` enum('Ada','Tidak') DEFAULT NULL,
  `petagenangan` enum('Ada','Tidak') DEFAULT NULL,
  `petapeilbanjir` enum('Ada','Tidak') DEFAULT NULL,
  `petajaringanbangunan` enum('Ada','Tidak') DEFAULT NULL,
  `petaarahaliran` enum('Ada','Tidak') DEFAULT NULL,
  `petazonasi` enum('Ada','Tidak') DEFAULT NULL,
  PRIMARY KEY (`petadrainaseid`),
  UNIQUE KEY `Index 2` (`r_kabupatenkotaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.petadrainase: ~0 rows (approximately)
/*!40000 ALTER TABLE `petadrainase` DISABLE KEYS */;
/*!40000 ALTER TABLE `petadrainase` ENABLE KEYS */;

-- Dumping structure for table siinsan.pintuair
CREATE TABLE IF NOT EXISTS `pintuair` (
  `pintuairid` int(11) NOT NULL,
  `namalokasi` varchar(200) DEFAULT NULL,
  `r_kecamatanid` int(11) DEFAULT NULL,
  `r_kelurahanid` int(11) DEFAULT NULL,
  `titikkoordinat` varchar(200) DEFAULT NULL,
  `tinggi` float DEFAULT NULL,
  `lebar` float DEFAULT NULL,
  `elevasidasar` float DEFAULT NULL,
  `elevasinormal` float DEFAULT NULL,
  `elevasimaximum` float DEFAULT NULL,
  `kondisi` enum('Baik','Tidak Baik') DEFAULT NULL,
  `keberfungsian` enum('Berfungsi','Tidak Berfungsi') DEFAULT NULL,
  PRIMARY KEY (`pintuairid`),
  UNIQUE KEY `Index 2` (`titikkoordinat`,`r_kelurahanid`,`r_kecamatanid`,`namalokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.pintuair: ~0 rows (approximately)
/*!40000 ALTER TABLE `pintuair` DISABLE KEYS */;
/*!40000 ALTER TABLE `pintuair` ENABLE KEYS */;

-- Dumping structure for table siinsan.pompa
CREATE TABLE IF NOT EXISTS `pompa` (
  `pompaid` int(11) NOT NULL,
  `namalokasi` varchar(200) DEFAULT NULL,
  `r_kecamatanid` int(11) DEFAULT NULL,
  `r_kelurahanid` int(11) DEFAULT NULL,
  `titikkoordinat` varchar(200) DEFAULT NULL,
  `jumlah` float DEFAULT NULL,
  `kapasitas` float DEFAULT NULL,
  `kondisi` enum('Baik','Tidak Baik') DEFAULT NULL,
  `keberfungsian` enum('Berfungsi','Tidak Berfungsi') DEFAULT NULL,
  PRIMARY KEY (`pompaid`),
  UNIQUE KEY `Index 2` (`r_kelurahanid`,`titikkoordinat`,`r_kecamatanid`,`namalokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.pompa: ~0 rows (approximately)
/*!40000 ALTER TABLE `pompa` DISABLE KEYS */;
/*!40000 ALTER TABLE `pompa` ENABLE KEYS */;

-- Dumping structure for table siinsan.programkegiatan
CREATE TABLE IF NOT EXISTS `programkegiatan` (
  `programkegiatanid` int(11) NOT NULL,
  `r_kabupatenkotaid` int(11) DEFAULT NULL,
  `jenispembiayaan` enum('APBN','APBD Provinsi','APBD Daerah','DAK','Hibah','CSR') DEFAULT NULL,
  `programkegiatan` varchar(250) DEFAULT NULL,
  `vol` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  PRIMARY KEY (`programkegiatanid`),
  UNIQUE KEY `Index 2` (`tahun`,`programkegiatan`,`jenispembiayaan`,`r_kabupatenkotaid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.programkegiatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `programkegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `programkegiatan` ENABLE KEYS */;

-- Dumping structure for table siinsan.provinsi
CREATE TABLE IF NOT EXISTS `provinsi` (
  `provinsiid` int(11) NOT NULL AUTO_INCREMENT,
  `provinsiname` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`provinsiid`),
  UNIQUE KEY `Index 2` (`provinsiname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.provinsi: ~1 rows (approximately)
/*!40000 ALTER TABLE `provinsi` DISABLE KEYS */;
INSERT INTO `provinsi` (`provinsiid`, `provinsiname`) VALUES
	(1, 'Aceh');
/*!40000 ALTER TABLE `provinsi` ENABLE KEYS */;

-- Dumping structure for table siinsan.saluran
CREATE TABLE IF NOT EXISTS `saluran` (
  `saluranprimerid` int(11) NOT NULL,
  `namakawasan` int(11) DEFAULT NULL,
  `salurantype` enum('Primer','Sekunder','Tersier') DEFAULT NULL,
  `r_kecamatanid` int(11) DEFAULT NULL,
  `r_kelurahanid` int(11) DEFAULT NULL,
  `titikkoordinatawal` int(11) DEFAULT NULL,
  `titikkoordinatakhir` int(11) DEFAULT NULL,
  `panjangsaluran` int(11) DEFAULT NULL,
  `lebarsaluranatas` int(11) DEFAULT NULL,
  `lebarsaluranbawah` int(11) DEFAULT NULL,
  `elevasisaluran` int(11) DEFAULT NULL,
  `kapasitassaluran` enum('Saluran Terbuka','Saluran Tertutup') DEFAULT NULL,
  `konstruksisaluran` enum('Beton','Pasangan Batu','Tanah','Lainnya') DEFAULT NULL,
  PRIMARY KEY (`saluranprimerid`),
  UNIQUE KEY `Index 2` (`salurantype`,`titikkoordinatawal`,`r_kelurahanid`,`r_kecamatanid`,`namakawasan`,`titikkoordinatakhir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.saluran: ~0 rows (approximately)
/*!40000 ALTER TABLE `saluran` DISABLE KEYS */;
/*!40000 ALTER TABLE `saluran` ENABLE KEYS */;

-- Dumping structure for table siinsan.sqltochart
CREATE TABLE IF NOT EXISTS `sqltochart` (
  `sqltochartid` int(11) NOT NULL AUTO_INCREMENT,
  `sqltochartname` varchar(100) DEFAULT NULL,
  `sqltochartquery` text,
  `sqltochartxlabel` varchar(100) DEFAULT NULL,
  `sqltochartylabel` varchar(100) DEFAULT NULL,
  `sqltocharttype` enum('line','spline','area','areaspline','column','bar','pie','scatter','gauge','arearange','areasplinerange','columnrange') DEFAULT NULL,
  `sqltochartremarks` text,
  PRIMARY KEY (`sqltochartid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.sqltochart: ~0 rows (approximately)
/*!40000 ALTER TABLE `sqltochart` DISABLE KEYS */;
INSERT INTO `sqltochart` (`sqltochartid`, `sqltochartname`, `sqltochartquery`, `sqltochartxlabel`, `sqltochartylabel`, `sqltocharttype`, `sqltochartremarks`) VALUES
	(1, 'test', 'select luasgenangan \'luas genangan\',lamagenangan \'lama genangan\' from genangan', 'label x', 'label y', 'scatter', '');
/*!40000 ALTER TABLE `sqltochart` ENABLE KEYS */;

-- Dumping structure for table siinsan.sqltojson
CREATE TABLE IF NOT EXISTS `sqltojson` (
  `sqltojsonid` int(11) NOT NULL AUTO_INCREMENT,
  `sqltojsonname` varchar(200) DEFAULT NULL,
  `sqltojsonquery` text,
  `sqltojsonremarks` text,
  PRIMARY KEY (`sqltojsonid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.sqltojson: ~0 rows (approximately)
/*!40000 ALTER TABLE `sqltojson` DISABLE KEYS */;
INSERT INTO `sqltojson` (`sqltojsonid`, `sqltojsonname`, `sqltojsonquery`, `sqltojsonremarks`) VALUES
	(1, 'genangan', 'select luasgenangan \'luas genangan\',lamagenangan \'lama genangan\' from genangan', '');
/*!40000 ALTER TABLE `sqltojson` ENABLE KEYS */;

-- Dumping structure for table siinsan.sqltotable
CREATE TABLE IF NOT EXISTS `sqltotable` (
  `sqltotableid` int(11) NOT NULL AUTO_INCREMENT,
  `sqltotablename` varchar(200) DEFAULT NULL,
  `sqltotablequery` text,
  `sqltotabletype` enum('Normal','Number') DEFAULT NULL,
  `sqltotableremark` text,
  PRIMARY KEY (`sqltotableid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.sqltotable: ~0 rows (approximately)
/*!40000 ALTER TABLE `sqltotable` DISABLE KEYS */;
INSERT INTO `sqltotable` (`sqltotableid`, `sqltotablename`, `sqltotablequery`, `sqltotabletype`, `sqltotableremark`) VALUES
	(1, 'table genangan', 'select genangan.luasgenangan \'luas genangan\',genangan.lamagenangan \'lama genangan\' from genangan', 'Number', '');
/*!40000 ALTER TABLE `sqltotable` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table siinsan.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`userid`, `username`, `userpassword`, `r_provinsiid`, `usercreated`, `userlastlogin`, `userexpired`, `usertype`) VALUES
	(1, 'novantio', '8812a3ba0ddd1e0cb57bbbebaa182dc5', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', 1),
	(2, 'ryan', 'bf19239eccbe59a11dca19c2eadc1646', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
