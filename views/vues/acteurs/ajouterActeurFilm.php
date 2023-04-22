<?php

ob_start(); 

?>

<div class="detail">
    <h2> </h2>
        <?php
        echo '<p> ajouter avec succes</p>';
        ?>
</div>
<?php
$titre = "ajout casting";
$contenu = 
 ob_get_clean();
require "views\layouts\Template.php";