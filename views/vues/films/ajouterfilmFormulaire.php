<?php

ob_start(); 
?>
<h2>Ajouter un film:</h2>
<div>
    <form class="formulaire" action="index.php?action=ajouterFilm" method="post">
      <div class="saisie">
        <label for="titre">Titre</label><br>
        <input type="titre" name="titre" class="form-control" id="titre " ><br>
        <label for="annee">annee</label><br>
        <input type="number" name="annee" class="form-control" id="annee " ><br>
        <label for="note">note</label><br>
        <input type="number" name="note" class="form-control" id="note " ><br>
        <label for="affiche">affiche</label><br>
        <input type="text" name="affiche" class="form-control" id="affiche " ><br>
        <label for="duree">duree</label><br>
        <input type="TIME" name="duree" class="form-control" id="duree " ><br>
        <label for="synopsis">synopsis</label><br>
        <textarea type="text" name="synopsis" class="form-control" id="synopsis" ></textarea><br>
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
      <div class ="button_submit">
        <a href="index.php?action=vueFilm"><button type="submit" id="send">Ajouter</button></a><br>
      </div>
    </form> 
</div>
<?php
$titre = "Formulaire Ajouter Un Film";
$contenu = ob_get_clean();
require "views\layouts\Template.php";


