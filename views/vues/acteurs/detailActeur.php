<?php

ob_start(); 
?>

<h2>Détail acteur</h2>

<table>
<thead>
    <tr>
    <th>ACTEUR</th>
    <th>LE TITRE DU FILM</th>
    <th>NOM DU ROLE</th>
    <th>ANNEE</th>
    </tr>
</thead>
<tbody>
<?php

    while($acteur = $findActeur->fetch()){
        echo "<tr><td>". $acteur["nom"]."</td>";
        echo "<td><a href='index.php?action=detailfilm&id=".$acteur['id_film']."'>". $acteur["titre"]."</a></td>";
        echo "<td><a href='index.php?action=detailrole&id=".$acteur['id_role']."'>". $acteur["nom_role"]."</a></td>";
        echo "<td>". $acteur["annee"]."</td></tr>";

    }
    ?>
</tbody>
</table>
<?php
$titre = "Details des acteurs";
$contenu = 
 ob_get_clean();
require "views\layouts\Template.php";

