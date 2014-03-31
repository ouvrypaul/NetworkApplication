-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 25 Mars 2014 à 18:42
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
  `rejected` int(11) NOT NULL,
  `new` int(11) NOT NULL,
   `date` DATETIME NOT NULL,
  PRIMARY KEY (`idUser`,`idFriend`),
  KEY `fk_2` (`idFriend`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Friend`
--

INSERT INTO `Friend` (`idUser`, `idFriend`, `accepted`, `rejected`, `new`,`date`) VALUES
(2, 4, 1, 0, 0,'2014-03-28 12:00:00'),
(2, 6, 0, 0, 0,'2014-03-28 12:00:00'),
(2, 9, 0, 0, 0,'2014-03-28 12:00:00'),
(2, 11, 1, 0, 0,'2014-03-28 12:00:00'),
(2, 12, 1, 0, 0,'2014-03-28 12:00:00'),
(2, 13, 1, 0, 0,'2014-03-28 12:00:00'),
(2, 15, 1, 0, 0,'2014-03-28 12:00:00'),
(2, 16, 1, 0, 0,'2014-03-28 12:00:00'),
(2, 27, 1, 0, 0,'2014-03-28 12:00:00'),
(2, 31, 1, 0, 0,'2014-03-28 12:00:00'),
(3, 2, 0, 1, 0,'2014-03-28 12:00:00'),
(3, 6, 0, 0, 0,'2014-03-28 12:00:00'),
(4, 2, 1, 0, 0,'2014-03-28 12:00:00'),
(11, 2, 1, 0, 0,'2014-03-28 12:00:00'),
(12, 2, 1, 0, 0,'2014-03-28 12:00:00'),
(13, 2, 1, 0, 0,'2014-03-28 12:00:00'),
(15, 2, 1, 0, 0,'2014-03-28 12:00:00'),
(16, 2, 1, 0, 0,'2014-03-28 12:00:00'),
(27, 2, 1, 0, 0,'2014-03-28 12:00:00'),
(31, 2, 1, 0, 0,'2014-03-28 12:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Message`
--

CREATE TABLE `Message` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `idSender` int(11) NOT NULL,
  `idReceiver` int(11) NOT NULL,
  `text` varchar(400) COLLATE utf8_bin NOT NULL,
  `isImage` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `seen` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`idMessage`),
  KEY `fk_3` (`idSender`),
  KEY `fk_4` (`idReceiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=41 ;

--
-- Contenu de la table `Message`
--

INSERT INTO `Message` (`idMessage`, `idSender`, `idReceiver`, `text`, `isImage`, `time`, `seen`,`date`) VALUES
(1, 2, 6, 'test', 0, 1, 0,'2014-03-28 12:00:00'),
(2, 2, 9, 'test', 0, 1, 0,'2014-03-28 12:00:00'),
(3, 2, 15, 'Je suis un test', 0, 9, 0,'2014-03-28 12:00:00'),
(4, 2, 11, 'Je suis un test', 0, 9, 0,'2014-03-28 12:00:00'),
(5, 2, 12, 'Je suis un test', 0, 9, 0,'2014-03-28 12:00:00'),
(6, 2, 9, 'Je suis un test', 0, 9, 0,'2014-03-28 12:00:00'),
(7, 11, 2, '../img/profil/ouvrypaul/david.jpg', 1, 10, 0,'2014-03-28 12:00:00'),
(9, 2, 9, '../img/profil/ouvrypaul/background.jpg', 1, 5, 0,'2014-03-28 12:00:00'),
(10, 2, 16, 'dsqdsqdsq', 0, 5, 0,'2014-03-28 12:00:00'),
(14, 2, 9, 'qsdqsqs', 0, 1, 0,'2014-03-28 12:00:00'),
(15, 2, 12, 'qsdqsqs', 0, 1, 0,'2014-03-28 12:00:00'),
(16, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(17, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(18, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(19, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(20, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(23, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(24, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(25, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(26, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(27, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(29, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(31, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(33, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(34, 6, 2, 'sqdq', 0, 5, 0,'2014-03-28 12:00:00'),
(35, 2, 12, 'sqdq', 0, 1, 0,'2014-03-28 12:00:00'),
(36, 2, 6, 'dsqqsqs', 0, 1, 0,'2014-03-28 12:00:00');

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
  `red` int(3) NOT NULL,
  `green` int(3) NOT NULL,
  `blue` int(3) NOT NULL,
  `text` int(1) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=33 ;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`idUser`, `username`, `imagePath`, `coverPath`, `email`, `password`, `red`, `green`, `blue`, `text`) VALUES
(1, 'admin', 'none.png', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(2, 'ouvrypaul', 'ouvrypaul/paul.jpg', 'ouvrypaul/beach.jpeg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 211, 152, 59, 0),
(3, 'noelstepha', 'noelstepha/stephanie.jpg', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(4, 'florentgo', 'florentgo/florent.jpg', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(5, 'dufaunicol', 'dufaunicol/nicolas.jpg', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(6, 'daviddogne', 'daviddogne/david.jpg', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(7, 'lepagethom', 'lepagethom/thomasl.jpg', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(8, 'giovannini', 'giovannini/thomas.jpg', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(9, 'example1', 'none.png', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(11, 'example3', 'none.png', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(12, 'example4', 'none.png', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(13, 'example5', 'none.png', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(15, 'example7', 'none.png', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(16, 'example8', 'none.png', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(25, 'ouvrylea', 'ouvrylea/lea.jpg', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(27, 'ouvryarthu', 'ouvryarthu/arthur.jpg', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(31, 'marechalad', 'marechalad/adrienne.jpg', 'mountain.jpg', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 84, 156, 194, 0),
(32, 'jepaul', 'none.png', 'mountain.jpg', 'jepaul@jepaul.fr', 'ab4f63f9ac65152575886860dde480a1', 84, 156, 194, 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Friend`
--
ALTER TABLE `Friend`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`idFriend`) REFERENCES `User` (`idUser`);

--
-- Contraintes pour la table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`idSender`) REFERENCES `User` (`idUser`),
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`idReceiver`) REFERENCES `User` (`idUser`);
