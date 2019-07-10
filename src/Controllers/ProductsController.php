<?php
    require_once 'src/Controllers/Controller.php';
    require_once 'src/Models/Product.php';

    class ProductsController extends Controller
    {
        public function __construct()
        {
            $this->model = new Product();
        }

        public function read($request)
        {
            $this->readWhyNote($request, "whynote");
            $this->readEmotional($request, "emotional");
        }

        public function readWhyNote($request, $partner)
        {
            if (isset($request['contentTableWhyNote'])) {
                echo json_encode($this->model->getAllProduct($partner));
                die();
            }
            else if (isset($request['deleteWhyNoteProduct'])){
                $this->model->deleteProduct($request['deleteWhyNoteProduct'], $partner);
                echo "Produit supprimer";
                die();
            }
            if(isset($request[''])){
                if(count(getWhyNoteProduct($request['addProductWhyNote']))==0){
                    //registerProduct($request[''], $partner);
                    echo "Produit ajouté";
                }
                else{
                    echo"Ce produit existe deja"; 
                }
            }
        }
        public function readEmotional($request, $partner)
        {
            if (isset($request['contentTableEmotional'])){
                echo json_encode($this->model->getAllProduct($partner));
                die();
            }
        }
        
    }

?>