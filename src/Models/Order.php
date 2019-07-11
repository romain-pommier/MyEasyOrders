<?php
    require_once 'src/Models/Model.php';

    class Order extends Model {
        function addWhynoteOrder($dataClient){
            $this->executeQuery([
                'query' => 'INSERT INTO orders VALUES (NULL,NULL,NULL,"whynote",:client_lastName,:client_firstname,NULL,:client_phone_number,:client_address,:client_address2,NULL,:client_postal_code,:client_city,:client_country,:shipping_name,NULL,:product_quantity,NULL,now(),:inputCheckProduct);',
                'definitions' => [':partner_name'=>$partner,
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
                ]
            ]);
            return true;
        }
        function getProductsOneFilter($filter,$value){
            $orders = $this->fetchAll([
                'query' => "SELECT* FROM products WHERE $filter = '".$value."' and product_visility = true and partner_name = 'whynote' and product_visility = true;"]);
                return $orders;
            
        }
        function getProductsTwoFilter($filter,$value){
            $orders = $this->fetchAll([
                'query' => "SELECT * FROM  products WHERE $filter[0] ='".$value[0]."' and $filter[1] ='".$value[1]."'and partner_name = 'whynote' and product_visility = true;"]);
                return $orders;

        }


         


    }