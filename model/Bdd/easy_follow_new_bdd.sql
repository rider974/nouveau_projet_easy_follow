-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2022 at 11:44 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easy_follow`
--
CREATE DATABASE IF NOT EXISTS `easy_follow` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `easy_follow`;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUser`, `email`, `motDePasse`, `prenom`, `nom`) VALUES
(1, 'pascal@test.fr', '98', 'pascal', 'MINATCHY'),
(2, 'davis.zitte@gmail.com', '95', 'david', 'Zitte');

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

DROP TABLE IF EXISTS `vacation`;
CREATE TABLE IF NOT EXISTS `vacation` (
  `idVacation` int NOT NULL AUTO_INCREMENT,
  `nomMission` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `tauxHoraireGain` float(5,2) NOT NULL,
  `gainObtenu` int DEFAULT NULL,
  `nbHeuresTravail` int DEFAULT NULL,
  `idUserVacation` int NOT NULL,
  PRIMARY KEY (`idVacation`),
  KEY `fk_vacation` (`idUserVacation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`idVacation`, `nomMission`, `date`, `heureDebut`, `heureFin`, `tauxHoraireGain`, `gainObtenu`, `nbHeuresTravail`, `idUserVacation`) VALUES
(1, 'Preparateur de commande', '2022-10-02', '08:35:19', '16:35:19', 12.50, NULL, NULL, 1),
(2, 'Caissier', '2022-09-04', '08:35:19', '16:35:19', 12.50, NULL, NULL, 1),
(3, 'Caissier', '2022-10-11', '08:39:35', '16:39:35', 12.50, NULL, NULL, 2),
(4, 'Caissier', '2022-10-16', '08:39:35', '16:39:35', 12.50, NULL, NULL, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `fk_vacation` FOREIGN KEY (`idUserVacation`) REFERENCES `utilisateurs` (`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
