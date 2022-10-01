<?php

if (isset($_POST["ville"]) && !empty($_POST["ville"])) {
    // vérifie que la ville n'a pas déjà été ajoutée
    if (Functions::isUnique($_POST["ville"])) {
        $apikey = "14a82307e3b11d6f577a79ce51e42676"; //clé pour la communication avec l'api
        $nom_ville = urlencode($_POST["ville"]); //encode la ville pour empêcher d'ajouter des paramètres lors de l'appel de l'api
        $temp_unit = $_SESSION["unit"]; //unité de température

        //quand un warning est rencontré, on crée une exception
        set_error_handler(function () {
            throw new ErrorException("failed to open stream");
        }, E_WARNING);

        //appelle l'api avec les données récoltées
        try {
            $json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=$nom_ville&APPID=$apikey&units=$temp_unit&lang=fr");
        } catch (Exception $e) {
            $json = false;
        }

        //remet la gestion des warnings comme avant
        restore_error_handler();

        // vérifie que l'objet retourne les données météo d'une ville (si elle existe)
        if ($json) {
            $obj = json_decode($json);
            $data = array();

            $data["nom_ville"] = $obj->name; //nom de la ville
            $data["code_meteo"] = $obj->weather[0]->id; //code correspondant à une catégorie météo
            $data["temperature"] = $obj->main->temp; //température dans l'unité donnée
            $data["unit"] = $temp_unit;
            $data["description"] = $obj->weather[0]->description; //description de la météo
            $data["pays"] = $obj->sys->country; //code du pays 
            $data["date"] = "CURRENT_TIME"; //heure actuelle

            // sauvegarde dans la base de données
            ModelWidget::insert($data);

            header("Location: /reglages");
        } else {
            setcookie("error","1",time()+3,"/"); //cookie pour afficher msg erreur
            header("Location: /ajouter_widget");
        }
    } else {
        setcookie("duplicate","1",time()+3,"/"); //cookie pour afficher msg erreur
        header("Location: /ajouter_widget");
    }
} else {
    header("Location: /");
}

?>