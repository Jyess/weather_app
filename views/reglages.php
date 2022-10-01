<?php require_once Functions::view("header"); ?>

<!-- bouton pour afficher le formulaire d'ajout de widget -->
<a id="btn_add_widget" class="btn btn-secondary float-right" href="/ajouter_widget" role="button">Ajouter un widget</a>

<h1>Vos widgets</h1>

<!-- affiche les widgets s'ils existent, sinon affiche un message -->
<?php if(!empty($_SESSION["my_widgets"])): ?>

<div class="d-flex flex-wrap bd-highlight mb-3">
    <?php foreach ($_SESSION["my_widgets"] as $widget): ?>
        <div class="p-2 bd-highlight card-flex">

            <div class="card">
                <div class="card-header">
                    <?php echo $widget->getNomVille();?> (<?php echo $widget->getPays(); ?>)
                    <div class="float-right">
                        <a class="btn btn-outline-danger btn-sm" href="/supprimer_widget?id=<?php echo $widget->getId(); ?>" role="button" title="Supprimer widget">&#10006;</a>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach;?>
</div>

<?php else: ?>

<div class="container text-center no-widget text-muted mb-4 mt-4">Vous n'avez pas encore ajouté de widget. Cliquez sur le bouton "Ajouter un widget" ci-dessus.</div>

<?php endif;?>

<h1>Paramètres</h1>

<?php
// coche la case correspondant à l'unité de température
if ($_SESSION["unit"] == "metric") {
    $c = "checked disabled";
    $f = "";
} else {
    $c = "";
    $f = "checked disabled";
}

?>

<fieldset>
    <legend>Changer l'unité de température</legend>

    <div class="custom-control custom-radio">
        <input type="radio" id="ce" name="customRadio" class="custom-control-input" <?php echo $c ?>>
        <label class="custom-control-label" for="ce">Celsius</label>
    </div>

    <div class="custom-control custom-radio">
        <input type="radio" id="fa" name="customRadio" class="custom-control-input" <?php echo $f ?>>
        <label class="custom-control-label" for="fa">Fahrenheit</label>
    </div>
</fieldset>


