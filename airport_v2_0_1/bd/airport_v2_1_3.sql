-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2022 at 05:18 PM
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
  `nbreSieges` int NOT NULL,
  `urlModele` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `efface` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avion`
--

INSERT INTO `avion` (`idAvion`, `nom`, `autresDetails`, `nbreSieges`, `urlModele`, `efface`) VALUES
(1, 'Airbus A330-200 S', 'Moteurs : 3 Rolls Royce Trent 772B |||\r\nCapacité du réservoir à carburant : 111 272 kg (245 316 lb) |||\r\nVitesse de croisière : 875 km/h (Mach 0,82)', 234, 'http://www.m', 0),
(2, 'Airbus A330-30', 'Moteurs : 2 Rolls Royce Trent 772 |||\nCapacité du réservoir à carburant : 76 839 kg (169 403 lb) |||\nVitesse de croisière : 870 km/h (Mach 0,82)', 375, 'http://www.mostov', 0),
(3, 'Airbus A321-200 (A321ceo)', 'Moteurs : 2 GE CFM56-5B3 |||\r\nCapacité du réservoir à carburant : 24 050 l |||\r\nVitesse de croisière : 871 km/h', 190, 'http://www.m', 0),
(10, 'dsad', 'dsadsa', 123, '321', 0),
(11, 'Airbus A321neoLR', 'dsadas', 122, 'http://www.m', 1),
(12, 'dsa', 'dsa', 213, 'http://www.m', 0);

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
(8, 2, 1, 2, 'william4800@hotmail.com'),
(9, 1, 1, 2, 'william4800@hotmail.com'),
(10, 1, 1, 2, 'william4800@hotmail.com'),
(11, 12, 2, 2, 'william4800@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `types_avion`
--

CREATE TABLE `types_avion` (
  `id` int NOT NULL,
  `nomAvion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types_avion`
--

INSERT INTO `types_avion` (`id`, `nomAvion`) VALUES
(1, 'Airbus A321-200 (A321ceo)'),
(2, 'Airbus A321neoLR'),
(3, 'Airbus A330-200'),
(4, 'Airbus A330-300');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `identifiant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `identifiant`, `mot_de_passe`) VALUES
(1, 'William Sta', 'wSta', 'wSta'),
(2, 'Gestionnaire', 'admin', 'admin');

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
-- Indexes for table `types_avion`
--
ALTER TABLE `types_avion`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `idAvion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donnees_reservations`
--
ALTER TABLE `donnees_reservations`
  MODIFY `idDonnee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `types_avion`
--
ALTER TABLE `types_avion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
