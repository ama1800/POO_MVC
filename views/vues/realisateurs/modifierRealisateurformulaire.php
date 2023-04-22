<?php

$realisateur1 = $realisateur->fetch();
ob_start(); 
?>
<h2>Modifier un realisateur:</h2>
<div>
    <form class="formulaire" action="index.php?action=modifierrealisateur" method="post">
        <div><span> <?= $realisateur1['nom_realisateur']. " " .$realisateur1['prenom_realisateur']; ?></span></div>
        <div class="saisie">
            <label for="nom_realisateur">nom realisateur</label><br>
            <input type="text" name="nom_realisateur" class="form-control" id="nom_realisateur " ><br>
            <label for="nom_realisateur">prenom realisateur</label><br>
            <input type="text" name="prenom_realisateur" class="form-control" id="prenom_realisateur " ><br>
            <input type="hidden" name="id_real" class="form-control" id="id_real "value="<?= $realisateur1['id_real']?>" ><br>
        </div>
        <div class ="button_submit">
            <a href="index.php?action=listrealisateurs"><button type="submit" id="send">Modifier</button></a><br>
        </div>
    </form> 
</div>
<?php
$titre = "Formulaire pour Modifier Un realisateur";
$contenu = ob_get_clean();
require "views\layouts\Template.php";

