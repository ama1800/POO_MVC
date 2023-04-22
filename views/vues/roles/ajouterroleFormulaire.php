<?php

ob_start(); 
?>
<h2>Ajouter un Role:</h2>
<div>
    <form class="formulaire" action="index.php?action=ajouterRole" method="post">
      <div class="saisie">
        <label for="nom_role">nom_role</label><br>
        <input type="text" name="nom_role" class="form-control" id="nom_role " ><br>
      </div>
      <div class ="button_submit">
        <a href="index.php?action=ajouterRole"><button type="submit" id="send">Ajouter Le Role</button><br></a>
      </div>
    </form> 
</div>
<?php
$titre = "Formulaire Ajouter Un Acteur";
$contenu = ob_get_clean();
require "views\layouts\Template.php";

