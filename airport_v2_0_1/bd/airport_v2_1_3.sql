-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2022 at 01:56 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airport_v2_1_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `aeroport`
--

CREATE TABLE `aeroport` (
  `id` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `autresDetails` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aeroport`
--

INSERT INTO `aeroport` (`id`, `nom`, `autresDetails`) VALUES
(1, 'Montreal-Trudeau', 'Grand Aeroport\r\nVille : Montreal\r\n'),
(2, 'Jean Lesage', 'Grand aeroport\r\nVille : Quebec');

-- --------------------------------------------------------

--
-- Table structure for table `avion`
--

CREATE TABLE `avion` (
  `idAvion` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `autresDetails` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nbreSieges` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avion`
--

INSERT INTO `avion` (`idAvion`, `nom`, `autresDetails`, `nbreSieges`) VALUES
(1, 'Airbus A330-200 S', 'Moteurs : 3 Rolls Royce Trent 772B |||\r\nCapacité du réservoir à carburant : 111 272 kg (245 316 lb) |||\r\nVitesse de croisière : 875 km/h (Mach 0,82)', 4000),
(2, 'Airbus A330-30', 'Moteurs : 2 Rolls Royce Trent 772 |||\r\nCapacité du réservoir à carburant : 76 839 kg (169 403 lb) |||\r\nVitesse de croisière : 870 km/h (Mach 0,82)', 375),
(3, 'Airbus A321-200 (A321ceo)', 'Moteurs : 2 GE CFM56-5B3 |||\r\nCapacité du réservoir à carburant : 24 050 l |||\r\nVitesse de croisière : 871 km/h', 190);

-- --------------------------------------------------------

--
-- Table structure for table `donnees_reservations`
--

CREATE TABLE `donnees_reservations` (
  `idDonnee` int NOT NULL,
  `idAvion` int NOT NULL,
  `idAeroport` int NOT NULL,
  `idUtilisateur` int NOT NULL,
  `courriel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donnees_reservations`
--

INSERT INTO `donnees_reservations` (`idDonnee`, `idAvion`, `idAeroport`, `idUtilisateur`, `courriel`) VALUES
(1, 1, 1, 1, ''),
(2, 3, 2, 1, ''),
(3, 2, 1, 1, ''),
(4, 1, 2, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `identifiant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateNaissance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `identifiant`, `dateNaissance`) VALUES
(1, 'Robert', 'Jean', 'J-R10_', ''),
(2, 'Mac', 'Paul', 'Pm29-', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aeroport`
--
ALTER TABLE `aeroport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`idAvion`);

--
-- Indexes for table `donnees_reservations`
--
ALTER TABLE `donnees_reservations`
  ADD PRIMARY KEY (`idDonnee`),
  ADD KEY `idAvion` (`idAvion`),
  ADD KEY `idAeroport` (`idAeroport`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aeroport`
--
ALTER TABLE `aeroport`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `avion`
--
ALTER TABLE `avion`
  MODIFY `idAvion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donnees_reservations`
--
ALTER TABLE `donnees_reservations`
  MODIFY `idDonnee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donnees_reservations`
--
ALTER TABLE `donnees_reservations`
  ADD CONSTRAINT `donnees_reservations_ibfk_1` FOREIGN KEY (`idAeroport`) REFERENCES `aeroport` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donnees_reservations_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donnees_reservations_ibfk_3` FOREIGN KEY (`idAvion`) REFERENCES `avion` (`idAvion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
