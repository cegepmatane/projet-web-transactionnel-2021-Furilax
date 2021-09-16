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
-- Structure de la table `logos`
--

CREATE TABLE `logos` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logos`
--

INSERT INTO `logos` (`id`, `nom`, `auteur`, `description`, `image`, `prix`) VALUES
(1, 'Graminée', 'Gerard Tremblay', 'Vivace semi-aquatique en touffe hérissée, à feuillage décoratif, \r\nsemi-persistant, composé de fines feuilles luisantes, panachées de vert clair et de blanc-crème. \r\nMoins rustique que l&#39espèce type, cette variété s&#39installe en bord de bassin, dans ', 'graminee.jpg', 14.99),
(2, 'Pétunias', 'Gerard Tremblay', 'Petunia est un genre de plantes herbacées vivaces ou annuelles de la famille des Solanaceae, \r\noriginaires des régions tropicales d&#39Amérique du Sud. On dénombre une vingtaine d&#39espèces.', 'petunias.jpg', 10.20),
(3, 'Passiflore', 'Gerard Tremblay', 'Passiflora est un genre de plantes, les passiflores, de plus de 530 espèces de la famille des Passifloraceae. \r\nCe sont des plantes grimpantes aux fleurs spectaculaires, mais leur abondance n&#39est garantie que dans les régions au climat doux.', 'passiflore.jpg', 64.90),
(4, 'Jasmin', 'Gerard Tremblay', 'Le jasmin est un bel arbuste grimpant à la floraison envoûtante et parfumée. \r\nMais cette généralité ne décrit pas toute la diversité que proposent les jasmins. Il en existe en effet diverses espèces, présentant des variétés de feuillage, \r\nde floraison e', 'jasmins.jpg', 9.99),
(5, 'Glaïeuls', 'Gerard Tremblay', 'Fleurs un peu passées de mode, les glaïeuls ont pourtant beaucoup d’attraits, par leur haute taille qui marque les massifs ou les bordures, \r\nleur floraison éclatante et généreuse et leur simplicité de culture. \r\nIls sont aujourd’hui proposés par milliers', 'glaïeuls.jpg', 19.99),
(6, 'Tulipes', 'Gerard Tremblay', 'Cette plante bulbeuse fleurit durant les mois de mars et d’avril. \r\nA planter en fin d’automne, elle a besoin d’un hiver froid et d’un été chaud et sec pour prospérer. \r\nElle s’épanouit dans un sol riche et bien drainé, plutôt alcalin. Robustes et rustiqu', 'tulipes.jpg', 7.59),
(7, 'Buddleia', 'Gerard Tremblay', 'Le buddléia, petit arbre, ressemble au lilas. Ses grandes fleurs sont des épis denses, rose plus ou moins foncé et parfumés. \r\nLeur nectar attire une myriade de papillons durant tout l’été', 'buddleia.jpg', 36.49),
(8, 'Buddleia', 'Gerard Tremblay', 'Le buddléia, petit arbre, ressemble au lilas. Ses grandes fleurs sont des épis denses, rose plus ou moins foncé et parfumés. \r\nLeur nectar attire une myriade de papillons durant tout l’été', 'buddleia.jpg', 36.49),
(9, 'Buddleia', 'Gerard Tremblay', 'Le buddléia, petit arbre, ressemble au lilas. Ses grandes fleurs sont des épis denses, rose plus ou moins foncé et parfumés. \r\nLeur nectar attire une myriade de papillons durant tout l’été', 'buddleia.jpg', 36.49),
(10, 'Buddleia', 'Gerard Tremblay', 'Le buddléia, petit arbre, ressemble au lilas. Ses grandes fleurs sont des épis denses, rose plus ou moins foncé et parfumés. \r\nLeur nectar attire une myriade de papillons durant tout l’été', 'buddleia.jpg', 36.49),
(12, 'Buddleia', 'Gerard Tremblay', 'Le buddléia, petit arbre, ressemble au lilas. Ses grandes fleurs sont des épis denses, rose plus ou moins foncé et parfumés. \r\nLeur nectar attire une myriade de papillons durant tout l’été', 'buddleia.jpg', 36.49),
(13, 'Buddleia', 'Gerard Tremblay', 'Le buddléia, petit arbre, ressemble au lilas. Ses grandes fleurs sont des épis denses, rose plus ou moins foncé et parfumés. \r\nLeur nectar attire une myriade de papillons durant tout l’été', 'buddleia.jpg', 36.49),
(14, 'Leycesteria', 'Gerard Tremblay', 'Le leycesteria ou arbre aux faisans est un très bel arbuste assez peu connu qui a de quoi séduire les jardiniers en quête d’originalité. \r\nSon feuillage élégant et plus encore son étonnante floraison colorée et durable constituent un superbe ornement. \r\nP', 'leycesteria.jpg', 54.76);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
