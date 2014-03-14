-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 23 Février 2014 à 01:14
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `NetworkApplication`
--

-- --------------------------------------------------------

--
-- Structure de la table `Friend`
--

CREATE TABLE `Friend` (
  `idUser` int(11) NOT NULL,
  `idFriend` int(11) NOT NULL,
  `accepted` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idFriend`),
  KEY `fk_2` (`idFriend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Friend`
--

INSERT INTO `Friend` (`idUser`, `idFriend`, `accepted`) VALUES
(2, 3, 1),
(2, 4, 1),
(2, 6, 0),
(2, 9, 0),
(2, 11, 1),
(2, 12, 1),
(2, 13, 1),
(2, 15, 1),
(2, 16, 1),
(2, 27, 1),
(2, 31, 1),
(3, 2, 1),
(3, 6, 0),
(4, 2, 1),
(11, 2, 1),
(12, 2, 1),
(13, 2, 1),
(15, 2, 1),
(16, 2, 1),
(27, 2, 1),
(31, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `imagePath` varchar(30) COLLATE utf8_bin NOT NULL,
  `coverPath` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `red` int(3) COLLATE utf8_bin NOT NULL,
  `green` int(3) COLLATE utf8_bin NOT NULL,
  `blue` int(3) COLLATE utf8_bin NOT NULL,
  `text` int(1) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=36 ;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`idUser`, `username`, `imagePath`,`coverPath`, `email`, `password`,`red`,`green`,`blue`,`text`) VALUES
(1, 'admin', 'none.png','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(2, 'ouvrypaul', 'paul.jpg','beach.jpeg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',249,236,217,1),
(3, 'noelstepha', 'stephanie.jpg','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(4, 'florentgo', 'florent.jpg','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(5, 'dufaunicol', 'nicolas.jpg','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(6, 'daviddogne', 'david.jpg','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(7, 'lepagethom', 'thomasl.jpg','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(8, 'giovannini', 'thomas.jpg','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(9, 'example1', 'none.png','mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(11, 'example3', 'none.png','mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(12, 'example4', 'none.png','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(13, 'example5', 'none.png','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(15, 'example7', 'none.png','mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(16, 'example8', 'none.png','mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(25, 'ouvrylea', 'lea.jpg', 'mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(27, 'ouvryarthu', 'arthur.jpg', 'mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0),
(31, 'marechalad', 'adrienne.jpg', 'mountain.jpg','test@test.com', '098f6bcd4621d373cade4e832627b4f6',84,156,194,0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Friend`
--
ALTER TABLE `Friend`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`idFriend`) REFERENCES `User` (`idUser`);
