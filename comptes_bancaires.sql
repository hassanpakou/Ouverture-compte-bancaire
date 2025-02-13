-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Juillet 2024 à 00:59
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `comptes_bancaires`
--

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE IF NOT EXISTS `comptes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `type_compte` enum('courant','epargne','salaire','autre') NOT NULL,
  `devise` enum('franc','dollar') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `numero_compte` varchar(12) NOT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `numero_compte` (`numero_compte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `comptes`
--

INSERT INTO `comptes` (`id`, `nom`, `email`, `mot_de_passe`, `date_naissance`, `type_compte`, `devise`, `photo`, `signature`, `numero_compte`, `date_creation`) VALUES
(1, 'John Doe', 'john.doe@gmail.com', 'password123', '1980-01-01', 'courant', 'dollar', 'photo.jpg', 'signature.png', '', '2024-07-15 14:06:01'),
(6, 'John Doe', 'john.doe@example.com', 'password123', '1980-01-01', 'courant', 'dollar', 'photo.jpg', 'signature.png', '123456789012', '2024-07-15 14:18:03'),
(7, 'Phaku', 'phakunestor@gmail.com', '$2y$10$fUsuPB0MAUCJH/rkDpqKO.InY1n82YTdtBLv3O2iysL8iGXqgYe/K', '2001-06-12', 'courant', 'franc', '../uploads/IMG-20240709-WA0205_1.jpg', '../uploads/1357021724987.jpg', '357616762278', '2024-07-15 14:18:03'),
(11, 'Phaku', 'phakst@gmail.com', '$2y$10$oOB2tRJ1Ywg1meAGkfMTnulgfZxUAFSLMUfH/F3yCpAljvWGEMrfm', '2001-06-12', 'salaire', 'dollar', '../uploads/IMG-20240709-WA0205_1.jpg', '../uploads/1357021724987.jpg', '835028256285', '2024-07-15 14:22:08'),
(14, 'Phaku', 'phat@gmail.com', '$2y$10$yDHhvuh.20hL16h/GEh3Pe2x9qFHLsEAApk/cx3xBztPFb8pVodly', '2001-06-12', 'salaire', 'dollar', '../uploads/IMG-20240709-WA0205_1.jpg', '../uploads/1357021724987.jpg', '743778506986', '2024-07-15 14:23:15'),
(15, 'Phaku', 'pha@gmail.com', '$2y$10$ZORaBFS9uiUTkgwgDPoXyOYSv5xctHzmeUnv47bEJPtxRtgYLxJGq', '2001-06-12', 'salaire', 'dollar', '../uploads/IMG-20240709-WA0205_1.jpg', '../uploads/1357021724987.jpg', '069398856167', '2024-07-15 14:25:33'),
(16, 'Kaboyi', 'kaboyi@gmail.com', '$2y$10$gy.hOsN//U54.72dwAsti.i3nNZk5mW1aD0qTz79xAwkIKVpgaqEi', '2003-09-29', 'epargne', 'dollar', '../uploads/IMG-20240709-WA0205_1.jpg', '../uploads/IMG-20240709-WA0205_1.jpg', '070020261253', '2024-07-15 14:43:26'),
(19, 'ARCHIP', 'archip@gmail.com', '$2y$10$UfuzwAPWIV2pBylyNao0AO0ecx7BIzCUQ9EdlLREOEP2XmsmUIRq6', '2000-02-02', 'salaire', 'dollar', '../uploads/IMG-20240709-WA0205_1.jpg', '../uploads/IMG-20240709-WA0205_1.jpg', '561600106089', '2024-07-15 16:11:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
