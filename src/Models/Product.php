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


    }
?>