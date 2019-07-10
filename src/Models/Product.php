<?php
    require_once 'src/Models/Model.php';

    class Product extends Model {

        function getAllProduct($partner){
            $products= $this->fetchAll(['query' => 'SELECT * FROM products where partner_name = "'.$partner.'";']);
            return $products;
        }
        function deleteProduct($id_product, $partner){
            $this->executeQuery(['query' => 'UPDATE products set product_visility = false where partner_name="'.$partner.'" and id_product = '.$id_product.';']);
            return true;
        }
        function getWhyNoteProduct($dataProduct){
            $product = $this->fetchAll(['query' => "SELECT * FROM products where product_name = '".$dataProduct['product_name']."' and product_color ='".$dataProduct['product_color']."'and product_option='".$dataProduct['product_option']."';"]);
            return $products;
        }
        function registerProduct($dataProduct, $partner){
            $this->executeQuery([
            'query' => 'insert into products values (null,"'.$partner.'",:product_name,:product_color,:product_option,null,null,null,null,null,null,null,:product_picture_url,now(),1 );',
            
            'definitions' => [':product_name'=>$dataArray['product_name'],
            ':product_color'=>$dataArray['product_color'],
            ':product_option'=>$dataArray['product_option'],
            ':product_picture_url'=>$dataArray['product_picture_url']]
            ]);
            return true;
        }
        function updateWhyNoteProduct($dataProduct){
            $this ->executeQuery([
            'query' => "UPDATE products set product_name=:product_name,
            product_color=:product_color,
            product_option=:product_option,
            product_picture_url=:product_picture_url,
            product_date_added=now()
            where id_product=:id_product" ,
            
            'definitions' => [':product_name'=>$dataProduct['product_name'],
            ':product_color'=>$dataProduct['product_color'],
            ':product_option'=>$dataProduct['product_option'],
            ':product_picture_url'=>$dataProduct['product_picture_url'],
            ':id_product'=>$dataProduct['id_product'] ]
            ]);
            return true;
        }
    }
?>