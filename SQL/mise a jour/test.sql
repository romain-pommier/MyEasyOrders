-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 juil. 2019 à 23:51
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `emotional_font`
--

DROP TABLE IF EXISTS `emotional_font`;
CREATE TABLE IF NOT EXISTS `emotional_font` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `font` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emotional_font`
--

INSERT INTO `emotional_font` (`id`, `font`) VALUES
(1, 'fontTest'),
(2, 'police');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `id_order_followed` varchar(255) DEFAULT NULL,
  `order_line` int(11) DEFAULT NULL,
  `partner_name` varchar(255) NOT NULL,
  `client_lastname` varchar(255) DEFAULT NULL,
  `client_firstname` varchar(255) DEFAULT NULL,
  `client_mail` varchar(255) DEFAULT NULL,
  `client_phone_number` varchar(255) DEFAULT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `client_address2` varchar(255) DEFAULT NULL,
  `client_address3` varchar(255) DEFAULT NULL,
  `client_postal_code` varchar(255) DEFAULT NULL,
  `client_city` varchar(255) DEFAULT NULL,
  `client_country` varchar(255) DEFAULT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `order_comment` text,
  `product_quantity` int(11) DEFAULT NULL,
  `product_custom` varchar(255) DEFAULT NULL,
  `order_date` date NOT NULL,
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`idorder`),
  KEY `fk_orders_products_idx` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`idorder`, `id_order_followed`, `order_line`, `partner_name`, `client_lastname`, `client_firstname`, `client_mail`, `client_phone_number`, `client_address`, `client_address2`, `client_address3`, `client_postal_code`, `client_city`, `client_country`, `shipping_name`, `order_comment`, `product_quantity`, `product_custom`, `order_date`, `id_product`) VALUES
(32, NULL, NULL, 'whynote', 'pommier', 'romain', NULL, '0666820515', 'supp, supp', 'supp', NULL, '31400', 'toulouse', 'France', 'null', NULL, 1, NULL, '2019-07-04', 135),
(33, 'id', 1, 'emotional', 'pommier', 'romain', 'romain-p31@hotmail.fr', '0666820515', 'supp, supp', 'supp', NULL, '31400', 'toulouse', 'France', 'Colissimo', '', 3, '{\"customization\":[{\"Face\":\"recto\",\"Textes\":[{\"Police\":\"undefined\",\"Texte\":\"undefined\"},{\"Police\":\"undefined\",\"Texte\":\"test2\"},{\"Police\":\"undefined\",\"Texte\":\"test3\"}]}]}', '2019-07-04', 136),
(38, 'id', NULL, 'emotional', 'pommier', 'romain', 'romain-p31@hotmail.fr', '0666820515', '23 rue charle floquet appartement 202', '', NULL, '64100', 'Bayonne', 'France', 'Colissimo', '', 1, '', '2019-07-05', 136);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(45) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_color` varchar(45) DEFAULT NULL,
  `product_option` varchar(45) DEFAULT NULL,
  `product_reference` varchar(255) DEFAULT NULL,
  `product_ean` varchar(255) DEFAULT NULL,
  `product_sku` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_engraving` tinyint(1) DEFAULT NULL,
  `product_number_line_engraving` int(11) DEFAULT NULL,
  `product_number_characters` int(11) DEFAULT NULL,
  `product_picture_url` varchar(255) DEFAULT NULL,
  `product_date_added` date DEFAULT NULL,
  `product_visility` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `partner_name`, `product_name`, `product_color`, `product_option`, `product_reference`, `product_ean`, `product_sku`, `product_size`, `product_engraving`, `product_number_line_engraving`, `product_number_characters`, `product_picture_url`, `product_date_added`, `product_visility`) VALUES
(135, 'whynote', 'A4', 'girafe', 'Page-Blanche', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://whynote.co/wp-content/uploads/2018/11/Pocket_Girafe-585x585.jpg', '2019-07-04', 1),
(136, 'emotional', 'Bague Chrm\'s', NULL, NULL, '854-514-914', '854-514-914', '9575d924', '60', 1, 3, 10, 'https://via.placeholder.com/150  C/O https://placeholder.com/', '2019-07-05', 1),
(137, 'emotional', 'Bague Chrm\'s', NULL, NULL, '854-514-914', '854-514-914', '9575d924', '62', 1, 3, 10, 'https://via.placeholder.com/150  C/O https://placeholder.com/', '2019-07-04', 1),
(138, 'emotional', 'Bague Chrm\'s', NULL, NULL, '854-514-914', '854-514-914', '9575d924', '64', 1, 3, 10, 'https://via.placeholder.com/150  C/O https://placeholder.com/', '2019-07-04', 1),
(139, 'emotional', 'bracelet', NULL, NULL, 'dzzd748', 'dzzd748', '8514-6127', '40 au 48', 0, 0, 0, 'https://via.placeholder.com/150  C/O https://placeholder.com/', '2019-07-04', 1),
(140, 'emotional', 'A5', NULL, NULL, '\'cez', 'ezcf', 'ecz159', '85', 1, 3, 10, 'https://whynote.co/wp-content/uploads/2018/11/Pocket_Girafe-585x585.jpg', '2019-07-05', 0),
(141, 'emotional', 'test', NULL, NULL, 'test', 'test', 'test', '20', 0, 0, 0, '', '2019-07-05', 0),
(142, 'emotional', 'test', NULL, NULL, 'test', 'test', 'test', NULL, 1, 3, 10, '', '2019-07-05', 0),
(143, 'emotional', 'test', NULL, NULL, 'test', 'test', 'test', NULL, 0, 0, 0, '', '2019-07-05', 0),
(144, 'emotional', 'a', NULL, NULL, 'aa', 'a', 'a', NULL, 0, 0, 0, '', '2019-07-05', 0),
(145, 'emotional', 'b', NULL, NULL, 'b', 'b', 'b', '', 0, 0, 0, '', '2019-07-05', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`iduser`, `name`, `password`) VALUES
(17, 'romain', '$2y$10$lu7bxCDeB.VRvTC2pVYJveJhtwH3uBljeR2O0uwjeh5DuKcqWRNv.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_products` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
