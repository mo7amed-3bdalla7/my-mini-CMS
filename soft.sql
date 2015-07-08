-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for software
CREATE DATABASE IF NOT EXISTS `software` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `software`;


-- Dumping structure for table software.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `describtion` varchar(100) NOT NULL,
  `key_words` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Dumping data for table software.products: ~49 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `img`, `price`, `describtion`, `key_words`) VALUES
	(1, 'sony', 'index33', '400', 'ffffffffffffffffffffff', 'mobile , sony'),
	(2, 'samsung', 'index42', '45', 'pppppppppppppp', 'mobile, samsung'),
	(3, 'Samsung', 'Samsung.png', '5000', ' a good phone', 'Samsung'),
	(4, 'Samsung', 'Samsung.png', '5000', ' a good phone', 'Samsung'),
	(5, 'Samsung', 'Samsung.png', '5000', ' a good phone', 'Samsung'),
	(6, 'Samsung', 'Samsung.png', '5000', ' a good phone', 'Samsung'),
	(7, 'Samsung', 'Samsung.png', '5000', ' a good phone', 'Samsung'),
	(8, 'Samsung', 'Samsung.png', '5000', ' a good phone', 'Samsung'),
	(9, 'Nokia', 'Nokia.png', '5000', ' a good phone', 'Nokia'),
	(10, 'LG', 'LG.png', '5000', ' a good phone', 'LG'),
	(11, 'Sony', 'Sony.png', '5000', ' a good phone', 'Sony'),
	(12, 'Motorella', 'Motorella.png', '5000', ' a good phone', 'Motorella'),
	(13, 'Nokia', 'Nokia.png', '5000', ' a good phone', 'Nokia'),
	(14, 'LG', 'LG.png', '5000', ' a good phone', 'LG'),
	(15, 'Sony', 'Sony.png', '5000', ' a good phone', 'Sony'),
	(16, 'Motorella', 'Motorella.png', '5000', ' a good phone', 'Motorella'),
	(18, 'Nokia', 'Nokia.png', '5000', ' a good phone', 'Nokia'),
	(19, 'LG', 'LG.png', '5000', ' a good phone', 'LG'),
	(20, 'Sony', 'Sony.png', '5000', ' a good phone', 'Sony'),
	(21, 'Motorella', 'Motorella.png', '5000', ' a good phone', 'Motorella'),
	(22, '', '', '', '', ''),
	(23, 'HTC', 'HTC.png', '6666', 'GOood', ''),
	(24, 'HTC', 'HTC.png', '6666', 'GOood', 'HTC'),
	(25, 'Apple', 'Apple.png', '6666', 'GOood', 'Apple'),
	(26, 'Huawei', 'Huawei.png', '6666', 'GOood', 'Huawei'),
	(27, 'Lenovo', 'Lenovo.png', '6666', 'GOood', 'Lenovo'),
	(28, 'Asus', 'Asus.png', '6666', 'GOood', 'Asus'),
	(29, 'HTC', 'HTC.png', '6666', 'GOood', 'HTC'),
	(30, 'Apple', 'Apple.png', '6666', 'GOood', 'Apple'),
	(31, 'Huawei', 'Huawei.png', '6666', 'GOood', 'Huawei'),
	(32, 'Lenovo', 'Lenovo.png', '6666', 'GOood', 'Lenovo'),
	(33, 'Asus', 'Asus.png', '6666', 'GOood', 'Asus'),
	(34, 'HTC', 'HTC.png', '6666', 'GOood', 'HTC'),
	(35, 'Apple', 'Apple.png', '6666', 'GOood', 'Apple'),
	(36, 'Huawei', 'Huawei.png', '6666', 'GOood', 'Huawei'),
	(37, 'Lenovo', 'Lenovo.png', '6666', 'GOood', 'Lenovo'),
	(38, 'Asus', 'Asus.png', '6666', 'GOood', 'Asus'),
	(39, '', '', '', '', ''),
	(40, 'HTC', 'HTC.png', '6666', 'GOood', 'HTC'),
	(41, 'Apple', 'Apple.png', '6666', 'GOood', 'Apple'),
	(42, 'Huawei', 'Huawei.png', '6666', 'GOood', 'Huawei'),
	(43, 'Lenovo', 'Lenovo.png', '6666', 'GOood', 'Lenovo'),
	(44, 'Asus', 'Asus.png', '6666', 'GOood', 'Asus'),
	(45, '', '', '', '', ''),
	(46, 'HTC', 'HTC.png', '6666', 'GOood', 'HTC'),
	(47, 'Apple', 'Apple.png', '6666', 'GOood', 'Apple'),
	(48, 'Huawei', 'Huawei.png', '6666', 'GOood', 'Huawei'),
	(49, 'Lenovo', 'Lenovo.png', '6666', 'GOood', 'Lenovo'),
	(50, 'Asus', 'Asus.png', '6666', 'GOood', 'Asus');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table software.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table software.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
	(8, 'iuyiy', 'yioyyoo', 'yoyo', 'yooy'),
	(9, 'iuyiy', 'yioyyoo', 'yoyo', 'yooy');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
