-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 02 sep. 2018 à 19:11
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `coffedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `coffee`
--

DROP TABLE IF EXISTS `coffee`;
CREATE TABLE IF NOT EXISTS `coffee` (
  `coffeeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `avgReview` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `kcal` double DEFAULT NULL,
  `review` text,
  PRIMARY KEY (`coffeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coffee`
--

INSERT INTO `coffee` (`coffeeId`, `name`, `type`, `price`, `avgReview`, `country`, `image`, `kcal`, `review`) VALUES
(2, 'Caffe Americano', 'Espresso', 3.25, NULL, 'Italy', 'Images/coffee/caffe_americano.jpg', 15, 'Similar in strength and taste to American-style brewed coffee, there are subtle differences achieved by pulling a fresh shot of espresso for the beverage base.'),
(3, 'Peppermint White Chocolate Mocha', 'Espresso', 3.25, '', 'Italy', 'Images/coffee/white-chocolate-peppermint-mocha.jpg', 440, 'Espresso with white chocolate and peppermint flavored syrups and steamed milk. Topped with sweetened whipped cream and dark chocolate curls.'),
(4, 'Galao', 'Classic', 4.2, '', 'Portugal', 'Images/Coffee/A_small_cup_of_coffee.JPG', 108, '');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `comment` int(11) NOT NULL,
  `date` date NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

DROP TABLE IF EXISTS `payement`;
CREATE TABLE IF NOT EXISTS `payement` (
  `payementId` int(11) NOT NULL,
  `payementType` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `profileId` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`profileId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `quantite`
--

DROP TABLE IF EXISTS `quantite`;
CREATE TABLE IF NOT EXISTS `quantite` (
  `quantiteId` int(11) NOT NULL AUTO_INCREMENT,
  `quantiteLeft` int(11) NOT NULL,
  `coffeeId` int(11) NOT NULL,
  PRIMARY KEY (`quantiteId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationId` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `discout` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `payementId` int(11) NOT NULL,
  `quantiteId` int(11) NOT NULL,
  PRIMARY KEY (`reservationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(20) NOT NULL AUTO_INCREMENT,
  `userName` longtext NOT NULL,
  `email` longtext NOT NULL,
  `password` longtext,
  `disabled` tinyint(1) DEFAULT '0',
  `userTypeId` int(11) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`userId`, `userName`, `email`, `password`, `disabled`, `userTypeId`) VALUES
(4, 'admin', 'admin@admin.com', '1e70403099fabf706fdd60a889450ee93996dd16', 0, 1),
(27, 'test', 'test@test.com', 'test', 1, 2),
(35, 'elio', 'elio@elio.com', '$2y$10$z5lQ4G7cpxmWCxfjZGOlweUfiqSWt3WZYRqsy1pycgXHU9fBCNoh2', 1, 2),
(38, 'elio', 'eliowehbe77@gmail.com', '2d8667c718bffe4cfac6d4c5ad868733', 0, 2),
(39, 'el', 'elio@el.com', '2d8667c718bffe4cfac6d4c5ad868733', 0, 2),
(40, 'wehbeElio', 'wehbe@wehbe.com.lb', '2c826e70fe782e22c551b97695957cf0', 0, 2),
(41, 'qwerty', 'qwerty@qwerty.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 2),
(44, 'adminTwo', 'adminTwo@two.com', '21232f297a57a5a743894a0e4a801fc3', 0, 1),
(46, 'adminTree', '3@3.com', '26a91342190d515231d7238b0c5438e1', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `userTypeId` int(11) NOT NULL,
  `type` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usertype`
--

INSERT INTO `usertype` (`userTypeId`, `type`) VALUES
(1, 'admin'),
(2, 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
