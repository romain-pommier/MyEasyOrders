<?php
    /*
    ##############################################################################
    -------------------------------Global-------------------------------
    ##############################################################################
    */

    // Connection a la base de donnée
    function connect(){
        // $port="3306";
        // $dbName="dbs102996";
        // $user="dbu322716";
        // $pass="Beltxa-p31ion!*";
        // $host="db5000108489.hosting-data.io";
        
        
        // $port="3306";
        // $dbName="keethfuorders";
        // $user="keethfuorders";
        // $pass="Orders31";
        // $host="keethfuorders.mysql.db";
        
        $port="3308";
        $dbName="firstsellerorderdata";/*test*/
        $user="root";
        $pass="1234";
        $host="localhost";
        try {
            $dbh = new PDO("mysql:host=$host;port=" . $port . ";dbname=" . $dbName, $user, null);
            $dbh->exec("SET NAMES 'UTF8'");
            
        } 
        catch (PDOException $e){
            print "Erreur !: " . $e->getMessage() . "<br/>";
        }
        return $dbh;
    }
    
    //fonction de connection d'execution et de stockage array
    function excecuteSqlAndStockInArraY($sql){
        $dbh =connect();
        $statement = $dbh->prepare($sql);
        $statement->execute();
        $resultRequest = $statement->fetchAll();
        return $resultRequest;
    }
    
   
    
    //récupère le nom des colonnes dans la base de données
    function getIdColum($tableName){
        $sql ="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$tableName."';";
        return excecuteSqlAndStockInArraY($sql);
    }
    
    //recupère les données avec filtre
    function getElementWithSameData($tableName,$dataDateName,$dataDate){
        $sql ="SELECT * FROM $tableName where $dataDateName ='".$dataDate."';";
        
        return excecuteSqlAndStockInArraY($sql);
    }

    /*
    ##############################################################################
    -------------------------------USER-------------------------------
    ##############################################################################
    */


    //Implément un utilisateur dans la base de donné
    function registerUsers ( $loginName,$loginPass){
        $dbh = connect();
        $sql ='insert into users values (null,:name,:password);';
        $req = $dbh->prepare($sql);
        $req->execute([':name' => $loginName,':password'=>password_hash($loginPass,PASSWORD_DEFAULT)]);
    }
    
    //Récupération du nombre d'utilisateur ayant le même nom
    function getAllUser($login){
        $sql = "SELECT name FROM users where name='$login'";
        return excecuteSqlAndStockInArraY($sql);
    }
    function getAllProduct($partner){
        $sql='SELECT * FROM products where partner_name = "'.$partner.'";';
        return excecuteSqlAndStockInArraY($sql);
    }
    function getAllOrders($partner){
        $sql='SELECT * FROM  orders , products where products.id_product = orders.id_product  and orders.partner_name= "'.$partner.'";';
       
        return excecuteSqlAndStockInArraY($sql);
    }
    function getAllOrdersByDate($partner,$date){
        $sql='SELECT * FROM  orders , products where products.id_product = orders.id_product  and orders.partner_name= "'.$partner.'"and orders.order_date="'.$date.'";';
       
        return excecuteSqlAndStockInArraY($sql);
    }
    function getEmotionalFont(){
        $sql='SELECT * FROM emotional_font ;';
       
        return excecuteSqlAndStockInArraY($sql);

    }
    
    /*
    ##############################################################################
    -------------------------------WhyNote-------------------------------
    ##############################################################################
    */

    //enregistre les donner du formulaire formWhyNote dans la base de données
    function addWhynoteOrder($dataClient){
        
        $dbh = connect();
        $sql='insert into orders values (null,null,null,:partner_name,:client_lastName,:client_firstname,null,:client_phone_number,:client_address,:client_address2,null,:client_postal_code,:client_city,:client_country,:shipping_name,null,:product_quantity,null,now(),:inputCheckProduct);';
        $req = $dbh->prepare($sql);
        $req->execute([':partner_name'=>$partner,
        ':client_lastName'=>$dataClient['client_lastName'],
        ':client_firstname'=>$dataClient['client_firstname'],
        ':client_phone_number'=>$dataClient['client_phone_number'],
        ':client_address'=>$dataClient['client_address'],
        ':client_address2'=>$dataClient['client_address2'],
        ':client_postal_code'=>$dataClient['client_postal_code'],
        ':client_city'=>$dataClient['client_city'],
        ':client_country'=>$dataClient['client_country'],
        ':shipping_name'=>$dataClient['shipping_name'],
        ':product_quantity'=>intval($dataClient['product_quantity'], 0),
        ':inputCheckProduct'=>intval($dataClient['inputCheckProduct'], 0),
        ]);
       
    }
    function addOrderEmotional($dataClient){
        
        $dbh = connect();
        $sql='insert into orders values (null,:id_order_followed,null,:partner_name,:client_lastname,:client_firstname,:client_mail,:client_phone_number,:client_address,:client_address2,null,:client_postal_code,:client_city,:client_country,:shipping_name,:order_comment,:product_quantity,:product_custom,now(),:inputCheckProduct);';
        $req = $dbh->prepare($sql);
        $req->execute([':partner_name'=>'emotional',
        ':id_order_followed'=>$dataClient['id_order_followed'],
        
        ':client_lastname'=>$dataClient['client_lastname'],
        ':client_firstname'=>$dataClient['client_firstname'],
        ':client_mail'=>$dataClient['client_mail'],
        ':client_phone_number'=>$dataClient['client_phone_number'],
        ':client_address'=>$dataClient['client_address'],
        ':client_address2'=>$dataClient['client_address2'],
        ':client_postal_code'=>$dataClient['client_postal_code'],
        ':client_city'=>$dataClient['client_city'],
        ':client_country'=>$dataClient['client_country'],
        ':shipping_name'=>$dataClient['shipping_name'],
        ':order_comment'=>$dataClient['order_comment'],
        ':product_quantity'=>intval($dataClient['product_quantity'], 0),
        ':product_custom'=>$dataClient['product_custom'],
        ':inputCheckProduct'=>intval($dataClient['id_product'], 0),
        ]);
       
    }
    //insert une valeur dans la table whynote_products
    function registerProduct($dataArray,$partner){
        $dbh =connect();
        $sql='insert into products values (null,"'.$partner.'",:product_name,:product_color,:product_option,null,null,null,null,null,null,null,:product_picture_url,now(),1 );'; 
        $statement = $dbh->prepare($sql);
        $statement->execute([':product_name'=>$dataArray['product_name'],
                            ':product_color'=>$dataArray['product_color'],
                            ':product_option'=>$dataArray['product_option'],
                            ':product_picture_url'=>$dataArray['product_picture_url'],
        ]);
    }
    //récupération des différent option de whynote
    function getDiferentOptionProduct($filter,$partner){
        $sql="SELECT DISTINCT $filter FROM products where product_visility = true and partner_name = '$partner';";
        return excecuteSqlAndStockInArraY($sql);
    }
    
    
    //Récupération de produits identique dans whynote product
    function getDataExistInWhyNoteProduct($dataProduct){
        $sql ="SELECT * FROM products where product_name = '".$dataProduct['product_name']."' and product_color ='".$dataProduct['product_color']."'and product_option='".$dataProduct['product_option']."';";
        return excecuteSqlAndStockInArraY($sql);
    }
    function getProductsByTwoFilter($filter,$value,$partner){
        $sql="SELECT * FROM  products where $filter[0] ='".$value[0]."' and $filter[1] ='".$value[1]."'and partner_name = '".$partner."' and product_visility = true;";
        return excecuteSqlAndStockInArraY($sql);
        
    }
    function getProductsByOneFilter($filter,$value,$partner){
        $sql="SELECT* FROM products where $filter = '".$value."' and product_visility = true and partner_name = '".$partner."' and product_visility = true;";
        return excecuteSqlAndStockInArraY($sql);
    }
    
    function deleteProduct($id_product,$partner){
        $dbh = connect();
        $sql='UPDATE products set product_visility = false where partner_name="'.$partner.'" and id_product = '.$id_product.';';
        $statement = $dbh->prepare($sql);
        $statement->execute();
    }
    function updateWhyNoteProduct($data){
        $dbh=connect();
        $sql='UPDATE products set product_name=:product_name,
        product_color=:product_color,
        product_option=:product_option,
        product_picture_url=:product_picture_url,
        product_date_added=now()
        where id_product=:id_product';
        
        $statement = $dbh->prepare($sql);
        $statement->execute([':product_name'=>$data['product_name'],
        ':product_color'=>$data['product_color'],
        ':product_option'=>$data['product_option'],
        ':product_picture_url'=>$data['product_picture_url'],
        ':id_product'=>$data['id_product']
        ]);
    }
    function deleteOrder($idOrder){
        $sql="DELETE FROM orders where idorder=$idOrder";
        return excecuteSqlAndStockInArraY($sql);


    }

    /*
    ##############################################################################
    -------------------------------Emotional-------------------------------
    ##############################################################################
    */
    function addEmotionalFont($data){
        $dbh=connect();
        $sql="INSERT INTO emotional_font VALUES (null,:font_name);";
        $statement = $dbh->prepare($sql);
        $statement->execute([':font_name' => $data]);
    }
    function updateEmotionnalProduct($data){
        $dbh=connect();
        $sql='UPDATE products set product_name=:product_name,
        product_reference=:product_reference,
        product_ean=:product_ean,
        product_sku=:product_sku,
        product_engraving=:product_engraving,
        product_size=:product_size,
        product_number_line_engraving=:product_number_line_engraving,
        product_number_characters=:product_number_characters,
        product_picture_url=:product_picture_url,
        product_date_added=now()
        where id_product=:id_product';
        $statement = $dbh->prepare($sql);
        $statement->execute([':product_name'=>$data['product_name'],
        ':product_reference'=>$data['product_reference'],
        ':product_ean'=>$data['product_ean'],
        ':product_sku'=>$data['product_sku'],
        ':product_engraving'=>$data['product_engraving'],
        ':product_size'=>$data['product_size'],
        ':product_number_line_engraving'=>$data['product_number_line_engraving'],
        ':product_number_characters'=>$data['product_number_characters'],
        ':product_picture_url'=>$data['product_picture_url'],
        ':id_product'=>$data['id_product']
        ]);
    }
    
    
    function registerProductEmotional($dataArray,$partner){
        $dbh =connect();
        $sql='insert into products values (null,"'.$partner.'",:product_name,null,null,:product_reference,:product_ean,:product_sku,:product_size,:product_engraving,:product_number_line_engraving,:product_number_characters,:product_picture_url,now(),1 );'; 
        $statement = $dbh->prepare($sql);
        $statement->execute([':product_name'=>$dataArray['product_name'],
                            ':product_reference'=>$dataArray['product_reference'],
                            ':product_ean'=>$dataArray['product_ean'],
                            ':product_sku'=>$dataArray['product_sku'],
                            ':product_size'=>$dataArray['product_size'],
                            ':product_engraving'=>$dataArray['product_engraving'],
                            ':product_number_line_engraving'=>$dataArray['product_number_line_engraving'],
                            ':product_number_characters'=>$dataArray['product_number_characters'],
                            ':product_picture_url'=>$dataArray['product_picture_url'],
                            
        ]);
    }
    
    function getEmotionalProduct($dataProduct){
        $sql="SELECT * FROM products where product_name='".$dataProduct['product_name']."'and product_reference='".$dataProduct['product_reference']."'and product_ean='".$dataProduct['product_ean']."' and product_sku='".$dataProduct['product_sku']."'and product_size='".$dataProduct['product_size']."'and product_engraving='".$dataProduct['product_engraving']."' ;"; 
        return excecuteSqlAndStockInArraY($sql);
    }
    
    
    
   





    





