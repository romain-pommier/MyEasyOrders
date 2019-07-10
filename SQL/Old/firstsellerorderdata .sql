-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 20 juin 2019 à 13:43
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `firstsellerorderdata`
--

-- --------------------------------------------------------

--
-- Structure de la table `emotional_font`
--

DROP TABLE IF EXISTS `emotional_font`;
CREATE TABLE IF NOT EXISTS `emotional_font` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `font` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emotional_font`
--

INSERT INTO `emotional_font` (`id`, `font`) VALUES
(1, 'fontTest');

-- --------------------------------------------------------

--
-- Structure de la table `emotional_order`
--

DROP TABLE IF EXISTS `emotional_order`;
CREATE TABLE IF NOT EXISTS `emotional_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` varchar(250) DEFAULT NULL,
  `id_order_line` varchar(250) DEFAULT NULL,
  `date_purchased` date NOT NULL,
  `customer_lastname` varchar(250) DEFAULT NULL,
  `customer_firstname` varchar(250) DEFAULT NULL,
  `customer_email` varchar(250) DEFAULT NULL,
  `customer_phonenumber` varchar(250) DEFAULT NULL,
  `address_delivery_lastname` varchar(250) DEFAULT NULL,
  `address_delivery_fisrtname` varchar(250) DEFAULT NULL,
  `addres_delivery_address` varchar(250) DEFAULT NULL,
  `address_delivery_address2` varchar(250) DEFAULT NULL,
  `address_delivery_address3` varchar(250) DEFAULT NULL,
  `address_delivery_postalcode` varchar(250) DEFAULT NULL,
  `address_delivery_city` varchar(250) DEFAULT NULL,
  `address_delivery_country` varchar(250) DEFAULT NULL,
  `address_delivery_country_iso` varchar(250) DEFAULT NULL,
  `address_invoice_lastname` varchar(250) DEFAULT NULL,
  `address_invoice_fisrtname` varchar(250) DEFAULT NULL,
  `addres_invoice_address` varchar(250) DEFAULT NULL,
  `address_invoice_address2` varchar(250) DEFAULT NULL,
  `address_invoice_address3` varchar(250) DEFAULT NULL,
  `address_invoice_postalcode` varchar(250) DEFAULT NULL,
  `address_invoice_city` varchar(250) DEFAULT NULL,
  `address_invoice_country` varchar(250) DEFAULT NULL,
  `address_invoice_country_iso` varchar(250) DEFAULT NULL,
  `shinpping_name` varchar(250) DEFAULT NULL,
  `comment` text,
  `product_ean` varchar(250) DEFAULT NULL,
  `product_reference` varchar(250) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `quantity` varchar(250) DEFAULT NULL,
  `preview_url` varchar(250) DEFAULT NULL,
  `hd_url` varchar(250) DEFAULT NULL,
  `data` varchar(250) DEFAULT NULL,
  `add_date_order` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emotional_order`
--

