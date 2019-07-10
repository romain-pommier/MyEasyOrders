use firstsellerorderdata;

#------------------------------------------------------------------------------------------------------------------
#--------------------------------------------------TABLE USERS--------------------------------------------------
#------------------------------------------------------------------------------------------------------------------
create table users( id int key auto_increment, name varchar(250), password varchar(250));
insert into users values(null,"romain","1234");


#--------------------------------------------------DROP--------------------------------------------------
drop table users;



#------------------------------------------------------------------------------------------------------------------
#--------------------------------------------------	TABLE WHYNOTE--------------------------------------------------
#------------------------------------------------------------------------------------------------------------------
#TABLE whynote excel
drop table whynote_excel;
create table whynote_order²(id int key auto_increment,`Prenom / Nom` VARCHAR(255),Adresse varchar(255),`Adresse complementaire` varchar(255),Pays varchar(255), Cp varchar(255), Ville varchar(255), Telephone varchar(255), Offre varchar(255), Quantite int, `Lignée/Non lignée` varchar(255),Couleur varchar(255),date date);
#TABLE WhyNote product
create table whynote_products(id int key auto_increment, product_name varchar(250));


#TABLE TEST PRODUCT
create table whynote_products(id int key auto_increment, product_name varchar(250),couleur varchar(250),option_product varchar(250),url varchar(250),date_ajout datetime);
drop table whynote_products;
drop table  whynote_order;

#--------------------------------------------------INSERT WhyNote--------------------------------------------------



INSERT INTO whynote_products VALUES( null,"A5","Panda","Ligné","https://whynote.co/wp-content/uploads/2018/11/A5_panda-585x585.jpg",now());



#--------------------------------------------------DROP WHYNOTE--------------------------------------------------




drop table whynote_order;
drop table emotional_products;
drop table emotional_police ;
drop table emotional_location ;
drop table emotional_size ;
drop table emotional_order;



SELECT * FROM emotional_order where id=0;
#------------------------------------------------------------------------------------------------------------------
#--------------------------------------------------TABLE EMOTIONNAL--------------------------------------------------
#------------------------------------------------------------------------------------------------------------------
#TABLE emotional_police
create table emotional_font(id int key auto_increment, font varchar(250));
#TABLE emotional_location
create table emotional_location (id int key auto_increment, writing_location varchar(250));
#table emotional_size
create table emotional_size (id int key auto_increment, size int);
#TABLE emotional item
create table emotional_products(id int key auto_increment,product_name varchar(250),reference varchar(250), ean varchar(250),sku varchar(250), product_size varchar(250), product_engraving varchar(250), product_number_ligne_of_engraving int, product_number_of_characters int, product_type varchar(250), product_picture varchar(250),date_ajout datetime);
#TABLE emotional Excel
create table emotional_order(
id int key auto_increment,
id_order varchar(250),
id_order_line  varchar(250),
customer_lastname  varchar(250),
customer_firstname  varchar(250),
customer_email  varchar(250),
customer_phonenumber  varchar(250),
address_delivery_lastname  varchar(250),
address_delivery_fisrtname varchar(250),
addres_delivery_address  varchar(250),
address_delivery_address2  varchar(250),
address_delivery_address3  varchar(250),
address_delivery_postalcode varchar(250),
address_delivery_city varchar(250),
address_delivery_country varchar(250),
address_delivery_country_iso varchar(250),
address_invoice_lastname  varchar(250),
address_invoice_fisrtname varchar(250),
addres_invoice_address  varchar(250),
address_invoice_address2  varchar(250),
address_invoice_address3  varchar(250),
address_invoice_postalcode varchar(250),
address_invoice_city varchar(250),
address_invoice_country varchar(250),
address_invoice_country_iso varchar(250),
shinpping_name varchar(250),
comment text,
product_ean varchar(250),
product_reference varchar(250),
product_name varchar(250),
color varchar(250),
quantity varchar(250),
preview_url varchar(250),
hd_url varchar(250),
data  varchar(250),
add_date_order date);

INSERT INTO emotional_order VALUES (NULL, 'idorder', 'orderline',now(), 'lastname', 'firstname', 'xaxaxax@hotmail.fr',
 'telnumber', 'lastname', 'firstname', 'address', 'address2', 'address3', 'codepostal', 'city', 'country', 'countryiso', 'lastname', 
 'firstname', 'address', 'address2', 'address3', '31400', 'city', 'country', 'countryiso', 'shipping', "comment", 'ean', 
 'ref', 'name', 'color', '1', 'previeuurl', 'hdurl', 'datacustom', now());




#--------------------------------------------------INSERT--------------------------------------------------

INSERT INTO emotional_products VALUES (null,"Bague acier pompon rouge","RINGMED12POMRED-48-RH","3663457099279","SKU",48,"oui",1,10,"bague","https://www.emotional.fr/4688-large_default/bague-acier-pompon-colores-et-petite-medaille-a-personnaliser.jpg",now());
SELECT * FROM emotional_products;
SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "emotional_order";


#--------------------------------------------------SELECT--------------------------------------------------
SELECT name FROM user where name='romain';
SELECT 	colors_name FROM whynote_item_colors;
SELECT ligne FROM whynote_item_ligne;
SELECT * from whynote_order;

SELECT DISTINCT option_product FROM whynote_products;
SELECT  option_product FROM whynote_products;
SELECT  product_name, couleur,option_product,url FROM whynote_products where product_name = "A4" and couleur ="noir" and url ="https://whynote.co/wp-content/uploads/2017/11/products-A4_Black-585x585.jpg";
SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'whynote_excel';

SELECT * FROM emotional_products;
SELECT reference FROM emotional_products WHERE reference="RINGMED12POMRED-48-RH";
SELECT DISTINCT option_product FROM whynote_products;
SELECT product_name, couleur,option_product,url FROM whynote_products where product_name ="A5"and url ="https://whynote.co/wp-content/uploads/2017/09/products-A5_Cig-585x585.jpg";
SELECT *FROM whynote_products where url ="https://whynote.co/wp-content/uploads/2017/09/products-A5_Cig-585x585.jpg";
SELECT product_name, reference, ean, product_size, product_engraving, product_number_ligne_of_engraving, product_number_of_characters, product_type, date_ajout FROM emotional_products;

SELECT DISTINCT product_name ,couleur,option_product,date_ajout FROM whynote_products;
SELECT DISTINCT product_name,custom_option,colors_name FROM whynote_products INNER JOIN whynote_item_options , whynote_item_colors;

DELETE FROM whynote_products  where product_name ="A5"and url ="https://whynote.co/wp-content/uploads/2017/09/products-A5_Cig-585x585.jpg";
UPDATE whynote_products set product_name='test',couleur='test',option_product="test",url="test" where product_name ="A5"and url ="https://whynote.co/wp-content/uploads/2017/09/products-A5_Cig-585x585.jpg";

DELETE FROM emotional_products where reference="RINGMED12POMRED-48-RH";
UPDATE emotional_products set product_name='test',reference='test',ean="test",product_size="test",product_engraving="test",product_number_ligne_of_engraving="test",product_number_of_characters="test",product_type="test",date_ajout="test" where reference="bla" ;
SELECT * FROM  whynote_products where couleur="lama";
SELECT * FROM  whynote_products;
SELECT * FROM emotional_products where product_name='test'and reference='test'and ean="test" and product_size="58"and product_engraving="Yes" ; 
SELECT * FROM emotional_order where add_date_order ="2019-06-17";
SELECT * FROM emotional_order;
SELECT * FROM whynote_order;
#--------------------------------------------------INSERT--------------------------------------------------


