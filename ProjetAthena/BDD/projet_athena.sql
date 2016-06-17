-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Mars 2016 à 13:12
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_athena`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Voiture'),
(2, 'Moto'),
(3, 'Bateau'),
(4, 'Téléphone'),
(5, 'Ordinateur'),
(6, 'Livre'),
(7, 'DVD/Bluray'),
(8, 'Animalerie'),
(9, 'Console de Jeux'),
(10, 'Jeux Video'),
(11, 'Outillage/Bricolage'),
(12, 'Vétements'),
(13, 'Chaussures'),
(14, 'Montres'),
(15, 'Bijoux');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mp` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `mail`, `telephone`, `mp`, `adresse`, `ville`, `cp`) VALUES
(1, 'Lambert', 'Vincent', 'vincent.lambert@gmail.com', '0607621522', 1234, '12 Chemin de la ruelle des bois', 'Monthléry', 91310),
(2, 'Montie', 'Allison', 'allison.montie', '0658076473', 1234, '12 Chemin des accacias', 'Clamart', 92380),
(3, 'Talabot', 'William', 'william.talabot@gmail.com', '0629146076', 1234, '10 chemin de corbeille', 'Corbeille', 91650),
(4, 'Dupont', 'Jean-Michel', 'michou@gmail.com', '0632154878', 1234, '10 Avenue des champs elysée', 'Paris', 75008);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `date_ajout` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_categorie` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`,`id_categorie`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `description`, `date_ajout`, `date_modif`, `id_categorie`, `id_client`, `statut`) VALUES
(1, 'Peugeot 208 Pack feline 200cv', 15000, 'Je vend ma peugeot 208 en très bon état', '2016-03-17 10:51:36', '2016-03-17 10:51:36', 1, 1, 1),
(2, 'JEANNEAU LEADER 805', 37000, 'Taud d''hivernage neuf Micro onde neuf Convertisseur 12-220v 1800w neuf Entretient réalisé tous les ans dernier en date juin 2015 facture à l''appuie Moteur 210 heures de navigation', '2016-03-17 10:56:11', '2016-03-17 10:59:01', 3, 2, 1),
(3, 'Collier plaqué or avec pendentif ruby ', 1000, 'Collier en plaqué or avec un ruby 2 carra', '2016-03-17 10:58:29', '2016-03-17 10:58:29', 15, 3, 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
