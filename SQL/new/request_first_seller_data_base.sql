use first_seller_order_data_base;

########################################################
######################    DROP  #######################
########################################################
DROP table emotional_product;
DROP table orders;

########################################################
######################  INSERT  #######################
########################################################



########################################################
######################   UPDATE  #######################
########################################################

########################################################
######################  CREATE  #######################
########################################################
CREATE TABLE IF NOT EXISTS `first_seller_order_data_base`.`emotional_product` (
  `idemotional_product` INT(11) NOT NULL AUTO_INCREMENT,
  `product_alliance` VARCHAR(45) NULL,
  
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

INSERT INTO emotional_product VALUES(null ,'e','Bague ','584-6825-12','8514-ff984-96','sku85442-',48,true,3,10,'bague','https://via.placeholder.com/150

C/O https://placeholder.com/',now(),true);
SELECT CONCAT(idemotional_product,product_alliance) FROM emotional_product where idemotional_product =1  ;


INSERT INTO orders VALUES (null,1,1,now(),'romain','pommier','romain-p31@hotmail.fr','0577820619','9 rue francois','appartement A2','','31400','toulouse','frnace','',1,'custom',(SELECT CONCAT(idemotional_product,product_alliance) FROM emotional_product where idemotional_product =2)); 

CREATE TABLE IF NOT EXISTS `first_seller_order_data_base`.`orders` (
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
  `whynote_product_idwhynote_product` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idorder`, `whynote_product_idwhynote_product`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `iduser` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(255) NOT NULL,
  `user_password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


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

