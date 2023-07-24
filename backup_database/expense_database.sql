-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 19 juil. 2023 à 08:59
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `expense`
--
CREATE DATABASE IF NOT EXISTS `expense` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `expense`;

-- --------------------------------------------------------

--
-- Structure de la table `ADMINISTRATORS`
--

CREATE TABLE `ADMINISTRATORS` (
  `adm_id` int(11) NOT NULL,
  `adm_mail` varchar(50) NOT NULL,
  `adm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ADMINISTRATORS`
--

INSERT INTO `ADMINISTRATORS` (`adm_id`, `adm_mail`, `adm_password`) VALUES
(1, 'admin@admin.fr', '$2y$10$QudcUAMK3LX8KUCz1MVz5ej68VRLT1m8EgvF9BbMnC7egwtuR3SES');

-- --------------------------------------------------------

--
-- Structure de la table `EMPLOYEES`
--

CREATE TABLE `EMPLOYEES` (
  `emp_id` int(11) NOT NULL,
  `emp_lastname` varchar(50) NOT NULL,
  `emp_firstname` varchar(50) NOT NULL,
  `emp_phonenumber` varchar(10) NOT NULL,
  `emp_mail` varchar(50) NOT NULL,
  `emp_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `EXPENSE_REPORT`
--

CREATE TABLE `EXPENSE_REPORT` (
  `exp_id` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `exp_amount_ttc` decimal(15,3) NOT NULL,
  `exp_amount_ht` decimal(15,3) NOT NULL,
  `exp_description` text NOT NULL,
  `exp_proof` varchar(50) NOT NULL,
  `exp_cancel_reason` text,
  `exp_decision_date` date DEFAULT NULL,
  `typ_id` int(11) NOT NULL,
  `sta_id` int(11) NOT NULL DEFAULT '1',
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `STATUS`
--

CREATE TABLE `STATUS` (
  `sta_id` int(11) NOT NULL,
  `sta_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `STATUS`
--

INSERT INTO `STATUS` (`sta_id`, `sta_name`) VALUES
(1, 'en cours'),
(2, 'validée'),
(3, 'refusée');

-- --------------------------------------------------------

--
-- Structure de la table `TYPE`
--

CREATE TABLE `TYPE` (
  `typ_id` int(11) NOT NULL,
  `typ_name` varchar(50) NOT NULL,
  `typ_tva` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TYPE`
--

INSERT INTO `TYPE` (`typ_id`, `typ_name`, `typ_tva`) VALUES
(1, 'habillage', 20),
(2, 'hébergement', 20),
(3, 'kilométrique', 20),
(4, 'repas', 10),
(5, 'déplacement', 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ADMINISTRATORS`
--
ALTER TABLE `ADMINISTRATORS`
  ADD PRIMARY KEY (`adm_id`);

--
-- Index pour la table `EMPLOYEES`
--
ALTER TABLE `EMPLOYEES`
  ADD PRIMARY KEY (`emp_id`);

--
-- Index pour la table `EXPENSE_REPORT`
--
ALTER TABLE `EXPENSE_REPORT`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `EXPENSE_REPORT_TYPE_FK` (`typ_id`),
  ADD KEY `EXPENSE_REPORT_STATUS0_FK` (`sta_id`),
  ADD KEY `EXPENSE_REPORT_EMPLOYEES1_FK` (`emp_id`);

--
-- Index pour la table `STATUS`
--
ALTER TABLE `STATUS`
  ADD PRIMARY KEY (`sta_id`);

--
-- Index pour la table `TYPE`
--
ALTER TABLE `TYPE`
  ADD PRIMARY KEY (`typ_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ADMINISTRATORS`
--
ALTER TABLE `ADMINISTRATORS`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `EMPLOYEES`
--
ALTER TABLE `EMPLOYEES`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `EXPENSE_REPORT`
--
ALTER TABLE `EXPENSE_REPORT`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `STATUS`
--
ALTER TABLE `STATUS`
  MODIFY `sta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `TYPE`
--
ALTER TABLE `TYPE`
  MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `EXPENSE_REPORT`
--
ALTER TABLE `EXPENSE_REPORT`
  ADD CONSTRAINT `EXPENSE_REPORT_EMPLOYEES1_FK` FOREIGN KEY (`emp_id`) REFERENCES `EMPLOYEES` (`emp_id`),
  ADD CONSTRAINT `EXPENSE_REPORT_STATUS0_FK` FOREIGN KEY (`sta_id`) REFERENCES `STATUS` (`sta_id`),
  ADD CONSTRAINT `EXPENSE_REPORT_TYPE_FK` FOREIGN KEY (`typ_id`) REFERENCES `TYPE` (`typ_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
