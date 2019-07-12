<?php
    require_once 'src/Models/Model.php';

    class Order extends Model {

        function getAllOrders($partner){
            $orders=$this->fetchAll(['query' => 'SELECT * FROM Products , have, Orders where Products.id_product = have.id_product AND Orders.order_visibility=1 AND Orders.partner_name="'.$partner.'";	']);
            	
            return $orders;
        }

        function addWhynoteOrder($dataClient){
            
            $this->executeQuery([
                'query' => 'INSERT INTO Orders VALUES (NULL,NULL,NULL,"whynote",:client_lastName,:client_firstname,NULL,:client_phone_number,:client_address,:client_address2,NULL,:client_postal_code,:client_city,:client_country,:shipping_name,NULL,:product_quantity,NULL,NOW(),true,(SELECT id_user FROM users WHERE name ="'.$_SESSION['name'].'" ));',
                'definitions' => [
                    ':client_lastName'=>$dataClient['client_lastName'],
                    ':client_firstname'=>$dataClient['client_firstname'],
                    ':client_phone_number'=>$dataClient['client_phone_number'],
                    ':client_address'=>$dataClient['client_address'],
                    ':client_address2'=>$dataClient['client_address2'],
                    ':client_postal_code'=>$dataClient['client_postal_code'],
                    ':client_city'=>$dataClient['client_city'],
                    ':client_country'=>$dataClient['client_country'],
                    ':shipping_name'=>$dataClient['shipping_name'],
                    ':product_quantity'=>intval($dataClient['product_quantity'], 0)
                    
                ]
            ]);
            
            $this->executeQuery([
                'query' => 'INSERT INTO have VALUES(:id_product,(SELECT id_order FROM Orders ORDER BY id_order DESC LIMIT 1));',
                'definitions' =>[':id_product' => $dataClient['inputCheckProduct']]
            ]);
            return true;
        }

        function addOrderEmotional($dataClient){
            $this->executeQuery([
                'query' => 'INSERT INTO Orders VALUES (NULL,:id_order_followed,NULL,:partner_name,:client_lastname,:client_firstname,:client_mail,:client_phone_number,:client_address,:client_address2,NULL,:client_postal_code,:client_city,:client_country,:shipping_name,:order_comment,:product_quantity,:product_custom,NOW(),true,(SELECT id_user FROM users WHERE name ="'.$_SESSION['name'].'" ));',
                'definitions' => [':partner_name'=>'emotional',
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
                //':inputCheckProduct'=>intval($dataClient['id_product'], 0),
                ]
            ]);
            return true;

        }
        
        function getProductsOneFilter($filter,$value,$partner){
            $orders = $this->fetchAll([
                'query' => "SELECT* FROM Products WHERE $filter = '".$value."' and product_visibility = true and partner_name = '".$partner."' and product_visibility = true;"]);
                return $orders;
        }
        
        function getProductsTwoFilter($filter,$value,$partner){
            $orders = $this->fetchAll([
                'query' => "SELECT * FROM  Products WHERE $filter[0] ='".$value[0]."' and $filter[1] ='".$value[1]."'and partner_name = '".$partner."' and product_visibility = true;"]);
                return $orders;
        }
        
        function deleteOrder($idOrder){
            $orders = $this->fetchAll([
                'query' => "DELETE FROM Orders where idorder=$idOrder"]);
                return $orders;
        }
        


         


    }