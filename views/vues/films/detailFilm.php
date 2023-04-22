<?php

ob_start(); 

        $film = $findFilm->fetch();
?>

<div class="detail">
    <h2>Détails Du Film: <?="<spane style='color: palevioletred'>".$film["titre"]."</span>"?></h2>
    <div class="class3">
            <?php?>
    </div>
    <div class="class">
        <div class="class1">
            <?php               echo "<img src=".$film['affiche']."><br>";
            ?>
        </div>
        <div class="class2">
            <?php
                echo "<p>Résumé du film: </p><blockquote>". $film["synopsis"]."</blockquote><br>";
                echo "<p>Note Du Film: <spane style='color: palevioletred;font-size: xx-large'>". str_repeat('&#9733;',$film["note"]).str_repeat('&#10032;',5 - $film["note"])."</span></p><br>";
                echo "<p>Annee De Sortie: <spane style='color: palevioletred'>". $film["annee"]."</span></p><br>";
                echo "<p>Duree: <spane style='color: palevioletred'>". $film["duree"]."</span></p><br>";
                echo "<p>Le Realisateur: <spane style='color: palevioletred'><a href='index.php?action=detailrealisateur&id=".$film['id_real']."'>".$film['nom_realisateur']."</a></span></p><br>";
                
            ?>
            <h2>CASTING: </h2><br>
                <?php
                        while($casting = $castingfilm->fetch()){
                            echo $casting["nom"].": à jouer le role de: ". $casting["nom_role"].'<br>';
                        }
            ?>
    
        </div>
    </div>
            
</div>
<?php
$titre = "Details des Films";
$contenu = 
 ob_get_clean();
require "views\layouts\Template.php";