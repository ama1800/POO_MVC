<?php
ob_start(); 
session_start(); 
?>
<h2>Connectez Vous!</h2>
<div class="formulaire">
    <form class="formulaire" action="index.php?action=connexion" method="POST">
        <?php
              if(isset($_SESSION['erreur'])){
              echo $_SESSION['erreur'];
              }else if (isset($_SESSION['succes'])){
                      echo $_SESSION['succes'];
                  }
        ?>
      <div class="saisie"><br><br>
        <input type="text" name="psuedo" class="form-control" id="psuedo " placeholder="Saisissez Votre Psuedo" ><br><br>
        <input type="password" name="Password" class="form-control" id="Password " placeholder="Saisissez le mot de passe" ><br>
      </div><br>
      <div class ="button_submit">
          <a href="index.php?action=login"><button type="submit" id="send">S'identifier</button><br></a>
      </div>
      <div class="memoriser">
        <input type="checkbox" id="memoriser1" name="memoriser1" checked>
        <label for="memoriser"  id="memoriser">Se souvenir de moi</label><br>
      </div>
      <p>premiere visite sur CINEPOO? <a href="http://localhost/cinePOO/index.php?action=ajoutInscriptionForm" id="inscrire">Inscrivez vous</a></p><br><br>
    </form> 
</div>
<?php
$titre = "CONNEXION";
$contenu = ob_get_clean();
session_destroy();
require "views\layouts\Template.php";


