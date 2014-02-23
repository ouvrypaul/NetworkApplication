-- Généré le: Jeu 13 Février 2014 à 19:58
-- Version du serveur: 5.5.33
-- Version de PHP: 5.5.3
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
(2, 5, 1),
(2, 6, 0),
(2, 9, 0),
(2, 10, 1),
(2, 14, 1),
(2, 15, 1),
(2, 16, 1),
(2, 27, 1),
(2, 31, 1),
(3, 2, 1),
(3, 6, 0),
(4, 2, 0),
(5, 2, 1),
(10, 2, 1),
(12, 2, 0),
(13, 2, 0),
(14, 2, 1),
(15, 2, 1),
(16, 2, 1),
(27, 2, 1),
(31, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `imagePath` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`idUser`, `username`, `imagePath`) VALUES
(1, 'admin', 'none.png'),
(2, 'ouvrypaul', 'paul.jpg'),
(3, 'noelstepha', 'stephanie.jpg'),
(4, 'florentgo', 'florent.jpg'),
(5, 'dufaunicol', 'nicolas.jpg'),
(6, 'daviddogne', 'david.jpg'),
(7, 'lepagethom', 'thomasl.jpg'),
(8, 'giovannini', 'thomas.jpg'),
(9, 'example1', 'none.png'),
(10, 'example2', 'none.png'),
(11, 'example3', 'none.png'),
(12, 'example4', 'none.png'),
(13, 'example5', 'none.png'),
(14, 'example6', 'none.png'),
(15, 'example7', 'none.png'),
(16, 'example8', 'none.png'),
(25, 'ouvrylea', 'lea.jpg'),
(27, 'ouvryarthu', 'arthur.jpg'),
(31, 'marechalad', 'adrienne.jpg');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Friend`
--
ALTER TABLE `Friend`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`idFriend`) REFERENCES `User` (`idUser`);
