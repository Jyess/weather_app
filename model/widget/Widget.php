<?php

/**
 * Représente un widget météo
 */
class Widget {
    /** Id du widget */
    private $id;

    /** Nom de la ville */
    private $nom_ville;

    /** Température de la ville */
    private $temperature;

    /** Unité de la température */
    private $unit;

    /** Code correspondant à une catégorie météo */
    private $codeMeteo;

    /** Description de la météo */
    private $description;

    /** Pays de la météo */
    private $pays;

    /** Date d'actualisation des données météo */
    private $date;

    /**
     * Construit l'objet widget
     */
    function __construct($data) {
        $this->id = $data["id"];
        $this->nom_ville = $data["nom_ville"];
        $this->temperature = $data["temperature"];
        $this->unit = $data["unit"];
        $this->code_meteo = $data["code_meteo"];
        $this->description = $data["description"];
        $this->pays = $data["pays"];
        $this->date = $data["date"];
    }

    /**
     * Retourne l'id du widget
     */
    function getId() {
        return $this->id;
    }

    /**
     * Définit l'id du widget
     */
    function setId($id) {
        $this->id = $id;
    }

    /**
     * Retourne le nom de la ville
     */
    function getNomVille() {
        return $this->nom_ville;
    }

    /**
     * Modifie le nom de la ville
     */
    function setNomVille($nom) {
        $this->nom_ville = $nom;
    }

    /**
     * Retourne le nom du pays
     */
    function getPays() {
        return $this->pays;
    }

    /**
     * Modifie le nom de pays
     */
    function setPays($pays) {
        $this->pays = $pays;
    }

    /**
     * Retourne la température
     */
    function getTemperature() {
        return number_format($this->temperature,0);
    }

    /**
     * Modifie la température
     */
    function setTemperature($temp) {
        $this->temperature = number_format($temp,0);
    }

    /**
     * Retourne l'unité de température
     */
    function getUnit() {
        return $this->unit;
    }

    /**
     * Modifie l'unité de température
     */
    function setUnit($unit) {
        $this->unit = $unit;
    }

        /**
     * Retourne le code correspondant à une catégorie météo
     */
    function getCodeMeteo() {
        return $this->code_meteo;
    }

    /**
     * Modifie le code correspondant à une catégorie météo
     */
    function setCodeMeteo($code_meteo) {
        $this->code_meteo = $code_meteo;
    }

    /**
     * Retourne la description de la météo
     */
    function getDescription() {
        return $this->description;
    }

    /**
     * Modifie la description de la météo
     */
    function setDescription($desc) {
        $this->description = $desc;
    }

    /**
     * Retourne la date d'actualisation du widget
     */
    function getDate() {
        return $this->date;
    }

    /**
     * Modifie la date d'actualisation du widget
     */
    function setDate($data) {
        return $this->date = $data;
    }

    /**
     * Retourne la balise html pour l'icone météo
     */
    function getIcon() {
        $timezoneId = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $this->getPays())[0]; //retourne l'id du décalage horaire du pays
        date_default_timezone_set($timezoneId); //met la timezone correspondant au pays

        //définit jour/nuit (soleil ou lune)
        if (date('G') < 6) {
            $time = "night";
        } else if (date('G') >= 6 && date('G') < 18) {
            $time = "day";
        } else if (date('G') >= 18) {
            $time = "night";
        }

        $codeMeteo = $this->getCodeMeteo();

        //définit une partie du nom codeMeteo l'icone pour une catégorie météo donnée
        if ($codeMeteo >= 200 && $codeMeteo <= 232) {
            $weather = "thunderstorm";
        } else if ($codeMeteo >= 300 && $codeMeteo <= 321) {
            $weather = "showers";
        } else if ($codeMeteo >= 500 && $codeMeteo <= 531) {
            $weather = "rain";
        } else if ($codeMeteo >= 600 && $codeMeteo <= 622) {
            $weather = "snow";
        } else if ($codeMeteo >= 701 && $codeMeteo <= 781) {
            $weather = "fog";
        } else if ($codeMeteo == 800 && $time == "day") {
            $weather = "sunny";
        } else if ($codeMeteo == 800 && $time == "night") {
            $weather = "clear";
        } else if ($codeMeteo >= 801 && $codeMeteo <= 804) {
            $weather = "cloudy";
        }
        
        return "<i class='wi wi-$time-$weather'></i>";
    }

    /**
     * Convertit la température dans l'autre unité
     */
    function convert() {
        $temp = $this->getTemperature();

        if ($this->getUnit() == 'imperial') {
            $this->setTemperature(($temp - 32) / 1.8); //conversion en celsius
            $this->setUnit("metric");
        } else {
            $this->setTemperature(($temp * 1.8) + 32); //conversion en fahrenheit
            $this->setUnit("imperial");
        }
    }
}