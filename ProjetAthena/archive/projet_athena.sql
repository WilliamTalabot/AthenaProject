-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 23 Février 2016 à 09:25
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_athena`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE IF NOT EXISTS `achat` (
  `id_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `date_achat` date NOT NULL,
  PRIMARY KEY (`id_client`,`id_produit`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mp` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `mail`, `mp`, `adresse`, `ville`, `cp`, `statut`) VALUES
(1, 'lambert', 'vincent', 'vincent.lambert@gmail.com', '1234', '12 chemin de la ruelle des bois', 'Monthléry', 91310, 1),
(2, 'Talabot', 'William', 'william.talabot@gmail.com', '1234', '10 rue du chemin', 'corbeille', 91450, 1),
(3, 'Dupont', 'Jeain-Michel', 'michu@gmail.com', '1234', '5 avenue des Champ Elysée', 'Paris', 75008, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `description` text NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `description`, `date_ajout`, `date_modif`, `id_type`) VALUES
(6, 'PS4', 600.99, 'Vend PS4 très bonne état jamais utilisé', '2016-02-04 10:31:18', '2016-02-04 10:31:18', 9),
(7, 'Audi TT v12', 500000, 'Vend Audi R8 V12 ', '2016-02-04 10:33:48', '2016-02-04 10:33:48', 1),
(8, 'ordinateur DELL', 1100, 'dv,dqsùlgjg,MQLdglmDFG', '2016-02-16 13:53:44', '2016-02-16 13:53:44', 5),
(9, 'montre rollex', 12000, 'Montre Rollex en trés bonne état cadran en or 24c ', '2016-02-17 09:42:46', '2016-02-17 09:42:46', 15),
(10, 'chien golden très gentil', 800, 'golden trés gentil très peux servie', '2016-02-17 11:26:15', '2016-02-17 11:26:15', 8),
(11, 'Aston Martin v12 vintage ', 120000, 'magnifique Aston Martin V12 Vintage comme dans le filme de james bond, état proche du neuf ', '2016-02-18 11:44:53', '2016-02-18 11:44:53', 1),
(12, 'Twingo V12 limited edition', 500000, 'Très belle twingo couleur or, avec moteur 12 cylindres, très propre!', '2016-02-18 11:50:36', '2016-02-18 11:50:36', 1),
(13, 'Bateau 30 Métres Grans luxe', 1000000, 'Très beau bateau de 30 Métres encré à Monaco dans un état proche du neuf', '2016-02-18 16:17:08', '2016-02-18 16:17:08', 3),
(14, 'L''Odyssé d''Homer livre original', 50000, 'Livre original de L''Odyssée d''Homer qui explique le long chemin qu''a fait Ullysse pour retrouver qu''il n''aimer et qu il tromper avec une nympho calypso', '2016-02-19 08:34:56', '2016-02-19 08:34:56', 6),
(15, 'Alice au pays des merveilles', 10, 'film pour enfant alice au pays des merveilles', '2016-02-19 10:01:36', '2016-02-19 10:01:36', 7),
(16, 'iphone 7s 129G', 1000, 'iphone 7s exclusif pas encore sortie neuf 128G', '2016-02-19 13:02:14', '2016-02-19 13:02:14', 4);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(1, 'Voiture'),
(2, 'Moto'),
(3, 'Bateaux'),
(4, 'Telephone'),
(5, 'Ordinateur'),
(6, 'Livre'),
(7, 'DVD/Bluray'),
(8, 'Animalerie'),
(9, 'Console de jeux'),
(10, 'Jeux Video'),
(11, 'Outils'),
(12, 'Vétements'),
(13, 'Chaussures'),
(14, 'Montres'),
(15, 'Bijoux');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE IF NOT EXISTS `vente` (
  `id_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `date_vente` date NOT NULL,
  PRIMARY KEY (`id_client`,`id_produit`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `achat_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `achat_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
