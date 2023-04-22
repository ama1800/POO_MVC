<?php

ob_start(); 
?>

<h2>Détail Realisateur</h2>

<table>
<thead>
    <tr>
    <th>NOM</th>
    <th>LE TITRE DU FILM</th>
    <th>ANNEE</th>
    </tr>
</thead>
<tbody>
<?php

    while($detailsRealisateur = $realisateur->fetch()){
        echo "<tr><td>". $detailsRealisateur["nom"]."</td>";
        echo "<td><a href='index.php?action=detailfilm&id=".$detailsRealisateur['id_film']."'>". $detailsRealisateur["titre"]."</a></td>";
        echo "<td>". $detailsRealisateur["annee"]."</td></tr>";

    }
    ?>
</tbody>
</table>
<?php
$titre = "Details des detailsRealisateurs";
$contenu = 
 ob_get_clean();
require "views\layouts\Template.php";

