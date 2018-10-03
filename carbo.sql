-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.14 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla carbo.hidrato
CREATE TABLE IF NOT EXISTS `hidrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hidrato_carbono` double NOT NULL,
  `horas_entreno` time NOT NULL,
  `km_entreno` int(11) DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_actualizacion` date DEFAULT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `peso` double NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_78015BD8A76ED395` (`user_id`),
  CONSTRAINT `FK_78015BD8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla carbo.hidrato: ~27 rows (aproximadamente)
/*!40000 ALTER TABLE `hidrato` DISABLE KEYS */;
REPLACE INTO `hidrato` (`id`, `hidrato_carbono`, `horas_entreno`, `km_entreno`, `fecha_creacion`, `fecha_actualizacion`, `ruta`, `peso`, `user_id`) VALUES
	(1, 90, '01:00:00', 52, '2018-01-12', '2018-07-29', 'Ruta del Cafe', 84.8, 1),
	(2, 33, '00:30:02', 52, '2018-02-25', NULL, NULL, 85, 1),
	(3, 18, '00:30:02', 52, '2018-02-28', NULL, NULL, 84.8, 1),
	(4, 90, '01:45:01', 52, '2018-03-11', NULL, NULL, 82, 1),
	(5, 70, '01:00:02', 52, '2018-03-16', NULL, NULL, 84.8, 1),
	(6, 70, '01:00:02', 52, '2018-03-18', NULL, NULL, 85, 1),
	(7, 70, '01:45:01', 52, '2018-04-02', NULL, NULL, 84.8, 1),
	(8, 90, '01:00:02', 52, '2018-04-04', NULL, NULL, 82, 1),
	(9, 60, '01:45:01', 52, '2018-04-10', NULL, NULL, 84.8, 1),
	(10, 90, '00:30:02', 52, '2018-04-11', NULL, NULL, 85, 1),
	(11, 70, '01:45:01', 52, '2018-04-17', NULL, NULL, 84.8, 1),
	(12, 90, '00:30:02', 52, '2018-05-05', NULL, NULL, 82, 1),
	(13, 90, '01:00:02', 52, '2018-05-08', NULL, NULL, 84.8, 1),
	(14, 60, '01:45:01', 52, '2018-05-11', NULL, NULL, 85, 1),
	(15, 25, '02:10:00', 52, '2018-05-14', NULL, NULL, 84.8, 1),
	(16, 60, '00:45:01', 52, '2018-05-18', '2018-07-29', 'ultima', 85, 1),
	(17, 45, '00:45:01', 52, '2018-05-20', NULL, NULL, 84.8, 2),
	(18, 60, '00:30:02', 52, '2018-06-09', NULL, NULL, 82, 2),
	(19, 65, '00:30:02', 52, '2018-06-14', NULL, NULL, 84.8, 2),
	(20, 60, '00:45:01', 52, '2018-06-19', NULL, NULL, 84.8, 2),
	(21, 50, '00:45:01', 55, '2018-06-20', NULL, NULL, 82, 2),
	(22, 50, '02:10:00', NULL, '2018-07-02', NULL, NULL, 85, 2),
	(23, 90, '02:10:00', NULL, '2018-07-14', NULL, NULL, 100, 2),
	(24, 50, '02:10:00', NULL, '2018-07-20', NULL, NULL, 55, 2),
	(25, 15, '02:02:00', NULL, '2018-07-29', NULL, NULL, 70, 2),
	(26, 15, '01:57:00', NULL, '2018-07-29', NULL, NULL, 70, 2),
	(27, 44, '02:11:00', NULL, '2018-07-29', NULL, NULL, 56, 1);
/*!40000 ALTER TABLE `hidrato` ENABLE KEYS */;

-- Volcando estructura para tabla carbo.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla carbo.user: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `name`, `surname`, `email`, `role`, `password`) VALUES
	(1, 'sacha', 'Arancibia Bazan', 'lsachaabazan@gmail.com', 'ROLE_SUPER_ADMIN', '$2a$04$BhLqvjh9dUo.zHfBhKW1ieVnghK8C2UFx06qxcFNtEpwxZ47bO/0K'),
	(2, 'carlos', 'Lopez', 'carlos@carlos.com', 'ROLE_USER', '$2a$04$BhLqvjh9dUo.zHfBhKW1ieVnghK8C2UFx06qxcFNtEpwxZ47bO/0K'),
	(3, 'Hernan', 'Dall\'Aglio', 'hernan@hernan.com', 'ROLE_USER', '$2a$04$BhLqvjh9dUo.zHfBhKW1ieVnghK8C2UFx06qxcFNtEpwxZ47bO/0K');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
