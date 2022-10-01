CREATE DATABASE weather_app;
USE weather_app;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `widget`;
CREATE TABLE IF NOT EXISTS `widget` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(64) NOT NULL,
  `temperature` float NOT NULL,
  `unit` varchar(32) NOT NULL,
  `code_meteo` int(3) NOT NULL,
  `description` varchar(32) NOT NULL,
  `pays` varchar(32) NOT NULL,
  `date` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `widget` (`id`, `nom_ville`, `temperature`, `unit`, `code_meteo`, `description`, `pays`, `date`) VALUES
(1, 'Paris', 7, 'metric', 804, 'couvert', 'FR', '12:00:00');
COMMIT;