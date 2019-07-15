#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Products
#------------------------------------------------------------

CREATE TABLE Products(
        id_product                    Int  Auto_increment  NOT NULL ,
        partner_name                  Varchar (255) ,
        product_name                  Varchar (255) ,
        product_color                 Varchar (255) ,
        product_option                Varchar (255) ,
        product_reference             Varchar (255) ,
        product_ean                   Varchar (255) ,
        product_sku                   Varchar (255) ,
        product_size                  Varchar (255) ,
        product_engraving             tinyint ,
        product_number_line_engraving Int ,
        product_number_characters     Int ,
        product_picture_url           Varchar (255) ,
        product_date_added            Date ,
        product_visibility            tinyint NOT NULL
	,CONSTRAINT Products_PK PRIMARY KEY (id_product)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user  Int  Auto_increment  NOT NULL ,
        name     Varchar (255) NOT NULL ,
        password Varchar (255) NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Orders
#------------------------------------------------------------

CREATE TABLE Orders(
        id_order             Int  Auto_increment  NOT NULL ,
        id_order_followed   Varchar (255) ,
        order_line          Int ,
        partner_name        Varchar (255) NOT NULL ,
        client_lastname     Varchar (255) ,
        client_firstname    Varchar (255) ,
        client_mail         Varchar (255) ,
        client_phone_number Varchar (255) ,
        client_address      Varchar (255) ,
        client_address2     Varchar (255) ,
        client_address3     Varchar (255) ,
        client_postal_code  Varchar (255) ,
        client_city         Varchar (255) ,
        client_country      Varchar (255) ,
        shipping_name       Varchar (255) NOT NULL ,
        order_comment       Text ,
        product_quantity    Int ,
        product_custom      Varchar (255) ,
        order_date          Date ,
        id_user             Int
	,CONSTRAINT Orders_PK PRIMARY KEY (id_order)

	,CONSTRAINT Orders_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
)ENGINE=InnoDB;

CREATE TABLE have(
        id_product Int NOT NULL ,
        id_order    Int NOT NULL
	,CONSTRAINT have_PK PRIMARY KEY (id_product,id_order)

	,CONSTRAINT have_Products_FK FOREIGN KEY (id_product) REFERENCES Products(id_product)
	,CONSTRAINT have_Orders0_FK FOREIGN KEY (id_order) REFERENCES Orders(id_order)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fonts
#------------------------------------------------------------

CREATE TABLE Fonts(
        id_fonts Int  Auto_increment  NOT NULL ,
        name    Varchar (255),
        CONSTRAINT Fonts_PK PRIMARY KEY (id_fonts)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: have
#------------------------------------------------------------



