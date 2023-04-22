<?php

ob_start(); 
?>
<h2>Ajouter un acteur:</h2>
<div>
    <form class="formulaire" action="index.php?action=ajouterActeur" method="post">
      <div class="saisie">
        <label for="nom_acteur">nom_acteur</label><br>
        <input type="text" name="nom_acteur" class="form-control" id="nom_acteur " ><br>
        <label for="prenom_acteur">prenom_acteur</label><br>
        <input type="text" name="prenom_acteur" class="form-control" id="prenom_acteur " ><br>
        <label for="sexe">sexe</label><br>
        <input type="text" name="sexe" class="form-control" id="sexe " ><br>
        <label for="date_naissance">date_naissance</label><br>
        <input type="date" name="date_naissance" class="form-control" id="date_naissance " ><br>
      </div>
      <div class ="button_submit">
        <a href="index.php?action=ajouterActeur"><button type="submit" id="send">Ajouter</button><br></a>
      </div>
    </form> 
</div>
<?php
$titre = "Formulaire Ajouter Un Acteur";
$contenu = ob_get_clean();
require "views\layouts\Template.php";


