<?php

$role1 = $role->fetch();
var_dump($role1);
ob_start(); 
?>
<h2>Modifier un role:</h2>
<div>
    <form class="formulaire" action="index.php?action=modifierRole" method="post">
        <div><span> <?= $role1['nom_role']  ?></span></div>
        <div class="saisie">
            <label for="nom_role">nom role</label><br>
            <input type="text" name="nom_role" class="form-control" id="nom_role " ><br>
            <!-- <input id="prodId" name="prodId" type="hidden" value="xm234jq"> -->
            <input type="hidden" name="id_role" class="form-control" id="id_role "value="<?= $role1['id_role']?>" ><br>
        </div>
        <div class ="button_submit">
            <a href="index.php?action=listRoles"><button type="submit" id="send">Modifier</button></a><br>
        </div>
    </form> 
</div>
<?php
$titre = "Formulaire pour Modifier Un role";
$contenu = ob_get_clean();
require "views\layouts\Template.php";