INSERT INTO `emotional_order` (`id`, `id_order`, `id_order_line`, `date_purchased`, `customer_lastname`, `customer_firstname`, `customer_email`, `customer_phonenumber`, `address_delivery_lastname`, `address_delivery_fisrtname`, `addres_delivery_address`, `address_delivery_address2`, `address_delivery_address3`, `address_delivery_postalcode`, `address_delivery_city`, `address_delivery_country`, `address_delivery_country_iso`, `address_invoice_lastname`, `address_invoice_fisrtname`, `addres_invoice_address`, `address_invoice_address2`, `address_invoice_address3`, `address_invoice_postalcode`, `address_invoice_city`, `address_invoice_country`, `address_invoice_country_iso`, `shinpping_name`, `comment`, `product_ean`, `product_reference`, `product_name`, `color`, `quantity`, `preview_url`, `hd_url`, `data`, `add_date_order`) VALUES
(37, '51914-5154-51', '1', '2019-06-17', 'nom3', 'prenom', 'email@email.fr', '0666820515', 'nom3', 'prenom', 'adresse', 'supp', '', '31400', 'ville', 'pays', '', 'nom3', 'prenom', 'adresse', 'supp', '', '31400', 'ville', 'pays', '', 'livraison', '', 'bla', 'bla', 'bla', '', '2', '', '', '{\"customization\":[{\"Face\":\"recto\",\"Textes\":[{\"Police\":\"fontTest\",\"Texte\":\"test85\"},{\"Police\":\"fontTest\",\"Texte\":\"test2\"}]}]}', '2019-06-17'),
(36, '51914-5154-51', '2', '2019-06-17', 'nom', 'prenom', 'email@email.fr', '0666820515', 'nom', 'prenom', 'adresse', 'supp', '', '31400', 'ville', 'pays', '', 'nom', 'prenom', 'adresse', 'supp', '', '31400', 'ville', 'pays', '', 'livraison', '', 'bla', 'bla', 'bla', '', '2', '', '', '{\"customization\":[{\"Face\":\"recto\",\"Textes\":[{\"Police\":\"fontTest\",\"Texte\":\"test85\"},{\"Police\":\"fontTest\",\"Texte\":\"test2\"}]}]}', '2019-06-17'),
(35, '51914-5154-51', '3', '2019-06-17', 'nom', 'prenom', 'email@email.fr', '0666820515', 'nom', 'prenom', 'adresse', 'supp', '', '31400', 'ville', 'pays', '', 'nom', 'prenom', 'adresse', 'supp', '', '31400', 'ville', 'pays', '', 'livraison', '', 'bla', 'bla', 'bla', '', '2', '', '', '{\"customization\":[{\"Face\":\"recto\",\"Textes\":[{\"Police\":\"fontTest\",\"Texte\":\"test85\"},{\"Police\":\"fontTest\",\"Texte\":\"test2\"}]}]}', '2019-06-17'),
(34, 'idorder', 'orderline', '2019-06-17', 'lastname', 'firstname', 'xaxaxax@hotmail.fr', 'telnumber', 'lastname', 'firstname', 'address', 'address2', 'address3', 'codepostal', 'city', 'country', 'countryiso', 'lastname', 'firstname', 'address', 'address2', 'address3', '31400', 'city', 'country', 'countryiso', 'shipping', 'comment', 'ean', 'ref', 'name', 'color', '1', 'previeuurl', 'hdurl', 'datacustom', '2019-06-17');

-- --------------------------------------------------------

--
-- Structure de la table `emotional_products`
--

DROP TABLE IF EXISTS `emotional_products`;
CREATE TABLE IF NOT EXISTS `emotional_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) DEFAULT NULL,
  `reference` varchar(250) DEFAULT NULL,
  `ean` varchar(250) DEFAULT NULL,
  `sku` varchar(250) DEFAULT NULL,
  `product_size` varchar(250) DEFAULT NULL,
  `product_engraving` varchar(250) DEFAULT NULL,
  `product_number_ligne_of_engraving` int(11) DEFAULT NULL,
  `product_number_of_characters` int(11) DEFAULT NULL,
  `product_type` varchar(250) DEFAULT NULL,
  `product_picture` varchar(250) DEFAULT NULL,
  `date_ajout` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emotional_products`
--

