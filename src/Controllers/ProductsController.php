<?php
    require_once 'src/Controllers/Controller.php';
    require_once 'src/Models/Product.php';

    class ProductsController extends Controller
    {
        public function __construct(){
            $this->model = new Product();
        }

        public function checkAndRegisterWhynoteProduct($dataProduct){
            if(count($this->model->getWhyNoteProducts($dataProduct)) == 0){
                $this->model->registerWhynoteProduct($dataProduct);
                echo "Produit ajouté";
                die();
            }
            
            else{
                echo 'Ce produits exist deja';
                die();
            }
        }
        
        public function deleteProduct($id_product, $partner){
            $this->model->deleteProduct($id_product, $partner);
            echo "Produit supprimé";
            die();
        }
        
        public function updateWhyNoteProduct($dataProduct){
            $this->model->updateWhyNoteProduct($dataProduct);
            echo "Produit modifier";
            die();
        }
        
        public function updateEmotionalProduct($dataProduct){
            $this->model->updateEmotionalProduct($dataProduct);
            echo "Produit modifier";
            die();
        }
        
        public function checkAndRegisterEmotionalProduct($dataProduct){
            if(count($this->model->getEmotionalProducts($dataProduct)) == 0){
                $this->model->registerEmotionalProduct($dataProduct);
                echo "Produit ajouté";
                die();
            }
            
            else{
                echo 'Ce produits exist deja';
                die();
            }
        }
        
        public function getDiferentFilterProduct($partner){
            if($partner == 'whynote'){
                $filter=["product_name","product_color"];
                $products=[$this->model->getDiferentOptionProduct($filter[0],'whynote'),$this->model->getDiferentOptionProduct($filter[1],'whynote')];
                return $products;
            }
            else{
                $filter=["product_sku","product_size"];
                $products=[$this->model->getDiferentOptionProduct($filter[0],'emotional'),$this->model->getDiferentOptionProduct($filter[1],'emotional')];
                return $products;
            }
            
        }
    }

?>