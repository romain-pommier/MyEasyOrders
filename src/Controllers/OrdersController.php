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
        
        
        
        public function deleteOrder($idOrder){
            $this->model->deleteOrder($idOrder);
            echo 'Commande supprimé';
            
        }
        
        

    }