INSERT INTO `emotional_products` (`id`, `product_name`, `reference`, `ean`, `sku`, `product_size`, `product_engraving`, `product_number_ligne_of_engraving`, `product_number_of_characters`, `product_type`, `product_picture`, `date_ajout`) VALUES
(120, 'Bague acier pompon rouge', 'fdsdsf', 'fdsfsd', '111', '1', 'Yes', 3, 10, '', 'https://www.emotional.fr/4688-large_default/bague-acier-pompon-colores-et-petite-medaille-a-personnaliser.jpg\"', '2019-06-20 12:45:25'),
(119, 'bla', 'bla', 'bla', '94686', '54', 'No', 0, 0, 'Bague', 'https://via.placeholder.com/150', '2019-06-20 12:00:50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'romain', '$2y$10$lPEf16l.HcPVwAozaLwQkeydJBPR4n.FSXmRR6OoauUzDPEVrsSEC'),
(2, 'poms', '$2y$10$Nd.PBUkkmEL72tTdhMv.F.FRJvU6NrlWetEmZiaGpsRHBrXsW4HU6'),
(3, 'blablabla', '$2y$10$E9SJcLlKj6bGODUU6m.c4OAVPfKnHTtF7pRWJbUiU39pfTXJ2Z4xm'),
(4, 'tyty', '$2y$10$lIVlJe4A/BCeSHbu94ZS/.fWVP.rapOpBU.ZhSMa1IYzafsObRFKW'),
(5, 'bob', '$2y$10$efOiRe7/n1PBiy0q4EPpseCRd/nXtmhimyO7zUL1shIVz186n1Rsm'),
(6, 'bob123', '$2y$10$ZbPs3q9RutDjilJ3IOPZCewXInk6tAGXHU2t3WgyXpaTRmUM7um2C'),
(7, 'test', '$2y$10$PQ.QdwBgAo3g4mvZANs01et1nBrroSQvnNQUwVsl0HDQtnt1lQQO2'),
(8, 'maxime', '$2y$10$qqXG.sEoKdwjjdIGQCke7.v2lPyL/b5dQUdC5U7bV75yJvdQ3AIA.');

-- --------------------------------------------------------

--
-- Structure de la table `whynote_order`
--

DROP TABLE IF EXISTS `whynote_order`;
CREATE TABLE IF NOT EXISTS `whynote_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Prenom / Nom` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  `Adresse complementaire` varchar(255) DEFAULT NULL,
  `Pays` varchar(255) DEFAULT NULL,
  `Cp` varchar(255) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  `Offre` varchar(255) DEFAULT NULL,
  `Quantite` int(11) DEFAULT NULL,
  `Lignée/Non lignée` varchar(255) DEFAULT NULL,
  `Couleur` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `whynote_order`
--

INSERT INTO `whynote_order` (`id`, `Prenom / Nom`, `Adresse`, `Adresse complementaire`, `Pays`, `Cp`, `Ville`, `Telephone`, `Offre`, `Quantite`, `Lignée/Non lignée`, `Couleur`, `date`) VALUES
(1, 'PRENOM NOM', 'ADRESS', 'SUP', 'pays', '31400', 'ville', '0666820515', 'A5', 5, 'Page-Blanche', 'bleu', '2019-06-12'),
(3, 'prenom nom', 'adresse', 'sipp', 'pays', '31400', 'ville', '066820515', 'A5', 1, 'Page-Blanche', 'bleu', '2019-06-17'),
(4, 'prenom2 nom', 'adresse', 'sipp', 'pays', '31400', 'ville', '066820515', 'A5', 1, 'Page-Blanche', 'bleu', '2019-06-17'),
(5, 'prenom3 nom', 'adresse', 'sipp', 'pays', '31400', 'ville', '066820515', 'A5', 1, 'Page-Blanche', 'bleu', '2019-06-17'),
(6, 'prenom4 nom', 'adresse', 'sipp', 'pays', '31400', 'ville', '066820515', 'A5', 1, 'Page-Blanche', 'bleu', '2019-06-17');

-- --------------------------------------------------------

--
-- Structure de la table `whynote_products`
--

DROP TABLE IF EXISTS `whynote_products`;
CREATE TABLE IF NOT EXISTS `whynote_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(250) DEFAULT NULL,
  `couleur` varchar(250) DEFAULT NULL,
  `option_product` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `date_ajout` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `whynote_products`
--

INSERT INTO `whynote_products` (`id`, `product_name`, `couleur`, `option_product`, `url`, `date_ajout`) VALUES
(76, 'tfifu', 'dufkj', 'blabla', 'https://whynote.co/wp-content/uploads/2018/11/A5_llama-585x585.jpg', '2019-06-20 12:39:56'),
(74, 'A4', 'bleu', 'Page-Blanche', 'https://whynote.co/wp-content/uploads/2017/11/products-A4_Black-585x585.jpg', '2019-06-12 10:17:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
