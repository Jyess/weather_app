<?php

require_once "model/Connexion.php";
require_once "Widget.php";

/**
 * Représente les fonctions utiles à la table Widget
 */
class ModelWidget extends Connexion {

    /**
     * Insère une nouvelle ville avec les informations météo
     */
    static function insert($data) {
        $st = self::init()->prepare("
            insert into widget(nom_ville, temperature, unit, code_meteo, description, pays, date)
            values(:nom_ville,'".$data['temperature']."','".$data['unit']."','".$data['code_meteo']."','".$data['description']."','".$data['pays']."',".$data['date'].");
        ");

        $st->bindValue(":nom_ville", $data['nom_ville']);

        $st->execute();
    }

    /**
     * Met à jour l'unité et la température de la météo
     */
    static function convert($unit, $temp, $id) {
        $st = self::init()->prepare("
            update widget
            set unit = :unit, temperature = :temp
            where id = :id;
        ");

        $st->bindValue(":unit", $unit);
        $st->bindValue(":temp", $temp);
        $st->bindValue(":id", $id);

        $st->execute();
    }

    /**
     * Met à jour les données météo d'un widget
     */
    static function refresh($temp, $codem, $desc, $id) {
        $st = self::init()->prepare("
            update widget
            set temperature = :temp, code_meteo = :codem, description = :desc, date = current_time
            where id = :id;
        ");

        $st->bindValue(":temp", $temp);
        $st->bindValue(":codem", $codem);
        $st->bindValue(":desc", $desc);
        $st->bindValue(":id", $id);

        $st->execute();
    }

    /**
     * Supprime un widget
     */
    static function delete($id) {
        $st = self::init()->prepare("
            delete from widget 
            where id=:id
        ");

        $st->bindValue(":id", $id);

        $st->execute();
    }

    /**
     * Retourne un widget
     */
    static function getById($id) {
        $st = self::init()->prepare("
            select *
            from widget
            where id = :id;
        ");
        $st->bindValue(":id", $id);
        $st->execute();

        $res = $st->fetch(PDO::FETCH_ASSOC);
        
        //on vérifie si la valeur existe
        if ($res) {
            $w = new Widget($res);
            return $w;
        } else {
            return false;
        }
    }

    /**
     * Retourne tous les widgets
     */
    static function getAll() {
        $st = self::init()->prepare("
            select *
            from widget
        ");
        $st->execute();

        $widgets = $st->fetchAll(PDO::FETCH_ASSOC);

        $widgetsObj = array();
        foreach ($widgets as $widget) {
            $widgetsObj[] = new Widget($widget);
        }

        return $widgetsObj;
    }
}