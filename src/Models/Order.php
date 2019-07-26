<?php
    require_once 'src/Models/Model.php';

    class Order extends Model {

        function getAllOrders($partner){
            $orders=$this->fetchAll(['query' =>  'SELECT * FROM Products , Orders, Orders_products 
            where  Products.partner_name= :partner_name 
            and orders.id_order = Orders_products.id_order 
            and Products.id_product = Orders_products.id_product;',
            'definitions' => [':partner_name' => $partner]
            ]);
           
            return $orders;
        }

        function addWhynoteOrder($dataClient){
            
            $this->executeQuery([
                'query' => 'INSERT INTO Orders VALUES (NULL,NULL,NULL,"whynote",:client_lastName,:client_firstname,NULL,:client_phone_number,:client_address,:client_address2,NULL,:client_postal_code,:client_city,:client_country,:shipping_name,NULL,:product_quantity,NULL,NOW(),(SELECT id_user FROM users WHERE name ="'.$_SESSION['name'].'" ));',
                'definitions' => [
                    ':client_lastName' => $dataClient['client_lastName'],
                    ':client_firstname' => $dataClient['client_firstname'],
                    ':client_phone_number' => $dataClient['client_phone_number'],
                    ':client_address' => $dataClient['client_address'],
                    ':client_address2' => $dataClient['client_address2'],
                    ':client_postal_code' => $dataClient['client_postal_code'],
                    ':client_city' => $dataClient['client_city'],
                    ':client_country' => $dataClient['client_country'],
                    ':shipping_name' => $dataClient['shipping_name'],
                    ':product_quantity' => intval($dataClient['product_quantity'], 0)
                    
                ]
            ]);
            
            $this->executeQuery([
                'query' => 'INSERT INTO Orders_products VALUES(:id_product,(SELECT id_order FROM Orders ORDER BY id_order DESC LIMIT 1));',
                'definitions' => [':id_product' => $dataClient['inputCheckProduct']]
            ]);
            return true;
        }
        
        
        function addEmotionalOrder($dataClient){
            $this->executeQuery([
                'query' => 'INSERT INTO Orders VALUES (
                    NULL,:id_order_followed,NULL,:partner_name,:client_lastname,
                    :client_firstname,:client_mail,:client_phone_number,:client_address,
                    :client_address2,NULL,:client_postal_code,:client_city,:client_country,
                    :shipping_name,:order_comment,:product_quantity,:product_custom,
                    NOW(),(SELECT id_user FROM users WHERE name ="'.$_SESSION['name'].'" ));',
                'definitions' => [
                    ':partner_name' => 'emotional',
                    ':id_order_followed' => $dataClient['id_order_followed'],
                    ':client_lastname' => $dataClient['client_lastname'],
                    ':client_firstname' => $dataClient['client_firstname'],
                    ':client_mail ' => $dataClient['client_mail'],
                    ':client_phone_number' => $dataClient['client_phone_number'],
                    ':client_address' => $dataClient['client_address'],
                    ':client_address2' => $dataClient['client_address2'],
                    ':client_postal_code' => $dataClient['client_postal_code'],
                    ':client_city' => $dataClient['client_city'],
                    ':client_country' => $dataClient['client_country'],
                    ':shipping_name' => $dataClient['shipping_name'],
                    ':order_comment' => $dataClient['order_comment'],
                    ':product_quantity' => intval($dataClient['product_quantity'], 0),
                    ':product_custom' => $dataClient['product_custom'],
                ]
            ]);
            $this->executeQuery([
                'query' => 'INSERT INTO have VALUES(
                    :id_product,
                    (SELECT id_order FROM Orders ORDER BY id_order DESC LIMIT 1)
                    );',
                'definitions' =>[':id_product' => $dataClient['id_product']]
            ]);
            return true;

        }
        
        function deleteOrder($idOrder){
            $this->executeQuery([
                'query' => "DELETE FROM have where id_order=$idOrder"]);
            $this->executeQuery([
                'query' => "DELETE FROM Orders where id_order=$idOrder"]);
                return true;
        }
        
        


         


    }