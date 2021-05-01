-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 30 avr. 2021 à 14:42
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `timbre`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210415094750', '2021-04-15 11:48:07', 49),
('DoctrineMigrations\\Version20210415163956', '2021-04-15 18:40:15', 141),
('DoctrineMigrations\\Version20210416085052', '2021-04-16 10:51:13', 243),
('DoctrineMigrations\\Version20210416111659', '2021-04-16 13:17:10', 36);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `image`) VALUES
(1, 'Belgique', 'be.png'),
(2, 'Grande-Bretagne', 'gb.png'),
(3, 'Hawaï', 'io.png'),
(4, 'Autriche', 'at.png'),
(5, 'Australie', 'au.png'),
(7, 'France', 'fr.png');

-- --------------------------------------------------------

--
-- Structure de la table `timbre`
--

CREATE TABLE `timbre` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valeur` double NOT NULL,
  `pays_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `timbre`
--

INSERT INTO `timbre` (`id`, `nom`, `annee`, `image`, `valeur`, `pays_id`) VALUES
(6, 'Penny black', 1840, 'collection/onePenny.png', 3000, 2),
(7, 'Black Swan inversé', 1983, 'collection/fourPence.png', 35500, 5),
(8, 'Red Mercury', 1949, 'collection/Lucia.png', 37000, 4),
(9, 'Missionnaires d\'Hawaï', 1852, 'collection/Hawai.png', 39000, 3),
(10, 'Termonde renversé', 1920, 'collection/Belgique.jpg', 75000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `password`, `roles`) VALUES
(3, 'michael', '$argon2id$v=19$m=65536,t=4,p=1$N1JkcjlIVjNseElQNEpuMg$7AVmI1RfJ9axl4DqHwH/ST9eNMBp6EC2KpHilGTiXY8', 'ROLE_USER'),
(4, 'admin', '$argon2id$v=19$m=65536,t=4,p=1$d3I5RGF6WFUyVHdBNWZNSw$f/cnw0uD7G4gvgKaEI+XHwuO2MS1Ma4afGrzahRQeuw', 'ROLE_ADMIN'),
(5, 'tototo', '$argon2id$v=19$m=65536,t=4,p=1$Q3ZOaTd0ME9aRDFRSlVQNg$rq1Sn7ov/TZ56wgBxC+7wA18eG89RakA+iQn4x3GYtI', 'ROLE_USER'),
(7, 'tytyty', '$argon2id$v=19$m=65536,t=4,p=1$TzR5NHZQUlgxcnZIb3MuVA$MpEMgg+8ZDwJCdWmL5iH+YGgmVrRZXhG76PSJABoIjA', 'ROLE_USER'),
(8, 'fffff', '$argon2id$v=19$m=65536,t=4,p=1$b2JFU2Y4MFFRU0E0NDBseg$X2xtoU5hVThmDS1k9xrJyUZnQg5YJ4bHlzR56oSkAbY', 'ROLE_USER'),
(9, 'azerty', '$argon2id$v=19$m=65536,t=4,p=1$L3drODVGbHJ6NGtSZEdDMw$ny2LZpLYpi2srMQQqyJPkx63AXBwXNtG9OHxahFHtdQ', 'ROLE_USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `timbre`
--
ALTER TABLE `timbre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_179D457BA6E44244` (`pays_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `timbre`
--
ALTER TABLE `timbre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `timbre`
--
ALTER TABLE `timbre`
  ADD CONSTRAINT `FK_179D457BA6E44244` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
