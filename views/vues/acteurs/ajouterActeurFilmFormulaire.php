<?php

ob_start(); 
?>
<h2>Ajouter casting dont l'acteur :</h2>
<div>
    <form class="formulaire" action="index.php?action=ajouterActeurFilm" method="post">
        <div class="select">
            <label for="role">Acteur</label><br>
            <select name="acteur" multiple class="form-control" id="acteur"><br>
                <?php
                while($acteurs = $listActeurs->fetch()){
                    echo '<option value ='.$acteurs['id_acteur'].'>'.$acteurs['nom'].'</option>';
                }
                ?>
            </select><br><br>
            <label for="role">Role</label><br><br>
            <select name="role[]" multiple class="form-control" id="role"><br><br>
                <?php
                while($roles = $listRoles->fetch()){
                    echo '<option value ='.$roles['id_role'].'>'.$roles['nom_role'].'</option>';
                }
                ?>
            </select> <br><br>
            <label for="film">Film</label><br>
            <select name="film[]" multiple class="form-control" id="film"><br>
                <?php
                while($films = $listFilms->fetch()){
                    echo '<option value ='.$films['id_film'].'>'.$films['titre'].'</option>';
                }
                ?>
            </select><br>
        </div>
        <div class ="button_submit">
            <a href="index.php?action=ajouterActeurFilm"><button type="submit" id="send">Ajouter</button><br></a>
        </div>
    </form> 
<?php
$titre = "Formulaire Ajouter Un Acteur";
$contenu = ob_get_clean();
require "views\layouts\Template.php";
