<?php

$genre1 = $genre->fetch();
var_dump($genre1);
ob_start(); 
?>
<h2>Modifier un Genre:</h2>
<div>
    <form class="formulaire" action="index.php?action=modifierGenre" method="post">
        <div><span> <?= $genre1['nom_genre']  ?></span></div>
        <div class="saisie">
            <label for="nom_genre">nom genre</label><br>
            <input type="text" name="nom_genre" class="form-control" id="nom_genre " ><br>
            <!-- <input id="prodId" name="prodId" type="hidden" value="xm234jq"> -->
            <input type="hidden" name="id_genre" class="form-control" id="id_genre "value="<?= $genre1['id_genre']?>" ><br>
        </div>
        <div class ="button_submit">
            <a href="index.php?action=listGenres"><button type="submit" id="send">Modifier</button></a><br>
        </div>
    </form> 
</div>
<?php
$titre = "Formulaire pour Modifier Un Genre";
$contenu = ob_get_clean();
require "views\layouts\Template.php";

