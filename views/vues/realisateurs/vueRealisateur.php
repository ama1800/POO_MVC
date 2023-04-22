<?php

ob_start(); 

?>

<h2>Les Realisateurs: <?= $requete->rowCount(); ?></h2>

<table>
<thead>
    <tr>
    <th>NOM</th>
    <th>PRENOM</th>
    <th id="action">Action</th>
    </tr>
</thead>
<tbody>
<?php

    while($realisateur = $requete->fetch()){
       echo "<tr class='bordure'> <td><a href='index.php?action=detailrealisateur&id=".$realisateur['id_real']."'>".$realisateur['nom_realisateur']."</a></td>";
       echo "<td>". $realisateur["prenom_realisateur"]."</td>";

      
       echo "<td class='boutonsrealisateurs'><button class='bDelete'><a href='index.php?action=suppressionrealisateur&id=".$realisateur['id_real']."'>Supprimer</a></button>
            <button class='addrealisateur'><a href='index.php?action=modifierrealisateurFormulaire&id=".$realisateur['id_real']."'>Modifier</a></button></td>";
      echo "</tr>";

    }
    ?>
</tbody>
</table>
<button class="addrealisateur"><a href="index.php?action=ajouterrealisateurFormulaire">Ajouter un realisateur</a></button>
<button class="addrealisateur"><a href="index.php?action=ajouterFilmRealForm">Ajouter un film</a></button>

<?php

$titre = "Listes des Realisateurs";
$contenu = 
 ob_get_clean();
require "views\layouts\Template.php";

