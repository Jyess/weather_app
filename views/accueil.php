<?php
require_once Functions::view("header");

if (!empty($_SESSION["my_widgets"])) {
    if ($_SESSION["unit"] == "metric") {
        $unit = "C";
    } else {
        $unit = "F";
    }
}
?>

<!-- affiche les widgets s'ils existent, sinon affiche un message -->
<div class="d-flex flex-wrap bd-highlight mb-3">
    <?php if (!empty($_SESSION["my_widgets"])): ?>
        <?php foreach ($_SESSION["my_widgets"] as $widget): ?>
            <div class="p-2 bd-highlight card-flex">
                <div class="card">
                    <div class="card-header bg-white font-weight-bold">
                        <?php echo $widget->getNomVille(); ?>
                        <span class="badge badge-info"><?php echo $widget->getPays(); ?></span>
                    </div>
                    
                    <?php echo $widget->getIcon(); ?>
                    
                    <div class="card-body">
                        <h2 class="card-title "><?php echo $widget->getTemperature() . "°" . $unit; ?></h2>
                        <h5 class="card-text"><?php echo ucfirst($widget->getDescription()); ?></h5>
                        <a href="/refresh_widget?id=<?php echo $widget->getId(); ?>" role="button">Actualiser <i class="wi wi-refresh"></i></a>
                        <span class="font-italic info-maj">(Dernière mise à jour : <?php echo $widget->getDate(); ?>)</span>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="container text-center no-widget text-muted mb-4 mt-4">Vous n'avez pas encore ajouté de widget. <br>Dirigez-vous vers l'onglet <span class="font-italic">Réglages</span> et cliquez sur le bouton "Ajouter un widget".</div>
    <?php endif; ?>
</div>