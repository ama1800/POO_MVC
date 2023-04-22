<?php

ob_start(); 

?>

<h2>Listes des acteurs: <?= $requete->rowCount(); ?></h2>

<table>
<thead>
    <tr>
    <th>NOM</th>
    <th>PRENOM</th>
    <th>DATE DE NAISSANCE</th>
    <th id="action">Action</th>
    </tr>
</thead>
<tbody>
<?php

    while($acteur = $requete->fetch()){
       echo "<tr class='bordure'> <td><a href='index.php?action=detailacteur&id=".$acteur['id_acteur']."'>".$acteur['nom_acteur']."</a></td>";
       echo "<td>". $acteur["prenom_acteur"]."</td>";
       echo "<td>". $acteur["date_naissance"]."</td>";

      
       echo "<td class='boutonsacteurs'><button class='bDelete'><a href='index.php?action=suppressionacteur&id=".$acteur['id_acteur']."'>Supprimer</a></button>
            <button class='addacteur'><a href='index.php?action=modifieracteurFormulaire&id=".$acteur['id_acteur']."'>Modifier</a></button></td>";
      echo "</tr>";

    }
    ?>
</tbody>
</table>
<button class="addacteur"><a href="index.php?action=ajouteracteurFormulaire">Ajouter un acteur</a></button>
<button class="addacteur"><a href="index.php?action=ajouterActeurFilmFormulaire">Ajouter un film de l'acteur</a></button>
<button class="addacteur"><a href="index.php?action=ajouteracteurRoleFormulaire">Ajouter un nom de rôle</a></button>


<?php
$titre = "Listes des acteurs";
$contenu = ob_get_clean();
require "views\layouts\Template.php";

