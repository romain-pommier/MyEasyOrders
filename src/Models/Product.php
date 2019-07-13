<?php
    require_once 'src/Models/Model.php';

    class Product extends Model {

        function getAllProduct($partner){
            $products = $this->fetchAll(['query' => 'SELECT * FROM products where partner_name = "'.$partner.'" and product_visibility = true;']);
            return $products;
        }

        function deleteProduct($id_product, $partner){
            
            $this->executeQuery(['query' => 'UPDATE products set 	product_visibility = false where partner_name="'.$partner.'" and id_product = '.$id_product.';']);
            return true;
        }

        function getWhyNoteProducts($dataProduct){
            $products = $this->fetchAll(['query' => "SELECT * FROM products where product_name = '".$dataProduct['product_name']."' and product_color ='".$dataProduct['product_color']."'and product_option='".$dataProduct['product_option']."';"]);
            return $products;
        }

        function registerWhynoteProduct($dataProduct){
            $this->executeQuery([
                'query' => 'INSERT INTO products VALUES (NULL,"whynote",:product_name,:product_color,:product_option,NULL,NULL,NULL,NULL,NULL,NULL,NULL,:product_picture_url,now(),1 );',
                'definitions' => [
                    ':product_name' => $dataProduct['product_name'],
                    ':product_color' => $dataProduct['product_color'],
                    ':product_option' => $dataProduct['product_option'],
                    ':product_picture_url' => $dataProduct['product_picture_url']
                ]
            ]);

            return true;
        }

        function updateWhyNoteProduct($dataProduct){
            $this ->executeQuery([
                'query' => "UPDATE products SET product_name=:product_name, product_color=:product_color, product_option=:product_option, product_picture_url=:product_picture_url, product_date_added=now() where id_product=:id_product" ,
                'definitions' => [
                    ':product_name' => $dataProduct['product_name'],
                    ':product_color' => $dataProduct['product_color'],
                    ':product_option' => $dataProduct['product_option'],
                    ':product_picture_url' => $dataProduct['product_picture_url'],
                    ':id_product' => $dataProduct['id_product']
                ]
            ]);
            
            return true;
        }
        
        function getDiferentOptionProduct($filter,$partner){
            $products = $this->fetchAll([
                'query' => "SELECT DISTINCT $filter FROM Products where product_visibility = true and partner_name = '$partner';"]);
                return $products;
        }

        function getProductsOneFilter($filter,$value,$partner){
            $products = $this->fetchAll([
                'query' => "SELECT* FROM Products WHERE $filter = '".$value."'  and partner_name = '".$partner."' and product_visibility = true;"]);
                return $products;
        }

        /*#################################################################
        ###################################################################
        #############################  EMOTIONAL  #########################
        ###################################################################
        ###################################################################*/

        function registerEmotionalProduct($dataProduct){
            $this->executeQuery([
                'query' => 'INSERT INTO Products VALUES (NULL,"emotional",:product_name,NULL,NULL,:product_reference,:product_ean,:product_sku,:product_size,:product_engraving,:product_number_line_engraving,:product_number_characters,:product_picture_url,now(),1 );',
                'definitions' => [
                    ':product_name'=>$dataProduct['product_name'],
                    ':product_reference'=>$dataProduct['product_reference'],
                    ':product_ean'=>$dataProduct['product_ean'],
                    ':product_sku'=>$dataProduct['product_sku'],
                    ':product_size'=>$dataProduct['product_size'],
                    ':product_engraving'=>$dataProduct['product_engraving'],
                    ':product_number_line_engraving'=>$dataProduct['product_number_line_engraving'],
                    ':product_number_characters'=>$dataProduct['product_number_characters'],
                    ':product_picture_url'=>$dataProduct['product_picture_url'],
                    
                ]
            ]);

            return true;
        }

        function getEmotionalProducts($dataProduct){
            $products = $this->fetchAll(['query' => "SELECT * FROM products where product_name='".$dataProduct['product_name']."'and product_reference='".$dataProduct['product_reference']."'and product_ean='".$dataProduct['product_ean']."' and product_sku='".$dataProduct['product_sku']."'and product_size='".$dataProduct['product_size']."'and product_engraving='".$dataProduct['product_engraving']."' ;"]);
            return $products;
        }

        function updateEmotionalProduct($dataProduct){
            $this->executeQuery([
                'query' => 'UPDATE products set product_name=:product_name, product_reference=:product_reference, product_ean=:product_ean, product_sku=:product_sku, product_engraving=:product_engraving, product_size=:product_size, product_number_line_engraving=:product_number_line_engraving, product_number_characters=:product_number_characters, product_picture_url=:product_picture_url, product_date_added=now() where id_product=:id_product ;',
                'definitions' => [
                    ':product_name'=>$dataProduct['product_name'],
                    ':product_reference'=>$dataProduct['product_reference'],
                    ':product_ean'=>$dataProduct['product_ean'],
                    ':product_sku'=>$dataProduct['product_sku'],
                    ':product_engraving'=>$dataProduct['product_engraving'],
                    ':product_size'=>$dataProduct['product_size'],
                    ':product_number_line_engraving'=>$dataProduct['product_number_line_engraving'],
                    ':product_number_characters'=>$dataProduct['product_number_characters'],
                    ':product_picture_url'=>$dataProduct['product_picture_url'],
                    ':id_product'=>$dataProduct['id_product']
                ]
            ]);
            
        }
    }
