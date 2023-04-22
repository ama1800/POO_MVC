<?php

ob_start(); 
?>
<h2>Ajouter un Realisateur:</h2>
<div>
    <form class="formulaire" action="index.php?action=ajouterRealisateur" method="post">
      <div class="saisie">
        <label for="nom_realisateur">nom_realisateur</label><br>
        <input type="text" name="nom_realisateur" class="form-control" id="nom_realisateur " ><br>
        <label for="prenom_realisateur">prenom_realisateur</label><br>
        <input type="text" name="prenom_realisateur" class="form-control" id="prenom_realisateur " ><br>
      </div>
      <div class ="button_submit">
        <a href="index.php?action=ajouterRealisateur"><button type="submit" id="send">Ajouter</button><br></a>
      </div>
    </form> 
</div>
<?php
$titre = "Formulaire Ajouter Un Realisateur";
$contenu = ob_get_clean();
require "views\layouts\Template.php";


