<?php

ob_start(); 

?>
<h2>Ok!Ok!! let's rock the PHP_POO world</h2>
<div id="Accueil">
     <?php
            while($affiche = $requete->fetch()){
                echo '<a href="index.php?action=detailfilm&id='.$affiche['id_film'].'"><img src="'.$affiche['affiche'].'" alt="image"></a>';
            }
                ?>
</div>
           


<?php
$titre = "CINEMA_POO_PDO";
$contenu = ob_get_clean();
require "views\layouts\Template.php";