<?php

/**
 * Classe qui permet la connexion à la base de données
 */
class Connexion {
    static function init() {
        $host = "localhost";
        $db = "weather_app"; 
        $login = "root";
        $pwd = "";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $login, $pwd);
            return $pdo;
        } catch(PDOException $e) {
            echo "Connexion impossible.<br>
            Vérifiez les données de connexion à la base de données dans <code>model/Connexion.php</code>.<br>
            <ul><li>Host : " . $host .
            "<br></li><li>Base de données : " . $db .
            "<br></li><li>Login : " . $login . "</li></ul>";
            die();
        }
    }
}