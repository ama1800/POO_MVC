<?php
session_start();
ob_start();  
?>
<h2>Inscrivez Vous!</h2>
<div class="formulaire">
    <form class="formulaire" action="index.php?action=inscription" method="POST">
        <?php
              if(isset($_SESSION['erreur'])){
              echo $_SESSION['erreur'];
              }else if (isset($_SESSION['succes'])){
                      echo $_SESSION['succes'];
                  }
        ?>
      <div class="saisie">
        <label for="nom">NOM</label><br>
        <input type="text" name="nom" class="form-control" id="nom " placeholder="Saisissez Votre Nom" ><br>
        <label for="prenom">PRENOM</label><br>
        <input type="text" name="prenom" class="form-control" id="prenom " placeholder="Saisissez Votre Prenom" ><br>
        <label for="psuedo">PSUEDO</label><br>
        <input type="text" name="psuedo" class="form-control" id="psuedo " placeholder="Saisissez Votre Psuedo" ><br>
            <?php
                if(isset($_SESSION['psuedo'])){
                echo $_SESSION['psuedo'];
                }
            ?>
        <label for="password">MOT DE PASSE (minimum 8 charachters)</label><br>
        <input type="password" name="password1" class="form-control" id="password1 " placeholder="mot de passe" ><br>
            <?php
                if(isset($_SESSION['pass'])){
                echo $_SESSION['pass'];
                }
            ?>
        <label for="password">MOT DE PASSE (minimum 8 charachters)</label><br>
        <input type="password" name="password2" class="form-control" id="password2 " placeholder="confirmez le mot de passe" ><br>
        <label for="email">EMAIL</label><br>
        <input type="email" name="email1" class="form-control" id="email " placeholder="Saisissez Votre Email" ><br>
        <?php
              if(isset($_SESSION['email'])){
              echo $_SESSION['email'];
              }
            ?>
        <label for="email">CONFIRMATION EMAIL</label><br>
        <input type="email" name="email2" class="form-control" id="email " placeholder="Confirmez Votre Email" ><br>
      </div>
      <div class ="button_submit">
        <a href="index.php?action=inscription" type="submit" id="send"><button>S'inscrire</button><br></a>
        <p>VOUS ETES DEJA INSCRIT? <a href="http://localhost/cinePOO1/index.php?action=connexion" id="inscrire">Connectez vous</a></p>
      </div>
    </form> 
</div>
<?php
$titre = "INSCRIPTION";
$contenu = ob_get_clean();
session_destroy();
require "views\layouts\Template.php";


