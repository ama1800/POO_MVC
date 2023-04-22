<?php

ob_start(); 

?>

<h2>Les Genres: <?= $requete->rowCount(); ?></h2>
<table>
<thead>
    <tr>
    <th>N° DU GENRE</th>
    <th>NOM DU DU GENRE</th>
    <th id="action">Action</th>
    </tr>
</thead>
<tbody>
<?php

    while($genre = $requete->fetch()){
       echo "<tr class='bordure'> <td><a href='index.php?action=detailgenre&id=".$genre['id_genre']."'>".$genre['id_genre']."</a></td>";
       echo "<td>". $genre["nom_genre"]."</td>";

      
       echo "<td class='boutonsgenres'><button class='bDelete'><a href='index.php?action=suppressiongenre&id=".$genre['id_genre']."'>Supprimer</a></button>
            <button class='addgenre'><a href='index.php?action=modifiergenreFormulaire&id=".$genre['id_genre']."'>Modifier</a></button></td>";
      echo "</tr>";

    }
    ?>
</tbody>
</table>
<button class="addgenre"><a href="index.php?action=ajoutergenreFormulaire">Ajouter un genre</a></button>
<?php
$titre = "Listes des Genres";
$contenu = 
 ob_get_clean();
require "views\layouts\Template.php";

