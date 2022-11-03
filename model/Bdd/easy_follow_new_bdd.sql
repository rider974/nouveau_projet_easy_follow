-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 02 nov. 2022 à 10:21
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `easy_follow`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `email`, `password`, `name`, `surname`) VALUES
(1, 'pascal@test.fr', '98', 'pascal', 'MINATCHY'),
(2, 'davis.zitte@gmail.com', '95', 'david', 'Zitte');

-- --------------------------------------------------------

--
-- Structure de la table `vacation`
--

CREATE TABLE `vacation` (
  `idVacation` int(11) NOT NULL,
  `vacationName` varchar(25) NOT NULL,
  `vacationDate` date NOT NULL,
  `beginHour` time NOT NULL,
  `endHour` time NOT NULL,
  `hourRate` float(5,2) NOT NULL,
  `earnings` int(11) DEFAULT NULL,
  `totalHours` int(11) DEFAULT NULL,
  `idUserVacation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vacation`
--

INSERT INTO `vacation` (`idVacation`, `vacationName`, `vacationDate`, `beginHour`, `endHour`, `hourRate`, `earnings`, `totalHours`, `idUserVacation`) VALUES
(1, 'Preparateur de commande', '2022-10-02', '08:35:19', '16:35:19', 12.50, NULL, NULL, 1),
(2, 'Caissier', '2022-09-04', '08:35:19', '16:35:19', 12.50, NULL, NULL, 1),
(3, 'Caissier', '2022-10-11', '08:39:35', '16:39:35', 12.50, NULL, NULL, 2),
(4, 'Caissier', '2022-10-16', '08:39:35', '16:39:35', 12.50, NULL, NULL, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`idVacation`),
  ADD KEY `fk_vacation` (`idUserVacation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `idVacation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `fk_vacation` FOREIGN KEY (`idUserVacation`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;