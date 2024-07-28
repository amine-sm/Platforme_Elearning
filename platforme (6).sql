-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 28 juin 2024 à 17:36
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `platforme`
--

-- --------------------------------------------------------

--
-- Structure de la table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `assignment_title` varchar(255) NOT NULL,
  `assignment_details` text NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `fichier` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `assignment_title`, `assignment_details`, `level_id`, `module_id`, `fichier`, `user_id`) VALUES
(2, 'hjn', 'hjkk', NULL, 1, 'uploads//Exo1 et 2 CCNA1.pdf', 1),
(4, 'jkjk', 'ujk', NULL, 1, 'uploads//memoire final.docx', 0),
(5, 'wassimtd', 'trh', NULL, 1, 'uploads//ETAT1.pdf', 5);

-- --------------------------------------------------------

--
-- Structure de la table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `exam_title` varchar(255) NOT NULL,
  `exam_details` text NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `fichier` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_title`, `exam_details`, `level_id`, `module_id`, `fichier`, `user_id`) VALUES
(1, 'ASD 1 examen', '2022', 1, 1, '', 1),
(8, 'gfh', 'ghgfh', NULL, 1, 'uploads//Cisco - Modes iOS et Commandes de base.pdf', 0),
(9, ',jkjkk', ';;,:,;lkll', NULL, 5, 'uploads//Rapport_de_Stage20200402-34813-1iiin52.pdf', 0),
(10, 'lul', 'ilo', NULL, 1, 'uploads//Rapport_de_Stage20200402-34813-1iiin52.pdf', 0),
(11, 'hjh', 'hj', NULL, 1, 'uploads//memoire final.docx', 0),
(12, 'ghgjh', 'hj', NULL, 1, 'uploads//memoire version 2.pdf', 0),
(13, 'ggyh', 'fghg', NULL, 1, 'uploads//Exo1 et 2 CCNA1.pdf', 0),
(14, 'examen ASD 2019', 'dffh', NULL, 1, 'uploads//ETAT1.pdf', 0),
(16, 'dss ', 'tgthr', NULL, 1, 'uploads//ETAT1.pdf', 5),
(18, 'Asd 1 2023', 'Dhdh', NULL, 1, 'The upload directory is not writable.', 17);

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `lesson_title` varchar(255) NOT NULL,
  `lesson_content` text NOT NULL,
  `level_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `fichier` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `lesson_title`, `lesson_content`, `level_id`, `module_id`, `fichier`, `user_id`) VALUES
(11, 'nghjh', 'hjuhj', NULL, 1, 'uploads//Rapport_de_Stage20200402-34813-1iiin52.pdf', 1),
(12, 'hghjgh', 'jkjj', NULL, 1, 'uploads//memoire final.docx', 0),
(13, 'les suites', 'suite math', NULL, 4, 'uploads//Exo1 et 2 CCNA1.pdf', 0),
(14, 'hhjhnghj', 'ghjhj', NULL, 1, 'uploads//pexels-chokniti-khongchum-2280549.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(255) NOT NULL,
  `specialty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `levels`
--

INSERT INTO `levels` (`level_id`, `level_name`, `specialty_id`) VALUES
(1, 'L1 Informatique', 1),
(2, 'L2 Informatique', 1),
(3, 'L3 Biologie', 2),
(4, 'L1 Biologie', 2),
(5, 'L1 Chimie', 3),
(6, 'Informatique L3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_details` text DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `module_details`, `level_id`) VALUES
(1, 'ASD1', 'algorithme', 1),
(2, 'MATH', 'MAth', 5),
(4, 'analyse 1', NULL, 1),
(5, 'ASD 3', 'Algo3', 2),
(7, 'chimie', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `specialties`
--

CREATE TABLE `specialties` (
  `specialty_id` int(11) NOT NULL,
  `specialty_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `specialties`
--

INSERT INTO `specialties` (`specialty_id`, `specialty_name`, `image`) VALUES
(1, 'Informatique', 'uploads/pexels-pixabay-270557.jpg'),
(2, 'Biologie', 'uploads/pexels-chokniti-khongchum-2280547.jpg'),
(3, 'ST', 'uploads/pexels-chokniti-khongchum-2280549.jpg'),
(5, 'electronqiue', 'uploads/pexels-pixabay-459411.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Specialite` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `nom`, `prenom`, `username`, `email`, `password`, `Specialite`, `niveau`, `role`) VALUES
(15, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$8jVvIkhan4RmDi1LRu9nu.GWmv7pnyb.9n2gA8NZiu1HQ6H9WeDLW', 'none', 'none', 1),
(23, 'user', 'user', 'user', 'user@gmail.com', '$2y$10$Y8IvyTc.h971eHe0bzS7P.6jdi.do4f8rJ3uOoDlfPeAkVNUZkByy', 'info', 'Licence 1', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Index pour la table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Index pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `specialty_id` (`specialty_id`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Index pour la table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`specialty_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`);

--
-- Contraintes pour la table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`);

--
-- Contraintes pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`),
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`);

--
-- Contraintes pour la table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_ibfk_1` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`specialty_id`);

--
-- Contraintes pour la table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
