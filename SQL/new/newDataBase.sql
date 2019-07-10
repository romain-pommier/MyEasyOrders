-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 28 juin 2019 à 06:17
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
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `id_order_followed` int(11) DEFAULT NULL,
  `order_line` int(11) DEFAULT NULL,
  `client_lastname` varchar(255) DEFAULT NULL,
  `client_firstname` varchar(255) DEFAULT NULL,
  `client_mail` varchar(255) DEFAULT NULL,
  `client_phone_number` varchar(255) DEFAULT NULL,
  `client_adress` varchar(255) DEFAULT NULL,
  `client_adress2` varchar(255) DEFAULT NULL,
  `client_adress3` varchar(255) DEFAULT NULL,
  `client_postal_code` varchar(255) DEFAULT NULL,
  `client_city` varchar(255) DEFAULT NULL,
  `client_country` varchar(255) DEFAULT NULL,
  `order_comment` text,
  `product_quantity` int(11) DEFAULT NULL,
  `product_custom` varchar(255) DEFAULT NULL,
  `order_date` date NOT NULL,
  `products_id_product` int(11) NOT NULL,
  PRIMARY KEY (`idorder`),
  KEY `fk_orders_products_idx` (`products_id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`idorder`, `id_order_followed`, `order_line`, `client_lastname`, `client_firstname`, `client_mail`, `client_phone_number`, `client_adress`, `client_adress2`, `client_adress3`, `client_postal_code`, `client_city`, `client_country`, `order_comment`, `product_quantity`, `product_custom`, `order_date`, `products_id_product`) VALUES
(1, NULL, NULL, 'romain', 'pommier', 'romain-p31@hotmail.fr', '0666828282', '9reu truc', 'supp', NULL, '31400', 'toulouse', 'france', 'comment', 1, 'custom', '2019-06-27', 1);

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
  `product_size` int(11) DEFAULT NULL,
  `product_engraving` tinyint(1) DEFAULT NULL,
  `product_number_line_engraving` int(11) DEFAULT NULL,
  `product_number_characteres` int(11) DEFAULT NULL,
  `product_picture_url` varchar(255) DEFAULT NULL,
  `product_date_added` date DEFAULT NULL,
  `product_visility` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id_product`, `partner_name`, `product_name`, `product_color`, `product_option`, `product_reference`, `product_ean`, `product_sku`, `product_size`, `product_engraving`, `product_number_line_engraving`, `product_number_characteres`, `product_picture_url`, `product_date_added`, `product_visility`) VALUES
(1, 'emotionnal', 'Bague charm rouge', NULL, NULL, 'EA854-95YT', 'EA854-95YT', 'SKU85-95', 48, 1, 3, 10, 'https://via.placeholder.com/150', '2019-06-27', 1),
(2, 'whynote', 'A5', '2bleu', 'A5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A5', '2019-06-27', 0),
(3, 'whynote', 'A5', 'lama2', 'A5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A5', '2019-06-27', 0),
(4, '$partner', ':product_name', ':product_color', ':product_option', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ':product_picture_url', '2019-06-27', 1),
(5, '$partner', ':product_name', ':product_color', ':product_option', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ':product_picture_url', '2019-06-27', 1),
(6, 'whynote', 'A4', 'girafe', 'Page-Blanche', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://whynote.co/wp-content/uploads/2018/11/A5_giraffe-585x585.jpg', '2019-06-27', 0),
(7, 'whynote', 'nameproduct', 'color', 'option', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://whynote.co/wp-content/uploads/2018/11/A5_giraffe-585x585.jpg', '2019-06-27', 0),
(8, 'whynote', NULL, NULL, 'Lignée', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-27', 0),
(9, 'whynote', 'A5', 'girafe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://whynote.co/wp-content/uploads/2018/11/Pocket_Girafe-585x585.jpg', '2019-06-27', 0),
(10, 'whynote', 'A5', 'girafe', 'Lignee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://whynote.co/wp-content/uploads/2018/11/Pocket_Girafe-585x585.jpg', '2019-06-27', 1);

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
  ADD CONSTRAINT `fk_orders_products` FOREIGN KEY (`products_id_product`) REFERENCES `products` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
