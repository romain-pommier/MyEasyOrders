<?php
    require_once 'src/Controllers/Controller.php';
    require_once 'src/Models/Font.php';

    //Ajouter une verification avant d'ajouter

    class FontsController extends Controller
    {
        public function __construct()
        {
            $this->model = new Font();
        }

        public function addEmotionalFont($dataFont){
            $this->model->addEmotionalFont($_POST['fontEmotional']);
            echo "Police Ajouter";
            die();
        }
    }