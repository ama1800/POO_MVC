<?php

ob_start(); 

?>

<h2>Les Roles <?= $requete->rowCount(); ?></h2>
<table>
<thead>
    <tr>
    <th>N° DU ROLE</th>
    <th>NOM DU DU ROLE</th>
    <th id="action">Action</th>
    </tr>
</thead>
<tbody>
<?php

    while($role = $requete->fetch()){
       echo "<tr class='bordure'> <td><a href='index.php?action=detailrole&id=".$role['id_role']."'>".$role['id_role']."</a></td>";
       echo "<td>". $role["nom_role"]."</td>";

      
       echo "<td class='boutonsroles'><button class='bDelete'><a href='index.php?action=suppressionrole&id=".$role['id_role']."'>Supprimer</a></button>
            <button class='addrole'><a href='index.php?action=modifierroleFormulaire&id=".$role['id_role']."'>Modifier</a></button></td>";
      echo "</tr>";

    }
    ?>
</tbody>
</table>
<button class="addrole"><a href="index.php?action=ajouterroleFormulaire">Ajouter un role</a></button>
<?php

$titre = "Listes des Roles";
$contenu = 
 ob_get_clean();
require "views\layouts\Template.php";

