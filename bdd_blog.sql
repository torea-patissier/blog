-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 22 fév. 2021 à 13:52
-- Version du serveur :  5.7.30
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(34, 'Le rugby ça pique les fesses!', 10, 41, '2021-02-22 13:08:46'),
(35, 'Les cathédrales au rugby c\'est pas des monuments religieux', 10, 41, '2021-02-18 11:08:44'),
(36, 'Chabal descendrait directement de l\'homme des cavernes', 10, 41, '2021-02-18 11:09:01'),
(37, 'Mbappé le triplé', 10, 42, '2021-02-18 11:09:09'),
(38, 'Zizou le S', 10, 42, '2021-02-18 11:09:16'),
(39, 'CR 7 volta', 10, 42, '2021-02-18 11:09:25'),
(40, 'Beach volley pour les fesses', 10, 43, '2021-02-18 11:11:29'),
(41, 'J\'ai toujours été nul au volley', 10, 43, '2021-02-18 11:11:39'),
(42, 'Chasse au canard', 10, 44, '2021-02-18 11:11:48'),
(43, 'Chasse au sanglier', 10, 44, '2021-02-18 11:11:56'),
(44, 'Pêche du samedi soir', 10, 45, '2021-02-18 11:12:04'),
(45, 'Pêche à la traine', 10, 45, '2021-02-18 11:12:14'),
(46, 'Tires la chasse', 10, 44, '2021-02-22 12:03:04'),
(47, 'Gardes la pêche', 10, 45, '2021-02-22 12:03:21'),
(48, 'All blacks', 10, 41, '2021-02-22 12:03:29');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(41, 'Rugby'),
(42, 'Foot'),
(43, 'Volley'),
(44, 'Chasse'),
(45, 'Pêche');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'Moi aussi j\'aime le rugby', 1, 3, '2021-01-26 09:27:14'),
(2, 'Mais j\'aime aussi le foot parce que je suis portugais ', 3, 3, '2021-01-26 09:27:14'),
(5, 'J\'ai jamais eu la wii', 4, 3, '2021-01-26 09:28:06'),
(6, 'Lol', 33, 10, '2021-02-17 16:29:08'),
(7, 'Pourquoi', 33, 10, '2021-02-17 16:29:18'),
(8, 'Top', 45, 10, '2021-02-18 12:57:12'),
(9, 'Super', 35, 10, '2021-02-18 13:05:15'),
(10, 'Je me suis tiré dans le pied droit', 43, 10, '2021-02-18 13:27:56'),
(11, 'Lol trop drôle', 34, 10, '2021-02-19 14:38:20'),
(12, 'Super', 48, 10, '2021-02-22 12:06:16'),
(13, 'Lol', 48, 10, '2021-02-22 12:06:19'),
(14, 'Drôle', 48, 10, '2021-02-22 12:06:25');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `username`, `password`, `email`, `id_droits`) VALUES
(8, 'toreapat', 'toto', '$2y$12$foMstramYARmMfpb3qSQsOpc.K5o/89tUo1DVl1J2yWOVA4trIU7u', 'p.torea@icloud.com', 1337),
(9, 'Nuno', 'elnuno', '$2y$12$.CzFPCZeMmHi/2fWdBuOLOsoajnL/R.D7loXTDWPQCMabOhRt82se', 'nuno@gmail.fr', 5),
(10, 'torea', 'torea', '$2y$12$ZzBSA3sRoenMpsag51ErJuUl/aDIr7VDdiF13cXvbysl1IB/jge3G', 'torea@gmail.fr', 1337),
(11, 'adriano', 'ad', '$2y$12$heUH1ig9RiDN1yPxImVGSO/JRh8FqxQobeRGrW5euv4bYMkiJfc5S', 'ad@gmail.fr', 42),
(12, 'teva', 'tete', '$2y$12$yMtWoF1Pq5emB0ke65ZqoOcvVaApW/Igg51o4hoPWeXp/CygmRS.O', 'teva@gmail.fr', 1),
(13, 'momo', 'momo', '$2y$12$w0CdC0.Fo87jHcd44sDe5evzBloDpzqI50eSK7Xa70moW0Szyug2G', 'momo@gmail.fr', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1338;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
