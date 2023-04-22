<?php

$film1 = $film->fetch();
ob_start(); 
?>
<h2>Modifier un film:</h2>
<div>
    <form class="formulaire" action="index.php?action=modifierfilm" method="post">
        <div><span> <?= $film1['titre']. " " .$film1['annee']. " " .$film1['note']. " " .$film1['duree']; ?></span></div>
        <div class="saisie">
        titre, annee, note, synopsis, affiche, id_real, duree
            <label for="titre">Titre</label><br>
            <input type="text" name="titre" class="form-control" id="titre " ><br>
            <label for="titre">Annee de sortie film</label><br>
            <input type="text" name="annee" class="form-control" id="annee " ><br>
            <label for="titre">synopsis</label><br>
            <textarea type="text" name="synopsis" class="form-control" id="synopsis " ><br></textarea><br>
            <label for="titre">note</label><br>
            <input type="date" name="note" class="form-control" id="note " ><br>
            <label for="titre">Affiche</label><br>
            <input type="text" name="titre" class="form-control" id="titre " ><br>
            <label for="titre">Duree</label><br>
            <input type="text" name="annee" class="form-control" id="annee " ><br>
        </div>
        <div class="select">
            <label for="genre">genre</label><br>
            <select name="nom_genre[]" multiple class="form-control" id="genre"><br>
                <?php
                while($genres = $listGenres->fetch()){
                    echo '<option value ='.$genres['id_genre'].'>'.$genres['nom_genre'].'</option>';
                }
                ?>
            </select><br> 
            <label for="realisateur">Realisateur</label><br>
            <select name="realisateur" multiple class="form-control" id="realisateur"><br>
                <?php
                while($realisateurs = $listRealisateurs->fetch()){
                    echo '<option value ='.$realisateurs['id_real'].'>'.$realisateurs['nom'].'</option>';
                }
                ?>
            </select><br>
        </div><br>
            <input type="hidden" name="id_film" class="form-control" id="id_film "value="<?= $film1['id_film']?>" ><br>
        <div class ="button_submit">
            <a href="index.php?action=listFilms"><button type="submit" id="send">Modifier</button></a><br>
        </div>
    </form> 
</div>
<?php
$titre = "Formulaire pour Modifier: ".$film1['titre'];
$contenu = ob_get_clean();
require "views\layouts\Template.php";

