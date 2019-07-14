<?php
    require_once 'src/Models/Model.php';

    class Font extends Model {
         //Ajouter une verification avant d'ajouter
        function addEmotionalFont($dataFont){
            $this->executeQuery([
                'query' => "INSERT INTO fonts VALUES (null,:font_name);",
                'definitions' => [':font_name' => $dataFont],
            ]);
            return true;
        }
        
        function getEmotionalFont(){
            $font = $this->fetchAll(['query' => "SELECT * FROM fonts ;"]);
            return  $font;
        }


    }