<?php require_once Functions::view("header"); ?>

<!-- affiche le formulaire d'ajout de widget météo -->
<div class="d-flex justify-content-center column">
  <form action="/create_widget" method="post" class="w-50">
    <div class="form-group input-group-lg">
      <label for="ville" class="ville">Nom de la ville</label>
      <input type="text" class="form-control" id="ville" name="ville" placeholder="Ex : Montpellier, Paris..." required autofocus>
      
      <?php 
      //affiche un message d'erreur en fonction du cookie existant
      if (isset($_COOKIE["error"])) {
        echo "<div class='invalid-feedback'>Cette ville n'existe pas. Veuillez réessayer.</div>";
      } else if (isset($_COOKIE["duplicate"])) {
        echo "<div class='invalid-feedback'>Vous avez déjà ajouté cette ville. Veuillez réessayer.</div>";
      }
      ?>

    </div>
    <div class="w-100 text-center">
      <button type="submit" class="btn btn-primary btn-lg p-2">Créer le widget</button>
    </div>
  </form>
</div>