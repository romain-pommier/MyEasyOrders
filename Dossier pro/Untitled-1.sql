use findarecipie;

CREATE TABLE ingredient(
id int primary key auto_increment,ingredient_name varchar(20)
);

CREATE TABLE ingredientinrecipie(id int primary key auto_increment,
 id_ingredient int,
 id_recipie int
 );

CREATE TABLE recipie(
id int primary key auto_increment,
title varchar(20),
description text,
background varchar(250),
cook_time int,
preparation_time int,
meal_type varchar(250)
);

DELETE  FROM recipie WHERE id =2;

SELECT idrecipie FROM ingredient, ingredientinrecipie
WHERE ingredient.ingredient_name = "sel" AND id_ingredient = ingredient.id;

INSERT INTO recipie VALUES (null,"raclette","gourmand repas a base de pomme de terre ta vue !!","raclette.jpg",30,10,"Diner","Standard");
    
