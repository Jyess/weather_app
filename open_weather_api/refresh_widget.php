<?php

if (isset($_GET['id'])) {
    $index = $_GET['id']; //id de l'objet widget
    $apikey = ""; //clé pour la communication avec l'api
    $temp_unit = $_SESSION["unit"]; //unité de température
    $widget = ModelWidget::getById($index); //widget correspondant à l'id
    
    //vérifie si le widget existe
    if ($widget) {
        $nom_ville = $widget->getNomVille(); //ville du widget 
        $json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$nom_ville&APPID=$apikey&units=$temp_unit&lang=fr");
        
        $obj = json_decode($json);
        $temp = $obj->main->temp; //modifie la température
        $codem = $obj->weather[0]->id; //modifie le code météo
        $desc = $obj->weather[0]->description; //modifie la description météo

        //met à jour les données dans la bdd
        ModelWidget::refresh($temp, $codem, $desc, $index);
        
        header('Location: /accueil');       
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}