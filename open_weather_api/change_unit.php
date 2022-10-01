<?php

// vérifie que l'unité soit bien metric ou imperial
if (isset($_GET['unit']) && ($_GET['unit'] == "metric" || $_GET['unit'] == "imperial")) {
    // vérifie que l'unité n'est pas déjà activé
    if ($_GET['unit'] != $_SESSION["unit"]) {
        if ($_GET['unit'] == "metric") {
            $_SESSION["unit"] = "metric";
        } else {
            $_SESSION["unit"] = "imperial";
        }

        if (!empty($_SESSION["my_widgets"])) {
            // convertit les temp de chaque objet
            foreach ($_SESSION["my_widgets"] as $widget) {
                $widget->convert();
                ModelWidget::convert($widget->getUnit(), $widget->getTemperature(), $widget->getId()); //met à jour la bdd
            }
        }
    
        header("Location: /reglages");
    } else {
        header("Location: /");
    }
} else {
    header("Location: /");
}