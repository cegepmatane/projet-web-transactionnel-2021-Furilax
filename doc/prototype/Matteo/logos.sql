-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 12 sep. 2021 à 19:40
-- Version du serveur :  8.0.26-0ubuntu0.20.04.2
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `logos`
--

-- --------------------------------------------------------

--
-- Structure de la table `logo`
--

CREATE TABLE `logo` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `publication` date NOT NULL,
  `prix` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logo`
--

INSERT INTO `logo` (`id`, `nom`, `auteur`, `description`, `publication`, `prix`, `image`) VALUES
(1, 'Baskangel', 'Gerard Tremblay', 'Description Ici', '2021-09-23', 14.99, 'baskangel.jpg'),
(2, 'AgriCool', 'Catherine Lowe', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(3, 'AgriCool', 'Codey Heaton', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(4, 'AgriCool', 'Gerard Tremblay', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(5, 'AgriCool', 'Kalvin Swanson', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(6, 'AgriCool', 'Charli Mcgee', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(7, 'AgriCool', 'Lea Wade', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(8, 'AgriCool', 'Holli Mcnally', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(9, 'AgriCool', 'Nabil Whelan', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(10, 'AgriCool', 'Kalvin Swanson', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(11, 'AgriCool', 'Catherine Lowe', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(12, 'AgriCool', 'Lea Wade', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(13, 'AgriCool', 'Holli Mcnally', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg'),
(14, 'AgriCool', 'Codey Heaton', 'Description Ici', '2021-09-23', 10.20, 'agriculture.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
