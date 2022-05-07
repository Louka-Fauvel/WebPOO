-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 28 avr. 2021 à 16:14
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mabase_fl`
--

-- --------------------------------------------------------

--
-- Structure de la table `tusers`
--

CREATE TABLE `tusers` (
  `id` int(11) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `naissance` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `bac` varchar(30) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tusers`
--

INSERT INTO `tusers` (`id`, `prenom`, `nom`, `naissance`, `photo`, `email`, `password`, `adresse`, `bac`, `commentaire`) VALUES
(0, 'Léonidas', 'Sheeban', '2001-09-01', 'profilLéonidas.png', 'leonidas.sheeban@gmail.com', '1a2z3e', 'Rouen', 'Bac S', 'J\'espère que ça marche !'),
(1, 'Akou', 'Velfeau', '2001-10-15', 'profilAkou.png', 'akou.velfeau@gmail.com', 'azerty', 'Caen', 'Bac STI2D', 'Bonjour !'),
(2, 'Iris', 'Sheeban', '1995-05-30', 'profilIris.png', 'iris.sheeban@gmail.com', 'ytreza', 'Le Mans', 'Bac SIO', 'Une belle vie'),
(3, 'Nicolas', 'Lebelanger', '2001-12-12', 'profilNicolas.png', 'nicolas.lebelanger@sts-sio-caen.info', '12345', 'Carpiquet', 'Bac ES', 'C\'est calme aujourd\'hui'),
(15, 'Louka', 'Fauvel', '2001-10-15', 'profilLouka.png', 'louka.fauvel@gmail.com', '1a2z3e', 'Caen', 'Bac STI2D', 'Je vous vois');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tusers`
--
ALTER TABLE `tusers`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
