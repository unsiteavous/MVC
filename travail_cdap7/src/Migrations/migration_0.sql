-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 28 mai 2025 à 12:12
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvcp7`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `url_affiche` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `duree` datetime NOT NULL,
  `date_sortie` datetime NOT NULL,
  `realisateur` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `url_affiche`, `duree`, `date_sortie`, `realisateur`) VALUES
(1, 'Pocahontas', 'https://m.media-amazon.com/images/I/917YiJimfmL._AC_UF1000,1000_QL80_.jpg', '0000-00-00 00:00:00', '1995-01-01 00:00:00', 'Disney');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `created_at`) VALUES
(1, 'Dupont', 'Claude', 'claude.dupont@gmail.com', 'ohisbguisrelsfwjiensdufi', '2025-05-21 14:10:19'),
(2, 'Dupont', 'Claudine', 'claudine@dupont.fr', 'skfhbesuj', '2025-05-03 14:10:24'),
(4, 'Moulin', 'Jean', 'jean@moulin.fr', '$2y$10$7atT47OGxrurO1Ti6JEkbOluODmTDEecG0af/eGpaUDK11R1GszSa', '2025-05-22 14:01:25'),
(6, 'Test', 'Test', 'test@est.fr', '$2y$10$k7B1j.VNihXlyne3dfXXyeujFedl4jpmSp0smSPia7ZsjEHFlXZzu', '2025-05-23 12:49:40'),
(7, 'Aze', 'Arty', 'a@a.de', '$2y$10$zty9yUkuIg5mP3w80L6SjufR9o69mT0sk.huV6HSH8GGMnmya55R6', '2025-05-23 12:51:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
