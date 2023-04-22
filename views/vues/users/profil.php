<?php
session_start();
ob_start(); 

?>
<h2>BIENVENUE: <?= $_SESSION['psuedo'] ?> </h2>
<div id="membre">
     <?php
            if (isset($_SESSION['succes'])){
                echo $_SESSION['succes'];
            }
                ?>
</div>
           


<?php
$titre = "ESPACE PERSONNEL";
$contenu = ob_get_clean();

session_destroy();
require "views\layouts\Template.php";