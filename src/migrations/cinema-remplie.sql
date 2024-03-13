-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 10 mars 2024 à 12:19
-- Version du serveur : 5.7.40
-- Version de PHP : 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` text NOT NULL,
  `NOM` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `AK_CATEGORIES_FILMS` (`NOM`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`ID`, `DESCRIPTION`, `NOM`) VALUES
(1, 'Les films qui font peur', 'Horreur'),
(2, 'Les films imaginaires', 'science-Fiction'),
(3, 'Les films d\'amour', 'romantisme');

-- --------------------------------------------------------

--
-- Structure de la table `classification_age_public`
--

DROP TABLE IF EXISTS `classification_age_public`;
CREATE TABLE IF NOT EXISTS `classification_age_public` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AVERTISSEMENT` varchar(255) NOT NULL,
  `INTITULE` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `AK_CLASSIFICATION_AGE_PUBLIC` (`INTITULE`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classification_age_public`
--

INSERT INTO `classification_age_public` (`ID`, `AVERTISSEMENT`, `INTITULE`) VALUES
(1, '', 'Tous publics'),
(2, '', 'Interdit aux moins de 12 ans'),
(3, '', 'Interdit aux moins de 16 ans'),
(4, '', 'Interdit aux moins de 18 ans non classé X'),
(5, '', 'Interdit aux moins de 18 ans classé X');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) NOT NULL,
  `PRENOM` varchar(255) NOT NULL,
  `ANNEE_ARRIVEE` year(4) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `TELEPHONE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `AK_EMPLOYES` (`MAIL`,`TELEPHONE`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`ID`, `NOM`, `PRENOM`, `ANNEE_ARRIVEE`, `MAIL`, `TELEPHONE`) VALUES
(1, 'Dupont', 'Jean', '2004', 'jean@dupont.fr', '0123456789'),
(2, 'Moulin', 'Agathe', '2010', 'agathe@dumoulin.fr', '9876543210'),
(5, 'Nolan', 'Christopher', '2018', 'christopher@nolan.fr', '0123476789'),
(6, 'Currie', 'Marie', '2010', 'marie@currie.fr', '0876543210');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(255) NOT NULL,
  `URL_AFFICHE` varchar(255) NOT NULL,
  `LIEN_TRAILER` varchar(255) NOT NULL,
  `RESUME` text NOT NULL,
  `DUREE` time NOT NULL,
  `DATE_SORTIE` date NOT NULL,
  `ID_CLASSIFICATION_AGE_PUBLIC` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_FILMS_CLASSIFICATION_AGE_PUBLIC` (`ID_CLASSIFICATION_AGE_PUBLIC`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`ID`, `NOM`, `URL_AFFICHE`, `LIEN_TRAILER`, `RESUME`, `DUREE`, `DATE_SORTIE`, `ID_CLASSIFICATION_AGE_PUBLIC`) VALUES
(1, 'Harry Potter', 'https://images2.fanpop.com/images/photos/6700000/Harry-Potter-3-harry-potter-6761622-1280-1024.jpg', 'https://images2.fanpop.com/images/photos/6700000/Harry-Potter-3-harry-potter-6761622-1280-1024.mp4', 'un film de sorciers', '02:00:00', '2000-03-06', 1),
(2, 'anatomie d\'une chute', 'https://images2.fanpop.com/images/photos/6700000/anatomie-dune-chute.jpg', 'https://images2.fanpop.com/images/photos/6700000/anatomie-dune-chute.mp4', 'un super film de policier fait par chez nous', '01:30:00', '2024-03-06', 2),
(3, 'Dune', 'https://images2.fanpop.com/images/photos/6700000/dune.jpg', 'https://images2.fanpop.com/images/photos/6700000/dune.mp4', 'un super film de science-fiction', '03:30:00', '2024-05-08', 2),
(4, 'Pocahantas', 'https://images2.fanpop.com/images/photos/6700000/Pocahantas.jpg', 'https://images2.fanpop.com/images/photos/6700000/Pocahantas.mp4', 'un disney génial', '03:30:00', '2001-03-06', 1),
(5, 'Sniper', 'https://images2.fanpop.com/images/photos/6700000/Sniper.jpg', 'https://images2.fanpop.com/images/photos/6700000/Sniper.mp4', 'Un film d\'action', '01:30:00', '2015-03-06', 3);

-- --------------------------------------------------------

--
-- Structure de la table `projections`
--

DROP TABLE IF EXISTS `projections`;
CREATE TABLE IF NOT EXISTS `projections` (
  `HORAIRE` datetime NOT NULL,
  `ID_SALLES` int(11) NOT NULL,
  `ID_FILMS` int(11) NOT NULL,
  `ID_EMPLOYES` int(11) NOT NULL,
  PRIMARY KEY (`HORAIRE`,`ID_SALLES`,`ID_FILMS`,`ID_EMPLOYES`),
  KEY `FK_PROJETTE_SALLES` (`ID_SALLES`),
  KEY `FK_PROJETTE_FILMS0` (`ID_FILMS`),
  KEY `FK_PROJETTE_EMPLOYES1` (`ID_EMPLOYES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projections`
--

INSERT INTO `projections` (`HORAIRE`, `ID_SALLES`, `ID_FILMS`, `ID_EMPLOYES`) VALUES
('2024-03-08 15:00:00', 1, 3, 2),
('2024-03-10 13:00:00', 1, 4, 1),
('2024-03-08 17:00:00', 2, 4, 5),
('2020-03-17 17:00:00', 4, 4, 1),
('2021-03-08 17:00:00', 4, 2, 6),
('2024-03-08 15:00:00', 4, 2, 6),
('2024-03-20 20:00:00', 4, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `relations_films_categories`
--

DROP TABLE IF EXISTS `relations_films_categories`;
CREATE TABLE IF NOT EXISTS `relations_films_categories` (
  `ID_CATEGORIES` int(11) NOT NULL,
  `ID_FILMS` int(11) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIES`,`ID_FILMS`),
  KEY `FK_CATEGORISE_FILMS0` (`ID_FILMS`),
  KEY `FK_CATEGORISE_CATEGORIES_FILMS` (`ID_CATEGORIES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `relations_films_categories`
--

INSERT INTO `relations_films_categories` (`ID_CATEGORIES`, `ID_FILMS`) VALUES
(2, 1),
(1, 2),
(2, 3),
(3, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PLACES` int(11) NOT NULL,
  `ACCESSIBILITE` tinyint(1) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `AK_SALLES` (`NOM`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`ID`, `PLACES`, `ACCESSIBILITE`, `NOM`) VALUES
(1, 24, 1, 'Vercors'),
(2, 30, 1, 'Chartreuse'),
(3, 100, 0, 'Devoluy'),
(4, 86, 0, 'Belledonne');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `FK_FILMS_CLASSIFICATION_AGE_PUBLIC` FOREIGN KEY (`ID_CLASSIFICATION_AGE_PUBLIC`) REFERENCES `classification_age_public` (`ID`);

--
-- Contraintes pour la table `projections`
--
ALTER TABLE `projections`
  ADD CONSTRAINT `FK_PROJETTE_EMPLOYES1` FOREIGN KEY (`ID_EMPLOYES`) REFERENCES `employes` (`ID`),
  ADD CONSTRAINT `FK_PROJETTE_FILMS0` FOREIGN KEY (`ID_FILMS`) REFERENCES `films` (`ID`),
  ADD CONSTRAINT `FK_PROJETTE_SALLES` FOREIGN KEY (`ID_SALLES`) REFERENCES `salles` (`ID`);

--
-- Contraintes pour la table `relations_films_categories`
--
ALTER TABLE `relations_films_categories`
  ADD CONSTRAINT `FK_CATEGORISE_CATEGORIES_FILMS` FOREIGN KEY (`ID_CATEGORIES`) REFERENCES `categories` (`ID`),
  ADD CONSTRAINT `FK_CATEGORISE_FILMS0` FOREIGN KEY (`ID_FILMS`) REFERENCES `films` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
