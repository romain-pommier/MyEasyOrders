<?php
    require_once 'src/Controllers/Controller.php';
    require_once 'src/Models/Order.php';

    //Ajouter une verification avant d'ajouter

    class OrdersController extends Controller
    {
        public function __construct(){
            $this->model = new Order();
        }
        
        public function addWhynoteOrder($dataClient){
            $this->model->addWhynoteOrder($dataClient);
            echo'Commande Ajouté';
            die();
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
        
        public function deleteOrder($idOrder){
            $this->model->deleteOrder($idOrder);
            echo 'Commande supprimé';
            
        }
        
        

    }