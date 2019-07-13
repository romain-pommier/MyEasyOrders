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

        public function getProductFilter($dataFilter,$partner){
            if($partner=='whynote'){
                $filter=['product_name','product_color'];
            }
            else{
                $filter=['product_sku','product_size'];
            }
            if (count($dataFilter)==1 && $dataFilter !== 0){
                if(array_key_exists($filter[0],$dataFilter)){
                    echo json_encode($this->model->getProductsOneFilter($filter[0],$dataFilter[$filter[0]],$partner));
                }
                else{
                    echo json_encode($this->model->getProductsOneFilter($filter[1],$dataFilter[$filter[1]],$partner));
                }
            }
            else{
                $filter=[$filter[0],$filter[1]];
                $value=[$_POST[$filter[0]],$dataFilter[$filter[1]]];
                echo json_encode($this->model->getProductsTwoFilter($filter,$value,$partner));
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