-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2023 at 05:04 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lscustom`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` int NOT NULL,
  `datea` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `titre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `extrait` varchar(999) COLLATE utf8mb4_general_ci NOT NULL,
  `article` varchar(999) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_message` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `object` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enchere`
--

CREATE TABLE `enchere` (
  `Id_enchere` int NOT NULL,
  `Identité_vendeur` varchar(999) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `identité_acheteur` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `plaque` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modele` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prix_depart` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prix_achat` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Id_photo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `Id_Facture` int NOT NULL,
  `Nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Prenom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Plaque` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DateFacture` datetime DEFAULT NULL,
  `Performance` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Custom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Reparation` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Total` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galerie`
--

CREATE TABLE `galerie` (
  `Id_Galerie` int NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galerie`
--

INSERT INTO `galerie` (`Id_Galerie`, `photo`) VALUES
(2, 'Bufallo1805.png'),
(3, '1.png'),
(4, '2.png'),
(5, '3.png'),
(6, '4.png');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `Id_photo` int NOT NULL,
  `url` varchar(999) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_enchere`
--

CREATE TABLE `photo_enchere` (
  `Id_photo` int NOT NULL,
  `url` varchar(999) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Client'),
(2, 'Employer'),
(3, 'Chef Mecano'),
(4, 'Patron');

-- --------------------------------------------------------

--
-- Table structure for table `salaire`
--

CREATE TABLE `salaire` (
  `Id_Salaire` int NOT NULL,
  `datesalaire` date DEFAULT NULL,
  `Salaire` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `photousers` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Nom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Prenom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mdp` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

CREATE TABLE `vente` (
  `Id_Vente` int NOT NULL,
  `Identité_vendeur` varchar(999) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `identité_acheteur` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `plaque` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modele` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prix_vente` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Id_photo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`Id_enchere`),
  ADD KEY `Id_photo` (`Id_photo`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`Id_Facture`),
  ADD KEY `Id_users` (`Id_users`);

--
-- Indexes for table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`Id_Galerie`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`Id_photo`);

--
-- Indexes for table `photo_enchere`
--
ALTER TABLE `photo_enchere`
  ADD PRIMARY KEY (`Id_photo`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `salaire`
--
ALTER TABLE `salaire`
  ADD PRIMARY KEY (`Id_Salaire`),
  ADD KEY `Id_users` (`Id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`Id_Vente`),
  ADD KEY `Id_photo` (`Id_photo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enchere`
--
ALTER TABLE `enchere`
  MODIFY `Id_enchere` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `Id_Facture` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `Id_Galerie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `Id_photo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_enchere`
--
ALTER TABLE `photo_enchere`
  MODIFY `Id_photo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salaire`
--
ALTER TABLE `salaire`
  MODIFY `Id_Salaire` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `Id_Vente` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`Id_photo`) REFERENCES `photo_enchere` (`Id_photo`);

--
-- Constraints for table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`Id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `salaire`
--
ALTER TABLE `salaire`
  ADD CONSTRAINT `salaire_ibfk_1` FOREIGN KEY (`Id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`Id_photo`) REFERENCES `photo` (`Id_photo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
