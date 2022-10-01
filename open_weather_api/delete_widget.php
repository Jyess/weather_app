<?php
if (isset($_GET['id'])) {
    $index = $_GET['id'];

    //vérifie que le widget existe bien dans la bdd
    if (ModelWidget::getById($index)) {
        ModelWidget::delete($index); //supprime dans la bdd
        
        header('Location: /reglages');
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}