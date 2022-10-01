<?php
require_once "open_weather_api/Functions.php";
require_once "model/widget/ModelWidget.php";
session_start();

$_SESSION["my_widgets"] = ModelWidget::getAll(); //met les widgets dans une session

//stocke l'unité de température
if (!isset($_SESSION["unit"]) && empty($_SESSION["my_widgets"])) {
    $_SESSION["unit"] = "metric";
} else if (!empty($_SESSION["my_widgets"])) {
    $_SESSION["unit"] = $_SESSION["my_widgets"][0]->getUnit();
}

//renvoie vers la vue ou le script correspondant au chemin donné
$request = explode('?', $_SERVER['REQUEST_URI']);
switch ($request[0]) {
    case '/':
        $view = Functions::view("accueil");
        break;
    case '/accueil':
        $view = Functions::view("accueil");
        break;
    case '/reglages':
        $view = Functions::view("reglages");
        break;
    case '/ajouter_widget':
        $view = Functions::view("ajouter_widget");
        break;
    case '/create_widget':
        $view = Functions::script("create_widget");
        break;
    case '/supprimer_widget':
        $view = Functions::script("delete_widget");
        break;
    case '/refresh_widget':
        $view = Functions::script("refresh_widget");
        break;
    case '/change_unit':
        $view = Functions::script("change_unit");
        break;
    case '/error':
        $view = Functions::view("error");
        break;
    default:
        $view = "error";
        break;
}

if ($view == "error") {
    header("Location: /error");
} else {
    require_once $view;
}

require_once Functions::view("footer");
?>
