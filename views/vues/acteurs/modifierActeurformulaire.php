<?php

$acteur1 = $acteur->fetch();
ob_start(); 
?>
<h2>Modifier un acteur:</h2>
<div>
    <form class="formulaire" action="index.php?action=modifieracteur" method="post">
        <div><span> <?= $acteur1['nom_acteur']. " " .$acteur1['prenom_acteur']. " " .$acteur1['sexe']. " ".$acteur1['date_naissance']; ?></span></div>
        <div class="saisie">
            <label for="nom_acteur">nom acteur</label><br>
            <input type="text" name="nom_acteur" class="form-control" id="nom_acteur " ><br>
            <label for="nom_acteur">prenom acteur</label><br>
            <input type="text" name="prenom_acteur" class="form-control" id="prenom_acteur " ><br>
            <label for="nom_acteur">sexe</label><br>
            <input type="text" name="sexe" class="form-control" id="sexe " ><br>
            <label for="nom_acteur">date_naissance</label><br>
            <input type="date" name="date_naissance" class="form-control" id="date_naissance " ><br>
            <input type="hidden" name="id_acteur" class="form-control" id="id_acteur "value="<?= $acteur1['id_acteur']?>" ><br>
        </div>
        <div class ="button_submit">
            <a href="index.php?action=listacteurs"><button type="submit" id="send">Modifier</button></a><br>
        </div>
    </form> 
</div>
<?php
$titre = "Formulaire pour Modifier Un acteur";
$contenu = ob_get_clean();
require "views\layouts\Template.php";

