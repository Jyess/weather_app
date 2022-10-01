<?php

/**
 * Représente des fonctions utiles
 */
class Functions {
    /**
     * Retourne le chemin de la vue donnée en paramètre.
     * @param string le nom de la vue
     * @return string le chemin de la vue
     */
    static function view($view) {
        return "views/$view.php";
    }

    /**
     * Retourne le chemin du script donné en paramètre.
     * @param string le nom du script
     * @return string le chemin du script
     */
    static function script($script) {
        return "open_weather_api/$script.php";
    }

    /**
     * Vérifie que la ville donnée en paramètre n'existe pas déjà.
     * Si elle est unique, la fonction retourne true, sinon false.
     * @param string la ville
     * @return boolean
     */
    static function isUnique($ville) {
        $ville_array = array(strtolower($ville)); //ajoute la ville donnée à un tableau

        //ajoute les villes existantes dans le tableau
        foreach ($_SESSION["my_widgets"] as $widget) {
            array_push($ville_array,strtolower($widget->getNomVille()));
        }
        
        //on compte les occurrences de chaque valeur
        foreach (array_count_values($ville_array) as $ville) {
            if ($ville > 1) {
                return false;
            }
            return true;
        }
    }
}