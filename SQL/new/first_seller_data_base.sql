-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`emotional_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`emotional_product` (
  `idemotional_product` INT(11) NOT NULL AUTO_INCREMENT,
  `product_alliance` VARCHAR(45) NULL,
  `product_id_alliance` VARCHAR(45) NULL,
  `product_name` VARCHAR(255) NULL DEFAULT NULL,
  `product_reference` VARCHAR(255) NULL DEFAULT NULL,
  `product_ean` VARCHAR(255) NULL DEFAULT NULL,
  `product_sku` VARCHAR(255) NULL DEFAULT NULL,
  `product_size` INT(11) NULL DEFAULT NULL,
  `product_engraving` TINYINT(1) NULL DEFAULT NULL,
  `product_number_line_engraving` INT(11) NULL DEFAULT NULL,
  `product_number_characteres` INT(11) NULL DEFAULT NULL,
  `product_type` VARCHAR(255) NULL DEFAULT NULL,
  `product_picture_url` VARCHAR(255) NULL DEFAULT NULL,
  `product_date_added` DATE NULL DEFAULT NULL,
  `poduct_visility` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idemotional_product`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`orders` (
  `idorder` INT(11) NOT NULL AUTO_INCREMENT,
  `id_order_followed` INT NULL DEFAULT NULL,
  `order_line` INT(11) NULL DEFAULT NULL,
  `order_date_purchased` DATE NULL DEFAULT NULL,
  `client_lastname` VARCHAR(255) NULL DEFAULT NULL,
  `client_firstname` VARCHAR(255) NULL DEFAULT NULL,
  `client_mail` VARCHAR(255) NULL DEFAULT NULL,
  `client_phone_number` VARCHAR(255) NULL DEFAULT NULL,
  `client_adress` VARCHAR(255) NULL DEFAULT NULL,
  `client_adress2` VARCHAR(255) NULL DEFAULT NULL,
  `client_adress3` VARCHAR(255) NULL DEFAULT NULL,
  `client_postal_code` VARCHAR(255) NULL DEFAULT NULL,
  `client_city` VARCHAR(255) NULL DEFAULT NULL,
  `client_country` VARCHAR(255) NULL DEFAULT NULL,
  `order_comment` TEXT NULL DEFAULT NULL,
  `product_quanity` INT(11) NULL DEFAULT NULL,
  `product_custom` VARCHAR(255) NULL DEFAULT NULL,
  `whynote_product_idwhynote_product` INT(11) NOT NULL,
  PRIMARY KEY (`idorder`, `whynote_product_idwhynote_product`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `iduser` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(255) NOT NULL,
  `user_password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`whynote_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`whynote_product` (
  `idwhynote_product` INT(11) NOT NULL AUTO_INCREMENT,
  `product_alliance` VARCHAR(45) NULL,
  `product_id_alliance` VARCHAR(45) NULL,
  `product_name` VARCHAR(255) NULL DEFAULT NULL,
  `product_color` VARCHAR(255) NULL DEFAULT NULL,
  `product_option` VARCHAR(255) NULL DEFAULT NULL,
  `product_picture_url` VARCHAR(255) NULL DEFAULT NULL,
  `product_date_added` DATE NULL DEFAULT NULL,
  `product_visibility` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`idwhynote_product`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `mydb` ;

-- -----------------------------------------------------
-- Placeholder table for view `mydb`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`view1` (`id` INT);

-- -----------------------------------------------------
-- View `mydb`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`view1`;
USE `mydb`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
