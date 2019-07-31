use MyEasyOrders;
insert into Orders values(null,"id_order_followed",1,"partner","lastname","firstname","mail","phon","address","adress2","adress3","postal","city","country","shipping","comment",2,"custom",now(),1);
insert into users values (null, "name","1234");
insert into have values(1,2);
insert into Products values (null,"partner","productname","color","option","ref","ean","sku","size",1,3,10,"picture",now(),0);
select * from Products ;
select * from have;
select * from orders;
insert into users values (null,"romain","$2y$10$lu7bxCDeB.VRvTC2pVYJveJhtwH3uBljeR2O0uwjeh5DuKcqWRNv.");

INSERT INTO have VALUES(1,(SELECT id_order FROM Orders ORDER BY id_order DESC LIMIT 1));

select id_order from Orders order by id_order desc LIMIT 1;


DELETE FROM have WHERE id_order=15;
DELETE FROM Orders WHERE id_order=15;

delete from Orders where id_order=2;
UPDATE products set 	product_visibility = false where partner_name="whynote" and id_product = 2;



SELECT * FROM Products , have,Orders where Products.id_product = have.id_product  AND Products.partner_name="whynote";

SELECT * FROM Products INNER JOIN have ON Products.id_product = have.id_product INNER JOIN Orders ON Products.partner_name = "whynote";




SELECT Building_name FROM Buildings LEFT JOIN Employees ON Buildings.Building_name = Employees.Building WHERE Building NOT NULL;






