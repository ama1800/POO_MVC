<?php

ob_start(); 
?>
<h2>Ajouter un Genre:</h2>
<div>
    <form class="formulaire" action="index.php?action=ajouterGenre" method="post">
      <div class="saisie">
        <label for="nom_genre">nom_genre</label><br>
        <input type="text" name="nom_genre" class="form-control" id="nom_genre " ><br>
      </div>
      <div class ="button_submit">
        <a href="index.php?action=ajouterGenre"><button type="submit" id="send">Ajouter Le genre</button><br></a>
      </div>
    </form> 
</div>
<?php
$titre = "Formulaire pour Ajouter Un Genre";
$contenu = ob_get_clean();
require "views\layouts\Template.php";

