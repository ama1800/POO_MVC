<?php

ob_start(); 

?>

<h2>Les Films: <?= $requete->rowCount(); ?></h2>

<table>
<thead>
    <tr>
    <th>TITRE</th>
    <th>ANNEE DE SORTIE</th>
    <th>DUREE</th>
    <th>NOTE</th>
    <th id="action">Action</th>
    </tr>
</thead>
<tbody>
<?php

    while($film = $requete->fetch()){
       echo "<tr class='bordure'> <td><a href='index.php?action=detailfilm&id=".$film['id_film']."'>".$film['titre']."</a></td>";
       echo "<td>". $film["annee"]."</td>";
       echo "<td>". $film["duree"]."</td>";
       echo "<td style='color: palevioletred;font-size: xx-large';>". str_repeat('&#9733;',$film["note"]).str_repeat('&#10032;',5 - $film["note"])."</td>";
       
      
       echo "<td class='boutonsfilms'><button class='bDelete'><a href='index.php?action=suppressionfilm&id=".$film['id_film']."'>Supprimer</a></button>
            <button class='addfilm'><a href='index.php?action=modifierfilmFormulaire&id=".$film['id_film']."'>Modifier</a></button></td>";
      echo "</tr>";

    }
    ?>
</tbody>
</table>
<button class="addfilm"><a href="index.php?action=ajouterfilmFormulaire">Ajouter un film</a></button>
<button class="addfilm"><a href="index.php?action=ajouteracteurFormulaire">Ajouter un acteur</a></button>
<button class="addfilm"><a href="index.php?action=ajouterrealFormulaire">Ajouter un realisateur</a></button>
<button class="addfilm"><a href="index.php?action=ajouterroleFormulaire">Ajouter un nom de rôle</a></button>


<?php
$titre = "Listes des Films";
$contenu = 
 ob_get_clean();
require "views\layouts\Template.php";

